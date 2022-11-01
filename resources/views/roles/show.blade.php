@extends('layouts.master')
@section ('content')
<div class="col-md-12">
    <div class="card card-primary card-outline">
        <div class="card-body box-profile">
            <h3 class="profile-username text-center">{{$role->display_name}}</h3>
            <p class="text-muted text-center">{{$role->description}}</p>
            <ul class="list-group list-group-unbordered mb-12">
                @foreach ($role->permissions as $permission)
                <li class="list-group-item">
                    <b>{{$permission->display_name}}</b>
                </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
@endsection
