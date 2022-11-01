@extends('layouts.master')

@section('content')

<div class="card">
<div class="card-body">
    <h3 style="margin-top:85px;">نموذج استبيان عن الدورة و المدرب</h3>
    <hr>
    <form action="{{route('questionnaireForms.update',$questionnaireForm->id)}}" method="post" enctype="multipart/form-data" id="fo1">
        @method('PUT') 
              {{ csrf_field() }}
        <div style="" class="w-100 text-center my-4">
            <h2> نموذج استبيان عن الدورة و المدرب</h2>
            <hr class="w-100">
        </div>
        <div id="mainDiv"  style=" margin-right:500px;">
            <h4 style=" color:blue;">CO LOGO</h4>
            <hr width="50%" size="20" color="blue">
            <img src="{{ asset($questionnaireForm->logo) }}" height=180px width=210px; />
            <input type="file" id="img" name="logo" accept="image/*">
        </div>
        <div class="form-group row ">
            <label for="" class="col-3 col-form-label">تاريخ:</label>
            <div class="col-6">
                <input type="date" class="form-control" name="date_1" value="{{$questionnaireForm->date_1}}">
            </div>
        </div>
        <div class="form-group row ">
            <label for="" class="col-3 col-form-label">اسم الموظف:</label>
            <div class="col-6">
                <input type="text" class="form-control" name="emp_name" value="{{$questionnaireForm->emp_name}}">
            </div>
        </div>
        <hr class="w-100">
        <div class="form-group row w-100 text-right" style="text-align:center;">
            <table class="table">
                <tr style="background-color:rgb(141, 165, 202); text-align:center;">
                    <th>م</th>
                    <th>الحاله</th>
                    <th><img src="{{ asset('img/Capture.PNG') }}" width="60px" height="70px"></th>
                    <th><img src="{{ asset('img/Capture1.PNG') }}" width="60px" height="70px"></th>
                    <th><img src="{{ asset('img/Capture2.PNG') }}" width="60px" height="70px"></th>
                    <th>ملاحظات</th>
                </tr>
                <tr>
                    <th>1</th>
                    <th style="text-align:center;">مدة البرنامج التدريبي ؟</th>
                    <th style="text-align:center;"><input class="text-center" type="checkbox" name="excelant_1" value="1"  {{ $questionnaireForm->excelant_1=="1"? 'checked':'' }}  style="width: 40px; height: 40px;"></th>
                    <th style="text-align:center;"><input class="text-center" type="checkbox" name="abverage_1" value="1" {{ $questionnaireForm->abverage_1=="1"? 'checked':'' }}   style="width: 40px; height: 40px;"></th>
                    <th style="text-align:center;"><input class="text-center" type="checkbox" name="fair_1" value="1"  {{ $questionnaireForm->fair_1=="1"? 'checked':'' }}  style="width: 40px; height: 40px;"></th>
                    <th><input class="form-control" type="text" name="node_1" value="{{$questionnaireForm->node_1}}"></th>
                </tr>
                <tr>
                    <th>2</th>
                    <th style="text-align:center;">محتوى البرنامج التدريبي؟</th>
                    <th style="text-align:center;"><input class="text-center" type="checkbox" name="excelant_2" value="1"  {{ $questionnaireForm->excelant_2=="1"? 'checked':'' }}  style="width: 40px; height: 40px;"></th>
                    <th style="text-align:center;"><input class="text-center" type="checkbox" name="abverage_2" value="1" {{ $questionnaireForm->abverage_2=="1"? 'checked':'' }}   style="width: 40px; height: 40px;"></th>
                    <th style="text-align:center;"><input class="text-center" type="checkbox" name="fair_2" value="1"  {{ $questionnaireForm->fair_2=="1"? 'checked':'' }}  style="width: 40px; height: 40px;"></th>
                    <th><input class="form-control" type="text" name="node_2" value="{{$questionnaireForm->node_2}}"></th>
                </tr>
                <tr>
                    <th>3</th>
                    <th style="text-align:center;">طريقة تنظيم العرض من حيث الوضوح والكفاية؟</th>
                    <th style="text-align:center;"><input class="text-center" type="checkbox" name="excelant_3" value="1"  {{ $questionnaireForm->excelant_3=="1"? 'checked':'' }}  style="width: 40px; height: 40px;"></th>
                    <th style="text-align:center;"><input class="text-center" type="checkbox" name="abverage_3" value="1" {{ $questionnaireForm->abverage_3=="1"? 'checked':'' }}   style="width: 40px; height: 40px;"></th>
                    <th style="text-align:center;"><input class="text-center" type="checkbox" name="fair_3" value="1"  {{ $questionnaireForm->fair_3=="1"? 'checked':'' }}  style="width: 40px; height: 40px;"></th>
                    <th><input class="form-control" type="text" name="node_3" value="{{$questionnaireForm->node_3}}"></th>
                </tr>
                <tr>
                    <th>4</th>
                    <th style="text-align:center;">قدرة المدرب على إداء المدخالت والمناقشات؟</th>
                    <th style="text-align:center;"><input class="text-center" type="checkbox" name="excelant_4" value="1"  {{ $questionnaireForm->excelant_4=="1"? 'checked':'' }}  style="width: 40px; height: 40px;"></th>
                    <th style="text-align:center;"><input class="text-center" type="checkbox" name="abverage_4" value="1" {{ $questionnaireForm->abverage_4=="1"? 'checked':'' }}   style="width: 40px; height: 40px;"></th>
                    <th style="text-align:center;"><input class="text-center" type="checkbox" name="fair_4" value="1"  {{ $questionnaireForm->fair_4=="1"? 'checked':'' }}  style="width: 40px; height: 40px;"></th>
                    <th><input class="form-control" type="text" name="node_4"  value="{{$questionnaireForm->node_4}}"></th>
                </tr>
                <tr>
                    <th>5</th>
                    <th style="text-align:center;">تنوع األنشطة والتمارين والوسائل المستخدمة؟</th>
                    <th style="text-align:center;"><input class="text-center" type="checkbox" name="excelant_5" value="1"  {{ $questionnaireForm->excelant_5=="1"? 'checked':'' }}  style="width: 40px; height: 40px;"></th>
                    <th style="text-align:center;"><input class="text-center" type="checkbox" name="abverage_5" value="1" {{ $questionnaireForm->abverage_5=="1"? 'checked':'' }}   style="width: 40px; height: 40px;"></th>
                    <th style="text-align:center;"><input class="text-center" type="checkbox" name="fair_5" value="1"  {{ $questionnaireForm->fair_5=="1"? 'checked':'' }}  style="width: 40px; height: 40px;"></th>
                    <th><input class="form-control" type="text" name="node_5"  value="{{$questionnaireForm->node_5}}"></th>
                </tr>
                <tr>
                    <th>6</th>
                    <th style="text-align:center;">مدى تمكن المدرب من المادة المقدمة؟</th>
                    <th style="text-align:center;"><input class="text-center" type="checkbox" name="excelant_6" value="1"  {{ $questionnaireForm->excelant_6=="1"? 'checked':'' }}  style="width: 40px; height: 40px;"></th>
                    <th style="text-align:center;"><input class="text-center" type="checkbox" name="abverage_6" value="1" {{ $questionnaireForm->abverage_6=="1"? 'checked':'' }}   style="width: 40px; height: 40px;"></th>
                    <th style="text-align:center;"><input class="text-center" type="checkbox" name="fair_6" value="1"  {{ $questionnaireForm->fair_6=="1"? 'checked':'' }}  style="width: 40px; height: 40px;"></th>
                    <th><input class="form-control" type="text" name="node_6"  value="{{$questionnaireForm->node_6}}"></th>
                </tr>
                <tr>
                    <th>7</th>
                    <th style="text-align:center;">انعكاس خبره المدرب على إدائه؟</th>
                    <th style="text-align:center;"><input class="text-center" type="checkbox" name="excelant_7" value="1"  {{ $questionnaireForm->excelant_7=="1"? 'checked':'' }}  style="width: 40px; height: 40px;"></th>
                    <th style="text-align:center;"><input class="text-center" type="checkbox" name="abverage_7" value="1" {{ $questionnaireForm->abverage_7=="1"? 'checked':'' }}   style="width: 40px; height: 40px;"></th>
                    <th style="text-align:center;"><input class="text-center" type="checkbox" name="fair_7" value="1"  {{ $questionnaireForm->fair_7=="1"? 'checked':'' }}  style="width: 40px; height: 40px;"></th>
                    <th><input class="form-control" type="text" name="node_7"  value="{{$questionnaireForm->node_7}}"></th>
                </tr>
                <tr>
                    <th>8</th>
                    <th style="text-align:center;">ساده المشاركة الجماعية والتفاعل أجواء لتدريب؟</th>
                    <th style="text-align:center;"><input class="text-center" type="checkbox" name="excelant_8" value="1"  {{ $questionnaireForm->excelant_8=="1"? 'checked':'' }}  style="width: 40px; height: 40px;"></th>
                    <th style="text-align:center;"><input class="text-center" type="checkbox" name="abverage_8" value="1" {{ $questionnaireForm->abverage_8=="1"? 'checked':'' }}   style="width: 40px; height: 40px;"></th>
                    <th style="text-align:center;"><input class="text-center" type="checkbox" name="fair_8" value="1"  {{ $questionnaireForm->fair_8=="1"? 'checked':'' }}  style="width: 40px; height: 40px;"></th>
                    <th><input class="form-control" type="text" name="node_8"  value="{{$questionnaireForm->node_8}}"></th>
                </tr>
                <tr>
                    <th>9</th>
                    <th style="text-align:center;">المادة التدريبية التي وزعت في البرنامج؟</th>
                    <th style="text-align:center;"><input class="text-center" type="checkbox" name="excelant_9" value="1"  {{ $questionnaireForm->excelant_9=="1"? 'checked':'' }}  style="width: 40px; height: 40px;"></th>
                    <th style="text-align:center;"><input class="text-center" type="checkbox" name="abverage_9" value="1" {{ $questionnaireForm->abverage_9=="1"? 'checked':'' }}   style="width: 40px; height: 40px;"></th>
                    <th style="text-align:center;"><input class="text-center" type="checkbox" name="fair_9" value="1"  {{ $questionnaireForm->fair_9=="1"? 'checked':'' }}  style="width: 40px; height: 40px;"></th>
                    <th><input class="form-control" type="text" name="node_9"  value="{{$questionnaireForm->node_9}}"></th>
                </tr>
                <tr>
                    <th>10</th>
                    <th style="text-align:center;">مدى رضاكم عن البرنامج التدريبي بشكل عام؟</th>
                    <th style="text-align:center;"><input class="text-center" type="checkbox" name="excelant_10" value="1"  {{ $questionnaireForm->excelant_10=="1"? 'checked':'' }}  style="width: 40px; height: 40px;"></th>
                    <th style="text-align:center;"><input class="text-center" type="checkbox" name="abverage_10" value="1" {{ $questionnaireForm->abverage_10=="1"? 'checked':'' }}   style="width: 40px; height: 40px;"></th>
                    <th style="text-align:center;"><input class="text-center" type="checkbox" name="fair_10" value="1"  {{ $questionnaireForm->fair_10=="1"? 'checked':'' }}  style="width: 40px; height: 40px;"></th>
                    <th><input class="form-control" type="text" name="node_10"  value="{{$questionnaireForm->node_10}}"></th>
                </tr>
            </table>
        </div>
        <hr class="w-100">
        <div class="form-group row ">
            <label for="" class="col-3 col-form-label">مسؤول قسم خدمة العملاء :</label>
            <div class="col-6">
                <input type="text" class="form-control" name="customer_service_name"  value="{{$questionnaireForm->customer_service_name}}">
            </div>
        </div>
        <hr class="w-100">
        <table class="table">
            <thead>
                <tr>
                    <th>
                      <div class="" style="text-align:start ;">
                        <input class="form-control" type="text" name="company_name" placeholder="اسم الشركة  :"  value="{{ $questionnaireForm->company_name }}">
                      </div>
            
                    </th>
                    <th>
                      <div class="" style="text-align:start ;">
                        <input class="form-control" type="text" name="date2"  value="{{ $questionnaireForm->date2 }}" placeholder="تاريخ الإصدار   :" onfocus="(this.type='date')" onblur="(this.type='text')">
                      </div>
            
                    </th>
                    <th>
                        <div class="" style="text-align:start ;">
                            <input class="form-control" type="text" name="date3"  value="{{ $questionnaireForm->date3 }}" placeholder="تاريخ التعديل :" onfocus="(this.type='date')" onblur="(this.type='text')">
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
        <div class="form-group">
            <button style="border-radius:20px;margin: 50px; width:10% ; height: 5%;" type="submit"
            class="btn btn-primary btn-lg"><i class="fas fa-save" style="width:15% ; height: 20%;"></i> تعديل  </button>
        </div>
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