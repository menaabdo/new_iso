@extends('layouts.master')
@section('content')
<style>
    a {
        box-shadow: 0 1rem 3rem rgba(0, 0, 0, .175) !important;
    }
    @media only screen and (max-width: 750px) {
        .card-body{
            width:80% !important;
        } 
        .card{
            height:1100px !important;
        }
    }


</style>
<div class='card' style='text-align:center ; height:500px; margin-top:50px '>
    <div class=" row" style=";margin:auto ;">
        <div class="card-body " style='width:20%;background-color: #001635;
    border-bottom: 4px solid #3ed3ea;
    border-radius: 10px;margin: 10px;'>

            <h5 class="card-title">
                <div class="dropdown">
                    <div style='color:white;' class="btn  dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                        <i class="fa fa-object-group" style='margin:4px'></i>
                        اهداف الجودة
                    </div>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="{{ route('sop.index') }}">اجراء اهداف الجودة</a>
                        <a class="dropdown-item" href="{{ route('sop.index') }}">خطة تنفيذ الهدف</a>
                    </div>
                </div>
            </h5>
        </div>
        <!--  -->
        <div class="card-body " style='width:20%;background-color: #001635;
    border-bottom: 4px solid #3ed3ea;
    border-radius: 10px;margin: 10px;'>
            <h5 class="card-title">
                <div class="dropdown">
                    <div style='color:white;' class="btn  dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                        <i class="fa fa-exclamation-triangle" style='margin:4px'></i>
                        تقييم المخاطر</div>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="{{ route('risksop.index') }}">اجراء تقييم المخاطر</a>
                        <a class="dropdown-item" href="{{ route('risk.index') }}">سجل حصر وتحديد المخاطر</a>

                    </div>
                </div>
            </h5>
        </div>
        <div class="card-body " style='width:20%;background-color: #001635;
    border-bottom: 4px solid #3ed3ea;
    border-radius: 10px;margin: 10px;'>


            <h5 class="card-title">
                <div class="dropdown">
                    <div style='color:white;' class="btn  dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                        <i class="fa fa-link" style='margin:4px'></i>
                        مراجعة داخلية</div>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="{{ route('interiorsop.index') }}">اجراء المراجعة الداخلية</a>
                        <a class="dropdown-item" href="{{ route('interior.index') }}">متابعة النتائج المراجعة الداخلية</a>
                        <a class="dropdown-item" href="{{ route('internalAudit.index') }}">مراجعات داخلية لنظام الجودة</a>
                        <a class="dropdown-item" href="{{ route('noticeInternal.index') }}">اخطار بمراجعات داخلية</a>
                        <a class="dropdown-item" href="{{ route('InternalAuditReport.index') }}">تقرير مراجعات داخلية</a>
                        <a class="dropdown-item" href="{{ route('listInternalAuditor.index') }}">مراجعيين داخليين لنظام الجودة</a>
                        <a class="dropdown-item" href="{{ route('assigned.index') }}">امر تكليف مراجعة داخلية</a>
                        <a class="dropdown-item" href="{{ route('work_plan.index') }}">خطة سنوية للمراجعة الداخيلية</a>


                    </div>
                </div>
            </h5>
        </div>
        <div class="card-body " style='width:20%;background-color: #001635;
    border-bottom: 4px solid #3ed3ea;
    border-radius: 10px;margin: 10px;'>


            <h5 class="card-title">
                <div class="dropdown">
                    <div style='color:white;' class="btn  dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                        <i class="fa fa-tasks" style='margin:4px'></i>
                        مراجعة الادارة</div>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="{{ route('meetingAgendasop.index') }}">اجراء مراجعة الادارة</a>
                        <a class="dropdown-item" href="{{ route('meetingAgenda.index') }}">اجندة اجتماع مراجعة الاارة</a>
                        <a class="dropdown-item" href="{{ route('invitationMeeting.index') }}">دعوة لاجتماع مراجعة الادارة</a>
                        <a class="dropdown-item" href="{{ route('followLog.index') }}">سجل متابعة قرارات </a>
                        <a class="dropdown-item" href="{{ route('meetingMinute.index') }}">مجضر اجتماع المراجعة</a>


                    </div>
                </div>

            </h5>
        </div>

        <!--  -->
    </div>
    <!--second row  -->
    <div class=" row" style=";margin:auto;">
        <div class="card-body " style='width:20%;background-color: #001635;
    border-bottom: 4px solid #3ed3ea;
    border-radius: 10px;margin: 10px;'>

            <h5 class="card-title">
                <div class="dropdown">
                    <div style='color:white;' class="btn  dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-sticky-note" style='margin:4px'></i>
                        مراقبة وضبط الوثائق
                    </div>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                     
                        <a href="{{ route('recordActionSop.index') }}"class="dropdown-item">
                            اجراء مراقبة وضبط الوثائق
                        </a>
                        <a href="{{ route('recordAction.index') }}"class="dropdown-item">
                           سجل حصر الاجراءات المستخدمة 
                        </a>
                        <a href="{{ route('recordModel.index') }}"class="dropdown-item">
                             سجل حصر النماذج المستخدمة 
                        </a>
                        <a href="{{ route('recordCanceledDocument.index') }}"class="dropdown-item">
                            سجل حصر الوثائق الملغاة
                        </a>
                        <a href="{{ route('issuanceRequest.index') }}"class="dropdown-item">
                            طلب إصدار / تعديل / إلغاء وثيقة
                        </a>
                        <a href="{{ route('directorList.index') }}"class="dropdown-item">
                           قائمة أسماء المديرين
                        </a>
                        <a href="{{ route('listDocument.index') }}"class="dropdown-item">
                             قائمة رئيسية للوثائق
                        </a>
                        <a href="{{ route('brokenRecord.index') }}"class="dropdown-item">
                           نماذج السجلات المعدمة
                        </a>
                        <a href="{{ route('typicalForm.index') }}"class="dropdown-item">
                             نموذج إستلام وثائق/نماذج
                           
                        </a>

                    </div>
                </div>
            </h5>
        </div>
        <!--  -->
        <div class="card-body " style='width:20%;background-color: #001635;
    border-bottom: 4px solid #3ed3ea;
    border-radius: 10px;margin: 10px;'>

            <h5 class="card-title">
                <div class="dropdown">
                    <div style='color:white;' class="btn  dropdown-toggle " type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-file-alt" style='margin:4px'></i>
                        التصحيحية الوقائية</div>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton" style='  box-shadow: 0 1rem 3rem rgba(0, 0, 0, .175) !important;
'>
                        <a class="dropdown-item" href="{{ route('corrctivePreventiveActionsSOP.index') }}">اجراءالتصحيحية الوقائية</a>
                        <a class="dropdown-item" href="{{ route('corrctivePreventiveActions.index') }}">طلب اجراء تصحيحي قائي</a>
                        <a class="dropdown-item" href="{{ route('Non_conformities.index') }}">حالات عدم المطابقة</a>
                        <a class="dropdown-item" href="{{ route('nonConformanceReport.index') }}">سجل متابعة تقارير عدم المطابقة</a>
                        <a class="dropdown-item" href="{{ route('followUpRecord.index') }}">سجل متابعة طلبات الاجراءات التصحيحية </a>
                        <a class="dropdown-item" href="{{ route('reportNonConformanceCases.index') }}">تقرير عدم المطابقةوالاجراءات التصحيحية</a>




                    </div>
                </div>
            </h5>
        </div>
        <div class="card-body " style='width:20%;background-color: #001635;
    border-bottom: 4px solid #3ed3ea;
    border-radius: 10px;margin: 10px;'>


            <h5 class="card-title">
                <div class="dropdown">
                    <div style='color:white;' class="btn  dropdown-toggle " type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-sitemap" style='margin:4px'></i>
                        فهم المنظمة وسياقها
                    </div>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton" style='  box-shadow: 0 1rem 3rem rgba(0, 0, 0, .175) !important;
'>
                        <a class="dropdown-item" href="{{ route('understandingOrganizationSOP.index') }}">اجراء فهم المنظمة وسياقها</a>
                        <a class="dropdown-item" href="{{ route('externalCases.index') }}">استمارة قضايا خارجية</a>
                        <a class="dropdown-item" href="{{ route('internalCases.index') }}">استمارة قضايا داخلية</a>
                        <a class="dropdown-item" href="{{ route('interestedParties.index') }}">استمارة الاطراف المهتمة</a>
                        <a class="dropdown-item" href="{{ route('swot.index') }}">تحليل(SWOT) </a>



                    </div>
                </div>

            </h5>
        </div>
       

        <!--  -->
    </div>
    <div class=" row" style=";margin:auto;">
     <div class="card-body " style='width:20%;background-color: #001635;
    border-bottom: 4px solid #3ed3ea;
    border-radius: 10px;margin: 10px;'>


            <h5 class="card-title">
                <div class="dropdown">
                    <div style='color:white;' class="btn  dropdown-toggle " type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-comments " style='margin:4px'></i>
                        قياس رضا العميل
                    </div>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton" style='  box-shadow: 0 1rem 3rem rgba(0, 0, 0, .175) !important;
'>
                        <a class="dropdown-item" href="{{ route('complaintsWorkSOP.index') }}">اجراءعمل الشكاوي وقياس رضا العميل</a>
                        <a class="dropdown-item" href="{{ route('customers.index') }}">العملاء</a>
                        <a class="dropdown-item" href="{{ route('questionnaireForms.index') }}">نموذج استبيان عن الدورة و المدرب</a>
                        <a class="dropdown-item" href="{{ route('customerComplaints.index') }}">متابعة شكاوي العميل</a>
                        <a class="dropdown-item" href="{{ route('customerSatisfactions.index') }}">قياس رضا العملاء</a>
                        <a class="dropdown-item" href="{{ route('complaintStudies.index') }}">تقرير دراسة شكوي العميل</a>


                    </div>
                </div>
            </h5>
        </div>
        <div class="card-body " style='width:20%;background-color: #001635;
    border-bottom: 4px solid #3ed3ea;
    border-radius: 10px;margin: 10px;'>

            <h5 class="card-title">
                <div class="dropdown">
                    <div style='color:white;' class="btn  dropdown-toggle " type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="	fas fa-retweet" style='margin:4px'></i>التحكم في التغيير
                    </div>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton" style='  box-shadow: 0 1rem 3rem rgba(0, 0, 0, .175) !important;
'>
                        <a class="dropdown-item" href="{{ route('changeControlSOP.index') }}">اجراء التحكم في التغيير</a>
                        <a class="dropdown-item" href="{{ route('changeControlRequests.index') }}">نموذج طلب التحكم في التغيير</a>



                    </div>
                </div>
            </h5>
        </div>
        <div class="card-body " style='width:20%;background-color: #001635;
    border-bottom: 4px solid #3ed3ea;
    border-radius: 10px;margin: 10px;'>

            <h5 class="card-title">
                <div class="dropdown">
                    <div style='color:white;' class="btn  dropdown-toggle " type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="	fas fa-sync-alt" style='margin:4px'></i>
                        التحسين المستمر
                    </div>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton" style='  box-shadow: 0 1rem 3rem rgba(0, 0, 0, .175) !important;
'>
                        <a class="dropdown-item" href="{{ route('ContinuousImprovementSOP.index') }}">اجراء التحسين المستمر</a>
                        <a class="dropdown-item" href="{{ route('contractStats.index') }}">احصائيات التعاقد</a>
                        <a class="dropdown-item" href="{{ route('trainingStats.index') }}">احصائيات التدريب</a>
                        <a class="dropdown-item" href="{{ route('nonConformanceStats.index') }}">احصائيات حالات عدم المطابقة</a>
                        <a class="dropdown-item" href="{{ route('followUpRecordImprovements.index') }}">سجل متابعة اعمال التحسين المستمر</a>
                        <a class="dropdown-item" href="{{ route('dataCollectionReports.index') }}">تقرير جمع وتحليل البيانات</a>
                        <a class="dropdown-item" href="{{ route('recordAnalysis.index') }}">سجل تحليل لشكاوي العملاء</a>


                    </div>
                </div>
            </h5>
        </div>
    </div>
    <!--  -->
</div>
@stop
