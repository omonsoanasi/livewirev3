<div
    class="p-2 text-center bg-white border border-gray-200 rounded-lg shadow sm:p-8 dark:bg-gray-800 dark:border-gray-700">
    <h5 class="mb-2 text-3xl font-bold text-gray-900 dark:text-white">Tasks Count</h5>
    <div class="flex">
        @foreach($tasksByStatus as $status)
            <div class="mx-auto ml-3">
                <span class="w-16 h-16 flex justify-center items-center rounded-full text-lg text-black border-2
         {{ $status->status->value === 'started' ? 'border-blue-500' : '' }}
         {{ $status->status->value === 'in_progress' ? 'border-yellow-500' : '' }}
         {{ $status->status->value === 'done' ? 'border-green-500' : '' }}">
                    {{ $status->count }}</span>
                <span> {{ Str::of($status->status->value)->headline() }}</span>
            </div>
        @endforeach
    </div>
</div>

