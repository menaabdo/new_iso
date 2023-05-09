@extends('layouts.master')
@section('content')

<div class="card">
<div class="card-body">
    <h3 style="margin-top:85px;">سجل متابعة تقارير عدم المطابقة</h3>
    <hr>
    <form action="{{route('nonConformanceReport.update',$nonConformanceReport->id)}}" method="post" enctype="multipart/form-data" id="fo1">
        @method('PUT')
        {{ csrf_field() }}
        <div style="" class="w-100 text-center my-4">
            <h2>سجل متابعة تقارير عدم المطابقة </h2>
            <label>@lang('main.year')</label>
            <input style="text-align: center;" type="text"  name="year" value="{{$nonConformanceReport->year}}">
            <hr class="w-100">
        </div>
        <div id="mainDiv"  style=" margin-right:500px;">
            <h4 style=" color:blue;">@lang('main.Company Logo')</h4>
            <hr width="50%" size="20" color="blue">
            <img src="{{ asset($nonConformanceReport->logo) }}" height=180px width=210px; />
            @if ($nonConformanceReport->status == 'pending' && Auth::user()->hasRole('Employee'))

            <input type="file" id="img" name="logo" accept="image/*">
        @endif

        @if (($nonConformanceReport->status == 'inProgress' && Auth::user()->hasRole('Admin')) ||
        ($nonConformanceReport->status == 'pending' && Auth::user()->hasRole('Admin')))
            <input type="file" id="img" name="logo" accept="image/*">
        @endif
        @if (($nonConformanceReport->status == 'inProgress' && Auth::user()->hasRole('SuperAdmin')) ||
            ($nonConformanceReport->status == 'pending' && Auth::user()->hasRole('SuperAdmin')) ||
            ($nonConformanceReport->status == 'confirmed' && Auth::user()->hasRole('SuperAdmin')))
            <input type="file" id="img" name="logo" accept="image/*">
        @endif

        </div>
        <div class="" style="text-align:start ;">
            <label for="" class="" style="text-align: center;font-weight: bolder;">@lang('main.Cases of non-compliance with the quality system (ISO 9001) in various departments'). </label>
        </div>
        <hr class="w-100">
        <div class="container-fluid p-4" >
            <div class="container-fluid p-2">
                <div class="" style="text-align:center ;">
                    <table>
                        <tr style="background-color:rgb(230, 242, 117)">
                            @if ($nonConformanceReport->status == 'pending' && Auth::user()->hasRole('Employee'))
                            <th class="col-1 col-form-label">@lang('main.m') </th>
                            @endif
                            @if (($nonConformanceReport->status == 'inProgress' && Auth::user()->hasRole('Admin')) ||
                            ($nonConformanceReport->status == 'pending' && Auth::user()->hasRole('Admin')))                            <th class="col-1 col-form-label">@lang('main.m') </th>
                            @endif
                            @if (($nonConformanceReport->status == 'inProgress' && Auth::user()->hasRole('SuperAdmin')) ||
                            ($nonConformanceReport->status == 'pending' && Auth::user()->hasRole('SuperAdmin')) ||
                            ($nonConformanceReport->status == 'confirmed' && Auth::user()->hasRole('SuperAdmin')))
                            <th class="col-1 col-form-label">@lang('main.m') </th>
                            @endif
                            <th>@lang('main.date')</th>
                        <th>@lang('main.The competent department')</th>
                        <th>@lang('main.Case description')</th>
                        <th>@lang('main.Action taken')</th>
                        <th>@lang('main.Responsible for implementation')</th>
                        <th>@lang('main.Implementation scheme')</th>
                        <th>@lang('main.Follow-up implementation')</th>
                        <th>@lang('main.note')</th>
                        </tr>
                        @if(count($nonConformanceReport->nonConformanceReport)>0)
                        @foreach($nonConformanceReport->nonConformanceReport as $key => $data)
                        <tr id="nonConformanceReport-{{$key}}">
                            @if ($nonConformanceReport->status == 'pending' && Auth::user()->hasRole('Employee'))
                            <td class="text-center end-td ">
                                <button type="button" title="Remove" onclick="removeRow({{$key}},{{$data->id}})" @if ($key==0) disabled="disabled" @endif class="btn btn-danger btn-option">
                                    <i class="fa fa-minus-circle"></i>
                                </button>
                            </td>
                            @endif
                            @if (($nonConformanceReport->status == 'inProgress' && Auth::user()->hasRole('Admin')) ||
                            ($nonConformanceReport->status == 'pending' && Auth::user()->hasRole('Admin')))                            <td class="text-center end-td ">
                                <button type="button" title="Remove" onclick="removeRow({{$key}},{{$data->id}})" @if ($key==0) disabled="disabled" @endif class="btn btn-danger btn-option">
                                    <i class="fa fa-minus-circle"></i>
                                </button>
                            </td>
                            @endif
                            @if (($nonConformanceReport->status == 'inProgress' && Auth::user()->hasRole('SuperAdmin')) ||
                            ($nonConformanceReport->status == 'pending' && Auth::user()->hasRole('SuperAdmin')) ||
                            ($nonConformanceReport->status == 'confirmed' && Auth::user()->hasRole('SuperAdmin')))                            <td class="text-center end-td ">
                                <button type="button" title="Remove" onclick="removeRow({{$key}},{{$data->id}})" @if ($key==0) disabled="disabled" @endif class="btn btn-danger btn-option">
                                    <i class="fa fa-minus-circle"></i>
                                </button>
                            </td>
                            @endif
                            <th><input class="form-control" type="date" name="nonConformanceReport[{{$key}}][date_1]" value="{{$data->date_1}}"></th>
                            <th><input class="form-control" type="text" name="nonConformanceReport[{{$key}}][management]" value="{{$data->management}}"></th>
                            <th><input class="form-control" type="text" name="nonConformanceReport[{{$key}}][description]" value="{{$data->description}}"></th>
                            <th><input class="form-control" type="text" name="nonConformanceReport[{{$key}}][action_taken]" value="{{$data->action_taken}}"></th>
                            <th><input class="form-control" type="text" name="nonConformanceReport[{{$key}}][responsible_implementation]" value="{{$data->responsible_implementation}}"></th>
                            <th><input class="form-control" type="text" name="nonConformanceReport[{{$key}}][implementation_scheme]" value="{{$data->implementation_scheme}}"></th>
                            <th><input class="form-control" type="text" name="nonConformanceReport[{{$key}}][follow_implementation]" value="{{$data->follow_implementation}}"></th>
                            <th><input class="form-control" type="text" name="nonConformanceReport[{{$key}}][notes]" value="{{$data->notes}}"></th>

                        </tr>
                        @endforeach
                        @if ($nonConformanceReport->status == 'pending' && Auth::user()->hasRole('Employee'))
                        <tr class="datatable-row datatable-row-even">
                            <td class="text-center end-td " id="increment">
                                <button type="button" class="btn btn-primary add_new" id="btn-{{count($nonConformanceReport->nonConformanceReport)-1}}" onclick="appendRow({{count($nonConformanceReport->nonConformanceReport)-1}})"><i class="fa fa-plus-circle"></i></button>
                            </td>
                        </tr>
                        @endif
                        @if (($nonConformanceReport->status == 'inProgress' && Auth::user()->hasRole('Admin')) ||
                        ($nonConformanceReport->status == 'pending' && Auth::user()->hasRole('Admin')))                        <tr class="datatable-row datatable-row-even">
                            <td class="text-center end-td " id="increment">
                                <button type="button" class="btn btn-primary add_new" id="btn-{{count($nonConformanceReport->nonConformanceReport)-1}}" onclick="appendRow({{count($nonConformanceReport->nonConformanceReport)-1}})"><i class="fa fa-plus-circle"></i></button>
                            </td>
                        </tr>
                        @endif
                        @if (($nonConformanceReport->status == 'inProgress' && Auth::user()->hasRole('SuperAdmin')) ||
                        ($nonConformanceReport->status == 'pending' && Auth::user()->hasRole('SuperAdmin')) ||
                        ($nonConformanceReport->status == 'confirmed' && Auth::user()->hasRole('SuperAdmin')))                        <tr class="datatable-row datatable-row-even">
                            <td class="text-center end-td " id="increment">
                                <button type="button" class="btn btn-primary add_new" id="btn-{{count($nonConformanceReport->nonConformanceReport)-1}}" onclick="appendRow({{count($nonConformanceReport->nonConformanceReport)-1}})"><i class="fa fa-plus-circle"></i></button>
                            </td>
                        </tr>
                        @endif
                        @else
                        <tr id="nonConformanceReport-0">
                            <th class="text-center end-td ">
                                <button type="button" title="Remove" disabled="disabled" class="btn btn-danger btn-option">
                                  <i class="fa fa-minus-circle"></i>
                                </button>
                            </th>
                            <th><input class="form-control" type="date" name="nonConformanceReport[0][date_1]"></th>
                            <th><input class="form-control" type="text" name="nonConformanceReport[0][management]"></th>
                            <th><input class="form-control" type="text" name="nonConformanceReport[0][description]"></th>
                            <th><input class="form-control" type="text" name="nonConformanceReport[0][action_taken]"></th>
                            <th><input class="form-control" type="text" name="nonConformanceReport[0][responsible_implementation]"></th>
                            <th><input class="form-control" type="text" name="nonConformanceReport[0][implementation_scheme]"></th>
                            <th><input class="form-control" type="text" name="nonConformanceReport[0][follow_implementation]"></th>
                            <th><input class="form-control" type="text" name="nonConformanceReport[0][notes]"></th>

                        </tr>
                        <tr class="datatable-row datatable-row-even">
                            <td class="text-center end-td " id="increment">
                              <button type="button" class="btn btn-primary add_new" id="btn-0" onclick="appendRow(0)"><i
                                  class="fa fa-plus-circle"></i></button>
                            </td>
                        </tr>
                        @endif
                    </table>
                </div>
            </div>
        </div>
        <hr class="w-100">
        @if ($nonConformanceReport->status == 'confirmed' && Auth::user()->hasRole('Employee'))
        <div class="" style="text-align:center ;">
            <h2 for="" class="" style="text-align:center;font-size:large;font-weight: bolder;">@lang('main.prepare')</h2>
        </div>
        <div class="form-group row text-left col-12" >
            <label for="" class="col-2 col-form-label">@lang('main.name') :-</label>
            <div class="col-4">
                <input type="text" class="form-control" readonly placeholder="  ......" name="name" value="{{$nonConformanceReport->name}}">
            </div>
            <label for="" class="col-2 col-form-label">@lang('main.job') :-</label>
            <div class="col-4">
                <input type="text" class="form-control" readonly placeholder="  ......" name="employee" value="{{$nonConformanceReport->employee}}">
            </div>
        </div>
        <hr class="w-100">
        @endif
        @if ($nonConformanceReport->status == 'confirmed' && Auth::user()->hasRole('Admin'))
        <div class="" style="text-align:center ;">
            <h2 for="" class="" style="text-align:center;font-size:large;font-weight: bolder;">@lang('main.prepare')</h2>
        </div>
        <div class="form-group row text-left col-12" >
            <label for="" class="col-2 col-form-label">@lang('main.name')  :-</label>
            <div class="col-4">
                <input type="text" class="form-control" readonly placeholder="  ......" name="name" value="{{$nonConformanceReport->name}}">
            </div>
            <label for="" class="col-2 col-form-label">@lang('main.job') :-</label>
            <div class="col-4">
                <input type="text" class="form-control" readonly placeholder="  ......" name="employee" value="{{$nonConformanceReport->employee}}">
            </div>
        </div>
        <hr class="w-100">
        @endif
        @if (Auth::user()->hasRole('SuperAdmin'))
                        <div class="" style="text-align:center ;">
                            <h2 for="" class="" style="text-align:center;font-size:large;font-weight: bolder;">@lang('main.prepare')</h2>
                        </div>
                        <div class="form-group row text-left col-12" >
                            <label for="" class="col-2 col-form-label">@lang('main.name') :-</label>
                            <div class="col-4">
                                <input type="text" class="form-control" placeholder="  ......" name="name" value="{{$nonConformanceReport->name}}">
                            </div>
                            <label for="" class="col-2 col-form-label">@lang('main.job') :-</label>
                            <div class="col-4">
                                <input type="text" class="form-control" placeholder="  ......" name="employee" value="{{$nonConformanceReport->employee}}">
                            </div>
                        </div>
                        <hr class="w-100">
                    @endif
                       

                        <table class="table">
                            <thead>
                                <tr>
                                    <th>
                                        <div class="" style="text-align:start ;">
                                            <label>@lang('main.Company Name')</label>
                                            <input class="form-control" type="text" name="company_name"  value="{{ $nonConformanceReport->company_name}}">
                                        </div>
                
                                    </th>
                                    <th>
                                        <div class="" style="text-align:start ;">
                                            <label>@lang('main.release_date') </label>
                                            <input class="form-control" type="text" name="date2"  onfocus="(this.type='date')" onblur="(this.type='text')" value="{{ $nonConformanceReport->date2}}">
                                        </div>
                
                                    </th>
                                    <th>
                                        <div class="" style="text-align:start ;">
                                            <label>@lang('main.Modification date')</label>
                                            <input class="form-control" type="text" name="date3"  onfocus="(this.type='date')" onblur="(this.type='text')" value="{{ $nonConformanceReport->date3}}">
                                        </div>
                
                                    </th>
                                    <th>
                            <div class="" style="text-align:start ;">
                                <label>@lang('main.model_period')</label>
                                <input class="form-control shadow-lg" type="text" name="period_time" value="{{ $nonConformanceReport->period_time }}">
                            </div>

                        </th>
                        <th>
                            <div class="" style="text-align:start ;">
                                <label>@lang('main.page_number')</label>
                                <input class="form-control shadow-lg" type="text" name="number_page" value="{{ $nonConformanceReport->number_page }}">
                            </div>

                        </th>
                        <th>
                            <div class="" style="text-align:start ;">
                                <label>@lang('main.document_code')</label>
                                <input class="form-control shadow-lg" type="text" name="number_doc" value="{{ $nonConformanceReport->number_doc }}">
                            </div>
                        </th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                    @if ($nonConformanceReport->status == 'pending' && Auth::user()->hasRole('Employee'))
                    <div class="form-group">
                        <button style="border-radius:20px;margin: 50px; width:10% ; height: 5%;" type="submit"
                            class="btn btn-primary"><i class="fas fa-save" style="width:15% ; height: 20%;">@lang('main.edit')
                            </i></button>
                    </div>
                @elseif(($nonConformanceReport->status == 'inProgress' && Auth::user()->hasRole('Admin')) ||
                    ($nonConformanceReport->status == 'pending' && Auth::user()->hasRole('Admin')))
                    <div class="form-group">
                        <button style="border-radius:20px;margin: 50px; width:10% ; height: 5%;" type="submit"
                            class="btn btn-primary"><i class="fas fa-save" style="width:15% ; height: 20%;">@lang('main.edit')
                            </i></button>
                    </div>
                @elseif(($nonConformanceReport->status == 'inProgress' && Auth::user()->hasRole('SuperAdmin')) ||
                    ($nonConformanceReport->status == 'pending' && Auth::user()->hasRole('SuperAdmin')) ||
                    ($nonConformanceReport->status == 'confirmed' && Auth::user()->hasRole('SuperAdmin')))
                    <div class="form-group">
                        <button style="border-radius:20px;margin: 50px; width:10% ; height: 5%;" type="submit"
                            class="btn btn-primary"><i class="fas fa-save" style="width:15% ; height: 20%;">@lang('main.edit')
                            </i></button>
                    </div>
                @endif
                </form>
    </div>

    <script>
        function appendRow(num) {
                          $new_number = parseInt(num) + 1;
                          $appended_text = ` <tr class="datatable-row datatable-row-even" id="nonConformanceReport-${$new_number}">
                                             
                                                <td class="text-center end-td ">
                                                            <button type="button" title="Remove" onclick="removeRow(${$new_number})"
                                                                    class="btn btn-danger btn-option">
                                                                    <i class="fa fa-minus-circle"></i>
                                                            </button>
                                                </td>
                                                <th><input class="form-control" type="date" name="nonConformanceReport[0][date_1]"></th>
                            <th><input class="form-control" type="text" name="nonConformanceReport[${$new_number}][management]"></th>
                            <th><input class="form-control" type="text" name="nonConformanceReport[${$new_number}][description]"></th>
                            <th><input class="form-control" type="text" name="nonConformanceReport[${$new_number}][action_taken]"></th>
                            <th><input class="form-control" type="text" name="nonConformanceReport[${$new_number}][responsible_implementation]"></th>
                            <th><input class="form-control" type="text" name="nonConformanceReport[${$new_number}][implementation_scheme]"></th>
                            <th><input class="form-control" type="text" name="nonConformanceReport[${$new_number}][follow_implementation]"></th>
                            <th><input class="form-control" type="text" name="nonConformanceReport[${$new_number}][notes]"></th>
              
                                            </tr>`;
                                            $($appended_text).insertAfter(`#nonConformanceReport-${num}`);
                      if (!document.getElementById(`nonConformanceReport-${num}`)) {
                                $($appended_text).insertAfter(`#nonConformanceReport-0`);
                      }
  
                      $(`#btn-${num}`).remove();
                      $("#increment").append(`<button type="button" class="btn btn-primary add_new" id="btn-${$new_number}" onclick="appendRow(${$new_number})"><i class="fa fa-plus-circle"></i></button></td>`);
  
  
      
                }
      
                function removeRow(num, id) {
        if (id != 0) {
            $("#nonConformanceReport-0").append(`<input type="hidden" name="ids[${num}]" value="${id}">`);
        }
        $(`#nonConformanceReport-${num}`).remove();

    }
      </script>
    
    <style>
        <style>
            .table thead th {
                vertical-align: bottom;
                border-bottom: 2px solid black;
            }
            
            table,
            th,
            td,
            tr {
                border: 1px solid black;
                border-bottom: 2px solid black;
                border-top: 2px solid black;
            }
        
            #mainDiv {
                height: 150px;
                width: 50px;
                background: #ffffff;
                border: 1px solid rgb(8, 2, 2);
                text-align: center;
                float:left;
                display: inline-table;
            }
        </style>
        @stop