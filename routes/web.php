<?php

use App\Http\Controllers\Administration\PermissionController;
use App\Http\Controllers\Administration\RoleController;
use App\Http\Controllers\AllSopController;
use App\Http\Controllers\AssignedController;
use App\Http\Controllers\BrokenRecordController;
use App\Http\Controllers\ChangeControlRequestController;
use App\Http\Controllers\ChangeControlSOPArchiveControlle;
use App\Http\Controllers\ChangeControlSOPController;
use App\Http\Controllers\ComplaintStudyController;
use App\Http\Controllers\ComplaintsWorkSOPArchiveController;
use App\Http\Controllers\ComplaintsWorkSOPController;
use App\Http\Controllers\ContinuousImprovementSOPArchiveControlle;
use App\Http\Controllers\ContinuousImprovementSOPController;
use App\Http\Controllers\ContractStatsController;
use App\Http\Controllers\CorrctivePreventiveActionsController;
use App\Http\Controllers\CorrctivePreventiveActionsSOPArchiveController;
use App\Http\Controllers\CorrctivePreventiveActionsSOPController;
use App\Http\Controllers\CustomerComplaintController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\CustomerSatisfactionController;
use App\Http\Controllers\DataCollectionReportController;
use App\Http\Controllers\DirectorListController;
use App\Http\Controllers\ExternalCaseController;
use App\Http\Controllers\FollowLogController;
use App\Http\Controllers\FollowUpRecordController;
use App\Http\Controllers\FollowUpRecordImprovementController;
use App\Http\Controllers\InterestedPartieController;
use App\Http\Controllers\InteriorController;
use App\Http\Controllers\InteriorSOPArchiveController;
use App\Http\Controllers\InteriorSOPController;
use App\Http\Controllers\InternalAuditController;
use App\Http\Controllers\InternalAuditReportController;
use App\Http\Controllers\InternalCaseController;
use App\Http\Controllers\InvitationMeetingController;
use App\Http\Controllers\IssuanceRequestController;
use App\Http\Controllers\ListDocumentController;
use App\Http\Controllers\ListInternalAuditorController;
use App\Http\Controllers\MeetingAgendaController;
use App\Http\Controllers\MeetingAgendaSOPArchiveController;
use App\Http\Controllers\MeetingAgendaSOPController;
use App\Http\Controllers\MeetingMinuteController;
use App\Http\Controllers\NonConformanceReportController;
use App\Http\Controllers\NonConformanceStatsController;
use App\Http\Controllers\NonConformitiesController;
use App\Http\Controllers\NoticeInternalController;
use App\Http\Controllers\QuestionnaireFormController;
use App\Http\Controllers\RecordActionController;
use App\Http\Controllers\RecordActionSOPArchiveController;
use App\Http\Controllers\RecordActionSOPController;
use App\Http\Controllers\RecordAnalysisController;
use App\Http\Controllers\RecordCanceledDocumentController;
use App\Http\Controllers\RecordModelController;
use App\Http\Controllers\ReportNonConformanceCasesController;
use App\Http\Controllers\RiskController;
use App\Http\Controllers\RiskSOPArchiveController;
use App\Http\Controllers\RiskSOPController;
use App\Http\Controllers\SOPArchiveController;
use App\Http\Controllers\SOPController;
use App\Http\Controllers\SwotController;
use App\Http\Controllers\TrainingStatsController;
use App\Http\Controllers\TypicalFormController;
use App\Http\Controllers\UnderstandingOrganizationSOPArchiveController;
use App\Http\Controllers\UnderstandingOrganizationSOPController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WorkPlanController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/login', [LoginController::class ,'login'])->name('login');
Route::post('/handleLogin', [LoginController::class ,'handleLogin'])->name('handleLogin');
Route::post('/logout', [LoginController::class ,'logout'])->name('logout');



Route::group(['middleware'=>['auth','role:SuperAdmin|Admin|Employee']], function () {
   
    Route::post('addUser/store', [RegisteredUserController::class, 'store'])->name('storeUser');
    Route::get('addUser', [RegisteredUserController::class, 'create'])->name('addUser');
    Route::resource('users', UserController::class);
    
    Route::get('/profile', [UserController::class ,'profile'])->name('profile');
    Route::get('/editProfile/{id}', [UserController::class ,'editProfile'])->name('editProfile');
    Route::put('/updateProfile/{user}', [UserController::class ,'updateProfile'])->name('updateProfile');

    // Route::get('/', function () {return view('welcome');});


});

Route::group(['middleware'=>['auth']], function () {
  
    Route::get('/', function () {
        return view('welcome');
    }); 
    // Roles Routes
    Route::get('roles',[RoleController::class,'index'])->name('index.roles');
    Route::get('roles/create',[RoleController::class,'create'])->name('roles.create');
    Route::post('roles/create',[RoleController::class,'store'])->name('roles.store');
    Route::get('roles/show/{roleId}',[RoleController::class,'show'])->name('roles.show');
    Route::get('roles/edit/{roleId}',[RoleController::class,'edit'])->name('roles.edit');
    Route::put('roles/edit/{roleId}',[RoleController::class,'update'])->name('roles.update');
    Route::delete('roles/destroy/{roleId}',[RoleController::class,'destroy'])->name('roles.destroy');


    // Permissions Routes
    Route::get('permissions',[PermissionController::class,'index'])->name('index.permissions');
    Route::get('permissions/create',[PermissionController::class,'create'])->name('permissions.create');
    Route::post('permissions/create',[PermissionController::class,'store'])->name('permissions.store');
    Route::get('permissions/show/{permissionId}',[PermissionController::class,'show'])->name('permissions.show');
    Route::get('permissions/edit/{permissionId}',[PermissionController::class,'edit'])->name('permissions.edit');
    Route::put('permissions/edit/{permissionId}',[PermissionController::class,'update'])->name('permissions.update');
    Route::delete('permissions/destroy/{permissionId}',[PermissionController::class,'destroy'])->name('permissions.destroy');


    Route::resource('/all_sop',AllSopController::class);

    Route::resource('/sop',SOPController::class);
    Route::resource('/sopArchives',SOPArchiveController::class);
    
    //Route::get('/sop-print',[SOPController::class,'print']);
    Route::get('/sop/print/{id}',[SOPController::class,'print'])->name('sop.print');
    
    Route::resource('/risksop',RiskSOPController::class);
    Route::resource('/risksopArchives',RiskSOPArchiveController::class);
    Route::get('/risksop/print/{id}',[RiskSOPController::class,'print'])->name('risksop.print');
    Route::resource('/risk',RiskController::class);
    Route::get('/risk/print/{id}',[RiskController::class,'print'])->name('risk.print');
    
    
    
    Route::resource('/interiorsop',InteriorSOPController::class);
    Route::get('/interiorsop/print/{id}',[InteriorSOPController::class,'print'])->name('interiorsop.print');
    
    Route::resource('/interior',InteriorController::class);
    Route::resource('/interiorArchives',InteriorSOPArchiveController::class);
    Route::get('/interior/print/{id}',[InteriorController::class,'print'])->name('interior.print');
    
    Route::resource('/internalAudit',InternalAuditController::class);
    Route::get('/internalAudit/print/{id}',[InternalAuditController::class,'print'])->name('internalAudit.print');
    
    Route::resource('/noticeInternal',NoticeInternalController::class);
    Route::get('/noticeInternal/print/{id}',[NoticeInternalController::class,'print'])->name('noticeInternal.print');
    
    Route::resource('/InternalAuditReport',InternalAuditReportController::class);
    Route::get('/InternalAuditReport/print/{id}',[InternalAuditReportController::class,'print'])->name('InternalAuditReport.print');
    
    Route::resource('/listInternalAuditor',ListInternalAuditorController::class);
    Route::get('/listInternalAuditor/print/{id}',[ListInternalAuditorController::class,'print'])->name('listInternalAuditor.print');
    
    Route::resource('/assigned',AssignedController::class);
    Route::get('/assigned/print/{id}',[AssignedController::class,'print'])->name('assigned.print');
    
    Route::resource('/work_plan',WorkPlanController::class);
    Route::get('/work_plan/print/{id}',[WorkPlanController::class,'print'])->name('work_plan.print');
    
    
    Route::resource('/meetingAgenda',MeetingAgendaController::class);
    Route::resource('/meetingAgendaArchives',MeetingAgendaSOPArchiveController::class);
    Route::get('/meetingAgenda/print/{id}',[MeetingAgendaController::class,'print'])->name('meetingAgenda.print');
    
    Route::resource('/meetingAgendasop',MeetingAgendaSOPController::class);
    Route::get('/meetingAgendasop/print/{id}',[MeetingAgendaSOPController::class,'print'])->name('meetingAgendasop.print');
    
    Route::resource('/invitationMeeting',InvitationMeetingController::class);
    Route::get('/invitationMeeting/print/{id}',[InvitationMeetingController::class,'print'])->name('invitationMeeting.print');
    
    Route::resource('/followLog',FollowLogController::class);
    Route::get('/followLog/print/{id}',[FollowLogController::class,'print'])->name('followLog.print');
    
    Route::resource('/meetingMinute',MeetingMinuteController::class);
    Route::get('/meetingMinute/print/{id}',[MeetingMinuteController::class,'print'])->name('meetingMinute.print');
    
    
    Route::resource('/recordAction',RecordActionController::class);
    Route::resource('/recordActionArchives',RecordActionSOPArchiveController::class);
    Route::get('/recordAction/print/{id}',[RecordActionController::class,'print'])->name('recordAction.print');
    
    Route::resource('/recordModel',RecordModelController::class);
    Route::get('/recordModel/print/{id}',[RecordModelController::class,'print'])->name('recordModel.print');
    
    Route::resource('/recordCanceledDocument',RecordCanceledDocumentController::class);
    Route::get('/recordCanceledDocument/print/{id}',[RecordCanceledDocumentController::class,'print'])->name('recordCanceledDocument.print');
    
    Route::resource('/recordActionSop',RecordActionSOPController::class);
    Route::get('/recordActionSop/print/{id}',[RecordActionSOPController::class,'print'])->name('recordActionSop.print');
    
    Route::resource('/issuanceRequest',IssuanceRequestController::class);
    Route::get('/issuanceRequest/print/{id}',[IssuanceRequestController::class,'print'])->name('issuanceRequest.print');
    
    Route::resource('/directorList',DirectorListController::class);
    Route::get('/directorList/print/{id}',[DirectorListController::class,'print'])->name('directorList.print');
    
    Route::resource('/typicalForm',TypicalFormController::class);
    Route::get('/typicalForm/print/{id}',[TypicalFormController::class,'print'])->name('typicalForm.print');
    
    Route::resource('/brokenRecord',BrokenRecordController::class);
    Route::get('/brokenRecord/print/{id}',[BrokenRecordController::class,'print'])->name('brokenRecord.print');
    
    Route::resource('/listDocument',ListDocumentController::class);
    Route::get('/listDocument/print/{id}',[ListDocumentController::class,'print'])->name('listDocument.print');
    
    Route::resource('/corrctivePreventiveActionsSOP',CorrctivePreventiveActionsSOPController::class);
    Route::get('/corrctivePreventiveActionsSOP/print/{id}',[CorrctivePreventiveActionsSOPController::class,'print'])->name('corrctivePreventiveActionsSOP.print');
    
    Route::resource('/corrctivePreventiveActions',CorrctivePreventiveActionsController::class);
    Route::resource('/corrctiveArchives',CorrctivePreventiveActionsSOPArchiveController::class);
    Route::get('/corrctivePreventiveActions/print/{id}',[CorrctivePreventiveActionsController::class,'print'])->name('corrctivePreventiveActions.print');

    Route::resource('/Non_conformities',NonConformitiesController::class);
    Route::get('/Non_conformities/print/{id}',[NonConformitiesController::class,'print'])->name('Non_conformities.print');

    Route::resource('/nonConformanceReport',NonConformanceReportController::class);
    Route::get('/nonConformanceReport/print/{id}',[NonConformanceReportController::class,'print'])->name('nonConformanceReport.print');

    Route::resource('/followUpRecord',FollowUpRecordController::class);
    Route::get('/followUpRecord/print/{id}',[FollowUpRecordController::class,'print'])->name('followUpRecord.print');

    Route::resource('/reportNonConformanceCases',ReportNonConformanceCasesController::class);
    Route::get('/reportNonConformanceCases/print/{id}',[ReportNonConformanceCasesController::class,'print'])->name('reportNonConformanceCases.print');

    
    Route::resource('/understandingOrganizationSOP',UnderstandingOrganizationSOPController::class);
    Route::resource('/understandingArchives',UnderstandingOrganizationSOPArchiveController::class);
    Route::get('/understandingOrganizationSOP/print/{id}',[UnderstandingOrganizationSOPController::class,'print'])->name('understandingOrganizationSOP.print');

    Route::resource('/internalCases',InternalCaseController::class);
    Route::get('/internalCases/print/{id}',[InternalCaseController::class,'print'])->name('internalCases.print');

    Route::resource('/externalCases',ExternalCaseController::class);
    Route::get('/externalCases/print/{id}',[ExternalCaseController::class,'print'])->name('externalCases.print');

    Route::resource('/interestedParties',InterestedPartieController::class);
    Route::get('/interestedParties/print/{id}',[InterestedPartieController::class,'print'])->name('interestedParties.print');

    Route::resource('/swot',SwotController::class);
    Route::get('/swot/print/{id}',[SwotController::class,'print'])->name('swot.print');

    
    Route::resource('/customers',CustomerController::class);
    Route::get('/customers/print/{id}',[CustomerController::class,'print'])->name('customers.print');

    Route::resource('/questionnaireForms',QuestionnaireFormController::class);
    Route::get('/questionnaireForms/print/{id}',[QuestionnaireFormController::class,'print'])->name('questionnaireForms.print');

    Route::resource('/complaintsWorkSOP',ComplaintsWorkSOPController::class);
    Route::resource('/complaintsWorkSOPArchives',ComplaintsWorkSOPArchiveController::class);
    Route::get('/complaintsWorkSOP/print/{id}',[ComplaintsWorkSOPController::class,'print'])->name('complaintsWorkSOP.print');
    
    Route::resource('/customerComplaints',CustomerComplaintController::class);
    Route::get('/customerComplaints/print/{id}',[CustomerComplaintController::class,'print'])->name('customerComplaints.print');
    
    Route::resource('/customerSatisfactions',CustomerSatisfactionController::class);
    Route::get('/customerSatisfactions/print/{id}',[CustomerSatisfactionController::class,'print'])->name('customerSatisfactions.print');
    
    Route::resource('/complaintStudies',ComplaintStudyController::class);
    Route::get('/complaintStudies/print/{id}',[ComplaintStudyController::class,'print'])->name('complaintStudies.print');
    
    
    Route::resource('/changeControlSOP',ChangeControlSOPController::class);
    Route::resource('/changeControlSOPArchives',ChangeControlSOPArchiveControlle::class);
    Route::get('/changeControlSOP/print/{id}',[ChangeControlSOPController::class,'print'])->name('changeControlSOP.print');
    
    Route::resource('/changeControlRequests',ChangeControlRequestController::class);
    Route::get('/changeControlRequests/print/{id}',[ChangeControlRequestController::class,'print'])->name('changeControlRequests.print');
    
    
    Route::resource('/ContinuousImprovementSOP',ContinuousImprovementSOPController::class);
    Route::resource('/ContinuousSOPArchives',ContinuousImprovementSOPArchiveControlle::class);
    Route::get('/ContinuousImprovementSOP/print/{id}',[ContinuousImprovementSOPController::class,'print'])->name('ContinuousImprovementSOP.print');

    Route::resource('/contractStats',ContractStatsController::class);
    Route::get('/contractStats/print/{id}',[ContractStatsController::class,'print'])->name('contractStats.print');

    Route::resource('/trainingStats',TrainingStatsController::class);
    Route::get('/trainingStats/print/{id}',[TrainingStatsController::class,'print'])->name('trainingStats.print');

    Route::resource('/nonConformanceStats',NonConformanceStatsController::class);
    Route::get('/nonConformanceStats/print/{id}',[NonConformanceStatsController::class,'print'])->name('nonConformanceStats.print');

    Route::resource('/followUpRecordImprovements',FollowUpRecordImprovementController::class);
    Route::get('/followUpRecordImprovements/print/{id}',[FollowUpRecordImprovementController::class,'print'])->name('followUpRecordImprovements.print');

    Route::resource('/dataCollectionReports',DataCollectionReportController::class);
    Route::get('/dataCollectionReports/print/{id}',[DataCollectionReportController::class,'print'])->name('dataCollectionReports.print');

    Route::resource('/recordAnalysis',RecordAnalysisController::class);
    Route::get('/recordAnalysis/print/{id}',[RecordAnalysisController::class,'print'])->name('recordAnalysis.print');


});

// Route::group(
//     [
//         'prefix' => LaravelLocalization::setLocale(),
//         'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
//     ],
//     function () {

        
        
        
    
//     }
// );
