@extends('layouts.print')
@section('content')

    <div class="card">
        <h3 style="margin-top:85px;">أمر تكليف لإجراء مراجعة داخلية لنظام الجودة</h3>
        <hr>
        <img src="{{ public_path($assigned->logo) }}" width="200px" height="100px" />
        <br><br>

        <div class="" style="text-align:center ;">
            <h3 for="" class="" style="text-align:center; color:blue;">أمر تكليف لإجراء مراجعة داخلية لنظام
                الجودة:</h3>
        </div>
        <textarea name="assigned" rows="12" cols="150">
                    {{ $assigned->assigned }}
                </textarea>
        <br><br>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>
                        <div class="" style="text-align:start ;">
                            {{ $assigned->company_name }}
                        </div>

                    </th>
                    <th>
                        <div class="" style="text-align:start ;">
                            {{ $assigned->date2 }}
                        </div>

                    </th>
                    <th>
                        <div class="" style="text-align:start ;">
                            {{ $assigned->date3 }}
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
                                style="text-align: center;font-size:large;font-weight: bolder;"> رقم الوثيقة : QA–F-13 </label>
                        </div>
                    </th>
                </tr>
            </thead>
        </table>

    </div>


@stop
