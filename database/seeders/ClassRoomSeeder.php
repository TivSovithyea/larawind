<?php

namespace Database\Seeders;

use App\Models\ClassRoom;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClassRoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $class_room = new ClassRoom();
        $class_room->name = '7A';
        $class_room->description = "TT";
        $class_room->save();
        $class_room = new ClassRoom();
        $class_room->name = '8A';
        $class_room->description = "TT";
        $class_room->save();
        $class_room = new ClassRoom();
        $class_room->name = '9A';
        $class_room->description = "TT";
        $class_room->save();
        $class_room = new ClassRoom();
        $class_room->name = '10A';
        $class_room->description = "TT";
        $class_room->save();
        $class_room = new ClassRoom();
        $class_room->name = '11A';
        $class_room->description = "TT";
        $class_room->save();
        $class_room = new ClassRoom();
        $class_room->name = '12A';
        $class_room->description = "TT";
        $class_room->save();
    }
}