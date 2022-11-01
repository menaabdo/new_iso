@extends('layouts.master')


@section ('content')
<?php
    $pagename = 'Users';
?>
<!-- /.row -->
<div class="card" style='margin-right:85px'>
<div class="card-body">
    <div class="col-12">
        <div class="card">
<div class="card-body">
            <div class="card-header">
                <h4 class="card-title" style='margin-top:40px'><strong>All Users</strong></h3>
                    <div class="col-md-2" style="float:right;">
                        @if(auth()->user()->isAbleTo(['users-create']))
                        <a href="{{route('addUser')}}">

                            <button type="button" title="Add User" class="btn btn-danger">
                                <i class="fa fa-plus"></i>
                            </button>
                        </a>
                        @endif
                    </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0" style="height: 300px;">
                <table class="table table-head-fixed text-nowrap">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            {{-- <th>User Role</th> --}}
                            <th>Created at</th>
                            <th>Control</th>
                            <!-- <th></th> -->
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                        @if ($user->hasRole('superAdmin'))
                        <?php echo ''; ?>
                        @else
                        <tr>
                            <td>{{$user->id}}</td>
                            <td>
                                <a href="{{ route('users.show',$user->id) }}">
                                    {{$user->name}}
                                </a>
                            </td>
                            <td>{{$user->email}}</td>
                            {{-- @if($user->roles->pluck('display_name')->isEmpty())
                            <td></td>
                            @else
                            <td>{{$user->roles->pluck('display_name')}}</td>
                            @endif --}}
                            <td>{{$user->created_at}}</td>
                            <td>
                                <form action="{{ route('users.destroy',$user->id) }}" method="POST">
                                    @if(auth()->user()->isAbleTo(['users-update']))
                                    <a class="btn btn-primary" title="Edit" href="{{ route('users.edit',$user->id) }}">
                                        <i class="fa fa-pen"></i>
                                    </a>
                                    @endif
                                    @csrf
                                    @method('DELETE')
                                    @if(auth()->user()->isAbleTo(['users-delete']))
                                    <button type="submit" title="Delete" class="btn btn-danger">
                                        <i class="fa fa-ban"></i>
                                    </button>
                                    @endif
                                </form>
                            </td>
                        </tr>
                        @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
</div>
<!-- /.row -->
@endsection
