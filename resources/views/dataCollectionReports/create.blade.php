@extends('layouts.master')

@section('content')


<div class="card">
    <div class="card-body">
        <h3 style="margin-top:85px;">تقرير جمع و تحليل البيانات</h3>
        <hr>
        <form action="{{route('dataCollectionReports.store')}}" method="post" enctype="multipart/form-data" id="fo1">
            {{ csrf_field() }}
            <div style="" class="w-100 text-center my-4">
                <h2> تقرير جمع و تحليل البيانات</h2>
                <hr class="w-100">
            </div>
            <div id="mainDiv" style=" margin-right:500px;">
                <h4 style=" color:blue;">CO LOGO</h4>
                <hr width="50%" size="20" color="blue">
                <input type="file" id="img" name="logo" accept="image/*">
            </div>
            <div class="form-group row ">
                <label for="" class="col-3 col-form-label">التاريخ:</label>
                <div class="col-6">
                    <input type="date" class="form-control" name="date_1">
                </div>
            </div>
            <div class="form-group row ">
                <label for="" class="col-3 col-form-label">القسم:</label>
                <div class="col-6">
                    <input type="text" class="form-control" name="department">
                </div>
            </div>
            <hr class="w-100">
            <div class="form-group row ">
                <label for="" class="col-2 col-form-label">البيانات المطلوبة :</label>
                <div class="col-6">
                    <textarea type="text" class="form-control" name="date_details"></textarea>
                </div>
            </div>
            <div class="form-group row ">
                <label for="" class="col-2 col-form-label">التفاصيل :</label>
                <div class="col-6">
                    <textarea type="text" class="form-control" name="details"></textarea>
                </div>
            </div>
            <div class="form-group row ">
                <label for="" class="col-2 col-form-label">النتائج :</label>
                <div class="col-6">
                    <textarea type="text" class="form-control" name="result"></textarea>
                </div>
            </div>
            @if (Auth::user()->hasRole('Admin') || Auth::user()->hasRole('SuperAdmin'))
            <hr class="w-100">
            <div class="form-group row ">
                <label for="" class="col-3 col-form-label">مدير الجودة :</label>
                <div class="col-6">
                    <input type="text" class="form-control" name="name_1">
                </div>
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
                <button style="border-radius:20px;margin: 50px; width:10% ; height: 5%;" type="submit" class="btn btn-primary btn-lg"><i class="fas fa-save" style="width:15% ; height: 20%;"></i> حفظ </button>
            </div>
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
