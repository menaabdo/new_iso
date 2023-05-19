@extends('layouts.master')
@section('content')
<style>
    .shadow-lg {
        box-shadow: 0 1rem 3rem rgba(0, 0, 0, .175) !important;
    }

    h2 {

        padding: 2px;
        text-align: right;
    }
    /* @media only screen and (max-width: 500px) {
    form{
        width:43% !important;
        margin:0 !important;
    }
    }
    @media only screen and (max-width: 700px) {
    form{
        width:43% !important;
        margin:0 !important;
    }
    } */

</style>
<div class="card  " style='   ;'>
    <div class='card-body row' style=''>

        <form action="{{route('followUpRecord.store')}}" class='col-md-9 ' style='margin:auto;margin-top:80px;' method="post" enctype="multipart/form-data" id="fo1">
            {{ csrf_field() }}
            <div style="" class="w-100 text-center my-4" style=''>
                <h2 style='text-shadow: 1px 1px 1px #3ed3ea;margin:auto'>@lang('main.Follow-up record of corrective/preventive action requests') </h2>
                <label>@lang('main.year')</label>
                <input class="col-md-6 form-control  shadow-lg" style="text-align: center;margin:auto" type="text" name="year">
                <hr class="w-100">
            </div>
            <div class='shadow-lg p-3'>
                <label class="form-label pr-5">@lang('main.Company Logo')</label>
                <div class=''>
                    <input type="file" id="img" class='shadow-lg' name="logo" accept="image/*">
                </div>
            </div>
            <hr class="w-100">
            <div class="form-group row w-100 text-right" style="text-align:center;overflow:auto">
                <table class="table">
                    <tr style="background-color:#001635 ;color:white; text-align:center;">
                        <th class="col-1 col-form-label" scope="col" rowspan="2">@lang('main.m')</th>
                        <th scope="col" rowspan="2">@lang('main.order number')</th>
                        <th scope="col" rowspan="2">@lang('main.date')</th>
                        <th scope="col" rowspan="2">@lang('main.The competent department')</th>
                        <th scope="col" rowspan="2">@lang('main.Topic')</th>
                        <th scope="col" colspan="6">@lang('main.Source') * </th>
                        <th scope="col" rowspan="2">@lang('main.Follow-up results')</th>
                        <th scope="col" colspan="3">@lang('main.the effectiveness of the procedure') **</th>
                    </tr>
                    <tr style="background-color:#001635 ;color:white; text-align:center;">
                        <th scope="col"> 1</th>
                        <th scope="col">2</th>
                        <th scope="col"> 3</th>
                        <th scope="col">4</th>
                        <th scope="col"> 5</th>
                        <th scope="col">6</th>
                        <th scope="col"> 7</th>
                        <th scope="col">8</th>
                        <th scope="col"> 9</th>
                    </tr>

                    <tr id="followUpRecord-0">
                        <th class="text-center end-td ">
                            <button type="button" title="Remove" disabled="disabled" class="btn btn-danger btn-option">
                                <i class="fa fa-minus-circle"></i>
                            </button>
                        </th>
                        <th><input class="form-control" type="text" name="followUpRecord[0][number]"></th>
                        <th><input class="form-control" type="date" name="followUpRecord[0][date_1]"></th>
                        <th><input class="form-control" type="text" name="followUpRecord[0][management]"></th>
                        <th><input class="form-control" type="text" name="followUpRecord[0][subject]"></th>
                        <th><input style="width: 40px; height: 40px; " type="checkbox" name="followUpRecord[0][one]" value="1"></th>
                        <th><input style="width: 40px; height: 40px; " type="checkbox" name="followUpRecord[0][two]" value="1"></th>
                        <th><input style="width: 40px; height: 40px; " type="checkbox" name="followUpRecord[0][three]" value="1"></th>
                        <th><input style="width: 40px; height: 40px; " type="checkbox" name="followUpRecord[0][four]" value="1"></th>
                        <th><input style="width: 40px; height: 40px; " type="checkbox" name="followUpRecord[0][five]" value="1"></th>
                        <th><input style="width: 40px; height: 40px; " type="checkbox" name="followUpRecord[0][six]" value="1"></th>
                        <th><input class="form-control" type="text" name="followUpRecord[0][result]"></th>
                        <th><input style="width: 40px; height: 40px; " type="checkbox" name="followUpRecord[0][seven]" value="1"></th>
                        <th><input style="width: 40px; height: 40px; " type="checkbox" name="followUpRecord[0][eight]" value="1"></th>
                        <th><input style="width: 40px; height: 40px; " type="checkbox" name="followUpRecord[0][nine]" value="1"></th>
                    </tr>
                    <tr class="datatable-row datatable-row-even">
                        <td class="text-center end-td " id="increment">
                            <button type="button" class="btn btn-primary add_new" id="btn-0" onclick="appendRow(0)"><i class="fa fa-plus-circle"></i></button>
                        </td>
                    </tr>

                </table>
            </div>



            <table class="table ">
                <thead>
                    <tr>
                        <th class=" w-50 text-center col-3 " style="border: 1px solid silver  !important;">
                            <div class="form-group row w-20 text-center">
                                <label for="" class="col-12 col-form-label text-center">*@lang('main.Source') </label>
                            </div>
                            <div class="form-group row w-20 text-center">

                                <label for="" class="col-6 col-form-label">@lang('main.(1) An internal audit')</label>
                                <label for="" class="col-6 col-form-center">@lang('main.(4) Customer Complaint')</label>

                            </div>
                            <div class="form-group row w-20 text-center">

                                <label for="" class="col-6 col-form-label">@lang('main.(2) External review')</label>
                                <label for="" class="col-6 col-form-label">@lang('main.(5) A case of non-conformity')</label>

                            </div>
                            <div class="form-group row w-20 text-center">

                                <label for="" class="col-6 col-form-label">@lang('main.(3) Management review')</label>
                                <label for="" class="col-6 col-form-label">@lang('main.(6) Other (remember the case)')</label>

                            </div>

                            <div class="form-group row w-10 text-center">
                                <label for="" class="col-12 col-form-label"> ** @lang('main.the effectiveness of the procedure') </label>
                                <label for="" class="col-4 col-form-label">@lang('main.(7) Closing the application')</label>
                                <label for="" class="col-4 col-form-label">@lang('main.(8) Another corrective action')</label>

                                <label for="" class="col-4 col-form-label">@lang('main.(9) Another precautionary measure')</label>

                            </div>


                        </th>

                    </tr>
                </thead>
            </table>
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
        </div>
        <div class='row'>
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
                    <th><input class="form-control" type="text" name="followUpRecord[${$new_number}][number]"></th>
                    <th><input class="form-control" type="date" name="followUpRecord[${$new_number}][date_1]"></th>
                    <th><input class="form-control" type="text" name="followUpRecord[${$new_number}][management]"></th>
                    <th><input class="form-control" type="text" name="followUpRecord[${$new_number}][subject]"></th>
                    <th><input style="width: 40px; height: 40px; " type="checkbox"   name="followUpRecord[${$new_number}][one]"value="1"></th>
                    <th><input style="width: 40px; height: 40px; " type="checkbox"   name="followUpRecord[${$new_number}][two]"value="1"></th>
                    <th><input style="width: 40px; height: 40px; " type="checkbox"   name="followUpRecord[${$new_number}][three]"value="1"></th>
                    <th><input style="width: 40px; height: 40px; " type="checkbox"   name="followUpRecord[${$new_number}][four]"value="1"></th>
                    <th><input style="width: 40px; height: 40px; " type="checkbox"   name="followUpRecord[${$new_number}][five]"value="1"></th>
                    <th><input style="width: 40px; height: 40px; " type="checkbox"   name="followUpRecord[${$new_number}][six]"value="1"></th>
                    <th><input class="form-control" type="text" name="followUpRecord[${$new_number}][result]"></th>
                    <th><input style="width: 40px; height: 40px; " type="checkbox"  name="followUpRecord[${$new_number}][seven]"value="1"></th>
                    <th><input style="width: 40px; height: 40px; " type="checkbox"   name="followUpRecord[${$new_number}][eight]"value="1"></th>
                    <th><input style="width: 40px; height: 40px; " type="checkbox"  name="followUpRecord[${$new_number}][nine]"value="1"></th>
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
            /* border-bottom: 2px solid black; */
        }

        table,
        th,
        td,
        tr {
            border: 1px solid white;
            /* border-bottom: 2px solid black;
                border-top: 2px solid black; */
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
