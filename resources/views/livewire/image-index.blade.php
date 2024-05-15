
<div class="max-w-7xl mx-auto flex">
    <div class="w-7/12">
        <div class="grid grid-cols-2 md:grid-cols-3">
            @foreach($this->images as $image)
                <div class="flex flex-col justify-center items-center bg-slate-50 rounded-md p-2 gap-4 mt-3 mx-3">
                    <img class="h-36 w-36 rounded-lg" src="storage/{{ $image->path }}" alt="{{ $image->name }}">
                    <div class="mt-2">
                        <x-primary-button wire:click="download({{ $image->id }})">Download</x-primary-button>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <div class="flex items-center justify-center w-4/12">
        <form wire:submit="save">
            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="file_input">Upload file</label>
            <input wire:model="photos" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" id="file_input" type="file" multiple>
            @if($photos)
                @foreach($photos as $photo)
                    <img class="w-18 h-18 rounded-md" src="{{ $photo->temporaryUrl() }}">
                @endforeach
            @endif
            @error('photos.*')
            <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
            @error('photos')
            <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
            <button type="submit" class="mt-3 text-white bg-gray-800 hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700">Upload</button>
        </form>
    </div>
</div>
