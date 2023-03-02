<?php

namespace App\Http\Livewire\Teacher;

use Throwable;
use App\Models\Subject;
use App\Models\Teacher;
use Exception;
use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

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
        $this->teacher_subjects = $teacher->subjects->pluck('id');
        $this->teacher_id = $teacher->id;
    }

    public function onSave()
    {
        DB::beginTransaction();

        try {
            if ($this->teacher_id != null) {
                $teacher = Teacher::findOrFail($this->teacher_id);
                $teacher->code = $this->code;
                $teacher->name = $this->name;
                $teacher->name_latin = $this->name_latin;
                $teacher->gender = $this->gender;
                $teacher->dob = $this->dob;
                $teacher->phone = $this->phone;
                $teacher->address = $this->address;
                $teacher->save();
                $teacher->subjects()->sync($this->teacher_subjects);
            } else {

                $teacher = new Teacher();
                $teacher->code = $this->code;
                $teacher->name = $this->name;
                $teacher->name_latin = $this->name_latin;
                $teacher->gender = $this->gender;
                $teacher->dob = $this->dob;
                $teacher->phone = $this->phone;
                $teacher->address = $this->address;
                $teacher->save();
                $teacher->subjects()->attach($this->teacher_subjects);
            }

            DB::commit();
            //success
            $this->code = null;
            $this->name = null;
            $this->name_latin = null;
            $this->gender = null;
            $this->dob = null;
            $this->phone = null;
            $this->address = null;
            $this->teacher_subjects = null;
            $this->teacher_id = null;
        } catch (Throwable $e) {

            Log::error($e);
            DB::rollBack();
            //error
        }
    }

    public function onDelete($id)
    {
        DB::beginTransaction();

        try {

            $teacher = Teacher::findOrFail($id);
            $teacher->subjects()->detach($teacher->id);
            $teacher->delete();
            DB::commit();
            //success

        } catch (Exception $ex) {

            Log::error($ex);
            DB::rollBack();
            //error
        }
    }
}