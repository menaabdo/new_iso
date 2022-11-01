@extends('layouts.master')

@section('content')



    <div class="container p-3">
        <h3 style="margin-top:85px;">إخطار بمراجعة داخلية</h3>
        <hr>

        <form action="{{ route('noticeInternal.update', $notice->id) }}" method="post" enctype="multipart/form-data"
            id="fo1">
            @method('PUT')
            {{ csrf_field() }}
            <div style="" class="w-100 text-center my-4">
                <h2>إخطار بمراجعة داخلية</h2>
                <hr class="w-50">
            </div>
            <div class="container-fluid p-2" style="border: 2px solid rgb(250, 90, 15);">
                <div class="form-group row w-100 text-right">
                    <label for="" class="col-1 col-form-label">من :</label>
                    <div class="col-3">
                        <input type="text" class="form-control" name="to" value="{{ $notice->to }}">
                    </div>
                    <label for="" class="col-1 col-form-label">رقم المراجعة :</label>
                    <div class="col-3">
                        <input type="text" class="form-control" name="revision_number"
                            value="{{ $notice->revision_number }}">
                    </div>
                    <label for="" class="col-1 col-form-label"> التاريخ المخطط :</label>
                    <div class="col-3">
                        <input type="date" class="form-control" name="date"
                            value="{{ $notice->date }}"placeholder="رئيس فريق المراجعه  ......" id="">
                    </div>
                    <label for="" class="col-1 col-form-label">الى :</label>
                    <div class="col-2">
                        <input type="text" class="form-control" name="from" value="{{ $notice->from }}">
                    </div>
                    <label for="" class="col-2 col-form-label">مكان المراجعة :</label>
                    <div class="col-2">
                        <input type="text" class="form-control" name="place_review" value="{{ $notice->place_review }}">
                    </div>
                    <label for="" class="col-2 col-form-label"> التوقيت :</label>
                    <div class="col-3">
                        <input type="text" class="form-control" name="time" value="{{ $notice->time }}">
                    </div>
                </div>

                <hr size="20" color="red">
                <div class="form-group row w-100 text-right">
                    <h8 for="" class="col-4 col-form-label"> نحيط سيادتكم علما بأنه سيتم تنفيذ المراجعة الداخلية على
                        :</h8>
                    <div class="col-3">
                        <input type="text" class="form-control" placeholder="  ......" name="implementation_review"
                            value="{{ $notice->implementation_review }}">

                    </div>
                    <h8>وذلك للتأكد من تطبيق أنظمة ودراسة فاعليتها طبقا للآتي : </h8>
                    <label for="" class="col-3 col-form-label"> موضوعات :</label>

                </div>
                <div class="form-group row w-100 text-right">
                    <label for="" class="col-1 col-form-label">المراجعة :</label>
                    <div class="col-10">
                        <textarea type="text" class="form-control" name="review"placeholder=" المراجعة ......">{{ $notice->review }}</textarea>
                    </div>
                </div>
                <hr size="20" color="red">
                <div class="form-group row w-100 text-right">
                    <label for="" class="col-2 col-form-label">المراجع المستخدمة :</label>
                    <div class="col-10">
                        <textarea type="text" class="form-control" name="references_used" placeholder=" المراجعة ......"> {{ $notice->references_used }}</textarea>
                    </div>
                </div>
                <hr size="20" color="red">
                <div class="form-group row w-100 text-right">
                    <label for="" class="col-2 col-form-label">فريق المراجعة: :</label>
                </div>
                <div class="form-group row w-10 text-center">
                    <label for="" class="col-1 col-form-label">1 -</label>
                    <div class="col-3">
                        <input type="text" class="form-control" placeholder="  ......" name="team_1"
                            value="{{ $notice->team_1 }}">
                    </div>
                    <label for="" class="col-1 col-form-label">2 -</label>
                    <div class="col-3">
                        <input type="text" class="form-control" placeholder="  ......" name="team_2"
                            value="{{ $notice->team_2 }}">
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
                                            <input type="text" class="form-control" placeholder="  ......"
                                                name="name_1" value="{{ $notice->name_1 }}" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group row w-10 text-right">
                                        <label for="" class="col-1 col-form-label">التاريخ: -</label>
                                        <div class="col-7">
                                            <input type="date" class="form-control" placeholder="  ......"
                                                name="date_4" value="{{ $notice->date_4 }}" readonly>
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
                                        <input type="text" class="form-control" placeholder="  ......"
                                            name="name_1" value="{{ $notice->name_1 }}" readonly>
                                    </div>
                                </div>
                                <div class="form-group row w-10 text-right">
                                    <label for="" class="col-1 col-form-label">التاريخ: -</label>
                                    <div class="col-7">
                                        <input type="date" class="form-control" placeholder="  ......"
                                            name="date_4" value="{{ $notice->date_4 }}" readonly>
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
                                            <input type="text" class="form-control" placeholder="  ......"
                                                name="name_2" value="{{ $notice->name_2 }}" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group row w-10 text-right">
                                        <label for="" class="col-1 col-form-label">التاريخ: -</label>
                                        <div class="col-7">
                                            <input type="date" class="form-control" placeholder="  ......"
                                                name="date_5" value="{{ $notice->date_5 }}" readonly>
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
                                            <input type="text" class="form-control" placeholder="  ......"
                                                name="name_1" value="{{ $notice->name_1 }}">
                                        </div>
                                    </div>
                                    <div class="form-group row w-10 text-right">
                                        <label for="" class="col-1 col-form-label">التاريخ: -</label>
                                        <div class="col-7">
                                            <input type="date" class="form-control" placeholder="  ......"
                                                name="date_4" value="{{ $notice->date_4 }}">
                                        </div>
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
                                                <input type="text" class="form-control" placeholder="  ......"
                                                    name="name_2" value="{{ $notice->name_2 }}" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group row w-10 text-right">
                                            <label for="" class="col-1 col-form-label">التاريخ: -</label>
                                            <div class="col-7">
                                                <input type="date" class="form-control" placeholder="  ......"
                                                    name="date_5" value="{{ $notice->date_5 }}" readonly>
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
                                            <input type="text" class="form-control" placeholder="  ......"
                                                name="name_1" value="{{ $notice->name_1 }}">
                                        </div>
                                    </div>
                                    <div class="form-group row w-10 text-right">
                                        <label for="" class="col-1 col-form-label">التاريخ: -</label>
                                        <div class="col-7">
                                            <input type="date" class="form-control" placeholder="  ......"
                                                name="date_4" value="{{ $notice->date_4 }}">
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
                                            <input type="text" class="form-control" placeholder="  ......"
                                                name="name_2" value="{{ $notice->name_2 }}">
                                        </div>
                                    </div>
                                    <div class="form-group row w-10 text-right">
                                        <label for="" class="col-1 col-form-label">التاريخ: -</label>
                                        <div class="col-7">
                                            <input type="date" class="form-control" placeholder="  ......"
                                                name="date_5" value="{{ $notice->date_5 }}">
                                        </div>
                                    </div>
                                </th>
                            @endif
                        </tr>
                    </thead>
                </table>
                <hr size="20" color="red">
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
                                        <input type="text" class="form-control" placeholder="  ......" name="name_3"
                                            value="{{ $notice->name_3 }}">
                                    </div>


                                    <label for="" class="col-1 col-form-label">الوظيفة </label>
                                    <div class="col-4">
                                        <input type="text" class="form-control" placeholder="  ......" name="job"
                                            value="{{ $notice->job }}">
                                    </div>
                                </div>
                                <div class="form-group row w-10 text-right">
                                    <label for="" class="col-1 col-form-label">التاريخ: -</label>
                                    <div class="col-7">
                                        <input type="date" class="form-control" placeholder="  ......" name="date_6"
                                            value="{{ $notice->date_6 }}">
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
                                        <input type="text" class="form-control" placeholder="  ......" name="name_4"
                                            value="{{ $notice->name_4 }}">
                                    </div>


                                    <label for="" class="col-1 col-form-label">الوظيفة </label>
                                    <div class="col-4">
                                        <input type="text" class="form-control" placeholder="  ......" name="job_2"
                                            value="{{ $notice->job_2 }}">
                                    </div>
                                </div>
                                <div class="form-group row w-10 text-right">
                                    <label for="" class="col-3 col-form-label">الموعد المقترح للمراجعة: :
                                        -</label>
                                    <div class="col-4">
                                        <input type="date" class="form-control" placeholder="  ......" name="date_7"
                                            value="{{ $notice->date_7 }}">
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
                                <input class="form-control" type="text" name="company_name"
                                    placeholder="اسم الشركة  :" value="{{ $notice->company_name }}">
                            </div>

                        </th>
                        <th>
                            <div class="" style="text-align:start ;">
                                <input class="form-control" type="text" name="date2"
                                    placeholder="تاريخ الإصدار   :" value="{{ $notice->date2 }}"
                                    onfocus="(this.type='date')" onblur="(this.type='text')">
                            </div>

                        </th>
                        <th>
                            <div class="" style="text-align:start ;">
                                <input class="form-control" type="text" name="date3" placeholder="تاريخ التعديل :"
                                    value="{{ $notice->date3 }}" onfocus="(this.type='date')"
                                    onblur="(this.type='text')">
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
            @if ($notice->status == 'pending' && Auth::user()->hasRole('Employee'))
            <div class="form-group">
                <button style="border-radius:20px;margin: 50px; width:10% ; height: 5%;" type="submit"
                    class="btn btn-primary"><i class="fas fa-save" style="width:15% ; height: 20%;">تعديل
                    </i></button>
            </div>
        @elseif(($notice->status == 'inProgress' && Auth::user()->hasRole('Admin')) ||
            ($notice->status == 'pending' && Auth::user()->hasRole('Admin')))
            <div class="form-group">
                <button style="border-radius:20px;margin: 50px; width:10% ; height: 5%;" type="submit"
                    class="btn btn-primary"><i class="fas fa-save" style="width:15% ; height: 20%;">تعديل
                    </i></button>
            </div>
        @elseif(($notice->status == 'inProgress' && Auth::user()->hasRole('SuperAdmin')) ||
            ($notice->status == 'pending' && Auth::user()->hasRole('SuperAdmin')) ||
            ($notice->status == 'confirmed' && Auth::user()->hasRole('SuperAdmin')))
            <div class="form-group">
                <button style="border-radius:20px;margin: 50px; width:10% ; height: 5%;" type="submit"
                    class="btn btn-primary"><i class="fas fa-save" style="width:15% ; height: 20%;">تعديل
                    </i></button>
            </div>
        @endif
        </form>
    </div>

@stop
