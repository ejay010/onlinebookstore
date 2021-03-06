<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBookRequestsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('bookrequests', function(Blueprint $table)
		{
			$table->increments('id');
            $table->string('title');
            $table->string('author');
            $table->string('publisher');
            $table->integer('professor_id')->unsigned();
            $table->foreign('professor_id')->references('id')->on('users');
            $table->integer('edition',false, true);
            $table->char('approved', 1);
            $table->string('class');
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
		Schema::drop('bookrequests');
	}

}
