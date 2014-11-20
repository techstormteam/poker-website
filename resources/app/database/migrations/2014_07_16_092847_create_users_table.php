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
            $table->string('nickname', 20)->nullable();
            $table->string('email', 80);
            $table->string('avatar', 10);
            $table->string('phone_code', 10);
            $table->string('phone', 20);
            $table->string('real_name', 26)->nullable();
            $table->string('gender', 10);
            $table->string('ip', 50)->nullable();
            $table->string('country', 100)->nullable();
            $table->text('city');
            $table->text('state')->nullable();
            $table->text('street_address');
            $table->string('zip_code', 20)->nullable();
            $table->text('answer')->nullable();
            $table->text('bonus_code')->nullable();
            $table->bigInteger('freeroll_hand_number')->default(0)->nullable();
            $table->bigInteger('freeroll_available')->default(0)->nullable();
            $table->integer('status')->default(0)->nullable();
            $table->text('activate_code')->nullable();

            $table->unique('username');
            $table->unique('email');

            $table->rememberToken();
            $table->timestamps();
        });

        // Insert some stuff
        DB::table('users')->insert(
                array(
                    'username' => 'vietanh',
                    'password' => '$2a$10$PhdJGohIEgagkFWqbte2X.DTAm5hYJ/5eiaJxJqeXksO/m7ml.W/y',
                    'nickname' => 'vietanh',
                    'email' => 'vietanh.sgu@gmail.com',
                    'avatar' => '1',
                    'phone_code' => '84',
                    'phone' => '1652175179',
                    'real_name' => 'Tran Viet Anh',
                    'gender' => 'male',
                )
        );
        DB::table('users')->insert(
                array(
                    'username' => 'vietanh1',
                    'password' => '$2a$10$PhdJGohIEgagkFWqbte2X.DTAm5hYJ/5eiaJxJqeXksO/m7ml.W/y',
                    'nickname' => 'vietanh1',
                    'email' => 'vietanh.sgu1@gmail.com',
                    'avatar' => '1',
                    'phone_code' => '84',
                    'phone' => '1652175179',
                    'real_name' => 'Tran Viet Anh',
                    'gender' => 'male',
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
