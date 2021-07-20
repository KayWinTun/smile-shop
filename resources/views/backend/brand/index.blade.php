@extends('layouts.backendtemplate')
@section('content')
  <div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Brands List</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
      <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Data Tables</h6>
        <a href="{{route('brand.create')}}" class="btn btn-outline-primary float-right">
            <i class="fa fa-plus" aria-hidden="true"></i></a>
      </div>
      <div class="card-body">
          <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead class="table-primary">
                      <tr>
                          <th>ID</th>
                          <th>Name</th>
                          <th>Action</th>
                      </tr>
                  </thead>
                  <tfoot>
                      <tr>
                          <th>ID</th>
                          <th>Name</th>
                          <th>Action</th>
                      </tr>
                  </tfoot>
                  <tbody>
                    @php
                        $i=1;
                    @endphp
                    @foreach ($brands as $brand)
                      <tr>
                        <td>{{$i++}}</td>
                        <td>
                              <div class="d-flex no-block align-items-center">
                              <div class="mr-3">
                                    <img src="{{asset($brand->photo)}}" alt="user" width="100" height="100">
                              </div>
                              <div>
                                    {{$brand->name}}
                              </div>
                              </div>
                        </td>
                        <td>
                            <a href="{{route('brand.edit',$brand->id)}}" class="btn btn-warning">
                                <i class="fa fa-wrench" aria-hidden="true"></i>
                            </a>
                            <a href="#deleteModal" data-toggle="modal" data-id="{{route('brand.destroy',$brand->id)}}" class="btn btn-danger deletebtn">
                                <i class="fa fa-trash" aria-hidden="true"></i>
                            </a>
                        </td>
        
                      </tr>
                      @endforeach
                  </tbody>
              </table>
          </div>
      </div>
  </div>

  </div>

  {{-- modal box --}}
  <div class="modal fade" id="deleteModal">
      <div class="modal-dialog">
          <div class="modal-content">
              <form action="" method="post" id="deleteModalForm">
                  @csrf
                  @method('Delete')
                <div class="modal-header">
                    <h4 class="modal-title">Are You Sure To Delete?</h4>
                </div>
                <div class="modal-footer">
                    <input type="submit" name="btnsubmit" class="btn btn-danger" value="Delete">
                    <button class="btn btn-secondary" data-dismiss="modal">Cancle</button>
                </div>
              </form>
          </div>
      </div>
  </div>
  
@endsection

@section('script')
    <script>
        $(document).ready(function(){
            $('.deletebtn').click(function(){
                var id = $(this).data('id');
                // console.log(id);
                $('#deleteModalForm').attr('action',id);
                $('#deleteModal').modal('show');
            })
        })
    </script>
@endsection