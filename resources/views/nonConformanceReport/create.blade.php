@extends('layouts.master')
@section('content')

<div class="card">
<div class="card-body">
    <h3 style="margin-top:85px;">سجل متابعة تقارير عدم المطابقة</h3>
    <hr>
    <form action="{{route('nonConformanceReport.store')}}" method="post" enctype="multipart/form-data" id="fo1">
        {{ csrf_field() }}
        <div style="" class="w-100 text-center my-4">
            <h2>سجل متابعة تقارير عدم المطابقة </h2>
            <label>لــعام</label>
            <input style="text-align: center;" type="text"  name="year">
            <hr class="w-100">
        </div>
        <div id="mainDiv"  style=" margin-right:500px;">
            <h4 style=" color:blue;">CO LOGO</h4>
            <hr width="50%" size="20" color="blue">
            <input type="file" id="img" name="logo" accept="image/*">
        </div>
        <div class="" style="text-align:start ;">
            <label for="" class="" style="text-align: center;font-size:large;font-weight: bolder;">   حالات عدم مطابقة لنظام الجودة ( ISO 9001 ) فى مختلف الإدارات  .  :</label>
        </div>
        <hr class="w-100">
        <div class="container-fluid p-4" >
            <div class="container-fluid p-2">
                <div class="" style="text-align:center ;">
                    <table>
                        <tr style="background-color:rgb(230, 242, 117)">
                            <th class="col-1 col-form-label">م </th>
                            <th> التاريخ</th>
                            <th>الإدارة المختصة</th>
                            <th>وصف الحالة</th>
                            <th>الإجراء المتخذ</th>
                            <th>المسئول عن التنفيذ</th>
                            <th>مخطط التنفيذ</th>
                            <th>متابعة التنفيذ</th>
                            <th>ملاحظات</th>
                        </tr>
                        <tr id="nonConformanceReport-0">
                            <th class="text-center end-td ">
                                <button type="button" title="Remove" disabled="disabled" class="btn btn-danger btn-option">
                                  <i class="fa fa-minus-circle"></i>
                                </button>
                            </th>
                            <th><input class="form-control" type="date" name="nonConformanceReport[0][date_1]"></th>
                            <th><input class="form-control" type="text" name="nonConformanceReport[0][management]"></th>
                            <th><input class="form-control" type="text" name="nonConformanceReport[0][description]"></th>
                            <th><input class="form-control" type="text" name="nonConformanceReport[0][action_taken]"></th>
                            <th><input class="form-control" type="text" name="nonConformanceReport[0][responsible_implementation]"></th>
                            <th><input class="form-control" type="text" name="nonConformanceReport[0][implementation_scheme]"></th>
                            <th><input class="form-control" type="text" name="nonConformanceReport[0][follow_implementation]"></th>
                            <th><input class="form-control" type="text" name="nonConformanceReport[0][notes]"></th>

                        </tr>
                        <tr class="datatable-row datatable-row-even">
                            <td class="text-center end-td " id="increment">
                              <button type="button" class="btn btn-primary add_new" id="btn-0" onclick="appendRow(0)"><i
                                  class="fa fa-plus-circle"></i></button>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        <hr class="w-100">
        @if (Auth::user()->hasRole('SuperAdmin'))
                        <div class="" style="text-align:center ;">
                            <h2 for="" class="" style="text-align:center;font-size:large;font-weight: bolder;">إعداد</h2>
                        </div>
                        <div class="form-group row text-left col-12" >
                            <label for="" class="col-2 col-form-label">الاسم  :       -</label>
                            <div class="col-4">
                                <input type="text" class="form-control" placeholder="  ......" name="name">
                            </div>
                            <label for="" class="col-2 col-form-label">الوظيفة:       -</label>
                            <div class="col-4">
                                <input type="text" class="form-control" placeholder="  ......" name="employee">
                            </div>
                        </div>
                        <hr class="w-100">
                    @endif
                       


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
        
                    <div class="form-group">
                        <button style="border-radius:20px;margin: 50px; width:10% ; height: 5%;" type="submit"
                        class="btn btn-primary btn-lg"><i class="fas fa-save" style="width:15% ; height: 20%;"></i> حفظ </button>
                    </div>
                </form>
    </div>

    <script>
        function appendRow(num) {
                          $new_number = parseInt(num) + 1;
                          $appended_text = ` <tr class="datatable-row datatable-row-even" id="nonConformanceReport-${$new_number}">
                                             
                                                <td class="text-center end-td ">
                                                            <button type="button" title="Remove" onclick="removeRow(${$new_number})"
                                                                    class="btn btn-danger btn-option">
                                                                    <i class="fa fa-minus-circle"></i>
                                                            </button>
                                                </td>
                                                <th><input class="form-control" type="date" name="nonConformanceReport[0][date_1]"></th>
                            <th><input class="form-control" type="text" name="nonConformanceReport[${$new_number}][management]"></th>
                            <th><input class="form-control" type="text" name="nonConformanceReport[${$new_number}][description]"></th>
                            <th><input class="form-control" type="text" name="nonConformanceReport[${$new_number}][action_taken]"></th>
                            <th><input class="form-control" type="text" name="nonConformanceReport[${$new_number}][responsible_implementation]"></th>
                            <th><input class="form-control" type="text" name="nonConformanceReport[${$new_number}][implementation_scheme]"></th>
                            <th><input class="form-control" type="text" name="nonConformanceReport[${$new_number}][follow_implementation]"></th>
                            <th><input class="form-control" type="text" name="nonConformanceReport[${$new_number}][notes]"></th>
              
                                            </tr>`;
                          $($appended_text).insertAfter(`#nonConformanceReport-${num}`);
                          if (!document.getElementById(`nonConformanceReport-${num}`)) {
                                    $($appended_text).insertAfter(`#nonConformanceReport-0`);
                          }
      
                          $(`#btn-${num}`).remove();
                          $("#increment").append(`<button type="button" class="btn btn-primary add_new" id="btn-${$new_number}" onclick="appendRow(${$new_number})"><i class="fa fa-plus-circle"></i></button></td>`);
      
      
                }
      
                function removeRow(num) {
                          $(`#nonConformanceReport-${num}`).remove();
      
                }
      </script>
    
    <style>
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
                float:left;
                display: inline-table;
            }
        </style>
        @stop