<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('images', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('post_id')->nullable();
            $table->foreign('post_id')
                ->references('id')
                ->on('posts')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->unsignedBigInteger('exhibition_id')->nullable();
            $table->foreign('exhibition_id')
                ->references('id')
                ->on('exhibitions')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->unsignedBigInteger('praised_id')->nullable();
            $table->foreign('praised_id')
                ->references('id')
                ->on('praiseds')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->string('image');
            
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
        Schema::dropIfExists('images');
    }
}
