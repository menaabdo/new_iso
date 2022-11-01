@extends('layouts.master')
@section ('content')
<div class="col-md-12">
    <div class="card card-primary card-outline">
        <div class="card-body box-profile">
            <h3 class="profile-username text-center">{{$permission->display_name}}</h3>
            <p class="text-muted text-center">{{$permission->description}}</p>
        </div>
    </div>
</div>
@endsection
