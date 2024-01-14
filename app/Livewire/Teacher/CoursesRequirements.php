<?php

namespace App\Livewire\Teacher;

use App\Models\Course;
use App\Models\Requirement;
use Livewire\Component;

class CoursesRequirements extends Component
{
    public $course;
    public $requirement;

    public $name;

    protected $rules = [
        'requirement.name' => 'required'
    ];

    public function mount(Course $course)
    {
        $this->course = $course;
        $this->requirement = new Requirement();
    }

    public function render()
    {
        return view('livewire.teacher.courses-requirements');
    }

    public function store()
    {
        $this->validate([
            'name' => $this->rules['requirement.name'],
        ]);

        $requirement = $this->course->requirements()->create([
            'name' => $this->name,
        ]);

        $this->reset('name');

        $this->course = Course::find($this->course->id);

        $this->dispatch('swal', [
            'icon' => 'success',
            'title' => '¡Hecho!',
            'text' => "Requisito '$requirement->name' creado satisfactoriamente.",
            'confirmButtonColor' => '#4338CA',
        ]);
    }

    public function edit(Requirement $requirement)
    {
        $this->requirement = $requirement;
    }

    public function update()
    {
        $name = $this->requirement->name;

        $this->validate();

        $this->requirement->save();

        $this->requirement = new Requirement();

        $this->course = Course::find($this->course->id);

        $this->dispatch('swal', [
            'icon' => 'success',
            'title' => '¡Hecho!',
            'text' => "Requisito '$name' editado satisfactoriamente.",
            'confirmButtonColor' => '#4338CA',
        ]);
    }

    public function destroy(Requirement $requirement)
    {
        $name = $requirement->name;

        $requirement->delete();

        $this->course = Course::find($this->course->id);

        $this->dispatch('swal', [
            'icon' => 'success',
            'title' => '¡Hecho!',
            'text' => "Requisito '$name' borrado satisfactoriamente.",
            'confirmButtonColor' => '#4338CA',
        ]);
    }

    public function cancel()
    {
        $this->requirement = new Requirement();
    }
}
