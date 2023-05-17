@extends('layouts.master')

@section('content')

<!-- Content Header (Page header) -->
<style>
    .shadow-lg {
        box-shadow: 0 1rem 3rem rgba(0, 0, 0, .175) !important;
    }

    input,
    textarea {
        box-shadow: 0 1rem 3rem rgba(0, 0, 0, .175) !important;
    }

</style>
<div class="card" style='margin:auto;'>
    <div class="card-body " style='margin:auto;margin-top:80px;width:80%'>

       

        <form action="{{ route('trainingStats.store') }}" method="post" class='' style='' enctype="multipart/form-data" id="fo1">
            {{ csrf_field() }}
            <div style="" class="w-100 text-center my-4">
                <h2 style='text-shadow: 1px 1px 1px #3ed3ea;'> إحصائيات التدريب</h2>
                <hr class="w-100">
            </div>
            <div class='row mt-4 mb-3'>
                <label class="form-label col-md-2 ">CO LOGO</label>
      
                <input type="file" id="img" name="logo" accept="image/*">
            </div>
            <hr class="w-100">


            <div class="form-group row w-100 text-right" style="text-align:center;overflow-x:auto;">
                <table class="table">
                    <tr style="background-color:    #001635; color:white;text-align:center;">
                      <th scope="col" rowspan="2">م</th>
                        <th scope="col" rowspan="2">الإدارة</th>
                        <th scope="col" colspan="12">شهر / سنه</th>
                        <th scope="col" rowspan="2">مجموع المتدربين</th>
                    </tr>
                    <tr style="background-color:    #001635; color:white;text-align:center;">
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
                    <tr id="trainingStats-0">
                        <th class="text-center end-td ">
                            <button type="button" title="Remove" disabled="disabled" class="btn btn-danger btn-option">
                                <i class="fa fa-minus-circle"></i>
                            </button>
                        </th>
                        <th><input class="form-control" style="width: 250px;" type="text" name="trainingStats[0][managment]"></th>
                        <th><input style="width: 20px; height: 20px; " type="checkbox" name="trainingStats[0][jan]" value="1"></th>
                        <th><input style="width: 20px; height: 20px; " type="checkbox" name="trainingStats[0][feb]" value="1"></th>
                        <th><input style="width: 20px; height: 20px; " type="checkbox" name="trainingStats[0][mar]" value="1"></th>
                        <th><input style="width: 20px; height: 20px; " type="checkbox" name="trainingStats[0][epr]" value="1"></th>
                        <th><input style="width: 20px; height: 20px; " type="checkbox" name="trainingStats[0][may]" value="1"></th>
                        <th><input style="width: 20px; height: 20px; " type="checkbox" name="trainingStats[0][jaun]" value="1"></th>
                        <th><input style="width: 20px; height: 20px; " type="checkbox" name="trainingStats[0][jun]" value="1"></th>
                        <th><input style="width: 20px; height: 20px; " type="checkbox" name="trainingStats[0][augest]" value="1"></th>
                        <th><input style="width: 20px; height: 20px; " type="checkbox" name="trainingStats[0][sep]" value="1"></th>
                        <th><input style="width: 20px; height: 20px; " type="checkbox" name="trainingStats[0][oct]" value="1"></th>
                        <th><input style="width: 20px; height: 20px; " type="checkbox" name="trainingStats[0][nov]" value="1"></th>
                        <th><input style="width: 20px; height: 20px; " type="checkbox" name="trainingStats[0][des]" value="1"></th>
                        <th>
                            <input class="form-control" style="width: 250px;" type="text" name="trainingStats[0][total_trainees]">
                        </th>
                    </tr>
                    <tr class="datatable-row datatable-row-even">
                        <td class="text-center end-td " id="increment">
                            <button type="button" class="btn btn-primary add_new" id="btn-0" onclick="appendRow(0)"><i class="fa fa-plus-circle"></i></button>
                        </td>
                    </tr>
                    <tr>
                        <th style="background-color:rgb(218, 249, 163); text-align:center;" scope="col" colspan="2">الاجمالى
                        </th>
                        <th><input class="form-control" type="text" name="total_1"></th>
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
            <div class="form-group row w-100 text-right" style="text-align:center;overflow:auto">
    
            <table class="table">
                <thead>
                    <tr>
                        <th>
                            <div class="" style="text-align:start ;">
                            <label>اسم الشركة</label>
                                <input class="form-control" type="text" name="company_name" >
                            </div>

                        </th>
                        <th>
                            <div class="" style="text-align:start ;">
                            <label>تاريخ الاصدار</label>
                              
                                <input class="form-control" type="text" name="date2"  onfocus="(this.type='date')" onblur="(this.type='text')">
                            </div>

                        </th>
                        <th>
                            <div class="" style="text-align:start ;">
                            <label>تاريخ التعديل</label>
                              
                                <input class="form-control" type="text" name="date3"  onfocus="(this.type='date')" onblur="(this.type='text')">
                            </div>

                        </th>
                        <th>
                            <div class="" style="text-align:start ;">
                                <label> مدة الحفظ </label>
                                <input class="form-control shadow-lg" type="text" name="period_time">
                            </div>

                        </th>
                        <th>
                            <div class="" style="text-align:start ;">
                                <label> رقم الصفحة </label>
                                <input class="form-control shadow-lg" type="text" name="number_page">
                            </div>

                        </th>
                        <th>
                            <div class="" style="text-align:start ;">
                                <label> رقم الوثيقة </label>
                                <input class="form-control shadow-lg" type="text" name="number_doc">
                            </div>
                        </th>
                    </tr>
                </thead>
            </table>
                 </div>
            <div class='row'>
            <button style="border-radius:8px;margin: 50px; width:30% ;background-color: #2a415b; ;height: 5%;padding:10px;margin-right:100px;margin:auto" type="submit"
                class="btn btn-primary col-md-4">
                <i class="fas fa-save" style="width:15% ; height: 20%;"></i>حفظ</button>
                    </div>  
        </form>
    </div>
    </div>

    <script>
        function appendRow(num) {
            $new_number = parseInt(num) + 1;
            $appended_text = ` <tr class="datatable-row datatable-row-even" id="trainingStats-${$new_number}">
                                         
                                            <td class="text-center end-td ">
                                                        <button type="button" title="Remove" onclick="removeRow(${$new_number})"
                                                                class="btn btn-danger btn-option">
                                                                <i class="fa fa-minus-circle"></i>
                                                        </button>
                                            </td>
                                            <th><input class="form-control" type="text" style="width: 250px;" name="trainingStats[${$new_number}][managment]"></th>
                                            <th><input style="width: 20px; height: 20px; " type="checkbox" name="trainingStats[0][jan]" value="1"></th>
                    <th><input style="width: 20px; height: 20px; " type="checkbox" name="trainingStats[${$new_number}][feb]" value="1"></th>
                    <th><input style="width: 20px; height: 20px; " type="checkbox" name="trainingStats[${$new_number}][mar]" value="1"></th>
                    <th><input style="width: 20px; height: 20px; " type="checkbox" name="trainingStats[${$new_number}][epr]" value="1"></th>
                    <th><input style="width: 20px; height: 20px; " type="checkbox" name="trainingStats[${$new_number}][may]" value="1"></th>
                    <th><input style="width: 20px; height: 20px; " type="checkbox" name="trainingStats[${$new_number}][jaun]" value="1"></th>
                    <th><input style="width: 20px; height: 20px; " type="checkbox" name="trainingStats[${$new_number}][jun]" value="1"></th>
                    <th><input style="width: 20px; height: 20px; " type="checkbox" name="trainingStats[${$new_number}][augest]" value="1"></th>
                    <th><input style="width: 20px; height: 20px; " type="checkbox" name="trainingStats[${$new_number}][sep]" value="1"></th>
                    <th><input style="width: 20px; height: 20px; " type="checkbox" name="trainingStats[${$new_number}][oct]" value="1"></th>
                    <th><input style="width: 20px; height: 20px; " type="checkbox" name="trainingStats[${$new_number}][nov]" value="1"></th>
                    <th><input style="width: 20px; height: 20px; " type="checkbox" name="trainingStats[${$new_number}][des]" value="1"></th>
                                            <th><input class="form-control" style="width: 250px;" type="text" name="trainingStats[${$new_number}][total_trainees]"></th>
                                        </tr>`;
            $($appended_text).insertAfter(`#trainingStats-${num}`);
            if (!document.getElementById(`trainingStats-${num}`)) {
                $($appended_text).insertAfter(`#trainingStats-0`);
            }

            $(`#btn-${num}`).remove();
            $("#increment").append(
                `<button type="button" class="btn btn-primary add_new" id="btn-${$new_number}" onclick="appendRow(${$new_number})"><i class="fa fa-plus-circle"></i></button></td>`
            );
        }

        function removeRow(num) {
            $(`#trainingStats-${num}`).remove();

        }

    </script>
    <style>
        .table thead th {
            vertical-align: bottom;
           
        }

        table,
        th,
        td,
        tr {
            border: 1px solid silver;
            
            
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
