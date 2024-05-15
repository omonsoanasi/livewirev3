<div class="w-1/2 mr-3 ml-3 mt-3">
    <form wire:submit="save" class="w-full justify-center items-center ml-3">
        <div class="mr-3">
            @if (session()->has('message'))
                <div x-data="{ open: true }" x-show="open"
                     class="flex items-center bg-blue-500 text-white text-sm font-bold px-4 py-3 rounded-lg relative"
                     role="alert">
                    <svg x-on:click="open = false" class="fill-current w-4 h-4 mr-2 cursor-pointer"
                         xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                        <path
                            d="M12.432 0c1.34 0 2.01.912 2.01 1.957 0 1.305-1.164 2.512-2.679 2.512-1.269 0-2.009-.75-1.974-1.99C9.789 1.436 10.67 0 12.432 0zM8.309 20c-1.058 0-1.833-.652-1.093-3.524l1.214-5.092c.211-.814.246-1.141 0-1.141-.317 0-1.689.562-2.502 1.117l-.528-.88c2.572-2.186 5.531-3.467 6.801-3.467 1.057 0 1.233 1.273.705 3.23l-1.391 5.352c-.246.945-.141 1.271.106 1.271.317 0 1.357-.392 2.379-1.207l.6.814C12.098 19.02 9.365 20 8.309 20z"/>
                    </svg>
                    <p>{{ session('message') }}</p>
                </div>
            @endif
        </div>
        <div class="flex flex-wrap -mx-3 mb-6">
            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                       for="grid-title">
                    Title
                </label>
                <input wire:model="form.title"
                       class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                       id="grid-title" type="text" placeholder="title">
                <div>
                    @error('form.title')<span
                        class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>
            </div>
            <div class="w-full md:w-1/2 px-3">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                       for="grid-slug">
                    Slug
                </label>
                <input wire:model="form.slug"
                       class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                       id="grid-slug" type="text" placeholder="slug">
                <div>
                    @error('form.slug')<span
                        class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>
            </div>
        </div>
        <div class="flex flex-wrap -mx-3 mb-6">
            <div class="w-full px-3">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                       for="grid-description">
                    Description
                </label>
                <textarea wire:model="form.description" id="grid-description"
                          class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"></textarea>
                <div>
                    @error('form.description')<span
                        class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>
            </div>
        </div>
        <div class="flex flex-wrap -mx-3 mb-2">
            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                       for="grid-state">
                    Status
                </label>
                <div class="relative">
                    <select wire:model="form.status"
                            class="block appearance-none w-full bg-gray-200 border border-red-500 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                            id="grid-status">
                        <option value="" selected>Select Status</option>
                        @foreach(App\Enums\StatusType::cases() as $statusType)
                            <option
                                value="{{ $statusType->value }}">{{ $statusType->name }}</option>
                        @endforeach
                    </select>
                    <div>
                        @error('form.status')<span
                            class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>
                    <div
                        class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                             viewBox="0 0 20 20">
                            <path
                                d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/>
                        </svg>
                    </div>
                </div>
            </div>
            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                       for="grid-state">
                    Priority
                </label>
                <div class="relative">
                    <select wire:model="form.priority"
                            class="block appearance-none w-full bg-gray-200 border border-red-500 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                            id="grid-state">
                        <option value="" selected>Select Priority</option>
                        @foreach(App\Enums\PriorityType::cases() as $priorityType)
                            <option
                                value="{{ $priorityType->value }}">{{ $priorityType->name }}</option>
                        @endforeach
                    </select>
                    <div>
                        @error('form.priority')<span
                            class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>
                    <div
                        class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                             viewBox="0 0 20 20">
                            <path
                                d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/>
                        </svg>
                    </div>
                </div>
            </div>
        </div>
        <div class="flex flex-wrap -mx-3 mb-6">
            <div class="w-full md:w-full px-3">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                       for="grid-deadline">
                    Deadline
                </label>
                <input wire:model="form.deadline"
                       class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                       id="grid-slug" type="date" placeholder="slug">
                <div>
                    @error('form.deadline')<span
                        class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>
            </div>
        </div>
        <div class="flex flex-wrap -mx-3 mb-2 md:flex md:items-center">
            <div class="md:w-1/3"></div>
            <div class="md:w-2/3">
                <button
                    class="shadow bg-purple-500 hover:bg-purple-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded"
                    type="submit">
                    Submit
                    <div wire:loading>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 200 200">
                            <rect fill="#32FFD8" stroke="#32FFD8" stroke-width="15"
                                  stroke-linejoin="round" width="30" height="30" x="85" y="85"
                                  rx="0"
                                  ry="0">
                                <animate attributeName="rx" calcMode="spline" dur="2"
                                         values="15;15;5;15;15"
                                         keySplines=".5 0 .5 1;.8 0 1 .2;0 .8 .2 1;.5 0 .5 1"
                                         repeatCount="indefinite"></animate>
                                <animate attributeName="ry" calcMode="spline" dur="2"
                                         values="15;15;10;15;15"
                                         keySplines=".5 0 .5 1;.8 0 1 .2;0 .8 .2 1;.5 0 .5 1"
                                         repeatCount="indefinite"></animate>
                                <animate attributeName="height" calcMode="spline" dur="2"
                                         values="30;30;1;30;30"
                                         keySplines=".5 0 .5 1;.8 0 1 .2;0 .8 .2 1;.5 0 .5 1"
                                         repeatCount="indefinite"></animate>
                                <animate attributeName="y" calcMode="spline" dur="2"
                                         values="40;170;40;"
                                         keySplines=".6 0 1 .4;0 .8 .2 1"
                                         repeatCount="indefinite"></animate>
                            </rect>
                        </svg>
                        <div class="sr-only">loading...</div>
                    </div>
                </button>

                <button ype="button" wire:click="refresh"
                    class="shadow bg-slate-700 hover:bg-purple-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" >
                    refresh
                </button>
            </div>
        </div>
    </form>
</div>
