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

</style>

<div class="card">
    <div class="card-body row" style='margin-top:80px'>



        <form action="{{ route('changeControlRequests.update',$changeControlRequest->id)}}" class='col-md-12' style='margin:auto' method="post" enctype="multipart/form-data" id="fo1">
            @method('PUT') 
                  {{ csrf_field() }}
            <div style="" class="w-100 text-center my-4">
                <h2 style='text-shadow: 1px 1px 1px #3ed3ea;'>@lang('main.Change Control Request ') </h2>
                <hr class="w-100">
            </div>
            <div class='row mt-4 mb-3 w-100'>
                <label class="form-label col-md-3 ">@lang('main.Company Logo')</label>
           
                  <input type="file" id="img" name="logo" accept="image/*">
                  <img src="{{ asset($changeControlRequest->logo) }}" height=100px width=100px; />
            
            </div>
            <div class="form-group row ">
                <label for="" class="col-3 col-form-label">@lang('main.Change address'): </label>
                <div class="col-6">
                    <input type="text" class="form-control" name="address" value="{{$changeControlRequest->address}}">
                </div>
            </div>
            <div class="form-group row ">
                <label for="" class="col-3 col-form-label">@lang('main.requester') :</label>
                <div class="col-6">
                    <input type="text" class="form-control" name="requester" value="{{$changeControlRequest->requester}}">
                </div>
            </div>
            <div class="form-group row ">
                <label for="" class="col-3 col-form-label">@lang('main.date') :</label>
                <div class="col-6">
                    <input type="date" class="form-control" name="date_1" value="{{$changeControlRequest->date_1}}">
                </div>
            </div>
            <div class="form-group row "> <label for="" class="col-3 col-form-label">@lang('main.Department') :</label>
                <div class="col-6">
                    <input type="text" class="form-control" name="management" value="{{$changeControlRequest->management}}">
                </div>
            </div>
            <hr class="w-100">
            <div class="form-group row w-100 text-left">
                <h4 for="" class="" >@lang('main.required changes'):</h4>
            </div>
            <div style="overflow-x:auto;">
            <table class="table table-bordered">
                <thead>
    
                    <tr>
                        <th>
                            <div class="form-group row w-100 text-left">
                                <label for="" class="col-10 col-form-label text-left">@lang('main.Facilities/buildings') </label>
                                <div class="col-2 col-form-label">
                                    <input type="checkbox"  name="building" value="1" {{ $changeControlRequest->building=="1"? 'checked':'' }}> 
                                </div>
                            </div>
                        </th>
                        <th>
                            <div class="form-group row w-100 text-left">
                                <label for="" class="col-10 col-form-label text-left">@lang('main.supplier/contractor') </label>
                                <div class="col-2 col-form-label">
                                    <input type="checkbox"  name="supplier" value="1" {{ $changeControlRequest->supplier=="1"? 'checked':'' }}>
                                </div>
                            </div>
                        </th>
                        <th>
                            <div class="form-group row w-100 text-left">
                                <label for="" class="col-10 col-form-label text-left">@lang('main.document') </label>
                                <div class="col-2 col-form-label">
                                    <input type="checkbox"  name="document" value="1" {{ $changeControlRequest->document=="1"? 'checked':'' }}>
                                </div>
                            </div>
                        </th>
                    </tr>
                    <tr>
                        <th>
                            <div class="form-group row w-100 text-left">
                                <label for="" class="col-10 col-form-label text-left">@lang('main.Packaging')</label>
                                <div class="col-2 col-form-label">
                                    <input type="checkbox"  name="packing" value="1" {{ $changeControlRequest->packing=="1"? 'checked':'' }}>
                                </div>
                            </div>
                        </th>
                        <th>
                            <div class="form-group row w-100 text-left">
                                <label for="" class="col-10 col-form-label text-left">@lang('main.Machine equipment')</label>
                                <div class="col-2 col-form-label">
                                    <input type="checkbox"  name="machine_equipment" value="1" {{ $changeControlRequest->machine_equipment=="1"? 'checked':'' }}>
                                </div>
                            </div>
                        </th>
                        <th>
                            <div class="form-group row w-100 text-left">
                                <label for="" class="col-10 col-form-label text-left">@lang('main.manufacturing processes') </label>
                                <div class="col-2 col-form-label">
                                    <input type="checkbox" name="manufacturing" value="1" {{ $changeControlRequest->manufacturing=="1"? 'checked':'' }}>
                                </div>
                            </div>
                        </th>
                    </tr>
                    <tr>
                        <th>
                            <div class="form-group row w-100 text-left">
                                <label for="" class="col-10 col-form-label text-left">@lang('main.Customize') </label>
                                <div class="col-2 col-form-label">
                                    <input type="checkbox" name="customize" value="1" {{ $changeControlRequest->customize=="1"? 'checked':'' }}>
                                </div>
                            </div>
                        </th>
                        <th>
                            <div class="form-group row w-100 text-left">
                                <label for="" class="col-10 col-form-label text-left">@lang('main.other') </label>
                                <div class="col-2 col-form-label">
                                    <input type="checkbox" name="other" value="1" {{ $changeControlRequest->other=="1"? 'checked':'' }}>
                                </div>
                            </div>
                        </th>
                    </tr>
                </thead>
            </table>
                 </div>
            <hr class="w-100">
            <div class="form-group row w-100 text-left">
                <h4> @lang('main.description') :</h4>
            </div>
            <div class="form-group row w-100 text-left">
                <div class="col-12">
                    <textarea type="text" class="form-control" placeholder="  ......" name="description"> {{$changeControlRequest->description}}</textarea>
                </div>
            </div>
            <div class="form-group row w-100 text-left">
                <h4> @lang('main.reasone') :</h4>
            </div>
            <div class="form-group row w-100 text-left">
                <div class="col-12">
                    <textarea type="text" class="form-control" placeholder="  ......" name="reasone"> {{$changeControlRequest->reasone}}</textarea>
                </div>
            </div>
            <div class="form-group row w-100 text-left">
                <h4>@lang('main.Proposed change') :</h4>
            </div>
            <div class="form-group row w-100 text-left">
                <div class="col-12">
                    <textarea type="text" class="form-control" placeholder="  ......" name="suggested_change">{{$changeControlRequest->suggested_change}}</textarea>
                </div>
            </div>
    
            <div class="form-group row w-100 text-left">
                <h4>@lang('main.affected document') :</h4>
            </div>
            <div class="form-group row w-100 text-center">
                <table class='table '>
                    <tr style="background-color:#001635 ;color:white;text-align:center">
                        <th>@lang('main.m')</th>
                        <th>@lang('main.document')</th>
                    </tr>
                    @if(count($changeControlRequest->affectedDocument)>0)
                    @foreach($changeControlRequest->affectedDocument as $key => $data)
                    <tr id="affectedDocument-{{$key}}">
                        <td class="text-center end-td ">
                            <button type="button" title="Remove" onclick="removeRow({{$key}},{{$data->id}})"  @if ($key==0) disabled="disabled" @endif class="btn btn-danger btn-option">
                              <i class="fa fa-minus-circle"></i>
                            </button>
                          </td>
                        <th><input class="form-control" type="text" name="affectedDocument[{{$key}}][document]" value="{{$data->document}}"></th>
                    </tr>
                    @endforeach
                    <tr class="datatable-row datatable-row-even">
                        <td class="text-center end-td " id="increment">
                            <button type="button" class="btn btn-primary add_new" id="btn-{{count($changeControlRequest->affectedDocument)-1}}" onclick="appendRow({{count($changeControlRequest->affectedDocument)-1}})"><i
                                class="fa fa-plus-circle"></i></button>
                          </td>
                    </tr>
                @else
                    <tr id="affectedDocument-0">
                        <th class="text-center end-td ">
                            <button type="button" title="Remove" disabled="disabled" class="btn btn-danger btn-option">
                                <i class="fa fa-minus-circle"></i>
                            </button>
                        </th>
                        <th><input class="form-control" type="text" name="affectedDocument[0][document]"></th>
                    </tr>
                    <tr class="datatable-row datatable-row-even">
                        <td class="text-center end-td " id="increment">
                            <button type="button" class="btn btn-primary add_new" id="btn-0" onclick="appendRow(0)"><i
                                    class="fa fa-plus-circle"></i></button>
                        </td>
                    </tr>
                    @endif
                </table>
            </div>
            <table class="table">
                <thead>
                    <tr>
                        <th class=" w-50 text-left col-6 ">
                            <div class="form-group row w-10 text-left">
                                <label for="" class="col-5 col-form-label">@lang('main.applicant') </label>
                                <div class="col-6">
                                    <input type="text" class="form-control" placeholder="  ......" name="applicant" value="{{$changeControlRequest->applicant}}">
                                </div>
                            </div>
                            <div class="form-group row w-10 text-left">
                                <label for="" class="col-5 col-form-label">@lang('main.section_manager') </label>
                                <div class="col-6">
                                    <input type="text" class="form-control" placeholder="  ......" name="section_manager" value="{{$changeControlRequest->section_manager}}">
                                </div>
                            </div>
    
                        </th>
                        <th class=" w-50 text-left col-6 ">
                            <div class="form-group row w-10 text-left">
                                <label for="" class="col-4 col-form-label">@lang('main.date') </label>
                                <div class="col-8">
                                    <input type="date" class="form-control" placeholder="  ......" name="date_2" value="{{$changeControlRequest->date_2}}">
                                </div>
                            </div>
                            <div class="form-group row w-10 text-left">
                                <label for="" class="col-4 col-form-label">@lang('main.date') </label>
                                <div class="col-8">
                                    <input type="date" class="form-control" placeholder="  ......" name="date_3" value="{{$changeControlRequest->date_3}}">
                                </div>
                            </div>
                        </th>
                    </tr>
                </thead>
            </table>
            
        </div>
        <hr class="w-100">
        <div class="form-group row text-center">
            <label for="" class="col-12 col-form-label">@lang('main.level of change'):</label>
        </div>
    <div class="form-group w-75 row text-center" style='margin:auto'>
     
        <table class="table table-bordered">
            <thead>

                <tr>
                    <th>
                        <div class="form-group row w-100 text-center">
                            <label for="" class="col-6 col-form-label text-center">@lang('main.low') </label>
                            <div class="col-2 col-form-label">
                                <input type="radio"  name="change_level" value="low" {{ $changeControlRequest->change_level=="low"? 'checked':'' }}>
                            </div>
                        </div>
                    </th>
                    <th>
                        <div class="form-group row w-100 text-center">
                            <label for="" class="col-6 col-form-label text-center">@lang('main.medium') </label>
                            <div class="col-2 col-form-label">
                                <input type="radio"  name="change_level" value="medium" {{ $changeControlRequest->change_level=="medium"? 'checked':'' }}>
                            </div>
                        </div>
                    </th>
                    <th>
                        <div class="form-group row w-100 text-center">
                            <label for="" class="col-6 col-form-label text-center">@lang('main.high') </label>
                            <div class="col-2 col-form-label">
                                <input type="radio"  name="change_level" value="high" {{ $changeControlRequest->change_level=="high"? 'checked':'' }}>
                            </div>
                        </div>
                    </th>
                </tr>
            </thead>
        </table>
        </div>
        <div class="form-group row w-75 text-center" style='margin:auto'>
            <h4 for="" >@lang('main.Description of quality assurance') : </h4>
        </div>
        <div class="form-group row w-75 text-center" style='margin:auto'>
         <div class="col-12">
                <textarea type="text" class="form-control" placeholder="  ......" name="quality_assurance">{{$changeControlRequest->quality_assurance}}</textarea>
            </div>
        </div>
        <div class="form-group row w-75 text-center mt-3" style='margin:auto'>
            <h4>@lang('main.quality manager') </h4>
        </div>
<div class="form-group row w-75 text-center mb-3" style='margin:auto'>
        <div class="col-12">
                <input type="text" class="form-control" name="quality_manager" value="{{$changeControlRequest->quality_manager}}">
            </div>
        </div>
        <hr>
    <div class="form-group row w-75 text-center" style='margin:auto'>
        <h4 for="" >@lang('main.Measures to be taken after implementing the change') : </h4>
    </div>
    <div class="form-group w-75 row text-center" style='margin:auto'>
     
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>
                        <div class="form-group row w-100 text-left">
                            <label for="" class="col-8 col-form-label text-left">1-@lang('main.Review all damaged documents') </label>
                        </div>
                    </th>
                    <th>
                        <div class="form-group row w-100 text-left">
                            <label for="" class="col-10 col-form-label text-left">@lang('main.yes')  </label>
                            <div class="col-1 col-form-label">
                                <input type="radio"  name="review_damaged_document" value="yes" {{ $changeControlRequest->review_damaged_document=="yes"? 'checked':'' }}>
                            </div>
                        </div>
                    </th>
                    <th>
                        <div class="form-group row w-100 text-left">
                            <label for="" class="col-9 col-form-label text-left">@lang('main.no')</label>
                            <div class="col-1 col-form-label">
                                <input type="radio"  name="review_damaged_document" value="no" {{ $changeControlRequest->review_damaged_document=="no"? 'checked':'' }}>
                            </div>
                        </div>
                    </th>
                </tr>
                <tr>
                    <th>
                        <div class="form-group row w-100 text-left">
                            <label for="" class="col-12 col-form-label text-left">2-@lang('main.stability study')</label>
                        </div>
                    </th>
                    <th>
                        <div class="form-group row w-100 text-left">
                            <label for="" class="col-10 col-form-label text-left">@lang('main.yes')  </label>
                            <div class="col-1 col-form-label">
                                <input type="radio" name="stability_study" value="yes" {{ $changeControlRequest->stability_study=="yes"? 'checked':'' }}>
                            </div>
                        </div>
                    </th>
                    <th>
                        <div class="form-group row w-100 text-left">
                            <label for="" class="col-9 col-form-label text-left">@lang('main.no')</label>
                            <div class="col-1 col-form-label">
                                <input type="radio"  name="stability_study" value="no" {{ $changeControlRequest->stability_study=="no"? 'checked':'' }}>
                            </div>
                        </div>
                    </th>
                </tr>
                <tr>
                    <th>
                        <div class="form-group row w-100 text-left">
                            <label for="" class="col-6 col-form-label text-left">3-@lang('main.Equipment qualification') </label>
                        </div>
                    </th>
                    <th>
                        <div class="form-group row w-100 text-left">
                            <label for="" class="col-10 col-form-label text-left">@lang('main.yes')  </label>
                            <div class="col-1 col-form-label">
                                <input type="radio" name="equipment_qualification" value="yes" {{ $changeControlRequest->equipment_qualification=="yes"? 'checked':'' }}>
                            </div>
                        </div>
                    </th>
                    <th>
                        <div class="form-group row w-100 text-left">
                            <label for="" class="col-9 col-form-label text-left">@lang('main.no')</label>
                            <div class="col-1 col-form-label">
                                <input type="radio" name="equipment_qualification" value="no" {{ $changeControlRequest->equipment_qualification=="no"? 'checked':'' }}>
                            </div>
                        </div>
                    </th>
                </tr>
                <tr>
                    <th>
                        <div class="form-group row w-100 text-left">
                            <label for="" class="col-6 col-form-label text-left">4-@lang('mainValidate the process') </label>
                        </div>
                    </th>
                    <th>
                        <div class="form-group row w-100 text-left">
                            <label for="" class="col-10 col-form-label text-left">@lang('main.yes')  </label>
                            <div class="col-1 col-form-label">
                                <input type="radio"  name="process_validation" value="yes" {{ $changeControlRequest->process_validation=="yes"? 'checked':'' }}>
                            </div>
                        </div>
                    </th>
                    <th>
                        <div class="form-group row w-100 text-left">
                            <label for="" class="col-9 col-form-label text-left">@lang('main.no')</label>
                            <div class="col-1 col-form-label">
                                <input type="radio"  name="process_validation" value="no" {{ $changeControlRequest->process_validation=="no"? 'checked':'' }}>
                            </div>
                        </div>
                    </th>
                </tr>
                <tr>
                    <th>
                        <div class="form-group row w-100 text-left">
                            <label for="" class="col-6 col-form-label text-left">5-@lang('main.Check cleanliness') </label>
                        </div>
                    </th>
                    <th>
                        <div class="form-group row w-100 text-left">
                            <label for="" class="col-10 col-form-label text-left">@lang('main.yes')  </label>
                            <div class="col-1 col-form-label">
                                <input type="radio"  name="hygiene_check" value="yes" {{ $changeControlRequest->hygiene_check=="yes"? 'checked':'' }}>
                            </div>
                        </div>
                    </th>
                    <th>
                        <div class="form-group row w-100 text-left">
                            <label for="" class="col-9 col-form-label text-left">@lang('main.no')</label>
                            <div class="col-1 col-form-label">
                                <input type="radio"  name="hygiene_check" value="no" {{ $changeControlRequest->hygiene_check=="no"? 'checked':'' }}>
                            </div>
                        </div>
                    </th>
                </tr>
                <tr>
                    <th>
                        <div class="form-group row w-100 text-left">
                            <label for="" class="col-6 col-form-label text-left">6-@lang('main.Recheck') </label>
                        </div>
                    </th>
                    <th>
                        <div class="form-group row w-100 text-left">
                            <label for="" class="col-10 col-form-label text-left">@lang('main.yes')  </label>
                            <div class="col-1 col-form-label">
                                <input type="radio" name="recheck" value="yes" {{ $changeControlRequest->recheck=="yes"? 'checked':'' }}>
                            </div>
                        </div>
                    </th>
                    <th>
                        <div class="form-group row w-100 text-left">
                            <label for="" class="col-9 col-form-label text-left">@lang('main.no')</label>
                            <div class="col-1 col-form-label">
                                <input type="radio" name="recheck" value="no" {{ $changeControlRequest->recheck=="no"? 'checked':'' }}>
                            </div>
                        </div>
                    </th>
                </tr>
                <tr>
                    <th>
                        <div class="form-group row w-100 text-left">
                            <label for="" class="col-6 col-form-label text-left">7-@lang('main.Stability monitoring software') </label>
                        </div>
                    </th>
                    <th>
                        <div class="form-group row w-100 text-left">
                            <label for="" class="col-10 col-form-label text-left">@lang('main.yes')  </label>
                            <div class="col-1 col-form-label">
                                <input type="radio"  name="stability_monitoring" value="yes" {{ $changeControlRequest->stability_monitoring=="yes"? 'checked':'' }}>
                            </div>
                        </div>
                    </th>
                    <th>
                        <div class="form-group row w-100 text-left">
                            <label for="" class="col-9 col-form-label text-left">@lang('main.no')</label>
                            <div class="col-1 col-form-label">
                                <input type="radio"  name="stability_monitoring" value="no" {{ $changeControlRequest->stability_monitoring=="no"? 'checked':'' }}>
                            </div>
                        </div>
                    </th>
                </tr>
            </thead>
        </table>
        </div>
        <hr>
    <div class="form-group w-75 row text-center" style='margin:auto'>
        <h4 for="" >@lang('main.Change consent to control') : </h4>
    </div>
    <div class="form-group w-75 row text-center" style='margin:auto'>
      

        <table class="table">
            <thead>
                <tr>
                    <th class=" w-50 text-left col-6 ">
                        <div class="form-group row w-10 text-left">
                            <label for="" class="col-5 col-form-label">@lang('main.Quality control manager') </label>
                            <div class="col-6">
                                <input type="text" class="form-control" placeholder="  ......" name="name_1" value="{{$changeControlRequest->name_1}}">
                            </div>
                        </div>
                        <div class="form-group row w-10 text-left">
                            <label for="" class="col-5 col-form-label">@lang('main.factory manager') </label>
                            <div class="col-6">
                                <input type="text" class="form-control" placeholder="  ......" name="name_2" value="{{$changeControlRequest->name_2}}">
                            </div>
                        </div>

                    </th>
                    <th class=" w-50 text-left col-6 ">
                        <div class="form-group row w-10 text-left">
                            <label for="" class="col-4 col-form-label">@lang('main.date') </label>
                            <div class="col-6">
                                <input type="date" class="form-control" placeholder="  ......" name="date_4" value="{{$changeControlRequest->date_4}}">
                            </div>
                        </div>
                        <div class="form-group row w-10 text-left">
                            <label for="" class="col-4 col-form-label">@lang('main.date') </label>
                            <div class="col-6">
                                <input type="date" class="form-control" placeholder="  ......" name="date_5" value="{{$changeControlRequest->date_5}}">
                            </div>
                        </div>
                    </th>
                </tr>
            </thead>
        </table>

</div>
       
        
    <hr class="w-100">
    <div class="form-group w-75 row text-center" style='margin:auto'>
    <div class="form-group row w-100 text-right" style="text-align:center;overflow:auto">
    
        <table class="table">
            <thead>
                <tr>
                    <th>
                      <div class="" style="text-align:start ;">
                        <label>@lang('main.Company Name')</label>
                        <input class="form-control" type="text" name="company_name"   value="{{ $changeControlRequest->company_name }}">
                      </div>
            
                    </th>
                    <th>
                      <div class="" style="text-align:start ;">
                        <label>@lang('main.release_date') </label>
                        <input class="form-control" type="text" name="date2"  value="{{ $changeControlRequest->date2 }}"  onfocus="(this.type='date')" onblur="(this.type='text')">
                      </div>
            
                    </th>
                    <th>
                        <div class="" style="text-align:start ;">
                            <label>@lang('main.Modification date')</label>
                            <input class="form-control" type="text" name="date3"  value="{{ $changeControlRequest->date3 }}"  onfocus="(this.type='date')" onblur="(this.type='text')">
                          </div>
            
                    </th>
                    <th>
                            <div class="" style="text-align:start ;">
                                <label>@lang('main.model_period')</label>
                                <input class="form-control shadow-lg" type="text" name="period_time" value="{{ $changeControlRequest->period_time }}">
                            </div>

                        </th>
                        <th>
                            <div class="" style="text-align:start ;">
                                <label>@lang('main.page_number')</label>
                                <input class="form-control shadow-lg" type="text" name="number_page" value="{{ $changeControlRequest->number_page }}">
                            </div>

                        </th>
                        <th>
                            <div class="" style="text-align:start ;">
                                <label>@lang('main.document_code')</label>
                                <input class="form-control shadow-lg" type="text" name="number_doc" value="{{ $changeControlRequest->number_doc }}">
                            </div>
                        </th>
                  </tr>
            </thead>
        </table>
</div></div>
        <div class='row'>
            <button style="border-radius:8px;margin: 50px; width:30% ;background-color: #2a415b; ;height: 5%;padding:10px;margin-right:100px;margin:auto" type="submit"
                class="btn btn-primary col-md-4">
               @lang('main.edit')</button>
                    </div>  
        </form>
    </div>

    <script>


        function appendRow(num) {
            $new_number = parseInt(num) + 1;
            $appended_text = ` <tr class="datatable-row datatable-row-even" id="affectedDocument-${$new_number}">
                                         
                                            <td class="text-center end-td ">
                                                        <button type="button" title="Remove" onclick="removeRow(${$new_number})"
                                                                class="btn btn-danger btn-option">
                                                                <i class="fa fa-minus-circle"></i>
                                                        </button>
                                            </td>
                                            <th><input class="form-control" type="text" name="affectedDocument[${$new_number}][document]"></th>
                            </tr>`;
            $($appended_text).insertAfter(`#affectedDocument-${num}`);
            if (!document.getElementById(`affectedDocument-${num}`)) {
                $($appended_text).insertAfter(`#affectedDocument-0`);
            }

            $(`#btn-${num}`).remove();
            $("#increment").append(
                `<button type="button" class="btn btn-primary add_new" id="btn-${$new_number}" onclick="appendRow(${$new_number})"><i class="fa fa-plus-circle"></i></button></td>`
                );
        }

        function removeRow(num, id){
          if(id != 0){
             $("#affectedDocument-0").append(`<input type="hidden" name="ids[${num}]" value="${id}">`);
          }
          $(`#affectedDocument-${num}`).remove();
            }

      
    </script>
    <style>
        .table thead th {
            vertical-align: bottom;
            
        }

        table,
        th,
        td,
        tr {
            border: 1px solid silver;
            
        }

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
