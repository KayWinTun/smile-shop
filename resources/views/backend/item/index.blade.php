@extends('layouts.backendtemplate')
@section('content')
  <div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Item List</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
      <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Data Tables</h6>
        <a href="{{route('item.create')}}" class="btn btn-outline-primary float-right"><i class="fa fa-plus" aria-hidden="true"></i></a>
      </div>
      <div class="card-body">
          <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead class="table-primary">
                      <tr>
                          <th>ID</th>
                          <th>Name</th>
                          <th>Brand</th>
                          <th>Price</th>
                          <th>Action</th>
                      </tr>
                  </thead>
                  <tfoot>
                      <tr>
                          <th>ID</th>
                          <th>Name</th>
                          <th>Brand</th>
                          <th>Price</th>
                          <th>Action</th>
                      </tr>
                  </tfoot>
                  <tbody>
                    @php
                        $i=1;
                    @endphp
                    @foreach ($items as $item)
                      <tr>
                        <td>{{$i++}}</td>
                        <td>
                            <div class="row">
                                <div class="col-lg-3">
                                      <img src="{{asset($item->photo)}}" alt="user" width="100" height="100">
                                </div>
                                <div class="col-lg-7">
                                      <h5>{{$item->name}}</h5>
                                      <p class="text-muted">{{$item->description}}</p>
                                </div>
                            </div>
                        </td>
                        <td>
                              {{$item->brand->name}}
                        </td>
                        <td>
                            @if ($item->discount)
                                <p>{{$item->discount}}</p>
                                <del>{{$item->price}}</del>
                            @elseif($item->price)
                                <p>{{$item->price}}</p>
                            @endif
                        </td>
                        <td>
                            <a href="{{route('item.edit',$item->id)}}" class="btn btn-warning">
                                <i class="fa fa-wrench" aria-hidden="true"></i>
                            </a>
                            <a href="#deleteModal" data-toggle="modal" data-id="{{route('item.destroy',$item->id)}}" class="btn btn-danger deletebtn">
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