<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        Permission::create(['name' => 'create enterprise', 'guard_name' => 'web']);
        Permission::create(['name' => 'edit enterprise', 'guard_name' => 'web']);
        Permission::create(['name' => 'delete enterprise', 'guard_name' => 'web']);
    }
}
