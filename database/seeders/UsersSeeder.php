<?php

namespace Database\Seeders;

use App\Enums\RolesEnum;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        app(Role::class)->findOrCreate(RolesEnum::MANAGER->value,'api');

        $user = User::query()->create([
            'name' => 'Narek V.',
            'email' => 'vardanyan.work5@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('12345678')
        ]);

        $user->assignRole(RolesEnum::MANAGER);
    }
}
