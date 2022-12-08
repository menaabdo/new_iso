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
                <img src="{{ asset($issuanceRequest->logo) }}" style="border-radius: 6px;
    border: 2px solid #001635;
    margin: 10px;
    float: left;
    /* padding: 12px;" width="50px" height="50px" />
                <span style='font-family:Cursive;border-bottom: 1px solid silver;
    ; box-shadow: 0 1rem 3rem rgba(0, 0, 0, .175) !important;
    border-radius: 6px;
    padding: 10px;text-shadow: 1px 1px 1px #3ed3ea;padding-left: 40px;
    padding-right: 40px;
'>طلب إصدار / تعديل / إلغاء وثيقة</span>
</h2>
                   
                </div>
                <div>
                   
                </div>
                <div class="form-group text-left">
                    <div class="col-4">
                        <label for="" class="col-1 col-form-label">1- الإدارة :</label>
                        <input readonly style=' box-shadow: 0 1rem 3rem rgba(0, 0, 0, .175) !important;border:none;
    text-align: center;   ' value='{{ $issuanceRequest->management }}'>
                     
                        <label for="" class="col-2 col-form-label">التاريخ :</label>
                        <input readonly style=' box-shadow: 0 1rem 3rem rgba(0, 0, 0, .175) !important;border:none;
    text-align: center;   ' value=' {{ $issuanceRequest->date_1 }}'>
                    </div>
                </div>
                <hr class="w-100">
                <div class="form-group  text-left">
                    <div class="col-12">
                        <label for="" class="col-2 col-form-label">2- نوع وإسم الوثيقة</label>
                        <textarea type="text" class="form-control" style='vertical-align: middle;    width: 70%;' name="meeting_purpose" >
                        {{ $issuanceRequest->document_type_and_name }}
                   
                    </textarea>
                   </div>
                </div>
                <div class="form-group row w-100 text-left">
                    <div class="col-3" style='margin: 12px;'>
                        <label for="" class="col-1 col-form-label">3- رمز الوثيقة :</label>
                        <input readonly style=' box-shadow: 0 1rem 3rem rgba(0, 0, 0, .175) !important;border:none;
    text-align: center;   ' value=' {{ $issuanceRequest->document_code }}'>
                    </div>
                    <div class="col-3">
                        <label for="" class="col-1 col-form-label text-left">رقم الإصدار</label>
                        <input readonly style=' box-shadow: 0 1rem 3rem rgba(0, 0, 0, .175) !important;border:none;
    text-align: center;   ' value='{{ $issuanceRequest->issue_number }}'>
                    
                        <label for="" class="col-1 col-form-label text-left">تاريخ الإصدار :</label>
                        <input readonly style=' box-shadow: 0 1rem 3rem rgba(0, 0, 0, .175) !important;border:none;
    text-align: center;   ' value=' {{ $issuanceRequest->release_date }}'>
                    </div>
                </div>
                <hr class="w-100">
                <div class="form-group row w-100 text-right">
                    <h2 for="" class="col-2 col-form-label">4- ملخص المطلوب وسببه :</h2>
                    <div class="col-4 col-form-label" style='    margin: 12px;'>
                        <input type="radio" name="summary" value="issuance" <?php if ($issuanceRequest->summary == 'issuance') {
                            echo 'checked="checked"';
                        } ?>>

                        <label for="" class="col-2 col-form-label text-left">إصدار </label>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <input type="radio" name="summary" value="update" <?php if ($issuanceRequest->summary == 'update') {
                            echo 'checked="checked"';
                        } ?>>
                        <label for="" class="col-2 col-form-label text-left">تعديل </label>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <input type="radio" name="summary" value="cancel" <?php if ($issuanceRequest->summary == 'cancel') {
                            echo 'checked="checked"';
                        } ?>>
                        <label for="" class="col-2 col-form-label text-left">إلغاء </label>
                    </div>
                    <div class="col-12">
                    <textarea type="text" class="form-control" style='vertical-align: middle;    width: 70%;' name="meeting_purpose" >
                     
                {{ $issuanceRequest->reason }}</textarea>
                    </div>
                </div>
                <hr class="w-100">
                <div class="form-group row w-200 text-left">
                    <h2 for="" class="col-2 col-form-label">5- التعديلات المقترحة </h2>
                    <div class="col-12">
                    <textarea type="text" class="form-control" style='vertical-align: middle;    width: 70%;' name="meeting_purpose" >
                     
                     {{ $issuanceRequest->suggested_modifications }}</textarea>
                    </div>
                </div>
                <hr class="w-100">
                <div class="form-group text-left">
                    <h2 for="" class="col-2 col-form-label">مقدم الطلب :</h2>
                </div>
                <div class="form-group row w-10 text-center">
                    <div class="col-4">
                        <label for="" class="col-1 col-form-label">الإسم :  </label>
                        <input readonly style=' box-shadow: 0 1rem 3rem rgba(0, 0, 0, .175) !important;border:none;
    text-align: center;   ' value='{{ $issuanceRequest->applicant }}'>
                    </div>
                </div>
                @if ($issuanceRequest->status == 'inProgress' && Auth::user()->hasRole('Employee'))
                    <div class="form-group text-left">
                        <h1 for="" class="col-2 col-form-label">6- رأى مدير الجودة :</h1>
                        <div class="col-12">
                        <textarea type="text" class="form-control" style='vertical-align: middle;    width: 70%;' name="meeting_purpose" >
                     
                 
                        {{ $issuanceRequest->quality_manager }}</textarea>
                        </div>
                    </div>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th class="  text-center col-4 ">
                                    <div class="" style="text-align:start ;">
                                        
                                        <label for="" class=""
                                            style="text-align: center;font-size:large;font-weight: bolder;">
                                            الاسم :</label>
                                        {{ $issuanceRequest->quality_manager_name }}
                                    </div>

                                </th>
                                <th class=" text-center col-4 ">
                                    <div class="" style="text-align:start ;">
                                        <label for="" class=""
                                            style="text-align: center;font-size:large;font-weight: bolder;">
                                            الوظيفة :</label>

                                       {{ $issuanceRequest->quality_manager_job }}
                                    </div>

                                </th>
                                <th class=" text-center col-4 ">
                                    <div class="" style="text-align:start ;">
                                        <label for="" class=""
                                            style="text-align: center;font-size:large;font-weight: bolder;">التاريخ
                                            :</label>
                                    {{ $issuanceRequest->quality_manager_date }}
                                    </div>
                                </th>
                            </tr>
                        </thead>
                    </table>
                @endif
                @if ($issuanceRequest->status == 'confirmed' && Auth::user()->hasRole('Employee'))
                    <div class="form-group text-left">
                        <h1 for="" class="col-2 col-form-label">6- رأى مدير الجودة :</h1>
                        <div class="col-12">
                        <textarea type="text" class="form-control" style='vertical-align: middle;    width: 70%;' name="meeting_purpose" >
                     
                 
                            {{ $issuanceRequest->quality_manager }}</textarea>
                        </div>
                    </div>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th class="  text-center col-4 ">
                                    <div class="" style="text-align:start ;">
                                        <label for="" class=""
                                            style="text-align: center;font-size:large;font-weight: bolder;">
                                            الاسم :</label>
{{ $issuanceRequest->quality_manager_name }}
                                    </div>

                                </th>
                                <th class=" text-center col-4 ">
                                    <div class="" style="text-align:start ;">
                                        <label for="" class=""
                                            style="text-align: center;font-size:large;font-weight: bolder;">
                                            الوظيفة :</label>
                                    {{ $issuanceRequest->quality_manager_job }}
                                    </div>

                                </th>
                                <th class=" text-center col-4 ">
                                    <div class="" style="text-align:start ;">
                                        <label for="" class=""
                                            style="text-align: center;font-size:large;font-weight: bolder;">التاريخ
                                            :</label>{{ $issuanceRequest->quality_manager_date }}
                                    </div>
                                </th>
                            </tr>
                        </thead>
                    </table>
                    <hr class="w-100">
                    <div class="form-group row w-100 text-center">
                        <h1 for="" class="col-9 col-form-label">* في حالة وجود أكثر من إدارة ترفق موافقاتهم
                            وتوقيعهم في جدول يبين
                            الإدارة ورأيها وتوقيع المسئول</h1>
                    </div>

                    <div class="form-group row w-100 text-left">
                        <label for="" class="col-2 col-form-label">- قرار معتمد الوثيقة </label>
                        <div class="col-12">
                            <textarea type="text" class="form-control" readonly placeholder="  ......" name="document_approved_decision">{{ $issuanceRequest->document_approved_decision }}</textarea>
                        </div>
                    </div>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th class="  text-center col-4 ">
                                    <div class="" style="text-align:start ;">
                                        <label for="" class=""
                                            style="text-align: center;font-size:large;font-weight: bolder;">
                                            الاسم :</label>

                                       {{ $issuanceRequest->document_approved_name }}
                                    </div>

                                </th>
                                <th class=" text-center col-4 ">
                                    <div class="" style="text-align:start ;">
                                        <label for="" class=""
                                            style="text-align: center;font-size:large;font-weight: bolder;">
                                            الوظيفة :</label>

                                        {{ $issuanceRequest->document_approved_job }}
                                    </div>

                                </th>
                                <th class=" text-center col-4 ">
                                    <div class="" style="text-align:start ;">
                                        <label for="" class=""
                                            style="text-align: center;font-size:large;font-weight: bolder;">التاريخ
                                            :</label>

                                       {{ $issuanceRequest->document_approved_date }}
                                    </div>
                                </th>
                            </tr>
                        </thead>
                    </table>
                @endif

                @if (Auth::user()->hasRole('Admin'))
                    <hr class="w-100">
                    <div class="form-group text-left">
                        <h1 for="" class="col-2 col-form-label">6- رأى مدير الجودة :</h1>
                        <div class="col-12">
                        <textarea type="text" class="form-control" style='vertical-align: middle;    width: 70%;' name="meeting_purpose" >
                     
                 
                            {{ $issuanceRequest->quality_manager }}</textarea>
                        </div>
                    </div>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th class="  text-center col-4 ">
                                    <div class="" style="text-align:start ;">
                                        <label for="" class=""
                                            style="text-align: center;font-size:large;font-weight: bolder;">
                                            الاسم :</label>
{{ $issuanceRequest->quality_manager_name }}
                                    </div>

                                </th>
                                <th class=" text-center col-4 ">
                                    <div class="" style="text-align:start ;">
                                        <label for="" class=""
                                            style="text-align: center;font-size:large;font-weight: bolder;">
                                            الوظيفة :</label>{{ $issuanceRequest->quality_manager_job }}
                                    </div>

                                </th>
                                <th class=" text-center col-4 ">
                                    <div class="" style="text-align:start ;">
                                        <label for="" class=""
                                            style="text-align: center;font-size:large;font-weight: bolder;">التاريخ
                                            :</label>
{{ $issuanceRequest->quality_manager_date }}
                                    </div>
                                </th>
                            </tr>
                        </thead>
                    </table>
                    @if ($issuanceRequest->status == 'confirmed' && Auth::user()->hasRole('Admin'))
                        <div class="form-group row w-100 text-center">
                            <h1 for="" class="col-9 col-form-label">* في حالة وجود أكثر من إدارة ترفق موافقاتهم
                                وتوقيعهم في جدول يبين
                                الإدارة ورأيها وتوقيع المسئول</h1>
                        </div>

                        <div class="form-group row w-100 text-left">
                            <label for="" class="col-2 col-form-label">- قرار معتمد الوثيقة </label>
                            <div class="col-12">
                                <textarea type="text" readonly class="form-control" placeholder="  ......" name="document_approved_decision">{{ $issuanceRequest->document_approved_decision }}</textarea>
                            </div>
                        </div>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th class="  text-center col-4 ">
                                        <div class="" style="text-align:start ;">
                                            <label for="" class=""
                                                style="text-align: center;font-size:large;font-weight: bolder;">
                                                الاسم :</label>

                                            {{ $issuanceRequest->document_approved_name }}
                                        </div>

                                    </th>
                                    <th class=" text-center col-4 ">
                                        <div class="" style="text-align:start ;">
                                            <label for="" class=""
                                                style="text-align: center;font-size:large;font-weight: bolder;">
                                                الوظيفة :</label>

                                          {{ $issuanceRequest->document_approved_job }}
                                        </div>

                                    </th>
                                    <th class=" text-center col-4 ">
                                        <div class="" style="text-align:start ;">
                                            <label for="" class=""
                                                style="text-align: center;font-size:large;font-weight: bolder;">التاريخ
                                                :</label>

                                          {{ $issuanceRequest->document_approved_date }}
                                        </div>
                                    </th>
                                </tr>
                            </thead>
                        </table>
                    @endif
                @endif
                <hr class="w-100">
                @if (Auth::user()->hasRole('SuperAdmin'))
                    <div class="form-group text-left">
                        <h1 for="" class="col-2 col-form-label">6- رأى مدير الجودة :</h1>
                        <div class="col-12">
                        <textarea type="text" class="form-control" style='vertical-align: middle;    width: 70%;' name="meeting_purpose" >
                     
                 
                            {{ $issuanceRequest->quality_manager }}</textarea>
                        </div>
                    </div>
                    <br>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th class="  text-center col-4 ">
                                    <div class="" style="text-align:start ;">
                                        <label for="" class=""
                                            style="text-align: center;font-size:large;font-weight: bolder;">
                                            الاسم :</label>
                                            <input readonly style=' box-shadow: 0 1rem 3rem rgba(0, 0, 0, .175) !important;border:none;
    text-align: center;   ' value='{{ $issuanceRequest->quality_manager_name }}'>
                                    </div>

                                </th>
                                <th class=" text-center col-4 ">
                                    <div class="" style="text-align:start ;">
                                        <label for="" class=""
                                            style="text-align: center;font-size:large;font-weight: bolder;">
                                            الوظيفة :</label>

                                            <input readonly style=' box-shadow: 0 1rem 3rem rgba(0, 0, 0, .175) !important;border:none;
    text-align: center;   ' value=' {{ $issuanceRequest->quality_manager_job }}'>
                                    </div>

                                </th>
                                <th class=" text-center col-4 ">
                                    <div class="" style="text-align:start ;">
                                        <label for="" class=""
                                            style="text-align: center;font-size:large;font-weight: bolder;">التاريخ
                                            :</label>
                                            <input readonly style=' box-shadow: 0 1rem 3rem rgba(0, 0, 0, .175) !important;border:none;
    text-align: center;   ' value='{{ $issuanceRequest->quality_manager_date }}'>
                                    </div>
                                </th>
                            </tr>
                        </thead>
                    </table>
                    <br><br><br><br><br>
                    <div class="form-group row w-100 text-center">
                        <h4 for="" class="col-9 col-form-label">* في حالة وجود أكثر من إدارة ترفق موافقاتهم
                            وتوقيعهم في جدول يبين
                            الإدارة ورأيها وتوقيع المسئول</h4>
                    </div>

                    <div class="form-group row w-100 text-left">
                        <label for="" class="col-2 col-form-label">- قرار معتمد الوثيقة </label>
                        <div class="col-12">
                        <textarea type="text" class="form-control" style='vertical-align: middle;    width: 70%;' name="meeting_purpose">{{ $issuanceRequest->document_approved_decision }}</textarea>
                        </div>
                    </div>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th class="  text-center col-4 ">
                                    <div class="" style="text-align:start ;">
                                        <label for="" class=""
                                            style="text-align: center;font-size:large;font-weight: bolder;">
                                            الاسم :</label>
                                            <input readonly style=' box-shadow: 0 1rem 3rem rgba(0, 0, 0, .175) !important;border:none;
    text-align: center;   ' value=' {{ $issuanceRequest->document_approved_name }}'>
                                    </div>

                                </th>
                                <th class=" text-center col-4 ">
                                    <div class="" style="text-align:start ;">
                                        <label for="" class=""
                                            style="text-align: center;font-size:large;font-weight: bolder;">
                                            الوظيفة :</label>
                                            <input readonly style=' box-shadow: 0 1rem 3rem rgba(0, 0, 0, .175) !important;border:none;
    text-align: center;   ' value=' {{ $issuanceRequest->document_approved_job }}'>
                                    </div>

                                </th>
                                <th class=" text-center col-4 ">
                                    <div class="" style="text-align:start ;">
                                        <label for="" class=""
                                            style="text-align: center;font-size:large;font-weight: bolder;">التاريخ
                                            :</label>
                                            <input readonly style=' box-shadow: 0 1rem 3rem rgba(0, 0, 0, .175) !important;border:none;
    text-align: center;   ' value=' {{ $issuanceRequest->document_approved_date }}'>
                                    </div>
                                </th>
                            </tr>
                        </thead>
                    </table>
                @endif
                <br><br>
                <table class="" style="  ; border:none;padding:12px;margin-top:12px;background-color: #001635;
    color: white;text-shadow: none;width: 97%;
    margin: auto;
    margin-bottom: 12px;    font-size: 12px;padding: 1px;">
                    <thead>
                        <tr>
                            <th>
                                <div class="" style="text-align:start ;">
                                   {{ $issuanceRequest->company_name }}
                                </div>

                            </th>
                            <th>
                                <div class="" style="text-align:start ;">
                                  {{ $issuanceRequest->date2 }}
                                </div>

                            </th>
                            <th>
                                <div class="" style="text-align:start ;">
                                 {{ $issuanceRequest->date3 }}
                                </div>

                            </th>
                            <th>
                                <div class="" style="text-align:start ;">
                                    <label for="" class=""
                                        style="text-align: center;"> مدة
                                        الحفظ :  سنتان </label>
                                </div>

                            </th>
                            <th>
                                <div class="" style="text-align:start ;">
                                    <label for="" class=""
                                        style="text-align: center;;"> رقم
                                        الصفحة : 1 / 1</label>
                                </div>
                            </th>
                            <th>
                                <div class="" style="text-align:start ;">
                                    <label for="" class=""
                                        style="text-align: center"> رقم
                                        الوثيقة : QA–F-13 </label>
                                </div>
                            </th>
                        </tr>
                    </thead>
                </table>


        </div>

        <style>
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
