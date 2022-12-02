@extends('layouts.print')

@section('content')

    <div class="card">
        <div class="card-body" style='border:1px solid'>

                <div style="" class="w-100 text-center my-4">
                    <h2 class='text-center' style='text-align:center'> 
                    <span style='font-family:Cursive;border-bottom: 1px solid;
    ; box-shadow: 0 1rem 3rem rgba(0, 0, 0, .175) !important;
    border-radius: 6px;
    padding: 4;
}'>استمارة قضايا خارجيه</span>
                    <img src="{{ asset($externalCase->logo) }}" style="border-radius: 6px;
    border: 2px solid #001635;
    margin: 10px;
    float: left;
    /* padding: 12px;" width="50px" height="50px" />
                    
                </h2>
                  
                   
                </div>
                <div>
                   
                </div>
                <br>
                <div class="form-group row w-100 text-right" style="text-align:center;    border-bottom: none;">
                    <table class="table" style='border-top:none;border-bottom:none'>
                        <tr style="background-color:#001635;padding:12px;color:white; text-align:center;">
                        <th>موضوع القضية</th>
                            <th>التأثير</th>
                            <th>آلية المراقبة والمراجعة</th>
                        </tr>
                        <tr style="text-align:center;">
                            <th>
                                <label>(POLITICAL)</label>
                                <br>
                                <textarea class="form-control" type="text" name="political">{{ $externalCase->political }}</textarea>
                            </th>
                            <th>
                                <textarea class="form-control" type="text" name="political_effect">{{ $externalCase->political_effect }}</textarea>
                            </th>
                            <th>
                                <textarea class="form-control" type="text" name="political_monitoring_review">{{ $externalCase->political_monitoring_review }}</textarea>
                            </th>
                        </tr>
                        <tr style="text-align:center;">
                            <th>
                                <label>(ECONOMIC)</label>
                                <br>
                                <textarea class="form-control" type="text" name="economic">{{ $externalCase->economic }}</textarea>
                            </th>
                            <th>
                                <textarea class="form-control" type="text" name="economic_effect">{{ $externalCase->economic_effect }}</textarea>
                            </th>
                            <th>
                                <textarea class="form-control" type="text" name="economic_monitoring_review">{{ $externalCase->economic_monitoring_review }}</textarea>
                            </th>
                        </tr>
                        <tr style="text-align:center;">
                            <th>
                                <label>(SOCIAL)</label>
                                <br>
                                <textarea class="form-control" type="text" name="social">{{ $externalCase->social }}</textarea>
                            </th>
                            <th>
                                <textarea class="form-control" type="text" name="social_effect">{{ $externalCase->social_effect }}</textarea>
                            </th>
                            <th>
                                <textarea class="form-control" type="text" name="social_monitoring_review">{{ $externalCase->social_monitoring_review }}</textarea>
                            </th>
                        </tr>
                        <tr style="text-align:center;">
                            <th>
                                <label>(TECHNOLOGY)</label>
                                <br>
                                <textarea class="form-control" type="text" name="technology">{{ $externalCase->technology }}</textarea>
                            </th>
                            <th>
                                <textarea class="form-control" type="text" name="technology_effect">{{ $externalCase->technology_effect }}</textarea>
                            </th>
                            <th>
                                <textarea class="form-control" type="text" name="technology_monitoring_review">{{ $externalCase->technology_monitoring_review }}</textarea>
                            </th>
                        </tr>
                        <tr style="text-align:center;">
                            <th>
                                <label>(LEGAL)</label>
                                <br>
                                <textarea class="form-control" type="text" name="legal">{{ $externalCase->legal }}</textarea>
                            </th>
                            <th>
                                <textarea class="form-control" type="text" name="legal_effect">{{ $externalCase->legal_effect }}</textarea>
                            </th>
                            <th>
                                <textarea class="form-control" type="text" name="legal_monitoring_review">{{ $externalCase->legal_monitoring_review }}</textarea>
                            </th>
                        </tr>
                        <tr style="text-align:center;">
                            <th>
                                <label style="text-align:center;">(ENVIRONMENTAL)</label>
                                <br>
                                <textarea class="form-control" type="text" name="environment">{{ $externalCase->environment }}</textarea>
                            </th>
                            <th>
                                <textarea class="form-control" type="text" name="environment_effect">{{ $externalCase->environment_effect }}</textarea>
                            </th>
                            <th>
                                <textarea class="form-control" type="text" name="environment_monitoring_review">{{ $externalCase->environment_monitoring_review }}</textarea>
                            </th>
                        </tr>
                    </table>
                </div>
               
                <table class="table" style='    padding: 10px;border:none'>
                    <thead>
                        <tr style="text-align:center;">
                            @if ($externalCase->status == 'inProgress' && Auth::user()->hasRole('Employee'))
                                <th class=" w-50 text-center col-3 " style="">
                                    <div class="form-group row w-20 text-right">
                                        <label for="" class="col-3 col-form-label">مسئول الجودة </label>
                                        <div class="col-4">
                                            
                                              {{ $externalCase->name_1 }}
                                        </div>
                                    </div>
                                </th>
                            @endif
                            @if ($externalCase->status == 'confirmed' && Auth::user()->hasRole('Employee'))
                                <th class=" w-50 text-center col-3 " style="border: 2px solid #150c0c !important;">
                                    <div class="form-group row w-20 text-right">
                                        <label for="" class="col-3 col-form-label">مسئول الجودة </label>
                                        <div class="col-4">
                                     
                                               {{ $externalCase->name_1 }}
                                        </div>
                                    </div>
                                </th>
                                <th class=" w-50 text-center col-3 " style="">

                                    <div class="form-group row w-20 text-right">
                                        <label for="" class="col-3 col-form-label">مدير الجودة</label>
                                        <div class="col-4">
                                           
                                                {{ $externalCase->name_2 }}
                                        </div>
                                    </div>
                                </th>
                            @endif
                            @if (Auth::user()->hasRole('Admin'))
                                <th class=" text-center col-3 " style="">
                                    <div class="form-group row  text-right">
                                        <label for="" class="col-3 col-form-label">مسئول الجودة </label>
                                        <div class="col-4">
                                     
                                                {{ $externalCase->name_1 }}
                                        </div>
                                    </div>
                                </th>
                                @if ($externalCase->status == 'confirmed' && Auth::user()->hasRole('Admin'))
                                    <th class=" w-50 text-center col-3 " style="">

                                        <div class="form-group row w-20 text-right">
                                            <label for="" class="col-3 col-form-label">مدير الجودة</label>
                                            <div class="col-4">
                                              
                                                    {{ $externalCase->name_2 }}
                                            </div>
                                        </div>
                                    </th>
                                @endif
                            @endif
                            @if (Auth::user()->hasRole('SuperAdmin'))
                                <th class=" w-50 text-center col-3 " style="">
                                    <div class="form-group row w-20 text-right">
                                        <label for="" class="col-3 col-form-label">مسئول الجودة </label>
                                        <div class="col-4">
                                           
                                                {{ $externalCase->name_1 }}
                                        </div>
                                    </div>
                                </th>
                                <th class=" w-50 text-center col-3 " style="">

                                    <div class="form-group row w-20 text-right">
                                        <label for="" class="col-3 col-form-label">مدير الجودة</label>
                                        <div class="col-4">
                                         
                                                {{ $externalCase->name_2 }}
                                        </div>
                                    </div>
                                </th>
                            @endif

                        </tr>
                    </thead>
                </table>
              
                <table class="table" style="text-align:center;    border-bottom: none;border-top:none;padding:12px">
                    <thead>
                        <tr>
                            <th>
                                <div class="" style="text-align:start ;">
                                  {{ $externalCase->company_name }}
                                </div>

                            </th>
                            <th>
                                <div class="" style="text-align:start ;">
                                 {{ $externalCase->date2 }}
                                </div>

                            </th>
                            <th>
                                <div class="" style="text-align:start ;">
                                   {{ $externalCase->date3 }}
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
        </div>
        <style>
            .table thead th {
                vertical-align: bottom;
              
            }

            table,
            th,
            td,
            tr {
                border: 1px solid silver;
                border-top:none;
                
              
               
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
            table, th {padding:0;
             border-top:1px solid silver;}
            input,
    textarea {
        box-shadow: 0 1rem 3rem rgba(0, 0, 0, .175) !important;
        border: 1px solid white;
    }
        </style>

        <script>
  window.addEventListener("load", window.print());
</script>
    @stop
