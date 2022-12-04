@extends('layouts.print')
@section('content')
    <div class="container p-3">
            <div style="" class="w-100 text-center my-4">
                <h2>إخطار بمراجعة داخلية</h2>
                <hr class="w-50">
            </div>
            <div class="container-fluid p-2" style="border: 2px solid rgb(250, 90, 15);">
                <div class="form-group row w-100 text-right">
                    <div >
                        <label for="" class="col-1 col-form-label">من :</label>
                        {{ $notice->to }}
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <label for="" class="col-1 col-form-label">رقم المراجعة :</label>
                      {{ $notice->revision_number }}
                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <label for="" class="col-1 col-form-label"> التاريخ المخطط :</label>
                       {{ $notice->date }}
                    </div>
                    <div>
                        <label for="" class="col-1 col-form-label">الى :</label>
                        {{ $notice->from }}
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <label for="" class="col-2 col-form-label">مكان المراجعة :</label>
                        {{ $notice->place_review }}
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <label for="" class="col-2 col-form-label"> التوقيت :</label>
                       {{ $notice->time }}
                    </div>
                </div>

                <hr size="20" color="red">
                <div class="form-group row w-100 text-right">
                    <h3 for="" class="col-4 col-form-label"> نحيط سيادتكم علما بأنه سيتم تنفيذ المراجعة الداخلية على
                        :</h3>
                    <div class="col-3">
                       {{ $notice->implementation_review }}

                    </div>
                    <h3>وذلك للتأكد من تطبيق أنظمة ودراسة فاعليتها طبقا للآتي : </h3>
                    <label for="" class="col-3 col-form-label"> موضوعات :</label>

                </div>
                <div class="form-group row w-100 text-right">
                    <div class="col-10">
                        <label for="" class="col-1 col-form-label">المراجعة :</label>
                     {{ $notice->review }}
                    </div>
                </div>
                <hr size="20" color="red">
                <div class="form-group row w-100 text-right">
                    <div class="col-10">
                        <label for="" class="col-2 col-form-label">المراجع المستخدمة :</label>
                        {{ $notice->references_used }}
                    </div>
                </div>
                <hr size="20" color="red">
                <div class="form-group row w-100 text-right">
                    <label for="" class="col-2 col-form-label">فريق المراجعة: :</label>
                </div>
                <div class="form-group row w-10 text-center">
                    <div class="col-3">
                        <label for="" class="col-1 col-form-label">1 -</label>
                       {{ $notice->team_1 }}
                    </div>
                    <div class="col-3">
                        <label for="" class="col-1 col-form-label">2 -</label>
                        {{ $notice->team_2 }}
                    </div>
                </div>
                <hr size="20" color="red">
                <div class="form-group row w-100 text-right">
                    <h6 for="" class="col-10 col-form-label"> * في حالة عدم الرد علينا خلال ثلاثة أيام من تاريخ
                        استلام الإخطار يعتبر ذلك بمثابة الموافقة على تنفيذ المراجعة في الموعد المحدد ((وتفضـــلو بقبول وافـر
                        الاحـترام..؛ )) :</h6>
                </div>
                <hr size="20" color="red">
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
            <table class="table table-bordered">
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
<script>
  window.addEventListener("load", window.print());
</script>
@stop
