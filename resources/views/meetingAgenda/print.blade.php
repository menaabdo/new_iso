@extends('layouts.print')

@section('content')

    <div class="card" >


            <div class="container p-4" >
                       <div style="" class="w-100 text-center my-4">
                    <h2 style='text-shadow: 1px 1px 1px #3ed3ea;'>أجندة إجتماع مراجعة الإدارة</h2>
                    <hr class="w-100">
                </div>

                <div class="form-group row w-10" style=" background-image: url('../../image/bg.jpeg');
  background-repeat: no-repeat; background-size: cover;" >
         
                  
                        <label for="" class="col-2 col-form-label">رقم الاجتماع: </label>
                       {{ $meetingAgenda->meeting_num }}
                       &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <label for="" class="col-2 col-form-label text-left">التاريخ:</label>
                    {{ $meetingAgenda->date_1 }}
                    &nbsp;&nbsp;&nbsp;
                    <label for="" class="col-2 col-form-label text-left"> نوع الإجتماع:</label>
                  {{ $meetingAgenda->meeting_kind }}
                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <img src="{{ asset($meetingAgenda->logo) }}" width="100px" height="50px" />
                </div>
                <hr width="1300px;" size="20" color="black">
                <div class="form-group row w-100 text-right" style="text-align:center ;">
                    <table class="table">
                        <tr>
                            <th style="background-color:#001635;color:white">مكان الأنعقاد</th>
                            <th>{{ $meetingAgenda->meeting_place }}</th>
                            <th style="background-color:#001635;color:white">مدة الاجتماع</th>
                            <th>{{ $meetingAgenda->meeting_period }}</th>
                        </tr>
                        <tr>
                            <th style="background-color:#001635;color:white">التوقيت</th>
                            <th>{{ $meetingAgenda->meeting_time }}</th>
                            <th style="background-color:#001635;color:white">مقرر الاجتماع</th>
                            <th>{{ $meetingAgenda->meeting_schedule }}</th>
                        </tr>
                    </table>
                </div>
                <br><br>
                <div class="form-group row w-100 text-right">
                    <div class="col-12">
                        <label for="" class="col-2 col-form-label">الغرض من الاجتماع :</label>
                        <textarea type="text" class="form-control" name="meeting_purpose" placeholder="الغرض من الاجتماع:">{{ $meetingAgenda->meeting_purpose }}</textarea>
                    </div>
                </div>
                <hr width="1300px;" size="20" color="black">
                <div class="form-group row w-100 text-right">
                    <h2 for="" class="col-2 col-form-label">أسماء الحضور :</h2>
                </div>
                <div class="form-group row w-100 text-right" style="text-align:center ;">
                    <table id="attendance_table" class="table">
                        <tr style="background-color:rgb(227, 252, 160)">
                        
                            <th>الاسم</th>
                            <th>الوظيفة</th>

                        </tr>
                        @if (count($meetingAgenda->attendance) > 0)
                            @foreach ($meetingAgenda->attendance as $key => $intr)
                                <tr id="attendance-{{ $key }}">
                                    <th>{{ $intr->name }}
                                    </th>
                                    <th>{{ $intr->job }}
                                    </th>
                                </tr>
                            @endforeach
           
                        @endif
                    </table>
                </div>
                <hr width="1300px;" size="20" color="black">
                <div class="form-group row w-100 text-right">
                    <h2 for="" class="col-4 col-form-label">الموضوعات التي سيتم مناقشتها :</h2>
                </div>

                <div class="form-group row w-100 text-right" style="text-align:center ;">
                    <table class="table">
                        <tr style="background-color:rgb(227, 252, 160)">
                       
                            <th class="col-6 col-form-label">الموضوعات</th>
                            <th>المسئول</th>
                            <th>الوقت المخصص</th>
                        </tr>
                        @if (count($meetingAgenda->topic) > 0)
                            @foreach ($meetingAgenda->topic as $key => $topic)
                                <tr id="topics-{{ $key }}">

                                    <th class="col-6 col-form-label">{{ $topic->topic }}</th>
                                    <th>{{ $topic->administrator }}</th>
                                    <th>{{ $topic->time }}</th>
                                </tr>
                            @endforeach

                        @endif
                    </table>
                </div>
                <hr width="1300px;" size="20" color="black">
                <table class="table">
                    <thead>
                        <tr>
                            @if ($meetingAgenda->status == 'inProgress' && Auth::user()->hasRole('Employee'))
                                <th class=" w-50 text-center col-2 ">
                                    <div class="" style="text-align:center ;">
                                        <label for="" class=""
                                            style="font-size:large;font-weight: bolder;">ممثل الإدارة :</label>
                                    </div>
                                    <div class="form-group row w-10 text-center">
                                        <div class="col-6">
                                            <label for="" class="col-1 col-form-label">الإسم : </label>
                                            {{ $meetingAgenda->name_1 }}
                                        </div>
                                    </div>

                                </th>
                            @endif
                            @if ($meetingAgenda->status == 'confirmed' && Auth::user()->hasRole('Employee'))
                                <th class=" w-50 text-center col-2 ">
                                    <div class="" style="text-align:center ;">
                                        <label for="" class=""
                                            style="font-size:large;font-weight: bolder;">ممثل الإدارة :</label>
                                    </div>
                                    <div class="form-group row w-10 text-center">
                                        <div class="col-6">
                                            <label for="" class="col-1 col-form-label">الإسم : </label>
                                           {{ $meetingAgenda->name_1 }}
                                        </div>
                                    </div>

                                </th>
                                <th class=" w-50 text-center col-2 ">
                                    <div class="" style="text-align:center ;">
                                        <label for="" class=""
                                            style="text-align:center;font-size:large;font-weight: bolder;">المدير
                                            العام:</label>
                                    </div>
                                    <div class="form-group row w-10 text-center">
                                        <div class="col-6">
                                            <label for="" class="col-1 col-form-label">الإسم : </label>
                                            {{ $meetingAgenda->name_2 }}
                                        </div>
                                    </div>
                                </th>
                            @endif
                            @if (Auth::user()->hasRole('Admin'))
                                <th class=" w-50 text-center col-2 ">
                                    <div class="" style="text-align:center ;">
                                        <label for="" class=""
                                            style="font-size:large;font-weight: bolder;">ممثل الإدارة :</label>
                                    </div>
                                    <div class="form-group row w-10 text-center">
                                        <div class="col-6">
                                            <label for="" class="col-1 col-form-label">الإسم : </label>
                                           {{ $meetingAgenda->name_1 }}
                                        </div>
                                    </div>

                                </th>
                            @endif
                            @if ($meetingAgenda->status == 'confirmed' && Auth::user()->hasRole('Admin'))
                                <th class=" w-50 text-center col-2 ">
                                    <div class="" style="text-align:center ;">
                                        <label for="" class=""
                                            style="text-align:center;font-size:large;font-weight: bolder;">المدير
                                            العام:</label>
                                    </div>
                                    <div class="form-group row w-10 text-center">
                                        <div class="col-6">
                                            <label for="" class="col-1 col-form-label">الإسم : </label>
                                            {{ $meetingAgenda->name_2 }}
                                        </div>
                                    </div>
                                </th>
                            @endif
                            @if (Auth::user()->hasRole('SuperAdmin'))
                                <th class=" w-50 text-center col-2 ">
                                    <div class="" style="text-align:center ;">
                                        <label for="" class=""
                                            style="font-size:large;font-weight: bolder;">ممثل الإدارة :</label>
                                    </div>
                                    <div class="form-group row w-10 text-center">
                                        <div class="col-6">
                                            <label for="" class="col-1 col-form-label">الإسم : </label>
                                            {{ $meetingAgenda->name_1 }}
                                        </div>
                                    </div>

                                </th>
                                <th class=" w-50 text-center col-2 ">
                                    <div class="" style="text-align:center ;">
                                        <label for="" class=""
                                            style="text-align:center;font-size:large;font-weight: bolder;">المدير
                                            العام:</label>
                                    </div>
                                    <div class="form-group row w-10 text-center">
                                        <div class="col-6">
                                            <label for="" class="col-1 col-form-label">الإسم :</label>
                                          {{ $meetingAgenda->name_2 }}
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
                                    {{ $meetingAgenda->company_name }}
                                </div>

                            </th>
                            <th>
                                <div class="" style="text-align:start ;">
                                   {{ $meetingAgenda->date2 }}
                                </div>

                            </th>
                            <th>
                                <div class="" style="text-align:start ;">
                                  {{ $meetingAgenda->date3 }}
                                </div>

                            </th>
                            <th>
                                <div class="" style="text-align:start ;">
                                    <label for="" class=""
                                        style="text-align: center;font-size:large;font-weight: bolder;"> مدة
                                        الحفظ : سنتان </label>
                                </div>

                            </th>
                            <th>
                                <div class="" style="text-align:start ;">
                                    <label for="" class=""
                                        style="text-align: center;font-size:large;font-weight: bolder;"> رقم
                                        الصفحة : 1 /1</label>
                                </div>
                            </th>
                            <th>
                                <div class="" style="text-align:start ;">
                                    <label for="" class=""
                                        style="text-align: center;font-size:large;font-weight: bolder;"> رقم
                                        الوثيقة : QA–F-13 </label>
                                </div>
                            </th>
                        </tr>
                    </thead>
                </table>
            </div>








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
                float: left;
                display: inline-table;
            }
        </style>
        <script>
  window.addEventListener("load", window.print());
</script>
    @stop
