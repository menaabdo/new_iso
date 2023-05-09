@extends('layouts.master')

@section('content')

<style>
    .shadow-lg {
        box-shadow: 0 1rem 3rem rgba(0, 0, 0, .175) !important;
    }
    input{
        box-shadow: 0 1rem 3rem rgba(0, 0, 0, .175) !important;

    }

</style>
<div class="card  ">
    <div class=" row " style='margin-top:5px;margin-right:100px'>


          
        <form action="{{ route('work_plan.update', $work_plan->id) }}" method="post" enctype="multipart/form-data"
            id="fo1" class='col-md-12'>
            @method('PUT')
            {{ csrf_field() }}
            <div class="container p-4">

                <div style="" class="w-100 text-center my-4">
                    <h2 style="text-shadow: 1px 1px 1px #3ed3ea;margin-top:85px;">الخطة السنوية للمراجعات الداخلية</h2>
                    <hr class="w-100">
                </div>
                <div class="form-group row text-center mt-5">
                    <label for="" class="col-3 col-form-label">@lang('main.date')</label>
                    <div class="col-3">
                        <input type="date" class="form-control" name="date_1"
                            value="{{ $work_plan->date_1 }}">
                    </div>
                </div>

                <div class="form-group row  text-right" style="text-align:center ;overflow-x: auto;">
   <table  class="table table-bordered  text-center col-md-11 mt-5" style="grid-auto-flow: column;justify-content: center; align-content: center;">
                   
                        <tr style='background-color: #2a415b;font-size:11px;
    color: white;'>  @if ($work_plan->status == 'pending' && Auth::user()->hasRole('Employee'))
                                <th class="col-1 col-form-label">@lang('main.m')</th>
                            @endif
                            @if (($work_plan->status == 'inProgress' && Auth::user()->hasRole('Admin')) ||
                                ($work_plan->status == 'pending' && Auth::user()->hasRole('Admin')))
                                <th class="col-1 col-form-label">@lang('main.m')</th>
                            @endif
                            @if (($work_plan->status == 'inProgress' && Auth::user()->hasRole('SuperAdmin')) ||
                                ($work_plan->status == 'pending' && Auth::user()->hasRole('SuperAdmin')) ||
                                ($work_plan->status == 'confirmed' && Auth::user()->hasRole('SuperAdmin')))
                                <th class="col-1 col-form-label">@lang('main.m')</th>
                            @endif
                            <th class="col-3 col-form-label">@lang('main.Referenced Authority') </th>
                            <th class="col-3 col-form-label">@lang('main.Review topics/items') </th>
                            <th class='rota'>@lang('main.January')</th>
                            <th class='rota'>@lang('main.February')</th>
                            <th class='rota'> @lang('main.March')</th>
                            <th class='rota'> @lang('main.April')</th>
                            <th class='rota'> @lang('main.May')</th>
                            <th class='rota'> @lang('main.June')</th>
                            <th class='rota'> @lang('main.July')</th>
                            <th class='rota'>@lang('main.August')</th>
                            <th class='rota'>@lang('main.September')</th>
                            <th class='rota'>@lang('main.October')</th>
                            <th class='rota'>@lang('main.November')</th>
                            <th class='rota'>@lang('main.December')</th>
                            <th class="col-3 col-form-label">@lang('main.note')</th>
                        </tr>
                        @if (count($work_plan->plan) > 0)
                            @foreach ($work_plan->plan as $key => $work)
                                <tr id="plan-{{ $key }}">
                                    @if ($work_plan->status == 'pending' && Auth::user()->hasRole('Employee'))
                                        <td class="text-center end-td ">
                                            <button type="button" title="Remove"
                                                onclick="removeRow({{ $key }},{{ $work->id }})"
                                                @if ($key == 0) disabled="disabled" @endif
                                                class="btn btn-danger btn-option">
                                                <i class="fa fa-minus-circle"></i>
                                            </button>
                                        </td>
                                    @endif
                                    @if (($work_plan->status == 'inProgress' && Auth::user()->hasRole('Admin')) ||
                                        ($work_plan->status == 'pending' && Auth::user()->hasRole('Admin')))
                                        <td class="text-center end-td ">
                                            <button type="button" title="Remove"
                                                onclick="removeRow({{ $key }},{{ $work->id }})"
                                                @if ($key == 0) disabled="disabled" @endif
                                                class="btn btn-danger btn-option">
                                                <i class="fa fa-minus-circle"></i>
                                            </button>
                                        </td>
                                    @endif
                                    @if (($work_plan->status == 'inProgress' && Auth::user()->hasRole('SuperAdmin')) ||
                                        ($work_plan->status == 'pending' && Auth::user()->hasRole('SuperAdmin')) ||
                                        ($work_plan->status == 'confirmed' && Auth::user()->hasRole('SuperAdmin')))
                                        <td class="text-center end-td ">
                                            <button type="button" title="Remove"
                                                onclick="removeRow({{ $key }},{{ $work->id }})"
                                                @if ($key == 0) disabled="disabled" @endif
                                                class="btn btn-danger btn-option">
                                                <i class="fa fa-minus-circle"></i>
                                            </button>
                                        </td>
                                    @endif
                                    <th><input class="form-control" type="text"
                                            name="plan[{{ $key }}][referenced_authority]"
                                            value="{{ $work->referenced_authority }}"></th>
                                    <th><input class="form-control" type="text"
                                            name="plan[{{ $key }}][review_topics]"
                                            value="{{ $work->review_topics }}"></th>
                                    <th><input style="width: 40px; height: 40px; " type="checkbox"
                                            name="plan[{{ $key }}][jan]" value="1"
                                            {{ $work_plan->plan[$key]->jan == '1' ? 'checked' : '' }}></th>
                                    <th><input style="width: 40px; height: 40px; " type="checkbox"
                                            name="plan[{{ $key }}][feb]" value="1"
                                            {{ $work_plan->plan[$key]->feb == '1' ? 'checked' : '' }}></th>
                                    <th><input style="width: 40px; height: 40px; " type="checkbox"
                                            name="plan[{{ $key }}][mar]" value="1"
                                            {{ $work_plan->plan[$key]->mar == '1' ? 'checked' : '' }}></th>
                                    <th><input style="width: 40px; height: 40px; " type="checkbox"
                                            name="plan[{{ $key }}][epr]" value="1"
                                            {{ $work_plan->plan[$key]->epr == '1' ? 'checked' : '' }}></th>
                                    <th><input style="width: 40px; height: 40px; " type="checkbox"
                                            name="plan[{{ $key }}][may]" value="1"
                                            {{ $work_plan->plan[$key]->may == '1' ? 'checked' : '' }}></th>
                                    <th><input style="width: 40px; height: 40px; " type="checkbox"
                                            name="plan[{{ $key }}][jaun]" value="1"
                                            {{ $work_plan->plan[$key]->jaun == '1' ? 'checked' : '' }}></th>
                                    <th><input style="width: 40px; height: 40px; " type="checkbox"
                                            name="plan[{{ $key }}][jun]" value="1"
                                            {{ $work_plan->plan[$key]->jun == '1' ? 'checked' : '' }}></th>
                                    <th><input style="width: 40px; height: 40px; " type="checkbox"
                                            name="plan[{{ $key }}][augest]" value="1"
                                            {{ $work_plan->plan[$key]->augest == '1' ? 'checked' : '' }}></th>
                                    <th><input style="width: 40px; height: 40px; " type="checkbox"
                                            name="plan[{{ $key }}][sep]" value="1"
                                            {{ $work_plan->plan[$key]->sep == '1' ? 'checked' : '' }}></th>
                                    <th><input style="width: 40px; height: 40px; " type="checkbox"
                                            name="plan[{{ $key }}][oct]" value="1"
                                            {{ $work_plan->plan[$key]->oct == '1' ? 'checked' : '' }}></th>
                                    <th><input style="width: 40px; height: 40px; " type="checkbox"
                                            name="plan[{{ $key }}][nov]" value="1"
                                            {{ $work_plan->plan[$key]->nov == '1' ? 'checked' : '' }}></th>
                                    <th><input style="width: 40px; height: 40px; " type="checkbox"
                                            name="plan[{{ $key }}][des]" value="1"
                                            {{ $work_plan->plan[$key]->des == '1' ? 'checked' : '' }}></th>
                                    <th><input class="form-control" type="text"
                                            name="plan[{{ $key }}][notes]" value="{{ $work->notes }}"></th>
                                </tr>
                            @endforeach
                            @if ($work_plan->status == 'pending' && Auth::user()->hasRole('Employee'))
                                <tr class="datatable-row datatable-row-even">
                                    <td class="text-center end-td " id="increment">
                                        <button type="button" class="btn btn-primary add_new"
                                            id="btn-{{ count($work_plan->plan) - 1 }}"
                                            onclick="appendRow({{ count($work_plan->plan) - 1 }})"><i
                                                class="fa fa-plus-circle"></i></button>
                                    </td>
                                </tr>
                            @endif
                            @if (($work_plan->status == 'inProgress' && Auth::user()->hasRole('Admin')) ||
                                ($work_plan->status == 'pending' && Auth::user()->hasRole('Admin')))
                                <tr class="datatable-row datatable-row-even">
                                    <td class="text-center end-td " id="increment">
                                        <button type="button" class="btn btn-primary add_new"
                                            id="btn-{{ count($work_plan->plan) - 1 }}"
                                            onclick="appendRow({{ count($work_plan->plan) - 1 }})"><i
                                                class="fa fa-plus-circle"></i></button>
                                    </td>
                                </tr>
                            @endif
                            @if (($work_plan->status == 'inProgress' && Auth::user()->hasRole('SuperAdmin')) ||
                                ($work_plan->status == 'pending' && Auth::user()->hasRole('SuperAdmin')) ||
                                ($work_plan->status == 'confirmed' && Auth::user()->hasRole('SuperAdmin')))
                                <tr class="datatable-row datatable-row-even">
                                    <td class="text-center end-td " id="increment">
                                        <button type="button" class="btn btn-primary add_new"
                                            id="btn-{{ count($work_plan->plan) - 1 }}"
                                            onclick="appendRow({{ count($work_plan->plan) - 1 }})"><i
                                                class="fa fa-plus-circle"></i></button>
                                    </td>
                                </tr>
                            @endif
                        @else
                            <tr id="plan-0">
                                <th class="text-center end-td ">
                                    <button type="button" title="Remove" disabled="disabled"
                                        class="btn btn-danger btn-option">
                                        <i class="fa fa-minus-circle"></i>
                                    </button>
                                </th>
                                <th><input class="form-control" type="text" name="plan[0][referenced_authority]"></th>
                                <th><input class="form-control" type="text" name="plan[0][review_topics]"></th>
                                <th><input style="width: 40px; height: 40px; " type="checkbox" name="plan[0][jan]"
                                        value="1"></th>
                                <th><input style="width: 40px; height: 40px; " type="checkbox" name="plan[0][feb]"
                                        value="1"></th>
                                <th><input style="width: 40px; height: 40px; " type="checkbox" name="plan[0][mar]"
                                        value="1"></th>
                                <th><input style="width: 40px; height: 40px; " type="checkbox" name="plan[0][epr]"
                                        value="1"></th>
                                <th><input style="width: 40px; height: 40px; " type="checkbox" name="plan[0][may]"
                                        value="1"></th>
                                <th><input style="width: 40px; height: 40px; " type="checkbox" name="plan[0][jaun]"
                                        value="1"></th>
                                <th><input style="width: 40px; height: 40px; " type="checkbox" name="plan[0][jun]"
                                        value="1"></th>
                                <th><input style="width: 40px; height: 40px; " type="checkbox" name="plan[0][augest]"
                                        value="1"></th>
                                <th><input style="width: 40px; height: 40px; " type="checkbox" name="plan[0][sep]"
                                        value="1"></th>
                                <th><input style="width: 40px; height: 40px; " type="checkbox" name="plan[0][oct]"
                                        value="1"></th>
                                <th><input style="width: 40px; height: 40px; " type="checkbox" name="plan[0][nov]"
                                        value="1"></th>
                                <th><input style="width: 40px; height: 40px; " type="checkbox" name="plan[0][des]"
                                        value="1"></th>
                                <th><input class="form-control" type="text" name="plan[0][notes]"></th>
                            </tr>

                            <tr class="datatable-row datatable-row-even">
                                <td class="text-center end-td " id="increment">
                                    <button type="button" class="btn btn-primary add_new" id="btn-0"
                                        onclick="appendRow(0)"><i class="fa fa-plus-circle"></i></button>
                                </td>
                            </tr>
                        @endif
                    </table>
                   </div>
                    <br><br>
                    <div class=" p-2" style="">
                <div class="form-group row  d-flex justify-content-between w-100 text-left">
                 <div class="col-1 col-form-label">
                                <input type="checkbox" name="planned" value="1"
                                    {{ $work_plan->planned == '1' ? 'checked' : '' }}>
                            </div>
                            <h2 for="" style="text-align:right;" class="col-2 col-form-label">@lang('main.Planned date') (ISO 9001)</h2>
                            <div class="col-1 col-form-label">
                                <input type="radio" name="planing" value="there_are_mismatches" <?php if ($work_plan->planing == 'there_are_mismatches') {
                                    echo 'checked="checked"';
                                } ?>>
                            </div>
                            <h2 for="" style="text-align:right;" class="col-3 col-form-label">@lang('main.Implemented and there are no mismatches')</h2>
                            <div class="col-1 col-form-label">
                                <input type="radio" name="planing" value="there_are_no_mismatches" <?php if ($work_plan->planing == 'there_are_no_mismatches') {
                                    echo 'checked="checked"';
                                } ?>>
                            </div>
                            <h2 for="" style="text-align:right;" class="col-3 col-form-label">@lang('main.Implemented and there are no cases of non-compliance')</h2>
                        </div>
                   
                        <table class="table table-bordered shadow-lg">
                 <thead >
                            <tr>
                                @if (Auth::user()->hasRole('Employee'))
                                    <th class=" text-center col-2 ">
                                        <div class="" style="text-align:center ;">
                                            <label for="" class=""
                                                style="text-align:center;font-size:large;font-weight: bolder;">@lang('main.prepare')</label>
                                        </div>
                                        <div class="form-group row w-10 text-right">
                                            <label for="" class="col-3 col-form-label">@lang('main.name'): -</label>
                                            <div class="col-6">
                                                <input type="text" class="form-control" placeholder="  ......"
                                                    name="name_1" value="{{ $work_plan->name_1 }}">
                                            </div>
                                        </div>
                                        <div class="form-group row w-10 text-right">
                                            <label for="" class="col-3 col-form-label">@lang('main.job'): -</label>
                                            <div class="col-6">
                                                <input type="text" class="form-control" placeholder="  ......"
                                                    name="job_1" value="{{ $work_plan->job_1 }}">
                                            </div>
                                        </div>

                                    </th>
                                    @if ($work_plan->status == 'inProgress' && Auth::user()->hasRole('Employee'))
                                        <th class="  text-center col-2 ">
                                            <div class="" style="text-align:center ;">
                                                <label for="" class=""
                                                    style="text-align:center;font-size:large;font-weight: bolder;">@lang('main.review'):</label>
                                            </div>
                                            <div class="form-group row w-10 text-right">
                                                <label for="" class="col-3 col-form-label">@lang('main.name'): -</label>
                                                <div class="col-6">
                                                    <input type="text" class="form-control" placeholder="  ......"
                                                        name="name_2" value="{{ $work_plan->name_2 }}" readonly>
                                                </div>
                                            </div>
                                            <div class="form-group row w-10 text-right">
                                                <label for="" class="col-3 col-form-label">@lang('main.job'): -</label>
                                                <div class="col-6">
                                                    <input type="text" class="form-control" placeholder="  ......"
                                                        name="job_2" value="{{ $work_plan->job_2 }}" readonly>
                                                </div>
                                            </div>

                                        </th>
                                    @endif

                                    @if ($work_plan->status == 'confirmed' && Auth::user()->hasRole('Employee'))
                                        <th class="  text-center col-2 ">
                                            <div class="" style="text-align:center ;">
                                                <label for="" class=""
                                                    style="text-align:center;font-size:large;font-weight: bolder;">@lang('main.review'):</label>
                                            </div>
                                            <div class="form-group row w-10 text-right">
                                                <label for="" class="col-3 col-form-label">@lang('main.name'): -</label>
                                                <div class="col-6">
                                                    <input type="text" class="form-control" placeholder="  ......"
                                                        name="name_2" value="{{ $work_plan->name_2 }}" readonly>
                                                </div>
                                            </div>
                                            <div class="form-group row w-10 text-right">
                                                <label for="" class="col-3 col-form-label">@lang('main.job'): -</label>
                                                <div class="col-6">
                                                    <input type="text" class="form-control" placeholder="  ......"
                                                        name="job_2" value="{{ $work_plan->job_2 }}" readonly>
                                                </div>
                                            </div>

                                        </th>
                                        <th class="  text-center col-2 ">
                                            <div class="" style="text-align:center ;">
                                                <label for="" class=""
                                                    style="text-align:center;font-size:large;font-weight: bolder;">@lang('main.approval'):</label>
                                            </div>
                                            <div class="form-group row w-10 text-right">
                                                <label for="" class="col-3 col-form-label">@lang('main.name'): -</label>
                                                <div class="col-6">
                                                    <input type="text" class="form-control" placeholder="  ......"
                                                        name="name_3" value="{{ $work_plan->name_3 }}" readonly>
                                                </div>
                                            </div>
                                            <div class="form-group row w-10 text-right">
                                                <label for="" class="col-3 col-form-label">@lang('main.job'): -</label>
                                                <div class="col-6">
                                                    <input type="text" class="form-control" placeholder="  ......"
                                                        name="job_3" value="{{ $work_plan->job_3 }}" readonly>
                                                </div>
                                            </div>

                                        </th>
                                    @endif
                                @endif
                                @if (Auth::user()->hasRole('Admin'))
                                    <th class=" text-center col-2 ">
                                        <div class="" style="text-align:center ;">
                                            <label for="" class=""
                                                style="text-align:center;font-size:large;font-weight: bolder;">@lang('main.prepare')</label>
                                        </div>
                                        <div class="form-group row w-10 text-right">
                                            <label for="" class="col-3 col-form-label">@lang('main.name'): -</label>
                                            <div class="col-6">
                                                <input type="text" class="form-control" placeholder="  ......"
                                                    name="name_1" value="{{ $work_plan->name_1 }}">
                                            </div>
                                        </div>
                                        <div class="form-group row w-10 text-right">
                                            <label for="" class="col-3 col-form-label">@lang('main.job'): -</label>
                                            <div class="col-6">
                                                <input type="text" class="form-control" placeholder="  ......"
                                                    name="job_1" value="{{ $work_plan->job_1 }}">
                                            </div>
                                        </div>

                                    </th>
                                    <th class="  text-center col-2 ">
                                        <div class="" style="text-align:center ;">
                                            <label for="" class=""
                                                style="text-align:center;font-size:large;font-weight: bolder;">@lang('main.review'):</label>
                                        </div>
                                        <div class="form-group row w-10 text-right">
                                            <label for="" class="col-3 col-form-label">@lang('main.name'): -</label>
                                            <div class="col-6">
                                                <input type="text" class="form-control" placeholder="  ......"
                                                    name="name_2" value="{{ $work_plan->name_2 }}">
                                            </div>
                                        </div>
                                        <div class="form-group row w-10 text-right">
                                            <label for="" class="col-3 col-form-label">@lang('main.job'): -</label>
                                            <div class="col-6">
                                                <input type="text" class="form-control" placeholder="  ......"
                                                    name="job_2" value="{{ $work_plan->job_2 }}">
                                            </div>
                                        </div>
                                    </th>
                                    @if ($work_plan->status == 'confirmed' && Auth::user()->hasRole('Admin'))
                                        <th class="  text-center col-2 ">
                                            <div class="" style="text-align:center ;">
                                                <label for="" class=""
                                                    style="text-align:center;font-size:large;font-weight: bolder;">@lang('main.approval'):</label>
                                            </div>
                                            <div class="form-group row w-10 text-right">
                                                <label for="" class="col-3 col-form-label">@lang('main.name'): -</label>
                                                <div class="col-6">
                                                    <input type="text" class="form-control" placeholder="  ......"
                                                        name="name_3" value="{{ $work_plan->name_3 }}" readonly>
                                                </div>
                                            </div>
                                            <div class="form-group row w-10 text-right">
                                                <label for="" class="col-3 col-form-label">@lang('main.job'): -</label>
                                                <div class="col-6">
                                                    <input type="text" class="form-control" placeholder="  ......"
                                                        name="job_3" value="{{ $work_plan->job_3 }}" readonly>
                                                </div>
                                            </div>

                                        </th>
                                    @endif
                                @endif
                                @if (Auth::user()->hasRole('SuperAdmin'))
                                    <th class=" text-center col-2 ">
                                        <div class="" style="text-align:center ;">
                                            <label for="" class=""
                                                style="text-align:center;font-size:large;font-weight: bolder;">@lang('main.prepare')</label>
                                        </div>
                                        <div class="form-group row w-10 text-right">
                                            <label for="" class="col-4 col-form-label">@lang('main.name'): -</label>
                                            <div class="col-6">
                                                <input type="text" class="form-control" placeholder="  ......"
                                                    name="name_1" value="{{ $work_plan->name_1 }}">
                                            </div>
                                        </div>
                                        <div class="form-group row w-10 text-right">
                                            <label for="" class="col-4 col-form-label">@lang('main.job'): -</label>
                                            <div class="col-6">
                                                <input type="text" class="form-control" placeholder="  ......"
                                                    name="job_1" value="{{ $work_plan->job_1 }}">
                                            </div>
                                        </div>

                                    </th>
                                    <th class="  text-center col-2 ">
                                        <div class="" style="text-align:center ;">
                                            <label for="" class=""
                                                style="text-align:center;font-size:large;font-weight: bolder;">@lang('main.review'):</label>
                                        </div>
                                        <div class="form-group row w-10 text-right">
                                            <label for="" class="col-4 col-form-label">@lang('main.name'): -</label>
                                            <div class="col-6">
                                                <input type="text" class="form-control" placeholder="  ......"
                                                    name="name_2" value="{{ $work_plan->name_2 }}">
                                            </div>
                                        </div>
                                        <div class="form-group row w-10 text-right">
                                            <label for="" class="col-4 col-form-label">@lang('main.job'): -</label>
                                            <div class="col-6">
                                                <input type="text" class="form-control" placeholder="  ......"
                                                    name="job_2" value="{{ $work_plan->job_2 }}">
                                            </div>
                                        </div>

                                    </th>
                                    <th class="  text-center col-2 ">
                                        <div class="" style="text-align:center ;">
                                            <label for="" class=""
                                                style="text-align:center;font-size:large;font-weight: bolder;">@lang('main.approval'):</label>
                                        </div>
                                        <div class="form-group row w-10 text-right">
                                            <label for="" class="col-4 col-form-label">@lang('main.name'): -</label>
                                            <div class="col-6">
                                                <input type="text" class="form-control" placeholder="  ......"
                                                    name="name_3" value="{{ $work_plan->name_3 }}">
                                            </div>
                                        </div>
                                        <div class="form-group row w-10 text-right">
                                            <label for="" class="col-4 col-form-label">@lang('main.job'): -</label>
                                            <div class="col-6">
                                                <input type="text" class="form-control" placeholder="  ......"
                                                    name="job_3" value="{{ $work_plan->job_3 }}">
                                            </div>
                                        </div>

                                    </th>
                                @endif

                            </tr>
                        </thead>
                    </table>
                </div>
                <table class="table">
                    <thead>
                        <tr>
                            <th>
                                <div class="" style="text-align:start ;">
                                    <label>@lang('main.Company Name')</label>
                                    <input class="form-control" type="text" name="company_name"
                                         value="{{ $work_plan->company_name }}">
                                </div>

                            </th>
                            <th>
                                <div class="" style="text-align:start ;">
                                    <label>@lang('main.release_date') </label>
                                    <input class="form-control" type="text" name="date2"
                                       value="{{ $work_plan->date2 }}"
                                        onfocus="(this.type='date')" onblur="(this.type='text')">
                                </div>

                            </th>
                            <th>
                                <div class="" style="text-align:start ;">
                                    <label>@lang('main.Modification date')</label>
                                    <input class="form-control" type="text" name="date3"
                                       value="{{ $work_plan->date3 }}"
                                        onfocus="(this.type='date')" onblur="(this.type='text')">
                                </div>

                            </th>
                             <th>
                            <div class="" style="text-align:start ;">
                                <label>@lang('main.model_period')</label>
                                <input class="form-control shadow-lg" type="text" name="period_time" value="{{ $work_plan->period_time }}">
                            </div>

                        </th>
                        <th>
                            <div class="" style="text-align:start ;">
                                <label>@lang('main.page_number')</label>
                                <input class="form-control shadow-lg" type="text" name="number_page" value="{{ $work_plan->number_page }}">
                            </div>

                        </th>
                        <th>
                            <div class="" style="text-align:start ;">
                                <label>@lang('main.document_code')</label>
                                <input class="form-control shadow-lg" type="text" name="number_doc" value="{{ $work_plan->number_doc }}">
                            </div>
                        </th>
                        </tr>
                    </thead>
                </table>
                @if ($work_plan->status == 'pending' && Auth::user()->hasRole('Employee'))
                    <div class="form-group">
                        <button style="border-radius:20px;margin: 50px; width:10% ; height: 5%;" type="submit"
                            class="btn btn-primary"><i class="fas fa-save" style="width:15% ; height: 20%;">@lang('main.edit')
                            </i></button>
                    </div>
                @elseif(($work_plan->status == 'inProgress' && Auth::user()->hasRole('Admin')) ||
                    ($work_plan->status == 'pending' && Auth::user()->hasRole('Admin')))
                    <div class="form-group">
                        <button style="border-radius:20px;margin: 50px; width:10% ; height: 5%;" type="submit"
                            class="btn btn-primary"><i class="fas fa-save" style="width:15% ; height: 20%;">@lang('main.edit')
                            </i></button>
                    </div>
                @elseif(($work_plan->status == 'inProgress' && Auth::user()->hasRole('SuperAdmin')) ||
                    ($work_plan->status == 'pending' && Auth::user()->hasRole('SuperAdmin')) ||
                    ($work_plan->status == 'confirmed' && Auth::user()->hasRole('SuperAdmin')))
                    <div class="form-group" style='text-align:center'>
                <button style="border-radius:8px;margin: 50px; width:30% ;background-color: #2a415b; ;height: 5%;padding:10px" type="submit" class="btn btn-primary">
                    <i class="fas fa-save" style="width:15% ; height: 20%;"></i>@lang('main.edit')</button>
            </div>
                @endif
            </div>

        </form>
        </div>
         </div>

        <style>
            .table thead th {
                vertical-align: bottom;
                /* border-bottom: 2px solid #5a0ee8; */
            }

            table,
            td,
            th {
                border: 2px solid silver;

                text-align: center;
            }
        </style>


        <script>
            function appendRow(num) {
                $new_number = parseInt(num) + 1;
                $appended_text = ` <tr class="datatable-row datatable-row-even" id="plan-${$new_number}">
                                         
                                          <td class="text-center end-td ">
                                                    <button type="button" title="Remove" onclick="removeRow(${$new_number})"
                                                              class="btn btn-danger btn-option">
                                                              <i class="fa fa-minus-circle"></i>
                                                    </button>
                                          </td>
                                          <th><input class="form-control"  type="text" name="plan[${$new_number}][referenced_authority]"></th>
                <th><input class="form-control" type="text" name="plan[${$new_number}][review_topics]"></th>
                <th><input style="width: 40px; height: 40px; " type="checkbox" name="plan[${$new_number}][jan]" value="1"></th>
                <th><input style="width: 40px; height: 40px; " type="checkbox" name="plan[${$new_number}][feb]" value="1"></th>
                <th><input style="width: 40px; height: 40px; " type="checkbox" name="plan[${$new_number}][mar]" value="1"></th>
                <th><input style="width: 40px; height: 40px; " type="checkbox" name="plan[${$new_number}][epr]" value="1"></th>
                <th><input style="width: 40px; height: 40px; " type="checkbox" name="plan[${$new_number}][may]" value="1"></th>
                <th><input style="width: 40px; height: 40px; " type="checkbox" name="plan[${$new_number}][jaun]" value="1"></th>
                <th><input style="width: 40px; height: 40px; " type="checkbox" name="plan[${$new_number}][jun]" value="1"></th>
                <th><input style="width: 40px; height: 40px; " type="checkbox" name="plan[${$new_number}][augest]" value="1"></th>
                <th><input style="width: 40px; height: 40px; " type="checkbox" name="plan[${$new_number}][sep]" value="1"></th>
                <th><input style="width: 40px; height: 40px; " type="checkbox" name="plan[${$new_number}][oct]" value="1"></th>
                <th><input style="width: 40px; height: 40px; " type="checkbox" name="plan[${$new_number}][nov]" value="1"></th>
                <th><input style="width: 40px; height: 40px; " type="checkbox" name="plan[${$new_number}][des]" value="1"></th>
                <th><input class="form-control"  type="text" name="plan[${$new_number}][notes]"></th>
                                         
                                </tr>`;
                $($appended_text).insertAfter(`#plan-${num}`);
                if (!document.getElementById(`plan-${num}`)) {
                    $($appended_text).insertAfter(`#plan-0`);
                }

                $(`#btn-${num}`).remove();
                $("#increment").append(
                    `<button type="button" class="btn btn-primary add_new" id="btn-${$new_number}" onclick="appendRow(${$new_number})"><i class="fa fa-plus-circle"></i></button></td>`
                );


            }

            function removeRow(num, id) {
                if (id != 0) {
                    $("#plan-0").append(`<input type="hidden" name="ids[${num}]" value="${id}">`);
                }
                $(`#plan-${num}`).remove();
            }
        </script>
    @stop
