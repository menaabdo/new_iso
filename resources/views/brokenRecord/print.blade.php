@extends('layouts.print')

@section('content')
<style>
    input,textarea {
        box-shadow: 0 1rem 3rem rgba(0, 0, 0, .175) !important;
    }
    textarea{
        border: none;
    height: 80px;
    padding: 10px;
    }
    input{
        font-size: .875rem;
    line-height: 1.5;
    color: #4F5467;
    background-color: #fff;
    border: 1px solid #e9ecef;
    border-radius: 2px;
    }

</style>

    <div class="card">
        <div class="card-body" style='text-align:center;border:1px solid silver; box-shadow: 0 1rem 3rem rgba(0, 0, 0, .175) !important;
 '>
            <div style="" class="w-100 text-center my-4">
            <h2 style='text-align:center;margin-bottom:40px'>
            <img src="{{ asset($brokenRecord->logo) }}" style="border-radius: 6px;
    border: 2px solid #001635;
    margin: 10px;
    float: left;
    /* padding: 12px;" width="50px" height="50px" />
  
  <span style='font-family:Cursive;border-bottom: 1px solid silver;
    ; box-shadow: 0 1rem 3rem rgba(0, 0, 0, .175) !important;
    border-radius: 6px;
    padding: 10px;text-shadow: 1px 1px 1px #3ed3ea;padding-left: 40px;
    padding-right: 40px;
'> بيان السجلات المعدمة</span>               
</h2>
                <hr class="w-100">
            </div>
            <div>
              
            </div>
            <br><br>
            <div class="form-group row w-100 text-center" style="text-align:center ;">
                <table class="table" style='border:none'>
                    <tr style="background-color:#001635;color:white;    width: 20%;">
                
                        <th scope="col" rowspan="2">نوع السجل</th>
                        <th scope="col" rowspan="2">الكود</th>
                        <th scope="col" colspan="2">فترة الاستخدام</th>
                        <th scope="col" rowspan="2">مكان الحفظ</th>
                        <th scope="col" rowspan="2">أسلوب التخلص</th>
                        <th scope="col" rowspan="2">التاريخ</th>
                    </tr>
                    <tr style="background-color:#001635;color:white;    width: 20%;">
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
            <table class="table" style='border:none'>
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

            <table class="table" style='border:none'>
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
            <table class="table" style="  ; border:none;padding:12px;margin-top:12px;background-color: #001635;
    color: white;text-shadow: none;width: 97%;
    margin: auto;
    margin-bottom: 12px;    font-size: 12px;padding: 1px;">
   
                <thead>
                    <tr>
                        <th style='border:none'>
                            <div class="" style="text-align:start ;">
                               {{ $brokenRecord->company_name }}
                            </div>

                        </th>
                        <th style='border:none'>
                            <div class="" style="text-align:start ;">
                               {{ $brokenRecord->date2 }}
                            </div>

                        </th>
                        <th style='border:none'>
                            <div class="" style="text-align:start ;">
                               {{ $brokenRecord->date3 }}
                            </div>

                        </th>
                        <th style='border:none'>
                            <div class="" style="text-align:start ;">
                                <label for="" class=""
                                    style="text-align: center;"> مدة الحفظ : سنتان </label>
                            </div>

                        </th>
                        <th style='border:none'>
                            <div class="" style="text-align:start ;">
                                <label for="" class=""
                                    style="text-align: center;"> رقم الصفحة : 1 / 1</label>
                            </div>
                        </th>
                        <th style='border:none'>
                            <div class="" style="text-align:start ;">
                                <label for="" class=""
                                    style="text-align: center;"> رقم الوثيقة : QA–F-13 </label>
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
