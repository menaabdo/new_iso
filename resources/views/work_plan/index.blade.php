@extends('layouts.master')

@section('content')
<style>
      .shadow-lg {
    box-shadow: 0 1rem 3rem rgba(0,0,0,.175)!important;}
    input{

    box-shadow: 0 1rem 3rem rgba(0,0,0,.175)!important;}
 
    </style>
<section class="content" style='margin:auto;'>
        <div class="card" style='margin:auto;'>
<div class="card-body row" style='margin:auto;'>
               <h3 style="margin-top:85px;text-shadow: 1px 1px 1px #3ed3ea;">الخطة السنوية للمراجعات الداخلية</h3>
                <hr>
      </div>
                <div class="row" style='margin:auto;width:90%'>

                    <a href="{{ route('work_plan.create') }}" class="btn col-md-12 mr-1">
                    <button class='shadow-lg btn btn-light' style='color:  #001635; 
    background-color: white;' id='me'> اضافة جديدة</button></a>
       
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="card">
                                    <div class="card-body">
                                        <!-- /.card-header -->
                                        <div class="card-body">
                                            <table id="example1" class="table shadow-lg table-striped">
                                                <thead>
                                                    <tr>
                                                        <th style=" text-align:center "> Date</th>
                                                        <th style=" text-align:center ">Status</th>
                                                        <th style="text-align:center " data-field="Actions"
                                                            class="datatable-cell "><span style="">Actions</span></th>

                                                    </tr>
                                                </thead>

                                                <tbody class="datatable-body ">
                                                    @foreach ($all_work_plan as $work_plan)
                                                        <tr class="datatable-row datatable-row-even">
                                                            <td class="datatable-cell" style="font-size:15px ">
                                                                <span>{{ $work_plan->date_1 }}</span></td>
                                                            <td class="datatable-cell" style="font-size:15px ">
                                                                <span>{{ $work_plan->status }}</span>
                                                            </td>
                                                            @if (Auth::user()->hasRole('Employee'))
                                                                <td>
                                                                    <form id="delete-form-{{ $work_plan->id }}"
                                                                        action="{{ route('work_plan.destroy', $work_plan->id) }}"
                                                                        method="post">
                                                                        <a href="{{ route('work_plan.edit', $work_plan->id) }}"
                                                                            class="btn btn-sm btn-clean
                                            btn-icon mr-2"
                                                                            title="@lang('general.edit')">
                                                                            <i class="fa fa-edit"></i>
                                                                        </a>
                                                                        <a href="{{ route('work_plan.print', $work_plan->id) }}"
                                                                            class="btn btn-lg btn-clean
                                                                                btn-icon mr-2"
                                                                            title="@lang('general.print')">
                                                                            <i class="fa fa-print"></i>
                                                                        </a>
                                                                        @csrf
                                                                        @method('delete')
                                                                        @if ($work_plan->status == 'pending' && Auth::user()->hasRole('Employee'))
                                                                            <button type="button"
                                                                                class="btn btn-sm btn-clean btn-icon"
                                                                                title="@lang('general.delete')"
                                                                                onclick="confirmDelete('delete-form-{{ $work_plan->id }}')">
                                                                                <i class="fa fa-trash"></i>
                                                                            </button>
                                                                        @endif
                                                                    </form>
                                                                </td>
                                                            @elseif(Auth::user()->hasRole('Admin'))
                                                                <td>
                                                                    <form id="delete-form-{{ $work_plan->id }}"
                                                                        action="{{ route('work_plan.destroy', $work_plan->id) }}"
                                                                        method="post">
                                                                        <a href="{{ route('work_plan.edit', $work_plan->id) }}"
                                                                            class="btn btn-sm btn-clean
                                            btn-icon mr-2"
                                                                            title="@lang('general.edit')">
                                                                            <i class="fa fa-edit"></i>
                                                                        </a>
                                                                          <a href="{{ route('work_plan.print', $work_plan->id) }}"
                                                                            class="btn btn-lg btn-clean
                                                                                btn-icon mr-2"
                                                                            title="@lang('general.print')">
                                                                            <i class="fa fa-print"></i>
                                                                        </a>
                                                                        @csrf
                                                                        @method('delete')
                                                                        @if (($work_plan->status == 'inProgress' && Auth::user()->hasRole('Admin')) ||
                                                                            ($work_plan->status == 'pending' && Auth::user()->hasRole('Admin')))
                                                                            <button type="button"
                                                                                class="btn btn-sm btn-clean btn-icon"
                                                                                title="@lang('general.delete')"
                                                                                onclick="confirmDelete('delete-form-{{ $work_plan->id }}')">
                                                                                <i class="fa fa-trash"></i>
                                                                            </button>
                                                                        @endif
                                                                    </form>
                                                                </td>
                                                            @elseif(($work_plan->status == 'inProgress' && Auth::user()->hasRole('SuperAdmin')) ||
                                                                ($work_plan->status == 'pending' && Auth::user()->hasRole('SuperAdmin')) ||
                                                                ($work_plan->status == 'confirmed' && Auth::user()->hasRole('SuperAdmin')))
                                                                <td style="font-size:15px">
                                                                    <form id="delete-form-{{ $work_plan->id }}"
                                                                        action="{{ route('work_plan.destroy', $work_plan->id) }}"
                                                                        method="post">

                                                                        <a href="{{ route('work_plan.edit', $work_plan->id) }}"
                                                                            class="btn btn-lg  
                                        btn-icon "
                                                                            title="@lang('general.edit')">
                                                                            <i class="fa fa-edit"></i>
                                                                        </a>
                                                                        <a href="{{ route('work_plan.print', $work_plan->id) }}"
                                                                            class="btn btn-lg btn-clean
                                                                                btn-icon mr-2"
                                                                            title="@lang('general.print')">
                                                                            <i class="fa fa-print"></i>
                                                                        </a>

                                                                    
                                                                        @csrf
                                                                        @method('delete')
                                                                        <button type="button" class="btn btn-lg  btn-icon"
                                                                            title="@lang('general.delete')"
                                                                            onclick="confirmDelete('delete-form-{{ $work_plan->id }}')">
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
