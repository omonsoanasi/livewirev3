<div>
    <h1>
        Tasks
    </h1>
        <input type="text" wire:model="task" placeholder="Task...">

        <button wire:click="add" class="bg-amber-600">Add</button>
    <ul>
        @foreach($tasks as $task)
            <li>{{ $task }}</li>
        @endforeach
    </ul>
</div>
