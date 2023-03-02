<?php

namespace App\Http\Livewire\StudyTime;

use App\Models\StudyTime;
use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    public $code, $name, $meridiem, $study_time_id;

    public function render()
    {
        $data = DB::table('study_times')->paginate(5);
        return view('livewire.study-time.index', compact('data'))->layout('layouts.app-livewire');
    }

    public function onEdit($id)
    {
        $study_time = StudyTime::findOrFail($id);
        $this->code = $study_time->code;
        $this->name = $study_time->name;
        $this->meridiem = $study_time->meridiem;
        $this->study_time_id = $id;
    }

    public function onSave()
    {
        if ($this->study_time_id) {
            $study_time = StudyTime::findOrFail($this->study_time_id);
            $study_time->code = $this->code;
            $study_time->name = $this->name;
            $study_time->meridiem = $this->meridiem;
        } else {
            $study_time = new StudyTime();
            $study_time->code = $this->code;
            $study_time->name = $this->name;
            $study_time->meridiem = $this->meridiem;
        }
        if ($study_time->save()) {
            //success
            $this->code = null;
            $this->name = null;
            $this->meridiem = null;
            $this->study_time_id = null;
        } else {
            //error
        }
    }

    public function onDelete($id)
    {
        $study_time = StudyTime::findOrFail($id);
        if ($study_time->delete()) {
            //success
        } else {
            //error
        }
    }
}