<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSettingTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
            Schema::dropIfExists('settings');
            
            Schema::create('settings', function(Blueprint $table) {
                $table->increments('id');

                $table->text('key_option');
                $table->text('value_option');

                $table->timestamps();
            });
            
            // Insert some stuff
            DB::table('settings')->insert(
                array(
                    'key_option' => 'freeroll_hand',
                    'value_option' => '5'
                )
            );
            DB::table('settings')->insert(
                array(
                    'key_option' => 'freeroll_hand_list_line',
                    'value_option' => '1'
                )
            );
            DB::table('settings')->insert(
                array(
                    'key_option' => 'freeroll_hand_line',
                    'value_option' => '1'
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
            Schema::drop('settings');
	}

}
