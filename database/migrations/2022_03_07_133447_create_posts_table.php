<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('sub_title')->nullable();
            $table->longText('description');
            $table->string('image');
            $table->string('slug');
            $table->unsignedInteger('menu')->default(0);
            $table->unsignedInteger('publish')->default(0);
            $table->unsignedBigInteger('category_id');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->boolean('published')->default(1);
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
        Schema::dropIfExists('posts');
    }
}
