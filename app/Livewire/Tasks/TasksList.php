<?php

namespace App\Livewire\Tasks;

use App\Models\Task;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class TasksList extends Component
{
    use WithPagination;

    public function changeStatus($id, $status)
    {
        $task = Task::find($id);
        $task->update(
            ['status' => $status]
        );
    }

    public function delete($id)
    {
        $task = Task::find($id);
        $task->delete();

    }

    #[On('task-created')]
    public function render()
    {
        return view('livewire.tasks.tasks-list', [
            'tasks' => Task::where('user_id', auth()->id())->orderBy('id','desc')->paginate(5),
            'tasksByStatus' => auth()->user()->tasks()->select('status', DB::raw('count(*) as count'))->groupBy('status')->orderBy('status', 'desc')->get(),
        ]);
    }
}
