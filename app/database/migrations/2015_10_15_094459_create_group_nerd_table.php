<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGroupNerdTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::create('group_nerd', function(Blueprint $table)
		{
			//

			$table->increments('id');

            $table->integer('group_id');
            $table->integer('nerd_id');
           
            $table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		//

		Schema::table('group_nerd', function(Blueprint $table)
		{
			//
			Schema::drop('group_nerd');
		});
	}

}
