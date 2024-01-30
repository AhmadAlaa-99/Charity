<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEmployeesTable extends Migration {

	public function up()
	{
		Schema::create('employees', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->softDeletes();
			$table->string('date');

			$table->bigInteger('section_id')->unsigned();
            $table->foreign('section_id')->references('id')->on('sections')
                ->onDelete('cascade')
                ->onUpdate('cascade');

				$table->bigInteger('nationality_id')->unsigned();
				$table->foreign('nationality_id')->references('id')->on('nationalities')
					->onDelete('cascade')
					->onUpdate('cascade');


			$table->string('gender');
            $table->string('name');
			$table->string('work_nature');
			$table->string('qualification');

			$table->enum('type', array('part', 'full'));
			$table->enum('work_status', array('type1', 'type2'));
			$table->string('wage');
			$table->string('grant');
			$table->string('notes');
		});
	}

	public function down()
	{
		Schema::drop('employees');
	}
}
