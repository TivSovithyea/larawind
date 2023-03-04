<?php

namespace App\Http\Livewire\Teaching;

use App\Models\StudyClass;
use App\Models\StudyTime;
use App\Models\Subject;
use App\Models\Teacher;
use App\Models\Teaching;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{

    use WithPagination;

    public $teachers, $subjects, $study_classes, $study_times;
    public $day = 1, $teacher_id, $subject_id, $study_class_id, $study_time_id = 1, $teaching_id;

    public function render()
    {
        $data = Teaching::latest()->paginate(5);
        $this->teachers = Teacher::all();
        $this->subjects = Subject::all();
        $this->study_classes = StudyClass::all();
        $this->study_times = StudyTime::all();
        // dd($data);
        return view('livewire.teaching.index', compact('data'))->layout('layouts.app-livewire');
    }

    public function onEdit($id)
    {
        $teaching = Teaching::findOrFail($id);
        $this->day = $teaching->day;
        $this->teacher_id = $teaching->teacher_id;
        $this->subject_id = $teaching->subject_id;
        $this->study_class_id = $teaching->study_class_id;
        $this->study_time_id = $teaching->study_time_id;
        $this->teaching_id = $teaching->id;
    }

    public function onSave()
    {
        if ($this->teaching_id) {
            $teacher_exist = Teaching::where('teacher_id', $this->teacher_id)
                ->where('study_time_id', $this->study_time_id)
                ->where('day', $this->day)
                ->where('study_class_id', '!=', $teaching->study_class_id)
                ->first();
            if ($teacher_exist) {
                dd('teacher is busy in this time day');
                //error
                //teacher is busy in this time day
            }
            $teaching = Teaching::findOrFail($this->teaching_id);
            $class_exist = Teaching::where('study_class_id', $this->study_class_id)
                ->where('study_time_id', $this->study_time_id)
                ->where('study_class_id', '!=', $teaching->study_class_id)
                ->where('day', $this->day)->first();

            if ($class_exist) {
                dd('class is busy in this time day');
                //error
                //class is busy in this time day
            }
            $teaching->teacher_id = $this->teacher_id;
            $teaching->subject_id = $this->subject_id;
            $teaching->study_class_id = $this->study_class_id;
            $teaching->study_time_id = $this->study_time_id;
            $teaching->day = $this->day;
        } else {
            $teacher_exist = Teaching::where('teacher_id', $this->teacher_id)
                ->where('study_time_id', $this->study_time_id)
                ->where('day', $this->day)
                ->first();
            if ($teacher_exist) {
                dd('teacher is busy in this time day');
                //error
                //teacher is busy in this time day
            }

            $class_exist = Teaching::where('study_class_id', $this->study_class_id)
                ->where('study_time_id', $this->study_time_id)
                ->where('day', $this->day)->first();

            if ($class_exist) {
                dd('class is busy in this time day');
                //error
                //class is busy in this time day
            }
            $teaching = new Teaching();
            $teaching->teacher_id = $this->teacher_id;
            $teaching->subject_id = $this->subject_id;
            $teaching->study_class_id = $this->study_class_id;
            $teaching->study_time_id = $this->study_time_id;
            $teaching->day = $this->day;
        }
        if ($teaching->save()) {
            //success
            $this->teacher_id = null;
            // $this->day = null;
            $this->subject_id = null;
            $this->study_class_id = null;
            // $this->study_time_id = null;
            $this->teaching_id = null;
        } else {
            //error
        }
    }

    public function onDelete($id)
    {
        if (Teaching::destroy($id)) {
            //success
        } else {
            //error
        }
    }
}