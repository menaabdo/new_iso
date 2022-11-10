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
    <div class="card-bodyrow" style='margin:auto;margin-top:80px'>

        <form action="{{route('directorList.store')}}" class='col-md-10' style='margin:auto' method="post" enctype="multipart/form-data" id="fo1">
            {{ csrf_field() }}
            <div style="" class="w-100 text-center my-4">
                <h2 style='text-shadow: 1px 1px 1px #3ed3ea;'>قائمة أسماء المديرين والأفراد المصرح لهم بإعداد الوثائق</h2>
                <hr class="w-100">
            </div>
            <div class='row mt-4 mb-3'>
                <label class="form-label col-md-2 ">CO LOGO</label>

                <input class="col-md-6 form-control" type="file" id="img" name="logo" accept="image/*">
            </div>
            <div class="form-group row w-100 text-right" style="text-align:center ;">
                <table class="table">
                    <tr style="background-color: #001635;color:white;text-align:center">
                        <th>م</th>
                        <th>الاسم</th>
                        <th>الوظيفة</th>
                        <th>الاداره</th>


                    </tr>
                    <tr id="directorList-0">
                        <th class="text-center end-td ">
                            <button type="button" title="Remove" disabled="disabled" class="btn btn-danger btn-option">
                                <i class="fa fa-minus-circle"></i>
                            </button>
                        </th>
                        <th><input class="form-control" type="text" name="directorList[0][name]"></th>
                        <th><input class="form-control" type="text" name="directorList[0][job]"></th>
                        <th><input class="form-control" type="text" name="directorList[0][manage]"></th>
                    </tr>
                    <tr class="datatable-row datatable-row-even">
                        <td class="text-center end-td " id="increment">
                            <button type="button" class="btn btn-primary add_new" id="btn-0" onclick="appendRow(0)"><i class="fa fa-plus-circle"></i></button>
                        </td>
                    </tr>
                </table>
            </div>
            @if(Auth::user()->hasRole('SuperAdmin'))
            <hr class="w-100">

            <div class=" form-group row text-center" style='margin:auto'>
                <h4 for=""> اعتماد المدير العام :</h4>
                <input type="text" class=" col-md-6 form-control" name="manager_name">
            </div>
            @endif
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
            <div class="form-group">
                <button style="border-radius:20px;margin: 50px; width:10% ; height: 5%;" type="submit" class="btn btn-primary btn-lg"><i class="fas fa-save" style="width:15% ; height: 20%;"></i> حفظ
                </button>
            </div>
        </form>
    </div>

    <style>
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
        function appendRow(num) {
            $new_number = parseInt(num) + 1;
            $appended_text = ` <tr class="datatable-row datatable-row-even" id="directorList-${$new_number}">
                                         
                                          <td class="text-center end-td ">
                                                    <button type="button" title="Remove" onclick="removeRow(${$new_number})"
                                                              class="btn btn-danger btn-option">
                                                              <i class="fa fa-minus-circle"></i>
                                                    </button>
                                          </td>
                                          <th><input class="form-control" type="text" name="directorList[${$new_number}][name]"></th>
                                          <th><input class="form-control" type="text" name="directorList[${$new_number}][job]"></th>
                                          <th><input class="form-control" type="text" name="directorList[${$new_number}][manage]"></th>
              
                                </tr>`;
            $($appended_text).insertAfter(`#directorList-${num}`);
            if (!document.getElementById(`directorList-${num}`)) {
                $($appended_text).insertAfter(`#directorList-0`);
            }

            $(`#btn-${num}`).remove();
            $("#increment").append(`<button type="button" class="btn btn-primary add_new" id="btn-${$new_number}" onclick="appendRow(${$new_number})"><i class="fa fa-plus-circle"></i></button></td>`);


        }

        function removeRow(num) {
            $(`#directorList-${num}`).remove();

        }

    </script>
    @stop
