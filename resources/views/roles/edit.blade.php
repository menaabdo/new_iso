@extends('layouts.master')

@section ('content')

<div class="card">
<div class="card-body">
  <div class="card">
<div class="card-body">
    <div class="card-body register-card-body">
      <p class="login-box-msg">Edit Role</p>

      <form  action="{{route('roles.update',$role->id)}}" method="POST">
        @csrf
        @method('PUT')
        <input type="hidden" value="{{$role->id}}" name="id">
        <div class="form-group mb-3">
            <label>Display Name</label>
          <input type="text" name="name" value="{{$role->name}}" class="form-control" placeholder="Name" required autofocus>
        </div>
        <div class="form-group mb-3">
            <label>Description</label>
          <textarea type="tex" class="form-control" placeholder="Description"  rows="7" cols="50" name="description">{{$role->description}}</textarea>
        </div>
        <div class="form-group">
            <label for="permissions">Select Permissions</label>
            <select name="permissions[]" class="select2 custom-select form-control-border" id="permissions" multiple="multiple">
            @foreach ($permissions as $permission)
                <option {{in_array($permission->id,old('permissions',$role_permissions) ) ? 'selected':''}}
                value="{{$permission->id}}">{{$permission->display_name}}</option>
            @endforeach
            </select>
        </div>
          <div class="col-6" style="float:right;">
            <button type="submit" class="btn btn-primary">Edit Role</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>
@endsection

