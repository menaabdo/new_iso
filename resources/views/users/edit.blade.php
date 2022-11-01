@extends('layouts.master')


@section ('content')

<body class="hold-transition register-page">

<div class="card">
<div class="card-body">
    <div class="register-box">
        <div class="card">
<div class="card-body">
            <div class="card-body register-card-body">
                <p class="login-box-msg">Add new membership</p>
                <form action="{{ route('users.update',$user->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <!-- <input type="hidden" name="user_id" value="{{$user->id}}"> -->
                    <div class="input-group mb-3">
                        <input type="text" name="name" class="form-control" value="{{$user->name}}"
                            placeholder="Full name" required autofocus>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="email" class="form-control" placeholder="Email" value="{{$user->email}}"
                            name="email" require>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="userRole">Select User Role</label>
                        <select name="roles[]" class="select2 custom-select form-control-border" multiple="multiple" id="userRole">
                          @foreach ($roles as $role)
                              <option {{in_array($role->id,old('roles',$userRoles) ) ? 'selected':''}}
                              value="{{$role->id}}">{{$role->display_name}}</option>
                          @endforeach
                        </select>
                    </div>
                    {{-- <div class="form-group">
                        <label for="userPermissions">Select User Permission</label>
                        <select name="permissions[]" class="select2 custom-select form-control-border" multiple="multiple" id="userPermissions">
                          @foreach ($permissions as $permission)
                              <option {{in_array($permission->id,old('permissions',$userPermissions) ) ? 'selected':''}}
                              value="{{$permission->id}}">{{$permission->display_name}}</option>
                          @endforeach
                        </select>
                    </div> --}}
                    <!-- /.col -->
                    <div class="col-6" style="float:right;">
                        <button type="submit" class="btn btn-primary">Edit Member Data</button>
                    </div>
                    <!-- /.col -->
            </div>
            </form>
        </div>
        <!-- /.form-box -->
    </div><!-- /.card -->
    </div>
</div>
    <!-- /.register-box -->
</body>

@endsection
