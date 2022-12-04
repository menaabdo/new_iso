@extends('layouts.print')

@section('content')

    <div class="card">
        <div class="card-body">
            <h3 style="margin-top:85px;">تحليل(SWOT)
            </h3>
            <hr>
            <div>
                <img src="{{ asset($swot->logo) }}" style="float: left;" width="100px" height="50px" />

            </div>
            <br><br>
            <div class="form-group row w-100 text-left">
                <div class="col-4">
                    <label for="" class="col-1 col-form-label"> الاسم :</label>
                    {{ $swot->name_1 }}
                </div>
            </div>
            <div class="form-group row w-100 text-left">
                <div class="col-4">
                    <label for="" class="col-1 col-form-label"> التاريخ :</label>
                    {{ $swot->date_1 }}
                </div>
            </div>
            <br>
            <div class=" form-group row  w-200 text-center">
                <div class="col-6">
                    <label for="" class="col-5 col-form-label text-center">نقاط القوة :</label>
                    <br>
                    <textarea type="text" class="form-control" name="strength_point" placeholder=":"
                        style="border-radius: 50px; border:solid 5px rgb(235, 42, 25); height: 300px; width: 600px;">{{ $swot->strength_point }}</textarea>


                </div>
                <br>
                <div class="col-6">
                    <label for="" class="col-5 col-form-label text-center">الفرص :</label>

                    <br>
                    <textarea type="text" name="opportunities" class="form-control" placeholder=":"
                        style="border-radius: 50px; border:solid 5px rgb(156, 158, 183); height: 300px; width: 600px;">{{ $swot->opportunities }}</textarea>
                </div>
                <br><br><br><br><br><br><br>
                <div class="col-6">
                    <label for="" class="col-5 col-form-label text-center"> نقاط الضعف :</label>

                    <br>
                    <textarea type="text" class="form-control" name="weak_point" placeholder=":"
                        style=" border-radius: 50px; border:solid 5px rgb(46, 255, 19); height: 300px; width: 600px;">{{ $swot->weak_point }}</textarea>

                </div>
                <br>
                <div>
                    <label for="" class="col-5 col-form-label text-center">التهديدات :</label>
                    <br>
                    <textarea type="text" name="threat" class="form-control" placeholder=":"
                        style="border-radius: 50px; border:solid 5px rgb(7, 77, 176); height: 300px; width: 600px;">{{ $swot->threat }}</textarea>

                </div>
                <br>
            </div>
            <hr class="w-100">
            <table class="table">
                <thead>
                    <tr>
                        <th>
                            <div class="" style="text-align:start ;">
                                {{ $swot->company_name }}
                            </div>

                        </th>
                        <th>
                            <div class="" style="text-align:start ;">
                                {{ $swot->date2 }}
                            </div>

                        </th>
                        <th>
                            <div class="" style="text-align:start ;">
                                {{ $swot->date3 }}
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
                                    style="text-align: center;font-size:large;font-weight: bolder;"> رقم الوثيقة : QA – F
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
                float: left;
                display: inline-table;
            }
        </style>
        <script>
  window.addEventListener("load", window.print());
</script>
    @stop
