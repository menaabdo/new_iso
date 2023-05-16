@extends('layouts.master')
@section('content')
<style>
    .shadow-lg {
    box-shadow: 0 1rem 3rem rgba(0,0,0,.175)!important;}
    input,textarea{ box-shadow: 0 1rem 3rem rgba(0,0,0,.175)!important;}
</style>
<div class="card">
<div class="card-body row" style='margin-top:80px'>
       <form action="{{route('Non_conformities.update',$Non_conformities->id)}}" class='col-md-12 ' style='margin:auto;margin-right:300px !important' method="post" enctype="multipart/form-data" id="fo1">
        @method('PUT')
        {{ csrf_field() }}
        <div style="" class="w-100 text-center my-4">
        <h3 style="margin-top:85px;">@lang('main.NCR')</h3>
  
            <input style="text-align: center;;margin:auto" class=' form-control col-md-6' type="text"  name="number_1" value="{{$Non_conformities->number_1}}">
            <hr >
        </div>
        <div class=" form-group row  text-right">
      <label class="col-3 col-form-label ">@lang('main.Company Logo')</label>
    
             @if ($Non_conformities->status == 'pending' && Auth::user()->hasRole('Employee'))

            <input type="file" id="img" name="logo" accept="image/*">
        @endif

        @if (($Non_conformities->status == 'inProgress' && Auth::user()->hasRole('Admin')) ||
        ($Non_conformities->status == 'pending' && Auth::user()->hasRole('Admin')))
            <input type="file" id="img" name="logo" accept="image/*">
        @endif
        @if (($Non_conformities->status == 'inProgress' && Auth::user()->hasRole('SuperAdmin')) ||
            ($Non_conformities->status == 'pending' && Auth::user()->hasRole('SuperAdmin')) ||
            ($Non_conformities->status == 'confirmed' && Auth::user()->hasRole('SuperAdmin')))
            <input type="file" id="img" name="logo" accept="image/*">
        @endif
        <img src="{{ asset($Non_conformities->logo) }}" height=100px width=100px; />
          
</div>
<div class=" form-group row  text-center">
               <label for="" class="col-3 col-form-label text-right">@lang('main.date'):</label>
               <div class="col-4">
                    <input type="date" class="form-control" name="date_1"  value="{{$Non_conformities->date_1}}">
                </div>
                </div>
                <div class=" form-group row  text-center">
             
                    <label for="" class="col-3 col-form-label ">@lang('main.competent_authority'):</label>
                    <div class="col-4">
                    <input type="text" class="form-control" name="competent_authority"  value="{{$Non_conformities->competent_authority}}">
                </div>
            </div>
            <div class=" form-group row  text-center">
                <label for="" class="col-3 col-form-label text-right">@lang('main.non_compliance_system'):</label>
                <div class="col-4">
                    <input type="text" class="form-control" name="non_compliance_system"  value="{{$Non_conformities->non_compliance_system}}">
                </div>
            </div>
            <div class=" form-group row w-200 text-left">
                <label for="" class="col-4 col-form-label text-right">@lang('main.Summary_analysis1') </label> :</label>
                <div class="col-4">
                    <textarea type="text" class="form-control" name="summary_analysis"> {{$Non_conformities->summary_analysis}}</textarea>
                </div>
            </div>
            <div class="form-group row w-100 text-right" style="text-align:center ;">
            <div style="overflow-x:auto;margin:auto" class='col-md-9'>   
             
            <table class="table">
                    <tr>
                        <th cscope="col" colspan="2" style="background-color: #001635;color:white">@lang('main.Status finder')</th>
                        <th cscope="col" colspan="2" style="background-color:#001635;color:white">@lang('main.Director of the concerned department')</th>
                        <th cscope="col" colspan="2" style="background-color:#001635;color:white">@lang('main.quality manager')</th>
                       
                    </tr>
                    <tr>
                       
                        <th scope="col" style="background-color: #001635;color:white">@lang('main.name')</th>
                        <th scope="col"><input class="form-control" type="text" name="name_1" value="{{$Non_conformities->name_1}}"></th>
                        <th scope="col" style="background-color:#001635;color:white">@lang('main.name')</th>
                        <th scope="col"><input class="form-control" type="text" name="name_2" value="{{$Non_conformities->name_2}}"></th>
                        <th scope="col" style="background-color:#001635;color:white">@lang('main.name')</th>
                        <th scope="col"><input class="form-control" type="text" name="name_3" value="{{$Non_conformities->name_3}}"></th>
                    </tr>
                    <tr>
                      
                        <th scope="col" style="background-color:#001635;color:white">@lang('main.job')</th>
                        <th scope="col"><input class="form-control" type="text" name="employ_1" value="{{$Non_conformities->employ_1}}"></th>
                        <th scope="col" style="background-color:#001635;color:white">@lang('main.job')</th>
                        <th scope="col"><input class="form-control" type="text" name="employ_2" value="{{$Non_conformities->employ_2}}"></th>
                        <th scope="col" style="background-color:#001635;color:white">@lang('main.job')</th>
                        <th scope="col"><input class="form-control" type="text" name="employ_3" value="{{$Non_conformities->employ_3}}"></th>
                    </tr>
                </table>
            </div>
            </div>
            <hr width="1200px;" size="20" color="rgb(227, 252, 160)">
            <div class=" form-group row w-200 text-right">
                <label for="" class="col-3 col-form-label text-right">@lang('main.case_study'):</label>
                <div class="col-5">
                    <textarea type="text" class="form-control" placeholder=":" name="case_study">{{$Non_conformities->case_study}}</textarea>
                </div>
            </div>
            <div class=" form-group row w-200 text-right">
                <label for="" class="col-3 col-form-label text-right">@lang('main.decision_taken'):</label>
                <div class="col-5">
                    <textarea type="text" class="form-control" placeholder=":" name="decision_taken">{{$Non_conformities->decision_taken}}</textarea>
                </div>
            </div>
            <table class="table">
                <thead>
                    <tr>
                        @if ($Non_conformities->status == 'inProgress' && Auth::user()->hasRole('Employee'))
                        <th class=" w-50 text-center col-2 ">
                            <div class="" style="text-align:center ;">
                                <label for="" class="" style="font-size:large;font-weight: bolder;">@lang('main.prepare') (@lang('main.quality controller')) </label>
                            </div>
                            <div class="form-group row w-10 text-center">
                                <label for="" class="col-1 col-form-label">@lang('main.name')   </label>
                                <div class="col-6">
                                    <input type="text" class="form-control" readonly placeholder="  ......" name="name_4" value="{{$Non_conformities->name_4}}">
                                </div>
                            </div>
                        </th>
                        @endif
                        @if ($Non_conformities->status == 'confirmed' && Auth::user()->hasRole('Employee'))
                        <th class=" w-50 text-center col-2 ">
                            <div class="" style="text-align:center ;">
                                <label for="" class="" style="font-size:large;font-weight: bolder;">@lang('main.prepare') (@lang('main.quality controller')) </label>
                            </div>
                            <div class="form-group row w-10 text-center">
                                <label for="" class="col-1 col-form-label">@lang('main.name')   </label>
                                <div class="col-6">
                                    <input type="text" readonly class="form-control" placeholder="  ......" name="name_4" value="{{$Non_conformities->name_4}}">
                                </div>
                            </div>

                        </th>
                        <th class=" w-50 text-center col-2 ">
                            <div class="" style="text-align:center ;">
                                <label for="" class="" style="text-align:center;font-size:large;font-weight: bolder;">@lang('main.approval') (@lang('main.Director of the Department'))      </label>
                            </div>
                            <div class="form-group row w-10 text-center">
                                <label for="" class="col-1 col-form-label">@lang('main.name')   </label>
                                <div class="col-6">
                                    <input type="text" readonly class="form-control" placeholder="  ......" name="name_5" value="{{$Non_conformities->name_5}}">
                                </div>
                            </div>
                        </th>
                        @endif
                        @if (Auth::user()->hasRole('Admin'))
                        <th class=" w-50 text-center col-2 ">
                            <div class="" style="text-align:center ;">
                                <label for="" class="" style="font-size:large;font-weight: bolder;">@lang('main.prepare') (@lang('main.quality controller')) </label>
                            </div>
                            <div class="form-group row w-10 text-center">
                                <label for="" class="col-1 col-form-label">@lang('main.name')   </label>
                                <div class="col-6">
                                    <input type="text" class="form-control" placeholder="  ......" name="name_4" value="{{$Non_conformities->name_4}}">
                                </div>
                            </div>
                        </th>
                        @if ($Non_conformities->status == 'confirmed' && Auth::user()->hasRole('Admin'))
                        <th class=" w-50 text-center col-2 ">
                            <div class="" style="text-align:center ;">
                                <label for="" class="" style="text-align:center;font-size:large;font-weight: bolder;">@lang('main.approval') (@lang('main.Director of the Department'))      </label>
                            </div>
                            <div class="form-group row w-10 text-center">
                                <label for="" class="col-3 col-form-label">@lang('main.name')   </label>
                                <div class="col-6">
                                    <input type="text" class="form-control" readonly placeholder="  ......" name="name_5" value="{{$Non_conformities->name_5}}">
                                </div>
                            </div>
                        </th>
                        @endif
                        @endif
                        @if (Auth::user()->hasRole('SuperAdmin'))
                        <th class=" w-50 text-center col-2 ">
                            <div class="" style="text-align:center ;">
                                <label for="" class="" style="font-size:large;font-weight: bolder;">@lang('main.prepare') (@lang('main.quality controller')) </label>
                            </div>
                            <div class="form-group row w-10 text-center">
                                <label for="" class="col-1 col-form-label">@lang('main.name')   </label>
                                <div class="col-6">
                                    <input type="text" class="form-control" placeholder="  ......" name="name_4" value="{{$Non_conformities->name_4}}">
                                </div>
                            </div>

                        </th>
                        <th class=" w-50 text-center col-2 ">
                            <div class="" style="text-align:center ;">
                                <label for="" class="" style="text-align:center;font-size:large;font-weight: bolder;">@lang('main.approval') (@lang('main.Director of the Department'))      </label>
                            </div>
                            <div class="form-group row w-10 text-center">
                                <label for="" class="col-1 col-form-label">@lang('main.name')   </label>
                                <div class="col-6">
                                    <input type="text" class="form-control" placeholder="  ......" name="name_5" value="{{$Non_conformities->name_5}}">
                                </div>
                            </div>
                        </th>
                        @endif
                    </tr>
                </thead>
            </table>
            <hr width="1200px;" size="20" color="rgb(227, 252, 160)">
            <div class=" form-group row w-200 text-right">
                <label for="" class="col-3 col-form-label text-right">@lang('main.follow_up_decision') </label>
                <div class="col-5">
                    <textarea type="text" class="form-control" placeholder=":" name="follow_up_decision">{{$Non_conformities->follow_up_decision}}</textarea>
                </div>
            </div>
            <div class=" form-group row w-200 text-right">
                <label for="" class="col-1 col-form-label text-right">@lang('main.name'):</label>
                <div class="col-2">
                    <input type="text" class="form-control" name="name_6" value="{{$Non_conformities->name_6}}"  >
                </div>
                <label for="" class="col-1 col-form-label text-right">@lang('main.job'):</label>
                <div class="col-2">
                    <input type="text" class="form-control" name="employ_4" value="{{$Non_conformities->employ_4}}">
                </div>
                <label for="" class="col-1 col-form-label text-right">@lang('main.date')  :</label>
                <div class="col-3">
                    <input type="date" class="form-control" name="date_2" value="{{$Non_conformities->date_2}}">
                </div>
            </div>
            <div style="" class="w-100 text-left my-4">
                <label>@lang('main.(5) Studying the implementation and effectiveness of the decision taken and the need for corrective/preventive action'):</label>
            </div>
            <div style="" class="w-100 text-left my-4">
                <input type="checkbox" name="effectively_implemented" value="1" {{ $Non_conformities->effectively_implemented=="1"? 'checked':'' }}>
                <label for="" class="col-2 col-form-label text-center">@lang('main.implemented') :</label>
                <input type="checkbox"name="implemented_needs_corrective" value="1" {{ $Non_conformities->implemented_needs_corrective=="1"? 'checked':'' }}>
                <label for="" class="col-3 col-form-label text-left">@lang('main.Implemented but needs another corrective action with a number'):</label>
                <input type="text" name="number_2" value="{{$Non_conformities->number_2}}">


            </div>
            <div class=" form-group row w-200 text-left">
                <label for="" class="col-1 col-form-label text-left">@lang('main.name'):</label>
                <div class="col-3">
                    <input type="text" class="form-control" name="name_7" value="{{$Non_conformities->name_7}}">
                </div>
                <label for="" class="col-1 col-form-label text-left">@lang('main.job') :</label>
                <div class="col-3">
                    <input type="text" class="form-control" name="employ_5" value="{{$Non_conformities->employ_5}}">
                </div>
            </div>

        </div>
        <table class="table">
            <thead>
                <tr>
                    <th>
                      <div class="" style="text-align:start ;">
                        <label>@lang('main.Company Name')</label>
                        <input class="form-control" type="text" name="company_name"   value="{{ $Non_conformities->company_name }}">
                      </div>
            
                    </th>
                    <th>
                      <div class="" style="text-align:start ;">
                        <label>@lang('main.release_date') </label>
                        <input class="form-control" type="text" name="date2"  value="{{ $Non_conformities->date2 }}" onfocus="(this.type='date')" onblur="(this.type='text')">
                      </div>
            
                    </th>
                    <th>
                        <div class="" style="text-align:start ;">
                            <label>@lang('main.Modification date')</label>
                            <input class="form-control" type="text" name="date3"  value="{{ $Non_conformities->date3 }}" onfocus="(this.type='date')" onblur="(this.type='text')">
                          </div>
            
                    </th>
                    <th>
                            <div class="" style="text-align:start ;">
                                <label>@lang('main.model_period')</label>
                                <input class="form-control shadow-lg" type="text" name="period_time" value="{{ $Non_conformities->period_time }}">
                            </div>

                        </th>
                        <th>
                            <div class="" style="text-align:start ;">
                                <label>@lang('main.page_number')</label>
                                <input class="form-control shadow-lg" type="text" name="number_page" value="{{ $Non_conformities->number_page }}">
                            </div>

                        </th>
                        <th>
                            <div class="" style="text-align:start ;">
                                <label>@lang('main.document_code')</label>
                                <input class="form-control shadow-lg" type="text" name="number_doc" value="{{ $Non_conformities->number_doc }}">
                            </div>
                        </th>
                  </tr>
            </thead>
        </table>
    </div>
    @if ($Non_conformities->status == 'pending' && Auth::user()->hasRole('Employee'))
    <div class="form-group">
        <button style="border-radius:20px;margin: 50px; width:10% ; height: 5%;" type="submit"
            class="btn btn-primary"><i class="fas fa-save" style="width:15% ; height: 20%;">@lang('main.edit')
            </i></button>
    </div>
@elseif(($Non_conformities->status == 'inProgress' && Auth::user()->hasRole('Admin')) ||
    ($Non_conformities->status == 'pending' && Auth::user()->hasRole('Admin')))
    <div class="form-group">
        <button style="border-radius:20px;margin: 50px; width:10% ; height: 5%;" type="submit"
            class="btn btn-primary"><i class="fas fa-save" style="width:15% ; height: 20%;">@lang('main.edit')
            </i></button>
    </div>
@elseif(($Non_conformities->status == 'inProgress' && Auth::user()->hasRole('SuperAdmin')) ||
    ($Non_conformities->status == 'pending' && Auth::user()->hasRole('SuperAdmin')) ||
    ($Non_conformities->status == 'confirmed' && Auth::user()->hasRole('SuperAdmin')))
    <div class="form-group">
        <button style="border-radius:20px;margin: 50px; width:10% ; height: 5%;" type="submit"
            class="btn btn-primary"><i class="fas fa-save" style="width:15% ; height: 20%;">@lang('main.edit')
            </i></button>
    </div>
@endif
    </form>
    </div>
        <style>
            .table thead th {
                vertical-align: bottom;
                /* border-bottom: 2px solid black; */
            }
            
            table,
            th,
            td,
            tr {
                border: 1px solid silver;
                /* border-bottom: 2px solid black;
                border-top: 2px solid black; */
            }
        
            #mainDiv {
                height: 150px;
                width: 50px;
                background: #ffffff;
                border: 1px solid rgb(8, 2, 2);
                text-align: center;
                float:left;
                display: inline-table;
            }
        </style>
        @stop