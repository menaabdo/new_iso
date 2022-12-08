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
        <img src="{{ asset($customerComplaint->logo) }}" style="border-radius: 6px;
    border: 2px solid #001635;
    margin: 10px;
    float: left;
    /* padding: 12px;" width="50px" height="50px" />
        <span style='font-family:Cursive;border-bottom: 1px solid silver;
    ; box-shadow: 0 1rem 3rem rgba(0, 0, 0, .175) !important;
    border-radius: 6px;
    padding: 10px;text-shadow: 1px 1px 1px #3ed3ea;padding-left: 40px;
    padding-right: 40px;
'>  متابعة شكوى عميل
</span>
</h3>
            <hr class="w-100">
        </div>
        <div>
          
        </div>
        <br><br>
        <div class="form-group row ">
            <div class="col-6">
                <label for="" class="col-3 col-form-label">مصدر الشكوي:</label>
                <input readonly style=' box-shadow: 0 1rem 3rem rgba(0, 0, 0, .175) !important;border:none;
    text-align: center;   ' value=' {{$customerComplaint->source_complaint}}'>
            </div>
        </div>
        <br>
        <div class="form-group row ">
            <div class="col-6">
                <label for="" class="col-3 col-form-label">نوع المنتج / الخدمه:</label>
                <input readonly style=' box-shadow: 0 1rem 3rem rgba(0, 0, 0, .175) !important;border:none;
    text-align: center;   ' value=' {{$customerComplaint->type_product_service}}'>
            </div>
        </div>
        <br>
        <div class="form-group row ">
            <div class="col-6">
                <label for="" class="col-3 col-form-label">اسم العميل:</label>
                <input readonly style=' box-shadow: 0 1rem 3rem rgba(0, 0, 0, .175) !important;border:none;
    text-align: center;   ' value=' {{$customerComplaint->customer_name}}'>
            </div>
        </div>
        <br>
        <div class="form-group row ">
            <div class="col-6">
                <label for="" class="col-3 col-form-label">المكان:</label>
                <input readonly style=' box-shadow: 0 1rem 3rem rgba(0, 0, 0, .175) !important;border:none;
    text-align: center;   ' value='  {{$customerComplaint->place}}'>
            </div>
        </div>
        <br>
        <div class="form-group row text-left">
            <div class="col-6">
                <label for="" class="col-3 col-form-label">التاريخ:</label>
                <input readonly style=' box-shadow: 0 1rem 3rem rgba(0, 0, 0, .175) !important;border:none;
    text-align: center;   ' value=' {{$customerComplaint->date_1}}'>
            </div>
        </div>
    
        <hr class="w-100">
        <br>
        <div class="form-group row w-100 text-right" style="text-align:center;overflow:auto">
            <table class="table" style='border:none'>
                <tr style='background-color: #2a415b;font-size:11px;
    color: white'><th>موضوع الشكوي</th>
                    <th>تاريخ استقبال الشكوي</th>
                    <th>تاريخ ارسالهاالي الادارات المختصه</th>
                    <th>تاريخ وصول الرد</th>
                    <th>تاريخ ارسال الرد الي العميل </th>
                    <th>ملاحظات  العميل </th>
                </tr>
                <tr>
                    <th><textarea class="form-control" type="text" name="subject_complaint">{{$customerComplaint->subject_complaint}}</textarea></th>
                    <th><input class="form-control" type="date" name="date_2" value="{{$customerComplaint->date_2}}"></th>
                    <th><input class="form-control" type="date" name="date_3" value="{{$customerComplaint->date_3}}"></th>
                    <th><input class="form-control" type="date" name="date_4" value="{{$customerComplaint->date_4}}"></th>
                    <th><input class="form-control" type="date" name="date_5" value="{{$customerComplaint->date_5}}"></th>
                    <th><textarea class="form-control" type="text" name="nodes">{{$customerComplaint->nodes}}</textarea></th>
                </tr>
            </table>
        </div>
        <hr class="w-100">
        <div style="" class="w-100 text-center my-4">
            <h2>ﺇدارة التسويق والمبيعات (إرضاء العميل)   :</h2>
        </div>
        <div class="form-group row ">
            <div class="col-9">
                <label for="" class="col-2 col-form-label">الأسم :</label>
                <input readonly style=' box-shadow: 0 1rem 3rem rgba(0, 0, 0, .175) !important;border:none;
    text-align: center;   ' value=' {{$customerComplaint->name}}'>
            </div>
            <div class="col-9">
                <label for="" class="col-2 col-form-label">التاريخ :</label>
                <input readonly style=' box-shadow: 0 1rem 3rem rgba(0, 0, 0, .175) !important;border:none;
    text-align: center;   ' value=' {{$customerComplaint->date_6}}'>
            </div>
        </div>
        <hr class="w-100">
        <br>
        <table class="" style="  ; border:none;padding:12px;margin-top:12px;background-color: #001635;
    color: white;text-shadow: none;width: 97%;
    margin: auto;
    margin-bottom: 12px;    font-size: 12px;padding: 1px;">
            <thead>
                <tr>
                    <th style='border:none'>
                      <div class="" style="text-align:start ;">
                      {{ $customerComplaint->company_name }}
                      </div>
            
                    </th>
                    <th style='border:none'>
                      <div class="" style="text-align:start ;">
                       {{ $customerComplaint->date2 }}
                      </div>
            
                    </th>
                    <th style='border:none'>
                        <div class="" style="text-align:start ;">
                          {{ $customerComplaint->date3 }}
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
                    <th>
                      <div class="" style="text-align:start ;">
                        <label for="" class="" style="text-align: center;"> رقم الوثيقة : QA – F
                          - 13 </label>
                      </div>
                    </th>
                  </tr>
            </thead>
        </table>
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
<script>
  window.addEventListener("load", window.print());
</script>
@stop