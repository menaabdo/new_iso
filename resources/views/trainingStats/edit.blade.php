@extends('layouts.master')

@section('content')

<div class="card">
<div class="card-body">
  <h3 style="margin-top:85px;">إحصائيات التدريب</h3>
  <hr>
    <form action="{{route('trainingStats.update',$trainingStats->id)}}" method="post" enctype="multipart/form-data" id="fo1">
        @method('PUT') 
              {{ csrf_field() }}
        <div style="" class="w-100 text-center my-4">
            <h2> إحصائيات التدريب</h2>
            <hr class="w-100">
        </div>
        <div id="mainDiv"  style=" margin-right:500px;">
            <h4 style=" color:blue;">@lang('main.Company Logo')</h4>
            <hr width="50%" size="20" color="blue">
            <img src="{{ asset($trainingStats->logo) }}" height=180px width=210px; />
            <input type="file" id="img" name="logo" accept="image/*">
        </div>
        <hr class="w-100">


        <div class="form-group row w-100 text-right" style="text-align:center;">
            <table class="table">
                <tr style="background-color:rgb(218, 249, 163); text-align:center;">
                    <th scope="col" rowspan="2">@lang('main.m')</th>
                    <th scope="col" rowspan="2">@lang('main.Department')</th>
                    <th scope="col" colspan="12">@lang('main.month')/@lang('main.year')</th>
                    <th scope="col" rowspan="2">@lang('main.Total trainees')</th>
                </tr>
                <tr style="background-color:rgb(218, 249, 163); text-align:center;">
                    <th>@lang('main.January')</th>
                        <th>@lang('main.February')</th>
                        <th> @lang('main.March')</th>
                        <th> @lang('main.April')</th>
                        <th> @lang('main.May')</th>
                        <th> @lang('main.June')</th>
                        <th> @lang('main.July')</th>
                        <th>@lang('main.August')</th>
                        <th>@lang('main.September')</th>
                        <th>@lang('main.October')</th>
                        <th>@lang('main.November')</th>
                        <th>@lang('main.December')</th>
                </tr>

                @if(count($trainingStats->trainingStats)>0)
                @foreach($trainingStats->trainingStats as $key => $data)
                <tr id="trainingStats-{{$key}}">
                    <td class="text-center end-td ">
                        <button type="button" title="Remove" onclick="removeRow({{$key}},{{$data->id}})"  @if ($key==0) disabled="disabled" @endif class="btn btn-danger btn-option">
                          <i class="fa fa-minus-circle"></i>
                        </button>
                      </td>
                    <th><input class="form-control" type="text" name="trainingStats[{{$key}}][managment]" value="{{$data->managment}}"></th>
                    <th><input style="width: 20px; height: 20px; " type="checkbox" name="trainingStats[{{$key}}][jan]" value="1" {{ $trainingStats->trainingStats[$key]->jan=="1"? 'checked':'' }}></th>
                    <th><input style="width: 20px; height: 20px; " type="checkbox" name="trainingStats[{{$key}}][feb]" value="1" {{$trainingStats->trainingStats[$key]->feb=="1"? 'checked':'' }}></th>
                    <th><input style="width: 20px; height: 20px; " type="checkbox" name="trainingStats[{{$key}}][mar]" value="1" {{$trainingStats->trainingStats[$key]->mar=="1"? 'checked':'' }}></th>
                    <th><input style="width: 20px; height: 20px; " type="checkbox" name="trainingStats[{{$key}}][epr]" value="1" {{$trainingStats->trainingStats[$key]->epr=="1"? 'checked':'' }}></th>
                    <th><input style="width: 20px; height: 20px; " type="checkbox" name="trainingStats[{{$key}}][may]" value="1" {{$trainingStats->trainingStats[$key]->may=="1"? 'checked':'' }}></th>
                    <th><input style="width: 20px; height: 20px; " type="checkbox" name="trainingStats[{{$key}}][jaun]" value="1" {{$trainingStats->trainingStats[$key]->jaun=="1"? 'checked':'' }}></th>
                    <th><input style="width: 20px; height: 20px; " type="checkbox" name="trainingStats[{{$key}}][jun]" value="1" {{$trainingStats->trainingStats[$key]->jun=="1"? 'checked':'' }}></th>
                    <th><input style="width: 20px; height: 20px; " type="checkbox" name="trainingStats[{{$key}}][augest]" value="1" {{$trainingStats->trainingStats[$key]->augest=="1"? 'checked':'' }}></th>
                    <th><input style="width: 20px; height: 20px; " type="checkbox" name="trainingStats[{{$key}}][sep]" value="1" {{$trainingStats->trainingStats[$key]->sep=="1"? 'checked':'' }}></th>
                    <th><input style="width: 20px; height: 20px; " type="checkbox" name="trainingStats[{{$key}}][oct]" value="1" {{$trainingStats->trainingStats[$key]->oct=="1"? 'checked':'' }}></th>
                    <th><input style="width: 20px; height: 20px; " type="checkbox" name="trainingStats[{{$key}}][nov]" value="1" {{$trainingStats->trainingStats[$key]->nov=="1"? 'checked':'' }}></th>
                    <th><input style="width: 20px; height: 20px; " type="checkbox" name="trainingStats[{{$key}}][des]" value="1" {{$trainingStats->trainingStats[$key]->des=="1"? 'checked':'' }}></th>
                    <th><input class="form-control" type="text" name="trainingStats[{{$key}}][total_trainees]" value="{{$data->total_trainees}}"></th>
                </tr>
                @endforeach
                <tr class="datatable-row datatable-row-even">
                    <td class="text-center end-td " id="increment">
                        <button type="button" class="btn btn-primary add_new" id="btn-{{count($trainingStats->trainingStats)-1}}" onclick="appendRow({{count($trainingStats->trainingStats)-1}})"><i
                            class="fa fa-plus-circle"></i></button>
                      </td>
                </tr>
            @else
                <tr id="trainingStats-0">
                    <th class="text-center end-td ">
                        <button type="button" title="Remove" disabled="disabled" class="btn btn-danger btn-option">
                          <i class="fa fa-minus-circle"></i>
                        </button>
                    </th>
                    <th><input class="form-control" type="text" name="trainingStats[0][managment]"></th>
                    <th><input style="width: 20px; height: 20px; " type="checkbox" name="trainingStats[0][jan]"
                      value="1"></th>
              <th><input style="width: 20px; height: 20px; " type="checkbox" name="trainingStats[0][feb]"
                      value="1"></th>
              <th><input style="width: 20px; height: 20px; " type="checkbox" name="trainingStats[0][mar]"
                      value="1"></th>
              <th><input style="width: 20px; height: 20px; " type="checkbox" name="trainingStats[0][epr]"
                      value="1"></th>
              <th><input style="width: 20px; height: 20px; " type="checkbox" name="trainingStats[0][may]"
                      value="1"></th>
              <th><input style="width: 20px; height: 20px; " type="checkbox" name="trainingStats[0][jaun]"
                      value="1"></th>
              <th><input style="width: 20px; height: 20px; " type="checkbox" name="trainingStats[0][jun]"
                      value="1"></th>
              <th><input style="width: 20px; height: 20px; " type="checkbox" name="trainingStats[0][augest]"
                      value="1"></th>
              <th><input style="width: 20px; height: 20px; " type="checkbox" name="trainingStats[0][sep]"
                      value="1"></th>
              <th><input style="width: 20px; height: 20px; " type="checkbox" name="trainingStats[0][oct]"
                      value="1"></th>
              <th><input style="width: 20px; height: 20px; " type="checkbox" name="trainingStats[0][nov]"
                      value="1"></th>
              <th><input style="width: 20px; height: 20px; " type="checkbox" name="trainingStats[0][des]"
                      value="1"></th>
                    <th><input class="form-control" type="text" name="trainingStats[0][total_trainees]"></th>
                </tr>
                <tr class="datatable-row datatable-row-even">
                    <td class="text-center end-td " id="increment">
                      <button type="button" class="btn btn-primary add_new" id="btn-0" onclick="appendRow(0)"><i
                          class="fa fa-plus-circle"></i></button>
                    </td>
                </tr>
                @endif
                <tr>
                    <th style="background-color:rgb(218, 249, 163); text-align:center;" scope="col" colspan="2">@lang('main.Total')</th>
                    <th><input class="form-control" type="text" name="total_1" value="{{$trainingStats->total_1}}"></th>
                    <th><input class="form-control" type="text" name="total_2" value="{{$trainingStats->total_2}}"></th>
                    <th><input class="form-control" type="text" name="total_3" value="{{$trainingStats->total_3}}"></th>
                    <th><input class="form-control" type="text" name="total_4" value="{{$trainingStats->total_4}}"></th>
                    <th><input class="form-control" type="text" name="total_5" value="{{$trainingStats->total_5}}"></th>
                    <th><input class="form-control" type="text" name="total_6" value="{{$trainingStats->total_6}}"></th>
                    <th><input class="form-control" type="text" name="total_7" value="{{$trainingStats->total_7}}"></th>
                    <th><input class="form-control" type="text" name="total_8" value="{{$trainingStats->total_8}}"></th>
                    <th><input class="form-control" type="text" name="total_9" value="{{$trainingStats->total_9}}"></th>
                    <th><input class="form-control" type="text" name="total_10" value="{{$trainingStats->total_10}}"></th>
                    <th><input class="form-control" type="text" name="total_11" value="{{$trainingStats->total_11}}"></th>
                    <th><input class="form-control" type="text" name="total_12" value="{{$trainingStats->total_12}}"></th>
                    <th><input class="form-control" type="text" name="total_13" value="{{$trainingStats->total_13}}"></th>
                </tr>
                
            </table>
        </div>

        <hr class="w-100">
        <div class="form-group row ">
            <label for="" class="col-3 col-form-label">@lang('main.conclusion'):</label>
            <div class="col-6">
                <input type="text" class="form-control" name="conclusion" value="{{$trainingStats->conclusion}}">
            </div>
        </div>
        <hr class="w-100">
        <table class="table">
            <thead>
                <tr>
                    <th>
                      <div class="" style="text-align:start ;">
                        <label>@lang('main.Company Name')</label>
                        <input class="form-control" type="text" name="company_name" placeholder="اسم الشركة  :"  value="{{ $trainingStats->company_name }}">
                      </div>
            
                    </th>
                    <th>
                      <div class="" style="text-align:start ;">
                        <label>@lang('main.release_date') </label>
                        <input class="form-control" type="text" name="date2"  value="{{ $trainingStats->date2 }}" placeholder="تاريخ الإصدار   :" onfocus="(this.type='date')" onblur="(this.type='text')">
                      </div>
            
                    </th>
                    <th>
                        <div class="" style="text-align:start ;">
                            <label>@lang('main.Modification date')</label>
                            <input class="form-control" type="text" name="date3"  value="{{ $trainingStats->date3 }}" placeholder="تاريخ التعديل :" onfocus="(this.type='date')" onblur="(this.type='text')">
                          </div>
            
                    </th>
                    <th>
                            <div class="" style="text-align:start ;">
                                <label>@lang('main.model_period')</label>
                                <input class="form-control shadow-lg" type="text" name="period_time" value="{{ $trainingStats->period_time }}">
                            </div>

                        </th>
                        <th>
                            <div class="" style="text-align:start ;">
                                <label>@lang('main.page_number')</label>
                                <input class="form-control shadow-lg" type="text" name="number_page" value="{{ $trainingStats->number_page }}">
                            </div>

                        </th>
                        <th>
                            <div class="" style="text-align:start ;">
                                <label>@lang('main.document_code')</label>
                                <input class="form-control shadow-lg" type="text" name="number_doc" value="{{ $trainingStats->number_doc }}">
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
                      $appended_text = ` <tr class="datatable-row datatable-row-even" id="trainingStats-${$new_number}">
                                         
                                            <td class="text-center end-td ">
                                                        <button type="button" title="Remove" onclick="removeRow(${$new_number})"
                                                                class="btn btn-danger btn-option">
                                                                <i class="fa fa-minus-circle"></i>
                                                        </button>
                                            </td>
                                            <th><input class="form-control" type="text" name="trainingStats[${$new_number}][managment]"></th>
                                            <th><input style="width: 20px; height: 20px; " type="checkbox" name="trainingStats[0][jan]" value="1"></th>
                    <th><input style="width: 20px; height: 20px; " type="checkbox" name="trainingStats[${$new_number}][feb]" value="1"></th>
                    <th><input style="width: 20px; height: 20px; " type="checkbox" name="trainingStats[${$new_number}][mar]" value="1"></th>
                    <th><input style="width: 20px; height: 20px; " type="checkbox" name="trainingStats[${$new_number}][epr]" value="1"></th>
                    <th><input style="width: 20px; height: 20px; " type="checkbox" name="trainingStats[${$new_number}][may]" value="1"></th>
                    <th><input style="width: 20px; height: 20px; " type="checkbox" name="trainingStats[${$new_number}][jaun]" value="1"></th>
                    <th><input style="width: 20px; height: 20px; " type="checkbox" name="trainingStats[${$new_number}][jun]" value="1"></th>
                    <th><input style="width: 20px; height: 20px; " type="checkbox" name="trainingStats[${$new_number}][augest]" value="1"></th>
                    <th><input style="width: 20px; height: 20px; " type="checkbox" name="trainingStats[${$new_number}][sep]" value="1"></th>
                    <th><input style="width: 20px; height: 20px; " type="checkbox" name="trainingStats[${$new_number}][oct]" value="1"></th>
                    <th><input style="width: 20px; height: 20px; " type="checkbox" name="trainingStats[${$new_number}][nov]" value="1"></th>
                    <th><input style="width: 20px; height: 20px; " type="checkbox" name="trainingStats[${$new_number}][des]" value="1"></th>
                                            <th><input class="form-control"  type="text" name="trainingStats[${$new_number}][total_trainees]"></th>
                                        </tr>`;
                      $($appended_text).insertAfter(`#trainingStats-${num}`);
                      if (!document.getElementById(`trainingStats-${num}`)) {
                                $($appended_text).insertAfter(`#trainingStats-0`);
                      }
  
                      $(`#btn-${num}`).remove();
                      $("#increment").append(`<button type="button" class="btn btn-primary add_new" id="btn-${$new_number}" onclick="appendRow(${$new_number})"><i class="fa fa-plus-circle"></i></button></td>`);
                    }
      
                    function removeRow(num, id){
          if(id != 0){
             $("#trainingStats-0").append(`<input type="hidden" name="ids[${num}]" value="${id}">`);
          }
          $(`#trainingStats-${num}`).remove();
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