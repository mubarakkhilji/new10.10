<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectSpecification extends Model
{
    use HasFactory;

    public function specification()
    {
        return $this->belongsTo(Specification::class);
    }
}
