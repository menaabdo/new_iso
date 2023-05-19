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


    <form action="{{route('questionnaireForms.update',$questionnaireForm->id)}}" class='col-md-10' style='margin:auto' method="post" enctype="multipart/form-data" id="fo1">
        @method('PUT') 
              {{ csrf_field() }}
        <div style="" class="w-100 text-center my-4">
            <h2 style='text-shadow: 1px 1px 1px #3ed3ea;'> @lang('main.Questionnaire form for the course and trainer')</h2>
            <hr class="w-100">
        </div>
        <div class='row mt-4 mb-3'>
                <label class="form-label col-md-3 ">@lang('main.Company Logo')</label>
             <input type="file" id="img" name="logo" accept="image/*">
             <img src="{{ asset($questionnaireForm->logo) }}" height=180px width=210px; />
        
        </div>
        <div class="form-group row ">
            <label for="" class="col-3 col-form-label">@lang('main.date'):</label>
            <div class="col-6">
                <input type="date" class="form-control" name="date_1" value="{{$questionnaireForm->date_1}}">
            </div>
        </div>
        <div class="form-group row ">
            <label for="" class="col-3 col-form-label">@lang('main.emp_name'):</label>
            <div class="col-6">
                <input type="text" class="form-control" name="emp_name" value="{{$questionnaireForm->emp_name}}">
            </div>
        </div>
        <hr class="w-100">
        <div class="form-group row w-100 text-right" style="text-align:center;overflow-x:auto;">
            <table class="table">
                <tr style="background-color:    #001635; color:white;text-align:center;">
                    <th>@lang('main.m')</th>
                    <th>@lang('main.Status')</th>
                    <th><img src="{{ asset('img/Capture.PNG') }}" width="60px" height="70px"></th>
                    <th><img src="{{ asset('img/Capture1.PNG') }}" width="60px" height="70px"></th>
                    <th><img src="{{ asset('img/Capture2.PNG') }}" width="60px" height="70px"></th>
                    <th>@lang('main.note')</th>
                </tr>
                <tr>
                    <th>1</th>
                    <th style="text-align:center;">@lang('main.Duration of the training program?')</th>
                    <th style="text-align:center;"><input class="text-center" type="checkbox" name="excelant_1" value="1"  {{ $questionnaireForm->excelant_1=="1"? 'checked':'' }}  style="width: 40px; height: 40px;"></th>
                    <th style="text-align:center;"><input class="text-center" type="checkbox" name="abverage_1" value="1" {{ $questionnaireForm->abverage_1=="1"? 'checked':'' }}   style="width: 40px; height: 40px;"></th>
                    <th style="text-align:center;"><input class="text-center" type="checkbox" name="fair_1" value="1"  {{ $questionnaireForm->fair_1=="1"? 'checked':'' }}  style="width: 40px; height: 40px;"></th>
                    <th><input class="form-control" type="text" name="node_1" value="{{$questionnaireForm->node_1}}"></th>
                </tr>
                <tr>
                    <th>2</th>
                    <th style="text-align:center;">@lang('main.Training program content?')</th>
                    <th style="text-align:center;"><input class="text-center" type="checkbox" name="excelant_2" value="1"  {{ $questionnaireForm->excelant_2=="1"? 'checked':'' }}  style="width: 40px; height: 40px;"></th>
                    <th style="text-align:center;"><input class="text-center" type="checkbox" name="abverage_2" value="1" {{ $questionnaireForm->abverage_2=="1"? 'checked':'' }}   style="width: 40px; height: 40px;"></th>
                    <th style="text-align:center;"><input class="text-center" type="checkbox" name="fair_2" value="1"  {{ $questionnaireForm->fair_2=="1"? 'checked':'' }}  style="width: 40px; height: 40px;"></th>
                    <th><input class="form-control" type="text" name="node_2" value="{{$questionnaireForm->node_2}}"></th>
                </tr>
                <tr>
                    <th>3</th>
                    <th style="text-align:center;">@lang('main.How to organize the presentation in terms of clarity and sufficiency?')</th>
                    <th style="text-align:center;"><input class="text-center" type="checkbox" name="excelant_3" value="1"  {{ $questionnaireForm->excelant_3=="1"? 'checked':'' }}  style="width: 40px; height: 40px;"></th>
                    <th style="text-align:center;"><input class="text-center" type="checkbox" name="abverage_3" value="1" {{ $questionnaireForm->abverage_3=="1"? 'checked':'' }}   style="width: 40px; height: 40px;"></th>
                    <th style="text-align:center;"><input class="text-center" type="checkbox" name="fair_3" value="1"  {{ $questionnaireForm->fair_3=="1"? 'checked':'' }}  style="width: 40px; height: 40px;"></th>
                    <th><input class="form-control" type="text" name="node_3" value="{{$questionnaireForm->node_3}}"></th>
                </tr>
                <tr>
                    <th>4</th>
                    <th style="text-align:center;">@lang('main.Trainer’s ability to deliver inputs and discussions?')</th>
                    <th style="text-align:center;"><input class="text-center" type="checkbox" name="excelant_4" value="1"  {{ $questionnaireForm->excelant_4=="1"? 'checked':'' }}  style="width: 40px; height: 40px;"></th>
                    <th style="text-align:center;"><input class="text-center" type="checkbox" name="abverage_4" value="1" {{ $questionnaireForm->abverage_4=="1"? 'checked':'' }}   style="width: 40px; height: 40px;"></th>
                    <th style="text-align:center;"><input class="text-center" type="checkbox" name="fair_4" value="1"  {{ $questionnaireForm->fair_4=="1"? 'checked':'' }}  style="width: 40px; height: 40px;"></th>
                    <th><input class="form-control" type="text" name="node_4"  value="{{$questionnaireForm->node_4}}"></th>
                </tr>
                <tr>
                    <th>5</th>
                    <th style="text-align:center;">@lang('main.Diversity of activities, exercises and methods used?')</th>
                    <th style="text-align:center;"><input class="text-center" type="checkbox" name="excelant_5" value="1"  {{ $questionnaireForm->excelant_5=="1"? 'checked':'' }}  style="width: 40px; height: 40px;"></th>
                    <th style="text-align:center;"><input class="text-center" type="checkbox" name="abverage_5" value="1" {{ $questionnaireForm->abverage_5=="1"? 'checked':'' }}   style="width: 40px; height: 40px;"></th>
                    <th style="text-align:center;"><input class="text-center" type="checkbox" name="fair_5" value="1"  {{ $questionnaireForm->fair_5=="1"? 'checked':'' }}  style="width: 40px; height: 40px;"></th>
                    <th><input class="form-control" type="text" name="node_5"  value="{{$questionnaireForm->node_5}}"></th>
                </tr>
                <tr>
                    <th>6</th>
                    <th style="text-align:center;">@lang('main.To what extent is the trainer capable of the material provided?')</th>
                    <th style="text-align:center;"><input class="text-center" type="checkbox" name="excelant_6" value="1"  {{ $questionnaireForm->excelant_6=="1"? 'checked':'' }}  style="width: 40px; height: 40px;"></th>
                    <th style="text-align:center;"><input class="text-center" type="checkbox" name="abverage_6" value="1" {{ $questionnaireForm->abverage_6=="1"? 'checked':'' }}   style="width: 40px; height: 40px;"></th>
                    <th style="text-align:center;"><input class="text-center" type="checkbox" name="fair_6" value="1"  {{ $questionnaireForm->fair_6=="1"? 'checked':'' }}  style="width: 40px; height: 40px;"></th>
                    <th><input class="form-control" type="text" name="node_6"  value="{{$questionnaireForm->node_6}}"></th>
                </tr>
                <tr>
                    <th>7</th>
                    <th style="text-align:center;">@lang('main.Reflection of the coachs experience on his performance?')</th>
                    <th style="text-align:center;"><input class="text-center" type="checkbox" name="excelant_7" value="1"  {{ $questionnaireForm->excelant_7=="1"? 'checked':'' }}  style="width: 40px; height: 40px;"></th>
                    <th style="text-align:center;"><input class="text-center" type="checkbox" name="abverage_7" value="1" {{ $questionnaireForm->abverage_7=="1"? 'checked':'' }}   style="width: 40px; height: 40px;"></th>
                    <th style="text-align:center;"><input class="text-center" type="checkbox" name="fair_7" value="1"  {{ $questionnaireForm->fair_7=="1"? 'checked':'' }}  style="width: 40px; height: 40px;"></th>
                    <th><input class="form-control" type="text" name="node_7"  value="{{$questionnaireForm->node_7}}"></th>
                </tr>
                <tr>
                    <th>8</th>
                    <th style="text-align:center;">@lang('main.Master group participation and interaction atmosphere to train?')</th>
                    <th style="text-align:center;"><input class="text-center" type="checkbox" name="excelant_8" value="1"  {{ $questionnaireForm->excelant_8=="1"? 'checked':'' }}  style="width: 40px; height: 40px;"></th>
                    <th style="text-align:center;"><input class="text-center" type="checkbox" name="abverage_8" value="1" {{ $questionnaireForm->abverage_8=="1"? 'checked':'' }}   style="width: 40px; height: 40px;"></th>
                    <th style="text-align:center;"><input class="text-center" type="checkbox" name="fair_8" value="1"  {{ $questionnaireForm->fair_8=="1"? 'checked':'' }}  style="width: 40px; height: 40px;"></th>
                    <th><input class="form-control" type="text" name="node_8"  value="{{$questionnaireForm->node_8}}"></th>
                </tr>
                <tr>
                    <th>9</th>
                    <th style="text-align:center;">@lang('main.The training material distributed in the program?')</th>
                    <th style="text-align:center;"><input class="text-center" type="checkbox" name="excelant_9" value="1"  {{ $questionnaireForm->excelant_9=="1"? 'checked':'' }}  style="width: 40px; height: 40px;"></th>
                    <th style="text-align:center;"><input class="text-center" type="checkbox" name="abverage_9" value="1" {{ $questionnaireForm->abverage_9=="1"? 'checked':'' }}   style="width: 40px; height: 40px;"></th>
                    <th style="text-align:center;"><input class="text-center" type="checkbox" name="fair_9" value="1"  {{ $questionnaireForm->fair_9=="1"? 'checked':'' }}  style="width: 40px; height: 40px;"></th>
                    <th><input class="form-control" type="text" name="node_9"  value="{{$questionnaireForm->node_9}}"></th>
                </tr>
                <tr>
                    <th>10</th>
                    <th style="text-align:center;">@lang('main.How satisfied are you with the training program in general?')</th>
                    <th style="text-align:center;"><input class="text-center" type="checkbox" name="excelant_10" value="1"  {{ $questionnaireForm->excelant_10=="1"? 'checked':'' }}  style="width: 40px; height: 40px;"></th>
                    <th style="text-align:center;"><input class="text-center" type="checkbox" name="abverage_10" value="1" {{ $questionnaireForm->abverage_10=="1"? 'checked':'' }}   style="width: 40px; height: 40px;"></th>
                    <th style="text-align:center;"><input class="text-center" type="checkbox" name="fair_10" value="1"  {{ $questionnaireForm->fair_10=="1"? 'checked':'' }}  style="width: 40px; height: 40px;"></th>
                    <th><input class="form-control" type="text" name="node_10"  value="{{$questionnaireForm->node_10}}"></th>
                </tr>
            </table>
        </div>
        <hr class="w-100">
        <div class="form-group row ">
            <label for="" class="col-3 col-form-label">@lang('main.Customer Service Department Responsible :')</label>
            <div class="col-6">
                <input type="text" class="form-control" name="customer_service_name"  value="{{$questionnaireForm->customer_service_name}}">
            </div>
        </div>
        <hr class="w-100">
        <div style="overflow-x:auto;">
        <table class="table">
            <thead>
                <tr>
                    <th>
                      <div class="" style="text-align:start ;">
                        <label>@lang('main.Company Name')</label>
                        <input class="form-control" type="text" name="company_name" placeholder="اسم الشركة  :"  value="{{ $questionnaireForm->company_name }}">
                      </div>
            
                    </th>
                    <th>
                      <div class="" style="text-align:start ;">
                        <label>@lang('main.release_date') </label>
                        <input class="form-control" type="text" name="date2"  value="{{ $questionnaireForm->date2 }}" placeholder="تاريخ الإصدار   :" onfocus="(this.type='date')" onblur="(this.type='text')">
                      </div>
            
                    </th>
                    <th>
                        <div class="" style="text-align:start ;">
                            <label>@lang('main.Modification date')</label>
                            <input class="form-control" type="text" name="date3"  value="{{ $questionnaireForm->date3 }}" placeholder="تاريخ التعديل :" onfocus="(this.type='date')" onblur="(this.type='text')">
                          </div>
            
                    </th>
                     <th>
                            <div class="" style="text-align:start ;">
                                <label>@lang('main.model_period')</label>
                                <input class="form-control shadow-lg" type="text" name="period_time" value="{{ $questionnaireForm->period_time }}">
                            </div>

                        </th>
                        <th>
                            <div class="" style="text-align:start ;">
                                <label>@lang('main.page_number')</label>
                                <input class="form-control shadow-lg" type="text" name="number_page" value="{{ $questionnaireForm->number_page }}">
                            </div>

                        </th>
                        <th>
                            <div class="" style="text-align:start ;">
                                <label>@lang('main.document_code')</label>
                                <input class="form-control shadow-lg" type="text" name="number_doc" value="{{ $questionnaireForm->number_doc }}">
                            </div>
                        </th>
                  </tr>
            </thead>
        </table>
          </div>
        <div class='row'>
            <button style="border-radius:8px;margin: 50px; width:30% ;background-color: #2a415b; ;height: 5%;padding:10px;margin-right:100px;margin:auto" type="submit"
                class="btn btn-primary col-md-4">
                <i class="fas fa-save" style="width:15% ; height: 20%;"></i>@lang('main.edit')</button>
                    </div>  
    </form>
</div>
</div>

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
    float:left;
    display: inline-table;
}
</style>
@stop