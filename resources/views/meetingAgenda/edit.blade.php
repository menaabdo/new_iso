@extends('layouts.master')

@section('content')

    <div class="card">
        <div class="card-body">
            <h3 style="margin-top:85px;">أجندة إجتماع مراجعة الإدارة</h3>
            <hr>
        </div>
        <form action="{{ route('meetingAgenda.update', $meetingAgenda->id) }}" method="post" enctype="multipart/form-data"
            id="fo1">
            @method('PUT')
            {{ csrf_field() }}

            <div class="container p-4">
                <div style="" class="w-100 text-center my-4">
                    <h2>أجندة إجتماع مراجعة الإدارة</h2>
                    <hr class="w-100">
                </div>
                <div class="form-group row w-10">
                    <h3 for="" class="col-2 col-form-label">رقم الاجتماع: </h3>
                    <div class="col-2">
                        <input type="text" class="form-control" placeholder="  ......" name="meeting_num"
                            value="{{ $meetingAgenda->meeting_num }}">
                    </div>
                    <div id="mainDiv" class="col-7" style=" margin-right:500px;">
                        <h4 style=" color:blue;">CO LOGO</h4>
                        <hr width="50%" size="20" color="blue">
                        <img src="{{ asset($meetingAgenda->logo) }}" height=180px width=210px; />
                        @if ($meetingAgenda->status == 'pending' && Auth::user()->hasRole('Employee'))
                            <input type="file" id="img" name="logo" accept="image/*">
                        @endif

                        @if (($meetingAgenda->status == 'inProgress' && Auth::user()->hasRole('Admin')) ||
                            ($meetingAgenda->status == 'pending' && Auth::user()->hasRole('Admin')))
                            <input type="file" id="img" name="logo" accept="image/*">
                        @endif
                        @if (($meetingAgenda->status == 'inProgress' && Auth::user()->hasRole('SuperAdmin')) ||
                            ($meetingAgenda->status == 'pending' && Auth::user()->hasRole('SuperAdmin')) ||
                            ($meetingAgenda->status == 'confirmed' && Auth::user()->hasRole('SuperAdmin')))
                            <input type="file" id="img" name="logo" accept="image/*">
                        @endif
                    </div>
                </div>

                <div class=" form-group row w-200 text-center">
                    <label for="" class="col-2 col-form-label text-left">التاريخ:</label>
                    <div class="col-2">
                        <input type="date" class="form-control" name="date_1" value="{{ $meetingAgenda->date_1 }}">
                    </div>

                    <label for="" class="col-2 col-form-label text-left"> نوع الإجتماع:</label>
                    <div class="col-2">
                        <input type="text" class="form-control" name="meeting_kind"
                            value="{{ $meetingAgenda->meeting_kind }}">
                    </div>
                </div>
                <hr width="1300px;" size="20" color="black">
                <div class="form-group row w-100 text-right" style="text-align:center ;">
                    <table class="table">
                        <tr>
                            <th style="background-color:rgb(227, 252, 160)">مكان الأنعقاد</th>
                            <th><input class="form-control" type="text" name="meeting_place"
                                    value="{{ $meetingAgenda->meeting_place }}"></th>
                            <th style="background-color:rgb(227, 252, 160)">مدة الاجتماع</th>
                            <th><input class="form-control" type="text" name="meeting_period"
                                    value="{{ $meetingAgenda->meeting_period }}"></th>
                        </tr>
                        <tr>
                            <th style="background-color:rgb(227, 252, 160)">التوقيت</th>
                            <th><input class="form-control" type="text" name="meeting_time"
                                    value="{{ $meetingAgenda->meeting_time }}"></th>
                            <th style="background-color:rgb(227, 252, 160)">مقرر الاجتماع</th>
                            <th><input class="form-control" type="text" name="meeting_schedule"
                                    value="{{ $meetingAgenda->meeting_schedule }}"></th>
                        </tr>
                    </table>
                </div>
                <div class="form-group row w-100 text-right">
                    <label for="" class="col-2 col-form-label">الغرض من الاجتماع :</label>
                    <div class="col-12">
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
                            @if ($meetingAgenda->status == 'pending' && Auth::user()->hasRole('Employee'))
                                <th>م</th>
                            @endif
                            @if (($meetingAgenda->status == 'inProgress' && Auth::user()->hasRole('Admin')) ||
                                ($meetingAgenda->status == 'pending' && Auth::user()->hasRole('Admin')))
                                <th>م</th>
                            @endif
                            @if (($meetingAgenda->status == 'inProgress' && Auth::user()->hasRole('SuperAdmin')) ||
                                ($meetingAgenda->status == 'pending' && Auth::user()->hasRole('SuperAdmin')) ||
                                ($meetingAgenda->status == 'confirmed' && Auth::user()->hasRole('SuperAdmin')))
                                <th>م</th>
                            @endif
                            <th>الاسم</th>
                            <th>الوظيفة</th>

                        </tr>
                        @if (count($meetingAgenda->attendance) > 0)
                            @foreach ($meetingAgenda->attendance as $key => $intr)
                                <tr id="attendance-{{ $key }}">
                                    @if ($meetingAgenda->status == 'pending' && Auth::user()->hasRole('Employee'))
                                        <td class="text-center end-td ">
                                            <button type="button" title="Remove"
                                                onclick="removeRow({{ $key }},{{ $intr->id }})"
                                                @if ($key == 0) disabled="disabled" @endif
                                                class="btn btn-danger btn-option">
                                                <i class="fa fa-minus-circle"></i>
                                            </button>
                                        </td>
                                    @endif
                                    @if (($meetingAgenda->status == 'inProgress' && Auth::user()->hasRole('Admin')) ||
                                        ($meetingAgenda->status == 'pending' && Auth::user()->hasRole('Admin')))
                                        <td class="text-center end-td ">
                                            <button type="button" title="Remove"
                                                onclick="removeRow({{ $key }},{{ $intr->id }})"
                                                @if ($key == 0) disabled="disabled" @endif
                                                class="btn btn-danger btn-option">
                                                <i class="fa fa-minus-circle"></i>
                                            </button>
                                        </td>
                                    @endif
                                    @if (($meetingAgenda->status == 'inProgress' && Auth::user()->hasRole('SuperAdmin')) ||
                                        ($meetingAgenda->status == 'pending' && Auth::user()->hasRole('SuperAdmin')) ||
                                        ($meetingAgenda->status == 'confirmed' && Auth::user()->hasRole('SuperAdmin')))
                                        <td class="text-center end-td ">
                                            <button type="button" title="Remove"
                                                onclick="removeRow({{ $key }},{{ $intr->id }})"
                                                @if ($key == 0) disabled="disabled" @endif
                                                class="btn btn-danger btn-option">
                                                <i class="fa fa-minus-circle"></i>
                                            </button>
                                        </td>
                                    @endif
                                    <th><input class="form-control" type="text"
                                            name="attendance[{{ $key }}][name]" value="{{ $intr->name }}">
                                    </th>
                                    <th><input class="form-control" type="text"
                                            name="attendance[{{ $key }}][job]" value="{{ $intr->job }}">
                                    </th>
                                </tr>
                            @endforeach
                            @if ($meetingAgenda->status == 'pending' && Auth::user()->hasRole('Employee'))
                                <tr class="datatable-row datatable-row-even" id="increment">
                                    <td class="text-center end-td ">
                                        <button type="button" class="btn btn-primary add_new"
                                            id="btn-{{ count($meetingAgenda->attendance) - 1 }}"
                                            onclick="appendRow({{ count($meetingAgenda->attendance) - 1 }})"><i
                                                class="fa fa-plus-circle"></i></button>
                                    </td>
                                </tr>
                            @endif
                            @if (($meetingAgenda->status == 'inProgress' && Auth::user()->hasRole('Admin')) ||
                                ($meetingAgenda->status == 'pending' && Auth::user()->hasRole('Admin')))
                                <tr class="datatable-row datatable-row-even" id="increment">
                                    <td class="text-center end-td ">
                                        <button type="button" class="btn btn-primary add_new"
                                            id="btn-{{ count($meetingAgenda->attendance) - 1 }}"
                                            onclick="appendRow({{ count($meetingAgenda->attendance) - 1 }})"><i
                                                class="fa fa-plus-circle"></i></button>
                                    </td>
                                </tr>
                            @endif
                            @if (($meetingAgenda->status == 'inProgress' && Auth::user()->hasRole('SuperAdmin')) ||
                                ($meetingAgenda->status == 'pending' && Auth::user()->hasRole('SuperAdmin')) ||
                                ($meetingAgenda->status == 'confirmed' && Auth::user()->hasRole('SuperAdmin')))
                                <tr class="datatable-row datatable-row-even" id="increment">
                                    <td class="text-center end-td ">
                                        <button type="button" class="btn btn-primary add_new"
                                            id="btn-{{ count($meetingAgenda->attendance) - 1 }}"
                                            onclick="appendRow({{ count($meetingAgenda->attendance) - 1 }})"><i
                                                class="fa fa-plus-circle"></i></button>
                                    </td>
                                </tr>
                            @endif
                        @else
                            <tr id="attendance-0">
                                <th class="text-center end-td ">
                                    <button type="button" title="Remove" disabled="disabled"
                                        class="btn btn-danger btn-option">
                                        <i class="fa fa-minus-circle"></i>
                                    </button>
                                </th>
                                <th><input class="form-control" type="text" name="attendance[0][name]"></th>
                                <th><input class="form-control" type="text" name="attendance[0][job]"></th>
                            </tr>

                            <tr class="datatable-row datatable-row-even">
                                <td class="text-center end-td " id="increment">
                                    <button type="button" class="btn btn-primary add_new" id="btn-0"
                                        onclick="appendRow(0)"><i class="fa fa-plus-circle"></i></button>
                                </td>
                            </tr>
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
                            @if ($meetingAgenda->status == 'pending' && Auth::user()->hasRole('Employee'))
                                <th>م</th>
                            @endif
                            @if (($meetingAgenda->status == 'inProgress' && Auth::user()->hasRole('Admin')) ||
                                ($meetingAgenda->status == 'pending' && Auth::user()->hasRole('Admin')))
                                <th>م</th>
                            @endif
                            @if (($meetingAgenda->status == 'inProgress' && Auth::user()->hasRole('SuperAdmin')) ||
                                ($meetingAgenda->status == 'pending' && Auth::user()->hasRole('SuperAdmin')) ||
                                ($meetingAgenda->status == 'confirmed' && Auth::user()->hasRole('SuperAdmin')))
                                <th>م</th>
                            @endif
                            <th class="col-6 col-form-label">الموضوعات</th>
                            <th>المسئول</th>
                            <th>الوقت المخصص</th>
                        </tr>
                        @if (count($meetingAgenda->topic) > 0)
                            @foreach ($meetingAgenda->topic as $key => $topic)
                                <tr id="topics-{{ $key }}">
                                    @if ($meetingAgenda->status == 'pending' && Auth::user()->hasRole('Employee'))
                                        <td class="text-center end-td ">
                                            <button type="button" title="Remove"
                                                onclick="removeRow2({{ $key }},{{ $topic->id }})"
                                                @if ($key == 0) disabled="disabled" @endif
                                                class="btn btn-danger btn-option">
                                                <i class="fa fa-minus-circle"></i>
                                            </button>
                                        </td>
                                    @endif
                                    @if (($meetingAgenda->status == 'inProgress' && Auth::user()->hasRole('Admin')) ||
                                        ($meetingAgenda->status == 'pending' && Auth::user()->hasRole('Admin')))
                                        <td class="text-center end-td ">
                                            <button type="button" title="Remove"
                                                onclick="removeRow2({{ $key }},{{ $topic->id }})"
                                                @if ($key == 0) disabled="disabled" @endif
                                                class="btn btn-danger btn-option">
                                                <i class="fa fa-minus-circle"></i>
                                            </button>
                                        </td>
                                    @endif
                                    @if (($meetingAgenda->status == 'inProgress' && Auth::user()->hasRole('SuperAdmin')) ||
                                        ($meetingAgenda->status == 'pending' && Auth::user()->hasRole('SuperAdmin')) ||
                                        ($meetingAgenda->status == 'confirmed' && Auth::user()->hasRole('SuperAdmin')))
                                        <td class="text-center end-td ">
                                            <button type="button" title="Remove"
                                                onclick="removeRow2({{ $key }},{{ $topic->id }})"
                                                @if ($key == 0) disabled="disabled" @endif
                                                class="btn btn-danger btn-option">
                                                <i class="fa fa-minus-circle"></i>
                                            </button>
                                        </td>
                                    @endif
                                    <th class="col-6 col-form-label"><input class="form-control" type="text"
                                            name="topics[{{ $key }}][topic]" value="{{ $topic->topic }}"></th>
                                    <th><input class="form-control" type="text"
                                            name="topics[{{ $key }}][administrator]"
                                            value="{{ $topic->administrator }}"></th>
                                    <th><input class="form-control" type="text"
                                            name="topics[{{ $key }}][time]" value="{{ $topic->time }}"></th>
                                </tr>
                            @endforeach
                            @if ($meetingAgenda->status == 'pending' && Auth::user()->hasRole('Employee'))
                                <tr class="datatable-row datatable-row-even">
                                    <td class="text-center end-td " id="increment2">
                                        <button type="button" class="btn btn-primary add_new"
                                            id="btn2-{{ count($meetingAgenda->topic) - 1 }}"
                                            onclick="appendRow2({{ count($meetingAgenda->topic) - 1 }})"><i
                                                class="fa fa-plus-circle"></i></button>
                                    </td>
                                </tr>
                            @endif
                            @if (($meetingAgenda->status == 'inProgress' && Auth::user()->hasRole('Admin')) ||
                                ($meetingAgenda->status == 'pending' && Auth::user()->hasRole('Admin')))
                                <tr class="datatable-row datatable-row-even">
                                    <td class="text-center end-td " id="increment2">
                                        <button type="button" class="btn btn-primary add_new"
                                            id="btn2-{{ count($meetingAgenda->topic) - 1 }}"
                                            onclick="appendRow2({{ count($meetingAgenda->topic) - 1 }})"><i
                                                class="fa fa-plus-circle"></i></button>
                                    </td>
                                </tr>
                            @endif
                            @if (($meetingAgenda->status == 'inProgress' && Auth::user()->hasRole('SuperAdmin')) ||
                                ($meetingAgenda->status == 'pending' && Auth::user()->hasRole('SuperAdmin')) ||
                                ($meetingAgenda->status == 'confirmed' && Auth::user()->hasRole('SuperAdmin')))
                                <tr class="datatable-row datatable-row-even">
                                    <td class="text-center end-td " id="increment2">
                                        <button type="button" class="btn btn-primary add_new"
                                            id="btn2-{{ count($meetingAgenda->topic) - 1 }}"
                                            onclick="appendRow2({{ count($meetingAgenda->topic) - 1 }})"><i
                                                class="fa fa-plus-circle"></i></button>
                                    </td>
                                </tr>
                            @endif
                        @else
                            <tr id="topics-0">
                                <th class="text-center end-td ">
                                    <button type="button" title="Remove" disabled="disabled"
                                        class="btn btn-danger btn-option">
                                        <i class="fa fa-minus-circle"></i>
                                    </button>
                                </th>
                                <th class="col-6 col-form-label"><input class="form-control" type="text"
                                        name="topics[0][topic]">
                                </th>
                                <th><input class="form-control" type="text" name="topics[0][administrator]"></th>
                                <th><input class="form-control" type="text" name="topics[0][time]"></th>
                            </tr>
                            <tr class="datatable-row datatable-row-even">
                                <td class="text-center end-td " id="increment2">
                                    <button type="button" class="btn btn-primary add_new" id="btn2-0"
                                        onclick="appendRow2(0)"><i class="fa fa-plus-circle"></i></button>
                                </td>
                            </tr>
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
                                        <label for="" class="col-1 col-form-label">الإسم </label>
                                        <div class="col-6">
                                            <input type="text" class="form-control" readonly placeholder="  ......"
                                                name="name_1" value="{{ $meetingAgenda->name_1 }}">
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
                                        <label for="" class="col-1 col-form-label">الإسم </label>
                                        <div class="col-6">
                                            <input type="text" class="form-control" readonly placeholder="  ......"
                                                name="name_1" value="{{ $meetingAgenda->name_1 }}">
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
                                        <label for="" class="col-1 col-form-label">الإسم </label>
                                        <div class="col-6">
                                            <input type="text" class="form-control" placeholder="  ......" readonly
                                                name="name_2" value="{{ $meetingAgenda->name_2 }}">
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
                                        <label for="" class="col-1 col-form-label">الإسم </label>
                                        <div class="col-6">
                                            <input type="text" class="form-control" placeholder="  ......"
                                                name="name_1" value="{{ $meetingAgenda->name_1 }}">
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
                                        <label for="" class="col-1 col-form-label">الإسم </label>
                                        <div class="col-6">
                                            <input type="text" class="form-control" placeholder="  ......" readonly
                                                name="name_2" value="{{ $meetingAgenda->name_2 }}">
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
                                        <label for="" class="col-1 col-form-label">الإسم </label>
                                        <div class="col-6">
                                            <input type="text" class="form-control" placeholder="  ......"
                                                name="name_1" value="{{ $meetingAgenda->name_1 }}">
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
                                        <label for="" class="col-1 col-form-label">الإسم </label>
                                        <div class="col-6">
                                            <input type="text" class="form-control" placeholder="  ......"
                                                name="name_2" value="{{ $meetingAgenda->name_2 }}">
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
                                    <input class="form-control" type="text" name="company_name"
                                        placeholder="اسم الشركة  :" value="{{ $meetingAgenda->company_name }}">
                                </div>

                            </th>
                            <th>
                                <div class="" style="text-align:start ;">
                                    <input class="form-control" type="text" name="date2"
                                        placeholder="تاريخ الإصدار   :" onfocus="(this.type='date')"
                                        onblur="(this.type='text')" value="{{ $meetingAgenda->date2 }}">
                                </div>

                            </th>
                            <th>
                                <div class="" style="text-align:start ;">
                                    <input class="form-control" type="text" name="date3"
                                        placeholder="تاريخ التعديل :" onfocus="(this.type='date')"
                                        onblur="(this.type='text')" value="{{ $meetingAgenda->date3 }}">
                                </div>

                            </th>
                            <th>
                                <div class="" style="text-align:start ;">
                                    <label for="" class=""
                                        style="text-align: center;font-size:large;font-weight: bolder;"> مدة
                                        الحفظ :
                                        سنتان </label>
                                </div>

                            </th>
                            <th>
                                <div class="" style="text-align:start ;">
                                    <label for="" class=""
                                        style="text-align: center;font-size:large;font-weight: bolder;"> رقم
                                        الصفحة : 1 /
                                        1</label>
                                </div>
                            </th>
                            <th>
                                <div class="" style="text-align:start ;">
                                    <label for="" class=""
                                        style="text-align: center;font-size:large;font-weight: bolder;"> رقم
                                        الوثيقة : QA – F
                                        - 13 </label>
                                </div>
                            </th>
                        </tr>
                    </thead>
                </table>
            </div>
            @if ($meetingAgenda->status == 'pending' && Auth::user()->hasRole('Employee'))
                <div class="form-group">
                    <button style="border-radius:20px;margin: 50px; width:10% ; height: 5%;" type="submit"
                        class="btn btn-primary"><i class="fas fa-save" style="width:15% ; height: 20%;">تعديل
                        </i></button>
                </div>
            @elseif(($meetingAgenda->status == 'inProgress' && Auth::user()->hasRole('Admin')) ||
                ($meetingAgenda->status == 'pending' && Auth::user()->hasRole('Admin')))
                <div class="form-group">
                    <button style="border-radius:20px;margin: 50px; width:10% ; height: 5%;" type="submit"
                        class="btn btn-primary"><i class="fas fa-save" style="width:15% ; height: 20%;">تعديل
                        </i></button>
                </div>
            @elseif(($meetingAgenda->status == 'inProgress' && Auth::user()->hasRole('SuperAdmin')) ||
                ($meetingAgenda->status == 'pending' && Auth::user()->hasRole('SuperAdmin')) ||
                ($meetingAgenda->status == 'confirmed' && Auth::user()->hasRole('SuperAdmin')))
                <div class="form-group">
                    <button style="border-radius:20px;margin: 50px; width:10% ; height: 5%;" type="submit"
                        class="btn btn-primary"><i class="fas fa-save" style="width:15% ; height: 20%;">تعديل
                        </i></button>
                </div>
            @endif
        </form>


        <script>
            window.$rows = [];

            function appendRow(num) {
                //     $rows.push(obj{
                //         "name":'',
                //         "job":''
                //     })-1;
                // }
                $new_number = parseInt(num) + 1;
                $("#increment").remove();
                $appended_text = `<tr  id="attendance-${$new_number}">          
                            <td class="text-center end-td ">
                                    <button type="button" title="Remove" onclick="removeRow(${$new_number})"
                                                class="btn btn-danger btn-option">
                                                <i class="fa fa-minus-circle"></i>
                                    </button>
                            </td>
                            <th><input class="form-control" type="text" name="attendance[${$new_number}][name]" ></th>
                            <th><input class="form-control" type="text" name="attendance[${$new_number}][job]"></th>   
                          
                            </tr>
                            <tr class="datatable-row datatable-row-even"  id="increment">
                    <td class="text-center end-td ">
                        <button type="button" class="btn btn-primary add_new" id="btn-${$new_number}" onclick="appendRow(${$new_number})"><i class="fa fa-plus-circle"></i></button>
                    </td>
                </tr>`;


                $("#attendance_table").append($appended_text);
                // $($appended_text).insertAfter(`#attendance-${num}`);

                // if (!document.getElementById(`attendance-${num}`)) {
                //     $($appended_text).insertAfter(`#attendance-0`);
                // }
                // $(`#btn-${num}`).remove();
                //$("#increment").append(`<button type="button" class="btn btn-primary add_new" id="btn-${$new_number}" onclick="appendRow(${$new_number})"><i class="fa fa-plus-circle"></i></button></td>`);
            }

            function removeRow(num, id) {
                if (id != 0) {
                    $("#attendance-0").append(`<input type="hidden" name="ids[${num}]" value="${id}">`);
                }
                $(`#attendance-${num}`).remove();

            }




            function appendRow2(num) {
                $new_number = parseInt(num) + 1;
                $appended_text = ` <tr  id="topics-${$new_number}">
                                         
                                          <td class="text-center end-td ">
                                                    <button type="button" title="Remove" onclick="removeRow2(${$new_number})"
                                                              class="btn btn-danger btn-option">
                                                              <i class="fa fa-minus-circle"></i>
                                                    </button>
                                          </td>
                                          <th class="col-6 col-form-label"><input class="form-control" type="text" name="topics[${$new_number}][topic]"></th>
                                            <th><input class="form-control" type="text" name="topics[${$new_number}][administrator]"></th>
                                            <th><input class="form-control" type="text" name="topics[${$new_number}][time]"></th>
                            
                                           </tr>`;
                $($appended_text).insertAfter(`#topics-${num}`);
                if (!document.getElementById(`topics-${num}`)) {
                    $($appended_text).insertAfter(`#topics-0`);
                }

                $(`#btn2-${num}`).remove();
                $("#increment2").append(
                    `<button type="button" class="btn btn-primary add_new" id="btn2-${$new_number}" onclick="appendRow2(${$new_number})"><i class="fa fa-plus-circle"></i></button></td>`
                );


            }

            function removeRow2(num, id) {
                if (id != 0) {
                    $("#topics-0").append(`<input type="hidden" name="ids[${num}]" value="${id}">`);
                }
                $(`#topics-${num}`).remove();
            }
        </script>




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
    @stop
