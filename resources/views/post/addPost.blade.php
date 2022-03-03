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
            <form method="POST"  action="{{ route('posts.store') }}">
              <!-- Title -->
              @csrf

              <div>
                <label class="block text-sm font-bold text-gray-700" for="title">
                  Title
                  <span class="tx-danger">*</span>
                </label>

                <input wire:model="title"
                  class="block w-full mt-1 border-gray-300 rounded-md shadow-sm placeholder:text-gray-400 placeholder:text-right focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                  type="text" name="title" required="" placeholder="Enter Title" />
                  @error('title') <span class="error">{{ $message }}</span> @enderror
              </div>

              <!-- Description -->
              <div class="mt-4">
                <label class="block text-sm font-bold text-gray-700" for="body">
                  Description
                  <span class="tx-danger">*</span>
                </label>
                <textarea name="body" required="" wire:model="body"
                  class="block w-full mt-1 border-gray-300 rounded-md shadow-sm placeholder:text-gray-400 placeholder:text-right focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                  rows="4" placeholder="Enter Description"></textarea>
                  @error('body') <span class="error">{{ $message }}</span> @enderror

                  <label class="form-control-label">Category: <span class="tx-danger">*</span></label>
                  <select class="form-control select2" wire:model="category_id" data-placeholder="Choose country" name="category_id" required="">
                    <option label="Choose Category"></option>
                    @foreach($categories as $category)
                    <option value="{{ $category->id }}">  
                    {{$category->name}} 
</option>

                    @endforeach
                  </select>
                  @error('category_id')
                     <span class="error">{{ $message }}</span> 
                     @enderror
              </div>

              <div class="flex items-center justify-start mt-4 gap-x-2 space-x-2 ">
              <x-jet-button class="px-8 float-right mr-2" type="submit" value="submit" wire:click="PostStore"   ><a href="{{ route('posts.store') }}" >Create Post</x-jet-button>
                <x-jet-button class="px-8 float-right" type="submit" ><a href="" >Cancel</x-jet-button>

              </div>
            </form>
          </div>
        </div>
      </div>
    </x-app-layout>
