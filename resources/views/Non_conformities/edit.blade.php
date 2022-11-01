@extends('layouts.master')
@section('content')

<div class="card">
<div class="card-body">
    <h3 style="margin-top:85px;">حالات عدم المطابقة</h3>
    <hr>
    <form action="{{route('Non_conformities.update',$Non_conformities->id)}}" method="post" enctype="multipart/form-data" id="fo1">
        @method('PUT')
        {{ csrf_field() }}
        <div style="" class="w-100 text-center my-4">
            <h2>حالات عدم المطابقة رقم </h2>
            <input style="text-align: center;" type="text"  name="number_1" value="{{$Non_conformities->number_1}}">
            <hr width="1300px;" size="20" color="black">
        </div>
        <div id="mainDiv"  style=" margin-right:500px;">
            <h4 style=" color:blue;">CO LOGO</h4>
            <hr width="50%" size="20" color="blue">
            <img src="{{ asset($Non_conformities->logo) }}" height=180px width=210px; />
            @if ($Non_conformities->status == 'pending' && Auth::user()->hasRole('Employee'))

            <input type="file" id="img" name="logo" accept="image/*">
        @endif

        @if (($Non_conformities->status == 'inProgress' && Auth::user()->hasRole('Admin')) ||
        ($Non_conformities->status == 'pending' && Auth::user()->hasRole('Admin')))
            <input type="file" id="img" name="logo" accept="image/*">
        @endif
        @if (($Non_conformities->status == 'inProgress' && Auth::user()->hasRole('SuperAdmin')) ||
            ($Non_conformities->status == 'pending' && Auth::user()->hasRole('SuperAdmin')) ||
            ($Non_conformities->status == 'confirmed' && Auth::user()->hasRole('SuperAdmin')))
            <input type="file" id="img" name="logo" accept="image/*">
        @endif
</div>
        <div class="container-fluid p-4">
            <div class=" form-group row w-200 text-right">
                <label for="" class="col-1 col-form-label text-right">التاريخ:</label>
                <div class="col-4">
                    <input type="date" class="form-control" name="date_1"  value="{{$Non_conformities->date_1}}">
                </div>
                <label for="" class="col-2 col-form-label text-left">الجهة المختصة:</label>
                <div class="col-5">
                    <input type="text" class="form-control" name="competent_authority"  value="{{$Non_conformities->competent_authority}}">
                </div>
            </div>
            <div class=" form-group row w-200 text-right">
                <label for="" class="col-4 col-form-label text-right">حالة عدم مطابقة بنظام:</label>
                <div class="col-6">
                    <input type="text" class="form-control" name="non_compliance_system"  value="{{$Non_conformities->non_compliance_system}}">
                </div>
            </div>
            <div class=" form-group row w-200 text-left">
                <label for="" class="col-6 col-form-label text-right">(1) ملخص وتحليل حالة عدم المطابقة فى </label> :</label>
                <div class="col-12">
                    <textarea type="text" class="form-control" name="summary_analysis"> {{$Non_conformities->summary_analysis}}</textarea>
                </div>
            </div>
            <div class="form-group row w-100 text-right" style="text-align:center ;">
                <table class="table">
                    <tr>
                        <th cscope="col" colspan="2" style="background-color:rgb(227, 252, 160)">مكتشف الحـــــــالة</th>
                        <th cscope="col" colspan="2" style="background-color:rgb(227, 252, 160)">مدير الإدارة المعنية</th>
                        <th cscope="col" colspan="2" style="background-color:rgb(227, 252, 160)">مدير الجودة</th>
                       
                    </tr>
                    <tr>
                       
                        <th scope="col" style="background-color:rgb(227, 252, 160)">الإسم</th>
                        <th scope="col"><input class="form-control" type="text" name="name_1" value="{{$Non_conformities->name_1}}"></th>
                        <th scope="col" style="background-color:rgb(227, 252, 160)">الإسم</th>
                        <th scope="col"><input class="form-control" type="text" name="name_2" value="{{$Non_conformities->name_2}}"></th>
                        <th scope="col" style="background-color:rgb(227, 252, 160)">الإسم</th>
                        <th scope="col"><input class="form-control" type="text" name="name_3" value="{{$Non_conformities->name_3}}"></th>
                    </tr>
                    <tr>
                      
                        <th scope="col" style="background-color:rgb(227, 252, 160)">الوظيفة</th>
                        <th scope="col"><input class="form-control" type="text" name="employ_1" value="{{$Non_conformities->employ_1}}"></th>
                        <th scope="col" style="background-color:rgb(227, 252, 160)">الوظيفة</th>
                        <th scope="col"><input class="form-control" type="text" name="employ_2" value="{{$Non_conformities->employ_2}}"></th>
                        <th scope="col" style="background-color:rgb(227, 252, 160)">الوظيفة</th>
                        <th scope="col"><input class="form-control" type="text" name="employ_3" value="{{$Non_conformities->employ_3}}"></th>
                    </tr>
                </table>
            </div>
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
            <table class="table">
                <thead>
                    <tr>
                        @if ($Non_conformities->status == 'inProgress' && Auth::user()->hasRole('Employee'))
                        <th class=" w-50 text-center col-2 ">
                            <div class="" style="text-align:center ;">
                                <label for="" class="" style="font-size:large;font-weight: bolder;">إعداد ( مراقب الجودة )  </label>
                            </div>
                            <div class="form-group row w-10 text-center">
                                <label for="" class="col-1 col-form-label">الإسم   </label>
                                <div class="col-6">
                                    <input type="text" class="form-control" readonly placeholder="  ......" name="name_4" value="{{$Non_conformities->name_4}}">
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
                                <label for="" class="col-1 col-form-label">الإسم   </label>
                                <div class="col-6">
                                    <input type="text" readonly class="form-control" placeholder="  ......" name="name_4" value="{{$Non_conformities->name_4}}">
                                </div>
                            </div>

                        </th>
                        <th class=" w-50 text-center col-2 ">
                            <div class="" style="text-align:center ;">
                                <label for="" class="" style="text-align:center;font-size:large;font-weight: bolder;">إعتماد ( مدير الأداره )     </label>
                            </div>
                            <div class="form-group row w-10 text-center">
                                <label for="" class="col-1 col-form-label">الإسم   </label>
                                <div class="col-6">
                                    <input type="text" readonly class="form-control" placeholder="  ......" name="name_5" value="{{$Non_conformities->name_5}}">
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
                                <label for="" class="col-1 col-form-label">الإسم   </label>
                                <div class="col-6">
                                    <input type="text" class="form-control" placeholder="  ......" name="name_4" value="{{$Non_conformities->name_4}}">
                                </div>
                            </div>
                        </th>
                        @if ($Non_conformities->status == 'confirmed' && Auth::user()->hasRole('Admin'))
                        <th class=" w-50 text-center col-2 ">
                            <div class="" style="text-align:center ;">
                                <label for="" class="" style="text-align:center;font-size:large;font-weight: bolder;">إعتماد ( مدير الأداره )     </label>
                            </div>
                            <div class="form-group row w-10 text-center">
                                <label for="" class="col-1 col-form-label">الإسم   </label>
                                <div class="col-6">
                                    <input type="text" class="form-control" readonly placeholder="  ......" name="name_5" value="{{$Non_conformities->name_5}}">
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
                                <label for="" class="col-1 col-form-label">الإسم   </label>
                                <div class="col-6">
                                    <input type="text" class="form-control" placeholder="  ......" name="name_4" value="{{$Non_conformities->name_4}}">
                                </div>
                            </div>

                        </th>
                        <th class=" w-50 text-center col-2 ">
                            <div class="" style="text-align:center ;">
                                <label for="" class="" style="text-align:center;font-size:large;font-weight: bolder;">إعتماد ( مدير الأداره )     </label>
                            </div>
                            <div class="form-group row w-10 text-center">
                                <label for="" class="col-1 col-form-label">الإسم   </label>
                                <div class="col-6">
                                    <input type="text" class="form-control" placeholder="  ......" name="name_5" value="{{$Non_conformities->name_5}}">
                                </div>
                            </div>
                        </th>
                        @endif
                    </tr>
                </thead>
            </table>
            <hr width="1200px;" size="20" color="rgb(227, 252, 160)">
            <div class=" form-group row w-200 text-right">
                <label for="" class="col-3 col-form-label text-right">(4) متابعة تنفيذ القرار </label>
                <div class="col-5">
                    <textarea type="text" class="form-control" placeholder=":" name="follow_up_decision">{{$Non_conformities->follow_up_decision}}</textarea>
                </div>
            </div>
            <div class=" form-group row w-200 text-right">
                <label for="" class="col-1 col-form-label text-right">الاسم:</label>
                <div class="col-2">
                    <input type="text" class="form-control" name="name_6" value="{{$Non_conformities->name_6}}"  >
                </div>
                <label for="" class="col-1 col-form-label text-right">الوظيفة:</label>
                <div class="col-2">
                    <input type="text" class="form-control" name="employ_4" value="{{$Non_conformities->employ_4}}">
                </div>
                <label for="" class="col-1 col-form-label text-right">التاريخ  :</label>
                <div class="col-3">
                    <input type="date" class="form-control" name="date_2" value="{{$Non_conformities->date_2}}">
                </div>
            </div>
            <div style="" class="w-100 text-left my-4">
                <label>(5) دراسة تنفيذ وفاعلية القرار المتخذ ومدى الحاجة لإجراء تصحيحي/ وقائي:</label>
            </div>
            <div style="" class="w-100 text-left my-4">
                <input type="checkbox" name="effectively_implemented" value="1" {{ $Non_conformities->effectively_implemented=="1"? 'checked':'' }}>
                <label for="" class="col-2 col-form-label text-left">تم التنفيذ بفاعلية    :</label>
                <input type="checkbox"name="implemented_needs_corrective" value="1" {{ $Non_conformities->implemented_needs_corrective=="1"? 'checked':'' }}>
                <label for="" class="col-3 col-form-label text-left">تم التنفيذ لكن يحتاج لإجراء تصحيحي /وقائي برقم :</label>
                <input type="text" name="number_2" value="{{$Non_conformities->number_2}}">


            </div>
            <div class=" form-group row w-200 text-left">
                <label for="" class="col-1 col-form-label text-left">الاسم:</label>
                <div class="col-3">
                    <input type="text" class="form-control" name="name_7" value="{{$Non_conformities->name_7}}">
                </div>
                <label for="" class="col-1 col-form-label text-left">الوظيفة :</label>
                <div class="col-3">
                    <input type="text" class="form-control" name="employ_5" value="{{$Non_conformities->employ_5}}">
                </div>
            </div>

        </div>
        <table class="table">
            <thead>
                <tr>
                    <th>
                      <div class="" style="text-align:start ;">
                        <input class="form-control" type="text" name="company_name" placeholder="اسم الشركة  :"  value="{{ $Non_conformities->company_name }}">
                      </div>
            
                    </th>
                    <th>
                      <div class="" style="text-align:start ;">
                        <input class="form-control" type="text" name="date2"  value="{{ $Non_conformities->date2 }}" placeholder="تاريخ الإصدار   :" onfocus="(this.type='date')" onblur="(this.type='text')">
                      </div>
            
                    </th>
                    <th>
                        <div class="" style="text-align:start ;">
                            <input class="form-control" type="text" name="date3"  value="{{ $Non_conformities->date3 }}" placeholder="تاريخ التعديل :" onfocus="(this.type='date')" onblur="(this.type='text')">
                          </div>
            
                    </th>
                    <th>
                      <div class="" style="text-align:start ;">
                            <label for="" class="" style="text-align: center;font-size:large;font-weight: bolder;"> مدة الحفظ :
                                سنتان </label>
                      </div>
            
                    </th>
                    <th>
                      <div class="" style="text-align:start ;">
                        <label for="" class="" style="text-align: center;font-size:large;font-weight: bolder;"> رقم الصفحة : 1 /
                          1</label>
                      </div>
                    </th>
                    <th>
                      <div class="" style="text-align:start ;">
                        <label for="" class="" style="text-align: center;font-size:large;font-weight: bolder;"> رقم الوثيقة : QA – F
                          - 13 </label>
                      </div>
                    </th>
                  </tr>
            </thead>
        </table>
    </div>
    @if ($Non_conformities->status == 'pending' && Auth::user()->hasRole('Employee'))
    <div class="form-group">
        <button style="border-radius:20px;margin: 50px; width:10% ; height: 5%;" type="submit"
            class="btn btn-primary"><i class="fas fa-save" style="width:15% ; height: 20%;">تعديل
            </i></button>
    </div>
@elseif(($Non_conformities->status == 'inProgress' && Auth::user()->hasRole('Admin')) ||
    ($Non_conformities->status == 'pending' && Auth::user()->hasRole('Admin')))
    <div class="form-group">
        <button style="border-radius:20px;margin: 50px; width:10% ; height: 5%;" type="submit"
            class="btn btn-primary"><i class="fas fa-save" style="width:15% ; height: 20%;">تعديل
            </i></button>
    </div>
@elseif(($Non_conformities->status == 'inProgress' && Auth::user()->hasRole('SuperAdmin')) ||
    ($Non_conformities->status == 'pending' && Auth::user()->hasRole('SuperAdmin')) ||
    ($Non_conformities->status == 'confirmed' && Auth::user()->hasRole('SuperAdmin')))
    <div class="form-group">
        <button style="border-radius:20px;margin: 50px; width:10% ; height: 5%;" type="submit"
            class="btn btn-primary"><i class="fas fa-save" style="width:15% ; height: 20%;">تعديل
            </i></button>
    </div>
@endif
    </form>
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