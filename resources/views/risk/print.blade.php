@extends('layouts.print')
@section('content')
<style>
table, th {vertical-align: middle}
</style>
    <div class="container mt-3 p-3">
        <div style="" class="w-100 text-center my-4" style='border:1px solid'>
            <h3 style='text-align:center;'>
                <span style='text-align:center;font-family:Cursive;border-bottom: 1px solid;
    ; box-shadow: 0 1rem 3rem rgba(0, 0, 0, .175) !important;
    border-radius: 6px;
    padding: 4;'>سجل تحديد المخاطر وتقييم الأخطار لعمل 
</span></h3>
             </div>
        <div class="form-group row w-100 text-right">
            <div class="col-5" style='text-align:center'>
                <label for="inputPassword" class="col-2 col-form-label" style='text-align:center'> ادارة / قسم :</label>
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
                    <tr style="background-color:#001635;padding:12px;color:white; text-align:center;">
                    
                        <th scope="col" rowspan="2" style='vertical-align: middle;'>النشاط </th>
                        <th scope="col" rowspan="2" style='vertical-align: middle;'>المخاطر</th>
                        <th scope="col" colspan="3" style='vertical-align: middle;'>التقييم قبل الاجراء المتخذ</th>
                        <th scope="col" rowspan="2" style='vertical-align: middle;'>الاجراءات المتخذه</th>
                        <th scope="col" colspan="3" style='vertical-align: middle;'>التقييم بعد الإجراء الوقائى</th>
                        <th scope="col" rowspan="2" style='vertical-align: middle;'>مقبول / لا</th>
                    </tr>
                    <tr style="background-color:#001635;padding:12px;color:white; text-align:center;">
                    
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
            <div class='row' style="text-align:center;padding: 12px;">
                <label class='col-md-6' class="text-end" >أعداد:</label>
                <label style='padding: 12px;
    box-shadow: 0 1rem 3rem rgb(0 0 0 / 18%);
' >{{ $risk->prepare }}</label>
            </div>
            <div style="text-align:center;padding: 12px;">
              
                @if (($risk->status == 'confirmed' && Auth::user()->hasRole('Employee')) ||
                    ($risk->status == 'confirmed' && Auth::user()->hasRole('Admin')))
                    <label class="text-end">أعتماد:</label>
                    <label style='padding: 12px;
    box-shadow: 0 1rem 3rem rgb(0 0 0 / 18%);
' > {{ $risk->approval }}</label>
                @endif
            
                @if (Auth::user()->hasRole('SuperAdmin'))
                     <label class="text-end" >أعتماد:</label>
                     <label style='padding: 12px;
    box-shadow: 0 1rem 3rem rgb(0 0 0 / 18%);
' >{{ $risk->approval }}</label>
                @endif
            </div>

            <div class="row" style="text-align:center;padding: 12px;">
                <label class="text-end"> التاريخ:</label>
                <label style='padding: 12px;
    box-shadow: 0 1rem 3rem rgb(0 0 0 / 18%);
' > {{ $risk->date }}</label>
             </div>
             <div class="row" style="text-align:center;padding: 12px;">
              
                @if (($risk->status == 'confirmed' && Auth::user()->hasRole('Employee')) ||
                    ($risk->status == 'confirmed' && Auth::user()->hasRole('Admin')))
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <label class="text-end">مدير الأدارة :</label>
                    {{ $risk->manager_director }}
                @endif
                @if (Auth::user()->hasRole('SuperAdmin'))
                    <label class="text-end">مدير الأدارة :</label>
                    {{ $risk->manager_director }}
                @endif
            </div>
            <div class="row"  style="text-align:center">
                <label class="text-end"> قسم :</label>
                {{ $risk->department2 }}
                @if (($risk->status == 'confirmed' && Auth::user()->hasRole('Employee')) ||
                    ($risk->status == 'confirmed' && Auth::user()->hasRole('Admin')))
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <label class="text-end"> قسم :</label>
                    <label style='padding: 12px;
    box-shadow: 0 1rem 3rem rgb(0 0 0 / 18%);
' >  {{ $risk->department3 }}</label>
                @endif
                @if (Auth::user()->hasRole('SuperAdmin'))
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <label class="text-end"> قسم :</label>
                    <label style='padding: 12px;
    box-shadow: 0 1rem 3rem rgb(0 0 0 / 18%);
' > {{ $risk->department3 }}</label>
                @endif
            </div>
        </section>
        <br><br>
        <section style="justify-content:space-evenly; margin-top: 10%;" class="p-4 my-4">
            <table class="table table-bordered" style="   border:none;padding:12px;margin-top:12px;background-color: #001635;
    color: white;text-shadow: none;width: 97%;
    margin: auto;
    margin-bottom: 12px;    font-size: 12px;padding: 1px;">
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
     <script>
  window.addEventListener("load", window.print());
</script>
@stop
