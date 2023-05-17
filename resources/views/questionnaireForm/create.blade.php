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
<div class="form-group row w-100 text-right" style="text-align:center;overflow:auto">
    
    <div class="card-body row" style='margin:auto;margin-top:80px'>

          
        <form action="{{route('questionnaireForms.store')}}" class='col-md-10' style='margin:auto' method="post" enctype="multipart/form-data" id="fo1">
            {{ csrf_field() }}
            <div style="" class="w-100 text-center my-4">
                <h2 style='text-shadow: 1px 1px 1px #3ed3ea;'> نموذج استبيان عن الدورة و المدرب</h2>
                <hr class="w-100">
            </div>
            <div class='row mt-4 mb-3'>
                <label class="form-label col-md-3 ">CO LOGO</label>
                <div class="col-6">
                    <input type="file" id="img" name="logo" accept="image/*">
                </div>
            </div>
            <div class="form-group row ">
                <label for="" class="col-3 col-form-label">تاريخ:</label>
                <div class="col-6">
                    <input type="date" class="form-control" name="date_1">
                </div>
            </div>
            <div class="form-group row ">
                <label for="" class="col-3 col-form-label">اسم الموظف:</label>
                <div class="col-6">
                    <input type="text" class="form-control" name="emp_name">
                </div>
            </div>
            <hr class="w-100">
            <div class="form-group row w-100 text-right" style="text-align:center;">
                <table class="table">
                    <tr style="background-color:    #001635; color:white;text-align:center;">
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
                        <th style="text-align:center;"><input class="text-center" type="checkbox" name="excelant_1" value="1" style="width: 40px; height: 40px;"></th>
                        <th style="text-align:center;"><input class="text-center" type="checkbox" name="abverage_1" value="1" style="width: 40px; height: 40px;"></th>
                        <th style="text-align:center;"><input class="text-center" type="checkbox" name="fair_1" value="1" style="width: 40px; height: 40px;"></th>
                        <th><input class="form-control" type="text" name="node_1"></th>
                    </tr>
                    <tr>
                        <th>2</th>
                        <th style="text-align:center;">محتوى البرنامج التدريبي؟</th>
                        <th style="text-align:center;"><input class="text-center" type="checkbox" name="excelant_2" value="1" style="width: 40px; height: 40px;"></th>
                        <th style="text-align:center;"><input class="text-center" type="checkbox" name="abverage_2" value="1" style="width: 40px; height: 40px;"></th>
                        <th style="text-align:center;"><input class="text-center" type="checkbox" name="fair_2" value="1" style="width: 40px; height: 40px;"></th>
                        <th><input class="form-control" type="text" name="node_2"></th>
                    </tr>
                    <tr>
                        <th>3</th>
                        <th style="text-align:center;">طريقة تنظيم العرض من حيث الوضوح والكفاية؟</th>
                        <th style="text-align:center;"><input class="text-center" type="checkbox" name="excelant_3" value="1" style="width: 40px; height: 40px;"></th>
                        <th style="text-align:center;"><input class="text-center" type="checkbox" name="abverage_3" value="1" style="width: 40px; height: 40px;"></th>
                        <th style="text-align:center;"><input class="text-center" type="checkbox" name="fair_3" value="1" style="width: 40px; height: 40px;"></th>
                        <th><input class="form-control" type="text" name="node_3"></th>
                    </tr>
                    <tr>
                        <th>4</th>
                        <th style="text-align:center;">قدرة المدرب على إداء المدخالت والمناقشات؟</th>
                        <th style="text-align:center;"><input class="text-center" type="checkbox" name="excelant_4" value="1" style="width: 40px; height: 40px;"></th>
                        <th style="text-align:center;"><input class="text-center" type="checkbox" name="abverage_4" value="1" style="width: 40px; height: 40px;"></th>
                        <th style="text-align:center;"><input class="text-center" type="checkbox" name="fair_4" value="1" style="width: 40px; height: 40px;"></th>
                        <th><input class="form-control" type="text" name="node_4"></th>
                    </tr>
                    <tr>
                        <th>5</th>
                        <th style="text-align:center;">تنوع األنشطة والتمارين والوسائل المستخدمة؟</th>
                        <th style="text-align:center;"><input class="text-center" type="checkbox" name="excelant_5" value="1" style="width: 40px; height: 40px;"></th>
                        <th style="text-align:center;"><input class="text-center" type="checkbox" name="abverage_5" value="1" style="width: 40px; height: 40px;"></th>
                        <th style="text-align:center;"><input class="text-center" type="checkbox" name="fair_5" value="1" style="width: 40px; height: 40px;"></th>
                        <th><input class="form-control" type="text" name="node_5"></th>
                    </tr>
                    <tr>
                        <th>6</th>
                        <th style="text-align:center;">مدى تمكن المدرب من المادة المقدمة؟</th>
                        <th style="text-align:center;"><input class="text-center" type="checkbox" name="excelant_6" value="1" style="width: 40px; height: 40px;"></th>
                        <th style="text-align:center;"><input class="text-center" type="checkbox" name="abverage_6" value="1" style="width: 40px; height: 40px;"></th>
                        <th style="text-align:center;"><input class="text-center" type="checkbox" name="fair_6" value="1" style="width: 40px; height: 40px;"></th>
                        <th><input class="form-control" type="text" name="node_6"></th>
                    </tr>
                    <tr>
                        <th>7</th>
                        <th style="text-align:center;">انعكاس خبره المدرب على إدائه؟</th>
                        <th style="text-align:center;"><input class="text-center" type="checkbox" name="excelant_7" value="1" style="width: 40px; height: 40px;"></th>
                        <th style="text-align:center;"><input class="text-center" type="checkbox" name="abverage_7" value="1" style="width: 40px; height: 40px;"></th>
                        <th style="text-align:center;"><input class="text-center" type="checkbox" name="fair_7" value="1" style="width: 40px; height: 40px;"></th>
                        <th><input class="form-control" type="text" name="node_7"></th>
                    </tr>
                    <tr>
                        <th>8</th>
                        <th style="text-align:center;">ساده المشاركة الجماعية والتفاعل أجواء لتدريب؟</th>
                        <th style="text-align:center;"><input class="text-center" type="checkbox" name="excelant_8" value="1" style="width: 40px; height: 40px;"></th>
                        <th style="text-align:center;"><input class="text-center" type="checkbox" name="abverage_8" value="1" style="width: 40px; height: 40px;"></th>
                        <th style="text-align:center;"><input class="text-center" type="checkbox" name="fair_8" value="1" style="width: 40px; height: 40px;"></th>
                        <th><input class="form-control" type="text" name="node_8"></th>
                    </tr>
                    <tr>
                        <th>9</th>
                        <th style="text-align:center;">المادة التدريبية التي وزعت في البرنامج؟</th>
                        <th style="text-align:center;"><input class="text-center" type="checkbox" name="excelant_9" value="1" style="width: 40px; height: 40px;"></th>
                        <th style="text-align:center;"><input class="text-center" type="checkbox" name="abverage_9" value="1" style="width: 40px; height: 40px;"></th>
                        <th style="text-align:center;"><input class="text-center" type="checkbox" name="fair_9" value="1" style="width: 40px; height: 40px;"></th>
                        <th><input class="form-control" type="text" name="node_9"></th>
                    </tr>
                    <tr>
                        <th>10</th>
                        <th style="text-align:center;">مدى رضاكم عن البرنامج التدريبي بشكل عام؟</th>
                        <th style="text-align:center;"><input class="text-center" type="checkbox" name="excelant_10" value="1" style="width: 40px; height: 40px;"></th>
                        <th style="text-align:center;"><input class="text-center" type="checkbox" name="abverage_10" value="1" style="width: 40px; height: 40px;"></th>
                        <th style="text-align:center;"><input class="text-center" type="checkbox" name="fair_10" value="1" style="width: 40px; height: 40px;"></th>
                        <th><input class="form-control" type="text" name="node_10"></th>
                    </tr>
                </table>
            </div>
            <hr class="w-100">
            <div class="form-group row ">
                <label for="" class="col-3 col-form-label">مسؤول قسم خدمة العملاء :</label>
                <div class="col-6">
                    <input type="text" class="form-control" name="customer_service_name">
                </div>
            </div>
            <hr class="w-100">
            <table class="table">
                <thead>
                    <tr>
                        <th>
                            <div class="" style="text-align:start ;">
                                <input class="form-control" type="text" name="company_name" placeholder="اسم الشركة  :">
                            </div>

                        </th>
                        <th>
                            <div class="" style="text-align:start ;">
                                <input class="form-control" type="text" name="date2" placeholder="تاريخ الإصدار   :" onfocus="(this.type='date')" onblur="(this.type='text')">
                            </div>

                        </th>
                        <th>
                            <div class="" style="text-align:start ;">
                                <input class="form-control" type="text" name="date3" placeholder="تاريخ التعديل :" onfocus="(this.type='date')" onblur="(this.type='text')">
                            </div>

                        </th>
                        <th>
                            <div class="" style="text-align:start ;">
                                <label> مدة الحفظ </label>
                                <input class="form-control shadow-lg" type="text" name="period_time">
                            </div>

                        </th>
                        <th>
                            <div class="" style="text-align:start ;">
                                <label> رقم الصفحة </label>
                                <input class="form-control shadow-lg" type="text" name="number_page">
                            </div>

                        </th>
                        <th>
                            <div class="" style="text-align:start ;">
                                <label> رقم الوثيقة </label>
                                <input class="form-control shadow-lg" type="text" name="number_doc">
                            </div>
                        </th>
                    </tr>
                </thead>
            </table>
            <div class='row'>
                <button style="border-radius:8px;margin: 50px; width:30% ;background-color: #2a415b; ;height: 5%;padding:10px;margin-right:100px;margin:auto" type="submit" class="btn btn-primary col-md-4">
                    <i class="fas fa-save" style="width:15% ; height: 20%;"></i>حفظ</button>
            </div>
        </form>
    </div>
    </div>

    <style>
        .table thead th {
            vertical-align: middle;

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
            float: left;
            display: inline-table;
        }

    </style>
    @stop
