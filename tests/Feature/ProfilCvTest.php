<?php

namespace Tests\Feature;

use App\Models\ProfilCv;
use Illuminate\Foundation\Testing\LazilyRefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class ProfilCvTest extends TestCase
{
    use LazilyRefreshDatabase;

    public function test_cv_page_displays_profile_and_inline_edit_controls(): void
    {
        $response = $this->get(route('cv.index'));

        $response->assertOk()
            ->assertSeeText('MUHAMMAD FADHIL RAMADHAN')
            ->assertSeeText('Edit Profil')
            ->assertSeeText('Hapus Profil');
    }

    public function test_profile_can_be_updated_deleted_and_created_again(): void
    {
        Storage::fake('public');

        $profile = ProfilCv::query()->firstOrFail();
        $profileData = [
            'nama' => 'Fadhil Profile Test',
            'profesi' => 'Teknik Informatika',
            'tempat_tanggal_lahir' => 'Duri, 2 Oktober 2004',
            'alamat' => 'Jl. Umban Sari',
            'sosial_media' => '@fadhiltest',
            'email' => 'fadhil@example.test',
            'pendidikan' => 'Politeknik Caltex Riau, Teknik Informatika, 2029',
            'foto' => UploadedFile::fake()->image('profile.jpg'),
        ];

        $this->put(route('cv.profil.update', $profile), $profileData)
            ->assertRedirect(route('cv.index'));

        $this->assertDatabaseHas('profil_cvs', [
            'id' => $profile->id,
            'nama' => 'Fadhil Profile Test',
            'email' => 'fadhil@example.test',
        ]);

        $profile->refresh();
        $fotoLama = $profile->foto;
        $this->assertNotNull($fotoLama);
        Storage::disk('public')->assertExists($fotoLama);

        $this->delete(route('cv.profil.destroy', $profile))
            ->assertRedirect(route('cv.index'));

        $this->assertDatabaseMissing('profil_cvs', ['id' => $profile->id]);
        Storage::disk('public')->assertMissing($fotoLama);

        $profileData['foto'] = UploadedFile::fake()->image('profile-again.png');

        $this->post(route('cv.profil.store'), $profileData)
            ->assertRedirect(route('cv.index'));

        $this->assertDatabaseHas('profil_cvs', [
            'nama' => 'Fadhil Profile Test',
            'email' => 'fadhil@example.test',
        ]);

        $fotoBaru = ProfilCv::query()->firstOrFail()->foto;
        $this->assertNotNull($fotoBaru);
        Storage::disk('public')->assertExists($fotoBaru);
    }

    public function test_profile_update_rejects_an_invalid_email(): void
    {
        $profile = ProfilCv::query()->firstOrFail();

        $this->from(route('cv.index'))
            ->put(route('cv.profil.update', $profile), [
                'nama' => 'Fadhil Profile Test',
                'profesi' => 'Teknik Informatika',
                'tempat_tanggal_lahir' => 'Duri, 2 Oktober 2004',
                'alamat' => 'Jl. Umban Sari',
                'sosial_media' => '@fadhiltest',
                'email' => 'not-an-email',
                'pendidikan' => 'Politeknik Caltex Riau, Teknik Informatika, 2029',
            ])
            ->assertRedirect(route('cv.index'))
            ->assertSessionHasErrors('email');

        $this->assertDatabaseHas('profil_cvs', [
            'id' => $profile->id,
            'email' => 'fadhil25ti@mahasiswa.pcr.ac.id',
        ]);
    }
}
