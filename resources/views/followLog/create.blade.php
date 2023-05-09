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
    <div class="card-body ">
      
    <form action="{{route('followLog.store')}}" method="post" enctype="multipart/form-data" style='margin:auto' id="fo1">
        {{ csrf_field() }}

        <div class="container p-4">
            <div style="" class="w-100 text-center my-4">
                <h2>سجل متابعة قرارات مراجعة الإدارة العليا</h2>
                <hr class="w-100" color="black">
            </div>

            <div class="form-group row">
                <div id="mainDiv" style=" margin-right:1000px;">
                    <h4 style=" color:blue;">@lang('main.Company Logo')</h4>
                    <hr width="50%" size="20" color="blue">
                    <input type="file" id="img" name="logo" accept="image/*">
                </div>
                @php
                            if (App::getLocale() == 'ar')
                                $align='left';
                            else
                                $align='right';
                            @endphp
                            
                <h3 for="" class="col-1 col-form-label">@lang('main.meeting_kind') : </h3>

                <label for="" style="text-align:{{$align}};" class="col-md-2 col-form-label">@lang('main.plan') </label>
                <div class=" col-form-label pl-2">
                    <input type="radio" style='margin-top:6px' id="planing" name="planing" value="planned" class='shadow-lg'>
                </div>


                <label for="" style="text-align:{{$align}};" class="col-md-3 col-form-label">@lang('main.no_plan') </label>
                <div class=" col-form-label pr-1">
                    <input type="radio" id="not_planing" style='margin-top:6px' name="planing" value="not_planned" class='shadow-lg'>
                </div>
               
                <div class="col-6 col-form-label">
                    <label for="" style="text-align:right;" class="col-4 col-form-label">@lang('main.meeting_num') </label>
                    <input type="text" name="meeting_num">
                </div>

                <h2 for="" style="text-align:left;" class="col-3 col-form-label">@lang('main.date') : </h2>
                <div class="col-1 col-form-label">
                    <input type="date" name="meetting_date">
                </div>


            </div>
            <div class="form-group row w-100 text-right" style="text-align:center;">
                <table class="table">
                    <tr style="background-color:rgb(235, 252, 160); text-align:center;">
                        <th scope="col" rowspan="2">@lang('main.m')</th>
                        <th scope="col" rowspan="2">@lang('main.Topic')</th>
                        <th scope="col" rowspan="2">@lang('main.decision made')</th>
                        <th scope="col" rowspan="2">@lang('main.responsible')</th>
                        <th scope="col" rowspan="2">@lang('main.Planned date')</th>
                        <th scope="col" colspan="2">@lang('main.Follow-up implementation')</th>
                        <th scope="col" rowspan="2">@lang('main.note')</th>
                    </tr>
                    <tr style="background-color:rgb(235, 252, 160); text-align:center;">
                        <th scope="col">@lang('main.completed')</th>
                        <th scope="col">@lang('main.not_completed')</th>
                    </tr>


                    <tr id="follow-0">
                        <th class="text-center end-td ">
                            <button type="button" title="Remove" disabled="disabled" class="btn btn-danger btn-option">
                                <i class="fa fa-minus-circle"></i>
                            </button>
                        </th>
                        <th><textarea class="form-control" type="text" name="follow[0][subject]"></textarea></th>
                        <th><textarea class="form-control" type="text" name="follow[0][decision]"></textarea></th>
                        <th><input class="form-control" type="text" name="follow[0][administrator]"></th>
                        <th><input class="form-control" type="date" name="follow[0][date]"></th>
                        <th><input style="width: 40px; height: 40px; " type="checkbox" name="follow[0][completed]" value="1"></th>
                        <th><input style="width: 40px; height: 40px; " type="checkbox" name="follow[0][not_completed]" value="1"></th>
                        <th><textarea class="form-control" type="text" name="follow[0][notes]"></textarea></th>
                    </tr>
                    <tr class="datatable-row datatable-row-even">
                        <td class="text-center end-td " id="increment">
                            <button type="button" class="btn btn-primary add_new" id="btn-0" onclick="appendRow(0)"><i class="fa fa-plus-circle"></i></button>
                        </td>
                    </tr>
                </table>
            </div>
            <table class="table">
                <thead>
                    <tr>
                        @if (Auth::user()->hasRole('Employee'))
                        <th class=" text-center col-2 ">
                            <div class="" style="text-align:center ;">
                                <label for="" class="" style="text-align:center;font-size:large;font-weight: bolder;">@lang('main.prepare')</label>
                            </div>
                            <div class="form-group row w-10 text-right">
                                <label for="" class="col-3 col-form-label">@lang('main.name'): -</label>
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
                        @endif
                        @if (Auth::user()->hasRole('Admin'))
                        <th class=" text-center col-2 ">
                            <div class="" style="text-align:center ;">
                                <label for="" class="" style="text-align:center;font-size:large;font-weight: bolder;">@lang('main.prepare')</label>
                            </div>
                            <div class="form-group row w-10 text-right">
                                <label for="" class="col-3 col-form-label">@lang('main.name'): -</label>
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
                                <label for="" class="" style="text-align:center;font-size:large;font-weight: bolder;">@lang('main.review')</label>
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
                        @if(Auth::user()->hasRole('SuperAdmin'))
                        <th class=" text-center col-2 ">
                            <div class="" style="text-align:center ;">
                                <label for="" class="" style="text-align:center;font-size:large;font-weight: bolder;">@lang('main.prepare')</label>
                            </div>
                            <div class="form-group row w-10 text-right">
                                <label for="" class="col-3 col-form-label">@lang('main.name'): -</label>
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
                                <label for="" class="" style="text-align:center;font-size:large;font-weight: bolder;">@lang('main.review')</label>
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
                        <th class="  text-center col-2 ">
                            <div class="" style="text-align:center ;">
                                <label for="" class="" style="text-align:center;font-size:large;font-weight: bolder;">@lang('main.approval')</label>
                            </div>
                            <div class="form-group row w-10 text-right">
                                <label for="" class="col-3 col-form-label">@lang('main.name'): -</label>
                                <div class="col-6">
                                    <input type="text" class="form-control" placeholder="  ......" name="name_3">
                                </div>
                            </div>
                            <div class="form-group row w-10 text-right">
                                <label for="" class="col-3 col-form-label">@lang('main.job'): -</label>
                                <div class="col-6">
                                    <input type="text" class="form-control" placeholder="  ......" name="job_3">
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
        </div>
        <div class='row'>
            <button style="border-radius:8px;margin: 50px; width:30% ;background-color: #2a415b; ;height: 5%;padding:10px;margin-right:100px;margin:auto" type="submit" class="btn btn-primary col-md-4">
                <i class="fas fa-save" style="width:15% ; height: 20%;"></i>@lang('main.save')</button>
        </div>
        </div>


    </form>
</div>
</div>
    <script>
        function appendRow(num) {
            $new_number = parseInt(num) + 1;
            $appended_text = ` <tr class="datatable-row datatable-row-even" id="follow-${$new_number}">
                                                 
                                                    <td class="text-center end-td ">
                                                                <button type="button" title="Remove" onclick="removeRow(${$new_number})"
                                                                        class="btn btn-danger btn-option">
                                                                        <i class="fa fa-minus-circle"></i>
                                                                </button>
                                                    </td>
                                                    <th><textarea class="form-control" type="text" name="follow[${$new_number}][subject]"></textarea></th>
                                                    <th><textarea class="form-control" type="text" name="follow[${$new_number}][decision]"></textarea></th>
                                                    <th><input class="form-control" type="text" name="follow[${$new_number}][administrator]"></th>
                                                    <th><input class="form-control" type="date" name="follow[${$new_number}][date]"></th>
                                                    <th><input style="width: 40px; height: 40px; "  type="checkbox" name="follow[${$new_number}][completed]" value="1"></th>
                                                    <th><input style="width: 40px; height: 40px; "  type="checkbox" name="follow[${$new_number}][not_completed]" value="1"></th>
                                                    <th><textarea class="form-control" type="text" name="follow[${$new_number}][notes]"></textarea></th>
              
                                                     </tr>`;
            $($appended_text).insertAfter(`#follow-${num}`);
            if (!document.getElementById(`follow-${num}`)) {
                $($appended_text).insertAfter(`#attendance-0`);
            }

            $(`#btn-${num}`).remove();
            $("#increment").append(`<button type="button" class="btn btn-primary add_new" id="btn-${$new_number}" onclick="appendRow(${$new_number})"><i class="fa fa-plus-circle"></i></button></td>`);


        }

        function removeRow(num) {
            $(`#follow-${num}`).remove();

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
            border: 1px solid black;
           
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
