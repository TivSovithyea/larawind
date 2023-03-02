<?php

namespace App\Http\Livewire\StudyYear;

use App\Models\StudyYear;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $name, $start_date, $end_date, $study_year_id, $search;

    public function render()
    {
        $data = DB::table('study_years')
            ->orWhere('start_date', 'LIKE', '%' . $this->search . '%')
            ->orWhere('end_date', 'LIKE', '%' . $this->search . '%')
            ->orWhere('name', 'LIKE', '%' . $this->search . '%')
            ->paginate(5);
        return view('livewire.study-year.index', compact('data'))->layout('layouts.app-livewire');
    }

    public function onEdit($id)
    {
        $study_year = StudyYear::findOrFail($id);
        $this->name = $study_year->name;
        $this->start_date = $study_year->start_date;
        $this->end_date = $study_year->end_date;
        $this->study_year_id = $id;
    }

    public function onSave()
    {
        if ($this->study_year_id) {
            $study_year = StudyYear::findOrFail($this->study_year_id);
            $study_year->name = $this->name;
            $study_year->start_date = $this->start_date;
            $study_year->end_date = $this->end_date;
        } else {
            $study_year = new StudyYear();
            $study_year->name = $this->name;
            $study_year->start_date = $this->start_date;
            $study_year->end_date = $this->end_date;
        }
        if ($study_year->save()) {
            $this->name = null;
            $this->start_date = null;
            $this->end_date = null;
            $this->study_year_id = null;
            //sucess
        } else {
            //error
        }
    }

    public function onDelete($id)
    {
        $study_year = StudyYear::findOrFail($this->study_year_id);
        if ($study_year->delete()) {
            //success
        } else {
            //error
        }
    }
}