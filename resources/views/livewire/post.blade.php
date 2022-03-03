    @php


    $categories = DB::table('categories')->get();


    @endphp


    <x-app-layout>
                                        <x-slot name="header">
                                            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                                                {{ __('Add Posts') }}
                                            </h2>
                                        </x-slot>
    <div>
            <div class="w-full px-16 py-20 mt-6 overflow-hidden bg-white rounded-lg lg:max-w-4xl">
            <div class="w-full px-6 py-4 bg-white rounded shadow-md ring-1 ring-gray-900/10">
                <form wire:submit.prevent="savePost">
    <div class="form-group">
        <label for="exampleInputName">Name</label>
        <input type="text" class="form-control" id="exampleInputName" placeholder="Enter name" wire:model="title">
        @error('title') <span class="text-danger">{{ $message }}</span> @enderror
    </div>
  
    <div class="form-group">
        <label for="exampleInputEmail">Email</label>
        <input type="text" class="form-control" id="exampleInputEmail" placeholder="Enter name" wire:model="body">
        @error('body') <span class="text-danger">{{ $message }}</span> @enderror
    </div>
  
    <div class="form-group">
        <label for="exampleInputbody">Body</label>
        <textarea class="form-control" id="exampleInputbody" placeholder="Enter Body" wire:model="category_id"></textarea>
        @error('category_id') <span class="text-danger">{{ $message }}</span> @enderror
    </div>
  
    <button type="submit" class="btn btn-primary">Save Contact</button>
</form>
            </div>
            </div>
        </div>
        </x-app-layout>
