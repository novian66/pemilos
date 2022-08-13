<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class TimsesUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'timses Budi',
            'email' => 'timses@admin.com',
            'password' => Hash::make(123123)
        ]);

        $role = Role::create(['name' => 'timses']);
        $permission = Permission::where(['name' => 'timses-access'])->pluck('id');
        $role->syncPermissions($permission);
        $user->assignRole([$role->id]);
    }
}
