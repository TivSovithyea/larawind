<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\ClassRoom as ClassRoomModel;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;

class ClassRoom extends Component
{
    use WithPagination;
    public $name, $description, $class_room_id;

    public function render()
    {
        $data = DB::table('class_rooms')->paginate(5);
        return view('livewire.class-room', compact('data'))->layout('layouts.app-livewire');
    }

    public function onEdit($id)
    {
        $class_room = ClassRoomModel::findOrFail($id);
        $this->class_room_id = $class_room->id;
        $this->name = $class_room->name;
        $this->description = $class_room->description;
    }

    public function onSave()
    {
        if ($this->class_room_id) {
            $class_room = ClassRoomModel::findOrFail($this->class_room_id);
            $class_room->name = $this->name;
            $class_room->description = $this->description;
        } else {
            $class_room = new ClassRoomModel();
            $class_room->name = $this->name;
            $class_room->description = $this->description;
        }
        if ($class_room->save()) {
            //success
            $this->class_room_id = null;
            $this->name = null;
            $this->description = null;
        } else {
            //error
        }
    }

    public function onDelete($id)
    {
        $class_room = ClassRoomModel::findOrFail($id);
        if ($class_room->delete()) {
            //success
        } else {
            //error
        }
    }
}