<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    use HasFactory;

    public function getStatusAttribute()
    {
        return $this->attributes['status'] === 0 ? 'Pending' : 'Replied';
    }

    public function setStatusAttribute($value)
    {
        $this->attributes['status'] = $value === 'Pending' ? true : false;
    }
}
