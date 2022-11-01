@extends('layouts.master')
@section('title', __('listInternalAuditor'))

@section('content')



<div class="card" style='margin-right:85px'>
<div class="card-body">
    <h3 style="margin-top:85px; text-shadow: 1px 1px 1px #3ed3ea;">قائمة المراجعين الداخليين المعتمدين لنظام الجودة</h3>
    <hr>
<form action="{{route('listInternalAuditor.store')}}" method="post" enctype="multipart/form-data" id="fo1">
    {{ csrf_field() }}
    <div class="container-fluid p-4" >
       
        <div class="container-fluid p-2">
            <div class="" style="text-align:center ;">
                <table class="table table-bordered ">
                    <tr style="background-color: #001635;color:white">
                        <th class="col-1 col-form-label">م</th>
                        <th>الإسم</th>
                        <th>الإدارة التابع لها</th>
                        <th>تاريخ التأهيل</th>
                        <th>مكان التأهيل</th>
                    </tr>
                    <tr id="list-0">
                        <td class="text-center end-td ">
                            <button type="button" title="Remove" disabled="disabled" class="btn btn-danger btn-option">
                              <i class="fa fa-minus-circle"></i>
                            </button>
                          </td>
                        <td><input class="form-control shadow-lg" type="text" name="list[0][name]"></td>
                        <td><input class="form-control shadow-lg" type="text" name="list[0][manage]"></td>
                        <td><input class="form-control shadow-lg" type="date" name="list[0][date]"></td>
                        <td><input class="form-control shadow-lg" type="text" name="list[0][place]"></td>
                    </tr>
                    <tr class="datatable-row datatable-row-even">
                        <td class="text-center end-td " id="increment">
                          <button type="button" class="btn btn-primary add_new" id="btn-0" onclick="appendRow(0)"><i
                              class="fa fa-plus-circle"></i></button>
                        </td>
                    </tr>
                </table>
            </div>

            <table class=" w-100 mt-5 card" >
                <thead>
                    <tr>
                        @if (Auth::user()->hasRole('Admin'))
                        <th class=" w-90 text-center col-3 ">
                           
                            <div class="" style="text-align:center ;">
                                <label for="" class="" >إعداد</label>
                            </div>
                           
                            <div class="" style="text-align:center ;">
                                <label for="" class="" >مدير الجودة </label>
                            </div>
                          
                            <div class="form-group row w-10 text-right">
                                <label for="" class="col-md-3 col-form-label">التاريخ :       -</label>
                                <div class="col-6">
                                    <input type="date" class="form-control shadow-lg" placeholder="  ......" name="date_1">
                                </div>
                            </div>

                            <div class="form-group row w-10 text-right">
                                <label for="" class="col-md-3 col-form-label">التوقيع:       -</label>
                                <div class="col-6">
                                    <input type="text" class="form-control shadow-lg" placeholder="  ......" name="name">
                                </div>
                            </div>
                           
                        </th>
                        @endif
                        @if (Auth::user()->hasRole('SuperAdmin'))
                        <th class=" w-90 text-center col-3 ">
                           
                        <div class="" style="text-align:center ;">
                                <label for="" class="" style="text-align:center;font-size:large;font-weight: bolder;">إعداد</label>
                            </div>
                            <div class="mb-3" style="text-align:center ;">
                                <label for="" class="" style="text-align:center;font-size:large;font-weight: bolder;">مدير الجودة</label>
                            </div>
                           
                           
                          
                            <div class="form-group row w-10 ">
                                <label for="" class="col-md-3 col-form-label " style='text-align:right'>التاريخ :       -</label>
                                <div class="col-md-6">
                                    <input type="date" class="form-control shadow-lg" placeholder="  ......" name="date_1">
                                </div>
                            </div>

                            <div class="form-group row w-10 ">
                                <label for="" class="col-md-3 col-form-label " style='text-align:right'>التوقيع:       -</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control shadow-lg" placeholder="  ......" name="name">
                                </div>
                            </div>
                           
                        </th>
                        <th class=" w-100 text-center col-md-3 ">
                            <div class="" style="text-align:center ;">
                                <label for="" class="" style="text-align:center;font-size:large;font-weight: bolder;">إعتماد</label>
                            </div>
                            <div class="" style="text-align:center ;">
                                <label for="" class="mb-3" style="text-align:center;font-size:large;font-weight: bolder;">المدير العام</label>
                            </div>
                            <div class="form-group row w-10 ">
                                <label for="" class="col-md-3 col-form-label" style='text-align:right'>التاريخ :       -</label>
                                <div class="col-md-6">
                                    <input type="date" class="form-control shadow-lg" placeholder="  ......" name="date_2">
                                </div>
                            </div>


                            <div class="form-group row w-10 text-right">
                                <label for="" class="col-md-3 col-form-label">التوقيع:       -</label>
                                <div class="col-6">
                                    <input type="text" class="form-control shadow-lg" placeholder="  ......" name="manager_name">
                                </div>
                            </div>
                        </th>
@endif

                    </tr>
                </thead>
            </table>
        </div>
        <table class="table table-bordered" style="background-color: white">
            <thead>
              <tr>
                <th>
                  <div class="" style="text-align:center ;">
                  <label>اسم الشركة</label>
                    <input class="form-control shadow-lg" type="text" name="company_name" >
                  </div>
        
                </th>
                <th>
                  <div class="" style="text-align:center ;">
                  <label style='text-align:center'>تاريخ الاصدار</label>
                    <input class="form-control shadow-lg" type="text" name="date2"  onfocus="(this.type='date')" onblur="(this.type='text')">
                  </div>
        
                </th>
                <th>
                    <div class="" style="text-align:center ;">
                    <label>تاريخ التعديل</label>
                        <input class="form-control shadow-lg" type="text" name="date3"  onfocus="(this.type='date')" onblur="(this.type='text')">
                      </div>
        
                </th>
                <th>
                  <div class="" style="text-align:start ;">
                        <label for="" class="" style="text-align: center;font-size:large;font-weight: bolder;"> مدة الحفظ :
                            سنتان </label>
                  </div>
        
                </th>
                <th>
                  <div class="" style="text-align:start ;">
                    <label for="" class="" style="text-align: center;font-size:large;font-weight: bolder;"> رقم الصفحة : 1 /
                      1</label>
                  </div>
                </th>
                <th>
                  <div class="" style="text-align:start ;">
                    <label for="" class="" style="text-align: center;font-size:large;font-weight: bolder;"> رقم الوثيقة : QA – F
                      - 13 </label>
                  </div>
                </th>
              </tr>
            </thead>
          </table>
          <div class="row" style='text-align:center'>
                <div class='col-md-12 my-3'>
                <button style="border-radius:7px" type="submit"
                    class="btn btn-primary mx-5"><i class="fas fa-save" style=""></i> حفظ
                </button>
            </div>
            </div>
        </form>
    </div>
    <style>
        .table thead th {
            vertical-align: bottom;
            /* border-bottom: 2px solid ; */
            padding: 10px;
        }
        
        table,
        td,
        th {
            /* border: 2px solid ;
            border-bottom: 2px solid ; */
            text-align: center;
        }
        
        .table thead th {
            vertical-align: bottom;
            /* border-bottom: 2px solid ; */
        }
        .shadow-lg {
    box-shadow: 0 1rem 3rem rgba(0,0,0,.175)!important;}
    
    </style>

<script>
    function appendRow(num) {
                      $new_number = parseInt(num) + 1;
                      $appended_text = ` <tr class="datatable-row datatable-row-even" id="list-${$new_number}">
                                         
                                          <td class="text-center end-td ">
                                                    <button type="button" title="Remove" onclick="removeRow(${$new_number})"
                                                              class="btn btn-danger btn-option">
                                                              <i class="fa fa-minus-circle"></i>
                                                    </button>
                                          </td>
                        <td><input class="form-control" type="text" name="list[${$new_number}][name]"></td>
                        <td><input class="form-control" type="text" name="list[${$new_number}][manage]"></td>
                        <td><input class="form-control" type="date" name="list[${$new_number}][date]"></td>
                        <td><input class="form-control" type="text" name="list[${$new_number}][place]"></td>
                  
                                         
                                         
                                         
                                </tr>`;
                      $($appended_text).insertAfter(`#list-${num}`);
                      if (!document.getElementById(`list-${num}`)) {
                                $($appended_text).insertAfter(`#list-0`);
                      }
  
                      $(`#btn-${num}`).remove();
                      $("#increment").append(`<button type="button" class="btn btn-primary add_new" id="btn-${$new_number}" onclick="appendRow(${$new_number})"><i class="fa fa-plus-circle"></i></button></td>`);
  
  
            }
  
            function removeRow(num) {
                      $(`#list-${num}`).remove();
  
            }
  
  </script>

    @stop