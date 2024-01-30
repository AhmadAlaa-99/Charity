<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSlidersTable extends Migration {

	public function up()
	{
		Schema::create('sliders', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->softDeletes();
			$table->string('sub_title');
			$table->string('main_title');
            $table->string('details');
			$table->string('image');
			$table->boolean('is_publish');
		});
	}

	public function down()
	{
		Schema::drop('sliders');
	}
}
