@extends('layouts.print')

@section('content')


    <div class="card">
<div class="card-body">
            <div style="" class="w-100 text-center my-4">
                <h2> سجل تحليل لشكاوي العملاء</h2>
                <hr class="w-100">
            </div>
            <div>
                <img src="{{ asset($recordAnalysis->logo) }}" style="float: left;" width="100px"
                    height="50px" />
      
            </div>
            <div class="form-group row ">
                <div class="col-6">
                    <label for="" class="col-3 col-form-label">لعام:</label>
              {{$recordAnalysis->year}}
                </div>
            </div>
            <div class="form-group row ">
                <div class="col-6">
                    <label for="" class="col-3 col-form-label"> التاريخ:</label>
                    {{$recordAnalysis->date_1}}
                </div>
            </div>
            <hr class="w-100">

            <div class="form-group row w-100 text-right" style="text-align:center;">
                <div style="overflow-x:auto;">
                    <table class="table">
                        <tr style="background-color:rgb(236, 249, 156); text-align:center;">
                     
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
                        <tr style="background-color:rgb(236, 249, 156); text-align:center;">
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
                        <tr style="background-color:rgb(236, 249, 156); text-align:center;">
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
                            <th><input class="form-control"  style="width: 180px" type="text" name="recordAnalysis[{{$key}}][area]" value="{{$data->area}}"></th>
                            <th><input class="form-control" style="width: 180px" type="text" name="recordAnalysis[{{$key}}][customer]" value="{{$data->customer}}"></th>
                            <th><input type="checkbox" value="1" name="recordAnalysis[{{$key}}][yes_1]" {{$recordAnalysis->recordAnalysis[$key]->yes_1=="1"? 'checked':'' }} <?php if ( $recordAnalysis->recordAnalysis[$key]->yes_1 == '1') {
                                echo 'checked="checked"';
                            } ?>/>&nbsp;</th>
                            <th><input type="checkbox" value="1" name="recordAnalysis[{{$key}}][no_1]" {{$recordAnalysis->recordAnalysis[$key]->no_1=="1"? 'checked':'' }} <?php if ( $recordAnalysis->recordAnalysis[$key]->no_1 == '1') {
                                echo 'checked="checked"';
                            } ?>/>&nbsp;</th>
                            <th><input type="checkbox" value="1" name="recordAnalysis[{{$key}}][yes_2]" {{$recordAnalysis->recordAnalysis[$key]->yes_2=="1"? 'checked':'' }} <?php if ( $recordAnalysis->recordAnalysis[$key]->yes_2 == '1') {
                                echo 'checked="checked"';
                            } ?> />&nbsp;</th>
                            <th><input type="checkbox" value="1" name="recordAnalysis[{{$key}}][no_2]" {{$recordAnalysis->recordAnalysis[$key]->no_2=="1"? 'checked':'' }} <?php if ( $recordAnalysis->recordAnalysis[$key]->no_2 == '1') {
                                echo 'checked="checked"';
                            } ?> />&nbsp;</th>
                            <th><input type="checkbox" value="1" name="recordAnalysis[{{$key}}][yes_3]" {{$recordAnalysis->recordAnalysis[$key]->yes_3=="1"? 'checked':'' }} <?php if ( $recordAnalysis->recordAnalysis[$key]->yes_3 == '1') {
                                echo 'checked="checked"';
                            } ?>/>&nbsp;</th>
                            <th><input type="checkbox" value="1" name="recordAnalysis[{{$key}}][no_3]" {{$recordAnalysis->recordAnalysis[$key]->no_3=="1"? 'checked':'' }} <?php if ( $recordAnalysis->recordAnalysis[$key]->no_3 == '1') {
                                echo 'checked="checked"';
                            } ?>/>&nbsp;</th>
                            <th><input type="checkbox" value="1" name="recordAnalysis[{{$key}}][yes_4]" {{$recordAnalysis->recordAnalysis[$key]->yes_4=="1"? 'checked':'' }} <?php if ( $recordAnalysis->recordAnalysis[$key]->yes_4 == '1') {
                                echo 'checked="checked"';
                            } ?>/>&nbsp;</th>
                            <th><input type="checkbox" value="1" name="recordAnalysis[{{$key}}][no_4]" {{$recordAnalysis->recordAnalysis[$key]->no_4=="1"? 'checked':'' }} <?php if ( $recordAnalysis->recordAnalysis[$key]->no_4 == '1') {
                                echo 'checked="checked"';
                            } ?>/>&nbsp;</th>
                            <th><input type="checkbox" value="1" name="recordAnalysis[{{$key}}][GG_1]" {{$recordAnalysis->recordAnalysis[$key]->GG_1=="1"? 'checked':'' }} <?php if ( $recordAnalysis->recordAnalysis[$key]->GG_1 == '1') {
                                echo 'checked="checked"';
                            } ?>/>&nbsp;</th>
                            <th><input type="checkbox" value="1" name="recordAnalysis[{{$key}}][G_1]" {{$recordAnalysis->recordAnalysis[$key]->G_1=="1"? 'checked':'' }} <?php if ( $recordAnalysis->recordAnalysis[$key]->G_1 == '1') {
                                echo 'checked="checked"';
                            } ?>/>&nbsp;</th>
                            <th><input type="checkbox" value="1" name="recordAnalysis[{{$key}}][M_1]"  {{$recordAnalysis->recordAnalysis[$key]->M_1=="1"? 'checked':'' }} <?php if ( $recordAnalysis->recordAnalysis[$key]->M_1 == '1') {
                                echo 'checked="checked"';
                            } ?>/>&nbsp;</th>
                            <th><input type="checkbox" value="1" name="recordAnalysis[{{$key}}][GG_2]"  {{$recordAnalysis->recordAnalysis[$key]->GG_2=="1"? 'checked':'' }} <?php if ( $recordAnalysis->recordAnalysis[$key]->GG_2 == '1') {
                                echo 'checked="checked"';
                            } ?>/>&nbsp;</th>
                            <th><input type="checkbox" value="1" name="recordAnalysis[{{$key}}][G_2]"  {{$recordAnalysis->recordAnalysis[$key]->G_2=="1"? 'checked':'' }} <?php if ( $recordAnalysis->recordAnalysis[$key]->G_2 == '1') {
                                echo 'checked="checked"';
                            } ?>/>&nbsp;</th>
                            <th><input type="checkbox" value="1" name="recordAnalysis[{{$key}}][M_2]"  {{$recordAnalysis->recordAnalysis[$key]->M_2=="1"? 'checked':'' }} <?php if ( $recordAnalysis->recordAnalysis[$key]->M_2 == '1') {
                                echo 'checked="checked"';
                            } ?>/>&nbsp;</th>
                            <th><input type="checkbox" value="1" name="recordAnalysis[{{$key}}][GG_3]"  {{$recordAnalysis->recordAnalysis[$key]->GG_3=="1"? 'checked':'' }} <?php if ( $recordAnalysis->recordAnalysis[$key]->GG_3 == '1') {
                                echo 'checked="checked"';
                            } ?>/>&nbsp;</th>
                            <th><input type="checkbox" value="1" name="recordAnalysis[{{$key}}][G_3]"  {{$recordAnalysis->recordAnalysis[$key]->G_3=="1"? 'checked':'' }} <?php if ( $recordAnalysis->recordAnalysis[$key]->G_3 == '1') {
                                echo 'checked="checked"';
                            } ?>/>&nbsp;</th>
                            <th><input type="checkbox" value="1" name="recordAnalysis[{{$key}}][M_3]"  {{$recordAnalysis->recordAnalysis[$key]->M_3=="1"? 'checked':'' }} <?php if ( $recordAnalysis->recordAnalysis[$key]->M_3 == '1') {
                                echo 'checked="checked"';
                            } ?>/>&nbsp;</th>
                            <th><input type="checkbox" value="1" name="recordAnalysis[{{$key}}][GG_4]"  {{$recordAnalysis->recordAnalysis[$key]->GG_4=="1"? 'checked':'' }} <?php if ( $recordAnalysis->recordAnalysis[$key]->GG_4 == '1') {
                                echo 'checked="checked"';
                            } ?>/>&nbsp;</th>
                            <th><input type="checkbox" value="1" name="recordAnalysis[{{$key}}][G_4]"  {{$recordAnalysis->recordAnalysis[$key]->G_4=="1"? 'checked':'' }} <?php if ( $recordAnalysis->recordAnalysis[$key]->G_4 == '1') {
                                echo 'checked="checked"';
                            } ?>/>&nbsp;</th>
                            <th><input type="checkbox" value="1" name="recordAnalysis[{{$key}}][M_4]"  {{$recordAnalysis->recordAnalysis[$key]->M_4=="1"? 'checked':'' }} <?php if ( $recordAnalysis->recordAnalysis[$key]->M_4 == '1') {
                                echo 'checked="checked"';
                            } ?>/>&nbsp;</th>
                            <th><input type="checkbox" value="1" name="recordAnalysis[{{$key}}][GG_5]"  {{$recordAnalysis->recordAnalysis[$key]->GG_5=="1"? 'checked':'' }} <?php if ( $recordAnalysis->recordAnalysis[$key]->GG_5 == '1') {
                                echo 'checked="checked"';
                            } ?>/>&nbsp;</th>
                            <th><input type="checkbox" value="1" name="recordAnalysis[{{$key}}][G_5]"  {{$recordAnalysis->recordAnalysis[$key]->G_5=="1"? 'checked':'' }} <?php if ( $recordAnalysis->recordAnalysis[$key]->G_5 == '1') {
                                echo 'checked="checked"';
                            } ?>/>&nbsp;</th>
                            <th><input type="checkbox" value="1" name="recordAnalysis[{{$key}}][M_5]"  {{$recordAnalysis->recordAnalysis[$key]->M_5=="1"? 'checked':'' }} <?php if ( $recordAnalysis->recordAnalysis[$key]->M_5 == '1') {
                                echo 'checked="checked"';
                            } ?>/>&nbsp;</th>
                            <th><input type="checkbox" value="1" name="recordAnalysis[{{$key}}][GG_6]"  {{$recordAnalysis->recordAnalysis[$key]->GG_6=="1"? 'checked':'' }} <?php if ( $recordAnalysis->recordAnalysis[$key]->GG_6 == '1') {
                                echo 'checked="checked"';
                            } ?>/>&nbsp;</th>
                            <th><input type="checkbox" value="1" name="recordAnalysis[{{$key}}][G_6]"  {{$recordAnalysis->recordAnalysis[$key]->G_6=="1"? 'checked':'' }} <?php if ( $recordAnalysis->recordAnalysis[$key]->G_6 == '1') {
                                echo 'checked="checked"';
                            } ?>/>&nbsp;</th>
                            <th><input type="checkbox" value="1" name="recordAnalysis[{{$key}}][M_6]"  {{$recordAnalysis->recordAnalysis[$key]->M_6=="1"? 'checked':'' }} <?php if ( $recordAnalysis->recordAnalysis[$key]->M_6 == '1') {
                                echo 'checked="checked"';
                            } ?>/>&nbsp;</th>
                            <th><input class="form-control" style="width: 90px" type="text" name="recordAnalysis[{{$key}}][percentage]" value="{{$data->percentage}}"></th>
                        </tr>
                        @endforeach

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
                                <div class="col-6">
                                    <label for="" class="col-3 col-form-label">الاسم: -</label>
                                    {{$recordAnalysis->name_1}}
                                </div>
                            </div>
                            <div class="form-group row w-10 text-right">
                                <div class="col-6">
                                    <label for="" class="col-3 col-form-label">التاريخ: -</label>
                                  {{$recordAnalysis->date_2}}
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
                                <div class="col-6">
                                    <label for="" class="col-3 col-form-label">الاسم: -</label>
                                   {{$recordAnalysis->name_1}}
                                </div>
                            </div>
                            <div class="form-group row w-10 text-right">
                                <div class="col-6">
                                    <label for="" class="col-3 col-form-label">التاريخ: -</label>
                                    {{$recordAnalysis->date_2}}
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
                       {{ $recordAnalysis->company_name }}
                      </div>
            
                    </th>
                    <th>
                      <div class="" style="text-align:start ;">
                        {{ $recordAnalysis->date2 }}
                      </div>
            
                    </th>
                    <th>
                        <div class="" style="text-align:start ;">
                         {{ $recordAnalysis->date3 }}
                          </div>
            
                    </th>
                    <th>
                      <div class="" style="text-align:start ;">
                            <label for="" class="" style="text-align: center;font-size:large;font-weight: bolder;"> مدة الحفظ :
                                سنتان </label>
                      </div>
            
                    </th>
                    <th>
                      <div class="" style="text-align:start ;">
                        <label for="" class="" style="text-align: center;font-size:large;font-weight: bolder;"> رقم الصفحة : 1 /
                          1</label>
                      </div>
                    </th>
                    <th>
                      <div class="" style="text-align:start ;">
                        <label for="" class="" style="text-align: center;font-size:large;font-weight: bolder;"> رقم الوثيقة : QA – F
                          - 13 </label>
                      </div>
                    </th>
                  </tr>
            </thead>
        </table>

    </div>

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
            float: left;
            display: inline-table;
        }

    </style>
    <script>
  window.addEventListener("load", window.print());
</script>
@stop
