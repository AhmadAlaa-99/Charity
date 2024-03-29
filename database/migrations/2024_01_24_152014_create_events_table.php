<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEventsTable extends Migration {

	public function up()
	{
		Schema::create('events', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->softDeletes();
			$table->string('name');
			$table->enum('type', array('كلمة', 'درس','لقاء','معرض'));
			$table->string('location');
			$table->string('date');
			$table->string('image');
			$table->text('brive');
			$table->string('notes');
            $table->boolean('is_publish');
		});
	}

	public function down()
	{
		Schema::drop('events');
	}
}
