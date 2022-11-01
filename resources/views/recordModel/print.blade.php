@extends('layouts.print')

@section('content')
<div class="card">
<div class="card-body">
    
      <div style="" class="w-100 text-center my-4">
        <h2>سجل حصر النماذج المستخدمة</h2>
        <hr class="w-100">
    </div>
    <div>
        <img src="{{ public_path($recordModel->logo) }}" style="float: left;" width="100px" height="50px" />
        <label class="col-1">إدارة : </label>
      {{ $recordModel->management }}
    </div>
    <br><br>
  
    <div class="form-group row w-100 text-right" style="text-align:center;">
        <table class="table">
            <tr style="background-color:rgb(235, 252, 160); text-align:center;">

                <th scope="col" rowspan="2">إسم النموذج</th>
                <th scope="col" rowspan="2">كود الاجراء</th>
                <th scope="col" colspan="2">أخر إصدار/ تعديل</th>
                <th scope="col" rowspan="2">مدة الحفظ</th>
                <th scope="col" rowspan="2">ملاحظات</th>

            </tr>
            <tr style="background-color:rgb(235, 252, 160); text-align:center;">
                <th scope="col">رقم</th>
                <th scope="col"> التاريخ</th>
            </tr>
            @if(count($recordModel->recordModel)>0)
            @foreach($recordModel->recordModel as $key => $intr)
            <tr id="recordModel-{{ $key }}">
                
                <th>{{ $intr->name_action }}</th>
                <th>{{ $intr->code_action }}</th>
                <th>{{ $intr->number }}</th>
                <th>{{ $intr->date_action }}</th>
                <th>{{ $intr->period_action }}</th>
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
                @if ($recordModel->status == 'inProgress' && Auth::user()->hasRole('Employee'))
                    <th class=" text-center col-2 ">
                        <div class="" style="text-align:center ;">
                            <label for="" class=""
                                style="text-align:center;font-size:large;font-weight: bolder;">إعداد:</label>
                        </div>
                        <div class="form-group row w-10 text-right">
                            <div class="col-6">
                                <label for="" class="col-3 col-form-label">الاسم : </label>
                                {{ $recordModel->name_1 }}
                            </div>
                        </div>
                        <div class="form-group row w-10 text-right">
                            <div class="col-6">
                                <label for="" class="col-3 col-form-label">الوظيفة : </label>
                               {{ $recordModel->job_1 }}
                            </div>
                        </div>

                    </th>
                @endif
                @if ($recordModel->status == 'confirmed' && Auth::user()->hasRole('Employee'))
                    <th class=" text-center col-2 ">
                        <div class="" style="text-align:center ;">
                            <label for="" class=""
                                style="text-align:center;font-size:large;font-weight: bolder;">إعداد:</label>
                        </div>
                        <div class="form-group row w-10 text-right">
                            <div class="col-6">
                                <label for="" class="col-3 col-form-label"> الاسم : </label>
                               {{ $recordModel->name_1 }}
                            </div>
                        </div>
                        <div class="form-group row w-10 text-right">
                            <div class="col-6">
                                <label for="" class="col-3 col-form-label">الوظيفة : </label>
                                {{ $recordModel->job_1 }}
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
                                {{ $recordModel->name_2 }}
                            </div>
                        </div>
                        <div class="form-group row w-10 text-right">
                            <label for="" class="col-3 col-form-label">الوظيفة : </label>
                            <div class="col-6">
                               {{ $recordModel->job_2 }}
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
                                {{ $recordModel->name_1 }}
                            </div>
                        </div>
                        <div class="form-group row w-10 text-right">
                            <div class="col-6">
                                <label for="" class="col-3 col-form-label"> الوظيفة : </label>
                                {{ $recordModel->job_1 }}
                            </div>
                        </div>

                    </th>
                    @if ($recordModel->status == 'confirmed' && Auth::user()->hasRole('Admin'))
                        <th class="  text-center col-2 ">
                            <div class="" style="text-align:center ;">
                                <label for="" class=""
                                    style="text-align:center;font-size:large;font-weight: bolder;">إعتماد:</label>
                            </div>
                            <div class="form-group row w-10 text-right">
                                <div class="col-6">
                                    <label for="" class="col-3 col-form-label">الاسم : </label>
                                   {{ $recordModel->name_2 }}
                                </div>
                            </div>
                            <div class="form-group row w-10 text-right">
                                <div class="col-6">
                                    <label for="" class="col-3 col-form-label">الوظيفة : </label>
                                    {{ $recordModel->job_2 }}
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
                                {{ $recordModel->name_1 }}
                            </div>
                        </div>
                        <div class="form-group row w-10 text-right">
                            <div class="col-6">
                                <label for="" class="col-3 col-form-label">الوظيفة : </label>
                               {{ $recordModel->job_1 }}
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
                             {{ $recordModel->name_2 }}
                            </div>
                        </div>
                        <div class="form-group row w-10 text-right">
                            <div class="col-6">
                                <label for="" class="col-3 col-form-label">الوظيفة : </label>
                               {{ $recordModel->job_2 }}
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
                       {{ $recordModel->company_name }}
                    </div>

                </th>
                <th>
                    <div class="" style="text-align:start ;">
                       {{ $recordModel->date2 }}
                    </div>

                </th>
                <th>
                    <div class="" style="text-align:start ;">
                       {{ $recordModel->date3 }}
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