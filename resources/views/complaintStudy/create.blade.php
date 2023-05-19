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
<div class="form-group row w-100 text-right" style="text-align:center;overflow:auto">

    <div class="card-body row" style='margin:auto;margin-top:80px'>


        <form action="{{ route('complaintStudies.store') }}" method="post" class='col-md-10' style='margin:auto' enctype="multipart/form-data" id="fo1">
            {{ csrf_field() }}
            <div style="" class="w-100 text-center my-4">
                <h2 style='text-shadow: 1px 1px 1px #3ed3ea;'>@lang('main.Customer complaint report')</h2>
                <hr class="w-100">
            </div>
            <div class='row mt-4 mb-3 text-left'>
                <label class="form-label col-md-3 ">@lang('main.Company Logo')</label>
              <input type="file" id="img" name="logo" accept="image/*">
            </div>
            <div class="form-group row ">
                <label for="" class="col-3 col-form-label">@lang('main.customer_number') :</label>
                <div class="col-6">
                    <input type="text" class="form-control" name="customer_number">
                </div>
            </div>
            <hr class="w-100">
            <table class="table">
                <thead>
                    <tr>
                        <th class=" w-20 text-center col-1 ">
                            <div class="form-group row w-10 text-center">
                                <label for="" class="col-md-2 col-form-label">@lang('main.customer_name'):-</label>
                                <div class="col-md-3">
                                    <input type="text" class="form-control" placeholder="  ......" name="customer">
                                </div>

                                <label for="" class="col-md-2 col-form-label">@lang('main.date'): -</label>
                                <div class="col-md-3">
                                    <input type="da
                                    te" class="form-control" placeholder="  ......" name="date_1">
                                </div>
                            </div>
                        </th>

                    </tr>
                </thead>
            </table>
            <table class="table">
                <thead>
                    <tr>
                        <th class=" w-20 text-center col-1 ">
                            <div class="form-group row w-10 text-left">
                                <label for="" class="col-md-2 col-form-label">@lang('main.service') : - </label>
                                <div class="col-md-3">
                                    <input type="text" class="form-control" placeholder="  ......" name="service">
                                </div>
                            </div>
                        </th>
                    </tr>
                </thead>
            </table>
            <table class="table">
                <thead>
                    <tr>
                        <th class=" w-20 text-center col-1 ">
                            <div class="form-group row w-10 text-left">
                                <label for="" class="col-3 col-form-label">2-@lang('main.subject_complaint') </label>
                                <div class="col-9">
                                    <textarea type="text" class="form-control" placeholder="  ......" name="subject_complain"></textarea>
                                </div>
                            </div>
                            <div class="form-group row w-10 text-center">
                                <label for="" class="col-3 col-form-label">@lang('main.attachment') </label>
                                <div class="col-4">
                                    <input type="text" class="form-control" placeholder="  ......" name="attachment">
                                </div>
                            </div>
                        </th>
                    </tr>
                </thead>
            </table>

            <hr class="w-100">
            <div class="container-fluid p-4 text-left" >
                <h4>3-@lang('main.Immediate Procedure for Filing a Complaint (Immediate Procedure)') </h4>
                <div class="form-group row w-100 text-right" style="text-align:center;">
                    <table>
                        <tr  style="background-color:    #001635; color:white;text-align:center;">
                         <th>@lang('main.m')</th>
                            <th>@lang('main.Action1')</th>
                            <th>@lang('main.Responsible for implementation')</th>
                            <th>@lang('main.date')</th>
                        </tr>
                        <tr id="prompt-0">
                            <th class="text-center end-td ">
                                <button type="button" title="Remove" disabled="disabled" class="btn btn-danger btn-option">
                                    <i class="fa fa-minus-circle"></i>
                                </button>
                            </th>
                            <th><input class="form-control" type="text" name="prompt[0][action]"></th>
                            <th><input class="form-control" type="text" name="prompt[0][implementation]"></th>
                            <th><input class="form-control" type="date" name="prompt[0][date_2]"></th>
                        </tr>
                        <tr class="datatable-row datatable-row-even">
                            <td class="text-center end-td " id="increment">
                                <button type="button" class="btn btn-primary add_new" id="btn-0" onclick="appendRow(0)"><i class="fa fa-plus-circle"></i></button>
                            </td>
                        </tr>
                    </table>

                </div>

            </div>
            <hr class="w-100">
            <div class="container-fluid p-4 text-left " >
                <h4>4-@lang('main.Possible causes of the complaint (Root causes)')</h4>
                <div class="form-group row w-100 text-right" style="text-align:center;">
                    <table>
                        <tr  style="background-color:    #001635; color:white;text-align:center;">
                        <th>@lang('main.m')</th>
                            <th>@lang('main.the reason')</th>
                        </tr>
                        <tr id="causes-0">
                            <th class="text-center end-td ">
                                <button type="button" title="Remove" disabled="disabled" class="btn btn-danger btn-option">
                                    <i class="fa fa-minus-circle"></i>
                                </button>
                            </th>
                            <th><input class="form-control" type="text" name="causes[0][reason]"></th>
                        </tr>
                        <tr class="datatable-row datatable-row-even">
                            <td class="text-center end-td " id="increment2">
                                <button type="button" class="btn btn-primary add_new" id="btn2-0" onclick="appendRow2(0)"><i class="fa fa-plus-circle"></i></button>
                            </td>
                        </tr>
                    </table>

                </div>

            </div>
            <hr class="w-100">
            <div class="container-fluid p-4 text-left " >
                <h4>5-@lang('main.Corrective actions to avoid repeating the complaint (Corrective Actions)')</h4>
                <div class="form-group row w-100 text-right" style="text-align:center;">
                    <table>
                        <tr  style="background-color:    #001635; color:white;text-align:center;">
                            <th>@lang('main.m')</th>
                            <th>@lang('main.Action1')</th>
                            <th>@lang('main.Responsible for implementation')</th>
                            <th>@lang('main.date')</th>
                        </tr>
                        <tr id="complaint-0">
                            <th class="text-center end-td ">
                                <button type="button" title="Remove" disabled="disabled" class="btn btn-danger btn-option">
                                    <i class="fa fa-minus-circle"></i>
                                </button>
                            </th>
                            <th><input class="form-control" type="text" name="complaint[0][action]"></th>
                            <th><input class="form-control" type="text" name="complaint[0][implementation]"></th>
                            <th><input class="form-control" type="date" name="complaint[0][date_2]"></th>
                        </tr>
                        <tr class="datatable-row datatable-row-even">
                            <td class="text-center end-td " id="increment1">
                                <button type="button" class="btn btn-primary add_new" id="btn1-0" onclick="appendRow1(0)"><i class="fa fa-plus-circle"></i></button>
                            </td>
                        </tr>
                    </table>

                </div>

            </div>

            <table class="table">

                @if (Auth::user()->hasRole('Admin'))
                <hr class="w-100">

                <tr style="text-align:center;">
                    <th class=" w-50 text-center col-3 " >

                        <div class="form-group row w-20 text-right">
                            <label for="" class="col-3 col-form-label">@lang('main.quality manager')</label>
                            <div class="col-6">
                                <input type="text" class="form-control" name="name_1">
                            </div>
                        </div>
                    </th>


                    <th class=" w-50 text-center col-3 " 
                    >

                        <div class="form-group row w-20 text-right">
                            <label for="" class="col-3 col-form-label">@lang('main.date') </label>
                            <div class="col-6">
                                <input type="date" class="form-control" name="date_3">
                            </div>
                        </div>

                    </th>

                </tr>
                @endif

                @if (Auth::user()->hasRole('SuperAdmin'))
                <hr class="w-100">

                <tr style="text-align:center;">
                    <th class=" w-50 text-center col-3 " >
                        <div class="form-group row w-20 ">
                            <label for="" class="col-md-4 col-form-label">@lang('main.quality manager')</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="name_1">
                            </div>
                        </div>
                    </th>
                    <th class=" w-50 text-center col-3 " >

                        <div class="form-group row w-20 ">
                            <label for="" class="col-md-3 col-form-label">@lang('main.date') </label>
                            <div class="col-md-6">
                                <input type="date" class="form-control" name="date_3">
                            </div>
                        </div>

                    </th>

                </tr>
                <tr style="text-align:center;">

                    <th class=" w-50 text-center col-3 ">

                        <div class="form-group row w-20 ">
                            <label for="" class="col-md-4 col-form-label">@lang('main.management representative')</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="name_2">
                            </div>
                        </div>
                    </th>
                    <th class=" w-50 text-center col-3 ">

                        <div class="form-group row w-20 ">
                            <label for="" class="col-md-3 col-form-label">@lang('main.date') </label>
                            <div class="col-md-6">
                                <input type="date" class="form-control" name="date_4">
                            </div>
                        </div>

                    </th>
                </tr>
                @endif
            </table>
            <hr class="w-100">
            <div class="form-group row w-100 text-right" style="text-align:center;overflow:auto">

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
    </div>
    <script>
        function appendRow(num) {
            $new_number = parseInt(num) + 1;
            $appended_text = ` <tr class="datatable-row datatable-row-even" id="prompt-${$new_number}">
                                         
                                            <td class="text-center end-td ">
                                                        <button type="button" title="Remove" onclick="removeRow(${$new_number})"
                                                                class="btn btn-danger btn-option">
                                                                <i class="fa fa-minus-circle"></i>
                                                        </button>
                                            </td>
                                            <th><input class="form-control" type="text" name="prompt[${$new_number}][action]"></th>
                            <th><input class="form-control" type="text" name="prompt[${$new_number}][implementation]"></th>
                            <th><input class="form-control" type="date" name="prompt[${$new_number}][date_2]"></th>
                                             </tr>`;
            $($appended_text).insertAfter(`#prompt-${num}`);
            if (!document.getElementById(`prompt-${num}`)) {
                $($appended_text).insertAfter(`#prompt-0`);
            }

            $(`#btn-${num}`).remove();
            $("#increment").append(
                `<button type="button" class="btn btn-primary add_new" id="btn-${$new_number}" onclick="appendRow(${$new_number})"><i class="fa fa-plus-circle"></i></button></td>`
            );
        }

        function removeRow(num) {
            $(`#prompt-${num}`).remove();

        }

        function appendRow1(num) {
            $new_number = parseInt(num) + 1;
            $appended_text = ` <tr class="datatable-row datatable-row-even" id="complaint-${$new_number}">
                                         
                                            <td class="text-center end-td ">
                                                        <button type="button" title="Remove" onclick="removeRow1(${$new_number})"
                                                                class="btn btn-danger btn-option">
                                                                <i class="fa fa-minus-circle"></i>
                                                        </button>
                                            </td>
                                            <th><input class="form-control" type="text" name="complaint[${$new_number}][action]"></th>
                            <th><input class="form-control" type="text" name="complaint[${$new_number}][implementation]"></th>
                            <th><input class="form-control" type="date" name="complaint[${$new_number}][date_2]"></th>
                                             </tr>`;
            $($appended_text).insertAfter(`#complaint-${num}`);
            if (!document.getElementById(`complaint-${num}`)) {
                $($appended_text).insertAfter(`#complaint-0`);
            }

            $(`#btn1-${num}`).remove();
            $("#increment1").append(
                `<button type="button" class="btn btn-primary add_new" id="btn1-${$new_number}" onclick="appendRow1(${$new_number})"><i class="fa fa-plus-circle"></i></button></td>`
            );
        }

        function removeRow1(num) {
            $(`#complaint-${num}`).remove();

        }


        function appendRow2(num) {
            $new_number = parseInt(num) + 1;
            $appended_text = ` <tr class="datatable-row datatable-row-even" id="causes-${$new_number}">
                                         
                                            <td class="text-center end-td ">
                                                        <button type="button" title="Remove" onclick="removeRow2(${$new_number})"
                                                                class="btn btn-danger btn-option">
                                                                <i class="fa fa-minus-circle"></i>
                                                        </button>
                                            </td>
                                            <th><input class="form-control" type="text" name="causes[${$new_number}][reason]"></th>
                                             </tr>`;
            $($appended_text).insertAfter(`#causes-${num}`);
            if (!document.getElementById(`causes-${num}`)) {
                $($appended_text).insertAfter(`#causes-0`);
            }

            $(`#btn2-${num}`).remove();
            $("#increment2").append(
                `<button type="button" class="btn btn-primary add_new" id="btn2-${$new_number}" onclick="appendRow2(${$new_number})"><i class="fa fa-plus-circle"></i></button></td>`
            );
        }

        function removeRow2(num) {
            $(`#causes-${num}`).remove();

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
            border: 1px solid silver;
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
