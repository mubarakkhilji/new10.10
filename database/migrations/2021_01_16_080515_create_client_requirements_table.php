<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientRequirementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('client_requirements', function (Blueprint $table) {
            $table->id();
            $table->string('preferred_location');
            $table->string('preferred_size');
            $table->longText('Property_amenities');
            $table->string('client_name');
            $table->string('profession');
            $table->string('email');
            $table->string('contact_number');
            $table->string('address');
            $table->boolean('status')->default(false);
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
        Schema::dropIfExists('client_requirements');
    }
}
