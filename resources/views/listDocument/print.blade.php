@extends('layouts.print')
@section('content')

<div class="card">
<div class="card-body">

      <div style="" class="w-100 text-center my-4">
        <h2>قائمة رئيسية للوثائق
        </h2>
        <hr class="w-100">
    </div>
    <div>
        <img src="{{ asset($listDocument->logo) }}" style="float: left;" width="100px" height="50px" />
    
    </div>
   
    <div>
        <label  class="col-1">تاريخ : </label>
       {{ $listDocument->date_1 }}
    </div>
    <br><br>
        <table >
            <tr style="background-color:rgb(218, 212, 250); text-align:center;">
                <th scope="col" rowspan="2">اسم الوثيقة</th>
                <th scope="col" rowspan="2">الكود</th>
                <th scope="col" colspan="2">إصدار</th>
                <th scope="col" colspan="2">تعديل</th>
                <th scope="col" rowspan="2">عدد الصفحات</th>
                <th scope="col" colspan="12"> معدل توزيع النسخ (رقم النسخة للأدارات) وعددها</th>
            </tr>
            <tr style="background-color:rgb(218, 212, 250); text-align:center;">
                <th scope="col"> رقم</th>
                <th scope="col">تاريخ</th>
                <th scope="col"> رقم</th>
                <th scope="col">تاريخ</th>
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
                
                <th>{{ $intr->document_name }}</th>
                <th>{{ $intr->code }}</th>
                <th>{{ $intr->num_create }}</th>
                <th>{{ $intr->date_2 }}</th>
                <th>{{ $intr->num_update }}</th>
                <th>{{ $intr->date_3 }}</th>
                <th>{{ $intr->page_num }}</th>
                <th><input style="width: 20px; height: 40px; " type="checkbox" name="listDocument[{{ $key }}][num_1]" value="1" {{$listDocument->listDocument[$key]->num_1=="1"? 'checked':'' }}
                <?php if ($listDocument->listDocument[$key]->num_1 == '1') {
                    echo 'checked="checked"';
                } ?>></th>
                <th><input style="width: 20px; height: 40px; " type="checkbox" name="listDocument[{{ $key }}][num_2]" value="1" {{$listDocument->listDocument[$key]->num_2=="1"? 'checked':'' }}
                    <?php if ($listDocument->listDocument[$key]->num_2 == '1') {
                        echo 'checked="checked"';
                    } ?>
                    ></th>
                <th><input style="width: 20px; height: 40px; " type="checkbox" name="listDocument[{{ $key }}][num_3]" value="1" {{$listDocument->listDocument[$key]->num_3=="1"? 'checked':'' }}
                    <?php if ($listDocument->listDocument[$key]->num_3 == '1') {
                        echo 'checked="checked"';
                    } ?>
                    ></th>
                <th><input style="width: 20px; height: 40px; " type="checkbox" name="listDocument[{{ $key }}][num_4]" value="1" {{$listDocument->listDocument[$key]->num_4=="1"? 'checked':'' }}
                    <?php if ($listDocument->listDocument[$key]->num_4 == '1') {
                        echo 'checked="checked"';
                    } ?>
                    ></th>
                <th><input style="width: 20px; height: 40px; " type="checkbox" name="listDocument[{{ $key }}][num_5]" value="1" {{$listDocument->listDocument[$key]->num_5=="1"? 'checked':'' }}
                    <?php if ($listDocument->listDocument[$key]->num_5 == '1') {
                        echo 'checked="checked"';
                    } ?>
                    ></th>
                <th><input style="width: 20px; height: 40px; " type="checkbox" name="listDocument[{{ $key }}][num_6]" value="1" {{$listDocument->listDocument[$key]->num_6=="1"? 'checked':'' }}
                    <?php if ($listDocument->listDocument[$key]->num_6 == '1') {
                        echo 'checked="checked"';
                    } ?>
                    ></th>
                <th><input style="width: 20px; height: 40px; " type="checkbox" name="listDocument[{{ $key }}][num_7]" value="1" {{$listDocument->listDocument[$key]->num_7=="1"? 'checked':'' }}
                    <?php if ($listDocument->listDocument[$key]->num_7 == '1') {
                        echo 'checked="checked"';
                    } ?>></th>

                <th><input style="width: 20px; height: 40px; " type="checkbox" name="listDocument[{{ $key }}][num_8]" value="1" {{$listDocument->listDocument[$key]->num_8=="1"? 'checked':'' }}
                    <?php if ($listDocument->listDocument[$key]->num_8 == '1') {
                        echo 'checked="checked"';
                    } ?>></th>
                <th><input style="width: 20px; height: 40px; " type="checkbox" name="listDocument[{{ $key }}][num_9]" value="1" {{$listDocument->listDocument[$key]->num_9=="1"? 'checked':'' }}
                    <?php if ($listDocument->listDocument[$key]->num_9 == '1') {
                        echo 'checked="checked"';
                    } ?>
                    ></th>
                <th><input style="width: 20px; height: 40px; " type="checkbox" name="listDocument[{{ $key }}][num_10]" value="1" {{$listDocument->listDocument[$key]->num_10=="1"? 'checked':'' }}
                    <?php if ($listDocument->listDocument[$key]->num_10 == '1') {
                        echo 'checked="checked"';
                    } ?>
                    ></th>
                <th><input style="width: 20px; height: 40px; " type="checkbox" name="listDocument[{{ $key }}][num_11]" value="1" {{$listDocument->listDocument[$key]->num_11=="1"? 'checked':'' }}
                    <?php if ($listDocument->listDocument[$key]->num_11 == '1') {
                        echo 'checked="checked"';
                    } ?>
                    ></th>
                <th><input style="width: 20px; height: 40px; " type="checkbox" name="listDocument[{{ $key }}][num_12]" value="1" {{$listDocument->listDocument[$key]->num_12=="1"? 'checked':'' }}
                    <?php if ($listDocument->listDocument[$key]->num_12 == '1') {
                        echo 'checked="checked"';
                    } ?>
                    ></th>

            </tr>
            @endforeach
            @endif
        </table>
<br><br>
<table class="table">
    <thead>
        <tr>
            @if ($listDocument->status == 'inProgress' && Auth::user()->hasRole('Employee'))
                <th class=" text-center col-2 ">
                    <div class="" style="text-align:center ;">
                        <label for="" class=""
                            style="text-align:center;font-size:large;font-weight: bolder;">إعداد:</label>
                    </div>
                    <div class="form-group row w-10 text-right">
                        <div class="col-6">
                            <label for="" class="col-3 col-form-label">الاسم : </label>
                            {{ $listDocument->name_1 }}
                        </div>
                    </div>
                    <div class="form-group row w-10 text-right">
                        <div class="col-6">
                            <label for="" class="col-3 col-form-label">الوظيفة : </label>
                           {{ $listDocument->job_1 }}
                        </div>
                    </div>

                </th>
            @endif
            @if ($listDocument->status == 'confirmed' && Auth::user()->hasRole('Employee'))
                <th class=" text-center col-2 ">
                    <div class="" style="text-align:center ;">
                        <label for="" class=""
                            style="text-align:center;font-size:large;font-weight: bolder;">إعداد:</label>
                    </div>
                    <div class="form-group row w-10 text-right">
                        <div class="col-6">
                            <label for="" class="col-3 col-form-label"> الاسم : </label>
                           {{ $listDocument->name_1 }}
                        </div>
                    </div>
                    <div class="form-group row w-10 text-right">
                        <div class="col-6">
                            <label for="" class="col-3 col-form-label">الوظيفة : </label>
                            {{ $listDocument->job_1 }}
                        </div>
                    </div>

                </th>
                <th class="  text-center col-2 ">
                    <div class="" style="text-align:center ;">
                        <label for="" class=""
                            style="text-align:center;font-size:large;font-weight: bolder;">إعتماد:</label>
                    </div>
                    <div class="form-group row w-10 text-right">
                        <div class="col-6">
                            <label for="" class="col-3 col-form-label">الاسم : </label>
                            {{ $listDocument->name_2 }}
                        </div>
                    </div>
                    <div class="form-group row w-10 text-right">
                        <label for="" class="col-3 col-form-label">الوظيفة : </label>
                        <div class="col-6">
                           {{ $listDocument->job_2 }}
                        </div>
                    </div>

                </th>
            @endif
            @if (Auth::user()->hasRole('Admin'))
                <th class=" text-center col-2 ">
                    <div class="" style="text-align:center ;">
                        <label for="" class=""
                            style="text-align:center;font-size:large;font-weight: bolder;">إعداد:</label>
                    </div>
                    <div class="form-group row w-10 text-right">
                        <div class="col-6">
                            <label for="" class="col-3 col-form-label">الاسم : </label>
                            {{ $listDocument->name_1 }}
                        </div>
                    </div>
                    <div class="form-group row w-10 text-right">
                        <div class="col-6">
                            <label for="" class="col-3 col-form-label"> الوظيفة : </label>
                            {{ $listDocument->job_1 }}
                        </div>
                    </div>

                </th>
                @if ($listDocument->status == 'confirmed' && Auth::user()->hasRole('Admin'))
                    <th class="  text-center col-2 ">
                        <div class="" style="text-align:center ;">
                            <label for="" class=""
                                style="text-align:center;font-size:large;font-weight: bolder;">إعتماد:</label>
                        </div>
                        <div class="form-group row w-10 text-right">
                            <div class="col-6">
                                <label for="" class="col-3 col-form-label">الاسم : </label>
                               {{ $listDocument->name_2 }}
                            </div>
                        </div>
                        <div class="form-group row w-10 text-right">
                            <div class="col-6">
                                <label for="" class="col-3 col-form-label">الوظيفة : </label>
                                {{ $listDocument->job_2 }}
                            </div>
                        </div>

                    </th>
                @endif
            @endif
            @if (Auth::user()->hasRole('SuperAdmin'))
                <th class=" text-center col-2 ">
                    <div class="" style="text-align:center ;">
                        <label for="" class=""
                            style="text-align:center;font-size:large;font-weight: bolder;">إعداد:</label>
                    </div>
                    <div class="form-group row w-10 text-right">
                        <div class="col-6">
                            <label for="" class="col-3 col-form-label">الاسم : </label>
                            {{ $listDocument->name_1 }}
                        </div>
                    </div>
                    <div class="form-group row w-10 text-right">
                        <div class="col-6">
                            <label for="" class="col-3 col-form-label">الوظيفة : </label>
                           {{ $listDocument->job_1 }}
                        </div>
                    </div>

                </th>
                <th class="  text-center col-2 ">
                    <div class="" style="text-align:center ;">
                        <label for="" class=""
                            style="text-align:center;font-size:large;font-weight: bolder;">إعتماد:</label>
                    </div>
                    <div class="form-group row w-10 text-right">
                        <div class="col-6">
                            <label for="" class="col-3 col-form-label">الاسم : </label>
                         {{ $listDocument->name_2 }}
                        </div>
                    </div>
                    <div class="form-group row w-10 text-right">
                        <div class="col-6">
                            <label for="" class="col-3 col-form-label">الوظيفة : </label>
                           {{ $listDocument->job_2 }}
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
                   {{ $listDocument->company_name }}
                </div>

            </th>
            <th>
                <div class="" style="text-align:start ;">
                   {{ $listDocument->date2 }}
                </div>

            </th>
            <th>
                <div class="" style="text-align:start ;">
                   {{ $listDocument->date3 }}
                </div>

            </th>
            <th>
                <div class="" style="text-align:start ;">
                    <label for="" class=""
                        style="text-align: center;font-size:large;font-weight: bolder;"> مدة الحفظ : سنتان </label>
                </div>

            </th>
            <th>
                <div class="" style="text-align:start ;">
                    <label for="" class=""
                        style="text-align: center;font-size:large;font-weight: bolder;"> رقم الصفحة : 1 / 1</label>
                </div>
            </th>
            <th>
                <div class="" style="text-align:start ;">
                    <label for="" class=""
                        style="text-align: center;font-size:large;font-weight: bolder;"> رقم الوثيقة : QA–F-13 </label>
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
            float:left;
            display: inline-table;
        }
    </style>
    <script>
  window.addEventListener("load", window.print());
</script>
    @stop