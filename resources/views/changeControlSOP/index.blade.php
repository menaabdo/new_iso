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
            <div class="card-body row" style='margin:auto;;'>

                 <h3 style="margin-top:85px;color: #2a415b;
    text-shadow: 1px 1px 1px #3ed3ea;
    font-weight: bold;">اجراء التحكم في التغيير </h3>
                <hr>
                </div>
      <div class="row" style='margin:auto;width:90%'>
     
                    <a href="{{ route('changeControlSOP.create') }}"  class="btn col-md-12 mr-1" style="width:120px;  float: right; font-size:20px ">
          <button class='shadow-lg btn btn-primary' style='border-radius: 10px;
    background-color:#001635;' id='me'><b>@lang('main.create')</b></button></a> <div class="col-12">
                <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="card">
                                    <div class="card-body">
                                        <!-- /.card-header -->
                                        <div class="card-body">
                                            <table id="example1" class="table  table-striped shadow-lg">
                                                <thead>
                                                    <tr style='background-color: #001635;color:white;text-align:center'>
                                           
                                                         <th>@lang('main.Manage Name')</th>
                                                        <th>@lang('main.Company Logo')</th>
                                                        <th style=" ">@lang('main.Status')</th>
                                                        <th data-field="Actions" class="datatable-cell "><span
                                                                style="">@lang('main.Actions')</span></th>
            
                                                    </tr>
                                                </thead>

                                                
 <tbody class="datatable-body ">
    @foreach ($all_iso as $iso)
        <tr class="datatable-row datatable-row-even" style="left: 0px;">
            <td class="datatable-cell"><span>{{ $iso->manage_name }}</span></td>
            <td class="datatable-cell"><span> <img src="{{ asset($iso->company_logo) }}"
                        alt="Image" width="50px"></span></td>
            <td class="datatable-cell" style="font-size:15px ">
                <span>{{ $iso->status }}</span>
            </td>
            @if (Auth::user()->hasRole('Employee'))
                <td>
                    <form id="delete-form-{{ $iso->id }}"
                        action="{{ route('interiorsop.destroy', $iso->id) }}" method="post">
                        <a href="{{ route('interiorsop.edit', $iso->id) }}"
                            class="btn btn-sm btn-clean
                            btn-icon mr-2"
                            title="@lang('general.edit')">
                            <i class="fa fa-edit"></i>
                        </a>
                         <a href="{{ route('interiorsop.print', $iso->id) }}"
                            class="btn btn-sm btn-clean
                            btn-icon mr-2 test"
                            title="@lang('general.print')"  target="_blank">
                            <i class="fa fa-print"></i>
                        </a>
                        @csrf
                        @method('delete')
                        @if ($iso->status == 'pending' && Auth::user()->hasRole('Employee'))
                        <button type="button" class="btn btn-sm btn-clean btn-icon"
                            title="@lang('general.delete')"
                            onclick="confirmDelete('delete-form-{{ $iso->id }}')">
                            <i class="fa fa-trash"></i>
                        </button>
                        @endif
                    </form>
                </td>
                @elseif(Auth::user()->hasRole('Admin'))
                <td>
                    <form id="delete-form-{{ $iso->id }}"
                        action="{{ route('interiorsop.destroy', $iso->id) }}" method="post">
                        <a href="{{ route('interiorsop.edit', $iso->id) }}"
                            class="btn btn-sm btn-clean
        btn-icon mr-2"
                            title="@lang('general.edit')">
                            <i class="fa fa-edit"></i>
                        </a>
                        <a href="{{ route('interiorsop.print', $iso->id) }}"
                            class="btn btn-sm btn-clean
                            btn-icon mr-2 test"
                            title="@lang('general.print')"  target="_blank">
                            <i class="fa fa-print"></i>
                        </a>
                        @csrf
                        @method('delete')
                        @if($iso->status == 'inProgress' && Auth::user()->hasRole('Admin') || $iso->status == 'pending' && Auth::user()->hasRole('Admin'))
                        <button type="button" class="btn btn-sm btn-clean btn-icon"
                            title="@lang('general.delete')"
                            onclick="confirmDelete('delete-form-{{ $iso->id }}')">
                            <i class="fa fa-trash"></i>
                        </button>
                        @endif
                    </form>
                </td>
                 @elseif($iso->status == 'inProgress' && Auth::user()->hasRole('SuperAdmin') || $iso->status == 'pending' && Auth::user()->hasRole('SuperAdmin')
                 || $iso->status == 'confirmed' && Auth::user()->hasRole('SuperAdmin'))
                <td style="font-size:15px">
                  <form id="delete-form-{{ $iso->id }}"
                      action="{{ route('interiorsop.destroy', $iso->id) }}" method="post">
                     
                          <a href="{{ route('interiorsop.edit', $iso->id) }}"
                              class="btn btn-lg  
    btn-icon "
                              title="@lang('general.edit')">
                              <i class="fa fa-edit"></i>
                          </a>
                        <a href="{{ route('interiorsop.print', $iso->id) }}"
                            class="btn btn-sm btn-clean
                            btn-icon mr-2 test"
                            title="@lang('general.print')"  target="_blank">
                            <i class="fa fa-print"></i>
                        </a>

                          {{-- <a href="{{ route('interiorsop.print', $iso->id) }}"
                             data-id="{{ $iso->id }}"
                            class="btn btn-lg btn-icon">
                            <i class="fa fa-print"></i>
                        </a> --}}
                         
                          {{-- <a href="#" data-id="{{ $iso->id }}"
                            class="btn btn-lg btn-icon print">
                            <i class="fa fa-print"></i>
                        </a> --}}
                         

                          @csrf
                          @method('delete')
                          <button type="button" class="btn btn-lg  btn-icon"
                              title="@lang('general.delete')"
                              onclick="confirmDelete('delete-form-{{ $iso->id }}')">
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
