@extends('layouts.master')

@section('content')

    <div class="card">
<div class="card-body">
        <h3 style="margin-top:85px;">تحليل(SWOT)
        </h3>
        <hr>
        <form action="{{ route('swot.update',$swot->id)}}" method="post" enctype="multipart/form-data" id="fo1">
            @method('PUT')
            {{ csrf_field() }}
            <div style="" class="w-100 text-center my-4">
                <h2>تحليل(SWOT) </h2>
                <hr class="w-100">
            </div>
            <div id="mainDiv" style=" margin-right:500px;">
                <h4 style=" color:blue;">CO LOGO</h4>
                <img src="{{ asset($swot->logo) }}" height=180px width=210px; />
                <hr width="50%" size="20" color="blue">
                <input type="file" id="img" name="logo" accept="image/*">
            </div>
            <div class="form-group row w-100 text-left">
                <label for="" class="col-1 col-form-label"> الاسم :</label>
                <div class="col-4">
                    <input type="text" class="form-control" name="name_1" value="{{$swot->name_1}}">
                </div>
            </div>
            <div class="form-group row w-100 text-left">
                <label for="" class="col-1 col-form-label"> التاريخ :</label>
                <div class="col-4">
                    <input type="date" class="form-control" name="date_1" value="{{$swot->date_1}}">
                </div>
            </div>
            <div class=" form-group row  w-200 text-center">
                <div class="col-6">
                    <label for="" class="col-5 col-form-label text-center">نقاط القوة :</label>
                    <textarea type="text" class="form-control" name="strength_point" placeholder=":"
                        style="border-radius: 50px; border:solid 5px rgb(235, 42, 25); height: 300px; width: 600px;">{{$swot->strength_point}}</textarea>
                    <label for="" class="col-5 col-form-label text-center">الفرص :</label>

                    <textarea type="text" name="opportunities" class="form-control" placeholder=":"
                        style="border-radius: 50px; border:solid 5px rgb(156, 158, 183); height: 300px; width: 600px;">{{$swot->opportunities}}</textarea>

                </div>
                <div class="col-6">
                    <label for="" class="col-5 col-form-label text-center"> نقاط الضعف :</label>

                    <textarea type="text" class="form-control" name="weak_point" placeholder=":"
                        style=" border-radius: 50px; border:solid 5px rgb(46, 255, 19); height: 300px; width: 600px;">{{$swot->weak_point}}</textarea>
                    <label for="" class="col-5 col-form-label text-center">التهديدات :</label>

                    <textarea type="text" name="threat" class="form-control" placeholder=":"
                        style="border-radius: 50px; border:solid 5px rgb(7, 77, 176); height: 300px; width: 600px;">{{$swot->threat}}</textarea>

                </div>
            </div>
            <hr class="w-100">
            <table class="table">
                <thead>
                    <tr>
                        <th>
                          <div class="" style="text-align:start ;">
                            <input class="form-control" type="text" name="company_name" placeholder="اسم الشركة  :"  value="{{ $swot->company_name }}">
                          </div>
                
                        </th>
                        <th>
                          <div class="" style="text-align:start ;">
                            <input class="form-control" type="text" name="date2"  value="{{ $swot->date2 }}" placeholder="تاريخ الإصدار   :" onfocus="(this.type='date')" onblur="(this.type='text')">
                          </div>
                
                        </th>
                        <th>
                            <div class="" style="text-align:start ;">
                                <input class="form-control" type="text" name="date3"  value="{{ $swot->date3 }}" placeholder="تاريخ التعديل :" onfocus="(this.type='date')" onblur="(this.type='text')">
                              </div>
                
                        </th>
                        <th>
                            <div class="" style="text-align:start ;">
                                <label> مدة الحفظ </label>
                                <input class="form-control shadow-lg" type="text" name="period_time" value="{{ $swot->period_time }}">
                            </div>

                        </th>
                        <th>
                            <div class="" style="text-align:start ;">
                                <label> رقم الصفحة </label>
                                <input class="form-control shadow-lg" type="text" name="number_page" value="{{ $swot->number_page }}">
                            </div>

                        </th>
                        <th>
                            <div class="" style="text-align:start ;">
                                <label> رقم الوثيقة </label>
                                <input class="form-control shadow-lg" type="text" name="number_doc" value="{{ $swot->number_doc }}">
                            </div>
                        </th>
                      </tr>
                </thead>
            </table>
                        <div class="form-group">
                            <button style="border-radius:20px;margin: 50px; width:10% ; height: 5%;" type="submit"
                            class="btn btn-primary btn-lg"><i class="fas fa-save" style="width:15% ; height: 20%;"></i> تعديل  </button>
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
