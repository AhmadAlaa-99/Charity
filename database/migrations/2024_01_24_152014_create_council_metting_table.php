<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCouncilMettingTable extends Migration {

	public function up()
	{
		Schema::create('council_metting', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->softDeletes();
			$table->string('name');
			$table->date('date');
			$table->enum('type', array('type1', 'type2'));
			$table->boolean('is_publication');
			$table->string('documention');
			$table->string('cost');
		});
	}

	public function down()
	{
		Schema::drop('council_metting');
	}
}