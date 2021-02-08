<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUrlsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('urls', function (Blueprint $table) {
            $table->id();
            $table->Biginteger('table_id')->unsigned();
            $table->string("link");
            $table->integer("hw");
            $table->integer("ch");
            $table->integer("hr");
            $table->integer("hc");
            $table->timestamps();
            $table->foreign('table_id')->references('id')->on('urlgroups')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('urls');
    }
}
