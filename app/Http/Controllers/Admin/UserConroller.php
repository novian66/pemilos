<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Utils\RandomStringGenerator;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class UserConroller extends Controller
{
    public function index()
    {
        $role = Role::all();
        return view('admin.user.index', compact('role'));
    }

    public function list(Request $request, $role)
    {
        $roles = Role::where('name', $role)->first();
        $user = User::query()
            ->when($request->cari, function ($q, $r) {
                $q->where('name', 'LIKE', "%{$r}%")
                    ->orWhere('email', 'LIKE', "%{$r}%");
            })
            ->whereHas('roles', function ($q) use ($role) {
                $role = Role::where('name', $role)->first();
                $q->where('name', $role->name);
            })->paginate(8);
        // dd($user);

        return view('admin.user.list', compact('user', 'roles'));
    }

    public function createUser(Request $request)
    {
        $check = User::where('email', $request->email)->first();
        if ($check) {
            return redirect()->route('users.all')->with('error', 'User dengan email yang sama sudah ada!');
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'token' => (new RandomStringGenerator)->generate(6),
        ]);
        $user->assignRole($request->role);
        return redirect()->route('users.all')->with('success', 'User Berhasil Ditambahkan');
    }

    public function create()
    {
        $roles = Role::all();
        return view('admin.user.create', compact('roles'));
    }

    public function deleteUser($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect()->route('users.all')->with('success', 'User Berhasil Dihapus');
    }
}
