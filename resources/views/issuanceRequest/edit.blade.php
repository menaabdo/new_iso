@extends('layouts.master')
@section('content')
<style>
    .shadow-lg {
        box-shadow: 0 1rem 3rem rgba(0, 0, 0, .175) !important;
    }

    input,
    textarea {
        box-shadow: 0 1rem 3rem rgba(0, 0, 0, .175) !important;
    }
    @media only screen and (max-width: 900px) {
    .card-body{
        width:90%;
    }
    }
</style>
    <div class="card">
        <div class="card-body row" style='margin-top:80px'>

           
            <form action="{{ route('issuanceRequest.update', $issuanceRequest->id) }}" class='col-md-10' style='margin:auto' method="post"
                enctype="multipart/form-data" id="fo1">
                @method('PUT')
                {{ csrf_field() }}
                <div style="" class="w-100 text-center my-4">
                    <h2 style='text-shadow: 1px 1px 1px #3ed3ea;'>@lang('main.DCR') </h2>
                    <hr class="w-100">
                </div>
                <div class='row mt-4 mb-3'>
                <label class="form-label col-md-2 ">@lang('main.Company Logo')</label>
 
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
                    <img src="{{ asset($issuanceRequest->logo) }}" height=100px width=100px; />
                </div>
                <div class='row mt-4 mb-3'>
             
                    <label for=""  class="form-label col-md-2 ">1-@lang('main.Management') :</label>
                    
                        <input type="text" class="col-md-6 form-control" name="management"
                            value="{{ $issuanceRequest->management }}">
                    </div>
                    <div class="vertical"></div>
                    <div class='row mt-4 mb-3'>
             
                    <label for="" class="col-md-2 col-form-label">@lang('main.date') :</label>
                   
                        <input type="date" class="col-md-6 form-control" name="date_1" value="{{ $issuanceRequest->date_1 }}">
                    </div>
                </div>
                <hr class="w-100">
                <div class='row mt-4 mb-3 '>
                       <label for="" class=" col-2 col-form-label">2-@lang('main.The type and name of the document')</label>
                    <div class="col-12 ">
                        <textarea type="text" class="form-control" placeholder="  ......" name="document_type_and_name">{{ $issuanceRequest->document_type_and_name }}</textarea>
                    </div>
                </div>
                <div class="form-group row w-100 text-left">
                <div class='col-md-4'>
                    <div class='row '>
                       <label for="" class="col-md-12 col-form-label ">3-@lang('main.document_number') :</label>
                  
                        <input type="text" class="form-control mx-5" name="document_code"
                            value="{{ $issuanceRequest->document_code }}">
                            </div>
                </div>
                <div class='col-md-4'>
                    <div class='row ml-5'>
                       
                    <label for=""  class="col-md-12 col-form-label text-left">@lang('main.release_number')</label>
                    
                        <input type="text" class="form-control" name="issue_number"
                            value="{{ $issuanceRequest->issue_number }}">
                    </div>
                    </div>
                    <div class='col-md-4'>
                    <div class='row'>
                       
                    <label for="" class="col-md-12 col-form-label text-left">@lang('main.release_date') :</label>
                   
                        <input type="date" class="form-control" name="release_date"
                            value="{{ $issuanceRequest->release_date }}">
                    </div>
                </div>
                </div>
                <hr class="w-100">
                
                    <h2 for="" class=" col-form-label" style='margin:auto'>4-@lang('main.Summary of the request and its reason') :</h2>
                    <div class="form-group row w-100 ">
                <div class="col-md-4 col-form-label text-center">
                <input type="radio" name="summary" value="issuance" <?php if ($issuanceRequest->summary == 'issuance') {
                            echo 'checked="checked"';
                        } ?>>
                        <label for="" class=" col-form-label text-left">@lang('main.release') </label>
                    </div>
                    <div class="col-md-4 col-form-label text-center">
                   <input type="radio" name="summary" value="update" <?php if ($issuanceRequest->summary == 'update') {
                            echo 'checked="checked"';
                        } ?>>
                        <label for="" class="col-2 col-form-label text-left">@lang('main.edit') </label>
                    </div>
                    <div class="col-md-4 col-form-label text-center">
                     <input type="radio" name="summary" value="cancel" <?php if ($issuanceRequest->summary == 'cancel') {
                            echo 'checked="checked"';
                        } ?>>
                        <label for="" class="col-2 col-form-label text-left">@lang('main.cancel') </label>
                    </div>
                       <textarea type="text" class="form-control " style='    margin-right: 120px' placeholder="  ......" name="reason">{{ $issuanceRequest->reason }}</textarea>
                   
                </div>
                <hr class="w-100">
                            <h2 for="" class="col-2 col-form-label"  style='margin:auto'>5-@lang('main.Proposed modifications')  </h2>
                    <div class="row">
                        <textarea type="text" class="form-control col-md-10"  style='    margin-right: 100px' placeholder="  ......" name="suggested_modifications">{{ $issuanceRequest->suggested_modifications }}</textarea>
                    </div>
               
                <hr class="w-100">
                <div class="form-group text-left">
                   <h2 for="" class="col-2 col-form-label" style='margin:auto'>@lang('main.applicant') :</h2>
                    </div>
                <div class="form-group row w-10 text-center" >
                    <label for="" class="col-4 col-form-label text-right">@lang('main.name')</label>
                    <div class="col-4">
                        <input type="text" class="form-control" placeholder="  ......" name="applicant"
                            value="{{ $issuanceRequest->applicant }}">
                    </div>
                </div>
                @if ($issuanceRequest->status == 'inProgress' && Auth::user()->hasRole('Employee'))
                    <div class="form-group text-left">
                        <h1 for="" class="col-4 col-form-label">6-@lang('main.Quality manager saw') :</h1>
                        <div class="col-10" style='margin:auto'>
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
                                            @lang('main.name') :</label>

                                        <input class="form-control" type="text" name="quality_manager_name" readonly
                                            style="text-align: end;" placeholder=""
                                            value="{{ $issuanceRequest->quality_manager_name }}">
                                    </div>

                                </th>
                                <th class=" text-center col-4 ">
                                    <div class="" style="text-align:start ;">
                                        <label for="" class=""
                                            style="text-align: center;font-size:large;font-weight: bolder;">
                                            @lang('main.job') :</label>

                                        <input class="form-control" type="text" name="quality_manager_job"
                                            style="text-align: end;" value="{{ $issuanceRequest->quality_manager_job }}"
                                            readonly>
                                    </div>

                                </th>
                                <th class=" text-center col-4 ">
                                    <div class="" style="text-align:start ;">
                                        <label for="" class=""
                                            style="text-align: center;font-size:large;font-weight: bolder;">@lang('main.date'):</label>

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
                        <h1 for="" class="col-4 col-form-label">6-@lang('main.Quality manager saw') :</h1>
                        <div class="col-10" style='margin:auto'>
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
                                            @lang('main.name') :</label>

                                        <input class="form-control" type="text" name="quality_manager_name" readonly
                                            style="text-align: end;" placeholder=""
                                            value="{{ $issuanceRequest->quality_manager_name }}">
                                    </div>

                                </th>
                                <th class=" text-center col-4 ">
                                    <div class="" style="text-align:start ;">
                                        <label for="" class=""
                                            style="text-align: center;font-size:large;font-weight: bolder;">
                                            @lang('main.job') :</label>

                                        <input class="form-control" type="text" name="quality_manager_job"
                                            style="text-align: end;" value="{{ $issuanceRequest->quality_manager_job }}"
                                            readonly>
                                    </div>

                                </th>
                                <th class=" text-center col-4 ">
                                    <div class="" style="text-align:start ;">
                                        <label for="" class=""
                                            style="text-align: center;font-size:large;font-weight: bolder;">@lang('main.date')
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
                        <h1 for="" class="col-10 col-form-label">*@lang('main.In the event that there is more than one administration, their approvals and signatures shall be attached in a table showing the administration and its opinion and the signature of the person in charge')</h1>
                    </div>

                    <div class="form-group row w-100 text-left">
                        <label for="" class="col-2 col-form-label">-@lang('main.Resolution supported document') </label>
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
                                            @lang('main.name') :</label>

                                        <input class="form-control" type="text" readonly name="document_approved_name"
                                            value="{{ $issuanceRequest->document_approved_name }}"style="text-align: end;"
                                            placeholder="">
                                    </div>

                                </th>
                                <th class=" text-center col-4 ">
                                    <div class="" style="text-align:start ;">
                                        <label for="" class=""
                                            style="text-align: center;font-size:large;font-weight: bolder;">
                                            @lang('main.job') :</label>

                                        <input class="form-control" type="text" name="document_approved_job" readonly
                                            value="{{ $issuanceRequest->document_approved_job }}"
                                            style="text-align: end;" placeholder="">
                                    </div>

                                </th>
                                <th class=" text-center col-4 ">
                                    <div class="" style="text-align:start ;">
                                        <label for="" class=""
                                            style="text-align: center;font-size:large;font-weight: bolder;">@lang('main.date')
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
                    <div class="form-group text-center" style='margin:auto'>
                        <h1 for="" class="col-4 col-form-label">6-@lang('main.Quality manager saw') :</h1>
                        <div class="col-10" >
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
                                            @lang('main.name') :</label>

                                        <input class="form-control" type="text" name="quality_manager_name"
                                            style="text-align: end;" placeholder=""
                                            value="{{ $issuanceRequest->quality_manager_name }}">
                                    </div>

                                </th>
                                <th class=" text-center col-4 ">
                                    <div class="" style="text-align:start ;">
                                        <label for="" class=""
                                            style="text-align: center;font-size:large;font-weight: bolder;">
                                            @lang('main.job') :</label>

                                        <input class="form-control" type="text" name="quality_manager_job"
                                            style="text-align: end;" value="{{ $issuanceRequest->quality_manager_job }}">
                                    </div>

                                </th>
                                <th class=" text-center col-4 ">
                                    <div class="" style="text-align:start ;">
                                        <label for="" class=""
                                            style="text-align: center;font-size:large;font-weight: bolder;">@lang('main.date')
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
                            <h1 for="" class="col-10 col-form-label">*@lang('main.In the event that there is more than one administration, their approvals and signatures shall be attached in a table showing the administration and its opinion and the signature of the person in charge')</h1>
                        </div>

                        <div class="form-group row w-100 text-left">
                            <label for="" class="col-2 col-form-label">-@lang('main.Resolution supported document') </label>
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
                                                @lang('main.name') :</label>

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
                                                @lang('main.job') :</label>

                                            <input class="form-control" readonly type="text"
                                                name="document_approved_job"
                                                value="{{ $issuanceRequest->document_approved_job }}"
                                                style="text-align: end;" placeholder="">
                                        </div>

                                    </th>
                                    <th class=" text-center col-4 ">
                                        <div class="" style="text-align:start ;">
                                            <label for="" class=""
                                                style="text-align: center;font-size:large;font-weight: bolder;">@lang('main.date')
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
                    <div class="form-group text-left" >
                        <h1 for="" style='margin:auto' class="col-4 col-form-label">6-@lang('main.Quality manager saw') :</h1>
                        <div class="col-10" style='margin:auto'>
                            <textarea type="text" class="form-control" name="quality_manager">{{ $issuanceRequest->quality_manager }}</textarea>
                        </div>
                    </div>
                    <div class='row'>
                    <table class="table col-md-9 table-bordered" style='margin:auto'>
                        <thead>
                            <tr>
                                <th class="  text-center col-4 ">
                                    <div class="" style="text-align:start ;">
                                        <label for="" class=""
                                            style="text-align: center;font-size:large;font-weight: bolder;">
                                            @lang('main.name') :</label>

                                        <input class="form-control" type="text" name="quality_manager_name"
                                            style="text-align: end;" placeholder=""
                                            value="{{ $issuanceRequest->quality_manager_name }}">
                                    </div>

                                </th>
                                <th class=" text-center col-4 ">
                                    <div class="" style="text-align:start ;">
                                        <label for="" class=""
                                            style="text-align: center;font-size:large;font-weight: bolder;">
                                            @lang('main.job') :</label>

                                        <input class="form-control" type="text" name="quality_manager_job"
                                            style="text-align: end;" value="{{ $issuanceRequest->quality_manager_job }}">
                                    </div>

                                </th>
                                <th class=" text-center col-4 ">
                                    <div class="" style="text-align:start ;">
                                        <label for="" class=""
                                            style="text-align: center;font-size:large;font-weight: bolder;">@lang('main.date')
                                            :</label>

                                        <input class="form-control" type="date" name="quality_manager_date"
                                            value="{{ $issuanceRequest->quality_manager_date }}"
                                            style="text-align: end;">
                                    </div>
                                </th>
                            </tr>
                        </thead>
                    </table>
                    </div>
                    <div class="form-group row w-100 text-center">
                        <h1 for="" class="col-10 col-form-label">*@lang('main.In the event that there is more than one administration, their approvals and signatures shall be attached in a table showing the administration and its opinion and the signature of the person in charge')</h1>
                    </div>

                    <div class="form-group row w-100 text-left">
                        <label for="" class="col-4 col-form-label" style='margin:auto'>-@lang('main.Resolution supported document') </label>
                        <div class="col-10" style='margin:auto'>
                            <textarea type="text"  class="form-control" placeholder="  ......" name="document_approved_decision">{{ $issuanceRequest->document_approved_decision }}</textarea>
                        </div>
                    </div>
                   
                    <table class="table col-md-9 table-bordered" style='margin:auto'>
                        <thead>
                            <tr>
                                <th class="  text-center col-4 ">
                                    <div class="" style="text-align:start ;">
                                        <label for="" class=""
                                            style="text-align: center;font-size:large;font-weight: bolder;">
                                            @lang('main.name') :</label>

                                        <input class="form-control" type="text" name="document_approved_name"
                                            value="{{ $issuanceRequest->document_approved_name }}"style="text-align: end;"
                                            placeholder="">
                                    </div>

                                </th>
                                <th class=" text-center col-4 ">
                                    <div class="" style="text-align:start ;">
                                        <label for="" class=""
                                            style="text-align: center;font-size:large;font-weight: bolder;">
                                            @lang('main.job') :</label>

                                        <input class="form-control" type="text" name="document_approved_job"
                                            value="{{ $issuanceRequest->document_approved_job }}"
                                            style="text-align: end;" placeholder="">
                                    </div>

                                </th>
                                <th class=" text-center col-4 ">
                                    <div class="" style="text-align:start ;">
                                        <label for="" class=""
                                            style="text-align: center;font-size:large;font-weight: bolder;">@lang('main.date')
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
              
                <table class="table col-md-9 mt-5" style='margin:auto'>
                    <thead>
                        <tr>
                            <th>
                                <div class="" style="text-align:start ;">
                                    <label>@lang('main.Company Name')</label>
                                    <input class="form-control" type="text" name="company_name"
                                        value="{{ $issuanceRequest->company_name }}"placeholder="اسم الشركة  :">
                                </div>

                            </th>
                            <th>
                                <div class="" style="text-align:start ;">
                                    <label>@lang('main.release_date') </label>
                                    <input class="form-control" type="text" name="date2"
                                        value="{{ $issuanceRequest->date2 }}"placeholder="تاريخ الإصدار   :"
                                        onfocus="(this.type='date')" onblur="(this.type='text')">
                                </div>

                            </th>
                            <th>
                                <div class="" style="text-align:start ;">
                                    <label>@lang('main.Modification date')</label>
                                    <input class="form-control" type="text" name="date3"
                                        value="{{ $issuanceRequest->date3 }}" placeholder="تاريخ التعديل :"
                                        onfocus="(this.type='date')" onblur="(this.type='text')">
                                </div>

                            </th>
                            <th>
                            <div class="" style="text-align:start ;">
                                <label>@lang('main.model_period')</label>
                                <input class="form-control shadow-lg" type="text" name="period_time" value="{{ $issuanceRequest->period_time }}">
                            </div>

                        </th>
                        <th>
                            <div class="" style="text-align:start ;">
                                <label>@lang('main.page_number')</label>
                                <input class="form-control shadow-lg" type="text" name="number_page" value="{{ $issuanceRequest->number_page }}">
                            </div>

                        </th>
                        <th>
                            <div class="" style="text-align:start ;">
                                <label>@lang('main.document_code')</label>
                                <input class="form-control shadow-lg" type="text" name="number_doc" value="{{ $issuanceRequest->number_doc }}">
                            </div>
                        </th>
                        </tr>
                    </thead>
                </table>
                   
                @if ($issuanceRequest->status == 'pending' && Auth::user()->hasRole('Employee'))
                <div class="row">
                    <button style="border-radius:20px;margin: 50px; width:10% ; height: 5%;" type="submit"
                        class="btn btn-primary"><i class="fas fa-save" style="width:15% ; height: 20%;">@lang('main.edit')
                        </i></button>
                </div>
            @elseif(($issuanceRequest->status == 'inProgress' && Auth::user()->hasRole('Admin')) ||
                ($issuanceRequest->status == 'pending' && Auth::user()->hasRole('Admin')))
                <div class="form-group">
                    <button style="border-radius:20px;margin: 50px; width:10% ; height: 5%;" type="submit"
                        class="btn btn-primary"><i class="fas fa-save" style="width:15% ; height: 20%;">@lang('main.edit')
                        </i></button>
                </div>
            @elseif(($issuanceRequest->status == 'inProgress' && Auth::user()->hasRole('SuperAdmin')) ||
                ($issuanceRequest->status == 'pending' && Auth::user()->hasRole('SuperAdmin')) ||
                ($issuanceRequest->status == 'confirmed' && Auth::user()->hasRole('SuperAdmin')))
                <div class='row'>
                    <button style="border-radius:8px;margin: 50px; width:30% ;background-color: #2a415b; ;height: 5%;padding:10px;margin-right:100px;margin:auto" type="submit" class="btn btn-primary col-md-4">
                       @lang('main.edit')</button>
                </div>
            @endif
                {{-- @if ($issuanceRequest->status == 'pending' && Auth::user()->hasRole('Employee'))
                    <div class="form-group">
                        <button style="border-radius:20px;margin: 50px; width:10% ; height: 5%;" type="submit"
                            class="btn btn-primary"><i class="fas fa-save" style="width:15% ; height: 20%;">@lang('main.edit')
                            </i></button>
                    </div>
                @elseif(($issuanceRequest->status == 'inProgress' && Auth::user()->hasRole('Admin')) ||
                    ($issuanceRequest->status == 'pending' && Auth::user()->hasRole('Admin')))
                    <div class="row">
                        <button style="border-radius:20px;margin: 50px; width:10% ; height: 5%;" type="submit"
                            class="btn btn-primary"><i class="fas fa-save" style="width:15% ; height: 20%;">@lang('main.edit')
                            </i></button>
                    </div>
                @elseif(($issuanceRequest->status == 'inProgress' && Auth::user()->hasRole('SuperAdmin')) ||
                    ($issuanceRequest->status == 'pending' && Auth::user()->hasRole('SuperAdmin')) ||
                    ($issuanceRequest->status == 'confirmed' && Auth::user()->hasRole('SuperAdmin')))
                    <div class='row mt-3'>
                <button style="border-radius:8px;margin: 50px; width:30% ;background-color: #2a415b; ;height: 5%;padding:10px;margin-right:100px;margin:auto" type="submit" class="btn btn-primary col-md-4">
                    <i class="fas fa-save" style="width:15% ; height: 20%;"></i>@lang('main.edit')</button>
            </div>
                @endif
                <div class='row mt-3'>
                <button style="border-radius:8px;margin: 50px; width:30% ;background-color: #2a415b; ;height: 5%;padding:10px;margin-right:100px;margin:auto" type="submit" class="btn btn-primary col-md-4">
                    <i class="fas fa-save" style="width:15% ; height: 20%;"></i>@lang('main.edit')</button>
            </div> --}}
                </div>
            </form>
        

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
