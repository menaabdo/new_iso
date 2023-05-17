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
    <div class="card" >
<div class="card-body row" style='margin:auto;'>
      <h3 class='col-md-12' style='margin:auto;margin-top:85px;text-shadow: 1px 1px 1px #3ed3ea;text-align:center'>سجل حصر الاجراءات المستخدمة</h3>
      <hr>
</div>
      <div class="row" style='margin:auto;'>
    
          <a  href="{{ route('recordAction.create') }}"  class="btn col-md-12 mr-1" style=" ">
          <button class='shadow-lg btn btn-primary' style='border-radius: 10px;
    background-color:#001635;' id='me'><b>إضافة جديد</b></button></a>
       
        <div class="col-md-12">
          <div class="card" style='margin:auto'>
<div class="card-body">
         
              <table id="example1" class="table table-bordered table-striped"  style="overflow-x:auto;">
                <thead style="background-color: #001635;color:white;text-align:center">
                <tr>
                  <th style=" font-size:20px ">	Management</th>
                  <th style=" font-size:20px ">Logo</th>
                  <th style=" font-size:20px ">Status</th>
                  <th style="font-size:20px " data-field="Actions" class="datatable-cell "><span style="">Actions</span></th>
                  
                </tr>
                </thead>
    
                <tbody class="datatable-body ">
                  @foreach ($all_recordAction as $recordAction)
                      <tr class="datatable-row datatable-row-even">
                          <td class="datatable-cell" style="font-size:15px "><span>{{ $recordAction->management }}</span></td>
                          <td class="datatable-cell" style="font-size:15px "><span><img src="{{asset($recordAction->logo)}}" alt="Image" width="50px"></span></td>
                          <td class="datatable-cell" style="font-size:15px ">
                            <span>{{ $recordAction->status }}</span>
                        </td>
                        @if (Auth::user()->hasRole('Employee'))
                        <td>
                            <form id="delete-form-{{ $recordAction->id }}"
                                action="{{ route('recordAction.destroy', $recordAction->id) }}" method="post">
                                <a href="{{ route('recordAction.edit', $recordAction->id) }}"
                                    class="btn btn-sm btn-clean
                                    btn-icon mr-2"
                                    title="@lang('general.edit')">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <a href="{{ route('recordAction.print', $recordAction->id) }}"
                                    class="btn btn-lg btn-clean
                                    btn-icon mr-2 test"
                                    title="@lang('general.print')" target="_blank">
                                    <i class="fa fa-print"></i>
                                </a>
                                @csrf
                                @method('delete')
                                @if ($recordAction->status == 'pending' && Auth::user()->hasRole('Employee'))
                                <button type="button" class="btn btn-sm btn-clean btn-icon"
                                    title="@lang('general.delete')"
                                    onclick="confirmDelete('delete-form-{{ $recordAction->id }}')">
                                    <i class="fa fa-trash"></i>
                                </button>
                                @endif
                            </form>
                        </td>
                        @elseif(Auth::user()->hasRole('Admin'))
                        <td>
                            <form id="delete-form-{{ $recordAction->id }}"
                                action="{{ route('recordAction.destroy', $recordAction->id) }}" method="post">
                                <a href="{{ route('recordAction.edit', $recordAction->id) }}"
                                    class="btn btn-sm btn-clean
                btn-icon mr-2"
                                    title="@lang('general.edit')">
                                    <i class="fa fa-edit"></i>
                                </a>
                                 <a href="{{ route('recordAction.print', $recordAction->id) }}"
                                    class="btn btn-lg btn-clean
                                    btn-icon mr-2 test"
                                    title="@lang('general.print')" target="_blank">
                                    <i class="fa fa-print"></i>
                                </a>
                                @csrf
                                @method('delete')
                                @if($recordAction->status == 'inProgress' && Auth::user()->hasRole('Admin') || $recordAction->status == 'pending' && Auth::user()->hasRole('Admin'))
                                <button type="button" class="btn btn-sm btn-clean btn-icon"
                                    title="@lang('general.delete')"
                                    onclick="confirmDelete('delete-form-{{ $recordAction->id }}')">
                                    <i class="fa fa-trash"></i>
                                </button>
                                @endif
                            </form>
                        </td>
                         @elseif($recordAction->status == 'inProgress' && Auth::user()->hasRole('SuperAdmin') || $recordAction->status == 'pending' && Auth::user()->hasRole('SuperAdmin')
                         || $recordAction->status == 'confirmed' && Auth::user()->hasRole('SuperAdmin'))
                        <td style="font-size:15px">
                          <form id="delete-form-{{ $recordAction->id }}" class='d-flex justify-content-center'
                              action="{{ route('recordAction.destroy', $recordAction->id) }}" method="post">
                             
                                  <a href="{{ route('recordAction.edit', $recordAction->id) }}"
                                      class="btn btn-lg  
            btn-icon "
                                      title="@lang('general.edit')">
                                      <i class="fa fa-edit"></i>
                                  </a>
                                <a href="{{ route('recordAction.print', $recordAction->id) }}"
                                    class="btn btn-lg btn-clean
                                    btn-icon mr-2 test"
                                    title="@lang('general.print')" target="_blank">
                                    <i class="fa fa-print"></i>
                                </a>
                                  @csrf
                                  @method('delete')
                                  <button type="button" class="btn btn-lg  btn-icon"
                                      title="@lang('general.delete')"
                                      onclick="confirmDelete('delete-form-{{ $recordAction->id }}')">
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
            <!-- /.card-body -->
       
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