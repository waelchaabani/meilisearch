<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Search') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form action="/search" method="get" class="space-y-4 mb-6 flex items-baseline">
                    @csrf
                            <select name="category_id" id="category_id">
                            <option value="">Any Category</option>
                            @foreach( $categories as $category)
                            <option value="{{ $category->id }}" {{ request()->get('category_id') === $category->id ? 'selected=""' : '' }}>
                                {{$category->name}} 
                            </option>
                            @endforeach
                        
                            </select>

                    <x-jet-input id="query" name="query" type="search" placeholder="Search" class="block w-full" value="{{ request()->get('query') }}" />
                    <x-jet-button>Search</x-jet-button>
                   
                    </form> 


                    @if($results)
                       <div  class="space-y-4">
                           @if($results->count() > 0)

                           <em> Found {{ $results->count() }} results</em>

                            <div class="flex flex-col">
                            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                           
                                <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                             
                                    <tr>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">title</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">body</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">category</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    <tr>
                                    @foreach ($results as $result)
                                    
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $result->title }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $result->body }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $result->category->name ?? '' }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                               
                                
                                @else
                                <p> No results</p>
                                @endif
                                </div>
                    @endif
              </div>    
            </div>
        </div>
    </div>
</x-app-layout>
