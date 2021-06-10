<x-app-layout>
    <form method="post" action="{{ route('search.froms') }}">
        @csrf
        <div class="grid grid-cols-1 gap-y-5 md:grid-cols-3 mt-4 mt"> 
            <div class="m-auto w-52 h-10 shadow-md bg-white rounded-lg flex justify-center items-center p-1">
                <svg class=" fill-current text-gray-400 mx-2" width="1.5em" height="1.5em" viewBox="0 0 102 102" version="1.1" xmlns="http://www.w3.org/2000/svg">
                    <g transform="scale(0.1992)">
                    <path transform="rotate(180) scale(-1,1) translate(0,-512)" d="M203 213c53 0 96 43 96 96s-43 96 -96 96s-96 -43 -96 -96s43 -96 96 -96zM331 213l106 -106l-32 -32l-106 106v17l-6 6c-24 -21 -56 -33 -90 -33c-77 0 -139 61 -139 138s62 139 139 139s138 -62 138 -139c0 -34 -12 -66 -33 -90l6 -6h17z"/>
                    </g>
                </svg>
                <input name="keyword" class="w-full h-full border-0 rounded-md focus:outline-none focus:ring-0 text-gray-400" placeholder="{{__('app.search')}}"  type="Search">
            </div>
            <div class="m-auto w-52 lg:w-80 h-10 shadow-md bg-white rounded-lg flex justify-center items-center p-1">
                <select name="category" class="w-full border-0 rounded-md focus:outline-none focus:ring-0 text-gray-400">
                    <option selected>{{ __('app.category_id.required') }}</option>
                    @foreach($categories as $category)
                        <option value="{{$category->id}}"> {{$category->title}}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" autocomplete="off" class="m-auto  focus:outline-none w-52 h-10 shadow-md bg-blue-400 text-white rounded-lg flex justify-center items-center p-1">
                {{__('app.search')}}
            </button>
        </div>
    </form>
    <div x-data="{isOpen:false}">
        <div x-data="{isOpen:false,name:'',desc:'',category:''}"  class="m-auto w-5/6 h-auto shadow-md bg-white rounded-md mt-3 flex justify-center">
            <div class="grid grid-cols-1 gap-y-4 md:grid-cols-4 md:gap-4 p-5">    
                @forelse ($projects as $project)   
                    @php
                        if(Config::get('languages')[App::getLocale()]=="English")
                        {
                            $name     = $tr->setSource('ar')->setTarget('en')->translate($project->name);        
                            $desc     = $tr->setSource('ar')->setTarget('en')->translate($project->desc);
                            $category = $tr->setSource('ar')->setTarget('en')->translate($project->category->title);
                        }
                        else
                        {
                            $name     = $tr->setSource('en')->setTarget('ar')->translate($project->name);
                            $desc     = $tr->setSource('en')->setTarget('ar')->translate($project->desc);
                            $category = $tr->setSource('en')->setTarget('ar')->translate($project->category->title);
                        }
                    @endphp
                    <div @click="isOpen = true , name = '{{ $name }}' , desc = '{!! Illuminate\Support\str::limit($desc, 50 ,"...")  !!}' , category = '{{ $category }}'"  class="cursor-pointer">
                        <img class="w-56 shadow-md rounded-lg h-40" src="{{ $project->image_path}}" alt="{{ $project->name}}"/>
                    </div>  
                @empty
                    <div class="flex items-center justify-start w-auto h-8 px-2 text-blue-800 border-l-4 border-blue-900 bg-blue-100">
                        <svg class="fill-current text-blue-900 mx-2" width="1em" height="1em" width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-exclamation-circle-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8 4a.905.905 0 0 0-.9.995l.35 3.507a.552.552 0 0 0 1.1 0l.35-3.507A.905.905 0 0 0 8 4zm.002 6a1 1 0 1 0 0 2 1 1 0 0 0 0-2z"/>
                        </svg>
                        {{__('app.empty')}}
                    </div>
                @endforelse
                @if (!empty($projects))
                    <a href="{{ route('project.index') }}">
                        <div class="bg-gray-50 text-gray-500 p-5 rounded-full h-20 w-20 flex items-center shadow-lg justify-center cursor-pointer">
                            {{__('app.show')}}
                        </div>
                    </a>
                @endif
            </div> 
            <div x-show="isOpen" class="absolute top-0 bottom-0 left-0 right-0 shadow-md flex justify-center bg-gray-700 bg-opacity-40 h-full"
                x-transition:enter="transition ease-out duration-200"
                x-transition:enter-start="transform opacity-0 scale-95"
                x-transition:enter-end="transform opacity-100 scale-100"
                x-transition:leave="transition ease-in duration-75"
                x-transition:leave-start="transform opacity-100 scale-100"
                x-transition:leave-end="transform opacity-0 scale-95">
                <div x-show="isOpen" @click.away="isOpen = false" class="w-96 h-52 bg-white m-auto shadow-lg rounded-lg">
                    <div class="flex justify-between px-6 py-2 text-right w-full h-12">
                        <button @click="isOpen = false" class="font-bold focus:outline-none text-xl text-black rounded-lg flex justify-center items-center p-1">&times;</button>
                    </div>
                    <div class="m-10 mt-2">
                        <h1 x-text="name" class="text-2xl"></h1>
                        <p  x-text="desc" class="font-light text-gray-700"></p>
                    </div>
                    <div class="bg-gray-100 h-12 p-2 w-full">
                        <p  x-text="category" class="text-xl text-center text-gray-400"></p>
                    </div>
                </div>
            </div>
        </div><!--End-->
    </div>
    <div class="m-auto w-5/6 h-auto bg-white rounded-md mt-3 flex flex-col items-center justify-center">
        <div class="rounded-full flex flex-col items-center justify-center mt-4">
            {{__('app.newsletter')}}
            <p>{{__('app.desc.newsletter')}}</p>
        </div>
        <div class="flex items-center justify-start mt-4 w-2/6 h-8 text-yellow-800 border-l-4 border-yellow-900 bg-yellow-100">
            <svg class="fill-current text-yellow-900 mx-4" width="1em" height="1em" viewBox="0 0 17 16" class="bi bi-exclamation-triangle-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5a.905.905 0 0 0-.9.995l.35 3.507a.552.552 0 0 0 1.1 0l.35-3.507A.905.905 0 0 0 8 5zm.002 6a1 1 0 1 0 0 2 1 1 0 0 0 0-2z"/>
            </svg>
            {{__('app.enter.email')}}
        </div>
        @if (session('success'))
            <x-alerts :success="session('success')"/>
        @endif
        @if (count($errors))
            @foreach ($errors->all() as $error)
                <x-alerts-errors :error="$error"/>
            @endforeach
        @endif
        <form action="{{ route('newsletter.store') }}" method="POST">
            @csrf
            <div class="p-5 rounded-full h-24 flex items-center justify-center">
                <input type="email" name="email" placeholder="{{__('app.Emails')}}" class="rounded-lg h-10 mx-2 border border-gray-200">
                <button type="submit" class="w-52 h-10 shadow-md bg-gray-700 focus:outline-none text-white rounded-lg flex justify-center items-center p-1">
                    {{__('app.subscription')}}
                </button>
            </div>
        </form>
    </div><!--End-->
    <br>
</x-app-layout>