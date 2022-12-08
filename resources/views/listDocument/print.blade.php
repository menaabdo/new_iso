@extends('layouts.print')
@section('content')
<style>
    input,textarea {
        box-shadow: 0 1rem 3rem rgba(0, 0, 0, .175) !important;
    }
    textarea{
        border: none;
    height: 80px;
    padding: 10px;
    }
    input{
        font-size: .875rem;
    line-height: 1.5;
    color: #4F5467;
    background-color: #fff;
    border: 1px solid #e9ecef;
    border-radius: 2px;
    }

</style>


<div class="card">
<div class="card-body" style='text-align:center;border:1px solid silver; box-shadow: 0 1rem 3rem rgba(0, 0, 0, .175) !important;
 '>


      <div style="" class="w-100 text-center my-4">
      <h2 style='text-align:center;margin-bottom:40px'>
      <img src="{{ asset($listDocument->logo) }}" style="border-radius: 6px;
    border: 2px solid #001635;
    margin: 10px;
    float: left;
    /* padding: 12px;" width="50px" height="50px" />
      <span style='font-family:Cursive;border-bottom: 1px solid silver;
    ; box-shadow: 0 1rem 3rem rgba(0, 0, 0, .175) !important;
    border-radius: 6px;
    padding: 10px;text-shadow: 1px 1px 1px #3ed3ea;padding-left: 40px;
    padding-right: 40px;
'>قائمة رئيسية للوثائق
</span></h2>
        <hr class="w-100">
    </div>
    <div>
      
    </div>
   
    <div>
        <label  class="col-1">تاريخ : </label>
        <input readonly style=' box-shadow: 0 1rem 3rem rgba(0, 0, 0, .175) !important;border:none;
    text-align: center;   ' value='{{ $listDocument->date_1 }}'>
    </div>
    <br><br>
    <div class='row my-4' style='overflow-x:auto'>
              
        <table style='border:none'>
            <tr style="background-color:#001635;color:white;    width: 20%;">
                   <th scope="col" rowspan="2">اسم الوثيقة</th>
                <th scope="col" rowspan="2">الكود</th>
                <th scope="col" colspan="2">إصدار</th>
                <th scope="col" colspan="2">تعديل</th>
                <th scope="col" rowspan="2">عدد الصفحات</th>
                <th scope="col" colspan="12"> معدل توزيع النسخ (رقم النسخة للأدارات) وعددها</th>
            </tr>
            <tr style="background-color:#001635;color:white;    width: 20%;">
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
         </div>
<br><br>
<table class="table" style='border:none'>
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
<table class="table" style="  ; border:none;padding:12px;margin-top:12px;background-color: #001635;
    color: white;text-shadow: none;width: 97%;
    margin: auto;
    margin-bottom: 12px;    font-size: 12px;padding: 1px;">
    <thead>
        <tr>
            <th style='border:none'>
                <div class="" style="text-align:start ;">
                   {{ $listDocument->company_name }}
                </div>

            </th>
            <th style='border:none'>
                <div class="" style="text-align:start ;">
                   {{ $listDocument->date2 }}
                </div>

            </th>
            <th style='border:none'>
                <div class="" style="text-align:start ;">
                   {{ $listDocument->date3 }}
                </div>

            </th>
            <th style='border:none'>
                <div class="" style="text-align:start ;">
                    <label for="" class=""
                        style="text-align: center;"> مدة الحفظ : سنتان </label>
                </div>

            </th>
            <th style='border:none'>
                <div class="" style="text-align:start ;">
                    <label for="" class=""
                        style="text-align: center;"> رقم الصفحة : 1 / 1</label>
                </div>
            </th>
            <th style='border:none'>
                <div class="" style="text-align:start ;">
                    <label for="" class=""
                        style="text-align: center;"> رقم الوثيقة : QA–F-13 </label>
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