<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateContactInformationsTable extends Migration {

	public function up()
	{
		Schema::create('contact_informations', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
            $table->string('name');
            $table->string('link');
			$table->softDeletes();
		});
	}

	public function down()
	{
		Schema::drop('contact_informations');
	}
}
