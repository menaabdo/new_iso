<style>
    /* aside{
        background-color:white !important;
    } */
    .sidebar-nav .has-arrow::after {
        border-color: white !important;
    }

    ul li a {
        margin: 5px;
        padding: 3px;
    }

</style>
<aside class="left-sidebar " style='border-radius: 10px;;margin-top:100px;border:1px solid;background:#001635 !important;height: 625px;'>

    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">

            <ul id="sidebarnav" style='background:none !important'>
                @if(Auth::user()->hasRole('SuperAdmin'))
                <li class="sidebar-item" style=' box-shadow: 0 1rem 3rem rgba(0,0,0,.175)!important;'>
                    <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
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

                <li class="sidebar-item" style='display:none'>
                    <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
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
                <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
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
                <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                    <i class="fa fa-object-group"></i>

                    <span class="hide-menu">?????????? ???????????? </span>

                </a>
                <ul aria-expanded="false" class="collapse  first-level">
                    <li class="sidebar-item" style=' box-shadow: 0 1rem 3rem rgba(0,0,0,.175)!important;'>
                        <a href="{{ route('sop.index') }}" class="sidebar-link">
                            <i class="mdi mdi-adjust"></i>
                            <span class="hide-menu"> ?????????? ?????????? ????????????</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="{{ route('sop.index') }}" class="sidebar-link">
                            <i class="mdi mdi-adjust"></i>
                            <span class="hide-menu"> ?????? ?????????? ?????? </span>
                        </a>
                    </li>

                    <li class="sidebar-item">
                        <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                            <i class="mdi mdi-archive"></i>
                            <span class="hide-menu">??????????????</span>

                        </a>
                        <ul aria-expanded="false" class="collapse  first-level">
                            <li class="sidebar-item">
                                <a href="{{ route('sopArchives.index') }}" class="sidebar-link">
                                    <i class="mdi mdi-archive"></i>
                                    <span class="hide-menu">??????????</span>
                                </a>
                            </li>

                        </ul>
                    </li>
                </ul>
            </li>

            <li class="sidebar-item">
                <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                    <i class="fa fa-exclamation-triangle"></i>
                    <span class="hide-menu">???????? ?????????????? </span>

                </a>
                <ul aria-expanded="false" class="collapse  first-level">
                    <li class="sidebar-item">
                        <a href="{{ route('risksop.index') }}" class="sidebar-link">
                            <i class="mdi mdi-adjust"></i>
                            <span class="hide-menu"> ?????????? ???????? ??????????????</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="{{ route('risk.index') }}" class="sidebar-link">
                            <i class="mdi mdi-adjust"></i>
                            <span style='    font-size: 10;' class="hide-menu"> ?????? ?????? ?????????????????????????? ???????????????? </span>
                        </a>
                    </li>

                    <li class="sidebar-item">
                        <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                            <i class="mdi mdi-archive"></i>
                            <span class="hide-menu">??????????????</span>

                        </a>
                        <ul aria-expanded="false" class="collapse  first-level">
                            <li class="sidebar-item">
                                <a href="{{ route('risksopArchives.index') }}" class="sidebar-link">
                                    <i class="mdi mdi-archive"></i>
                                    <span class="hide-menu">??????????</span>
                                </a>
                            </li>

                        </ul>
                    </li>
                </ul>
            </li>

            <li class="sidebar-item">
                <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                    <i class="fa fa-link"></i>
                    <span class="hide-menu">???????????????? ????????????????</span>

                </a>
                <ul aria-expanded="false" class="collapse  first-level">
                    <li class="sidebar-item">
                        <a href="{{ route('interiorsop.index') }}" class="sidebar-link">
                            <i class="mdi mdi-adjust"></i>
                            <span class="hide-menu"> ?????????? ???????????????? ????????????????</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="{{ route('interior.index') }}" class="sidebar-link">
                            <i class="mdi mdi-adjust"></i>
                            <span class="hide-menu"> ???????????? ?????????? ???????????????? ???????????????? </span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="{{ route('internalAudit.index') }}" class="sidebar-link">
                            <i class="mdi mdi-adjust"></i>
                            <span class="hide-menu"> ?????????????? ???????????? ?????????? ???????????? </span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="{{ route('noticeInternal.index') }}" class="sidebar-link">
                            <i class="mdi mdi-adjust"></i>
                            <span class="hide-menu"> ?????????? ?????????????? ???????????? </span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="{{ route('InternalAuditReport.index') }}" class="sidebar-link">
                            <i class="mdi mdi-adjust"></i>
                            <span class="hide-menu"> ?????????? ???????????? ???????????? </span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="{{ route('listInternalAuditor.index') }}" class="sidebar-link">
                            <i class="mdi mdi-adjust"></i>
                            <span class="hide-menu"> ?????????????? ?????????????? ?????????? ???????????? </span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="{{ route('assigned.index') }}" class="sidebar-link">
                            <i class="mdi mdi-adjust"></i>
                            <span class="hide-menu">?????? ?????????? ?????????? ???????????? ????????????</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="{{ route('work_plan.index') }}" class="sidebar-link">
                            <i class="mdi mdi-adjust"></i>
                            <span class="hide-menu"> ?????? ?????????? ?????????????????? ???????????????? </span>
                        </a>
                    </li>

                    <li class="sidebar-item">
                        <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                            <i class="mdi mdi-archive"></i>
                            <span class="hide-menu">??????????????</span>

                        </a>
                        <ul aria-expanded="false" class="collapse  first-level">
                            <li class="sidebar-item">
                                <a href="{{ route('interiorArchives.index') }}" class="sidebar-link">
                                    <i class="mdi mdi-archive"></i>
                                    <span class="hide-menu">??????????</span>
                                </a>
                            </li>

                        </ul>
                    </li>
                </ul>
            </li>

            <li class="sidebar-item">
                <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                    <i class="fa fa-tasks"></i>
                    <span class="hide-menu">???????????? ??????????????</span>
                </a>
                <ul aria-expanded="false" class="collapse  first-level">
                    <li class="sidebar-item">
                        <a href="{{ route('meetingAgendasop.index') }}" class="sidebar-link">
                            <i class="mdi mdi-adjust"></i>
                            <span class="hide-menu"> ?????????? ???????????? ??????????????</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="{{ route('meetingAgenda.index') }}" class="sidebar-link">
                            <i class="mdi mdi-adjust"></i>
                            <span class="hide-menu"> ?????????? ???????????? ???????????? ?????????????? </span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="{{ route('invitationMeeting.index') }}" class="sidebar-link">
                            <i class="mdi mdi-adjust"></i>
                            <span class="hide-menu"> ???????? ???????????????? ???????????? ???????????????? </span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="{{ route('followLog.index') }}" class="sidebar-link">
                            <i class="mdi mdi-adjust"></i>
                            <span class="hide-menu" style='font-size: 10px;'> ?????? ???????????? ???????????? ???????????? ?????????????? ???????????? </span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="{{ route('meetingMinute.index') }}" class="sidebar-link">
                            <i class="mdi mdi-adjust"></i>
                            <span class="hide-menu"> ???????? ???????????? ???????????? </span>
                        </a>
                    </li>

                    <li class="sidebar-item">
                        <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                            <i class="mdi mdi-archive"></i>
                            <span class="hide-menu">??????????????</span>

                        </a>
                        <ul aria-expanded="false" class="collapse  first-level">
                            <li class="sidebar-item">
                                <a href="{{ route('meetingAgendaArchives.index') }}" class="sidebar-link">
                                    <i class="mdi mdi-archive"></i>
                                    <span class="hide-menu">??????????</span>
                                </a>
                            </li>

                        </ul>
                    </li>
                </ul>
            </li>

            <li class="sidebar-item">
                <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                    <i class="fas fa-sticky-note"></i>
                    <span class="hide-menu">???????????? ???????? ??????????????</span>
                </a>
                <ul aria-expanded="false" class="collapse  first-level">
                    <li class="sidebar-item">
                        <a href="{{ route('recordActionSop.index') }}" class="sidebar-link">
                            <i class="mdi mdi-adjust"></i>
                            <span class="hide-menu"> ?????????? ???????????? ???????? ??????????????</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="{{ route('recordAction.index') }}" class="sidebar-link">
                            <i class="mdi mdi-adjust"></i>
                            <span class="hide-menu"> ?????? ?????? ?????????????????? ?????????????????? </span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="{{ route('recordModel.index') }}" class="sidebar-link">
                            <i class="mdi mdi-adjust"></i>
                            <span class="hide-menu"> ?????? ?????? ?????????????? ?????????????????? </span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="{{ route('recordCanceledDocument.index') }}" class="sidebar-link">
                            <i class="mdi mdi-adjust"></i>
                            <span class="hide-menu"> ?????? ?????? ?????????????? ??????????????</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="{{ route('issuanceRequest.index') }}" class="sidebar-link">
                            <i class="mdi mdi-adjust"></i>
                            <span class="hide-menu"> ?????? ?????????? / ?????????? / ?????????? ??????????
                            </span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="{{ route('directorList.index') }}" class="sidebar-link">
                            <i class="mdi mdi-adjust"></i>
                            <span class="hide-menu"> ?????????? ?????????? ????????????????

                            </span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="{{ route('listDocument.index') }}" class="sidebar-link">
                            <i class="mdi mdi-adjust"></i>
                            <span class="hide-menu"> ?????????? ???????????? ??????????????
                            </span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="{{ route('brokenRecord.index') }}" class="sidebar-link">
                            <i class="mdi mdi-adjust"></i>
                            <span class="hide-menu">?????????? ?????????????? ??????????????
                            </span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="{{ route('typicalForm.index') }}" class="sidebar-link">
                            <i class="mdi mdi-adjust"></i>
                            <span class="hide-menu"> ?????????? ???????????? ??????????/??????????
                            </span>
                        </a>
                    </li>

                    <li class="sidebar-item">
                        <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                            <i class="mdi mdi-archive"></i>
                            <span class="hide-menu">??????????????</span>

                        </a>
                        <ul aria-expanded="false" class="collapse  first-level">
                            <li class="sidebar-item">
                                <a href="{{ route('recordActionArchives.index') }}" class="sidebar-link">
                                    <i class="mdi mdi-archive"></i>
                                    <span class="hide-menu">??????????</span>
                                </a>
                            </li>

                        </ul>
                    </li>
                </ul>
            </li>

            <li class="sidebar-item">
                <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                    <i class="fas fa-file-alt"></i>
                    <span class="hide-menu">?????????????????? ??????????????????</span>
                </a>
                <ul aria-expanded="false" class="collapse  first-level">
                    <li class="sidebar-item">
                        <a href="{{ route('corrctivePreventiveActionsSOP.index') }}" class="sidebar-link">
                            <i class="mdi mdi-adjust"></i>
                            <span class="hide-menu"> ?????????? ?????????????????? ??????????????????</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="{{ route('corrctivePreventiveActions.index') }}" class="sidebar-link">
                            <i class="mdi mdi-adjust"></i>
                            <span class="hide-menu"> ?????? ?????????? ???????????? / ??????????
                            </span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="{{ route('Non_conformities.index') }}" class="sidebar-link">
                            <i class="mdi mdi-adjust"></i>
                            <span class="hide-menu"> ?????????? ?????? ????????????????
                            </span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="{{ route('nonConformanceReport.index') }}" class="sidebar-link">
                            <i class="mdi mdi-adjust"></i>
                            <span class="hide-menu"> ?????? ???????????? ???????????? ?????? ????????????????
                            </span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="{{ route('followUpRecord.index') }}" class="sidebar-link">
                            <i class="mdi mdi-adjust"></i>
                            <span class="hide-menu" style='font-size:10px'> ?????? ???????????? ?????????? ?????????????????? ?????????????????? / ????????????????
                            </span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="{{ route('reportNonConformanceCases.index') }}" class="sidebar-link">
                            <i class="mdi mdi-adjust"></i>
                            <span class="hide-menu" style='font-size:10px'> ?????????? ?????? ???????????????? ???????????????????? ?????????????????? ??????????????????


                            </span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                            <i class="mdi mdi-archive"></i>
                            <span class="hide-menu">??????????????</span>

                        </a>
                        <ul aria-expanded="false" class="collapse  first-level">
                            <li class="sidebar-item">
                                <a href="{{ route('corrctiveArchives.index') }}" class="sidebar-link">
                                    <i class="mdi mdi-archive"></i>
                                    <span class="hide-menu">??????????</span>
                                </a>
                            </li>

                        </ul>
                    </li>

                </ul>
            </li>

            <li class="sidebar-item">
                <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                    <i class="fas fa-sitemap"></i>
                    <span class="hide-menu">?????? ?????????????? ??????????????</span>
                </a>
                <ul aria-expanded="false" class="collapse  first-level">
                    <li class="sidebar-item">
                        <a href="{{ route('understandingOrganizationSOP.index') }}" class="sidebar-link">
                            <i class="mdi mdi-adjust"></i>
                            <span class="hide-menu"> ?????????? ?????? ?????????????? ??????????????
                            </span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="{{ route('externalCases.index') }}" class="sidebar-link">
                            <i class="mdi mdi-adjust"></i>
                            <span class="hide-menu"> ?????????????? ?????????? ????????????

                            </span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="{{ route('internalCases.index') }}" class="sidebar-link">
                            <i class="mdi mdi-adjust"></i>
                            <span class="hide-menu"> ?????????????? ?????????? ????????????

                            </span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="{{ route('interestedParties.index') }}" class="sidebar-link">
                            <i class="mdi mdi-adjust"></i>
                            <span class="hide-menu"> ?????????????? ?????????????? ??????????????

                            </span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="{{ route('swot.index') }}" class="sidebar-link">
                            <i class="mdi mdi-adjust"></i>
                            <span class="hide-menu"> ??????????(SWOT)
                            </span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                            <i class="mdi mdi-archive"></i>
                            <span class="hide-menu">??????????????</span>

                        </a>
                        <ul aria-expanded="false" class="collapse  first-level">
                            <li class="sidebar-item">
                                <a href="{{ route('understandingArchives.index') }}" class="sidebar-link">
                                    <i class="mdi mdi-archive"></i>
                                    <span class="hide-menu">??????????</span>
                                </a>
                            </li>

                        </ul>
                    </li>
                </ul>
            </li>

            <li class="sidebar-item">
                <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                    <i class="fa fa-comments "></i>
                    <span class="hide-menu">?????????? ?????????? ?????? ????????????</span>
                </a>
                <ul aria-expanded="false" class="collapse  first-level">
                    <li class="sidebar-item">
                        <a href="{{ route('complaintsWorkSOP.index') }}" class="sidebar-link">
                            <i class="mdi mdi-adjust"></i>
                            <span class="hide-menu" style='font-size:12px'> ?????????? ?????? ?????????????? ?????????? ?????? ????????????
                            </span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="{{ route('customers.index') }}" class="sidebar-link">
                            <i class="mdi mdi-adjust"></i>
                            <span class="hide-menu"> ????????????????????????????????????

                            </span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="{{ route('questionnaireForms.index') }}" class="sidebar-link">
                            <i class="mdi mdi-adjust"></i>
                            <span class="hide-menu"> ?????????? ?????????????? ???? ???????????? ?? ????????????


                            </span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="{{ route('customerComplaints.index') }}" class="sidebar-link">
                            <i class="mdi mdi-adjust"></i>
                            <span class="hide-menu"> ???????????? ???????? ????????


                            </span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="{{ route('customerSatisfactions.index') }}" class="sidebar-link">
                            <i class="mdi mdi-adjust"></i>
                            <span class="hide-menu"> ???????? ?????? ??????????????

                            </span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="{{ route('complaintStudies.index') }}" class="sidebar-link">
                            <i class="mdi mdi-adjust"></i>
                            <span class="hide-menu"> ?????????? ?????????? ???????? ????????


                            </span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                            <i class="mdi mdi-archive"></i>
                            <span class="hide-menu">??????????????</span>

                        </a>
                        <ul aria-expanded="false" class="collapse  first-level">
                            <li class="sidebar-item">
                                <a href="{{ route('complaintsWorkSOPArchives.index') }}" class="sidebar-link">
                                    <i class="mdi mdi-archive"></i>
                                    <span class="hide-menu">??????????</span>
                                </a>
                            </li>

                        </ul>
                    </li>
                </ul>
            </li>

            <li class="sidebar-item">
                <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                    <i class="	fas fa-retweet"></i>
                    <span class="hide-menu">???????????? ???? ??????????????</span>
                </a>
                <ul aria-expanded="false" class="collapse  first-level">
                    <li class="sidebar-item">
                        <a href="{{ route('changeControlSOP.index') }}" class="sidebar-link">
                            <i class="mdi mdi-adjust"></i>
                            <span class="hide-menu"> ?????????? ???????????? ???? ??????????????
                            </span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="{{ route('changeControlRequests.index') }}" class="sidebar-link">
                            <i class="mdi mdi-adjust"></i>
                            <span class="hide-menu" style='font-size:12px'> ?????????? ?????? ???????????? ???? ?????????????? (CCR)</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                            <i class="mdi mdi-archive"></i>
                            <span class="hide-menu">??????????????</span>

                        </a>
                        <ul aria-expanded="false" class="collapse  first-level">
                            <li class="sidebar-item">
                                <a href="{{ route('changeControlSOPArchives.index') }}" class="sidebar-link">
                                    <i class="mdi mdi-archive"></i>
                                    <span class="hide-menu">??????????</span>
                                </a>
                            </li>

                        </ul>
                    </li>
                </ul>
            </li>

            <li class="sidebar-item">
                <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                    <i class="	fas fa-sync-alt"></i>
                    <span class="hide-menu">?????????????? ??????????????</span>
                </a>
                <ul aria-expanded="false" class="collapse  first-level">
                    <li class="sidebar-item">
                        <a href="{{ route('ContinuousImprovementSOP.index') }}" class="sidebar-link">
                            <i class="mdi mdi-adjust"></i>
                            <span class="hide-menu"> ?????????? ?????????????? ??????????????
                            </span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="{{ route('contractStats.index') }}" class="sidebar-link">
                            <i class="mdi mdi-adjust"></i>
                            <span class="hide-menu"> ???????????????? ??????????????</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="{{ route('trainingStats.index') }}" class="sidebar-link">
                            <i class="mdi mdi-adjust"></i>
                            <span class="hide-menu"> ???????????????? ??????????????</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="{{ route('nonConformanceStats.index') }}" class="sidebar-link">
                            <i class="mdi mdi-adjust"></i>
                            <span class="hide-menu"> ???????????????? ?????????? ?????? ????????????????</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="{{ route('followUpRecordImprovements.index') }}" class="sidebar-link">
                            <i class="mdi mdi-adjust"></i>
                            <span class="hide-menu"> ?????? ???????????? ?????????? ?????????????? ????????????????</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="{{ route('dataCollectionReports.index') }}" class="sidebar-link">
                            <i class="mdi mdi-adjust"></i>
                            <span class="hide-menu"> ?????????? ?????? ?? ?????????? ????????????????</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="{{ route('recordAnalysis.index') }}" class="sidebar-link">
                            <i class="mdi mdi-adjust"></i>
                            <span class="hide-menu"> ?????? ?????????? ???????????? ??????????????</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                            <i class="mdi mdi-archive"></i>
                            <span class="hide-menu">??????????????</span>

                        </a>
                        <ul aria-expanded="false" class="collapse  first-level">
                            <li class="sidebar-item">
                                <a href="{{ route('ContinuousSOPArchives.index') }}" class="sidebar-link">
                                    <i class="mdi mdi-archive"></i>
                                    <span class="hide-menu">??????????</span>
                                </a>
                            </li>

                        </ul>
                    </li>
                    
                </ul>
            </li>

             <li class="sidebar-item">
                <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                    <i class="	fas fa-sync-alt"></i>
                    <span class="hide-menu">???????? ??????????????????</span>
                </a>
                <ul aria-expanded="false" class="collapse  first-level">
                    <li class="sidebar-item">
                        <a href="{{ route('all_sop.index') }}" class="sidebar-link">
                            <i class="mdi mdi-adjust"></i>
                            <span class="hide-menu"> ???????? ??????????????????
                            </span>
                        </a>
                    </li>
                  
                    
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
