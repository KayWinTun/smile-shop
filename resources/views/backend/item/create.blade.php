@extends('layouts.backendtemplate')
@section('content')

  <div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Item Create Form</h1>

    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary d-inline-block">Create item form data</h6>
        <a href="{{route('item.index')}}" class="btn btn-outline-primary float-right"><i class="fa fa-chevron-left" aria-hidden="true"></i></a>
      </div>
      <div class="card-body">
        <form method="post" action="{{route('item.store')}}" enctype="multipart/form-data">
          @csrf
          <div class="form-group row {{ $errors->has('codeno') ? 'has-error' : '' }}">
            <label for="inputCodeno" class="col-sm-2 col-form-label"> Code No </label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="inputCodeno" name="codeno">
              <span class="text-danger">{{ $errors->first('codeno') }}</span>
            </div>
          </div>
          <div class="form-group row {{ $errors->has('photo') ? 'has-error' : '' }}">
            <label for="inputPhoto" class="col-sm-2 col-form-label">Photo</label>
            <div class="col-sm-5">
              <input type="file" id="inputPhoto" name="photo" class="d-block">
              <span class="text-danger">{{ $errors->first('photo') }}</span>
            </div>
          </div>
          <div class="form-group row {{ $errors->has('name') ? 'has-error' : '' }}">
            <label for="inputName" class="col-sm-2 col-form-label"> Name </label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="inputName" name="name">
              <span class="text-danger">{{ $errors->first('name') }}</span>
            </div>
          </div>
          <div class="form-group row">
            <label for="price_id" class="col-sm-2 col-form-label"> Price </label>
            <div class="col-sm-10">
                <ul class="nav nav-tabs">
                    <li class="nav-item one_tab">
                        <a class="nav-link" aria-current="page" href="#unit_price_id">Unit Price</a>
                        
                    </li>
                    <li class="nav-item two_tab">
                        <a class="nav-link" href="#discount_id">Discount</a>
                    </li>
                </ul>
            </div>
          </div>
          <div class="form-group row un_tab">
            <label for="unit_price_id" class="col-sm-2 col-form-label"></label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="unit_price_id" name="price">
                <span class="text-danger">{{ $errors->first('price') }}</span>
            </div>
        </div>
        <div class="form-group row d_tab">
            <label for="discount_id" class="col-sm-2 col-form-label"></label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="discount_id" name="discount">
            </div>
        </div>
        <div class="form-group row">
          <label for="description_id" class="col-sm-2 col-form-label"> Description </label>
          <div class="col-sm-10">
              <textarea name="description" id="description_id" cols="30" rows="4" class="form-control"></textarea>
              <span class="text-danger">{{ $errors->first('description') }}</span>
          </div>
      </div>
          <div class="form-group row">
            <label for="inputBrand" class="col-sm-2 col-form-label">Brand</label>
            <div class="col-sm-10">
              <select name="brand_id" class="form-control" id="brand_id">
                <option value="" selected>Choose Brands</option>
                    @foreach ($brands as $brand)
                        <option value="{{$brand->id}}">{{$brand->name}}</option>
                    @endforeach
                </option>
          </select>
          @if ($errors->any())
              @foreach ($errors->get('brand_id') as $error)
                  <p class="text-danger pt-2">{{$error}}</p>
              @endforeach
          @endif
            </div>
          </div>

          <div class="form-group row">
            <label for="inputSubcategory" class="col-sm-2 col-form-label">Subcategory</label>
            <div class="col-sm-10">
              <select name="subcategory_id" class="form-control" id="subcategory_id">
                  <option value="" selected>Choose Subcategory</option>
                        @foreach ($subcategories as $subcategory)
                            <option value="{{$subcategory->id}}">{{$subcategory->name}}</option>
                        @endforeach
                    </option>
              </select>
              @if ($errors->any())
                  @foreach ($errors->get('subcategory_id') as $error)
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