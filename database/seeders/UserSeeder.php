<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UserSeeder extends Seeder
{
    public function run()
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions

        $role = Role::create(['name' => 'super-admin']);
        $role->givePermissionTo(Permission::all());

        DB::table('users')->insert([
            'name' => 'super-admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin1234'),
        ]);
    }
}
