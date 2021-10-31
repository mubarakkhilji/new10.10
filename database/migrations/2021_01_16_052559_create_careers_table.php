<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCareersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('careers', function (Blueprint $table) {
            $table->id();
            $table->string('job_title');
            $table->string('vacancy');
            $table->string('job_location');
            $table->float('salary', 8, 2);
            $table->date('deadline');
            $table->enum('employment_status', ['Full time', 'Half time', 'Contractual']);
            $table->longText('job_responsibilities');
            $table->longText('educational_requirements')->nullable();
            $table->longText('experience_requirements')->nullable();
            $table->longText('additional_requirements')->nullable();
            $table->longText('compensation_other_benefits')->nullable();
            $table->longText('apply_instruction')->nullable();
            $table->boolean('job_status')->default(false);
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
        Schema::dropIfExists('careers');
    }
}
