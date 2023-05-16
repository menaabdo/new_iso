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

        <h3 style="text-shadow: 1px 1px 1px #3ed3ea;margin-top:85px;" class='mx-3 '>@lang('main.Annual plan for internal  audit')</h3>
        <hr>
        <form action="{{route('work_plan.store')}}" method="post" enctype="multipart/form-data" id="fo1" class='col-md-12'>
            {{ csrf_field() }}
            <div class="form-group row text-center mt-5">
                <label for="" class="col-md-3 col-form-label " style=''>@lang('main.date') :</label>
                <div class="col-md-4">
                    <input type="date" class="form-control shadow-lg"  name="date_1">
                </div>
            </div>

            <div class="form-group row  text-right" style="text-align:center ;overflow-x: auto;">

                <table class="table table-bordered  text-center col-md-11 mt-5" style="grid-auto-flow: column;justify-content: center; align-content: center;">
                    <thead class='' style='background-color: #2a415b;font-size:11px;
    color: white;'>
                        <th class=" col-form-label  " style=''>@lang('main.m')</th>
                        <th class=" col-form-label">@lang('main.Referenced Authority') </th>
                        <th class=" col-form-label">@lang('main.Review topics/items')</th>
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
                    </thead>
                    <tr id="plan-0">
                        <th class="text-center end-td ">
                            <button type="button" title="Remove" disabled="disabled" class="btn btn-danger btn-option">
                                <i class="fa fa-minus-circle"></i>
                            </button>
                        </th>
                        <th><input class="form-control shadow-lg" type="text" name="plan[0][referenced_authority]"></th>
                        <th><input class="form-control shadow-lg" type="text" name="plan[0][review_topics]"></th>
                        <th><input style="width: 40px; height: 40px; " class='form-control shadow-lg' type="checkbox" name="plan[0][jan]" value="1"></th>
                        <th><input style="width: 40px; height: 40px; " type="checkbox" name="plan[0][feb]" value="1"></th>
                        <th><input style="width: 40px; height: 40px; " type="checkbox" name="plan[0][mar]" value="1"></th>
                        <th><input style="width: 40px; height: 40px; " type="checkbox" name="plan[0][epr]" value="1"></th>
                        <th><input style="width: 40px; height: 40px; " type="checkbox" name="plan[0][may]" value="1"></th>
                        <th><input style="width: 40px; height: 40px; " type="checkbox" name="plan[0][jaun]" value="1"></th>
                        <th><input style="width: 40px; height: 40px; " type="checkbox" name="plan[0][jun]" value="1"></th>
                        <th><input style="width: 40px; height: 40px; " type="checkbox" name="plan[0][augest]" value="1"></th>
                        <th><input style="width: 40px; height: 40px; " type="checkbox" name="plan[0][sep]" value="1"></th>
                        <th><input style="width: 40px; height: 40px; " type="checkbox" name="plan[0][oct]" value="1"></th>
                        <th><input style="width: 40px; height: 40px; " type="checkbox" name="plan[0][nov]" value="1"></th>
                        <th><input style="width: 40px; height: 40px; " type="checkbox" name="plan[0][des]" value="1"></th>
                        <th><input class="form-control" type="text" name="plan[0][notes]"></th>
                    </tr>
                    <tr class="datatable-row datatable-row-even">
                        <td class="text-center end-td " id="increment">
                            <button type="button" class="btn btn-primary add_new" id="btn-0" onclick="appendRow(0)"><i class="fa fa-plus-circle"></i></button>
                        </td>
                    </tr>
                </table>
            </div>
            <!-- -------------------------------------- -->
            <div class=" p-2" style="">
                <div class="form-group row  d-flex justify-content-between w-100 text-left">
                    <div class=" col-md-4">
                        <input type="checkbox" name="planned" value="1">
                        <label>@lang('main.Planned date') (ISO 9001)</label>
                    </div>
                    <div class=" col-md-4">
                        <input type="radio" name="planing" value="there_are_mismatches">
                        <label for="" s>@lang('main.Implemented and there are no mismatches')</label>

                    </div>
                    <div class=" col-md-4">
                        <input type="radio" name="planing" value="there_are_no_mismatches">
                        <label for="">@lang('main.Implemented and there are no cases of non-compliance')</label>

                    </div>
                </div>
            </div>
            <table class="table table-bordered shadow-lg">
                <thead>
                    <tr>
                        @if (Auth::user()->hasRole('Employee'))
                        <th class=" text-center col-md-2 ">
                            <div class="" style="text-align:center ;border-bottom: 1px solid;">
                                <label for="" class="" style="text-align:center;font-size:large;font-weight: bolder; ">@lang('main.prepare')</label>
                                <hr>
                            </div>
                            <div class="form-group row w-10 text-right ">
                                <label for="" class="col-3 col-form-label">@lang('main.name'): -</label>
                                <div class="col-6">
                                    <input type="text" class="form-control " placeholder="  ......" name="name_1">
                                </div>
                            </div>
                            <div class="form-group row w-10 text-right">
                                <label for="" class="col-3 col-form-label">@lang('main.job'): -</label>
                                <div class="col-6">
                                    <input type="text" class="form-control shadow-lg" placeholder="  ......" name="job_1">
                                </div>
                            </div>

                        </th>
                        @endif
                        @if (Auth::user()->hasRole('Admin'))
                        <th class=" text-center col-2 ">
                            <div class="" style="text-align:center ;border-bottom:1px solid;">
                                <label for="" class="" style="text-align:center;font-size:large;font-weight: bolder;">@lang('main.prepare')</label>
                            </div>
                            <div class="form-group row w-10 text-right mt-3">
                                <label for="" class="col-3 col-form-label">@lang('main.name'): -</label>
                                <div class="col-6">
                                    <input type="text" class="form-control shadow-lg" placeholder="  ......" name="name_1">
                                </div>
                            </div>
                            <div class="form-group row w-10 text-right">
                                <label for="" class="col-3 col-form-label">@lang('main.job'): -</label>
                                <div class="col-6">
                                    <input type="text" class="form-control" placeholder="  ......" name="job_1">
                                </div>
                            </div>

                        </th>
                        <th class="  text-center col-2 ">
                            <div class="" style="text-align:center ;">
                                <label for="" class="" style="text-align:center;font-size:large;font-weight: bolder;">@lang('main.review'):</label>
                            </div>
                            <div class="form-group row w-10 text-right">
                                <label for="" class="col-3 col-form-label">@lang('main.name'): -</label>
                                <div class="col-6">
                                    <input type="text" class="form-control" placeholder="  ......" name="name_2">
                                </div>
                            </div>
                            <div class="form-group row w-10 text-right">
                                <label for="" class="col-3 col-form-label">@lang('main.job'): -</label>
                                <div class="col-6">
                                    <input type="text" class="form-control" placeholder="  ......" name="job_2">
                                </div>
                            </div>

                        </th>
                        @endif
                        @if (Auth::user()->hasRole('SuperAdmin'))
                        <th class=" text-center col-2 ">
                            <div class="" style="text-align:center ;">
                                <label for="" class="" style="text-align:center;font-size:large;font-weight: bolder;">@lang('main.prepare')</label>
                            </div>
                            <div class="form-group row w-10 ">
                                <label for="" class="col-md-3 col-form-label">@lang('main.name'): -</label>
                                <div class="col-6">
                                    <input type="text" class="form-control" placeholder="  ......" name="name_1">
                                </div>
                            </div>
                            <div class="form-group row w-10 text-right">
                                <label for="" class="col-3 col-form-label">@lang('main.job'): -</label>
                                <div class="col-6">
                                    <input type="text" class="form-control" placeholder="  ......" name="job_1">
                                </div>
                            </div>

                        </th>
                        <th class="  text-center col-2 ">
                            <div class="" style="text-align:center ;">
                                <label for="" class="" style="text-align:center;font-size:large;font-weight: bolder;">@lang('main.review'):</label>
                            </div>
                            <div class="form-group row w-10 ">
                                <label for="" class="col-md-3 col-form-label">@lang('main.name')</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control shadow-lg" placeholder="  ......" name="name_2">
                                </div>
                            </div>
                            <div class="form-group row w-10 text-right">
                                <label for="" class="col-3 col-form-label">@lang('main.job')</label>
                                <div class="col-6">
                                    <input type="text" class="form-control shadow-lg" placeholder="  ......" name="job_2">
                                </div>
                            </div>

                        </th>
                        <th class="  text-center col-2 ">
                            <div class="" style="text-align:center ;">
                                <label for="" class="" style="text-align:center;font-size:large;font-weight: bolder;">@lang('main.approval'):</label>
                            </div>
                            <div class="form-group row w-10 text-right">
                                <label for="" class="col-md-3 col-form-label">@lang('main.name')</label>
                                <div class="col-6">
                                    <input type="text" class="form-control shadow-lg" placeholder="  ......" name="name_3">
                                </div>
                            </div>
                            <div class="form-group row w-10 text-right">
                                <label for="" class="col-3 col-form-label">@lang('main.job')</label>
                                <div class="col-6">
                                    <input type="text" class="form-control shadow-lg" placeholder="  ......" name="job_3">
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
            <div class="form-group" style='text-align:center'>
                <button style="border-radius:8px;margin: 50px; width:30% ;background-color: #2a415b; ;height: 5%;padding:10px" type="submit" class="btn btn-primary">
                    <i class="fas fa-save" style="width:15% ; height: 20%;"></i>@lang('main.save')</button>
            </div>
    </div>
</div>

</form>

</div>
</div>

<style>
    .table thead th {
        vertical-align: bottom;

        vertical-align: middle;
    }

    table,
    td,
    th {

        vertical-align: middle;
        text-align: center;
    }

    .rota {
        -webkit-transform: rotate(-20deg);
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
        $("#increment").append(`<button type="button" class="btn btn-primary add_new" id="btn-${$new_number}" onclick="appendRow(${$new_number})"><i class="fa fa-plus-circle"></i></button></td>`);


    }

    function removeRow(num) {
        $(`#plan-${num}`).remove();

    }

</script>
@stop
