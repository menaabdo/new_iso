@extends('layouts.master')

@section('content')

<div class="card row">
<div style='margin:auto'>
  
</div>
<div class='row ' >
<form style='margin:auto' action="{{route('meetingAgenda.store')}}" method="post" class='col-md-9' enctype="multipart/form-data" id="fo1">
    {{ csrf_field() }}

    <div class="container p-4" style='margin-right:80px'>
        <div style="" class="w-100 text-center my-4">
            <h2 style=' margin-top:85px;text-shadow: 1px 1px 1px #3ed3ea;'>أجندة إجتماع مراجعة الإدارة</h2>
            <hr class="w-100">
        </div>
        <div class="form-group w-100  mr-5">
             <div class="row" >
             <label for="" class="col-md-4 col-form-label text-right">@lang('main.meeting_num') : </label>
             <div class="col-md-4" >
                <input type="text" class="form-control shadow-lg" placeholder="  ......" name="meeting_num">
            </div>
            </div>
            </div>
            <div class="form-group w-100  mr-5">
            <div class="row" >
            <label class="col-md-4 col-form-label text-right">@lang('main.Company Logo')</label>
            <div class="col-md-4" >
                <input type="file" id="img" class='shadow-lg form-control' name="logo" accept="image/*">
              </div>
              </div>
              </div>
       
        <div class="form-group w-100  mr-5">
            <div class="row" >
                    <label for="" class="col-md-4 col-form-label text-right">@lang('main.date') :</label>
                    <div class="col-md-4" >
                <input type="date" class="form-control shadow-lg" name="date_1">
            </div>
            </div>
            </div>
            <div class="form-group w-100  mr-5">
            <div class="row" >
            <label for="" class="col-md-4 col-form-label text-right">@lang('main.meeting_kind') :</label>
            <div class="col-md-4" >
                <input type="text" class="form-control shadow-lg" name="meeting_kind">
            </div>
            </div>
        </div>
        <hr width="1300px;" size="20" color="black">
        <div class="form-group row w-100 text-right" style="text-align:center ;">
            <table class="table table-bordered col-md-10" style='margin:auto'>
                <tr>
                    <th style="background-color:#001635;color:white ">@lang('main.meeting_place')</th>
                    <th><input class="form-control shadow-lg" type="text" name="meeting_place"></th>
                    <th style="background-color:#001635;color:white ">@lang('main.meeting_period')</th>
                    <th><input class="form-control" type="text" name="meeting_period"></th>
                </tr>
                <tr>
                    <th style="background-color:#001635;color:white">@lang('main.time')</th>
                    <th><input class="form-control shadow-lg" type="text" name="meeting_time"></th>
                    <th style="background-color:#001635;color:white">@lang('main.meeting_schedule')</th>
                    <th><input class="form-control  shadow-lg" type="text" name="meeting_schedule"></th>
                </tr>
            </table>
        </div>
        <div class="form-group w-100  mr-5">
            <div class="row" >
            <label for="" class="col-md-4 col-form-label text-right">@lang('main.meeting_purpose') :</label>
            <div class="col-md-4" >
                <textarea type="text" class="form-control shadow-lg" name="meeting_purpose"></textarea>
            </div>
            </div>
        </div>
        <hr width="1300px;" size="20" color="black">
        <div class="form-group row w-100 text-center">
            <h2 for="" class="col-md-12 col-form-label text-center" style=' text-shadow: 1px 1px 1px #3ed3ea;'>@lang('main.Attendance Names') :</h2>
        </div>
        <div class="form-group row w-100 text-right" style="text-align:center ;">
            <table class="table table-bordered col-md-10" style='margin:auto'>
            
                <tr style="background-color:#001635;color:white">
                    <th>@lang('main.m')</th>
                    <th>@lang('main.name')</th>
                    <th>@lang('main.job')</th>

                </tr>
                <tr id="attendance-0">
                    <th class="text-center end-td ">
                        <button type="button" title="Remove" disabled="disabled" class="btn btn-danger btn-option">
                          <i class="fa fa-minus-circle"></i>
                        </button>
                    </th>
                    <th><input class="form-control shadow-lg" type="text" name="attendance[0][name]"></th>
                    <th><input class="form-control shadow-lg" type="text" name="attendance[0][job]"></th>
                </tr>
                <tr class="datatable-row datatable-row-even">
                    <td class="text-center end-td " id="increment">
                      <button type="button" class="btn btn-primary add_new" id="btn-0" onclick="appendRow(0)"><i
                          class="fa fa-plus-circle"></i></button>
                    </td>
                </tr>
            </table>
        </div>
        <hr width="1300px;" size="20" color="black">
        <div class="form-group row w-100 text-center">
         
            <h2 for="" class="col-4 col-form-label" style=' text-shadow: 1px 1px 1px #3ed3ea;'>@lang('main.Topics to be discussed') :</h2>
        </div>

        <div class="form-group row w-100 text-right" style="text-align:center ;">
        <table class="table table-bordered col-md-10" style='margin:auto'>
            
                <tr style="background-color:#001635;color:white">
                    <th>@lang('main.m')</th>
                    <th class="col-6 col-form-label">@lang('main.Topics')</th>
                    <th>@lang('main.responsible')</th>
                    <th>@lang('main.custom_time')</th>
                </tr>
                <tr id="topics-0">
                    <th class="text-center end-td ">
                        <button type="button" title="Remove" disabled="disabled" class="btn btn-danger btn-option">
                          <i class="fa fa-minus-circle"></i>
                        </button>
                    </th>
                    <th class="col-6 col-form-label"><input class="form-control shadow-lg" type="text" name="topics[0][topic]"></th>
                    <th><input class="form-control shadow-lg" type="text" name="topics[0][administrator]"></th>
                    <th><input class="form-control shadow-lg" type="text" name="topics[0][time]"></th>
                </tr>
                <tr class="datatable-row datatable-row-even">
                    <td class="text-center end-td " id="increment2">
                      <button type="button" class="btn btn-primary add_new" id="btn2-0" onclick="appendRow2(0)"><i
                          class="fa fa-plus-circle"></i></button>
                    </td>
                </tr>
            </table>
        </div>
        <hr >
        <div class="form-group row w-100 text-right" style="text-align:center ;">
        <table class="table table-bordered col-md-10" style='margin:auto'>
            
         
            <thead>
                <tr>
                    @if (Auth::user()->hasRole('Admin'))
                    <th class=" w-50 text-center col-2 ">
                        <div class="" style="text-align:center ;">
                            <label for="" class="" style="font-size:large;font-weight: bolder;">@lang('main.management representative')   :</label>
                        </div>
                        <div class="form-group row w-10 text-center">
                            <label for="" class="col-2 col-form-label">@lang('main.name')   </label>
                            <div class="col-6">
                                <input type="text" class="form-control" placeholder="  ......" name="name_1">
                            </div>
                        </div>

                    </th>
                    @endif
                    @if (Auth::user()->hasRole('SuperAdmin'))
                    <th class=" w-50 text-center col-2 ">
                        <div class="" style="text-align:center ;">
                            <label for="" class="" style="font-size:large;font-weight: bolder;">@lang('main.management representative')   :</label>
                        </div>
                        <div class="form-group row w-10 text-center">
                            <label for="" class="col-md-3 col-form-label">@lang('main.name')   </label>
                            <div class="col-6">
                                <input type="text" class="form-control shadow-lg" placeholder="  ......" name="name_1">
                            </div>
                        </div>

                    </th>
                    <th class=" w-50 text-center col-2 ">
                        <div class="" style="text-align:center ;">
                            <label for="" class="" style="text-align:center;font-size:large;font-weight: bolder;">@lang('main.General Director') :</label>
                        </div>
                        <div class="form-group row w-10 text-center">
                            <label for="" class="col-md-3 col-form-label">@lang('main.name')   </label>
                            <div class="col-6">
                                <input type="text" class="form-control shadow-lg" placeholder="  ......" name="name_2">
                            </div>
                        </div>
                    </th>
                    @endif
                </tr>
            </thead>
        </table>
        </div>
     
            <table class="table table-bordered mr-5">   
            <thead>
                <tr>
                    <th>
                        <div class="" style="text-align:start ;">
                            <label>@lang('main.Company Name')</label>
                            <input class="form-control shadow-lg" type="text" name="company_name">
                        </div>

                    </th>
                    <th>
                        <div class="" style="text-align:start ;">
                            <label>@lang('main.release_date') </label>
                            <input class="form-control shadow-lg" type="text" name="date2" onfocus="(this.type='date')" onblur="(this.type='text')">
                        </div>

                    </th>
                    <th>
                        <div class="" style="text-align:start ;">
                            <label>@lang('main.Modification date')</label>
                            <input class="form-control shadow-lg" type="text" name="date3" onfocus="(this.type='date')" onblur="(this.type='text')">
                        </div>

                    </th>
                    <th>
                        <div class="" style="text-align:start ;">
                            <label>@lang('main.model_period')</label>
                            <input class="form-control shadow-lg" type="text" name="period_time">
                        </div>

                    </th>
                    <th>
                        <div class="" style="text-align:start ;">
                            <label>@lang('main.page_number')</label>
                            <input class="form-control shadow-lg" type="text" name="number_page">
                        </div>

                    </th>
                    <th>
                        <div class="" style="text-align:start ;">
                            <label>@lang('main.document_code')</label>
                            <input class="form-control shadow-lg" type="text" name="number_doc">
                        </div>
                    </th>
                </tr>
            </thead>
        </table>
        <div class='row'>
            <button style="border-radius:8px;margin: 50px; width:30% ;background-color: #2a415b; ;height: 5%;padding:10px;margin-right:100px;margin:auto" type="submit" class="btn btn-primary col-md-4">
                <i class="fas fa-save" style="width:15% ; height: 20%;"></i>@lang('main.save')</button>
        </div>
    </form>
</div>

    <script>
        function appendRow(num) {
                          $new_number = parseInt(num) + 1;
                          $appended_text = ` <tr class="datatable-row datatable-row-even" id="attendance-${$new_number}">
                                             
                                                <td class="text-center end-td ">
                                                            <button type="button" title="Remove" onclick="removeRow(${$new_number})"
                                                                    class="btn btn-danger btn-option">
                                                                    <i class="fa fa-minus-circle"></i>
                                                            </button>
                                                </td>
                                                <th><input class="form-control" type="text" name="attendance[${$new_number}][name]"></th>
                                                <th><input class="form-control" type="text" name="attendance[${$new_number}][job]"></th>
              
                                            </tr>`;
                          $($appended_text).insertAfter(`#attendance-${num}`);
                          if (!document.getElementById(`attendance-${num}`)) {
                                    $($appended_text).insertAfter(`#attendance-0`);
                          }
      
                          $(`#btn-${num}`).remove();
                          $("#increment").append(`<button type="button" class="btn btn-primary add_new" id="btn-${$new_number}" onclick="appendRow(${$new_number})"><i class="fa fa-plus-circle"></i></button></td>`);
      
      
                }
      
                function removeRow(num) {
                          $(`#attendance-${num}`).remove();
      
                }


                function appendRow2(num) {
                          $new_number = parseInt(num) + 1;
                          $appended_text = ` <tr class="datatable-row datatable-row-even" id="topics-${$new_number}">
                                             
                                                <td class="text-center end-td ">
                                                            <button type="button" title="Remove" onclick="removeRow2(${$new_number})"
                                                                    class="btn btn-danger btn-option">
                                                                    <i class="fa fa-minus-circle"></i>
                                                            </button>
                                                </td>
                                                <th class="col-6 col-form-label"><input class="form-control" type="text" name="topics[${$new_number}][topic]"></th>
                    <th><input class="form-control" type="text" name="topics[${$new_number}][administrator]"></th>
                    <th><input class="form-control" type="text" name="topics[${$new_number}][time]"></th>
              
              
                                            </tr>`;
                          $($appended_text).insertAfter(`#topics-${num}`);
                          if (!document.getElementById(`topics-${num}`)) {
                                    $($appended_text).insertAfter(`#topics-0`);
                          }
      
                          $(`#btn2-${num}`).remove();
                          $("#increment2").append(`<button type="button" class="btn btn-primary add_new" id="btn2-${$new_number}" onclick="appendRow2(${$new_number})"><i class="fa fa-plus-circle"></i></button></td>`);
      
      
                }
      
                function removeRow2(num) {
                          $(`#topics-${num}`).remove();
      
                }
      
      </script>
    
    <style>
        .table thead th {
            vertical-align: bottom;
            border-bottom: 2px solid ;
        }
        
        table,
        th,
        td,
        tr {
         /* border: 1px solid ; */
            /* border-bottom: 2px solid black;
            border-top: 2px solid black; */
            text-align:center
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