@extends('layouts.print')

@section('content')



<div class="card">
<div class="card-body">
      <div style="" class="w-100 text-center my-4">
        <h2>نموذج إستلام وثائق/نماذج
        </h2>
        <hr class="w-100">
    </div>
    <div>
        <img src="{{ public_path($typicalForm->logo) }}" style="float: left;" width="100px" height="50px" />
       
    </div>
    <br><br>
    <div class="form-group row w-100 text-left">
        
        <div class="col-form-label">
            <label>إستلمت أنا :</label>
             {{$typicalForm->name }}
             &nbsp;
            <label>الموقع أدناه الوثائق التالية.</label>
            &nbsp;
            <label>والتي تخص إدارة / </label>
            {{ $typicalForm->management }}
        </div>
    </div>
   <br><br>
    <div class="form-group row w-100 text-right" style="text-align:center ;">
        <table class="table">
            <tr style="background-color:rgb(187, 216, 240)">
                <th>إسم الوثيقة</th>
                <th>كود الوثيقة</th>
                <th>عدد النسخ</th>
                <th>التاريخ</th>
                <th>الملاحظات</th>
            </tr>
            @if(count($typicalForm->typicalForm)>0)
            @foreach($typicalForm->typicalForm as $key => $intr)
            <tr id="typicalForm-{{ $key }}">

                <th>{{ $intr->document_name }}</th>
                <th>{{ $intr->document_code }}</th>
                <th>{{ $intr->number_copy }}</th>
                <th>{{ $intr->date1 }}</th>
                <th>{{ $intr->notes }}</th>
            </tr>
            @endforeach

           
            @endif
        </table>
    </div>
    <br><br>
    <table class="table">
        <thead>
            <tr>
                <th class=" w-50 text-center col-1 ">
                    <div class="" style="text-align:center ;">
                        <label for="" class="" style="text-align:center;font-size:large;font-weight: bolder;">المستلم:</label>
                    </div>
                    <div class="form-group row w-10 text-right">
                        <div class="col-2">
                            <label for="" class="col-1 col-form-label">الاسم : </label>
                           {{ $typicalForm->name2 }}
                        </div>
                    </div>
                    <div class="form-group row w-10 text-right">
                        <div class="col-2">
                            <label for="" class="col-1 col-form-label">الوظيفة : </label>
                            {{ $typicalForm->job }}
                        </div>
                    </div>
                </th>

            </tr>
        </thead>
    </table>

    <br><br>
    <table class="table">
        <thead>
            <tr>
                <th>
                    <div class="" style="text-align:start ;">
                       {{ $typicalForm->company_name }}
                    </div>

                </th>
                <th>
                    <div class="" style="text-align:start ;">
                       {{ $typicalForm->date2 }}
                    </div>

                </th>
                <th>
                    <div class="" style="text-align:start ;">
                       {{ $typicalForm->date3 }}
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
    @stop