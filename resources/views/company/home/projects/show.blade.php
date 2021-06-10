<x-app-layout> 
    <!---------------------------------------------------------------------------------------------
        Show Project
    --------------------------------------------------------------------------------------------->
    <div class="m-auto w-2/4 h-auto shadow-md bg-white rounded-md mt-3 flex flex-col justify-center">
        <img class="w-full m-auto rounded-lg rounded-b-none" src="{{ $project->image_path}}" alt="{{ $project->name}}"/>
        <div class="w-2/4 m-auto bg-white h-auto rounded-b-lg">
            <div class="p-2 px-4">
                <div class="flex">
                    <h1 class="text-gray-600 text-xl">{{ $project->name }}</h1>
                    <h1 class="mx-2 bg-blue-600 text-center text-white p-1 rounded-sm">{{ $project->category->title }}</p>
                </div>
                <p class="text-gray-400">{{ $project->desc }}</p>
            </div>
        </div>
        <br>
    </div>
    <!---------------------------------------------------------------------------------------------
        End Show Project
    --------------------------------------------------------------------------------------------->

    <!---------------------------------------------------------------------------------------------
        Show progress with Review
    --------------------------------------------------------------------------------------------->
    <div class="m-auto w-2/4 h-auto shadow-md bg-white mt-3 flex flex-col justify-center">
        <div class="p-5 flex items-left ml-3 justify-center">
            <div class="mr-2 w-2/4">
                <div class="text-right">
                   {{__('app.service')}}
                </div>
                <div class="text-right">
                    <progress value="{{$service_rating}}" class="w-full" max="5" title="{{ round($service_rating,1) }}"></progress>
                </div>
                <div class="text-right">
                   {{__('app.quality')}}
                </div>
                <div class="text-right">
                    <progress value="{{ $quality_rating }}" class="w-full" max="5" title="{{ round($quality_rating,1) }}"></progress>
                </div>
            </div>  
            <div class="bg-white col-span-2 mx-2">
                <div class="text-center flex flex-col items-center">
                    <h1 class="text-green-900 font-bold">
                        {{ round($total,1) }}
                    </h1>
                    <div dir="rtl" class="flex">
                        @for($i=1; $i<=5; $i++)
                            @if($i <= $total)
                                <svg class="fill-current text-yellow-500" width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-star-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.283.95l-3.523 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                </svg>
                            @elseif($i == round($total)) 
                                <svg class="fill-current text-yellow-500" width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-star-half" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M5.354 5.119L7.538.792A.516.516 0 0 1 8 .5c.183 0 .366.097.465.292l2.184 4.327 4.898.696A.537.537 0 0 1 16 6.32a.55.55 0 0 1-.17.445l-3.523 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256a.519.519 0 0 1-.146.05c-.341.06-.668-.254-.6-.642l.83-4.73L.173 6.765a.55.55 0 0 1-.171-.403.59.59 0 0 1 .084-.302.513.513 0 0 1 .37-.245l4.898-.696zM8 12.027c.08 0 .16.018.232.056l3.686 1.894-.694-3.957a.564.564 0 0 1 .163-.505l2.906-2.77-4.052-.576a.525.525 0 0 1-.393-.288L8.002 2.223 8 2.226v9.8z"/>
                                </svg>
                            @else
                                <svg class="fill-current text-gray-400" width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-star-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.283.95l-3.523 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                </svg>
                            @endif
                        @endfor
                    </div>
                    <div>
                        <span>{{ __('app.appraisals')}}</span>
                        <span class="text-yellow-500 font-bold">{{ $project->reviews_count }}</span> 
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!---------------------------------------------------------------------------------------------
        End Show progress with Review
    --------------------------------------------------------------------------------------------->

    <!---------------------------------------------------------------------------------------------
        Show Review
    --------------------------------------------------------------------------------------------->
    <div class="m-auto w-2/4 h-auto shadow-md bg-white mt-3 flex flex-col justify-center">
        <div class="p-5 flex flex-col items-left ml-3 justify-left">
            @foreach($project->reviews as $review)
                <div class="my-2">
                    <div class="flex">
                        <div class="h-10 w-10 rounded-full bg-gray-400 mb-1"></div>
                        <div class="mx-2">
                            <h1>{{ $review->user->name }}</h1>
                            <h5 class="font-light text-gray-400">{{ $review->created_at->diffForHumans() }}</h5>
                            <p>{{ $review->review }}</p>
                            <div class="flex my-2">
                                @for($i=1; $i<=5; $i++)
                                    @if($i <= $review->avgRating())
                                        <svg class="fill-current text-yellow-500" width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-star-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.283.95l-3.523 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                        </svg>
                                    @elseif($i == round($review->avgRating())) 
                                        <svg class="fill-current text-yellow-500" width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-star-half" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" d="M5.354 5.119L7.538.792A.516.516 0 0 1 8 .5c.183 0 .366.097.465.292l2.184 4.327 4.898.696A.537.537 0 0 1 16 6.32a.55.55 0 0 1-.17.445l-3.523 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256a.519.519 0 0 1-.146.05c-.341.06-.668-.254-.6-.642l.83-4.73L.173 6.765a.55.55 0 0 1-.171-.403.59.59 0 0 1 .084-.302.513.513 0 0 1 .37-.245l4.898-.696zM8 12.027c.08 0 .16.018.232.056l3.686 1.894-.694-3.957a.564.564 0 0 1 .163-.505l2.906-2.77-4.052-.576a.525.525 0 0 1-.393-.288L8.002 2.223 8 2.226v9.8z"/>
                                        </svg>
                                    @else
                                        <svg class="fill-current text-gray-400" width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-star-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.283.95l-3.523 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                        </svg>
                                    @endif
                                @endfor 
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <!---------------------------------------------------------------------------------------------
        End Show Review
    --------------------------------------------------------------------------------------------->

    <!---------------------------------------------------------------------------------------------
        Add Review
    --------------------------------------------------------------------------------------------->
    <div id="review-div" class="m-auto w-2/4 h-auto shadow-md bg-white mt-3 flex flex-col justify-center">
        @if(session('success'))
            <x-alert color="blue" message="{{ session('success') }}"/>
        @elseif(session('fail'))
            <x-alert color="red" message="{{ session('fail') }}"/>
        @endif  
        @auth
            <form class="form-contact" action="{{ route('review.store') }}" method="post"> 
                @csrf
                <div class="grid grid-cols-2 mt-5 m-auto">
                    <div class="flex justify-center">
                        <div class="rating">
                            <h5> {{__('app.service')}}</h5>
                            <input required type="radio" id="rating_service1" name="service_rating" value="5" /><label for="rating_service1" title="ممتاز"></label>
                            <input required type="radio" id="rating_service2" name="service_rating" value="4" /><label for="rating_service2" title="جيد جدًا"></label>
                            <input required type="radio" id="rating_service3" name="service_rating" value="3" /><label for="rating_service3" title="متوسط"></label>
                            <input required type="radio" id="rating_service4" name="service_rating" value="2" /><label for="rating_service4" title="سيء"></label>
                            <input required type="radio" id="rating_service5" name="service_rating" value="1" /><label for="rating_service5" title="سيء للغاية"></label>
                        </div>
                    </div>
                    <div class="flex justify-center">
                        <div class="rating">
                            <h5>{{__('app.quality')}}</h5>
                            <input required type="radio" id="rating_quality1" name="quality_rating" value="5" /><label for="rating_quality1" title="ممتاز"></label>
                            <input required type="radio" id="rating_quality2" name="quality_rating" value="4" /><label for="rating_quality2" title="جيد جدًا"></label>
                            <input required type="radio" id="rating_quality3" name="quality_rating" value="3" /><label for="rating_quality3" title="متوسط"></label>
                            <input required type="radio" id="rating_quality4" name="quality_rating" value="2" /><label for="rating_quality4" title="سيء"></label>
                            <input required type="radio" id="rating_quality5" name="quality_rating" value="1" /><label for="rating_quality5" title="سيء للغاية"></label>
                        </div>
                    </div>
                </div>
                <div class="p-5 flex flex-col items-center justify-center">
                    <input type="hidden" name="project_id" value="{{$project->id}}">
                    <textarea class="rounded-lg w-2/4 h-24 mx-2 border border-gray-200" name="review"></textarea>
                    <button type="submit" class="w-52 h-10 mt-5 shadow-md bg-gray-700 focus:outline-none text-white rounded-lg flex justify-center items-center p-1">
                        {{__('app.add.comment')}}
                    </button>
                </div>
            </form>
        @endauth
    </div>
    <!---------------------------------------------------------------------------------------------
        End Add Review
    --------------------------------------------------------------------------------------------->
    <br>
</x-app-layout>