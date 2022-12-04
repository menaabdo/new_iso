@extends('layouts.print')

@section('content')

    <div class="card">


        <div class="container p-4">

            <div style="" class="w-100 text-center my-4">
                <h2>الخطة السنوية للمراجعات الداخلية</h2>
                <hr class="w-100">
            </div>
            <div class="form-group row w-10">
                <div class="col-3">
                    <label for="" class="col-3 col-form-label">التاريخ : </label>
                    {{ $work_plan->date_1 }}
                </div>
            </div>
            <br><br>
            <div>
                <div class="form-group row w-100 text-right" style="text-align:center ;"></div>
                <table>
                    <tr style="background-color:rgb(217, 192, 245)">
                        <th class="col-3 col-form-label">الجهة المراجع عليها </th>
                        <th class="col-3 col-form-label">موضوعات/بنود المراجعة </th>
                        <th>يناير</th>
                        <th>فبراير</th>
                        <th> مارس</th>
                        <th> إبريل</th>
                        <th> مايو</th>
                        <th> يونيو</th>
                        <th> يوليو</th>
                        <th>أغسطس</th>
                        <th>سبتمبر</th>
                        <th>أكتوبر</th>
                        <th>نوفمبر</th>
                        <th>ديسمبر</th>
                        <th class="col-3 col-form-label">ملاحظات</th>
                    </tr>
                    @if (count($work_plan->plan) > 0)
                        @foreach ($work_plan->plan as $key => $work)
                            <tr id="plan-{{ $key }}">

                                <th>{{ $work->referenced_authority }}</th>
                                <th>{{ $work->review_topics }}</th>
                                <th><input style="width: 40px; height: 40px; " type="checkbox"
                                        name="plan[{{ $key }}][jan]" value="1"
                                        {{ $work_plan->plan[$key]->jan == '1' ? 'checked' : '' }} <?php if ($work_plan->plan[$key]->jan == '1') {
                                            echo 'checked="checked"';
                                        } ?>></th>
                                <th><input style="width: 40px; height: 40px; " type="checkbox"
                                        name="plan[{{ $key }}][feb]" value="1"
                                        {{ $work_plan->plan[$key]->feb == '1' ? 'checked' : '' }} <?php if ($work_plan->plan[$key]->feb == '1') {
                                            echo 'checked="checked"';
                                        } ?>></th>
                                <th><input style="width: 40px; height: 40px; " type="checkbox"
                                        name="plan[{{ $key }}][mar]" value="1"
                                        {{ $work_plan->plan[$key]->mar == '1' ? 'checked' : '' }} <?php if ($work_plan->plan[$key]->mar == '1') {
                                            echo 'checked="checked"';
                                        } ?>></th>
                                <th><input style="width: 40px; height: 40px; " type="checkbox"
                                        name="plan[{{ $key }}][epr]" value="1"
                                        {{ $work_plan->plan[$key]->epr == '1' ? 'checked' : '' }} <?php if ($work_plan->plan[$key]->epr == '1') {
                                            echo 'checked="checked"';
                                        } ?>></th>
                                <th><input style="width: 40px; height: 40px; " type="checkbox"
                                        name="plan[{{ $key }}][may]" value="1"
                                        {{ $work_plan->plan[$key]->may == '1' ? 'checked' : '' }} <?php if ($work_plan->plan[$key]->may == '1') {
                                            echo 'checked="checked"';
                                        } ?>></th>
                                <th><input style="width: 40px; height: 40px; " type="checkbox"
                                        name="plan[{{ $key }}][jaun]" value="1"
                                        {{ $work_plan->plan[$key]->jaun == '1' ? 'checked' : '' }} <?php if ($work_plan->plan[$key]->jaun == '1') {
                                            echo 'checked="checked"';
                                        } ?>>
                                </th>
                                <th><input style="width: 40px; height: 40px; " type="checkbox"
                                        name="plan[{{ $key }}][jun]" value="1"
                                        {{ $work_plan->plan[$key]->jun == '1' ? 'checked' : '' }} <?php if ($work_plan->plan[$key]->jun == '1') {
                                            echo 'checked="checked"';
                                        } ?>></th>
                                <th><input style="width: 40px; height: 40px; " type="checkbox"
                                        name="plan[{{ $key }}][augest]" value="1"
                                        {{ $work_plan->plan[$key]->augest == '1' ? 'checked' : '' }} <?php if ($work_plan->plan[$key]->augest == '1') {
                                            echo 'checked="checked"';
                                        } ?>>
                                </th>
                                <th><input style="width: 40px; height: 40px; " type="checkbox"
                                        name="plan[{{ $key }}][sep]" value="1"
                                        {{ $work_plan->plan[$key]->sep == '1' ? 'checked' : '' }} <?php if ($work_plan->plan[$key]->sep == '1') {
                                            echo 'checked="checked"';
                                        } ?>></th>
                                <th><input style="width: 40px; height: 40px; " type="checkbox"
                                        name="plan[{{ $key }}][oct]" value="1"
                                        {{ $work_plan->plan[$key]->oct == '1' ? 'checked' : '' }} <?php if ($work_plan->plan[$key]->oct == '1') {
                                            echo 'checked="checked"';
                                        } ?>></th>
                                <th><input style="width: 40px; height: 40px; " type="checkbox"
                                        name="plan[{{ $key }}][nov]" value="1"
                                        {{ $work_plan->plan[$key]->nov == '1' ? 'checked' : '' }} <?php if ($work_plan->plan[$key]->nov == '1') {
                                            echo 'checked="checked"';
                                        } ?>>
                                </th>

                                <th><input style="width: 40px; height: 40px; " type="checkbox"
                                        name="plan[{{ $key }}][des]" value="1"
                                        {{ $work_plan->plan[$key]->des == '1' ? 'checked' : '' }} <?php if ($work_plan->plan[$key]->des == '1') {
                                            echo 'checked="checked"';
                                        } ?>>
                                </th>

                                <th>{{ $work->notes }}</th>
                            </tr>
                        @endforeach


                    @endif
                </table>
                <br><br>
                <div class="container-fluid p-2" style="border: 2px solid rgb(250, 90, 15);">
                    <div class="form-group row w-100 text-left">
                        <div class="col-1 col-form-label">
                            <input type="checkbox" name="planned" value="1"
                                {{ $work_plan->planned == '1' ? 'checked' : '' }} <?php if ($work_plan->planned == '1') {
                                    echo 'checked="checked"';
                                } ?>>


                            <label for="" style="text-align:right;" class="col-2 col-form-label">موعد مخطط
                                (work_plan 9001) </label>
                        </div>
                        <div class="col-1 col-form-label">
                            <input type="radio" name="planing" value="there_are_mismatches" <?php if ($work_plan->planing == 'there_are_mismatches') {
                                echo 'checked="checked"';
                            } ?>>
                            <label for="" style="text-align:right;" class="col-3 col-form-label">تم التنفيذ وتوجد
                                حالات عدم تطابق </label>
                        </div>
                        <div class="col-1 col-form-label">
                            <input type="radio" name="planing" value="there_are_no_mismatches" <?php if ($work_plan->planing == 'there_are_no_mismatches') {
                                echo 'checked="checked"';
                            } ?>>

                            <label for="" style="text-align:right;" class="col-3 col-form-label">تم التنفيذ ولا توجد
                                حالات عدم مطابقة </label>
                        </div>
                    </div>
                    <br><br>
                    <table>
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
                                                {{ $work_plan->name_1 }}
                                            </div>
                                        </div>
                                        <div class="form-group row w-10 text-right">
                                            <div class="col-6">
                                                <label for="" class="col-3 col-form-label">الوظيفة: -</label>
                                                {{ $work_plan->job_1 }}
                                            </div>
                                        </div>

                                    </th>
                                    @if ($work_plan->status == 'inProgress' && Auth::user()->hasRole('Employee'))
                                        <th class="  text-center col-2 ">
                                            <div class="" style="text-align:center ;">
                                                <label for="" class=""
                                                    style="text-align:center;font-size:large;font-weight: bolder;">مراجعة:</label>
                                            </div>
                                            <div class="form-group row w-10 text-right">
                                                <div class="col-6">
                                                    <label for="" class="col-3 col-form-label">الاسم: -</label>
                                                    {{ $work_plan->name_2 }}
                                                </div>
                                            </div>
                                            <div class="form-group row w-10 text-right">
                                                <div class="col-6">
                                                    <label for="" class="col-3 col-form-label">الوظيفة: -</label>
                                                    {{ $work_plan->job_2 }}
                                                </div>
                                            </div>

                                        </th>
                                    @endif

                                    @if ($work_plan->status == 'confirmed' && Auth::user()->hasRole('Employee'))
                                        <th class="  text-center col-2 ">
                                            <div class="" style="text-align:center ;">
                                                <label for="" class=""
                                                    style="text-align:center;font-size:large;font-weight: bolder;">مراجعة:</label>
                                            </div>
                                            <div class="form-group row w-10 text-right">
                                                <div class="col-6">
                                                    <label for="" class="col-3 col-form-label">الاسم: -</label>
                                                    {{ $work_plan->name_2 }}
                                                </div>
                                            </div>
                                            <div class="form-group row w-10 text-right">
                                                <div class="col-6">
                                                    <label for="" class="col-3 col-form-label">الوظيفة: -</label>
                                                    {{ $work_plan->job_2 }}
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
                                                    {{ $work_plan->name_3 }}
                                                </div>
                                            </div>
                                            <div class="form-group row w-10 text-right">
                                                <div class="col-6">
                                                    <label for="" class="col-3 col-form-label">الوظيفة: -</label>
                                                    {{ $work_plan->job_3 }}
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
                                                {{ $work_plan->name_1 }}
                                            </div>
                                        </div>
                                        <div class="form-group row w-10 text-right">
                                            <div class="col-6">
                                                <label for="" class="col-3 col-form-label">الوظيفة: -</label>
                                                {{ $work_plan->job_1 }}
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
                                                {{ $work_plan->name_2 }}
                                            </div>
                                        </div>
                                        <div class="form-group row w-10 text-right">
                                            <div class="col-6">
                                                <label for="" class="col-3 col-form-label">الوظيفة: -</label>
                                                {{ $work_plan->job_2 }}
                                            </div>
                                        </div>
                                    </th>
                                    @if ($work_plan->status == 'confirmed' && Auth::user()->hasRole('Admin'))
                                        <th class="  text-center col-2 ">
                                            <div class="" style="text-align:center ;">
                                                <label for="" class=""
                                                    style="text-align:center;font-size:large;font-weight: bolder;">إعتماد:</label>
                                            </div>
                                            <div class="form-group row w-10 text-right">
                                                <div class="col-6">
                                                    <label for="" class="col-3 col-form-label">الاسم: -</label>
                                                    {{ $work_plan->name_3 }}
                                                </div>
                                            </div>
                                            <div class="form-group row w-10 text-right">
                                                <div class="col-6">
                                                    <label for="" class="col-3 col-form-label">الوظيفة: -</label>
                                                    {{ $work_plan->job_3 }}
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
                                                {{ $work_plan->name_1 }}
                                            </div>
                                        </div>
                                        <div class="form-group row w-10 text-right">
                                            <div class="col-6">
                                                <label for="" class="col-3 col-form-label">الوظيفة: -</label>
                                                {{ $work_plan->job_1 }}
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
                                                {{ $work_plan->name_2 }}
                                            </div>
                                        </div>
                                        <div class="form-group row w-10 text-right">
                                            <div class="col-6">
                                                <label for="" class="col-3 col-form-label">الوظيفة: -</label>
                                                {{ $work_plan->job_2 }}
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
                                                {{ $work_plan->name_3 }}
                                            </div>
                                        </div>
                                        <div class="form-group row w-10 text-right">
                                            <div class="col-6">
                                                <label for="" class="col-3 col-form-label">الوظيفة: -</label>
                                                {{ $work_plan->job_3 }}
                                            </div>
                                        </div>

                                    </th>
                                @endif

                            </tr>
                        </thead>
                    </table>
                </div>
                <br><br>
                <table>
                    <thead>
                        <tr>
                            <th>
                                <div class="" style="text-align:start ;">
                                    {{ $work_plan->company_name }}
                                </div>

                            </th>
                            <th>
                                <div class="" style="text-align:start ;">
                                    {{ $work_plan->date2 }}
                                </div>

                            </th>
                            <th>
                                <div class="" style="text-align:start ;">
                                    {{ $work_plan->date3 }}
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
                                        style="text-align: center;font-size:large;font-weight: bolder;"> رقم الوثيقة :
                                        QA–F-13
                                    </label>
                                </div>
                            </th>
                        </tr>
                    </thead>
                </table>



                <style>
                    .table thead th {
                        vertical-align: bottom;
                        border-bottom: 2px solid #5a0ee8;
                    }

                    table,
                    td,
                    th {
                        border: 2px solid #240df8;

                        text-align: center;
                    }
                </style>

<script>
  window.addEventListener("load", window.print());
</script>

            @stop
