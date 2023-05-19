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

                    <span class="hide-menu">@lang('main.Quality goals') </span>

                </a>
                <ul aria-expanded="false" class="collapse  first-level">
                    <li class="sidebar-item" style=' box-shadow: 0 1rem 3rem rgba(0,0,0,.175)!important;'>
                        <a href="{{ route('sop.index') }}" class="sidebar-link">
                            <i class="mdi mdi-adjust"></i>
                            <span class="hide-menu"> @lang('main.quality objectives')</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="{{ route('sop.index') }}" class="sidebar-link">
                            <i class="mdi mdi-adjust"></i>
                            <span class="hide-menu">@lang('main.objectives execution plan form')</span>
                        </a>
                    </li>

                    <li class="sidebar-item">
                        <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                            <i class="mdi mdi-archive"></i>
                            <span class="hide-menu">@lang('main.Archive')</span>

                        </a>
                        <ul aria-expanded="false" class="collapse  first-level">
                            <li class="sidebar-item">
                                <a href="{{ route('sopArchives.index') }}" class="sidebar-link">
                                    <i class="mdi mdi-archive"></i>
                                    <span class="hide-menu">@lang('main.Archive')</span>
                                </a>
                            </li>

                        </ul>
                    </li>
                </ul>
            </li>

            <li class="sidebar-item">
                <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                    <i class="fa fa-exclamation-triangle"></i>
                    <span class="hide-menu">@lang('main.Risk assessment') </span>

                </a>
                <ul aria-expanded="false" class="collapse  first-level">
                    <li class="sidebar-item">
                        <a href="{{ route('risksop.index') }}" class="sidebar-link">
                            <i class="mdi mdi-adjust"></i>
                            <span class="hide-menu"> @lang('main.Risk assessment1')</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="{{ route('risk.index') }}" class="sidebar-link">
                            <i class="mdi mdi-adjust"></i>
                            <span style='    font-size:12;' class="hide-menu">@lang('main.Risk Management report') </span>
                        </a>
                    </li>

                    <li class="sidebar-item">
                        <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                            <i class="mdi mdi-archive"></i>
                            <span class="hide-menu">@lang('main.Archive')</span>

                        </a>
                        <ul aria-expanded="false" class="collapse  first-level">
                            <li class="sidebar-item">
                                <a href="{{ route('risksopArchives.index') }}" class="sidebar-link">
                                    <i class="mdi mdi-archive"></i>
                                    <span class="hide-menu">@lang('main.Archive')</span>
                                </a>
                            </li>

                        </ul>
                    </li>
                </ul>
            </li>

            <li class="sidebar-item">
                <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                    <i class="fa fa-link"></i>
                    <span class="hide-menu">@lang('main.internal audit')</span>

                </a>
                <ul aria-expanded="false" class="collapse  first-level">
                    <li class="sidebar-item">
                        <a href="{{ route('interiorsop.index') }}" class="sidebar-link">
                            <i class="mdi mdi-adjust"></i>
                            <span class="hide-menu">@lang('main.internal audit1')</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="{{ route('interior.index') }}" class="sidebar-link">
                            <i class="mdi mdi-adjust"></i>
                            <span class="hide-menu">@lang('main.Follow up on the results of the internal audit')</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="{{ route('internalAudit.index') }}" class="sidebar-link">
                            <i class="mdi mdi-adjust"></i>
                            <span class="hide-menu">@lang('main.List of Internal Audits')</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="{{ route('noticeInternal.index') }}" class="sidebar-link">
                            <i class="mdi mdi-adjust"></i>
                            <span class="hide-menu">@lang('main.Notify of an internal  audit')</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="{{ route('InternalAuditReport.index') }}" class="sidebar-link">
                            <i class="mdi mdi-adjust"></i>
                            <span class="hide-menu">@lang('main.IA Report')</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="{{ route('listInternalAuditor.index') }}" class="sidebar-link">
                            <i class="mdi mdi-adjust"></i>
                            <span class="hide-menu">@lang('main.List of approved internal auditors')</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="{{ route('assigned.index') }}" class="sidebar-link">
                            <i class="mdi mdi-adjust"></i>
                            <span class="hide-menu">@lang('main.Assigning an internal auditor')</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="{{ route('work_plan.index') }}" class="sidebar-link">
                            <i class="mdi mdi-adjust"></i>
                            <span class="hide-menu">@lang('main.Annual plan for internal  audit')</span>
                        </a>
                    </li>

                    <li class="sidebar-item">
                        <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                            <i class="mdi mdi-archive"></i>
                            <span class="hide-menu">@lang('main.Archive')</span>

                        </a>
                        <ul aria-expanded="false" class="collapse  first-level">
                            <li class="sidebar-item">
                                <a href="{{ route('interiorArchives.index') }}" class="sidebar-link">
                                    <i class="mdi mdi-archive"></i>
                                    <span class="hide-menu">@lang('main.Archive')</span>
                                </a>
                            </li>

                        </ul>
                    </li>
                </ul>
            </li>

            <li class="sidebar-item">
                <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                    <i class="fa fa-tasks"></i>
                    <span class="hide-menu">@lang('main.Management review')</span>
                </a>
                <ul aria-expanded="false" class="collapse  first-level">
                    <li class="sidebar-item">
                        <a href="{{ route('meetingAgendasop.index') }}" class="sidebar-link">
                            <i class="mdi mdi-adjust"></i>
                            <span class="hide-menu">@lang('main.Management review1')</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="{{ route('meetingAgenda.index') }}" class="sidebar-link">
                            <i class="mdi mdi-adjust"></i>
                            <span class="hide-menu">@lang('main.meeting agenda')</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="{{ route('invitationMeeting.index') }}" class="sidebar-link">
                            <i class="mdi mdi-adjust"></i>
                            <span class="hide-menu">@lang('main.Invitation to a meeting')</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="{{ route('followLog.index') }}" class="sidebar-link">
                            <i class="mdi mdi-adjust"></i>
                            <span class="hide-menu" style='font-size: 10px;'>@lang('main.Follow-up record of senior management decisions')</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="{{ route('meetingMinute.index') }}" class="sidebar-link">
                            <i class="mdi mdi-adjust"></i>
                            <span class="hide-menu">@lang('main.Minutes of Meeting')</span>
                        </a>
                    </li>

                    <li class="sidebar-item">
                        <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                            <i class="mdi mdi-archive"></i>
                            <span class="hide-menu">@lang('main.Archive')</span>

                        </a>
                        <ul aria-expanded="false" class="collapse  first-level">
                            <li class="sidebar-item">
                                <a href="{{ route('meetingAgendaArchives.index') }}" class="sidebar-link">
                                    <i class="mdi mdi-archive"></i>
                                    <span class="hide-menu">@lang('main.Archive')</span>
                                </a>
                            </li>

                        </ul>
                    </li>
                </ul>
            </li>

            <li class="sidebar-item">
                <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                    <i class="fas fa-sticky-note"></i>
                    <span class="hide-menu">@lang('main.Document control1') </span>
                </a>
                <ul aria-expanded="false" class="collapse  first-level">
                    <li class="sidebar-item">
                        <a href="{{ route('recordActionSop.index') }}" class="sidebar-link">
                            <i class="mdi mdi-adjust"></i>
                            <span class="hide-menu"> @lang('main.Document control') </span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="{{ route('recordAction.index') }}" class="sidebar-link">
                            <i class="mdi mdi-adjust"></i>
                            <span class="hide-menu"> @lang('main.Record inventory of the sop  used')  </span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="{{ route('recordModel.index') }}" class="sidebar-link">
                            <i class="mdi mdi-adjust"></i>
                            <span class="hide-menu"> @lang('main.Record inventory of the Forms used')  </span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="{{ route('recordCanceledDocument.index') }}" class="sidebar-link">
                            <i class="mdi mdi-adjust"></i>
                            <span class="hide-menu"> @lang('main.Record of Canceled Documents') </span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="{{ route('issuanceRequest.index') }}" class="sidebar-link">
                            <i class="mdi mdi-adjust"></i>
                            <span class="hide-menu"> @lang('main.DCR') 
                            </span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="{{ route('directorList.index') }}" class="sidebar-link">
                            <i class="mdi mdi-adjust"></i>
                            <span class="hide-menu"> @lang('main.list of managers and individuals authorized to prepare documents') 

                            </span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="{{ route('listDocument.index') }}" class="sidebar-link">
                            <i class="mdi mdi-adjust"></i>
                            <span class="hide-menu"> @lang('main.Main list of documents') 
                            </span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="{{ route('brokenRecord.index') }}" class="sidebar-link">
                            <i class="mdi mdi-adjust"></i>
                            <span class="hide-menu">@lang('main.List of Disposed Documents') 
                            </span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="{{ route('typicalForm.index') }}" class="sidebar-link">
                            <i class="mdi mdi-adjust"></i>
                            <span class="hide-menu"> @lang('main.Document receipt form') 
                            </span>
                        </a>
                    </li>

                    <li class="sidebar-item">
                        <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                            <i class="mdi mdi-archive"></i>
                            <span class="hide-menu">@lang('main.Archive')</span>

                        </a>
                        <ul aria-expanded="false" class="collapse  first-level">
                            <li class="sidebar-item">
                                <a href="{{ route('recordActionArchives.index') }}" class="sidebar-link">
                                    <i class="mdi mdi-archive"></i>
                                    <span class="hide-menu">@lang('main.Archive')</span>
                                </a>
                            </li>

                        </ul>
                    </li>
                </ul>
            </li>

            <li class="sidebar-item">
                <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                    <i class="fas fa-file-alt"></i>
                    <span class="hide-menu">
                        @php
                        $string1 = trans('main.Corrective and preventive actions and cases of non-conformity1');
                         $split_string1 = wordwrap($string1, 30, "\n");
                     @endphp
                     {!! nl2br(e($split_string1)) !!}
                  </span>
                </a>
                <ul aria-expanded="false" class="collapse  first-level">
                    <li class="sidebar-item">
                        <a href="{{ route('corrctivePreventiveActionsSOP.index') }}" class="sidebar-link">
                            <i class="mdi mdi-adjust"></i>
                            <span class="hide-menu">
                                @php
                                $string2 = trans('main.Corrective and preventive actions and cases of non-conformity');
                                 $split_string2 = wordwrap($string2, 30, "\n");
                             @endphp
                             {!! nl2br(e($split_string2)) !!}</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="{{ route('corrctivePreventiveActions.index') }}" class="sidebar-link">
                            <i class="mdi mdi-adjust"></i>
                            <span class="hide-menu"> @lang('main.CAR/PAR')
                            </span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="{{ route('Non_conformities.index') }}" class="sidebar-link">
                            <i class="mdi mdi-adjust"></i>
                            <span class="hide-menu"> @lang('main.NCR')
                            </span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="{{ route('nonConformanceReport.index') }}" class="sidebar-link">
                            <i class="mdi mdi-adjust"></i>
                            <span class="hide-menu"> @lang('main.Record follow-up reports of non-conformance')
                            </span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="{{ route('followUpRecord.index') }}" class="sidebar-link">
                            <i class="mdi mdi-adjust"></i>
                            <span class="hide-menu" style='font-size:10px'> @lang('main.Follow-up record of corrective/preventive action requests')
                            </span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="{{ route('reportNonConformanceCases.index') }}" class="sidebar-link">
                            <i class="mdi mdi-adjust"></i>
                            <span class="hide-menu" style='font-size:10px'> @lang('main.Report cases of non-conformity and corrective and preventive actions')


                            </span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                            <i class="mdi mdi-archive"></i>
                            <span class="hide-menu">@lang('main.Archive')</span>

                        </a>
                        <ul aria-expanded="false" class="collapse  first-level">
                            <li class="sidebar-item">
                                <a href="{{ route('corrctiveArchives.index') }}" class="sidebar-link">
                                    <i class="mdi mdi-archive"></i>
                                    <span class="hide-menu">@lang('main.Archive')</span>
                                </a>
                            </li>

                        </ul>
                    </li>

                </ul>
            </li>

            <li class="sidebar-item">
                <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                    <i class="fas fa-sitemap"></i>
                    <span class="hide-menu"> @lang('main.Organization Context1')</span>
                </a>
                <ul aria-expanded="false" class="collapse  first-level">
                    <li class="sidebar-item">
                        <a href="{{ route('understandingOrganizationSOP.index') }}" class="sidebar-link">
                            <i class="mdi mdi-adjust"></i>
                            <span class="hide-menu"> @lang('main.Organization Context')
                            </span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="{{ route('externalCases.index') }}" class="sidebar-link">
                            <i class="mdi mdi-adjust"></i>
                            <span class="hide-menu"> @lang('main.external Issue Form')

                            </span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="{{ route('internalCases.index') }}" class="sidebar-link">
                            <i class="mdi mdi-adjust"></i>
                            <span class="hide-menu"> @lang('main.Internal Issue Form')

                            </span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="{{ route('interestedParties.index') }}" class="sidebar-link">
                            <i class="mdi mdi-adjust"></i>
                            <span class="hide-menu"> @lang('main.Interested Parties Form')

                            </span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="{{ route('swot.index') }}" class="sidebar-link">
                            <i class="mdi mdi-adjust"></i>
                            <span class="hide-menu"> @lang('main.SWOT analysis')
                            </span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                            <i class="mdi mdi-archive"></i>
                            <span class="hide-menu">@lang('main.Archive')</span>

                        </a>
                        <ul aria-expanded="false" class="collapse  first-level">
                            <li class="sidebar-item">
                                <a href="{{ route('understandingArchives.index') }}" class="sidebar-link">
                                    <i class="mdi mdi-archive"></i>
                                    <span class="hide-menu">@lang('main.Archive')</span>
                                </a>
                            </li>

                        </ul>
                    </li>
                </ul>
            </li>

            <li class="sidebar-item">
                <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                    <i class="fa fa-comments "></i>
                    <span class="hide-menu">@lang('main.Measuring customer satisfaction1')</span>
                </a>
                <ul aria-expanded="false" class="collapse  first-level">
                    <li class="sidebar-item">
                        <a href="{{ route('complaintsWorkSOP.index') }}" class="sidebar-link">
                            <i class="mdi mdi-adjust"></i>
                            <span class="hide-menu" style='font-size:12px'> @lang('main.Measuring customer satisfaction')
                            </span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="{{ route('customers.index') }}" class="sidebar-link">
                            <i class="mdi mdi-adjust"></i>
                            <span class="hide-menu"> @lang('main.Customers')

                            </span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="{{ route('questionnaireForms.index') }}" class="sidebar-link">
                            <i class="mdi mdi-adjust"></i>
                            <span class="hide-menu"> @lang('main.Questionnaire form for the course and trainer')


                            </span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="{{ route('customerComplaints.index') }}" class="sidebar-link">
                            <i class="mdi mdi-adjust"></i>
                            <span class="hide-menu"> @lang('main.Follow up on a customer complaint')


                            </span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="{{ route('customerSatisfactions.index') }}" class="sidebar-link">
                            <i class="mdi mdi-adjust"></i>
                            <span class="hide-menu"> @lang('main.customer satisfaction')

                            </span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="{{ route('complaintStudies.index') }}" class="sidebar-link">
                            <i class="mdi mdi-adjust"></i>
                            <span class="hide-menu"> @lang('main.Customer complaint report')


                            </span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                            <i class="mdi mdi-archive"></i>
                            <span class="hide-menu">@lang('main.Archive')</span>

                        </a>
                        <ul aria-expanded="false" class="collapse  first-level">
                            <li class="sidebar-item">
                                <a href="{{ route('complaintsWorkSOPArchives.index') }}" class="sidebar-link">
                                    <i class="mdi mdi-archive"></i>
                                    <span class="hide-menu">@lang('main.Archive')</span>
                                </a>
                            </li>

                        </ul>
                    </li>
                </ul>
            </li>

            <li class="sidebar-item">
                <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                    <i class="	fas fa-retweet"></i>
                    <span class="hide-menu">@lang('main.Change control1')</span>
                </a>
                <ul aria-expanded="false" class="collapse  first-level">
                    <li class="sidebar-item">
                        <a href="{{ route('changeControlSOP.index') }}" class="sidebar-link">
                            <i class="mdi mdi-adjust"></i>
                            <span class="hide-menu"> @lang('main.Change control')
                            </span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="{{ route('changeControlRequests.index') }}" class="sidebar-link">
                            <i class="mdi mdi-adjust"></i>
                            <span class="hide-menu" style='font-size:12px'> @lang('main.Change Control Request ') </span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                            <i class="mdi mdi-archive"></i>
                            <span class="hide-menu">@lang('main.Archive')</span>

                        </a>
                        <ul aria-expanded="false" class="collapse  first-level">
                            <li class="sidebar-item">
                                <a href="{{ route('changeControlSOPArchives.index') }}" class="sidebar-link">
                                    <i class="mdi mdi-archive"></i>
                                    <span class="hide-menu">@lang('main.Archive')</span>
                                </a>
                            </li>

                        </ul>
                    </li>
                </ul>
            </li>

            <li class="sidebar-item">
                <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                    <i class="	fas fa-sync-alt"></i>
                    <span class="hide-menu">@lang('main.Improvement1')</span>
                </a>
                <ul aria-expanded="false" class="collapse  first-level">
                    <li class="sidebar-item">
                        <a href="{{ route('ContinuousImprovementSOP.index') }}" class="sidebar-link">
                            <i class="mdi mdi-adjust"></i>
                            <span class="hide-menu"> @lang('main.Improvement')
                            </span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="{{ route('contractStats.index') }}" class="sidebar-link">
                            <i class="mdi mdi-adjust"></i>
                            <span class="hide-menu"> @lang('main.contract statistics')</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="{{ route('trainingStats.index') }}" class="sidebar-link">
                            <i class="mdi mdi-adjust"></i>
                            <span class="hide-menu"> @lang('main.Training statistics')</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="{{ route('nonConformanceStats.index') }}" class="sidebar-link">
                            <i class="mdi mdi-adjust"></i>
                            <span class="hide-menu"> @lang('main.Nonconformance statistics')</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="{{ route('followUpRecordImprovements.index') }}" class="sidebar-link">
                            <i class="mdi mdi-adjust"></i>
                            <span class="hide-menu"> @lang('main.Follow-up record of improvement and development work')</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="{{ route('dataCollectionReports.index') }}" class="sidebar-link">
                            <i class="mdi mdi-adjust"></i>
                            <span class="hide-menu"> @lang('main.Data collection and analysis report')</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="{{ route('recordAnalysis.index') }}" class="sidebar-link">
                            <i class="mdi mdi-adjust"></i>
                            <span class="hide-menu"> @lang('main.Analyze customer complaints')</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                            <i class="mdi mdi-archive"></i>
                            <span class="hide-menu">@lang('main.Archive')</span>

                        </a>
                        <ul aria-expanded="false" class="collapse  first-level">
                            <li class="sidebar-item">
                                <a href="{{ route('ContinuousSOPArchives.index') }}" class="sidebar-link">
                                    <i class="mdi mdi-archive"></i>
                                    <span class="hide-menu">@lang('main.Archive')</span>
                                </a>
                            </li>

                        </ul>
                    </li>
                    
                </ul>
            </li>

             <li class="sidebar-item">
                <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                    <i class="	fas fa-sync-alt"></i>
                    <span class="hide-menu">@lang('main.All Sop')</span>
                </a>
                <ul aria-expanded="false" class="collapse  first-level">
                    <li class="sidebar-item">
                        <a href="{{ route('all_sop.index') }}" class="sidebar-link">
                            <i class="mdi mdi-adjust"></i>
                            <span class="hide-menu"> @lang('main.All Sop')
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
