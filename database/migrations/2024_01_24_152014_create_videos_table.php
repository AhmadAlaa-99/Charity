<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateVideosTable extends Migration {

	public function up()
	{
		Schema::create('videos', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->softDeletes();
			$table->string('title');
			$table->text('description');
			$table->date('date');
			$table->string('link');
			$table->enum('type', array('channel', 'video'));
			$table->boolean('is_publication');
			$table->text('notes');
		});
	}

	public function down()
	{
		Schema::drop('videos');
	}
}
