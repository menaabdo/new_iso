@extends('layouts.print')

@section('content')

    <div class="card">
        <div class="container p-4">
            <div style="" class="w-100 text-center my-4">
                <h2>سجل متابعة قرارات مراجعة الإدارة العليا</h2>
                <hr class="w-100" color="black">
            </div>
            <img src="{{ public_path($followLog->logo) }}" style="float: left" width="100px" height="50px" />
            <div class="col-1 col-form-label">
                <label for="" class="col-1 col-form-label">نوع الاجتماع : </label>
                <input type="radio" name="planing" value="planned" <?php if ($followLog->planing == 'planned') {
                    echo 'checked="checked"';
                } ?>>

                <label for="" class="col-3 col-form-label" style="text-align:right;">مخطط </label>
                &nbsp;&nbsp;&nbsp;&nbsp;
                <input type="radio" name="planing" value="not_planned" <?php if ($followLog->planing == 'not_planned') {
                    echo 'checked="checked"';
                } ?>>
                <label for="" class="col-3 col-form-label" style="text-align:right;">غير مخطط </label>
            </div>
            <div class="col-3 col-form-label">
                <label for="" style="text-align:right;" class="col-4 col-form-label">رقم الأجتماع </label>
                {{ $followLog->meeting_num }}
                &nbsp;&nbsp;&nbsp;&nbsp;

                <label for="" style="text-align:left;" class="col-3 col-form-label">التاريخ : </label>
                {{ $followLog->meetting_date }}
            </div>


        </div>
        <div class="form-group row w-100 text-right" style="text-align:center;">
            <table class="table">
                <tr style="background-color:rgb(235, 252, 160); text-align:center;">
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
                            <th>
                                {{ $intr->subject }}
                            </th>
                            <th>
                                {{ $intr->decision }}
                            </th>
                            <th>{{ $intr->administrator }}</th>
                            <th>{{ $intr->date }}</th>
                            <th><input  type="checkbox"
                                    name="follow[{{ $key }}][completed]" value="1"
                                    {{ $followLog->follow[$key]->completed == '1' ? 'checked' : '' }}
                                    <?php if ($followLog->follow[$key]->completed == '1') {
                                        echo 'checked="checked"';
                                    } ?>
                                    ></th>
                            <th><input  type="checkbox"
                                    name="follow[{{ $key }}][not_completed]" value="1"
                                    {{ $followLog->follow[$key]->not_completed == '1' ? 'checked' : '' }}
                                    <?php if ($followLog->follow[$key]->not_completed == '1') {
                                        echo 'checked="checked"';
                                    } ?>
                                    ></th>
                            <th>
                                {{ $intr->notes }}
                            </th>
                        </tr>
                    @endforeach
                @endif
            </table>
        </div>
        <br><br>
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
                                <div class="col-6">
                                    <label for="" class="col-3 col-form-label">الاسم: -</label>
                                    {{ $followLog->name_1 }}
                                </div>
                            </div>
                            <div class="form-group row w-10 text-right">
                                <div class="col-6">
                                    <label for="" class="col-3 col-form-label">الوظيفة: -</label>
                                    {{ $followLog->job_1 }}
                                </div>
                            </div>

                        </th>
                        @if ($followLog->status == 'inProgress' && Auth::user()->hasRole('Employee'))
                            <th class="  text-center col-2 ">
                                <div class="" style="text-align:center ;">
                                    <label for="" class=""  style="text-align:center;font-size:large;font-weight: bolder;">مراجعة:</label>
                                </div>
                                <div class="form-group row w-10 text-right">
                                    <div class="col-6">
                                        <label for="" class="col-3 col-form-label">الاسم: -</label>
                                      {{ $followLog->name_2 }}
                                    </div>
                                </div>
                                <div class="form-group row w-10 text-right">
                                    <div class="col-6">
                                        <label for="" class="col-3 col-form-label">الوظيفة: -</label>
                                        {{ $followLog->job_2 }}
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
                                    <div class="col-6">
                                        <label for="" class="col-3 col-form-label">الاسم: -</label>
                                       {{ $followLog->name_2 }}
                                    </div>
                                </div>
                                <div class="form-group row w-10 text-right">
                                    <div class="col-6">
                                        <label for="" class="col-3 col-form-label">الوظيفة: -</label>
                                       {{ $followLog->job_2 }}
                                    </div>
                                </div>

                            </th>
                            <th class="  text-center col-2 ">
                                <div class="" style="text-align:center ;">
                                    <label for="" class=""
                                        style="text-align:center;font-size:large;font-weight: bolder;">إعتماد:</label>
                                </div>
                                <div class="form-group row w-10 text-right">
                                    <div class="col-6">
                                        <label for="" class="col-3 col-form-label">الاسم: -</label>
                                     {{ $followLog->name_3 }}
                                    </div>
                                </div>
                                <div class="form-group row w-10 text-right">
                                    <div class="col-6">
                                        <label for="" class="col-3 col-form-label">الوظيفة: -</label>
                                     {{ $followLog->job_3 }}
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
                                <div class="col-6">
                                    <label for="" class="col-3 col-form-label">الاسم: -</label>
                                   {{ $followLog->name_1 }}
                                </div>
                            </div>
                            <div class="form-group row w-10 text-right">
                                <div class="col-6">
                                    <label for="" class="col-3 col-form-label">الوظيفة: -</label>
                                  {{ $followLog->job_1 }}
                                </div>
                            </div>

                        </th>
                        <th class="  text-center col-2 ">
                            <div class="" style="text-align:center ;">
                                <label for="" class=""
                                    style="text-align:center;font-size:large;font-weight: bolder;">مراجعة:</label>
                            </div>
                            <div class="form-group row w-10 text-right">
                                <div class="col-6">
                                    <label for="" class="col-3 col-form-label">الاسم: -</label>
                                   {{ $followLog->name_2 }}
                                </div>
                            </div>
                            <div class="form-group row w-10 text-right">
                                <div class="col-6">
                                    <label for="" class="col-3 col-form-label">الوظيفة: -</label>
                                    {{ $followLog->job_2 }}
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
                                    <div class="col-6">
                                        <label for="" class="col-3 col-form-label">الاسم: -</label>
                                      {{ $followLog->name_3 }}
                                    </div>
                                </div>
                                <div class="form-group row w-10 text-right">
                                    <div class="col-6">
                                        <label for="" class="col-3 col-form-label">الوظيفة: -</label>
                                        {{ $followLog->job_3 }}
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
                                <div class="col-6">
                                    <label for="" class="col-3 col-form-label">الاسم: -</label>
                                   {{ $followLog->name_1 }}
                                </div>
                            </div>
                            <div class="form-group row w-10 text-right">
                                <div class="col-6">
                                    <label for="" class="col-3 col-form-label">الوظيفة: -</label>
                                   {{ $followLog->job_1 }}
                                </div>
                            </div>

                        </th>
                        <th class="  text-center col-2 ">
                            <div class="" style="text-align:center ;">
                                <label for="" class=""
                                    style="text-align:center;font-size:large;font-weight: bolder;">مراجعة:</label>
                            </div>
                            <div class="form-group row w-10 text-right">
                                <div class="col-6">
                                    <label for="" class="col-3 col-form-label">الاسم: -</label>
                                    {{ $followLog->name_2 }}
                                </div>
                            </div>
                            <div class="form-group row w-10 text-right">
                                <div class="col-6">
                                    <label for="" class="col-3 col-form-label">الوظيفة: -</label>
                                   {{ $followLog->job_2 }}
                                </div>
                            </div>

                        </th>
                        <th class="  text-center col-2 ">
                            <div class="" style="text-align:center ;">
                                <label for="" class=""
                                    style="text-align:center;font-size:large;font-weight: bolder;">إعتماد:</label>
                            </div>
                            <div class="form-group row w-10 text-right">
                                <div class="col-6">
                                    <label for="" class="col-3 col-form-label">الاسم: -</label>
                                    {{ $followLog->name_3 }}
                                </div>
                            </div>
                            <div class="form-group row w-10 text-right">
                                <div class="col-6">
                                    <label for="" class="col-3 col-form-label">الوظيفة: -</label>
                                 {{ $followLog->job_3 }}
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
                           {{ $followLog->company_name }}
                        </div>

                    </th>
                    <th>
                        <div class="" style="text-align:start ;">
                         {{ $followLog->date2 }}
                        </div>

                    </th>
                    <th>
                        <div class="" style="text-align:start ;">
                            {{ $followLog->date3 }}
                        </div>

                    </th>
                    <th>
                        <div class="" style="text-align:start ;">
                            <label for="" class=""
                                style="text-align: center;font-size:large;font-weight: bolder;"> مدة الحفظ : سنتان </label>
                        </div>

                    </th>
                    <th>
                        <div class="" style="text-align:start ;">
                            <label for="" class=""
                                style="text-align: center;font-size:large;font-weight: bolder;"> رقم الصفحة : 1 / 1</label>
                        </div>
                    </th>
                    <th>
                        <div class="" style="text-align:start ;">
                            <label for="" class=""
                                style="text-align: center;font-size:large;font-weight: bolder;"> رقم الوثيقة : QA-F-13 </label>
                        </div>
                    </th>
                </tr>
            </thead>
        </table>
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
