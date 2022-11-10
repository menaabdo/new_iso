@extends('layouts.master')

@section('content')


<div class="card">
    <div class="card-body">

        <form action="{{route('typicalForm.store')}}" method="post" class='col-md-10' style='margin:auto' enctype="multipart/form-data" id="fo1">
            {{ csrf_field() }}
            <div style="" class="w-100 text-center my-4">
                <h2 style='text-shadow: 1px 1px 1px #3ed3ea;'>نموذج إستلام وثائق/نماذج
                </h2>
                <hr class="w-100">
            </div>
            <div class='row mt-4 mb-3'>
                <label class="form-label col-md-2 ">CO LOGO</label>

                <input class="col-md-6 form-control" type="file" id="img" name="logo" accept="image/*">
            </div>
            <div class="form-group row w-100 text-left">

                <div class="row col-form-label mr-3">
                    <label class="form-label  ">إستلمت أنا :</label>
                    <input type="text" class="col-3 form-control" name="name">
                    <label>الموقع أدناه الوثائق التالية.</label>
                    <label>والتي تخص إدارة / </label>
                    <input type="text" class="col-3 form-control" name="management">
                </div>
            </div>

            <div class="form-group row w-100 text-right" style="text-align:center ;">
                <table class="table">
                    <tr style='font-size:14px;background-color:#001635;color:white;text-align:center;'>
                        <th>م</th>
                        <th>إسم الوثيقة</th>
                        <th>كود الوثيقة</th>
                        <th>عدد النسخ</th>
                        <th>التاريخ</th>
                        <th>الملاحظات</th>
                    </tr>
                    <tr id="typicalForm-0">
                        <th class="text-center end-td ">
                            <button type="button" title="Remove" disabled="disabled" class="btn btn-danger btn-option">
                                <i class="fa fa-minus-circle"></i>
                            </button>
                        </th>
                        <th><input class="form-control" type="text" name="typicalForm[0][document_name]"></th>
                        <th><input class="form-control" type="text" name="typicalForm[0][document_code]"></th>
                        <th><input class="form-control" type="text" name="typicalForm[0][number_copy]"></th>
                        <th><input class="form-control" type="date" name="typicalForm[0][date1]"></th>
                        <th><textarea class="form-control" type="text" name="typicalForm[0][notes]"></textarea></th>
                    </tr>
                    <tr class="datatable-row datatable-row-even">
                        <td class="text-center end-td " id="increment">
                            <button type="button" class="btn btn-primary add_new" id="btn-0" onclick="appendRow(0)"><i class="fa fa-plus-circle"></i></button>
                        </td>
                    </tr>
                </table>
            </div>
            <table class="table">
                <thead>
                    <tr>
                        <th class=" w-50 text-center col-1 ">
                            <div class="" style="text-align:center ;">
                                <label for="" class="" style="text-align:center;font-size:large;font-weight: bolder;">المستلم:</label>
                            </div>
                            <div class="form-group row w-10 text-right ">
                                <label for="" class="col-5  col-form-label">الاسم: -</label>
                                <div class="col-2">
                                    <input type="text" class="form-control" placeholder="  ......" name="name2">
                                </div>
                            </div>
                            <div class="form-group row w-10 text-right">
                                <label for="" class="col-5 col-form-label">الوظيفة: -</label>
                                <div class="col-2">
                                    <input type="text" class="form-control" placeholder="  ......" name="job">
                                </div>
                            </div>
                        </th>

                    </tr>
                </thead>
            </table>
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
                                <input class="form-control" type="text" name="date2" placeholder="تاريخ الإصدار   :" onfocus="(this.type='date')" onblur="(this.type='text')">
                            </div>

                        </th>
                        <th>
                            <div class="" style="text-align:start ;">
                                <input class="form-control" type="text" name="date3" placeholder="تاريخ التعديل :" onfocus="(this.type='date')" onblur="(this.type='text')">
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

            <div class='row mt-3'>
                <button style="border-radius:8px;margin: 50px; width:30% ;background-color: #2a415b; ;height: 5%;padding:10px;margin-right:100px;margin:auto" type="submit" class="btn btn-primary col-md-4">
                    <i class="fas fa-save" style="width:15% ; height: 20%;"></i>حفظ</button>
            </div>
        </form>
    </div>

    <script>
        function appendRow(num) {
            $new_number = parseInt(num) + 1;
            $appended_text = ` <tr class="datatable-row datatable-row-even" id="typicalForm-${$new_number}">
                                                 
                                                    <td class="text-center end-td ">
                                                                <button type="button" title="Remove" onclick="removeRow(${$new_number})"
                                                                        class="btn btn-danger btn-option">
                                                                        <i class="fa fa-minus-circle"></i>
                                                                </button>
                                                    </td>
                                                    <th><input class="form-control" type="text" name="typicalForm[${$new_number}][document_name]"></th>
                <th><input class="form-control" type="text" name="typicalForm[${$new_number}][document_code]"></th>
                <th><input class="form-control" type="text" name="typicalForm[${$new_number}][number_copy]"></th>
                <th><input class="form-control" type="date" name="typicalForm[${$new_number}][date1]"></th>
                <th><textarea class="form-control" type="text" name="typicalForm[${$new_number}][notes]"></textarea></th>
            
                                                     </tr>`;
            $($appended_text).insertAfter(`#typicalForm-${num}`);
            if (!document.getElementById(`typicalForm-${num}`)) {
                $($appended_text).insertAfter(`#typicalForm-0`);
            }

            $(`#btn-${num}`).remove();
            $("#increment").append(`<button type="button" class="btn btn-primary add_new" id="btn-${$new_number}" onclick="appendRow(${$new_number})"><i class="fa fa-plus-circle"></i></button></td>`);


        }

        function removeRow(num) {
            $(`#typicalForm-${num}`).remove();

        }

    </script>

    <style>
        .table thead th {
            vertical-align: bottom;
            /* border-bottom: 2px solid black; */
        }

        table,
        th,
        td,
        tr {
            border: 1px solid white;
            /* border-bottom: 2px solid black;
            border-top: 2px solid black; */
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
