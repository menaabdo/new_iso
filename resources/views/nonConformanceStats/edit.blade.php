@extends('layouts.master')

@section('content')


<style>
    .shadow-lg {
        box-shadow: 0 1rem 3rem rgba(0, 0, 0, .175) !important;
    }

    input,
    textarea {
        box-shadow: 0 1rem 3rem rgba(0, 0, 0, .175) !important;
    }

</style>
<div class="card">
  
       

    <form action="{{route('nonConformanceStats.update',$nonConformanceStats->id)}}" class='col-md-12' method="post" enctype="multipart/form-data" id="fo1">
        @method('PUT') 
              {{ csrf_field() }}
        <div style="" class="w-100 text-center my-4">
            <h2 style='text-shadow: 1px 1px 1px #3ed3ea;'> إحصائيات حالات عدم المطابقة</h2>
            <hr class="w-100">
        </div>
        <div class='row mt-4 mb-3' >
                <label class="form-label col-md-2 text-right ">CO LOGO</label>
      
             <input type="file" id="img" name="logo" accept="image/*">
             <img src="{{ asset($nonConformanceStats->logo) }}" height=180px width=210px; />
          
        </div>
        <hr class="w-100">


        <div class="form-group row  text-right" style="text-align:center;overflow-x:auto;margin:auto;width:85%">
    <table class="table">
                <tr style="background-color:    #001635; color:white;text-align:center;">
                    <th scope="col" rowspan="2">م</th>
                  <th scope="col" rowspan="2">الإدارة</th>
                  <th scope="col" colspan="12">شهر / سنه</th>
                  <th scope="col" rowspan="2">مجموع حالات عدم المطابقة</th>
                </tr>
                <tr style="background-color:    #001635; color:white;text-align:center;">
                   
                  <th>يناير</th>
                  <th>فبراير</th>
                  <th> مارس</th>
                  <th> إبريل</th>
                  <th> مايو</th>
                  <th> يونيو</th>
                  <th> يوليو</th>
                  <th>أغسطس</th>
                  <th>سبتمبر</th>
                  <th>أكتوبر</th>
                  <th>نوفمبر</th>
                  <th>ديسمبر</th>
                </tr>

                @if(count($nonConformanceStats->nonConformanceStats)>0)
                @foreach($nonConformanceStats->nonConformanceStats as $key => $data)
                <tr id="nonConformanceStats-{{$key}}">
                    <td class="text-center end-td ">
                        <button type="button" title="Remove" onclick="removeRow({{$key}},{{$data->id}})"  @if ($key==0) disabled="disabled" @endif class="btn btn-danger btn-option">
                          <i class="fa fa-minus-circle"></i>
                        </button>
                      </td>
                    <th><input class="form-control" type="text" name="nonConformanceStats[{{$key}}][managment]" value="{{$data->managment}}"></th>
                    <th><input style="width: 20px; height: 20px; " type="checkbox" name="nonConformanceStats[{{$key}}][jan]" value="1" {{ $nonConformanceStats->nonConformanceStats[$key]->jan=="1"? 'checked':'' }}></th>
                    <th><input style="width: 20px; height: 20px; " type="checkbox" name="nonConformanceStats[{{$key}}][feb]" value="1" {{$nonConformanceStats->nonConformanceStats[$key]->feb=="1"? 'checked':'' }}></th>
                    <th><input style="width: 20px; height: 20px; " type="checkbox" name="nonConformanceStats[{{$key}}][mar]" value="1" {{$nonConformanceStats->nonConformanceStats[$key]->mar=="1"? 'checked':'' }}></th>
                    <th><input style="width: 20px; height: 20px; " type="checkbox" name="nonConformanceStats[{{$key}}][epr]" value="1" {{$nonConformanceStats->nonConformanceStats[$key]->epr=="1"? 'checked':'' }}></th>
                    <th><input style="width: 20px; height: 20px; " type="checkbox" name="nonConformanceStats[{{$key}}][may]" value="1" {{$nonConformanceStats->nonConformanceStats[$key]->may=="1"? 'checked':'' }}></th>
                    <th><input style="width: 20px; height: 20px; " type="checkbox" name="nonConformanceStats[{{$key}}][jaun]" value="1" {{$nonConformanceStats->nonConformanceStats[$key]->jaun=="1"? 'checked':'' }}></th>
                    <th><input style="width: 20px; height: 20px; " type="checkbox" name="nonConformanceStats[{{$key}}][jun]" value="1" {{$nonConformanceStats->nonConformanceStats[$key]->jun=="1"? 'checked':'' }}></th>
                    <th><input style="width: 20px; height: 20px; " type="checkbox" name="nonConformanceStats[{{$key}}][augest]" value="1" {{$nonConformanceStats->nonConformanceStats[$key]->augest=="1"? 'checked':'' }}></th>
                    <th><input style="width: 20px; height: 20px; " type="checkbox" name="nonConformanceStats[{{$key}}][sep]" value="1" {{$nonConformanceStats->nonConformanceStats[$key]->sep=="1"? 'checked':'' }}></th>
                    <th><input style="width: 20px; height: 20px; " type="checkbox" name="nonConformanceStats[{{$key}}][oct]" value="1" {{$nonConformanceStats->nonConformanceStats[$key]->oct=="1"? 'checked':'' }}></th>
                    <th><input style="width: 20px; height: 20px; " type="checkbox" name="nonConformanceStats[{{$key}}][nov]" value="1" {{$nonConformanceStats->nonConformanceStats[$key]->nov=="1"? 'checked':'' }}></th>
                    <th><input style="width: 20px; height: 20px; " type="checkbox" name="nonConformanceStats[{{$key}}][des]" value="1" {{$nonConformanceStats->nonConformanceStats[$key]->des=="1"? 'checked':'' }}></th>
                    <th><input class="form-control" type="text" name="nonConformanceStats[{{$key}}][total_trainees]" value="{{$data->total_trainees}}"></th>
                </tr>
                @endforeach
                <tr class="datatable-row datatable-row-even">
                    <td class="text-center end-td " id="increment">
                        <button type="button" class="btn btn-primary add_new" id="btn-{{count($nonConformanceStats->nonConformanceStats)-1}}" onclick="appendRow({{count($nonConformanceStats->nonConformanceStats)-1}})"><i
                            class="fa fa-plus-circle"></i></button>
                      </td>
                </tr>
            @else
                <tr id="nonConformanceStats-0">
                    <th class="text-center end-td ">
                        <button type="button" title="Remove" disabled="disabled" class="btn btn-danger btn-option">
                          <i class="fa fa-minus-circle"></i>
                        </button>
                    </th>
                    <th><input class="form-control" type="text" name="nonConformanceStats[0][managment]"></th>
                    <th><input style="width: 20px; height: 20px; " type="checkbox" name="nonConformanceStats[0][jan]"
                      value="1"></th>
              <th><input style="width: 20px; height: 20px; " type="checkbox" name="nonConformanceStats[0][feb]"
                      value="1"></th>
              <th><input style="width: 20px; height: 20px; " type="checkbox" name="nonConformanceStats[0][mar]"
                      value="1"></th>
              <th><input style="width: 20px; height: 20px; " type="checkbox" name="nonConformanceStats[0][epr]"
                      value="1"></th>
              <th><input style="width: 20px; height: 20px; " type="checkbox" name="nonConformanceStats[0][may]"
                      value="1"></th>
              <th><input style="width: 20px; height: 20px; " type="checkbox" name="nonConformanceStats[0][jaun]"
                      value="1"></th>
              <th><input style="width: 20px; height: 20px; " type="checkbox" name="nonConformanceStats[0][jun]"
                      value="1"></th>
              <th><input style="width: 20px; height: 20px; " type="checkbox" name="nonConformanceStats[0][augest]"
                      value="1"></th>
              <th><input style="width: 20px; height: 20px; " type="checkbox" name="nonConformanceStats[0][sep]"
                      value="1"></th>
              <th><input style="width: 20px; height: 20px; " type="checkbox" name="nonConformanceStats[0][oct]"
                      value="1"></th>
              <th><input style="width: 20px; height: 20px; " type="checkbox" name="nonConformanceStats[0][nov]"
                      value="1"></th>
              <th><input style="width: 20px; height: 20px; " type="checkbox" name="nonConformanceStats[0][des]"
                      value="1"></th>
                    <th><input class="form-control" type="text" name="nonConformanceStats[0][total_trainees]"></th>
                </tr>
                <tr class="datatable-row datatable-row-even">
                    <td class="text-center end-td " id="increment">
                      <button type="button" class="btn btn-primary add_new" id="btn-0" onclick="appendRow(0)"><i
                          class="fa fa-plus-circle"></i></button>
                    </td>
                </tr>
                @endif
                <tr>
                    <th style="background-color:rgb(218, 249, 163); text-align:center;" scope="col" colspan="2">الاجمالى</th>
                    <th><input class="form-control" type="text" name="total_1" value="{{$nonConformanceStats->total_1}}"></th>
                    <th><input class="form-control" type="text" name="total_2" value="{{$nonConformanceStats->total_2}}"></th>
                    <th><input class="form-control" type="text" name="total_3" value="{{$nonConformanceStats->total_3}}"></th>
                    <th><input class="form-control" type="text" name="total_4" value="{{$nonConformanceStats->total_4}}"></th>
                    <th><input class="form-control" type="text" name="total_5" value="{{$nonConformanceStats->total_5}}"></th>
                    <th><input class="form-control" type="text" name="total_6" value="{{$nonConformanceStats->total_6}}"></th>
                    <th><input class="form-control" type="text" name="total_7" value="{{$nonConformanceStats->total_7}}"></th>
                    <th><input class="form-control" type="text" name="total_8" value="{{$nonConformanceStats->total_8}}"></th>
                    <th><input class="form-control" type="text" name="total_9" value="{{$nonConformanceStats->total_9}}"></th>
                    <th><input class="form-control" type="text" name="total_10" value="{{$nonConformanceStats->total_10}}"></th>
                    <th><input class="form-control" type="text" name="total_11" value="{{$nonConformanceStats->total_11}}"></th>
                    <th><input class="form-control" type="text" name="total_12" value="{{$nonConformanceStats->total_12}}"></th>
                    <th><input class="form-control" type="text" name="total_13" value="{{$nonConformanceStats->total_13}}"></th>
                </tr>
                
            </table>
        </div>

        <hr class="w-100">
        <div class="form-group row ">
            <label for="" class="col-3 col-form-label">الإستنتاج:</label>
            <div class="col-6">
                <input type="text" class="form-control" name="conclusion" value="{{$nonConformanceStats->conclusion}}">
            </div>
        </div>
        <hr class="w-100">
        <div class="form-group row  text-right" style="text-align:center;overflow-x:auto;margin:auto;width:85%">

        <table class="table">
            <thead>
                <tr>
                    <th>
                      <div class="" style="text-align:start ;">
                        <input class="form-control" type="text" name="company_name" placeholder="اسم الشركة  :"  value="{{ $nonConformanceStats->company_name }}">
                      </div>
            
                    </th>
                    <th>
                      <div class="" style="text-align:start ;">
                        <input class="form-control" type="text" name="date2"  value="{{ $nonConformanceStats->date2 }}" placeholder="تاريخ الإصدار   :" onfocus="(this.type='date')" onblur="(this.type='text')">
                      </div>
            
                    </th>
                    <th>
                        <div class="" style="text-align:start ;">
                            <input class="form-control" type="text" name="date3"  value="{{ $nonConformanceStats->date3 }}" placeholder="تاريخ التعديل :" onfocus="(this.type='date')" onblur="(this.type='text')">
                          </div>
            
                    </th>
                   <th>
                            <div class="" style="text-align:start ;">
                                <label> مدة الحفظ </label>
                                <input class="form-control shadow-lg" type="text" name="period_time" value="{{ $nonConformanceStats->period_time }}">
                            </div>

                        </th>
                        <th>
                            <div class="" style="text-align:start ;">
                                <label> رقم الصفحة </label>
                                <input class="form-control shadow-lg" type="text" name="number_page" value="{{ $nonConformanceStats->number_page }}">
                            </div>

                        </th>
                        <th>
                            <div class="" style="text-align:start ;">
                                <label> رقم الوثيقة </label>
                                <input class="form-control shadow-lg" type="text" name="number_doc" value="{{ $nonConformanceStats->number_doc }}">
                            </div>
                        </th>
                  </tr>
            </thead>
        </table>
        </div>
        <div class='row'>
            <button style="border-radius:8px;margin: 50px; width:30% ;background-color: #2a415b; ;height: 5%;padding:10px;margin-right:100px;margin:auto" type="submit"
                class="btn btn-primary col-md-4">
               تعديل</button>
                    </div>  
    </form>
</div>

<script>
    function appendRow(num) {
                      $new_number = parseInt(num) + 1;
                      $appended_text = ` <tr class="datatable-row datatable-row-even" id="nonConformanceStats-${$new_number}">
                                         
                                            <td class="text-center end-td ">
                                                        <button type="button" title="Remove" onclick="removeRow(${$new_number})"
                                                                class="btn btn-danger btn-option">
                                                                <i class="fa fa-minus-circle"></i>
                                                        </button>
                                            </td>
                                            <th><input class="form-control" type="text" name="nonConformanceStats[${$new_number}][managment]"></th>
                                            <th><input style="width: 20px; height: 20px; " type="checkbox" name="nonConformanceStats[0][jan]" value="1"></th>
                    <th><input style="width: 20px; height: 20px; " type="checkbox" name="nonConformanceStats[${$new_number}][feb]" value="1"></th>
                    <th><input style="width: 20px; height: 20px; " type="checkbox" name="nonConformanceStats[${$new_number}][mar]" value="1"></th>
                    <th><input style="width: 20px; height: 20px; " type="checkbox" name="nonConformanceStats[${$new_number}][epr]" value="1"></th>
                    <th><input style="width: 20px; height: 20px; " type="checkbox" name="nonConformanceStats[${$new_number}][may]" value="1"></th>
                    <th><input style="width: 20px; height: 20px; " type="checkbox" name="nonConformanceStats[${$new_number}][jaun]" value="1"></th>
                    <th><input style="width: 20px; height: 20px; " type="checkbox" name="nonConformanceStats[${$new_number}][jun]" value="1"></th>
                    <th><input style="width: 20px; height: 20px; " type="checkbox" name="nonConformanceStats[${$new_number}][augest]" value="1"></th>
                    <th><input style="width: 20px; height: 20px; " type="checkbox" name="nonConformanceStats[${$new_number}][sep]" value="1"></th>
                    <th><input style="width: 20px; height: 20px; " type="checkbox" name="nonConformanceStats[${$new_number}][oct]" value="1"></th>
                    <th><input style="width: 20px; height: 20px; " type="checkbox" name="nonConformanceStats[${$new_number}][nov]" value="1"></th>
                    <th><input style="width: 20px; height: 20px; " type="checkbox" name="nonConformanceStats[${$new_number}][des]" value="1"></th>
                                            <th><input class="form-control"  type="text" name="nonConformanceStats[${$new_number}][total_trainees]"></th>
                                        </tr>`;
                      $($appended_text).insertAfter(`#nonConformanceStats-${num}`);
                      if (!document.getElementById(`nonConformanceStats-${num}`)) {
                                $($appended_text).insertAfter(`#nonConformanceStats-0`);
                      }
  
                      $(`#btn-${num}`).remove();
                      $("#increment").append(`<button type="button" class="btn btn-primary add_new" id="btn-${$new_number}" onclick="appendRow(${$new_number})"><i class="fa fa-plus-circle"></i></button></td>`);
                    }
      
                    function removeRow(num, id){
          if(id != 0){
             $("#nonConformanceStats-0").append(`<input type="hidden" name="ids[${num}]" value="${id}">`);
          }
          $(`#nonConformanceStats-${num}`).remove();
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