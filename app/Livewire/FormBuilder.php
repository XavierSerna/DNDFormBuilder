<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Task;

class FormBuilder extends Component
{
    public $tasks;

    public function mount()
    {
        $this->tasks = Task::orderBy('order')->get();
    }

    public function updateTaskOrder($orderedIds)
    {
        foreach ($orderedIds as $order => $id) {
            Task::find($id)->update(['order' => $order]);
        }

        $this->tasks = Task::orderBy('order')->get();
    }

    public function render()
    {
        return view('livewire.form-builder');
    }
}
