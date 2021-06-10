@extends('company.admin.layouts.template')
@section('content')
  <!-- Start Code Create -->
  <div class="row">
      <div class="w-100 bg-admin d-flex justify-content-center">
          <table class="table table-borderless w-75 px-3">
              <thead>
                  <tr Wclass="w-100 mt-4">
                      <th colspan="1">
                          @include('alerts.success')
                          @include('alerts.danger')
                          @if (count($errors))
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
<form class="m-auto mt-4" method="POST" action="{{ route('categories.store')}}">
    @csrf
    <div class="row">
        <div class="w-100 d-flex justify-content-center bg-admin">
            <table class="table table-borderless w-75 px-3 bg-white mt-1 rounded-sm shadow-sm mt-4">
            <thead>
                <tr style="background-color: #f5f7fa;color:#7d858d" class="w-100">
                    <th scope="col">{{ __('app.class.title') }}</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                <td scope="row">
                    <input type="text" name="title" class="form-control w-50" placeholder="{{ __('app.class.title') }}" id="nameProject">
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
                    <button style="background-color: #5898d9;color:#fff" class="btn float-left rounded-sm" data-toggle="modal" data-target="#staticBackdrop">{{ __('app.create') }}</button></th>
                    </th>
                </tr>
            </thead>
            </table>
        </div>
    </div>
</form>
  <!--Ends Code Create-->
  <!--Start Code Desplay-->
  <div class="row">
    <div class="w-100 d-flex justify-content-center bg-admin vh-100">
        <table class="table table-borderless w-75 px-3 bg-white mt-1 rounded-sm shadow-sm">
            <thead>
            <tr style="background-color: #f5f7fa;color:#7d858d" class="w-100">
                <th scope="col">{{ __('app.number') }}</th>
                <th scope="col">{{ __('app.class') }}</th>
                <th colspan="3"></th>
            </tr>
            </thead>
            <tbody>
                @forelse ($categories as $categorie)
                    <tr>
                        <th scope="row fe">{{ $categorie->id }}</th>
                        <td>{{ $categorie->title }}</td>
                        <td>                                
                            <form action="{{ route('categories.destroy',$categorie->id) }}" method="POST">
                            @csrf
                            @method("DELETE")
                            <button type="submit" class="btn mt-2 custom-btn-primary">
                                <svg style="fill: #b4b9be" width="1.5em" height="1.5em" aria-hidden="true" focusable="false" data-prefix="far" data-icon="trash-alt" class="svg-inline--fa fa-trash-alt fa-w-14" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path d="M268 416h24a12 12 0 0 0 12-12V188a12 12 0 0 0-12-12h-24a12 12 0 0 0-12 12v216a12 12 0 0 0 12 12zM432 80h-82.41l-34-56.7A48 48 0 0 0 274.41 0H173.59a48 48 0 0 0-41.16 23.3L98.41 80H16A16 16 0 0 0 0 96v16a16 16 0 0 0 16 16h16v336a48 48 0 0 0 48 48h288a48 48 0 0 0 48-48V128h16a16 16 0 0 0 16-16V96a16 16 0 0 0-16-16zM171.84 50.91A6 6 0 0 1 177 48h94a6 6 0 0 1 5.15 2.91L293.61 80H154.39zM368 464H80V128h288zm-212-48h24a12 12 0 0 0 12-12V188a12 12 0 0 0-12-12h-24a12 12 0 0 0-12 12v216a12 12 0 0 0 12 12z"></path></svg>
                            </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td class="text-danger">{{ __('app.no.class') }}</td>
                    </tr>
                @endforelse
            </tbody>  
            <tfoot>
                <td> {{$categories->links('pagination::simple-default')}}</td>
              </tfoot> 
        </table>
    </div>
  </div>
  
  <!--End Code Desplay--> 
@endsection
