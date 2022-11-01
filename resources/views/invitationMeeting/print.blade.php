@extends('layouts.print')
@section('content')
<div class="card">
    <div class="container p-4">
        <div style="" class="w-100 text-center my-4">
            <h2>دعوة لإجتماع مراجعة الإدارة</h2>
            <hr class="w-100">
        </div>
        <img src="{{ public_path($invitationMeeting->logo) }}" style="float: left" width="100px" height="50px" />
        <div class="form-group row w-10">
            <h3 for="" class="col-4">نبلغ سيادتكم بإجتماع مراجعة الإدراة لنظام الجودة : </h3>
        </div>

        <div class=" form-group row w-200">
            <label for="" class=" col-form-label text-left"> تاريخ الاجتماع :</label>
                {{ $invitationMeeting->date_1 }}
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <label for="" class="col-form-label">اليوم :</label>
                {{ $invitationMeeting->day }}
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <label for="" class="col-form-label">مكان الإجتماع :</label>
                {{ $invitationMeeting->place_meeting }}
            </div>
        </div>
        <hr width="1300px;" size="20" color="black">
        <div class="form-group row w-100 text-right">
            <h2 for="" class="col-2 col-form-label">أسماء الحضور :</h2>
        </div>

        <div class="form-group row w-100 text-right" style="text-align:center ;">
            <table class="table">
                <tr style="background-color:rgb(235, 252, 160)">

                    <th>الاسم</th>
                    <th>الوظيفة</th>
                    <th>تاريخ الإستلام</th>
                </tr>
                @if(count($invitationMeeting->invetationMeeting)>0)
                @foreach($invitationMeeting->invetationMeeting as $key => $intr)
                <tr>
                    <th>{{$intr->name_1}}</th>
                    <th>{{$intr->job_1}}</th>
                    <th>{{$intr->recive_date}}</th>
                </tr>
                @endforeach
                @endif
            </table>
        </div>
        <br>
        <table style=" margin-right:200px;">
            <thead>
                <tr>
                    @if ($invitationMeeting->status == 'confirmed' && Auth::user()->hasRole('Employee') || $invitationMeeting->status == 'confirmed' && Auth::user()->hasRole('Admin') )
                    <th>
                        <div class="" style="text-align:center ;">
                            <label for="" class="" style="font-size:large;font-weight: bolder;">ممثل الإدارة :</label>
                        </div>
                        <div class="form-group row w-20 text-left">
                            <div class="col-6">
                                <label for="" class="col-5 col-form-label">الإسم : </label>
                                {{ $invitationMeeting->name_manager}}
                            </div>
                        </div>
                    </th>
                    @endif
                    @if (Auth::user()->hasRole('SuperAdmin'))
                    <th>
                        <div class="" style="text-align:center ;">
                            <label for="" class="" style="font-size:large;font-weight: bolder;">ممثل الإدارة :</label>
                        </div>
                        <div class="form-group row w-20 text-left">
                            <div class="col-6">
                                <label for="" class="col-5 col-form-label">الإسم : </label>
                                {{ $invitationMeeting->name_manager}}
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
                            {{ $invitationMeeting->company_name }}
                        </div>

                    </th>
                    <th>
                        <div class="" style="text-align:start ;">
                            {{ $invitationMeeting->date2 }}
                        </div>

                    </th>
                    <th>
                        <div class="" style="text-align:start ;">
                            {{ $invitationMeeting->date3 }}
                        </div>

                    </th>
                    <th>
                        <div class="" style="text-align:start ;">
                            <label for="" class="" style="text-align: center;font-size:large;font-weight: bolder;"> مدة
                                الحفظ : سنتان </label>
                        </div>

                    </th>
                    <th>
                        <div class="" style="text-align:start ;">
                            <label for="" class="" style="text-align: center;font-size:large;font-weight: bolder;"> رقم
                                الصفحة : 1 / 1</label>
                        </div>
                    </th>
                    <th>
                        <div class="" style="text-align:start ;">
                            <label for="" class="" style="text-align: center;font-size:large;font-weight: bolder;"> رقم
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
        border-bottom: 2px solid rgb(214, 206, 206);
    }

    table,
    th,
    td,
    tr {
        border: 1px solid rgb(214, 206, 206);
        border-bottom: 2px solid rgb(214, 206, 206);
        border-top: 2px solid rgb(214, 206, 206);
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
