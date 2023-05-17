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
<div class="card" style='margin:auto;'>
    <div class="card-body row" style=';margin-top:80px'>

        <form action="{{ route('recordAnalysis.update',$recordAnalysis->id)}}" class='col-md-10' style='margin:auto' method="post" enctype="multipart/form-data" id="fo1">
            @method('PUT') 
                  {{ csrf_field() }}
            <div style="" class="w-100 text-center my-4">
                <h2> سجل تحليل لشكاوي العملاء</h2>
                <hr class="w-100">
            </div>
            <div class='row mt-4 mb-3 '>
                <label class="form-label col-md-3 ">CO LOGO</label>
              
                    @if ($recordAnalysis->status == 'pending' && Auth::user()->hasRole('Employee'))
                <input type="file" id="img" name="logo" accept="image/*">
            @endif

            @if (($recordAnalysis->status == 'inProgress' && Auth::user()->hasRole('Admin')) ||
                ($recordAnalysis->status == 'pending' && Auth::user()->hasRole('Admin')))
                <input type="file" id="img" name="logo" accept="image/*">
            @endif
            @if (($recordAnalysis->status == 'inProgress' && Auth::user()->hasRole('SuperAdmin')) ||
                ($recordAnalysis->status == 'pending' && Auth::user()->hasRole('SuperAdmin')) ||
                ($recordAnalysis->status == 'confirmed' && Auth::user()->hasRole('SuperAdmin')))
                <input type="file" id="img" name="logo" accept="image/*">
                <img src="{{ asset($recordAnalysis->logo) }}" height=100px width=100px; />
          
            @endif
            </div>
            <div class="form-group row ">
                <label for="" class="col-3 col-form-label">لعام:</label>
                <div class="col-6">
                    <input type="text" class="form-control" name="year" value="{{$recordAnalysis->year}}">
                </div>
            </div>
            <div class="form-group row ">
                <label for="" class="col-3 col-form-label"> التاريخ:</label>
                <div class="col-6">
                    <input type="date" class="form-control" name="date_1" value="{{$recordAnalysis->date_1}}">
                </div>
            </div>
            <hr class="w-100">

            <div class="form-group row w-100 text-right" style="text-align:center;">
                <div style="overflow-x:auto;">
                    <table class="table">
                        <tr style="background-color:#001635;color:white; text-align:center;">
                            @if ($recordAnalysis->status == 'pending' && Auth::user()->hasRole('Employee'))
                            <th scope="col" rowspan="3">م</th>
                        @endif
                        @if (($recordAnalysis->status == 'inProgress' && Auth::user()->hasRole('Admin')) ||
                            ($recordAnalysis->status == 'pending' && Auth::user()->hasRole('Admin')))
                            <th scope="col" rowspan="3">م</th>
                        @endif
                        @if (($recordAnalysis->status == 'inProgress' && Auth::user()->hasRole('SuperAdmin')) ||
                            ($recordAnalysis->status == 'pending' && Auth::user()->hasRole('SuperAdmin')) ||
                            ($recordAnalysis->status == 'confirmed' && Auth::user()->hasRole('SuperAdmin')))
                            <th scope="col" rowspan="3">م</th>
                        @endif
                            <th style="width:70 ;" scope="col" rowspan="3">المنطقة</th>
                            <th style="width:70 ;" scope="col" rowspan="3">اسم العميل</th>
                            <th style="width:30 ;" scope="col" colspan="2">1 </th>
                            <th style="width:30 ;" scope="col" colspan="2">2 </th>
                            <th style="width:30 ;" scope="col" colspan="2">3 </th>
                            <th style="width:30 ;" scope="col" colspan="2">4 </th>
                            <th style="width:90 ;" scope="col" colspan="3">5/1 </th>
                            <th style="width:90 ;" scope="col" colspan="3">5/2 </th>
                            <th style="width:90 ;" scope="col" colspan="3">5/3 </th>
                            <th style="width:90 ;" scope="col" colspan="3">5/4 </th>
                            <th style="width:90 ;" scope="col" colspan="3">5/5 </th>
                            <th style="width:90 ;" scope="col" colspan="3">5/6 </th>
                            <th style="width:100;" scope="col" rowspan="3">النسبة المئوية</th>
                        </tr>
                        <tr style="background-color:#001635;color:white; text-align:center;">
                            <th scope="col" colspan="1"> نعم</th>
                            <th scope="col" colspan="1">لا</th>
                            <th scope="col" colspan="1"> نعم</th>
                            <th scope="col" colspan="1">لا</th>
                            <th scope="col" colspan="1"> نعم</th>
                            <th scope="col" colspan="1">لا</th>
                            <th scope="col" colspan="1"> نعم</th>
                            <th scope="col" colspan="1">لا</th>
                            <th scope="col" colspan="1">جج</th>
                            <th scope="col" colspan="1"> ج</th>
                            <th scope="col" colspan="1">م</th>
                            <th scope="col" colspan="1">جج</th>
                            <th scope="col" colspan="1"> ج</th>
                            <th scope="col" colspan="1">م</th>
                            <th scope="col" colspan="1">جج</th>
                            <th scope="col" colspan="1"> ج</th>
                            <th scope="col" colspan="1">م</th>
                            <th scope="col" colspan="1">جج</th>
                            <th scope="col" colspan="1"> ج</th>
                            <th scope="col" colspan="1">م</th>
                            <th scope="col" colspan="1">جج</th>
                            <th scope="col" colspan="1"> ج</th>
                            <th scope="col" colspan="1">م</th>
                            <th scope="col" colspan="1">جج</th>
                            <th scope="col" colspan="1"> ج</th>
                            <th scope="col" colspan="1">م</th>
                        </tr>
                        <tr style="background-color:#001635;color:white; text-align:center;">
                            <th scope="col" rowspan="1"> 10</th>
                            <th scope="col" rowspan="1">صفر</th>
                            <th scope="col" rowspan="1"> 10</th>
                            <th scope="col" rowspan="1">صفر</th>
                            <th scope="col" rowspan="1"> 10</th>
                            <th scope="col" rowspan="1">صفر</th>
                            <th scope="col" rowspan="1"> 10</th>
                            <th scope="col" rowspan="1">صفر</th>
                            <th scope="col" rowspan="1">9</th>
                            <th scope="col" rowspan="1"> 7</th>
                            <th scope="col" rowspan="1">5</th>
                            <th scope="col" rowspan="1">9</th>
                            <th scope="col" rowspan="1"> 7</th>
                            <th scope="col" rowspan="1">5</th>
                            <th scope="col" rowspan="1">9</th>
                            <th scope="col" rowspan="1"> 7</th>
                            <th scope="col" rowspan="1">5</th>
                            <th scope="col" rowspan="1">9</th>
                            <th scope="col" rowspan="1"> 7</th>
                            <th scope="col" rowspan="1">5</th>
                            <th scope="col" rowspan="1">9</th>
                            <th scope="col" rowspan="1"> 7</th>
                            <th scope="col" rowspan="1">5</th>
                            <th scope="col" rowspan="1">9</th>
                            <th scope="col" rowspan="1"> 7</th>
                            <th scope="col" rowspan="1">5</th>
                        </tr>
                        @if(count($recordAnalysis->recordAnalysis)>0)
                        @foreach($recordAnalysis->recordAnalysis as $key => $data)
                        <tr id="recordAnalysis-{{$key}}">
                            @if ($recordAnalysis->status == 'pending' && Auth::user()->hasRole('Employee'))
                            <td class="text-center end-td ">
                                <button type="button" title="Remove" onclick="removeRow({{$key}},{{$data->id}})"  @if ($key==0) disabled="disabled" @endif class="btn btn-danger btn-option">
                                  <i class="fa fa-minus-circle"></i>
                                </button>
                              </td>
                              @endif
                              @if (($recordAnalysis->status == 'inProgress' && Auth::user()->hasRole('Admin')) ||
                              ($recordAnalysis->status == 'pending' && Auth::user()->hasRole('Admin')))                            <td class="text-center end-td ">
                                <button type="button" title="Remove" onclick="removeRow({{$key}},{{$data->id}})"  @if ($key==0) disabled="disabled" @endif class="btn btn-danger btn-option">
                                  <i class="fa fa-minus-circle"></i>
                                </button>
                              </td>
                              @endif
                              @if (($recordAnalysis->status == 'inProgress' && Auth::user()->hasRole('SuperAdmin')) ||
                              ($recordAnalysis->status == 'pending' && Auth::user()->hasRole('SuperAdmin')) ||
                              ($recordAnalysis->status == 'confirmed' && Auth::user()->hasRole('SuperAdmin')))                            <td class="text-center end-td ">
                                <button type="button" title="Remove" onclick="removeRow({{$key}},{{$data->id}})"  @if ($key==0) disabled="disabled" @endif class="btn btn-danger btn-option">
                                  <i class="fa fa-minus-circle"></i>
                                </button>
                              </td>
                              @endif
                            <th><input class="form-control"  style="width: 180px" type="text" name="recordAnalysis[{{$key}}][area]" value="{{$data->area}}"></th>
                            <th><input class="form-control" style="width: 180px" type="text" name="recordAnalysis[{{$key}}][customer]" value="{{$data->customer}}"></th>
                            <th><input type="checkbox" value="1" name="recordAnalysis[{{$key}}][yes_1]" {{$recordAnalysis->recordAnalysis[$key]->yes_1=="1"? 'checked':'' }} />&nbsp;</th>
                            <th><input type="checkbox" value="1" name="recordAnalysis[{{$key}}][no_1]" {{$recordAnalysis->recordAnalysis[$key]->no_1=="1"? 'checked':'' }} />&nbsp;</th>
                            <th><input type="checkbox" value="1" name="recordAnalysis[{{$key}}][yes_2]" {{$recordAnalysis->recordAnalysis[$key]->yes_2=="1"? 'checked':'' }}  />&nbsp;</th>
                            <th><input type="checkbox" value="1" name="recordAnalysis[{{$key}}][no_2]" {{$recordAnalysis->recordAnalysis[$key]->no_2=="1"? 'checked':'' }} />&nbsp;</th>
                            <th><input type="checkbox" value="1" name="recordAnalysis[{{$key}}][yes_3]" {{$recordAnalysis->recordAnalysis[$key]->yes_3=="1"? 'checked':'' }} />&nbsp;</th>
                            <th><input type="checkbox" value="1" name="recordAnalysis[{{$key}}][no_3]" {{$recordAnalysis->recordAnalysis[$key]->no_3=="1"? 'checked':'' }} />&nbsp;</th>
                            <th><input type="checkbox" value="1" name="recordAnalysis[{{$key}}][yes_4]" {{$recordAnalysis->recordAnalysis[$key]->yes_4=="1"? 'checked':'' }} />&nbsp;</th>
                            <th><input type="checkbox" value="1" name="recordAnalysis[{{$key}}][no_4]" {{$recordAnalysis->recordAnalysis[$key]->no_4=="1"? 'checked':'' }} />&nbsp;</th>
                            <th><input type="checkbox" value="1" name="recordAnalysis[{{$key}}][GG_1]" {{$recordAnalysis->recordAnalysis[$key]->GG_1=="1"? 'checked':'' }} />&nbsp;</th>
                            <th><input type="checkbox" value="1" name="recordAnalysis[{{$key}}][G_1]" {{$recordAnalysis->recordAnalysis[$key]->G_1=="1"? 'checked':'' }} />&nbsp;</th>
                            <th><input type="checkbox" value="1" name="recordAnalysis[{{$key}}][M_1]"  {{$recordAnalysis->recordAnalysis[$key]->M_1=="1"? 'checked':'' }}/>&nbsp;</th>
                            <th><input type="checkbox" value="1" name="recordAnalysis[{{$key}}][GG_2]"  {{$recordAnalysis->recordAnalysis[$key]->GG_2=="1"? 'checked':'' }}/>&nbsp;</th>
                            <th><input type="checkbox" value="1" name="recordAnalysis[{{$key}}][G_2]"  {{$recordAnalysis->recordAnalysis[$key]->G_2=="1"? 'checked':'' }}/>&nbsp;</th>
                            <th><input type="checkbox" value="1" name="recordAnalysis[{{$key}}][M_2]"  {{$recordAnalysis->recordAnalysis[$key]->M_2=="1"? 'checked':'' }}/>&nbsp;</th>
                            <th><input type="checkbox" value="1" name="recordAnalysis[{{$key}}][GG_3]"  {{$recordAnalysis->recordAnalysis[$key]->GG_3=="1"? 'checked':'' }}/>&nbsp;</th>
                            <th><input type="checkbox" value="1" name="recordAnalysis[{{$key}}][G_3]"  {{$recordAnalysis->recordAnalysis[$key]->G_3=="1"? 'checked':'' }}/>&nbsp;</th>
                            <th><input type="checkbox" value="1" name="recordAnalysis[{{$key}}][M_3]"  {{$recordAnalysis->recordAnalysis[$key]->M_3=="1"? 'checked':'' }}/>&nbsp;</th>
                            <th><input type="checkbox" value="1" name="recordAnalysis[{{$key}}][GG_4]"  {{$recordAnalysis->recordAnalysis[$key]->GG_4=="1"? 'checked':'' }} />&nbsp;</th>
                            <th><input type="checkbox" value="1" name="recordAnalysis[{{$key}}][G_4]"  {{$recordAnalysis->recordAnalysis[$key]->G_4=="1"? 'checked':'' }}/>&nbsp;</th>
                            <th><input type="checkbox" value="1" name="recordAnalysis[{{$key}}][M_4]"  {{$recordAnalysis->recordAnalysis[$key]->M_4=="1"? 'checked':'' }}/>&nbsp;</th>
                            <th><input type="checkbox" value="1" name="recordAnalysis[{{$key}}][GG_5]"  {{$recordAnalysis->recordAnalysis[$key]->GG_5=="1"? 'checked':'' }}/>&nbsp;</th>
                            <th><input type="checkbox" value="1" name="recordAnalysis[{{$key}}][G_5]"  {{$recordAnalysis->recordAnalysis[$key]->G_5=="1"? 'checked':'' }}/>&nbsp;</th>
                            <th><input type="checkbox" value="1" name="recordAnalysis[{{$key}}][M_5]"  {{$recordAnalysis->recordAnalysis[$key]->M_5=="1"? 'checked':'' }}/>&nbsp;</th>
                            <th><input type="checkbox" value="1" name="recordAnalysis[{{$key}}][GG_6]"  {{$recordAnalysis->recordAnalysis[$key]->GG_6=="1"? 'checked':'' }}/>&nbsp;</th>
                            <th><input type="checkbox" value="1" name="recordAnalysis[{{$key}}][G_6]"  {{$recordAnalysis->recordAnalysis[$key]->G_6=="1"? 'checked':'' }}/>&nbsp;</th>
                            <th><input type="checkbox" value="1" name="recordAnalysis[{{$key}}][M_6]"  {{$recordAnalysis->recordAnalysis[$key]->M_6=="1"? 'checked':'' }}/>&nbsp;</th>
                            <th><input class="form-control" style="width: 90px" type="text" name="recordAnalysis[{{$key}}][percentage]" value="{{$data->percentage}}"></th>
                        </tr>
                        @endforeach
                        @if ($recordAnalysis->status == 'pending' && Auth::user()->hasRole('Employee'))
                        <tr class="datatable-row datatable-row-even">
                            <td class="text-center end-td " id="increment">
                                <button type="button" class="btn btn-primary add_new" id="btn-{{count($recordAnalysis->recordAnalysis)-1}}" onclick="appendRow({{count($recordAnalysis->recordAnalysis)-1}})"><i
                                    class="fa fa-plus-circle"></i></button>
                              </td>
                        </tr>
                        @endif
                        @if (($recordAnalysis->status == 'inProgress' && Auth::user()->hasRole('Admin')) ||
                        ($recordAnalysis->status == 'pending' && Auth::user()->hasRole('Admin')))                        <tr class="datatable-row datatable-row-even">
                            <td class="text-center end-td " id="increment">
                                <button type="button" class="btn btn-primary add_new" id="btn-{{count($recordAnalysis->recordAnalysis)-1}}" onclick="appendRow({{count($recordAnalysis->recordAnalysis)-1}})"><i
                                    class="fa fa-plus-circle"></i></button>
                              </td>
                        </tr>
                        @endif
                        @if (($recordAnalysis->status == 'inProgress' && Auth::user()->hasRole('SuperAdmin')) ||
                        ($recordAnalysis->status == 'pending' && Auth::user()->hasRole('SuperAdmin')) ||
                        ($recordAnalysis->status == 'confirmed' && Auth::user()->hasRole('SuperAdmin')))                        <tr class="datatable-row datatable-row-even">
                            <td class="text-center end-td " id="increment">
                                <button type="button" class="btn btn-primary add_new" id="btn-{{count($recordAnalysis->recordAnalysis)-1}}" onclick="appendRow({{count($recordAnalysis->recordAnalysis)-1}})"><i
                                    class="fa fa-plus-circle"></i></button>
                              </td>
                        </tr>
                        @endif
                    @else
                        <tr id="recordAnalysis-0">
                            <th class="text-center end-td ">
                                <button type="button" title="Remove" disabled="disabled" class="btn btn-danger btn-option">
                                  <i class="fa fa-minus-circle"></i>
                                </button>
                            </th>
                            <th><input class="form-control"  style="width: 180px" type="text" name="recordAnalysis[0][area]"></th>
                            <th><input class="form-control" style="width: 180px" type="text" name="recordAnalysis[0][customer]"></th>
                            <th><input type="checkbox" value="1" name="recordAnalysis[0][yes_1]"  />&nbsp;</th>
                            <th><input type="checkbox" value="1" name="recordAnalysis[0][no_1]" />&nbsp;</th>
                            <th><input type="checkbox" value="1" name="recordAnalysis[0][yes_2]" />&nbsp;</th>
                            <th><input type="checkbox" value="1" name="recordAnalysis[0][no_2]" />&nbsp;</th>
                            <th><input type="checkbox" value="1" name="recordAnalysis[0][yes_3]" />&nbsp;</th>
                            <th><input type="checkbox" value="1" name="recordAnalysis[0][no_3]" />&nbsp;</th>
                            <th><input type="checkbox" value="1" name="recordAnalysis[0][yes_4]" />&nbsp;</th>
                            <th><input type="checkbox" value="1" name="recordAnalysis[0][no_4]" />&nbsp;</th>
                            <th><input type="checkbox" value="1" name="recordAnalysis[0][GG_1]" />&nbsp;</th>
                            <th><input type="checkbox" value="1" name="recordAnalysis[0][G_1]" />&nbsp;</th>
                            <th><input type="checkbox" value="1" name="recordAnalysis[0][M_1]" />&nbsp;</th>
                            <th><input type="checkbox" value="1" name="recordAnalysis[0][GG_2]" />&nbsp;</th>
                            <th><input type="checkbox" value="1" name="recordAnalysis[0][G_2]" />&nbsp;</th>
                            <th><input type="checkbox" value="1" name="recordAnalysis[0][M_2]" />&nbsp;</th>
                            <th><input type="checkbox" value="1" name="recordAnalysis[0][GG_3]" />&nbsp;</th>
                            <th><input type="checkbox" value="1" name="recordAnalysis[0][G_3]" />&nbsp;</th>
                            <th><input type="checkbox" value="1" name="recordAnalysis[0][M_3]" />&nbsp;</th>
                            <th><input type="checkbox" value="1" name="recordAnalysis[0][GG_4]" />&nbsp;</th>
                            <th><input type="checkbox" value="1" name="recordAnalysis[0][G_4]" />&nbsp;</th>
                            <th><input type="checkbox" value="1" name="recordAnalysis[0][M_4]" />&nbsp;</th>
                            <th><input type="checkbox" value="1" name="recordAnalysis[0][GG_5]" />&nbsp;</th>
                            <th><input type="checkbox" value="1" name="recordAnalysis[0][G_5]" />&nbsp;</th>
                            <th><input type="checkbox" value="1" name="recordAnalysis[0][M_5]" />&nbsp;</th>
                            <th><input type="checkbox" value="1" name="recordAnalysis[0][GG_6]" />&nbsp;</th>
                            <th><input type="checkbox" value="1" name="recordAnalysis[0][G_6]" />&nbsp;</th>
                            <th><input type="checkbox" value="1" name="recordAnalysis[0][M_6]" />&nbsp;</th>
                            <th><input class="form-control" style="width: 90px" type="text" name="recordAnalysis[0][percentage]"></th>
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






            <table class="table">
                <thead>
                    <tr>
                        @if ($recordAnalysis->status == 'inProgress' && Auth::user()->hasRole('Employee')||$recordAnalysis->status == 'confirmed' && Auth::user()->hasRole('Employee'))
                        <hr class="w-100">

                        <th class=" w-50 text-center col-2 ">
                            <div class="" style="text-align:center ;">
                                <label for="" class=""
                                    style="text-align:center;font-size:large;font-weight: bolder;"> ممثل الإدارة
                                    الجودة:</label>
                            </div>
                            <div class="form-group row w-10 text-right">
                                <label for="" class="col-3 col-form-label">الاسم: -</label>
                                <div class="col-6">
                                    <input type="text" class="form-control" readonly placeholder="  ......" name="name_1" value="{{$recordAnalysis->name_1}}">
                                </div>
                            </div>
                            <div class="form-group row w-10 text-right">
                                <label for="" class="col-3 col-form-label">التاريخ: -</label>
                                <div class="col-6">
                                    <input type="date" class="form-control" readonly placeholder="  ......" name="date_2" value="{{$recordAnalysis->date_2}}">
                                </div>
                            </div>
                        </th>
                        @endif
                        @if (Auth::user()->hasRole('Admin') || Auth::user()->hasRole('SuperAdmin'))
                        <hr class="w-100">
                        <th class=" w-50 text-center col-2 ">
                            <div class="" style="text-align:center ;">
                                <label for="" class=""
                                    style="text-align:center;font-size:large;font-weight: bolder;"> ممثل الإدارة
                                    الجودة:</label>
                            </div>
                            <div class="form-group row w-10 text-right">
                                <label for="" class="col-3 col-form-label">الاسم: -</label>
                                <div class="col-6">
                                    <input type="text" class="form-control" placeholder="  ......" name="name_1" value="{{$recordAnalysis->name_1}}">
                                </div>
                            </div>
                            <div class="form-group row w-10 text-right">
                                <label for="" class="col-3 col-form-label">التاريخ: -</label>
                                <div class="col-6">
                                    <input type="date" class="form-control" placeholder="  ......" name="date_2" value="{{$recordAnalysis->date_2}}">
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
                      <label>اسم الشركة</label>
                        <input class="form-control" type="text" name="company_name"   value="{{ $recordAnalysis->company_name }}">
                      </div>
            
                    </th>
                    <th>
                      <div class="" style="text-align:start ;">
                      <label>تاريخ الاصدار</label>
                        <input class="form-control" type="text" name="date2"  value="{{ $recordAnalysis->date2 }}"  onfocus="(this.type='date')" onblur="(this.type='text')">
                      </div>
            
                    </th>
                    <th>
                        <div class="" style="text-align:start ;">
                        <label>تاريخ  التعديل</label>
                            <input class="form-control" type="text" name="date3"  value="{{ $recordAnalysis->date3 }}"  onfocus="(this.type='date')" onblur="(this.type='text')">
                          </div>
            
                    </th>
                     <th>
                            <div class="" style="text-align:start ;">
                                <label> مدة الحفظ </label>
                                <input class="form-control shadow-lg" type="text" name="period_time" value="{{ $recordAnalysis->period_time }}">
                            </div>

                        </th>
                        <th>
                            <div class="" style="text-align:start ;">
                                <label> رقم الصفحة </label>
                                <input class="form-control shadow-lg" type="text" name="number_page" value="{{ $recordAnalysis->number_page }}">
                            </div>

                        </th>
                        <th>
                            <div class="" style="text-align:start ;">
                                <label> رقم الوثيقة </label>
                                <input class="form-control shadow-lg" type="text" name="number_doc" value="{{ $recordAnalysis->number_doc }}">
                            </div>
                        </th>
                  </tr>
            </thead>
        </table>
        @if ($recordAnalysis->status == 'pending' && Auth::user()->hasRole('Employee'))
        <div class="form-group">
            <button style="border-radius:20px;margin: 50px; width:10% ; height: 5%;" type="submit"
                class="btn btn-primary"><i class="fas fa-save" style="width:15% ; height: 20%;">تعديل
                </i></button>
        </div>
    @elseif(($recordAnalysis->status == 'inProgress' && Auth::user()->hasRole('Admin')) ||
        ($recordAnalysis->status == 'pending' && Auth::user()->hasRole('Admin')))
        <div class="form-group">
            <button style="border-radius:20px;margin: 50px; width:10% ; height: 5%;" type="submit"
                class="btn btn-primary"><i class="fas fa-save" style="width:15% ; height: 20%;">تعديل
                </i></button>
        </div>
    @elseif(($recordAnalysis->status == 'inProgress' && Auth::user()->hasRole('SuperAdmin')) ||
        ($recordAnalysis->status == 'pending' && Auth::user()->hasRole('SuperAdmin')) ||
        ($recordAnalysis->status == 'confirmed' && Auth::user()->hasRole('SuperAdmin')))
        <div class='row'>
            <button style="border-radius:8px;margin: 50px; width:30% ;background-color: #2a415b; ;height: 5%;padding:10px;margin-right:100px;margin:auto" type="submit"
                class="btn btn-primary col-md-4">
                <i class="fas fa-save" style="width:15% ; height: 20%;"></i>حفظ</button>
                    </div>
    @endif
        </form>
    </div>

    <script>
        function appendRow(num) {
            $new_number = parseInt(num) + 1;
            $appended_text = ` <tr class="datatable-row datatable-row-even" id="recordAnalysis-${$new_number}">
                                         
                                            <td class="text-center end-td ">
                                                        <button type="button" title="Remove" onclick="removeRow(${$new_number})"
                                                                class="btn btn-danger btn-option">
                                                                <i class="fa fa-minus-circle"></i>
                                                        </button>
                                            </td>
                                            <th><input class="form-control"  style="width: 180px" type="text" name="recordAnalysis[${$new_number}][area]"></th>
                            <th><input class="form-control" style="width: 180px" type="text" name="recordAnalysis[${$new_number}][customer]"></th>
                            <th><input type="checkbox" value="1" name="recordAnalysis[${$new_number}][yes_1]"  />&nbsp;</th>
                            <th><input type="checkbox" value="1" name="recordAnalysis[${$new_number}][no_1]" />&nbsp;</th>
                            <th><input type="checkbox" value="1" name="recordAnalysis[${$new_number}][yes_2]" />&nbsp;</th>
                            <th><input type="checkbox" value="1" name="recordAnalysis[${$new_number}][no_2]" />&nbsp;</th>
                            <th><input type="checkbox" value="1" name="recordAnalysis[${$new_number}][yes_3]" />&nbsp;</th>
                            <th><input type="checkbox" value="1" name="recordAnalysis[${$new_number}][no_3]" />&nbsp;</th>
                            <th><input type="checkbox" value="1" name="recordAnalysis[${$new_number}][yes_4]" />&nbsp;</th>
                            <th><input type="checkbox" value="1" name="recordAnalysis[${$new_number}][no_4]" />&nbsp;</th>
                            <th><input type="checkbox" value="1" name="recordAnalysis[${$new_number}][GG_1]" />&nbsp;</th>
                            <th><input type="checkbox" value="1" name="recordAnalysis[${$new_number}][G_1]" />&nbsp;</th>
                            <th><input type="checkbox" value="1" name="recordAnalysis[${$new_number}][M_1]" />&nbsp;</th>
                            <th><input type="checkbox" value="1" name="recordAnalysis[${$new_number}][GG_2]" />&nbsp;</th>
                            <th><input type="checkbox" value="1" name="recordAnalysis[${$new_number}][G_2]" />&nbsp;</th>
                            <th><input type="checkbox" value="1" name="recordAnalysis[${$new_number}][M_2]" />&nbsp;</th>
                            <th><input type="checkbox" value="1" name="recordAnalysis[${$new_number}][GG_3]" />&nbsp;</th>
                            <th><input type="checkbox" value="1" name="recordAnalysis[${$new_number}][G_3]" />&nbsp;</th>
                            <th><input type="checkbox" value="1" name="recordAnalysis[${$new_number}][M_3]" />&nbsp;</th>
                            <th><input type="checkbox" value="1" name="recordAnalysis[${$new_number}][GG_4]" />&nbsp;</th>
                            <th><input type="checkbox" value="1" name="recordAnalysis[${$new_number}][G_4]" />&nbsp;</th>
                            <th><input type="checkbox" value="1" name="recordAnalysis[${$new_number}][M_4]" />&nbsp;</th>
                            <th><input type="checkbox" value="1" name="recordAnalysis[${$new_number}][GG_5]" />&nbsp;</th>
                            <th><input type="checkbox" value="1" name="recordAnalysis[${$new_number}][G_5]" />&nbsp;</th>
                            <th><input type="checkbox" value="1" name="recordAnalysis[${$new_number}][M_5]" />&nbsp;</th>
                            <th><input type="checkbox" value="1" name="recordAnalysis[${$new_number}][GG_6]" />&nbsp;</th>
                            <th><input type="checkbox" value="1" name="recordAnalysis[${$new_number}][G_6]" />&nbsp;</th>
                            <th><input type="checkbox" value="1" name="recordAnalysis[${$new_number}][M_6]" />&nbsp;</th>
                            <th><input class="form-control" style="width: 90px" type="text" name="recordAnalysis[${$new_number}][percentage]"></th>
                                        </tr>`;
            $($appended_text).insertAfter(`#recordAnalysis-${num}`);
            if (!document.getElementById(`recordAnalysis-${num}`)) {
                $($appended_text).insertAfter(`#recordAnalysis-0`);
            }

            $(`#btn-${num}`).remove();
            $("#increment").append(
                `<button type="button" class="btn btn-primary add_new" id="btn-${$new_number}" onclick="appendRow(${$new_number})"><i class="fa fa-plus-circle"></i></button></td>`
                );
        }

        function removeRow(num, id){
          if(id != 0){
             $("#recordAnalysis-0").append(`<input type="hidden" name="ids[${num}]" value="${id}">`);
          }
          $(`#recordAnalysis-${num}`).remove();
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
