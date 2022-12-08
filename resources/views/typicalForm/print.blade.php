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
      <img src="{{ asset($typicalForm->logo) }}" style="border-radius: 6px;
    border: 2px solid #001635;
    margin: 10px;
    float: left;
    /* padding: 12px;" width="50px" height="50px" />
      <span style='font-family:Cursive;border-bottom: 1px solid silver;
    ; box-shadow: 0 1rem 3rem rgba(0, 0, 0, .175) !important;
    border-radius: 6px;
    padding: 10px;text-shadow: 1px 1px 1px #3ed3ea;padding-left: 40px;
    padding-right: 40px;
'>نموذج إستلام وثائق/نماذج</span>
        </h2>
        <hr class="w-100">
    </div>
    <div>
        
    </div>
    <br><br>
    <div class="form-group row w-100 text-left">
        
        <div class="col-form-label">
            <label>إستلمت أنا :</label>
            <input readonly style=' box-shadow: 0 1rem 3rem rgba(0, 0, 0, .175) !important;border:none;
    text-align: center;   ' value='{{$typicalForm->name }}'>
             &nbsp;
            <label>الموقع أدناه الوثائق التالية.</label>
            &nbsp;
            <label>والتي تخص إدارة / </label>
            <input readonly style=' box-shadow: 0 1rem 3rem rgba(0, 0, 0, .175) !important;border:none;
    text-align: center;   ' value='{{ $typicalForm->management }}'>
        </div>
    </div>
   <br><br>
    <div class="form-group row w-100 text-right" style="text-align:center ;">
        <table class="table" style='border:none'>
            <tr style="background-color:#001635;color:white;    width: 20%;">
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
    <table class="table" style='border:none'>
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
    <table class="" style="  ; border:none;padding:12px;margin-top:12px;background-color: #001635;
    color: white;text-shadow: none;width: 97%;
    margin: auto;
    margin-bottom: 12px;    font-size: 12px;padding: 1px;">>
        <thead>
            <tr>
                <th style='border:none'>
                    <div class="" style="text-align:start ;">
                       {{ $typicalForm->company_name }}
                    </div>

                </th>
                <th style='border:none'>
                    <div class="" style="text-align:start ;">
                       {{ $typicalForm->date2 }}
                    </div>

                </th>
                <th style='border:none'>
                    <div class="" style="text-align:start ;">
                       {{ $typicalForm->date3 }}
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
                            style="text-align: center;;"> رقم الوثيقة : QA–F-13 </label>
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