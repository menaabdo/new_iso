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
          <h3 class='col-md-12' style='margin:auto;margin-top:85px;text-shadow: 1px 1px 1px #3ed3ea;text-align:center'>نموذج إستلام وثائق/نماذج</h3>
          <hr>
          <div class="row" style='margin:auto;'>
           
              <a  href="{{ route('typicalForm.create') }}"  class="btn col-md-12 mr-1" style="">
          <button class='shadow-lg btn btn-primary' style='border-radius: 10px;
    background-color:#001635;' id='me'><b>إضافة جديد</b></button></a> <div class="col-12">
                   
            <div class="col-12">
              <div class="card">
<div class="card-body">
              <div class="card">
<div class="card-body">
                <!-- /.card-header -->
                <div class="card-body" style='overflow-x:auto'>
                  <table id="example1" class="table table-bordered table-striped" >
                    <thead style='background-color: #001635;color:white;text-align:center'>
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
                                  <form id="delete-form-{{ $typicalForm->id }}" class='d-flex justify-content-center'
                                      action="{{ route('typicalForm.destroy', $typicalForm->id) }}" method="post">
                                      <a href="{{ route('typicalForm.edit', $typicalForm->id) }}" class="btn btn-lg  
                                              btn-icon " title="@lang('general.edit')" >
                                          <i class="fa fa-edit" ></i>
                                      </a>
                                    <a href="{{ route('typicalForm.print', $typicalForm->id) }}" class="btn btn-lg  
                                              btn-icon test" title="@lang('general.print')" target="_blank">
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
     <script>
     $(".test").on('click', function(e) {
          window.open(''.e.target.href.'', "_blank");
   
  });
      
    </script>
    @endsection