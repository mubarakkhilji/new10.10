<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('logo')->nullable();
            $table->string('breadcrub_image')->nullable();
            $table->text('company_address')->nullable();
            $table->text('mobile')->nullable();
            $table->text('email')->nullable();
            $table->text('facebook_url')->nullable();
            $table->text('twitter_url')->nullable();
            $table->text('linkedin_url')->nullable();
            $table->longText('sister_concern')->nullable();
            $table->string('latitude')->nullable();
            $table->string('longitude')->nullable();
            $table->text('office_location_map')->nullable();
            $table->string('why_choose_us_title')->nullable();
            $table->text('why_choose_us_sub_title')->nullable();
            $table->string('project_title')->nullable();
            $table->text('project_sub_title')->nullable();
            $table->string('media_title')->nullable();
            $table->text('media_sub_title')->nullable();
            $table->string('call_to_action_one_title')->nullable();
            $table->string('call_to_action_one_button_title')->nullable();
            $table->string('call_to_action_one_button_url')->nullable();
            $table->string('call_to_action_two_title')->nullable();
            $table->string('call_to_action_two_button_title')->nullable();
            $table->string('call_to_action_two_button_one_title')->nullable();
            $table->string('call_to_action_two_button_one_url')->nullable();
            $table->string('call_to_action_two_button_two_title')->nullable();
            $table->string('call_to_action_two_button_two_url')->nullable();
            $table->string('footer_about_us_title')->nullable();
            $table->text('footer_about_us_description')->nullable();
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
        Schema::dropIfExists('settings');
    }
}
