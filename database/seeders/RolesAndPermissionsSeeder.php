<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();
        Permission::create(['name' => 'edit events']);
        Permission::create(['name' => 'delete events']);
        Permission::create(['name' => 'publish events']);
        Permission::create(['name' => 'unpublish events']);
        $role = Role::create(['name' => \App\Enums\User\Role::Manager]);
        $role->givePermissionTo('edit events');

        // or may be done by chaining
        $role = Role::create(['name' => \App\Enums\User\Role::Admin])
            ->givePermissionTo(['publish events', 'unpublish events']);

        $role = Role::create(['name' => \App\Enums\User\Role::SuperAdmin]);
        $role->givePermissionTo(Permission::all());

        Role::create(['name' => \App\Enums\User\Role::User]);

        $admin = \App\Models\User::factory()->create([
            'username' => 'admin',
            'email' => "admin@gmail.com",
            'password' => bcrypt('password'),
        ]);

    }
}
