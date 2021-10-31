<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'category_id',
        'type_id',
        'short_description',
        'details',
        'address_1',
        'address_2',
        'district',
        'police_station',
        'zip_code',
        'project_location_map',
        'video',
        'is_featured',
        'is_best',
        'status',
        'featured_image',
    ];

    public function getIsFeaturedAttribute()
    {
        return $this->attributes['is_featured'] === 1 ? 'Yes' : 'No';
    }

    public function setIsFeaturedAttribute($value)
    {
        $this->attributes['is_featured'] = isset($value) ? true : false;
    }

    public function getIsBestAttribute()
    {
        return $this->attributes['is_best'] === 1 ? 'Yes' : 'No';
    }

    public function setIsBestAttribute($value)
    {
        $this->attributes['is_best'] = isset($value) ? true : false;
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function type()
    {
        return $this->belongsTo(Type::class);
    }

    public function specifition()
    {
        return $this->belongsTo(Specifition::class);
    }

    public function projectSpecification()
    {
        return $this->hasMany(ProjectSpecification::class, 'project_id', 'id');
    }

    public function projectPhotoGallery()
    {
        return $this->hasMany(ProjectPhotoGallery::class, 'project_id', 'id')->where('photo_type', 'photo_gallery_image');
    }
    public function atAGlanceImage()
    {
        return $this->hasOne(ProjectPhotoGallery::class, 'project_id', 'id')->where('photo_type', 'at_a_glance_image');
    }
    public function featuresAmenitiesImage()
    {
        return $this->hasOne(ProjectPhotoGallery::class, 'project_id', 'id')->where('photo_type', 'features_and_amenities_image');
    }
    public function sliderImage()
    {
        return $this->hasMany(ProjectPhotoGallery::class, 'project_id', 'id')->where('photo_type', 'slider_image');
    }
    public function projectPhotos()
    {
        return $this->hasMany(ProjectPhotoGallery::class, 'project_id', 'id');
    }

    public function getStatusAttribute()
    {
        return $this->attributes['status'] === 0 ? 'Draft' : 'Published';
    }

    public function setStatusAttribute($value)
    {
        $this->attributes['status'] = $value === 'Draft' ? false : true;
    }

    public function scopePublished($query)
    {
        return $query->whereStatus(true);
    }
}
