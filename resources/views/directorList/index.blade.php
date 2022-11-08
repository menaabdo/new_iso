@extends('layouts.master')
@section('content')
<style>
    .shadow-lg {
    box-shadow: 0 1rem 3rem rgba(0,0,0,.175)!important;}
    #me:hover{
        transform: scale(1.1);
    box-shadow: 0 1rem 3rem rgba(0,0,0,.175)!important;
    }
</style>


    <section class="content" style='margin:auto;'>
        <div class="card">
            <div class="card-body row" style='margin:auto;'>
                <h3 class='col-md-12' style='margin:auto;margin-top:85px;text-shadow: 1px 1px 1px #3ed3ea;'>قائمة أسماء المديرين والأفراد المصرح لهم بإعداد الوثائق</h3>
                <hr>
</div>
                <div class="row" style='margin:auto;'>
                        <div class='row' style='margin:auto;'>
                    <a href="{{ route('directorList.create') }}" class="btn col-md-12  mr-1"
                        style="width:120px;  float: right; font-size:20px;background: linear-gradient(
90deg
, rgba(41,67,148,1) 0%, rgba(40,150,212,1) 100%); ">
                        <button class='shadow-lg btn btn-light' style='color:  #001635; 
    background-color: white;' id='me'> اضافة جديدة</button></a>
    </div>
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="card">
                                    <div class="card-body">
                                        <!-- /.card-header -->
                                        <div class="card-body">
                                            <table id="example1" class="table table-bordered table-striped" style='background-color: #001635;color:white;text-align:center'>
                                                <thead>
                                                    <tr>
                                                        <th style=" font-size:20px ">Logo</th>
                                                        <th style=" font-size:20px ">Status</th>
                                                        <th style="font-size:20px " data-field="Actions"
                                                            class="datatable-cell "><span style="">Actions</span></th>

                                                    </tr>
                                                </thead>

                                                <tbody class="datatable-body ">
                                                    @foreach ($all_directorList as $directorList)
                                                        <tr class="datatable-row datatable-row-even">
                                                            <td class="datatable-cell" style="font-size:15px "><span><img
                                                                        src="{{ asset($directorList->logo) }}"
                                                                        alt="Image" width="50px"></span></td>
                                                            <td class="datatable-cell" style="font-size:15px ">
                                                                <span>{{ $directorList->status }}</span>
                                                            </td>
                                                            @if (Auth::user()->hasRole('Employee'))
                                                                <td>
                                                                    <form id="delete-form-{{ $directorList->id }}"
                                                                        action="{{ route('directorList.destroy', $directorList->id) }}"
                                                                        method="post">
                                                                        <a href="{{ route('directorList.edit', $directorList->id) }}"
                                                                            class="btn btn-sm btn-clean
                                                                            btn-icon mr-2"
                                                                            title="@lang('general.edit')">
                                                                            <i class="fa fa-edit"></i>
                                                                        </a>
                                                                        <a href="{{ route('directorList.print', $directorList->id) }}"
                                                                            class="btn btn-lg btn-clean
                                                                            btn-icon mr-2"
                                                                            title="@lang('general.print')">
                                                                            <i class="fa fa-print"></i>
                                                                        </a>
                                                                        @csrf
                                                                        @method('delete')
                                                                        @if ($directorList->status == 'pending' && Auth::user()->hasRole('Employee'))
                                                                            <button type="button"
                                                                                class="btn btn-sm btn-clean btn-icon"
                                                                                title="@lang('general.delete')"
                                                                                onclick="confirmDelete('delete-form-{{ $directorList->id }}')">
                                                                                <i class="fa fa-trash"></i>
                                                                            </button>
                                                                        @endif
                                                                    </form>
                                                                </td>
                                                            @elseif(Auth::user()->hasRole('Admin'))
                                                                <td>
                                                                    <form id="delete-form-{{ $directorList->id }}"
                                                                        action="{{ route('directorList.destroy', $directorList->id) }}"
                                                                        method="post">
                                                                        <a href="{{ route('directorList.edit', $directorList->id) }}"
                                                                            class="btn btn-sm btn-clean
                                            btn-icon mr-2"
                                                                            title="@lang('general.edit')">
                                                                            <i class="fa fa-edit"></i>
                                                                        </a>
                                                                        <a href="{{ route('directorList.print', $directorList->id) }}"
                                                                            class="btn btn-lg btn-clean
                                                                            btn-icon mr-2"
                                                                            title="@lang('general.print')">
                                                                            <i class="fa fa-print"></i>
                                                                        </a>
                                                                        @csrf
                                                                        @method('delete')
                                                                        @if (($directorList->status == 'inProgress' && Auth::user()->hasRole('Admin')) ||
                                                                            ($directorList->status == 'pending' && Auth::user()->hasRole('Admin')))
                                                                            <button type="button"
                                                                                class="btn btn-sm btn-clean btn-icon"
                                                                                title="@lang('general.delete')"
                                                                                onclick="confirmDelete('delete-form-{{ $directorList->id }}')">
                                                                                <i class="fa fa-trash"></i>
                                                                            </button>
                                                                        @endif
                                                                    </form>
                                                                </td>
                                                            @elseif(($directorList->status == 'inProgress' && Auth::user()->hasRole('SuperAdmin')) ||
                                                                ($directorList->status == 'pending' && Auth::user()->hasRole('SuperAdmin')) ||
                                                                ($directorList->status == 'confirmed' && Auth::user()->hasRole('SuperAdmin')))
                                                                <td style="font-size:15px">
                                                                    <form id="delete-form-{{ $directorList->id }}"
                                                                        action="{{ route('directorList.destroy', $directorList->id) }}"
                                                                        method="post">

                                                                        <a href="{{ route('directorList.edit', $directorList->id) }}"
                                                                            class="btn btn-lg  
                                        btn-icon "
                                                                            title="@lang('general.edit')">
                                                                            <i class="fa fa-edit"></i>
                                                                        </a>
                                                                        <a href="{{ route('directorList.print', $directorList->id) }}"
                                                                            class="btn btn-lg btn-clean
                                                                            btn-icon mr-2"
                                                                            title="@lang('general.print')">
                                                                            <i class="fa fa-print"></i>
                                                                        </a>

                                                                        {{-- <a href="{{ route('directorList.print', $directorList->id) }}"
                                                                 data-id="{{ $directorList->id }}"
                                                                class="btn btn-lg btn-icon">
                                                                <i class="fa fa-print"></i>
                                                            </a> --}}

                                                                        {{-- <a href="#" data-id="{{ $directorList->id }}"
                                                                class="btn btn-lg btn-icon print">
                                                                <i class="fa fa-print"></i>
                                                            </a> --}}


                                                                        @csrf
                                                                        @method('delete')
                                                                        <button type="button" class="btn btn-lg  btn-icon"
                                                                            title="@lang('general.delete')"
                                                                            onclick="confirmDelete('delete-form-{{ $directorList->id }}')">
                                                                            <i class="fa fa-trash"></i>
                                                                        </button>
                                                                    </form>
                                                                </td>
                                                            @endif
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <!-- /.card-body -->
                                </div>
                                <!-- /.card -->
                            </div>


                            <!-- /.col -->
                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- /.container-fluid -->
    </section>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function confirmDelete(item_id) {
            Swal.fire({
                title: "Are you sure?",
                text: `You won"t be able to revert this!`,
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: "Yes, delete it!",
                cancelButtonText: "No, cancel!",
                reverseButtons: true
            }).then(function(result) {
                if (result.value) {
                    $('#' + item_id).submit();
                } else if (result.dismiss === "cancel") {
                    Swal.fire(
                        "Cancelled",
                        "Your imaginary file is safe :)",
                        "error"
                    )
                }
            });
        }
    </script>
@endsection
