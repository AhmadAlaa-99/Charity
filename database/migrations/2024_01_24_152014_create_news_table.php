<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateNewsTable extends Migration {

	public function up()
	{
		Schema::create('news', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->softDeletes();
			$table->string('title');
			$table->string('brive_new');
			$table->string('whole_new');
			$table->date('date');
			$table->string('image');
			$table->boolean('main');
            $table->boolean('is_publish');
		});
	}

	public function down()
	{
		Schema::drop('news');
	}
}
