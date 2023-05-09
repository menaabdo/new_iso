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
    <div class="card-body row" style='margin-top:80px'>

        <form action="{{route('corrctivePreventiveActions.store')}}" class='col-md-10' style='margin:auto' method="post" enctype="multipart/form-data" id="fo1">
            {{ csrf_field() }}
            <div style="" class="w-100 text-center my-4" style='margin:auto;'>
                <h2 style='text-shadow: 1px 1px 1px #3ed3ea;'>طلب إجراء تصحيحي / وقائي</h2>
                <input style="text-align: center;margin:auto" class='form-control col-md-6' type="text" name="number">
                <hr class="w-100">
            </div>
            <div class='row mt-4 mb-3'>
                <label class="col-2 col-form-label text-center">@lang('main.Company Logo')</label>

                <input class="col-md-6 form-control" type="file" id="img" name="logo" accept="image/*">
            </div>

            <div class="container-fluid p-4">
                <div class=" form-group row w-200 text-center">
                    <label for="" class="col-2 col-form-label text-left">@lang('main.The date of application') :</label>
                    <div class="col-4">
                        <input type="date" class="form-control" name="application_date">
                    </div>

                    <label for="" class="col-2 col-form-label text-center">@lang('main.Department') :</label>
                    <div class="col-4">
                        <input type="text" class="form-control" name="management_1">
                    </div>
                </div>
                <div class=" form-group row w-200 text-center">
                    <label for="" class="col-2 col-form-label text-left">@lang('main.Reference to order'):</label>
                    <div class="col-4">
                        <input type="text" class="form-control" name="reference_order">
                    </div>
                </div>
                <hr class="w-100">
                <div style="" class="w-100 text-left my-4">
                    <div class="row mb-2">
                        <input type="checkbox" name="non_matching" value="1" class='' style='margin-top:13px'>
                        <label for="" class="col-3 col-form-label text-left">@lang('main.Case of non-conformity - Report No') </label>

                        <input type="text" class="form-control col-md-4" name="number_2">
                    </div>
                    <div class="row">
                        <input type="checkbox" name="customer_complaint" value="1" style='margin-top:13px'>
                        <label for="" class="col-3 col-form-label text-left">@lang('main.Customer Complaint No') :</label>

                        <input type="text" class="form-control col-md-4" name="number_4">
                    </div>
                    <div class="row mt-2">
                        <input type="checkbox" name="internal_review" value="1" style='margin-top:13px'>
                        <label for="" class="col-3 col-form-label text-left">@lang('main.Internal review no') :</label>

                        <input type="text" class="form-control col-md-4" name="number_3">
                    </div>

                    <div class="row mt-2">
                        <input type="checkbox" name="external_review" value="1" style='margin-top:13px'>
                        <label for="" class="col-3 col-form-label text-left">@lang('main.External review no') :</label>

                        <input type="text" class="form-control  col-md-4" name="number_5">
                    </div>
                    <div class="row mt-2">
                        <input type="checkbox" name="management_review" value="1" style='margin-top:13px'>
                        <label for="" class="col-3 col-form-label text-left">@lang('main.Senior Management Review No') :</label>

                        <input type="text" class="form-control col-md-4" name="number_6">
                    </div>

                    <div class="row mt-2">
                        <input type="checkbox" name="other" value="1" style='margin-top:13px'>
                        <label for="" class="col-3 col-form-label text-left">@lang('main.other'):</label>

                        <input type="text" class="form-control  col-md-4" name="other_1">
                    </div>
                </div>
                <hr class="w-100">
                <div class=" form-group row w-200 text-left">
                    <label for="" class="col-6 col-form-label text-right">@lang('main.Summary_analysis'):</label>
                    <div class="col-5">
                        <textarea type="text" class="form-control" name="Summary_analysis"></textarea>
                    </div>
                </div>
                <table class="table">
                    <thead>
                        <tr>
                            @if (Auth::user()->hasRole('Admin'))
                            <th class=" w-50 text-center col-2 ">
                                <div class="" style="text-align:center ;">
                                    <label for="" class="" style="font-size:large;font-weight: bolder;">@lang('main.prepare') </label>
                                </div>
                                <div class="form-group row w-10 text-center">
                                    <label for="" class="col-2 col-form-label">@lang('main.name') </label>
                                    <div class="col-9">
                                        <input type="text" class="form-control" placeholder="  ......" name="name_4">
                                    </div>

                                </div>

                            </th>
                            @endif
                            @if (Auth::user()->hasRole('SuperAdmin'))
                            <th class=" w-50 text-center col-2 " style='vertical-align:middle'>
                                <div class="" style="text-align:center ;">
                                    <label for="" class="" style="font-size:large;font-weight: bolder;">@lang('main.prepare') </label>
                                </div>
                                <div class="form-group row w-100 text-center">
                                    <label for="" class="col-md-3 col-form-label">@lang('main.name') </label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" placeholder="  ......" name="name_4">
                                    </div>

                                </div>

                            </th>
                            <th class=" w-50 text-center col-2 ">
                                <div class="" style="text-align:center ;">
                                    <label for="" class="" style="text-align:center;font-size:large;font-weight: bolder;">@lang('main.Director of the Department') </label>
                                </div>
                                <div class="form-group row w-100 text-center">
                                    <label for="" class="col-md-4 col-form-label">@lang('main.mang_name') :</label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" placeholder="  ......" name="mang_name">
                                    </div>
                                    <label for="" class="col-md-3 col-form-label">@lang('main.name') </label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" placeholder="  ......" name="name_5">
                                    </div>

                                </div>
                            </th>
                            @endif
                        </tr>
                    </thead>
                </table>
                <hr class="w-100">
                <div class=" form-group row w-200 text-left">
                    <label for="" class="col-6 col-form-label text-right">@lang('main.Corrective/Preventive Action Taken:') </label>
                    <div class="col-8">
                        <textarea type="text" class="form-control" name="corrective_actions"></textarea>
                    </div>
                    <div class=" form-group row w-200 text-left mt-2">

                        <label for="" class="col-5 col-form-label text-left ">@lang('main.implementation_date'):</label>
                        <div class="col-7">
                            <input type="date" class="form-control" name="implementation_date">
                        </div>
                    </div>
                </div>
                <table class="table">
                    <thead>
                        <tr>
                            @if (Auth::user()->hasRole('Admin'))
                            <th class=" w-50 text-center col-2 ">
                                <div class="" style="text-align:center ;">
                                    <label for="" class="" style="font-size:large;font-weight: bolder;">@lang('main.prepare') </label>
                                </div>
                                <div class="form-group row w-10 text-center">
                                    <label for="" class="col-2 col-form-label">@lang('main.name') </label>
                                    <div class="col-9">
                                        <input type="text" class="form-control" placeholder="  ......" name="name">
                                    </div>
                                    <label for="" class="col-2 col-form-label">@lang('main.job') </label>
                                    <div class="col-9">
                                        <input type="text" class="form-control" placeholder="  ......" name="employee_1">
                                    </div>
                                </div>

                            </th>
                            @endif
                            @if (Auth::user()->hasRole('SuperAdmin'))
                            <th class=" w-50 text-center col-2 ">
                                <div class="" style="text-align:center ;">
                                    <label for="" class="" style="font-size:large;font-weight: bolder;">@lang('main.prepare') </label>
                                </div>
                                <div class="form-group row w-100 text-center">
                                    <label for="" class="col-md-5 col-form-label">@lang('main.name') </label>
                                    <div class="col-7">
                                        <input type="text" class="form-control" placeholder="  ......" name="name">
                                    </div>
                                    <label for="" class="col-md-5 col-form-label">@lang('main.job') </label>
                                    <div class="col-7">
                                        <input type="text" class="form-control" placeholder="  ......" name="employee_1">
                                    </div>
                                </div>

                            </th>
                            <th class=" w-50 text-center col-2 ">
                                <div class="" style="text-align:center ;">
                                    <label for="" class="" style="text-align:center;font-size:large;font-weight: bolder;">@lang('main.Director of the Department') </label>
                                </div>
                                <div class="form-group row w-10 text-center">
                                    <label for="" class="col-md-3 col-form-label">@lang('main.name') </label>
                                    <div class="col-9">
                                        <input type="text" class="form-control" placeholder="  ......" name="name_1">
                                    </div>
                                    <label for="" class="col-md-3 col-form-label">@lang('main.date') </label>
                                    <div class="col-9">
                                        <input type="date" class="form-control" placeholder="  ......" name="date_1">
                                    </div>
                                </div>
                            </th>
                            @endif
                        </tr>
                    </thead>
                </table>
                <hr class="w-100">
                <div class=" form-group row w-200 text-right">
                    <label for="" class="col-md-4 col-form-label ">@lang('main.approval_management') :</label>
                    <div class="col-5">
                        <textarea type="text" class="form-control" name="approval_management"></textarea>
                    </div>
                </div>
                <div class=" form-group row w-200 text-center">
                    <label for="" class="col-md-2 col-form-label "> @lang('main.name') :</label>
                    <div class="col-3">
                        <input type="text" class="form-control" name="name_2">
                    </div>

                    <label for="" class="col-2 col-form-label "> @lang('main.date') :</label>
                    <div class="col-3">
                        <input type="date" class="form-control" name="date_2">
                    </div>
                </div>
                <hr class="w-100">

                <div class="form-group row w-100 text-left">
                    <label>@lang('main.(6) Reviewing the implementation and effectiveness of the corrective/preventive action taken:'):</label>
                </div>
                <div style="" class="w-100 text-left my-8">
                    <input type="checkbox" name="done_1" value="1">
                    <label for="" class="col-3 col-form-label text-left">@lang('main.The implementation has been completed effectively and the request is closed') :</label>

                    <input type="checkbox" name="done_2" value="1">
                    <label for="" class="col-3 col-form-label text-left">@lang('main.Implemented but needs another corrective action with a number') :</label>
                    <input type="text" class='form-control' name="number_done">
                </div>
                <div style="" class="w-100 text-left my-4">
                    <input type="checkbox" name="not_done" value="1">
                    <label for="" class="col-3 col-form-label text-left">@lang('main.Not implemented') </label>

                    <input type="checkbox" name="need_done" value="1">
                    <label for="" class="col-2 col-form-label text-left">@lang('main.Needs a precautionary measure') </label>
                    <input type="text" name="number_need_done" class='form-control'>
                </div>
                <div class="form-group row  text-right">
                    <label for="" class="col-3 col-form-label">@lang('main.name'):</label>
                    <div class="col-2">
                        <input type="text" class="form-control" name="name_3">
                    </div>

                    <label for="" class="col-2 col-form-label">@lang('main.job'):</label>
                    <div class="col-2">
                        <input type="text" class="form-control" name="employee">
                    </div>
                </div>
                <div class="form-group row w-100 text-center">
                    <h4>
                        *@lang('main.The original is kept in the Quality Department and a copy is sent to the concerned authority') .
                    </h4>
                </div>

            </div>

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
        <div class='row'>
            <button style="border-radius:8px;margin: 50px; width:30% ;background-color: #2a415b; ;height: 5%;padding:10px;margin-right:100px;margin:auto" type="submit" class="btn btn-primary col-md-4">
                <i class="fas fa-save" style="width:15% ; height: 20%;"></i>@lang('main.save')</button>
        </div>
        </form>
    </div>
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
            float: left;
            display: inline-table;
        }

    </style>
    @stop
