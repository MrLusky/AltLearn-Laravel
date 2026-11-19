<?php
namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::forceCreate([
            'name' => 'Administrador AltLearn',
            'email' => 'admin@altlearn.com',
            'password' => 'password',
            'role' => 'admin',
            'email_verified_at' => now(),
        ]);

        User::forceCreate([
            'name' => 'Usuário Comum',
            'email' => 'usuario@altlearn.com',
            'password' => 'password',
            'role' => 'user',
            'email_verified_at' => now(),
        ]);
    }
}