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
        <div class="card-body">

            <div class="container-fluid p-4" style='text-align:center;border:1px solid silver; box-shadow: 0 1rem 3rem rgba(0, 0, 0, .175) !important;
 '>
                <div style="" class="w-100 text-center my-4">
                    <h2 style='text-align:center;margin-bottom:40px'>
                <span style='font-family:Cursive;border-bottom: 1px solid silver;
    ; box-shadow: 0 1rem 3rem rgba(0, 0, 0, .175) !important;
    border-radius: 6px;
    padding: 10px;text-shadow: 1px 1px 1px #3ed3ea;padding-left: 40px;
    padding-right: 40px;
'>قائمة المراجعين الداخليين المعتمدين لنظام الجودة</span></h2>
                    
                </div>
                <div class="container-fluid p-2">
                    <div class="" style="text-align:center ;">
                        <table class="table">
                            <tr style="background-color: #001635;color:white">
                               
                                <th>الإسم</th>
                                <th>الإدارة التابع لها</th>
                                <th>تاريخ التأهيل</th>
                                <th>مكان التأهيل</th>
                            </tr>
                            @if (count($listInternalAuditor->list) > 0)
                                @foreach ($listInternalAuditor->list as $key => $intr)
                                    <tr id="list-{{ $key }}" style='text-align:center'>

                                        <td>
                                        <input readonly style=' box-shadow: 0 1rem 3rem rgba(0, 0, 0, .175) !important;border:none;
    text-align: center;' value='{{ $intr->name }}'></td>
                                        <td>
                                        <input readonly style=' box-shadow: 0 1rem 3rem rgba(0, 0, 0, .175) !important;border:none;
    text-align: center;' value='{{ $intr->manage }}'>
                                        </td>
                                        <td>
                                        <input readonly style=' box-shadow: 0 1rem 3rem rgba(0, 0, 0, .175) !important;border:none;
    text-align: center;' value='{{ $intr->date }}'>
                                        </td>
                                        <td>  <input readonly style=' box-shadow: 0 1rem 3rem rgba(0, 0, 0, .175) !important;border:none;
    text-align: center;' value='{{ $intr->place }}'>
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
                                        <hr width='20%' color='silver'>
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
                                    
                                        <div class="" style="text-align:center ;" >
                                            <label for="" class="" style='color:gray;
    text-shadow: none;font-size: large;
    font-weight: bolder;'>إعداد</label>
                                              </div>
                                              <div class="" style="text-align:center ;">
                                        <label for="" class="" style='color: gray;
    text-shadow: none;font-size: large;
    font-weight: bolder;'>مدير الجودة </label>
                                    </div>
                                        <div class="form-group row w-10 text-right">
                                            <div class="col-6" style='margin:10px'>
                                                <label for="" class="col-3 col-form-label">التاريخ : -</label>
                                                <input readonly style=' box-shadow: 0 1rem 3rem rgba(0, 0, 0, .175) !important;border:none;
    text-align: center;' value='{{ $listInternalAuditor->date_1 }}    '>
                                    </div>
                                        </div>
                                        <div class="form-group row w-10 text-right">
                                            <div class="col-6">
                                                <label for="" class="col-3 col-form-label">التوقيع: -</label>
                                                <input readonly style=' box-shadow: 0 1rem 3rem rgba(0, 0, 0, .175) !important;border:none;
    text-align: center;' value='  {{ $listInternalAuditor->name }}  '>                                  </div>
                                        </div>
                                    </th>
                                    <th class=" w-90 text-center col-3">
                                      
                                        <div class="" style="text-align:center ;">
                                            <label for="" class=""
                                            style='color: gray;
    text-shadow: none;font-size: large;
    font-weight: bolder;'>إعتماد</label>
                                           
                                        </div>
                                        <div class="" style="text-align:center ;">
                                        <label for="" class="mb-3" style='color: gray;
    text-shadow: none;font-size: large;
    font-weight: bolder;'>المدير العام</label>
                                    </div>
                                        <div class="form-group row w-10 text-right">
                                            <div class="col-6" style='    margin: 10px;'>
                                                <label for="" class="col-3 col-form-label">التاريخ : -</label>
                                                <input readonly style=' box-shadow: 0 1rem 3rem rgba(0, 0, 0, .175) !important;border:none;
    text-align: center;' value=' {{ $listInternalAuditor->date_2 }}    '>                                </div>
                                        </div>


                                        <div class="form-group row w-10 text-right">
                                            <div class="col-6">
                                                <label for="" class="col-3 col-form-label">التوقيع: -</label>
                                                <input readonly style=' box-shadow: 0 1rem 3rem rgba(0, 0, 0, .175) !important;border:none;
    text-align: center;' value='   {{ $listInternalAuditor->manager_name }}'>
                                        </div>
                                    </th>
                                @endif

                            </tr>
                        </thead>
                    </table>
                </div>
                <br><br><br>
                <table class=" table-bordered" style=' border:none;
    padding:12px;
    margin-top:12px;
    background-color: #001635;
    color: white;
    /* text-shadow: none; */
    width: 97%;
    margin: auto;
    margin-bottom: 12px;
    font-size: 12px;
    padding: 1px;'>
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
                                        style="text-align: center;"> مدة الحفظ :
                                        سنتان </label>
                                </div>

                            </th>
                            <th>
                                <div class="" style="text-align:start ;">
                                    <label for="" class=""
                                        style="text-align: center;"> رقم الصفحة : 1
                                        /
                                        1</label>
                                </div>
                            </th>
                            <th>
                                <div class="" style="text-align:start ;">
                                    <label for="" class=""
                                        style="text-align: center;"> رقم الوثيقة :
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
