@extends('layouts.backendtemplate')
@section('content')
  <div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Subcategory List</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
      <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Data Tables</h6>
        <a href="{{route('subcategory.create')}}" class="btn btn-outline-primary float-right"><i class="fa fa-plus" aria-hidden="true"></i></a>
      </div>
      <div class="card-body">
          <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead class="table-primary">
                      <tr>
                          <th>ID</th>
                          <th>Name</th>
                          <th>Categoy Name</th>
                          <th>Action</th>
                      </tr>
                  </thead>
                  <tfoot>
                      <tr>
                          <th>ID</th>
                          <th>Name</th>
                          <th>Category Name</th>
                          <th>Action</th>
                      </tr>
                  </tfoot>
                  <tbody>
                    @php
                        $i=1;
                    @endphp
                    @foreach ($subcategories as $subcategory)
                      <tr>
                        <td>{{$i++}}</td>
                        <td>
                              {{$subcategory->name}}
                        </td>
                        <td>
                              {{$subcategory->category->name}}
                        </td>
                        <td>
                            <a href="{{route('subcategory.edit',$subcategory->id)}}" class="btn btn-warning">
                                <i class="fa fa-wrench" aria-hidden="true"></i>
                            </a>
                            <a href="#deleteModal" data-toggle="modal" data-id="{{route('subcategory.destroy',$subcategory->id)}}" class="btn btn-danger deletebtn">
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