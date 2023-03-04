<?php

namespace App\Http\Controllers;

use App\Models\StudyClass;
use App\Models\StudyTime;

class ScheduleController extends Controller
{
    public function index()
    {
        $data = StudyClass::all();
        $study_times = StudyTime::all();
        // foreach ($study_times as $study_time) {
        //     dd($study_time->teachings);
        // }

        $days = [
            [
                'day' => 1,
            ],
            [
                'day' => 2,
            ],
            [
                'day' => 3,
            ],
            [
                'day' => 4,
            ],
            [
                'day' => 5,
            ],
            [
                'day' => 6,
            ],
        ];
        return view('schedule.index', compact('data', 'study_times', 'days'));
    }
}