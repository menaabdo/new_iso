@extends ('../welcome')


@section ('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->


    <section class="content">
        <div class="container-fluid">
            <!-- <div class="row"> -->
            <div class="col-md-12">

                <!-- Profile Image -->
                <div class="card card-primary card-outline">
                    <div class="card-body box-profile">
                        <!-- <div class="text-center">
                            <img class="profile-user-img img-fluid img-circle"
                                src="{{asset('asset/dist/img/user4-128x128.jpg')}}" alt="User profile picture">
                        </div> -->

                        <h3 class="profile-username text-center">{{$user->name}}</h3>
                        <p class="text-muted text-center">User Roles: {{$userRoles}}</p>
                        <p class="text-muted text-center">User Permissions: {{$userPermissions}}</p>

                        <ul class="list-group list-group-unbordered mb-12">
                            <li class="list-group-item">
                                <b>{{$user->email}}</b>
                            </li>
                        </ul>
                        <br>
                        <div class="row">
                            <div class="col-md-12">
                                <form action="{{ route('users.destroy',$user->id) }}" method="POST">

                                    <a class="btn btn-primary" title="Edit" href="{{ route('users.edit',$user->id) }}">
                                    <b>Update</b>
                                    </a>

                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" title="Delete" class="btn btn-danger">
                                        <b>Delete</b>

                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->

            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
@endsection
