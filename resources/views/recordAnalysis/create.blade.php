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
<div class="card" style='margin:auto;'>
    <div class="card-body row" style=';margin-top:80px'>

       
        <form action="{{ route('recordAnalysis.store') }}" class='col-md-10' style='margin:auto' method="post" enctype="multipart/form-data" id="fo1">
            {{ csrf_field() }}
            <div style="" class="w-100 text-center my-4">
                <h2 style='text-shadow: 1px 1px 1px #3ed3ea;'> @lang('main.Analyze customer complaints')</h2>
                <hr class="w-100">
            </div>
            <div class='row mt-4 mb-3 '>
                <label class="form-label col-md-3 ">@lang('main.Company Logo')</label>
              
                <input type="file" id="img" name="logo" accept="image/*">
            </div>
            <div class="form-group row ">
                <label for="" class="col-3 col-form-label">@lang('main.year'):</label>
                <div class="col-6">
                    <input type="text" class="form-control" name="year">
                </div>
            </div>
            <div class="form-group row ">
                <label for="" class="col-3 col-form-label">@lang('main.date'):</label>
                <div class="col-6">
                    <input type="date" class="form-control" name="date_1">
                </div>
            </div>
            <hr class="w-100">

            <div class="form-group row w-100 text-right" style="text-align:center;overflow-x:auto">
              
                    <table class="table">
                        <tr style="background-color:#001635;color:white; text-align:center;">
                            <th scope="col" rowspan="3">@lang('main.m')</th>
                            <th style="width:70 ;" scope="col" rowspan="3">@lang('main.Region')</th>
                            <th style="width:70 ;" scope="col" rowspan="3">@lang('main.customer_name')</th>
                            <th style="width:30 ;" scope="col" colspan="2">1 </th>
                            <th style="width:30 ;" scope="col" colspan="2">2 </th>
                            <th style="width:30 ;" scope="col" colspan="2">3 </th>
                            <th style="width:30 ;" scope="col" colspan="2">4 </th>
                            <th style="width:90 ;" scope="col" colspan="3">5/1 </th>
                            <th style="width:90 ;" scope="col" colspan="3">5/2 </th>
                            <th style="width:90 ;" scope="col" colspan="3">5/3 </th>
                            <th style="width:90 ;" scope="col" colspan="3">5/4 </th>
                            <th style="width:90 ;" scope="col" colspan="3">5/5 </th>
                            <th style="width:90 ;" scope="col" colspan="3">5/6 </th>
                            <th style="width:100;" scope="col" rowspan="3">@lang('main.percentage')</th>
                        </tr>
                        <tr style="background-color:#001635;color:white; text-align:center;">
                            <th scope="col" colspan="1">@lang('main.yes')</th>
                            <th scope="col" colspan="1"> @lang('main.no')</th>
                            <th scope="col" colspan="1">@lang('main.yes')</th>
                            <th scope="col" colspan="1"> @lang('main.no')</th>
                            <th scope="col" colspan="1">@lang('main.yes')</th>
                            <th scope="col" colspan="1"> @lang('main.no')</th>
                            <th scope="col" colspan="1">@lang('main.yes')</th>
                            <th scope="col" colspan="1"> @lang('main.no')</th>
                            <th scope="col" colspan="1">جج</th>
                            <th scope="col" colspan="1"> ج</th>
                            <th scope="col" colspan="1">م</th>
                            <th scope="col" colspan="1">جج</th>
                            <th scope="col" colspan="1"> ج</th>
                            <th scope="col" colspan="1">م</th>
                            <th scope="col" colspan="1">جج</th>
                            <th scope="col" colspan="1"> ج</th>
                            <th scope="col" colspan="1">م</th>
                            <th scope="col" colspan="1">جج</th>
                            <th scope="col" colspan="1"> ج</th>
                            <th scope="col" colspan="1">م</th>
                            <th scope="col" colspan="1">جج</th>
                            <th scope="col" colspan="1"> ج</th>
                            <th scope="col" colspan="1">م</th>
                            <th scope="col" colspan="1">جج</th>
                            <th scope="col" colspan="1"> ج</th>
                            <th scope="col" colspan="1">م</th>
                        </tr>
                        <tr style="background-color:#001635;color:white
                        ; text-align:center;">
                            <th scope="col" rowspan="1"> 10</th>
                            <th scope="col" rowspan="1">0</th>
                            <th scope="col" rowspan="1"> 10</th>
                            <th scope="col" rowspan="1">0</th>
                            <th scope="col" rowspan="1"> 10</th>
                            <th scope="col" rowspan="1">0</th>
                            <th scope="col" rowspan="1"> 10</th>
                            <th scope="col" rowspan="1">0</th>
                            <th scope="col" rowspan="1">9</th>
                            <th scope="col" rowspan="1"> 7</th>
                            <th scope="col" rowspan="1">5</th>
                            <th scope="col" rowspan="1">9</th>
                            <th scope="col" rowspan="1"> 7</th>
                            <th scope="col" rowspan="1">5</th>
                            <th scope="col" rowspan="1">9</th>
                            <th scope="col" rowspan="1"> 7</th>
                            <th scope="col" rowspan="1">5</th>
                            <th scope="col" rowspan="1">9</th>
                            <th scope="col" rowspan="1"> 7</th>
                            <th scope="col" rowspan="1">5</th>
                            <th scope="col" rowspan="1">9</th>
                            <th scope="col" rowspan="1"> 7</th>
                            <th scope="col" rowspan="1">5</th>
                            <th scope="col" rowspan="1">9</th>
                            <th scope="col" rowspan="1"> 7</th>
                            <th scope="col" rowspan="1">5</th>
                        </tr>


                        <tr id="recordAnalysis-0">
                            <th class="text-center end-td ">
                                <button type="button" title="Remove" disabled="disabled" class="btn btn-danger btn-option">
                                    <i class="fa fa-minus-circle"></i>
                                </button>
                            </th>
                            <th><input class="form-control" style="width: 180px" type="text" name="recordAnalysis[0][area]"></th>
                            <th><input class="form-control" style="width: 180px" type="text" name="recordAnalysis[0][customer]"></th>
                            <th><input type="checkbox" value="1" name="recordAnalysis[0][yes_1]" />&nbsp;</th>
                            <th><input type="checkbox" value="1" name="recordAnalysis[0][no_1]" />&nbsp;</th>
                            <th><input type="checkbox" value="1" name="recordAnalysis[0][yes_2]" />&nbsp;</th>
                            <th><input type="checkbox" value="1" name="recordAnalysis[0][no_2]" />&nbsp;</th>
                            <th><input type="checkbox" value="1" name="recordAnalysis[0][yes_3]" />&nbsp;</th>
                            <th><input type="checkbox" value="1" name="recordAnalysis[0][no_3]" />&nbsp;</th>
                            <th><input type="checkbox" value="1" name="recordAnalysis[0][yes_4]" />&nbsp;</th>
                            <th><input type="checkbox" value="1" name="recordAnalysis[0][no_4]" />&nbsp;</th>
                            <th><input type="checkbox" value="1" name="recordAnalysis[0][GG_1]" />&nbsp;</th>
                            <th><input type="checkbox" value="1" name="recordAnalysis[0][G_1]" />&nbsp;</th>
                            <th><input type="checkbox" value="1" name="recordAnalysis[0][M_1]" />&nbsp;</th>
                            <th><input type="checkbox" value="1" name="recordAnalysis[0][GG_2]" />&nbsp;</th>
                            <th><input type="checkbox" value="1" name="recordAnalysis[0][G_2]" />&nbsp;</th>
                            <th><input type="checkbox" value="1" name="recordAnalysis[0][M_2]" />&nbsp;</th>
                            <th><input type="checkbox" value="1" name="recordAnalysis[0][GG_3]" />&nbsp;</th>
                            <th><input type="checkbox" value="1" name="recordAnalysis[0][G_3]" />&nbsp;</th>
                            <th><input type="checkbox" value="1" name="recordAnalysis[0][M_3]" />&nbsp;</th>
                            <th><input type="checkbox" value="1" name="recordAnalysis[0][GG_4]" />&nbsp;</th>
                            <th><input type="checkbox" value="1" name="recordAnalysis[0][G_4]" />&nbsp;</th>
                            <th><input type="checkbox" value="1" name="recordAnalysis[0][M_4]" />&nbsp;</th>
                            <th><input type="checkbox" value="1" name="recordAnalysis[0][GG_5]" />&nbsp;</th>
                            <th><input type="checkbox" value="1" name="recordAnalysis[0][G_5]" />&nbsp;</th>
                            <th><input type="checkbox" value="1" name="recordAnalysis[0][M_5]" />&nbsp;</th>
                            <th><input type="checkbox" value="1" name="recordAnalysis[0][GG_6]" />&nbsp;</th>
                            <th><input type="checkbox" value="1" name="recordAnalysis[0][G_6]" />&nbsp;</th>
                            <th><input type="checkbox" value="1" name="recordAnalysis[0][M_6]" />&nbsp;</th>
                            <th><input class="form-control" style="width: 90px" type="text" name="recordAnalysis[0][percentage]"></th>
                        </tr>
                        <tr class="datatable-row datatable-row-even">
                            <td class="text-center end-td " id="increment">
                                <button type="button" class="btn btn-primary add_new" id="btn-0" onclick="appendRow(0)"><i class="fa fa-plus-circle"></i></button>
                            </td>
                        </tr>

                    </table>
                </div>
            






            <table class="table">
                <thead>
                    <tr>
                        @if (Auth::user()->hasRole('Admin') || Auth::user()->hasRole('SuperAdmin'))
                        <hr class="w-100">

                        <th class=" w-50 text-center col-2 ">
                            <div class="" style="text-align:center ;">
                                <label for="" class="" style="text-align:center;font-size:large;font-weight: bolder;">@lang('main.management representative'):</label>
                            </div>
                            <div class="form-group row w-10 text-right">
                                <label for="" class="col-3 col-form-label">@lang('main.name'): -</label>
                                <div class="col-6">
                                    <input type="text" class="form-control" placeholder="  ......" name="name_1">
                                </div>
                            </div>
                            <div class="form-group row w-10 text-right">
                                <label for="" class="col-3 col-form-label">@lang('main.date'): -</label>
                                <div class="col-6">
                                    <input type="date" class="form-control" placeholder="  ......" name="date_2">
                                </div>
                            </div>
                        </th>
                        @endif
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
            <div class='row mt-3'>
            <button style="border-radius:8px;margin: 50px; width:30% ;background-color: #2a415b; ;height: 5%;padding:10px;margin-right:100px;margin:auto" type="submit" class="btn btn-primary col-md-4">
                <i class="fas fa-save" style="width:15% ; height: 20%;"></i>@lang('main.save')</button>
        </div>
        </form>
    </div>

    <script>
        function appendRow(num) {
            $new_number = parseInt(num) + 1;
            $appended_text = ` <tr class="datatable-row datatable-row-even" id="recordAnalysis-${$new_number}">
                                         
                                            <td class="text-center end-td ">
                                                        <button type="button" title="Remove" onclick="removeRow(${$new_number})"
                                                                class="btn btn-danger btn-option">
                                                                <i class="fa fa-minus-circle"></i>
                                                        </button>
                                            </td>
                                            <th><input class="form-control"  style="width: 180px" type="text" name="recordAnalysis[${$new_number}][area]"></th>
                            <th><input class="form-control" style="width: 180px" type="text" name="recordAnalysis[${$new_number}][customer]"></th>
                            <th><input type="checkbox" value="1" name="recordAnalysis[${$new_number}][yes_1]"  />&nbsp;</th>
                            <th><input type="checkbox" value="1" name="recordAnalysis[${$new_number}][no_1]" />&nbsp;</th>
                            <th><input type="checkbox" value="1" name="recordAnalysis[${$new_number}][yes_2]" />&nbsp;</th>
                            <th><input type="checkbox" value="1" name="recordAnalysis[${$new_number}][no_2]" />&nbsp;</th>
                            <th><input type="checkbox" value="1" name="recordAnalysis[${$new_number}][yes_3]" />&nbsp;</th>
                            <th><input type="checkbox" value="1" name="recordAnalysis[${$new_number}][no_3]" />&nbsp;</th>
                            <th><input type="checkbox" value="1" name="recordAnalysis[${$new_number}][yes_4]" />&nbsp;</th>
                            <th><input type="checkbox" value="1" name="recordAnalysis[${$new_number}][no_4]" />&nbsp;</th>
                            <th><input type="checkbox" value="1" name="recordAnalysis[${$new_number}][GG_1]" />&nbsp;</th>
                            <th><input type="checkbox" value="1" name="recordAnalysis[${$new_number}][G_1]" />&nbsp;</th>
                            <th><input type="checkbox" value="1" name="recordAnalysis[${$new_number}][M_1]" />&nbsp;</th>
                            <th><input type="checkbox" value="1" name="recordAnalysis[${$new_number}][GG_2]" />&nbsp;</th>
                            <th><input type="checkbox" value="1" name="recordAnalysis[${$new_number}][G_2]" />&nbsp;</th>
                            <th><input type="checkbox" value="1" name="recordAnalysis[${$new_number}][M_2]" />&nbsp;</th>
                            <th><input type="checkbox" value="1" name="recordAnalysis[${$new_number}][GG_3]" />&nbsp;</th>
                            <th><input type="checkbox" value="1" name="recordAnalysis[${$new_number}][G_3]" />&nbsp;</th>
                            <th><input type="checkbox" value="1" name="recordAnalysis[${$new_number}][M_3]" />&nbsp;</th>
                            <th><input type="checkbox" value="1" name="recordAnalysis[${$new_number}][GG_4]" />&nbsp;</th>
                            <th><input type="checkbox" value="1" name="recordAnalysis[${$new_number}][G_4]" />&nbsp;</th>
                            <th><input type="checkbox" value="1" name="recordAnalysis[${$new_number}][M_4]" />&nbsp;</th>
                            <th><input type="checkbox" value="1" name="recordAnalysis[${$new_number}][GG_5]" />&nbsp;</th>
                            <th><input type="checkbox" value="1" name="recordAnalysis[${$new_number}][G_5]" />&nbsp;</th>
                            <th><input type="checkbox" value="1" name="recordAnalysis[${$new_number}][M_5]" />&nbsp;</th>
                            <th><input type="checkbox" value="1" name="recordAnalysis[${$new_number}][GG_6]" />&nbsp;</th>
                            <th><input type="checkbox" value="1" name="recordAnalysis[${$new_number}][G_6]" />&nbsp;</th>
                            <th><input type="checkbox" value="1" name="recordAnalysis[${$new_number}][M_6]" />&nbsp;</th>
                            <th><input class="form-control" style="width: 90px" type="text" name="recordAnalysis[${$new_number}][percentage]"></th>
                                        </tr>`;
            $($appended_text).insertAfter(`#recordAnalysis-${num}`);
            if (!document.getElementById(`recordAnalysis-${num}`)) {
                $($appended_text).insertAfter(`#recordAnalysis-0`);
            }

            $(`#btn-${num}`).remove();
            $("#increment").append(
                `<button type="button" class="btn btn-primary add_new" id="btn-${$new_number}" onclick="appendRow(${$new_number})"><i class="fa fa-plus-circle"></i></button></td>`
            );
        }

        function removeRow(num) {
            $(`#recordAnalysis-${num}`).remove();

        }

    </script>
    <style>
        .table thead th {
            vertical-align: bottom;
          
        }

        table,
        th,
        td,
        tr {
            border: 1px solid silver;
           
        }

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
    @stop
