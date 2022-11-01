@extends('layouts.master')
@section ('content')
<br><br><br><br><br>
    <div class="card">
<div class="card-body">
   
            <div class="card-body register-card-body">
                <p class="login-box-msg">Update Profile</p>
                <form action="{{ route('updateProfile', Auth::user()->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="input-group mb-3">
                        <input type="text" name="name" class="form-control" value="{{Auth::user()->name}}"
                            placeholder="Full name" required autofocus>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="email" class="form-control" placeholder="Email" value="{{Auth::user()->email}}"
                            name="email" require>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Password -->
                    <div class="input-group mb-3">
                        <input type="password" name="password" class="form-control" placeholder="Password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input id="password" type="password" name="password_confirmation" class="form-control" placeholder="Confirm Password" require>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <!-- End Password -->
                    <!-- /.col -->
                    <div class="col-6" style="float:right;">
                        <button type="submit" class="btn btn-primary">Update Profile</button>
                    </div>
                    <!-- /.col -->
                </form>
            </div>
            
  
        <!-- /.form-box -->
    </div><!-- /.card -->
   
    <!-- /.register-box -->


@endsection