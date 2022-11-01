@extends('layouts.master')

@section('content')


<div class="card">
<div class="card-body">
  <h3 style="margin-top:85px;">إحصائيات التعاقد</h3>
  <hr>
    <form action="{{route('contractStats.update',$contractStats->id)}}" method="post" enctype="multipart/form-data" id="fo1">
        @method('PUT') 
              {{ csrf_field() }}
        <div style="" class="w-100 text-center my-4">
            <h2> إحصائيات التعاقد</h2>
            <hr class="w-100">
        </div>
        <div id="mainDiv"  style=" margin-right:500px;">
            <h4 style=" color:blue;">CO LOGO</h4>
            <hr width="50%" size="20" color="blue">
            <img src="{{ asset($contractStats->logo) }}" height=180px width=210px; />
            <input type="file" id="img" name="logo" accept="image/*">
        </div>
        <hr class="w-100">


        <div class="form-group row w-100 text-right" style="text-align:center;">
            <table class="table">
                <tr style="background-color:rgb(218, 249, 163); text-align:center;">
                    <th scope="col" rowspan="2">م</th>
                    <th scope="col" rowspan="2">الشهر</th>
                    <th scope="col" colspan="2">التعاقد بالزيارات </th>
                    <th scope="col" colspan="2">التعاقد السنوي</th>
                    <th scope="col" rowspan="2">ملاحظات</th>
                </tr>
                <tr style="background-color:rgb(218, 249, 163); text-align:center;">
                    <th scope="col"> منفذ</th>
                    <th scope="col">غير منفذ</th>
                    <th scope="col"> منفذ</th>
                    <th scope="col">غير منفذ</th>
                </tr>

                @if(count($contractStats->contractStats)>0)
                @foreach($contractStats->contractStats as $key => $data)
                <tr id="contractStats-{{$key}}">
                    <td class="text-center end-td ">
                        <button type="button" title="Remove" onclick="removeRow({{$key}},{{$data->id}})"  @if ($key==0) disabled="disabled" @endif class="btn btn-danger btn-option">
                          <i class="fa fa-minus-circle"></i>
                        </button>
                      </td>
                    <th><input class="form-control" type="text" name="contractStats[{{$key}}][mounth]" value="{{$data->mounth}}"></th>
                    <th><input style="width: 40px; height: 40px;" type="checkbox" name="contractStats[{{$key}}][permeable1]" value="1" {{ $contractStats->contractStats[$key]->permeable1=="1"? 'checked':'' }}></th>
                    <th><input style="width: 40px; height: 40px;" type="checkbox" name="contractStats[{{$key}}][impermeable1]" value="1" {{ $contractStats->contractStats[$key]->impermeable1=="1"? 'checked':'' }}></th>
                    <th><input style="width: 40px; height: 40px;" type="checkbox" name="contractStats[{{$key}}][permeable2]" value="1" {{ $contractStats->contractStats[$key]->permeable2=="1"? 'checked':'' }}></th>
                    <th><input style="width: 40px; height: 40px;" type="checkbox" name="contractStats[{{$key}}][impermeable2]" value="1" {{ $contractStats->contractStats[$key]->impermeable2=="1"? 'checked':'' }}></th>
                    <th><textarea class="form-control" type="text" name="contractStats[{{$key}}][nodes]">{{$data->nodes}}</textarea></th>
                </tr>
                @endforeach
                <tr class="datatable-row datatable-row-even">
                    <td class="text-center end-td " id="increment">
                        <button type="button" class="btn btn-primary add_new" id="btn-{{count($contractStats->contractStats)-1}}" onclick="appendRow({{count($contractStats->contractStats)-1}})"><i
                            class="fa fa-plus-circle"></i></button>
                      </td>
                </tr>
            @else
                <tr id="contractStats-0">
                    <th class="text-center end-td ">
                        <button type="button" title="Remove" disabled="disabled" class="btn btn-danger btn-option">
                          <i class="fa fa-minus-circle"></i>
                        </button>
                    </th>
                    <th><input class="form-control" type="text" name="contractStats[0][mounth]"></th>
                    <th><input style="width: 40px; height: 40px;" type="checkbox" name="contractStats[0][permeable1]" value="1"></th>
                    <th><input style="width: 40px; height: 40px;" type="checkbox" name="contractStats[0][impermeable1]" value="1"></th>
                    <th><input style="width: 40px; height: 40px;" type="checkbox" name="contractStats[0][permeable2]" value="1"></th>
                    <th><input style="width: 40px; height: 40px;" type="checkbox" name="contractStats[0][impermeable2]" value="1"></th>
                    <th><textarea class="form-control" type="text" name="contractStats[0][nodes]"></textarea></th>
                </tr>
                <tr class="datatable-row datatable-row-even">
                    <td class="text-center end-td " id="increment">
                      <button type="button" class="btn btn-primary add_new" id="btn-0" onclick="appendRow(0)"><i
                          class="fa fa-plus-circle"></i></button>
                    </td>
                </tr>
                @endif
                <tr>
                    <th style="background-color:rgb(218, 249, 163); text-align:center;" scope="col" rowspan="2">الاجمالى</th>
                    <th><input class="form-control" type="text" name="total_1" value="{{$contractStats->total_1}}"></th>
                    <th><input class="form-control" type="text" name="total_2" value="{{$contractStats->total_2}}"></th>
                    <th><input class="form-control" type="text" name="total_3" value="{{$contractStats->total_3}}"></th>
                    <th><input class="form-control" type="text" name="total_4" value="{{$contractStats->total_4}}"></th>
                    <th><input class="form-control" type="text" name="total_5" value="{{$contractStats->total_5}}"></th>
                    <th><input class="form-control" type="text" name="total_6" value="{{$contractStats->total_6}}"></th>
                </tr>
                
            </table>
        </div>

        <hr class="w-100">
        <div class="form-group row ">
            <label for="" class="col-3 col-form-label">الإستنتاج:</label>
            <div class="col-6">
                <input type="text" class="form-control" name="conclusion" value="{{$contractStats->conclusion}}">
            </div>
        </div>
        <hr class="w-100">
        <table class="table">
            <thead>
                <tr>
                    <th>
                      <div class="" style="text-align:start ;">
                        <input class="form-control" type="text" name="company_name" placeholder="اسم الشركة  :"  value="{{ $contractStats->company_name }}">
                      </div>
            
                    </th>
                    <th>
                      <div class="" style="text-align:start ;">
                        <input class="form-control" type="text" name="date2"  value="{{ $contractStats->date2 }}" placeholder="تاريخ الإصدار   :" onfocus="(this.type='date')" onblur="(this.type='text')">
                      </div>
            
                    </th>
                    <th>
                        <div class="" style="text-align:start ;">
                            <input class="form-control" type="text" name="date3"  value="{{ $contractStats->date3 }}" placeholder="تاريخ التعديل :" onfocus="(this.type='date')" onblur="(this.type='text')">
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
            class="btn btn-primary btn-lg"><i class="fas fa-save" style="width:15% ; height: 20%;"></i> تعديل  </button>
        </div>
    </form>
</div>

<script>
    function appendRow(num) {
                      $new_number = parseInt(num) + 1;
                      $appended_text = ` <tr class="datatable-row datatable-row-even" id="contractStats-${$new_number}">
                                         
                                            <td class="text-center end-td ">
                                                        <button type="button" title="Remove" onclick="removeRow(${$new_number})"
                                                                class="btn btn-danger btn-option">
                                                                <i class="fa fa-minus-circle"></i>
                                                        </button>
                                            </td>
                                            <th><input class="form-control" type="text" name="contractStats[${$new_number}][mounth]"></th>
                                            <th><input style="width: 40px; height: 40px;" type="checkbox" name="contractStats[${$new_number}][permeable1]" value="1"></th>
                                            <th><input style="width: 40px; height: 40px;" type="checkbox" name="contractStats[${$new_number}][impermeable1]" value="1"></th>
                                            <th><input style="width: 40px; height: 40px;" type="checkbox" name="contractStats[${$new_number}][permeable2]" value="1"></th>
                                            <th><input style="width: 40px; height: 40px;" type="checkbox" name="contractStats[${$new_number}][impermeable2]" value="1"></th>
                                            <th><textarea class="form-control" type="text" name="contractStats[${$new_number}][nodes]"></textarea></th>
                                        </tr>`;
                      $($appended_text).insertAfter(`#contractStats-${num}`);
                      if (!document.getElementById(`contractStats-${num}`)) {
                                $($appended_text).insertAfter(`#contractStats-0`);
                      }
  
                      $(`#btn-${num}`).remove();
                      $("#increment").append(`<button type="button" class="btn btn-primary add_new" id="btn-${$new_number}" onclick="appendRow(${$new_number})"><i class="fa fa-plus-circle"></i></button></td>`);
                    }
      
                    function removeRow(num, id){
          if(id != 0){
             $("#contractStats-0").append(`<input type="hidden" name="ids[${num}]" value="${id}">`);
          }
          $(`#contractStats-${num}`).remove();
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