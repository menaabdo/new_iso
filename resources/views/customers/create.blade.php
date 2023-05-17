@extends('layouts.master')

@section('content')
<style>
    .shadow-lg {
        box-shadow: 0 1rem 3rem rgba(0, 0, 0, .175) !important;
    }

    input,
    textarea {
        box-shadow: 0 1rem 3rem rgba(0, 0, 0, .175) !important;
    }

</style>
<div class="card">
    <div class="form-group row w-100 text-right" style="text-align:center;overflow:auto">


    <div class="card-body row" style='margin:auto;margin-top:80px'>

       
        <form action="{{route('customers.store')}}" method="post"  class='col-md-10' style='margin:auto' enctype="multipart/form-data" id="fo1">
            {{ csrf_field() }}
            <div style="" class="w-100 text-center my-4">
                <h2 style='text-shadow: 1px 1px 1px #3ed3ea;'> العمـــــــــــلاء</h2>
                <hr class="w-100">
            </div>
            <div class='row mt-4 mb-3'>
                <label class="form-label col-md-2 ">CO LOGO</label>
      <input type="file" id="img" name="logo" accept="image/*">
            </div>
            <div class="form-group row ">
                <label for="" class="col-2 col-form-label">العميل:</label>
                <div class="col-4">
                    <input type="text" class="form-control" name="customer_name">
                </div>
            </div>
            <div class="form-group row ">
               <div class="col-4">
               <label for="" class="col-3 col-form-label">مباشر:</label>
                
                    <input type="checkbox" name="direct" value=1>
                  
                </div>
                <div class="col-6">
                <label for="" class="col-2 col-form-label">مندوب:</label>
               
                    <input type="checkbox" name="delegate" value=1>
                </div>
            </div>
            <div class="form-group row ">
                <label for="" class="col-3 col-form-label">اسم المندوب:</label>
                <div class="col-6">
                    <input type="text" class="form-control" name="delegate_name">
                </div>
            </div>
            <hr class="w-100">
            <div class="form-group row w-100 text-right" style="text-align:center;">
                <table class="table">
                    <tr style="background-color:    #001635; color:white;text-align:center;">
                        <th scope="col" rowspan="2">م</th>
                        <th scope="col" rowspan="2">الأسم</th>
                        <th scope="col" rowspan="2">الكود</th>
                        <th scope="col" colspan="7">البيانات</th>
                    </tr>
                    <tr style="background-color:  #001635;color:white; text-align:center;">
                        <th scope="col"> المسؤل</th>
                        <th scope="col">الوظيفه</th>
                        <th scope="col"> تليفون</th>
                        <th scope="col">جوال</th>
                        <th scope="col"> العنوان</th>
                        <th scope="col">WEB</th>
                        <th scope="col"> Email</th>
                    </tr>

                    <tr id="customer-0">
                        <th class="text-center end-td ">
                            <button type="button" title="Remove" disabled="disabled" class="btn btn-danger btn-option">
                                <i class="fa fa-minus-circle"></i>
                            </button>
                        </th>
                        <th><input class="form-control" type="text" name="customer[0][name]"></th>
                        <th><input class="form-control" type="text" name="customer[0][code]"></th>
                        <th><input class="form-control" type="text" name="customer[0][responsible]"></th>
                        <th><input class="form-control" type="text" name="customer[0][emp]"></th>
                        <th><input class="form-control" type="text" name="customer[0][phone_1]"></th>
                        <th><input class="form-control" type="text" name="customer[0][phone_2]"></th>
                        <th><input class="form-control" type="text" name="customer[0][address]"></th>
                        <th><input class="form-control" type="text" name="customer[0][web]"></th>
                        <th><input class="form-control" type="text" name="customer[0][email]"></th>
                    </tr>
                    <tr class="datatable-row datatable-row-even">
                        <td class="text-center end-td " id="increment">
                            <button type="button" class="btn btn-primary add_new" id="btn-0" onclick="appendRow(0)"><i class="fa fa-plus-circle"></i></button>
                        </td>
                    </tr>
                </table>
            </div>




            <hr class="w-100">
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
            $appended_text = ` <tr class="datatable-row datatable-row-even" id="customer-${$new_number}">
                                         
                                            <td class="text-center end-td ">
                                                        <button type="button" title="Remove" onclick="removeRow(${$new_number})"
                                                                class="btn btn-danger btn-option">
                                                                <i class="fa fa-minus-circle"></i>
                                                        </button>
                                            </td>
                                            <th><input class="form-control" type="text" name="customer[${$new_number}][name]"></th>
                    <th><input class="form-control" type="text" name="customer[${$new_number}][code]"></th>
                    <th><input class="form-control" type="text" name="customer[${$new_number}][responsible]"></th>
                    <th><input class="form-control" type="text" name="customer[${$new_number}][emp]"></th>
                    <th><input class="form-control" type="text" name="customer[${$new_number}][phone_1]"></th>
                    <th><input class="form-control" type="text" name="customer[${$new_number}][phone_2]"></th>
                    <th><input class="form-control" type="text" name="customer[${$new_number}][address]"></th>
                    <th><input class="form-control" type="text" name="customer[${$new_number}][web]"></th>
                    <th><input class="form-control" type="text" name="customer[${$new_number}][email]"></th>
                                        </tr>`;
            $($appended_text).insertAfter(`#customer-${num}`);
            if (!document.getElementById(`customer-${num}`)) {
                $($appended_text).insertAfter(`#customer-0`);
            }

            $(`#btn-${num}`).remove();
            $("#increment").append(`<button type="button" class="btn btn-primary add_new" id="btn-${$new_number}" onclick="appendRow(${$new_number})"><i class="fa fa-plus-circle"></i></button></td>`);
        }

        function removeRow(num) {
            $(`#customer-${num}`).remove();

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
            border: 1px solid silver;
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
