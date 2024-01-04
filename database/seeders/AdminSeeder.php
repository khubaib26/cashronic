<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $super_admin = User::create([
            'name'=>'Super Admin',
            'email'=>'superadmin@admin.com',
            'password'=>bcrypt('password'),
            'profile' => 'user.avif'
        ]);

        $admin = User::create([
            'name'=>'admin',
            'email'=>'admin@admin.com',
            'password'=>bcrypt('password')
        ]);


        $super_admin_role = Role::create(['name' => 'super']);
        $admin_role = Role::create(['name' => 'admin']);

        $permission = Permission::create(['name' => 'Post access']);
        $permission = Permission::create(['name' => 'Post edit']);
        $permission = Permission::create(['name' => 'Post create']);
        $permission = Permission::create(['name' => 'Post delete']);

        $permission = Permission::create(['name' => 'Role access']);
        $permission = Permission::create(['name' => 'Role edit']);
        $permission = Permission::create(['name' => 'Role create']);
        $permission = Permission::create(['name' => 'Role delete']);

        $permission = Permission::create(['name' => 'User access']);
        $permission = Permission::create(['name' => 'User edit']);
        $permission = Permission::create(['name' => 'User create']);
        $permission = Permission::create(['name' => 'User delete']);

        $permission = Permission::create(['name' => 'Permission access']);
        $permission = Permission::create(['name' => 'Permission edit']);
        $permission = Permission::create(['name' => 'Permission create']);
        $permission = Permission::create(['name' => 'Permission delete']);

        $permission = Permission::create(['name' => 'Mail access']);
        $permission = Permission::create(['name' => 'Mail edit']);

        $permission = Permission::create(['name' => 'FrontUser access']);
        $permission = Permission::create(['name' => 'FrontUser edit']);
        $permission = Permission::create(['name' => 'FrontUser create']);
        $permission = Permission::create(['name' => 'FrontUser delete']);

        $permission = Permission::create(['name' => 'Category access']);
        $permission = Permission::create(['name' => 'Category edit']);
        $permission = Permission::create(['name' => 'Category create']);
        $permission = Permission::create(['name' => 'Category delete']);

        $permission = Permission::create(['name' => 'Store access']);
        $permission = Permission::create(['name' => 'Store edit']);
        $permission = Permission::create(['name' => 'Store create']);
        $permission = Permission::create(['name' => 'Store delete']);



        $super_admin->assignRole($super_admin_role);
        $admin->assignRole($admin_role);


        $super_admin_role->givePermissionTo(Permission::all());
    }
}
