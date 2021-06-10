<x-app-layout>
    <div>
        @if (!empty($keyword))
            <div class="m-auto w-5/6 h-auto shadow-md bg-white rounded-md mt-3 flex justify-center">
                <div class="grid grid-cols-1 gap-4 p-5">    
                    <div class="flex items-center justify-start w-auto h-8 px-2 text-yellow-800 border-l-4 border-yellow-900 bg-yellow-100">
                        <span class="mx-2">{{__('app.keyword')}} :  <span class="text-yellow-900">{{$keyword}}</span></span>
                    </div>
                </div>
            </div><!--End-->
        @endif
        <div class="m-auto w-5/6 h-auto shadow-md bg-white rounded-md mt-3 flex justify-center">
            <div class="grid grid-cols-1 gap-y-4 md:grid-cols-4 md:gap-4 p-5">    
                @forelse ($projects as $project)   
                    <div class="cursor-pointer">
                        <img class="w-56 shadow-md rounded-lg rounded-b-none h-40" src="{{ $project->image_path}}" alt="{{ $project->name}}"/>
                        <div class="w-56 bg-white shadow-md h-auto rounded-b-lg">
                            <div class="p-2 px-4">
                                <h1 class="text-gray-600 text-xl ">{{ $project->name }}</h1>
                                <p class="text-gray-400">{!! Illuminate\Support\str::limit($project->desc, 50 ,"...")  !!}
                                    <a href="#" class="text-blue-600">Show</a>
                                </p>
                            </div>
                            <div class="bg-gray-100 h-12 p-2 w-full">
                                <p class="text-xl text-center text-gray-400">{{ $project->category->title }}</p>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="flex items-center justify-start w-auto h-8 px-2 text-blue-800 border-l-4 border-blue-900 bg-blue-100">
                        <svg class="fill-current text-blue-900 mx-2" width="1em" height="1em" width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-exclamation-circle-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8 4a.905.905 0 0 0-.9.995l.35 3.507a.552.552 0 0 0 1.1 0l.35-3.507A.905.905 0 0 0 8 4zm.002 6a1 1 0 1 0 0 2 1 1 0 0 0 0-2z"/>
                        </svg>
                        {{__('app.empty')}}
                    </div>
                @endforelse
            </div>
        </div><!--End-->
    </div>
</x-app-layout>
