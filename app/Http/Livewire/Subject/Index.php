<?php

namespace App\Http\Livewire\Subject;

use App\Models\Subject;
use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    public $code, $name, $short_name, $subject_id, $search;
    public function render()
    {
        $data = DB::table('subjects')
            ->orWhere('name', 'LIKE', '%' . $this->search . '%')
            ->orWhere('short_name', 'LIKE', '%' . $this->search . '%')
            ->paginate(5);
        return view('livewire.subject.index', compact('data'))->layout('layouts.app-livewire');
    }

    public function onEdit($id)
    {
        $subject = Subject::findOrFail($id);
        $this->subject_id = $subject->id;
        $this->code = $subject->code;
        $this->name = $subject->name;
        $this->short_name = $subject->short_name;
    }

    public function onSave()
    {
        if ($this->subject_id) {
            $subject = Subject::findOrFail($this->subject_id);
            $subject->code = $this->code;
            $subject->name = $this->name;
            $subject->short_name = $this->short_name;
        } else {
            $subject = new Subject();
            $subject->code = $this->code;
            $subject->name = $this->name;
            $subject->short_name = $this->short_name;
        }
        if ($subject->save()) {
            //success
            $this->code = null;
            $this->name = null;
            $this->short_name = null;
            $this->subject_id = null;
        } else {
            //error
        }
    }

    public function onDelete($id)
    {
        $subject = Subject::findOrFail($id);
        if ($subject->delete()) {
            //success
        } else {
            //error
        }
    }
}