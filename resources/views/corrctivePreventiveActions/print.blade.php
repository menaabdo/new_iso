@extends('layouts.print')
@section('content')
<style>
    input{
    box-shadow: 0 1rem 3rem rgba(0,0,0,.175)!important;
}
.form-control {
    display: block;
    width: 100%;
    padding: 0.375rem 0.75rem;
    font-size: .875rem;
    line-height: 1.5;
    color: #4F5467;
    background-color: #fff;
    border: 1px solid #e9ecef;
    border-radius: 2px;
    transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;
}
    </style>

<div class="card" >


<div class="container p-4" style='text-align:center;border:1px solid silver; box-shadow: 0 1rem 3rem rgba(0, 0, 0, .175) !important;'>
           <div style="" class="w-100 text-center my-4">
          <h2 style='text-align:center;margin-bottom:40px'> 
          <img src="{{ asset($corrctivePreventiveActions->logo) }}" style="border-radius: 6px;
    border: 2px solid #001635;
    margin: 10px;
    float: left;
    /* padding: 12px;" width="50px" height="50px" />

          <span style='font-family:Cursive;border-bottom: 1px solid silver;
    ; box-shadow: 0 1rem 3rem rgba(0, 0, 0, .175) !important;
    border-radius: 6px;
    padding: 10px;text-shadow: 1px 1px 1px #3ed3ea;padding-left: 40px;
    padding-right: 40px;
'> طلب إجراء تصحيحي / وقائي رقم
</span>
</h2>
                {{ $corrctivePreventiveActions->number }}
                <hr class="w-100">
            </div>
            <div>
               
            </div>
            <br><br>
            <div class="container-fluid p-4">
                <div class=" form-group row w-200 text-center">

                    <label for="" class="col-2 col-form-label text-left">تاريخ الطلب :</label>
                    {{ $corrctivePreventiveActions->application_date }}
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <label for="" class="col-2 col-form-label text-left"> الإدارة :</label>
                    {{ $corrctivePreventiveActions->management_1 }}

                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <label for="" class="col-2 col-form-label text-left">المرجع للطلب:</label>

                    {{ $corrctivePreventiveActions->reference_order }}

                </div>
                <hr class="w-100">
                <div style="" class="w-100 text-left my-4">
                    <input type="checkbox" name="non_matching" value="1"
                        {{ $corrctivePreventiveActions->non_matching == '1' ? 'checked' : '' }} <?php if ($corrctivePreventiveActions->non_matching == '1') {
                            echo 'checked="checked"';
                        } ?>>
                    <label for="" class="col-5 col-form-label text-left">حالة عدم مطابقة – تقرير رقم :</label>

                    <input type="text" class="form-control" name="number_2"
                        value="{{ $corrctivePreventiveActions->number_2 }}">
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                    <input type="checkbox" name="customer_complaint" value="1"
                        {{ $corrctivePreventiveActions->customer_complaint == '1' ? 'checked' : '' }} <?php if ($corrctivePreventiveActions->customer_complaint == '1') {
                            echo 'checked="checked"';
                        } ?>>
                    <label for="" class="col-5 col-form-label text-left">شكوى عميل رقم :</label>

                    <input type="text" class="form-control" name="number_4"
                        value="{{ $corrctivePreventiveActions->number_4 }}">

                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="checkbox" name="internal_review" value="1"
                        {{ $corrctivePreventiveActions->internal_review == '1' ? 'checked' : '' }} <?php if ($corrctivePreventiveActions->internal_review == '1') {
                            echo 'checked="checked"';
                        } ?>>
                    <label for="" class="col-5 col-form-label text-left">مراجعة داخلية رقم :</label>

                    <input type="text" class="form-control" name="number_3"
                        value="{{ $corrctivePreventiveActions->number_3 }}">


                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="checkbox" name="external_review" value="1"
                        {{ $corrctivePreventiveActions->external_review == '1' ? 'checked' : '' }} <?php if ($corrctivePreventiveActions->external_review == '1') {
                            echo 'checked="checked"';
                        } ?>>
                    <label for="" class="col-5 col-form-label text-left">مراجعة خارجيه رقم :</label>

                    <input type="text" class="form-control" name="number_5"
                        value="{{ $corrctivePreventiveActions->number_5 }}">

                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="checkbox" name="management_review" value="1"
                        {{ $corrctivePreventiveActions->management_review == '1' ? 'checked' : '' }} <?php if ($corrctivePreventiveActions->management_review == '1') {
                            echo 'checked="checked"';
                        } ?>>
                    <label for="" class="col-5 col-form-label text-left">مراجعة إدارة عليا رقم :</label>

                    <input type="text" class="form-control" name="number_6"
                        value="{{ $corrctivePreventiveActions->number_6 }}">


                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        &nbsp;&nbsp;
                    <input type="checkbox" name="other" value="1"
                        {{ $corrctivePreventiveActions->other == '1' ? 'checked' : '' }} <?php if ($corrctivePreventiveActions->other == '1') {
                            echo 'checked="checked"';
                        } ?>>
                    <label for="" class="col-5 col-form-label text-left">أخرى:</label>
            
                        <input type="text" class="form-control" name="other_1"
                            value="{{ $corrctivePreventiveActions->other_1 }}">
              
                </div>
                <hr class="w-100">
                <div class=" form-group row w-200 text-left">
                    <label for="" class="col-3 col-form-label text-right">(3) ملخص وتحليل المشكلة(تحديد الأسباب
                        الجذرية)::</label>
                    <div class="col-5">
                        <textarea type="text" class="form-control" placeholder=":" name="Summary_analysis">{{ $corrctivePreventiveActions->Summary_analysis }}</textarea>
                    </div>
                </div>
                <table class="table">
                    <thead>
                        <tr>
                            @if (Auth::user()->hasRole('Admin'))
                                <th class=" w-50 text-center col-2 ">
                                    <div class="" style="text-align:center ;">
                                        <label for="" class=""
                                            style="font-size:large;font-weight: bolder;">إعداد </label>
                                    </div>
                                    <div class="form-group row w-10 text-center">
                                        <label for="" class="col-2 col-form-label">الإسم : </label>
                                         {{ $corrctivePreventiveActions->name_4 }}
                                      

                                    </div>

                                </th>
                            @endif
                            @if (Auth::user()->hasRole('SuperAdmin'))
                                <th class=" w-50 text-center col-2 ">
                                    <div class="" style="text-align:center ;">
                                        <label for="" class=""
                                            style="font-size:large;font-weight: bolder;">إعداد </label>
                                    </div>
                                    <div class="form-group row w-10 text-center">
                                        <label for="" class="col-2 col-form-label">الإسم :  </label>
                                   
                                            {{ $corrctivePreventiveActions->name_4 }}
                                      

                                    </div>

                                </th>
                                <th class=" w-50 text-center col-2 ">
                                    <div class="" style="text-align:center ;">
                                        <label for="" class=""
                                            style="text-align:center;font-size:large;font-weight: bolder;"> مدير إدارة
                                        </label>
                                    </div>
                                    <div class="form-group row w-10 text-center">
                                        <div class="col-9">
                                            <label for="" class="col-2 col-form-label">اسم الاداره :  </label>
                                          {{ $corrctivePreventiveActions->mang_name }}
                                        </div>
                                        <div class="col-9">
                                            <label for="" class="col-2 col-form-label"> الإسم :  </label>
                                           {{ $corrctivePreventiveActions->name_5 }}
                                        </div>

                                    </div>
                                </th>
                            @endif
                        </tr>
                    </thead>
                </table>
                <hr class="w-100">
                <div class=" form-group row w-200 text-left">
                    <label for="" class="col-3 col-form-label text-right">(4) الإجراءات التصحيحية/الوقائية
                        المتخذة: </label>
                    <div class="col-8">
                        <textarea type="text" class="form-control" placeholder=":" name="corrective_actions">{{ $corrctivePreventiveActions->corrective_actions }}</textarea>
                    </div>

                    <label for="" class="col-3 col-form-label text-left">تاريخ التنفيذ المقترح : </label>
                  
                        {{ $corrctivePreventiveActions->implementation_date }}
                    

                </div>
                <br><br>
                <table class="table">
                    <thead>
                        <tr>
                            @if (Auth::user()->hasRole('Admin'))
                                <th class=" w-50 text-center col-2 ">
                                    <div class="" style="text-align:center ;">
                                        <label for="" class=""
                                            style="font-size:large;font-weight: bolder;">إعداد </label>
                                    </div>
                                    <div class="form-group row w-10 text-center">
                                        <div class="col-9">
                                            <label for="" class="col-2 col-form-label"> الإسم : </label>
                                            {{ $corrctivePreventiveActions->name }}
                                        </div>
                                        <div class="col-9">
                                            <label for="" class="col-2 col-form-label"> الوظيفه :  </label>
                                            {{ $corrctivePreventiveActions->employee_1 }}
                                        </div>
                                    </div>

                                </th>
                            @endif
                            @if (Auth::user()->hasRole('SuperAdmin'))
                                <th class=" w-50 text-center col-2 ">
                                    <div class="" style="text-align:center ;">
                                        <label for="" class=""
                                            style="font-size:large;font-weight: bolder;">إعداد </label>
                                    </div>
                                    <div class="form-group row w-10 text-center">
                                        <div class="col-9">
                                            <label for="" class="col-2 col-form-label"> الإسم : </label>
                                            {{ $corrctivePreventiveActions->name }}
                                        </div>
                                        <div class="col-9">
                                            <label for="" class="col-2 col-form-label"> الوظيفه :  </label>
                                            {{ $corrctivePreventiveActions->employee_1 }}
                                        </div>
                                    </div>

                                </th>
                                <th class=" w-50 text-center col-2 ">
                                    <div class="" style="text-align:center ;">
                                        <label for="" class=""
                                            style="text-align:center;font-size:large;font-weight: bolder;"> مدير إدارة
                                        </label>
                                    </div>
                                    <div class="form-group row w-10 text-center">
                                        <div class="col-9">
                                            <label for="" class="col-2 col-form-label">الإسم :  </label>
                                          {{ $corrctivePreventiveActions->name_1 }}
                                        </div>
                                        <label for="" class="col-2 col-form-label">التاريخ :  </label>
                                        <div class="col-9">
                                           {{ $corrctivePreventiveActions->date_1 }}
                                        </div>
                                    </div>
                                </th>
                            @endif
                        </tr>
                    </thead>
                </table>
                <hr class="w-100">
                <br><br>
                <div class=" form-group row w-200 text-right">
                    <label for="" class="col-3 col-form-label text-right">مراجعة واعتماد ممثل الإدارة :</label>
                    <div class="col-5">
                        <textarea type="text" class="form-control" name="approval_management">{{ $corrctivePreventiveActions->approval_management }}</textarea>
                    </div>
                </div>
                <br><br>
                <div class=" form-group row w-200 text-center">
                    <div class="col-2">
                        <label for="" class="col-2 col-form-label text-left"> الإسم :</label>
                       {{ $corrctivePreventiveActions->name_2 }}
                    </div>

                    <div class="col-2">
                        <label for="" class="col-2 col-form-label text-left"> التاريخ :</label>
                      {{ $corrctivePreventiveActions->date_2 }}
                    </div>
                </div>
                <hr class="w-100">

                <div class="form-group row w-100 text-left">
                    <label>(6) مراجعة تنفيذ وفاعلية الإجراء التصحيحي/الوقائى المتخذ :</label>
                </div>
                <div style="" class="w-100 text-left my-8">
                    <input type="checkbox" name="done_1" value="1"
                        {{ $corrctivePreventiveActions->done_1 == '1' ? 'checked' : '' }}
                        <?php if ($corrctivePreventiveActions->done_1 == '1') {
                            echo 'checked="checked"';
                        } ?>
                        >

                    <label for="" class="col-3 col-form-label text-left">تم التنفيذ بفاعلية ويتم إقفال الطلب
                        :</label>

                       
                    <input type="checkbox" name="done_2" value="1"
                        {{ $corrctivePreventiveActions->done_2 == '1' ? 'checked' : '' }}
                        <?php if ($corrctivePreventiveActions->done_2 == '1') {
                            echo 'checked="checked"';
                        } ?>
                        >
                    <label for="" class="col-3 col-form-label text-left"> تم التنفيذ لكن يحتاج لإجراء تصحيحي آخر
                        برقم :</label>
                    <input type="text" name="number_done" value="{{ $corrctivePreventiveActions->number_done }}">
                </div>
                <div style="" class="w-100 text-left my-4">
                    <input type="checkbox" name="not_done" value="1"
                        {{ $corrctivePreventiveActions->not_done == '1' ? 'checked' : '' }}
                        <?php if ($corrctivePreventiveActions->not_done == '1') {
                            echo 'checked="checked"';
                        } ?>
                        >
                    <label for="" class="col-3 col-form-label text-left">لم يتم التنفيذ </label>
                    
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;
                    <input type="checkbox" name="need_done" value="1"
                        {{ $corrctivePreventiveActions->need_done == '1' ? 'checked' : '' }}
                        <?php if ($corrctivePreventiveActions->need_done == '1') {
                            echo 'checked="checked"';
                        } ?>>
                    <label for="" class="col-2 col-form-label text-left">يحتاج لإجراء وقائي برقم </label>
                    <input type="text" name="number_need_done"
                        value="{{ $corrctivePreventiveActions->number_need_done }}">
                </div>
                <br><br><br><br>
                <div class="form-group row  text-left">
                    <div class="col-2">
                        <label for="" class="col-1 col-form-label">الإسم:</label>
                       {{ $corrctivePreventiveActions->name_3 }}
                    </div>

                    <div class="col-2">
                        <label for="" class="col-2 col-form-label">الوظيفة:</label>
                        {{ $corrctivePreventiveActions->employee }}
                    </div>
                </div>
                <div class="form-group row w-100 text-center">
                    <h4>
                        * يحفظ الأصل بإدارة الجودة وترسل صورة منه للجهة المعنية .
                    </h4>
                </div>

            </div>
<br><br>
            <table class="table" style=' border:none;
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
                        <th>
                            <div class="" style="text-align:start ;">
                                {{ $corrctivePreventiveActions->company_name }}
                            </div>

                        </th>
                        <th>
                            <div class="" style="text-align:start ;">
                               {{ $corrctivePreventiveActions->date2 }}
                            </div>

                        </th>
                        <th>
                            <div class="" style="text-align:start ;">
                            {{ $corrctivePreventiveActions->date3 }}
                            </div>

                        </th>
                        <th>
                            <div class="" style="text-align:start ;">
                                <label for="" class=""
                                    style="text-align: center;"> مدة الحفظ :
                                    سنتان </label>
                            </div>

                        </th>
                        <th>
                            <div class="" style="text-align:start ;">
                                <label for="" class=""
                                    style="text-align: center;"> رقم الصفحة : 1 / 1</label>
                            </div>
                        </th>
                        <th>
                            <div class="" style="text-align:start ;">
                                <label for="" class=""
                                    style="text-align: center;"> رقم الوثيقة : QA–F-13 </label>
                            </div>
                        </th>
                    </tr>
                </thead>
            </table>
            
        </div>
        <style>
            .table thead th {
                vertical-align: bottom;
                /* border-bottom: 2px solid black; */
            }

            table,
            th,
            td,
            tr {
                border: 1px solid black;
                /* border-bottom: 2px solid black;
                border-top: 2px solid black; */
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
