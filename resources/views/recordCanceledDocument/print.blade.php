@extends('layouts.print')

@section('content')



<div class="card">
<div class="card-body">
      <div style="" class="w-100 text-center my-4">
        <h2>سجل حصر الوثائق الملغاة</h2>
        <hr class="w-100">
    </div>
    <div>
        <img src="{{ public_path($recordCanceledDocument->logo) }}" style="float: left;" width="100px" height="50px" />
    
    </div>
    <br><br>
    <div class="form-group row w-100 text-right" style="text-align:center;">
        <table class="table">
            <tr style="background-color:rgb(235, 252, 160); text-align:center;">
                <th scope="col" rowspan="2">إسم الوثيقة</th>
                <th scope="col" rowspan="2">كود </th>
                <th scope="col" colspan="2"> الأصدار </th>
                <th scope="col" colspan="2"> التعديل  </th>
                <th scope="col" rowspan="2">سبب الالغاء</th>
                <th scope="col" rowspan="2">ملاحظات/ بيان التعديل إن وجد</th>

            </tr>
            <tr style="background-color:rgb(235, 252, 160); text-align:center;">
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
    <table class="table">
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
    <table class="table">
        <thead>
            <tr>
                <th>
                    <div class="" style="text-align:start ;">
                       {{ $recordCanceledDocument->company_name }}
                    </div>

                </th>
                <th>
                    <div class="" style="text-align:start ;">
                       {{ $recordCanceledDocument->date2 }}
                    </div>

                </th>
                <th>
                    <div class="" style="text-align:start ;">
                       {{ $recordCanceledDocument->date3 }}
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