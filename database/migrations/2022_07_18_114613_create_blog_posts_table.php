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
        Schema::create('blog_posts', function (Blueprint $table) {
            $table->id();
            $table->string('category_id');
            $table->string('post_image') -> nullable();
            $table->string('post_title_eng');
            $table->string('post_title_hin');
            $table->string('post_slug_eng');
            $table->string('post_slug_hin');
            $table->text('post_details_eng');
            $table->text('post_details_hin');
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
        Schema::dropIfExists('blog_posts');
    }
};
