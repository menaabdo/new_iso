@extends('layouts.print')

@section('content')

    <div class="card">
        <div class="card-body">
            <div style="" class="w-100 text-center my-4">
                <h2>متابعة شكوى عميل</h2>
                <hr class="w-100">
            </div>
            <div>
                <img src="{{ public_path($customerSatisfaction->logo) }}" style="float: left;" width="100px" height="50px" />

            </div>
            <br><br>
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
            <br>
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
                        <th style="text-align:center;"><input class="text-center" type="checkbox" name="excelant_1"
                                value="1" {{ $customerSatisfaction->excelant_1 == '1' ? 'checked' : '' }}
                                <?php if ($customerSatisfaction->excelant_1 == '1') {
                                    echo 'checked="checked"';
                                } ?> style="width: 40px; height: 40px;"></th>
                        <th style="text-align:center;"><input class="text-center" type="checkbox" name="abverage_1"
                                value="1" {{ $customerSatisfaction->abverage_1 == '1' ? 'checked' : '' }}
                                <?php if ($customerSatisfaction->abverage_1 == '1') {
                                    echo 'checked="checked"';
                                } ?> style="width: 40px; height: 40px;"></th>
                        <th style="text-align:center;"><input class="text-center" type="checkbox" name="fair_1"
                                value="1" {{ $customerSatisfaction->fair_1 == '1' ? 'checked' : '' }}
                                <?php if ($customerSatisfaction->fair_1 == '1') {
                                    echo 'checked="checked"';
                                } ?> style="width: 40px; height: 40px;">
                        </th>

                    </tr>
                    <tr>
                        <th>2</th>
                        <th style="text-align:center;">مدي الإستجابة في تحقيق المتطلبات</th>
                        <th style="text-align:center;"><input class="text-center" type="checkbox" name="excelant_2"
                                value="1" {{ $customerSatisfaction->excelant_2 == '1' ? 'checked' : '' }}
                                <?php if ($customerSatisfaction->excelant_2 == '1') {
                                    echo 'checked="checked"';
                                } ?> style="width: 40px; height: 40px;"></th>
                        <th style="text-align:center;"><input class="text-center" type="checkbox" name="abverage_2"
                                value="1" {{ $customerSatisfaction->abverage_2 == '1' ? 'checked' : '' }}
                                <?php if ($customerSatisfaction->abverage_2 == '1') {
                                    echo 'checked="checked"';
                                } ?> style="width: 40px; height: 40px;"></th>
                        <th style="text-align:center;"><input class="text-center" type="checkbox" name="fair_2"
                                value="1" {{ $customerSatisfaction->fair_2 == '1' ? 'checked' : '' }}
                                <?php if ($customerSatisfaction->fair_2 == '1') {
                                    echo 'checked="checked"';
                                } ?> style="width: 40px; height: 40px;">
                        </th>


                    </tr>
                    <tr>
                        <th>3</th>
                        <th style="text-align:center;">توقيتات توفير المنتجات</th>
                        <th style="text-align:center;"><input class="text-center" type="checkbox" name="excelant_3"
                                value="1" {{ $customerSatisfaction->excelant_3 == '1' ? 'checked' : '' }}
                                <?php if ($customerSatisfaction->excelant_3 == '1') {
                                    echo 'checked="checked"';
                                } ?> style="width: 40px; height: 40px;"></th>
                        <th style="text-align:center;"><input class="text-center" type="checkbox" name="abverage_3"
                                value="1" {{ $customerSatisfaction->abverage_3 == '1' ? 'checked' : '' }}
                                <?php if ($customerSatisfaction->abverage_3 == '1') {
                                    echo 'checked="checked"';
                                } ?> style="width: 40px; height: 40px;"></th>
                        <th style="text-align:center;"><input class="text-center" type="checkbox" name="fair_3"
                                value="1" {{ $customerSatisfaction->fair_3 == '1' ? 'checked' : '' }}
                                <?php if ($customerSatisfaction->fair_3 == '1') {
                                    echo 'checked="checked"';
                                } ?> style="width: 40px; height: 40px;">
                        </th>

                    </tr>
                    <tr>
                        <th>4</th>
                        <th style="text-align:center;">طريقة موظفي الشركة</th>
                        <th style="text-align:center;"><input class="text-center" type="checkbox" name="excelant_4"
                                value="1" {{ $customerSatisfaction->excelant_4 == '1' ? 'checked' : '' }}
                                <?php if ($customerSatisfaction->excelant_4 == '1') {
                                    echo 'checked="checked"';
                                } ?> style="width: 40px; height: 40px;"></th>
                        <th style="text-align:center;"><input class="text-center" type="checkbox" name="abverage_4"
                                value="1" {{ $customerSatisfaction->abverage_4 == '1' ? 'checked' : '' }}
                                <?php if ($customerSatisfaction->abverage_4 == '1') {
                                    echo 'checked="checked"';
                                } ?> style="width: 40px; height: 40px;"></th>
                        <th style="text-align:center;"><input class="text-center" type="checkbox" name="fair_4"
                                value="1" {{ $customerSatisfaction->fair_4 == '1' ? 'checked' : '' }}
                                <?php if ($customerSatisfaction->fair_4 == '1') {
                                    echo 'checked="checked"';
                                } ?> style="width: 40px; height: 40px;">
                        </th>

                    </tr>
                    <tr>
                        <th>5</th>
                        <th style="text-align:center;">تكلفة تقديم الخدمة</th>
                        <th style="text-align:center;"><input class="text-center" type="checkbox" name="excelant_5"
                                value="1" {{ $customerSatisfaction->excelant_5 == '1' ? 'checked' : '' }}
                                <?php if ($customerSatisfaction->excelant_5 == '1') {
                                    echo 'checked="checked"';
                                } ?> style="width: 40px; height: 40px;"></th>
                        <th style="text-align:center;"><input class="text-center" type="checkbox" name="abverage_5"
                                value="1" {{ $customerSatisfaction->abverage_5 == '1' ? 'checked' : '' }}
                                <?php if ($customerSatisfaction->abverage_5 == '1') {
                                    echo 'checked="checked"';
                                } ?> style="width: 40px; height: 40px;"></th>
                        <th style="text-align:center;"><input class="text-center" type="checkbox" name="fair_5"
                                value="1" {{ $customerSatisfaction->fair_5 == '1' ? 'checked' : '' }}
                                <?php if ($customerSatisfaction->fair_5 == '1') {
                                    echo 'checked="checked"';
                                } ?> style="width: 40px; height: 40px;">
                        </th>
                    </tr>

                </table>
            </div>
            <br><br><br><br><br><br><br><br>
            <div class="form-group row ">
                <h1 for="" class="col-2 col-form-label">ملاحظات اخري :</h1>
                <div class="col-9">
                    <textarea class="form-control" name="nodes">{{ $customerSatisfaction->nodes }}</textarea>
                </div>
            </div>

            <div class="form-group row ">
                <div class="col-9">
                    <label for="" class="col-2 col-form-label">الأسم :</label>
                    {{ $customerSatisfaction->name }}
                </div>
                <div class="col-9">
                    <label for="" class="col-2 col-form-label">التاريخ :</label>
                    {{ $customerSatisfaction->date_1 }}
                </div>
                <div class="col-9">
                    <label for="" class="col-2 col-form-label">رقم الهاتف :</label>
                    {{ $customerSatisfaction->phone }}
                </div>
            </div>
            <br>
            <hr class="w-100">

            <table class="table">
                <thead>
                    <tr>
                        <th>
                            <div class="" style="text-align:start ;">
                                {{ $customerSatisfaction->company_name }}
                            </div>

                        </th>
                        <th>
                            <div class="" style="text-align:start ;">
                                {{ $customerSatisfaction->date2 }}
                            </div>

                        </th>
                        <th>
                            <div class="" style="text-align:start ;">
                                {{ $customerSatisfaction->date3 }}
                            </div>

                        </th>
                        <th>
                            <div class="" style="text-align:start ;">
                                <label for="" class=""
                                    style="text-align: center;font-size:large;font-weight: bolder;"> مدة الحفظ :
                                    سنتان </label>
                            </div>

                        </th>
                        <th>
                            <div class="" style="text-align:start ;">
                                <label for="" class=""
                                    style="text-align: center;font-size:large;font-weight: bolder;"> رقم الصفحة : 1 /
                                    1</label>
                            </div>
                        </th>
                        <th>
                            <div class="" style="text-align:start ;">
                                <label for="" class=""
                                    style="text-align: center;font-size:large;font-weight: bolder;"> رقم الوثيقة : QA – F
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
                float: left;
                display: inline-table;
            }
        </style>
    @stop
