<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Career extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'job_title',
        'vacancy',
        'salary',
        'job_location',
        'deadline',
        'employment_status',
        'job_responsibilities',
        'educational_requirements',
        'experience_requirements',
        'additional_requirements',
        'compensation_other_benefits',
        'apply_instruction',
        'job_status',
    ];

    public function getJobStatusAttribute()
    {
        return $this->attributes['job_status'] === 0 ? 'Draft' : 'Published';
    }

    public function getSalayAttribute()
    {
        return number_format($this->attributes['salary'], 2);
    }

    public function setJobStatusAttribute($value)
    {
        $this->attributes['job_status'] = $value === 'Draft' ? false : true;
    }

    public function scopePublished($query)
    {
        return $query->whereJobStatus(true);
    }
}
