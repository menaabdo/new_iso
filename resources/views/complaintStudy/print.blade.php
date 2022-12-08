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
            <h3 style='text-align:center;margin-bottom:40px'>
            <img src="{{ asset($complaintStudy->logo) }}"style="border-radius: 6px;
    border: 2px solid #001635;
    margin: 10px;
    float: left;
    /* padding: 12px;" width="50px" height="50px" />

            <span style='font-family:Cursive;border-bottom: 1px solid silver;
    ; box-shadow: 0 1rem 3rem rgba(0, 0, 0, .175) !important;
    border-radius: 6px;
    padding: 10px;text-shadow: 1px 1px 1px #3ed3ea;padding-left: 40px;
    padding-right: 40px;
'>    تقرير دراسة شكوي عميل
</span>
</h3>
                <hr class="w-100">
            </div>
     
            <div>
               
            </div>
            <br><br>
            <div class="form-group row ">
                <div class="col-6">
                    <label for="" class="col-3 col-form-label">عميل رقم:</label>
                    <input readonly style=' box-shadow: 0 1rem 3rem rgba(0, 0, 0, .175) !important;border:none;
    text-align: center;' value= '{{ $complaintStudy->customer_number }}'>
                </div>
            </div>
            <br><br>

            <table class="table" style='border:none'>
                <thead>
                    <tr>
                        <th class=" w-20 text-center col-1 ">
                            <div class="form-group row w-10 text-left">
                                <div class="col-2">
                                    <label for="" class="col-2 col-form-label">العميل : - </label>
                                    <input readonly style=' box-shadow: 0 1rem 3rem rgba(0, 0, 0, .175) !important;border:none;
    text-align: center;' value= ' {{ $complaintStudy->customer }}'>
                                </div>

                                <div class="col-2" style='margin:12px'>
                                    <label for="" class="col-2 col-form-label">التاريخ: -</label>
                                    <input readonly style=' box-shadow: 0 1rem 3rem rgba(0, 0, 0, .175) !important;border:none;
    text-align: center;' value= ' {{ $complaintStudy->date_1 }}'>
                                </div>
                            </div>
                        </th>

                    </tr>
                </thead>
            </table>
            <br><br>
            <table class="table" style='border:none'>
                <thead>
                    <tr>
                        <th class=" w-20 text-center col-1 ">
                            <div class="form-group row w-10 text-left">
                                <div class="col-8">
                                    <label for="" class="col-2 col-form-label">نوع الخدمه : - </label>
                                    <input readonly style=' box-shadow: 0 1rem 3rem rgba(0, 0, 0, .175) !important;border:none;
    text-align: center;' value= '{{ $complaintStudy->service }}'>
                                </div>
                            </div>
                        </th>
                    </tr>
                </thead>
            </table>
            <br><br>
            <table class="table" style='border:none'>
                <thead>
                    <tr>
                        <th class=" w-20 text-center col-1 ">
                            <div class="form-group row w-10 text-left">
                                <label for="" class="col-3 col-form-label">2- موضوع الشكوى (complaint Compliant) </label>
                                <div class="col-9">
                                <textarea type="text" class="form-control" style='vertical-align: middle;    width: 70%;' name="meeting_purpose" >
             
                                   {{ $complaintStudy->subject_complain }}</textarea>
                                </div>
                            </div>
                            <div class="form-group row w-10 text-left">
                                <label for="" class="col-1 col-form-label">مرفقات </label>

                                <div class="col-4">
                                <textarea type="text" class="form-control" style='vertical-align: middle;    width: 70%;' name="meeting_purpose" >
               {{ $complaintStudy->attachment }}</textarea>
                                </div>
                            </div>
                        </th>
                    </tr>
                </thead>
            </table>

            <hr class="w-100">
            <div class="container-fluid p-4" style="">
                <h5>3- الإجراء الفورى لحل الشكوى (Prompt Action) </h5>
                <div class="form-group row w-100 text-right" style="text-align:center;">
                    <table class='table' style='border:none'>
                        <tr style="background-color:rgb(187, 199, 250)">
                           
                            <th> الإجراء</th>
                            <th>المسئول عن التنفيذ</th>
                            <th>التاريخ</th>
                        </tr>
                        @if (count($complaintStudy->prompt) > 0)
                            @foreach ($complaintStudy->prompt as $key => $data)
                                <tr id="prompt-{{ $key }}">
                                   
                                    
                                   
                                    <th><input class="form-control" type="text"
                                            name="prompt[{{ $key }}][action]" value="{{ $data->action }}"></th>
                                    <th><input class="form-control" type="text"
                                            name="prompt[{{ $key }}][implementation]"
                                            value="{{ $data->implementation }}"></th>
                                    <th><input class="form-control" type="date"
                                            name="prompt[{{ $key }}][date_2]" value="{{ $data->date_2 }}"></th>
                                </tr>
                            @endforeach
                           
                            
                           
                       
                        @endif
                    </table>

                </div>

            </div>
            <hr class="w-100">
            <div class="container-fluid p-4" style="">
                <h4>4- الأسباب المحتملة للشكوى (Root causes)</h4>
                <div class="form-group row w-100 text-right" style="text-align:center;">
                    <table class='table' style='border:none'>
                        <tr style="background-color:rgb(187, 199, 250)">
                           
                            <th> السبب</th>
                        </tr>
                        @if (count($complaintStudy->causes) > 0)
                            @foreach ($complaintStudy->causes as $key => $data)
                                <tr id="causes-{{ $key }}">
                                   
                                    
                                  
                                    <th><input class="form-control" type="text"
                                            name="causes[{{ $key }}][reason]" value="{{ $data->reason }}"></th>
                                </tr>
                            @endforeach
                           
                            
                           
                       
                        @endif
                    </table>

                </div>

            </div>
            <br>
            <hr class="w-100">
            <div class="container-fluid p-4" style="">
                <h5>5- الإجراءات التصحيحية لتجنب تكرار الشكوى (Corrective Actions)</h5>
                <div class="form-group row w-100 text-right" style="text-align:center;">
                    <table class='table' style='border:none'>
                        <tr style="background-color:rgb(187, 199, 250)">
                           
                            <th> الإجراء</th>
                            <th>المسئول عن التنفيذ</th>
                            <th>التاريخ</th>
                        </tr>
                        @if (count($complaintStudy->complaint) > 0)
                            @foreach ($complaintStudy->complaint as $key => $data)
                                <tr id="complaint-{{ $key }}">
                                   
                                   
                                   
                                    <th><input class="form-control" type="text"
                                            name="complaint[{{ $key }}][action]" value="{{ $data->action }}">
                                    </th>
                                    <th><input class="form-control" type="text"
                                            name="complaint[{{ $key }}][implementation]"
                                            value="{{ $data->implementation }}"></th>
                                    <th><input class="form-control" type="date"
                                            name="complaint[{{ $key }}][date_2]" value="{{ $data->date_2 }}">
                                    </th>
                                </tr>
                            @endforeach
                          
                        
                           
                       
                        @endif
                    </table>

                </div>

            </div>
            <br>
            <table class="table">
                @if ($complaintStudy->status == 'inProgress' && Auth::user()->hasRole('Employee'))
                <hr class="w-100">

                <tr style="text-align:center;">

                    <th class=" w-50 text-center col-3 " style="border: 2px solid ">

                        <div class="form-group row w-20 text-right">
                            <div class="col-6">
                                <label for="" class="col-3 col-form-label">مدير الجودة</label>
                               {{ $complaintStudy->name_1 }}
                            </div>
                        </div>
                    </th>
                    <th class=" w-50 text-center col-3 "  style="border: 2px solid ">

                        <div class="form-group row w-20 text-right">
                            <div class="col-6">
                                <label for="" class="col-3 col-form-label">التاريخ </label>
                               {{ $complaintStudy->date_3 }}
                            </div>
                        </div>

                    </th>
                </tr>
                @endif
                @if ($complaintStudy->status == 'confirmed' && Auth::user()->hasRole('Employee'))
                <hr class="w-100">

                <tr style="text-align:center;">

                    <th class=" w-50 text-center col-3 " style="border: 2px solid ">

                        <div class="form-group row w-20 text-right">
                            <div class="col-6">
                                <label for="" class="col-3 col-form-label">مدير الجودة</label>
                                {{ $complaintStudy->name_1 }}
                            </div>
                        </div>
                    </th>
                    <th class=" w-50 text-center col-3 "  style="border: 2px solid ">

                        <div class="form-group row w-20 text-right">
                            <div class="col-6">
                                <label for="" class="col-3 col-form-label">التاريخ </label>
                               {{ $complaintStudy->date_3 }}
                            </div>
                        </div>

                    </th>
                </tr>
                <tr style="text-align:center;">

                    <th class=" w-50 text-center col-3 ">

                        <div class="form-group row w-20 text-right">
                            <div class="col-6">
                                <label for="" class="col-3 col-form-label">ممثل الادارة</label>
                                {{ $complaintStudy->name_2 }}
                            </div>
                        </div>
                    </th>
                    <th class=" w-50 text-center col-3 ">

                        <div class="form-group row w-20 text-right">
                            <div class="col-6">
                                <label for="" class="col-3 col-form-label">التاريخ </label>
                               {{ $complaintStudy->date_4 }}
                            </div>
                        </div>

                    </th>
                </tr>
                @endif
                @if (Auth::user()->hasRole('Admin'))
                <hr class="w-100">

                    <tr style="text-align:center;">

                        <th class=" w-50 text-center col-3 " style="border: 2px solid ">

                            <div class="form-group row w-20 text-right">
                                <div class="col-6">
                                    <label for="" class="col-3 col-form-label">مدير الجودة</label>
                                  {{ $complaintStudy->name_1 }}
                                </div>
                            </div>
                        </th>
                        <th class=" w-50 text-center col-3 " style="border: 2px solid ">

                            <div class="form-group row w-20 text-right">
                                <div class="col-6">
                                    <label for="" class="col-3 col-form-label">التاريخ </label>
                                  {{ $complaintStudy->date_3 }}
                                </div>
                            </div>

                        </th>
                    </tr>
                    @if ($complaintStudy->status == 'confirmed' && Auth::user()->hasRole('Admin'))
                    <tr style="text-align:center;">

                        <th class=" w-50 text-center col-3 ">
    
                            <div class="form-group row w-20 text-right">
                                <div class="col-6">
                                    <label for="" class="col-3 col-form-label">ممثل الادارة</label>
                                   {{ $complaintStudy->name_2 }}
                                </div>
                            </div>
                        </th>
                        <th class=" w-50 text-center col-3 ">
    
                            <div class="form-group row w-20 text-right">
                                <div class="col-6">
                                    <label for="" class="col-3 col-form-label">التاريخ </label>
                                   {{ $complaintStudy->date_4 }}
                                </div>
                            </div>
    
                        </th>
                    </tr>
                    @endif
                @endif
                @if (Auth::user()->hasRole('SuperAdmin'))
                    <tr style="text-align:center;">

                        <th class=" w-50 text-center col-3 " style="border: 2px solid ">

                            <div class="form-group row w-20 text-right">
                                <div class="col-6">
                                    <label for="" class="col-3 col-form-label">مدير الجودة</label>
                                  {{ $complaintStudy->name_1 }}
                                </div>
                            </div>
                        </th>
                        <th class=" w-50 text-center col-3 " style="border: 2px solid ">

                            <div class="form-group row w-20 text-right">
                                <div class="col-6">
                                    <label for="" class="col-3 col-form-label">التاريخ </label>
                                    {{ $complaintStudy->date_3 }}
                                </div>
                            </div>

                        </th>
                    </tr>
                    <tr style="text-align:center;">

                        <th class=" w-50 text-center col-3 ">

                            <div class="form-group row w-20 text-right">
                                <div class="col-6">
                                    <label for="" class="col-3 col-form-label">ممثل الادارة</label>
                                   {{ $complaintStudy->name_2 }}
                                </div>
                            </div>
                        </th>
                        <th class=" w-50 text-center col-3 ">

                            <div class="form-group row w-20 text-right">
                                <div class="col-6">
                                    <label for="" class="col-3 col-form-label">التاريخ </label>
                                    {{ $complaintStudy->date_4 }}
                                </div>
                            </div>

                        </th>
                    </tr>
                @endif
            </table>
            <br>
            <hr class="w-100">
            <table class="" style=' border:none;
    padding:12px;
    margin-top:12px;
    background-color: #001635;
    color: white;
    /* text-shadow: none; */
    width: 97%;
    margin: auto;
    margin-bottom: 12px;
    font-size: 12px;
    padding: 1px;'>
                <thead>
                    <tr>
                        <th style='border:none'>
                            <div class="" style="text-align:start ;">
                               {{ $complaintStudy->company_name }}
                            </div>

                        </th>
                        <th style='border:none'>
                            <div class="" style="text-align:start ;">
                             {{ $complaintStudy->date2 }}
                            </div>

                        </th>
                        <th style='border:none'>
                            <div class="" style="text-align:start ;">
                           {{ $complaintStudy->date3 }}
                            </div>

                        </th>
                        <th style='border:none'>
                            <div class="" style="text-align:start ;">
                                <label for="" class=""
                                    style="text-align: center;;"> مدة الحفظ :
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
                                    style="text-align: center;"> رقم الوثيقة : QA – F
                                    - 13 </label>
                            </div>
                        </th>
                    </tr>
                </thead>
            </table>

      

    </div>


    <style>
        .table thead th {
            vertical-align: bottom;
            border-bottom: 2px solid silver;
        }

        table,
        th,
        td,
        tr {
            border: 1px solid silver;
            border-bottom: 2px solid silver;
            border-top: 2px solid silver;
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
