<?php

namespace Database\Seeders;

use Faker\Factory;
use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Factory::create();
        User::create([
          'name' => 'عز الدين',
          'email' => 'test@gmail.com',
          'password' => bcrypt('12345678'),
          'roleName'=>'admin'
        ]);
        $user = User::latest()->first();
        $role = Role::where('name', 'admin')->first();
        $user->assignRole([$role->id]);
    }
}
