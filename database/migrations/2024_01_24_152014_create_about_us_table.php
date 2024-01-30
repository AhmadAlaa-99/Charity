<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAboutUsTable extends Migration {

	public function up()
	{
		Schema::create('about_us', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->softDeletes();
			$table->string('name');
			$table->string('logo');
			$table->string('email');
			$table->string('address');
			$table->string('permit_number');
			$table->string('bank_account_1');
			$table->string('bank_account_2');
			$table->string('phone');
			$table->string('description');
			$table->string('vision');
			$table->string('message');
			$table->string('value');
			$table->string('objectives');
		});
	}

	public function down()
	{
		Schema::drop('about_us');
	}
}