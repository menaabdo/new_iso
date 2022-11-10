@extends('layouts.master')

@section('content')
<style>
    .shadow-lg {
        box-shadow: 0 1rem 3rem rgba(0, 0, 0, .175) !important;
    }

    h2 {

        padding: 2px;
        text-align: right;
    }

</style>
<!-- Content Header (Page header) -->
<div class='row card'>
    <div class='row card' style='margin:auto'>

        <form action="{{route('meetingMinute.store')}}" method="post" class='col-md-6 w-100' style='margin:auto;margin-top:80px' enctype="multipart/form-data" id="fo1">
            {{ csrf_field() }}

            <div class="container p-4">
                <div style="" class=" text-center">
                    <h1 style='text-shadow: 1px 1px 1px #3ed3ea;'>محضر إجتماع مراجعة الإدارة </h1>
                    <hr class="w-100">
                </div>
                <div class='shadow-lg p-3 col-md-12'>
                    <label class="col-md-2 text-left" style=''>رقم</label>
                    <input class="col-md-3 form-control  shadow-lg" type="text" name="num">

                </div>
                <div class='shadow-lg p-3'>
                    <label class="form-label pr-5">CO LOGO</label>
                    <div class=''>
                        <input type="file" id="img" class='shadow-lg' name="logo" accept="image/*">
                    </div>
                </div>
                <div class='shadow-lg p-3'>
                    <label for="" class="col-md-2 text-left" style='text-align:left !important'>التاريخ:</label>

                    <input type="date" class="col-md-4 form-control  shadow-lg" name="date_1">
                </div>
                <div class='shadow-lg p-3'>
                    <label for="" class="col-md-4 text-left"> مكان الإنعقاد:</label>

                    <input type="text" class="col-md-4 form-control  shadow-lg" name="place_meeting">
                </div>

                <div class=" form-group row mt-3 text-center">

                    <label for="" class="col-3  "> الحاضرون:</label>
                    <div class="col-5">
                        <h5>طبقاً للكشف المرفق</h5>
                    </div>
                    <label for="" class="col-md-4 col-form-label ">توقيت الإنعقاد:</label>
                    <div class="col-3">
                        <input type="text" class="form-control shadow-lg" name="time_meeting">
                    </div>
                </div>
                <div class=" form-group row w-200 text-center">
                    <label for="" class="col-md-4 col-form-label text-left"> الهدف من الإجتماع:</label>
                    <div class="col-10  rounded shadow-lg" style=''>
                        <div class="col-">
                            <label>مناقشة ومراجعة سياسات الشركة وأهداف الإدارات والتأكد من فاعلية تطبيق النظام والنظر فى تطويره بصورة دائمة. </label>
                        </div>
                    </div>
                </div>


                <div class="form-group row w-100 text-center ">
                    <h1 for="" class="col-md-9 col-form-label" style='text-shadow: 1px 1px 1px #3ed3ea;'> موضوعات الإجتماع:</h1>

                    <div class="form-group row w-100 text-right">
                        <h2 for="" class="col-md-9 col-form-label"> 1. نتائج مراجعات الإدارة السابقة وفاعلية تطبيق القرارات الخاصة بها.</h2>
                    </div>
                    <div class="form-group row w-100 text-center">
                        <h2 for="" class="col-md-9 col-form-label">2. أهداف الإدارة العليا (سياسات / خطط عمل / مشاريع تطوير).</h2>
                    </div>
                    <div class="form-group row w-100 text-center">
                        <h2 for="" class="col-md-9 col-form-label">3. نتائج المراجعات الداخلية على أنظمة الجودة المطبقة بالشركة.</h2>
                    </div>
                    <div class="form-group row w-100 text-center">
                        <h2 for="" class="col-md-9 col-form-label">4. نتائج المراجعات الخارجية على أنظمة الجودة المطبقة بالشركة ( إن وجدت ).</h2>
                    </div>
                    <div class="form-group row w-100 text-center">
                        <h2 for="" class="col-md-9 col-form-label">5. موقف حالات عدم المطابقة بالإدارات المختلفة.</h2>
                    </div>
                    <div class="form-group row w-100 text-center">
                        <h2 for="" class="col-md-9 col-form-label">6. موقف الإجراءات التصحيحية / الوقائية.</h2>
                    </div>
                    <div class="form-group row w-100 text-center">
                        <h2 for="" class="col-md-9 col-form-label">7. تقييم أعمال التسويق والمبيعات بما فى ذلك أداء المنافسين وردود فعل العملاء.</h2>
                    </div>
                    <div class="form-group row w-100 text-center">
                        <h2 for="" class="col-md-9 col-form-label">8. الإحتياجات التدريبية.</h2>
                    </div>
                    <div class="form-group row w-100 text-center">
                        <h2 for="" class="col-md-9 col-form-label">9. الإحتياجات البشرية والفنية.</h2>
                    </div>
                    <div class="form-group row w-100 text-center">
                        <h2 for="" class="col-md-9 col-form-label">10. ما يستجد من أعمال تتعلق بأنظمة الجودة المطبقة بالشركة.</h2>
                    </div>
                    <div class="form-group row w-100 text-right">
                        <h2 for="" class="col-md-9 col-form-label">11. التعديلات التى طرأت على الهيكل التنظيمى.</h2>
                    </div>
                    <div class="form-group row w-100 text-right">
                        <h2 for="" class="col-md-9 col-form-label">12. بأية شكاوى عملاء فيما يخص جودة خدمات مصنع عبر الجودة للمنتجات الاسمنتية .</h2>
                    </div>
                    <div class="form-group row w-100 text-right">
                        <h2 for="" class="col-7 col-form-label">13. مدى تحقيق وفاعلية نظام الـISO 9001 وأي احتياجات للتحسين. </h2>
                    </div>
                    <div class="form-group row w-100 text-right">
                        <h2 for="" class="col-9-md col-form-label">14. متابعة الأعمال من مراجعات إدارة سابقة.</h2>
                    </div>
                    <div class="form-group row w-100 text-right">
                        <h2 for="" class="col-md-9 col-form-label">15. التغييرات المخططة التي قد تؤثر على أنظمة الجودة المطبقة بمصنع عبر الجودة للمنتجات الاسمنتية.</h2>
                    </div>
                    <div class="form-group row w-100 text-right">
                        <h2 for="" class="col-md-9 col-form-label">16. توصيات للتحسين.</h2>
                    </div>

                </div>


                <div class="form-group row w-100 text-right">
                    <h1 for="" class="col-md-4 col-form-label" style='text-shadow: 1px 1px 1px #3ed3ea;'>ملخص الإجتماع :</h1>
                </div>
                <div class="form-group row w-100 text-right">
                    <h1 for="" class="col-5 col-form-label">موقف مراجعات الإدارة السابقة :</h1>
                    <div class="col-10">
                        <textarea type="text" class="form-control shadow-lg" placeholder=" المراجعة ......" name="stand_review"></textarea>
                    </div>
                </div>
                <div class="form-group row w-100 text-right">
                    <h1 for="" class="col-5 col-form-label">قرارات وتوصيات الإجتماع :</h1>
                </div>
                <div class="form-group row w-100 text-right">
                    <h1 for="" class="col-md-8 col-form-label">أولاً: فيما يختص بتحسين كفاءة نظام ﺇدارة الجودة فقد تقرر ما يلى</h1>
                </div>
                <div class="form-group row w-10 text-center">
                    <label for="" class="col-1 col-form-label">1 -</label>
                    <div class="col-3">
                        <textarea type="text" class="form-control" placeholder="  ......" name="improve_efficiency_1"></textarea>
                    </div>
                </div>
                <div class="form-group row w-10 text-center">
                    <label for="" class="col-1 col-form-label">2 -</label>
                    <div class="col-3">
                        <textarea type="text" class="form-control" placeholder="  ......" name="improve_efficiency_2"></textarea>
                    </div>
                </div>
                <div class="form-group row w-10 text-center">
                    <label for="" class="col-1 col-form-label">3 -</label>
                    <div class="col-3">
                        <textarea type="text" class="form-control" placeholder="  ......" name="improve_efficiency_3"></textarea>
                    </div>
                </div>
                <div class="form-group row w-100 text-right">
                    <h1 for="" class="col-md-8 col-form-label">ثانياً: فيما يختص بتحسين الخدمات طبقاً لمتطلبات العملاء فقد تقرر:</h1>
                </div>
                <div class="form-group row w-10 text-center">
                    <label for="" class="col-1 col-form-label">1 -</label>
                    <div class="col-3">
                        <textarea type="text" class="form-control" placeholder="  ......" name="improve_service_1"></textarea>
                    </div>
                </div>
                <div class="form-group row w-10 text-center">
                    <label for="" class="col-1 col-form-label">2 -</label>
                    <div class="col-3">
                        <textarea type="text" class="form-control" placeholder="  ......" name="improve_service_2"></textarea>
                    </div>
                </div>
                <div class="form-group row w-10 text-center">
                    <label for="" class="col-1 col-form-label">3 -</label>
                    <div class="col-3">
                        <textarea type="text" class="form-control" placeholder="  ......" name="improve_service_3"></textarea>
                    </div>
                </div>
                <div class="form-group row w-100 text-center">
                    <h1 for="" class="col-md-6 col-form-label">ثالثاً: الموارد البشرية والمادية المطلوبة هى:</h1>
                </div>
                <div class="form-group row w-10 text-center">
                    <label for="" class="col-1 col-form-label">1 -</label>
                    <div class="col-3">
                        <textarea type="text" class="form-control" placeholder="  ......" name="hr_1"></textarea>
                    </div>
                </div>
                <div class="form-group row w-10 text-center">
                    <label for="" class="col-1 col-form-label">2 -</label>
                    <div class="col-3">
                        <textarea type="text" class="form-control" placeholder="  ......" name="hr_2"></textarea>
                    </div>
                </div>
                <div class="form-group row w-10 text-center">
                    <label for="" class="col-1 col-form-label">3 -</label>
                    <div class="col-3">
                        <textarea type="text" class="form-control" placeholder="  ......" name="hr_3"></textarea>
                    </div>
                </div>

                <hr width="1300px;" size="20" color="black">
                <table class="table">
                    <thead>
                        <tr>
                            @if (Auth::user()->hasRole('Admin'))
                            <th class=" w-50 text-center col-2 ">
                                <div class="" style="text-align:center ;">
                                    <label for="" class="" style="font-size:large;font-weight: bolder;">ممثل الإدارة :</label>
                                </div>
                                <div class="form-group row w-10 text-center">
                                    <label for="" class="col-3 col-form-label">الإسم </label>
                                    <div class="col-8">
                                        <input type="text" class="form-control" placeholder="  ......" name="name_1">
                                    </div>

                                    <label for="" class="col-3 col-form-label">تاريخ </label>
                                    <div class="col-8">
                                        <input type="date" class="form-control" placeholder="  ......" name="date_2">
                                    </div>
                                </div>

                            </th>
                            @endif
                            @if (Auth::user()->hasRole('SuperAdmin'))
                            <th class=" w-50 text-center col-2 ">
                                <div class="" style="text-align:center ;">
                                    <label for="" class="" style="font-size:large;font-weight: bolder;">ممثل الإدارة :</label>
                                </div>
                                <div class="form-group row w-10 text-center">
                                    <label for="" class="col-3 col-form-label">الإسم </label>
                                    <div class="col-8">
                                        <input type="text" class="form-control" placeholder="  ......" name="name_1">
                                    </div>

                                    <label for="" class="col-3 col-form-label">تاريخ </label>
                                    <div class="col-8">
                                        <input type="date" class="form-control" placeholder="  ......" name="date_2">
                                    </div>
                                </div>

                            </th>
                            <th class=" w-50 text-center col-2 ">
                                <div class="" style="text-align:center ;">
                                    <label for="" class="" style="text-align:center;font-size:large;font-weight: bolder;">المدير العام:</label>
                                </div>
                                <div class="form-group row w-10 text-center">
                                    <label for="" class="col-3 col-form-label">الإسم </label>
                                    <div class="col-8">
                                        <input type="text" class="form-control" placeholder="  ......" name="name_2">
                                    </div>

                                    <label for="" class="col-3 col-form-label">تاريخ </label>
                                    <div class="col-8">
                                        <input type="date" class="form-control" placeholder="  ......" name="date_3">
                                    </div>
                                </div>
                            </th>
                            @endif
                        </tr>
                    </thead>
                </table>
                <div class='row w-100'>
                    <table class="table col-md-12">
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
                </div>
                <div class='row'>
                    <button style="border-radius:8px;margin: 50px; width:30% ;background-color: #2a415b; ;height: 5%;padding:10px;margin-right:100px;margin:auto" type="submit" class="btn btn-primary col-md-4">
                        <i class="fas fa-save" style="width:15% ; height: 20%;"></i>حفظ</button>
                </div>
            </div>

        </form>
    </div>
</div>

<style>
    .table thead th {
        vertical-align: bottom;
        /* border-bottom: 2px solid black; */
    }

    table,
    th,
    td,
    tr {
        border: 1px solid;
        /* border-bottom: 2px solid black; */
        /* border-top: 2px solid black; */
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
