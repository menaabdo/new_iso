@extends('layouts.print')

@section('content')

    <div class="card">
<div class="card-body">
            <div style="" class="w-100 text-center my-4">
                <h2>تقرير دراسة شكوي عميل</h2>
                <hr class="w-100">
            </div>
     
            <div>
                <img src="{{ public_path($complaintStudy->logo) }}" style="float: left;" width="100px"
                    height="50px" />

            </div>
            <br><br>
            <div class="form-group row ">
                <div class="col-6">
                    <label for="" class="col-3 col-form-label">عميل رقم:</label>
                  {{ $complaintStudy->customer_number }}
                </div>
            </div>
            <br><br>

            <table class="table">
                <thead>
                    <tr>
                        <th class=" w-20 text-center col-1 ">
                            <div class="form-group row w-10 text-left">
                                <div class="col-2">
                                    <label for="" class="col-2 col-form-label">العميل : - </label>
                                    {{ $complaintStudy->customer }}
                                </div>

                                <div class="col-2">
                                    <label for="" class="col-2 col-form-label">التاريخ: -</label>
                                   {{ $complaintStudy->date_1 }}
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
                        <th class=" w-20 text-center col-1 ">
                            <div class="form-group row w-10 text-left">
                                <div class="col-8">
                                    <label for="" class="col-2 col-form-label">نوع الخدمه : - </label>
                                    {{ $complaintStudy->service }}
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
                        <th class=" w-20 text-center col-1 ">
                            <div class="form-group row w-10 text-left">
                                <label for="" class="col-3 col-form-label">2- موضوع الشكوى (complaint Compliant) </label>
                                <div class="col-9">
                                    
                                    <textarea type="text" class="form-control" placeholder="  ......" name="subject_complain">{{ $complaintStudy->subject_complain }}</textarea>
                                </div>
                            </div>
                            <div class="form-group row w-10 text-left">
                                <label for="" class="col-1 col-form-label">مرفقات </label>

                                <div class="col-4">
                                   {{ $complaintStudy->attachment }}
                                </div>
                            </div>
                        </th>
                    </tr>
                </thead>
            </table>

            <hr class="w-100">
            <div class="container-fluid p-4" style="border: 4px solid">
                <h2>3- الإجراء الفورى لحل الشكوى (Prompt Action) </h2>
                <div class="form-group row w-100 text-right" style="text-align:center;">
                    <table>
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
            <div class="container-fluid p-4" style="border: 4px solid">
                <h2>4- الأسباب المحتملة للشكوى (Root causes)</h2>
                <div class="form-group row w-100 text-right" style="text-align:center;">
                    <table>
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
            <div class="container-fluid p-4" style="border: 4px solid">
                <h2>5- الإجراءات التصحيحية لتجنب تكرار الشكوى (Corrective Actions)</h2>
                <div class="form-group row w-100 text-right" style="text-align:center;">
                    <table>
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
            <table class="table">
                <thead>
                    <tr>
                        <th>
                            <div class="" style="text-align:start ;">
                               {{ $complaintStudy->company_name }}
                            </div>

                        </th>
                        <th>
                            <div class="" style="text-align:start ;">
                             {{ $complaintStudy->date2 }}
                            </div>

                        </th>
                        <th>
                            <div class="" style="text-align:start ;">
                           {{ $complaintStudy->date3 }}
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
                                    style="text-align: center;font-size:large;font-weight: bolder;"> رقم الوثيقة : QA – F
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
@stop
