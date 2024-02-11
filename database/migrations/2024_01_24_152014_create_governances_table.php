<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateGovernancesTable extends Migration {

	public function up()
	{
		Schema::create('governances', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('name');
			$table->string('date');
			$table->string('documention');
			$table->string('image');
			$table->text('note');
			$table->string('cost');

		});
	}

	public function down()
	{
		Schema::drop('governances');
	}
}
