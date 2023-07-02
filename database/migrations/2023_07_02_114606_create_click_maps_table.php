<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('click_maps', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('page_id')->unsigned()->index();;
            $table->foreign('page_id')
                ->references('id')->on('pages')
                ->onDelete('cascade');
            $table->integer('x');
            $table->integer('y');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('click_maps');
    }
};
