@extends('layouts.master')

@section('content')
<style>
    .shadow-lg {
        box-shadow: 0 1rem 3rem rgba(0, 0, 0, .175) !important;
    }
    input{
        box-shadow: 0 1rem 3rem rgba(0, 0, 0, .175) !important;
    }

    h2 {

        padding: 2px;
        text-align: right;
    }

</style>
<div class='row card'>
    <div class='row card' style='margin:auto'>

<form action="{{route('meetingMinute.update',$meetingMinute->id)}}" class='col-md-9 w-100' style='margin:auto;margin-top:80px' method="post" enctype="multipart/form-data" id="fo1">
    @method('PUT')
    {{ csrf_field() }}
    <div class="container p-4">
        <div style="" class=" text-center">
            <h2 style='text-shadow: 1px 1px 1px #3ed3ea;'>محضر إجتماع مراجعة الإدارة </h2>
              <hr class="w-100">
        </div>
        <div class='shadow-lg p-3 col-md-12'>
                    <label class="col-md-2 text-left" style=''>رقم</label>
                    <input class="col-md-3 form-control  shadow-lg" type="text" name="num">

                </div>
                <div class='shadow-lg p-3'>
                    <label class="form-label pr-5">CO LOGO</label>
                    <div class=''>
               @if ($meetingMinute->status == 'pending' && Auth::user()->hasRole('Employee'))
            <input type="file" id="img" class='shadow-lg' name="logo" accept="image/*">
        @endif

        @if (($meetingMinute->status == 'inProgress' && Auth::user()->hasRole('Admin')) ||
            ($meetingMinute->status == 'pending' && Auth::user()->hasRole('Admin')))
            <input type="file" id="img" class='shadow-lg' name="logo" accept="image/*">
        @endif
        @if (($meetingMinute->status == 'inProgress' && Auth::user()->hasRole('SuperAdmin')) ||
            ($meetingMinute->status == 'pending' && Auth::user()->hasRole('SuperAdmin')) ||
            ($meetingMinute->status == 'confirmed' && Auth::user()->hasRole('SuperAdmin')))
            <input type="file" id="img" class='shadow-lg' name="logo" accept="image/*">
        @endif
        <img src="{{ asset($meetingMinute->logo) }}" height=100px width=100px; />
         
</div>
        </div>
        <div class='shadow-lg p-3'>
                    <label for="" class="col-md-2 text-left" style='text-align:left !important'>التاريخ:</label>

                <input type="date" class="col-md-4 form-control  shadow-lg" name="date_1" value="{{ $meetingMinute->date_1 }}">
            </div>
            <div class='shadow-lg p-3'>
                    <label for="" class="col-md-4 text-left"> مكان الإنعقاد:</label>

                <input type="text" class="form-control col-md-4" name="place_meeting"  value="{{ $meetingMinute->place_meeting }}">
            </div>
        
            <div class=" form-group row mt-3 text-center">

<label for="" class="col-3  "> الحاضرون:</label>
<div class="col-5">
    <h5>طبقاً للكشف المرفق</h5>
</div>
<label for="" class="col-md-4 col-form-label ">توقيت الإنعقاد:</label>
                    <div class="col-3">
                <input type="text" class="form-control" name="time_meeting"  value="{{ $meetingMinute->time_meeting }}">
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
                    <h1 for="" class="col-6 col-form-label">موقف مراجعات الإدارة السابقة :</h1>
                    <div class="col-10">
                <textarea type="text" class="form-control" placeholder=" المراجعة ......" name="stand_review"> {{ $meetingMinute->stand_review }}</textarea>
            </div>
        </div>
        <div class="form-group row w-100 text-right">
            <h1 for="" class="col-5 col-form-label">قرارات وتوصيات الإجتماع :</h1>
        </div>
        <div class="form-group row w-100 ">
            <h1 for="" class="col-9 col-form-label">أولاً: فيما يختص بتحسين كفاءة نظام ﺇدارة الجودة فقد تقرر ما يلى</h1>
        </div>
        <div class="form-group row w-10 text-center">
            <label for="" class="col-1 col-form-label">1   -</label>
            <div class="col-6">
                <textarea  type="text" class="form-control" placeholder="  ......" name="improve_efficiency_1"> {{ $meetingMinute->improve_efficiency_1 }}</textarea>
            </div>
        </div>
        <div class="form-group row w-10 text-center">
            <label for="" class="col-1 col-form-label">2   -</label>
            <div class="col-6">
                <textarea type="text" class="form-control" placeholder="  ......" name="improve_efficiency_2"> {{ $meetingMinute->improve_efficiency_2 }}</textarea>
            </div>
        </div>
        <div class="form-group row w-10 text-center">
            <label for="" class="col-1 col-form-label">3  -</label>
            <div class="col-6">
                <textarea type="text" class="form-control" placeholder="  ......" name="improve_efficiency_3"> {{ $meetingMinute->improve_efficiency_3 }}</textarea>
            </div>
        </div>
        <div class="form-group row w-100 ">
            <h1 for="" class="col-9 col-form-label">ثانياً: فيما يختص بتحسين الخدمات طبقاً لمتطلبات العملاء فقد تقرر:</h1>
        </div>
        <div class="form-group row w-10 text-center">
            <label for="" class="col-1 col-form-label">1   -</label>
            <div class="col-6">
                <textarea type="text" class="form-control" placeholder="  ......" name="improve_service_1"> {{ $meetingMinute->improve_service_1 }}</textarea>
            </div>
        </div>
        <div class="form-group row w-10 text-center">
            <label for="" class="col-1 col-form-label">2   -</label>
            <div class="col-6">
                <textarea type="text" class="form-control" placeholder="  ......" name="improve_service_2"> {{ $meetingMinute->improve_service_2 }}</textarea>
            </div>
        </div>
        <div class="form-group row w-10 text-center">
            <label for="" class="col-1 col-form-label">3  -</label>
            <div class="col-6">
                <textarea type="text" class="form-control" placeholder="  ......" name="improve_service_3"> {{ $meetingMinute->improve_service_3 }}</textarea>
            </div>
        </div>
        <div class="form-group row w-100 text-right">
            <h1 for="" class="col-5 col-form-label">ثالثاً: الموارد البشرية والمادية المطلوبة هى:</h1>
        </div>
        <div class="form-group row w-10 text-center">
            <label for="" class="col-1 col-form-label">1   -</label>
            <div class="col-6">
                <textarea type="text" class="form-control" placeholder="  ......" name="hr_1"> {{ $meetingMinute->hr_1 }}</textarea>
            </div>
        </div>
        <div class="form-group row w-10 text-center">
            <label for="" class="col-1 col-form-label">2   -</label>
            <div class="col-6">
                <textarea type="text" class="form-control" placeholder="  ......" name="hr_2"> {{ $meetingMinute->hr_2 }}</textarea>
            </div>
        </div>
        <div class="form-group row w-10 text-center">
            <label for="" class="col-1 col-form-label">3  -</label>
            <div class="col-6">
                <textarea type="text" class="form-control" placeholder="  ......" name="hr_3"> {{ $meetingMinute->hr_3 }}</textarea>
            </div>
        </div>

        <hr >
        <table class="table">
            <thead>
                <tr>
                    @if ($meetingMinute->status == 'inProgress' && Auth::user()->hasRole('Employee'))
                    <th class=" w-50 text-center col-2 ">
                        <div class="" style="text-align:center ;">
                            <label for="" class="" style="font-size:large;font-weight: bolder;">ممثل الإدارة   :</label>
                        </div>
                        <div class="form-group row w-10 text-center">
                            <label for="" class="col-3 col-form-label">الإسم   </label>
                            <div class="col-8">
                                <input type="text" class="form-control" readonly placeholder="  ......" name="name_1" value="{{ $meetingMinute->name_1 }}">
                            </div>

                            <label for="" class="col-3 col-form-label">تاريخ   </label>
                            <div class="col-8">
                                <input type="date" class="form-control" readonly placeholder="  ......" name="date_2"  value="{{ $meetingMinute->date_2 }}">
                            </div>
                        </div>

                    </th>
                    @endif
                    @if ($meetingMinute->status == 'confirmed' && Auth::user()->hasRole('Employee'))
                    <th class=" w-50 text-center col-2 ">
                        <div class="" style="text-align:center ;">
                            <label for="" class="" style="font-size:large;font-weight: bolder;">ممثل الإدارة   :</label>
                        </div>
                        <div class="form-group row w-10 text-center">
                            <label for="" class="col-3 col-form-label">الإسم   </label>
                            <div class="col-8">
                                <input type="text" class="form-control" readonly placeholder="  ......" name="name_1" value="{{ $meetingMinute->name_1 }}">
                            </div>

                            <label for="" class="col-3 col-form-label">تاريخ   </label>
                            <div class="col-8">
                                <input type="date" class="form-control" readonly placeholder="  ......" name="date_2"  value="{{ $meetingMinute->date_2 }}">
                            </div>
                        </div>

                    </th>
                    <th class=" w-50 text-center col-2 ">
                        <div class="" style="text-align:center ;">
                            <label for="" class="" style="text-align:center;font-size:large;font-weight: bolder;">المدير العام:</label>
                        </div>
                        <div class="form-group row w-10 text-center">
                            <label for="" class="col-3 col-form-label">الإسم   </label>
                            <div class="col-8">
                                <input type="text" class="form-control" readonly placeholder="  ......" name="name_2"  value="{{ $meetingMinute->name_2 }}">
                            </div>

                            <label for="" class="col-3 col-form-label">تاريخ   </label>
                            <div class="col-8">
                                <input type="date" class="form-control" readonly placeholder="  ......" name="date_3"  value="{{ $meetingMinute->date_3 }}">
                            </div>
                        </div>
                    </th>
                    @endif
                    @if (Auth::user()->hasRole('Admin'))
                    <th class=" w-50 text-center col-2 ">
                        <div class="" style="text-align:center ;">
                            <label for="" class="" style="font-size:large;font-weight: bolder;">ممثل الإدارة   :</label>
                        </div>
                        <div class="form-group row w-10 text-center">
                            <label for="" class="col-3 col-form-label">الإسم   </label>
                            <div class="col-8">
                                <input type="text" class="form-control" placeholder="  ......" name="name_1" value="{{ $meetingMinute->name_1 }}">
                            </div>

                            <label for="" class="col-3 col-form-label">تاريخ   </label>
                            <div class="col-8">
                                <input type="date" class="form-control" placeholder="  ......" name="date_2"  value="{{ $meetingMinute->date_2 }}">
                            </div>
                        </div>

                    </th>
                    @if ($meetingMinute->status == 'confirmed' && Auth::user()->hasRole('Admin'))
                    <th class=" w-50 text-center col-2 ">
                        <div class="" style="text-align:center ;">
                            <label for="" class="" style="text-align:center;font-size:large;font-weight: bolder;">المدير العام:</label>
                        </div>
                        <div class="form-group row w-10 text-center">
                            <label for="" class="col-3 col-form-label">الإسم   </label>
                            <div class="col-8">
                                <input type="text" class="form-control" readonly placeholder="  ......" name="name_2"  value="{{ $meetingMinute->name_2 }}">
                            </div>

                            <label for="" class="col-3 col-form-label">تاريخ   </label>
                            <div class="col-8">
                                <input type="date" class="form-control" readonly placeholder="  ......" name="date_3"  value="{{ $meetingMinute->date_3 }}">
                            </div>
                        </div>
                    </th>
                    @endif
                    @endif
                    @if (Auth::user()->hasRole('SuperAdmin'))
                    <th class=" w-50 text-center col-2 ">
                        <div class="" style="text-align:center ;">
                            <label for="" class="" style="font-size:large;font-weight: bolder;">ممثل الإدارة   :</label>
                        </div>
                        <div class="form-group row w-10 text-center">
                            <label for="" class="col-3 col-form-label">الإسم   </label>
                            <div class="col-8">
                                <input type="text" class="form-control" placeholder="  ......" name="name_1" value="{{ $meetingMinute->name_1 }}">
                            </div>

                            <label for="" class="col-3 col-form-label">تاريخ   </label>
                            <div class="col-8">
                                <input type="date" class="form-control" placeholder="  ......" name="date_2"  value="{{ $meetingMinute->date_2 }}">
                            </div>
                        </div>

                    </th>
                    <th class=" w-50 text-center col-2 ">
                        <div class="" style="text-align:center ;">
                            <label for="" class="" style="text-align:center;font-size:large;font-weight: bolder;">المدير العام:</label>
                        </div>
                        <div class="form-group row w-10 text-center">
                            <label for="" class="col-3 col-form-label">الإسم   </label>
                            <div class="col-8">
                                <input type="text" class="form-control" placeholder="  ......" name="name_2"  value="{{ $meetingMinute->name_2 }}">
                            </div>

                            <label for="" class="col-3 col-form-label">تاريخ   </label>
                            <div class="col-8">
                                <input type="date" class="form-control" placeholder="  ......" name="date_3"  value="{{ $meetingMinute->date_3 }}">
                            </div>
                        </div>
                    </th>
                    @endif
                </tr>
            </thead>
        </table>
        <table class="table">
            <thead>
                <tr>
                    <th>
                      <div class="" style="text-align:start ;">
                      <label>اسم الشركة</label>
                        <input class="form-control" type="text" name="company_name"   value="{{ $meetingMinute->company_name }}">
                      </div>
            
                    </th>
                    <th>
                      <div class="" style="text-align:start ;">
                      <label>تاريخ الاصدار</label>
                        <input class="form-control" type="text" name="date2"  value="{{ $meetingMinute->date2 }}"  onfocus="(this.type='date')" onblur="(this.type='text')">
                      </div>
            
                    </th>
                    <th>
                        <div class="" style="text-align:start ;">
                        <label>تاريخ التعديل</label>
                            <input class="form-control" type="text" name="date3"  value="{{ $meetingMinute->date3 }}"  onfocus="(this.type='date')" onblur="(this.type='text')">
                          </div>
            
                    </th>
                    <th>
                            <div class="" style="text-align:start ;">
                                <label> مدة الحفظ </label>
                                <input class="form-control shadow-lg" type="text" name="period_time" value="{{ $meetingMinute->period_time }}">
                            </div>

                        </th>
                        <th>
                            <div class="" style="text-align:start ;">
                                <label> رقم الصفحة </label>
                                <input class="form-control shadow-lg" type="text" name="number_page" value="{{ $meetingMinute->number_page }}">
                            </div>

                        </th>
                        <th>
                            <div class="" style="text-align:start ;">
                                <label> رقم الوثيقة </label>
                                <input class="form-control shadow-lg" type="text" name="number_doc" value="{{ $meetingMinute->number_doc }}">
                            </div>
                        </th>
                  </tr>
            </thead>
        </table>
        @if ($meetingMinute->status == 'pending' && Auth::user()->hasRole('Employee'))
        <div class="form-group">
            <button style="border-radius:20px;margin: 50px; width:10% ; height: 5%;" type="submit"
                class="btn btn-primary"><i class="fas fa-save" style="width:15% ; height: 20%;">تعديل
                </i></button>
        </div>
    @elseif(($meetingMinute->status == 'inProgress' && Auth::user()->hasRole('Admin')) ||
        ($meetingMinute->status == 'pending' && Auth::user()->hasRole('Admin')))
        <div class="form-group">
            <button style="border-radius:20px;margin: 50px; width:10% ; height: 5%;" type="submit"
                class="btn btn-primary"><i class="fas fa-save" style="width:15% ; height: 20%;">تعديل
                </i></button>
        </div>
    @elseif(($meetingMinute->status == 'inProgress' && Auth::user()->hasRole('SuperAdmin')) ||
        ($meetingMinute->status == 'pending' && Auth::user()->hasRole('SuperAdmin')) ||
        ($meetingMinute->status == 'confirmed' && Auth::user()->hasRole('SuperAdmin')))
        <div class='row'>
                    <button style="border-radius:8px;margin: 50px; width:30% ;background-color: #2a415b; ;height: 5%;padding:10px;margin-right:100px;margin:auto" type="submit" class="btn btn-primary col-md-4">
                      تعديل</button>
                </div>
    @endif
    </div>
    
    </form>


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

@stop