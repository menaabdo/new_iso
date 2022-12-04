@extends('layouts.print')

@section('content')
    <div class="card">
        <div class="card-body">

            <div class="container-fluid p-4">
                <div style="" class="w-100 text-center my-4">
                    <h2>قائمة المراجعين الداخليين المعتمدين لنظام الجودة</h2>
                    <hr class="w-100">
                </div>
                <div class="container-fluid p-2">
                    <div class="" style="text-align:center ;">
                        <table class="table">
                            <tr>
                                <th>الإسم</th>
                                <th>الإدارة التابع لها</th>
                                <th>تاريخ التأهيل</th>
                                <th>مكان التأهيل</th>
                            </tr>
                            @if (count($listInternalAuditor->list) > 0)
                                @foreach ($listInternalAuditor->list as $key => $intr)
                                    <tr id="list-{{ $key }}">

                                        <td>{{ $intr->name }}</td>
                                        <td>{{ $intr->manage }}
                                        </td>
                                        <td>{{ $intr->date }}
                                        </td>
                                        <td>{{ $intr->place }}
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                        </table>
                    </div>
                    <br><br><br>
                    <table class="table">
                        <thead>
                            <tr>
                                @if ($listInternalAuditor->status == 'inProgress' && Auth::user()->hasRole('Employee'))
                                    <th class=" w-100 text-center col-3 ">
                                       
                                        <div class="" style="text-align:center ;">
                                            <label for="" class="">إعداد</label>
                                            <label for="" class="">مدير الجودة </label>
                                        </div>
                                        <div class="form-group row w-10 text-right">
                                            <div class="col-6">
                                                <label for="" class="col-3 col-form-label">التاريخ : -</label>
                                              {{ $listInternalAuditor->date_1 }}
                                            </div>
                                        </div>
                                        <div class="form-group row w-10 text-right">
                                            <div class="col-6">
                                                <label for="" class="col-3 col-form-label">التوقيع: -</label>
                                               {{ $listInternalAuditor->name }}
                                            </div>
                                        </div>
                                    </th>
                                @endif
                                @if ($listInternalAuditor->status == 'confirmed' && Auth::user()->hasRole('Employee'))
                                    <th class=" w-90 text-center col-3 ">
                                        
                                        <div class="" style="text-align:center ;">
                                            <label for="" class="">إعداد</label>
                                            <label for="" class="">مدير الجودة </label>
                                        </div>
                                        <div class="form-group row w-10 text-right">
                                            <div class="col-6">
                                                <label for="" class="col-3 col-form-label">التاريخ : -</label>
                                               {{ $listInternalAuditor->date_1 }}
                                            </div>
                                        </div>
                                        <div class="form-group row w-10 text-right">
                                            <div class="col-6">
                                                <label for="" class="col-3 col-form-label">التوقيع: -</label>
                                               {{ $listInternalAuditor->name }}
                                            </div>
                                        </div>
                                    </th>
                                    <th class=" w-90 text-center col-3">
                                    
                                        <div class="" style="text-align:center ;">
                                            <label for="" class=""
                                                style="text-align:center;font-size:large;font-weight: bolder;">إعتماد</label>
                                            <label for="" class=""
                                                style="text-align:center;font-size:large;font-weight: bolder;">المدير
                                                العام</label>
                                        </div>
                                        <div class="form-group row w-10 text-right">
                                            <div class="col-6">
                                                <label for="" class="col-3 col-form-label">التاريخ : -</label>
                                               {{ $listInternalAuditor->date_2 }}
                                            </div>
                                        </div>


                                        <div class="form-group row w-10 text-right">
                                            <div class="col-6">
                                                <label for="" class="col-3 col-form-label">التوقيع: -</label>
                                                {{ $listInternalAuditor->manager_name }}
                                            </div>
                                        </div>
                                    </th>
                                @endif

                                @if (Auth::user()->hasRole('Admin'))
                                    <th class=" w-90 text-center col-3 ">
                                       
                                        <div class="" style="text-align:center ;">
                                            <label for="" class="">إعداد</label>
                                            <label for="" class="">مدير الجودة </label>
                                        </div>
                                        <div class="form-group row w-10 text-right">
                                            <div class="col-6">
                                                <label for="" class="col-3 col-form-label">التاريخ : -</label>
                                               {{ $listInternalAuditor->date_1 }}                                    </div>
                                        </div>
                                        <div class="form-group row w-10 text-right">
                                            <div class="col-6">
                                                <label for="" class="col-3 col-form-label">التوقيع: -</label>
                                               {{ $listInternalAuditor->name }}                                    </div>
                                        </div>
                                    </th>
                                @endif
                                @if ($listInternalAuditor->status == 'confirmed' && Auth::user()->hasRole('Admin'))
                                    <th class=" w-90 text-center col-3">
                                    
                                        <div class="" style="text-align:center ;">
                                            <label for="" class=""
                                                style="text-align:center;font-size:large;font-weight: bolder;">إعتماد</label>
                                            <label for="" class=""
                                                style="text-align:center;font-size:large;font-weight: bolder;">المدير
                                                العام</label>
                                        </div>
                                        <div class="form-group row w-10 text-right">
                                            <div class="col-6">
                                                <label for="" class="col-3 col-form-label">التاريخ : -</label>
                                               {{ $listInternalAuditor->date_2 }}
                                            </div>
                                        </div>


                                        <div class="form-group row w-10 text-right">
                                            <div class="col-6">
                                                <label for="" class="col-3 col-form-label">التوقيع: -</label>
                                                {{ $listInternalAuditor->manager_name }}
                                            </div>
                                        </div>
                                    </th>
                                @endif
                                @if (Auth::user()->hasRole('SuperAdmin'))
                                    <th class=" w-90 text-center col-3 ">
                                    
                                        <div class="" style="text-align:center ;">
                                            <label for="" class="">إعداد</label>
                                            <label for="" class="">مدير الجودة </label>
                                        </div>
                                        <div class="form-group row w-10 text-right">
                                            <div class="col-6">
                                                <label for="" class="col-3 col-form-label">التاريخ : -</label>
                                               {{ $listInternalAuditor->date_1 }}                                    </div>
                                        </div>
                                        <div class="form-group row w-10 text-right">
                                            <div class="col-6">
                                                <label for="" class="col-3 col-form-label">التوقيع: -</label>
                                               {{ $listInternalAuditor->name }}                                    </div>
                                        </div>
                                    </th>
                                    <th class=" w-90 text-center col-3">
                                      
                                        <div class="" style="text-align:center ;">
                                            <label for="" class=""
                                                style="text-align:center;font-size:large;font-weight: bolder;">إعتماد</label>
                                            <label for="" class=""
                                                style="text-align:center;font-size:large;font-weight: bolder;">المدير
                                                العام</label>
                                        </div>
                                        <div class="form-group row w-10 text-right">
                                            <div class="col-6">
                                                <label for="" class="col-3 col-form-label">التاريخ : -</label>
                                               {{ $listInternalAuditor->date_2 }}                                    </div>
                                        </div>


                                        <div class="form-group row w-10 text-right">
                                            <div class="col-6">
                                                <label for="" class="col-3 col-form-label">التوقيع: -</label>
                                                {{ $listInternalAuditor->manager_name }}
                                        </div>
                                    </th>
                                @endif

                            </tr>
                        </thead>
                    </table>
                </div>
                <br><br><br>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>
                                <div class="" style="text-align:start ;">
                                  {{ $listInternalAuditor->company_name }}
                                </div>

                            </th>
                            <th>
                                <div class="" style="text-align:start ;">
                                   {{ $listInternalAuditor->date2 }}
                                </div>

                            </th>
                            <th>
                                <div class="" style="text-align:start ;">
                                    {{ $listInternalAuditor->date3 }}
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
                                        style="text-align: center;font-size:large;font-weight: bolder;"> رقم الصفحة : 1
                                        /
                                        1</label>
                                </div>
                            </th>
                            <th>
                                <div class="" style="text-align:start ;">
                                    <label for="" class=""
                                        style="text-align: center;font-size:large;font-weight: bolder;"> رقم الوثيقة :
                                        QA–F-13 </label>
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
