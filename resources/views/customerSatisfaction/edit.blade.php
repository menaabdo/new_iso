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
    @media only screen and (max-width: 400px) {
     .col-md-10{
       width:60% !important;
       margin: 0 !important;
    }
    }

</style>

<div class="card">
    <div class="card-body row" style='margin:auto;margin-top:80px'>


      
        <form action="{{ route('customerSatisfactions.update', $customerSatisfaction->id) }}" class='col-md-10' style='margin:auto' method="post"
            enctype="multipart/form-data" id="fo1">
            @method('PUT')
            {{ csrf_field() }}
            <div style="" class="w-100 text-center my-4">
                <h2 style='text-shadow: 1px 1px 1px #3ed3ea;'>متابعة شكوى عميل</h2>
                <hr class="w-100">
            </div>
            <div class='row mt-4 mb-3'>
                <label class="form-label col-md-3 ">CO LOGO</label>
               <input type="file" id="img" name="logo" accept="image/*">
               <img src="{{ asset($customerSatisfaction->logo) }}" height=180px width=210px; />
             
            </div>
            <br><br>
            <div class="col-12">
                <h4 class='bold'> عزيزنا عميلنا الكريم</h4>
                <p>
                    <h5>
                        نتشرف بأن نعرض على سيادتكم هذا النموذج الخاص بقياس مدى رضاءكم على مستوى المنتجات\ الخدمات التي نفخر
                        بتقديمها لسيادتكم.
                    </h5>
                </p>
                <p>
                    <h5>
                        أملين أن يساعدنا هذا النموذج على تطوير وتحسين مستوى المنتاجات المقدمة منا لسيادتكم.
                    </h5>
                </p>
            </div>


            <hr class="w-100">
            <label>
                <h4>** برجاء وضع تعليقاتكم في الجدول بالأسفل :</h4>
            </label>

            <div class="form-group row w-100 text-right" style="text-align:center;">

                <table class="table">
                    <tr style="background-color:    #001635; color:white;text-align:center;">
                        <th scope="col" rowspan="2">م</th>
                        <th scope="col" rowspan="2">معايير القياس</th>
                        <th scope="col" colspan="3">درجة المعايير</th>>
                    </tr>
                    <tr style="background-color:    #001635; color:white;text-align:center;">
                         <th scope="col"> ممتاز </th>
                        <th scope="col">ملائم </th>
                        <th scope="col"> غير مرضي</th>
                    </tr>
                    <tr>
                        <th>1</th>
                        <th style="text-align:center;">جودة المنتجات\ الخدمات</th>
                        <th style="text-align:center;"><input class="text-center" type="checkbox" name="excelant_1"
                                value="1" {{ $customerSatisfaction->excelant_1 == '1' ? 'checked' : '' }}
                                style="width: 40px; height: 40px;"></th>
                        <th style="text-align:center;"><input class="text-center" type="checkbox" name="abverage_1"
                                value="1" {{ $customerSatisfaction->abverage_1 == '1' ? 'checked' : '' }}
                                style="width: 40px; height: 40px;"></th>
                        <th style="text-align:center;"><input class="text-center" type="checkbox" name="fair_1" value="1"
                                {{ $customerSatisfaction->fair_1 == '1' ? 'checked' : '' }} style="width: 40px; height: 40px;">
                        </th>

                    </tr>
                    <tr>
                        <th>2</th>
                        <th style="text-align:center;">مدي الإستجابة في تحقيق المتطلبات</th>
                        <th style="text-align:center;"><input class="text-center" type="checkbox" name="excelant_2"
                                value="1" {{ $customerSatisfaction->excelant_2 == '1' ? 'checked' : '' }}
                                style="width: 40px; height: 40px;"></th>
                        <th style="text-align:center;"><input class="text-center" type="checkbox" name="abverage_2"
                                value="1" {{ $customerSatisfaction->abverage_2 == '1' ? 'checked' : '' }}
                                style="width: 40px; height: 40px;"></th>
                        <th style="text-align:center;"><input class="text-center" type="checkbox" name="fair_2" value="1"
                                {{ $customerSatisfaction->fair_2 == '1' ? 'checked' : '' }} style="width: 40px; height: 40px;">
                        </th>

                    </tr>
                    <tr>
                        <th>3</th>
                        <th style="text-align:center;">توقيتات توفير المنتجات</th>
                        <th style="text-align:center;"><input class="text-center" type="checkbox" name="excelant_3"
                                value="1" {{ $customerSatisfaction->excelant_3 == '1' ? 'checked' : '' }}
                                style="width: 40px; height: 40px;"></th>
                        <th style="text-align:center;"><input class="text-center" type="checkbox" name="abverage_3"
                                value="1" {{ $customerSatisfaction->abverage_3 == '1' ? 'checked' : '' }}
                                style="width: 40px; height: 40px;"></th>
                        <th style="text-align:center;"><input class="text-center" type="checkbox" name="fair_3" value="1"
                                {{ $customerSatisfaction->fair_3 == '1' ? 'checked' : '' }}
                                style="width: 40px; height: 40px;"></th>

                    </tr>
                    <tr>
                        <th>4</th>
                        <th style="text-align:center;">طريقة موظفي الشركة</th>
                        <th style="text-align:center;"><input class="text-center" type="checkbox" name="excelant_4"
                                value="1" {{ $customerSatisfaction->excelant_4 == '1' ? 'checked' : '' }}
                                style="width: 40px; height: 40px;"></th>
                        <th style="text-align:center;"><input class="text-center" type="checkbox" name="abverage_4"
                                value="1" {{ $customerSatisfaction->abverage_4 == '1' ? 'checked' : '' }}
                                style="width: 40px; height: 40px;"></th>
                        <th style="text-align:center;"><input class="text-center" type="checkbox" name="fair_4" value="1"
                                {{ $customerSatisfaction->fair_4 == '1' ? 'checked' : '' }}
                                style="width: 40px; height: 40px;"></th>

                    </tr>
                    <tr>
                        <th>5</th>
                        <th style="text-align:center;">تكلفة تقديم الخدمة</th>
                        <th style="text-align:center;"><input class="text-center" type="checkbox" name="excelant_5"
                                value="1" {{ $customerSatisfaction->excelant_5 == '1' ? 'checked' : '' }}
                                style="width: 40px; height: 40px;"></th>
                        <th style="text-align:center;"><input class="text-center" type="checkbox" name="abverage_5"
                                value="1" {{ $customerSatisfaction->abverage_5 == '1' ? 'checked' : '' }}
                                style="width: 40px; height: 40px;"></th>
                        <th style="text-align:center;"><input class="text-center" type="checkbox" name="fair_5" value="1"
                                {{ $customerSatisfaction->fair_5 == '1' ? 'checked' : '' }}
                                style="width: 40px; height: 40px;"></th>
                    </tr>

                </table>
            </div>
            <hr class="w-100">
            <div class="form-group row ">
                <h1 for="" class="col-2 col-form-label">ملاحظات اخري :</h1>
                <div class="col-9">
                    <textarea class="form-control" name="nodes">{{ $customerSatisfaction->nodes }}</textarea>
                </div>
            </div>
            <hr class="w-100">
            <div class="form-group row ">
                <label for="" class="col-2 col-form-label mb-3">الأسم :</label>
                <div class="col-9 mb-3">
                    <input type="text" class="form-control" name="name" value="{{ $customerSatisfaction->name }}">
                </div>
                <label for="" class="col-2 col-form-label mb-3">التاريخ :</label>
                <div class="col-9 mb-3">
                    <input type="date" class="form-control" name="date_1" value="{{ $customerSatisfaction->date_1 }}">
                </div>
                <label for="" class="col-2 col-form-label ">رقم الهاتف :</label>
                <div class="col-9">
                    <input type="text" class="form-control" name="phone" value="{{ $customerSatisfaction->phone }}">
                </div>
            </div>
            <hr class="w-100">
            <div class="form-group row w-100 text-right" style="text-align:center;overflow:auto">

            <table class="table">
                <thead>
                    <tr>
                        <th>
                            <div class="" style="text-align:start ;">
                            <label>اسم الشركة</label>
                                <input class="form-control" type="text" name="company_name" 
                                    value="{{ $customerSatisfaction->company_name }}">
                            </div>

                        </th>
                        <th>
                            <div class="" style="text-align:start ;">
                            <label>تاريخ التعديل</label>
                             
                                <input class="form-control" type="text" name="date2"
                                    value="{{ $customerSatisfaction->date2 }}" 
                                    onfocus="(this.type='date')" onblur="(this.type='text')">
                            </div>

                        </th>
                        <th>
                            <div class="" style="text-align:start ;">
                            <label>تاريخ الاصدار</label>
                             
                                <input class="form-control" type="text" name="date3"
                                    value="{{ $customerSatisfaction->date3 }}" 
                                    onfocus="(this.type='date')" onblur="(this.type='text')">
                            </div>

                        </th>
                        <th>
                            <div class="" style="text-align:start ;">
                                <label> مدة الحفظ </label>
                                <input class="form-control shadow-lg" type="text" name="period_time" value="{{ $customerSatisfaction->period_time }}">
                            </div>

                        </th>
                        <th>
                            <div class="" style="text-align:start ;">
                                <label> رقم الصفحة </label>
                                <input class="form-control shadow-lg" type="text" name="number_page" value="{{ $customerSatisfaction->number_page }}">
                            </div>

                        </th>
                        <th>
                            <div class="" style="text-align:start ;">
                                <label> رقم الوثيقة </label>
                                <input class="form-control shadow-lg" type="text" name="number_doc" value="{{ $customerSatisfaction->number_doc }}">
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
            float: left;
            display: inline-table;
        }

    </style>
@stop
