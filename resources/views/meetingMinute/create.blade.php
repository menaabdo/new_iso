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
<!-- Content Header (Page header) -->
<div class='row card'>
    <div class='row card' style='margin:auto'>

        <form action="{{route('meetingMinute.store')}}" method="post" class='col-md-9 w-100' style='margin:auto;margin-top:80px' enctype="multipart/form-data" id="fo1">
            {{ csrf_field() }}

            <div class="container p-4">
                <div style="" class=" text-center">
                    <h1 style='text-shadow: 1px 1px 1px #3ed3ea;'>@lang('main.Minutes of Meeting') </h1>
                    <hr class="w-100">
                </div>
                <div class='shadow-lg p-3 col-md-12'>
                    <label class="col-md-5" style=''>@lang('main.meeting_num')</label>
                    <input class="col-md-3 form-control  shadow-lg" type="text" name="num">

                </div>
                <div class='shadow-lg p-3'>
                    <label class="form-label pr-5">@lang('main.Company Logo')</label>
                    <div class=''>
                        <input type="file" id="img" class='shadow-lg' name="logo" accept="image/*">
                    </div>
                </div>
                <div class='shadow-lg p-3'>
                    <label for="" class="col-md-2">@lang('main.date'):</label>

                    <input type="date" class="col-md-4 form-control  shadow-lg" name="date_1">
                </div>
                <div class='shadow-lg p-3'>
                    <label for="" class="col-md-4">@lang('main.meeting_place') :</label>

                    <input type="text" class="col-md-4 form-control  shadow-lg" name="place_meeting">
                </div>

                <div class=" form-group row mt-3 text-center">

                  
                    <div class="col-12">
                        <h5>@lang('main.Attendees according to the attached list') :</h5>
                    </div>
                    <br>
                    <label for="" class="col-md-4 col-form-label ">@lang('main.meeting_time1'):</label>
                    <div class="col-3">
                        <input type="text" class="form-control shadow-lg" name="time_meeting">
                    </div>
                </div>
                <div class=" form-group row w-200 text-center">
                    <label for="" class="col-md-4 col-form-label text-left">@lang('main.The purpose of the meeting') :</label>
                    <div class="col-10  rounded shadow-lg" style=''>
                        <div class="col-">
                            <label>@lang('main.Discussing and reviewing the companys policies and departmental objectives, ensuring the effectiveness of applying the system, and considering its permanent development') . </label>
                        </div>
                    </div>
                </div>


                <h1 for="" class="col-12 col-form-label" style='text-shadow: 1px 1px 1px #3ed3ea;'>@lang('main.Meeting topics') :</h1>
                <div class="form-group row w-100 text-center ">
                    <h2 for="" class="col-12 col-form-label" >1-@lang('main.The results of previous management reviews and the effectiveness of implementing their decisions').</h2>
                    <h2 for="" class="col-12 col-form-label">2-@lang('main.Senior management goals (policies / action plans / development projects)').</h2>
                    <h2 for="" class="col-12 col-form-label">3-@lang('main.The results of internal audits on the quality systems applied by the company').</h2>
                    <h2 for="" class="col-12 col-form-label">4-@lang('main.The results of external audits on the quality systems applied by the company (if any)').</h2>
                    <h2 for="" class="col-12 col-form-label">5-@lang('main.The position of cases of non-conformity in different departments').</h2>
                    <h2 for="" class="col-12 col-form-label">6-@lang('main.Corrective/preventive action attitude').</h2>
                    <h2 for="" class="col-12 col-form-label">7-@lang('main.Evaluate marketing and sales work, including competitor performance and customer feedback').</h2>
                    <h2 for="" class="col-12 col-form-label">8-@lang('main.Training needs').</h2>
                    <h2 for="" class="col-12 col-form-label">9-@lang('main.human and technical needs').</h2>
                    <h2 for="" class="col-12 col-form-label">10-@lang('main.Any new work related to the quality systems applied by the company').</h2>
                    <h2 for="" class="col-12 col-form-label">11-@lang('main.Amendments to the organizational structure').</h2>
                    <h2 for="" class="col-12 col-form-label">12-@lang('main.Any customer complaints regarding the quality of the services of a quality factory for cement products').</h2>
                    <h2 for="" class="col-12 col-form-label">13-@lang('main.The extent to which the ISO 9001 system has been achieved and effective, and any improvement needs'). </h2>
                    <h2 for="" class="col-12 col-form-label">14-@lang('main.Follow-up work from previous management reviews').</h2>
                    <h2 for="" class="col-12 col-form-label">15-@lang('main.Planned changes that may affect the quality systems applied in a factory across the quality of cement products').</h2>
                    <h2 for="" class="col-12 col-form-label">16-@lang('main.recommendations for improvement').</h2>
                </div>


                <div class="form-group row w-100 text-right">
                    <h1 for="" class="col-md-4 col-form-label" style='text-shadow: 1px 1px 1px #3ed3ea;'>@lang('main.Meeting summary') :</h1>
                </div>
                <div class="form-group row w-100 text-right">
                    <h1 for="" class="col-6 col-form-label">@lang('main.The position of previous management reviews') :</h1>
                    <div class="col-10">
                        <textarea type="text" class="form-control shadow-lg" placeholder="@lang('main.review') ......" name="stand_review"></textarea>
                    </div>
                </div>
                <div class="form-group row w-100 text-right">
                    <h1 for="" class="col-5 col-form-label">@lang('main.Resolutions and recommendations of the meeting') :</h1>
                </div>
                <div class="form-group row w-100 ">
                    <h1 for="" class="col-md-12 col-form-label">@lang('main.First:With regard to improving the efficiency of the quality management system, the following has been decided')</h1>
                </div>
                <div class="form-group row w-10 text-center">
                    <label for="" class="col-1 col-form-label">1 -</label>
                    <div class="col-9">
                        <textarea type="text" class="form-control" placeholder="  ......" name="improve_efficiency_1"></textarea>
                    </div>
                </div>
                <div class="form-group row w-10 text-center">
                    <label for="" class="col-1 col-form-label">2 -</label>
                    <div class="col-9">
                        <textarea type="text" class="form-control" placeholder="  ......" name="improve_efficiency_2"></textarea>
                    </div>
                </div>
                <div class="form-group row w-10 text-center">
                    <label for="" class="col-1 col-form-label">3 -</label>
                    <div class="col-9">
                        <textarea type="text" class="form-control" placeholder="  ......" name="improve_efficiency_3"></textarea>
                    </div>
                </div>
                <div class="form-group row w-100 ">
                    <h1 for="" class="col-md-12 col-form-label">@lang('main.Second:With regard to improving services according to customer requirements, it has been decided')</h1>
                </div>
                <div class="form-group row w-10 text-center">
                    <label for="" class="col-1 col-form-label">1 -</label>
                    <div class="col-9">
                        <textarea type="text" class="form-control" placeholder="  ......" name="improve_service_1"></textarea>
                    </div>
                </div>
                <div class="form-group row w-10 text-center">
                    <label for="" class="col-1 col-form-label">2 -</label>
                    <div class="col-9">
                        <textarea type="text" class="form-control" placeholder="  ......" name="improve_service_2"></textarea>
                    </div>
                </div>
                <div class="form-group row w-10 text-center">
                    <label for="" class="col-1 col-form-label">3 -</label>
                    <div class="col-9">
                        <textarea type="text" class="form-control" placeholder="  ......" name="improve_service_3"></textarea>
                    </div>
                </div>
                <div class="form-group row w-100">
                    <h1 for="" class="col-md-12 col-form-label">@lang('main.Third:The required human and material resources are')</h1>
                </div>
                <div class="form-group row w-10 text-center">
                    <label for="" class="col-1 col-form-label">1 -</label>
                    <div class="col-9">
                        <textarea type="text" class="form-control" placeholder="  ......" name="hr_1"></textarea>
                    </div>
                </div>
                <div class="form-group row w-10 text-center">
                    <label for="" class="col-1 col-form-label">2 -</label>
                    <div class="col-9">
                        <textarea type="text" class="form-control" placeholder="  ......" name="hr_2"></textarea>
                    </div>
                </div>
                <div class="form-group row w-10 text-center">
                    <label for="" class="col-1 col-form-label">3 -</label>
                    <div class="col-9">
                        <textarea type="text" class="form-control" placeholder="  ......" name="hr_3"></textarea>
                    </div>
                </div>

                <hr >
                <table class="table">
                    <thead>
                        <tr>
                            @if (Auth::user()->hasRole('Admin'))
                            <th class=" w-50 text-center col-2 ">
                                <div class="" style="text-align:center ;">
                                    <label for="" class="" style="font-size:large;font-weight: bolder;">@lang('main.management representative') :</label>
                                </div>
                                <div class="form-group row w-10 text-center">
                                    <label for="" class="col-3 col-form-label">@lang('main.name') </label>
                                    <div class="col-8">
                                        <input type="text" class="form-control" placeholder="  ......" name="name_1">
                                    </div>

                                    <label for="" class="col-3 col-form-label">@lang('main.date') </label>
                                    <div class="col-8">
                                        <input type="date" class="form-control" placeholder="  ......" name="date_2">
                                    </div>
                                </div>

                            </th>
                            @endif
                            @if (Auth::user()->hasRole('SuperAdmin'))
                            <th class=" w-50 text-center col-2 ">
                                <div class="" style="text-align:center ;">
                                    <label for="" class="" style="font-size:large;font-weight: bolder;">@lang('main.management representative') :</label>
                                </div>
                                <div class="form-group row w-10 text-center">
                                    <label for="" class="col-3 col-form-label">@lang('main.name') </label>
                                    <div class="col-8">
                                        <input type="text" class="form-control" placeholder="  ......" name="name_1">
                                    </div>

                                    <label for="" class="col-3 col-form-label">@lang('main.date') </label>
                                    <div class="col-8">
                                        <input type="date" class="form-control" placeholder="  ......" name="date_2">
                                    </div>
                                </div>

                            </th>
                            <th class=" w-50 text-center col-2 ">
                                <div class="" style="text-align:center ;">
                                    <label for="" class="" style="text-align:center;font-size:large;font-weight: bolder;">@lang('main.General Director'):</label>
                                </div>
                                <div class="form-group row w-10 text-center">
                                    <label for="" class="col-3 col-form-label">@lang('main.name') </label>
                                    <div class="col-8">
                                        <input type="text" class="form-control" placeholder="  ......" name="name_2">
                                    </div>

                                    <label for="" class="col-3 col-form-label">@lang('main.date') </label>
                                    <div class="col-8">
                                        <input type="date" class="form-control" placeholder="  ......" name="date_3">
                                    </div>
                                </div>
                            </th>
                            @endif
                        </tr>
                    </thead>
                </table>
                <div class='row w-100'>
                    <table class="table col-md-12">
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
            </div>

        </form>
    </div>
</div>

<style>
    .table thead th {
        vertical-align: bottom;
        /* border-bottom: 2px solid black; */
    }

    table,
    th,
    td,
    tr {
        border: 1px solid;
        /* border-bottom: 2px solid black; */
        /* border-top: 2px solid black; */
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
