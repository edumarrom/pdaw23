<?php

namespace App\Livewire\Admin;

use App\Models\Course;
use Livewire\Component;
use Livewire\WithPagination;

class CoursesIndex extends Component
{
    use WithPagination;

    public $statuses = [
        ['id' => Course::BORRADOR, 'name' => 'Borrador'],
        ['id' => Course::REVISION, 'name' => 'Pendiente'],
        ['id' => Course::PUBLICADO, 'name' => 'Publicado'],
    ];

    public $status;

    public $search;

    public function render()
    {
        $courses = Course::where('status', 'LIKE', '%' . $this->status . '%' )
            ->where(function ($query) {
                $query->where('title', 'ILIKE', '%' . $this->search . '%')
                ->orWhere('id', 'ILIKE', '%' . $this->search . '%')
                ->orWhereHas('teacher', function ($query) {
                    $query->where('name', 'ILIKE', '%' . $this->search . '%');
                });
            })
            ->orderBy('created_at', 'desc')->orderBy('id', 'desc')
            ->paginate();

        return view('livewire.admin.courses-index', compact('courses'));
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }
}
