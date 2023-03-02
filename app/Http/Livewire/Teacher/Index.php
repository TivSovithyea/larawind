<?php

namespace App\Http\Livewire\Teacher;

use App\Models\Subject;
use App\Models\Teacher;
use Livewire\Component;

class Index extends Component
{

    public $subjects = [];
    public $code, $name, $name_latin, $gender, $dob, $phone, $address;
    public $teacher_subjects, $teacher_id;
    public function render()
    {

        $this->subjects = Subject::all();

        $data = Teacher::latest()->paginate(10);
        return view('livewire.teacher.index', compact('data'))->layout('layouts.app-livewire');
    }

    public function onEdit($id)
    {
        $teacher = Teacher::findOrFail($id);
        $this->code = $teacher->code;
        $this->name = $teacher->name;
        $this->name_latin = $teacher->name_latin;
        $this->gender = $teacher->gender;
        $this->dob = $teacher->dob;
        $this->phone = $teacher->phone;
        $this->address = $teacher->address;
        $this->teacher_subjects = $teacher->subject->pluck('id');
        $this->teacher_id = $teacher->id;
    }

    public function onSave()
    {
        if ($this->teacher_id) {
            $teacher = Teacher::findOrFail($this->teacher_id);
            $teacher->code = $this->code;
            $teacher->name = $this->name;
            $teacher->name_latin = $this->name_latin;
            $teacher->gender = $this->gender;
            $teacher->dob = $this->dob;
            $teacher->phone = $this->phone;
            $teacher->address = $this->address;
            $teacher->subjects->sync($this->teacher_subjects);
        } else {
            $teacher = new Teacher();
            $teacher->code = $this->code;
            $teacher->name = $this->name;
            $teacher->name_latin = $this->name_latin;
            $teacher->gender = $this->gender;
            $teacher->dob = $this->dob;
            $teacher->phone = $this->phone;
            $teacher->address = $this->address;
            $teacher->subjects->attact($this->teacher_subjects);
        }
        if ($teacher->save()) {
            $this->code = null;
            $this->name = null;
            $this->name_latin = null;
            $this->gender = null;
            $this->dob = null;
            $this->phone = null;
            $this->address = null;
            $this->teacher_subjects = null;
            $this->teacher_id = null;
            //success
        } else {
            //error
        }
    }
}
