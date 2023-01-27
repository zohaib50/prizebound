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
        Schema::create('bound_lists', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('bound_category_id');
            $table->foreign('bound_category_id')->references('id')->on('bound_categories')->onDelete('cascade');
            $table->unsignedBigInteger('bound_year_id');
            $table->foreign('bound_year_id')->references('id')->on('bound_years')->onDelete('cascade');
            $table->enum('type', ['first', 'second', 'third']);
            $table->string('bound_no');
            $table->softDeletes();
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
        Schema::dropIfExists('bound_lists');
    }
};
