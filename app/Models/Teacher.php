<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;

    public function subjects()
    {
        return $this->belongsToMany(Subject::class);
    }

    public function getGenderLabelAttribute()
    {
        return $this->gender == 1 ? 'Male' : 'Female';
    }
}