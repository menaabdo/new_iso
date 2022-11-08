<style>
 
 /* aside{
        background-color:white !important;
    } */
    .sidebar-nav .has-arrow::after{
        border-color:white !important;
    }
   ul li a{
        margin: 5px;
    padding: 3px;
    }
    
    </style>
<aside class="left-sidebar " style='border-radius: 10px;;margin-top:100px;border:1px solid;background:#001635 !important;'>
    
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
          
            <ul id="sidebarnav" style='background:none !important'>
                @if(Auth::user()->hasRole('SuperAdmin'))
                <li class="sidebar-item" style=' box-shadow: 0 1rem 3rem rgba(0,0,0,.175)!important;'>
                    <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)"
                        aria-expanded="false">
                        <i class="mdi mdi-tooltip-text"></i>
                        <span class="hide-menu">User </span>

                    </a>
                    <ul aria-expanded="false" class="collapse  first-level">
                        <li class="sidebar-item">
                            <a href="{{ route('users.index') }}" class="sidebar-link">
                                <i class="mdi mdi-adjust"></i>
                                <span class="hide-menu"> Users</span>
                            </a>
                        </li>

                    </ul>
                </li>
               
                    <li class="sidebar-item">
                        <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)"
                            aria-expanded="false">
                            <i class="mdi mdi-tooltip-text"></i>
                            <span class="hide-menu">Roles & Permissions </span>

                        </a>
                        <ul aria-expanded="false" class="collapse  first-level">
                            <li class="sidebar-item">
                                <a href="{{ route('index.roles') }}" class="sidebar-link">
                                    <i class="mdi mdi-adjust"></i>
                                    <span class="hide-menu"> Roles</span>
                                </a>
                            </li>
                            {{-- <li class="sidebar-item">
                                <a href="{{ route('index.permissions') }}" class="sidebar-link">
                                    <i class="mdi mdi-adjust"></i>
                                    <span class="hide-menu"> Permissions </span>
                                </a>
                            </li> --}}
                        </ul>
                    </li>

                    <li class="sidebar-item">
                        <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)"
                            aria-expanded="false">
                            <i class="mdi mdi-tooltip-text"></i>
                            <span class="hide-menu">ERP System </span>

                        </a>
                        <ul aria-expanded="false" class="collapse  first-level">
                            <li class="sidebar-item">
                                <a href="https://erp.iso-robot.co/" class="sidebar-link">
                                    <i class="mdi mdi-adjust"></i>
                                    <span class="hide-menu"> ERP</span>
                                </a>
                            </li>
                          
                        </ul>
                    </li>
                @endif
                <li class="sidebar-item">
                    <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)"
                        aria-expanded="false">
                        <i class="mdi mdi-tooltip-text"></i>
                       
                        <span class="hide-menu">اهداف الجوده </span>

                    </a>
                    <ul aria-expanded="false" class="collapse  first-level">
                        <li class="sidebar-item" style=' box-shadow: 0 1rem 3rem rgba(0,0,0,.175)!important;'>
                            <a href="{{ route('sop.index') }}" class="sidebar-link">
                                <i class="mdi mdi-adjust"></i>
                                <span class="hide-menu"> اجراء اهداف الجوده</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="{{ route('sop.index') }}" class="sidebar-link">
                                <i class="mdi mdi-adjust"></i>
                                <span class="hide-menu"> خطه تنفيذ هدف </span>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)"
                        aria-expanded="false">
                        <i class="mdi mdi-format-list-bulleted"></i>
                        <span class="hide-menu">تقيم المخاطر </span>

                    </a>
                    <ul aria-expanded="false" class="collapse  first-level">
                        <li class="sidebar-item">
                            <a href="{{ route('risksop.index') }}" class="sidebar-link">
                                <i class="mdi mdi-adjust"></i>
                                <span class="hide-menu"> اجراء تقيم المخاطر</span>
                            </a>
                        </li>
                        <li class="sidebar-item" >
                            <a href="{{ route('risk.index') }}" class="sidebar-link">
                                <i class="mdi mdi-adjust"></i>
                                <span style='    font-size: 10;' class="hide-menu"> سجل حصر وتحديدالاخطار والمخاطر </span>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)"
                        aria-expanded="false">
                        <i class="mdi mdi-format-list-bulleted"></i>
                        <span class="hide-menu">المراجعه الداخليه</span>

                    </a>
                    <ul aria-expanded="false" class="collapse  first-level">
                        <li class="sidebar-item">
                            <a href="{{ route('interiorsop.index') }}" class="sidebar-link">
                                <i class="mdi mdi-adjust"></i>
                                <span class="hide-menu"> اجراء المراجعه الداخليه</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="{{ route('interior.index') }}" class="sidebar-link">
                                <i class="mdi mdi-adjust"></i>
                                <span class="hide-menu"> متابعة نتائج المراجعة الداخلية </span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="{{ route('internalAudit.index') }}" class="sidebar-link">
                                <i class="mdi mdi-adjust"></i>
                                <span class="hide-menu"> مراجعات داخلية لنظام الجودة </span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="{{ route('noticeInternal.index') }}" class="sidebar-link">
                                <i class="mdi mdi-adjust"></i>
                                <span class="hide-menu"> إخطار بمراجعة داخلية </span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="{{ route('InternalAuditReport.index') }}" class="sidebar-link">
                                <i class="mdi mdi-adjust"></i>
                                <span class="hide-menu"> تقرير مراجعة داخلية </span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="{{ route('listInternalAuditor.index') }}" class="sidebar-link">
                                <i class="mdi mdi-adjust"></i>
                                <span class="hide-menu"> مراجعين داخليين لنظام الجودة </span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="{{ route('assigned.index') }}" class="sidebar-link">
                                <i class="mdi mdi-adjust"></i>
                                <span class="hide-menu">أمر تكليف إجراء مراجعة داخلية</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="{{ route('work_plan.index') }}" class="sidebar-link">
                                <i class="mdi mdi-adjust"></i>
                                <span class="hide-menu"> خطة سنوية للمراجعات الداخلية </span>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)"
                        aria-expanded="false">
                        <i class="mdi mdi-format-list-bulleted"></i>
                        <span class="hide-menu">مراجعة الادارة</span>
                    </a>
                    <ul aria-expanded="false" class="collapse  first-level">
                        <li class="sidebar-item">
                            <a href="{{ route('meetingAgendasop.index') }}" class="sidebar-link">
                                <i class="mdi mdi-adjust"></i>
                                <span class="hide-menu"> اجراء مراجعة الادارة</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="{{ route('meetingAgenda.index') }}" class="sidebar-link">
                                <i class="mdi mdi-adjust"></i>
                                <span class="hide-menu"> أجندة إجتماع مراجعة الإدارة </span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="{{ route('invitationMeeting.index') }}" class="sidebar-link">
                                <i class="mdi mdi-adjust"></i>
                                <span class="hide-menu"> دعوة لإجتماع مراجعة الإدارة </span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="{{ route('followLog.index') }}" class="sidebar-link">
                                <i class="mdi mdi-adjust"></i>
                                <span class="hide-menu" style='font-size: 10px;'> سجل متابعة قرارات مراجعة الإدارة العليا </span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="{{ route('meetingMinute.index') }}" class="sidebar-link">
                                <i class="mdi mdi-adjust"></i>
                                <span class="hide-menu"> محضر إجتماع مراجعة </span>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)"
                        aria-expanded="false">
                        <i class="mdi mdi-format-list-bulleted"></i>
                        <span class="hide-menu">مراقبة وضبط الوثائق</span>
                    </a>
                    <ul aria-expanded="false" class="collapse  first-level">
                        <li class="sidebar-item">
                            <a href="{{ route('recordActionSop.index') }}" class="sidebar-link">
                                <i class="mdi mdi-adjust"></i>
                                <span class="hide-menu"> اجراء مراقبة وضبط الوثائق</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="{{ route('recordAction.index') }}" class="sidebar-link">
                                <i class="mdi mdi-adjust"></i>
                                <span class="hide-menu"> سجل حصر الاجراءات المستخدمة </span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="{{ route('recordModel.index') }}" class="sidebar-link">
                                <i class="mdi mdi-adjust"></i>
                                <span class="hide-menu"> سجل حصر النماذج المستخدمة </span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="{{ route('recordCanceledDocument.index') }}" class="sidebar-link">
                                <i class="mdi mdi-adjust"></i>
                                <span class="hide-menu"> سجل حصر الوثائق الملغاة</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="{{ route('issuanceRequest.index') }}" class="sidebar-link">
                                <i class="mdi mdi-adjust"></i>
                                <span class="hide-menu"> طلب إصدار / تعديل / إلغاء وثيقة
                                </span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="{{ route('directorList.index') }}" class="sidebar-link">
                                <i class="mdi mdi-adjust"></i>
                                <span class="hide-menu"> قائمة أسماء المديرين

                                </span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="{{ route('listDocument.index') }}" class="sidebar-link">
                                <i class="mdi mdi-adjust"></i>
                                <span class="hide-menu"> قائمة رئيسية للوثائق
                                </span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="{{ route('brokenRecord.index') }}" class="sidebar-link">
                                <i class="mdi mdi-adjust"></i>
                                <span class="hide-menu">نماذج السجلات المعدمة
                                </span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="{{ route('typicalForm.index') }}" class="sidebar-link">
                                <i class="mdi mdi-adjust"></i>
                                <span class="hide-menu"> نموذج إستلام وثائق/نماذج
                                </span>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)"
                        aria-expanded="false">
                        <i class="mdi mdi-format-list-bulleted"></i>
                        <span class="hide-menu">التصحيحيه والوقائيه</span>
                    </a>
                    <ul aria-expanded="false" class="collapse  first-level">
                        <li class="sidebar-item">
                            <a href="{{ route('corrctivePreventiveActionsSOP.index') }}" class="sidebar-link">
                                <i class="mdi mdi-adjust"></i>
                                <span class="hide-menu"> اجراء التصحيحيه والوقائيه</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="{{ route('corrctivePreventiveActions.index') }}" class="sidebar-link">
                                <i class="mdi mdi-adjust"></i>
                                <span class="hide-menu"> طلب إجراء تصحيحي / وقائي
                                </span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="{{ route('Non_conformities.index') }}" class="sidebar-link">
                                <i class="mdi mdi-adjust"></i>
                                <span class="hide-menu"> حالات عدم المطابقة
                                </span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="{{ route('nonConformanceReport.index') }}" class="sidebar-link">
                                <i class="mdi mdi-adjust"></i>
                                <span class="hide-menu"> سجل متابعة تقارير عدم المطابقة
                                </span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="{{ route('followUpRecord.index') }}" class="sidebar-link">
                                <i class="mdi mdi-adjust"></i>
                                <span class="hide-menu" style='font-size:10px'> سجل متابعة طلبات الإجراءات التصحيحية / الوقائية
                                </span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="{{ route('reportNonConformanceCases.index') }}" class="sidebar-link">
                                <i class="mdi mdi-adjust"></i>
                                <span class="hide-menu" style='font-size:10px'> تقرير  عدم المطابقة والإجراءات التصحيحية والوقائية


                                </span>
                            </a>
                        </li>


                    </ul>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)"
                        aria-expanded="false">
                        <i class="mdi mdi-format-list-bulleted"></i>
                        <span class="hide-menu">فهم المنظمه وسياقها</span>
                    </a>
                    <ul aria-expanded="false" class="collapse  first-level">
                        <li class="sidebar-item">
                            <a href="{{ route('understandingOrganizationSOP.index') }}" class="sidebar-link">
                                <i class="mdi mdi-adjust"></i>
                                <span class="hide-menu"> اجراء فهم المنظمه وسياقها
                                </span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="{{ route('externalCases.index') }}" class="sidebar-link">
                                <i class="mdi mdi-adjust"></i>
                                <span class="hide-menu"> استمارة قضايا خارجيه

                                </span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="{{ route('internalCases.index') }}" class="sidebar-link">
                                <i class="mdi mdi-adjust"></i>
                                <span class="hide-menu"> استمارة قضايا داخلية

                                </span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="{{ route('interestedParties.index') }}" class="sidebar-link">
                                <i class="mdi mdi-adjust"></i>
                                <span class="hide-menu"> استمارة الأطراف المهتمة

                                </span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="{{ route('swot.index') }}" class="sidebar-link">
                                <i class="mdi mdi-adjust"></i>
                                <span class="hide-menu"> تحليل(SWOT)
                                </span>
                            </a>
                        </li>

                    </ul>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)"
                        aria-expanded="false">
                        <i class="mdi mdi-format-list-bulleted"></i>
                        <span class="hide-menu">شكاوي وقياس رضا العميل</span>
                    </a>
                    <ul aria-expanded="false" class="collapse  first-level">
                        <li class="sidebar-item">
                            <a href="{{ route('complaintsWorkSOP.index') }}" class="sidebar-link">
                                <i class="mdi mdi-adjust"></i>
                                <span class="hide-menu"> اجراء عمل الشكاوي وقياس رضا العميل
                                </span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="{{ route('customers.index') }}" class="sidebar-link">
                                <i class="mdi mdi-adjust"></i>
                                <span class="hide-menu"> العمـــــــــــلاء

                                </span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="{{ route('questionnaireForms.index') }}" class="sidebar-link">
                                <i class="mdi mdi-adjust"></i>
                                <span class="hide-menu"> نموذج استبيان عن الدورة و المدرب


                                </span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="{{ route('customerComplaints.index') }}" class="sidebar-link">
                                <i class="mdi mdi-adjust"></i>
                                <span class="hide-menu"> متابعة شكوى عميل


                                </span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="{{ route('customerSatisfactions.index') }}" class="sidebar-link">
                                <i class="mdi mdi-adjust"></i>
                                <span class="hide-menu"> قياس رضا العملاء

                                </span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="{{ route('complaintStudies.index') }}" class="sidebar-link">
                                <i class="mdi mdi-adjust"></i>
                                <span class="hide-menu"> تقرير دراسة شكوي عميل


                                </span>
                            </a>
                        </li>

                    </ul>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)"
                        aria-expanded="false">
                        <i class="mdi mdi-format-list-bulleted"></i>
                        <span class="hide-menu">التحكم في التغيير</span>
                    </a>
                    <ul aria-expanded="false" class="collapse  first-level">
                        <li class="sidebar-item">
                            <a href="{{ route('changeControlSOP.index') }}" class="sidebar-link">
                                <i class="mdi mdi-adjust"></i>
                                <span class="hide-menu"> اجراء التحكم في التغيير
                                </span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="{{ route('changeControlRequests.index') }}" class="sidebar-link">
                                <i class="mdi mdi-adjust"></i>
                                <span class="hide-menu"> نموذج طلب التحكم في التغيير (CCR)</span>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="sidebar-item" >
                    <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)"
                        aria-expanded="false">
                        <i class="mdi mdi-format-list-bulleted"></i>
                        <span class="hide-menu">التحسين المستمر</span>
                    </a>
                    <ul aria-expanded="false" class="collapse  first-level">
                        <li class="sidebar-item">
                            <a href="{{ route('ContinuousImprovementSOP.index') }}" class="sidebar-link">
                                <i class="mdi mdi-adjust"></i>
                                <span class="hide-menu"> اجراء التحسين المستمر
                                </span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="{{ route('contractStats.index') }}" class="sidebar-link">
                                <i class="mdi mdi-adjust"></i>
                                <span class="hide-menu"> إحصائيات التعاقد</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="{{ route('trainingStats.index') }}" class="sidebar-link">
                                <i class="mdi mdi-adjust"></i>
                                <span class="hide-menu"> إحصائيات التدريب</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="{{ route('nonConformanceStats.index') }}" class="sidebar-link">
                                <i class="mdi mdi-adjust"></i>
                                <span class="hide-menu"> إحصائيات حالات عدم المطابقة</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="{{ route('followUpRecordImprovements.index') }}" class="sidebar-link">
                                <i class="mdi mdi-adjust"></i>
                                <span class="hide-menu"> سجل متابعة أعمال التحسين والتطوير</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="{{ route('dataCollectionReports.index') }}" class="sidebar-link">
                                <i class="mdi mdi-adjust"></i>
                                <span class="hide-menu"> تقرير جمع و تحليل البيانات</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="{{ route('recordAnalysis.index') }}" class="sidebar-link">
                                <i class="mdi mdi-adjust"></i>
                                <span class="hide-menu"> سجل تحليل لشكاوي العملاء</span>
                            </a>
                        </li>
                        <br>
                        <br>
                        <br>
                    </ul>
                </li>
                <br>
                <br>
            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>
