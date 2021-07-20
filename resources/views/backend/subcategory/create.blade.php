@extends('layouts.backendtemplate')
@section('content')

  <div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Subcategory Create Form</h1>

    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary d-inline-block">Create subcategory form data</h6>
        <a href="{{route('subcategory.index')}}" class="btn btn-outline-primary float-right"><i class="fa fa-chevron-left" aria-hidden="true"></i></a>
      </div>
      <div class="card-body">
        {{-- Must show related input errors --}}
        {{-- @if ($errors->any())
          <div class="alert alert-danger">
            <ul>
              @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
        @endif --}}
        <form method="post" action="{{route('subcategory.store')}}" enctype="multipart/form-data">
          @csrf
          <div class="form-group row {{ $errors->has('name') ? 'has-error' : '' }}">
            <label for="inputName" class="col-sm-2 col-form-label">Name</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="inputName" name="name">
              <span class="text-danger">{{ $errors->first('name') }}</span>
            </div>
          </div>
          <div class="form-group row">
            <label for="inputCategory" class="col-sm-2 col-form-label">Category</label>
            <div class="col-sm-10">
              <select name="category_id" class="form-control" id="category_id">
                    <option value="" selected>Choose Category</option>
                        @foreach ($categories as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </option>
              </select>
              @if ($errors->any())
                  @foreach ($errors->get('category_id') as $error)
                      <p class="text-danger pt-2">{{$error}}</p>
                  @endforeach
              @endif
            </div>
          </div>
          <div class="row mb-3">
            <div class="col-sm-10 offset-sm-2">
              <button type="submit" class="btn btn-primary">Save</button>
            </div>
          </div>
        </form>
      </div>
    </div>

  </div>
  
@endsection