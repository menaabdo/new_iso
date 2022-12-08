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
        <img src="{{ asset($nonConformanceReport->logo) }}" style="border-radius: 6px;
    border: 2px solid #001635;
    margin: 10px;
    float: left;
    /* padding: 12px;" width="50px" height="50px" />
        <span style='font-family:Cursive;border-bottom: 1px solid silver;
    ; box-shadow: 0 1rem 3rem rgba(0, 0, 0, .175) !important;
    border-radius: 6px;
    padding: 10px;text-shadow: 1px 1px 1px #3ed3ea;padding-left: 40px;
    padding-right: 40px;
'>سجل متابعة تقارير عدم المطابقة 
</span>
</h2>
            <label>لــعام</label>
            <input readonly style=' box-shadow: 0 1rem 3rem rgba(0, 0, 0, .175) !important;border:none;
    text-align: center;   ' value=' {{$nonConformanceReport->year}}'>
            <hr class="w-100">
        </div>
        <div>
          
        </div>
        <br><br>
        <div class="" style="text-align:center ;">
            <label for="" class="" style="text-align: center;;font-weight: bolder;">   حالات عدم مطابقة لنظام الجودة ( nonConformanceReport 9001 ) فى مختلف الإدارات  .  :</label>
        </div>
        <hr class="w-100">
        <br><br>
        <div class="container-fluid p-4" >
            <div class="container-fluid p-2">
                <div class="" style="text-align:center ;">
                    <table style='border:none'>
                        <tr style='background-color:#001635;color:white; '>
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
                <input readonly style=' box-shadow: 0 1rem 3rem rgba(0, 0, 0, .175) !important;border:none;
    text-align: center;   ' value=' {{$nonConformanceReport->name}}'>
            </div>
            <div class="col-4">
                <label for="" class="col-2 col-form-label">الوظيفة:       -</label>
                <input readonly style=' box-shadow: 0 1rem 3rem rgba(0, 0, 0, .175) !important;border:none;
    text-align: center;   ' value=' {{$nonConformanceReport->employee}}'>
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
                                <input readonly style=' box-shadow: 0 1rem 3rem rgba(0, 0, 0, .175) !important;border:none;
    text-align: center;   ' value='  {{$nonConformanceReport->name}}'>
                            </div>
                            <div class="col-4" style='margin:12px'>
                                <label for="" class="col-2 col-form-label">الوظيفة:       -</label>
                                <input readonly style=' box-shadow: 0 1rem 3rem rgba(0, 0, 0, .175) !important;border:none;
    text-align: center;   ' value='  {{$nonConformanceReport->employee}}'>
                            </div>
                        </div>
                        <hr class="w-100">
                    @endif
                       
<br><br>
<table style="  ; border:none;padding:12px;margin-top:12px;background-color: #001635;
    color: white;text-shadow: none;width: 97%;
    margin: auto;
    margin-bottom: 12px;    font-size: 12px;padding: 1px;">
    <thead>
        <tr>
            <th style='border:none'>
                <div class="" style="text-align:start ;">
                    {{ $nonConformanceReport->company_name }}
                </div>

            </th>
            <th style='border:none'>
                <div class="" style="text-align:start ;">
                    {{ $nonConformanceReport->date2 }}
                </div>

            </th>
            <th style='border:none'>
                <div class="" style="text-align:start ;">
                    {{ $nonConformanceReport->date3 }}
                </div>

            </th>
            <th style='border:none'>
                <div class="" style="text-align:start ;">
                    <label for="" class=""
                        style="text-align: center;"> مدة الحفظ :
                        سنتان </label>
                </div>

            </th>
            <th style='border:none'>
                <div class="" style="text-align:start ;">
                    <label for="" class=""
                        style="text-align: center;"> رقم الصفحة : 1 /
                        1</label>
                </div>
            </th>
            <th style='border:none'>
                <div class="" style="text-align:start ;">
                    <label for="" class=""
                        style="text-align: center;"> رقم الوثيقة :
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
<script>
  window.addEventListener("load", window.print());
</script>
@stop