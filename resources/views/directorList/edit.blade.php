@extends('layouts.master')
@section('content')
<style>
    .shadow-lg {
        box-shadow: 0 1rem 3rem rgba(0, 0, 0, .175) !important;
    }

    input,
    textarea {
        box-shadow: 0 1rem 3rem rgba(0, 0, 0, .175) !important;
    }

</style>
<div class="card">
    <div class="card-body row" style='margin:auto;margin-top:80px'>

      
    <form action="{{route('directorList.update',$directorList->id)}}" method="post" enctype="multipart/form-data" id="fo1">
        @method('PUT')
        {{ csrf_field() }}
        <div style="" class="w-100 text-center my-4">
                <h2 style='text-shadow: 1px 1px 1px #3ed3ea;'>@lang('main.list of managers and individuals authorized to prepare documents')  والأفراد المصرح لهم بإعداد الوثائق</h2>
                <hr class="w-100">
            </div>
            <div class='row mt-4 mb-3'>
                <label class="form-label col-md-3 text-right ">@lang('main.Company Logo')</label>
           @if ($directorList->status == 'pending' && Auth::user()->hasRole('Employee'))

            <input type="file" class="col-md-6 form-control"  id="img" name="logo" accept="image/*">
        @endif

        @if (($directorList->status == 'inProgress' && Auth::user()->hasRole('Admin')) ||
        ($directorList->status == 'pending' && Auth::user()->hasRole('Admin')))
            <input type="file" class="col-md-6 form-control"  id="img" name="logo" accept="image/*">
        @endif
        @if (($directorList->status == 'inProgress' && Auth::user()->hasRole('SuperAdmin')) ||
            ($directorList->status == 'pending' && Auth::user()->hasRole('SuperAdmin')) ||
            ($directorList->status == 'confirmed' && Auth::user()->hasRole('SuperAdmin')))
            <input type="file" class="col-md-6 form-control"  id="img" name="logo" accept="image/*">
        @endif  
        <img src="{{ asset($directorList->logo) }}" height=100px width=100px; />
       
     </div>
        <hr class="w-100">

        <div class="form-group row w-100 text-right" style="text-align:center ;">
                  <table class="table" style='width: 70% !important;margin: auto;'>
                <tr style="background-color: #001635;color:white">
                    @if ($directorList->status == 'pending' && Auth::user()->hasRole('Employee'))
                    <th>@lang('main.m')</th>
                    @endif
                    @if (($directorList->status == 'inProgress' && Auth::user()->hasRole('Admin')) ||
                    ($directorList->status == 'pending' && Auth::user()->hasRole('Admin')))                    <th>@lang('main.m')</th>
                    @endif
                    @if (($directorList->status == 'inProgress' && Auth::user()->hasRole('SuperAdmin')) ||
                    ($directorList->status == 'pending' && Auth::user()->hasRole('SuperAdmin')) ||
                    ($directorList->status == 'confirmed' && Auth::user()->hasRole('SuperAdmin')))                    <th>@lang('main.m')</th>
                    @endif
                    <th>@lang('main.name')</th>
                    <th>@lang('main.job')</th>
                    <th>@lang('main.Department')</th>
                </tr>
                @if(count($directorList->directorList)>0)
                @foreach($directorList->directorList as $key => $intr)
                <tr id="directorList-{{ $key }}">
                    @if ($directorList->status == 'pending' && Auth::user()->hasRole('Employee'))
                    <td class="text-center end-td ">
                        <button type="button" title="Remove" onclick="removeRow({{$key}},{{$intr->id}})" @if ($key==0) disabled="disabled" @endif class="btn btn-danger btn-option">
                            <i class="fa fa-minus-circle"></i>
                        </button>
                    </td>
                    @endif
                    @if (($directorList->status == 'inProgress' && Auth::user()->hasRole('Admin')) ||
                    ($directorList->status == 'pending' && Auth::user()->hasRole('Admin')))                    <td class="text-center end-td ">
                        <button type="button" title="Remove" onclick="removeRow({{$key}},{{$intr->id}})" @if ($key==0) disabled="disabled" @endif class="btn btn-danger btn-option">
                            <i class="fa fa-minus-circle"></i>
                        </button>
                    </td>
                    @endif
                    @if (($directorList->status == 'inProgress' && Auth::user()->hasRole('SuperAdmin')) ||
                    ($directorList->status == 'pending' && Auth::user()->hasRole('SuperAdmin')) ||
                    ($directorList->status == 'confirmed' && Auth::user()->hasRole('SuperAdmin')))
                    <td class="text-center end-td ">
                        <button type="button" title="Remove" onclick="removeRow({{$key}},{{$intr->id}})" @if ($key==0) disabled="disabled" @endif class="btn btn-danger btn-option">
                            <i class="fa fa-minus-circle"></i>
                        </button>
                    </td>
                    @endif
                    <th><input class="form-control" type="text" name="directorList[{{ $key }}][name]"  value="{{ $intr->name }}"></th>
                    <th><input class="form-control" type="text" name="directorList[{{ $key }}][job]"  value="{{ $intr->job }}"></th>
                    <th><input class="form-control" type="text" name="directorList[{{ $key }}][manage]"  value="{{ $intr->manage }}"></th>
                </tr>
                @endforeach
                @if ($directorList->status == 'pending' && Auth::user()->hasRole('Employee'))

                <tr class="datatable-row datatable-row-even"  >
                    <td class="text-center end-td " id="increment">
                        <button type="button" class="btn btn-primary add_new" id="btn-{{count($directorList->directorList)-1}}" onclick="appendRow({{count($directorList->directorList)-1}})"><i class="fa fa-plus-circle"></i></button>
                    </td>
                </tr>
                @endif
                @if (($directorList->status == 'inProgress' && Auth::user()->hasRole('Admin')) ||
                ($directorList->status == 'pending' && Auth::user()->hasRole('Admin')))
                <tr class="datatable-row datatable-row-even"  >
                    <td class="text-center end-td " id="increment">
                        <button type="button" class="btn btn-primary add_new" id="btn-{{count($directorList->directorList)-1}}" onclick="appendRow({{count($directorList->directorList)-1}})"><i class="fa fa-plus-circle"></i></button>
                    </td>
                </tr>
                @endif
                @if (($directorList->status == 'inProgress' && Auth::user()->hasRole('SuperAdmin')) ||
                ($directorList->status == 'pending' && Auth::user()->hasRole('SuperAdmin')) ||
                ($directorList->status == 'confirmed' && Auth::user()->hasRole('SuperAdmin')))
                <tr class="datatable-row datatable-row-even"  >
                    <td class="text-center end-td " id="increment">
                        <button type="button" class="btn btn-primary add_new" id="btn-{{count($directorList->directorList)-1}}" onclick="appendRow({{count($directorList->directorList)-1}})"><i class="fa fa-plus-circle"></i></button>
                    </td>
                </tr>
                @endif
                @else
                <tr id="directorList-0">
                    <th class="text-center end-td ">
                        <button type="button" title="Remove" disabled="disabled" class="btn btn-danger btn-option">
                          <i class="fa fa-minus-circle"></i>
                        </button>
                    </th>
                    <th><input class="form-control" type="text" name="directorList[0][name]"></th>
                    <th><input class="form-control" type="text" name="directorList[0][job]"></th>
                    <th><input class="form-control" type="text" name="directorList[0][manage]"></th>
                </tr>
                <tr class="datatable-row datatable-row-even">
                    <td class="text-center end-td " id="increment">
                      <button type="button" class="btn btn-primary add_new" id="btn-0" onclick="appendRow(0)"><i
                          class="fa fa-plus-circle"></i></button>
                    </td>
                </tr>
                @endif
            </table>
        </div>
        @if ($directorList->status == 'confirmed' && Auth::user()->hasRole('Employee'))
        <hr class="w-100">

        <div class=" form-group  text-center">
            <h2 for=""> @lang('main.General Director') @lang('main.approval')</h2>
            <input type="text" readonly class=" col-6 shadow-lg form-control" name="manager_name" value="{{ $directorList->manager_name }}">
        </div>
        @endif

        @if ($directorList->status == 'confirmed' && Auth::user()->hasRole('Admin'))
        <hr class="w-100">

        <div class=" form-group  text-center">
            <h2 for=""> @lang('main.General Director') @lang('main.approval')</h2>
            <input type="text" readonly class=" col-6 col-form-label" name="manager_name" value="{{ $directorList->manager_name }}">
        </div>
        @endif

        @if(Auth::user()->hasRole('SuperAdmin'))
                <hr class="w-100">

            <div class=" form-group  text-center">
                <h2 for=""> @lang('main.General Director') @lang('main.approval')</h2>
                <input type="text" class=" col-6 col-form-label" name="manager_name" value="{{ $directorList->manager_name }}">
            </div>
        @endif
            <hr class="w-100">
        <table class="table">
            <thead>
                <tr>
                    <th>
                        <div class="" style="text-align:start ;">
                            <label>@lang('main.Company Name')</label>
                            <input class="form-control" type="text" name="company_name" value="{{ $directorList->company_name }}" placeholder="اسم الشركة  :">
                        </div>

                    </th>
                    <th>
                        <div class="" style="text-align:start ;">
                            <label>@lang('main.release_date') </label>
                            <input class="form-control" type="text" name="date2" value="{{ $directorList->date2 }}" placeholder="تاريخ الإصدار   :"
                                onfocus="(this.type='date')" onblur="(this.type='text')">
                        </div>

                    </th>
                    <th>
                        <div class="" style="text-align:start ;">
                            <label>@lang('main.Modification date')</label>
                            <input class="form-control" type="text" name="date3" value="{{ $directorList->date3 }}" placeholder="تاريخ التعديل :"
                                onfocus="(this.type='date')" onblur="(this.type='text')">
                        </div>

                    </th>
                    <th>
                            <div class="" style="text-align:start ;">
                                <label>@lang('main.model_period')</label>
                                <input class="form-control shadow-lg" type="text" name="period_time" value="{{ $directorList->period_time }}">
                            </div>

                        </th>
                        <th>
                            <div class="" style="text-align:start ;">
                                <label>@lang('main.page_number')</label>
                                <input class="form-control shadow-lg" type="text" name="number_page" value="{{ $directorList->number_page }}">
                            </div>

                        </th>
                        <th>
                            <div class="" style="text-align:start ;">
                                <label>@lang('main.document_code')</label>
                                <input class="form-control shadow-lg" type="text" name="number_doc" value="{{ $directorList->number_doc }}">
                            </div>
                        </th>
                </tr>
            </thead>
        </table>
        @if ($directorList->status == 'pending' && Auth::user()->hasRole('Employee'))
                <div class="form-group">
                    <button style="border-radius:20px;margin: 50px; width:10% ; height: 5%;" type="submit"
                        class="btn btn-primary"><i class="fas fa-save" style="width:15% ; height: 20%;">@lang('main.edit')
                        </i></button>
                </div>
            @elseif(($directorList->status == 'inProgress' && Auth::user()->hasRole('Admin')) ||
                ($directorList->status == 'pending' && Auth::user()->hasRole('Admin')))
                <div class="form-group">
                    <button style="border-radius:20px;margin: 50px; width:10% ; height: 5%;" type="submit"
                        class="btn btn-primary"><i class="fas fa-save" style="width:15% ; height: 20%;">@lang('main.edit')
                        </i></button>
                </div>
            @elseif(($directorList->status == 'inProgress' && Auth::user()->hasRole('SuperAdmin')) ||
                ($directorList->status == 'pending' && Auth::user()->hasRole('SuperAdmin')) ||
                ($directorList->status == 'confirmed' && Auth::user()->hasRole('SuperAdmin')))
                <div class='row'>
            <button style="border-radius:8px;margin: 50px; width:30% ;background-color: #2a415b; ;height: 5%;padding:10px;margin-right:100px;margin:auto" type="submit"
                class="btn btn-primary col-md-4">
               @lang('main.edit')</button>
                    </div>   
            @endif
    </form>
</div>

<style>
    #mainDiv {
        height: 150px;
        width: 50px;
        background: #ffffff;
        border: 1px solid rgb(8, 2, 2);
        text-align: center;
        float: left;
        display: inline-table;
    }
</style>

<script>
    function appendRow(num) {
                      $new_number = parseInt(num) + 1;
                      $appended_text = ` <tr class="datatable-row datatable-row-even" id="directorList-${$new_number}">
                                         
                                          <td class="text-center end-td ">
                                                    <button type="button" title="Remove" onclick="removeRow(${$new_number})"
                                                              class="btn btn-danger btn-option">
                                                              <i class="fa fa-minus-circle"></i>
                                                    </button>
                                          </td>
                                          <th><input class="form-control" type="text" name="directorList[${$new_number}][name]"></th>
                                          <th><input class="form-control" type="text" name="directorList[${$new_number}][job]"></th>
                                          <th><input class="form-control" type="text" name="directorList[${$new_number}][manage]"></th>
              
                                </tr>`;
                                $($appended_text).insertAfter(`#directorList-${num}`);
                      if (!document.getElementById(`directorList-${num}`)) {
                                $($appended_text).insertAfter(`#directorList-0`);
                      }
  
                      $(`#btn-${num}`).remove();
                      $("#increment").append(`<button type="button" class="btn btn-primary add_new" id="btn-${$new_number}" onclick="appendRow(${$new_number})"><i class="fa fa-plus-circle"></i></button></td>`);
  
  
            }
  
            function removeRow(num, id){
          if(id != 0){
             $("#directorList-0").append(`<input type="hidden" name="ids[${num}]" value="${id}">`);
          }
          $(`#directorList-${num}`).remove();
            }
  
  </script>
@stop