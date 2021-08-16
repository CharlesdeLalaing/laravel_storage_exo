<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUplaodimagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('uplaodimages', function (Blueprint $table) {
            $table->id();
            $table->string('image_type');
            $table->string('image_link');
            $table->string('image_name');
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
        Schema::table('uplaodimages', function (Blueprint $table) {
            $table->dropColumn('image_link');
        });
        Schema::dropIfExists('uplaodimages');
    }
}
