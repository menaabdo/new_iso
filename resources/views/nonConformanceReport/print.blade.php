@extends('layouts.print')
@section('content')

<div class="card">
<div class="card-body">

        <div style="" class="w-100 text-center my-4">
            <h2>سجل متابعة تقارير عدم المطابقة </h2>
            <label>لــعام</label>
            {{$nonConformanceReport->year}}
            <hr class="w-100">
        </div>
        <div>
            <img src="{{ public_path($nonConformanceReport->logo) }}" style="float: left;" width="100px" height="50px" />
        
        </div>
        <br><br>
        <div class="" style="text-align:start ;">
            <label for="" class="" style="text-align: center;font-size:large;font-weight: bolder;">   حالات عدم مطابقة لنظام الجودة ( nonConformanceReport 9001 ) فى مختلف الإدارات  .  :</label>
        </div>
        <hr class="w-100">
        <br><br>
        <div class="container-fluid p-4" >
            <div class="container-fluid p-2">
                <div class="" style="text-align:center ;">
                    <table>
                        <tr style="background-color:rgb(230, 242, 117)">
                            <th> التاريخ</th>
                            <th>الإدارة المختصة</th>
                            <th>وصف الحالة</th>
                            <th>الإجراء المتخذ</th>
                            <th>المسئول عن التنفيذ</th>
                            <th>مخطط التنفيذ</th>
                            <th>متابعة التنفيذ</th>
                            <th>ملاحظات</th>
                        </tr>
                        @if(count($nonConformanceReport->nonConformanceReport)>0)
                        @foreach($nonConformanceReport->nonConformanceReport as $key => $data)
                        <tr id="nonConformanceReport-{{$key}}">
                            <th>{{$data->date_1}}</th>
                            <th>{{$data->management}}</th>
                            <th>{{$data->description}}</th>
                            <th>{{$data->action_taken}}</th>
                            <th>{{$data->responsible_implementation}}</th>
                            <th>{{$data->implementation_scheme}}</th>
                            <th>{{$data->follow_implementation}}</th>
                            <th>{{$data->notes}}</th>

                        </tr>
                        @endforeach
                
   
                        @endif
                    </table>
                </div>
            </div>
        </div>
        <hr class="w-100">
        @if ($nonConformanceReport->status == 'confirmed' && Auth::user()->hasRole('Employee'))
        <div class="" style="text-align:center ;">
            <h2 for="" class="" style="text-align:center;font-size:large;font-weight: bolder;">إعداد</h2>
        </div>
        <div class="form-group row text-left col-12" >
            <div class="col-4">
                <label for="" class="col-2 col-form-label">الاسم  :       -</label>
              {{$nonConformanceReport->name}}
            </div>
            <div class="col-4">
                <label for="" class="col-2 col-form-label">الوظيفة:       -</label>
                {{$nonConformanceReport->employee}}
            </div>
        </div>
        <hr class="w-100">
        @endif
        @if ($nonConformanceReport->status == 'confirmed' && Auth::user()->hasRole('Admin'))
        <div class="" style="text-align:center ;">
            <h2 for="" class="" style="text-align:center;font-size:large;font-weight: bolder;">إعداد</h2>
        </div>
        <div class="form-group row text-left col-12" >
            <div class="col-4">
                <label for="" class="col-2 col-form-label">الاسم  :       -</label>
  {{$nonConformanceReport->name}}
            </div>
            <div class="col-4">
                <label for="" class="col-2 col-form-label">الوظيفة:       -</label>
                {{$nonConformanceReport->employee}}
            </div>
        </div>
        <hr class="w-100">
        @endif
        @if (Auth::user()->hasRole('SuperAdmin'))
                        <div class="" style="text-align:center ;">
                            <h2 for="" class="" style="text-align:center;font-size:large;font-weight: bolder;">إعداد</h2>
                        </div>
                        <div class="form-group row text-left col-12" >
                            <div class="col-4">
                                <label for="" class="col-2 col-form-label">الاسم  :       -</label>
                                {{$nonConformanceReport->name}}
                            </div>
                            <div class="col-4">
                                <label for="" class="col-2 col-form-label">الوظيفة:       -</label>
                               {{$nonConformanceReport->employee}}
                            </div>
                        </div>
                        <hr class="w-100">
                    @endif
                       
<br><br>
<table>
    <thead>
        <tr>
            <th>
                <div class="" style="text-align:start ;">
                    {{ $nonConformanceReport->company_name }}
                </div>

            </th>
            <th>
                <div class="" style="text-align:start ;">
                    {{ $nonConformanceReport->date2 }}
                </div>

            </th>
            <th>
                <div class="" style="text-align:start ;">
                    {{ $nonConformanceReport->date3 }}
                </div>

            </th>
            <th>
                <div class="" style="text-align:start ;">
                    <label for="" class=""
                        style="text-align: center;font-size:large;font-weight: bolder;"> مدة الحفظ :
                        سنتان </label>
                </div>

            </th>
            <th>
                <div class="" style="text-align:start ;">
                    <label for="" class=""
                        style="text-align: center;font-size:large;font-weight: bolder;"> رقم الصفحة : 1 /
                        1</label>
                </div>
            </th>
            <th>
                <div class="" style="text-align:start ;">
                    <label for="" class=""
                        style="text-align: center;font-size:large;font-weight: bolder;"> رقم الوثيقة :
                        QA–F-13
                    </label>
                </div>
            </th>
        </tr>
    </thead>
</table>
                    </div>

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