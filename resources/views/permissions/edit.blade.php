@extends('layouts.master')

@section ('content')
  <div class="card">
<div class="card-body">
    <div class="card-body register-card-body">
      <p class="login-box-msg">Edit Permission</p>

      <form  action="{{route('permissions.update',$permission->id)}}" method="POST">
        @csrf
        @method('PUT')
        <input type="hidden" value="{{$permission->id}}" name="id">
        <div class="form-group mb-3">
          <label>Display Name</label>
          <input type="text" name="name" value="{{$permission->name}}" class="form-control" placeholder="Name" autofocus>
        </div>
        <div class="form-group mb-3">
          <label>Description</label>
          <textarea type="tex" class="form-control" placeholder="Description"  rows="7" cols="50" name="description">{{$permission->description}}</textarea>
        </div>
          <div class="col-6" style="float:right;">
            <button type="submit" class="btn btn-primary">Edit Permission</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
@endsection

