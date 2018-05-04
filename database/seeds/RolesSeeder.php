<?php

use Illuminate\Database\Seeder;
use App\Role;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = Role::create([
            'name'        => 'Admin',
            'slug'        => 'admin',
            'permissions' => json_encode([
                'create-question' => true,
                'edit-question' => true,
                'delete-question' => true,
                'create-answer' => true,
                'edit-answer' => true,
                'delete-answer' => true,
            ]),
        ]);
        $user = Role::create([
            'name'        => 'User',
            'slug'        => 'user',
            'permissions' => json_encode([
                'view-question' => true,
                'view-answer' => true,
                'create-question' => true,
                'create-answer' => true,


            ]),
        ]);
    }
}
