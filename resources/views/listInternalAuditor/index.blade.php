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
        <div class="card row" style='margin:auto;'>
<div class="card-body " style='margin:auto;width:90%'>
    
                <h3 style="margin-top:85px;text-shadow: 1px 1px 1px #3ed3ea;">قائمة المراجعين الداخليين المعتمدين لنظام الجودة</h3>
                <hr>
                <div class="row">

                    <a href="{{ route('listInternalAuditor.create') }}" class="btn col-md-12 mr-1">
                    <button class='shadow-lg btn btn-light' style='color:  #001635; 
    background-color: white;' id='me'> اضافة جديدة</button></a>
       
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="card">
                                    <div class="card-body">
                                        <!-- /.card-header -->
                                        <div class="card-body">
                                            <table id="example1" class="table shadwo-lg  table-striped">
                                                <thead>
                                                    <tr>
                                                        <th style="     text-align: center;"> Company Name</th>
                                                        <th style="    text-align: center; ">Status</th>
                                                        <th style="    text-align: center;" data-field="Actions"
                                                            class="datatable-cell "><span style="">Actions</span></th>

                                                    </tr>
                                                </thead>

                                                <tbody class="datatable-body text-center">
                                                    @foreach ($all_listInternalAuditor as $listInternalAuditor)
                                                        <tr class="datatable-row datatable-row-even">
                                                            <td class="datatable-cell" style="font-size:15px ">
                                                                <span>{{ $listInternalAuditor->company_name }}</span></td>
                                                           
                                                            <td class="datatable-cell" style="font-size:15px ">
                                                                <span>{{ $listInternalAuditor->status }}</span>
                                                            </td>
                                                            @if (Auth::user()->hasRole('Employee'))
                                                                <td>
                                                                    <form id="delete-form-{{ $listInternalAuditor->id }}"
                                                                        action="{{ route('listInternalAuditor.destroy', $listInternalAuditor->id) }}"
                                                                        method="post">
                                                                        <a href="{{ route('listInternalAuditor.edit', $listInternalAuditor->id) }}"
                                                                            class="btn btn-sm btn-clean
                                            btn-icon mr-2"
                                                                            title="@lang('general.edit')">
                                                                            <i class="fa fa-edit"></i>
                                                                        </a>
                                                                         <a href="{{ route('listInternalAuditor.print', $listInternalAuditor->id) }}"
                                                                            class="btn btn-lg btn-clean
                                                                            btn-icon mr-2"
                                                                            title="@lang('general.print')">
                                                                            <i class="fa fa-print"></i>
                                                                        </a>
                                                                        @csrf
                                                                        @method('delete')
                                                                        @if ($listInternalAuditor->status == 'pending' && Auth::user()->hasRole('Employee'))
                                                                            <button type="button"
                                                                                class="btn btn-sm btn-clean btn-icon"
                                                                                title="@lang('general.delete')"
                                                                                onclick="confirmDelete('delete-form-{{ $listInternalAuditor->id }}')">
                                                                                <i class="fa fa-trash"></i>
                                                                            </button>
                                                                        @endif
                                                                    </form>
                                                                </td>
                                                            @elseif(Auth::user()->hasRole('Admin'))
                                                                <td>
                                                                    <form id="delete-form-{{ $listInternalAuditor->id }}"
                                                                        action="{{ route('listInternalAuditor.destroy', $listInternalAuditor->id) }}"
                                                                        method="post">
                                                                        <a href="{{ route('listInternalAuditor.edit', $listInternalAuditor->id) }}"
                                                                            class="btn btn-sm btn-clean
                                            btn-icon mr-2"
                                                                            title="@lang('general.edit')">
                                                                            <i class="fa fa-edit"></i>
                                                                        </a>
                                                                          <a href="{{ route('listInternalAuditor.print', $listInternalAuditor->id) }}"
                                                                            class="btn btn-lg btn-clean
                                                                            btn-icon mr-2"
                                                                            title="@lang('general.print')">
                                                                            <i class="fa fa-print"></i>
                                                                        </a>
                                                                        @csrf
                                                                        @method('delete')
                                                                        @if (($listInternalAuditor->status == 'inProgress' && Auth::user()->hasRole('Admin')) ||
                                                                            ($listInternalAuditor->status == 'pending' && Auth::user()->hasRole('Admin')))
                                                                            <button type="button"
                                                                                class="btn btn-sm btn-clean btn-icon"
                                                                                title="@lang('general.delete')"
                                                                                onclick="confirmDelete('delete-form-{{ $listInternalAuditor->id }}')">
                                                                                <i class="fa fa-trash"></i>
                                                                            </button>
                                                                        @endif
                                                                    </form>
                                                                </td>
                                                            @elseif(($listInternalAuditor->status == 'inProgress' && Auth::user()->hasRole('SuperAdmin')) ||
                                                                ($listInternalAuditor->status == 'pending' && Auth::user()->hasRole('SuperAdmin')) ||
                                                                ($listInternalAuditor->status == 'confirmed' && Auth::user()->hasRole('SuperAdmin')))
                                                                <td style="font-size:15px">
                                                                    <form id="delete-form-{{ $listInternalAuditor->id }}"
                                                                        action="{{ route('listInternalAuditor.destroy', $listInternalAuditor->id) }}"
                                                                        method="post">

                                                                        <a href="{{ route('listInternalAuditor.edit', $listInternalAuditor->id) }}"
                                                                            class="btn btn-lg  
                                        btn-icon "
                                                                            title="@lang('general.edit')">
                                                                            <i class="fa fa-edit"></i>
                                                                        </a>
                                                                          <a href="{{ route('listInternalAuditor.print', $listInternalAuditor->id) }}"
                                                                            class="btn btn-lg btn-clean
                                                                            btn-icon mr-2"
                                                                            title="@lang('general.print')">
                                                                            <i class="fa fa-print"></i>
                                                                        </a>

                                                                        {{-- <a href="{{ route('listInternalAuditor.print', $listInternalAuditor->id) }}"
                                                                 data-id="{{ $listInternalAuditor->id }}"
                                                                class="btn btn-lg btn-icon">
                                                                <i class="fa fa-print"></i>
                                                            </a> --}}

                                                                        {{-- <a href="#" data-id="{{ $listInternalAuditor->id }}"
                                                                class="btn btn-lg btn-icon print">
                                                                <i class="fa fa-print"></i>
                                                            </a> --}}


                                                                        @csrf
                                                                        @method('delete')
                                                                        <button type="button" class="btn btn-lg  btn-icon"
                                                                            title="@lang('general.delete')"
                                                                            onclick="confirmDelete('delete-form-{{ $listInternalAuditor->id }}')">
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
