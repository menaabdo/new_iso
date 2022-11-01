@extends('layouts.master')

@section('content')


<div class="card">
<div class="card-body">
    <h3 style="margin-top:85px;">سجل حصر الوثائق الملغاة</h3>
    <hr>
    <form action="{{route('recordCanceledDocument.store')}}" method="post" enctype="multipart/form-data" id="fo1">
      {{ csrf_field() }}
      <div style="" class="w-100 text-center my-4">
        <h2>سجل حصر الوثائق الملغاة</h2>
        <hr class="w-100">
    </div>
   
        <div id="mainDiv"  style=" margin-right:500px;">
            <h4 style=" color:blue;">CO LOGO</h4>
            <hr width="50%" size="20" color="blue">
            <input type="file" id="img" name="logo" accept="image/*">
        </div>
  
    <div class="form-group row w-100 text-right" style="text-align:center;">
        <table class="table">
            <tr style="background-color:rgb(235, 252, 160); text-align:center;">
                <th scope="col" rowspan="2">م</th>
                <th scope="col" rowspan="2">إسم الوثيقة</th>
                <th scope="col" rowspan="2">كود </th>
                <th scope="col" colspan="2"> الأصدار </th>
                <th scope="col" colspan="2"> التعديل  </th>
                <th scope="col" rowspan="2">سبب الالغاء</th>
                <th scope="col" rowspan="2">ملاحظات/ بيان التعديل إن وجد</th>

            </tr>
            <tr style="background-color:rgb(235, 252, 160); text-align:center;">
                <th scope="col">رقم</th>
                <th scope="col"> التاريخ</th>
                <th scope="col">رقم</th>
                <th scope="col"> التاريخ</th>
            </tr>

            <tr id="recordCanceledDocument-0">
                <th class="text-center end-td ">
                    <button type="button" title="Remove" disabled="disabled" class="btn btn-danger btn-option">
                        <i class="fa fa-minus-circle"></i>
                    </button>
                </th>
                <th><input class="form-control" type="text" name="recordCanceledDocument[0][name_action]"></th>
                <th><input class="form-control" type="text" name="recordCanceledDocument[0][code_action]"></th>
                <th><input  class="form-control"  type="text" name="recordCanceledDocument[0][number]"></th>
                <th><input  class="form-control"  type="date" name="recordCanceledDocument[0][date_action]" ></th>
                <th><input  class="form-control"  type="text" name="recordCanceledDocument[0][number2]"></th>
                <th><input  class="form-control"  type="date" name="recordCanceledDocument[0][date_action2]" ></th>
                <th><textarea class="form-control" type="text" name="recordCanceledDocument[0][reasone_cancel]"></textarea></th>
                <th><textarea class="form-control" type="text" name="recordCanceledDocument[0][notes_action]"></textarea></th>
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
        $appended_text = ` <tr class="datatable-row datatable-row-even" id="recordCanceledDocument-${$new_number}">
                                             
                                                <td class="text-center end-td ">
                                                            <button type="button" title="Remove" onclick="removeRow(${$new_number})"
                                                                    class="btn btn-danger btn-option">
                                                                    <i class="fa fa-minus-circle"></i>
                                                            </button>
                                                </td>
                 <th><input class="form-control" type="text" name="recordCanceledDocument[${$new_number}][name_action]"></th>
                <th><input class="form-control" type="text" name="recordCanceledDocument[${$new_number}][code_action]"></th>
                <th><input class="form-control" type="text" name="recordCanceledDocument[${$new_number}][number]" ></th>
                <th><input class="form-control" type="date" name="recordCanceledDocument[${$new_number}][date_action]" ></th>
                <th><input class="form-control" type="text" name="recordCanceledDocument[${$new_number}][number2]" ></th>
                <th><input class="form-control" type="date" name="recordCanceledDocument[${$new_number}][date_action2]" ></th>
                <th><textarea class="form-control" type="text" name="recordCanceledDocument[${$new_number}][reasone_cancel]"> </textarea></th>
                <th><textarea class="form-control" type="text" name="recordCanceledDocument[${$new_number}][notes_action]"></textarea></th>
  
           
                                                 </tr>`;
        $($appended_text).insertAfter(`#recordCanceledDocument-${num}`);
        if (!document.getElementById(`recordCanceledDocument-${num}`)) {
            $($appended_text).insertAfter(`#attendance-0`);
        }

        $(`#btn-${num}`).remove();
        $("#increment").append(`<button type="button" class="btn btn-primary add_new" id="btn-${$new_number}" onclick="appendRow(${$new_number})"><i class="fa fa-plus-circle"></i></button></td>`);


    }

    function removeRow(num) {
        $(`#recordCanceledDocument-${num}`).remove();

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