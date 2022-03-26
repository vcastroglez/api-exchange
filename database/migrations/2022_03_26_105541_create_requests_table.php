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
        Schema::create('requests', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedBigInteger('collection_id');
            $table->foreign('collection_id')->references('id')->on('collections');
            $table->string('method')->default('GET');
            $table->string('uri')->default('http://127.0.0.1');
            $table->longText('params')->nullable();
            $table->longText('headers')->nullable();
            $table->longText('body')->nullable();
            $table->longText('response')->nullable();
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
        Schema::dropIfExists('requests');
    }
};
