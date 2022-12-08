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
<div class="card-body" style='text-align:center;border:1px solid silver; box-shadow: 0 1rem 3rem rgba(0, 0, 0, .175) !important;'>
      <div style="" class="w-100 text-center my-4">
      <h2 style='text-align:center;margin-bottom:40px'>
      <img src="{{ asset($recordCanceledDocument->logo) }}" style="border-radius: 6px;
    border: 2px solid #001635;
    margin: 10px;
    float: left;
    /* padding: 12px;" width="50px" height="50px" />
      <span style='font-family:Cursive;border-bottom: 1px solid silver;
    ; box-shadow: 0 1rem 3rem rgba(0, 0, 0, .175) !important;
    border-radius: 6px;
    padding: 10px;text-shadow: 1px 1px 1px #3ed3ea;padding-left: 40px;
    padding-right: 40px;
'>   سجل حصر الوثائق الملغاة
</span>
</h2>
        <hr class="w-100">
    </div>
    <div>
       
    </div>
    <br><br>
    <div class="form-group row w-100 text-right" style="text-align:center;">
        <table class="table" style='width: 90%;
    margin: auto; margin-top:40px;border:none;'>
            <tr style="background-color:#001635;color:white;    width: 20%;">مكان الأنعقاد</th>
                            <th scope="col" rowspan="2">إسم الوثيقة</th>
                <th scope="col" rowspan="2">كود </th>
                <th scope="col" colspan="2"> الأصدار </th>
                <th scope="col" colspan="2"> التعديل  </th>
                <th scope="col" rowspan="2">سبب الالغاء</th>
                <th scope="col" rowspan="2">ملاحظات/ بيان التعديل إن وجد</th>

            </tr>
            <tr style="background-color:#001635;color:white;    width: 20%;">مكان الأنعقاد</th>
                             <th scope="col">رقم</th>
                <th scope="col"> التاريخ</th>
                <th scope="col">رقم</th>
                <th scope="col"> التاريخ</th>
            </tr>
            @if(count($recordCanceledDocument->recordCanceledDocument)>0)
            @foreach($recordCanceledDocument->recordCanceledDocument as $key => $intr)
            <tr>
                <th>{{ $intr->name_action }}</th>
                <th>{{ $intr->code_action }}</th>
                <th>{{ $intr->number }}</th>
                <th>{{ $intr->date_action }}</th>
                <th> {{$intr->number2 }}</th>
                <th>{{ $intr->date_action2 }}</th>
                <th> {{ $intr->reasone_cancel }}</th>
                <th>{{ $intr->notes_action }}</th>
            </tr>
            @endforeach


            @endif
        </table>
    </div>
    <br><br>
    <table class="table" style='border:none'>
        <thead>
            <tr>
                @if ($recordCanceledDocument->status == 'inProgress' && Auth::user()->hasRole('Employee'))
                    <th class=" text-center col-2 ">
                        <div class="" style="text-align:center ;">
                            <label for="" class=""
                                style="text-align:center;font-size:large;font-weight: bolder;">إعداد:</label>
                        </div>
                        <div class="form-group row w-10 text-right">
                            <div class="col-6">
                                <label for="" class="col-3 col-form-label">الاسم : </label>
                                {{ $recordCanceledDocument->name_1 }}
                            </div>
                        </div>
                        <div class="form-group row w-10 text-right">
                            <div class="col-6">
                                <label for="" class="col-3 col-form-label">الوظيفة : </label>
                               {{ $recordCanceledDocument->job_1 }}
                            </div>
                        </div>

                    </th>
                @endif
                @if ($recordCanceledDocument->status == 'confirmed' && Auth::user()->hasRole('Employee'))
                    <th class=" text-center col-2 ">
                        <div class="" style="text-align:center ;">
                            <label for="" class=""
                                style="text-align:center;font-size:large;font-weight: bolder;">إعداد:</label>
                        </div>
                        <div class="form-group row w-10 text-right">
                            <div class="col-6">
                                <label for="" class="col-3 col-form-label"> الاسم : </label>
                               {{ $recordCanceledDocument->name_1 }}
                            </div>
                        </div>
                        <div class="form-group row w-10 text-right">
                            <div class="col-6">
                                <label for="" class="col-3 col-form-label">الوظيفة : </label>
                                {{ $recordCanceledDocument->job_1 }}
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
                                {{ $recordCanceledDocument->name_2 }}
                            </div>
                        </div>
                        <div class="form-group row w-10 text-right">
                            <label for="" class="col-3 col-form-label">الوظيفة : </label>
                            <div class="col-6">
                               {{ $recordCanceledDocument->job_2 }}
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
                                {{ $recordCanceledDocument->name_1 }}
                            </div>
                        </div>
                        <div class="form-group row w-10 text-right">
                            <div class="col-6">
                                <label for="" class="col-3 col-form-label"> الوظيفة : </label>
                                {{ $recordCanceledDocument->job_1 }}
                            </div>
                        </div>

                    </th>
                    @if ($recordCanceledDocument->status == 'confirmed' && Auth::user()->hasRole('Admin'))
                        <th class="  text-center col-2 ">
                            <div class="" style="text-align:center ;">
                                <label for="" class=""
                                    style="text-align:center;font-size:large;font-weight: bolder;">إعتماد:</label>
                            </div>
                            <div class="form-group row w-10 text-right">
                                <div class="col-6">
                                    <label for="" class="col-3 col-form-label">الاسم : </label>
                                   {{ $recordCanceledDocument->name_2 }}
                                </div>
                            </div>
                            <div class="form-group row w-10 text-right">
                                <div class="col-6">
                                    <label for="" class="col-3 col-form-label">الوظيفة : </label>
                                    {{ $recordCanceledDocument->job_2 }}
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
                                {{ $recordCanceledDocument->name_1 }}
                            </div>
                        </div>
                        <div class="form-group row w-10 text-right">
                            <div class="col-6">
                                <label for="" class="col-3 col-form-label">الوظيفة : </label>
                               {{ $recordCanceledDocument->job_1 }}
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
                             {{ $recordCanceledDocument->name_2 }}
                            </div>
                        </div>
                        <div class="form-group row w-10 text-right">
                            <div class="col-6">
                                <label for="" class="col-3 col-form-label">الوظيفة : </label>
                               {{ $recordCanceledDocument->job_2 }}
                            </div>
                        </div>

                    </th>
                @endif

            </tr>
        </thead>
    </table>
    <br><br>
    <table class="" style="  ; border:none;padding:12px;margin-top:12px;background-color: #001635;
    color: white;text-shadow: none;width: 97%;
    margin: auto;
    margin-bottom: 12px;    font-size: 12px;padding: 1px;">
        <thead>
            <tr>
                <th style='border:none'>
                    <div class="" style="text-align:start ;">
                       {{ $recordCanceledDocument->company_name }}
                    </div>

                </th>
                <th style='border:none'>
                    <div class="" style="text-align:start ;">
                       {{ $recordCanceledDocument->date2 }}
                    </div>

                </th>
                <th style='border:none'>
                    <div class="" style="text-align:start ;">
                       {{ $recordCanceledDocument->date3 }}
                    </div>

                </th>
                <th style='border:none'>
                    <div class="" style="text-align:start ;">
                        <label for="" class=""
                            style="text-align: center;
                            "> مدة الحفظ : سنتان </label>
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
        /* border-bottom: 2px solid black; */
    }
    
    table,
    th,
    td,
    tr {
        border: 1px solid black;
        /* border-bottom: 2px solid black;
        border-top: 2px solid black; */
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