
@extends('layouts.print')

@section('content')
<style>
    input{
    box-shadow: 0 1rem 3rem rgba(0,0,0,.175)!important;
}
.form-control {
    display: block;
    width: 100%;
    padding: 0.375rem 0.75rem;
    font-size: .875rem;
    line-height: 1.5;
    color: #4F5467;
    background-color: #fff;
    border: 1px solid #e9ecef;
    border-radius: 2px;
    transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;
}
/* .mytable th,.mytable tr,.mytable td{
    border:1px solid silver;
} */
    </style>

    <!-- Content Header (Page header) -->


    <!-- Main content -->
    <div class="card" >


<div class="container p-4" style='text-align:center;border:1px solid silver; box-shadow: 0 1rem 3rem rgba(0, 0, 0, .175) !important;'>
           <div style="" class="w-100 text-center my-4">
   <h3 style="margin-top:85px;">
   <img src="{{ asset($iso->company_logo) }}"  style="border-radius: 6px;
    border: 2px solid #001635;
    margin: 10px;
    float: left;
    /* padding: 12px;" width="50px" height="50px" />
   <span style='font-family:Cursive;border-bottom: 1px solid silver;
    ; box-shadow: 0 1rem 3rem rgba(0, 0, 0, .175) !important;
    border-radius: 6px;
    padding: 10px;text-shadow: 1px 1px 1px #3ed3ea;padding-left: 40px;
    padding-right: 40px;
'>اجراء عمل الشكاوي وقياس رضا العميل
</span>
</h3>
        <hr>
      
            <input type="hidden" name="type" value="1">
            <table style="width: 850px;" class="mytable table table-bordered my-4   m-auto">
                <thead>
                    <tr>
                        <th></th>
                        <th class=" w-50 text-center col-3 ">
                            <div class="" style="text-align:center ;">
                                <label for="" class="" style="text-align: center;">اسم الاداره</label>

                                <input class="form-control" type="text" name="manage_name"
                                    value="{{ $iso->manage_name }}" style="text-align: start;"
                                    placeholder="ادخل اسم الاداره">
                            </div>

                        </th>
                        </tr>
                        <tr>
                            <th></th>
                        <th class="col-3 ">
                            <div style="display: flex;justify-content: center;align-items: center;height: 50px;">
                                خطوات العمل القياسيه
                            </div>

                        </th>
                        <th>
                          </th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th class=" w-50 text-center ">
                            <div class="" style="text-align:center ;">
                                <label for="" class="" style="text-align: center;">تاريخ التفعيل</label>
                                <input class="form-control" type="date" name="active_date"
                                    value="{{ $iso->active_date }}" style="text-align: end;">
                            </div>
                        </th>

                        <th class=" w-50 text-center ">
                            <div class="" style="text-align:center ;">
                                <label for="" class="" style="text-align: center;">تاريخ الاصدار</label>
                                <input class="form-control" type="date" name="release_date"
                                    value="{{ $iso->release_date }}" style="text-align: end;">
                            </div>
                        </th>

                        <th class=" w-50 text-center ">
                            <div class="" style="text-align:center ;">
                                <label for="" class="" style="text-align: center;">رقم الوثيقه</label>
                                <input class="form-control" type="text" name="document_number"
                                    value="{{ $iso->document_number }}" style="text-align: start;"
                                    placeholder="ادخل رقم الوثيقه ">
                            </div>
                        </th>

                    </tr>
                    <tr>
                        <th class=" w-50 text-center ">
                            <div class="" style="text-align:center ;">
                                <label for="" class="" style="text-align: center;">عدد الصفحات</label>
                                <input class="form-control" type="number" name="page_number"
                                    value="{{ $iso->page_number }}" style="text-align: start;"
                                    placeholder="ادخل عدد الصفحات ">
                            </div>
                        </th>

                        <th class=" w-50 text-center ">
                            <div class="" style="text-align:center ;">
                                <label for="" class="" style="text-align: center;">تاريخ المراجعه</label>
                                <input class="form-control" type="date" name="review_date"
                                    value="{{ $iso->review_date }}" style="text-align: end;">
                            </div>
                        </th>
                        <th class=" w-50 text-center ">
                            <div class="" style="text-align:center ;">
                                <label for="" class="" style="text-align: center;">كود الوثيقه</label>
                                <input class="form-control" type="text" name="document_code"
                                    value="{{ $iso->document_code }}" style="text-align: start;"
                                    placeholder="ادخل كود الوثيقه ">
                            </div>
                        </th>


                    </tr>

                </tbody>
            </table>
            <hr style="border: 5px; margin: 50px ;">

            <section style="width: 650px;margin-top: 20px;margin:auto" class=" my-4  p-4 m-auto">
                <div class="form-group row ">
                    <label for="" class="col-sm-2 col-form-label">اسم الشركه</label>
                    <div class="col-sm-10">
                        <input type="text" name="company_name" value="{{ $iso->company_name }}"
                            class="form-control">
                    </div>
                </div>
                <div class="form-group row ">
                    <label for="inputPassword" class="col-sm-2 col-form-label">اسم الاجراء</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="procedure_name"
                            value="{{ $iso->procedure_name }}" id="inputPassword">
                    </div>
                </div>
            </section>
            <hr style="border: 5px; margin: 50px ;">

            <section style="width: 650px;margin-top: 20px;margin:auto;" class=" my-4  p-4 m-auto">
                <div class="form-group row ">
                    <label for="" class="col-sm-2 col-form-label">رقم النسخه</label>
                    <div class="col-sm-10">
                        <input type="text" name="version_number" value="{{ $iso->version_number }}"
                            class="form-control">
                    </div>
                </div>
                <div class="form-group row ">
                    <label for="inputPassword" class="col-sm-2 col-form-label">حائز النسخه</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="copy_holder" value="{{ $iso->copy_holder }}"
                            id="inputPassword">
                    </div>
                </div>
            </section>
            <hr style="border: 5px; margin: 50px ;">
            <table style="width: 550px;" class="table table-bordered my-4   m-auto">
                <thead>
                    <tr>
                        @if (Auth::user()->hasRole('Employee'))
                            <th class=" w-50 text-center col-2 ">
                                <div class="" style="text-align:start ;">
                                    <label for="" class=""
                                        style="text-align: center;font-size:xx-large;font-weight: bolder;">
                                        اعداد :</label>

                                    <input class="form-control" type="text" name="prepare"
                                        value="{{ $iso->prepare }}" style="text-align: end;" placeholder="">
                                </div>

                            </th>
                            @if ($iso->status == 'inProgress' && Auth::user()->hasRole('Employee'))
                                <th class=" w-50 text-center col-2 ">
                                    <div class="" style="text-align:start ;">
                                        <label for="" class=""
                                            style="text-align: star;font-size:xx-large;font-weight: bolder;">
                                            مراجعه :</label>

                                        <input class="form-control" type="text" name="review"
                                            value="{{ $iso->review }}" placeholder="" readonly>
                                    </div>

                                </th>
                            @endif
                            @if ($iso->status == 'confirmed' && Auth::user()->hasRole('Employee'))
                                <th class=" w-50 text-center col-2 ">
                                    <div class="" style="text-align:start ;">
                                        <label for="" class=""
                                            style="text-align: star;font-size:xx-large;font-weight: bolder;">
                                            مراجعه :</label>

                                        <input class="form-control" type="text" name="review"
                                            value="{{ $iso->review }}" placeholder="" readonly>
                                    </div>

                                </th>
                                <th class=" w-50 text-center col-4 ">
                                    <div class="" style="text-align:start ;">
                                        <label for="" class=""
                                            style="text-align: end;font-size:xx-large;font-weight: bolder;">
                                            اعتماد : </label>

                                        <input class="form-control" type="text" name="approval"
                                            value="{{ $iso->approval }}" style="text-align: end;width: 120px;" readonly>
                                    </div>

                                </th>
                            @endif
                        @endif
                        @if (Auth::user()->hasRole('Admin'))
                            <th class=" w-50 text-center col-2 ">
                                <div class="" style="text-align:start ;">
                                    <label for="" class=""
                                        style="text-align: center;font-size:xx-large;font-weight: bolder;">
                                        اعداد :</label>

                                    <input class="form-control" type="text" name="prepare"
                                        value="{{ $iso->prepare }}" style="text-align: end;" placeholder="">
                                </div>

                            </th>
                            <th class=" w-50 text-center col-2 ">
                                <div class="" style="text-align:start ;">
                                    <label for="" class=""
                                        style="text-align: star;font-size:xx-large;font-weight: bolder;">
                                        مراجعه :</label>

                                    <input class="form-control" type="text" name="review"
                                        value="{{ $iso->review }}" placeholder="">
                                </div>

                            </th>

                            @if ($iso->status == 'confirmed' && Auth::user()->hasRole('Admin'))
                                <th class=" w-50 text-center col-2 ">
                                    <div class="" style="text-align:start ;">
                                        <label for="" class=""
                                            style="text-align: end;font-size:xx-large;font-weight: bolder;">
                                            اعتماد : </label>

                                        <input class="form-control" type="text" name="approval"
                                            value="{{ $iso->approval }}" style="text-align: end;width: 120px;" readonly>
                                    </div>

                                </th>
                            @endif
                        @endif
                        @if (Auth::user()->hasRole('SuperAdmin'))
                            <th class=" w-50 text-center col-2 ">
                                <div class="" style="text-align:start ;">
                                    <label for="" class=""
                                        style="text-align: center;;">
                                        اعداد :</label>

                                    <input class="form-control" type="text" name="prepare"
                                        value="{{ $iso->prepare }}" style="text-align: end;" placeholder="">
                                </div>

                            </th>
                            <th class=" w-50 text-center col-2 ">
                                <div class="" style="text-align:start ;">
                                    <label for="" class=""
                                        style="text-align: star;;">
                                        مراجعه :</label>

                                    <input class="form-control" type="text" name="review"
                                        value="{{ $iso->review }}" placeholder="">
                                </div>

                            </th>
                            <th class=" w-50 text-center col-2 ">
                                <div class="" style="text-align:start ;">
                                    <label for="" class=""
                                        style="text-align: end;;">
                                        اعتماد : </label>

                                    <input class="form-control" type="text" name="approval"
                                        value="{{ $iso->approval }}" style="text-align: end;width: 120px;">
                                </div>

                            </th>
                        @endif
                    </tr>
                </thead>

            </table>

            <hr style="border: 5px; margin: 50px ;">
            <table style="width: 550px;justify-content: center;align-items: center;"
                class="table table-bordered my-4   m-auto">
                <thead>
                    <tr>
                        <th class=" w-50 text-center col-4 ">
                            <div class="" style="text-align:center ;">
                                <label for="" class=""
                                    style="text-align: end;font-size:large;font-weight: bolder;"> رقم
                                    التعديل </label>

                            </div>

                        </th>
                        <th class=" w-100 text-center col-4 ">
                            <div class="" style="text-align:center ;">
                                <label for="" class="" style="text-align: star;">1</label>


                            </div>

                        </th>
                        <th class=" w-100 text-center col-4 ">
                            <div class="" style="text-align:center ;">
                                <label for="" class="" style="text-align: center;">2 </label>

                            </div>

                        </th>
                        <th class=" w-100 text-center col-4 ">
                            <div class="" style="text-align:center ;">
                                <label for="" class="" style="text-align: center;">3 </label>

                            </div>
                        </th>
                        <th class=" w-100 text-center col-4 ">
                            <div class="" style="text-align:center ;">
                                <label for="" class="" style="text-align: center;">4 </label>
                            </div>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr>

                        <th class=" w-50 text-center ">
                            <div class="" style="text-align:center ;">
                                <label for="" class=""
                                    style="text-align: center;font-size:large;font-weight: bolder;">التاريخ</label>

                            </div>
                        </th>
                        <th class=" w-50 text-center ">
                            <div class="" style="text-align:center ;">
                                <input class="form-control" type="date" name="date_1" value="{{ $iso->date_1 }}"
                                    style="text-align: end;">
                            </div>
                        </th>
                        <th class=" w-50 text-center ">
                            <div class="" style="text-align:center ;">
                                <input class="form-control" type="date" name="date_2" value="{{ $iso->date_2 }}"
                                    style="text-align: end;width: 120px;">
                            </div>
                        </th>
                        <th class=" w-50 text-center ">
                            <div class="" style="text-align:center ;">
                                <input class="form-control" type="date" name="date_3" value="{{ $iso->date_3 }}"
                                    style="text-align: end;width: 120px;">
                            </div>
                        </th>
                        <th class=" w-50 text-center ">
                            <div class="" style="text-align:center ;">
                                <input class="form-control" type="date" name="date_4"
                                    value="{{ $iso->date_4 }}"style="text-align: end;">
                            </div>
                        </th>
                    </tr>
                    <tr>
                        <th class=" w-100 text-center ">
                            <div class="form-group mt-4"
                                style="text-align:center ;justify-content: center;align-items: center; width: 140px;">
                                <label for="" class=""
                                    style="text-align: center;font-size:large;font-weight: bolder;">صفحه
                                    / صفحات</label>

                            </div>
                        </th>
                        <th class=" w-50 text-center ">
                            <div class="form-group mt-4"
                                style="text-align:center ;justify-content: center;align-items: center;">
                                <input class="form-control" type="text" name="page_1" value="{{ $iso->page_1 }}"
                                    style="text-align: end;">
                            </div>
                        </th>
                        <th class=" w-50 text-center ">
                            <div class="form-group mt-4"
                                style="text-align:center ;justify-content: center;align-items: center;">
                                <input class="form-control" type="text" name="page_2" value="{{ $iso->page_2 }}"
                                    style="text-align: end;width: 120px;" placeholder=" ">
                            </div>
                        </th>
                        <th class=" w-50 text-center ">
                            <div class="form-group w-100 mt-4"
                                style="text-align:center ;justify-content: center;align-items: center;">
                                <input class="form-control" type="text" name="page_3" value="{{ $iso->page_3 }}"
                                    style="text-align: end;">
                            </div>
                        </th>
                        <th class=" w-50 text-center ">
                            <div class="form-group w-100 mt-4"
                                style="text-align:center ;justify-content: center;align-items: center;">
                                <input class="form-control" type="text" name="page_4" value="{{ $iso->page_4 }}"
                                    style="text-align: end;">
                            </div>
                        </th>
                    </tr>
                </tbody>
            </table>
            <hr style="border: 5px; margin: 50px ;">
            <section class="row" style="margin-right: 100px;">
                <h2>الرسم التوضيحي للاجراء :</h2>
                <div class="input-group my-3  mx-3">
                    <img src="{{ asset($iso->image_illustration) }}" />  
                </div>



            </section>
          
            <section>
                <div class="row" style="margin: 100px;text-align: start;">
                    <p>نموذج تسلسل الاجراء هو عرض بياني لخريطة عمليات لبيانات مجموعة الاجراءات الخاصة بكل ادراة من الاقسام
                        والعمليات المرتبطة بها لكل مجموعة اجراءات اهداف وسياسات خاصة بها كما انها مزودة بكيفية سير العمل
                        وباجراءات مفصلة لذلك.</p>
                    <h3>المصطلحات والرسوم التوضيحيه</h3>
                    <table class="table table-bordered my-4">
                        <thead>
                            <tr>
                                <th scope="col" style="font-size:large">الرسم </th>
                                <th scope="col" style="font-size:large">المصطلح</th>
                                <th scope="col" style="font-size:large">الشرح</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <div style="width: 150px; height: 80px;border: 2px solid grey;">
                                        <div style="width: 20px; height: 80px;border: 2px solid grey;">
                                            <img src="{{ asset('image/Screenshot 2022-09-20 220318.png') }}" style="width: 160px; height: 80px;">
                                        </div>
                                    </div>
                                </td>
                                <td>مجال العمل</td>
                                <td>يبين هذا الشكل مجال العمل الذى تقوم به الادراة </td>
                            </tr>
                            <tr>
                                <td>
                                    <div style="width: 120px; height: 40px;border: 2px solid grey;border-radius: 25px;">
                                        <img src="{{ asset('image/Screenshot 2022-09-20 220354.png') }}" style="width: 140px; height: 40px;">
                                    </div>
                                </td>
                                <td>البدايه</td>
                                <td>يبين هذا الشكل بداية الاجراء </td>
                            </tr>
                            <tr>
                                <td>
                                    <div style="width: 150px; height: 90px;border: 2px solid grey;background-color: gray;">
                                        <img src="{{ asset('image/Screenshot 2022-09-20 220423.png') }}" style="width: 160px; height: 90px;">
                                    </div>
                                </td>
                                <td>عمليه</td>
                                <td>يبين هذا الشكل عملية ضمن الاجراء </td>
                            </tr>
                            <tr>
                                <td>Larry the Bird</td>
                                <td>وثائق</td>
                                <td>يبين هذا الاجراء شكل الوثائق </td>
                            </tr>
                            <tr>
                                <td>Larry the Bird</td>
                                <td>عملية فرعية </td>
                                <td>يبين هذا الاجراء شكل العملية الفرعية التابعة لعملية رئيسة </td>
                            </tr>
                            <tr>
                                <td>Larry the Bird</td>
                                <td>معلومات</td>
                                <td>يبين هذا الاجراء شكل معلومات اضافية </td>
                            </tr>
                            <tr>
                                <td>Larry the Bird</td>
                                <td>رابط</td>
                                <td>يبين تسلسل المهام المبينة فى الاجراء </td>
                            </tr>
                            <tr>
                                <td>Larry the Bird</td>
                                <td>نهايه</td>
                                <td> </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </section>
            <section class="row" style="margin: 50px;">
                <div class="input-group my-3  mx-3">
                    <label class="row"> الغرض من الاجراء :</label>
                </div>
                {!! html_entity_decode( $iso->purpose) ?? null !!}
               

            </section>
            <section class="row" style="margin: 50px;">
                <div class="input-group my-3  mx-3">
                    <label class="row"> المقدمه :</label>
                </div>
                {!! html_entity_decode( $iso->introduction) ?? null !!}
              
            </section>
            <section class="row" style="margin: 50px;">
                <div class="input-group my-3  mx-3">
                    <label class="row"> نطاق التطبيق :</label>
                </div>
                {!! html_entity_decode( $iso->scope_of_application) ?? null !!}
              
            </section>
            <section class="row" style="margin: 50px;">
                <div class="input-group my-3  mx-3">
                    <label class="row"> المصطلحات والتعريفات :</label>
                </div>
                <table class="datatable-table table table-bordered mt-2 table table-bordered my-4   m-auto">
                    <thead class="datatable-head">
                        <tr class="datatable-row" style="left: 0px;">

                            <th data-field="" class="datatable-cell"><span>المصطلح:</span></th>
                            <th data-field="" class="datatable-cell"><span>التعريف:</span></th>
                        </tr>
                    </thead>
                    <tbody class="datatable-body">
                        @foreach ($iso->definition as $key => $def)
                            <tr class="datatable-row datatable-row-even" id="price-{{ $key }}">
                                <td class="datatable-cell  ">
                                    <div class="a-col alternate">
                                        <div class="input-field">
                                            <input type="text" class="form-control"
                                                name="names[{{ $key }}][term]" value="{{ $def->term }}" />
                                        </div>
                                    </div>
                                </td>

                                <td class="datatable-cell  ">
                                    <div class="a-col alternate">
                                        <div class="input-field">
                                            <input type="text" class="form-control"
                                                name="names[{{ $key }}][definition]"
                                                value="{{ $def->definition }}" />
                                        </div>
                                    </div>
                                </td>

                            </tr>
                        @endforeach
   
                    </tbody>
                </table>
                <!-- <textarea class=form-control name="" id="" cols="55" rows="5"
                    placeholder="ادخل   نطاق التطبيق ------------------------"></textarea> -->
            </section>
            <section class="row" style="margin: 50px;">
                <div class="input-group my-3  mx-3">
                    <label class="row"> المسؤليات :</label>
                </div>
                {!! html_entity_decode( $iso->responsibilities) ?? null !!}
           
            </section>
            <section class="row" style="margin: 50px;">
                <div class="input-group my-3  mx-3">
                    <label class="row"> خطوات العمل :</label>
                </div>
                {!! html_entity_decode( $iso->action_steps) ?? null !!}
            </section>

            <section class="row" style="margin: 50px;">
                <div class="input-group my-3  mx-3">
                    <label class="row"> النماذج المستخدمه :</label>
                </div>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th class="col-4" style="text-align: center;">اسم النموذج </th>
                            <th class="col-1" style="text-align: center;">رقم النموذج</th>
                            <th class="col-2" style="text-align: center;">تاريخ الاصدار</th>
                            <th class="col-2" style="text-align: center;">مده الحفظ</th>
                            <th class="col-2" style="text-align: center;">جهه الحفظ</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($iso->module as $key => $mod)
                            <tr id="models-{{ $key }}">
                                



                                <td>
                                    <input class="form-control" type="text"
                                        name="models[{{ $key }}][model_name]" value="{{ $mod->model_name }}"
                                        style="text-align: start;"
                                        placeholder="----------------------------------------------------">
                                </td>
                                <td>
                                    <input class="form-control" type="number"
                                        name="models[{{ $key }}][model_number]"
                                        value="{{ $mod->model_number }}" style="text-align: start;"
                                        placeholder="----------------------------------------------------">
                                </td>
                                <td>
                                    <input class="form-control" type="date"
                                        name="models[{{ $key }}][model_date]" value="{{ $mod->model_date }}"
                                        style="text-align: start;"
                                        placeholder="----------------------------------------------------">
                                </td>
                                <td>
                                    <input class="form-control" type="text" name="models[0][model_period]"
                                        value="{{ $mod->model_period }}" style="text-align: start;"
                                        placeholder="----------------------------------------------------">
                                </td>
                                <td>
                                    <input class="form-control" type="text" name="models[0][model_side]"
                                        value="{{ $mod->model_side }}" style="text-align: start;"
                                        placeholder="----------------------------------------------------">
                                </td>

                            </tr>
                        @endforeach
                       
                    </tbody>

                </table>

                <!-- <textarea class=form-control name="" id="" cols="55" rows="5"
                    placeholder="ادخل   نطاق التطبيق ------------------------"></textarea> -->
            </section>

            <section class="row" style="margin: 50px;">
                <div class="input-group my-3  mx-3">
                    <label class="row"> المصادر المرجعيه الخارجيه والداخليه :</label>
                </div>
                {!! html_entity_decode( $iso->reference_sources) ?? null !!}
            </section>

    </div>

    <!-- /.content -->
    <div class="modal fade account_model" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel">
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
 <script>
  window.addEventListener("load", window.print());
</script>
@stop
