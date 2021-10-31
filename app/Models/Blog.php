<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    public function getStatusAttribute()
    {
        return $this->attributes['status'] === 0 ? 'Draft' : 'Published';
    }

    public function setStatusAttribute($value)
    {
        $this->attributes['status'] = $value === 'Draft' ? false : true;
    }

    public function scopeActive($query)
    {
        return $query->whereStatus(true);
    }
}
