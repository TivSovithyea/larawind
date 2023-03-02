<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teaching extends Model
{
    use HasFactory;

    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }

    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }

    public function studyClass()
    {
        return $this->belongsTo(StudyClass::class);
    }

    public function studyTime()
    {
        return $this->belongsTo(StudyTime::class);
    }

    public function getDayLabelAttribute()
    {
        if ($this->day === 1) {
            return 'Monday';
        } elseif ($this->day === 2) {
            return 'Tuesday';
        } elseif ($this->day === 3) {
            return 'Wednesday';
        } elseif ($this->day === 4) {
            return 'Thursday';
        } elseif ($this->day === 5) {
            return 'Friday';
        } elseif ($this->day === 6) {
            return 'Saturday';
        }
    }
}