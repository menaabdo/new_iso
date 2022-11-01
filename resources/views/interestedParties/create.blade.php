@extends('layouts.master')

@section('content')


<div class="card">
<div class="card-body">
    <h3 style="margin-top:85px;">استمارة الأطراف المهتمة</h3>
    <hr>
    <form action="{{route('interestedParties.store')}}" method="post" enctype="multipart/form-data" id="fo1">
        {{ csrf_field() }}
        <div style="" class="w-100 text-center my-4">
            <h2> استمارة الأطراف المهتمة</h2>
        </div>
        <div id="mainDiv"  style=" margin-right:500px;">
            <h4 style=" color:blue;">CO LOGO</h4>
            <hr width="50%" size="20" color="blue">
            <input type="file" id="img" name="logo" accept="image/*">
        </div>
        <hr class="w-100">
        <div class="form-group row w-100 text-right" style="text-align:center ;">
            <table class="table">
                <tr style="background-color:rgb(227, 252, 160)">
                    <th>م</th>
                    <th>الأطراف المهتمة</th>
                    <th>الاحتياجات والمتطلبات</th>
                    <th> كيفية تحقيقها</th>
                    <th> كيفية مراقبتها</th>

                </tr>
                <tr id="interestedPartie-0">
                    <th class="text-center end-td ">
                        <button type="button" title="Remove" disabled="disabled" class="btn btn-danger btn-option">
                          <i class="fa fa-minus-circle"></i>
                        </button>
                    </th>
                    <th><input class="form-control" type="text" name="interestedPartie[0][names]"></th>
                    <th><textarea class="form-control" type="text" name="interestedPartie[0][needs]"></textarea></th>
                    <th><textarea class="form-control" type="text" name="interestedPartie[0][achieves]"></textarea></th>
                    <th><textarea class="form-control" type="text" name="interestedPartie[0][watches]"></textarea></th>
                </tr>
                <tr class="datatable-row datatable-row-even">
                    <td class="text-center end-td " id="increment">
                      <button type="button" class="btn btn-primary add_new" id="btn-0" onclick="appendRow(0)"><i
                          class="fa fa-plus-circle"></i></button>
                    </td>
                </tr>
            </table>
        </div>

        <hr size="20" color="red">
        <table class="table">
            <thead>
                <tr>
                    @if(Auth::user()->hasRole('SuperAdmin'))
                    <th class=" w-50 text-center col-2 ">
                        <div class="" style="text-align:center ;">
                            <label for="" class="" style="font-size:large;font-weight: bolder;">إعداد (مدير الجودة)  :</label>
                        </div>
                        <div class="form-group row w-10 text-center">
                            <label for="" class="col-1 col-form-label">الإسم   </label>
                            <div class="col-10">
                                <input type="text" class="form-control" placeholder="  ......" name="name_1">
                            </div>
                        </div>
                        <div class="form-group row w-10 text-right">
                            <label for="" class="col-1 col-form-label">التاريخ:       -</label>
                            <div class="col-10">
                                <input type="date" class="form-control" placeholder="  ......" name="date_1">
                            </div>
                        </div>
                    </th>
                    @endif
                </tr>
            </thead>
        </table>
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
                      $appended_text = ` <tr class="datatable-row datatable-row-even" id="interestedPartie-${$new_number}">
                                         
                                            <td class="text-center end-td ">
                                                        <button type="button" title="Remove" onclick="removeRow(${$new_number})"
                                                                class="btn btn-danger btn-option">
                                                                <i class="fa fa-minus-circle"></i>
                                                        </button>
                                            </td>
                                            <th><input class="form-control" type="text" name="interestedPartie[${$new_number}][names]"></th>
                    <th><textarea class="form-control" type="text" name="interestedPartie[${$new_number}][needs]"></textarea></th>
                    <th><textarea class="form-control" type="text" name="interestedPartie[${$new_number}][achieves]"></textarea></th>
                    <th><textarea class="form-control" type="text" name="interestedPartie[${$new_number}][watches]"></textarea></th>
                                        </tr>`;
                      $($appended_text).insertAfter(`#interestedPartie-${num}`);
                      if (!document.getElementById(`interestedPartie-${num}`)) {
                                $($appended_text).insertAfter(`#interestedPartie-0`);
                      }
  
                      $(`#btn-${num}`).remove();
                      $("#increment").append(`<button type="button" class="btn btn-primary add_new" id="btn-${$new_number}" onclick="appendRow(${$new_number})"><i class="fa fa-plus-circle"></i></button></td>`);
                    }
      
      function removeRow(num) {
                $(`#interestedPartie-${num}`).remove();

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