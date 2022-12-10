@extends('layouts.master')
@section('content')
<style>
    a {
        box-shadow: 0 1rem 3rem rgba(0, 0, 0, .175) !important;
    }

</style>
<div class='card' style='text-align:center ; height:500px; margin-top:50px '>
    <div class=" row" style=";margin:auto ;">
        <div class="card-body " style='width:20%;background-color: black;
    border-bottom: 4px solid red;
    border-radius: 10px;margin: 10px;'>

            <h5 class="card-title">
                <div class="dropdown">
                    <div class="btn  dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                        <i class="fa fa-object-group" style='margin:4px'></i>
                        اهداف الجودة
                    </div>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="#">اجراء اهداف الجودة</a>
                        <a class="dropdown-item" href="#">خطة تنفيذ الهدف</a>
                    </div>
                </div>
            </h5>
        </div>
        <!--  -->
        <div class="card-body " style='width:20%;background-color: black;
    border-bottom: 4px solid red;
    border-radius: 10px;margin: 10px;'>
            <h5 class="card-title">
                <div class="dropdown">
                    <div class="btn  dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                        <i class="fa fa-exclamation-triangle" style='margin:4px'></i>
                        تقييم المخاطر</div>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="#">اجراء تقييم المخاطر</a>
                        <a class="dropdown-item" href="#">سجل حصر وتحديد المخاطر</a>

                    </div>
                </div>
            </h5>
        </div>
        <div class="card-body " style='width:20%;background-color: black;
    border-bottom: 4px solid red;
    border-radius: 10px;margin: 10px;'>


            <h5 class="card-title">
                <div class="dropdown">
                    <div class="btn  dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                        <i class="fa fa-link" style='margin:4px'></i>
                        مراجعة داخلية</div>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="#">اجراء المراجعة الداخلية</a>
                        <a class="dropdown-item" href="#">متابعة النتائج المراجعة الداخلية</a>
                        <a class="dropdown-item" href="#">مراجعات داخلية لنظام الجودة</a>
                        <a class="dropdown-item" href="#">اخطار بمراجعات داخلية</a>
                        <a class="dropdown-item" href="#">تقرير مراجعات داخلية</a>
                        <a class="dropdown-item" href="#">مراجعيين داخليين لنظام الجودة</a>
                        <a class="dropdown-item" href="#">امر تكليف مراجعة داخلية</a>
                        <a class="dropdown-item" href="#">خطة سنوية للمراجعة الداخيلية</a>


                    </div>
                </div>
            </h5>
        </div>
        <div class="card-body " style='width:20%;background-color: black;
    border-bottom: 4px solid red;
    border-radius: 10px;margin: 10px;'>


            <h5 class="card-title">
                <div class="dropdown">
                    <div class="btn  dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                        <i class="fa fa-tasks" style='margin:4px'></i>
                        مراجعة الادارة</div>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="#">اجراء مراجعة الادارة</a>
                        <a class="dropdown-item" href="#">اجندة اجتماع مراجعة الاارة</a>
                        <a class="dropdown-item" href="#">دعوة لاجتماع مراجعة الادارة</a>
                        <a class="dropdown-item" href="#">سجل متابعة قرارات </a>
                        <a class="dropdown-item" href="#">مجضر اجتماع المراجعة</a>


                    </div>
                </div>

            </h5>
        </div>

        <!--  -->
    </div>
    <!--second row  -->
    <div class=" row" style=";margin:auto;">
        <div class="card-body " style='width:20%;background-color: black;
    border-bottom: 4px solid red;
    border-radius: 10px;margin: 10px;'>

            <h5 class="card-title">
                <div class="dropdown">
                    <div class="btn  dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-sticky-note" style='margin:4px'></i>
                        مراقبة وضبط الوثائق
                    </div>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                </div>
            </h5>
        </div>
        <!--  -->
        <div class="card-body " style='width:20%;background-color: black;
    border-bottom: 4px solid red;
    border-radius: 10px;margin: 10px;'>

            <h5 class="card-title">
                <div class="dropdown">
                    <div class="btn  dropdown-toggle " type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-file-alt" style='margin:4px'></i>
                        التصحيحية الوقائية</div>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton" style='  box-shadow: 0 1rem 3rem rgba(0, 0, 0, .175) !important;
'>
                        <a class="dropdown-item" href="#">اجراءالتصحيحية الوقائية</a>
                        <a class="dropdown-item" href="#">طلب اجراء تصحيحي قائي</a>
                        <a class="dropdown-item" href="#">حالات عدم المطابقة</a>
                        <a class="dropdown-item" href="#">سجل متابعة تقارير عدم المطابقة</a>
                        <a class="dropdown-item" href="#">سجل متابعة طلبات الاجراءات التصحيحية </a>
                        <a class="dropdown-item" href="#">تقرير عدم المطابقةوالاجراءات التصحيحية</a>




                    </div>
                </div>
            </h5>
        </div>
        <div class="card-body " style='width:20%;background-color: black;
    border-bottom: 4px solid red;
    border-radius: 10px;margin: 10px;'>


            <h5 class="card-title">
                <div class="dropdown">
                    <div class="btn  dropdown-toggle " type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-sitemap" style='margin:4px'></i>
                        فهم المنظمة وسياقها
                    </div>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton" style='  box-shadow: 0 1rem 3rem rgba(0, 0, 0, .175) !important;
'>
                        <a class="dropdown-item" href="#">اجراء فهم المنظمة وسياقها</a>
                        <a class="dropdown-item" href="#">استمارة قضايا خارجية</a>
                        <a class="dropdown-item" href="#">استمارة قضايا داخلية</a>
                        <a class="dropdown-item" href="#">استمارة الاطراف المهتمة</a>
                        <a class="dropdown-item" href="#">تحليل(SWOT) </a>



                    </div>
                </div>

            </h5>
        </div>
       

        <!--  -->
    </div>
    <div class=" row" style=";margin:auto;">
     <div class="card-body " style='width:20%;background-color: black;
    border-bottom: 4px solid red;
    border-radius: 10px;margin: 10px;'>


            <h5 class="card-title">
                <div class="dropdown">
                    <div class="btn  dropdown-toggle " type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-comments " style='margin:4px'></i>
                        قياس رضا العميل
                    </div>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton" style='  box-shadow: 0 1rem 3rem rgba(0, 0, 0, .175) !important;
'>
                        <a class="dropdown-item" href="#">اجراءعمل الشكاوي وقياس رضا العميل</a>
                        <a class="dropdown-item" href="#">العملاء</a>
                        <a class="dropdown-item" href="#">نموذج استبيان عن الدورة و المدرب</a>
                        <a class="dropdown-item" href="#">متابعة شكاوي العميل</a>
                        <a class="dropdown-item" href="#">قياس رضا العملاء</a>
                        <a class="dropdown-item" href="#">تقرير دراسة شكوي العميل</a>


                    </div>
                </div>
            </h5>
        </div>
        <div class="card-body " style='width:20%;background-color: black;
    border-bottom: 4px solid red;
    border-radius: 10px;margin: 10px;'>

            <h5 class="card-title">
                <div class="dropdown">
                    <div class="btn  dropdown-toggle " type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="	fas fa-retweet" style='margin:4px'></i>التحكم في التغيير
                    </div>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton" style='  box-shadow: 0 1rem 3rem rgba(0, 0, 0, .175) !important;
'>
                        <a class="dropdown-item" href="#">اجراء التحكم في التغيير</a>
                        <a class="dropdown-item" href="#">نموذج طلب التحكم في التغيير</a>



                    </div>
                </div>
            </h5>
        </div>
        <div class="card-body " style='width:20%;background-color: black;
    border-bottom: 4px solid red;
    border-radius: 10px;margin: 10px;'>

            <h5 class="card-title">
                <div class="dropdown">
                    <div class="btn  dropdown-toggle " type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="	fas fa-sync-alt" style='margin:4px'></i>
                        التحسين المستمر
                    </div>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton" style='  box-shadow: 0 1rem 3rem rgba(0, 0, 0, .175) !important;
'>
                        <a class="dropdown-item" href="#">اجراء التحسين المستمر</a>
                        <a class="dropdown-item" href="#">احصائيات التعاقد</a>
                        <a class="dropdown-item" href="#">احصائيات التدريب</a>
                        <a class="dropdown-item" href="#">احصائيات حالات عدم المطابقة</a>
                        <a class="dropdown-item" href="#">سجل متابعة اعمال التحسين المستمر</a>
                        <a class="dropdown-item" href="#">تقرير جمع وتحليل البيانات</a>
                        <a class="dropdown-item" href="#">تقرير جمع وتحليل البيانات</a>


                    </div>
                </div>
            </h5>
        </div>
    </div>
    <!--  -->
</div>
@stop
