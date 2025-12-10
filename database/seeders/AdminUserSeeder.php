<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash; // ¡Añadir esta línea!

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1. Verificar si el usuario ya existe para evitar duplicados
        if (User::where('email', 'admin@example.com')->doesntExist()) {
            
            // 2. Insertar el usuario administrador
            User::create([
                'name' => 'Admin Test',
                'email' => 'admin@example.com',
                'email_verified_at' => now(), 
                'password' => Hash::make('password'), // Contraseña: 'password'
            ]);
            
            echo "Usuario administrador creado: admin@example.com\n";
        } else {
            echo "El usuario administrador ya existe.\n";
        }
    }
}