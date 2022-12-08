@extends('layouts.print')

@section('content')
<style>
    input,textarea {
        box-shadow: 0 1rem 3rem rgba(0, 0, 0, .175) !important;
    }
    textarea{
        border: none;
    height: 80px;
    padding: 10px;
    }
    input{
        font-size: .875rem;
    line-height: 1.5;
    color: #4F5467;
    background-color: #fff;
    border: 1px solid #e9ecef;
    border-radius: 2px;
    }

</style>


    <div class="card">
        <div class="card-body" style='text-align:center;border:1px solid silver; box-shadow: 0 1rem 3rem rgba(0, 0, 0, .175) !important;
 '>
            <div style="" class="w-100 text-center my-4">
            <h3 style='text-align:center;margin-bottom:40px'>
            <img src="{{ asset($customer->logo) }}" style="border-radius: 6px;
    border: 2px solid #001635;
    margin: 10px;
    float: left;
    /* padding: 12px;" width="50px" height="50px" />
            <span style='font-family:Cursive;border-bottom: 1px solid silver;
    ; box-shadow: 0 1rem 3rem rgba(0, 0, 0, .175) !important;
    border-radius: 6px;
    padding: 10px;text-shadow: 1px 1px 1px #3ed3ea;padding-left: 40px;
    padding-right: 40px;
'>  العمـــــــــــلاء
</span>
</h3>
                
            </div>
            <div>
               
            </div>
            <br><br>
            <div class="form-group row ">
                <div class="col-6">
                    <label for="" class="col-3 col-form-label">العميل :</label>
                    <input readonly style=' box-shadow: 0 1rem 3rem rgba(0, 0, 0, .175) !important;border:none;
    text-align: center;   ' value='  {{ $customer->customer_name }}'>
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
                    <input readonly style=' box-shadow: 0 1rem 3rem rgba(0, 0, 0, .175) !important;border:none;
    text-align: center;   ' value=' {{ $customer->delegate_name }}'>
                </div>
            </div>
            <br><br>
            <hr class="w-100">
            <div class="form-group row w-100 text-right" style="    overflow-x: auto;border:none;text-align:center;">
                <table class="table">
                    <tr style="background-color:#001635;color:white;    width: 20%;">
                   <th scope="col" rowspan="2">الأسم</th>
                        <th scope="col" rowspan="2">الكود</th>
                        <th scope="col" colspan="7">البيانات</th>
                    </tr>
                    <tr style="background-color:#001635;color:white;    width: 20%;">
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
            <table class="" style="  ; border:none;padding:12px;margin-top:12px;background-color: #001635;
    color: white;text-shadow: none;width: 97%;
    margin: auto;
    margin-bottom: 12px;    font-size: 12px;padding: 1px;">
                <thead>
                    <tr>
                        <th style='border:none'>
                            <div class="" style="text-align:start ;">
                               {{ $customer->company_name }}
                            </div>

                        </th>
                        <th style='border:none'>
                            <div class="" style="text-align:start ;">
                               {{ $customer->date2 }}
                            </div>

                        </th>
                        <th style='border:none'>
                            <div class="" style="text-align:start ;">
                              {{ $customer->date3 }}
                            </div>

                        </th>
                        <th style='border:none'>
                            <div class="" style="text-align:start ;">
                                <label for="" class=""
                                    style="text-align: center;"> مدة الحفظ :
                                    سنتان </label>
                            </div>

                        </th>
                        <th style='border:none'>
                            <div class="" style="text-align:start ;">
                                <label for="" class=""
                                    style="text-align: center;"> رقم الصفحة : 1 /
                                    1</label>
                            </div>
                        </th>
                        <th style='border:none'>
                            <div class="" style="text-align:start ;">
                                <label for="" class=""
                                    style="text-align: center;"> رقم الوثيقة : QA – F
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
        <script>
  window.addEventListener("load", window.print());
</script>
    @stop
