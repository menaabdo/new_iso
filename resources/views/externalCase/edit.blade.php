@extends('layouts.master')

@section('content')

    <div class="card">
        <div class="card-body">
            <h3 style="margin-top:85px;">استمارة قضايا خارجيه</h3>
            <hr>
            <form action="{{ route('externalCases.update', $externalCase->id) }}" method="post" enctype="multipart/form-data"
                id="fo1">
                @method('PUT')
                {{ csrf_field() }}
                <div style="" class="w-100 text-center my-4">
                    <h2> استمارة قضايا خارجيه</h2>
                    <hr class="w-100">
                </div>
                <div id="mainDiv" style=" margin-right:500px;">
                    <h4 style=" color:blue;">CO LOGO</h4>
                    <hr width="50%" size="20" color="blue">
                    <img src="{{ asset($externalCase->logo) }}" height=180px width=210px; />
                    @if ($externalCase->status == 'pending' && Auth::user()->hasRole('Employee'))
                        <input type="file" id="img" name="logo" accept="image/*">
                    @endif

                    @if (($externalCase->status == 'inProgress' && Auth::user()->hasRole('Admin')) ||
                        ($externalCase->status == 'pending' && Auth::user()->hasRole('Admin')))
                        <input type="file" id="img" name="logo" accept="image/*">
                    @endif
                    @if (($externalCase->status == 'inProgress' && Auth::user()->hasRole('SuperAdmin')) ||
                        ($externalCase->status == 'pending' && Auth::user()->hasRole('SuperAdmin')) ||
                        ($externalCase->status == 'confirmed' && Auth::user()->hasRole('SuperAdmin')))
                        <input type="file" id="img" name="logo" accept="image/*">
                    @endif
                </div>
                <hr class="w-100">
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
                <hr class="w-100">
                <table class="table">
                    <thead>
                        <tr style="text-align:center;">
                            @if ($externalCase->status == 'inProgress' && Auth::user()->hasRole('Employee'))
                                <th class=" w-50 text-center col-3 " style="border: 2px solid #150c0c !important;">
                                    <div class="form-group row w-20 text-right">
                                        <label for="" class="col-3 col-form-label">مسئول الجودة </label>
                                        <div class="col-4">
                                            <input type="text" class="form-control" readonly name="name_1"
                                                value="{{ $externalCase->name_1 }}">
                                        </div>
                                    </div>
                                </th>
                            @endif
                            @if ($externalCase->status == 'confirmed' && Auth::user()->hasRole('Employee'))
                                <th class=" w-50 text-center col-3 " style="border: 2px solid #150c0c !important;">
                                    <div class="form-group row w-20 text-right">
                                        <label for="" class="col-3 col-form-label">مسئول الجودة </label>
                                        <div class="col-4">
                                            <input type="text" class="form-control" readonly name="name_1"
                                                value="{{ $externalCase->name_1 }}">
                                        </div>
                                    </div>
                                </th>
                                <th class=" w-50 text-center col-3 " style="border: 2px solid #150c0c !important;">

                                    <div class="form-group row w-20 text-right">
                                        <label for="" class="col-3 col-form-label">مدير الجودة</label>
                                        <div class="col-4">
                                            <input type="text" class="form-control" readonly name="name_2"
                                                value="{{ $externalCase->name_2 }}">
                                        </div>
                                    </div>
                                </th>
                            @endif
                            @if (Auth::user()->hasRole('Admin'))
                                <th class=" text-center col-3 " style="border: 2px solid #150c0c !important;">
                                    <div class="form-group row  text-right">
                                        <label for="" class="col-3 col-form-label">مسئول الجودة </label>
                                        <div class="col-4">
                                            <input type="text" class="form-control" name="name_1"
                                                value="{{ $externalCase->name_1 }}">
                                        </div>
                                    </div>
                                </th>
                                @if ($externalCase->status == 'confirmed' && Auth::user()->hasRole('Admin'))
                                    <th class=" w-50 text-center col-3 " style="border: 2px solid #150c0c !important;">

                                        <div class="form-group row w-20 text-right">
                                            <label for="" class="col-3 col-form-label">مدير الجودة</label>
                                            <div class="col-4">
                                                <input type="text" class="form-control" readonly name="name_2"
                                                    value="{{ $externalCase->name_2 }}">
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
                                            <input type="text" class="form-control" name="name_1"
                                                value="{{ $externalCase->name_1 }}">
                                        </div>
                                    </div>
                                </th>
                                <th class=" w-50 text-center col-3 " style="border: 2px solid #150c0c !important;">

                                    <div class="form-group row w-20 text-right">
                                        <label for="" class="col-3 col-form-label">مدير الجودة</label>
                                        <div class="col-4">
                                            <input type="text" class="form-control" name="name_2"
                                                value="{{ $externalCase->name_2 }}">
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
                                    <input class="form-control" type="text" name="company_name"
                                        placeholder="اسم الشركة  :" value="{{ $externalCase->company_name }}">
                                </div>

                            </th>
                            <th>
                                <div class="" style="text-align:start ;">
                                    <input class="form-control" type="text" name="date2"
                                        value="{{ $externalCase->date2 }}" placeholder="تاريخ الإصدار   :"
                                        onfocus="(this.type='date')" onblur="(this.type='text')">
                                </div>

                            </th>
                            <th>
                                <div class="" style="text-align:start ;">
                                    <input class="form-control" type="text" name="date3"
                                        value="{{ $externalCase->date3 }}" placeholder="تاريخ التعديل :"
                                        onfocus="(this.type='date')" onblur="(this.type='text')">
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
                @if ($externalCase->status == 'pending' && Auth::user()->hasRole('Employee'))
                    <div class="form-group">
                        <button style="border-radius:20px;margin: 50px; width:10% ; height: 5%;" type="submit"
                            class="btn btn-primary"><i class="fas fa-save" style="width:15% ; height: 20%;">تعديل
                            </i></button>
                    </div>
                @elseif(($externalCase->status == 'inProgress' && Auth::user()->hasRole('Admin')) ||
                    ($externalCase->status == 'pending' && Auth::user()->hasRole('Admin')))
                    <div class="form-group">
                        <button style="border-radius:20px;margin: 50px; width:10% ; height: 5%;" type="submit"
                            class="btn btn-primary"><i class="fas fa-save" style="width:15% ; height: 20%;">تعديل
                            </i></button>
                    </div>
                @elseif(($externalCase->status == 'inProgress' && Auth::user()->hasRole('SuperAdmin')) ||
                    ($externalCase->status == 'pending' && Auth::user()->hasRole('SuperAdmin')) ||
                    ($externalCase->status == 'confirmed' && Auth::user()->hasRole('SuperAdmin')))
                    <div class="form-group">
                        <button style="border-radius:20px;margin: 50px; width:10% ; height: 5%;" type="submit"
                            class="btn btn-primary"><i class="fas fa-save" style="width:15% ; height: 20%;">تعديل
                            </i></button>
                    </div>
                @endif
            </form>
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
                float: left;
                display: inline-table;
            }
        </style>
    @stop
