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
            <img src="{{ asset($customerSatisfaction->logo) }}" style="border-radius: 6px;
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
            <div class="col-12">
                <h4> عزيزنا عميلنا الكريم</h4>
                <p>
                <h5>
                    نتشرف بأن نعرض على سيادتكم هذا النموذج الخاص بقياس مدى رضاءكم على مستوى المنتجات\ الخدمات التي نفخر
                    بتقديمها لسيادتكم.
                </h5>
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
                <h4>** برجاء وضع تعليقاتكم في الجدول بالأسفل :</h4>
            </label>

            <div class="form-group row w-100 text-right" style="text-align:center;">

                <table class="table" style='border:none'>
                    <tr  style='background-color: #2a415b;font-size:11px;
    color: white'>
      <th scope="col" rowspan="2">م</th>
                        <th scope="col" rowspan="2">معايير القياس</th>
                        <th scope="col" colspan="3">درجة المعايير</th>>
                    </tr>
                    <tr  style='background-color: #2a415b;font-size:11px;
    color: white'> <th scope="col"> ممتاز </th>
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
            <br><br>
            <div class="form-group row ">
                <h4 for="" class="col-2 col-form-label">ملاحظات اخري :</h4>
                <div class="col-9">
                <textarea type="text" class="form-control" style='vertical-align: middle;    width: 70%;' name="meeting_purpose" >
                {{ $customerSatisfaction->nodes }}
        </textarea>
                </div>
            </div>

            <div class="form-group row ">
                <div class="col-9" style='margin:12px'>
                    <label for="" class="col-2 col-form-label">الأسم :</label>
                    <input readonly style=' box-shadow: 0 1rem 3rem rgba(0, 0, 0, .175) !important;border:none;
    text-align: center;' value='{{ $customerSatisfaction->name }}'>
                </div>
                <div class="col-9" style='margin:12px'>
                    <label for="" class="col-2 col-form-label">التاريخ :</label>
                    <input readonly style=' box-shadow: 0 1rem 3rem rgba(0, 0, 0, .175) !important;border:none;
    text-align: center;' value='{{ $customerSatisfaction->date_1 }}'>
                </div>
                <div class="col-9">
                    <label for="" class="col-2 col-form-label">رقم الهاتف :</label>
                    <input readonly style=' box-shadow: 0 1rem 3rem rgba(0, 0, 0, .175) !important;border:none;
    text-align: center;' value=' {{ $customerSatisfaction->phone }}'>
                </div>
            </div>
            <br>
            <hr class="w-100">

            <table class="" style=' border:none;
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
                                {{ $customerSatisfaction->company_name }}
                            </div>

                        </th>
                        <th style='border:none'>
                            <div class="" style="text-align:start ;">
                                {{ $customerSatisfaction->date2 }}
                            </div>

                        </th>
                        <th style='border:none'>
                            <div class="" style="text-align:start ;">
                                {{ $customerSatisfaction->date3 }}
                            </div>

                        </th>
                        <th style='border:none'>
                            <div class="" style="text-align:start ;">
                                <label for="" class=""
                                    style="text-align: center;"> مدة الحفظ :
                                    سنتان </label>
                            </div>

                        </th>
                        <th style='border:none'>
                            <div class="" style="text-align:start ;">
                                <label for="" class=""
                                    style="text-align: center;"> رقم الصفحة : 1 /
                                    1</label>
                            </div>
                        </th>
                        <th style='border:none'>
                            <div class="" style="text-align:start ;">
                                <label for="" class=""
                                    style="text-align: center;"> رقم الوثيقة : QA – F
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
        <script>
  window.addEventListener("load", window.print());
</script>
    @stop
