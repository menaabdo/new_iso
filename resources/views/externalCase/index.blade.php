@extends('layouts.master')
@section('content')

    <section class="content" style='margin:auto;'>
        <div class="card" style='margin:auto;'>
<div class="card-body" style='margin:auto;'>
          <h3 class='col-md-12' style='margin:auto;margin-top:85px;text-shadow: 1px 1px 1px #3ed3ea'>استمارة قضايا خارجيه</h3>
          <hr>
          <div class="row" >
           
              <a  href="{{ route('externalCases.create') }}" class="btn col-md-12 mr-1" style="width:120px;  float: right; font-size:20px ">
              <button class='shadow-lg btn btn-light' style='color:  #001635; 
    background-color: white;' id='me'> اضافة جديدة</button></a> <div class="col-12">
             
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
                      @foreach ($all_externalCases as $externalCases)
                          <tr class="datatable-row datatable-row-even">
                              <td class="datatable-cell" style="font-size:15px "><span><img src="{{asset($externalCases->logo)}}" alt="Image" width="50px"></span></td>
                              <td class="datatable-cell" style="font-size:15px ">
                                <span>{{ $externalCases->status }}</span>
                            </td>
                            @if (Auth::user()->hasRole('Employee'))
                                                    <td>
                                                        <form id="delete-form-{{ $externalCases->id }}"
                                                            action="{{ route('externalCases.destroy', $externalCases->id) }}" method="post">
                                                            <a href="{{ route('externalCases.edit', $externalCases->id) }}"
                                                                class="btn btn-sm btn-clean
                                                                btn-icon mr-2"
                                                                title="@lang('general.edit')">
                                                                <i class="fa fa-edit"></i>
                                                            </a>
                                                           <a href="{{ route('externalCases.print', $externalCases->id) }}"
                                                                class="btn btn-lg btn-clean
                                                                btn-icon mr-2"
                                                                title="@lang('general.print')">
                                                                <i class="fa fa-print"></i>
                                                            </a>
                                                            @csrf
                                                            @method('delete')
                                                            @if ($externalCases->status == 'pending' && Auth::user()->hasRole('Employee'))
                                                            <button type="button" class="btn btn-sm btn-clean btn-icon"
                                                                title="@lang('general.delete')"
                                                                onclick="confirmDelete('delete-form-{{ $externalCases->id }}')">
                                                                <i class="fa fa-trash"></i>
                                                            </button>
                                                            @endif
                                                        </form>
                                                    </td>
                                                    @elseif(Auth::user()->hasRole('Admin'))
                                                    <td>
                                                        <form id="delete-form-{{ $externalCases->id }}"
                                                            action="{{ route('externalCases.destroy', $externalCases->id) }}" method="post">
                                                            <a href="{{ route('externalCases.edit', $externalCases->id) }}"
                                                                class="btn btn-sm btn-clean
                                            btn-icon mr-2"
                                                                title="@lang('general.edit')">
                                                                <i class="fa fa-edit"></i>
                                                            </a>
                                                             <a href="{{ route('externalCases.print', $externalCases->id) }}"
                                                                class="btn btn-lg btn-clean
                                                                btn-icon mr-2"
                                                                title="@lang('general.print')">
                                                                <i class="fa fa-print"></i>
                                                            </a>
                                                            @csrf
                                                            @method('delete')
                                                            @if($externalCases->status == 'inProgress' && Auth::user()->hasRole('Admin') || $externalCases->status == 'pending' && Auth::user()->hasRole('Admin'))
                                                            <button type="button" class="btn btn-sm btn-clean btn-icon"
                                                                title="@lang('general.delete')"
                                                                onclick="confirmDelete('delete-form-{{ $externalCases->id }}')">
                                                                <i class="fa fa-trash"></i>
                                                            </button>
                                                            @endif
                                                        </form>
                                                    </td>
                                                     @elseif($externalCases->status == 'inProgress' && Auth::user()->hasRole('SuperAdmin') || $externalCases->status == 'pending' && Auth::user()->hasRole('SuperAdmin')
                                                     || $externalCases->status == 'confirmed' && Auth::user()->hasRole('SuperAdmin'))
                                                    <td style="font-size:15px">
                                                      <form id="delete-form-{{ $externalCases->id }}"
                                                          action="{{ route('externalCases.destroy', $externalCases->id) }}" method="post">
                                                         
                                                              <a href="{{ route('externalCases.edit', $externalCases->id) }}"
                                                                  class="btn btn-lg  
                                        btn-icon "
                                                                  title="@lang('general.edit')">
                                                                  <i class="fa fa-edit"></i>
                                                              </a>
                                                          <a href="{{ route('externalCases.print', $externalCases->id) }}"
                                                                class="btn btn-lg btn-clean
                                                                btn-icon mr-2"
                                                                title="@lang('general.print')">
                                                                <i class="fa fa-print"></i>
                                                            </a>

                                                              {{-- <a href="{{ route('externalCases.print', $externalCases->id) }}"
                                                                 data-id="{{ $externalCases->id }}"
                                                                class="btn btn-lg btn-icon">
                                                                <i class="fa fa-print"></i>
                                                            </a> --}}
                                                             
                                                              {{-- <a href="#" data-id="{{ $externalCases->id }}"
                                                                class="btn btn-lg btn-icon print">
                                                                <i class="fa fa-print"></i>
                                                            </a> --}}
                                                             
    
                                                              @csrf
                                                              @method('delete')
                                                              <button type="button" class="btn btn-lg  btn-icon"
                                                                  title="@lang('general.delete')"
                                                                  onclick="confirmDelete('delete-form-{{ $externalCases->id }}')">
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