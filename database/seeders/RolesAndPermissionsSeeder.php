<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    public function run()
    {
        // Clear cached permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // Permissions
        Permission::create(['name' => 'manage students']);
        Permission::create(['name' => 'manage teachers']);
        Permission::create(['name' => 'manage courses']);
        Permission::create(['name' => 'manage subjects']);
        Permission::create(['name' => 'manage exams']);
        Permission::create(['name' => 'manage results']);
        Permission::create(['name' => 'manage enrollments']);
        Permission::create(['name' => 'view contact messages']);
        Permission::create(['name' => 'edit contact messages']);
        Permission::create(['name' => 'delete contact messages']);

        // Roles
        $admin = Role::create(['name' => 'admin']);
        $admin->givePermissionTo(Permission::all());

        $teacher = Role::create(['name' => 'teacher']);
        $teacher->givePermissionTo([
            'manage courses',
            'manage subjects',
            'manage exams',
            'manage results',
            'manage enrollments'
        ]);

        Role::create(['name' => 'student']);
    }
}
