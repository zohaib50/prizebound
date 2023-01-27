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
        Schema::create('category_year_mappings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('bound_category_id');
            $table->foreign('bound_category_id')->references('id')->on('bound_categories')->onDelete('cascade');
            $table->unsignedBigInteger('bound_year_id');
            $table->foreign('bound_year_id')->references('id')->on('bound_years')->onDelete('cascade');
            $table->unsignedBigInteger('bound_list_id');
            $table->foreign('bound_list_id')->references('id')->on('bound_lists')->onDelete('cascade');
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
        Schema::dropIfExists('category_year_mappings');
    }
};
