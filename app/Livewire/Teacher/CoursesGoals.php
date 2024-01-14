<?php

namespace App\Livewire\Teacher;

use App\Models\Course;
use App\Models\Goal;
use Livewire\Component;

class CoursesGoals extends Component
{
    public $course;
    public $goal;

    public $name;

    protected $rules = [
        'goal.name' => 'required'
    ];

    public function mount(Course $course)
    {
        $this->course = $course;
        $this->goal = new Goal();
    }

    public function render()
    {
        return view('livewire.teacher.courses-goals');
    }

    public function store()
    {
        $this->validate([
            'name' => $this->rules['goal.name'],
        ]);

        $goal = $this->course->goals()->create([
            'name' => $this->name,
        ]);

        $this->reset('name');

        $this->course = Course::find($this->course->id);

        $this->dispatch('swal', [
            'icon' => 'success',
            'title' => '¡Hecho!',
            'text' => "Meta '$goal->name' creada satisfactoriamente.",
            'confirmButtonColor' => '#4338CA',
        ]);
    }

    public function edit(Goal $goal)
    {
        $this->goal = $goal;
    }

    public function update()
    {
        $name = $this->goal->name;

        $this->validate();

        $this->goal->save();

        $this->goal = new Goal();

        $this->course = Course::find($this->course->id);

        $this->dispatch('swal', [
            'icon' => 'success',
            'title' => '¡Hecho!',
            'text' => "Meta '$name' editada satisfactoriamente.",
            'confirmButtonColor' => '#4338CA',
        ]);
    }

    public function destroy(Goal $goal)
    {
        $name = $goal->name;

        $goal->delete();

        $this->course = Course::find($this->course->id);

        $this->dispatch('swal', [
            'icon' => 'success',
            'title' => '¡Hecho!',
            'text' => "Meta '$name' borrada satisfactoriamente.",
            'confirmButtonColor' => '#4338CA',
        ]);
    }

    public function cancel()
    {
        $this->goal = new Goal();
    }
}
