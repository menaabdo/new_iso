@extends('layouts.master')

@section('content')
<style>
    .shadow-lg {
        box-shadow: 0 1rem 3rem rgba(0, 0, 0, .175) !important;
    }

    th {
        vertical-align: middle !important;
    }
    @media only screen and (max-width: 600px) {
    
    .lab{
            margin-bottom: 26px;
    }}

</style>


<div class="container mt-3 p-3 card row">



    <form action="{{route('noticeInternal.store')}}" method="post" enctype="multipart/form-data" class='col-md-11' style='margin:auto' id="fo1">
        {{ csrf_field() }}
        <div style="" class="w-100 text-center my-4">
            <h2 style='text-shadow: 1px 1px 1px #3ed3ea;'>@lang('main.Notify of an internal  audit')</h2>
            <hr class="w-50">
        </div>
        <div class=" p-2" style="">
            <div class="form-group row  text-right mr-5 ">
                <div class="col-md-3" style='text-align:right !important'>
                    <label for="" class=" col-form-label  ">@lang('main.to') :</label>

                    <input type="text" class=" form-control shadow-lg" name="to">
                </div>
                <div class="col-md-3" style='text-align:right !important'>
                    <label for="" class=" col-form-label">@lang('main.Revision Number') :</label>

                    <input type="text" class="form-control shadow-lg" name="revision_number">
                </div>
                <div class="col-md-3" style='text-align:right !important'>
                    <label for="" class=" col-form-label"> @lang('main.date') :</label>

                    <input type="date" class="form-control shadow-lg" name="date" placeholder="رئيس فريق المراجعه  ......" id="">
                </div>
            </div>
            <div class="form-group row mr-5 text-right">

                <div class="col-md-3" style='text-align:right !important'>
                    <label for="" class=" col-form-label">@lang('main.from') :</label>

                    <input type="text" class="form-control shadow-lg" name="from">
                </div>
                <div class="col-md-3" style='text-align:right !important'>
                    <label for="" class=" col-form-label ">@lang('main.Place Review') :</label>

                    <input type="text" class="form-control shadow-lg" name="place_review">
                </div>
                <div class="col-md-3" style='text-align:right !important;'>
                    <label for="" class=" col-form-label">@lang('main.time') :</label>

                    <input type="text" class="form-control shadow-lg" name="time">
                </div>
            </div>

           
            <div class="form-group row mr-5 p-3 border rounded" style='margin:auto;background: #001635 !important;color:white'>
                <div class='col-md-10'>
                    <label for="" class=" col-form-label">@lang('main.We inform you that the internal audit will be carried out on the audit') :</label>

                    <input type="text" class="form-control shadow-lg" placeholder="  ......" name="implementation_review">
                </div>

                <p class='py-3'>@lang('main.This is to ensure the application of systems and study their effectiveness according to the following') : </p>
                <div class="form-group row w-100 text-right">
                    <label for="" class="col-7 col-form-label">@lang('main.review'):</label>
                    <div class="col-10">
                        <textarea type="text" class="form-control" name="review"placeholder="@lang('main.review')......"></textarea>
                    </div>
                </div>
            </div>
            <hr size="20">
            <div class="form-group row mr-5 p-3 border rounded" style='margin:auto;background: #001635 !important;color:white'>
                <label for="" class="col-7 col-form-label">@lang('main.references_used'):</label>
                <div class="col-10">
                    <textarea type="text" class="form-control" name="references_used" placeholder="@lang('main.references_used')......"></textarea>
                </div>
            </div>
            <hr size="20">
            <div class="form-group row mr-5 p-3 border rounded" style='margin:auto;background: #001635 !important;color:white'>

                <label for="" class="col-12 col-form-label">@lang('main.references_team'): </label>
                <label for="" class="col-1 col-form-label">1 -</label>
                <div class="col-3">
                    <input type="text" class="form-control" placeholder="  ......" name="team_1">
                </div>
                <!-- <label for="" class="col-1 col-form-label">2 -</label> -->
                <div class="col-5">
                    <input type="text" class="form-control" placeholder="  ......" name="team_2">
                </div>
            </div>
            <hr size="20">
            <div class="form-group row mr-5 p-3 border rounded" style='margin:auto;background: #001635 !important;color:white'>

                <h6 for="" class="col-10 col-form-label">* @lang('main.notes')</h6>
            </div>
            <hr>
            <table class="table">
                <thead>
                    <tr>
                        @if (Auth::user()->hasRole('Admin'))
                        <th class=" w-50 text-center col-2 ">
                            <div class="" style="text-align:center ;">
                                <label for="" class="" style="font-size:large;font-weight: bolder;">@lang('main.prepare')  (@lang('main.quality manager')) :</label>
                            </div>
                            <div class="form-group row w-10 text-center">
                                <label for="" class="col-1 col-form-label">@lang('main.name') </label>
                                <div class="col-4">
                                    <input type="text" class="form-control" placeholder="  ......" name="name_1">
                                </div>
                            </div>
                            <div class="form-group row w-10 text-right">
                                <label for="" class="col-1 col-form-label">@lang('main.date'): -</label>
                                <div class="col-7">
                                    <input type="date" class="form-control" placeholder="  ......" name="date_4">
                                </div>
                            </div>
                        </th>
                        @endif
                        @if (Auth::user()->hasRole('SuperAdmin'))
                        <th class=" w-50 text-center col-md-2 ">
                            <div class="" style="text-align:center ;">
                                <label for="" class="" style="font-size:large;font-weight: bolder;">@lang('main.prepare')  (@lang('main.quality manager')) :</label>
                            </div>
                            <div class="form-group row w-10 text-center mt-3">
                                <label for="" class="col-md-3 col-form-label ">@lang('main.name') </label>
                                <div class="col-md-7">
                                    <input type="text" class="form-control shadow-lg" placeholder="  ......" name="name_1">
                                </div>
                            </div>
                            <div class="form-group row w-10 text-right">
                                <label for="" class="col-md-3 col-form-label">@lang('main.date'): -</label>
                                <div class="col-7">
                                    <input type="date" class="form-control shadow-lg" placeholder="  ......" name="date_4">
                                </div>
                            </div>
                        </th>
                        <th class=" w-50 text-center col-2 ">
                            <div class="" style="text-align:center ;">
                                <label for="" class="" style="text-align:center;font-size:large;font-weight: bolder;">@lang('main.approval')  (@lang('main.General Director')):</label>
                            </div>
                            <div class="form-group row w-10 text-center mt-3">
                                <label for="" class="col-md-3 col-form-label">@lang('main.name') </label>
                                <div class="col-md-7">
                                    <input type="text" class="form-control shadow-lg" placeholder="  ......" name="name_2">
                                </div>
                            </div>
                            <div class="form-group row w-10 text-right">
                                <label for="" class="col-md-3 col-form-label">@lang('main.date'): -</label>
                                <div class="col-md-7">
                                    <input type="date" class="form-control" placeholder="  ......" name="date_5">
                                </div>
                            </div>
                        </th>
                        @endif
                    </tr>
                </thead>
            </table>
          
            <table class="table">
                <thead>
                    <tr>
                        <th class=" w-50 text-center col-2 ">
                            <div class="" style="text-align:center ;">
                                <label for="" class="" style="text-align:center;font-size:large;font-weight: bolder;">@lang('main.The referenced party to sign for receipt') :</label>
                            </div>
                            <div class="form-group row w-10 text-center mt-3">
                                <label for="" class="col-md-3 col-form-label">@lang('main.name') </label>
                                <div class="col-md-4">
                                    <input type="text" class="form-control shadow-lg" placeholder="  ......" name="name_3">
                                </div>
                            </div>
                            <div class="form-group row w-10 text-center">

                                <label for="" class="col-md-3 col-form-label">@lang('main.job') </label>
                                <div class="col-md-4">
                                    <input type="text" class="form-control shadow-lg" placeholder="  ......" name="job">
                                </div>
                            </div>
                            <div class="form-group row w-10 text-center">
                                <label for="" class="col-md-3 col-form-label">@lang('main.date') </label>
                                <div class="col-md-4">
                                    <input type="date" class="form-control" placeholder="  ......" name="date_6">
                                </div>
                            </div>
                        </th>
                        <th class=" w-50 text-center col-2 ">
                            <div class="" style="text-align:center ;">
                                <label for="" class="" style="text-align:center;font-weight: bolder;">@lang('main.The referenced party to sign the approval of the planned date') :</label>
                            </div>
                            <div class="form-group row w-10 text-center">
                                <label for="" class="col-md-3 col-form-label">@lang('main.name') </label>
                                <div class="col-md-4">
                                    <input type="text" class="form-control shadow-lg" placeholder="  ......" name="name_4">
                                </div>
                            </div>
                            <div class="form-group row w-10 text-center">


                                <label for="" class="col-md-3 col-form-label">@lang('main.job') </label>
                                <div class="col-md-4">
                                    <input type="text" class="form-control shadow-lg" placeholder="  ......" name="job_2">
                                </div>
                            </div>
                            <div class="form-group row w-10 text-center">
                                <label for="" class="col-md-3 col-form-label">@lang('main.Proposed review date')</label>
                                <div class="col-4">
                                    <input type="date" class="form-control shadow-lg" placeholder="  ......" name="date_7">
                                </div>
                            </div>
                        </th>
                    </tr>
                </thead>
            </table>
        </div>
        <table class="table table-bordered ">
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

@stop
