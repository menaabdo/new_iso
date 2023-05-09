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
    font-weight: bold;">
         قائمة المراجعات الداخلية لنظام الجودة</h3>
                <hr>
                </div>
      <div class="row" style='margin:auto;width:90%'>
     
                    <a href="{{ route('internalAudit.create') }}"  class="btn col-md-12 mr-1" style="width:120px;  float: right; font-size:20px ">
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
                                           
                                                        <th style=" ">@lang('main.Referenced Authority')</th>
                                                        <th style=" ">@lang('main.Reference Documents')</th>
                                                        <th style=" ">@lang('main.Status')</th>
                                                        <th data-field="Actions" class="datatable-cell "><span
                                                                style="">@lang('main.Actions')</span></th>
            
                                                    </tr>
                                                </thead>

                                                
 <tbody class="datatable-body ">
    @foreach ($all_internalAudit as $internalAudit)
    <tr class="datatable-row datatable-row-even">
        <td class="datatable-cell" style="font-size:15px "><span>{{ $internalAudit->referenced_authority }}</span></td>
        <td class="datatable-cell" style="font-size:15px "><span>{{ $internalAudit->reference_documents }}</span></td>
        <td class="datatable-cell" style="font-size:15px ">
          <span>{{ $internalAudit->status }}</span>
      </td>
      @if (Auth::user()->hasRole('Employee'))
      <td>
          <form id="delete-form-{{ $internalAudit->id }}"
              action="{{ route('internalAudit.destroy', $internalAudit->id) }}" method="post">
              <a href="{{ route('internalAudit.edit', $internalAudit->id) }}"
                  class="btn btn-sm btn-clean
                  btn-icon mr-2"
                  title="@lang('general.edit')">
                  <i class="fa fa-edit"></i>
              </a>

              <a href="{{ route('internalAudit.print', $internalAudit->id) }}"
                  class="btn btn-sm btn-clean
                  btn-icon mr-2 test"
                  title="@lang('general.print')" target="_blank">
                  <i class="fa fa-print"></i>
              </a>
              @csrf
              @method('delete')
              @if ($internalAudit->status == 'pending' && Auth::user()->hasRole('Employee'))
              <button type="button" class="btn btn-sm btn-clean btn-icon"
                  title="@lang('general.delete')"
                  onclick="confirmDelete('delete-form-{{ $internalAudit->id }}')">
                  <i class="fa fa-trash"></i>
              </button>
              @endif
          </form>
      </td>
      @elseif(Auth::user()->hasRole('Admin'))
      <td>
          <form id="delete-form-{{ $internalAudit->id }}"
              action="{{ route('internalAudit.destroy', $internalAudit->id) }}" method="post">
              <a href="{{ route('internalAudit.edit', $internalAudit->id) }}"
                  class="btn btn-sm btn-clean
btn-icon mr-2"
                  title="@lang('general.edit')">
                  <i class="fa fa-edit"></i>
              </a>
               <a href="{{ route('internalAudit.print', $internalAudit->id) }}"
                  class="btn btn-sm btn-clean
                  btn-icon mr-2 test"
                  title="@lang('general.print')" target="_blank">
                  <i class="fa fa-print"></i>
              </a>
              @csrf
              @method('delete')
              @if($internalAudit->status == 'inProgress' && Auth::user()->hasRole('Admin') || $internalAudit->status == 'pending' && Auth::user()->hasRole('Admin'))
              <button type="button" class="btn btn-sm btn-clean btn-icon"
                  title="@lang('general.delete')"
                  onclick="confirmDelete('delete-form-{{ $internalAudit->id }}')">
                  <i class="fa fa-trash"></i>
              </button>
              @endif
          </form>
      </td>
       @elseif($internalAudit->status == 'inProgress' && Auth::user()->hasRole('SuperAdmin') || $internalAudit->status == 'pending' && Auth::user()->hasRole('SuperAdmin')
       || $internalAudit->status == 'confirmed' && Auth::user()->hasRole('SuperAdmin'))
      <td style="font-size:15px">
        <form id="delete-form-{{ $internalAudit->id }}"
            action="{{ route('internalAudit.destroy', $internalAudit->id) }}" method="post">
           
                <a href="{{ route('internalAudit.edit', $internalAudit->id) }}"
                    class="btn btn-lg  
btn-icon "
                    title="@lang('general.edit')">
                    <i class="fa fa-edit"></i>
                </a>
              <a href="{{ route('internalAudit.print', $internalAudit->id) }}"
                  class="btn btn-lg btn-clean
                  btn-icon mr-2 test"
                  title="@lang('general.print')" target="_blank">
                  <i class="fa fa-print"></i>
              </a>

                {{-- <a href="{{ route('internalAudit.print', $internalAudit->id) }}"
                   data-id="{{ $internalAudit->id }}"
                  class="btn btn-lg btn-icon">
                  <i class="fa fa-print"></i>
              </a> --}}
               
                {{-- <a href="#" data-id="{{ $internalAudit->id }}"
                  class="btn btn-lg btn-icon print">
                  <i class="fa fa-print"></i>
              </a> --}}
               

                @csrf
                @method('delete')
                <button type="button" class="btn btn-lg  btn-icon"
                    title="@lang('general.delete')"
                    onclick="confirmDelete('delete-form-{{ $internalAudit->id }}')">
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
