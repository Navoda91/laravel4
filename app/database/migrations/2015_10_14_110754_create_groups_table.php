<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGroupsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::create('groups', function(Blueprint $table)
		{
			//

			$table->increments('id');

            $table->string('name', 255);
            $table->string('description', 255);
            $table->boolean('status');

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

		Schema::table('groups', function(Blueprint $table)
		{
			//
			Schema::drop('groups');
		});
	}

}
