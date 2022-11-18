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
    <div class="card-body row" style='margin:auto;margin-top:80px'>


    <form action="{{route('customerComplaints.update',$customerComplaint->id)}}" class='col-md-10' style='margin:auto' method="post" enctype="multipart/form-data" id="fo1">
        @method('PUT') 
              {{ csrf_field() }}
        <div style="" class="w-100 text-center my-4">
            <h2 style='text-shadow: 1px 1px 1px #3ed3ea;'>متابعة شكوى عميل</h2>
            <hr class="w-100">
        </div>
        <div class='row mt-4 mb-3'>
                <label class="form-label col-md-3 ">CO LOGO</label>
                  
            <input type="file" id="img" name="logo" accept="image/*">
            <img src="{{ asset($customerComplaint->logo) }}" height=180px width=210px; />
          
        </div>
        <div class="form-group row ">
            <label for="" class="col-3 col-form-label">مصدر الشكوي:</label>
            <div class="col-6">
                <input type="text" class="form-control" name="source_complaint" value="{{$customerComplaint->source_complaint}}">
            </div>
        </div>
        <div class="form-group row ">
            <label for="" class="col-3 col-form-label">نوع المنتج / الخدمه:</label>
            <div class="col-6">
                <input type="text" class="form-control" name="type_product_service" value="{{$customerComplaint->type_product_service}}">
            </div>
        </div>
        <div class="form-group row ">
            <label for="" class="col-3 col-form-label">اسم العميل:</label>
            <div class="col-6">
                <input type="text" class="form-control" name="customer_name" value="{{$customerComplaint->customer_name}}">
            </div>
        </div>
        <div class="form-group row ">
            <label for="" class="col-3 col-form-label">المكان:</label>
            <div class="col-6">
                <input type="text" class="form-control" name="place" value="{{$customerComplaint->place}}">
            </div>
        </div>
        <div class="form-group row text-left">
            <label for="" class="col-3 col-form-label">التاريخ:</label>
            <div class="col-6">
                <input type="date" class="form-control" name="date_1" value="{{$customerComplaint->date_1}}">
            </div>
        </div>
        <hr class="w-100">
        <div class="form-group row " style="text-align:center;overflow-x:auto;">
                <table class="table">
                <tr style="background-color:    #001635; color:white;text-align:center;">
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
            <h4>ﺇدارة التسويق والمبيعات (إرضاء العميل)   :</h4>
        </div>
        <div class="form-group row ">
            <label for="" class="col-2 col-form-label">الأسم :</label>
            <div class="col-6">
                <input type="text" class="form-control" name="name" value="{{$customerComplaint->name}}">
            </div>
            </div>
            <div class="form-group row ">
        
            <label for="" class="col-2 col-form-label">التاريخ :</label>
            <div class="col-6">
                <input type="date" class="form-control" name="date_6" value="{{$customerComplaint->date_6}}">
            </div>
        </div>
        <hr class="w-100">
        <div class="form-group row " style="text-align:center;overflow-x:auto;">
            
        <table class="table">
            <thead>
                <tr>
                    <th>
                      <div class="" style="text-align:start ;">
                        <input class="form-control" type="text" name="company_name" placeholder="اسم الشركة  :"  value="{{ $customerComplaint->company_name }}">
                      </div>
            
                    </th>
                    <th>
                      <div class="" style="text-align:start ;">
                        <input class="form-control" type="text" name="date2"  value="{{ $customerComplaint->date2 }}" placeholder="تاريخ الإصدار   :" onfocus="(this.type='date')" onblur="(this.type='text')">
                      </div>
            
                    </th>
                    <th>
                        <div class="" style="text-align:start ;">
                            <input class="form-control" type="text" name="date3"  value="{{ $customerComplaint->date3 }}" placeholder="تاريخ التعديل :" onfocus="(this.type='date')" onblur="(this.type='text')">
                          </div>
            
                    </th>
                    <th>
                            <div class="" style="text-align:start ;">
                                <label> مدة الحفظ </label>
                                <input class="form-control shadow-lg" type="text" name="period_time" value="{{ $customerComplaint->period_time }}">
                            </div>

                        </th>
                        <th>
                            <div class="" style="text-align:start ;">
                                <label> رقم الصفحة </label>
                                <input class="form-control shadow-lg" type="text" name="number_page" value="{{ $customerComplaint->number_page }}">
                            </div>

                        </th>
                        <th>
                            <div class="" style="text-align:start ;">
                                <label> رقم الوثيقة </label>
                                <input class="form-control shadow-lg" type="text" name="number_doc" value="{{ $customerComplaint->number_doc }}">
                            </div>
                        </th>
                  </tr>
            </thead>
        </table>
          </div>
          <div class='row'>
            <button style="border-radius:8px;margin: 50px; width:30% ;background-color: #2a415b; ;height: 5%;padding:10px;margin-right:100px;margin:auto" type="submit"
                class="btn btn-primary col-md-4">
             تعديل</button>
                    </div>  
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