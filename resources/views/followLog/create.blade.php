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
    <div class="card-body ">
      
    <form action="{{route('followLog.store')}}" method="post" enctype="multipart/form-data" style='margin:auto' id="fo1">
        {{ csrf_field() }}

        <div class="container p-4">
            <div style="" class="w-100 text-center my-4">
                <h2>سجل متابعة قرارات مراجعة الإدارة العليا</h2>
                <hr class="w-100" color="black">
            </div>

            <div class="form-group row">
                <div id="mainDiv" style=" margin-right:1000px;">
                    <h4 style=" color:blue;">CO LOGO</h4>
                    <hr width="50%" size="20" color="blue">
                    <input type="file" id="img" name="logo" accept="image/*">
                </div>
                <h3 for="" class="col-1 col-form-label">نوع الاجتماع : </h3>
                <div class="col-1 col-form-label">
                    <input type="radio" name="planing" value="planned">
                </div>
                <h2 for="" class="col-3 col-form-label" style="text-align:right;">مخطط </h2>
                <div class="col-1 col-form-label">
                    <input type="radio" name="planing" value="not_planned">
                </div>
                <h2 for="" class="col-3 col-form-label" style="text-align:right;">غير مخطط </h2>

                <h2 for="" style="text-align:right;" class="col-4 col-form-label">رقم الأجتماع </h2>
                <div class="col-3 col-form-label">
                    <input type="text" name="meeting_num">
                </div>

                <h2 for="" style="text-align:left;" class="col-3 col-form-label">التاريخ : </h2>
                <div class="col-1 col-form-label">
                    <input type="date" name="meetting_date">
                </div>


            </div>
            <div class="form-group row w-100 text-right" style="text-align:center;">
                <table class="table">
                    <tr style="background-color:rgb(235, 252, 160); text-align:center;">
                        <th scope="col" rowspan="2">م</th>
                        <th scope="col" rowspan="2">الموضوع</th>
                        <th scope="col" rowspan="2">القرار المتخذ</th>
                        <th scope="col" rowspan="2">المسئول</th>
                        <th scope="col" rowspan="2">التاريخ المخطط</th>
                        <th scope="col" colspan="2">متابعة التنفيذ</th>
                        <th scope="col" rowspan="2">الملاحظات</th>
                    </tr>
                    <tr style="background-color:rgb(235, 252, 160); text-align:center;">
                        <th scope="col"> تم</th>
                        <th scope="col">لم يتم</th>
                    </tr>


                    <tr id="follow-0">
                        <th class="text-center end-td ">
                            <button type="button" title="Remove" disabled="disabled" class="btn btn-danger btn-option">
                                <i class="fa fa-minus-circle"></i>
                            </button>
                        </th>
                        <th><textarea class="form-control" type="text" name="follow[0][subject]"></textarea></th>
                        <th><textarea class="form-control" type="text" name="follow[0][decision]"></textarea></th>
                        <th><input class="form-control" type="text" name="follow[0][administrator]"></th>
                        <th><input class="form-control" type="date" name="follow[0][date]"></th>
                        <th><input style="width: 40px; height: 40px; " type="checkbox" name="follow[0][completed]" value="1"></th>
                        <th><input style="width: 40px; height: 40px; " type="checkbox" name="follow[0][not_completed]" value="1"></th>
                        <th><textarea class="form-control" type="text" name="follow[0][notes]"></textarea></th>
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
                        @if (Auth::user()->hasRole('Employee'))
                        <th class=" text-center col-2 ">
                            <div class="" style="text-align:center ;">
                                <label for="" class="" style="text-align:center;font-size:large;font-weight: bolder;">إعداد:</label>
                            </div>
                            <div class="form-group row w-10 text-right">
                                <label for="" class="col-3 col-form-label">الاسم: -</label>
                                <div class="col-6">
                                    <input type="text" class="form-control" placeholder="  ......" name="name_1">
                                </div>
                            </div>
                            <div class="form-group row w-10 text-right">
                                <label for="" class="col-3 col-form-label">الوظيفة: -</label>
                                <div class="col-6">
                                    <input type="text" class="form-control" placeholder="  ......" name="job_1">
                                </div>
                            </div>

                        </th>
                        @endif
                        @if (Auth::user()->hasRole('Admin'))
                        <th class=" text-center col-2 ">
                            <div class="" style="text-align:center ;">
                                <label for="" class="" style="text-align:center;font-size:large;font-weight: bolder;">إعداد:</label>
                            </div>
                            <div class="form-group row w-10 text-right">
                                <label for="" class="col-3 col-form-label">الاسم: -</label>
                                <div class="col-6">
                                    <input type="text" class="form-control" placeholder="  ......" name="name_1">
                                </div>
                            </div>
                            <div class="form-group row w-10 text-right">
                                <label for="" class="col-3 col-form-label">الوظيفة: -</label>
                                <div class="col-6">
                                    <input type="text" class="form-control" placeholder="  ......" name="job_1">
                                </div>
                            </div>

                        </th>
                        <th class="  text-center col-2 ">
                            <div class="" style="text-align:center ;">
                                <label for="" class="" style="text-align:center;font-size:large;font-weight: bolder;">مراجعة:</label>
                            </div>
                            <div class="form-group row w-10 text-right">
                                <label for="" class="col-3 col-form-label">الاسم: -</label>
                                <div class="col-6">
                                    <input type="text" class="form-control" placeholder="  ......" name="name_2">
                                </div>
                            </div>
                            <div class="form-group row w-10 text-right">
                                <label for="" class="col-3 col-form-label">الوظيفة: -</label>
                                <div class="col-6">
                                    <input type="text" class="form-control" placeholder="  ......" name="job_2">
                                </div>
                            </div>

                        </th>
                        @endif
                        @if(Auth::user()->hasRole('SuperAdmin'))
                        <th class=" text-center col-2 ">
                            <div class="" style="text-align:center ;">
                                <label for="" class="" style="text-align:center;font-size:large;font-weight: bolder;">إعداد:</label>
                            </div>
                            <div class="form-group row w-10 text-right">
                                <label for="" class="col-3 col-form-label">الاسم: -</label>
                                <div class="col-6">
                                    <input type="text" class="form-control" placeholder="  ......" name="name_1">
                                </div>
                            </div>
                            <div class="form-group row w-10 text-right">
                                <label for="" class="col-3 col-form-label">الوظيفة: -</label>
                                <div class="col-6">
                                    <input type="text" class="form-control" placeholder="  ......" name="job_1">
                                </div>
                            </div>

                        </th>
                        <th class="  text-center col-2 ">
                            <div class="" style="text-align:center ;">
                                <label for="" class="" style="text-align:center;font-size:large;font-weight: bolder;">مراجعة:</label>
                            </div>
                            <div class="form-group row w-10 text-right">
                                <label for="" class="col-3 col-form-label">الاسم: -</label>
                                <div class="col-6">
                                    <input type="text" class="form-control" placeholder="  ......" name="name_2">
                                </div>
                            </div>
                            <div class="form-group row w-10 text-right">
                                <label for="" class="col-3 col-form-label">الوظيفة: -</label>
                                <div class="col-6">
                                    <input type="text" class="form-control" placeholder="  ......" name="job_2">
                                </div>
                            </div>

                        </th>
                        <th class="  text-center col-2 ">
                            <div class="" style="text-align:center ;">
                                <label for="" class="" style="text-align:center;font-size:large;font-weight: bolder;">إعتماد:</label>
                            </div>
                            <div class="form-group row w-10 text-right">
                                <label for="" class="col-3 col-form-label">الاسم: -</label>
                                <div class="col-6">
                                    <input type="text" class="form-control" placeholder="  ......" name="name_3">
                                </div>
                            </div>
                            <div class="form-group row w-10 text-right">
                                <label for="" class="col-3 col-form-label">الوظيفة: -</label>
                                <div class="col-6">
                                    <input type="text" class="form-control" placeholder="  ......" name="job_3">
                                </div>
                            </div>

                        </th>
                        @endif

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
            <div class="form-group">
                <button style="border-radius:20px;margin: 50px; width:10% ; height: 5%;" type="submit" class="btn btn-primary btn-lg"><i class="fas fa-save" style="width:15% ; height: 20%;"></i> حفظ </button>
            </div>
        </div>


    </form>
</div>
</div>
    <script>
        function appendRow(num) {
            $new_number = parseInt(num) + 1;
            $appended_text = ` <tr class="datatable-row datatable-row-even" id="follow-${$new_number}">
                                                 
                                                    <td class="text-center end-td ">
                                                                <button type="button" title="Remove" onclick="removeRow(${$new_number})"
                                                                        class="btn btn-danger btn-option">
                                                                        <i class="fa fa-minus-circle"></i>
                                                                </button>
                                                    </td>
                                                    <th><textarea class="form-control" type="text" name="follow[${$new_number}][subject]"></textarea></th>
                                                    <th><textarea class="form-control" type="text" name="follow[${$new_number}][decision]"></textarea></th>
                                                    <th><input class="form-control" type="text" name="follow[${$new_number}][administrator]"></th>
                                                    <th><input class="form-control" type="date" name="follow[${$new_number}][date]"></th>
                                                    <th><input style="width: 40px; height: 40px; "  type="checkbox" name="follow[${$new_number}][completed]" value="1"></th>
                                                    <th><input style="width: 40px; height: 40px; "  type="checkbox" name="follow[${$new_number}][not_completed]" value="1"></th>
                                                    <th><textarea class="form-control" type="text" name="follow[${$new_number}][notes]"></textarea></th>
              
                                                     </tr>`;
            $($appended_text).insertAfter(`#follow-${num}`);
            if (!document.getElementById(`follow-${num}`)) {
                $($appended_text).insertAfter(`#attendance-0`);
            }

            $(`#btn-${num}`).remove();
            $("#increment").append(`<button type="button" class="btn btn-primary add_new" id="btn-${$new_number}" onclick="appendRow(${$new_number})"><i class="fa fa-plus-circle"></i></button></td>`);


        }

        function removeRow(num) {
            $(`#follow-${num}`).remove();

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
            border: 1px solid black;
           
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
