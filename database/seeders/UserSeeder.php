<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User as ModelsUser;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Usuarios base del sistema
        ModelsUser::create([
            'name' => 'Administrador',
            'email' => 'admin@app.com',
            'password' => bcrypt('admin'),
            'remember_token' => null,
            'role' => 'admin',
            'created_at' => now()
        ]);

        ModelsUser::create([
            'name' => 'Supervisor',
            'email' => 'supervisor@app.com',
            'password' => bcrypt('supervisor'),
            'remember_token' => null,
            'role' => 'supervisor',
            'created_at' => now()
        ]);

        ModelsUser::create([
            'name' => 'Facturacion',
            'email' => 'facturacion@app.com',
            'password' => bcrypt('facturacion'),
            'remember_token' => null,
            'role' => 'billing',
            'created_at' => now()
        ]);

    }
}
