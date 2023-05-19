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
                        @lang('main.Quality goals')
                    </div>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="{{ route('sop.index') }}">@lang('main.quality objectives')</a>
                        <a class="dropdown-item" href="{{ route('sop.index') }}">@lang('main.objectives execution plan form')</a>
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
                        @lang('main.Risk assessment')</div>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="{{ route('risksop.index') }}">@lang('main.Risk assessment1')</a>
                        <a class="dropdown-item" href="{{ route('risk.index') }}">@lang('main.Risk Management report') </a>

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
                        @lang('main.internal audit')</div>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="{{ route('interiorsop.index') }}">@lang('main.internal audit1')</a>
                        <a class="dropdown-item" href="{{ route('interior.index') }}">@lang('main.Follow up on the results of the internal audit')</a>
                        <a class="dropdown-item" href="{{ route('internalAudit.index') }}">@lang('main.List of Internal Audits')</a>
                        <a class="dropdown-item" href="{{ route('noticeInternal.index') }}">@lang('main.Notify of an internal  audit')</a>
                        <a class="dropdown-item" href="{{ route('InternalAuditReport.index') }}">@lang('main.IA Report')</a>
                        <a class="dropdown-item" href="{{ route('listInternalAuditor.index') }}">@lang('main.List of approved internal auditors')</a>
                        <a class="dropdown-item" href="{{ route('assigned.index') }}">@lang('main.Assigning an internal auditor')</a>
                        <a class="dropdown-item" href="{{ route('work_plan.index') }}">@lang('main.Annual plan for internal  audit')</a>


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
                        @lang('main.Management review')</div>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="{{ route('meetingAgendasop.index') }}">@lang('main.Management review1')</a>
                        <a class="dropdown-item" href="{{ route('meetingAgenda.index') }}">@lang('main.meeting agenda')</a>
                        <a class="dropdown-item" href="{{ route('invitationMeeting.index') }}">@lang('main.Invitation to a meeting')</a>
                        <a class="dropdown-item" href="{{ route('followLog.index') }}">@lang('main.Follow-up record of senior management decisions')</a>
                        <a class="dropdown-item" href="{{ route('meetingMinute.index') }}">@lang('main.Minutes of Meeting')</a>


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
                        @lang('main.Document control1') 
                    </div>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                     
                        <a href="{{ route('recordActionSop.index') }}"class="dropdown-item">
                            @lang('main.Document control') 
                        </a>
                        <a href="{{ route('recordAction.index') }}"class="dropdown-item">
                           @lang('main.Record inventory of the sop  used')  
                        </a>
                        <a href="{{ route('recordModel.index') }}"class="dropdown-item">
                             @lang('main.Record inventory of the Forms used')  
                        </a>
                        <a href="{{ route('recordCanceledDocument.index') }}"class="dropdown-item">
                            @lang('main.Record of Canceled Documents') 
                        </a>
                        <a href="{{ route('issuanceRequest.index') }}"class="dropdown-item">
                            @lang('main.DCR') 
                        </a>
                        <a href="{{ route('directorList.index') }}"class="dropdown-item">
                           @lang('main.list of managers and individuals authorized to prepare documents') 
                        </a>
                        <a href="{{ route('listDocument.index') }}"class="dropdown-item">
                             @lang('main.Main list of documents') 
                        </a>
                        <a href="{{ route('brokenRecord.index') }}"class="dropdown-item">
                           @lang('main.List of Disposed Documents') 
                        </a>
                        <a href="{{ route('typicalForm.index') }}"class="dropdown-item">
                             @lang('main.Document receipt form') 
                           
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
                        @php
                           $string = trans('main.Corrective and preventive actions and cases of non-conformity1');
                            $split_string = wordwrap($string, 30, "\n");
                        @endphp
                        {!! nl2br(e($split_string)) !!}
                       </div>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton" style='  box-shadow: 0 1rem 3rem rgba(0, 0, 0, .175) !important;
'>
                        <a class="dropdown-item" href="{{ route('corrctivePreventiveActionsSOP.index') }}">@lang('main.Corrective and preventive actions and cases of non-conformity')</a>
                        <a class="dropdown-item" href="{{ route('corrctivePreventiveActions.index') }}">@lang('main.CAR/PAR')</a>
                        <a class="dropdown-item" href="{{ route('Non_conformities.index') }}">@lang('main.NCR')</a>
                        <a class="dropdown-item" href="{{ route('nonConformanceReport.index') }}">@lang('main.Record follow-up reports of non-conformance')</a>
                        <a class="dropdown-item" href="{{ route('followUpRecord.index') }}">@lang('main.Follow-up record of corrective/preventive action requests') </a>
                        <a class="dropdown-item" href="{{ route('reportNonConformanceCases.index') }}">@lang('main.Report cases of non-conformity and corrective and preventive actions')</a>




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
                        @lang('main.Organization Context1')
                    </div>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton" style='  box-shadow: 0 1rem 3rem rgba(0, 0, 0, .175) !important;
'>
                        <a class="dropdown-item" href="{{ route('understandingOrganizationSOP.index') }}">@lang('main.Organization Context')</a>
                        <a class="dropdown-item" href="{{ route('externalCases.index') }}">@lang('main.external Issue Form')</a>
                        <a class="dropdown-item" href="{{ route('internalCases.index') }}">@lang('main.Internal Issue Form')</a>
                        <a class="dropdown-item" href="{{ route('interestedParties.index') }}">@lang('main.Interested Parties Form')</a>
                        <a class="dropdown-item" href="{{ route('swot.index') }}">@lang('main.SWOT analysis') </a>



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
                        @php
                        $string2 = trans('main.Measuring customer satisfaction1');
                         $split_string2 = wordwrap($string2, 20, "\n");
                     @endphp
                     {!! nl2br(e($split_string2)) !!}
                        
                    </div>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton" style='  box-shadow: 0 1rem 3rem rgba(0, 0, 0, .175) !important;
'>
                        <a class="dropdown-item" href="{{ route('complaintsWorkSOP.index') }}">@lang('main.Measuring customer satisfaction')</a>
                        <a class="dropdown-item" href="{{ route('customers.index') }}">@lang('main.Customers')</a>
                        <a class="dropdown-item" href="{{ route('questionnaireForms.index') }}">@lang('main.Questionnaire form for the course and trainer')</a>
                        <a class="dropdown-item" href="{{ route('customerComplaints.index') }}">@lang('main.Follow up on a customer complaint')</a>
                        <a class="dropdown-item" href="{{ route('customerSatisfactions.index') }}">@lang('main.customer satisfaction')</a>
                        <a class="dropdown-item" href="{{ route('complaintStudies.index') }}">@lang('main.Customer complaint report')</a>


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
                        <i class="	fas fa-retweet" style='margin:4px'></i>@lang('main.Change control1')
                    </div>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton" style='  box-shadow: 0 1rem 3rem rgba(0, 0, 0, .175) !important;
'>
                        <a class="dropdown-item" href="{{ route('changeControlSOP.index') }}">@lang('main.Change control')</a>
                        <a class="dropdown-item" href="{{ route('changeControlRequests.index') }}">@lang('main.Change Control Request ')</a>



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
                        @lang('main.Improvement1')
                    </div>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton" style='  box-shadow: 0 1rem 3rem rgba(0, 0, 0, .175) !important;
'>
                        <a class="dropdown-item" href="{{ route('ContinuousImprovementSOP.index') }}">@lang('main.Improvement')</a>
                        <a class="dropdown-item" href="{{ route('contractStats.index') }}">@lang('main.contract statistics')</a>
                        <a class="dropdown-item" href="{{ route('trainingStats.index') }}">@lang('main.Training statistics')</a>
                        <a class="dropdown-item" href="{{ route('nonConformanceStats.index') }}">@lang('main.Nonconformance statistics')</a>
                        <a class="dropdown-item" href="{{ route('followUpRecordImprovements.index') }}">@lang('main.Follow-up record of improvement and development work')</a>
                        <a class="dropdown-item" href="{{ route('dataCollectionReports.index') }}">@lang('main.Data collection and analysis report')</a>
                        <a class="dropdown-item" href="{{ route('recordAnalysis.index') }}">@lang('main.Analyze customer complaints')</a>


                    </div>
                </div>
            </h5>
        </div>
    </div>
    <!--  -->
</div>
@stop
