<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Ramsey\Uuid\Uuid;
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
            'id' => Uuid::uuid4(),
            'nama' => 'Superadmin SMK 2 Muhammadiyah',
            'email' => 'superadmin@smk2muhammadiyah.com',
            'password' => 'SuperadminSMK2Muhammadiyah',
            'nomor_induk' => '000000',
            'alamat' => 'xxxxxx',
            'no_hp' => '00000000'
        ]);

        $role = Role::create([
            'name' => 'superadmin'
        ]);

        Role::insert([
            [
                'name' => 'guru',
                'guard_name' => 'web'
            ],
            [
                'name' => 'siswa',
                'guard_name' => 'web'
            ],
            [
                'name' => 'wali_kelas',
                'guard_name' => 'web'
            ],
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
        ];

        foreach ($permissionNames as $name) {
            Permission::firstOrCreate(['name' => $name]);
        }

        $permissions = Permission::whereIn('name', $permissionNames)->get();

        $role->syncPermissions($permissions);

        $user->assignRole($role);
    }
}
