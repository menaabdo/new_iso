@extends('layouts.master')

@section('content')


<div class="card">
<div class="card-body">
    <h3 style="margin-top:85px;">تقرير جمع و تحليل البيانات</h3>
    <hr>
    <form action="{{route('dataCollectionReports.update',$dataCollectionReport->id)}}" method="post" enctype="multipart/form-data" id="fo1">
        @method('PUT') 
              {{ csrf_field() }}
        <div style="" class="w-100 text-center my-4">
            <h2> تقرير جمع و تحليل البيانات</h2>
            <hr class="w-100">
        </div>
        <div id="mainDiv"  style=" margin-right:500px;">
            <h4 style=" color:blue;">CO LOGO</h4>
            <hr width="50%" size="20" color="blue">
            <img src="{{ asset($dataCollectionReport->logo) }}" height=180px width=210px; />
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
        </div>
        <div class="form-group row ">
            <label for="" class="col-3 col-form-label">التاريخ:</label>
            <div class="col-6">
                <input type="date" class="form-control" name="date_1" value="{{$dataCollectionReport->date_1}}">
            </div>
        </div>
        <div class="form-group row ">
            <label for="" class="col-3 col-form-label">القسم:</label>
            <div class="col-6">
                <input type="text" class="form-control" name="department" value="{{$dataCollectionReport->department}}">
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
            <label for="" class="col-3 col-form-label">مدير الجودة :</label>
            <div class="col-6">
                <input type="text" class="form-control" readonly name="name_1" value="{{$dataCollectionReport->name_1}}">
            </div>
        </div>
        @endif
        @if (Auth::user()->hasRole('Admin') || Auth::user()->hasRole('SuperAdmin'))
        <hr class="w-100">
        <div class="form-group row ">
            <label for="" class="col-3 col-form-label">مدير الجودة :</label>
            <div class="col-6">
                <input type="text" class="form-control" name="name_1" value="{{$dataCollectionReport->name_1}}">
            </div>
        </div>
        @endif
        <hr class="w-100">
        <table class="table">
            <thead>
                <tr>
                    <th>
                      <div class="" style="text-align:start ;">
                        <input class="form-control" type="text" name="company_name" placeholder="اسم الشركة  :"  value="{{ $dataCollectionReport->company_name }}">
                      </div>
            
                    </th>
                    <th>
                      <div class="" style="text-align:start ;">
                        <input class="form-control" type="text" name="date2"  value="{{ $dataCollectionReport->date2 }}" placeholder="تاريخ الإصدار   :" onfocus="(this.type='date')" onblur="(this.type='text')">
                      </div>
            
                    </th>
                    <th>
                        <div class="" style="text-align:start ;">
                            <input class="form-control" type="text" name="date3"  value="{{ $dataCollectionReport->date3 }}" placeholder="تاريخ التعديل :" onfocus="(this.type='date')" onblur="(this.type='text')">
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
        @if ($dataCollectionReport->status == 'pending' && Auth::user()->hasRole('Employee'))
                    <div class="form-group">
                        <button style="border-radius:20px;margin: 50px; width:10% ; height: 5%;" type="submit"
                            class="btn btn-primary"><i class="fas fa-save" style="width:15% ; height: 20%;">تعديل
                            </i></button>
                    </div>
                @elseif(($dataCollectionReport->status == 'inProgress' && Auth::user()->hasRole('Admin')) ||
                    ($dataCollectionReport->status == 'pending' && Auth::user()->hasRole('Admin')))
                    <div class="form-group">
                        <button style="border-radius:20px;margin: 50px; width:10% ; height: 5%;" type="submit"
                            class="btn btn-primary"><i class="fas fa-save" style="width:15% ; height: 20%;">تعديل
                            </i></button>
                    </div>
                @elseif(($dataCollectionReport->status == 'inProgress' && Auth::user()->hasRole('SuperAdmin')) ||
                    ($dataCollectionReport->status == 'pending' && Auth::user()->hasRole('SuperAdmin')) ||
                    ($dataCollectionReport->status == 'confirmed' && Auth::user()->hasRole('SuperAdmin')))
                    <div class="form-group">
                        <button style="border-radius:20px;margin: 50px; width:10% ; height: 5%;" type="submit"
                            class="btn btn-primary"><i class="fas fa-save" style="width:15% ; height: 20%;">تعديل
                            </i></button>
                    </div>
                @endif
    </form>
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