@extends('layouts.master')
@section('content')

    <div class="card">
        <div class="card-body">
            <h3 style="margin-top:85px;">طلب إصدار / تعديل / إلغاء وثيقة</h3>
            <hr>
            <form action="{{ route('issuanceRequest.update', $issuanceRequest->id) }}" method="post"
                enctype="multipart/form-data" id="fo1">
                @method('PUT')
                {{ csrf_field() }}
                <div style="" class="w-100 text-center my-4">
                    <h2>طلب إصدار / تعديل / إلغاء وثيقة</h2>
                    <hr class="w-100">
                </div>
                <div id="mainDiv" style=" margin-right:500px;">
                    <h4 style=" color:blue;">CO LOGO</h4>
                    <hr width="50%" size="20" color="blue">
                    <img src="{{ asset($issuanceRequest->logo) }}" height=180px width=210px; />
                    @if ($issuanceRequest->status == 'pending' && Auth::user()->hasRole('Employee'))
                        <input type="file" id="img" name="logo" accept="image/*">
                    @endif

                    @if (($issuanceRequest->status == 'inProgress' && Auth::user()->hasRole('Admin')) ||
                        ($issuanceRequest->status == 'pending' && Auth::user()->hasRole('Admin')))
                        <input type="file" id="img" name="logo" accept="image/*">
                    @endif
                    @if (($issuanceRequest->status == 'inProgress' && Auth::user()->hasRole('SuperAdmin')) ||
                        ($issuanceRequest->status == 'pending' && Auth::user()->hasRole('SuperAdmin')) ||
                        ($issuanceRequest->status == 'confirmed' && Auth::user()->hasRole('SuperAdmin')))
                        <input type="file" id="img" name="logo" accept="image/*">
                    @endif
                </div>
                <div class="form-group text-left">
                    <label for="" class="col-1 col-form-label">1- الإدارة :</label>
                    <div class="col-4">
                        <input type="text" class="form-control" name="management"
                            value="{{ $issuanceRequest->management }}">
                    </div>
                    <div class="vertical"></div>
                    <label for="" class="col-2 col-form-label">التاريخ :</label>
                    <div class="col-4">
                        <input type="date" class="form-control" name="date_1" value="{{ $issuanceRequest->date_1 }}">
                    </div>
                </div>
                <hr class="w-100">
                <div class="form-group  text-left">
                    <label for="" class="col-2 col-form-label">2- نوع وإسم الوثيقة</label>
                    <div class="col-12">
                        <textarea type="text" class="form-control" placeholder="  ......" name="document_type_and_name">{{ $issuanceRequest->document_type_and_name }}</textarea>
                    </div>
                </div>
                <div class="form-group row w-100 text-left">
                    <label for="" class="col-1 col-form-label">3- رمز الوثيقة :</label>
                    <div class="col-3">
                        <input type="text" class="form-control" name="document_code"
                            value="{{ $issuanceRequest->document_code }}">
                    </div>
                    <label for="" class="col-1 col-form-label text-left">رقم الإصدار</label>
                    <div class="col-3">
                        <input type="text" class="form-control" name="issue_number"
                            value="{{ $issuanceRequest->issue_number }}">
                    </div>
                    <label for="" class="col-1 col-form-label text-left">تاريخ الإصدار :</label>
                    <div class="col-3">
                        <input type="date" class="form-control" name="release_date"
                            value="{{ $issuanceRequest->release_date }}">
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
                    </div>
                    <div class="col-4 col-form-label">
                        <input type="radio" name="summary" value="update" <?php if ($issuanceRequest->summary == 'update') {
                            echo 'checked="checked"';
                        } ?>>
                        <label for="" class="col-2 col-form-label text-left">تعديل </label>
                    </div>
                    <div class="col-3 col-form-label">
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
                    <label for="" class="col-1 col-form-label">الإسم </label>
                    <div class="col-4">
                        <input type="text" class="form-control" placeholder="  ......" name="applicant"
                            value="{{ $issuanceRequest->applicant }}">
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

                                        <input class="form-control" type="text" name="quality_manager_name" readonly
                                            style="text-align: end;" placeholder=""
                                            value="{{ $issuanceRequest->quality_manager_name }}">
                                    </div>

                                </th>
                                <th class=" text-center col-4 ">
                                    <div class="" style="text-align:start ;">
                                        <label for="" class=""
                                            style="text-align: center;font-size:large;font-weight: bolder;">
                                            الوظيفة :</label>

                                        <input class="form-control" type="text" name="quality_manager_job"
                                            style="text-align: end;" value="{{ $issuanceRequest->quality_manager_job }}"
                                            readonly>
                                    </div>

                                </th>
                                <th class=" text-center col-4 ">
                                    <div class="" style="text-align:start ;">
                                        <label for="" class=""
                                            style="text-align: center;font-size:large;font-weight: bolder;">التاريخ
                                            :</label>

                                        <input class="form-control" type="date" name="quality_manager_date"
                                            value="{{ $issuanceRequest->quality_manager_date }}" style="text-align: end;"
                                            readonly>
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

                                        <input class="form-control" type="text" name="quality_manager_name" readonly
                                            style="text-align: end;" placeholder=""
                                            value="{{ $issuanceRequest->quality_manager_name }}">
                                    </div>

                                </th>
                                <th class=" text-center col-4 ">
                                    <div class="" style="text-align:start ;">
                                        <label for="" class=""
                                            style="text-align: center;font-size:large;font-weight: bolder;">
                                            الوظيفة :</label>

                                        <input class="form-control" type="text" name="quality_manager_job"
                                            style="text-align: end;" value="{{ $issuanceRequest->quality_manager_job }}"
                                            readonly>
                                    </div>

                                </th>
                                <th class=" text-center col-4 ">
                                    <div class="" style="text-align:start ;">
                                        <label for="" class=""
                                            style="text-align: center;font-size:large;font-weight: bolder;">التاريخ
                                            :</label>

                                        <input class="form-control" type="date" name="quality_manager_date"
                                            value="{{ $issuanceRequest->quality_manager_date }}" style="text-align: end;"
                                            readonly>
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

                                        <input class="form-control" type="text" readonly name="document_approved_name"
                                            value="{{ $issuanceRequest->document_approved_name }}"style="text-align: end;"
                                            placeholder="">
                                    </div>

                                </th>
                                <th class=" text-center col-4 ">
                                    <div class="" style="text-align:start ;">
                                        <label for="" class=""
                                            style="text-align: center;font-size:large;font-weight: bolder;">
                                            الوظيفة :</label>

                                        <input class="form-control" type="text" name="document_approved_job" readonly
                                            value="{{ $issuanceRequest->document_approved_job }}"
                                            style="text-align: end;" placeholder="">
                                    </div>

                                </th>
                                <th class=" text-center col-4 ">
                                    <div class="" style="text-align:start ;">
                                        <label for="" class=""
                                            style="text-align: center;font-size:large;font-weight: bolder;">التاريخ
                                            :</label>

                                        <input class="form-control" type="date" name="document_approved_date" readonly
                                            value="{{ $issuanceRequest->document_approved_date }}"
                                            style="text-align: end;">
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

                                        <input class="form-control" type="text" name="quality_manager_name"
                                            style="text-align: end;" placeholder=""
                                            value="{{ $issuanceRequest->quality_manager_name }}">
                                    </div>

                                </th>
                                <th class=" text-center col-4 ">
                                    <div class="" style="text-align:start ;">
                                        <label for="" class=""
                                            style="text-align: center;font-size:large;font-weight: bolder;">
                                            الوظيفة :</label>

                                        <input class="form-control" type="text" name="quality_manager_job"
                                            style="text-align: end;" value="{{ $issuanceRequest->quality_manager_job }}">
                                    </div>

                                </th>
                                <th class=" text-center col-4 ">
                                    <div class="" style="text-align:start ;">
                                        <label for="" class=""
                                            style="text-align: center;font-size:large;font-weight: bolder;">التاريخ
                                            :</label>

                                        <input class="form-control" type="date" name="quality_manager_date"
                                            value="{{ $issuanceRequest->quality_manager_date }}"
                                            style="text-align: end;">
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

                                            <input class="form-control" readonly type="text"
                                                name="document_approved_name"
                                                value="{{ $issuanceRequest->document_approved_name }}"style="text-align: end;"
                                                placeholder="">
                                        </div>

                                    </th>
                                    <th class=" text-center col-4 ">
                                        <div class="" style="text-align:start ;">
                                            <label for="" class=""
                                                style="text-align: center;font-size:large;font-weight: bolder;">
                                                الوظيفة :</label>

                                            <input class="form-control" readonly type="text"
                                                name="document_approved_job"
                                                value="{{ $issuanceRequest->document_approved_job }}"
                                                style="text-align: end;" placeholder="">
                                        </div>

                                    </th>
                                    <th class=" text-center col-4 ">
                                        <div class="" style="text-align:start ;">
                                            <label for="" class=""
                                                style="text-align: center;font-size:large;font-weight: bolder;">التاريخ
                                                :</label>

                                            <input class="form-control" readonly type="date"
                                                name="document_approved_date"
                                                value="{{ $issuanceRequest->document_approved_date }}"
                                                style="text-align: end;">
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
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th class="  text-center col-4 ">
                                    <div class="" style="text-align:start ;">
                                        <label for="" class=""
                                            style="text-align: center;font-size:large;font-weight: bolder;">
                                            الاسم :</label>

                                        <input class="form-control" type="text" name="quality_manager_name"
                                            style="text-align: end;" placeholder=""
                                            value="{{ $issuanceRequest->quality_manager_name }}">
                                    </div>

                                </th>
                                <th class=" text-center col-4 ">
                                    <div class="" style="text-align:start ;">
                                        <label for="" class=""
                                            style="text-align: center;font-size:large;font-weight: bolder;">
                                            الوظيفة :</label>

                                        <input class="form-control" type="text" name="quality_manager_job"
                                            style="text-align: end;" value="{{ $issuanceRequest->quality_manager_job }}">
                                    </div>

                                </th>
                                <th class=" text-center col-4 ">
                                    <div class="" style="text-align:start ;">
                                        <label for="" class=""
                                            style="text-align: center;font-size:large;font-weight: bolder;">التاريخ
                                            :</label>

                                        <input class="form-control" type="date" name="quality_manager_date"
                                            value="{{ $issuanceRequest->quality_manager_date }}"
                                            style="text-align: end;">
                                    </div>
                                </th>
                            </tr>
                        </thead>
                    </table>
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
                                            الاسم :</label>

                                        <input class="form-control" type="text" name="document_approved_name"
                                            value="{{ $issuanceRequest->document_approved_name }}"style="text-align: end;"
                                            placeholder="">
                                    </div>

                                </th>
                                <th class=" text-center col-4 ">
                                    <div class="" style="text-align:start ;">
                                        <label for="" class=""
                                            style="text-align: center;font-size:large;font-weight: bolder;">
                                            الوظيفة :</label>

                                        <input class="form-control" type="text" name="document_approved_job"
                                            value="{{ $issuanceRequest->document_approved_job }}"
                                            style="text-align: end;" placeholder="">
                                    </div>

                                </th>
                                <th class=" text-center col-4 ">
                                    <div class="" style="text-align:start ;">
                                        <label for="" class=""
                                            style="text-align: center;font-size:large;font-weight: bolder;">التاريخ
                                            :</label>

                                        <input class="form-control" type="date" name="document_approved_date"
                                            value="{{ $issuanceRequest->document_approved_date }}"
                                            style="text-align: end;">
                                    </div>
                                </th>
                            </tr>
                        </thead>
                    </table>
                @endif
                <table class="table">
                    <thead>
                        <tr>
                            <th>
                                <div class="" style="text-align:start ;">
                                    <input class="form-control" type="text" name="company_name"
                                        value="{{ $issuanceRequest->company_name }}"placeholder="اسم الشركة  :">
                                </div>

                            </th>
                            <th>
                                <div class="" style="text-align:start ;">
                                    <input class="form-control" type="text" name="date2"
                                        value="{{ $issuanceRequest->date2 }}"placeholder="تاريخ الإصدار   :"
                                        onfocus="(this.type='date')" onblur="(this.type='text')">
                                </div>

                            </th>
                            <th>
                                <div class="" style="text-align:start ;">
                                    <input class="form-control" type="text" name="date3"
                                        value="{{ $issuanceRequest->date3 }}" placeholder="تاريخ التعديل :"
                                        onfocus="(this.type='date')" onblur="(this.type='text')">
                                </div>

                            </th>
                            <th>
                                <div class="" style="text-align:start ;">
                                    <label for="" class=""
                                        style="text-align: center;font-size:large;font-weight: bolder;"> مدة
                                        الحفظ :
                                        سنتان </label>
                                </div>

                            </th>
                            <th>
                                <div class="" style="text-align:start ;">
                                    <label for="" class=""
                                        style="text-align: center;font-size:large;font-weight: bolder;"> رقم
                                        الصفحة : 1 /
                                        1</label>
                                </div>
                            </th>
                            <th>
                                <div class="" style="text-align:start ;">
                                    <label for="" class=""
                                        style="text-align: center;font-size:large;font-weight: bolder;"> رقم
                                        الوثيقة : QA – F
                                        - 13 </label>
                                </div>
                            </th>
                        </tr>
                    </thead>
                </table>

                @if ($issuanceRequest->status == 'pending' && Auth::user()->hasRole('Employee'))
                    <div class="form-group">
                        <button style="border-radius:20px;margin: 50px; width:10% ; height: 5%;" type="submit"
                            class="btn btn-primary"><i class="fas fa-save" style="width:15% ; height: 20%;">تعديل
                            </i></button>
                    </div>
                @elseif(($issuanceRequest->status == 'inProgress' && Auth::user()->hasRole('Admin')) ||
                    ($issuanceRequest->status == 'pending' && Auth::user()->hasRole('Admin')))
                    <div class="form-group">
                        <button style="border-radius:20px;margin: 50px; width:10% ; height: 5%;" type="submit"
                            class="btn btn-primary"><i class="fas fa-save" style="width:15% ; height: 20%;">تعديل
                            </i></button>
                    </div>
                @elseif(($issuanceRequest->status == 'inProgress' && Auth::user()->hasRole('SuperAdmin')) ||
                    ($issuanceRequest->status == 'pending' && Auth::user()->hasRole('SuperAdmin')) ||
                    ($issuanceRequest->status == 'confirmed' && Auth::user()->hasRole('SuperAdmin')))
                    <div class="form-group">
                        <button style="border-radius:20px;margin: 50px; width:10% ; height: 5%;" type="submit"
                            class="btn btn-primary"><i class="fas fa-save" style="width:15% ; height: 20%;">تعديل
                            </i></button>
                    </div>
                @endif
            </form>
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
    @stop
