<?php

namespace App\Http\Livewire\StudyClass;

use App\Models\ClassRoom;
use App\Models\StudyClass;
use App\Models\StudyYear;
use App\Models\Teacher;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{

    use WithPagination;

    public $class_rooms, $study_years, $teachers;

    public $class_room_id, $study_year_id, $teacher_id, $study_class_id;

    public function render()
    {
        $this->class_rooms = ClassRoom::all();
        $this->study_years = StudyYear::all();
        $this->teachers = Teacher::all();
        $data = StudyClass::latest()->paginate(5);
        return view('livewire.study-class.index', compact('data'))->layout('layouts.app-livewire');
    }

    public function onEdit($id)
    {
        $study_class = StudyClass::findOrFail($id);
        $this->study_class_id = $study_class->id;
        $this->class_room_id = $study_class->class_room_id;
        $this->teacher_id = $study_class->teacher_id;
        $this->study_year_id = $study_class->study_year_id;
    }

    public function onSave()
    {
        if ($this->study_class_id) {
            $study_class = StudyClass::findOrFail($this->study_class_id);
            $study_class->class_room_id = $this->class_room_id;
            $study_class->teacher_id = $this->teacher_id;
            $study_class->study_year_id = $this->study_year_id;
        } else {
            $study_class = new StudyClass();
            $study_class->class_room_id = $this->class_room_id;
            $study_class->teacher_id = $this->teacher_id;
            $study_class->study_year_id = $this->study_year_id;
        }
        if ($study_class->save()) {
            //success
            $this->study_class_id = null;
            $this->class_room_id = null;
            $this->teacher_id = null;
            $this->study_year_id = null;
        } else {
            //error
        }
    }

    public function onDelete($id)
    {
        if (StudyClass::destroy($id)) {
            //success
        } else {
            //error
        }
    }
}