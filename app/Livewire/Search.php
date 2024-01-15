<?php

namespace App\Livewire;

use App\Models\Course;
use Livewire\Component;

class Search extends Component
{
    public $search = '';

    public function render()
    {
        return view('livewire.search');
    }

    public function getResultsProperty()
    {
        return Course::where('title', 'ILIKE', '%' . $this->search . '%')
            ->where('status', 3)
            ->take(5)
            ->get();
    }
}
