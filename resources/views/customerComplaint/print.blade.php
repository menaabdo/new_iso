@extends('layouts.print')

@section('content')


<div class="card">
<div class="card-body">
        <div style="" class="w-100 text-center my-4">
            <h2>متابعة شكوى عميل</h2>
            <hr class="w-100">
        </div>
        <div>
            <img src="{{ asset($customerComplaint->logo) }}" style="float: left;" width="100px" height="50px" />
            
        </div>
        <br><br>
        <div class="form-group row ">
            <div class="col-6">
                <label for="" class="col-3 col-form-label">مصدر الشكوي:</label>
                {{$customerComplaint->source_complaint}}
            </div>
        </div>
        <br>
        <div class="form-group row ">
            <div class="col-6">
                <label for="" class="col-3 col-form-label">نوع المنتج / الخدمه:</label>
              {{$customerComplaint->type_product_service}}
            </div>
        </div>
        <br>
        <div class="form-group row ">
            <div class="col-6">
                <label for="" class="col-3 col-form-label">اسم العميل:</label>
               {{$customerComplaint->customer_name}}
            </div>
        </div>
        <br>
        <div class="form-group row ">
            <div class="col-6">
                <label for="" class="col-3 col-form-label">المكان:</label>
                {{$customerComplaint->place}}
            </div>
        </div>
        <br>
        <div class="form-group row text-left">
            <div class="col-6">
                <label for="" class="col-3 col-form-label">التاريخ:</label>
               {{$customerComplaint->date_1}}
            </div>
        </div>
    
        <hr class="w-100">
        <br>
        <div class="form-group row w-100 text-right" style="text-align:center;">
            <table class="table">
                <tr style="background-color:rgb(249, 235, 141); text-align:center;">
                    <th>موضوع الشكوي</th>
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
                {{$customerComplaint->name}}
            </div>
            <div class="col-9">
                <label for="" class="col-2 col-form-label">التاريخ :</label>
              {{$customerComplaint->date_6}}
            </div>
        </div>
        <hr class="w-100">
        <br>
        <table class="table">
            <thead>
                <tr>
                    <th>
                      <div class="" style="text-align:start ;">
                      {{ $customerComplaint->company_name }}
                      </div>
            
                    </th>
                    <th>
                      <div class="" style="text-align:start ;">
                       {{ $customerComplaint->date2 }}
                      </div>
            
                    </th>
                    <th>
                        <div class="" style="text-align:start ;">
                          {{ $customerComplaint->date3 }}
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