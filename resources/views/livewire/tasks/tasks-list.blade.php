<div class="w-1/2 mr-3 ml-3 border-2 border-blue-300 rounded-lg mt-3 flex flex-wrap">
    @if($tasksByStatus->count() > 0)
        <div class="px-4 sm:px-0">
            <h3 class="text-base font-semibold leading-7 text-gray-900">{{ auth()->user()->name }}'s Tasks</h3>
            <livewire:tasks.tasks-count : tasksByStatus/>
        </div>
    @endif
    @if($tasks->count() > 0)
        @foreach($tasks as $task)
            <div class="mt-6 mb-6 border-t border-gray-400 rounded-lg border-2 bg-gray-200 ml-3 mr-3">
                <dl class="divide-y divide-gray-100">
                    <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                        <dt class="text-xl font-semibold leading-6 text-gray-900">{{ $task->title }}</dt>
                        <div class="w-1/3 flex-shrink-0">
                            <button type="button"
                                    class="py-2.5 px-5 me-2 mb-2 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-full border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700 whitespace-nowrap">
                                {{ \Carbon\Carbon::parse($task->updated_at)->format('D, d M. Y') }}
                            </button>
                        </div>
                        <div class="w-1/3 flex-shrink-0">
                            <button type="button"
                                    class="py-2.5 px-5 me-2 mb-2 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-full border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
                                {{ $task->priority }}
                            </button>
                        </div>
                        <div class="flex justify-between">
                            <div>
                                @foreach(App\Enums\StatusType::cases() as $case)
                                    <div class="w-1/3 flex-shrink-0">
                                        <button type="button"
                                                wire:click="changeStatus({{ $task->id }}, '{{ $case->value }}')"
                                                class="py-2.5 px-5 me-2 mb-2 text-sm font-medium text-gray-900 focus:outline-none
                                       bg-white rounded-full border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700 whitespace-nowrap {{ $case->value === $task->status->value ? 'disabled bg-gray-400' : '' }} {{ $case->value == 'started' ? 'border-blue-500' : ''  }} {{ $case->value == 'in_progress' ? 'border-yellow-500' : ''  }} {{ $case->value == 'done' ? 'border-green-500' : ''  }}">
                                            {{ Str::of($case->value)->headline() }}
                                        </button>
                                    </div>
                                @endforeach
                            </div>
                            <div>
                                <x-primary-button wire:click="$dispatch('edit-task',{id: {{ $task->id }}})"
                                                  class="bg-green-500 hover:bg-green-700">edit
                                </x-primary-button>
                                <x-primary-button wire:click="delete({{ $task->id }})"
                                                  wire:confirm="Are you sure you want to delete this task?"
                                                  class="bg-red-500 hover:bg-red-700">delete
                                </x-primary-button>
                            </div>
                        </div>
                        <div>
                            <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">{{ $task->description }}</dd>
                        </div>
                        <div class="relative inline-flex">
                            <button
                                class="align-middle select-none font-sans font-bold text-center uppercase transition-all disabled:opacity-50 disabled:shadow-none disabled:pointer-events-none text-xs py-3 px-6 rounded-lg bg-gray-900 text-white shadow-md shadow-gray-900/10 hover:shadow-lg hover:shadow-gray-900/20 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none"
                                type="button">
                                {{ $task->deadline->diffForHumans() }}
                            </button>
                            <span
                                class="absolute rounded-full py-1 px-1 text-xs font-medium content-[''] leading-none grid place-items-center top-[4%] right-[2%] translate-x-2/4 -translate-y-2/4 bg-red-500 text-white min-w-[24px] min-h-[24px] bg-gradient-to-tr from-green-400 to-green-600 border-2 border-white shadow-lg shadow-black/20">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                 stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                              <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5m-9-6h.008v.008H12v-.008ZM12 15h.008v.008H12V15Zm0 2.25h.008v.008H12v-.008ZM9.75 15h.008v.008H9.75V15Zm0 2.25h.008v.008H9.75v-.008ZM7.5 15h.008v.008H7.5V15Zm0 2.25h.008v.008H7.5v-.008Zm6.75-4.5h.008v.008h-.008v-.008Zm0 2.25h.008v.008h-.008V15Zm0 2.25h.008v.008h-.008v-.008Zm2.25-4.5h.008v.008H16.5v-.008Zm0 2.25h.008v.008H16.5V15Z"/>
                                            </svg>
                                          </span>
                        </div>
                    </div>
                </dl>
            </div>
        @endforeach
        <div class="mt-2 mb-12 p-2">
            {{ $tasks->links() }}
        </div>
    @else
        <div class="mt-2 mb-12 p-2">
            <h1 class="text-2xl text-semibold text-indigo-500">No tasks</h1>
        </div>
    @endif
</div>
