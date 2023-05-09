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
    <div class="card-body row" style='margin:auto;margin-top:80px'>

        <form action="{{route('contractStats.update',$contractStats->id)}}" class='col-md-10' style='margin:auto' method="post" enctype="multipart/form-data" id="fo1">
            @method('PUT')
            {{ csrf_field() }}
            <div style="" class="w-100 text-center my-4">
                <h2 style='text-shadow: 1px 1px 1px #3ed3ea;'> إحصائيات التعاقد</h2>
                <hr class="w-100">
            </div>
            <div class='row mt-4 mb-3'>
                <label class="form-label col-md-2 ">@lang('main.Company Logo')</label>
      
                <input type="file" id="img" name="logo" accept="image/*">
                <img src="{{ asset($contractStats->logo) }}" height=180px width=210px; />
              
            </div>
            <hr class="w-100">


            <div class="form-group row w-100 text-right" style="text-align:center;">
                <table class="table">
                    <tr style="background-color:    #001635; color:white;text-align:center;">
                        <th scope="col" rowspan="2">@lang('main.m')</th>
                        <th scope="col" rowspan="2">@lang('main.month')</th>
                        <th scope="col" colspan="2">@lang('main.Contract visits')</th>
                        <th scope="col" colspan="2">@lang('main.Annual contract')</th>
                        <th scope="col" rowspan="2">@lang('main.note')</th>
                    </tr>
                    <tr style="background-color:    #001635; color:white;text-align:center;">
                        <th scope="col">@lang('main.implemented')</th>
                        <th scope="col">@lang('main.Not implemented')</th>
                        <th scope="col">@lang('main.implemented')</th>
                        <th scope="col">@lang('main.Not implemented')</th>
                    </tr>

                    @if(count($contractStats->contractStats)>0)
                    @foreach($contractStats->contractStats as $key => $data)
                    <tr id="contractStats-{{$key}}">
                        <td class="text-center end-td ">
                            <button type="button" title="Remove" onclick="removeRow({{$key}},{{$data->id}})" @if ($key==0) disabled="disabled" @endif class="btn btn-danger btn-option">
                                <i class="fa fa-minus-circle"></i>
                            </button>
                        </td>
                        <th><input class="form-control" type="text" name="contractStats[{{$key}}][mounth]" value="{{$data->mounth}}"></th>
                        <th><input style="width: 40px; height: 40px;" type="checkbox" name="contractStats[{{$key}}][permeable1]" value="1" {{ $contractStats->contractStats[$key]->permeable1=="1"? 'checked':'' }}></th>
                        <th><input style="width: 40px; height: 40px;" type="checkbox" name="contractStats[{{$key}}][impermeable1]" value="1" {{ $contractStats->contractStats[$key]->impermeable1=="1"? 'checked':'' }}></th>
                        <th><input style="width: 40px; height: 40px;" type="checkbox" name="contractStats[{{$key}}][permeable2]" value="1" {{ $contractStats->contractStats[$key]->permeable2=="1"? 'checked':'' }}></th>
                        <th><input style="width: 40px; height: 40px;" type="checkbox" name="contractStats[{{$key}}][impermeable2]" value="1" {{ $contractStats->contractStats[$key]->impermeable2=="1"? 'checked':'' }}></th>
                        <th><textarea class="form-control" type="text" name="contractStats[{{$key}}][nodes]">{{$data->nodes}}</textarea></th>
                    </tr>
                    @endforeach
                    <tr class="datatable-row datatable-row-even">
                        <td class="text-center end-td " id="increment">
                            <button type="button" class="btn btn-primary add_new" id="btn-{{count($contractStats->contractStats)-1}}" onclick="appendRow({{count($contractStats->contractStats)-1}})"><i class="fa fa-plus-circle"></i></button>
                        </td>
                    </tr>
                    @else
                    <tr id="contractStats-0">
                        <th class="text-center end-td ">
                            <button type="button" title="Remove" disabled="disabled" class="btn btn-danger btn-option">
                                <i class="fa fa-minus-circle"></i>
                            </button>
                        </th>
                        <th><input class="form-control" type="text" name="contractStats[0][mounth]"></th>
                        <th><input style="width: 40px; height: 40px;" type="checkbox" name="contractStats[0][permeable1]" value="1"></th>
                        <th><input style="width: 40px; height: 40px;" type="checkbox" name="contractStats[0][impermeable1]" value="1"></th>
                        <th><input style="width: 40px; height: 40px;" type="checkbox" name="contractStats[0][permeable2]" value="1"></th>
                        <th><input style="width: 40px; height: 40px;" type="checkbox" name="contractStats[0][impermeable2]" value="1"></th>
                        <th><textarea class="form-control" type="text" name="contractStats[0][nodes]"></textarea></th>
                    </tr>
                    <tr class="datatable-row datatable-row-even">
                        <td class="text-center end-td " id="increment">
                            <button type="button" class="btn btn-primary add_new" id="btn-0" onclick="appendRow(0)"><i class="fa fa-plus-circle"></i></button>
                        </td>
                    </tr>
                    @endif
                    <tr>
                        <th style="background-color:    #001635; color:white;text-align:center;"
                     scope="col" rowspan="2">@lang('main.Total')</th>
                        <th><input class="form-control" type="text" name="total_1" value="{{$contractStats->total_1}}"></th>
                        <th><input class="form-control" type="text" name="total_2" value="{{$contractStats->total_2}}"></th>
                        <th><input class="form-control" type="text" name="total_3" value="{{$contractStats->total_3}}"></th>
                        <th><input class="form-control" type="text" name="total_4" value="{{$contractStats->total_4}}"></th>
                        <th><input class="form-control" type="text" name="total_5" value="{{$contractStats->total_5}}"></th>
                        <th><input class="form-control" type="text" name="total_6" value="{{$contractStats->total_6}}"></th>
                    </tr>

                </table>
            </div>

            <hr class="w-100">
            <div class="form-group row ">
                <label for="" class="col-3 col-form-label">@lang('main.conclusion'):</label>
                <div class="col-6">
                    <input type="text" class="form-control" name="conclusion" value="{{$contractStats->conclusion}}">
                </div>
            </div>
            <hr class="w-100">
            <table class="table">
                <thead>
                    <tr>
                        <th>
                            <div class="" style="text-align:start ;">
                                <label>@lang('main.Company Name')</label>
                                <input class="form-control" type="text" name="company_name"  value="{{ $contractStats->company_name }}">
                            </div>

                        </th>
                        <th>
                            <div class="" style="text-align:start ;">
                                <label>@lang('main.release_date') </label>
                                <input class="form-control" type="text" name="date2" value="{{ $contractStats->date2 }}"  onfocus="(this.type='date')" onblur="(this.type='text')">
                            </div>

                        </th>
                        <th>
                            <div class="" style="text-align:start ;">
                                <label>@lang('main.Modification date')</label>
                                <input class="form-control" type="text" name="date3" value="{{ $contractStats->date3 }}"  onfocus="(this.type='date')" onblur="(this.type='text')">
                            </div>

                        </th>
                        <th>
                            <div class="" style="text-align:start ;">
                                <label>@lang('main.model_period')</label>
                                <input class="form-control shadow-lg" type="text" name="period_time" value="{{ $contractStats->period_time }}">
                            </div>

                        </th>
                        <th>
                            <div class="" style="text-align:start ;">
                                <label>@lang('main.page_number')</label>
                                <input class="form-control shadow-lg" type="text" name="number_page" value="{{ $contractStats->number_page }}">
                            </div>

                        </th>
                        <th>
                            <div class="" style="text-align:start ;">
                                <label>@lang('main.document_code')</label>
                                <input class="form-control shadow-lg" type="text" name="number_doc" value="{{ $contractStats->number_doc }}">
                            </div>
                        </th>
                    </tr>
                </thead>
            </table>
            <div class='row'>
            <button style="border-radius:8px;margin: 50px; width:30% ;background-color: #2a415b; ;height: 5%;padding:10px;margin-right:100px;margin:auto" type="submit"
                class="btn btn-primary col-md-4">
               @lang('main.edit')</button>
                    </div>  
        </form>
    </div>

    <script>
        function appendRow(num) {
            $new_number = parseInt(num) + 1;
            $appended_text = ` <tr class="datatable-row datatable-row-even" id="contractStats-${$new_number}">
                                         
                                            <td class="text-center end-td ">
                                                        <button type="button" title="Remove" onclick="removeRow(${$new_number})"
                                                                class="btn btn-danger btn-option">
                                                                <i class="fa fa-minus-circle"></i>
                                                        </button>
                                            </td>
                                            <th><input class="form-control" type="text" name="contractStats[${$new_number}][mounth]"></th>
                                            <th><input style="width: 40px; height: 40px;" type="checkbox" name="contractStats[${$new_number}][permeable1]" value="1"></th>
                                            <th><input style="width: 40px; height: 40px;" type="checkbox" name="contractStats[${$new_number}][impermeable1]" value="1"></th>
                                            <th><input style="width: 40px; height: 40px;" type="checkbox" name="contractStats[${$new_number}][permeable2]" value="1"></th>
                                            <th><input style="width: 40px; height: 40px;" type="checkbox" name="contractStats[${$new_number}][impermeable2]" value="1"></th>
                                            <th><textarea class="form-control" type="text" name="contractStats[${$new_number}][nodes]"></textarea></th>
                                        </tr>`;
            $($appended_text).insertAfter(`#contractStats-${num}`);
            if (!document.getElementById(`contractStats-${num}`)) {
                $($appended_text).insertAfter(`#contractStats-0`);
            }

            $(`#btn-${num}`).remove();
            $("#increment").append(`<button type="button" class="btn btn-primary add_new" id="btn-${$new_number}" onclick="appendRow(${$new_number})"><i class="fa fa-plus-circle"></i></button></td>`);
        }

        function removeRow(num, id) {
            if (id != 0) {
                $("#contractStats-0").append(`<input type="hidden" name="ids[${num}]" value="${id}">`);
            }
            $(`#contractStats-${num}`).remove();
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
