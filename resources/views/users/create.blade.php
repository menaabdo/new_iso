@extends('layouts.master')


@section ('content')
<style>
     .shadow-lg {
    box-shadow: 0 1rem 3rem rgba(0,0,0,.175)!important;}
    
    </style>
<body class="hold-transition register-page" style=''>
<div class="card" style='margin-right:85px;'>
<div class="card-body">
<div class="register-box">


  <div class="card">
<div class="card-body">
    <div class="card-body register-card-body row " style=''>
     

      <form  action="{{ route('storeUser') }}" class='row d-flex justify-content-center shadow-lg' method="POST" style='margin:auto;padding:20px;' >
      @csrf
        <div class="input-group mb-3 col-md-10">
          <input type="text" name="name" class="form-control shadow-lg" placeholder="Full name" required autofocus>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3 col-md-10">
          <input type="email" class="form-control shadow-lg" placeholder="Email" name="email" require>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3 col-md-10">
          <input class="form-control shadow-lg" placeholder="Password" type="password" name="password" required
                    autocomplete="new-password" >
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3 col-md-10">
          <input type="password" class="form-control shadow-lg" placeholder="Retype password"  type="password"
                    name="password_confirmation" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <!-- <input name='role_id' type="hidden" value="user"> -->
        <!-- <select name='role_id'>
                <option value="user"></option>
                <option value="sup-admin"></option>
            </select> -->
          <!-- /.col -->
                <div class="form-group col-md-10">
                  <label for="userRole">Select User Role</label>
                  <select name="roles[]" class="select2 custom-select form-control-border" multiple="multiple" id="userRole">
                    @foreach ($roles as $role)
                      @if($role->name == 'user')
                        <option value="{{$role->id}}" selected>{{$role->display_name}}</option>
                      @else
                        <option value="{{$role->id}}">{{$role->display_name}}</option>
                      @endif
                    @endforeach
                  </select>
                </div>
                {{-- <div class="form-group">
                    <label for="userPermissions">Select User Permission</label>
                    <select name="permissions[]" class="select2 custom-select form-control-border" multiple="multiple" id="userPermissions">
                      @foreach ($permissions as $permission)
                          <option value="{{$permission->id}}">{{$permission->display_name}}</option>
                      @endforeach
                    </select>
                  </div> --}}
          <div class="col-md-12" style="text-align:center">
            <button type="submit" class="btn shadow-lg" style='background: linear-gradient(
90deg
, rgba(41,67,148,1) 0%, rgba(40,150,212,1) 100%);'>Add Member</button>
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
