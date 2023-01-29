<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movies', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('category');
            $table->string('title');
            $table->string('producer');
            $table->string('release_year');
            $table->string('duration');
            $table->string('language');
            $table->char('subtitle', 1)->default('0');
            $table->string('file');
            $table->string('banner');
            $table->string('thumbnail')->nullable();
            $table->text('description');
            $table->unsignedInteger('uploaded_by');
            $table->dateTime('created_at')->useCurrent();
            $table->dateTime('updated_at')->nullable();
            $table->dateTime('deleted_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('movies');
    }
};
