<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChaptersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chapters', function (Blueprint $table) {
            $table->id();
            $table->string('name', 16383);
            $table->unsignedInteger('chapter_number');
            $table->unsignedBigInteger('comic_id');
            $table->foreign('comic_id')->references('id')->on('comics')->cascadeOnDelete();
            $table->unsignedBigInteger('total_view')->default(0);
            $table->string('source', 16383);
            $table->string('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('chapters');
    }
}
