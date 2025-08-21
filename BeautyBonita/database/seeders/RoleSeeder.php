<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = ['CLIENTE', 'EMPLEADO', 'ADMIN'];

        foreach ($roles as $rol) {
            Role::firstOrCreate(['nombrerol' => $rol]);
        }
    }
}
