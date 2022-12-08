@extends('layouts.print')

@section('content')
<style>
    input,textarea {
        box-shadow: 0 1rem 3rem rgba(0, 0, 0, .175) !important;
    }
    textarea{
        border: none;
    height: 80px;
    padding: 10px;
    }
    input{
        font-size: .875rem;
    line-height: 1.5;
    color: #4F5467;
    background-color: #fff;
    border: 1px solid #e9ecef;
    border-radius: 2px;
    }

</style>

<div class="card">
<div class="card-body" style='text-align:center;border:1px solid silver; box-shadow: 0 1rem 3rem rgba(0, 0, 0, .175) !important;
 '> 
        <div style="" class="w-100 text-center my-4">
        <h3 style='text-align:center;margin-bottom:40px'>
        <span style='font-family:Cursive;border-bottom: 1px solid silver;
    ; box-shadow: 0 1rem 3rem rgba(0, 0, 0, .175) !important;
    border-radius: 6px;
    padding: 10px;text-shadow: 1px 1px 1px #3ed3ea;padding-left: 40px;
    padding-right: 40px;
'>
 سجل متابعة أعمال التحسين والتطوير

</span>
</h3>
        </div>
        <hr class="w-100">
        <div>
           
  
        </div>
        <div class="form-group row" >
            <div class="col-3">
                <label for="" class="col-2 col-form-label">لعــام :</label>
                <input readonly style=' box-shadow: 0 1rem 3rem rgba(0, 0, 0, .175) !important;border:none;
    text-align: center;' value= ' {{$followUpRecordImprovement->year}}'>
            </div>
        </div>
      
        <div class="form-group row w-100 text-right" style="text-align:center;overflow:auto">
            <table class="table" style='border:none'>
                <tr style=";">
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
        <table class="table" style='border:none'>
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
        <table class="table" style=' border:none;
    padding:12px;
    margin-top:12px;
    background-color: #001635;
    color: white;
    /* text-shadow: none; */
    width: 97%;
    margin: auto;
    margin-bottom: 12px;
    font-size: 12px;
    padding: 1px;'>
            <thead>
                <tr>
                    <th style='border:none'>
                      <div class="" style="text-align:start ;">
                        {{ $followUpRecordImprovement->company_name }}
                      </div>
            
                    </th>
                    <th style='border:none'>
                      <div class="" style="text-align:start ;">
                      {{ $followUpRecordImprovement->date2 }}
                      </div>
            
                    </th>
                    <th style='border:none'>
                        <div class="" style="text-align:start ;">
                            {{ $followUpRecordImprovement->date3 }}
                          </div>
            
                    </th>
                    <th style='border:none'>
                      <div class="" style="text-align:start ;">
                            <label for="" class="" style="text-align: center;"> مدة الحفظ :
                                سنتان </label>
                      </div>
            
                    </th>
                    <th style='border:none'>
                      <div class="" style="text-align:start ;">
                        <label for="" class="" style="text-align: center;"> رقم الصفحة : 1 /
                          1</label>
                      </div>
                    </th>
                    <th style='border:none'>
                      <div class="" style="text-align:start ;">
                        <label for="" class="" style="text-align: center;"> رقم الوثيقة : QA – F
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
    border-bottom: 2px solid silver;
}

table,
th,
td,
tr {
    border: 1px solid silver;
    border-bottom: 2px solid silver;
    border-top: 2px solid silver;
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