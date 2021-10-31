<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'logo',
        'breadcrub_image',
        'company_address',
        'mobile',
        'email',
        'sister_concern',
        'facebook_url',
        'twitter_url',
        'linkedin_url',
        'office_location_map',
        'why_choose_us_title',
        'why_choose_us_sub_title',
        'project_title',
        'project_sub_title',
        'media_title',
        'media_sub_title',
        'call_to_action_one_title',
        'call_to_action_one_button_title',
        'call_to_action_one_button_url',
        'call_to_action_two_title',
        'call_to_action_two_button_one_title',
        'call_to_action_two_button_one_url',
        'call_to_action_two_button_two_title',
        'call_to_action_two_button_two_url',
        'footer_about_us_title',
        'footer_about_us_description',
    ];
}
