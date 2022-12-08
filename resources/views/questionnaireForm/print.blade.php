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
        <img src="{{ asset($questionnaireForm->logo) }}" style="border-radius: 6px;
    border: 2px solid #001635;
    margin: 10px;
    float: left;
    /* padding: 12px;" width="50px" height="50px" />
        <span style='font-family:Cursive;border-bottom: 1px solid silver;
    ; box-shadow: 0 1rem 3rem rgba(0, 0, 0, .175) !important;
    border-radius: 6px;
    padding: 10px;text-shadow: 1px 1px 1px #3ed3ea;padding-left: 40px;
    padding-right: 40px;
'>
نموذج استبيان عن الدورة و المدرب
</span>
</h3>
            <hr class="w-100">
        </div>
        <div>
          
        </div>
        <br><br>
        <div class="form-group row ">
            <div class="col-6" style='margin:12px'>
                <label for="" class="col-3 col-form-label">تاريخ:</label>
                <input readonly style=' box-shadow: 0 1rem 3rem rgba(0, 0, 0, .175) !important;border:none;
    text-align: center;   ' value=' {{$questionnaireForm->date_1}}'>
            </div>
        </div>
        <div class="form-group row ">
            <div class="col-6" style='margin:12px'>
                <label for="" class="col-3 col-form-label">اسم الموظف:</label>
                <input readonly style=' box-shadow: 0 1rem 3rem rgba(0, 0, 0, .175) !important;border:none;
    text-align: center;   ' value='{{$questionnaireForm->emp_name}}'>
            </div>
        </div>
        <hr class="w-100">
        <br><br>
        <div class="form-group row w-100 text-right" style="text-align:center;">
            <table class="table" style='border:none'>
                <tr style="background-color: #2a415b;font-size:11px;
    color: white">
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
                    <th style="text-align:center;"><input class="text-center" type="checkbox" name="excelant_1" value="1"  {{ $questionnaireForm->excelant_1=="1"? 'checked':'' }}  style="width: 40px; height: 40px;"
                        <?php if ( $questionnaireForm->excelant_1 == '1') {
                            echo 'checked="checked"';
                        } ?>></th>
                    <th style="text-align:center;"><input class="text-center" type="checkbox" name="abverage_1" value="1" {{ $questionnaireForm->abverage_1=="1"? 'checked':'' }}  
                        <?php if ( $questionnaireForm->abverage_1 == '1') {
                            echo 'checked="checked"';
                        } ?>
                         style="width: 40px; height: 40px;"></th>
                    <th style="text-align:center;"><input class="text-center" type="checkbox" name="fair_1" value="1"  {{ $questionnaireForm->fair_1=="1"? 'checked':'' }}  
                        <?php if ( $questionnaireForm->fair_1 == '1') {
                            echo 'checked="checked"';
                        } ?>
                        style="width: 40px; height: 40px;"></th>
                    <th><input class="form-control" type="text" name="node_1" value="{{$questionnaireForm->node_1}}"></th>
                </tr>
                <tr>
                    <th>2</th>
                    <th style="text-align:center;">محتوى البرنامج التدريبي؟</th>
                    <th style="text-align:center;"><input class="text-center" type="checkbox" name="excelant_2" value="1"  {{ $questionnaireForm->excelant_2=="1"? 'checked':'' }}  style="width: 40px; height: 40px;"
                        <?php if ( $questionnaireForm->excelant_2 == '1') {
                            echo 'checked="checked"';
                        } ?>></th>
                    <th style="text-align:center;"><input class="text-center" type="checkbox" name="abverage_2" value="1" {{ $questionnaireForm->abverage_2=="1"? 'checked':'' }}  
                        <?php if ( $questionnaireForm->abverage_2 == '1') {
                            echo 'checked="checked"';
                        } ?>
                         style="width: 40px; height: 40px;"></th>
                    <th style="text-align:center;"><input class="text-center" type="checkbox" name="fair_2" value="1"  {{ $questionnaireForm->fair_2=="1"? 'checked':'' }}  
                        <?php if ( $questionnaireForm->fair_2 == '1') {
                            echo 'checked="checked"';
                        } ?>
                        style="width: 40px; height: 40px;"></th>
                    <th><input class="form-control" type="text" name="node_2" value="{{$questionnaireForm->node_2}}"></th>
                </tr>
                <tr>
                    <th>3</th>
                    <th style="text-align:center;">طريقة تنظيم العرض من حيث الوضوح والكفاية؟</th>
                    <th style="text-align:center;"><input class="text-center" type="checkbox" name="excelant_3" value="1"  {{ $questionnaireForm->excelant_3=="1"? 'checked':'' }}  style="width: 40px; height: 40px;"
                        <?php if ( $questionnaireForm->excelant_3 == '1') {
                            echo 'checked="checked"';
                        } ?>></th>
                    <th style="text-align:center;"><input class="text-center" type="checkbox" name="abverage_3" value="1" {{ $questionnaireForm->abverage_3=="1"? 'checked':'' }}  
                        <?php if ( $questionnaireForm->abverage_3 == '1') {
                            echo 'checked="checked"';
                        } ?>
                         style="width: 40px; height: 40px;"></th>
                    <th style="text-align:center;"><input class="text-center" type="checkbox" name="fair_3" value="1"  {{ $questionnaireForm->fair_3=="1"? 'checked':'' }}  
                        <?php if ( $questionnaireForm->fair_3 == '1') {
                            echo 'checked="checked"';
                        } ?>
                        style="width: 40px; height: 40px;"></th>
                    <th><input class="form-control" type="text" name="node_3" value="{{$questionnaireForm->node_3}}"></th>
                </tr>
                <tr>
                    <th>4</th>
                    <th style="text-align:center;">قدرة المدرب على إداء المدخالت والمناقشات؟</th>
                    <th style="text-align:center;"><input class="text-center" type="checkbox" name="excelant_4" value="1"  {{ $questionnaireForm->excelant_4=="1"? 'checked':'' }}  style="width: 40px; height: 40px;"
                        <?php if ( $questionnaireForm->excelant_4 == '1') {
                            echo 'checked="checked"';
                        } ?>></th>
                    <th style="text-align:center;"><input class="text-center" type="checkbox" name="abverage_4" value="1" {{ $questionnaireForm->abverage_4=="1"? 'checked':'' }}  
                        <?php if ( $questionnaireForm->abverage_4 == '1') {
                            echo 'checked="checked"';
                        } ?>
                         style="width: 40px; height: 40px;"></th>
                    <th style="text-align:center;"><input class="text-center" type="checkbox" name="fair_4" value="1"  {{ $questionnaireForm->fair_4=="1"? 'checked':'' }}  
                        <?php if ( $questionnaireForm->fair_4 == '1') {
                            echo 'checked="checked"';
                        } ?>
                        style="width: 40px; height: 40px;"></th>
                    <th><input class="form-control" type="text" name="node_4"  value="{{$questionnaireForm->node_4}}"></th>
                </tr>
                <tr>
                    <th>5</th>
                    <th style="text-align:center;">تنوع األنشطة والتمارين والوسائل المستخدمة؟</th>
                    <th style="text-align:center;"><input class="text-center" type="checkbox" name="excelant_5" value="1"  {{ $questionnaireForm->excelant_5=="1"? 'checked':'' }}  style="width: 40px; height: 40px;"
                        <?php if ( $questionnaireForm->excelant_5 == '1') {
                            echo 'checked="checked"';
                        } ?>></th>
                    <th style="text-align:center;"><input class="text-center" type="checkbox" name="abverage_5" value="1" {{ $questionnaireForm->abverage_5=="1"? 'checked':'' }}  
                        <?php if ( $questionnaireForm->abverage_5 == '1') {
                            echo 'checked="checked"';
                        } ?>
                         style="width: 40px; height: 40px;"></th>
                    <th style="text-align:center;"><input class="text-center" type="checkbox" name="fair_5" value="1"  {{ $questionnaireForm->fair_5=="1"? 'checked':'' }}  
                        <?php if ( $questionnaireForm->fair_5 == '1') {
                            echo 'checked="checked"';
                        } ?>
                        style="width: 40px; height: 40px;"></th>
                    <th><input class="form-control" type="text" name="node_5"  value="{{$questionnaireForm->node_5}}"></th>
                </tr>
                <tr>
                    <th>6</th>
                    <th style="text-align:center;">مدى تمكن المدرب من المادة المقدمة؟</th>
                    <th style="text-align:center;"><input class="text-center" type="checkbox" name="excelant_6" value="1"  {{ $questionnaireForm->excelant_6=="1"? 'checked':'' }}  style="width: 40px; height: 40px;"
                        <?php if ( $questionnaireForm->excelant_6 == '1') {
                            echo 'checked="checked"';
                        } ?>></th>
                    <th style="text-align:center;"><input class="text-center" type="checkbox" name="abverage_6" value="1" {{ $questionnaireForm->abverage_6=="1"? 'checked':'' }}  
                        <?php if ( $questionnaireForm->abverage_6 == '1') {
                            echo 'checked="checked"';
                        } ?>
                         style="width: 40px; height: 40px;"></th>
                    <th style="text-align:center;"><input class="text-center" type="checkbox" name="fair_6" value="1"  {{ $questionnaireForm->fair_6=="1"? 'checked':'' }}  
                        <?php if ( $questionnaireForm->fair_6 == '1') {
                            echo 'checked="checked"';
                        } ?>
                        style="width: 40px; height: 40px;"></th>
                    <th><input class="form-control" type="text" name="node_6"  value="{{$questionnaireForm->node_6}}"></th>
                </tr>
                <tr>
                    <th>7</th>
                    <th style="text-align:center;">انعكاس خبره المدرب على إدائه؟</th>
                    <th style="text-align:center;"><input class="text-center" type="checkbox" name="excelant_7" value="1"  {{ $questionnaireForm->excelant_7=="1"? 'checked':'' }}  style="width: 40px; height: 40px;"
                        <?php if ( $questionnaireForm->excelant_7 == '1') {
                            echo 'checked="checked"';
                        } ?>></th>
                    <th style="text-align:center;"><input class="text-center" type="checkbox" name="abverage_7" value="1" {{ $questionnaireForm->abverage_7=="1"? 'checked':'' }}  
                        <?php if ( $questionnaireForm->abverage_7 == '1') {
                            echo 'checked="checked"';
                        } ?>
                         style="width: 40px; height: 40px;"></th>
                    <th style="text-align:center;"><input class="text-center" type="checkbox" name="fair_7" value="1"  {{ $questionnaireForm->fair_7=="1"? 'checked':'' }}  
                        <?php if ( $questionnaireForm->fair_7 == '1') {
                            echo 'checked="checked"';
                        } ?>
                        style="width: 40px; height: 40px;"></th>
                    <th><input class="form-control" type="text" name="node_7"  value="{{$questionnaireForm->node_7}}"></th>
                </tr>
                <tr>
                    <th>8</th>
                    <th style="text-align:center;">ساده المشاركة الجماعية والتفاعل أجواء لتدريب؟</th>
                    <th style="text-align:center;"><input class="text-center" type="checkbox" name="excelant_8" value="1"  {{ $questionnaireForm->excelant_8=="1"? 'checked':'' }}  style="width: 40px; height: 40px;"
                        <?php if ( $questionnaireForm->excelant_8 == '1') {
                            echo 'checked="checked"';
                        } ?>></th>
                    <th style="text-align:center;"><input class="text-center" type="checkbox" name="abverage_8" value="1" {{ $questionnaireForm->abverage_8=="1"? 'checked':'' }}  
                        <?php if ( $questionnaireForm->abverage_8 == '1') {
                            echo 'checked="checked"';
                        } ?>
                         style="width: 40px; height: 40px;"></th>
                    <th style="text-align:center;"><input class="text-center" type="checkbox" name="fair_8" value="1"  {{ $questionnaireForm->fair_8=="1"? 'checked':'' }}  
                        <?php if ( $questionnaireForm->fair_8 == '1') {
                            echo 'checked="checked"';
                        } ?>
                        style="width: 40px; height: 40px;"></th>
                    <th><input class="form-control" type="text" name="node_8"  value="{{$questionnaireForm->node_8}}"></th>
                </tr>
                <tr>
                    <th>9</th>
                    <th style="text-align:center;">المادة التدريبية التي وزعت في البرنامج؟</th>
                    <th style="text-align:center;"><input class="text-center" type="checkbox" name="excelant_9" value="1"  {{ $questionnaireForm->excelant_9=="1"? 'checked':'' }}  style="width: 40px; height: 40px;"
                        <?php if ( $questionnaireForm->excelant_9 == '1') {
                            echo 'checked="checked"';
                        } ?>></th>
                    <th style="text-align:center;"><input class="text-center" type="checkbox" name="abverage_9" value="1" {{ $questionnaireForm->abverage_9=="1"? 'checked':'' }}  
                        <?php if ( $questionnaireForm->abverage_9 == '1') {
                            echo 'checked="checked"';
                        } ?>
                         style="width: 40px; height: 40px;"></th>
                    <th style="text-align:center;"><input class="text-center" type="checkbox" name="fair_9" value="1"  {{ $questionnaireForm->fair_9=="1"? 'checked':'' }}  
                        <?php if ( $questionnaireForm->fair_9 == '1') {
                            echo 'checked="checked"';
                        } ?>
                        style="width: 40px; height: 40px;"></th>
                    <th><input class="form-control" type="text" name="node_9"  value="{{$questionnaireForm->node_9}}"></th>
                </tr>
                <tr>
                    <th>10</th>
                    <th style="text-align:center;">مدى رضاكم عن البرنامج التدريبي بشكل عام؟</th>
                    <th style="text-align:center;"><input class="text-center" type="checkbox" name="excelant_10" value="1"  {{ $questionnaireForm->excelant_10=="1"? 'checked':'' }}  style="width: 40px; height: 40px;"
                        <?php if ( $questionnaireForm->excelant_10 == '1') {
                            echo 'checked="checked"';
                        } ?>></th>
                    <th style="text-align:center;"><input class="text-center" type="checkbox" name="abverage_10" value="1" {{ $questionnaireForm->abverage_10=="1"? 'checked':'' }}  
                        <?php if ( $questionnaireForm->abverage_10 == '1') {
                            echo 'checked="checked"';
                        } ?>
                         style="width: 40px; height: 40px;"></th>
                    <th style="text-align:center;"><input class="text-center" type="checkbox" name="fair_10" value="1"  {{ $questionnaireForm->fair_10=="1"? 'checked':'' }}  
                        <?php if ( $questionnaireForm->fair_10 == '1') {
                            echo 'checked="checked"';
                        } ?>
                        style="width: 40px; height: 40px;"></th>
                    <th><input class="form-control" type="text" name="node_10"  value="{{$questionnaireForm->node_10}}"></th>
                </tr>
            </table>
        </div>
        <br><br>
        <hr class="w-100">
        <div class="form-group row ">
            <div class="col-6">
                <label for="" class="col-3 col-form-label">مسؤول قسم خدمة العملاء :</label>
                <input readonly style=' box-shadow: 0 1rem 3rem rgba(0, 0, 0, .175) !important;border:none;
    text-align: center;   ' value='  {{$questionnaireForm->customer_service_name}}'>
            </div>
        </div>
        <hr class="w-100">
<br><br>
        <table class="" style="  ; border:none;padding:12px;margin-top:12px;background-color: #001635;
    color: white;text-shadow: none;width: 97%;
    margin: auto;
    margin-bottom: 12px;    font-size: 12px;padding: 1px;">
  
            <thead>
                <tr>
                    <th style='border:none'>
                      <div class="" style="text-align:start ;">
                        {{ $questionnaireForm->company_name }}
                      </div>
            
                    </th>
                    <th style='border:none'>
                      <div class="" style="text-align:start ;">
                       {{ $questionnaireForm->date2 }}
                      </div>
            
                    </th>
                    <th style='border:none'>
                        <div class="" style="text-align:start ;">
                          {{ $questionnaireForm->date3 }}
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