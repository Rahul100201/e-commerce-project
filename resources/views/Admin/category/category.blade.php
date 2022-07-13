@extends('layouts.backend.app')
@section('content')
    <div class="col-md-12">
        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <div class="alert  alert-danger alert-dismissible fade show" role="alert">
                    <span class="badge badge-pill badge-danger">Erorr</span> {{ $error }}
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
                <button class="btn btn-success" data-toggle="modal" data-target="#add_modal">ADD CATEGARY</i></i></button>
            </div>
            <div class="card-body">
                <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>NAME</th>
                            <th>description</th>
                            <th>IMAGE</th>
                            <th>created_at</th>
                            <th>updated_at</th>
                            <th>ACTION</th>
                        </tr>
                    </thead>
                    @foreach ($category as $a)
                        <tbody>
                            <tr>
                                <td>{{ $a->id }}</td>
                                <td>{{ $a->name }}</td>
                                <td>{{ $a->description }}</td>
                                <td><img src="{{ url('/upload/category/' . $a->image) }}"
                                        style="height: 100px; width: 100px; border-radius: 100%;"></td>
                                <td>{{ $a->created_at }}</td>
                                <td>{{ $a->updated_at }}</td>
                                <td>
                                    <button class="btn btn-info" data-toggle="modal"
                                        data-target="#view_modal-{{ $a->id }}"><i
                                            class="fa fa-eye"></i></button>
                                    <button class="btn btn-success" data-toggle="modal"
                                        data-target="#edit_modal-{{ $a->id }}"><i
                                            class="fa fa-pencil"></i></i></button>
                                    <button class="btn btn-danger" data-toggle="modal"
                                        data-target="#delete_modal-{{ $a->id }}"><i
                                            class="fa fa-trash-o"></i></i></button>
                                </td>
                            </tr>
                        </tbody>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
    @foreach ($category as $data)
        <!--add_Modal -->
        <div class="modal fade" id="add_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">edit</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <form action="{{ url('admin/categary/register') }}" method="post" id=""
                            enctype="multipart/form-data" class="form-horizontal">
                            @csrf
                            <div class="row form-group">
                                <div class="col col-md-3"><label class=" form-control-label">Name</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <input type="text" class="form-control" name="name">
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label class=" form-control-label">slug</label>
                         </div>
                                <div class="col-12 col-md-9">
                                    <input type="text" class="form-control" name="slug">
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label class=" form-control-label">description</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <textarea name="description" id="" cols="30" rows="10" class="form-control"></textarea>
                                    {{-- <input type="text"   name=""> --}}
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label class=" form-control-label">image</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <input type="file" class="form-control" name="image">
                                </div>
                            </div>
                            <input type="submit" class="btn btn-info" value="submit">
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!----add modal end----->
        <!--view_Modal -->
        <div class="modal fade" id="view_modal-{{ $data->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
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
                                <p class="form-control-static">{{ $data->name }}</p>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3"><label class=" form-control-label">description</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <p class="form-control-static">{{ $data->description }}</p>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3"><label class=" form-control-label">description</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <p class="form-control-static">{{ $data->description }}</p>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3"><label class=" form-control-label">image</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <p class="form-control-static"><img src="{{ url('/upload/category/' . $data->image) }}"
                                        style="height: 100px; width: 100px; border-radius: 100%;"></p>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3"><label class=" form-control-label">Created At</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <p class="form-control-static">{{ $data->created_at }}</p>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3"><label class=" form-control-label">Updated At</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <p class="form-control-static">{{ $data->updated_at }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!----view modal end----->
        <!--edit_Modal -->
        <div class="modal fade" id="edit_modal-{{ $data->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">edit</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ url('admin/categary/update', $data->id) }}" method="post" id=""
                            enctype="multipart/form-data" class="form-horizontal">
                            @csrf
                            @method('PUT')
                            <div class="row form-group">
                                <div class="col col-md-3"><label class=" form-control-label">Name</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <input type="text" class="form-control" value="{{ $data->name }}" name="name">
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label class=" form-control-label">description</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <input type="text" class="form-control" value="{{ $data->description }}"
                                        name="description">
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label class=" form-control-label">image</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <img src="{{ url('/upload/category/' . $data->image) }}" alt="" width="50px"
                                        height="50px">
                                    <input type="file" class="form-control" placeholder="" name="image" id="pass">
                                </div>
                            </div>
                            <input type="submit" class="btn btn-info" value="update">
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!----edit modal end----->
        <!--delete_Modal -->
        <div class="modal fade" id="delete_modal-{{ $data->id }}" tabindex="-1"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">delete</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>the {{ $data->name }} will be deleted !!!</p>
                    </div>
                    <!---model body end----->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>

                        <form action="{{ url('category/delete', $data->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Confirm</button>
                        </form>

                    </div>
                    <!---model footer end------>
                </div>
            </div>
        </div>
        <!----delete modal end----->
    @endforeach
@endsection
