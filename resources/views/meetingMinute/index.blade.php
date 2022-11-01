@extends('layouts.master')

@section('content')



<style>
      .shadow-lg {
    box-shadow: 0 1rem 3rem rgba(0,0,0,.175)!important;}
    
    </style>

    <section class="content row" style='flex-wrap:nowrap;'>

        <div class="card container col-md-10" style='margin-left: 10px'>
<div class="card-body  ">
          <h3 style="margin-top:85px;  text-shadow: 1px 1px 1px #3ed3ea;">محضر إجتماع مراجعة الإدارة</h3>
          <hr>
          <div class="row" >
           
              <a  href="{{ route('meetingMinute.create') }}" class="btn btn-primary mr-1" style="width:120px;  float: right; font-size:20px ">
                  جديد <i class="icon-lg la la-file-medical"></i></a>
           
            <div class="col-12">
              <div class="card">
<div class="card-body">
              <div class="card">
<div class="card-body">
                <!-- /.card-header -->
                <div class="card-body">
                  <table id="example1" class="table shadow-lg table-striped shadow-lg" >
                    <thead>
                    <tr>
                      <th style="  ">Meeting Minutes Number </th>
                      <th style=" ">Logo</th>
                      <th style=" ">Status</th>
                      <th style="" data-field="Actions" class="datatable-cell "><span style="">Actions</span></th>
                      
                    </tr>
                    </thead>
        
                    <tbody class="datatable-body ">
                      @foreach ($all_meetingMinute as $meetingMinute)
                          <tr class="datatable-row datatable-row-even">
                            <td class="datatable-cell" style="font-size:15px "><span>{{$meetingMinute->num}} </span></td>
                              <td class="datatable-cell" style="font-size:15px "><span><img src="{{asset($meetingMinute->logo)}}" alt="Image" width="50px"></span></td>
                              <td class="datatable-cell" style="font-size:15px ">
                                <span>{{ $meetingMinute->status }}</span>
                            </td>
                            @if (Auth::user()->hasRole('Employee'))
                                                    <td>
                                                        <form id="delete-form-{{ $meetingMinute->id }}"
                                                            action="{{ route('meetingMinute.destroy', $meetingMinute->id) }}" method="post">
                                                            <a href="{{ route('meetingMinute.edit', $meetingMinute->id) }}"
                                                                class="btn btn-sm btn-clean
                                                                     btn-icon mr-2"
                                                                title="@lang('general.edit')">
                                                                <i class="fa fa-edit"></i>
                                                            </a>
                                                            <a href="{{ route('meetingMinute.print', $meetingMinute->id) }}"
                                                                class="btn btn-lg btn-clean
                                                                     btn-icon mr-2"
                                                                title="@lang('general.print')">
                                                                <i class="fa fa-print"></i>
                                                            </a>
                                                            @csrf
                                                            @method('delete')
                                                            @if ($meetingMinute->status == 'pending' && Auth::user()->hasRole('Employee'))
                                                            <button type="button" class="btn btn-sm btn-clean btn-icon"
                                                                title="@lang('general.delete')"
                                                                onclick="confirmDelete('delete-form-{{ $meetingMinute->id }}')">
                                                                <i class="fa fa-trash"></i>
                                                            </button>
                                                            @endif
                                                        </form>
                                                    </td>
                                                    @elseif(Auth::user()->hasRole('Admin'))
                                                    <td>
                                                        <form id="delete-form-{{ $meetingMinute->id }}"
                                                            action="{{ route('meetingMinute.destroy', $meetingMinute->id) }}" method="post">
                                                            <a href="{{ route('meetingMinute.edit', $meetingMinute->id) }}"
                                                                class="btn btn-sm btn-clean
                                            btn-icon mr-2"
                                                                title="@lang('general.edit')">
                                                                <i class="fa fa-edit"></i>
                                                            </a>
                                                             <a href="{{ route('meetingMinute.print', $meetingMinute->id) }}"
                                                                class="btn btn-sm btn-clean
                                                                     btn-icon mr-2"
                                                                title="@lang('general.print')">
                                                                <i class="fa fa-print"></i>
                                                            </a>
                                                            @csrf
                                                            @method('delete')
                                                            @if($meetingMinute->status == 'inProgress' && Auth::user()->hasRole('Admin') || $meetingMinute->status == 'pending' && Auth::user()->hasRole('Admin'))
                                                            <button type="button" class="btn btn-sm btn-clean btn-icon"
                                                                title="@lang('general.delete')"
                                                                onclick="confirmDelete('delete-form-{{ $meetingMinute->id }}')">
                                                                <i class="fa fa-trash"></i>
                                                            </button>
                                                            @endif
                                                        </form>
                                                    </td>
                                                     @elseif($meetingMinute->status == 'inProgress' && Auth::user()->hasRole('SuperAdmin') || $meetingMinute->status == 'pending' && Auth::user()->hasRole('SuperAdmin')
                                                     || $meetingMinute->status == 'confirmed' && Auth::user()->hasRole('SuperAdmin'))
                                                    <td style="font-size:15px">
                                                      <form id="delete-form-{{ $meetingMinute->id }}"
                                                          action="{{ route('meetingMinute.destroy', $meetingMinute->id) }}" method="post">
                                                         
                                                              <a href="{{ route('meetingMinute.edit', $meetingMinute->id) }}"
                                                                  class="btn btn-lg  
                                        btn-icon "
                                                                  title="@lang('general.edit')">
                                                                  <i class="fa fa-edit"></i>
                                                              </a>
                                                               <a href="{{ route('meetingMinute.print', $meetingMinute->id) }}"
                                                                class="btn btn-lg btn-clean
                                                                     btn-icon mr-2"
                                                                title="@lang('general.print')">
                                                                <i class="fa fa-print"></i>
                                                            </a>

                                                              {{-- <a href="{{ route('meetingMinute.print', $meetingMinute->id) }}"
                                                                 data-id="{{ $meetingMinute->id }}"
                                                                class="btn btn-lg btn-icon">
                                                                <i class="fa fa-print"></i>
                                                            </a> --}}
                                                             
                                                              {{-- <a href="#" data-id="{{ $meetingMinute->id }}"
                                                                class="btn btn-lg btn-icon print">
                                                                <i class="fa fa-print"></i>
                                                            </a> --}}
                                                             
    
                                                              @csrf
                                                              @method('delete')
                                                              <button type="button" class="btn btn-lg  btn-icon"
                                                                  title="@lang('general.delete')"
                                                                  onclick="confirmDelete('delete-form-{{ $meetingMinute->id }}')">
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