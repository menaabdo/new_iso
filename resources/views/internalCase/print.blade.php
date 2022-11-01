@extends('layouts.print')

@section('content')


<div class="card">
<div class="card-body">

        <div style="" class="w-100 text-center my-4">
            <h2> استمارة قضايا داخلية</h2>
            <hr class="w-100">
        </div>

        <div>
            <img src="{{ public_path($internalCases->logo) }}" style="float: left;" width="100px" height="50px" />
            
        </div>
        <br>
        <div class="form-group row w-100 text-right" style="text-align:center;">
            <table class="table">
                <tr style="background-color:rgb(249, 235, 141); text-align:center;">
                    <th>موضوع القضية</th>
                    <th>التأثير</th>
                    <th>آلية المراقبة والمراجعة</th>
                </tr>
                <tr style="text-align:center;">
                    <th>
                        <label>(POLITICAL)</label>
                        <br>
                        <textarea class="form-control" type="text" name="political">{{$internalCases->political}}</textarea>
                    </th>
                    <th><textarea class="form-control" type="text" name="political_effect">{{$internalCases->political_effect}}</textarea></th>
                    <th><textarea class="form-control" type="text" name="political_monitoring_review">{{$internalCases->political_monitoring_review}}</textarea></th>
                </tr>
                <tr style="text-align:center;">
                    <th>
                        <label>(ECONOMIC)</label>
                        <br>
                        <textarea class="form-control" type="text" name="economic">{{$internalCases->economic}}</textarea>
                    </th>
                    <th><textarea class="form-control" type="text" name="economic_effect">{{$internalCases->economic_effect}}</textarea></th>
                    <th><textarea class="form-control" type="text" name="economic_monitoring_review">{{$internalCases->economic_monitoring_review}}</textarea></th>
                </tr>
                <tr style="text-align:center;">
                    <th>
                        <label>(SOCIAL)</label>
                        <br>
                        <textarea class="form-control" type="text" name="social">{{$internalCases->social}}</textarea>
                    </th>
                    <th><textarea class="form-control" type="text" name="social_effect">{{$internalCases->social_effect}}</textarea></th>
                    <th><textarea class="form-control" type="text" name="social_monitoring_review">{{$internalCases->social_monitoring_review}}</textarea></th>
                </tr>
                <tr style="text-align:center;">
                    <th>
                        <label>(TECHNOLOGY)</label>
                        <br>
                        <textarea class="form-control" type="text" name="technology">{{$internalCases->technology}}</textarea>
                    </th>
                    <th><textarea class="form-control" type="text" name="technology_effect">{{$internalCases->technology_effect}}</textarea></th>
                    <th><textarea class="form-control" type="text" name="technology_monitoring_review">{{$internalCases->technology_monitoring_review}}</textarea></th>
                </tr>
                <tr style="text-align:center;">
                    <th>
                        <label>(LEGAL)</label>
                        <br>
                        <textarea class="form-control" type="text" name="legal">{{$internalCases->legal}}</textarea>
                    </th>
                    <th><textarea class="form-control" type="text" name="legal_effect">{{$internalCases->legal_effect}}</textarea></th>
                    <th><textarea class="form-control" type="text" name="legal_monitoring_review">{{$internalCases->legal_monitoring_review}}</textarea></th>
                </tr>
                <tr style="text-align:center;">
                    <th>
                        <label style="text-align:center;">(ENVIRONMENTAL)</label>
                        <br>
                        <textarea class="form-control" type="text" name="environment">{{$internalCases->environment}}</textarea>
                    </th>
                    <th><textarea class="form-control" type="text" name="environment_effect">{{$internalCases->environment_effect}}</textarea></th>
                    <th><textarea class="form-control" type="text" name="environment_monitoring_review">{{$internalCases->environment_monitoring_review}}</textarea></th>
                </tr>
            </table>
        </div>
        <hr class="w-100">
        <table class="table">
            <thead>
                <tr style="text-align:center;">
                    @if ($internalCases->status == 'inProgress' && Auth::user()->hasRole('Employee'))
                        <th class=" w-50 text-center col-3 " style="border: 2px solid #150c0c !important;">
                            <div class="form-group row w-20 text-right">
                                <label for="" class="col-3 col-form-label">مسئول الجودة </label>
                                <div class="col-4">
                                 {{ $internalCases->name_1 }}
                                </div>
                            </div>
                        </th>
                    @endif
                    @if ($internalCases->status == 'confirmed' && Auth::user()->hasRole('Employee'))
                        <th class=" w-50 text-center col-3 " style="border: 2px solid #150c0c !important;">
                            <div class="form-group row w-20 text-right">
                                <label for="" class="col-3 col-form-label">مسئول الجودة </label>
                                <div class="col-4">
                                  {{ $internalCases->name_1 }}
                                </div>
                            </div>
                        </th>
                        <th class=" w-50 text-center col-3 " style="border: 2px solid #150c0c !important;">

                            <div class="form-group row w-20 text-right">
                                <label for="" class="col-3 col-form-label">مدير الجودة</label>
                                <div class="col-4">
                                    {{ $internalCases->name_2 }}
                                </div>
                            </div>
                        </th>
                    @endif
                    @if (Auth::user()->hasRole('Admin'))
                        <th class=" text-center col-3 " style="border: 2px solid #150c0c !important;">
                            <div class="form-group row  text-right">
                                <label for="" class="col-3 col-form-label">مسئول الجودة </label>
                                <div class="col-4">
                                   {{ $internalCases->name_1 }}
                                </div>
                            </div>
                        </th>
                        @if ($internalCases->status == 'confirmed' && Auth::user()->hasRole('Admin'))
                            <th class=" w-50 text-center col-3 " style="border: 2px solid #150c0c !important;">

                                <div class="form-group row w-20 text-right">
                                    <label for="" class="col-3 col-form-label">مدير الجودة</label>
                                    <div class="col-4">
                                     {{ $internalCases->name_2 }}
                                    </div>
                                </div>
                            </th>
                        @endif
                    @endif
                    @if (Auth::user()->hasRole('SuperAdmin'))
                        <th class=" w-50 text-center col-3 " style="border: 2px solid #150c0c !important;">
                            <div class="form-group row w-20 text-right">
                                <label for="" class="col-3 col-form-label">مسئول الجودة </label>
                                <div class="col-4">
                                   {{ $internalCases->name_1 }}
                                </div>
                            </div>
                        </th>
                        <th class=" w-50 text-center col-3 " style="border: 2px solid #150c0c !important;">

                            <div class="form-group row w-20 text-right">
                                <label for="" class="col-3 col-form-label">مدير الجودة</label>
                                <div class="col-4">
                                  {{ $internalCases->name_2 }}
                                </div>
                            </div>
                        </th>
                    @endif

                </tr>
            </thead>
        </table>
        <hr class="w-100">
        <table class="table">
            <thead>
                <tr>
                    <th>
                      <div class="" style="text-align:start ;">
                       {{ $internalCases->company_name }}
                      </div>
            
                    </th>
                    <th>
                      <div class="" style="text-align:start ;">
                       {{ $internalCases->date2 }}
                      </div>
            
                    </th>
                    <th>
                        <div class="" style="text-align:start ;">
                            {{ $internalCases->date3 }}
                          </div>
            
                    </th>
                    <th>
                      <div class="" style="text-align:start ;">
                            <label for="" class="" style="text-align: center;font-size:large;font-weight: bolder;"> مدة الحفظ :
                                سنتان </label>
                      </div>
            
                    </th>
                    <th>
                      <div class="" style="text-align:start ;">
                        <label for="" class="" style="text-align: center;font-size:large;font-weight: bolder;"> رقم الصفحة : 1 /
                          1</label>
                      </div>
                    </th>
                    <th>
                      <div class="" style="text-align:start ;">
                        <label for="" class="" style="text-align: center;font-size:large;font-weight: bolder;"> رقم الوثيقة : QA – F
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
        @stop