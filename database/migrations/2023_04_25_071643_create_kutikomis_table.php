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
        Schema::create('kutikomis', function (Blueprint $table) {
            $table->id();
            $table->string('attend');
            $table->string('text');
            $table->text('test');
            $table->text('task');
            $table->text('comment');
            $table->string('evaluate');
            $table->integer('rate');
            $table->bigInteger('jugyo_id')->unsigned();
            $table->foreign('jugyo_id')->references('id')->on('jugyos')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kutikomis');
    }
};
