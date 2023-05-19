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
    <div class="card-body row" style=';margin-top:80px'>


        <form action="{{ route('complaintStudies.update', $complaintStudy->id) }}" class='col-md-10' style='margin:auto' method="post" enctype="multipart/form-data"
            id="fo1">
            @method('PUT')
            {{ csrf_field() }}
            <div style="" class="w-100 text-center my-4">
                <h2 style='text-shadow: 1px 1px 1px #3ed3ea;'>@lang('main.Customer complaint report')</h2>
                <hr class="w-100">
            </div>
            <div class='row mt-4 mb-3'>
                <label class="form-label col-md-3 ">@lang('main.Company Logo')</label>
              @if ($complaintStudy->status == 'pending' && Auth::user()->hasRole('Employee'))
                <input type="file" id="img" name="logo" accept="image/*">
            @endif

            @if (($complaintStudy->status == 'inProgress' && Auth::user()->hasRole('Admin')) ||
                ($complaintStudy->status == 'pending' && Auth::user()->hasRole('Admin')))
                <input type="file" id="img" name="logo" accept="image/*">
            @endif
            @if (($complaintStudy->status == 'inProgress' && Auth::user()->hasRole('SuperAdmin')) ||
                ($complaintStudy->status == 'pending' && Auth::user()->hasRole('SuperAdmin')) ||
                ($complaintStudy->status == 'confirmed' && Auth::user()->hasRole('SuperAdmin')))
                <input type="file" id="img" name="logo" accept="image/*">
            @endif
            <img src="{{ asset($complaintStudy->logo) }}" height=180px width=210px; />
            
            </div>
            <div class="form-group row ">
                <label for="" class="col-3 col-form-label">@lang('main.customer_number') :</label>
                <div class="col-6">
                    <input type="text" class="form-control" name="customer_number"
                        value="{{ $complaintStudy->customer_number }}">
                </div>
            </div>
            <hr class="w-100">
            <div style="overflow-x:auto;">
            <table class="table">
                <thead>
                    <tr>
                        <th class=" w-20 text-center col-1 ">
                            <div class="form-group row w-10 text-center">
                                <label for="" class="col-2 col-form-label">@lang('main.customer_name'):-</label>
                                <div class="col-3">
                                    <input type="text" class="form-control" placeholder="  ......" name="customer"
                                        value="{{ $complaintStudy->customer }}">
                                </div>

                                <label for="" class="col-2 col-form-label text-center">@lang('main.date'): -</label>
                                <div class="col-3">
                                    <input type="date" class="form-control" placeholder="  ......" name="date_1"
                                        value="{{ $complaintStudy->date_1 }}">
                                </div>
                            </div>
                        </th>

                    </tr>
                </thead>
            </table>
            </div>
            <table class="table">
                <thead>
                    <tr>
                        <th class=" w-20 text-center col-1 ">
                            <div class="form-group row w-10 text-left">
                                <label for="" class="col-2 col-form-label">@lang('main.service') : - </label>
                                <div class="col-8">
                                    <input type="text" class="form-control" placeholder="  ......" name="service"
                                        value="{{ $complaintStudy->service }}">
                                </div>
                            </div>
                        </th>
                    </tr>
                </thead>
            </table>
            <table class="table" style='border:none'>
                <thead>
                    <tr>
                        <th class=" w-20 text-center col-1 ">
                            <div class="form-group row w-10 text-left">
                                <label for="" class="col-3 col-form-label">2-@lang('main.subject_complaint') </label>
                                </label>
                                <div class="col-9">
                                    <textarea type="text" class="form-control" placeholder="  ......" name="subject_complain">{{ $complaintStudy->subject_complain }}</textarea>
                                </div>
                            </div>
                            <div class="form-group row w-10 text-left">
                                <label for="" class="col-3 col-form-label">@lang('main.attachment') </label>
                                <div class="col-4">
                                    <input type="text" class="form-control" placeholder="  ......" name="attachment"
                                        value="{{ $complaintStudy->attachment }}">
                                </div>
                            </div>
                        </th>
                    </tr>
                </thead>
            </table>

            <hr class="w-100">
            <div class="container-fluid p-4" >
                <h4>3-@lang('main.Immediate Procedure for Filing a Complaint (Immediate Procedure)') </h4>
                <div class="form-group row w-100 text-right" style="text-align:center;overflow-x:auto;">
                    <table class='table'>
                        <tr class='padding:4px' style="background-color:   #001635; color:white;">
                            @if ($complaintStudy->status == 'pending' && Auth::user()->hasRole('Employee'))
                            <th>@lang('main.m')</th>
                        @endif
                        @if (($complaintStudy->status == 'inProgress' && Auth::user()->hasRole('Admin')) ||
                            ($complaintStudy->status == 'pending' && Auth::user()->hasRole('Admin')))
                            <th>@lang('main.m')</th>
                        @endif
                        @if (($complaintStudy->status == 'inProgress' && Auth::user()->hasRole('SuperAdmin')) ||
                            ($complaintStudy->status == 'pending' && Auth::user()->hasRole('SuperAdmin')) ||
                            ($complaintStudy->status == 'confirmed' && Auth::user()->hasRole('SuperAdmin')))
                            <th>@lang('main.m')</th>
                        @endif
                        <th>@lang('main.Action1')</th>
                        <th>@lang('main.Responsible for implementation')</th>
                        <th>@lang('main.date')</th>
                        </tr>
                        @if (count($complaintStudy->prompt) > 0)
                            @foreach ($complaintStudy->prompt as $key => $data)
                                <tr id="prompt-{{ $key }}">
                                    @if ($complaintStudy->status == 'pending' && Auth::user()->hasRole('Employee'))
                                    <td class="text-center end-td ">
                                        <button type="button" title="Remove"
                                            onclick="removeRow({{ $key }},{{ $data->id }})"
                                            @if ($key == 0) disabled="disabled" @endif
                                            class="btn btn-danger btn-option">
                                            <i class="fa fa-minus-circle"></i>
                                        </button>
                                    </td>
                                    @endif
                                    @if (($complaintStudy->status == 'inProgress' && Auth::user()->hasRole('Admin')) ||
                                    ($complaintStudy->status == 'pending' && Auth::user()->hasRole('Admin')))                                    <td class="text-center end-td ">
                                        <button type="button" title="Remove"
                                            onclick="removeRow({{ $key }},{{ $data->id }})"
                                            @if ($key == 0) disabled="disabled" @endif
                                            class="btn btn-danger btn-option">
                                            <i class="fa fa-minus-circle"></i>
                                        </button>
                                    </td>
                                    @endif
                                    @if (($complaintStudy->status == 'inProgress' && Auth::user()->hasRole('SuperAdmin')) ||
                                    ($complaintStudy->status == 'pending' && Auth::user()->hasRole('SuperAdmin')) ||
                                    ($complaintStudy->status == 'confirmed' && Auth::user()->hasRole('SuperAdmin')))                                    <td class="text-center end-td ">
                                        <button type="button" title="Remove"
                                            onclick="removeRow({{ $key }},{{ $data->id }})"
                                            @if ($key == 0) disabled="disabled" @endif
                                            class="btn btn-danger btn-option">
                                            <i class="fa fa-minus-circle"></i>
                                        </button>
                                    </td>
                                    @endif
                                    <th><input class="form-control" type="text"
                                            name="prompt[{{ $key }}][action]" value="{{ $data->action }}"></th>
                                    <th><input class="form-control" type="text"
                                            name="prompt[{{ $key }}][implementation]"
                                            value="{{ $data->implementation }}"></th>
                                    <th><input class="form-control" type="date"
                                            name="prompt[{{ $key }}][date_2]" value="{{ $data->date_2 }}"></th>
                                </tr>
                            @endforeach
                            @if ($complaintStudy->status == 'pending' && Auth::user()->hasRole('Employee'))
                            <tr class="datatable-row datatable-row-even">
                                <td class="text-center end-td " id="increment">
                                    <button type="button" class="btn btn-primary add_new"
                                        id="btn-{{ count($complaintStudy->prompt) - 1 }}"
                                        onclick="appendRow({{ count($complaintStudy->prompt) - 1 }})"><i
                                            class="fa fa-plus-circle"></i></button>
                                </td>
                            </tr>
                            @endif
                            @if (($complaintStudy->status == 'inProgress' && Auth::user()->hasRole('Admin')) ||
                            ($complaintStudy->status == 'pending' && Auth::user()->hasRole('Admin')))                            <tr class="datatable-row datatable-row-even">
                                <td class="text-center end-td " id="increment">
                                    <button type="button" class="btn btn-primary add_new"
                                        id="btn-{{ count($complaintStudy->prompt) - 1 }}"
                                        onclick="appendRow({{ count($complaintStudy->prompt) - 1 }})"><i
                                            class="fa fa-plus-circle"></i></button>
                                </td>
                            </tr>
                            @endif
                            @if (($complaintStudy->status == 'inProgress' && Auth::user()->hasRole('SuperAdmin')) ||
                            ($complaintStudy->status == 'pending' && Auth::user()->hasRole('SuperAdmin')) ||
                            ($complaintStudy->status == 'confirmed' && Auth::user()->hasRole('SuperAdmin')))                            <tr class="datatable-row datatable-row-even">
                                <td class="text-center end-td " id="increment">
                                    <button type="button" class="btn btn-primary add_new"
                                        id="btn-{{ count($complaintStudy->prompt) - 1 }}"
                                        onclick="appendRow({{ count($complaintStudy->prompt) - 1 }})"><i
                                            class="fa fa-plus-circle"></i></button>
                                </td>
                            </tr>
                            @endif
                        @else
                            <tr id="prompt-0">
                                <th class="text-center end-td ">
                                    <button type="button" title="Remove" disabled="disabled"
                                        class="btn btn-danger btn-option">
                                        <i class="fa fa-minus-circle"></i>
                                    </button>
                                </th>
                                <th><input class="form-control" type="text" name="prompt[0][action]"></th>
                                <th><input class="form-control" type="text" name="prompt[0][implementation]"></th>
                                <th><input class="form-control" type="date" name="prompt[0][date_2]"></th>
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

            </div>
            <hr class="w-100">
            <div class="container-fluid p-4" >
                <h4>4-@lang('main.Possible causes of the complaint (Root causes)')</h4>
                <div class="form-group row w-100 text-right" style="text-align:center;">
                    <table class='table'>
                        <tr style="background-color:  #001635; color:white;text-align:center">
                            @if ($complaintStudy->status == 'pending' && Auth::user()->hasRole('Employee'))
                            <th>@lang('main.m')</th>
                        @endif
                        @if (($complaintStudy->status == 'inProgress' && Auth::user()->hasRole('Admin')) ||
                            ($complaintStudy->status == 'pending' && Auth::user()->hasRole('Admin')))
                            <th>@lang('main.m')</th>
                        @endif
                        @if (($complaintStudy->status == 'inProgress' && Auth::user()->hasRole('SuperAdmin')) ||
                            ($complaintStudy->status == 'pending' && Auth::user()->hasRole('SuperAdmin')) ||
                            ($complaintStudy->status == 'confirmed' && Auth::user()->hasRole('SuperAdmin')))
                            <th>@lang('main.m')</th>
                        @endif
                        <th>@lang('main.the reason')</th>
                    </tr>
                        @if (count($complaintStudy->causes) > 0)
                            @foreach ($complaintStudy->causes as $key => $data)
                                <tr id="causes-{{ $key }}">
                                    @if ($complaintStudy->status == 'pending' && Auth::user()->hasRole('Employee'))

                                    <td class="text-center end-td ">
                                        <button type="button" title="Remove"
                                            onclick="removeRow2({{ $key }},{{ $data->id }})"
                                            @if ($key == 0) disabled="disabled" @endif
                                            class="btn btn-danger btn-option">
                                            <i class="fa fa-minus-circle"></i>
                                        </button>
                                    </td>
                                    @endif
                                    @if (($complaintStudy->status == 'inProgress' && Auth::user()->hasRole('Admin')) ||
                                    ($complaintStudy->status == 'pending' && Auth::user()->hasRole('Admin')))
                                    <td class="text-center end-td ">
                                        <button type="button" title="Remove"
                                            onclick="removeRow2({{ $key }},{{ $data->id }})"
                                            @if ($key == 0) disabled="disabled" @endif
                                            class="btn btn-danger btn-option">
                                            <i class="fa fa-minus-circle"></i>
                                        </button>
                                    </td>
                                    @endif
                                    @if (($complaintStudy->status == 'inProgress' && Auth::user()->hasRole('SuperAdmin')) ||
                                    ($complaintStudy->status == 'pending' && Auth::user()->hasRole('SuperAdmin')) ||
                                    ($complaintStudy->status == 'confirmed' && Auth::user()->hasRole('SuperAdmin')))
                                    <td class="text-center end-td ">
                                        <button type="button" title="Remove"
                                            onclick="removeRow2({{ $key }},{{ $data->id }})"
                                            @if ($key == 0) disabled="disabled" @endif
                                            class="btn btn-danger btn-option">
                                            <i class="fa fa-minus-circle"></i>
                                        </button>
                                    </td>
                                    @endif
                                    <th><input class="form-control" type="text"
                                            name="causes[{{ $key }}][reason]" value="{{ $data->reason }}"></th>
                                </tr>
                            @endforeach
                            @if ($complaintStudy->status == 'pending' && Auth::user()->hasRole('Employee'))

                            <tr class="datatable-row datatable-row-even">
                                <td class="text-center end-td " id="increment2">
                                    <button type="button" class="btn btn-primary add_new"
                                        id="btn2-{{ count($complaintStudy->causes) - 1 }}"
                                        onclick="appendRow2({{ count($complaintStudy->causes) - 1 }})"><i
                                            class="fa fa-plus-circle"></i></button>
                                </td>
                            </tr>
                            @endif
                            @if (($complaintStudy->status == 'inProgress' && Auth::user()->hasRole('Admin')) ||
                            ($complaintStudy->status == 'pending' && Auth::user()->hasRole('Admin')))
                            <tr class="datatable-row datatable-row-even">
                                <td class="text-center end-td " id="increment2">
                                    <button type="button" class="btn btn-primary add_new"
                                        id="btn2-{{ count($complaintStudy->causes) - 1 }}"
                                        onclick="appendRow2({{ count($complaintStudy->causes) - 1 }})"><i
                                            class="fa fa-plus-circle"></i></button>
                                </td>
                            </tr>
                            @endif
                            @if (($complaintStudy->status == 'inProgress' && Auth::user()->hasRole('SuperAdmin')) ||
                            ($complaintStudy->status == 'pending' && Auth::user()->hasRole('SuperAdmin')) ||
                            ($complaintStudy->status == 'confirmed' && Auth::user()->hasRole('SuperAdmin')))
                            <tr class="datatable-row datatable-row-even">
                                <td class="text-center end-td " id="increment2">
                                    <button type="button" class="btn btn-primary add_new"
                                        id="btn2-{{ count($complaintStudy->causes) - 1 }}"
                                        onclick="appendRow2({{ count($complaintStudy->causes) - 1 }})"><i
                                            class="fa fa-plus-circle"></i></button>
                                </td>
                            </tr>
                            @endif
                        @else
                            <tr id="causes-0">
                                <th class="text-center end-td ">
                                    <button type="button" title="Remove" disabled="disabled"
                                        class="btn btn-danger btn-option">
                                        <i class="fa fa-minus-circle"></i>
                                    </button>
                                </th>
                                <th><input class="form-control" type="text" name="causes[0][reason]"></th>
                            </tr>
                            <tr class="datatable-row datatable-row-even">
                                <td class="text-center end-td " id="increment2">
                                    <button type="button" class="btn btn-primary add_new" id="btn2-0"
                                        onclick="appendRow2(0)"><i class="fa fa-plus-circle"></i></button>
                                </td>
                            </tr>
                        @endif
                    </table>

                </div>

            </div>
            <hr class="w-100">
            <div class="container-fluid p-4" >
                <h4>5-@lang('main.Corrective actions to avoid repeating the complaint (Corrective Actions)')</h4>
                <div class="form-group row w-100 text-right" style="text-align:center;overflow-x:auto;">
                    <table class='table'>
                        <tr style="background-color:  #001635; color:white">
                            @if ($complaintStudy->status == 'pending' && Auth::user()->hasRole('Employee'))
                            <th>@lang('main.m')</th>
                        @endif
                        @if (($complaintStudy->status == 'inProgress' && Auth::user()->hasRole('Admin')) ||
                            ($complaintStudy->status == 'pending' && Auth::user()->hasRole('Admin')))
                            <th>@lang('main.m')</th>
                        @endif
                        @if (($complaintStudy->status == 'inProgress' && Auth::user()->hasRole('SuperAdmin')) ||
                            ($complaintStudy->status == 'pending' && Auth::user()->hasRole('SuperAdmin')) ||
                            ($complaintStudy->status == 'confirmed' && Auth::user()->hasRole('SuperAdmin')))
                            <th>@lang('main.m')</th>
                        @endif
                        <th>@lang('main.Action1')</th>
                        <th>@lang('main.Responsible for implementation')</th>
                            <th>@lang('main.date')</th>
                        </tr>
                        @if (count($complaintStudy->complaint) > 0)
                            @foreach ($complaintStudy->complaint as $key => $data)
                                <tr id="complaint-{{ $key }}">
                                    @if ($complaintStudy->status == 'pending' && Auth::user()->hasRole('Employee'))

                                    <td class="text-center end-td ">
                                        <button type="button" title="Remove"
                                            onclick="removeRow1({{ $key }},{{ $data->id }})"
                                            @if ($key == 0) disabled="disabled" @endif
                                            class="btn btn-danger btn-option">
                                            <i class="fa fa-minus-circle"></i>
                                        </button>
                                    </td>
                                    @endif
                                    @if (($complaintStudy->status == 'inProgress' && Auth::user()->hasRole('Admin')) ||
                                    ($complaintStudy->status == 'pending' && Auth::user()->hasRole('Admin')))
                                    <td class="text-center end-td ">
                                        <button type="button" title="Remove"
                                            onclick="removeRow1({{ $key }},{{ $data->id }})"
                                            @if ($key == 0) disabled="disabled" @endif
                                            class="btn btn-danger btn-option">
                                            <i class="fa fa-minus-circle"></i>
                                        </button>
                                    </td>
                                    @endif
                                    @if (($complaintStudy->status == 'inProgress' && Auth::user()->hasRole('SuperAdmin')) ||
                                    ($complaintStudy->status == 'pending' && Auth::user()->hasRole('SuperAdmin')) ||
                                    ($complaintStudy->status == 'confirmed' && Auth::user()->hasRole('SuperAdmin')))
                                    <td class="text-center end-td ">
                                        <button type="button" title="Remove"
                                            onclick="removeRow1({{ $key }},{{ $data->id }})"
                                            @if ($key == 0) disabled="disabled" @endif
                                            class="btn btn-danger btn-option">
                                            <i class="fa fa-minus-circle"></i>
                                        </button>
                                    </td>
                                    @endif
                                    <th><input class="form-control" type="text"
                                            name="complaint[{{ $key }}][action]" value="{{ $data->action }}">
                                    </th>
                                    <th><input class="form-control" type="text"
                                            name="complaint[{{ $key }}][implementation]"
                                            value="{{ $data->implementation }}"></th>
                                    <th><input class="form-control" type="date"
                                            name="complaint[{{ $key }}][date_2]" value="{{ $data->date_2 }}">
                                    </th>
                                </tr>
                            @endforeach
                            @if ($complaintStudy->status == 'pending' && Auth::user()->hasRole('Employee'))

                            <tr class="datatable-row datatable-row-even">
                                <td class="text-center end-td " id="increment1">
                                    <button type="button" class="btn btn-primary add_new"
                                        id="btn1-{{ count($complaintStudy->complaint) - 1 }}"
                                        onclick="appendRow1({{ count($complaintStudy->complaint) - 1 }})"><i
                                            class="fa fa-plus-circle"></i></button>
                                </td>
                            </tr>
                            @endif
                            @if (($complaintStudy->status == 'inProgress' && Auth::user()->hasRole('Admin')) ||
                            ($complaintStudy->status == 'pending' && Auth::user()->hasRole('Admin')))
                            <tr class="datatable-row datatable-row-even">
                                <td class="text-center end-td " id="increment1">
                                    <button type="button" class="btn btn-primary add_new"
                                        id="btn1-{{ count($complaintStudy->complaint) - 1 }}"
                                        onclick="appendRow1({{ count($complaintStudy->complaint) - 1 }})"><i
                                            class="fa fa-plus-circle"></i></button>
                                </td>
                            </tr>
                            @endif
                            @if (($complaintStudy->status == 'inProgress' && Auth::user()->hasRole('SuperAdmin')) ||
                            ($complaintStudy->status == 'pending' && Auth::user()->hasRole('SuperAdmin')) ||
                            ($complaintStudy->status == 'confirmed' && Auth::user()->hasRole('SuperAdmin')))
                            <tr class="datatable-row datatable-row-even">
                                <td class="text-center end-td " id="increment1">
                                    <button type="button" class="btn btn-primary add_new"
                                        id="btn1-{{ count($complaintStudy->complaint) - 1 }}"
                                        onclick="appendRow1({{ count($complaintStudy->complaint) - 1 }})"><i
                                            class="fa fa-plus-circle"></i></button>
                                </td>
                            </tr>
                            @endif
                        @else
                            <tr id="complaint-0">
                                <th class="text-center end-td ">
                                    <button type="button" title="Remove" disabled="disabled"
                                        class="btn btn-danger btn-option">
                                        <i class="fa fa-minus-circle"></i>
                                    </button>
                                </th>
                                <th><input class="form-control" type="text" name="complaint[0][action]"></th>
                                <th><input class="form-control" type="text" name="complaint[0][implementation]"></th>
                                <th><input class="form-control" type="date" name="complaint[0][date_2]"></th>
                            </tr>
                            <tr class="datatable-row datatable-row-even">
                                <td class="text-center end-td " id="increment1">
                                    <button type="button" class="btn btn-primary add_new" id="btn1-0"
                                        onclick="appendRow1(0)"><i class="fa fa-plus-circle"></i></button>
                                </td>
                            </tr>
                        @endif
                    </table>

                </div>

            </div>
            <div style="overflow-x:auto;">
            <table class="table">
                @if ($complaintStudy->status == 'inProgress' && Auth::user()->hasRole('Employee'))
                <hr class="w-100">

                <tr style="text-align:center;">

                    <th class=" w-50 text-center col-3 " >

                        <div class="form-group row w-20 text-right">
                            <label for="" class="col-4 col-form-label">@lang('main.quality manager')</label>
                            <div class="col-6">
                                <input type="text" readonly class="form-control" name="name_1"
                                    value="{{ $complaintStudy->name_1 }}">
                            </div>
                        </div>
                    </th>
                    <th class=" w-50 text-center col-3 "  >

                        <div class="form-group row w-20 text-right">
                            <label for="" class="col-3 col-form-label">@lang('main.date') </label>
                            <div class="col-6">
                                <input type="date" readonly class="form-control" name="date_3"
                                    value="{{ $complaintStudy->date_3 }}">
                            </div>
                        </div>

                    </th>
                </tr>
                @endif
                @if ($complaintStudy->status == 'confirmed' && Auth::user()->hasRole('Employee'))
                <hr class="w-100">

                <tr style="text-align:center;">

                    <th class=" w-50 text-center col-3 ">

                        <div class="form-group row w-20 text-right">
                            <label for="" class="col-3 col-form-label">@lang('main.quality manager')</label>
                            <div class="col-6">
                                <input type="text" readonly class="form-control" name="name_1"
                                    value="{{ $complaintStudy->name_1 }}">
                            </div>
                        </div>
                    </th>
                    <th class=" w-50 text-center col-3 "  >

                        <div class="form-group row w-20 text-right">
                            <label for="" class="col-3 col-form-label">@lang('main.date') </label>
                            <div class="col-6">
                                <input type="date" readonly class="form-control" name="date_3"
                                    value="{{ $complaintStudy->date_3 }}">
                            </div>
                        </div>

                    </th>
                </tr>
                <tr style="text-align:center;">

                    <th class=" w-50 text-center col-3 ">

                        <div class="form-group row w-20 text-right">
                            <label for="" class="col-4 col-form-label">@lang('main.management representative')</label>
                            <div class="col-6">
                                <input type="text" readonly class="form-control" name="name_2"
                                    value="{{ $complaintStudy->name_2 }}">
                            </div>
                        </div>
                    </th>
                    <th class=" w-50 text-center col-3 ">

                        <div class="form-group row w-20 text-right">
                            <label for="" class="col-3 col-form-label">@lang('main.date') </label>
                            <div class="col-6">
                                <input type="date" readonly class="form-control" name="date_4"
                                    value="{{ $complaintStudy->date_4 }}">
                            </div>
                        </div>

                    </th>
                </tr>
                @endif
                @if (Auth::user()->hasRole('Admin'))
                <hr class="w-100">

                    <tr style="text-align:center;">

                        <th class=" w-50 text-center col-3 " >

                            <div class="form-group row w-20 text-right">
                                <label for="" class="col-4 col-form-label">@lang('main.quality manager')</label>
                                <div class="col-6">
                                    <input type="text" class="form-control" name="name_1"
                                        value="{{ $complaintStudy->name_1 }}">
                                </div>
                            </div>
                        </th>
                        <th class=" w-50 text-center col-3 " >

                            <div class="form-group row w-20 text-right">
                                <label for="" class="col-3 col-form-label">@lang('main.date') </label>
                                <div class="col-6">
                                    <input type="date" class="form-control" name="date_3"
                                        value="{{ $complaintStudy->date_3 }}">
                                </div>
                            </div>

                        </th>
                    </tr>
                    @if ($complaintStudy->status == 'confirmed' && Auth::user()->hasRole('Admin'))
                    <tr style="text-align:center;">

                        <th class=" w-50 text-center col-3 ">
    
                            <div class="form-group row w-20 text-right">
                                <label for="" class="col-4 col-form-label">@lang('main.management representative')</label>
                                <div class="col-6">
                                    <input type="text" readonly class="form-control" name="name_2"
                                        value="{{ $complaintStudy->name_2 }}">
                                </div>
                            </div>
                        </th>
                        <th class=" w-50 text-center col-3 ">
    
                            <div class="form-group row w-20 text-right">
                                <label for="" class="col-3 col-form-label">@lang('main.date') </label>
                                <div class="col-6">
                                    <input type="date" readonly class="form-control" name="date_4"
                                        value="{{ $complaintStudy->date_4 }}">
                                </div>
                            </div>
    
                        </th>
                    </tr>
                    @endif
                @endif
                @if (Auth::user()->hasRole('SuperAdmin'))
                    <tr style="text-align:center;">

                        <th class=" w-50 text-center col-3 " >

                            <div class="form-group row w-20 text-right">
                                <label for="" class="col-4 col-form-label">@lang('main.quality manager')</label>
                                <div class="col-6">
                                    <input type="text" class="form-control" name="name_1"
                                        value="{{ $complaintStudy->name_1 }}">
                                </div>
                            </div>
                        </th>
                        <th class=" w-50 text-center col-3 " >

                            <div class="form-group row w-20 text-right">
                                <label for="" class="col-3 col-form-label">@lang('main.date') </label>
                                <div class="col-6">
                                    <input type="date" class="form-control" name="date_3"
                                        value="{{ $complaintStudy->date_3 }}">
                                </div>
                            </div>

                        </th>
                    </tr>
                    <tr style="text-align:center;">

                        <th class=" w-50 text-center col-3 ">

                            <div class="form-group row w-20 text-right">
                                <label for="" class="col-4 col-form-label">@lang('main.management representative')</label>
                                <div class="col-6">
                                    <input type="text" class="form-control" name="name_2"
                                        value="{{ $complaintStudy->name_2 }}">
                                </div>
                            </div>
                        </th>
                        <th class=" w-50 text-center col-3 ">

                            <div class="form-group row w-20 text-right">
                                <label for="" class="col-3 col-form-label">@lang('main.date') </label>
                                <div class="col-6">
                                    <input type="date" class="form-control" name="date_4"
                                        value="{{ $complaintStudy->date_4 }}">
                                </div>
                            </div>

                        </th>
                    </tr>
                @endif
            </table>
              </div>
            <hr class="w-100">
            <div style="overflow-x:auto;">
            <table class="table">
                <thead>
                    <tr>
                        <th>
                            <div class="" style="text-align:start ;">
                                <label>@lang('main.Company Name')</label>
                                <input class="form-control" type="text" name="company_name"
                                    value="{{ $complaintStudy->company_name }}">
                            </div>

                        </th>
                        <th>
                            <div class="" style="text-align:start ;">
                                <label>@lang('main.release_date') </label>
                                <input class="form-control" type="text" name="date2"
                                    value="{{ $complaintStudy->date2 }}" 
                                    onfocus="(this.type='date')" onblur="(this.type='text')">
                            </div>

                        </th>
                        <th>
                            <div class="" style="text-align:start ;">
                                <label>@lang('main.Modification date')</label>
                                <input class="form-control" type="text" name="date3"
                                    value="{{ $complaintStudy->date3 }}" 
                                    onfocus="(this.type='date')" onblur="(this.type='text')">
                            </div>

                        </th>
                         <th>
                            <div class="" style="text-align:start ;">
                                <label>@lang('main.model_period')</label>
                                <input class="form-control shadow-lg" type="text" name="period_time" value="{{ $complaintStudy->period_time }}">
                            </div>

                        </th>
                        <th>
                            <div class="" style="text-align:start ;">
                                <label>@lang('main.page_number')</label>
                                <input class="form-control shadow-lg" type="text" name="number_page" value="{{ $complaintStudy->number_page }}">
                            </div>

                        </th>
                        <th>
                            <div class="" style="text-align:start ;">
                                <label>@lang('main.document_code')</label>
                                <input class="form-control shadow-lg" type="text" name="number_doc" value="{{ $complaintStudy->number_doc }}">
                            </div>
                        </th>
                    </tr>
                </thead>
            </table>
             </div>
            @if ($complaintStudy->status == 'pending' && Auth::user()->hasRole('Employee'))
            <div class="form-group">
                <button style="border-radius:20px;margin: 50px; width:10% ; height: 5%;" type="submit"
                    class="btn btn-primary"><i class="fas fa-save" style="width:15% ; height: 20%;">@lang('main.edit')
                    </i></button>
            </div>
        @elseif(($complaintStudy->status == 'inProgress' && Auth::user()->hasRole('Admin')) ||
            ($complaintStudy->status == 'pending' && Auth::user()->hasRole('Admin')))
            <div class="form-group">
                <button style="border-radius:20px;margin: 50px; width:10% ; height: 5%;" type="submit"
                    class="btn btn-primary"><i class="fas fa-save" style="width:15% ; height: 20%;">@lang('main.edit')
                    </i></button>
            </div>
        @elseif(($complaintStudy->status == 'inProgress' && Auth::user()->hasRole('SuperAdmin')) ||
            ($complaintStudy->status == 'pending' && Auth::user()->hasRole('SuperAdmin')) ||
            ($complaintStudy->status == 'confirmed' && Auth::user()->hasRole('SuperAdmin')))
            <div class='row'>
            <button style="border-radius:8px;margin: 50px; width:30% ;background-color: #2a415b; ;height: 5%;padding:10px;margin-right:100px;margin:auto" type="submit"
                class="btn btn-primary col-md-4">
                @lang('main.edit')</button>
                    </div>   
        @endif
        </form>
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

        function removeRow(num, id) {
            if (id != 0) {
                $("#prompt-0").append(`<input type="hidden" name="ids[${num}]" value="${id}">`);
            }
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

        function removeRow1(num, id) {
            if (id != 0) {
                $("#complaint-0").append(`<input type="hidden" name="ids[${num}]" value="${id}">`);
            }
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

        function removeRow2(num, id) {
            if (id != 0) {
                $("#causes-0").append(`<input type="hidden" name="ids[${num}]" value="${id}">`);
            }
            $(`#causes-${num}`).remove();
        }
    </script>
    <style>
        .table thead th {
            vertical-align: bottom;
          
        }

        table,
        th,
        td,
        tr {
            border: 1px solid silver;
           
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
