<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Criar permissões
        Permission::create(['name' => 'add register', 'guard_name' => 'web']);
        Permission::create(['name' => 'view register', 'guard_name' => 'web']);
        Permission::create(['name' => 'edit register', 'guard_name' => 'web']);
        Permission::create(['name' => 'delete register', 'guard_name' => 'web']);

        // Criar papéis e atribuir permissões
        $masterRole = Role::create(['name' => 'master', 'guard_name' => 'web']);
        $adminRole = Role::create(['name' => 'admin', 'guard_name' => 'web']);
        $operatorRole = Role::create(['name' => 'operator', 'guard_name' => 'web']);

        $masterRole->givePermissionTo(Permission::all());
        $adminRole->givePermissionTo(['add register', 'view register', 'edit register']);
        $operatorRole->givePermissionTo(['view register']);
    }
}
