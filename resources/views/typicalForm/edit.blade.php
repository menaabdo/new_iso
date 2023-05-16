@extends('layouts.master')

@section('content')



<div class="card">
<div class="card-body">
    <h3 style="margin-top:85px;">@lang('main.Document receipt form') </h3>
    <hr>
    <form action="{{route('typicalForm.update',$typicalForm->id)}}" method="post" enctype="multipart/form-data" id="fo1">
        @method('PUT')
        {{ csrf_field() }}
      <div style="" class="w-100 text-center my-4">
        <h2>@lang('main.Document receipt form') 
        </h2>
        <hr class="w-100">
    </div>
    <div id="mainDiv"  style=" margin-right:500px;">
        <h4 style=" color:blue;">@lang('main.Company Logo')</h4>
        <hr width="50%" size="20" color="blue">
        <img src="{{ asset($typicalForm->logo) }}" height=180px width=210px; />
        <input type="file" id="img" name="logo" accept="image/*">
    </div>
    <div class="form-group row w-100 text-left">
        
        <div class="col-form-label">
            <label class="form-label  ">@lang('main.I received') :</label>
            <input type="text" class="col-3"  name="name" value="{{ $typicalForm->name }}">
            <label>@lang('main.Signed below are the following documents / which belong to the Department') :</label>
            <input type="text"  class="col-3"  name="management" value="{{ $typicalForm->management }}">
        </div>
    </div>
   
    <div class="form-group row w-100 text-right" style="text-align:center ;">
        <table class="table">
            <tr style="background-color:rgb(187, 216, 240)">
                <th>@lang('main.m')</th>
                <th>@lang('main.Document name')</th>
                <th>@lang('main.document_number')</th>
                <th>@lang('main.num_copy')</th>
                <th>@lang('main.date')</th>
                <th>@lang('main.note')</th>
            </tr>
            @if(count($typicalForm->typicalForm)>0)
            @foreach($typicalForm->typicalForm as $key => $intr)
            <tr id="typicalForm-{{ $key }}">
                <td class="text-center end-td ">
                    <button type="button" title="Remove" onclick="removeRow({{$key}},{{$intr->id}})" @if ($key==0) disabled="disabled" @endif class="btn btn-danger btn-option">
                        <i class="fa fa-minus-circle"></i>
                    </button>
                </td>
                <th><input class="form-control" type="text" name="typicalForm[{{$key}}][document_name]"  value="{{ $intr->document_name }}"></th>
                <th><input class="form-control" type="text" name="typicalForm[{{$key}}][document_code]"  value="{{ $intr->document_code }}"></th>
                <th><input class="form-control" type="text" name="typicalForm[{{$key}}][number_copy]"  value="{{ $intr->number_copy }}"></th>
                <th><input class="form-control" type="date" name="typicalForm[{{$key}}][date1]"  value="{{ $intr->date1 }}" ></th>
                <th><textarea class="form-control" type="text" name="typicalForm[{{$key}}][notes]"> {{ $intr->notes }}</textarea></th>
            </tr>
            @endforeach
            <tr class="datatable-row datatable-row-even"  >
                <td class="text-center end-td "  id="increment">
                    <button type="button" class="btn btn-primary add_new" id="btn-{{count($typicalForm->typicalForm)-1}}" onclick="appendRow({{count($typicalForm->typicalForm)-1}})"><i class="fa fa-plus-circle"></i></button>
                </td>
            </tr>
           @else
            <tr id="typicalForm-0">
                <th class="text-center end-td ">
                    <button type="button" title="Remove" disabled="disabled" class="btn btn-danger btn-option">
                        <i class="fa fa-minus-circle"></i>
                    </button>
                </th>
                <th><input class="form-control" type="text" name="typicalForm[0][document_name]"></th>
                <th><input class="form-control" type="text" name="typicalForm[0][document_code]"></th>
                <th><input class="form-control" type="text" name="typicalForm[0][number_copy]"></th>
                <th><input class="form-control" type="date" name="typicalForm[0][date1]"></th>
                <th><textarea class="form-control" type="text" name="typicalForm[0][notes]"></textarea></th>
            </tr>
            <tr class="datatable-row datatable-row-even">
                <td class="text-center end-td " id="increment">
                    <button type="button" class="btn btn-primary add_new" id="btn-0" onclick="appendRow(0)"><i class="fa fa-plus-circle"></i></button>
                </td>
            </tr>
            @endif
        </table>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th class=" w-50 text-center col-1 ">
                    <div class="" style="text-align:center ;">
                        <label for="" class="" style="text-align:center;font-size:large;font-weight: bolder;">@lang('main.receiver'):</label>
                    </div>
                    <div class="form-group row w-10 text-right">
                        <label for="" class="col-1 col-form-label">@lang('main.name') :-</label>
                        <div class="col-2">
                            <input type="text" class="form-control" placeholder="  ......" name="name2" value="{{ $typicalForm->name2 }}">
                        </div>
                    </div>
                    <div class="form-group row w-10 text-right">
                        <label for="" class="col-1 col-form-label">@lang('main.job') :-</label>
                        <div class="col-2">
                            <input type="text" class="form-control" placeholder="  ......" name="job" value="{{ $typicalForm->job }}">
                        </div>
                    </div>
                </th>

            </tr>
        </thead>
    </table>

    <table class="table">
        <thead>
            <tr>
                <th>
                  <div class="" style="text-align:start ;">
                    <label>@lang('main.Company Name')</label>
                    <input class="form-control" type="text" name="company_name" placeholder="اسم الشركة  :"  value="{{ $typicalForm->company_name }}">
                  </div>
        
                </th>
                <th>
                  <div class="" style="text-align:start ;">
                    <label>@lang('main.release_date') </label>
                    <input class="form-control" type="text" name="date2"  value="{{ $typicalForm->date2 }}" placeholder="تاريخ الإصدار   :" onfocus="(this.type='date')" onblur="(this.type='text')">
                  </div>
        
                </th>
                <th>
                    <div class="" style="text-align:start ;">
                        <label>@lang('main.Modification date')</label>
                        <input class="form-control" type="text" name="date3"  value="{{ $typicalForm->date3 }}" placeholder="تاريخ التعديل :" onfocus="(this.type='date')" onblur="(this.type='text')">
                      </div>
        
                </th>
                <th>
                            <div class="" style="text-align:start ;">
                                <label>@lang('main.model_period')</label>
                                <input class="form-control shadow-lg" type="text" name="period_time" value="{{ $typicalForm->period_time }}">
                            </div>

                        </th>
                        <th>
                            <div class="" style="text-align:start ;">
                                <label>@lang('main.page_number')</label>
                                <input class="form-control shadow-lg" type="text" name="number_page" value="{{ $typicalForm->number_page }}">
                            </div>

                        </th>
                        <th>
                            <div class="" style="text-align:start ;">
                                <label>@lang('main.document_code')</label>
                                <input class="form-control shadow-lg" type="text" name="number_doc" value="{{ $typicalForm->number_doc }}">
                            </div>
                        </th>
              </tr>
        </thead>
    </table>
    
          <div class="form-group">
            <button style="border-radius:20px;margin: 50px; width:10% ; height: 5%;" type="submit"
              class="btn btn-primary btn-lg"><i class="fas fa-save" style="width:15% ; height: 20%;"></i>  <label>@lang('main.edit')</label>  </button>
          </div>
        </form>
    </div>
     
    <script>
        function appendRow(num) {
            $new_number = parseInt(num) + 1;
            $appended_text = ` <tr class="datatable-row datatable-row-even" id="typicalForm-${$new_number}">
                                                 
                                                    <td class="text-center end-td ">
                                                                <button type="button" title="Remove" onclick="removeRow(${$new_number})"
                                                                        class="btn btn-danger btn-option">
                                                                        <i class="fa fa-minus-circle"></i>
                                                                </button>
                                                    </td>
                                                    <th><input class="form-control" type="text" name="typicalForm[${$new_number}][document_name]"></th>
                <th><input class="form-control" type="text" name="typicalForm[${$new_number}][document_code]"></th>
                <th><input class="form-control" type="text" name="typicalForm[${$new_number}][number_copy]"></th>
                <th><input class="form-control" type="date" name="typicalForm[${$new_number}][date1]"></th>
                <th><textarea class="form-control" type="text" name="typicalForm[${$new_number}][notes]"></textarea></th>
                                                     </tr>`;
                                                     $($appended_text).insertAfter(`#typicalForm-${num}`);
                          if (!document.getElementById(`typicalForm-${num}`)) {
                                    $($appended_text).insertAfter(`#typicalForm-0`);
                          }
      
                          $(`#btn-${num}`).remove();
                          $("#increment").append(`<button type="button" class="btn btn-primary add_new" id="btn-${$new_number}" onclick="appendRow(${$new_number})"><i class="fa fa-plus-circle"></i></button></td>`);
      
      
                }
    
        function removeRow(num, id){
              if(id != 0){
                 $("#typicalForm-0").append(`<input type="hidden" name="ids[${num}]" value="${id}">`);
              }
              $(`#typicalForm-${num}`).remove();
            }
    </script>
    
    <style>
        .table thead th {
            vertical-align: bottom;
            border-bottom: 2px solid black;
        }
        
        table,
        th,
        td,
        tr {
            border: 1px solid black;
            border-bottom: 2px solid black;
            border-top: 2px solid black;
        }
    
        #mainDiv {
            height: 150px;
            width: 50px;
            background: #ffffff;
            border: 1px solid rgb(8, 2, 2);
            text-align: center;
            float:left;
            display: inline-table;
        }
    </style>
    @stop