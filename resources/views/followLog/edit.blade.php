@extends('layouts.master')

@section('content')

    <div class="card">
        <div class="card-body">
            <h3 style="margin-top:85px;">سجل متابعة قرارات مراجعة الإدارة العليا</h3>
            <hr>
        </div>
        <form action="{{ route('followLog.update', $followLog->id) }}" method="post" enctype="multipart/form-data"
            id="fo1">
            @method('PUT')
            {{ csrf_field() }}
            <div class="container p-4">
                <div style="" class="w-100 text-center my-4">
                    <h2>سجل متابعة قرارات مراجعة الإدارة العليا</h2>
                    <hr class="w-100" color="black">
                </div>

                <div class="form-group row">
                    <div id="mainDiv" style=" margin-right:1000px;">
                        <h4 style=" color:blue;">CO LOGO</h4>
                        <hr width="50%" size="20" color="blue">
                        <img src="{{ asset($followLog->logo) }}" height=180px width=210px; />
                        @if ($followLog->status == 'pending' && Auth::user()->hasRole('Employee'))
                            <input type="file" id="img" name="logo" accept="image/*">
                        @endif

                        @if (($followLog->status == 'inProgress' && Auth::user()->hasRole('Admin')) ||
                            ($followLog->status == 'pending' && Auth::user()->hasRole('Admin')))
                            <input type="file" id="img" name="logo" accept="image/*">
                        @endif
                        @if (($followLog->status == 'inProgress' && Auth::user()->hasRole('SuperAdmin')) ||
                            ($followLog->status == 'pending' && Auth::user()->hasRole('SuperAdmin')) ||
                            ($followLog->status == 'confirmed' && Auth::user()->hasRole('SuperAdmin')))
                            <input type="file" id="img" name="logo" accept="image/*">
                        @endif
                    </div>
                    <h3 for="" class="col-1 col-form-label">نوع الاجتماع : </h3>
                    <div class="col-1 col-form-label">
                        <input type="radio" name="planing" value="planned" <?php if ($followLog->planing == 'planned') {
                            echo 'checked="checked"';
                        } ?>>
                    </div>
                    <h2 for="" class="col-3 col-form-label" style="text-align:right;">مخطط </h2>
                    <div class="col-1 col-form-label">
                        <input type="radio" name="planing" value="not_planned" <?php if ($followLog->planing == 'not_planned') {
                            echo 'checked="checked"';
                        } ?>>
                    </div>
                    <h2 for="" class="col-3 col-form-label" style="text-align:right;">غير مخطط </h2>

                    <h2 for="" style="text-align:right;" class="col-4 col-form-label">رقم الأجتماع </h2>
                    <div class="col-3 col-form-label">
                        <input type="text" name="meeting_num" value="{{ $followLog->meeting_num }}">
                    </div>

                    <h2 for="" style="text-align:left;" class="col-3 col-form-label">التاريخ : </h2>
                    <div class="col-1 col-form-label">
                        <input type="date" name="meetting_date" value="{{ $followLog->meetting_date }}">
                    </div>


                </div>
                <div class="form-group row w-100 text-right" style="text-align:center;">
                    <table class="table">
                        <tr style="background-color:rgb(235, 252, 160); text-align:center;">
                            @if ($followLog->status == 'pending' && Auth::user()->hasRole('Employee'))
                                <th scope="col" rowspan="2">م</th>
                            @endif
                            @if (($followLog->status == 'inProgress' && Auth::user()->hasRole('Admin')) ||
                                ($followLog->status == 'pending' && Auth::user()->hasRole('Admin')))
                                <th scope="col" rowspan="2">م</th>
                            @endif
                            @if (($followLog->status == 'inProgress' && Auth::user()->hasRole('SuperAdmin')) ||
                                ($followLog->status == 'pending' && Auth::user()->hasRole('SuperAdmin')) ||
                                ($followLog->status == 'confirmed' && Auth::user()->hasRole('SuperAdmin')))
                                <th scope="col" rowspan="2">م</th>
                            @endif
                            <th scope="col" rowspan="2">الموضوع</th>
                            <th scope="col" rowspan="2">القرار المتخذ</th>
                            <th scope="col" rowspan="2">المسئول</th>
                            <th scope="col" rowspan="2">التاريخ المخطط</th>
                            <th scope="col" colspan="2">متابعة التنفيذ</th>
                            <th scope="col" rowspan="2">الملاحظات</th>
                        </tr>
                        <tr style="background-color:rgb(235, 252, 160); text-align:center;">
                            <th scope="col"> تم</th>
                            <th scope="col">لم يتم</th>
                        </tr>
                        @if (count($followLog->follow) > 0)
                            @foreach ($followLog->follow as $key => $intr)
                                <tr id="follow-{{ $key }}">
                                    @if ($followLog->status == 'pending' && Auth::user()->hasRole('Employee'))
                                        <td class="text-center end-td ">
                                            <button type="button" title="Remove"
                                                onclick="removeRow({{ $key }},{{ $intr->id }})"
                                                @if ($key == 0) disabled="disabled" @endif
                                                class="btn btn-danger btn-option">
                                                <i class="fa fa-minus-circle"></i>
                                            </button>
                                        </td>
                                    @endif
                                    @if (($followLog->status == 'inProgress' && Auth::user()->hasRole('Admin')) ||
                                        ($followLog->status == 'pending' && Auth::user()->hasRole('Admin')))
                                        <td class="text-center end-td ">
                                            <button type="button" title="Remove"
                                                onclick="removeRow({{ $key }},{{ $intr->id }})"
                                                @if ($key == 0) disabled="disabled" @endif
                                                class="btn btn-danger btn-option">
                                                <i class="fa fa-minus-circle"></i>
                                            </button>
                                        </td>
                                    @endif
                                    @if (($followLog->status == 'inProgress' && Auth::user()->hasRole('SuperAdmin')) ||
                                        ($followLog->status == 'pending' && Auth::user()->hasRole('SuperAdmin')) ||
                                        ($followLog->status == 'confirmed' && Auth::user()->hasRole('SuperAdmin')))
                                        <td class="text-center end-td ">
                                            <button type="button" title="Remove"
                                                onclick="removeRow({{ $key }},{{ $intr->id }})"
                                                @if ($key == 0) disabled="disabled" @endif
                                                class="btn btn-danger btn-option">
                                                <i class="fa fa-minus-circle"></i>
                                            </button>
                                        </td>
                                    @endif
                                    <th>
                                        <textarea class="form-control" type="text" name="follow[{{ $key }}][subject]">{{ $intr->subject }}</textarea>
                                    </th>
                                    <th>
                                        <textarea class="form-control" type="text" name="follow[{{ $key }}][decision]">{{ $intr->decision }}</textarea>
                                    </th>
                                    <th><input class="form-control" type="text"
                                            name="follow[{{ $key }}][administrator]"
                                            value="{{ $intr->administrator }}"></th>
                                    <th><input class="form-control" type="date"
                                            name="follow[{{ $key }}][date]" value="{{ $intr->date }}"></th>
                                    <th><input style="width: 40px; height: 40px; " type="checkbox"
                                            name="follow[{{ $key }}][completed]" value="1"
                                            {{ $followLog->follow[$key]->completed == '1' ? 'checked' : '' }}></th>
                                    <th><input style="width: 40px; height: 40px; " type="checkbox"
                                            name="follow[{{ $key }}][not_completed]" value="1"
                                            {{ $followLog->follow[$key]->not_completed == '1' ? 'checked' : '' }}></th>
                                    <th>
                                        <textarea class="form-control" type="text" name="follow[{{ $key }}][notes]">{{ $intr->notes }}</textarea>
                                    </th>
                                </tr>
                            @endforeach
                            @if ($followLog->status == 'pending' && Auth::user()->hasRole('Employee'))
                                <tr class="datatable-row datatable-row-even">
                                    <td class="text-center end-td " id="increment">
                                        <button type="button" class="btn btn-primary add_new"
                                            id="btn-{{ count($followLog->follow) - 1 }}"
                                            onclick="appendRow({{ count($followLog->follow) - 1 }})"><i
                                                class="fa fa-plus-circle"></i></button>
                                    </td>
                                </tr>
                            @endif
                            @if (($followLog->status == 'inProgress' && Auth::user()->hasRole('Admin')) ||
                                ($followLog->status == 'pending' && Auth::user()->hasRole('Admin')))
                                <tr class="datatable-row datatable-row-even">
                                    <td class="text-center end-td " id="increment">
                                        <button type="button" class="btn btn-primary add_new"
                                            id="btn-{{ count($followLog->follow) - 1 }}"
                                            onclick="appendRow({{ count($followLog->follow) - 1 }})"><i
                                                class="fa fa-plus-circle"></i></button>
                                    </td>
                                </tr>
                            @endif
                            @if (($followLog->status == 'inProgress' && Auth::user()->hasRole('SuperAdmin')) ||
                                ($followLog->status == 'pending' && Auth::user()->hasRole('SuperAdmin')) ||
                                ($followLog->status == 'confirmed' && Auth::user()->hasRole('SuperAdmin')))
                                <tr class="datatable-row datatable-row-even">
                                    <td class="text-center end-td " id="increment">
                                        <button type="button" class="btn btn-primary add_new"
                                            id="btn-{{ count($followLog->follow) - 1 }}"
                                            onclick="appendRow({{ count($followLog->follow) - 1 }})"><i
                                                class="fa fa-plus-circle"></i></button>
                                    </td>
                                </tr>
                            @endif
                        @else
                            <tr id="follow-0">
                                <th class="text-center end-td ">
                                    <button type="button" title="Remove" disabled="disabled"
                                        class="btn btn-danger btn-option">
                                        <i class="fa fa-minus-circle"></i>
                                    </button>
                                </th>
                                <th>
                                    <textarea class="form-control" type="text" name="follow[0][subject]"></textarea>
                                </th>
                                <th>
                                    <textarea class="form-control" type="text" name="follow[0][decision]"></textarea>
                                </th>
                                <th><input class="form-control" type="text" name="follow[0][administrator]"></th>
                                <th><input class="form-control" type="date" name="follow[0][date]"></th>
                                <th><input style="width: 40px; height: 40px; " type="checkbox"
                                        name="follow[0][completed]" value="1"></th>
                                <th><input style="width: 40px; height: 40px; " type="checkbox"
                                        name="follow[0][not_completed]" value="1"></th>
                                <th>
                                    <textarea class="form-control" type="text" name="follow[0][notes]"></textarea>
                                </th>
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
                <table class="table">
                    <thead>
                        <tr>
                            @if (Auth::user()->hasRole('Employee'))
                                <th class=" text-center col-2 ">
                                    <div class="" style="text-align:center ;">
                                        <label for="" class=""
                                            style="text-align:center;font-size:large;font-weight: bolder;">إعداد:</label>
                                    </div>
                                    <div class="form-group row w-10 text-right">
                                        <label for="" class="col-3 col-form-label">الاسم: -</label>
                                        <div class="col-6">
                                            <input type="text" class="form-control" placeholder="  ......"
                                                name="name_1" value="{{ $followLog->name_1 }}">
                                        </div>
                                    </div>
                                    <div class="form-group row w-10 text-right">
                                        <label for="" class="col-3 col-form-label">الوظيفة: -</label>
                                        <div class="col-6">
                                            <input type="text" class="form-control" placeholder="  ......"
                                                name="job_1" value="{{ $followLog->job_1 }}">
                                        </div>
                                    </div>

                                </th>
                                @if ($followLog->status == 'inProgress' && Auth::user()->hasRole('Employee'))
                                    <th class="  text-center col-2 ">
                                        <div class="" style="text-align:center ;">
                                            <label for="" class=""
                                                style="text-align:center;font-size:large;font-weight: bolder;">مراجعة:</label>
                                        </div>
                                        <div class="form-group row w-10 text-right">
                                            <label for="" class="col-3 col-form-label">الاسم: -</label>
                                            <div class="col-6">
                                                <input type="text" class="form-control" readonly
                                                    placeholder="  ......" name="name_2"
                                                    value="{{ $followLog->name_2 }}">
                                            </div>
                                        </div>
                                        <div class="form-group row w-10 text-right">
                                            <label for="" class="col-3 col-form-label">الوظيفة: -</label>
                                            <div class="col-6">
                                                <input type="text" class="form-control" readonly
                                                    placeholder="  ......" name="job_2"
                                                    value="{{ $followLog->job_2 }}">
                                            </div>
                                        </div>

                                    </th>
                                @endif
                                @if ($followLog->status == 'confirmed' && Auth::user()->hasRole('Employee'))
                                    <th class="  text-center col-2 ">
                                        <div class="" style="text-align:center ;">
                                            <label for="" class=""
                                                style="text-align:center;font-size:large;font-weight: bolder;">مراجعة:</label>
                                        </div>
                                        <div class="form-group row w-10 text-right">
                                            <label for="" class="col-3 col-form-label">الاسم: -</label>
                                            <div class="col-6">
                                                <input type="text" class="form-control" readonly
                                                    placeholder="  ......" name="name_2"
                                                    value="{{ $followLog->name_2 }}">
                                            </div>
                                        </div>
                                        <div class="form-group row w-10 text-right">
                                            <label for="" class="col-3 col-form-label">الوظيفة: -</label>
                                            <div class="col-6">
                                                <input type="text" class="form-control" readonly
                                                    placeholder="  ......" name="job_2"
                                                    value="{{ $followLog->job_2 }}">
                                            </div>
                                        </div>

                                    </th>
                                    <th class="  text-center col-2 ">
                                        <div class="" style="text-align:center ;">
                                            <label for="" class=""
                                                style="text-align:center;font-size:large;font-weight: bolder;">إعتماد:</label>
                                        </div>
                                        <div class="form-group row w-10 text-right">
                                            <label for="" class="col-3 col-form-label">الاسم: -</label>
                                            <div class="col-6">
                                                <input type="text" class="form-control" readonly
                                                    placeholder="  ......" name="name_3"
                                                    value="{{ $followLog->name_3 }}">
                                            </div>
                                        </div>
                                        <div class="form-group row w-10 text-right">
                                            <label for="" class="col-3 col-form-label">الوظيفة: -</label>
                                            <div class="col-6">
                                                <input type="text" class="form-control" readonly
                                                    placeholder="  ......" name="job_3"
                                                    value="{{ $followLog->job_3 }}">
                                            </div>
                                        </div>

                                    </th>
                                @endif
                            @endif
                            @if (Auth::user()->hasRole('Admin'))
                                <th class=" text-center col-2 ">
                                    <div class="" style="text-align:center ;">
                                        <label for="" class=""
                                            style="text-align:center;font-size:large;font-weight: bolder;">إعداد:</label>
                                    </div>
                                    <div class="form-group row w-10 text-right">
                                        <label for="" class="col-3 col-form-label">الاسم: -</label>
                                        <div class="col-6">
                                            <input type="text" class="form-control" placeholder="  ......"
                                                name="name_1" value="{{ $followLog->name_1 }}">
                                        </div>
                                    </div>
                                    <div class="form-group row w-10 text-right">
                                        <label for="" class="col-3 col-form-label">الوظيفة: -</label>
                                        <div class="col-6">
                                            <input type="text" class="form-control" placeholder="  ......"
                                                name="job_1" value="{{ $followLog->job_1 }}">
                                        </div>
                                    </div>

                                </th>
                                <th class="  text-center col-2 ">
                                    <div class="" style="text-align:center ;">
                                        <label for="" class=""
                                            style="text-align:center;font-size:large;font-weight: bolder;">مراجعة:</label>
                                    </div>
                                    <div class="form-group row w-10 text-right">
                                        <label for="" class="col-3 col-form-label">الاسم: -</label>
                                        <div class="col-6">
                                            <input type="text" class="form-control" placeholder="  ......"
                                                name="name_2" value="{{ $followLog->name_2 }}">
                                        </div>
                                    </div>
                                    <div class="form-group row w-10 text-right">
                                        <label for="" class="col-3 col-form-label">الوظيفة: -</label>
                                        <div class="col-6">
                                            <input type="text" class="form-control" placeholder="  ......"
                                                name="job_2" value="{{ $followLog->job_2 }}">
                                        </div>
                                    </div>

                                </th>
                                @if ($followLog->status == 'confirmed' && Auth::user()->hasRole('Admin'))
                                    <th class="  text-center col-2 ">
                                        <div class="" style="text-align:center ;">
                                            <label for="" class=""
                                                style="text-align:center;font-size:large;font-weight: bolder;">إعتماد:</label>
                                        </div>
                                        <div class="form-group row w-10 text-right">
                                            <label for="" class="col-3 col-form-label">الاسم: -</label>
                                            <div class="col-6">
                                                <input type="text" class="form-control" readonly
                                                    placeholder="  ......" name="name_3"
                                                    value="{{ $followLog->name_3 }}">
                                            </div>
                                        </div>
                                        <div class="form-group row w-10 text-right">
                                            <label for="" class="col-3 col-form-label">الوظيفة: -</label>
                                            <div class="col-6">
                                                <input type="text" class="form-control" readonly
                                                    placeholder="  ......" name="job_3"
                                                    value="{{ $followLog->job_3 }}">
                                            </div>
                                        </div>

                                    </th>
                                @endif
                            @endif
                            @if (Auth::user()->hasRole('SuperAdmin'))
                                <th class=" text-center col-2 ">
                                    <div class="" style="text-align:center ;">
                                        <label for="" class=""
                                            style="text-align:center;font-size:large;font-weight: bolder;">إعداد:</label>
                                    </div>
                                    <div class="form-group row w-10 text-right">
                                        <label for="" class="col-3 col-form-label">الاسم: -</label>
                                        <div class="col-6">
                                            <input type="text" class="form-control" placeholder="  ......"
                                                name="name_1" value="{{ $followLog->name_1 }}">
                                        </div>
                                    </div>
                                    <div class="form-group row w-10 text-right">
                                        <label for="" class="col-3 col-form-label">الوظيفة: -</label>
                                        <div class="col-6">
                                            <input type="text" class="form-control" placeholder="  ......"
                                                name="job_1" value="{{ $followLog->job_1 }}">
                                        </div>
                                    </div>

                                </th>
                                <th class="  text-center col-2 ">
                                    <div class="" style="text-align:center ;">
                                        <label for="" class=""
                                            style="text-align:center;font-size:large;font-weight: bolder;">مراجعة:</label>
                                    </div>
                                    <div class="form-group row w-10 text-right">
                                        <label for="" class="col-3 col-form-label">الاسم: -</label>
                                        <div class="col-6">
                                            <input type="text" class="form-control" placeholder="  ......"
                                                name="name_2" value="{{ $followLog->name_2 }}">
                                        </div>
                                    </div>
                                    <div class="form-group row w-10 text-right">
                                        <label for="" class="col-3 col-form-label">الوظيفة: -</label>
                                        <div class="col-6">
                                            <input type="text" class="form-control" placeholder="  ......"
                                                name="job_2" value="{{ $followLog->job_2 }}">
                                        </div>
                                    </div>

                                </th>
                                <th class="  text-center col-2 ">
                                    <div class="" style="text-align:center ;">
                                        <label for="" class=""
                                            style="text-align:center;font-size:large;font-weight: bolder;">إعتماد:</label>
                                    </div>
                                    <div class="form-group row w-10 text-right">
                                        <label for="" class="col-3 col-form-label">الاسم: -</label>
                                        <div class="col-6">
                                            <input type="text" class="form-control" placeholder="  ......"
                                                name="name_3" value="{{ $followLog->name_3 }}">
                                        </div>
                                    </div>
                                    <div class="form-group row w-10 text-right">
                                        <label for="" class="col-3 col-form-label">الوظيفة: -</label>
                                        <div class="col-6">
                                            <input type="text" class="form-control" placeholder="  ......"
                                                name="job_3" value="{{ $followLog->job_3 }}">
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
                                        placeholder="اسم الشركة  :" value="{{ $followLog->company_name }}">
                                </div>

                            </th>
                            <th>
                                <div class="" style="text-align:start ;">
                                    <input class="form-control" type="text" name="date2"
                                        placeholder="تاريخ الإصدار   :" onfocus="(this.type='date')"
                                        onblur="(this.type='text')" value="{{ $followLog->date2 }}">
                                </div>

                            </th>
                            <th>
                                <div class="" style="text-align:start ;">
                                    <input class="form-control" type="text" name="date3"
                                        placeholder="تاريخ التعديل :" onfocus="(this.type='date')"
                                        onblur="(this.type='text')" value="{{ $followLog->date3 }}">
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
                                        style="text-align: center;font-size:large;font-weight: bolder;"> رقم الوثيقة : QA –
                                        F
                                        - 13 </label>
                                </div>
                            </th>
                        </tr>
                    </thead>
                </table>
                @if ($followLog->status == 'pending' && Auth::user()->hasRole('Employee'))
                    <div class="form-group">
                        <button style="border-radius:20px;margin: 50px; width:10% ; height: 5%;" type="submit"
                            class="btn btn-primary"><i class="fas fa-save" style="width:15% ; height: 20%;">تعديل
                            </i></button>
                    </div>
                @elseif(($followLog->status == 'inProgress' && Auth::user()->hasRole('Admin')) ||
                    ($followLog->status == 'pending' && Auth::user()->hasRole('Admin')))
                    <div class="form-group">
                        <button style="border-radius:20px;margin: 50px; width:10% ; height: 5%;" type="submit"
                            class="btn btn-primary"><i class="fas fa-save" style="width:15% ; height: 20%;">تعديل
                            </i></button>
                    </div>
                @elseif(($followLog->status == 'inProgress' && Auth::user()->hasRole('SuperAdmin')) ||
                    ($followLog->status == 'pending' && Auth::user()->hasRole('SuperAdmin')) ||
                    ($followLog->status == 'confirmed' && Auth::user()->hasRole('SuperAdmin')))
                    <div class="form-group">
                        <button style="border-radius:20px;margin: 50px; width:10% ; height: 5%;" type="submit"
                            class="btn btn-primary"><i class="fas fa-save" style="width:15% ; height: 20%;">تعديل
                            </i></button>
                    </div>
                @endif
            </div>


        </form>

        <script>
            function appendRow(num) {
                $new_number = parseInt(num) + 1;
                $appended_text = ` <tr class="datatable-row datatable-row-even" id="follow-${$new_number}">
                                                 
                                                    <td class="text-center end-td ">
                                                                <button type="button" title="Remove" onclick="removeRow(${$new_number})"
                                                                        class="btn btn-danger btn-option">
                                                                        <i class="fa fa-minus-circle"></i>
                                                                </button>
                                                    </td>
                                                    <th><textarea class="form-control" type="text" name="follow[${$new_number}][subject]"></textarea></th>
                                                    <th><textarea class="form-control" type="text" name="follow[${$new_number}][decision]"></textarea></th>
                                                    <th><input class="form-control" type="text" name="follow[${$new_number}][administrator]"></th>
                                                    <th><input class="form-control" type="date" name="follow[${$new_number}][date]"></th>
                                                    <th><input style="width: 40px; height: 40px; "  type="checkbox" name="follow[${$new_number}][completed]" value="1"></th>
                                                    <th><input style="width: 40px; height: 40px; "  type="checkbox" name="follow[${$new_number}][not_completed]" value="1"></th>
                                                    <th><textarea class="form-control" type="text" name="follow[${$new_number}][notes]"></textarea></th>
              
                                                     </tr>`;
                $($appended_text).insertAfter(`#follow-${num}`);
                if (!document.getElementById(`follow-${num}`)) {
                    $($appended_text).insertAfter(`#follow-0`);
                }



                $(`#btn-${num}`).remove();
                $("#increment").append(
                    `<button type="button" class="btn btn-primary add_new" id="btn-${$new_number}" onclick="appendRow(${$new_number})"><i class="fa fa-plus-circle"></i></button></td>`
                );


            }

            function removeRow(num, id) {
                if (id != 0) {
                    $("#follow-0").append(`<input type="hidden" name="ids[${num}]" value="${id}">`);
                }
                $(`#follow-${num}`).remove();

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
