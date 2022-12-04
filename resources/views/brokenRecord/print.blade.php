@extends('layouts.print')

@section('content')
    <div class="card">
        <div class="card-body">
            <div style="" class="w-100 text-center my-4">
                <h2>بيان السجلات المعدمة
                </h2>
                <hr class="w-100">
            </div>
            <div>
                <img src="{{ asset($brokenRecord->logo) }}" style="float: left;" width="100px" height="50px" />
               
            </div>
            <br><br>
            <div class="form-group row w-100 text-center" style="text-align:center ;">
                <table class="table">
                    <tr style="background-color:rgb(187, 216, 240)">
                     
                        <th scope="col" rowspan="2">نوع السجل</th>
                        <th scope="col" rowspan="2">الكود</th>
                        <th scope="col" colspan="2">فترة الاستخدام</th>
                        <th scope="col" rowspan="2">مكان الحفظ</th>
                        <th scope="col" rowspan="2">أسلوب التخلص</th>
                        <th scope="col" rowspan="2">التاريخ</th>
                    </tr>
                    <tr style="background-color:rgb(187, 216, 240); text-align:center;">
                        <th scope="col"> من</th>
                        <th scope="col">الى</th>
                    </tr>
                    @if(count($brokenRecord->brokenRecord)>0)
                    @foreach($brokenRecord->brokenRecord as $key => $intr)
                    <tr id="brokenRecord-{{ $key }}">
                        <th>{{ $intr->type_recourd }}</th>
                        <th>{{ $intr->code }}</th>
                        <th>{{ $intr->from }}</th>
                        <th>{{ $intr->to }}</th>
                        <th>{{ $intr->save_place }}</th>
                        <th>{{ $intr->kyend_del }}</th>
                        <th>{{ $intr->date_1 }}</th>
                    </tr>
                    @endforeach
                   
                   
                  
                    @endif
               </table>
            </div>
            <br><br>
            <table class="table">
                <thead>
                    <tr>
                        <th class=" w-50 text-center col-1 ">
                            <div class="" style="text-align:right ;">
                                <label for="" class="" style="text-align:center;font-size:large;font-weight: bolder;">	رئيس اللجنة القائمة بالعملية:</label>
                            </div>
                            <div class="form-group row  text-left">
                                <label>ممثل الإدارة لنظام الجودة</label>
                                <div class="col-2">
                                    <label for="" class="col-1 col-form-label">الاسم :</label>
                        {{ $brokenRecord->name }}
                                </div>
                            </div>
                        
                        </th>
                    </tr>
                </thead>
            </table>

            <table class="table">
                <thead>
                    <tr>
                        @if ($brokenRecord->status == 'inProgress' && Auth::user()->hasRole('Employee'))
                        <th class=" w-50 text-center col-1 ">
                            <div class="" style="text-align:right ;">
                                <label for="" class="" style="text-align:center;font-size:large;font-weight: bolder;">	عضوية:</label>
                            </div>
                            <div class="form-group row w-10 text-right">
                                <label for="" class="col-2 col-form-label">1-	مسئول الوثائق:       -</label>

                                <div class="col-2">
                                    <label for="" class="col-1 col-form-label">الاسم : </label>
                                    {{ $brokenRecord->source_official }}
                                </div>
                            </div>
                        </th>
                        @endif
                        @if ($brokenRecord->status == 'confirmed' && Auth::user()->hasRole('Employee'))
                        <th class=" w-50 text-center col-1 ">
                            <div class="" style="text-align:right ;">
                                <label for="" class="" style="text-align:center;font-size:large;font-weight: bolder;">	عضوية:</label>
                            </div>
                            <div class="form-group row w-10 text-right">
                                <label for="" class="col-2 col-form-label">1-	مسئول الوثائق:       -</label>

                                <div class="col-2">
                                    <label for="" class="col-1 col-form-label">الاسم: </label>
                                {{ $brokenRecord->source_official }}
                                </div>
                            </div>
                            <div class="form-group row w-10 text-right">
                                <label for="" class="col-2 col-form-label">2-	مدير الجودة  :       -</label>
                                
                                <div class="col-2">
                                    <label for="" class="col-1 col-form-label">الاسم : </label>
                                    {{ $brokenRecord->quality_manager }}
                                </div>
                            </div>
                        </th>
                        @endif
                        @if (Auth::user()->hasRole('Admin'))
                        <th class=" w-50 text-center col-1 ">
                            <div class="" style="text-align:right ;">
                                <label for="" class="" style="text-align:center;font-size:large;font-weight: bolder;">	عضوية:</label>
                            </div>
                            <div class="form-group row w-10 text-right">
                                <label for="" class="col-2 col-form-label">1-	مسئول الوثائق:       -</label>

                                <div class="col-2">
                                    <label for="" class="col-1 col-form-label">الاسم: </label>
                                    {{ $brokenRecord->source_official }}
                                </div>
                            </div>
                            @if ($brokenRecord->status == 'confirmed' && Auth::user()->hasRole('Admin'))

                            <div class="form-group row w-10 text-right">
                                <label for="" class="col-2 col-form-label">2-	مدير الجودة  :       -</label>
                                
                                <div class="col-2">
                                    <label for="" class="col-1 col-form-label">الاسم : </label>
                                    {{ $brokenRecord->quality_manager }}
                                </div>
                            </div>
                            @endif
                        </th>
                        
                        @endif
                        @if (Auth::user()->hasRole('SuperAdmin'))
                        <th class=" w-50 text-center col-1 ">
                            <div class="" style="text-align:right ;">
                                <label for="" class="" style="text-align:center;font-size:large;font-weight: bolder;">	عضوية:</label>
                            </div>
                            <div class="form-group row w-10 text-right">
                                <label for="" class="col-2 col-form-label">1-	مسئول الوثائق:       -</label>

                                <div class="col-2">
                                    <label for="" class="col-1 col-form-label">الاسم: </label>
                                    {{ $brokenRecord->source_official }}
                                </div>
                            </div>
                            <div class="form-group row w-10 text-right">
                                <label for="" class="col-2 col-form-label">2-	مدير الجودة  :       -</label>
                                
                                <div class="col-2">
                                    <label for="" class="col-1 col-form-label">الاسم: </label>
                                    {{ $brokenRecord->quality_manager }}
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
                               {{ $brokenRecord->company_name }}
                            </div>

                        </th>
                        <th>
                            <div class="" style="text-align:start ;">
                               {{ $brokenRecord->date2 }}
                            </div>

                        </th>
                        <th>
                            <div class="" style="text-align:start ;">
                               {{ $brokenRecord->date3 }}
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
                                    style="text-align: center;font-size:large;font-weight: bolder;"> رقم الوثيقة : QA–F-13 </label>
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
                float:left;
                display: inline-table;
            }
        </style>
<script>
  window.addEventListener("load", window.print());
</script>
@stop
