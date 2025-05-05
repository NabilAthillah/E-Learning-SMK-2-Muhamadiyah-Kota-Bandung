<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::create([
            'name' => 'Superadmin SMK 2 Muhammadiyah',
            'email' => 'superadmin@smk2muhammadiyah.com',
            'password' => 'SuperadminSMK2Muhammadiyah'
        ]);
        
        $role = Role::create([
            'name' => 'superadmin'
        ]);

        $permissionNames = [
            'view dashboard',
            'view all user',
            'view user',
            'create user',
            'edit user',
            'delete user',
            'view all role',
            'view role',
            'create role',
            'edit role',
            'delete role',
            'view all permission',
            'view permission',
            'create permission',
            'edit permission',
            'delete permission',
            'view all jurusan',
            'view jurusan',
            'create jurusan',
            'edit jurusan',
            'delete jurusan',
            'view all jenjang',
            'view jenjang',
            'create jenjang',
            'edit jenjang',
            'delete jenjang',
            'view all mata_pelajaran',
            'view mata_pelajaran',
            'create mata_pelajaran',
            'edit mata_pelajaran',
            'delete mata_pelajaran',
            'view all kelas',
            'view kelas',
            'create kelas',
            'edit kelas',
            'delete kelas',
            'view all pertemuan',
            'view pertemuan',
            'create pertemuan',
            'edit pertemuan',
            'delete pertemuan',
        ];

        foreach ($permissionNames as $name) {
            Permission::firstOrCreate(['name' => $name]);
        }

        $permissions = Permission::whereIn('name', $permissionNames)->get();

        $role->syncPermissions($permissions);

        $user->assignRole($role);
    }
}
