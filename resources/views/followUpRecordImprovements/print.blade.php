@extends('layouts.print')

@section('content')


<div class="card">
<div class="card-body">
        <div style="" class="w-100 text-center my-4">
            <h2> سجل متابعة أعمال التحسين والتطوير</h2>
        </div>
        <hr class="w-100">
        <div>
            <img src="{{ asset($followUpRecordImprovement->logo) }}" style="float: left;" width="100px"
                height="50px" />
  
        </div>
        <div class="form-group row" >
            <div class="col-3">
                <label for="" class="col-2 col-form-label">لعــام :</label>
                {{$followUpRecordImprovement->year}}
            </div>
        </div>
        <hr class="w-100">
        <div class="form-group row w-100 text-right" style="text-align:center;">
            <table class="table">
                <tr style="background-color:rgb(218, 249, 163); text-align:center;">
                    <th>التاريخ </th>
                    <th>القسم المختص</th>
                    <th>وصف الحالة</th>
                    <th>الإجراء المتخذ</th>
                    <th>المسئول عن التنفيذ</th>
                    <th>مخطط التنفيذ</th>
                    <th>متابعة التنفيذ</th>
                    <th>ملاحظات</th>
                </tr>
                @foreach($followUpRecordImprovement->followUpRecord as $key => $data)
                <tr id="followUpRecord-{{$key}}">
                    <th><input class="form-control" type="date" name="followUpRecord[{{$key}}][date_1]" value="{{$data->date_1}}"></th>
                    <th><input class="form-control" type="text" name="followUpRecord[{{$key}}][dapartment]" value="{{$data->dapartment}}"></th>
                    <th><input class="form-control" type="text" name="followUpRecord[{{$key}}][description]" value="{{$data->description}}"></th>
                    <th><input class="form-control" type="text" name="followUpRecord[{{$key}}][action]" value="{{$data->action}}"></th>
                    <th><input class="form-control" type="text" name="followUpRecord[{{$key}}][employee]" value="{{$data->employee}}"></th>
                    <th><input class="form-control" type="text" name="followUpRecord[{{$key}}][implementation]" value="{{$data->implementation}}"></th>
                    <th><input class="form-control" type="text" name="followUpRecord[{{$key}}][follow_implementation]" value="{{$data->follow_implementation}}"></th>
                    <th><input class="form-control" type="text" name="followUpRecord[{{$key}}][nodes]" value="{{$data->nodes}}"></th>
                </tr>
                  @endforeach
            </table>
        </div>

        <hr class="w-100">
        <table class="table">
            <thead>
                <tr>
                    <th class=" w-50 text-center col-2 ">
                        <div class="" style="text-align:center ;">
                            <label for="" class="" style="text-align:center;font-size:large;font-weight: bolder;">إعداد:</label>
                        </div>
                        <div class="form-group row" style="text-align:center ;">
                            <div class="col-4">
                                <label for="" class="col-2 col-form-label">الاسم: </label>
                               {{$followUpRecordImprovement->name_1}}
                            </div>
                        </div>
                        <div class="form-group row" style="text-align:center ;">
                            <div class="col-4">
                                <label for="" class="col-2 col-form-label">الوظيفة: </label>
                                 {{$followUpRecordImprovement->employ}}
                            </div>
                        </div>
                    </th>
                </tr>
            </thead>
        </table>
        <hr class="w-100">
        <table class="table">
            <thead>
                <tr>
                    <th>
                      <div class="" style="text-align:start ;">
                        {{ $followUpRecordImprovement->company_name }}
                      </div>
            
                    </th>
                    <th>
                      <div class="" style="text-align:start ;">
                      {{ $followUpRecordImprovement->date2 }}
                      </div>
            
                    </th>
                    <th>
                        <div class="" style="text-align:start ;">
                            {{ $followUpRecordImprovement->date3 }}
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
<script>
  window.addEventListener("load", window.print());
</script>
@stop