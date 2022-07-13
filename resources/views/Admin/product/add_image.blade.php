@extends('layouts.backend.app')
@section('content')
<div class="content">
   <div class="row">
      <div class="col-md-2">
      </div>
      <div class="col-md-8">
         <div class="card">
            <div class="card-header">
               <strong class="card-title">Add Multiple Image</strong>
            </div>
            <div class="card-body">
               <form action="{{ url('admin/dashboard/product/store') }}" method="POST"  enctype="multipart/form-data">
                  @csrf
                  <div class="form-group">
                  <input type="text" value="{{$a }}" hidden name="id" class="form-control">
                  <label for="exampleFormControlFile1">Upload Multiple Images</label>
                  <input type="file" class="form-control-file" name="image" id="exampleFormControlFile1">
                  <br>
                  <button class="btn btn-primary">Submit</button>
                </div>
               </form>
            </div>
         </div>
         <div class="col-md-2"></div>
      </div>
   </div>
   <div class="card">
      <div class="card-header">
         <strong class="card-title">IMAGES DATA</strong>
      </div>
      <div class="card-body">
         <div class="table-responsive">
            <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
               <thead>
                  <tr>
                     <th>ID</th>
                     <th>PRODUCT ID</th>
                     <th>PRODUCT IMAGE</th>
                     <th>Action</th>
                  </tr>
               </thead>
               <tbody>
                  @foreach ($image     as $a )
                  <tr>
                     <td>{{ $a->id }}</td>
                     <td>{{ $a->product_id}}</td>
                     <td><img src="{{url('upload/product/product_image/'.$a->product_image) }}" style="height: 100px; width: 100px; border-radius: 100%;"></td>
                     <td>
                        <a href="" style="border-radius: 100%" class="btn btn-success mb-1">
                        <i class="fa fa-eye"></i>
                        </a>
                        <a  href=""  style="border-radius: 100%" class="btn btn-secondary mb-1">
                        <i class="fa fa-pencil"></i>
                        </a>
                        <a  href="" style="border-radius: 100%" class="btn btn-danger mb-1" >
                        <i class="fa fa-trash-o"></i>
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
</div>
@endsection
