<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProjectsTable extends Migration {

	public function up()
	{
		Schema::create('projects', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->softDeletes();
			$table->string('name');
			$table->text('description');
			$table->string('category');
			$table->string('cost');
			$table->string('suppport_party');
			$table->text('objective');
			$table->string('image');
			$table->string('documention');
			$table->string('date');
			$table->text('note');
            $table->boolean('is_publish');
		});
	}

	public function down()
	{
		Schema::drop('projects');
	}
}
