@extends('layouts.master')
@section('content')
<div class='card'>
    <div class="row card-body" style='margin:auto'>
        <div class='row' style='margin:auto'>
            <h3 style="margin-top:85px;text-shadow: 1px 1px 1px #3ed3ea;">أمر تكليف لإجراء مراجعة داخلية لنظام الجودة</h3>
            <hr>
        </div>

        <form action="{{route('assigned.update',$assigned->id)}}" class='col-md-9' style='margin:auto' method="post" enctype="multipart/form-data" id="fo1">
            @method('PUT')
            {{ csrf_field() }}
            <div class='row shadow-lg p-3'>
                <label class=" form-label text-left pr-5" style='text-align:left !important'>@lang('main.Company Logo')</label>
                <div class='mx-4'>
                    <input type="file" id="img" name="logo" class='form-control ' accept="image/*">
                </div>
                <img src="{{ asset($assigned->logo) }}" height=100px width=100px; />

            </div>

            <div class='shadow-lg mt-5 p-3'>
                <label class="form-label">@lang('main.assigned')</label>
                <div>
                    <textarea name="assigned" rows="12" cols="100" class='form-control'>{{$assigned->assigned}} </textarea>
                </div>
            </div>
        <br>
           <table class="table">
                <thead>
                    <tr>
                        <th>
                            <div class="" style="text-align:start ;">
                                <label>@lang('main.Company Name')</label>
                                <input class="form-control shadow-lg" type="text" name="company_name" value="{{$assigned->company_name}}">
                            </div>

                        </th>
                        <th>
                            <div class="" style="text-align:start ;">
                                <label>@lang('main.release_date') </label>
                                <input class="form-control shadow-lg" type="text" name="date2" onfocus="(this.type='date')" onblur="(this.type='text')" value="{{$assigned->date2}}">
                            </div>

                        </th>
                        <th>
                            <div class="" style="text-align:start ;">
                                <label>@lang('main.Modification date')</label>
                                <input class="form-control shadow-lg" type="text" name="date3" onfocus="(this.type='date')" onblur="(this.type='text')" value="{{$assigned->date3}}">
                            </div>

                        </th>
                        <th>
                            <div class="" style="text-align:start ;">
                                <label>@lang('main.model_period')</label>
                                <input class="form-control shadow-lg" type="text" name="period_time" value="{{$assigned->period_time}}">
                            </div>

                        </th>
                        <th>
                            <div class="" style="text-align:start ;">
                                <label>@lang('main.page_number')</label>
                                <input class="form-control shadow-lg" type="text" name="number_page" value="{{$assigned->number_page}}">
                            </div>

                        </th>
                        <th>
                            <div class="" style="text-align:start ;">
                                <label>@lang('main.document_code')</label>
                                <input class="form-control shadow-lg" type="text" name="number_doc" value="{{$assigned->number_doc}}">
                            </div>
                        </th>
                    </tr>
                </thead>
            </table>
            <div class='row'>
                <button style="border-radius:8px;margin: 50px; width:30% ;background-color: #2a415b; ;height: 5%;padding:10px;margin-right:100px;margin:auto" type="submit" class="btn btn-primary col-md-4">
                    <i class="fas fa-save" style="width:15% ; height: 20%;"></i>@lang('main.edit')</button>
            </div>

        </form>
    </div>
</div>
<style>
    #mainDiv {
        height: 200px;
        width: 200px;
        background: #ffffff;
        border: 1px solid rgb(8, 2, 2);
        text-align: center;
        width: 20%;
        float: left;
        display: inline-table;
    }

</style>
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
