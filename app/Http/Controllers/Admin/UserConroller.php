<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
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
}
