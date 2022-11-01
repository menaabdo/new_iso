@extends('layouts.print')

@section('content')


    <div class="card">
        <div class="card-body">
            <div style="" class="w-100 text-center my-4">
                <h2> العمـــــــــــلاء</h2>
                <hr class="w-100">
            </div>
            <div>
                <img src="{{ public_path($customer->logo) }}" style="float: left;" width="100px" height="50px" />

            </div>
            <br><br>
            <div class="form-group row ">
                <div class="col-6">
                    <label for="" class="col-3 col-form-label">العميل :</label>
                    {{ $customer->customer_name }}
                </div>
            </div>
            <div class="form-group row ">

                <input type="checkbox" name="direct" value=1 {{ $customer->direct == '1' ? 'checked' : '' }}
                    <?php if ($customer->direct == '1') {
                        echo 'checked="checked"';
                    } ?>>
                <label for="" class="col-2 col-form-label">مباشر</label>

                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <input type="checkbox" name="delegate" value=1 {{ $customer->delegate == '1' ? 'checked' : '' }}
                    <?php if ($customer->delegate == '1') {
                        echo 'checked="checked"';
                    } ?>>
                <label for="" class="col-2 col-form-label">مندوب</label>

            </div>
            <br>
            <div class="form-group row ">
                <div class="col-6">
                    <label for="" class="col-3 col-form-label">اسم المندوب :</label>
                    {{ $customer->delegate_name }}
                </div>
            </div>
            <br><br>
            <hr class="w-100">
            <div class="form-group row w-100 text-right" style="text-align:center;">
                <table class="table">
                    <tr style="background-color:rgb(249, 235, 141); text-align:center;">
                        <th scope="col" rowspan="2">الأسم</th>
                        <th scope="col" rowspan="2">الكود</th>
                        <th scope="col" colspan="7">البيانات</th>
                    </tr>
                    <tr style="background-color:rgb(249, 235, 141); text-align:center;">
                        <th scope="col"> المسؤل</th>
                        <th scope="col">الوظيفه</th>
                        <th scope="col"> تليفون</th>
                        <th scope="col">جوال</th>
                        <th scope="col"> العنوان</th>
                        <th scope="col">WEB</th>
                        <th scope="col"> Email</th>
                    </tr>
                    @if (count($customer->customer) > 0)
                        @foreach ($customer->customer as $key => $data)
                            <tr id="customer-{{ $key }}">
                                <th><input class="form-control" type="text" name="customer[{{ $key }}][name]"
                                        value="{{ $data->name }}"></th>
                                <th><input class="form-control" type="text" name="customer[{{ $key }}][code]"
                                        value="{{ $data->code }}"></th>
                                <th><input class="form-control" type="text"
                                        name="customer[{{ $key }}][responsible]"
                                        value="{{ $data->responsible }}"></th>
                                <th><input class="form-control" type="text" name="customer[{{ $key }}][emp]"
                                        value="{{ $data->emp }}"></th>
                                <th><input class="form-control" type="text"
                                        name="customer[{{ $key }}][phone_1]" value="{{ $data->phone_1 }}"></th>
                                <th><input class="form-control" type="text"
                                        name="customer[{{ $key }}][phone_2]" value="{{ $data->phone_2 }}"></th>
                                <th><input class="form-control" type="text"
                                        name="customer[{{ $key }}][address]" value="{{ $data->address }}"></th>
                                <th><input class="form-control" type="text" name="customer[{{ $key }}][web]"
                                        value="{{ $data->web }}"></th>
                                <th><input class="form-control" type="text" name="customer[{{ $key }}][email]"
                                        value="{{ $data->email }}"></th>
                            </tr>
                        @endforeach
                  

                    @endif
                </table>
            </div>




            <hr class="w-100">
            <br><br>
            <table class="table">
                <thead>
                    <tr>
                        <th>
                            <div class="" style="text-align:start ;">
                               {{ $customer->company_name }}
                            </div>

                        </th>
                        <th>
                            <div class="" style="text-align:start ;">
                               {{ $customer->date2 }}
                            </div>

                        </th>
                        <th>
                            <div class="" style="text-align:start ;">
                              {{ $customer->date3 }}
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
