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
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->string('day');
            $table->string('name')->nullable();
            $table->text('comment');
            $table->bigInteger('kutikomi_id')->unsigned();
            $table->foreign('kutikomi_id')->references('id')->on('kutikomis')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('replies');
        Schema::dropIfExists('comments');
    }
};
