@extends('company.admin.layouts.template')
@section('content')
<div>
    <div class="row">
        <div class="w-100 bg-admin d-flex justify-content-center">
            <table class="table table-borderless w-75 px-3">
                <thead>
                    <tr Wclass="w-100 mt-4">
                        <th colspan="1">
                            @include('alerts.success')
                            @include('alerts.danger')
                        </th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
    <form action="{{ route('project.update',$project->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('put')
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
                            <td scope="row">
                                <select style="width: 200px" class="custom-select" name="category_id">
                                    <option selected>{{ __('app.category_id.required') }}</option>
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}" {{ $project->category_id == $category->id ? 'selected': '' }}> {{$category->title}}</option>
                                    @endforeach
                                </select>
                            </td>
                            <td scope="row">
                                <input type="text" name="name" class="form-control" placeholder="{{ __('app.project.name') }}" id="nameProject" value="{{ $project->name }}">
                            </td>
                            <td scope="row">
                                <textarea type="text" name="desc" class="form-control h-25" placeholder="{{ __('app.project.desc') }}" id="decProject">{{ $project->desc }}</textarea>
                            </td>
                            <td scope="row">
                                <div class="custom-file">
                                    <input type="file" name="image_path" class="custom-file-input" id="customFile">
                                    <label class="custom-file-label" for="customFile"></label>
                                </div>
                                <div class="col-lg-4 text-center mb-5 mt-4">
                                    <img class="border border-gray-300 rounded-md" src="{{ $project->image_path }}" width="200">
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
                                <button wire:click="store" style="background-color: #5898d9;color:#fff" class="btn float-left rounded-sm" data-toggle="modal" data-target="#staticBackdrop">{{ __("app.edit") }}</button></th>
                            </tr>
                    </thead>
                </table>
            </div>
        </div>
    </form>
    <!--Ends Code Create-->
</div>   
@endsection
 