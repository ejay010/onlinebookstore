<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBooksTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('books', function(Blueprint $table)
		{
			$table->increments('id');
            $table->text('title')->required();
            $table->text('author');
            $table->text('publisher');
            $table->decimal('pprice',5,2)->required();
            $table->decimal('rprice',5,2);
            $table->integer('isbn')->required();
            $table->longText('description');
            $table->text('category');
            $table->text('class');
            $table->text('professor');
            $table->text('thumbnail');
            $table->integer('onHand')->unsigned();
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
		Schema::drop('books');
	}

}
