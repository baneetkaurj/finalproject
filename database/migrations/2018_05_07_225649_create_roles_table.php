<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Role;

class CreateRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('slug')->unique();
            $table->text('permissions')->nullable();
            $table->timestamps();
        });

        Role::create([
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

        Role::create([
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

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('roles');
    }
}
