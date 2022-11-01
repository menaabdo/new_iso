@extends('layouts.print')
@section('content')
<div class="card">
    <div class="container p-4">
        <div style="" class=" text-center">
            <h2>محضر إجتماع مراجعة الإدارة </h2>
              <hr class="w-100">
        </div>
        <div>
        <img src="{{ public_path($meetingMinute->logo) }}" style="float: left;" width="100px" height="50px" />
        </div>
        <br>
        <div class=" form-group row w-200 text-center ">
            <label  class="col-1" >رقم : </label>
            {{ $meetingMinute->num }}
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <label for="" class="col-1 col-form-label ">التاريخ : </label>
            {{ $meetingMinute->date_1 }}
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <label for="" class="col-1 col-form-label "> مكان الإنعقاد : </label>
            {{ $meetingMinute->place_meeting }}
         
        </div>
        <div class=" form-group row w-200 text-center">

            <div class="col-4">
                <label for="" class="col-2 col-form-label "> الحاضرون:</label>
               طبقاً للكشف المرفق
            </div>
            <div class="col-3">
                <label for="" class="col-3 col-form-label ">توقيت الإنعقاد : </label>
                {{ $meetingMinute->time_meeting }}
            </div>
        </div>
        <br>
        <div class=" form-group row w-200 text-center">
            <label for="" class="col-2 col-form-label text-left"> الهدف من الإجتماع:</label>
            <div class="col-10">
                <div class="col-">
                    <label>مناقشة ومراجعة سياسات الشركة وأهداف الإدارات والتأكد من فاعلية تطبيق النظام والنظر فى تطويره بصورة دائمة. </label>
                </div>
            </div>
        </div>

<br><br>
        <div class="form-group row w-100 text-right ">
            <h2 for="" class="col-2 col-form-label"> موضوعات الإجتماع:</h2>
            <hr width="1300px;" size="20" color="black">
            <div class="form-group row w-100 text-right">
                <h2 for="" class="col-7 col-form-label"> 1. نتائج مراجعات الإدارة السابقة وفاعلية تطبيق القرارات الخاصة بها.</h2>
            </div>
            <div class="form-group row w-100 text-right">
                <h2 for="" class="col-7 col-form-label">2. أهداف الإدارة العليا (سياسات / خطط عمل / مشاريع تطوير).</h2>
            </div>
            <div class="form-group row w-100 text-right">
                <h2 for="" class="col-7 col-form-label">3. نتائج المراجعات الداخلية على أنظمة الجودة المطبقة بالشركة.</h2>
            </div>
            <div class="form-group row w-100 text-right">
                <h2 for="" class="col-7 col-form-label">4. نتائج المراجعات الخارجية على أنظمة الجودة المطبقة بالشركة ( إن وجدت ).</h2>
            </div>
            <div class="form-group row w-100 text-right">
                <h2 for="" class="col-7 col-form-label">5. موقف حالات عدم المطابقة بالإدارات المختلفة.</h2>
            </div>
            <div class="form-group row w-100 text-right">
                <h2 for="" class="col-7 col-form-label">6. موقف الإجراءات التصحيحية / الوقائية.</h2>
            </div>
            <div class="form-group row w-100 text-right">
                <h2 for="" class="col-7 col-form-label">7. تقييم أعمال التسويق والمبيعات بما فى ذلك أداء المنافسين وردود فعل العملاء.</h2>
            </div>
            <div class="form-group row w-100 text-right">
                <h2 for="" class="col-7 col-form-label">8. الإحتياجات التدريبية.</h2>
            </div>
            <div class="form-group row w-100 text-right">
                <h2 for="" class="col-7 col-form-label">9. الإحتياجات البشرية والفنية.</h2>
            </div>
            <div class="form-group row w-100 text-right">
                <h2 for="" class="col-7 col-form-label">10. ما يستجد من أعمال تتعلق بأنظمة الجودة المطبقة بالشركة.</h2>
            </div>
            <div class="form-group row w-100 text-right">
                <h2 for="" class="col-7 col-form-label">11. التعديلات التى طرأت على الهيكل التنظيمى.</h2>
            </div>
            <div class="form-group row w-100 text-right">
                <h2 for="" class="col-7 col-form-label">12. بأية شكاوى عملاء فيما يخص جودة خدمات مصنع عبر الجودة للمنتجات الاسمنتية .</h2>
            </div>
            <div class="form-group row w-100 text-right">
                <h2 for="" class="col-7 col-form-label">13. مدى تحقيق وفاعلية نظام الـmeetingMinute 9001 وأي احتياجات للتحسين. </h2>
            </div>
            <div class="form-group row w-100 text-right">
                <h2 for="" class="col-7 col-form-label">14. متابعة الأعمال من مراجعات إدارة سابقة.</h2>
            </div>
            <div class="form-group row w-100 text-right">
                <h2 for="" class="col-7 col-form-label">15. التغييرات المخططة التي قد تؤثر على أنظمة الجودة المطبقة بمصنع عبر الجودة للمنتجات الاسمنتية.</h2>
            </div>
            <div class="form-group row w-100 text-right">
                <h2 for="" class="col-7 col-form-label">16. توصيات للتحسين.</h2>
            </div>
        </div>

        <br><br>
        <div class="form-group row w-100 text-right">
            <h1 for="" class="col-2 col-form-label">ملخص الإجتماع :</h1>
        </div>
        <div class="form-group row w-100 text-right">
            <h1 for="" class="col-5 col-form-label">موقف مراجعات الإدارة السابقة :</h1>
            <div class="col-10">
                <textarea type="text" class="form-control" placeholder=" المراجعة ......" name="stand_review"> {{ $meetingMinute->stand_review }}</textarea>
            </div>
        </div>
        <div class="form-group row w-100 text-right">
            <h1 for="" class="col-5 col-form-label">قرارات وتوصيات الإجتماع :</h1>
        </div>
        <div class="form-group row w-100 text-right">
            <h1 for="" class="col-5 col-form-label">أولاً: فيما يختص بتحسين كفاءة نظام ﺇدارة الجودة فقد تقرر ما يلى</h1>
        </div>
        <div class="form-group row w-10 text-center">
            <label for="" class="col-1 col-form-label">1   -</label>
            <div class="col-3">
                <textarea  type="text" class="form-control" placeholder="  ......" name="improve_efficiency_1"> {{ $meetingMinute->improve_efficiency_1 }}</textarea>
            </div>
        </div>
        <div class="form-group row w-10 text-center">
            <label for="" class="col-1 col-form-label">2   -</label>
            <div class="col-3">
                <textarea type="text" class="form-control" placeholder="  ......" name="improve_efficiency_2"> {{ $meetingMinute->improve_efficiency_2 }}</textarea>
            </div>
        </div>
        <div class="form-group row w-10 text-center">
            <label for="" class="col-1 col-form-label">3  -</label>
            <div class="col-3">
                <textarea type="text" class="form-control" placeholder="  ......" name="improve_efficiency_3"> {{ $meetingMinute->improve_efficiency_3 }}</textarea>
            </div>
        </div>
        <div class="form-group row w-100 text-right">
            <h1 for="" class="col-5 col-form-label">ثانياً: فيما يختص بتحسين الخدمات طبقاً لمتطلبات العملاء فقد تقرر:</h1>
        </div>
        <div class="form-group row w-10 text-center">
            <label for="" class="col-1 col-form-label">1   -</label>
            <div class="col-3">
                <textarea type="text" class="form-control" placeholder="  ......" name="improve_service_1"> {{ $meetingMinute->improve_service_1 }}</textarea>
            </div>
        </div>
        <div class="form-group row w-10 text-center">
            <label for="" class="col-1 col-form-label">2   -</label>
            <div class="col-3">
                <textarea type="text" class="form-control" placeholder="  ......" name="improve_service_2"> {{ $meetingMinute->improve_service_2 }}</textarea>
            </div>
        </div>
        <div class="form-group row w-10 text-center">
            <label for="" class="col-1 col-form-label">3  -</label>
            <div class="col-3">
                <textarea type="text" class="form-control" placeholder="  ......" name="improve_service_3"> {{ $meetingMinute->improve_service_3 }}</textarea>
            </div>
        </div>
        <div class="form-group row w-100 text-right">
            <h1 for="" class="col-5 col-form-label">ثالثاً: الموارد البشرية والمادية المطلوبة هى:</h1>
        </div>
        <div class="form-group row w-10 text-center">
            <label for="" class="col-1 col-form-label">1   -</label>
            <div class="col-3">
                <textarea type="text" class="form-control" placeholder="  ......" name="hr_1"> {{ $meetingMinute->hr_1 }}</textarea>
            </div>
        </div>
        <div class="form-group row w-10 text-center">
            <label for="" class="col-1 col-form-label">2   -</label>
            <div class="col-3">
                <textarea type="text" class="form-control" placeholder="  ......" name="hr_2"> {{ $meetingMinute->hr_2 }}</textarea>
            </div>
        </div>
        <div class="form-group row w-10 text-center">
            <label for="" class="col-1 col-form-label">3  -</label>
            <div class="col-3">
                <textarea type="text" class="form-control" placeholder="  ......" name="hr_3"> {{ $meetingMinute->hr_3 }}</textarea>
            </div>
        </div>

      <br><br><br>
        <table class="table">
            <thead>
                <tr>
                    @if ($meetingMinute->status == 'inProgress' && Auth::user()->hasRole('Employee'))
                    <th class=" w-50 text-center col-2 ">
                        <div class="" style="text-align:center ;">
                            <label for="" class="" style="font-size:large;font-weight: bolder;">ممثل الإدارة   :</label>
                        </div>
                        <div class="form-group row w-10 text-center">
                            <div class="col-8">
                                <label for="" class="col-3 col-form-label">الإسم : </label>
                                {{ $meetingMinute->name_1 }}
                            </div>
                            <div class="col-8">
                                <label for="" class="col-3 col-form-label">تاريخ : </label>
                                {{ $meetingMinute->date_2 }}
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
                            <div class="col-8">
                                <label for="" class="col-3 col-form-label">الإسم : </label>
                                {{ $meetingMinute->name_1 }}
                            </div>

                            <div class="col-8">
                                <label for="" class="col-3 col-form-label">تاريخ : </label>
                                {{ $meetingMinute->date_2 }}
                            </div>
                        </div>

                    </th>
                    <th class=" w-50 text-center col-2 ">
                        <div class="" style="text-align:center ;">
                            <label for="" class="" style="text-align:center;font-size:large;font-weight: bolder;">المدير العام:</label>
                        </div>
                        <div class="form-group row w-10 text-center">
                            <div class="col-8">
                                <label for="" class="col-3 col-form-label">الإسم : </label>
                                {{ $meetingMinute->name_2 }}
                            </div>

                            <div class="col-8">
                                <label for="" class="col-3 col-form-label">تاريخ : </label>
                             {{ $meetingMinute->date_3 }}
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
                            <div class="col-8">
                                <label for="" class="col-3 col-form-label">الإسم : </label>
                               {{ $meetingMinute->name_1 }}
                            </div>

                            <div class="col-8">
                                <label for="" class="col-3 col-form-label">تاريخ : </label>
                                {{ $meetingMinute->date_2 }}
                            </div>
                        </div>

                    </th>
                    @if ($meetingMinute->status == 'confirmed' && Auth::user()->hasRole('Admin'))
                    <th class=" w-50 text-center col-2 ">
                        <div class="" style="text-align:center ;">
                            <label for="" class="" style="text-align:center;font-size:large;font-weight: bolder;">المدير العام:</label>
                        </div>
                        <div class="form-group row w-10 text-center">
                            <div class="col-8">
                                <label for="" class="col-3 col-form-label">الإسم : </label>
                                {{ $meetingMinute->name_2 }}
                            </div>

                            <div class="col-8">
                                <label for="" class="col-3 col-form-label">تاريخ : </label>
                                {{ $meetingMinute->date_3 }}
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
                            <div class="col-8">
                                <label for="" class="col-3 col-form-label">الإسم : </label>
                                {{ $meetingMinute->name_1 }}
                            </div>

                            <div class="col-8">
                                <label for="" class="col-3 col-form-label">تاريخ : </label>
                               {{ $meetingMinute->date_2 }}
                            </div>
                        </div>

                    </th>
                    <th class=" w-50 text-center col-2 ">
                        <div class="" style="text-align:center ;">
                            <label for="" class="" style="text-align:center;font-size:large;font-weight: bolder;">المدير العام:</label>
                        </div>
                        <div class="form-group row w-10 text-center">
                            <div class="col-8">
                                <label for="" class="col-3 col-form-label">الإسم : </label>
                                {{ $meetingMinute->name_2 }}
                            </div>

                            <div class="col-8">
                                <label for="" class="col-3 col-form-label">تاريخ : </label>
                                {{ $meetingMinute->date_3 }}
                            </div>
                        </div>
                    </th>
                    @endif
                </tr>
            </thead>
        </table>
        <br><br>
        <table class="table">
            <thead>
                <tr>
                    <th>
                      <div class="" style="text-align:start ;">
                        {{ $meetingMinute->company_name }}
                      </div>
            
                    </th>
                    <th>
                      <div class="" style="text-align:start ;">
                        {{ $meetingMinute->date2 }}
                      </div>
            
                    </th>
                    <th>
                        <div class="" style="text-align:start ;">
                          {{ $meetingMinute->date3 }}
                          </div>
            
                    </th>
                    <th>
                      <div class="" style="text-align:start ;">
                            <label for="" class="" style="text-align: center;font-size:large;font-weight: bolder;"> مدة الحفظ : سنتان </label>
                      </div>
            
                    </th>
                    <th>
                      <div class="" style="text-align:start ;">
                        <label for="" class="" style="text-align: center;font-size:large;font-weight: bolder;"> رقم الصفحة : 1 / 1</label>
                      </div>
                    </th>
                    <th>
                      <div class="" style="text-align:start ;">
                        <label for="" class="" style="text-align: center;font-size:large;font-weight: bolder;"> رقم الوثيقة : QA–F-13 </label>
                      </div>
                    </th>
                  </tr>
            </thead>
        </table>

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