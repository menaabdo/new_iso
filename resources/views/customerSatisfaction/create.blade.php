@extends('layouts.master')

@section('content')


<div class="card">
    <div class="card-body">
        <h3 style="margin-top:85px;">قياس رضا العملاء</h3>
        <hr>
        <form action="{{ route('customerSatisfactions.store') }}" method="post" enctype="multipart/form-data" id="fo1">
            {{ csrf_field() }}
            <div style="" class="w-100 text-center my-4">
                <h2>قياس رضا العملاء</h2>
                <hr class="w-100">
            </div>
            <div id="mainDiv" style=" margin-right:500px;">
                <h4 style=" color:blue;">CO LOGO</h4>
                <hr width="50%" size="20" color="blue">
                <input type="file" id="img" name="logo" accept="image/*">
            </div>

            <br><br><br><br>
            <div class="col-12">
                <h1> عزيزنا عميلنا الكريم</h1>
                <p>
                    <h3>
                        نتشرف بأن نعرض على سيادتكم هذا النموذج الخاص بقياس مدى رضاءكم على مستوى المنتجات\ الخدمات التي نفخر
                        بتقديمها لسيادتكم.
                    </h3>
                </p>
                <p>
                    <h3>
                        أملين أن يساعدنا هذا النموذج على تطوير وتحسين مستوى المنتاجات المقدمة منا لسيادتكم.
                    </h3>
                </p>
            </div>


            <hr class="w-100">
            <label>
                <h1>** برجاء وضع تعليقاتكم في الجدول بالأسفل :</h1>
            </label>
            <div class="form-group row w-100 text-right" style="text-align:center;">

                <table class="table">
                    <tr style="background-color:rgb(249, 235, 141); text-align:center;">
                        <th scope="col" rowspan="2">م</th>
                        <th scope="col" rowspan="2">معايير القياس</th>
                        <th scope="col" colspan="3">درجة المعايير</th>>
                    </tr>
                    <tr style="background-color:rgb(249, 235, 141); text-align:center;">
                        <th scope="col"> ممتاز </th>
                        <th scope="col">ملائم </th>
                        <th scope="col"> غير مرضي</th>
                    </tr>
                    <tr>
                        <th>1</th>
                        <th style="text-align:center;">جودة المنتجات\ الخدمات</th>
                        <th style="text-align:center;"><input class="text-center" type="checkbox" name="excelant_1" value="1" style="width: 40px; height: 40px;"></th>
                        <th style="text-align:center;"><input class="text-center" type="checkbox" name="abverage_1" value="1" style="width: 40px; height: 40px;"></th>
                        <th style="text-align:center;"><input class="text-center" type="checkbox" name="fair_1" value="1" style="width: 40px; height: 40px;"></th>

                    </tr>
                    <tr>
                        <th>2</th>
                        <th style="text-align:center;">مدي الإستجابة في تحقيق المتطلبات</th>
                        <th style="text-align:center;"><input class="text-center" type="checkbox" name="excelant_2" value="1" style="width: 40px; height: 40px;"></th>
                        <th style="text-align:center;"><input class="text-center" type="checkbox" name="abverage_2" value="1" style="width: 40px; height: 40px;"></th>
                        <th style="text-align:center;"><input class="text-center" type="checkbox" name="fair_2" value="1" style="width: 40px; height: 40px;"></th>

                    </tr>
                    <tr>
                        <th>3</th>
                        <th style="text-align:center;">توقيتات توفير المنتجات</th>
                        <th style="text-align:center;"><input class="text-center" type="checkbox" name="excelant_3" value="1" style="width: 40px; height: 40px;"></th>
                        <th style="text-align:center;"><input class="text-center" type="checkbox" name="abverage_3" value="1" style="width: 40px; height: 40px;"></th>
                        <th style="text-align:center;"><input class="text-center" type="checkbox" name="fair_3" value="1" style="width: 40px; height: 40px;"></th>

                    </tr>
                    <tr>
                        <th>4</th>
                        <th style="text-align:center;">طريقة موظفي الشركة</th>
                        <th style="text-align:center;"><input class="text-center" type="checkbox" name="excelant_4" value="1" style="width: 40px; height: 40px;"></th>
                        <th style="text-align:center;"><input class="text-center" type="checkbox" name="abverage_4" value="1" style="width: 40px; height: 40px;"></th>
                        <th style="text-align:center;"><input class="text-center" type="checkbox" name="fair_4" value="1" style="width: 40px; height: 40px;"></th>

                    </tr>
                    <tr>
                        <th>5</th>
                        <th style="text-align:center;">تكلفة تقديم الخدمة</th>
                        <th style="text-align:center;"><input class="text-center" type="checkbox" name="excelant_5" value="1" style="width: 40px; height: 40px;"></th>
                        <th style="text-align:center;"><input class="text-center" type="checkbox" name="abverage_5" value="1" style="width: 40px; height: 40px;"></th>
                        <th style="text-align:center;"><input class="text-center" type="checkbox" name="fair_5" value="1" style="width: 40px; height: 40px;"></th>

                    </tr>

                </table>
            </div>
            <hr class="w-100">
            <div class="form-group row ">
                <h1 for="" class="col-2 col-form-label">ملاحظات اخري :</h1>
                <div class="col-9">
                    <textarea class="form-control" name="nodes"></textarea>
                </div>
            </div>
            <hr class="w-100">
            <div class="form-group row ">
                <label for="" class="col-2 col-form-label">الأسم :</label>
                <div class="col-9">
                    <input type="text" class="form-control" name="name">
                </div>
                <label for="" class="col-2 col-form-label">التاريخ :</label>
                <div class="col-9">
                    <input type="date" class="form-control" name="date_1">
                </div>
                <label for="" class="col-2 col-form-label">رقم الهاتف :</label>
                <div class="col-9">
                    <input type="text" class="form-control" name="phone">
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
            <div class="form-group">
                <button style="border-radius:20px;margin: 50px; width:10% ; height: 5%;" type="submit" class="btn btn-primary btn-lg"><i class="fas fa-save" style="width:15% ; height: 20%;"></i> حفظ
                </button>
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
            float: left;
            display: inline-table;
        }

    </style>
    @stop
