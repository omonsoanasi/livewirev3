<div x-data="{ showModal:false, handleKeydown(event){
    if(event.keyCode == 13)
    {
        this.showModal = true;
    }
    if(event.keyCode == 27)
    {
        this.showModal = false;
        $wire.search = '';
    }
    }
 }">
    <button @click="showModal = true" type="button"
            class="flex space-x-3 py-2 px-4 my-2 outline-none border-b border-slate-200"
            @keydown.window="handleKeydown">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
             class="w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round"
                  d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z"/>
        </svg>
        <span>search</span>
    </button>
    @teleport('body')
    <div x-show="showModal" x-trap="showModal" class="relative z-10" aria-labelledby="modal-title" role="dialog"
         aria-modal="true">
        <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>
        <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
            <div class="flex justify-center p-4 sm:p-0">
                <div
                    class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg">
                    <div @click.outside="showModal = false" class="bg-white px-4 pb-4 pt-5 sm:p-6 sm:pb-4">
                        <div class="w-full px-1 pt-1" x-data="{
                                searchPosts(event){
                                    document.getElementById('searchInput').focus();
                                }
                            }">
                            <input wire:model.live.throttle.150ms="search" type="text" id="searchInput"
                                   class="block w-full flex-1 py-2 px-3 mt-2 outline-none border-none rounded-md bg-slate-100"
                                   placeholder="Start Typing..."/>
                            <div class="mt-2 w-full overflow-hidden rounded-md bg-white">
                                @foreach($results as $result)
                                    <div class="cursor-pointer py-2 px-3 hover:bg-slate-100">
                                        <p class="text-sm font-medium text-gray-600">{{ $result->title }}</p>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endteleport
</div>

