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
    <div class="container p-4" style='text-align:center;border:1px solid silver; box-shadow: 0 1rem 3rem rgba(0, 0, 0, .175) !important;
 '>
        <div style="" class=" text-center">
        <h2 style='text-align:center;margin-bottom:40px'>
        <img src="{{ asset($meetingMinute->logo) }}" style="border-radius: 6px;
    border: 2px solid #001635;
    margin: 10px;
    float: left;
    /* padding: 12px;" width="50px" height="50px" />
        <span style='font-family:Cursive;border-bottom: 1px solid silver;
    ; box-shadow: 0 1rem 3rem rgba(0, 0, 0, .175) !important;
    border-radius: 6px;
    padding: 10px;text-shadow: 1px 1px 1px #3ed3ea;padding-left: 40px;
    padding-right: 40px;
'>     محضر إجتماع مراجعة الإدارة </span></h2>
              <hr class="w-100">
        </div>
        <div>
         </div>
        <br>
        <div class=" form-group row w-200 text-center ">
            <label  class="col-1" >رقم : </label>
            <input readonly style=' box-shadow: 0 1rem 3rem rgba(0, 0, 0, .175) !important;border:none;
    text-align: center;   ' value='  {{ $meetingMinute->num }}'>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <label for="" class="col-1 col-form-label ">التاريخ : </label>
            <input readonly style=' box-shadow: 0 1rem 3rem rgba(0, 0, 0, .175) !important;border:none;
    text-align: center;   ' value='  {{ $meetingMinute->date_1 }}'>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <label for="" class="col-1 col-form-label "> مكان الإنعقاد : </label>
            <input readonly style=' box-shadow: 0 1rem 3rem rgba(0, 0, 0, .175) !important;border:none;
    text-align: center;   ' value='  {{ $meetingMinute->place_meeting }}'>
         
        </div>
        <div class=" form-group row w-200 text-center">

            <div class="col-4" style='margin:12px'>
                <label for="" class="col-2 col-form-label "> الحاضرون:</label>
                 طبقاً للكشف المرفق
                 <label for="" class="col-3 col-form-label ">توقيت الإنعقاد : </label>
                 <input readonly style=' box-shadow: 0 1rem 3rem rgba(0, 0, 0, .175) !important;border:none;
    text-align: center;   ' value='{{ $meetingMinute->time_meeting }}'>
         
            </div>
            <div class="col-3">
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
        <div class="form-group row w-100 text-right " style='text-align: right;
    margin-right: 120;'
>
            <h2 for="" class="col-2 col-form-label"> موضوعات الإجتماع:</h2>
          
            <div class="form-group row w-100 text-right">
                <h5 for="" class="col-7 col-form-label"> 1. نتائج مراجعات الإدارة السابقة وفاعلية تطبيق القرارات الخاصة بها.</h5>
            </div>
            <div class="form-group row w-100 text-right">
                <h5 for="" class="col-7 col-form-label">2. أهداف الإدارة العليا (سياسات / خطط عمل / مشاريع تطوير).</h5>
            </div>
            <div class="form-group row w-100 text-right">
                <h5 for="" class="col-7 col-form-label">3. نتائج المراجعات الداخلية على أنظمة الجودة المطبقة بالشركة.</h5>
            </div>
            <div class="form-group row w-100 text-right">
                <h5 for="" class="col-7 col-form-label">4. نتائج المراجعات الخارجية على أنظمة الجودة المطبقة بالشركة ( إن وجدت ).</h5>
            </div>
            <div class="form-group row w-100 text-right">
                <h5 for="" class="col-7 col-form-label">5. موقف حالات عدم المطابقة بالإدارات المختلفة.</h5>
            </div>
            <div class="form-group row w-100 text-right">
                <h5 for="" class="col-7 col-form-label">6. موقف الإجراءات التصحيحية / الوقائية.</h5>
            </div>
            <div class="form-group row w-100 text-right">
                <h5 for="" class="col-7 col-form-label">7. تقييم أعمال التسويق والمبيعات بما فى ذلك أداء المنافسين وردود فعل العملاء.</h5>
            </div>
            <div class="form-group row w-100 text-right">
                <h5 for="" class="col-7 col-form-label">8. الإحتياجات التدريبية.</h5>
            </div>
            <div class="form-group row w-100 text-right">
                <h5 for="" class="col-7 col-form-label">9. الإحتياجات البشرية والفنية.</h5>
            </div>
            <div class="form-group row w-100 text-right">
                <h5 for="" class="col-7 col-form-label">10. ما يستجد من أعمال تتعلق بأنظمة الجودة المطبقة بالشركة.</h5>
            </div>
            <div class="form-group row w-100 text-right">
                <h5 for="" class="col-7 col-form-label">11. التعديلات التى طرأت على الهيكل التنظيمى.</h5>
            </div>
            <div class="form-group row w-100 text-right">
                <h5 for="" class="col-7 col-form-label">12. بأية شكاوى عملاء فيما يخص جودة خدمات مصنع عبر الجودة للمنتجات الاسمنتية .</h5>
            </div>
            <div class="form-group row w-100 text-right">
                <h5 for="" class="col-7 col-form-label">13. مدى تحقيق وفاعلية نظام الـmeetingMinute 9001 وأي احتياجات للتحسين. </h5>
            </div>
            <div class="form-group row w-100 text-right">
                <h5 for="" class="col-7 col-form-label">14. متابعة الأعمال من مراجعات إدارة سابقة.</h5>
            </div>
            <div class="form-group row w-100 text-right">
                <h5 for="" class="col-7 col-form-label">15. التغييرات المخططة التي قد تؤثر على أنظمة الجودة المطبقة بمصنع عبر الجودة للمنتجات الاسمنتية.</h5>
            </div>
            <div class="form-group row w-100 text-right">
                <h5 for="" class="col-7 col-form-label">16. توصيات للتحسين.</h5>
            </div>
        </div>

        <br><br>
        <div class="form-group row w-100 text-right">
            <h6 for="" class="col-2 col-form-label">ملخص الإجتماع :</h6>
        </div>
        <div class="form-group row w-100 text-right">
            <h6 for="" class="col-5 col-form-label">موقف مراجعات الإدارة السابقة :</h6>
            <div class="col-10">
            <textarea type="text" class="form-control" style='vertical-align: middle;    width: 70%;' name="meeting_purpose" >{{ $meetingMinute->stand_review }}</textarea>
                
                
            </div>
        </div>
        <div class="form-group row w-100 text-right">
            <h6 for="" class="col-5 col-form-label">قرارات وتوصيات الإجتماع :</h6>
        </div>
        <div class="form-group row w-100 text-right">
            <h6 for="" class="col-5 col-form-label">أولاً: فيما يختص بتحسين كفاءة نظام ﺇدارة الجودة فقد تقرر ما يلى</h6>
        </div>
        <div class="form-group row w-10 text-center">
            <div class="col-3">
            <label for="" class="col-1 col-form-label">1   -</label>
           
            <textarea type="text" class="form-control" style='margin:12px;vertical-align: middle;    width: 70%;' name="meeting_purpose" >{{ $meetingMinute->improve_efficiency_1 }}</textarea>
                
                
            </div>
        </div>
        <div class="form-group row w-10 text-center">
              <div class="col-3">
              <label for="" class="col-1 col-form-label">2   -</label>
         
            <textarea type="text" class="form-control" style='vertical-align: middle;    width: 70%;' name="meeting_purpose" >{{ $meetingMinute->improve_efficiency_2 }}</textarea>
               
                  </div>
        </div>
        <div class="form-group row w-10 text-center">
             <div class="col-3">
             <label for="" class="col-1 col-form-label">3  -</label>
          
            <textarea type="text" class="form-control" style='margin:12px;vertical-align: middle;    width: 70%;' name="meeting_purpose" >{{ $meetingMinute->improve_efficiency_3 }}</textarea>
             
                  </div>
        </div>
        <div class="form-group row w-100 text-right">
            <h6 for="" class="col-5 col-form-label">ثانياً: فيما يختص بتحسين الخدمات طبقاً لمتطلبات العملاء فقد تقرر:</h6>
        </div>
        <div class="form-group row w-10 text-center">
            <div class="col-3">
            <label for="" class="col-1 col-form-label">1   -</label>
           
            <textarea type="text" class="form-control" style='margin:12px;vertical-align: middle;    width: 70%;' name="meeting_purpose" >{{ $meetingMinute->improve_service_1 }}</textarea>
             
                  </div>
        </div>
        <div class="form-group row w-10 text-center">
              <div class="col-3">
              <label for="" class="col-1 col-form-label">2   -</label>
         
            <textarea type="text" class="form-control" style='vertical-align: middle;    width: 70%;' name="meeting_purpose" >{{ $meetingMinute->improve_service_2 }}</textarea>
             
                   </div>
        </div>
        <div class="form-group row w-10 text-center">
            <div class="col-3">
            <label for="" class="col-1 col-form-label">3  -</label>
           
            <textarea type="text" class="form-control" style='margin:12px;vertical-align: middle;    width: 70%;' name="meeting_purpose" >{{ $meetingMinute->improve_service_3 }}</textarea>
                
             </div>
        </div>
        <div class="form-group row w-100 text-right">
            <h6 for="" class="col-5 col-form-label">ثالثاً: الموارد البشرية والمادية المطلوبة هى:</h6>
        </div>
        <div class="form-group row w-10 text-center">
           <div class="col-3">
           <label for="" class="col-1 col-form-label">1   -</label>
           
            <textarea type="text" class="form-control" style='margin:12px;vertical-align: middle;    width: 70%;' name="meeting_purpose" >{{ $meetingMinute->hr_1 }}</textarea>
               
                 </div>
        </div>
        <div class="form-group row w-10 text-center">
               <div class="col-3">
               <label for="" class="col-1 col-form-label">2   -</label>
         
            <textarea type="text" class="form-control" style='vertical-align: middle;    width: 70%;' name="meeting_purpose" >{{ $meetingMinute->hr_2 }}</textarea>
             
                 </div>
        </div>
        <div class="form-group row w-10 text-center">
            <div class="col-3">
            <label for="" class="col-1 col-form-label">3  -</label>
           
            <textarea type="text" class="form-control" style='margin:12px;vertical-align: middle;    width: 70%;' name="meeting_purpose" >{{ $meetingMinute->hr_3 }}</textarea>
             
                  </div>
        </div>

      <br><br><br>
        <table class="table" style='border:none;text-shadow:none'>
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
        <table class="table" style="  ; border:none;padding:12px;margin-top:12px;background-color: #001635;
    color: white;text-shadow: none;width: 97%;
    margin: auto;
    margin-bottom: 12px;    font-size: 12px;padding: 1px;">
                 
            <thead>
                <tr>
                    <th style='border:none'>
                      <div class="" style="text-align:start ;">
                        {{ $meetingMinute->company_name }}
                      </div>
            
                    </th>
                    <th style='border:none'>
                      <div class="" style="text-align:start ;">
                        {{ $meetingMinute->date2 }}
                      </div>
            
                    </th>
                    <th style='border:none'>
                        <div class="" style="text-align:start ;">
                          {{ $meetingMinute->date3 }}
                          </div>
            
                    </th>
                    <th style='border:none'>
                      <div class="" style="text-align:start ;">
                            <label for="" class="" style="text-align: center;"> مدة الحفظ : سنتان </label>
                      </div>
            
                    </th>
                    <th style='border:none'>
                      <div class="" style="text-align:start ;">
                        <label for="" class="" style="text-align: center;;"> رقم الصفحة : 1 / 1</label>
                      </div>
                    </th>
                    <th style='border:none'>
                      <div class="" style="text-align:start ;">
                        <label for="" class="" style="text-align: center;"> رقم الوثيقة : QA–F-13 </label>
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
        /* border-bottom: 2px solid black;
        border-top: 2px solid black; */
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
<script>
  window.addEventListener("load", window.print());
</script>

@stop