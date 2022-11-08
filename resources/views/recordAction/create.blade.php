@extends('layouts.master')

@section('content')

<style>
    .shadow-lg {
    box-shadow: 0 1rem 3rem rgba(0,0,0,.175)!important;}
    input{ box-shadow: 0 1rem 3rem rgba(0,0,0,.175)!important;}
</style>


<div class="card">
<div class="card-body row" style='margin:auto;margin-top:80px'>
   
    <form action="{{route('recordAction.store')}}" class='col-md-10' style='margin:auto' method="post" enctype="multipart/form-data" id="fo1">
      {{ csrf_field() }}
      <div style="" class="w-100 text-center my-4">
        <h2 style='text-shadow: 1px 1px 1px #3ed3ea;'>سجل حصر الاجراءات المستخدمة</h2>
        <hr class="w-100">
    </div>
    <div class='row'>
        <label  class="col-md-2" >إدارة</label>
        <input class="col-md-6 form-control" style="text-align: center;" type="text"  name="management">
    </div>
    <div class='row mt-4 mb-3'>
      <label class="form-label col-md-2 ">CO LOGO</label>
    
            <input class="col-md-6 form-control" type="file" id="img" name="logo" accept="image/*">
        </div>
  
    <div class="form-group row w-100 text-right" style="text-align:center;">
        <table class="table-bordered ">
            <tr class='p-4' style='font-size:14px;background-color:#001635;color:white;text-align:center;'>
                <th class='p-4'  scope="col" rowspan="2">م</th>
                <th class='p-4'  scope="col" rowspan="2">إسم الاجراء</th>
                <th class='p-4'  scope="col" rowspan="2">كود الاجراء</th>
                <th scope="col" colspan="2">أخر إصدار/ تعديل</th>
                <th scope="col" rowspan="2">مدة الحفظ</th>
                <th scope="col" rowspan="2">ملاحظات</th>

            </tr>
            <tr style="background-color:#001635;color:white; text-align:center;">
                <th scope="col">رقم</th>
                <th scope="col"> التاريخ</th>
            </tr>

            <tr id="recordAction-0">
                <th class="text-center end-td ">
                    <button type="button" title="Remove" disabled="disabled" class="btn btn-danger btn-option">
                        <i class="fa fa-minus-circle"></i>
                    </button>
                </th>
                <th><input class="form-control" type="text" name="recordAction[0][name_action]"></th>
                <th><input class="form-control" type="text" name="recordAction[0][code_action]"></th>
                <th><input  class="form-control"  type="text" name="recordAction[0][number]"></th>
                <th><input  class="form-control"  type="date" name="recordAction[0][date_action]" ></th>
                <th><input class="form-control" type="text" name="recordAction[0][period_action]"></th>
                <th><textarea class="form-control" type="text" name="recordAction[0][notes_action]"></textarea></th>
            </tr>
            <tr class="datatable-row datatable-row-even">
                <td class="text-center end-td " id="increment">
                    <button type="button" class="btn btn-primary add_new" id="btn-0" onclick="appendRow(0)"><i class="fa fa-plus-circle"></i></button>
                </td>
            </tr>
        </table>
    </div>
    <table class="table ">
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


<table class="table-bordered" >
    <thead >
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
        $appended_text = ` <tr class="datatable-row datatable-row-even" id="recordAction-${$new_number}">
                                             
                                                <td class="text-center end-td ">
                                                            <button type="button" title="Remove" onclick="removeRow(${$new_number})"
                                                                    class="btn btn-danger btn-option">
                                                                    <i class="fa fa-minus-circle"></i>
                                                            </button>
                                                </td>
                 <th><input class="form-control" type="text" name="recordAction[${$new_number}][name_action]"></th>
                <th><input class="form-control" type="text" name="recordAction[${$new_number}][code_action]"></th>
                <th><input class="form-control" type="text" name="recordAction[${$new_number}][number]" ></th>
                <th><input class="form-control" type="date" name="recordAction[${$new_number}][date_action]" ></th>
                <th><input class="form-control" type="text" name="recordAction[${$new_number}][period_action]"></th>
                <th><textarea class="form-control" type="text" name="recordAction[${$new_number}][notes_action]"></textarea></th>
  
           
                                                 </tr>`;
        $($appended_text).insertAfter(`#recordAction-${num}`);
        if (!document.getElementById(`recordAction-${num}`)) {
            $($appended_text).insertAfter(`#attendance-0`);
        }

        $(`#btn-${num}`).remove();
        $("#increment").append(`<button type="button" class="btn btn-primary add_new" id="btn-${$new_number}" onclick="appendRow(${$new_number})"><i class="fa fa-plus-circle"></i></button></td>`);


    }

    function removeRow(num) {
        $(`#recordAction-${num}`).remove();

    }

</script>

<style>
    .table thead th {
        vertical-align: middle;
        
        /* border-bottom: 2px solid black; */
    }
    
    table,
    th,
    td,
    tr {
      
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