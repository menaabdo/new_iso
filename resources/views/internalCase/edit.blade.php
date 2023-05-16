@extends('layouts.master')

@section('content')
<style>
    .shadow-lg {
    box-shadow: 0 1rem 3rem rgba(0,0,0,.175)!important;}
    input,textarea{ box-shadow: 0 1rem 3rem rgba(0,0,0,.175)!important;}
</style>
    <div class="card">
        <div class="card-body">
           
            <form style='margin-top:85px;width:80%;margin:auto' action="{{ route('internalCases.update', $internalCases->id) }}" method="post" enctype="multipart/form-data"
                id="fo1">
                @method('PUT')
                {{ csrf_field() }}
                <div style="" class="w-100 text-center my-4">
                    <h2 style='text-shadow: 1px 1px 1px #3ed3ea;'> @lang('main.Internal Issue Form')</h2>
                    <hr class="w-100">
                </div>
                <div class='row mt-4 mb-3'>
      <label class="col-2 col-form-label text-center">@lang('main.Company Logo')</label>
                 @if ($internalCases->status == 'pending' && Auth::user()->hasRole('Employee'))
                        <input type="file" id="img" name="logo" accept="image/*">
                    @endif

                    @if (($internalCases->status == 'inProgress' && Auth::user()->hasRole('Admin')) ||
                        ($internalCases->status == 'pending' && Auth::user()->hasRole('Admin')))
                        <input type="file" id="img" name="logo" accept="image/*">
                    @endif
                    @if (($internalCases->status == 'inProgress' && Auth::user()->hasRole('SuperAdmin')) ||
                        ($internalCases->status == 'pending' && Auth::user()->hasRole('SuperAdmin')) ||
                        ($internalCases->status == 'confirmed' && Auth::user()->hasRole('SuperAdmin')))
                        <input type="file" id="img" name="logo" accept="image/*">
                    @endif
                    <img src="{{ asset($internalCases->logo) }}" height=100px width=100px; />
         
                </div>
                <hr class="w-100">
                <div class="form-group row w-100 text-right" style="text-align:center;">
                    <table class="table">
                        <tr style="background-color:#001635 ;color:white; text-align:center;">
                            <th>@lang('main.issue topic')</th>
                            <th>@lang('main.the influence')</th>
                            <th>@lang('main.Monitoring and review mechanism')</th>
                        </tr>
                        <tr style="text-align:center;">
                            <th>
                                <label>(@lang('main.POLITICAL'))</label>
                                <textarea class="form-control" type="text" name="political">{{ $internalCases->political }}</textarea>
                            </th>
                            <th>
                                <textarea class="form-control" type="text" name="political_effect">{{ $internalCases->political_effect }}</textarea>
                            </th>
                            <th>
                                <textarea class="form-control" type="text" name="political_monitoring_review">{{ $internalCases->political_monitoring_review }}</textarea>
                            </th>
                        </tr>
                        <tr style="text-align:center;">
                            <th>
                                <label>(@lang('main.ECONOMIC'))</label>
                                <textarea class="form-control" type="text" name="economic">{{ $internalCases->economic }}</textarea>
                            </th>
                            <th>
                                <textarea class="form-control" type="text" name="economic_effect">{{ $internalCases->economic_effect }}</textarea>
                            </th>
                            <th>
                                <textarea class="form-control" type="text" name="economic_monitoring_review">{{ $internalCases->economic_monitoring_review }}</textarea>
                            </th>
                        </tr>
                        <tr style="text-align:center;">
                            <th>
                                <label>(@lang('main.SOCIAL'))</label>
                                <textarea class="form-control" type="text" name="social">{{ $internalCases->social }}</textarea>
                            </th>
                            <th>
                                <textarea class="form-control" type="text" name="social_effect">{{ $internalCases->social_effect }}</textarea>
                            </th>
                            <th>
                                <textarea class="form-control" type="text" name="social_monitoring_review">{{ $internalCases->social_monitoring_review }}</textarea>
                            </th>
                        </tr>
                        <tr style="text-align:center;">
                            <th>
                                <label>(@lang('main.TECHNOLOGY'))</label>
                                <textarea class="form-control" type="text" name="technology">{{ $internalCases->technology }}</textarea>
                            </th>
                            <th>
                                <textarea class="form-control" type="text" name="technology_effect">{{ $internalCases->technology_effect }}</textarea>
                            </th>
                            <th>
                                <textarea class="form-control" type="text" name="technology_monitoring_review">{{ $internalCases->technology_monitoring_review }}</textarea>
                            </th>
                        </tr>
                        <tr style="text-align:center;">
                            <th>
                                <label>(@lang('main.LEGAL'))</label>
                                <textarea class="form-control" type="text" name="legal">{{ $internalCases->legal }}</textarea>
                            </th>
                            <th>
                                <textarea class="form-control" type="text" name="legal_effect">{{ $internalCases->legal_effect }}</textarea>
                            </th>
                            <th>
                                <textarea class="form-control" type="text" name="legal_monitoring_review">{{ $internalCases->legal_monitoring_review }}</textarea>
                            </th>
                        </tr>
                        <tr style="text-align:center;">
                            <th>
                                <label style="text-align:center;">(@lang('main.ENVIRONMENTAL'))</label>
                                <textarea class="form-control" type="text" name="environment">{{ $internalCases->environment }}</textarea>
                            </th>
                            <th>
                                <textarea class="form-control" type="text" name="environment_effect">{{ $internalCases->environment_effect }}</textarea>
                            </th>
                            <th>
                                <textarea class="form-control" type="text" name="environment_monitoring_review">{{ $internalCases->environment_monitoring_review }}</textarea>
                            </th>
                        </tr>
                    </table>
                </div>
                <hr class="w-100">
                <table class="table">
                    <thead>
                        <tr style="text-align:center;">
                            @if ($internalCases->status == 'inProgress' && Auth::user()->hasRole('Employee'))
                                <th class=" w-50 text-center col-3 " style="border: 2px solid #150c0c !important;">
                                    <div class="form-group row w-20 text-right">
                                        <label for="" class="col-5 col-form-label">@lang('main.Quality officer') </label>
                                        <div class="col-4">
                                            <input type="text" class="form-control" readonly name="name_1"
                                                value="{{ $internalCases->name_1 }}">
                                        </div>
                                    </div>
                                </th>
                            @endif
                            @if ($internalCases->status == 'confirmed' && Auth::user()->hasRole('Employee'))
                                <th class=" w-50 text-center col-3 " style="border: 1px solid silver !important;">
                                    <div class="form-group row w-20 text-right">
                                        <label for="" class="col-5 col-form-label">@lang('main.Quality officer') </label>
                                        <div class="col-4">
                                            <input type="text" class="form-control" readonly name="name_1"
                                                value="{{ $internalCases->name_1 }}">
                                        </div>
                                    </div>
                                </th>
                                <th class=" w-50 text-center col-3 " style="border: 1px solid silver !important;">

                                    <div class="form-group row w-20 text-right">
                                        <label for="" class="col-3 col-form-label">@lang('main.quality manager')</label>
                                        <div class="col-5">
                                            <input type="text" class="form-control" readonly name="name_2"
                                                value="{{ $internalCases->name_2 }}">
                                        </div>
                                    </div>
                                </th>
                            @endif
                            @if (Auth::user()->hasRole('Admin'))
                                <th class=" text-center col-3 " style="border: 2px solid #150c0c !important;">
                                    <div class="form-group row  text-right">
                                        <label for="" class="col-3 col-form-label">@lang('main.Quality officer') </label>
                                        <div class="col-4">
                                            <input type="text" class="form-control" name="name_1"
                                                value="{{ $internalCases->name_1 }}">
                                        </div>
                                    </div>
                                </th>
                                @if ($internalCases->status == 'confirmed' && Auth::user()->hasRole('Admin'))
                                    <th class=" w-50 text-center col-3 " style="border: 2px solid #150c0c !important;">

                                        <div class="form-group row w-20 text-right">
                                            <label for="" class="col-3 col-form-label">@lang('main.quality manager')</label>
                                            <div class="col-4">
                                                <input type="text" class="form-control" readonly name="name_2"
                                                    value="{{ $internalCases->name_2 }}">
                                            </div>
                                        </div>
                                    </th>
                                @endif
                            @endif
                            @if (Auth::user()->hasRole('SuperAdmin'))
                                <th class=" w-50 text-center col-3 " style="border:1px solid silver !important;">
                                    <div class="form-group row w-20 text-right">
                                        <label for="" class="col-5 col-form-label">@lang('main.Quality officer') </label>
                                        <div class="col-4">
                                            <input type="text" class="form-control" name="name_1"
                                                value="{{ $internalCases->name_1 }}">
                                        </div>
                                    </div>
                                </th>
                                <th class=" w-50 text-center col-3 " style="border: 1px solid silver !important;">

                                    <div class="form-group row w-20 text-right">
                                        <label for="" class="col-5 col-form-label">@lang('main.quality manager')</label>
                                        <div class="col-4">
                                            <input type="text" class="form-control" name="name_2"
                                                value="{{ $internalCases->name_2 }}">
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
                                    <input class="form-control" type="text" name="company_name"
                                        value="{{ $internalCases->company_name }}">
                                </div>

                            </th>
                            <th>
                                <div class="" style="text-align:start ;">
                                    <label>@lang('main.release_date') </label>
                                    <input class="form-control" type="text" name="date2"
                                        value="{{ $internalCases->date2 }}" 
                                        onfocus="(this.type='date')" onblur="(this.type='text')">
                                </div>

                            </th>
                            <th>
                                <div class="" style="text-align:start ;">
                                    <label>@lang('main.Modification date')</label>
                                    <input class="form-control" type="text" name="date3"
                                        value="{{ $internalCases->date3 }}" 
                                        onfocus="(this.type='date')" onblur="(this.type='text')">
                                </div>

                            </th>
                            <th>
                            <div class="" style="text-align:start ;">
                                <label>@lang('main.model_period')</label>
                                <input class="form-control shadow-lg" type="text" name="period_time" value="{{ $internalCases->period_time }}">
                            </div>

                        </th>
                        <th>
                            <div class="" style="text-align:start ;">
                                <label>@lang('main.page_number')</label>
                                <input class="form-control shadow-lg" type="text" name="number_page" value="{{ $internalCases->number_page }}">
                            </div>

                        </th>
                        <th>
                            <div class="" style="text-align:start ;">
                                <label>@lang('main.document_code')</label>
                                <input class="form-control shadow-lg" type="text" name="number_doc" value="{{ $internalCases->number_doc }}">
                            </div>
                        </th>
                        </tr>
                    </thead>
                </table>
                @if ($internalCases->status == 'pending' && Auth::user()->hasRole('Employee'))
                    <div class="form-group">
                        <button style="border-radius:20px;margin: 50px; width:10% ; height: 5%;" type="submit"
                            class="btn btn-primary"><i class="fas fa-save" style="width:15% ; height: 20%;">@lang('main.edit')
                            </i></button>
                    </div>
                @elseif(($internalCases->status == 'inProgress' && Auth::user()->hasRole('Admin')) ||
                    ($internalCases->status == 'pending' && Auth::user()->hasRole('Admin')))
                    <div class="form-group">
                        <button style="border-radius:20px;margin: 50px; width:10% ; height: 5%;" type="submit"
                            class="btn btn-primary"><i class="fas fa-save" style="width:15% ; height: 20%;">@lang('main.edit')
                            </i></button>
                    </div>
                @elseif(($internalCases->status == 'inProgress' && Auth::user()->hasRole('SuperAdmin')) ||
                    ($internalCases->status == 'pending' && Auth::user()->hasRole('SuperAdmin')) ||
                    ($internalCases->status == 'confirmed' && Auth::user()->hasRole('SuperAdmin')))
                    <div class='row mt-3'>
            <button style="border-radius:8px;margin: 50px; width:30% ;background-color: #2a415b; ;height: 5%;padding:10px;margin-right:100px;margin:auto" type="submit"
                class="btn btn-primary col-md-4">
                @lang('main.edit')</button>
                    </div>  
                @endif
            </form>
        </div>
        <style>
            .table thead th {
                vertical-align: bottom;
                /* border-bottom: 2px solid black; */
            }
            th {
                vertical-align: middle !important;
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
