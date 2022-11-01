@extends('layouts.master')

@section ('content')
<!-- /.row -->

<div class="card">
<div class="card-body">
    <div class="col-12">
        <div class="card">
<div class="card-body">
            <div class="card-header">
                <h4 class="card-title"><strong>Roles</strong></h3>
                    <div class="col-md-2" style="float:right;">
                        <a href="{{route('roles.create')}}">

                            <button type="button" title="Add Role" class="btn btn-block btn-danger">
                                <i class="fa fa-plus"></i>
                            </button>
                        </a>
                    </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0" style="height: 300px;">
                <table class="table text-nowrap">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Created at</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($roles as $role)
                        <tr>
                            <td>{{$role->id}}</td>
                            <td>
                                {{$role->display_name}}
                            </td>
                            <td>{{$role->description}}</td>
                            <td>{{$role->created_at}}</td>
                            <td>
                                <form action="{{ route('roles.destroy',$role->id) }}" method="POST">

                                    <a class="btn btn-primary" title="Edit" href="{{ route('roles.edit',$role->id) }}">
                                        <i class="fas fa-pen"></i>
                                    </a>
                                    <a class="btn btn-warning" title="Show" href="{{ route('roles.show',$role->id) }}">
                                        <i class="fa fa-eye"></i>
                                    </a>

                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" title="Delete" class="btn btn-danger">
                                        <i class="fa fa-ban"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
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
