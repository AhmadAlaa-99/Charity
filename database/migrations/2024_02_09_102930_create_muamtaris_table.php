<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('muamtaris', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('number');
            $table->string('gender');
            $table->bigInteger('nationality_id')->unsigned();
            $table->foreign('nationality_id')->references('id')->on('nationalities')
                ->onDelete('cascade')
                ->onUpdate('cascade');
                $table->bigInteger('umrah_id')->nullable()->unsigned();
                $table->foreign('umrah_id')->references('id')->on('umrahs')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');
            $table->date('last');
            $table->date('birth_date');
            $table->string('members');
            $table->string('status')->default('pending');
            $table->timestamps();

        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('muamtaris');
    }
};
