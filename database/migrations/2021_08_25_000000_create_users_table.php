<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Hash;
use App\Models\Role;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->foreignId('role_id')->constrained();
            $table->rememberToken();
            $table->timestamps();
        });

        DB::table('users')->insert(
            array(
                array(
                    'name' => 'testAdmin',
                    'email' => 'admin@test.com',
                    'password' => Hash::make('testtest'),
                    'role_id' => Role::where('name', 'Admin')->first()->id,
                ),
                array(
                    'name' => 'testModo',
                    'email' => 'moderator@test.com',
                    'password' => Hash::make('testtest'),
                    'role_id' => Role::where('name', 'Moderator')->first()->id,
                ),
                array(
                    'name' => 'testAuthor',
                    'email' => 'author@test.com',
                    'password' => Hash::make('testtest'),
                    'role_id' => Role::where('name', 'Author')->first()->id,
                )
            )
            
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
