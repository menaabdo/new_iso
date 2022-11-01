@extends('layouts.master')

@section('content')

 
    <div class="card">
<div class="card-body">
        <h3 style="margin-top:85px;">إحصائيات حالات عدم المطابقة</h3>
        <hr>
        <form action="{{ route('nonConformanceStats.store') }}" method="post" enctype="multipart/form-data" id="fo1">
            {{ csrf_field() }}
            <div style="" class="w-100 text-center my-4">
                <h2> إحصائيات حالات عدم المطابقة</h2>
                <hr class="w-100">
            </div>
            <div id="mainDiv" style=" margin-right:500px;">
                <h4 style=" color:blue;">CO LOGO</h4>
                <hr width="50%" size="20" color="blue">
                <input type="file" id="img" name="logo" accept="image/*">
            </div>
            <hr class="w-100">


            <div class="form-group row w-100 text-right" style="text-align:center;overflow-x:auto;">
               
                <table class="table">
                    <tr style="background-color:rgb(218, 249, 163); text-align:center;">
                        <th scope="col" rowspan="2">م</th>
                        <th scope="col" rowspan="2">الإدارة</th>
                        <th scope="col" colspan="12">شهر / سنه</th>
                        <th scope="col" rowspan="2">مجموع حالات عدم المطابقة</th>
                    </tr>
                    <tr style="background-color:rgb(218, 249, 163); text-align:center;">
                        <th>يناير</th>
                        <th>فبراير</th>
                        <th> مارس</th>
                        <th> إبريل</th>
                        <th> مايو</th>
                        <th> يونيو</th>
                        <th> يوليو</th>
                        <th>أغسطس</th>
                        <th>سبتمبر</th>
                        <th>أكتوبر</th>
                        <th>نوفمبر</th>
                        <th>ديسمبر</th>
                    </tr>
                    <tr id="nonConformanceStats-0">
                        <th class="text-center end-td ">
                            <button type="button" title="Remove" disabled="disabled" class="btn btn-danger btn-option">
                                <i class="fa fa-minus-circle"></i>
                            </button>
                        </th>
                        <th><input class="form-control" style="width: 250px;" type="text" name="nonConformanceStats[0][managment]"></th>
                        <th><input style="width: 20px; height: 20px; " type="checkbox" name="nonConformanceStats[0][jan]"
                                value="1"></th>
                        <th><input style="width: 20px; height: 20px; " type="checkbox" name="nonConformanceStats[0][feb]"
                                value="1"></th>
                        <th><input style="width: 20px; height: 20px; " type="checkbox" name="nonConformanceStats[0][mar]"
                                value="1"></th>
                        <th><input style="width: 20px; height: 20px; " type="checkbox" name="nonConformanceStats[0][epr]"
                                value="1"></th>
                        <th><input style="width: 20px; height: 20px; " type="checkbox" name="nonConformanceStats[0][may]"
                                value="1"></th>
                        <th><input style="width: 20px; height: 20px; " type="checkbox" name="nonConformanceStats[0][jaun]"
                                value="1"></th>
                        <th><input style="width: 20px; height: 20px; " type="checkbox" name="nonConformanceStats[0][jun]"
                                value="1"></th>
                        <th><input style="width: 20px; height: 20px; " type="checkbox" name="nonConformanceStats[0][augest]"
                                value="1"></th>
                        <th><input style="width: 20px; height: 20px; " type="checkbox" name="nonConformanceStats[0][sep]"
                                value="1"></th>
                        <th><input style="width: 20px; height: 20px; " type="checkbox" name="nonConformanceStats[0][oct]"
                                value="1"></th>
                        <th><input style="width: 20px; height: 20px; " type="checkbox" name="nonConformanceStats[0][nov]"
                                value="1"></th>
                        <th><input style="width: 20px; height: 20px; " type="checkbox" name="nonConformanceStats[0][des]"
                                value="1"></th>
                        <th>
                            <input class="form-control" style="width: 250px;" type="text" name="nonConformanceStats[0][total_trainees]">
                        </th>
                    </tr>
                    <tr class="datatable-row datatable-row-even">
                        <td class="text-center end-td " id="increment">
                            <button type="button" class="btn btn-primary add_new" id="btn-0" onclick="appendRow(0)"><i
                                    class="fa fa-plus-circle"></i></button>
                        </td>
                    </tr>
                    <tr>
                        <th style="background-color:rgb(218, 249, 163); text-align:center;" scope="col"  colspan="2">الاجمالى
                        </th>
                        <th><input class="form-control"  type="text" name="total_1"></th>
                        <th><input class="form-control" type="text" name="total_2"></th>
                        <th><input class="form-control" type="text" name="total_3"></th>
                        <th><input class="form-control" type="text" name="total_4"></th>
                        <th><input class="form-control" type="text" name="total_5"></th>
                        <th><input class="form-control" type="text" name="total_6"></th>
                        <th><input class="form-control" type="text" name="total_7"></th>
                        <th><input class="form-control" type="text" name="total_8"></th>
                        <th><input class="form-control" type="text" name="total_9"></th>
                        <th><input class="form-control" type="text" name="total_10"></th>
                        <th><input class="form-control" type="text" name="total_11"></th>
                        <th><input class="form-control" type="text" name="total_12"></th>
                        <th><input class="form-control" type="text" name="total_13"></th>
                    </tr>
                </table>
            </div>

            <hr class="w-100">
            <div class="form-group row ">
                <label for="" class="col-3 col-form-label">الإستنتاج:</label>
                <div class="col-6">
                    <input type="text" class="form-control" name="conclusion">
                </div>
            </div>
            <hr class="w-100">
            <table class="table">
                <thead>
                    <tr>
                        <th>
                            <div class="" style="text-align:start ;">
                                <input class="form-control" type="text" name="company_name" placeholder="اسم الشركة  :">
                            </div>

                        </th>
                        <th>
                            <div class="" style="text-align:start ;">
                                <input class="form-control" type="text" name="date2" placeholder="تاريخ الإصدار   :"
                                    onfocus="(this.type='date')" onblur="(this.type='text')">
                            </div>

                        </th>
                        <th>
                            <div class="" style="text-align:start ;">
                                <input class="form-control" type="text" name="date3" placeholder="تاريخ التعديل :"
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
                                    style="text-align: center;font-size:large;font-weight: bolder;"> رقم الوثيقة : QA – F
                                    - 13 </label>
                            </div>
                        </th>
                    </tr>
                </thead>
            </table>
            <div class="form-group">
                <button style="border-radius:20px;margin: 50px; width:10% ; height: 5%;" type="submit"
                    class="btn btn-primary btn-lg"><i class="fas fa-save" style="width:15% ; height: 20%;"></i> حفظ
                </button>
            </div>
        </form>
    </div>

    <script>
        function appendRow(num) {
            $new_number = parseInt(num) + 1;
            $appended_text = ` <tr class="datatable-row datatable-row-even" id="nonConformanceStats-${$new_number}">
                                         
                                            <td class="text-center end-td ">
                                                        <button type="button" title="Remove" onclick="removeRow(${$new_number})"
                                                                class="btn btn-danger btn-option">
                                                                <i class="fa fa-minus-circle"></i>
                                                        </button>
                                            </td>
                                            <th><input class="form-control" type="text" style="width: 250px;" name="nonConformanceStats[${$new_number}][managment]"></th>
                                            <th><input style="width: 20px; height: 20px; " type="checkbox" name="nonConformanceStats[0][jan]" value="1"></th>
                    <th><input style="width: 20px; height: 20px; " type="checkbox" name="nonConformanceStats[${$new_number}][feb]" value="1"></th>
                    <th><input style="width: 20px; height: 20px; " type="checkbox" name="nonConformanceStats[${$new_number}][mar]" value="1"></th>
                    <th><input style="width: 20px; height: 20px; " type="checkbox" name="nonConformanceStats[${$new_number}][epr]" value="1"></th>
                    <th><input style="width: 20px; height: 20px; " type="checkbox" name="nonConformanceStats[${$new_number}][may]" value="1"></th>
                    <th><input style="width: 20px; height: 20px; " type="checkbox" name="nonConformanceStats[${$new_number}][jaun]" value="1"></th>
                    <th><input style="width: 20px; height: 20px; " type="checkbox" name="nonConformanceStats[${$new_number}][jun]" value="1"></th>
                    <th><input style="width: 20px; height: 20px; " type="checkbox" name="nonConformanceStats[${$new_number}][augest]" value="1"></th>
                    <th><input style="width: 20px; height: 20px; " type="checkbox" name="nonConformanceStats[${$new_number}][sep]" value="1"></th>
                    <th><input style="width: 20px; height: 20px; " type="checkbox" name="nonConformanceStats[${$new_number}][oct]" value="1"></th>
                    <th><input style="width: 20px; height: 20px; " type="checkbox" name="nonConformanceStats[${$new_number}][nov]" value="1"></th>
                    <th><input style="width: 20px; height: 20px; " type="checkbox" name="nonConformanceStats[${$new_number}][des]" value="1"></th>
                                            <th><input class="form-control" style="width: 250px;" type="text" name="nonConformanceStats[${$new_number}][total_trainees]"></th>
                                        </tr>`;
            $($appended_text).insertAfter(`#nonConformanceStats-${num}`);
            if (!document.getElementById(`nonConformanceStats-${num}`)) {
                $($appended_text).insertAfter(`#nonConformanceStats-0`);
            }

            $(`#btn-${num}`).remove();
            $("#increment").append(
                `<button type="button" class="btn btn-primary add_new" id="btn-${$new_number}" onclick="appendRow(${$new_number})"><i class="fa fa-plus-circle"></i></button></td>`
                );
        }

        function removeRow(num) {
            $(`#nonConformanceStats-${num}`).remove();

        }
    </script>
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
