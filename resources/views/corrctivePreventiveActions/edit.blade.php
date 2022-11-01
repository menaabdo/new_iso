@extends('layouts.master')
@section('content')


<div class="card">
<div class="card-body">
    <h3 style="margin-top:85px;">طلب إجراء تصحيحي / وقائي</h3>
    <hr>
    <form action="{{route('corrctivePreventiveActions.update',$corrctivePreventiveActions->id)}}" method="post" enctype="multipart/form-data" id="fo1">
        @method('PUT')
        {{ csrf_field() }}
        <div style="" class="w-100 text-center my-4">
            <h2>طلب إجراء تصحيحي / وقائي</h2>
            <input style="text-align: center;" type="text"  name="number" value="{{$corrctivePreventiveActions->number}}">
            <hr class="w-100">
        </div>
        <div id="mainDiv"  style=" margin-right:500px;">
            <h4 style=" color:blue;">CO LOGO</h4>
            <hr width="50%" size="20" color="blue">
            <img src="{{ asset($corrctivePreventiveActions->logo) }}" height=180px width=210px; />
            <input type="file" id="img" name="logo" accept="image/*">
        </div>
       
        <div class="container-fluid p-4">
            <div class=" form-group row w-200 text-center">
                <label for="" class="col-2 col-form-label text-left">تاريخ الطلب :</label>
                <div class="col-4">
                    <input type="date" class="form-control" name="application_date" value="{{$corrctivePreventiveActions->application_date}}">
                </div>

                <label for="" class="col-2 col-form-label text-left">  الإدارة :</label>
                <div class="col-4">
                    <input type="text" class="form-control" name="management_1" value="{{$corrctivePreventiveActions->management_1}}">
                </div>
            </div>
            <div class=" form-group row w-200 text-center">
                <label for="" class="col-2 col-form-label text-left">المرجع للطلب:</label>
                <div class="col-4">
                    <input type="date" class="form-control" name="reference_order" value="{{$corrctivePreventiveActions->reference_order}}">
                </div>
            </div>
            <hr class="w-100">
            <div style="" class="w-100 text-left my-4">
                <input type="checkbox" name="non_matching" value="1" {{ $corrctivePreventiveActions->non_matching=="1"? 'checked':'' }}>
                <label for="" class="col-5 col-form-label text-left">حالة عدم مطابقة – تقرير رقم     :</label>
                <div class="col-2">
                    <input type="text" class="form-control" name="number_2" value="{{$corrctivePreventiveActions->number_2}}">
                </div>

                <input type="checkbox" name="customer_complaint" value="1" {{ $corrctivePreventiveActions->customer_complaint=="1"? 'checked':'' }}>
                <label for="" class="col-5 col-form-label text-left">شكوى عميل رقم  :</label>
                <div class="col-2">
                    <input type="text" class="form-control" name="number_4" value="{{$corrctivePreventiveActions->number_4}}">
                </div>

                <input type="checkbox" name="internal_review" value="1" {{ $corrctivePreventiveActions->internal_review=="1"? 'checked':'' }}>
                <label for="" class="col-5 col-form-label text-left">مراجعة داخلية رقم :</label>
                <div class="col-2">
                    <input type="text" class="form-control" name="number_3" value="{{$corrctivePreventiveActions->number_3}}">
                </div>
            </div>
                
                <input type="checkbox" name="external_review" value="1" {{ $corrctivePreventiveActions->external_review=="1"? 'checked':'' }}>
                <label for="" class="col-5 col-form-label text-left">مراجعة خارجيه رقم :</label>
                <div class="col-2">
                    <input type="text" class="form-control" name="number_5" value="{{$corrctivePreventiveActions->number_5}}">
                </div>
         
                <input type="checkbox" name="management_review" value="1" {{ $corrctivePreventiveActions->management_review=="1"? 'checked':'' }}>
                <label for="" class="col-5 col-form-label text-left">مراجعة إدارة عليا رقم  :</label>
                <div class="col-2">
                    <input type="text" class="form-control" name="number_6" value="{{$corrctivePreventiveActions->number_6}}">
                </div>


                <input type="checkbox" name="other" value="1" {{ $corrctivePreventiveActions->other=="1"? 'checked':'' }}>
                <label for="" class="col-5 col-form-label text-left">أخرى:</label>
                <div class="col-2">
                    <input type="text" class="form-control" name="other_1" value="{{$corrctivePreventiveActions->other_1}}">
                </div>
            </div>
            <hr class="w-100">
            <div class=" form-group row w-200 text-left">
                <label for="" class="col-3 col-form-label text-right">(3) ملخص وتحليل المشكلة(تحديد الأسباب الجذرية)::</label>
                <div class="col-5">
                    <textarea type="text" class="form-control" placeholder=":" name="Summary_analysis">{{$corrctivePreventiveActions->Summary_analysis}}</textarea>
                </div>
            </div>
            <table class="table">
                <thead>
                    <tr>
                        @if (Auth::user()->hasRole('Admin'))
                        <th class=" w-50 text-center col-2 ">
                            <div class="" style="text-align:center ;">
                                <label for="" class="" style="font-size:large;font-weight: bolder;">إعداد  </label>
                            </div>
                            <div class="form-group row w-10 text-center">
                                <label for="" class="col-2 col-form-label">الإسم   </label>
                                <div class="col-9">
                                    <input type="text" class="form-control" placeholder="  ......" name="name_4" value="{{$corrctivePreventiveActions->name_4}}">
                                </div>
                               
                            </div>

                        </th>
                        @endif
                        @if (Auth::user()->hasRole('SuperAdmin'))
                        <th class=" w-50 text-center col-2 ">
                            <div class="" style="text-align:center ;">
                                <label for="" class="" style="font-size:large;font-weight: bolder;">إعداد  </label>
                            </div>
                            <div class="form-group row w-10 text-center">
                                <label for="" class="col-2 col-form-label">الإسم   </label>
                                <div class="col-9">
                                    <input type="text" class="form-control" placeholder="  ......" name="name_4" value="{{$corrctivePreventiveActions->name_4}}">
                                </div>
                               
                            </div>

                        </th>
                        <th class=" w-50 text-center col-2 ">
                            <div class="" style="text-align:center ;">
                                <label for="" class="" style="text-align:center;font-size:large;font-weight: bolder;">  مدير إدارة </label>
                            </div>
                            <div class="form-group row w-10 text-center">
                                <label for="" class="col-2 col-form-label">اسم الاداره   </label>
                                <div class="col-9">
                                    <input type="text" class="form-control" placeholder="  ......" name="mang_name" value="{{$corrctivePreventiveActions->mang_name}}">
                                </div>
                                <label for="" class="col-2 col-form-label">الإسم   </label>
                                <div class="col-9">
                                    <input type="text" class="form-control" placeholder="  ......" name="name_5" value="{{$corrctivePreventiveActions->name_5}}">
                                </div>
                                
                            </div>
                        </th>
                        @endif
                    </tr>
                </thead>
            </table>
            <hr class="w-100">
            <div class=" form-group row w-200 text-left">
                <label for="" class="col-3 col-form-label text-right">(4) الإجراءات التصحيحية/الوقائية المتخذة: </label>
                <div class="col-8">
                    <textarea type="text" class="form-control" placeholder=":" name="corrective_actions">{{$corrctivePreventiveActions->corrective_actions}}</textarea>
                </div>

                <label for="" class="col-3 col-form-label text-left">تاريخ التنفيذ المقترح:</label>
                <div class="col-5">
                    <input type="date" class="form-control" name="implementation_date" value="{{$corrctivePreventiveActions->implementation_date}}">
                </div>

            </div>
            <table class="table">
                <thead>
                    <tr>
                        @if (Auth::user()->hasRole('Admin'))
                        <th class=" w-50 text-center col-2 ">
                            <div class="" style="text-align:center ;">
                                <label for="" class="" style="font-size:large;font-weight: bolder;">إعداد  </label>
                            </div>
                            <div class="form-group row w-10 text-center">
                                <label for="" class="col-2 col-form-label">الإسم   </label>
                                <div class="col-9">
                                    <input type="text" class="form-control" placeholder="  ......" name="name" value="{{$corrctivePreventiveActions->name}}">
                                </div>
                                <label for="" class="col-2 col-form-label">الوظيفه   </label>
                                <div class="col-9">
                                    <input type="text" class="form-control" placeholder="  ......" name="employee_1" value="{{$corrctivePreventiveActions->employee_1}}">
                                </div>
                            </div>

                        </th>
                        @endif
                        @if (Auth::user()->hasRole('SuperAdmin'))
                        <th class=" w-50 text-center col-2 ">
                            <div class="" style="text-align:center ;">
                                <label for="" class="" style="font-size:large;font-weight: bolder;">إعداد  </label>
                            </div>
                            <div class="form-group row w-10 text-center">
                                <label for="" class="col-2 col-form-label">الإسم   </label>
                                <div class="col-9">
                                    <input type="text" class="form-control" placeholder="  ......" name="name" value="{{$corrctivePreventiveActions->name}}">
                                </div>
                                <label for="" class="col-2 col-form-label">الوظيفه   </label>
                                <div class="col-9">
                                    <input type="text" class="form-control" placeholder="  ......" name="employee_1" value="{{$corrctivePreventiveActions->employee_1}}">
                                </div>
                            </div>

                        </th>
                        <th class=" w-50 text-center col-2 ">
                            <div class="" style="text-align:center ;">
                                <label for="" class="" style="text-align:center;font-size:large;font-weight: bolder;">                    مدير إدارة     </label>
                            </div>
                            <div class="form-group row w-10 text-center">
                                <label for="" class="col-2 col-form-label">الإسم   </label>
                                <div class="col-9">
                                    <input type="text" class="form-control" placeholder="  ......" name="name_1" value="{{$corrctivePreventiveActions->name_1}}">
                                </div>
                                <label for="" class="col-2 col-form-label">التاريخ   </label>
                                <div class="col-9">
                                    <input type="date" class="form-control" placeholder="  ......" name="date_1" value="{{$corrctivePreventiveActions->date_1}}">
                                </div>
                            </div>
                        </th>
                        @endif
                    </tr>
                </thead>
            </table>
            <hr class="w-100">
            <div class=" form-group row w-200 text-right">
                <label for="" class="col-3 col-form-label text-right">مراجعة واعتماد ممثل الإدارة :</label>
                <div class="col-5">
                    <textarea type="text" class="form-control" name="approval_management">{{$corrctivePreventiveActions->approval_management}}</textarea>
                </div>
            </div>
            <div class=" form-group row w-200 text-center">
                <label for="" class="col-2 col-form-label text-left"> الإسم  :</label>
                <div class="col-2">
                    <input type="text" class="form-control" name="name_2" value="{{$corrctivePreventiveActions->name_2}}">
                </div>

                <label for="" class="col-2 col-form-label text-left">  التاريخ :</label>
                <div class="col-2">
                    <input type="date" class="form-control" name="date_2" value="{{$corrctivePreventiveActions->date_2}}">
                </div>
            </div>
            <hr class="w-100">

            <div class="form-group row w-100 text-left">
                <label>(6) مراجعة تنفيذ وفاعلية الإجراء التصحيحي/الوقائى المتخذ :</label>
            </div>
            <div style="" class="w-100 text-left my-8">
                <input type="checkbox" name="done_1" value="1" {{ $corrctivePreventiveActions->done_1=="1"? 'checked':'' }}>
                <label for="" class="col-3 col-form-label text-left">تم التنفيذ بفاعلية ويتم إقفال الطلب :</label>
               
                <input type="checkbox" name="done_2" value="1" {{ $corrctivePreventiveActions->done_2=="1"? 'checked':'' }}>
                <label for="" class="col-3 col-form-label text-left">  تم التنفيذ لكن يحتاج لإجراء تصحيحي آخر برقم  :</label>
                <input type="text" name="number_done" value="{{$corrctivePreventiveActions->number_done}}">
            </div>
            <div style="" class="w-100 text-left my-4">
                <input type="checkbox" name="not_done" value="1" {{ $corrctivePreventiveActions->not_done=="1"? 'checked':'' }}>
                <label for="" class="col-3 col-form-label text-left">لم يتم التنفيذ </label>

                <input type="checkbox" name="need_done" value="1" {{ $corrctivePreventiveActions->need_done=="1"? 'checked':'' }}>
                <label for="" class="col-2 col-form-label text-left">يحتاج لإجراء وقائي برقم  </label>
                <input type="text" name="number_need_done" value="{{$corrctivePreventiveActions->number_need_done}}">
            </div>
            <div class="form-group row  text-left">
                <label for="" class="col-1 col-form-label">الإسم:</label>
                <div class="col-2">
                    <input type="text" class="form-control" name="name_3" value="{{$corrctivePreventiveActions->name_3}}">
                </div>
               
                <label for="" class="col-2 col-form-label">الوظيفة:</label>
                <div class="col-2">
                    <input type="text" class="form-control" name="employee" value="{{$corrctivePreventiveActions->employee}}">
                </div>
            </div>
            <div class="form-group row w-100 text-center">
                <h1>
                    * يحفظ الأصل بإدارة الجودة وترسل صورة منه للجهة المعنية .
                </h1>
            </div>

        </div>

        <table class="table">
            <thead>
                <tr>
                    <th>
                      <div class="" style="text-align:start ;">
                        <input class="form-control" type="text" name="company_name" placeholder="اسم الشركة  :"  value="{{ $corrctivePreventiveActions->company_name }}">
                      </div>
            
                    </th>
                    <th>
                      <div class="" style="text-align:start ;">
                        <input class="form-control" type="text" name="date2"  value="{{ $corrctivePreventiveActions->date2 }}" placeholder="تاريخ الإصدار   :" onfocus="(this.type='date')" onblur="(this.type='text')">
                      </div>
            
                    </th>
                    <th>
                        <div class="" style="text-align:start ;">
                            <input class="form-control" type="text" name="date3"  value="{{ $corrctivePreventiveActions->date3 }}" placeholder="تاريخ التعديل :" onfocus="(this.type='date')" onblur="(this.type='text')">
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
                    <div class="form-group">
                        <button style="border-radius:20px;margin: 50px; width:10% ; height: 5%;" type="submit"
                        class="btn btn-primary btn-lg"><i class="fas fa-save" style="width:15% ; height: 20%;"></i> حفظ </button>
                    </div>
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