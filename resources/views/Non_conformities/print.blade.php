@extends('layouts.print')
@section('content')

<div class="card">
<div class="card-body">
    <h3 style="margin-top:85px;">حالات عدم المطابقة</h3>
    <hr>
        <div style="" class="w-100 text-center my-4">
            <label>حالات عدم المطابقة رقم </label>
            {{$Non_conformities->number_1}}
            <hr width="1300px;" size="20" color="black">
        </div>
        <div>
            <img src="{{ public_path($Non_conformities->logo) }}" style="float: left;" width="100px" height="50px" />
        </div>
        <div class="container-fluid p-4">
            <div class=" form-group row w-200 text-right">
             
                    <label for="" class="col-1 col-form-label text-right">التاريخ:</label>
                   {{$Non_conformities->date_1}}
                   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <label for="" class="col-2 col-form-label text-left">الجهة المختصة:</label>
                {{$Non_conformities->competent_authority}}
              
            </div>
            <br>
            <div class=" form-group row w-200 text-right">
                <div class="col-6">
                    <label for="" class="col-4 col-form-label text-right">حالة عدم مطابقة بنظام:</label>
                    {{$Non_conformities->non_compliance_system}}
                </div>
            </div>
            <br>
            <div class=" form-group row w-200 text-left">
                <label for="" class="col-6 col-form-label text-right">(1) ملخص وتحليل حالة عدم المطابقة فى </label> :</label>
                <div class="col-12">
                    <textarea type="text" class="form-control" name="summary_analysis"> {{$Non_conformities->summary_analysis}}</textarea>
                </div>
            </div>
            <br><br>
            <div class="form-group row w-100 text-right" style="text-align:center ;">
                <table class="table">
                    <tr>
                        <th cscope="col" colspan="2" style="background-color:rgb(227, 252, 160)">مكتشف الحـــــــالة</th>
                        <th cscope="col" colspan="2" style="background-color:rgb(227, 252, 160)">مدير الإدارة المعنية</th>
                        <th cscope="col" colspan="2" style="background-color:rgb(227, 252, 160)">مدير الجودة</th>
                       
                    </tr>
                    <tr>
                       
                        <th scope="col" style="background-color:rgb(227, 252, 160)">الإسم :</th>
                        <th scope="col">{{$Non_conformities->name_1}}</th>
                        <th scope="col" style="background-color:rgb(227, 252, 160)">الإسم :</th>
                        <th scope="col">{{$Non_conformities->name_2}}</th>
                        <th scope="col" style="background-color:rgb(227, 252, 160)">الإسم : </th>
                        <th scope="col">{{$Non_conformities->name_3}}</th>
                    </tr>
                    <tr>
                      
                        <th scope="col" style="background-color:rgb(227, 252, 160)">الوظيفة : </th>
                        <th scope="col">{{$Non_conformities->employ_1}}</th>
                        <th scope="col" style="background-color:rgb(227, 252, 160)">الوظيفة :</th>
                        <th scope="col">{{$Non_conformities->employ_2}}</th>
                        <th scope="col" style="background-color:rgb(227, 252, 160)">الوظيفة :</th>
                        <th scope="col">{{$Non_conformities->employ_3}}</th>
                    </tr>
                </table>
            </div>
            <br><br>
            <hr width="1200px;" size="20" color="rgb(227, 252, 160)">
            <div class=" form-group row w-200 text-right">
                <label for="" class="col-3 col-form-label text-right">(2) دراسة الحالة من الإدارة المعنية:</label>
                <div class="col-5">
                    <textarea type="text" class="form-control" placeholder=":" name="case_study">{{$Non_conformities->case_study}}</textarea>
                </div>
            </div>
            <div class=" form-group row w-200 text-right">
                <label for="" class="col-3 col-form-label text-right">(3) القرار المتخذ :</label>
                <div class="col-5">
                    <textarea type="text" class="form-control" placeholder=":" name="decision_taken">{{$Non_conformities->decision_taken}}</textarea>
                </div>
            </div>
            <br><br>
            <table class="table">
                <thead>
                    <tr>
                        @if ($Non_conformities->status == 'inProgress' && Auth::user()->hasRole('Employee'))
                        <th class=" w-50 text-center col-2 ">
                            <div class="" style="text-align:center ;">
                                <label for="" class="" style="font-size:large;font-weight: bolder;">إعداد ( مراقب الجودة )  </label>
                            </div>
                            <div class="form-group row w-10 text-center">
                                <div class="col-6">
                                    <label for="" class="col-1 col-form-label">الإسم :   </label>
                                    {{$Non_conformities->name_4}}
                                </div>
                            </div>
                        </th>
                        @endif
                        @if ($Non_conformities->status == 'confirmed' && Auth::user()->hasRole('Employee'))
                        <th class=" w-50 text-center col-2 ">
                            <div class="" style="text-align:center ;">
                                <label for="" class="" style="font-size:large;font-weight: bolder;">إعداد ( مراقب الجودة )  </label>
                            </div>
                            <div class="form-group row w-10 text-center">
                                <div class="col-6">
                                    <label for="" class="col-1 col-form-label">الإسم :   </label>
                              {{$Non_conformities->name_4}}
                                </div>
                            </div>

                        </th>
                        <th class=" w-50 text-center col-2 ">
                            <div class="" style="text-align:center ;">
                                <label for="" class="" style="text-align:center;font-size:large;font-weight: bolder;">إعتماد ( مدير الأداره )     </label>
                            </div>
                            <div class="form-group row w-10 text-center">
                                <div class="col-6">
                                    <label for="" class="col-1 col-form-label">الإسم :   </label>
                                   {{$Non_conformities->name_5}}
                                </div>
                            </div>
                        </th>
                        @endif
                        @if (Auth::user()->hasRole('Admin'))
                        <th class=" w-50 text-center col-2 ">
                            <div class="" style="text-align:center ;">
                                <label for="" class="" style="font-size:large;font-weight: bolder;">إعداد ( مراقب الجودة )  </label>
                            </div>
                            <div class="form-group row w-10 text-center">
                                <div class="col-6">
                                    <label for="" class="col-1 col-form-label">الإسم :   </label>
                                    {{$Non_conformities->name_4}}
                                </div>
                            </div>
                        </th>
                        @if ($Non_conformities->status == 'confirmed' && Auth::user()->hasRole('Admin'))
                        <th class=" w-50 text-center col-2 ">
                            <div class="" style="text-align:center ;">
                                <label for="" class="" style="text-align:center;font-size:large;font-weight: bolder;">إعتماد ( مدير الأداره )     </label>
                            </div>
                            <div class="form-group row w-10 text-center">
                                <div class="col-6">
                                    <label for="" class="col-1 col-form-label">الإسم :   </label>
                                  {{$Non_conformities->name_5}}
                                </div>
                            </div>
                        </th>
                        @endif
                        @endif
                        @if (Auth::user()->hasRole('SuperAdmin'))
                        <th class=" w-50 text-center col-2 ">
                            <div class="" style="text-align:center ;">
                                <label for="" class="" style="font-size:large;font-weight: bolder;">إعداد ( مراقب الجودة )  </label>
                            </div>
                            <div class="form-group row w-10 text-center">
                                <label for="" class="col-1 col-form-label">الإسم :   </label>
                                <div class="col-6">
                                    {{$Non_conformities->name_4}}
                                </div>
                            </div>

                        </th>
                        <th class=" w-50 text-center col-2 ">
                            <div class="" style="text-align:center ;">
                                <label for="" class="" style="text-align:center;font-size:large;font-weight: bolder;">إعتماد ( مدير الأداره )     </label>
                            </div>
                            <div class="form-group row w-10 text-center">
                                <div class="col-6">
                                    <label for="" class="col-1 col-form-label">الإسم :   </label>
                                   {{$Non_conformities->name_5}}
                                </div>
                            </div>
                        </th>
                        @endif
                    </tr>
                </thead>
            </table>
            <br><br>
            <hr width="1200px;" size="20" color="rgb(227, 252, 160)">
            <div class=" form-group row w-200 text-right">
                <label for="" class="col-3 col-form-label text-right">(4) متابعة تنفيذ القرار </label>
                <div class="col-5">
                    <textarea type="text" class="form-control" placeholder=":" name="follow_up_decision">{{$Non_conformities->follow_up_decision}}</textarea>
                </div>
            </div>
            <br><br>
            <div class=" form-group row w-200 text-right">
                <div class="col-2">
                    <label for="" class="col-1 col-form-label text-right">الاسم:</label>
                  {{$Non_conformities->name_6}}
                </div>
                <div class="col-2">
                    <label for="" class="col-1 col-form-label text-right">الوظيفة:</label>
                   {{$Non_conformities->employ_4}}
                </div>
                <div class="col-3">
                    <label for="" class="col-1 col-form-label text-right">التاريخ  :</label>
                    {{$Non_conformities->date_2}}
                </div>
            </div>
            <br><br>
            <div style="" class="w-100 text-left my-4">
                <label>(5) دراسة تنفيذ وفاعلية القرار المتخذ ومدى الحاجة لإجراء تصحيحي/ وقائي:</label>
            </div>
            <div style="" class="w-100 text-left my-4">
                <input type="checkbox" name="effectively_implemented" value="1" {{ $Non_conformities->effectively_implemented=="1"? 'checked':'' }}
                <?php if ( $Non_conformities->effectively_implemented=="1") {
                    echo 'checked="checked"';
                } ?>
                >
                <label for="" class="col-2 col-form-label text-left">تم التنفيذ بفاعلية    :</label>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <input type="checkbox"name="implemented_needs_corrective" value="1" {{ $Non_conformities->implemented_needs_corrective=="1"? 'checked':'' }}
                <?php if ( $Non_conformities->implemented_needs_corrective=="1") {
                    echo 'checked="checked"';
                } ?>
                >
                <label for="" class="col-3 col-form-label text-left">تم التنفيذ لكن يحتاج لإجراء تصحيحي /وقائي برقم :</label>
                <input type="text" name="number_2" value="{{$Non_conformities->number_2}}">


            </div>
            <br><br><br><br>
            <div class=" form-group row w-200 text-left">
                <div class="col-3">
                    <label for="" class="col-1 col-form-label text-left">الاسم:</label>
                    <input type="text" class="form-control" name="name_7" value="{{$Non_conformities->name_7}}">
                </div>
                <div class="col-3">
                    <label for="" class="col-1 col-form-label text-left">الوظيفة :</label>
                    <input type="text" class="form-control" name="employ_5" value="{{$Non_conformities->employ_5}}">
                </div>
            </div>

        </div>
        <br><br>
        <table>
            <thead>
                <tr>
                    <th>
                        <div class="" style="text-align:start ;">
                            {{ $Non_conformities->company_name }}
                        </div>

                    </th>
                    <th>
                        <div class="" style="text-align:start ;">
                            {{ $Non_conformities->date2 }}
                        </div>

                    </th>
                    <th>
                        <div class="" style="text-align:start ;">
                            {{ $Non_conformities->date3 }}
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