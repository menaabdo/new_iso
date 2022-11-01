@extends('layouts.master')

@section('content')



    <section class="content">
        <div class="card">
<div class="card-body">
          <h3 style="margin-top:85px;">نموذج إستلام وثائق/نماذج</h3>
          <hr>
          <div class="row" >
           
              <a  href="{{ route('typicalForm.create') }}" class="btn btn-primary mr-1" style="width:120px;  float: right; font-size:20px ">
                  اضافه جديد <i class="icon-lg la la-file-medical"></i></a>
           
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
                      <th style="font-size:20px " data-field="Actions" class="datatable-cell "><span style="">Actions</span></th>
                      
                    </tr>
                    </thead>
        
                    <tbody class="datatable-body ">
                      @foreach ($all_typicalForm as $typicalForm)
                          <tr class="datatable-row datatable-row-even">
                              <td class="datatable-cell" style="font-size:15px "><span><img src="{{asset($typicalForm->logo)}}" alt="Image" width="50px"></span></td>
                              <td style="font-size:15px">
                                  <form id="delete-form-{{ $typicalForm->id }}" 
                                      action="{{ route('typicalForm.destroy', $typicalForm->id) }}" method="post">
                                      <a href="{{ route('typicalForm.edit', $typicalForm->id) }}" class="btn btn-lg  
                                              btn-icon " title="@lang('general.edit')" >
                                          <i class="fa fa-edit" ></i>
                                      </a>
                                    <a href="{{ route('typicalForm.print', $typicalForm->id) }}" class="btn btn-lg  
                                              btn-icon " title="@lang('general.print')" >
                                          <i class="fa fa-print" ></i>
                                      </a>
                                      @csrf
                                      @method('delete')
                                      <button type="button" class="btn btn-lg  btn-icon" 
                                          title="@lang('general.delete')"
                                          onclick="confirmDelete('delete-form-{{ $typicalForm->id }}')">
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
    
    @endsection