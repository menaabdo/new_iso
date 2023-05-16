@extends('layouts.master')

@section('content')
    <!-- Content Header (Page header) -->
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
            <div class="card-body row" style='margin:auto;;'>


            <h3 style="margin-top:85px;color: #2a415b;
    text-shadow: 1px 1px 1px #3ed3ea;
    font-weight: bold;">@lang('main.Notify of an internal  audit')</h3>
            <hr>
      </div>
      <div class="row" style='margin:auto;width:90%'>
     
                    <a href="{{ route('noticeInternal.create') }}" class="btn col-md-12 mr-1" style="margin-top: 40px;">
               <button class='shadow-lg btn btn-primary' style='border-radius: 10px;
    background-color:#001635;' id='me'><b>@lang('main.create')</b></button></a> <div class="col-12">
              
                    <div class="card">
<div class="card-body">
                        <div class="card">
<div class="card-body">
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table  table-striped shadow-lg" style=''>
                                    <thead>
                                        <tr style='background-color: #001635;color:white;text-align:center'>
                                            <th style=" ">@lang('main.Revision Number')</th>
                                            <th style=" ">@lang('main.Place Review')</th>
                                            <th style=" ">@lang('main.Status')</th>
                                            <th data-field="Actions" class="datatable-cell "><span
                                                    style="">@lang('main.Actions')</span></th>

                                        </tr>
                                    </thead>

                                    <tbody class="datatable-body text-center">
                                        @foreach ($all_noticeInternal as $notice)
                                        <tr class="datatable-row datatable-row-even">
                                            <td class="datatable-cell" style="font-size:15px ">
                                                <span>{{ $notice->revision_number }}</span></td>
                                            <td class="datatable-cell" style="font-size:15px ">
                                                <span>{{ $notice->place_review }}</span></td>
                                            <td class="datatable-cell" style="font-size:15px ">
                                                <span>{{ $notice->status }}</span>
                                            </td>
                                            @if (Auth::user()->hasRole('Employee'))
                                                <td>
                                                    <form id="delete-form-{{ $notice->id }}"
                                                        action="{{ route('noticeInternal.destroy', $notice->id) }}"
                                                        method="post">
                                                        <a href="{{ route('noticeInternal.edit', $notice->id) }}"
                                                            class="btn btn-sm btn-clean
                            btn-icon mr-2"
                                                            title="@lang('general.edit')">
                                                            <i class="fa fa-edit"></i>
                                                        </a>
                                                        @csrf
                                                        @method('delete')
                                                        @if ($notice->status == 'pending' && Auth::user()->hasRole('Employee'))
                                                            <button type="button"
                                                                class="btn btn-sm btn-clean btn-icon"
                                                                title="@lang('general.delete')"
                                                                onclick="confirmDelete('delete-form-{{ $notice->id }}')">
                                                                <i class="fa fa-trash"></i>
                                                            </button>
                                                        @endif
                                                    </form>
                                                </td>
                                            @elseif(Auth::user()->hasRole('Admin'))
                                                <td>
                                                    <form id="delete-form-{{ $notice->id }}"
                                                        action="{{ route('noticeInternal.destroy', $notice->id) }}"
                                                        method="post">
                                                        <a href="{{ route('noticeInternal.edit', $notice->id) }}"
                                                            class="btn btn-sm btn-clean
                            btn-icon mr-2"
                                                            title="@lang('general.edit')">
                                                            <i class="fa fa-edit"></i>
                                                        </a>
                                                        @csrf
                                                        @method('delete')
                                                        @if (($notice->status == 'inProgress' && Auth::user()->hasRole('Admin')) ||
                                                            ($notice->status == 'pending' && Auth::user()->hasRole('Admin')))
                                                            <button type="button"
                                                                class="btn btn-sm btn-clean btn-icon"
                                                                title="@lang('general.delete')"
                                                                onclick="confirmDelete('delete-form-{{ $notice->id }}')">
                                                                <i class="fa fa-trash"></i>
                                                            </button>
                                                        @endif
                                                    </form>
                                                </td>
                                            @elseif(($notice->status == 'inProgress' && Auth::user()->hasRole('SuperAdmin')) ||
                                                ($notice->status == 'pending' && Auth::user()->hasRole('SuperAdmin')) ||
                                                ($notice->status == 'confirmed' && Auth::user()->hasRole('SuperAdmin')))
                                                <td style="font-size:15px">
                                                    <form id="delete-form-{{ $notice->id }}"
                                                        action="{{ route('noticeInternal.destroy', $notice->id) }}"
                                                        method="post">

                                                        <a href="{{ route('noticeInternal.edit', $notice->id) }}"
                                                            class="btn btn-lg  
                        btn-icon "
                                                            title="@lang('general.edit')">
                                                            <i class="fa fa-edit"></i>
                                                        </a>

                                                        <a href="{{ route('noticeInternal.print', $notice->id) }}"
                                                            data-id="{{ $notice->id }}"
                                                            class="btn btn-lg btn-icon test" target="_blank">
                                                            <i class="fa fa-print"></i>
                                                        </a>

                                                        {{-- <a href="#" data-id="{{ $notice->id }}"
                                                class="btn btn-lg btn-icon print">
                                                <i class="fa fa-print"></i>
                                            </a> --}}


                                                        @csrf
                                                        @method('delete')
                                                        <button type="button" class="btn btn-lg  btn-icon"
                                                            title="@lang('general.delete')"
                                                            onclick="confirmDelete('delete-form-{{ $notice->id }}')">
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
<script>
$(".test").on('click', function(e) {
window.open(''.e.target.href.'', "_blank");

});

</script>
@endsection