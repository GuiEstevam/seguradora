<?php

namespace Database\Seeders;

use App\Models\Enterprise;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roleMaster = Role::where('name', 'master')->first();
        $roleAdmin = Role::where('name', 'admin')->first();
        $roleOperator = Role::where('name', 'operator')->first();
        $user = User::factory()->create([
            'name' => 'Bruno',
            'email' => 'user@user.com',
            'password' => bcrypt('12345678'),
            'phone' => '1234567890',
            'enterprise_id' => '1',
        ]);
        if ($roleMaster) {
            $user->assignRole($roleMaster);
        }
        $enterprise = Enterprise::find(1); // Assumindo que a empresa criada tem ID 1
        $enterprise->user_id = $user->id;
        $enterprise->save();

        $user2 = User::factory()->create([
            'name' => 'Fernando',
            'email' => 'fernando@fernando.com',
            'password' => bcrypt('1234'),
            'phone' => '1234567890',
            'enterprise_id' => '1',
        ]);
        if ($roleAdmin) {
            $user2->assignRole($roleAdmin);
        }
        $user3 = User::factory()->create([
            'name' => 'Guilherme',
            'email' => 'gui@gui.com',
            'password' => bcrypt('1234'),
            'phone' => '1234567890',
            'enterprise_id' => '1',
        ]);
        if ($roleOperator) {
            $user3->assignRole($roleOperator);
        }
    }
}
