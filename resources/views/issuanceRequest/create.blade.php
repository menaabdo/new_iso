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
    <div class="card-body row" style='margin:auto;margin-top:80px'>

        <form action="{{route('issuanceRequest.store')}}" class='col-md-10' style='margin:auto' method="post" enctype="multipart/form-data" id="fo1">
            {{ csrf_field() }}
            <div style="" class="w-100 text-center my-4">
                <h2 style='text-shadow: 1px 1px 1px #3ed3ea;'>@lang('main.DCR') </h2>
                <hr class="w-100">
            </div>
            <div class='row mt-4 mb-3'>
                <label class="form-label col-md-2 ">@lang('main.Company Logo')</label>

                <input class="col-md-6 form-control" type="file" id="img" name="logo" accept="image/*">
            </div>
            <div class='row mt-4 mb-3'>
                <label for="" class="col-md-2 col-form-label">1-@lang('main.Management') :</label>
                <div class="col-4">
                    <input type="text" class="col-md-6 form-control" name="management">
                </div>
                <div class="vertical"></div>
                <label for="" class="col-2 col-form-label">@lang('main.date') :</label>
                <div class="col-4">
                    <input type="date" class="form-control" name="date_1">
                </div>
            </div>
            <hr class="w-100">
            <div class='row mt-4 mb-3'>

                <label for="" class="col-md-3 col-form-label">2-@lang('main.The type and name of the document')</label>
                <div class="col-12">
                    <textarea type="text" class="form-control" placeholder="  ......" name="document_type_and_name"></textarea>
                </div>
            </div>
            <div class="form-group row w-100 text-left">
                <div class='col-md-4'>
                    <div class='row'>
                        <label for="" class="col-md-12 col-form-label">3-@lang('main.document_number') :</label>

                        <input type="text" class="form-control" name="document_code">
                    </div>
                </div>
                <div class='col-md-4'>
                    <div class='row'>
                        <label for="" class="col-md-12 col-form-label text-left">@lang('main.release_number')</label>

                        <input type="text" class="form-control" name="issue_number">
                    </div>
                </div>
                <div class='col-md-4'>
                    <div class='row'>
                        <label for="" class="col-md-12 col-form-label text-left">@lang('main.release_date') :</label>



                        <input type="date" class="form-control" name="release_date">
                    </div>
                </div>
            </div>
            <hr class="w-100">
            
            <h2 for="" class=" col-form-label " >4-@lang('main.Summary of the request and its reason') :</h2>
        
            <div class="form-group row w-100 ">
                <div class="col-md-4 col-form-label ">
                    <input type="radio" name="summary" value="issuance">
                    <label for="" class=" col-form-label text-left">@lang('main.release') </label>
                </div>
                <div class="col-md-4 col-form-label">
                    <input type="radio" name="summary" value="update">
                    <label for="" class=" col-form-label text-left">@lang('main.edit') </label>
                </div>
                <div class="col-md-4 col-form-label">
                    <input type="radio" name="summary" value="cancel">
                    <label for="" class=" col-form-label text-left">@lang('main.cancel') </label>
                </div>
                <div class="col-md-12">
                    <textarea type="text" class="form-control" placeholder="  ......" name="reason"></textarea>
                </div>
            </div>
            <hr class="w-100">
            <div class="form-group row w-200 text-left">
                <h2 for="" class="col-md-5 col-form-label">5-@lang('main.Proposed modifications') </h2>
                <div class="col-12">
                    <textarea type="text" class="form-control" placeholder="  ......" name="suggested_modifications"></textarea>
                </div>
            </div>
            <hr class="w-100">
            <div class="form-group text-left">
                <h2 for="" class="col-2 col-form-label">@lang('main.applicant') :</h2>
            </div>
            <div class="form-group row w-10 ">
                <label for="" class="col-md-1 col-form-label">@lang('main.name') </label>
                <div class="col-6">
                    <input type="text" class="form-control" placeholder="  ......" name="applicant">
                </div>
            </div>
            @if (Auth::user()->hasRole('Admin'))
            <hr class="w-100">

            <div class="form-group text-left">
                <h1 for="" class="col-md-6 col-form-label">6-@lang('main.Quality manager saw') </h1>
                <div class="col-12">
                    <textarea type="text" class="form-control" name="quality_manager"></textarea>
                </div>
            </div>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th class="  text-center col-4 ">
                            <div class="" style="text-align:start ;">
                                <label for="" class="" style="text-align: center;;">
                                    @lang('main.name') :</label>

                                <input class="form-control" type="text" name="quality_manager_name" style="text-align: end;" placeholder="">
                            </div>

                        </th>
                        <th class=" text-center col-4 ">
                            <div class="" style="text-align:start ;">
                                <label for="" class="" style="text-align: center;;">
                                    @lang('main.job') :</label>

                                <input class="form-control" type="text" name="quality_manager_job" style="text-align: end;" placeholder="">
                            </div>

                        </th>
                        <th class=" text-center col-4 ">
                            <div class="" style="text-align:start ;">
                                <label for="" class="" style="text-align: center;">@lang('main.date') :</label>

                                <input class="form-control" type="date" name="quality_manager_date" style="text-align: end;">
                            </div>
                        </th>
                    </tr>
                </thead>
            </table>
            @endif
            @if (Auth::user()->hasRole('SuperAdmin'))
            <div class="form-group text-left">
                <h1 for="" class="col-md-4 col-form-label">6-@lang('main.Quality manager saw') :</h1>
                <div class="col-12">
                    <textarea type="text" class="form-control" name="quality_manager"></textarea>
                </div>
            </div>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th class="  text-center col-4 ">
                            <div class="" style="text-align:start ;">
                                <label for="" class="" style="text-align: center;;">
                                    @lang('main.name') :</label>

                                <input class="form-control" type="text" name="quality_manager_name" style="text-align: end;" placeholder="">
                            </div>

                        </th>
                        <th class=" text-center col-4 ">
                            <div class="" style="text-align:start ;">
                                <label for="" class="" style="text-align: center;">
                                    @lang('main.job') :</label>

                                <input class="form-control" type="text" name="quality_manager_job" style="text-align: end;" placeholder="">
                            </div>

                        </th>
                        <th class=" text-center col-4 ">
                            <div class="" style="text-align:start ;">
                                <label for="" class="" style="text-align: center;">@lang('main.date') :</label>

                                <input class="form-control" type="date" name="quality_manager_date" style="text-align: end;">
                            </div>
                        </th>
                    </tr>
                </thead>
            </table>
            <hr class="w-100">
            <div class="form-group row w-100 text-center shadow-lg" style='color:#001635'>
                <h1 for="" class="col-10 col-form-label">*@lang('main.In the event that there is more than one administration, their approvals and signatures shall be attached in a table showing the administration and its opinion and the signature of the person in charge')</h1>
            </div>
            <div class="form-group row w-100 text-left">
                <label for="" class="col-md-4 col-form-label">-@lang('main.Resolution supported document') </label>
                <div class="col-12">
                    <textarea type="text" class="form-control" placeholder="  ......" name="document_approved_decision"></textarea>
                </div>
            </div>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th class="  text-center col-4 ">
                            <div class="" style="text-align:start ;">
                                <label for="" class="" style="text-align: center;">
                                    @lang('main.name') :</label>

                                <input class="form-control" type="text" name="document_approved_name" style="text-align: end;" placeholder="">
                            </div>

                        </th>
                        <th class=" text-center col-4 ">
                            <div class="" style="text-align:start ;">
                                <label for="" class="" style="text-align: center;">
                                    @lang('main.job') :</label>

                                <input class="form-control" type="text" name="document_approved_job" style="text-align: end;" placeholder="">
                            </div>

                        </th>
                        <th class=" text-center col-4 ">
                            <div class="" style="text-align:start ;">
                                <label for="" class="" style="text-align: center;">@lang('main.date') :</label>

                                <input class="form-control" type="date" name="document_approved_date" style="text-align: end;">
                            </div>
                        </th>
                    </tr>
                </thead>
            </table>
            @endif
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
            <div class='row'>
                <button style="border-radius:8px;margin: 50px; width:30% ;background-color: #2a415b; ;height: 5%;padding:10px;margin-right:100px;margin:auto" type="submit" class="btn btn-primary col-md-4">
                    <i class="fas fa-save" style="width:15% ; height: 20%;"></i>@lang('main.save')</button>
            </div>
        </form>
    </div>

    <style>
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
