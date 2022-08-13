<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class SchoolUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'Admin School',
            'email' => 'school@admin.com',
            'password' => Hash::make(123123)
        ]);

        $role = Role::create(['name' => 'school']);
        $permission = Permission::where(['name' => 'school-access', 'name' => 'student-access'])->pluck('id');
        $role->syncPermissions($permission);
        $user->assignRole([$role->id]);
    }
}
