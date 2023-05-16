@extends('layouts.master')

@section('content')

<style>
    .shadow-lg {
        box-shadow: 0 1rem 3rem rgba(0, 0, 0, .175) !important;
    }

</style>
<div class="container mt-3 p-3 card row">


    <form action="{{route('InternalAuditReport.store')}}" method="post" enctype="multipart/form-data" id="fo1" class='col-md-10' style='margin:auto'>
        {{ csrf_field() }}

        <div class="container-fluid p-4">
            <div style="text-shadow: 1px 1px 1px #3ed3ea;" class="w-100 text-center my-4">
                <h2>@lang('main.IA Report')</h2>
                <hr class="w-100">
            </div>
            <div class="form-group ">
                <label for="" class="col-4 col-form-label"> @lang('main.Manage') :</label>
                <div class="col-4">
                    <input type="text" class="form-control shadow-lg" name="manage">
                </div>
            </div>
            <div class="container-fluid p-2">
                <section class="my-10 table-bordered">
                    <div class="form-group row w-100 text-right mt-4">
                        <label for="" class="col-md-4 col-form-label mb-4">@lang('main.Referenced Authority') :</label>
                        <div class="col-md-6 mb-4">
                            <input type="text" class="form-control shadow-lg" name="referenced_authority" id="">
                        </div>
                        <label for="" class="col-md-4  col-form-label mb-4 ">@lang('main.Referenced Number') :</label>
                        <div class="col-md-6 mb-4">
                            <input type="text" class="form-control shadow-lg " name="referenced_number" id="">
                        </div>
                        <label for="" class="col-md-4  col-form-label">@lang('main.referenced_subject') :</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control shadow-lg" name="referenced_subject" id="">
                        </div>
                    </div>
                    <div class="form-group row w-100 text-right">
                        <label for="inputPassword" class="col-md-4 col-form-label">@lang('main.team_lead') :</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control shadow-lg" name="team_lead">
                        </div>
                    </div>

                    <div class="form-group row w-100 text-right">
                        <label for="inputPassword" class="col-md-4 col-form-label">@lang('main.references_team') :</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control shadow-lg" name="team">
                        </div>
                    </div>

                    <div class="form-group row w-100 text-right">
                        <label for="" class="col-md-4 col-form-label">@lang('main.type Review') :</label>
                       
                            @php
                            if (App::getLocale() == 'ar')
                                $align='left';
                            else
                                $align='right';
                            @endphp
                            
                        
                        <label for="" style="text-align:{{$align}};" class="col-md-2 col-form-label">@lang('main.planing') </label>
                        <div class=" col-form-label pl-2">
                            <input type="radio" style='margin-top:6px' id="planing" name="planing" value="planing" class='shadow-lg'>
                        </div>


                        <label for="" style="text-align:{{$align}};" class="col-md-3 col-form-label">@lang('main.not_planing') </label>
                        <div class=" col-form-label pr-1">
                            <input type="radio" id="not_planing" style='margin-top:6px' name="planing" value="not_planing" class='shadow-lg'>
                        </div>
                    </div>

                </section>


                <div class="form-group row w-100 text-right mt-4">
                    <label for="" class="col-md-3 col-form-label" style="text-shadow: 1px 1px 1px #3ed3ea;margin:auto">@lang('main.result Review') :</label>
                </div>


                <div class="form-group row w-100 text-right">
                    <label for="inputPassword" class="col-md-2 col-form-label ">@lang('main.strong_point') : </label>
                    <div class="col-md-10">
                        <textarea type="text" class="form-control shadow-lg" name="strong_point"></textarea>
                    </div>
                </div>

                <div class="form-group row w-100 text-right">
                    <label for="inputPassword" class="col-2 col-form-label">@lang('main.no_strong_point')</label>
                    <div class="col-10">
                        <textarea type="text" class="form-control shadow-lg" name="no_strong_point"></textarea>
                    </div>
                </div>

                <div class="form-group row w-100 text-right">
                    <label for="inputPassword" class="col-2 col-form-label">@lang('main.improvement_notes') : </label>
                    <div class="col-10">
                        <textarea type="text" class="form-control shadow-lg" name="improvement_notes" ></textarea>
                    </div>
                </div>
                <hr>
                <div class="form-group row w-100 text-right">
                    <label for="" class="col-md-2 col-form-label">@lang('main.name') :</label>
                    <div class="col-3">
                        <input type="text" class="form-control shadow-lg" placeholder="@lang('main.name')    ......" name="name">
                    </div>

                    <label for="" class="col-md-2 col-form-label"> @lang('main.date') :</label>
                    <div class="col-3">
                        <input type="date" class="form-control shadow-lg" name="date_2">
                    </div>
                </div>
                <hr>
                <div class="form-group row w-100 text-right">
                    <label for="" class="col-2 col-form-label" style='text-shadow: 1px 1px 1px #3ed3ea;margin:auto'> نتائج المراجعة :</label>
                </div>

                <div class="form-group row w-100 text-right">
                    <label for="" class="col-md-4 col-form-label">@lang('main.Responsible for the referenced entity')</label>
                    <div class="col-md-8">
                        <input type="text" class="form-control shadow-lg" placeholder="@lang('main.name')    ......" name="referance_name">
                    </div>

                    <label for="" class="col-md-4 col-form-label mt-3"> @lang('main.date') </label>
                    <div class="col-4">
                        <input type="date" class="form-control shadow-lg mt-3"  name="date_1">
                    </div>
                </div>


            </div>
            <div class='row'>
                <table class="table table-bordered col-md-12">
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


@stop
