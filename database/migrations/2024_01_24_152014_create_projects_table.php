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
			$table->string('description');
			$table->string('category');
			$table->string('cost');
			$table->string('suppport_party');
			$table->string('objective');
			$table->string('image');
			$table->string('documention');
			$table->string('date');
			$table->string('note');
            $table->boolean('is_publish');
		});
	}

	public function down()
	{
		Schema::drop('projects');
	}
}
