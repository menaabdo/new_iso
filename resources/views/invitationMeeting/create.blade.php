@extends('layouts.master')

@section('content')
<style>
    .shadow-lg {
        box-shadow: 0 1rem 3rem rgba(0, 0, 0, .175) !important;
    }

    input {
        box-shadow: 0 1rem 3rem rgba(0, 0, 0, .175) !important
    }

</style>

<div class='row card'>

    <div class='row card' style='margin:auto;margin-right:80px'>

        <form action="{{route('invitationMeeting.store')}}" method="post" class='col-md-10' style='margin:auto;margin-top:80px' enctype="multipart/form-data" id="fo1">
            {{ csrf_field() }}
            <div class="container p-4">
                <h2 style=' ;text-shadow: 1px 1px 1px #3ed3ea;margin-right:100px'>@lang('main.Invitation to a meeting')</h2>
                <hr class="w-100">
                <div class="form-group row w-10">
                    <h6 for="" class="col-md-12">@lang('main.We inform you of the management review meeting of the quality system') </h6>
                </div>
                <div class='shadow-lg p-3'>
                    <label class="form-label pr-5">@lang('main.Company Logo')</label>
                    <div class=''>
                        <input type="file" id="img" class='shadow-lg' name="logo" accept="image/*">
                    </div>
                </div>

                <div class='shadow-lg p-3'>
                    <label for="" class=" col-form-label text-left">@lang('main.meeting_time') :</label>
                    <div class="">
                        <input type="date" class="form-control col-md-4 shadow-lg" name="date_1">
                    </div>
                </div>

                <div class='shadow-lg p-3'>
                    <label for="" class="col-form-label">@lang('main.day') :</label>
                    <div class="">
                        <input type="text" class="form-control col-md-4 shadow-lg" name="day">
                    </div>
                </div>
                <div class='shadow-lg p-3'>
                    <label for="" class="col-form-label">@lang('main.meeting_place') :</label>
                    <div class="">
                        <input type="text" class="form-control col-md-4 shadow-lg" name="place_meeting">
                    </div>
                </div>
                <hr color="black">
                <div class="form-group row w-100 text-right">
                    <h2 for="" class="col-2 col-form-label" style=';text-shadow: 1px 1px 1px #3ed3ea;margin:auto'>أسماء الحضور :</h2>
                </div>

                <div class="form-group row w-100 text-center" style="text-align:center ;">
                    <table class="table">
                        <tr style="background-color:#233242;color:white">
                            <th>@lang('main.m')</th>
                            <th>@lang('main.name')</th>
                            <th>@lang('main.job')</th>
                            <th>@lang('main.received date')</th>
                        </tr>

                        <tr id="invetation-0">
                            <th class="text-center end-td ">
                                <button type="button" title="Remove" disabled="disabled" class="btn btn-danger btn-option">
                                    <i class="fa fa-minus-circle"></i>
                                </button>
                            </th>
                            <th><input class="form-control shadow-lg" type="text" name="invetation[0][name_1]"></th>
                            <th><input class="form-control shadow-lg" type="text" name="invetation[0][job_1]"></th>
                            <th><input class="form-control shadow-lg" type="date" name="invetation[0][recive_date]"></th>
                        </tr>
                        <tr class="datatable-row datatable-row-even">
                            <td class="text-center end-td " id="increment">
                                <button type="button" class="btn btn-primary add_new" id="btn-0" onclick="appendRow(0)"><i class="fa fa-plus-circle"></i></button>
                            </td>
                        </tr>
                    </table>
                </div>

                <table style=" margin:auto">
                    <thead>
                        <tr>
                            @if (Auth::user()->hasRole('SuperAdmin'))
                            <th class=" w-50 text-center">
                                <div class="" style="text-align:center ;">
                                    <label for="" class="" style="font-size:large;font-weight: bolder;">@lang('main.management representative') :</label>
                                </div>
                                <div class="form-group row w-20 text-right">
                                    <label for="" class="col-md-3 col-form-label">@lang('main.name') </label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control shadow-lg" placeholder="  ......" name="name_manager">
                                    </div>
                                </div>
                            </th>
                            @endif
                        </tr>
                    </thead>
                </table>
                <br><br>
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
        $appended_text = ` <tr class="datatable-row datatable-row-even" id="invetation-${$new_number}">
                                             
                                                <td class="text-center end-td ">
                                                            <button type="button" title="Remove" onclick="removeRow(${$new_number})"
                                                                    class="btn btn-danger btn-option">
                                                                    <i class="fa fa-minus-circle"></i>
                                                            </button>
                                                </td>
                                                <th><input class="form-control" type="text" name="invetation[${$new_number}][name_1]"></th>
                    <th><input class="form-control" type="text" name="invetation[${$new_number}][job_1]"></th>
                    <th><input class="form-control" type="date" name="invetation[${$new_number}][recive_date]"></th>
                                            </tr>`;
        $($appended_text).insertAfter(`#invetation-${num}`);
        if (!document.getElementById(`invetation-${num}`)) {
            $($appended_text).insertAfter(`#attendance-0`);
        }

        $(`#btn-${num}`).remove();
        $("#increment").append(`<button type="button" class="btn btn-primary add_new" id="btn-${$new_number}" onclick="appendRow(${$new_number})"><i class="fa fa-plus-circle"></i></button></td>`);


    }

    function removeRow(num) {
        $(`#invetation-${num}`).remove();

    }

</script>
<style>
    .table thead th {
        vertical-align: bottom;
        /* border-bottom: 2px solid rgb(214, 206, 206); */
    }

    table,
    th,
    td,
    tr {
        border: 1px solid;
        /* border-bottom: 2px solid rgb(214, 206, 206);
        border-top: 2px solid rgb(214, 206, 206); */
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
