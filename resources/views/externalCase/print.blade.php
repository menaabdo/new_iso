@extends('layouts.print')

@section('content')

    <div class="card">
        <div class="card-body" style='border:1px solid'>

                <div style="" class="w-100 text-center my-4">
                    <h2 class='text-center' style='text-align:center'> 
                    <img src="{{ asset($externalCase->logo) }}" style="border-radius: 6px;
    border: 2px solid #001635;
    margin: 10px;
    float: left;
    /* padding: 12px;" width="50px" height="50px" />
                    <span style='font-family:Cursive;border-bottom: 1px solid;
    ; box-shadow: 0 1rem 3rem rgba(0, 0, 0, .175) !important;
    border-radius: 6px;
    padding: 4;
}'>استمارة قضايا خارجيه</span>
                   
                    
                </h2>
                  
                   
                </div>
                <div>
                   
                </div>
                <br>
                <div class="form-group row w-100 text-right" style="text-align:center;    border-bottom: none;">
                    <table class="table" style='border:none'>
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
                        </tr>
                        <tr>
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
                            </tr>
                            <tr>
                            @if (Auth::user()->hasRole('Admin'))
                                <th class=" text-center col-3 " style="">
                                    <div class="form-group row  text-right">
                                        <label for="" class="col-3 col-form-label">مسئول الجودة </label>
                                        <div class="col-4">
                                     
                                                {{ $externalCase->name_1 }}
                                        </div>
                                    </div>
                                </th>
                               </tr>
                               <tr>
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
                            </tr>
                            <tr>
                            @if (Auth::user()->hasRole('SuperAdmin'))
                                <th class=" w-50 text-center col-3 " style="border: none;
">
                                    <div class="form-group row w-20 text-right">
                                        <label for="" class="col-3 col-form-label"> {{ $externalCase->name_1 }}:مسئول الجودة </label>
                                        <div class="col-4">
                                           
                                               
                                        </div>
                                    </div>
                                </th>
                               </tr>
                               <tr>
                                <th class=" w-50 text-center col-3 " style="border: none;
">

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
              
                <table class="" style="   border:none;padding:12px;margin-top:12px;background-color: #001635;
    color: white;text-shadow: none;width: 97%;
    margin: auto;
    margin-bottom: 12px;    font-size: 12px;padding: 1px;">
                    <thead >
                        <tr style=''>
                            <th style="border:none;">
                                <div class="" style="text-align:center ;">
                                  {{ $externalCase->company_name }}
                                </div>

                            </th>
                            <th style="border:none;">
                                <div class="" style="text-align:center ;">
                                 {{ $externalCase->date2 }}
                                </div>

                            </th>
                            <th style="border:none;">
                                <div class="" style="text-align:center ;">
                                   {{ $externalCase->date3 }}
                                </div>

                            </th>
                            <th style="border:none;">
                                <div class="" style="text-align:center ;">
                                    <label for="" class=""
                                        style="text-align: center;font-size:13px"> مدة الحفظ :
                                        سنتان </label>
                                </div>

                            </th>
                            <th style="border:none;">
                                <div class="" style="text-align:center ;">
                                    <label for="" class=""
                                        style="text-align: center;font-size:13px"> رقم الصفحة : 1 /
                                        1</label>
                                </div>
                            </th>
                            <th style="border:none;">
                                <div class="" style="text-align:center ;">
                                    <label for="" class=""
                                        style="text-align: center;font-size:13px"> رقم الوثيقة : QA –
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
        /* box-shadow: 0 1rem 3rem rgba(0, 0, 0, .175) !important; */
        border: 1px solid white;
    }
        </style>

        <script>
  window.addEventListener("load", window.print());
</script>
    @stop
