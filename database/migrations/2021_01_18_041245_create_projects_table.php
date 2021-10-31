<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('type_id');
            $table->text('short_description')->nullable();
            $table->longText('details')->nullable();
            $table->text('address_1')->nullable();
            $table->text('address_2')->nullable();
            $table->string('district')->nullable();
            $table->string('police_station')->nullable();
            $table->string('zip_code')->nullable();
            $table->text('project_location_map')->nullable();
            $table->string('video')->nullable();
            $table->boolean('is_featured')->default(false);
            $table->boolean('is_best')->default(false);
            $table->boolean('status')->default(true);
            $table->string('featured_image');
            $table->timestamps();

            $table->foreign('category_id')->references('id')->on('categories');
            $table->foreign('type_id')->references('id')->on('types');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('projects');
    }
}
