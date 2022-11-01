@extends('layouts.master')
@section ('content')
<!-- /.row -->
    <div class="col-12">
        <div class="card">
<div class="card-body">
            <div class="card-header">
                <h4 class="card-title"><strong>Permissions</strong></h3>
                    <div class="col-md-2" style="float:right;">
                        {{-- <a href="{{route('permissions.create')}}">
                            <button type="button" title="Add Permission" class="btn btn-block btn-danger">
                                <i class="fa fa-plus"></i>
                            </button>
                        </a> --}}
                    </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0">
                <table class="table table-head-fixed text-nowrap">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            {{-- <th>Description</th> --}}
                            <th>Created at</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($permissions as $permission)
                        <tr>
                            <td>{{$permission->id}}</td>
                            <td>
                                {{$permission->display_name}}
                            </td>
                            {{-- <td>{{$permission->description}}</td> --}}
                            <td>{{$permission->created_at}}</td>
                            <td>
                                <form action="{{ route('permissions.destroy',$permission->id) }}" method="POST">

                                    {{-- <a class="btn btn-primary" title="Edit" href="{{ route('permissions.edit',$permission->id) }}">
                                        <i class="fa fa-pen"></i>
                                    </a> --}}
                                    <a class="btn btn-warning" title="Show" href="{{ route('permissions.show',$permission->id) }}">
                                        <i class="fa fa-eye"></i>
                                    </a>

                                    @csrf
                                    @method('DELETE')

                                    {{-- <button type="submit" title="Delete" class="btn btn-danger">
                                        <i class="fa fa-ban"></i>
                                    </button> --}}
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
<!-- /.row -->
@endsection
