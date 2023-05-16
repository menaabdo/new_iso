@extends('layouts.master')

@section('content')


<div class="card">
<div class="card-body">
    <h3 style="margin-top:85px;">@lang('main.Follow-up record of improvement and development work')</h3>
    <hr>
    <form action="{{route('followUpRecordImprovements.update',$followUpRecordImprovement->id)}}" method="post" enctype="multipart/form-data" id="fo1">
        @method('PUT') 
              {{ csrf_field() }}
        <div style="" class="w-100 text-center my-4">
            <h2> @lang('main.Follow-up record of improvement and development work')</h2>
        </div>
        <hr class="w-100">
        <div class="form-group row" style="text-align: center;">
            <label for="" class="col-2 col-form-label">@lang('main.year'):</label>
            <div class="col-3">
                <input type="text" class="form-control" name="year" value="{{$followUpRecordImprovement->year}}">
            </div>
        </div>
        <div id="mainDiv"  style=" margin-right:500px;">
            <h4 style=" color:blue;">@lang('main.Company Logo')</h4>
            <hr width="50%" size="20" color="blue">
            <img src="{{ asset($followUpRecordImprovement->logo) }}" height=180px width=210px; />
            <input type="file" id="img" name="logo" accept="image/*">
        </div>
        <hr class="w-100">
        <div class="form-group row w-100 text-right" style="text-align:center;">
            <table class="table">
                <tr style="background-color:rgb(218, 249, 163); text-align:center;">
                    <th>@lang('main.m')</th>
                    <th>@lang('main.date') </th>
                    <th>@lang('main.relevant department')</th>
                    <th>@lang('main.Case description')</th>
                    <th>@lang('main.Action taken')</th>
                    <th>@lang('main.Responsible for implementation')</th>
                    <th>@lang('main.Implementation scheme')</th>
                    <th>@lang('main.Follow-up implementation')</th>
                    <th>@lang('main.note')</th>
                </tr>
                @if(count($followUpRecordImprovement->followUpRecord)>0)
                @foreach($followUpRecordImprovement->followUpRecord as $key => $data)
                <tr id="followUpRecord-{{$key}}">
                    <td class="text-center end-td ">
                        <button type="button" title="Remove" onclick="removeRow({{$key}},{{$data->id}})"  @if ($key==0) disabled="disabled" @endif class="btn btn-danger btn-option">
                          <i class="fa fa-minus-circle"></i>
                        </button>
                      </td>
                    <th><input class="form-control" type="date" name="followUpRecord[{{$key}}][date_1]" value="{{$data->date_1}}"></th>
                    <th><input class="form-control" type="text" name="followUpRecord[{{$key}}][dapartment]" value="{{$data->dapartment}}"></th>
                    <th><input class="form-control" type="text" name="followUpRecord[{{$key}}][description]" value="{{$data->description}}"></th>
                    <th><input class="form-control" type="text" name="followUpRecord[{{$key}}][action]" value="{{$data->action}}"></th>
                    <th><input class="form-control" type="text" name="followUpRecord[{{$key}}][employee]" value="{{$data->employee}}"></th>
                    <th><input class="form-control" type="text" name="followUpRecord[{{$key}}][implementation]" value="{{$data->implementation}}"></th>
                    <th><input class="form-control" type="text" name="followUpRecord[{{$key}}][follow_implementation]" value="{{$data->follow_implementation}}"></th>
                    <th><input class="form-control" type="text" name="followUpRecord[{{$key}}][nodes]" value="{{$data->nodes}}"></th>
                </tr>
                @endforeach
                <tr class="datatable-row datatable-row-even">
                    <td class="text-center end-td " id="increment">
                        <button type="button" class="btn btn-primary add_new" id="btn-{{count($followUpRecordImprovement->followUpRecord)-1}}" onclick="appendRow({{count($followUpRecordImprovement->followUpRecord)-1}})"><i
                            class="fa fa-plus-circle"></i></button>
                      </td>
                </tr>
            @else
                <tr id="followUpRecord-0">
                    <th class="text-center end-td ">
                        <button type="button" title="Remove" disabled="disabled" class="btn btn-danger btn-option">
                          <i class="fa fa-minus-circle"></i>
                        </button>
                    </th>
                    <th><input class="form-control" type="date" name="followUpRecord[0][date_1]"></th>
                    <th><input class="form-control" type="text" name="followUpRecord[0][dapartment]"></th>
                    <th><input class="form-control" type="text" name="followUpRecord[0][description]"></th>
                    <th><input class="form-control" type="text" name="followUpRecord[0][action]"></th>
                    <th><input class="form-control" type="text" name="followUpRecord[0][employee]"></th>
                    <th><input class="form-control" type="text" name="followUpRecord[0][implementation]"></th>
                    <th><input class="form-control" type="text" name="followUpRecord[0][follow_implementation]"></th>
                    <th><input class="form-control" type="text" name="followUpRecord[0][nodes]"></th>
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

        <hr class="w-100">
        <table class="table">
            <thead>
                <tr>
                    <th class=" w-50 text-center col-2 ">
                        <div class="" style="text-align:center ;">
                            <label for="" class="" style="text-align:center;font-size:large;font-weight: bolder;">@lang('main.prepare'):</label>
                        </div>
                        <div class="form-group row" style="text-align:center ;">
                            <label for="" class="col-2 col-form-label">@lang('main.name'):-</label>
                            <div class="col-4">
                                <input type="text" class="form-control" placeholder="  ......" name="name_1" value="{{$followUpRecordImprovement->name_1}}">
                            </div>
                        </div>
                        <div class="form-group row" style="text-align:center ;">
                            <label for="" class="col-2 col-form-label">@lang('main.job'):-</label>
                            <div class="col-4">
                                <input type="text" class="form-control" placeholder="  ......" name="employ" value="{{$followUpRecordImprovement->employ}}">
                            </div>
                        </div>
                    </th>
                </tr>
            </thead>
        </table>
        <hr class="w-100">
        <table class="table">
            <thead>
                <tr>
                    <th>
                      <div class="" style="text-align:start ;">
                        <label>@lang('main.Company Name')</label>
                        <input class="form-control" type="text" name="company_name" placeholder="اسم الشركة  :"  value="{{ $followUpRecordImprovement->company_name }}">
                      </div>
            
                    </th>
                    <th>
                      <div class="" style="text-align:start ;">
                        <label>@lang('main.release_date') </label>
                        <input class="form-control" type="text" name="date2"  value="{{ $followUpRecordImprovement->date2 }}" placeholder="تاريخ الإصدار   :" onfocus="(this.type='date')" onblur="(this.type='text')">
                      </div>
            
                    </th>
                    <th>
                        <div class="" style="text-align:start ;">
                            <label>@lang('main.Modification date')</label>
                            <input class="form-control" type="text" name="date3"  value="{{ $followUpRecordImprovement->date3 }}" placeholder="تاريخ التعديل :" onfocus="(this.type='date')" onblur="(this.type='text')">
                          </div>
            
                    </th>
                     <th>
                            <div class="" style="text-align:start ;">
                                <label>@lang('main.model_period')</label>
                                <input class="form-control shadow-lg" type="text" name="period_time" value="{{ $followUpRecordImprovement->period_time }}">
                            </div>

                        </th>
                        <th>
                            <div class="" style="text-align:start ;">
                                <label>@lang('main.page_number')</label>
                                <input class="form-control shadow-lg" type="text" name="number_page" value="{{ $followUpRecordImprovement->number_page }}">
                            </div>

                        </th>
                        <th>
                            <div class="" style="text-align:start ;">
                                <label>@lang('main.document_code')</label>
                                <input class="form-control shadow-lg" type="text" name="number_doc" value="{{ $followUpRecordImprovement->number_doc }}">
                            </div>
                        </th>
                  </tr>
            </thead>
        </table>
        <div class="form-group">
            <button style="border-radius:20px;margin: 50px; width:10% ; height: 5%;" type="submit"
            class="btn btn-primary btn-lg"><i class="fas fa-save" style="width:15% ; height: 20%;"></i>@lang('main.edit')</button>
        </div>
    </form>
</div>

<script>
    function appendRow(num) {
                      $new_number = parseInt(num) + 1;
                      $appended_text = ` <tr class="datatable-row datatable-row-even" id="followUpRecord-${$new_number}">
                                         
                                            <td class="text-center end-td ">
                                                        <button type="button" title="Remove" onclick="removeRow(${$new_number})"
                                                                class="btn btn-danger btn-option">
                                                                <i class="fa fa-minus-circle"></i>
                                                        </button>
                                            </td>
                                            <th><input class="form-control" type="date" name="followUpRecord[${$new_number}][date_1]"></th>
                    <th><input class="form-control" type="text" name="followUpRecord[${$new_number}][dapartment]"></th>
                    <th><input class="form-control" type="text" name="followUpRecord[${$new_number}][description]"></th>
                    <th><input class="form-control" type="text" name="followUpRecord[${$new_number}][action]"></th>
                    <th><input class="form-control" type="text" name="followUpRecord[${$new_number}][employee]"></th>
                    <th><input class="form-control" type="text" name="followUpRecord[${$new_number}][implementation]"></th>
                    <th><input class="form-control" type="text" name="followUpRecord[${$new_number}][follow_implementation]"></th>
                    <th><input class="form-control" type="text" name="followUpRecord[${$new_number}][nodes]"></th>
                                        </tr>`;
                      $($appended_text).insertAfter(`#followUpRecord-${num}`);
                      if (!document.getElementById(`followUpRecord-${num}`)) {
                                $($appended_text).insertAfter(`#followUpRecord-0`);
                      }
  
                      $(`#btn-${num}`).remove();
                      $("#increment").append(`<button type="button" class="btn btn-primary add_new" id="btn-${$new_number}" onclick="appendRow(${$new_number})"><i class="fa fa-plus-circle"></i></button></td>`);
                    }
      
      function removeRow(num) {
                $(`#followUpRecord-${num}`).remove();

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