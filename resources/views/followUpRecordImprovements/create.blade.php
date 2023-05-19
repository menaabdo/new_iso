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
    @media only screen and (max-width: 440px) {
    .card-body{
      
        margin:0 !important;
    }
    }
</style>
<div class="card">
    <div class="card-body row" style='margin-top:80px'>

       

        <form action="{{route('followUpRecordImprovements.store')}}" class='col-md-9
        ' style='margin:auto' method="post" enctype="multipart/form-data" id="fo1">
            {{ csrf_field() }}
            <div style="" class="w-100 text-center my-4">
                <h2 style='text-shadow: 1px 1px 1px #3ed3ea;'> @lang('main.Follow-up record of improvement and development work')</h2>
            </div>
            <hr class="w-100">
            <div class="form-group row" style="text-align: center;">
                <label for="" class="col-3 col-form-label">@lang('main.year'):</label>
                <div class="col-6">
                    <input type="text" class="form-control" name="year">
                </div>
            </div>
            <div class='row mt-4 mb-3 text-center'>
                <label class="form-label col-md-3 ">@lang('main.Company Logo')</label>
                <div class="col-6">
              <input type="file" id="img" name="logo" accept="image/*">
            </div>
            </div>
            <hr class="w-100">
            <div class="form-group row  text-right" style="text-align:center;overflow-x:auto;margin:auto;width:85%">
             <table class="table">
                    <tr style="background-color:#001635 ;color:white; text-align:center;">
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
                            <button type="button" class="btn btn-primary add_new" id="btn-0" onclick="appendRow(0)"><i class="fa fa-plus-circle"></i></button>
                        </td>
                    </tr>
                </table>
            </div>

            <hr class="w-100">
            <table class="table">
                <thead>
                    <tr>
                        <th class=" w-50 text-center col-2 ">
                            <div class="" style="text-align:center ;">
                                <label for="" class="" style="text-align:center;font-size:large;font-weight: bolder;">@lang('main.prepare')</label>
                            </div>
                            <div class="form-group row" style="text-align:center ;">
                                <label for="" class="col-2 col-form-label">@lang('main.name'): -</label>
                                <div class="col-4">
                                    <input type="text" class="form-control" placeholder="  ......" name="name_1">
                                </div>
                            </div>
                            <div class="form-group row" style="text-align:center ;">
                                <label for="" class="col-2 col-form-label">@lang('main.job'): -</label>
                                <div class="col-4">
                                    <input type="text" class="form-control" placeholder="  ......" name="employ">
                                </div>
                            </div>
                        </th>
                    </tr>
                </thead>
            </table>
            <hr class="w-100">
            <div style="overflow-x:auto;">
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
             </div>
            <div class='row mt-3'>
            <button style="border-radius:8px;margin: 50px; width:30% ;background-color: #2a415b; ;height: 5%;padding:10px;margin-right:100px;margin:auto" type="submit" class="btn btn-primary col-md-4">
                <i class="fas fa-save" style="width:15% ; height: 20%;"></i>@lang('main.save')</button>
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
