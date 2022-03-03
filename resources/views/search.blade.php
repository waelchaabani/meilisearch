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
                                                            <option value="{{ $category->id }}" {{$categoryId == $category->id ? 'selected' : '' }}>
                                                                {{$category->name}} 
                                                            </option>
                                                            @endforeach
                                                        
                                                            </select>

                                                    <x-jet-input id="query" name="query" type="search" placeholder="Search" class="block w-full" value="{{ request()->get('query') }}" />
                                                    <x-jet-button>Search</x-jet-button>

                                                    </form> 
                                                        <x-jet-button  ><a href="{{ route('posts.add') }}" >Add Post</x-jet-button>



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
                                                                    <th scope="col" class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">title</th>
                                                                    <th scope="col" class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">body</th>
                                                                    <th scope="col" class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">category</th>
                                                                    <th class="px-6 py-3 text-sm text-left text-gray-500 border-b border-gray-200 bg-gray-50" colspan="3"> Action</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody class="bg-white divide-y divide-gray-200">
                                                                    <tr>
                                                                    @foreach ($results as $result)
                                                                    
                                                                    <td class="px-6 py-4 whitespace-nowrap">{{ $result->title }}</td>
                                                                    <td class="px-6 py-4 whitespace-nowrap">{{ $result->body }}</td>
                                                                    <td class="px-6 py-4 whitespace-nowrap">{{ $result->category->name ?? '' }}</td>
                                                                    <td class="text-sm font-medium leading-5 text-center whitespace-no-wrap border-b border-gray-200 ">
                                    <a href="{{ route('posts.edit',$result->id) }}" class="text-indigo-600 hover:text-indigo-900">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                    </svg>
                                    </a>

                                </td>
                                <td class="text-sm font-medium leading-5 text-center whitespace-no-wrap border-b border-gray-200 ">
                                    <a href="{{ route('posts.view',$result->id) }}" class="text-gray-600 hover:text-gray-900">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                    </svg>
                                    </a>

                                </td>
                                <td class="text-sm font-medium leading-5 whitespace-no-wrap border-b border-gray-200 ">
                                    <a href="{{ route('posts.delete',$result->id) }}" id="delete"><svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-red-600 hover:text-red-800"
                                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                    </svg></a>

                                </td>

                                    </tr>
                                    @endforeach
                                </tbody>                                
                            </table>
                            {{$results->links()}}
                                                            
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
