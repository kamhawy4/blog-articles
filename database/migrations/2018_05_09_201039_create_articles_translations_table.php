<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticlesTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles_translations', function (Blueprint $table) {
            $table->increments('id');

            $table->string('title');
            $table->text('description');
            $table->string('slug');
            $table->string('author');
            $table->string('language');
            $table->string('image');
            $table->enum('type',['active','unactive']);
            $table->integer('categorie_id')->unsigned();
            $table->foreign('categorie_id')->references('id')->on('categories')->onDelete('cascade');
            $table->integer('articles_id')->unsigned();
            $table->foreign('articles_id')->references('id')->on('articles')->onDelete('cascade');

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
        Schema::dropIfExists('articles_translations');
    }
}
