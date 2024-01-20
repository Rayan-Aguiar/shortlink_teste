<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSlugToLinksTable extends Migration
{
    public function up()
{
    Schema::create('links', function (Blueprint $table) {
        $table->id();
        $table->string('link');
        $table->string('slug', 16)->unique();
        $table->timestamps();
    });
}

    public function down()
    {
        Schema::dropIfExists('links');
    }

}
