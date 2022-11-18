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
    <div class="card-body">
      
        <form action="{{route('interestedParties.store')}}" method="post" style='margin:auto;margin-top:85px;width:70%' enctype="multipart/form-data" id="fo1">
            {{ csrf_field() }}
            <div style="" class="w-100 text-center my-4">
                <h2 style="text-shadow: 1px 1px 1px #3ed3ea;"> استمارة الأطراف المهتمة</h2>
            </div>
            <div class='shadow-lg p-3'>
                <label class="form-label pr-5">CO LOGO</label>
                
                <input type="file" id="img" name="logo" accept="image/*">
            </div>
            <hr class="w-100">
            <div class="form-group row w-100 text-right" style="text-align:center ;">
                <table class="table">
                    <tr  style="background-color:#001635 ;color:white; text-align:center;">
                        <th>م</th>
                        <th>الأطراف المهتمة</th>
                        <th>الاحتياجات والمتطلبات</th>
                        <th> كيفية تحقيقها</th>
                        <th> كيفية مراقبتها</th>

                    </tr>
                    <tr id="interestedPartie-0">
                        <th class="text-center end-td ">
                            <button type="button" title="Remove" disabled="disabled" class="btn btn-danger btn-option">
                                <i class="fa fa-minus-circle"></i>
                            </button>
                        </th>
                        <th><input class="form-control" type="text" name="interestedPartie[0][names]"></th>
                        <th><textarea class="form-control" type="text" name="interestedPartie[0][needs]"></textarea></th>
                        <th><textarea class="form-control" type="text" name="interestedPartie[0][achieves]"></textarea></th>
                        <th><textarea class="form-control" type="text" name="interestedPartie[0][watches]"></textarea></th>
                    </tr>
                    <tr class="datatable-row datatable-row-even">
                        <td class="text-center end-td " id="increment">
                            <button type="button" class="btn btn-primary add_new" id="btn-0" onclick="appendRow(0)"><i class="fa fa-plus-circle"></i></button>
                        </td>
                    </tr>
                </table>
            </div>

            <hr size="20" >
            <table class="table">
                <thead  style="background-color:#001635 ;color:white; text-align:center;">
                    <tr>
                        @if(Auth::user()->hasRole('SuperAdmin'))
                        <th class=" w-50 text-center col-2 ">
                            <div class="" style="text-align:center ;">
                                <label for="" class="" style="font-size:large;font-weight: bolder;">إعداد (مدير الجودة) :</label>
                            </div>
                            <div class="form-group row w-10 text-center">
                                <label for="" class="col-3 col-form-label">الإسم </label>
                                <div class="col-6">
                                    <input type="text" class="form-control" placeholder="  ......" name="name_1">
                                </div>
                            </div>
                            <div class="form-group row w-10 text-center">
                                <label for="" class="col-3 col-form-label">التاريخ: -</label>
                                <div class="col-6">
                                    <input type="date" class="form-control" placeholder="  ......" name="date_1">
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
                <button style="border-radius:8px;margin: 50px; width:30% ;background-color: #2a415b; ;height: 5%;padding:10px;margin-right:100px;margin:auto" type="submit" class="btn btn-primary col-md-4">
                    <i class="fas fa-save" style="width:15% ; height: 20%;"></i>حفظ</button>
            </div>
        </form>
    </div>

    <script>
        function appendRow(num) {
            $new_number = parseInt(num) + 1;
            $appended_text = ` <tr class="datatable-row datatable-row-even" id="interestedPartie-${$new_number}">
                                         
                                            <td class="text-center end-td ">
                                                        <button type="button" title="Remove" onclick="removeRow(${$new_number})"
                                                                class="btn btn-danger btn-option">
                                                                <i class="fa fa-minus-circle"></i>
                                                        </button>
                                            </td>
                                            <th><input class="form-control" type="text" name="interestedPartie[${$new_number}][names]"></th>
                    <th><textarea class="form-control" type="text" name="interestedPartie[${$new_number}][needs]"></textarea></th>
                    <th><textarea class="form-control" type="text" name="interestedPartie[${$new_number}][achieves]"></textarea></th>
                    <th><textarea class="form-control" type="text" name="interestedPartie[${$new_number}][watches]"></textarea></th>
                                        </tr>`;
            $($appended_text).insertAfter(`#interestedPartie-${num}`);
            if (!document.getElementById(`interestedPartie-${num}`)) {
                $($appended_text).insertAfter(`#interestedPartie-0`);
            }

            $(`#btn-${num}`).remove();
            $("#increment").append(`<button type="button" class="btn btn-primary add_new" id="btn-${$new_number}" onclick="appendRow(${$new_number})"><i class="fa fa-plus-circle"></i></button></td>`);
        }

        function removeRow(num) {
            $(`#interestedPartie-${num}`).remove();

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
