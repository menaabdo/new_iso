@extends('layouts.print')
@section('content')

    <div class="card">
        <div class="card-body">
                <div style="" class="w-100 text-center my-4">
                    <h2>طلب إصدار / تعديل / إلغاء وثيقة</h2>
                    <hr class="w-100">
                </div>
                <div>
                    <img src="{{ asset($issuanceRequest->logo) }}" style="float: left;" width="100px" height="50px" />
                   
                </div>
                <div class="form-group text-left">
                    <div class="col-4">
                        <label for="" class="col-1 col-form-label">1- الإدارة :</label>
                       {{ $issuanceRequest->management }}
                       &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <label for="" class="col-2 col-form-label">التاريخ :</label>
                       {{ $issuanceRequest->date_1 }}
                    </div>
                </div>
                <hr class="w-100">
                <div class="form-group  text-left">
                    <div class="col-12">
                        <label for="" class="col-2 col-form-label">2- نوع وإسم الوثيقة</label>
                        {{ $issuanceRequest->document_type_and_name }}
                    </div>
                </div>
                <div class="form-group row w-100 text-left">
                    <div class="col-3">
                        <label for="" class="col-1 col-form-label">3- رمز الوثيقة :</label>
                       {{ $issuanceRequest->document_code }}
                    </div>
                    <div class="col-3">
                        <label for="" class="col-1 col-form-label text-left">رقم الإصدار</label>
                      {{ $issuanceRequest->issue_number }}
                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <label for="" class="col-1 col-form-label text-left">تاريخ الإصدار :</label>
                        {{ $issuanceRequest->release_date }}
                    </div>
                </div>
                <hr class="w-100">
                <div class="form-group row w-100 text-right">
                    <h2 for="" class="col-2 col-form-label">4- ملخص المطلوب وسببه :</h2>
                    <div class="col-4 col-form-label">
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
                        <textarea type="text" class="form-control" placeholder="  ......" name="reason">{{ $issuanceRequest->reason }}</textarea>
                    </div>
                </div>
                <hr class="w-100">
                <div class="form-group row w-200 text-left">
                    <h2 for="" class="col-2 col-form-label">5- التعديلات المقترحة </h2>
                    <div class="col-12">
                        <textarea type="text" class="form-control" placeholder="  ......" name="suggested_modifications">{{ $issuanceRequest->suggested_modifications }}</textarea>
                    </div>
                </div>
                <hr class="w-100">
                <div class="form-group text-left">
                    <h2 for="" class="col-2 col-form-label">مقدم الطلب :</h2>
                </div>
                <div class="form-group row w-10 text-center">
                    <div class="col-4">
                        <label for="" class="col-1 col-form-label">الإسم :  </label>
                       {{ $issuanceRequest->applicant }}
                    </div>
                </div>
                @if ($issuanceRequest->status == 'inProgress' && Auth::user()->hasRole('Employee'))
                    <div class="form-group text-left">
                        <h1 for="" class="col-2 col-form-label">6- رأى مدير الجودة :</h1>
                        <div class="col-12">
                            <textarea type="text" class="form-control" readonly name="quality_manager">{{ $issuanceRequest->quality_manager }}</textarea>
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
                            <textarea type="text" class="form-control" readonly name="quality_manager">{{ $issuanceRequest->quality_manager }}</textarea>
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
                            <textarea type="text" class="form-control" name="quality_manager">{{ $issuanceRequest->quality_manager }}</textarea>
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
                            <textarea type="text" class="form-control" name="quality_manager">{{ $issuanceRequest->quality_manager }}</textarea>
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
                    <br><br><br><br><br>
                    <div class="form-group row w-100 text-center">
                        <h1 for="" class="col-9 col-form-label">* في حالة وجود أكثر من إدارة ترفق موافقاتهم
                            وتوقيعهم في جدول يبين
                            الإدارة ورأيها وتوقيع المسئول</h1>
                    </div>

                    <div class="form-group row w-100 text-left">
                        <label for="" class="col-2 col-form-label">- قرار معتمد الوثيقة </label>
                        <div class="col-12">
                            <textarea type="text" class="form-control" placeholder="  ......" name="document_approved_decision">{{ $issuanceRequest->document_approved_decision }}</textarea>
                        </div>
                    </div>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th class="  text-center col-4 ">
                                    <div class="" style="text-align:start ;">
                                        <label for="" class=""
                                            style="text-align: center;font-size:large;font-weight: bolder;">
                                            الاسم :</label>{{ $issuanceRequest->document_approved_name }}
                                    </div>

                                </th>
                                <th class=" text-center col-4 ">
                                    <div class="" style="text-align:start ;">
                                        <label for="" class=""
                                            style="text-align: center;font-size:large;font-weight: bolder;">
                                            الوظيفة :</label>
"{{ $issuanceRequest->document_approved_job }}
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
                <br><br>
                <table class="table">
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
                                        style="text-align: center;font-size:large;font-weight: bolder;"> مدة
                                        الحفظ :  سنتان </label>
                                </div>

                            </th>
                            <th>
                                <div class="" style="text-align:start ;">
                                    <label for="" class=""
                                        style="text-align: center;font-size:large;font-weight: bolder;"> رقم
                                        الصفحة : 1 / 1</label>
                                </div>
                            </th>
                            <th>
                                <div class="" style="text-align:start ;">
                                    <label for="" class=""
                                        style="text-align: center;font-size:large;font-weight: bolder;"> رقم
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
