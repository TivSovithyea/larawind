<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudyTime extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'name',
        'meridiem'
    ];
}