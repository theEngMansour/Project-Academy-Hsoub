<x-app-layout>
    <div class=" min-h-screen flex flex-col items-center justify-center "> 
        <div class="grid mt-8  gap-8 grid-cols-1 md:grid-cols-2 xl:grid-cols-2">
            @forelse ($projects as $project)   
                <div class="flex flex-col">
                    <div class="bg-white shadow-md  rounded-3xl p-4">
                        <div class="flex-none lg:flex">
                            <div class=" h-full w-full lg:h-48 lg:w-48   lg:mb-0 mb-3">
                                <img src="{{ $project->image_path}}" alt="{{ $project->name}}"
                                    class=" w-full  object-scale-down lg:object-cover  lg:h-48 rounded-2xl">
                            </div>
                            <div class="flex-auto ml-3 justify-evenly py-2">
                                <div class="flex flex-wrap ">
                                    <div class="w-full flex-none text-xs text-blue-700 font-medium ">
                                        {{ $project->category->title }}
                                    </div>
                                    <h2 class="flex-auto text-lg font-medium">{{ Illuminate\Support\str::limit($project->name, 10)}}</h2>
                                </div>
                                <p class="mt-3"></p>
                                <div class="flex py-4  text-sm text-gray-600">
                                    <div class="flex-1 inline-flex items-center">
                                        <p class="">{!! Illuminate\Support\str::limit($project->desc, 20 ,"...")  !!}</p>
                                    </div>
                                    <div class="flex-1 inline-flex items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                        <p class="">{{ $project->created_at->diffForhumans()}}</p>
                                    </div>
                                </div>
                                <div class="flex p-4 pb-2 border-t border-gray-200 "></div>
                                <div class="flex space-x-3 text-sm font-medium">
                                <a href="{{ route('project.show',['slug'=>$project->slug,'id'=>$project->id]) }}">
                                    <button
                                        class="mb-2 md:mb-0 focus:outline-none  bg-gray-900 px-5 py-2 shadow-sm tracking-wider text-white rounded-full hover:bg-gray-800"
                                        type="button" aria-label="like">{{__('app.show')}}</button>
                                </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
            <div class="flex flex-col">
                <div class="bg-white shadow-md  rounded-3xl p-4">
                    <div class="alert flex flex-row items-center bg-blue-200 p-5 rounded border-b-2 border-blue-300">
                        <div class="alert-icon flex items-center bg-blue-100 border-2 border-blue-500 justify-center h-10 w-10 flex-shrink-0 rounded-full">
                            <span class="text-blue-500">
                                <svg fill="currentColor"
                                    viewBox="0 0 20 20"
                                    class="h-6 w-6">
                                    <path fill-rule="evenodd"
                                        d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </span>
                        </div>
                        <div class="alert-content ml-4">
                            <div class="alert-title font-semibold text-lg text-blue-800">
                            {{__('app.empty')}}
                            </div>
                        </div>
                    </div>
                </div>
            @endforelse
        </div>
    </div>
    <div dir="ltr" class="w-full m-auto ltr text-center px-20 mt-4">
        {{$projects->links()}}
    </div>
    <br>
</x-app-layout>