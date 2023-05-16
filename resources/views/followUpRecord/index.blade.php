@extends('layouts.master')

@section('content')
    <style>
        .shadow-lg {
            box-shadow: 0 1rem 3rem rgba(0, 0, 0, .175) !important;
        }

        #me:hover {
            transform: scale(1.1);
            box-shadow: 0 1rem 3rem rgba(0, 0, 0, .175) !important;
        }
    </style>
    <section class="content" style='margin:auto;'>
        <div class="card">
            <div class="card-body row" style='margin:auto;;'>

                <h3 style="margin-top:85px;color: #2a415b;
    text-shadow: 1px 1px 1px #3ed3ea;
    font-weight: bold;">@lang('main.Follow-up record of corrective/preventive action requests')</h3>
                <hr>
            </div>
            <div class="row" style='margin:auto;width:90%'>

                <a href="{{ route('followUpRecord.create') }}" class="btn col-md-12 mr-1"
                    style="width:120px;  float: right; font-size:20px ">
                    <button class='shadow-lg btn btn-primary' style='border-radius: 10px;
    background-color:#001635;'
                        id='me'><b>@lang('main.create')</b></button></a>
                <div class="col-12">
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

                                                      <th style=" text-align:center ">@lang('main.Company Logo')</th>
                                                        <th data-field="Actions" class="datatable-cell "><span
                                                                style="">@lang('main.Actions')</span></th>
                                                    </tr>
                                                </thead>


                                                <tbody class="datatable-body ">
                                                    <tbody class="datatable-body text-center ">
                                                        @foreach ($all_followUpRecord as $followUpRecord)
                                                        <tr class="datatable-row datatable-row-even">
                                                            <td class="datatable-cell" style="font-size:15px "><span><img src="{{asset($followUpRecord->logo)}}" alt="Image" width="50px"></span></td>
                                                            <td style="font-size:15px">
                                                                <form id="delete-form-{{ $followUpRecord->id }}" 
                                                                    action="{{ route('followUpRecord.destroy', $followUpRecord->id) }}" method="post">
                                                                    <a href="{{ route('followUpRecord.edit', $followUpRecord->id) }}" class="btn btn-lg  
                                                                            btn-icon " title="@lang('general.edit')" >
                                                                        <i class="fa fa-edit" ></i>
                                                                    </a>
                                                                     <a href="{{ route('followUpRecord.print', $followUpRecord->id) }}" class="btn btn-lg  
                                                                            btn-icon test" title="@lang('general.print')" target="_blank" >
                                                                        <i class="fa fa-print" ></i>
                                                                    </a>
                                                                    @csrf
                                                                    @method('delete')
                                                                    <button type="button" class="btn btn-lg  btn-icon" 
                                                                        title="@lang('general.delete')"
                                                                        onclick="confirmDelete('delete-form-{{ $followUpRecord->id }}')">
                                                                        <i class="fa fa-trash" ></i>
                                                                    </button>
                                                                </form>
                                                            </td>
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