<?php

namespace App\Livewire\Forms;

use App\Models\Task;
use Livewire\Attributes\Rule;
use Livewire\Form;

class TaskForm extends Form
{
    public ?Task $task;
    public $editMode = false;

    #[Rule('required|min:5')]
    public $title;
    #[Rule('required|min:5')]
    public $slug;
    #[Rule('required|min:20')]
    public $description;
    #[Rule('required')]
    public $status;
    #[Rule('required')]
    public $priority;
    #[Rule('required')]
    public $deadline;

    public function setTask(Task $task)
    {
        $this->task = $task;
        $this->editMode = true;
        $this->title = $task->title;
        $this->slug = $task->slug;
        $this->description = $task->description;
        $this->status = $task->status;
        $this->priority = $task->priority;
        $this->deadline = $task->deadline->format('Y-m-d');
    }
    public function createTask()
    {
        if ($this->editMode) {
            $this->task->update($this->all());
            $this->reset();
            session()->flash('message', 'Task successfully updated.');
        } else {
            auth()->user()->tasks()->create($this->all());
            $this->reset();
            session()->flash('message', 'Task successfully created.');
        }
    }
}
