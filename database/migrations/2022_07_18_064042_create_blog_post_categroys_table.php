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
        Schema::create('blog_post_categroys', function (Blueprint $table) {
            $table->id();
            $table->string('blog_categroy_name_eng');
            $table->string('blog_categroy_name_hin');
            $table->string('blog_categroy_slug_eng');
            $table->string('blog_categroy_slug_hin');
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
        Schema::dropIfExists('blog_post_categroys');
    }
};
