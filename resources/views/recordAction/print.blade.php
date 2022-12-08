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
        <div class="container p-4" style='text-align:center;border:1px solid silver; box-shadow: 0 1rem 3rem rgba(0, 0, 0, .175) !important;
 '>
                <div style="" class="w-100 text-center my-4">
                <h2 style='text-align:center;margin-bottom:40px'>
                <img src="{{ asset($recordAction->logo) }}" style="border-radius: 6px;
    border: 2px solid #001635;
    margin: 10px;
    float: left;
    /* padding: 12px;" width="50px" height="50px" />
                  
                <span style='font-family:Cursive;border-bottom: 1px solid silver;
    ; box-shadow: 0 1rem 3rem rgba(0, 0, 0, .175) !important;
    border-radius: 6px;
    padding: 10px;text-shadow: 1px 1px 1px #3ed3ea;padding-left: 40px;
    padding-right: 40px;
'> 
                   سجل حصر الاجراءات المستخدمة</span></h2>
                    <hr class="w-100">
                </div>

                
                <div>
                     <label class="col-1">إدارة : </label>
                     <input readonly style=' box-shadow: 0 1rem 3rem rgba(0, 0, 0, .175) !important;border:none;
    text-align: center;   ' value='{{ $recordAction->management }}'>
                </div>
                <br><br>
                <div class="form-group row w-100 text-right" style="text-align:center;">
                    <table class="" style='width: 90%;
    margin: auto; margin-top:40px;border:none'>
                        <tr style="background-color:#001635;color:white;    width: 20%;">مكان الأنعقاد</th>
                           
                            <th scope="col" rowspan="2">إسم الاجراء</th>
                            <th scope="col" rowspan="2">كود الاجراء</th>
                            <th scope="col" colspan="2">أخر إصدار/ تعديل</th>
                            <th scope="col" rowspan="2">مدة الحفظ</th>
                            <th scope="col" rowspan="2">ملاحظات</th>

                        </tr>
                        <tr style="background-color:#001635;color:white;    width: 20%;">مكان الأنعقاد</th>
                            <th scope="col">رقم</th>
                            <th scope="col"> التاريخ</th>
                        </tr>
                        @if (count($recordAction->recordAction) > 0)
                            @foreach ($recordAction->recordAction as $key => $intr)
                                <tr id="recordAction-{{ $key }}">
                               
                                    <th>{{ $intr->name_action }}</th>
                                    <th>{{ $intr->code_action }}</th>
                                    <th>{{ $intr->number }}</th>
                                    <th>{{ $intr->date_action }}</th>
                                    <th>{{ $intr->period_action }}</th>
                                    <th>
                                        {{ $intr->notes_action }}
                                    </th>
                                </tr>
                            @endforeach
                        
                        @endif
                    </table>
                </div>
                <br><br>
                <table class="" style='width: 90%;
    margin: auto; margin-top:40px;border:none'>
                    <thead>
                        <tr>
                            @if ($recordAction->status == 'inProgress' && Auth::user()->hasRole('Employee'))
                                <th class=" text-center col-2 ">
                                    <div class="" style="text-align:center ;">
                                        <label for="" class=""
                                            style="text-align:center;font-size:large;font-weight: bolder;">إعداد:</label>
                                    </div>
                                    <div class="form-group row w-10 text-right">
                                        <div class="col-6">
                                            <label for="" class="col-3 col-form-label">الاسم : </label>
                                            {{ $recordAction->name_1 }}
                                        </div>
                                    </div>
                                    <div class="form-group row w-10 text-right">
                                        <div class="col-6">
                                            <label for="" class="col-3 col-form-label">الوظيفة : </label>
                                           {{ $recordAction->job_1 }}
                                        </div>
                                    </div>

                                </th>
                            @endif
                            @if ($recordAction->status == 'confirmed' && Auth::user()->hasRole('Employee'))
                                <th class=" text-center col-2 ">
                                    <div class="" style="text-align:center ;">
                                        <label for="" class=""
                                            style="text-align:center;font-size:large;font-weight: bolder;">إعداد:</label>
                                    </div>
                                    <div class="form-group row w-10 text-right">
                                        <div class="col-6">
                                            <label for="" class="col-3 col-form-label"> الاسم : </label>
                                           {{ $recordAction->name_1 }}
                                        </div>
                                    </div>
                                    <div class="form-group row w-10 text-right">
                                        <div class="col-6">
                                            <label for="" class="col-3 col-form-label">الوظيفة : </label>
                                            {{ $recordAction->job_1 }}
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
                                            {{ $recordAction->name_2 }}
                                        </div>
                                    </div>
                                    <div class="form-group row w-10 text-right">
                                        <label for="" class="col-3 col-form-label">الوظيفة : </label>
                                        <div class="col-6">
                                           {{ $recordAction->job_2 }}
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
                                            {{ $recordAction->name_1 }}
                                        </div>
                                    </div>
                                    <div class="form-group row w-10 text-right">
                                        <div class="col-6">
                                            <label for="" class="col-3 col-form-label"> الوظيفة : </label>
                                            {{ $recordAction->job_1 }}
                                        </div>
                                    </div>

                                </th>
                                @if ($recordAction->status == 'confirmed' && Auth::user()->hasRole('Admin'))
                                    <th class="  text-center col-2 ">
                                        <div class="" style="text-align:center ;">
                                            <label for="" class=""
                                                style="text-align:center;font-size:large;font-weight: bolder;">إعتماد:</label>
                                        </div>
                                        <div class="form-group row w-10 text-right">
                                            <div class="col-6">
                                                <label for="" class="col-3 col-form-label">الاسم : </label>
                                               {{ $recordAction->name_2 }}
                                            </div>
                                        </div>
                                        <div class="form-group row w-10 text-right">
                                            <div class="col-6">
                                                <label for="" class="col-3 col-form-label">الوظيفة : </label>
                                                {{ $recordAction->job_2 }}
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
                                            {{ $recordAction->name_1 }}
                                        </div>
                                    </div>
                                    <div class="form-group row w-10 text-right">
                                        <div class="col-6">
                                            <label for="" class="col-3 col-form-label">الوظيفة : </label>
                                           {{ $recordAction->job_1 }}
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
                                         {{ $recordAction->name_2 }}
                                        </div>
                                    </div>
                                    <div class="form-group row w-10 text-right">
                                        <div class="col-6">
                                            <label for="" class="col-3 col-form-label">الوظيفة : </label>
                                           {{ $recordAction->job_2 }}
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
                                   {{ $recordAction->company_name }}
                                </div>

                            </th>
                            <th style='border:none'>
                                <div class="" style="text-align:start ;">
                                   {{ $recordAction->date2 }}
                                </div>

                            </th>
                            <th style='border:none'>
                                <div class="" style="text-align:start ;">
                                   {{ $recordAction->date3 }}
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
                float: left;
                display: inline-table;
            }
        </style>
        <script>
  window.addEventListener("load", window.print());
</script>
    @stop
