<div>
    <!-- Start Code Create -->
    <div class="row">
        <div class="w-100 bg-admin d-flex justify-content-center">
            <table class="table table-borderless w-75 px-3">
                <thead>
                    <tr class="w-100 mt-4">
                        <th colspan="1">
                            @include('alerts.success')
                            @include('alerts.danger')
                            @if (count($errors))  {{-- علشان يفحص لي اذا كان في إخطاء ظهر تحذير علشان مايكون دائم ظاهر --}}
                            <div style="font-size: 12px;font-weight: normal" class="alert alert-danger text-right">
                              <ul>
                                  @foreach ($errors->all() as $error)
                                    <li>{{$error}}</li>
                                  @endforeach
                              </ul>
                            </div>
                            @endif
                        </th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
    <div class="row">
        <div class="w-100 d-flex justify-content-center bg-admin">
            <table class="table table-borderless w-75 px-3 bg-white mt-1 rounded-sm shadow-sm mt-4">
                <thead>
                    <tr style="background-color: #f5f7fa;color:#7d858d" class="w-100">
                        <th scope="col">{{ __('app.class') }}</th>
                        <th scope="col">{{ __('app.project.name') }}</th>
                        <th scope="col">{{ __('app.project.desc') }}</th>
                        <th scope="col">{{ __('app.project.images') }}</th>
                        <th colspan="3"></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td  scope="row">
                            <select  style="width: 200px" class="custom-select" wire:model="category_id">
                                <option selected>{{ __('app.category_id.required') }}</option>
                                @foreach($categories as $category)
                                    <option value="{{$category->id}}"> {{$category->title}}</option>
                                @endforeach
                            </select>
                        </td>
                        <td scope="row">
                            <input type="text" wire:model="name" class="form-control" placeholder="{{ __('app.project.name') }}" id="nameProject">
                        </td>
                        <td scope="row">
                            <textarea type="text" wire:model="desc" class="form-control h-25" placeholder="{{ __('app.project.desc') }}" id="decProject"></textarea>
                        </td>
                        <td scope="row">
                            <div class="custom-file">
                                <input type="file" wire:model="image_path" class="custom-file-input" id="customFile">
                                <label class="custom-file-label" for="customFile"></label>
                            </div>
                            <div class="col-lg-4 text-center mb-5 mt-4">
                                @if ($image_path)
                                    <img class="border border-gray-300 rounded-md" src="{{ $image_path->temporaryUrl() }}" alt="" width="200">
                                @endif
                            </div>  
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div> 
    <div class="row">
        <div class="w-100 bg-admin d-flex justify-content-center">
            <table class="table table-borderless w-75 px-3">
                <thead>
                    <tr Wclass="w-100 mt-4">
                        <th colspan="1">
                            <button wire:click="store" style="background-color: #5898d9;color:#fff" class="btn float-left rounded-sm" data-toggle="modal" data-target="#staticBackdrop">{{ __('app.create') }}</button></th>
                        </tr>
                </thead>
            </table>
        </div>
    </div>
    <!--Ends Code Create-->

    <!--Start Code Desplay-->
    <div class="row">
        <div class="w-100 d-flex justify-content-center bg-admin ">
            <table class="table table-borderless w-75 px-3 bg-white mt-1 rounded-sm shadow-sm">
                <thead>
                    <tr style="background-color: #f5f7fa;color:#7d858d" class="w-100">
                        <th scope="col">{{ __('app.number') }}</th>
                        <th scope="col">{{ __('app.class') }}</th>
                        <th scope="col">{{ __('app.project.name') }}</th>
                        <th scope="col">{{ __('app.project.desc') }}</th>
                        <th colspan="3"></th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($projects as $project )
                        <tr>
                            <th scope="row fe">{{ $project->id }}</th>
                            <td>{{ $project->category->title }}</td>
                            <td>{{ $project->name }}</td>
                            <td>{{ Illuminate\Support\str::limit($project->desc, 30 ,"...")  }}</td>
                            <td>

                            </td>
                            <td>
                                <a href="{{ route('project.show',['slug'=>$project->slug,'id'=>$project->id]) }}" class="btn mt-2">
                                    <svg style="fill: #b4b9be" width="1.5em" height="1.5em" aria-hidden="true" focusable="false" data-prefix="far" data-icon="eye" class="svg-inline--fa fa-eye fa-w-18" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path d="M288 144a110.94 110.94 0 0 0-31.24 5 55.4 55.4 0 0 1 7.24 27 56 56 0 0 1-56 56 55.4 55.4 0 0 1-27-7.24A111.71 111.71 0 1 0 288 144zm284.52 97.4C518.29 135.59 410.93 64 288 64S57.68 135.64 3.48 241.41a32.35 32.35 0 0 0 0 29.19C57.71 376.41 165.07 448 288 448s230.32-71.64 284.52-177.41a32.35 32.35 0 0 0 0-29.19zM288 400c-98.65 0-189.09-55-237.93-144C98.91 167 189.34 112 288 112s189.09 55 237.93 144C477.1 345 386.66 400 288 400z"></path></svg>
                                </a>
                                <a href="{{ route('project.edit',$project->id) }}" class="btn mt-2 custom-btn-primary">
                                    <svg style="fill: #b4b9be" width="1.5em" height="1.5em" aria-hidden="true" focusable="false" data-prefix="far" data-icon="edit" class="svg-inline--fa fa-edit fa-w-18" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path  d="M402.3 344.9l32-32c5-5 13.7-1.5 13.7 5.7V464c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V112c0-26.5 21.5-48 48-48h273.5c7.1 0 10.7 8.6 5.7 13.7l-32 32c-1.5 1.5-3.5 2.3-5.7 2.3H48v352h352V350.5c0-2.1.8-4.1 2.3-5.6zm156.6-201.8L296.3 405.7l-90.4 10c-26.2 2.9-48.5-19.2-45.6-45.6l10-90.4L432.9 17.1c22.9-22.9 59.9-22.9 82.7 0l43.2 43.2c22.9 22.9 22.9 60 .1 82.8zM460.1 174L402 115.9 216.2 301.8l-7.3 65.3 65.3-7.3L460.1 174zm64.8-79.7l-43.2-43.2c-4.1-4.1-10.8-4.1-14.8 0L436 82l58.1 58.1 30.9-30.9c4-4.2 4-10.8-.1-14.9z"></path></svg>
                                </a>
                                <a class="btn mt-2 custom-btn-primary" data-toggle="modal" data-target="#delete">
                                    <svg style="fill: #b4b9be" width="1.5em" height="1.5em" aria-hidden="true" focusable="false" data-prefix="far" data-icon="trash-alt" class="svg-inline--fa fa-trash-alt fa-w-14" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path d="M268 416h24a12 12 0 0 0 12-12V188a12 12 0 0 0-12-12h-24a12 12 0 0 0-12 12v216a12 12 0 0 0 12 12zM432 80h-82.41l-34-56.7A48 48 0 0 0 274.41 0H173.59a48 48 0 0 0-41.16 23.3L98.41 80H16A16 16 0 0 0 0 96v16a16 16 0 0 0 16 16h16v336a48 48 0 0 0 48 48h288a48 48 0 0 0 48-48V128h16a16 16 0 0 0 16-16V96a16 16 0 0 0-16-16zM171.84 50.91A6 6 0 0 1 177 48h94a6 6 0 0 1 5.15 2.91L293.61 80H154.39zM368 464H80V128h288zm-212-48h24a12 12 0 0 0 12-12V188a12 12 0 0 0-12-12h-24a12 12 0 0 0-12 12v216a12 12 0 0 0 12 12z"></path></svg>
                                </a>
                                <x-delete action="{{ route('project.destroy',$project->id) }}"/>
                            </td>
                            <td>

                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td class="text-danger">لاتـوجد مشاريع</td>
                        </tr>
                    @endforelse
    
                </tbody>

            </table>

        </div>
        <tfoot>
            <td class="w-auto"> {{$projects->links('pagination::simple-default')}}</td>
        </tfoot>
    </div>
    <!--End Code Desplay--> 
</div> 


