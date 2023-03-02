<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Category;
use Livewire\WithPagination;

class CategoryDatatable extends Component
{
    use WithPagination;

    public $search;
    /*
    public function mount()
    {
        $this->categories_temp = Category::paginate(3);
    }
    */

    public function render()
    {
        // if (!$this->categories_temp) {
        //     $this->categories_temp = Category::paginate(3);
        // }
        $categories = Category::where('name', 'LIKE', '%' . $this->search . '%')->paginate(3);
        // dd($categories);
        return view('livewire.category-datatable', ['categories' => $categories]);
    }

    /*
    public function onSearch()
    {
        $this->categories_temp = Category::where('name', 'LIKE', '%' . $this->search . '%')->paginate(3);
    }
    */
}