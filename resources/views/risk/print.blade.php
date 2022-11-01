@extends('layouts.print')
@section('content')
    <div class="container mt-3 p-3">
        <div style="" class="w-100 text-center my-4">
            <h2>سجل تحديد المخاطر وتقييم الأخطار لعمل </h2>
            <hr class="w-100" style="align:center">
        </div>
        <div class="form-group row w-100 text-right">
            <div class="col-5">
                <label for="inputPassword" class="col-2 col-form-label"> ادارة / قسم :</label>
                {{ $risk->department }}
            </div>
        </div>

        <br><br>
        <section class="my-5">
            <table class="table table-bordered w-100 text-center "
                style="grid-auto-flow: column;
          justify-content: center;
          align-content: center;
        ">
                <thead>
                    <tr style="background-color:lightgreen">
                        <th scope="col" rowspan="2">النشاط </th>
                        <th scope="col" rowspan="2">المخاطر</th>
                        <th scope="col" colspan="3">التقييم قبل الاجراء المتخذ</th>
                        <th scope="col" rowspan="2">الاجراءات المتخذه</th>
                        <th scope="col" colspan="3">التقييم بعد الإجراء الوقائى</th>
                        <th scope="col" rowspan="2">مقبول / لا</th>
                    </tr>
                    <tr style="background-color:lightgreen">
                        <th scope="col">S</th>
                        <th scope="col">P</th>
                        <th scope="col">R</th>
                        <th scope="col">S</th>
                        <th scope="col">P</th>
                        <th scope="col">R</th>
                    </tr>
                </thead>
                <tbody>
                    @if (count($risk->risk) > 0)
                        @foreach ($risk->risk as $key => $ris)
                            <tr id="risk-{{ $key }}">
                                <td>
                                    <div class="form-row ">
                                        {{ $ris->activity }}
                                    </div>
                                </td>

                                <td>
                                    <div class="form-row ">
                                        {{ $ris->risk }}
                                    </div>
                                </td>


                                <td>
                                    <div class="form-row ">
                                        {{ $ris->s_review }}

                                    </div>
                                </td>
                                <td>
                                    <div class="form-row">
                                        {{ $ris->p_review }}

                                    </div>
                                </td>
                                <td>
                                    <div class="form-row">
                                        {{ $ris->r_review }}

                                    </div>
                                </td>
                                <td>
                                    <div class="form-row">
                                        {{ $ris->action_taken }}

                                    </div>
                                </td>
                                <td>
                                    <div class="form-row">
                                        {{ $ris->s_procedure }}

                                    </div>
                                </td>
                                <td>
                                    <div class="form-row">
                                        {{ $ris->p_procedure }}

                                    </div>
                                </td>
                                <td>
                                    <div class="form-row">
                                        {{ $ris->r_procedure }}

                                    </div>
                                </td>
                                <td>
                                    <div class="form-row">
                                        {{ $ris->status }}

                                    </div>
                                </td>
                            </tr>
                        @endforeach

                    @endif

                </tbody>
            </table>
        </section>

        <br><br>
        <section class="mt-5">
            <div>
                <label class="text-end" style="font-size: 10">أعداد:</label>
                {{ $risk->prepare }}
                @if (($risk->status == 'confirmed' && Auth::user()->hasRole('Employee')) ||
                    ($risk->status == 'confirmed' && Auth::user()->hasRole('Admin')))
                    <label class="text-end" style="float: left ;font-size: 10">أعتماد:</label>
                    {{ $risk->approval }}
                @endif
                @if (Auth::user()->hasRole('SuperAdmin'))
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <label class="text-end" style="float: left;margin-right: 100;font-size: 10 ">أعتماد:</label>
                    {{ $risk->approval }}
                @endif
            </div>

            <div class="row">
                <label class="text-end"> التاريخ:</label>
                {{ $risk->date }}
                @if (($risk->status == 'confirmed' && Auth::user()->hasRole('Employee')) ||
                    ($risk->status == 'confirmed' && Auth::user()->hasRole('Admin')))
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <label class="text-end">مدير الأدارة :</label>
                    {{ $risk->manager_director }}
                @endif
                @if (Auth::user()->hasRole('SuperAdmin'))
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <label class="text-end">مدير الأدارة :</label>
                    {{ $risk->manager_director }}
                @endif
            </div>
            <div class="row">
                <label class="text-end"> قسم :</label>
                {{ $risk->department2 }}
                @if (($risk->status == 'confirmed' && Auth::user()->hasRole('Employee')) ||
                    ($risk->status == 'confirmed' && Auth::user()->hasRole('Admin')))
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <label class="text-end"> قسم :</label>
                    {{ $risk->department3 }}
                @endif
                @if (Auth::user()->hasRole('SuperAdmin'))
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <label class="text-end"> قسم :</label>
                    {{ $risk->department3 }}
                @endif
            </div>
        </section>
        <br><br>
        <section style="justify-content:space-evenly; margin-top: 10%;" class="p-4 my-4">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>
                            <div class="" style="text-align:start ;">
                                {{ $risk->issuance }}
                            </div>

                        </th>
                        <th>
                            <div class="" style="text-align:start ;">
                                {{ $risk->date2 }}

                            </div>

                        </th>

                        <th>
                            <div class="" style="text-align:start ;">
                                {{ $risk->period }}
                            </div>

                        </th>
                        <th>
                            <div class="" style="text-align:start ;">
                                {{ $risk->date3 }}
                            </div>

                        </th>
                        <th>
                            <div class="" style="text-align:start ;">
                                {{ $risk->code }}
                            </div>

                        </th>

                    </tr>
                </thead>

            </table>



        </section>

    </div>
@stop
