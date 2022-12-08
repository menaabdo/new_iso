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
    <div class="container p-3" style=';border:1px solid silver; box-shadow: 0 1rem 3rem rgba(0, 0, 0, .175) !important;
 '>
            <div style="" class="w-100 text-center my-4">
                <h2 style='text-align:center;margin-bottom:40px'>
                <span style='font-family:Cursive;border-bottom: 1px solid silver;
    ; box-shadow: 0 1rem 3rem rgba(0, 0, 0, .175) !important;
    border-radius: 6px;
    padding: 10px;text-shadow: 1px 1px 1px #3ed3ea;padding-left: 40px;
    padding-right: 40px;
'>إخطار بمراجعة داخلية</span></h2>

               
            </div>
            <div class="container-fluid p-2" style="">
                <div class="form-group row w-100 text-right" style=''>
                    <span style=';margin:40px'>
                        <label for="" class="col-1 col-form-label" style='    margin-left: 70;
'>من :</label>
                        <input readonly style=' box-shadow: 0 1rem 3rem rgba(0, 0, 0, .175) !important;border:none;
    text-align: center;' value='  {{ $notice->to }}'>
                    </span>
                       <span style=''>
                        <label for="" class="col-1 col-form-label" style='padding-right: 50px;margin-left: 15px;'>الى :</label>
                        <input readonly style=' box-shadow: 0 1rem 3rem rgba(0, 0, 0, .175) !important;border:none;
    text-align: center;' value='  {{ $notice->from }}'>
                      
                        </span>
                     
                    <div style='margin:40px'>
                    <label for="" class="col-1 col-form-label">رقم المراجعة :</label>
                    <input readonly style=' box-shadow: 0 1rem 3rem rgba(0, 0, 0, .175) !important;border:none;
    text-align: center;' value='   {{ $notice->revision_number }}'>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <label for="" class="col-2 col-form-label">مكان المراجعة :</label>
                        <input readonly style=' box-shadow: 0 1rem 3rem rgba(0, 0, 0, .175) !important;border:none;
    text-align: center;' value='  {{ $notice->place_review }}'>
                      
                    </div>
                    <div style='margin:40px'>
                   
                        <label for="" class="col-2 col-form-label" style='    margin-left: 40;'> التوقيت :</label>
                        <input readonly style=' box-shadow: 0 1rem 3rem rgba(0, 0, 0, .175) !important;border:none;
    text-align: center;' value=' {{ $notice->time }}'>
                       <label for="" class="col-1 col-form-label" style='padding-right: 25px;'> التاريخ المخطط :</label>
                       <input readonly style=' box-shadow: 0 1rem 3rem rgba(0, 0, 0, .175) !important;border:none;
    text-align: center;' value=' {{ $notice->date }}'>
                    </div>
                </div>

              
                <div class="form-group row w-100 text-right" style='text-align:center'>
                    <h3 for="" class="col-4 col-form-label"> نحيط سيادتكم علما بأنه سيتم تنفيذ المراجعة الداخلية على
                        :</h3>
                    <div class="col-3">
                    <input readonly style=' box-shadow: 0 1rem 3rem rgba(0, 0, 0, .175) !important;border:none;
    text-align: center;' value='{{ $notice->implementation_review }}'>

                    </div>
                    <h3>وذلك للتأكد من تطبيق أنظمة ودراسة فاعليتها طبقا للآتي : </h3>
                    <label for="" class="col-3 col-form-label"> موضوعات :</label>

                </div>
                <div class="form-group row w-100 text-right" style='text-align:center;margin-top: 20px;'>
                    <div class="col-10">
                        <label for="" class="col-1 col-form-label" style='    margin-left: 60;'>المراجعة :</label>
                        <input readonly style=' box-shadow: 0 1rem 3rem rgba(0, 0, 0, .175) !important;border:none;
    text-align: center;' value=' {{ $notice->review }}'>
                    </div>
                </div>
                
                <div class="form-group row w-100 text-right" style='text-align:center;margin-top: 20px'>
                    <div class="col-10">
                        <label for="" class="col-2 col-form-label">المراجع المستخدمة :</label>
                        <input readonly style=' box-shadow: 0 1rem 3rem rgba(0, 0, 0, .175) !important;border:none;
    text-align: center;' value='  {{ $notice->references_used }}'>
                    </div>
                </div>
                <hr style='color:silver;width:70%'>
                <div class="form-group row w-100 text-right" style='text-align:center'>
                    <label for="" class="col-2 col-form-label">فريق المراجعة: :</label>
                </div>
                <div class="form-group row w-10 text-center" style='margin-top:12px'>
                    <div class="col-3" style='margin:12px;text-align:center'>
                        <label for="" class="col-1 col-form-label">1 -</label>
                       {{ $notice->team_1 }}
                       <label for="" class="col-1 col-form-label" style='margin-right:30px'>2 -</label>
                        {{ $notice->team_2 }}
                    </div>
                    <div class="col-3">
                       
                    </div>
                </div>
  
                <div class="form-group row w-100 text-right" style='margin-right:20px'>
                    <h6 for="" class="col-10 col-form-label"> * في حالة عدم الرد علينا خلال ثلاثة أيام من تاريخ
                        استلام الإخطار يعتبر ذلك بمثابة الموافقة على تنفيذ المراجعة في الموعد المحدد ((وتفضـــلو بقبول وافـر
                        الاحـترام..؛ )) :</h6>
                </div>
               
                <table class="table">
                    <thead>
                        <tr>
                            @if ($notice->status == 'inProgress' && Auth::user()->hasRole('Employee'))
                                <th class=" w-50 text-center col-2 ">
                                    <div class="" style="text-align:center ;">
                                        <label for="" class=""
                                            style="font-size:large;font-weight: bolder;">إعداد (مدير الجودة) :</label>
                                    </div>
                                    <div class="form-group row w-10 text-center">
                                        <label for="" class="col-1 col-form-label">الإسم </label>
                                        <div class="col-4">
                                           {{ $notice->name_1 }}
                                        </div>
                                    </div>
                                    <div class="form-group row w-10 text-right">
                                        <label for="" class="col-1 col-form-label">التاريخ: -</label>
                                        <div class="col-7">
                                            {{ $notice->date_4 }}
                                        </div>
                                    </div>
                                </th>
                            @endif
                            @if ($notice->status == 'confirmed' && Auth::user()->hasRole('Employee'))
                            <th class=" w-50 text-center col-2 ">
                                <div class="" style="text-align:center ;">
                                    <label for="" class=""
                                        style="font-size:large;font-weight: bolder;">إعداد (مدير الجودة) :</label>
                                </div>
                                <div class="form-group row w-10 text-center">
                                    <label for="" class="col-1 col-form-label">الإسم </label>
                                    <div class="col-4">
                                       {{ $notice->name_1 }}
                                    </div>
                                </div>
                                <div class="form-group row w-10 text-right">
                                    <label for="" class="col-1 col-form-label">التاريخ: -</label>
                                    <div class="col-7">
                                       {{ $notice->date_4 }}
                                    </div>
                                </div>
                            </th>
                                <th class=" w-50 text-center col-2 ">
                                    <div class="" style="text-align:center ;">
                                        <label for="" class=""
                                            style="text-align:center;font-size:large;font-weight: bolder;">إعتماد : (المدير
                                            العام):</label>
                                    </div>
                                    <div class="form-group row w-10 text-center">
                                        <label for="" class="col-1 col-form-label">الإسم </label>
                                        <div class="col-4">
                                          {{ $notice->name_2 }}
                                        </div>
                                    </div>
                                    <div class="form-group row w-10 text-right">
                                        <label for="" class="col-1 col-form-label">التاريخ: -</label>
                                        <div class="col-7">
                                            {{ $notice->date_5 }}
                                        </div>
                                    </div>
                                </th>
                            @endif
                            @if (Auth::user()->hasRole('Admin'))
                                <th class=" w-50 text-center col-2 ">
                                    <div class="" style="text-align:center ;">
                                        <label for="" class=""
                                            style="font-size:large;font-weight: bolder;">إعداد (مدير الجودة) :</label>
                                    </div>
                                    <div class="form-group row w-10 text-center">
                                        <label for="" class="col-1 col-form-label">الإسم </label>
                                        <div class="col-4">
                                           {{ $notice->name_1 }}
                                        </div>
                                    </div>
                                    <div class="form-group row w-10 text-right">
                                        <label for="" class="col-1 col-form-label">التاريخ: -</label>
                                        <div class="col-7">
                                            {{ $notice->date_4 }}                                </div>
                                    </div>
                                </th>
                                @if ($notice->status == 'confirmed' && Auth::user()->hasRole('Admin'))
                                    <th class=" w-50 text-center col-2 ">
                                        <div class="" style="text-align:center ;">
                                            <label for="" class=""
                                                style="text-align:center;font-size:large;font-weight: bolder;">إعتماد :
                                                (المدير العام):</label>
                                        </div>
                                        <div class="form-group row w-10 text-center">
                                            <label for="" class="col-1 col-form-label">الإسم </label>
                                            <div class="col-4">
                                               {{ $notice->name_2 }}
                                            </div>
                                        </div>
                                        <div class="form-group row w-10 text-right">
                                            <label for="" class="col-1 col-form-label">التاريخ: -</label>
                                            <div class="col-7">
                                                {{ $notice->date_5 }}
                                            </div>
                                        </div>
                                    </th>
                                @endif
                            @endif
                            @if (Auth::user()->hasRole('SuperAdmin'))
                                <th class=" w-50 text-center col-2 ">
                                    <div class="" style="text-align:center ;">
                                        <label for="" class=""
                                            style="font-size:large;font-weight: bolder;">إعداد (مدير الجودة) :</label>
                                    </div>
                                    <div class="form-group row w-10 text-center">
                                        <label for="" class="col-1 col-form-label">الإسم </label>
                                        <div class="col-4">
                                           {{ $notice->name_1 }}
                                        </div>
                                    </div>
                                    <div class="form-group row w-10 text-right">
                                        <label for="" class="col-1 col-form-label">التاريخ: -</label>
                                        <div class="col-7">
                                            {{ $notice->date_4 }}                                </div>
                                    </div>
                                </th>
                                <th class=" w-50 text-center col-2 ">
                                    <div class="" style="text-align:center ;">
                                        <label for="" class=""
                                            style="text-align:center;font-size:large;font-weight: bolder;">إعتماد : (المدير
                                            العام):</label>
                                    </div>
                                    <div class="form-group row w-10 text-center">
                                        <label for="" class="col-1 col-form-label">الإسم </label>
                                        <div class="col-4">
                                          {{ $notice->name_2 }}                                </div>
                                    </div>
                                    <div class="form-group row w-10 text-right">
                                        <label for="" class="col-1 col-form-label">التاريخ: -</label>
                                        <div class="col-7">
                                            {{ $notice->date_5 }}                                </div>
                                    </div>
                                </th>
                            @endif
                        </tr>
                    </thead>
                </table>
                <table class="table">
                    <thead>
                        <tr>
                            <th class=" w-50 text-center col-2 ">
                                <div class="" style="text-align:center ;">
                                    <label for="" class=""
                                        style="text-align:center;font-size:large;font-weight: bolder;">الجهة المراجع عليها
                                        للتوقيع بالاستلام؛ :</label>
                                </div>
                                <div class="form-group row w-10 text-center">
                                    <label for="" class="col-1 col-form-label">الإسم </label>
                                    <div class="col-4">
                                      {{ $notice->name_3 }}
                                    </div>


                                    <label for="" class="col-1 col-form-label">الوظيفة </label>
                                    <div class="col-4">
                                      {{ $notice->job }}
                                    </div>
                                </div>
                                <div class="form-group row w-10 text-right">
                                    <label for="" class="col-1 col-form-label">التاريخ: -</label>
                                    <div class="col-7">
                                        {{ $notice->date_6 }}
                                    </div>
                                </div>
                            </th>
                            <th class=" w-50 text-center col-2 ">
                                <div class="" style="text-align:center ;">
                                    <label for="" class=""
                                        style="text-align:center;font-size:large;font-weight: bolder;"> الجهة المراجع عليها
                                        للتوقيع بالموافقة على الموعد المخطط :</label>
                                </div>
                                <div class="form-group row w-10 text-center">
                                    <label for="" class="col-1 col-form-label">الإسم </label>
                                    <div class="col-4">
                                        {{ $notice->name_4 }}
                                    </div>


                                    <label for="" class="col-1 col-form-label">الوظيفة </label>
                                    <div class="col-4">
                                        {{ $notice->job_2 }}
                                    </div>
                                </div>
                                <div class="form-group row w-10 text-right">
                                    <label for="" class="col-3 col-form-label">الموعد المقترح للمراجعة: :
                                        -</label>
                                    <div class="col-4">
                                      {{ $notice->date_7 }}
                                    </div>
                                </div>
                            </th>
                        </tr>
                    </thead>
                </table>
            </div>
            <table class=" table-bordered" style=' border:none;
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
                        <th>
                            <div class="" style="text-align:start ;">
                           {{ $notice->company_name }}
                            </div>

                        </th>
                        <th>
                            <div class="" style="text-align:start ;">
                              {{ $notice->date2 }}
                            </div>

                        </th>
                        <th>
                            <div class="" style="text-align:start ;">
                              {{ $notice->date3 }}
                            </div>

                        </th>
                        <th>
                            <div class="" style="text-align:start ;">
                                <label for="" class=""
                                    style="text-align: center;"> مدة الحفظ :
                                    سنتان </label>
                            </div>

                        </th>
                        <th>
                            <div class="" style="text-align:start ;">
                                <label for="" class=""
                                    style="text-align: center;"> رقم الصفحة : 1 /
                                    1</label>
                            </div>
                        </th>
                        <th>
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
<script>
  window.addEventListener("load", window.print());
</script>
@stop
