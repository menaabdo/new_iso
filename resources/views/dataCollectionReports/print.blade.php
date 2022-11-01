@extends('layouts.print')

@section('content')


<div class="card">
<div class="card-body">
 
        <div style="" class="w-100 text-center my-4">
            <h2> تقرير جمع و تحليل البيانات</h2>
            <hr class="w-100">
        </div>
        <div>
            <img src="{{ public_path($dataCollectionReport->logo) }}" style="float: left;" width="100px"
                height="50px" />
  
        </div>

        <div class="form-group row ">
            <div class="col-6">
                <label for="" class="col-3 col-form-label">التاريخ:</label>
                {{$dataCollectionReport->date_1}}
            </div>
        </div>
        <div class="form-group row ">
            <div class="col-6">
                <label for="" class="col-3 col-form-label">القسم:</label>
            {{$dataCollectionReport->department}}
            </div>
        </div>
        <hr class="w-100">
        <div class="form-group row ">
            <label for="" class="col-2 col-form-label">البيانات المطلوبة :</label>
            <div class="col-6">
                <textarea type="text" class="form-control" name="date_details">{{$dataCollectionReport->date_details}}</textarea>
            </div>
        </div>
        <div class="form-group row ">
            <label for="" class="col-2 col-form-label">التفاصيل :</label>
            <div class="col-6">
                <textarea type="text" class="form-control" name="details">{{$dataCollectionReport->details}}</textarea>
            </div>
        </div>
        <div class="form-group row ">
            <label for="" class="col-2 col-form-label">النتائج :</label>
            <div class="col-6">
                <textarea type="text" class="form-control" name="result">{{$dataCollectionReport->result}}</textarea>
            </div>
        </div>
        @if ($dataCollectionReport->status == 'confirmed' && Auth::user()->hasRole('Employee') || $dataCollectionReport->status == 'inProgress' && Auth::user()->hasRole('Employee'))
        <div class="form-group row ">
            <div class="col-6">
                <label for="" class="col-3 col-form-label">مدير الجودة :</label>
             {{$dataCollectionReport->name_1}}
            </div>
        </div>
        @endif
        @if (Auth::user()->hasRole('Admin') || Auth::user()->hasRole('SuperAdmin'))
        <hr class="w-100">
        <div class="form-group row ">
            <div class="col-6">
                <label for="" class="col-3 col-form-label">مدير الجودة :</label>
             {{$dataCollectionReport->name_1}}
            </div>
        </div>
        @endif
        <hr class="w-100">
        <table class="table">
            <thead>
                <tr>
                    <th>
                      <div class="" style="text-align:start ;">
                     {{ $dataCollectionReport->company_name }}
                      </div>
            
                    </th>
                    <th>
                      <div class="" style="text-align:start ;">
                        {{ $dataCollectionReport->date2 }}
                      </div>
            
                    </th>
                    <th>
                        <div class="" style="text-align:start ;">
                            {{ $dataCollectionReport->date3 }}
                          </div>
            
                    </th>
                    <th>
                      <div class="" style="text-align:start ;">
                            <label for="" class="" style="text-align: center;font-size:large;font-weight: bolder;"> مدة الحفظ :
                                سنتان </label>
                      </div>
            
                    </th>
                    <th>
                      <div class="" style="text-align:start ;">
                        <label for="" class="" style="text-align: center;font-size:large;font-weight: bolder;"> رقم الصفحة : 1 /
                          1</label>
                      </div>
                    </th>
                    <th>
                      <div class="" style="text-align:start ;">
                        <label for="" class="" style="text-align: center;font-size:large;font-weight: bolder;"> رقم الوثيقة : QA – F
                          - 13 </label>
                      </div>
                    </th>
                  </tr>
            </thead>
        </table>
</div>

<style>
.table thead th {
    vertical-align: bottom;
    border-bottom: 2px solid black;
}

table,
th,
td,
tr {
    border: 1px solid black;
    border-bottom: 2px solid black;
    border-top: 2px solid black;
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