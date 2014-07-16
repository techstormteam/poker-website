<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('users');

        Schema::create('users', function(Blueprint $table)
        {
            $table->increments('id');

            $table->string('username', 20);
            $table->text('password');
            $table->string('nickname', 20);
            $table->string('email', 80);
            $table->string('avatar', 10);
            $table->string('phone_code', 10);
            $table->string('phone', 20);
            $table->text('first_name');
            $table->text('last_name');
            $table->string('gender', 10);
            $table->string('ip', 50);
            $table->string('country', 100);
            $table->text('city');
            $table->text('state');
            $table->text('street_address');
            $table->string('zip_code', 20);
            $table->text('answer');
            $table->text('bonus_code');
            $table->bigInteger('freeroll_hand_number')->default(0);
            $table->integer('status')->default(0);
            $table->text('activate_code');

            $table->unique('username');
            $table->unique('email');
            $table->unique('nickname');

            $table->timestamps();
        });
        
        // Insert some stuff
        DB::table('users')->insert(
            array(
                'username' => 'player1',
                'nickname' => 'player1',
                'email' => 'email1'
            )
        );
        DB::table('users')->insert(
            array(
                'username' => 'player2',
                'nickname' => 'player2',
                'email' => 'email2',
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
        Schema::drop('users');
    }

}
