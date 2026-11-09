<?php


namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;


class UserController extends Controller
{
    public function index()
    {
        $data['dataUser'] = User::all();
        return view('admin.user.index', $data);
    }


    public function create()
    {
        return view('admin.user.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8|confirmed',
        ]);


        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['password'] = Hash::make($request->password);


        User::create($data);


        return redirect()->route('user.index')
            ->with('success', 'Penambahan Data Berhasil!');
    }


    public function show(string $id)
    {
        //
    }


    public function edit(string $id)
    {
        $data['dataUser'] = User::findOrFail($id);
        return view('admin.user.edit', $data);
    }


    public function update(Request $request, string $id)
    {
        $user = User::findOrFail($id);


        $request->validate([
            'name' => 'required|string|max:100',
            'email' => [
                'required',
                'email',
                Rule::unique('users', 'email')->ignore($user->id),
            ],
            'password' => 'nullable|min:8|confirmed',
        ]);


        $user->name = $request->name;
        $user->email = $request->email;


        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }


        $user->save();


        return redirect()->route('user.index')
            ->with('success', 'Perubahan Data Berhasil!');
    }


    public function destroy(string $id)
    {
        $user = User::findOrFail($id);
        $user->delete();


        return redirect()->route('user.index')
            ->with('success', 'Data Berhasil Dihapus!');
    }
}
