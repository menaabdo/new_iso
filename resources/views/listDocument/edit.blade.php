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
<div class="card" style=''>
    <div class="card-body row" style='margin-top:80px'>


    <form action="{{route('listDocument.update',$listDocument->id)}}" method="post" class='col-md-10' style='margin:auto' enctype="multipart/form-data" id="fo1">
        @method('PUT')
        {{ csrf_field() }}
      <div style="" class="w-100 text-center my-4">
        <h2 style='text-shadow: 1px 1px 1px #3ed3ea;'>قائمة رئيسية للوثائق
        </h2>
        <hr class="w-100">
    </div>
    <div class='row mt-4 mb-3'>
        <label  class="form-label col-md-2">تاريخ</label>
        <input class="col-md-6 form-control" style="text-align: center;" type="date"  name="date_1"  value="{{ $listDocument->date_1 }}">
    </div>
    <div class='row mt-4 mb-3'>
                <label class="form-label col-md-2 ">CO LOGO</label>

            <img src="{{ asset($listDocument->logo) }}" height=180px width=210px; />
            @if ($listDocument->status == 'pending' && Auth::user()->hasRole('Employee'))

            <input type="file" id="img" name="logo" accept="image/*">
        @endif

        @if (($listDocument->status == 'inProgress' && Auth::user()->hasRole('Admin')) ||
        ($listDocument->status == 'pending' && Auth::user()->hasRole('Admin')))
            <input type="file" id="img" name="logo" accept="image/*">
        @endif
        @if (($listDocument->status == 'inProgress' && Auth::user()->hasRole('SuperAdmin')) ||
            ($listDocument->status == 'pending' && Auth::user()->hasRole('SuperAdmin')) ||
            ($listDocument->status == 'confirmed' && Auth::user()->hasRole('SuperAdmin')))
            <input type="file" id="img" name="logo" accept="image/*">
        @endif        </div>
        <div class="form-group row w-100 text-center" style="text-align:center ;">
          
        <div class='row my-4' style='overflow-x:auto'>
           
        <table class='table' style=''>
            <tr style="background-color: #001635;color:white;text-align:center">
                @if ($listDocument->status == 'pending' && Auth::user()->hasRole('Employee'))
                                <th scope="col" rowspan="2">@lang('main.m')</th>
                            @endif
                            @if (($listDocument->status == 'inProgress' && Auth::user()->hasRole('Admin')) ||
                                ($listDocument->status == 'pending' && Auth::user()->hasRole('Admin')))
                                <th scope="col" rowspan="2">@lang('main.m')</th>
                            @endif
                            @if (($listDocument->status == 'inProgress' && Auth::user()->hasRole('SuperAdmin')) ||
                                ($listDocument->status == 'pending' && Auth::user()->hasRole('SuperAdmin')) ||
                                ($listDocument->status == 'confirmed' && Auth::user()->hasRole('SuperAdmin')))
                                <th scope="col" rowspan="2">@lang('main.m')</th>
                            @endif
                            <th scope="col" rowspan="2">@lang('main.Document name')</th>
                            <th scope="col" rowspan="2">@lang('main.code')</th>
                            <th scope="col" colspan="2">@lang('main.release')</th>
                            <th scope="col" colspan="2">@lang('main.edit')</th>
                            <th scope="col" rowspan="2">@lang('main.Page Number')</th>
                            <th scope="col" colspan="12">@lang('main.The copy distribution rate (number of copies for departments) is the highest')</th>
            </tr>
            <tr style="background-color:rgb(218, 212, 250); text-align:center;">
                <th scope="col">@lang('main.num')</th>
                <th scope="col">@lang('main.date')</th>
                <th scope="col">@lang('main.num')</th>
                <th scope="col">@lang('main.date')</th>
                <th scope="col"> 1</th>
                <th scope="col">2</th>
                <th scope="col"> 3</th>
                <th scope="col">4</th>
                <th scope="col"> 5</th>
                <th scope="col">6</th>
                <th scope="col"> 7</th>
                <th scope="col">8</th>
                <th scope="col"> 9</th>
                <th scope="col">10</th>
                <th scope="col"> 11</th>
                <th scope="col">12</th>
            </tr>


            @if(count($listDocument->listDocument)>0)
            @foreach($listDocument->listDocument as $key => $intr)
            <tr id="listDocument-{{ $key }}">
                @if ($listDocument->status == 'pending' && Auth::user()->hasRole('Employee'))
                                        <td class="text-center end-td ">
                                            <button type="button" title="Remove"
                                                onclick="removeRow({{ $key }},{{ $intr->id }})"
                                                @if ($key == 0) disabled="disabled" @endif
                                                class="btn btn-danger btn-option">
                                                <i class="fa fa-minus-circle"></i>
                                            </button>
                                        </td>
                                    @endif
                                    @if (($listDocument->status == 'inProgress' && Auth::user()->hasRole('Admin')) ||
                                        ($listDocument->status == 'pending' && Auth::user()->hasRole('Admin')))
                                        <td class="text-center end-td ">
                                            <button type="button" title="Remove"
                                                onclick="removeRow({{ $key }},{{ $intr->id }})"
                                                @if ($key == 0) disabled="disabled" @endif
                                                class="btn btn-danger btn-option">
                                                <i class="fa fa-minus-circle"></i>
                                            </button>
                                        </td>
                                    @endif
                                    @if (($listDocument->status == 'inProgress' && Auth::user()->hasRole('SuperAdmin')) ||
                                        ($listDocument->status == 'pending' && Auth::user()->hasRole('SuperAdmin')) ||
                                        ($listDocument->status == 'confirmed' && Auth::user()->hasRole('SuperAdmin')))
                                        <td class="text-center end-td ">
                                            <button type="button" title="Remove"
                                                onclick="removeRow({{ $key }},{{ $intr->id }})"
                                                @if ($key == 0) disabled="disabled" @endif
                                                class="btn btn-danger btn-option">
                                                <i class="fa fa-minus-circle"></i>
                                            </button>
                                        </td>
                                    @endif
                <th><input style="width: 150px;"class="form-control" type="text" name="listDocument[{{ $key }}][document_name]"  value="{{ $intr->document_name }}"></th>
                <th><input style="width: 100px;"class="form-control" type="text" name="listDocument[{{ $key }}][code]"  value="{{ $intr->code }}"></th>
                <th><input style="width: 50px;" class="form-control" type="text"name="listDocument[{{ $key }}][num_create]"  value="{{ $intr->num_create }}"></th>
                <th><input class="form-control" type="date" name="listDocument[{{ $key }}][date_2]"  value="{{ $intr->date_2 }}"></th>
                <th><input style="width: 50px;" class="form-control" type="text" name="listDocument[{{ $key }}][num_update]"  value="{{ $intr->num_update }}"></th>
                <th><input class="form-control" type="date"name="listDocument[{{ $key }}][date_3]"  value="{{ $intr->date_3 }}"></th>
                <th><input style="width: 50px;" class="form-control" type="text" name="listDocument[{{ $key }}][page_num]"  value="{{ $intr->page_num }}"></th>
                <th><input style="width: 20px; height: 40px; " type="checkbox" name="listDocument[{{ $key }}][num_1]" value="1" {{$listDocument->listDocument[$key]->num_1=="1"? 'checked':'' }}></th>
                <th><input style="width: 20px; height: 40px; " type="checkbox" name="listDocument[{{ $key }}][num_2]" value="1" {{$listDocument->listDocument[$key]->num_2=="1"? 'checked':'' }}></th>
                <th><input style="width: 20px; height: 40px; " type="checkbox" name="listDocument[{{ $key }}][num_3]" value="1" {{$listDocument->listDocument[$key]->num_3=="1"? 'checked':'' }}></th>
                <th><input style="width: 20px; height: 40px; " type="checkbox" name="listDocument[{{ $key }}][num_4]" value="1" {{$listDocument->listDocument[$key]->num_4=="1"? 'checked':'' }}></th>
                <th><input style="width: 20px; height: 40px; " type="checkbox" name="listDocument[{{ $key }}][num_5]" value="1" {{$listDocument->listDocument[$key]->num_5=="1"? 'checked':'' }}></th>
                <th><input style="width: 20px; height: 40px; " type="checkbox" name="listDocument[{{ $key }}][num_6]" value="1" {{$listDocument->listDocument[$key]->num_6=="1"? 'checked':'' }}></th>
                <th><input style="width: 20px; height: 40px; " type="checkbox" name="listDocument[{{ $key }}][num_7]" value="1" {{$listDocument->listDocument[$key]->num_7=="1"? 'checked':'' }}></th>
                <th><input style="width: 20px; height: 40px; " type="checkbox" name="listDocument[{{ $key }}][num_8]" value="1" {{$listDocument->listDocument[$key]->num_8=="1"? 'checked':'' }}></th>
                <th><input style="width: 20px; height: 40px; " type="checkbox" name="listDocument[{{ $key }}][num_9]" value="1" {{$listDocument->listDocument[$key]->num_9=="1"? 'checked':'' }}></th>
                <th><input style="width: 20px; height: 40px; " type="checkbox" name="listDocument[{{ $key }}][num_10]" value="1" {{$listDocument->listDocument[$key]->num_10=="1"? 'checked':'' }}></th>
                <th><input style="width: 20px; height: 40px; " type="checkbox" name="listDocument[{{ $key }}][num_11]" value="1" {{$listDocument->listDocument[$key]->num_11=="1"? 'checked':'' }}></th>
                <th><input style="width: 20px; height: 40px; " type="checkbox" name="listDocument[{{ $key }}][num_12]" value="1" {{$listDocument->listDocument[$key]->num_12=="1"? 'checked':'' }}></th>

            </tr>
            @endforeach
            @if ($listDocument->status == 'pending' && Auth::user()->hasRole('Employee'))

            <tr class="datatable-row datatable-row-even"  >
                <td class="text-center end-td "  id="increment">
                    <button type="button" class="btn btn-primary add_new" id="btn-{{count($listDocument->listDocument)-1}}" onclick="appendRow({{count($listDocument->listDocument)-1}})"><i class="fa fa-plus-circle"></i></button>
                </td>
            </tr>
            @endif
            @if (($listDocument->status == 'inProgress' && Auth::user()->hasRole('Admin')) ||
            ($listDocument->status == 'pending' && Auth::user()->hasRole('Admin')))
            <tr class="datatable-row datatable-row-even"  >
                <td class="text-center end-td "  id="increment">
                    <button type="button" class="btn btn-primary add_new" id="btn-{{count($listDocument->listDocument)-1}}" onclick="appendRow({{count($listDocument->listDocument)-1}})"><i class="fa fa-plus-circle"></i></button>
                </td>
            </tr>
            @endif
            @if (($listDocument->status == 'inProgress' && Auth::user()->hasRole('SuperAdmin')) ||
            ($listDocument->status == 'pending' && Auth::user()->hasRole('SuperAdmin')) ||
            ($listDocument->status == 'confirmed' && Auth::user()->hasRole('SuperAdmin')))
            <tr class="datatable-row datatable-row-even"  >
                <td class="text-center end-td "  id="increment">
                    <button type="button" class="btn btn-primary add_new" id="btn-{{count($listDocument->listDocument)-1}}" onclick="appendRow({{count($listDocument->listDocument)-1}})"><i class="fa fa-plus-circle"></i></button>
                </td>
            </tr>
            @endif
           @else
            <tr id="listDocument-0">
                <th class="text-center end-td ">
                    <button type="button" title="Remove" disabled="disabled" class="btn btn-danger btn-option">
                        <i class="fa fa-minus-circle"></i>
                    </button>
                </th>
                <th><input style="width: 150px;"class="form-control" type="text" name="listDocument[0][document_name]"></th>
                <th><input style="width: 100px;"class="form-control" type="text" name="listDocument[0][code]"></th>
                <th><input style="width: 40px;" class="form-control" type="text"name="listDocument[0][num_create]"></th>
                <th><input class="form-control" type="date" name="listDocument[0][date_2]"></th>
                <th><input style="width: 40px;" class="form-control" type="text" name="listDocument[0][num_update]"></th>
                <th><input class="form-control" type="date"name="listDocument[0][date_3]"></th>
                <th><input style="width: 40px;" class="form-control" type="text" name="listDocument[0][page_num]"></th>
                <th><input style="width: 20px; height: 40px; " type="checkbox" name="listDocument[0][num_1]" value="1"></th>
                <th><input style="width: 20px; height: 40px; " type="checkbox" name="listDocument[0][num_2]" value="1"></th>
                <th><input style="width: 20px; height: 40px; " type="checkbox" name="listDocument[0][num_3]" value="1"></th>
                <th><input style="width: 20px; height: 40px; " type="checkbox" name="listDocument[0][num_4]" value="1"></th>
                <th><input style="width: 20px; height: 40px; " type="checkbox" name="listDocument[0][num_5]" value="1"></th>
                <th><input style="width: 20px; height: 40px; " type="checkbox" name="listDocument[0][num_6]" value="1"></th>
                <th><input style="width: 20px; height: 40px; " type="checkbox" name="listDocument[0][num_7]" value="1"></th>
                <th><input style="width: 20px; height: 40px; " type="checkbox" name="listDocument[0][num_8]" value="1"></th>
                <th><input style="width: 20px; height: 40px; " type="checkbox" name="listDocument[0][num_9]" value="1"></th>
                <th><input style="width: 20px; height: 40px; " type="checkbox" name="listDocument[0][num_10]" value="1"></th>
                <th><input style="width: 20px; height: 40px; " type="checkbox" name="listDocument[0][num_11]" value="1"></th>
                <th><input style="width: 20px; height: 40px; " type="checkbox" name="listDocument[0][num_12]" value="1"></th>

            </tr>
            <tr class="datatable-row datatable-row-even">
                <td class="text-center end-td " id="increment">
                    <button type="button" class="btn btn-primary add_new" id="btn-0" onclick="appendRow(0)"><i class="fa fa-plus-circle"></i></button>
                </td>
            </tr>
            @endif
        </table>
        </div>
        </div>
        <table class="table">
            <thead>
                <tr>
                    @if ($listDocument->status == 'inProgress' && Auth::user()->hasRole('Employee'))
                        <th class=" text-center col-2 ">
                            <div class="" style="text-align:center ;">
                                <label for="" class=""
                                    style="text-align:center;font-size:large;font-weight: bolder;">@lang('main.prepare')</label>
                            </div>
                            <div class="form-group row w-10 text-right">
                                <label for="" class="col-3 col-form-label">@lang('main.name'): -</label>
                                <div class="col-6">
                                    <input type="text" class="form-control" readonly placeholder="  ......"
                                        name="name_1" value="{{ $listDocument->name_1 }}">
                                </div>
                            </div>
                            <div class="form-group row w-10 text-right">
                                <label for="" class="col-3 col-form-label">@lang('main.job'): -</label>
                                <div class="col-6">
                                    <input type="text" class="form-control" readonly placeholder="  ......"
                                        name="job_1" value="{{ $listDocument->job_1 }}">
                                </div>
                            </div>

                        </th>
                    @endif
                    @if ($listDocument->status == 'confirmed' && Auth::user()->hasRole('Employee'))
                        <th class=" text-center col-2 ">
                            <div class="" style="text-align:center ;">
                                <label for="" class=""
                                    style="text-align:center;font-size:large;font-weight: bolder;">@lang('main.prepare')</label>
                            </div>
                            <div class="form-group row w-10 text-right">
                                <label for="" class="col-3 col-form-label">@lang('main.name'): -</label>
                                <div class="col-6">
                                    <input type="text" class="form-control" readonly placeholder="  ......"
                                        name="name_1" value="{{ $listDocument->name_1 }}">
                                </div>
                            </div>
                            <div class="form-group row w-10 text-right">
                                <label for="" class="col-3 col-form-label">@lang('main.job'): -</label>
                                <div class="col-6">
                                    <input type="text" class="form-control" readonly placeholder="  ......"
                                        name="job_1" value="{{ $listDocument->job_1 }}">
                                </div>
                            </div>

                        </th>
                        <th class="  text-center col-2 ">
                            <div class="" style="text-align:center ;">
                                <label for="" class=""
                                    style="text-align:center;font-size:large;font-weight: bolder;">@lang('main.approval')</label>
                            </div>
                            <div class="form-group row w-10 text-right">
                                <label for="" class="col-3 col-form-label">@lang('main.name'): -</label>
                                <div class="col-6">
                                    <input type="text" class="form-control" readonly placeholder="  ......"
                                        name="name_2" value="{{ $listDocument->name_2 }}">
                                </div>
                            </div>
                            <div class="form-group row w-10 text-right">
                                <label for="" class="col-3 col-form-label">@lang('main.job'): -</label>
                                <div class="col-6">
                                    <input type="text" class="form-control" readonly placeholder="  ......"
                                        name="job_2" value="{{ $listDocument->job_2 }}">
                                </div>
                            </div>

                        </th>
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
                                        name="name_1" value="{{ $listDocument->name_1 }}">
                                </div>
                            </div>
                            <div class="form-group row w-10 text-right">
                                <label for="" class="col-3 col-form-label">@lang('main.job'): -</label>
                                <div class="col-6">
                                    <input type="text" class="form-control" placeholder="  ......"
                                        name="job_1" value="{{ $listDocument->job_1 }}">
                                </div>
                            </div>

                        </th>
                        @if ($listDocument->status == 'confirmed' && Auth::user()->hasRole('Admin'))
                            <th class="  text-center col-2 ">
                                <div class="" style="text-align:center ;">
                                    <label for="" class=""
                                        style="text-align:center;font-size:large;font-weight: bolder;">@lang('main.approval')</label>
                                </div>
                                <div class="form-group row w-10 text-right">
                                    <label for="" class="col-3 col-form-label">@lang('main.name'): -</label>
                                    <div class="col-6">
                                        <input type="text" class="form-control" readonly
                                            placeholder="  ......" name="name_2"
                                            value="{{ $listDocument->name_2 }}">
                                    </div>
                                </div>
                                <div class="form-group row w-10 text-right">
                                    <label for="" class="col-3 col-form-label">@lang('main.job'): -</label>
                                    <div class="col-6">
                                        <input type="text" class="form-control" readonly
                                            placeholder="  ......" name="job_2"
                                            value="{{ $listDocument->job_2 }}">
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
                                <label for="" class="col-3 col-form-label">@lang('main.name'): -</label>
                                <div class="col-6">
                                    <input type="text" class="form-control" placeholder="  ......"
                                        name="name_1" value="{{ $listDocument->name_1 }}">
                                </div>
                            </div>
                            <div class="form-group row w-10 text-right">
                                <label for="" class="col-3 col-form-label">@lang('main.job'): -</label>
                                <div class="col-6">
                                    <input type="text" class="form-control" placeholder="  ......"
                                        name="job_1" value="{{ $listDocument->job_1 }}">
                                </div>
                            </div>

                        </th>
                        <th class="  text-center col-2 ">
                            <div class="" style="text-align:center ;">
                                <label for="" class=""
                                    style="text-align:center;font-size:large;font-weight: bolder;">@lang('main.approval')</label>
                            </div>
                            <div class="form-group row w-10 text-right">
                                <label for="" class="col-3 col-form-label">@lang('main.name'): -</label>
                                <div class="col-6">
                                    <input type="text" class="form-control" placeholder="  ......"
                                        name="name_2" value="{{ $listDocument->name_2 }}">
                                </div>
                            </div>
                            <div class="form-group row w-10 text-right">
                                <label for="" class="col-3 col-form-label">@lang('main.job'): -</label>
                                <div class="col-6">
                                    <input type="text" class="form-control" placeholder="  ......"
                                        name="job_2" value="{{ $listDocument->job_2 }}">
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
                        <input class="form-control" type="text" name="company_name" placeholder="اسم الشركة  :"  value="{{ $listDocument->company_name }}">
                      </div>
            
                    </th>
                    <th>
                      <div class="" style="text-align:start ;">
                        <label>@lang('main.release_date') </label>
                        <input class="form-control" type="text" name="date2"  value="{{ $listDocument->date2 }}" placeholder="تاريخ الإصدار   :" onfocus="(this.type='date')" onblur="(this.type='text')">
                      </div>
            
                    </th>
                    <th>
                        <div class="" style="text-align:start ;">
                            <label>@lang('main.Modification date')</label>
                            <input class="form-control" type="text" name="date3"  value="{{ $listDocument->date3 }}" placeholder="تاريخ التعديل :" onfocus="(this.type='date')" onblur="(this.type='text')">
                          </div>
            
                    </th>
                    <th>
                            <div class="" style="text-align:start ;">
                                <label>@lang('main.model_period')</label>
                                <input class="form-control shadow-lg" type="text" name="period_time" value="{{ $listDocument->period_time }}">
                            </div>

                        </th>
                        <th>
                            <div class="" style="text-align:start ;">
                                <label>@lang('main.page_number')</label>
                                <input class="form-control shadow-lg" type="text" name="number_page" value="{{ $listDocument->number_page }}">
                            </div>

                        </th>
                        <th>
                            <div class="" style="text-align:start ;">
                                <label>@lang('main.document_code')</label>
                                <input class="form-control shadow-lg" type="text" name="number_doc" value="{{ $listDocument->number_doc }}">
                            </div>
                        </th>
                  </tr>
            </thead>
        </table>
        
        @if ($listDocument->status == 'pending' && Auth::user()->hasRole('Employee'))
        <div class="form-group">
            <button style="border-radius:20px;margin: 50px; width:10% ; height: 5%;" type="submit"
                class="btn btn-primary"><i class="fas fa-save" style="width:15% ; height: 20%;">@lang('main.edit')
                </i></button>
        </div>
    @elseif(($listDocument->status == 'inProgress' && Auth::user()->hasRole('Admin')) ||
        ($listDocument->status == 'pending' && Auth::user()->hasRole('Admin')))
        <div class="form-group">
            <button style="border-radius:20px;margin: 50px; width:10% ; height: 5%;" type="submit"
                class="btn btn-primary"><i class="fas fa-save" style="width:15% ; height: 20%;">@lang('main.edit')
                </i></button>
        </div>
    @elseif(($listDocument->status == 'inProgress' && Auth::user()->hasRole('SuperAdmin')) ||
        ($listDocument->status == 'pending' && Auth::user()->hasRole('SuperAdmin')) ||
        ($listDocument->status == 'confirmed' && Auth::user()->hasRole('SuperAdmin')))
        <div class="row">
            <button style="border-radius:20px;margin: 50px; width:30% ; height: 5%;margin:auto" type="submit"
                class="btn btn-primary"><i class="fas fa-save" style="width:15% ; height: 20%;">@lang('main.edit')
                </i></button>
        </div>
    @endif
            </form>
        </div>
    <script>
        function appendRow(num) {
            $new_number = parseInt(num) + 1;
            $appended_text = ` <tr class="datatable-row datatable-row-even" id="listDocument-${$new_number}">
                                                 
                                                    <td class="text-center end-td ">
                                                                <button type="button" title="Remove" onclick="removeRow(${$new_number})"
                                                                        class="btn btn-danger btn-option">
                                                                        <i class="fa fa-minus-circle"></i>
                                                                </button>
                                                    </td>
                                                    <th><input style="width: 150px;"class="form-control" type="text" name="listDocument[${$new_number}][document_name]"></th>
                <th><input style="width: 100px;"class="form-control" type="text" name="listDocument[${$new_number}][code]"></th>
                <th><input style="width: 40px;" class="form-control" type="text"name="listDocument[${$new_number}][num_create]"></th>
                <th><input class="form-control" type="date" name="listDocument[${$new_number}][date_2]"></th>
                <th><input style="width: 40px;" class="form-control" type="text" name="listDocument[${$new_number}][num_update]"></th>
                <th><input class="form-control" type="date"name="listDocument[${$new_number}][date_3]"></th>
                <th><input style="width: 40px;" class="form-control" type="text" name="listDocument[${$new_number}][page_num]"></th>
                <th><input style="width: 20px; height: 40px; " type="checkbox" name="listDocument[${$new_number}][num_1]" value="1"></th>
                <th><input style="width: 20px; height: 40px; " type="checkbox" name="listDocument[${$new_number}][num_2]" value="1"></th>
                <th><input style="width: 20px; height: 40px; " type="checkbox" name="listDocument[${$new_number}][num_3]" value="1"></th>
                <th><input style="width: 20px; height: 40px; " type="checkbox" name="listDocument[${$new_number}][num_4]" value="1"></th>
                <th><input style="width: 20px; height: 40px; " type="checkbox" name="listDocument[${$new_number}][num_5]" value="1"></th>
                <th><input style="width: 20px; height: 40px; " type="checkbox" name="listDocument[${$new_number}][num_6]" value="1"></th>
                <th><input style="width: 20px; height: 40px; " type="checkbox" name="listDocument[${$new_number}][num_7]" value="1"></th>
                <th><input style="width: 20px; height: 40px; " type="checkbox" name="listDocument[${$new_number}][num_8]" value="1"></th>
                <th><input style="width: 20px; height: 40px; " type="checkbox" name="listDocument[${$new_number}][num_9]" value="1"></th>
                <th><input style="width: 20px; height: 40px; " type="checkbox" name="listDocument[${$new_number}][num_10]" value="1"></th>
                <th><input style="width: 20px; height: 40px; " type="checkbox" name="listDocument[${$new_number}][num_11]" value="1"></th>
                <th><input style="width: 20px; height: 40px; " type="checkbox" name="listDocument[${$new_number}][num_12]" value="1"></th>

               
                                                     </tr>`;
                                                     $($appended_text).insertAfter(`#listDocument-${num}`);
                          if (!document.getElementById(`listDocument-${num}`)) {
                                    $($appended_text).insertAfter(`#listDocument-0`);
                          }
      
                          $(`#btn-${num}`).remove();
                          $("#increment").append(`<button type="button" class="btn btn-primary add_new" id="btn-${$new_number}" onclick="appendRow(${$new_number})"><i class="fa fa-plus-circle"></i></button></td>`);
      
      
                }
    
        function removeRow(num, id){
              if(id != 0){
                 $("#listDocument-0").append(`<input type="hidden" name="ids[${num}]" value="${id}">`);
              }
              $(`#listDocument-${num}`).remove();
            }
    </script>
    
    <style>
        .table thead th {
            vertical-align: bottom;
            border-bottom: 2px solid black;
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
            float:left;
            display: inline-table;
        }
    </style>
    @stop