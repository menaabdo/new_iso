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
        <div class="card" style='margin:auto;'>
<div class="card-body" style='margin:auto;'>
            <h3 class='col-md-12' style='margin:auto;margin-top:85px;text-shadow: 1px 1px 1px #3ed3ea'>سجل متابعة تقارير عدم المطابقة</h3>
            <hr>
          <div class="row" style='margin:auto;'>
           
              <a  href="{{ route('nonConformanceReport.create') }}"  class="btn col-md-12 mr-1" style="width:120px;  float: right; font-size:20px ">
          <button class='shadow-lg btn btn-primary' style='border-radius: 10px;
    background-color:#001635;' id='me'><b>إضافة جديد</b></button></a>
           
            <div class="col-12">
              <div class="card">
<div class="card-body">
              <div class="card">
<div class="card-body">
                <!-- /.card-header -->
                <div class="card-body">
                  <table id="example1" class="table table-bordered table-striped" >
                    <thead>
                    <tr>
                      <th style=" font-size:20px ">Logo</th>
                      <th style=" font-size:20px ">Status</th>
                      <th style="font-size:20px " data-field="Actions" class="datatable-cell "><span style="">Actions</span></th>
                      
                    </tr>
                    </thead>
        
                    <tbody class="datatable-body ">
                      @foreach ($all_nonConformanceReport as $nonConformanceReport)
                          <tr class="datatable-row datatable-row-even">
                              <td class="datatable-cell" style="font-size:15px "><span><img src="{{asset($nonConformanceReport->logo)}}" alt="Image" width="50px"></span></td>
                              <td class="datatable-cell" style="font-size:15px ">
                                <span>{{ $nonConformanceReport->status }}</span>
                            </td>
                            @if (Auth::user()->hasRole('Employee'))
                            <td>
                                <form id="delete-form-{{ $nonConformanceReport->id }}"
                                    action="{{ route('nonConformanceReport.destroy', $nonConformanceReport->id) }}" method="post">
                                    <a href="{{ route('nonConformanceReport.edit', $nonConformanceReport->id) }}"
                                        class="btn btn-sm btn-clean
                                        btn-icon mr-2"
                                        title="@lang('general.edit')">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <a href="{{ route('nonConformanceReport.print', $nonConformanceReport->id) }}"
                                        class="btn btn-lg btn-clean
                                        btn-icon mr-2"
                                        title="@lang('general.print')">
                                        <i class="fa fa-print"></i>
                                    </a>
                                    @csrf
                                    @method('delete')
                                    @if ($nonConformanceReport->status == 'pending' && Auth::user()->hasRole('Employee'))
                                    <button type="button" class="btn btn-sm btn-clean btn-icon"
                                        title="@lang('general.delete')"
                                        onclick="confirmDelete('delete-form-{{ $nonConformanceReport->id }}')">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                    @endif
                                </form>
                            </td>
                            @elseif(Auth::user()->hasRole('Admin'))
                            <td>
                                <form id="delete-form-{{ $nonConformanceReport->id }}"
                                    action="{{ route('nonConformanceReport.destroy', $nonConformanceReport->id) }}" method="post">
                                    <a href="{{ route('nonConformanceReport.edit', $nonConformanceReport->id) }}"
                                        class="btn btn-sm btn-clean
                    btn-icon mr-2"
                                        title="@lang('general.edit')">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <a href="{{ route('nonConformanceReport.print', $nonConformanceReport->id) }}"
                                        class="btn btn-lg btn-clean
                                        btn-icon mr-2"
                                        title="@lang('general.print')">
                                        <i class="fa fa-print"></i>
                                    </a>
                                    @csrf
                                    @method('delete')
                                    @if($nonConformanceReport->status == 'inProgress' && Auth::user()->hasRole('Admin') || $nonConformanceReport->status == 'pending' && Auth::user()->hasRole('Admin'))
                                    <button type="button" class="btn btn-sm btn-clean btn-icon"
                                        title="@lang('general.delete')"
                                        onclick="confirmDelete('delete-form-{{ $nonConformanceReport->id }}')">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                    @endif
                                </form>
                            </td>
                             @elseif($nonConformanceReport->status == 'inProgress' && Auth::user()->hasRole('SuperAdmin') || $nonConformanceReport->status == 'pending' && Auth::user()->hasRole('SuperAdmin')
                             || $nonConformanceReport->status == 'confirmed' && Auth::user()->hasRole('SuperAdmin'))
                            <td style="font-size:15px">
                              <form id="delete-form-{{ $nonConformanceReport->id }}"
                                  action="{{ route('nonConformanceReport.destroy', $nonConformanceReport->id) }}" method="post">
                                 
                                      <a href="{{ route('nonConformanceReport.edit', $nonConformanceReport->id) }}"
                                          class="btn btn-lg  
                btn-icon "
                                          title="@lang('general.edit')">
                                          <i class="fa fa-edit"></i>
                                      </a>
                                    <a href="{{ route('nonConformanceReport.print', $nonConformanceReport->id) }}"
                                        class="btn btn-lg btn-clean
                                        btn-icon mr-2"
                                        title="@lang('general.print')">
                                        <i class="fa fa-print"></i>
                                    </a>
                                      @csrf
                                      @method('delete')
                                      <button type="button" class="btn btn-lg  btn-icon"
                                          title="@lang('general.delete')"
                                          onclick="confirmDelete('delete-form-{{ $nonConformanceReport->id }}')">
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