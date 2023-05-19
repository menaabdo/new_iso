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
    <div class="card-body row" style=';margin-top:80px'>

       
    <form action="{{route('dataCollectionReports.update',$dataCollectionReport->id)}}" method="post" class='col-md-9
        ' style='margin:auto' enctype="multipart/form-data" id="fo1">
        @method('PUT') 
              {{ csrf_field() }}
        <div style="" class="w-100 text-center my-4">
            <h2 style='text-shadow: 1px 1px 1px #3ed3ea;'> @lang('main.Data collection and analysis report')</h2>
            <hr class="w-100">
        </div>
        <div class='row mt-4 mb-3'>
                <label class="form-label col-md-3 " style='margin-top:40px'>@lang('main.Company Logo')</label>
                <div class="col-9">
               @if ($dataCollectionReport->status == 'pending' && Auth::user()->hasRole('Employee'))
            <input type="file" id="img" name="logo" accept="image/*">
        @endif

        @if (($dataCollectionReport->status == 'inProgress' && Auth::user()->hasRole('Admin')) ||
            ($dataCollectionReport->status == 'pending' && Auth::user()->hasRole('Admin')))
            <input type="file" id="img" name="logo" accept="image/*">
        @endif
        @if (($dataCollectionReport->status == 'inProgress' && Auth::user()->hasRole('SuperAdmin')) ||
            ($dataCollectionReport->status == 'pending' && Auth::user()->hasRole('SuperAdmin')) ||
            ($dataCollectionReport->status == 'confirmed' && Auth::user()->hasRole('SuperAdmin')))
            <input type="file" id="img" name="logo" accept="image/*">
        @endif
        <img src="{{ asset($dataCollectionReport->logo) }}" height=100px width=100px; />
        </div>
        </div>
        <div class="form-group row ">
            <label for="" class="col-3 col-form-label">@lang('main.date'):</label>
            <div class="col-6">
                <input type="date" class="form-control" name="date_1" value="{{$dataCollectionReport->date_1}}">
            </div>
        </div>
        <div class="form-group row ">
            <label for="" class="col-3 col-form-label">@lang('main.department'):</label>
            <div class="col-6">
                <input type="text" class="form-control" name="department" value="{{$dataCollectionReport->department}}">
            </div>
        </div>
        <hr class="w-100">
        <div class="form-group row ">
            <label for="" class="col-3 col-form-label">@lang('main.date_details') :</label>
            <div class="col-6">
                <textarea type="text" class="form-control" name="date_details">{{$dataCollectionReport->date_details}}</textarea>
            </div>
        </div>
        <div class="form-group row ">
            <label for="" class="col-3 col-form-label">@lang('main.details') :</label>
            <div class="col-6">
                <textarea type="text" class="form-control" name="details">{{$dataCollectionReport->details}}</textarea>
            </div>
        </div>
        <div class="form-group row ">
            <label for="" class="col-3 col-form-label">@lang('main.result') :</label>
            <div class="col-6">
                <textarea type="text" class="form-control" name="result">{{$dataCollectionReport->result}}</textarea>
            </div>
        </div>
        @if ($dataCollectionReport->status == 'confirmed' && Auth::user()->hasRole('Employee') || $dataCollectionReport->status == 'inProgress' && Auth::user()->hasRole('Employee'))
        <div class="form-group row ">
            <label for="" class="col-3 col-form-label">@lang('main.quality manager') :</label>
            <div class="col-6">
                <input type="text" class="form-control" readonly name="name_1" value="{{$dataCollectionReport->name_1}}">
            </div>
        </div>
        @endif
        @if (Auth::user()->hasRole('Admin') || Auth::user()->hasRole('SuperAdmin'))
        <hr class="w-100">
        <div class="form-group row ">
            <label for="" class="col-3 col-form-label">@lang('main.quality manager') :</label>
            <div class="col-6">
                <input type="text" class="form-control" name="name_1" value="{{$dataCollectionReport->name_1}}">
            </div>
        </div>
        @endif
        <hr class="w-100">
        <div  style='overflow-x:auto'>
               
        <table class="table">
            <thead>
                <tr>
                    <th>
                      <div class="" style="text-align:start ;">
                        <label>@lang('main.Company Name')</label>
                        <input class="form-control" type="text" name="company_name"   value="{{ $dataCollectionReport->company_name }}">
                      </div>
            
                    </th>
                    <th>
                      <div class="" style="text-align:start ;">
                        <label>@lang('main.release_date') </label>
                        <input class="form-control" type="text" name="date2"  value="{{ $dataCollectionReport->date2 }}"  onfocus="(this.type='date')" onblur="(this.type='text')">
                      </div>
            
                    </th>
                    <th>
                        <div class="" style="text-align:start ;">
                            <label>@lang('main.Modification date')</label>
                            <input class="form-control" type="text" name="date3"  value="{{ $dataCollectionReport->date3 }}"  onfocus="(this.type='date')" onblur="(this.type='text')">
                          </div>
            
                    </th>
                   <th>
                            <div class="" style="text-align:start ;">
                                <label>@lang('main.model_period')</label>
                                <input class="form-control shadow-lg" type="text" name="period_time" value="{{ $dataCollectionReport->period_time }}">
                            </div>

                        </th>
                        <th>
                            <div class="" style="text-align:start ;">
                                <label>@lang('main.page_number')</label>
                                <input class="form-control shadow-lg" type="text" name="number_page" value="{{ $dataCollectionReport->number_page }}">
                            </div>

                        </th>
                        <th>
                            <div class="" style="text-align:start ;">
                                <label>@lang('main.document_code')</label>
                                <input class="form-control shadow-lg" type="text" name="number_doc" value="{{ $dataCollectionReport->number_doc }}">
                            </div>
                        </th>
                  </tr>
            </thead>
        </table>
           </div>
        @if ($dataCollectionReport->status == 'pending' && Auth::user()->hasRole('Employee'))
                    <div class="form-group">
                        <button style="border-radius:20px;margin: 50px; width:10% ; height: 5%;" type="submit"
                            class="btn btn-primary"><i class="fas fa-save" style="width:15% ; height: 20%;">@lang('main.edit')
                            </i></button>
                    </div>
                @elseif(($dataCollectionReport->status == 'inProgress' && Auth::user()->hasRole('Admin')) ||
                    ($dataCollectionReport->status == 'pending' && Auth::user()->hasRole('Admin')))
                    <div class="form-group">
                        <button style="border-radius:20px;margin: 50px; width:10% ; height: 5%;" type="submit"
                            class="btn btn-primary"><i class="fas fa-save" style="width:15% ; height: 20%;">@lang('main.edit')
                            </i></button>
                    </div>
                @elseif(($dataCollectionReport->status == 'inProgress' && Auth::user()->hasRole('SuperAdmin')) ||
                    ($dataCollectionReport->status == 'pending' && Auth::user()->hasRole('SuperAdmin')) ||
                    ($dataCollectionReport->status == 'confirmed' && Auth::user()->hasRole('SuperAdmin')))
                    <div class='row'>
            <button style="border-radius:8px;margin: 50px; width:30% ;background-color: #2a415b; ;height: 5%;padding:10px;margin-right:100px;margin:auto" type="submit"
                class="btn btn-primary col-md-4">
                <i class="fas fa-save" style="width:15% ; height: 20%;"></i>@lang('main.edit')</button>
                    </div>  
                @endif
    </form>
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