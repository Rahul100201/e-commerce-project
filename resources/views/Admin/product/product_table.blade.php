@extends('layouts.backend.app')
@section('content')
<div class="col-md-12">
    @if ($errors->any())
    @foreach ($errors->all() as $error)
    <div class="alert  alert-danger alert-dismissible fade show" role="alert">
        <span class="badge badge-pill badge-danger">Erorr</span> {{$error}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
    </div>
    @endforeach
    @endif

    <div class="card">
        <div class="card-header">
            <strong class="card-title">Data Table</strong>
        </div>
        <div>
            <button class="btn btn-success" data-toggle="modal" data-target="#add_modal">ADD PRODUCT</i></i></button>
        </div>
        <div class="card-body">
            <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>NAME</th>
                        <th>description</th>
                        <th>IMAGE</th>
                        <th>Status</th>
                        <th>ACTION</th>
                    </tr>
                </thead>
                @foreach ($product as $a )
                <tbody>
                    <tr>
                        <td>{{$a->id}}</td>
                        <td>{{$a->product_name}}</td>
                        <td>{{$a->product_description}}</td>
                        <td><img src="{{ url('/upload/product/'.$a->product_image) }}" style="height: 100px; width: 100px; border-radius: 100%;"></td>
                        <td>{{$a->status}}</td>
                        <td>
                            <button class="btn btn-info"data-toggle="modal" data-target="#view_modal-{{$a->id}}"><i class="fa fa-eye"></i></button>
                            <button class="btn btn-success" data-toggle="modal" data-target="#edit_modal-{{$a->id}}"><i class="fa fa-pencil"></i></i></button>
                            <button class="btn btn-danger" data-toggle="modal" data-target="#delete_modal-{{$a->id}}"><i class="fa fa-trash-o"></i></i></button>
                            <br>
                            <a href="{{url('admin/product/addimage/'.$a->id)}}" class="btn btn-info">Add images</a>
                        </td>
                    </tr>
                </tbody>
                @endforeach
            </table>
        </div>
    </div>
</div>
<!--add_Modal -->
<div class="modal fade" id="add_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">ADD</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form action="{{url('product/register')}}" method="post" id="" enctype="multipart/form-data" class="form-horizontal">
                    @csrf
                    <div class="row form-group">
                        <div class="col col-md-3"><label class=" form-control-label">product name</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="text" class="form-control" name="product_name">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3"><label class=" form-control-label">product description</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <textarea name="product_description" id="" cols="30" rows="5" class="form-control"></textarea>
                            {{-- <input type="text"   name=""> --}}
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3"><label class=" form-control-label">product image</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="file" class="form-control" name="product_image">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3"><label class=" form-control-label">product price</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="text" class="form-control" name="product_price">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3"><label class=" form-control-label">quantity</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="text" class="form-control" name="quantity">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3"><label class=" form-control-label">category</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <select name="category_id" id="" class="form-control">
                                @foreach ($cat as $data )
                                <option value="{{$data->id}}">{{$data->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <input type="submit" class="btn btn-info" value="submit">
                </form>
            </div>
        </div>
    </div>
</div>
<!----add modal end----->
@foreach ($product as $data)
 <!--view_Modal -->
 <div class="modal fade" id="view_modal-{{$data->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">view</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="row form-group">
                <div class="col col-md-3"><label class=" form-control-label">Name</label>
                  </div>
                  <div class="col-12 col-md-9">
                      <p class="form-control-static">{{$data->product_name}}</p>
              </div>
                </div>
                  <div class="row form-group">
                  <div class="col col-md-3"><label class=" form-control-label">description</label>
                  </div>
                  <div class="col-12 col-md-9">
                      <p class="form-control-static">{{$data->product_description}}</p>
                  </div>
              </div>
                  <div class="row form-group">
                  <div class="col col-md-3"><label class=" form-control-label">image</label>
                  </div>
                  <div class="col-12 col-md-9">
                      <p class="form-control-static"><img src="{{ url('/upload/product/'.$data->product_image)}}" style="height: 100px; width: 100px; border-radius: 100%;"></p>
                  </div>
              </div>
              <div class="row form-group">
                <div class="col col-md-3"><label class=" form-control-label">product price</label>
                  </div>
                  <div class="col-12 col-md-9">
                      <p class="form-control-static">{{$data->product_price}}</p>
              </div>
              </div>
              <div class="row form-group">
                <div class="col col-md-3"><label class=" form-control-label">quantity</label>
                  </div>
                  <div class="col-12 col-md-9">
                      <p class="form-control-static">{{$data->quantity}}</p>
                  </div>
              </div>
              <div class="row form-group">
                <div class="col col-md-3"><label class=" form-control-label">status</label>
                  </div>
                  <div class="col-12 col-md-9">
                      <p class="form-control-static">{{$data->status}}</p>
                  </div>
              </div>
                  <div class="row form-group">
                  <div class="col col-md-3"><label class=" form-control-label">Created At</label>
                  </div>
                  <div class="col-12 col-md-9">
                      <p class="form-control-static">{{$data->created_at}}</p>
                  </div>
              </div>
                 <div class="row form-group">
                  <div class="col col-md-3"><label class=" form-control-label">Updated At</label>
                  </div>
                  <div class="col-12 col-md-9">
                      <p class="form-control-static">{{$data->updated_at}}</p>
                  </div>
              </div>
        </div>
      </div>
     </div>
  </div><!----view modal end----->
    <!--edit_Modal -->
<div class="modal fade" id="edit_modal-{{$data->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">edit</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="{{url('product/update',$data->id)}}" method="post" id="" enctype="multipart/form-data" class="form-horizontal">
              @csrf
              @method('PUT')
                         <div class="row form-group">
                            <div class="col col-md-3"><label class=" form-control-label">Name</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="text" class="form-control" value="{{$data->product_name}}" name="product_name">
                            </div>
                        </div>
                        <div class="row form-group">
                          <div class="col col-md-3"><label class=" form-control-label">description</label>
                          </div>
                          <div class="col-12 col-md-9">
                              <input type="text" class="form-control" value="{{$data->product_description}}" name="product_description">
                          </div>
                      </div>
                      <div class="row form-group">
                        <div class="col col-md-3"><label class=" form-control-label">quantity</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="text" class="form-control" value="{{$data->quantity}}" name="quantity">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3"><label class=" form-control-label">product price</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="text" class="form-control" value="{{$data->product_price}}" name="product_price">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3"><label class=" form-control-label">Category</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="text" class="form-control" value="{{$data->category_id}}" name="category_id">
                        </div>
                    </div>
                      <div class="row form-group">
                        <div class="col col-md-3"><label class=" form-control-label">image</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <img src="{{url('/upload/product/'.$data->product_image)}}" alt="" width="50px" height="50px">
                            <input type="file" class="form-control" placeholder="" name="product_image" id="pass">
                        </div>
                    </div>
                      <input type="submit" class="btn btn-info" value="update">
                 </form>
            </div>
        </div>
    </div>
</div><!----edit modal end----->
<!--delete_Modal -->
<div class="modal fade" id="delete_modal-{{$data->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">delete</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p>the {{$data->product_name}} will be deleted !!!</p>

        </div><!---model body end----->
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>

            <form action="{{url('product/delete',$data->id)}}"method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Confirm</button>
            </form>

        </div><!---model footer end------>
      </div>
    </div>
  </div><!----delete modal end----->
  @endforeach
@endsection
