<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;

class CreateRolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = [
            [
               'role_name'=>'admin',
            ],

            [
               'role_name'=>'user',
            ],
        ];
        foreach ($role as $key => $value) {
            Role::create($value);
        }
    }
}
