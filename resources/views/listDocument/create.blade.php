@extends('layouts.master')
@section('content')
<style>
    .shadow-lg {
    box-shadow: 0 1rem 3rem rgba(0,0,0,.175)!important;}
    input,textarea{ box-shadow: 0 1rem 3rem rgba(0,0,0,.175)!important;}
</style>
<div class="card" style=''>
<div class="card-body row" style='margin-top:80px'>
   
    <form action="{{route('listDocument.store')}}" method="post" class='col-md-10' style='margin:auto' enctype="multipart/form-data" id="fo1">
      {{ csrf_field() }}
      <div style="" class="w-100 text-center my-4">
        <h2 style='text-shadow: 1px 1px 1px #3ed3ea;'>قائمة رئيسية للوثائق
        </h2>
        <hr class="w-100">
    </div>
    <div class='row mt-4 mb-3'>
        <label  class="form-label col-md-2">تاريخ</label>
        <input class="col-md-6 form-control" style="text-align: center;" type="date"  name="date_1">
    </div>
    <div class='row mt-4 mb-3'>
      <label class="form-label col-md-2 ">CO LOGO</label>
    
            <input class="col-md-6 form-control" type="file" id="img" name="logo" accept="image/*">
        </div>
        <div class='row my-4' style='overflow-x:auto'>
        <table class=''>

            <tr style="background-color: #001635;color:white;text-align:center">
                <th scope="col" rowspan="2">م</th>
                <th scope="col" rowspan="2">اسم الوثيقة</th>
                <th scope="col" rowspan="2">الكود</th>
                <th scope="col" colspan="2">إصدار</th>
                <th scope="col" colspan="2">تعديل</th>
                <th scope="col" rowspan="2">عدد الصفحات</th>
                <th scope="col" colspan="12"> معدل توزيع النسخ (رقم النسخة للأدارات) وعددها</th>
            </tr>
            <tr style="background-color: #001635;color:white;text-align:center">
                <th scope="col"> رقم</th>
                <th scope="col">تاريخ</th>
                <th scope="col"> رقم</th>
                <th scope="col">تاريخ</th>
                <th scope="col"> 1</th>
                <th scope="col">2</th>
                <th scope="col"> 3</th>
                <th scope="col">4</th>
                <th scope="col"> 5</th>
                <th scope="col">6</th>
                <th scope="col"> 7</th>
                <th scope="col">8</th>
                <th scope="col"> 9</th>
                <th scope="col">10</th>
                <th scope="col"> 11</th>
                <th scope="col">12</th>
            </tr>

            <tr id="listDocument-0">
                <th class="text-center end-td ">
                    <button type="button" title="Remove" disabled="disabled" class="btn btn-danger btn-option">
                        <i class="fa fa-minus-circle"></i>
                    </button>
                </th>
                <th><input style="width: 150px;"class="form-control" type="text" name="listDocument[0][document_name]"></th>
                <th><input style="width: 100px;"class="form-control" type="text" name="listDocument[0][code]"></th>
                <th><input style="width: 40px;" class="form-control" type="text"name="listDocument[0][num_create]"></th>
                <th><input class="form-control" type="date" name="listDocument[0][date_2]"></th>
                <th><input style="width: 40px;" class="form-control" type="text" name="listDocument[0][num_update]"></th>
                <th><input class="form-control" type="date"name="listDocument[0][date_3]"></th>
                <th><input style="width: 40px;" class="form-control" type="text" name="listDocument[0][page_num]"></th>
                <th><input style="width: 20px; height: 40px; " type="checkbox" name="listDocument[0][num_1]" value="1"></th>
                <th><input style="width: 20px; height: 40px; " type="checkbox" name="listDocument[0][num_2]" value="1"></th>
                <th><input style="width: 20px; height: 40px; " type="checkbox" name="listDocument[0][num_3]" value="1"></th>
                <th><input style="width: 20px; height: 40px; " type="checkbox" name="listDocument[0][num_4]" value="1"></th>
                <th><input style="width: 20px; height: 40px; " type="checkbox" name="listDocument[0][num_5]" value="1"></th>
                <th><input style="width: 20px; height: 40px; " type="checkbox" name="listDocument[0][num_6]" value="1"></th>
                <th><input style="width: 20px; height: 40px; " type="checkbox" name="listDocument[0][num_7]" value="1"></th>
                <th><input style="width: 20px; height: 40px; " type="checkbox" name="listDocument[0][num_8]" value="1"></th>
                <th><input style="width: 20px; height: 40px; " type="checkbox" name="listDocument[0][num_9]" value="1"></th>
                <th><input style="width: 20px; height: 40px; " type="checkbox" name="listDocument[0][num_10]" value="1"></th>
                <th><input style="width: 20px; height: 40px; " type="checkbox" name="listDocument[0][num_11]" value="1"></th>
                <th><input style="width: 20px; height: 40px; " type="checkbox" name="listDocument[0][num_12]" value="1"></th>

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
                    @if (Auth::user()->hasRole('Admin'))
                    <th class=" text-center col-2 ">
                        <div class="" style="text-align:center ;">
                            <label for="" class="" style="text-align:center;font-size:large;font-weight: bolder;">إعداد:</label>
                        </div>
                        <div class="form-group row w-10 text-right">
                            <label for="" class="col-3 col-form-label">الاسم:       -</label>
                            <div class="col-6">
                                <input type="text" class="form-control" placeholder="  ......" name="name_1">
                            </div>
                        </div>
                        <div class="form-group row w-10 text-right">
                            <label for="" class="col-3 col-form-label">الوظيفة:       -</label>
                            <div class="col-6">
                                <input type="text" class="form-control" placeholder="  ......" name="job_1">
                            </div>
                        </div>
                        
                    </th>
                    @endif
                    @if (Auth::user()->hasRole('SuperAdmin'))
                    <th class=" text-center col-2 ">
                        <div class="" style="text-align:center ;">
                            <label for="" class="" style="text-align:center;font-size:large;font-weight: bolder;">إعداد:</label>
                        </div>
                        <div class="form-group row w-10 text-right">
                            <label for="" class="col-3 col-form-label">الاسم:       -</label>
                            <div class="col-6">
                                <input type="text" class="form-control" placeholder="  ......" name="name_1">
                            </div>
                        </div>
                        <div class="form-group row w-10 text-right">
                            <label for="" class="col-3 col-form-label">الوظيفة:       -</label>
                            <div class="col-6">
                                <input type="text" class="form-control" placeholder="  ......" name="job_1">
                            </div>
                        </div>
                        
                    </th>
                    <th class="  text-center col-2 ">
                        <div class="" style="text-align:center ;">
                            <label for="" class="" style="text-align:center;font-size:large;font-weight: bolder;">إعتماد:</label>
                        </div>
                        <div class="form-group row w-10 text-right">
                            <label for="" class="col-3 col-form-label">الاسم:       -</label>
                            <div class="col-6">
                                <input type="text" class="form-control" placeholder="  ......" name="name_2">
                            </div>
                        </div>
                        <div class="form-group row w-10 text-right">
                            <label for="" class="col-3 col-form-label">الوظيفة:       -</label>
                            <div class="col-6">
                                <input type="text" class="form-control" placeholder="  ......" name="job_2">
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
                        <label for="" class="" style="text-align: center;"> مدة الحفظ :
                            سنتان </label>
                  </div>
        
                </th>
                <th>
                  <div class="" style="text-align:start ;">
                    <label for="" class="" style="text-align: center;"> رقم الصفحة : 1 /
                      1</label>
                  </div>
                </th>
                <th>
                  <div class="" style="text-align:start ;">
                    <label for="" class="" style="text-align: center;"> رقم الوثيقة : QA – F
                      - 13 </label>
                  </div>
                </th>
              </tr>
        </thead>
    </table>
    
    <div class='row mt-3'>
            <button style="border-radius:8px;margin: 50px; width:30% ;background-color: #2a415b; ;height: 5%;padding:10px;margin-right:100px;margin:auto" type="submit"
                class="btn btn-primary col-md-4">
                <i class="fas fa-save" style="width:15% ; height: 20%;"></i>حفظ</button>
                    </div>  
        </form>
    </div>
   
    <script>
        function appendRow(num) {
            $new_number = parseInt(num) + 1;
            $appended_text = ` <tr class="datatable-row datatable-row-even" id="listDocument-${$new_number}">
                                                 
                                                    <td class="text-center end-td ">
                                                                <button type="button" title="Remove" onclick="removeRow(${$new_number})"
                                                                        class="btn btn-danger btn-option">
                                                                        <i class="fa fa-minus-circle"></i>
                                                                </button>
                                                    </td>
                                                    <th><input style="width: 150px;"class="form-control" type="text" name="listDocument[${$new_number}][document_name]"></th>
                <th><input style="width: 100px;"class="form-control" type="text" name="listDocument[${$new_number}][code]"></th>
                <th><input style="width: 40px;" class="form-control" type="text"name="listDocument[${$new_number}][num_create]"></th>
                <th><input class="form-control" type="date" name="listDocument[${$new_number}][date_2]"></th>
                <th><input style="width: 40px;" class="form-control" type="text" name="listDocument[${$new_number}][num_update]"></th>
                <th><input class="form-control" type="date"name="listDocument[${$new_number}][date_3]"></th>
                <th><input style="width: 40px;" class="form-control" type="text" name="listDocument[${$new_number}][page_num]"></th>
                <th><input style="width: 20px; height: 40px; " type="checkbox" name="listDocument[${$new_number}][num_1]" value="1"></th>
                <th><input style="width: 20px; height: 40px; " type="checkbox" name="listDocument[${$new_number}][num_2]" value="1"></th>
                <th><input style="width: 20px; height: 40px; " type="checkbox" name="listDocument[${$new_number}][num_3]" value="1"></th>
                <th><input style="width: 20px; height: 40px; " type="checkbox" name="listDocument[${$new_number}][num_4]" value="1"></th>
                <th><input style="width: 20px; height: 40px; " type="checkbox" name="listDocument[${$new_number}][num_5]" value="1"></th>
                <th><input style="width: 20px; height: 40px; " type="checkbox" name="listDocument[${$new_number}][num_6]" value="1"></th>
                <th><input style="width: 20px; height: 40px; " type="checkbox" name="listDocument[${$new_number}][num_7]" value="1"></th>
                <th><input style="width: 20px; height: 40px; " type="checkbox" name="listDocument[${$new_number}][num_8]" value="1"></th>
                <th><input style="width: 20px; height: 40px; " type="checkbox" name="listDocument[${$new_number}][num_9]" value="1"></th>
                <th><input style="width: 20px; height: 40px; " type="checkbox" name="listDocument[${$new_number}][num_10]" value="1"></th>
                <th><input style="width: 20px; height: 40px; " type="checkbox" name="listDocument[${$new_number}][num_11]" value="1"></th>
                <th><input style="width: 20px; height: 40px; " type="checkbox" name="listDocument[${$new_number}][num_12]" value="1"></th>

               
                                                     </tr>`;
            $($appended_text).insertAfter(`#listDocument-${num}`);
            if (!document.getElementById(`listDocument-${num}`)) {
                $($appended_text).insertAfter(`#attendance-0`);
            }
    
            $(`#btn-${num}`).remove();
            $("#increment").append(`<button type="button" class="btn btn-primary add_new" id="btn-${$new_number}" onclick="appendRow(${$new_number})"><i class="fa fa-plus-circle"></i></button></td>`);
    
    
        }
    
        function removeRow(num) {
            $(`#listDocument-${num}`).remove();
    
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
            float:left;
            display: inline-table;
        }
    </style>
    @stop