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

</style>
<div class="card">
    <div class="card-body" style='margin:auto'>

        <form action="{{route('nonConformanceReport.store')}}" method="post" class='col-md-9 w-100' style='margin:auto;margin-top:80px' enctype="multipart/form-data" id="fo1">
            {{ csrf_field() }}
            <div style="" class="w-100 text-center my-4">
                <h2 style='text-shadow: 1px 1px 1px #3ed3ea;'>@lang('main.Record follow-up reports of non-conformance') </h2>
                <label>@lang('main.year')</label>
                <input style="text-align: center;" class='form-control' type="text" name="year">
                <hr class="w-100">
            </div>
            <div class='shadow-lg p-3'>
                <label class="form-label pr-5">@lang('main.Company Logo')</label>
                <div class=''>
                    <input type="file" id="img" class='shadow-lg' name="logo" accept="image/*">
                </div>
            </div>
            <div class="mt-3" style="text-align:start ;">
                <label for="" class="" style="text-align: center;font-weight: bolder;">@lang('main.Cases of non-compliance with the quality system (ISO 9001) in various departments'). </label>
            </div>
            <hr class="w-100">

            <div style="overflow-x:auto;">
                <table>
                    <tr style="background-color:#001635;color:white">
                        <th class="col-1 col-form-label">@lang('main.m')</th>
                        <th>@lang('main.date')</th>
                        <th>@lang('main.The competent department')</th>
                        <th>@lang('main.Case description')</th>
                        <th>@lang('main.Action taken')</th>
                        <th>@lang('main.Responsible for implementation')</th>
                        <th>@lang('main.Implementation scheme')</th>
                        <th>@lang('main.Follow-up implementation')</th>
                        <th>@lang('main.note')</th>
                    </tr>
                    <tr id="nonConformanceReport-0">
                        <th class="text-center end-td ">
                            <button type="button" title="Remove" disabled="disabled" class="btn btn-danger btn-option">
                                <i class="fa fa-minus-circle"></i>
                            </button>
                        </th>
                        <th><input class="form-control" type="date" name="nonConformanceReport[0][date_1]"></th>
                        <th><input class="form-control" type="text" name="nonConformanceReport[0][management]"></th>
                        <th><input class="form-control" type="text" name="nonConformanceReport[0][description]"></th>
                        <th><input class="form-control" type="text" name="nonConformanceReport[0][action_taken]"></th>
                        <th><input class="form-control" type="text" name="nonConformanceReport[0][responsible_implementation]"></th>
                        <th><input class="form-control" type="text" name="nonConformanceReport[0][implementation_scheme]"></th>
                        <th><input class="form-control" type="text" name="nonConformanceReport[0][follow_implementation]"></th>
                        <th><input class="form-control" type="text" name="nonConformanceReport[0][notes]"></th>

                    </tr>
                    <tr class="datatable-row datatable-row-even">
                        <td class="text-center end-td " id="increment">
                            <button type="button" class="btn btn-primary add_new" id="btn-0" onclick="appendRow(0)"><i class="fa fa-plus-circle"></i></button>
                        </td>
                    </tr>
                </table>
            </div>
            <hr class="w-100">
            @if (Auth::user()->hasRole('SuperAdmin'))
            <div class="" style="text-align:center ;">
                <h2 for="" class="" style="text-align:center;font-size:large;font-weight: bolder;">@lang('main.prepare')</h2>
            </div>
            <div class="form-group row text-left col-12">
                <label for="" class="col-2 col-form-label">@lang('main.name') : -</label>
                <div class="col-4">
                    <input type="text" class="form-control" placeholder="  ......" name="name">
                </div>
                <label for="" class="col-2 col-form-label">@lang('main.job'): -</label>
                <div class="col-4">
                    <input type="text" class="form-control" placeholder="  ......" name="employee">
                </div>
            </div>
            <hr class="w-100">
            @endif



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
            $appended_text = ` <tr class="datatable-row datatable-row-even" id="nonConformanceReport-${$new_number}">
                                             
                                                <td class="text-center end-td ">
                                                            <button type="button" title="Remove" onclick="removeRow(${$new_number})"
                                                                    class="btn btn-danger btn-option">
                                                                    <i class="fa fa-minus-circle"></i>
                                                            </button>
                                                </td>
                                                <th><input class="form-control" type="date" name="nonConformanceReport[0][date_1]"></th>
                            <th><input class="form-control" type="text" name="nonConformanceReport[${$new_number}][management]"></th>
                            <th><input class="form-control" type="text" name="nonConformanceReport[${$new_number}][description]"></th>
                            <th><input class="form-control" type="text" name="nonConformanceReport[${$new_number}][action_taken]"></th>
                            <th><input class="form-control" type="text" name="nonConformanceReport[${$new_number}][responsible_implementation]"></th>
                            <th><input class="form-control" type="text" name="nonConformanceReport[${$new_number}][implementation_scheme]"></th>
                            <th><input class="form-control" type="text" name="nonConformanceReport[${$new_number}][follow_implementation]"></th>
                            <th><input class="form-control" type="text" name="nonConformanceReport[${$new_number}][notes]"></th>
              
                                            </tr>`;
            $($appended_text).insertAfter(`#nonConformanceReport-${num}`);
            if (!document.getElementById(`nonConformanceReport-${num}`)) {
                $($appended_text).insertAfter(`#nonConformanceReport-0`);
            }

            $(`#btn-${num}`).remove();
            $("#increment").append(`<button type="button" class="btn btn-primary add_new" id="btn-${$new_number}" onclick="appendRow(${$new_number})"><i class="fa fa-plus-circle"></i></button></td>`);


        }

        function removeRow(num) {
            $(`#nonConformanceReport-${num}`).remove();

        }

    </script>

    <style>
        <style>.table thead th {
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
