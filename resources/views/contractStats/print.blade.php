@extends('layouts.print')

@section('content')


<div class="card">
<div class="card-body">


        <div style="" class="w-100 text-center my-4">
            <h2> إحصائيات التعاقد</h2>
            <hr class="w-100">
        </div>

        <div>
          <img src="{{ public_path($contractStats->logo) }}" style="float: left;" width="100px"
              height="50px" />

      </div>
      <br><br>
        <div class="form-group row w-100 text-right" style="text-align:center;">
            <table class="table">
                <tr style="background-color:rgb(218, 249, 163); text-align:center;">
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
                    <th><input class="form-control" type="text" name="contractStats[{{$key}}][mounth]" value="{{$data->mounth}}"></th>
                    <th><input style="width: 40px; height: 40px;" type="checkbox" name="contractStats[{{$key}}][permeable1]" value="1" {{ $contractStats->contractStats[$key]->permeable1=="1"? 'checked':'' }}
                      <?php if ( $contractStats->contractStats[$key]->permeable1 == '1') {
                        echo 'checked="checked"';
                    } ?>
                    ></th>
                    <th><input style="width: 40px; height: 40px;" type="checkbox" name="contractStats[{{$key}}][impermeable1]" value="1" {{ $contractStats->contractStats[$key]->impermeable1=="1"? 'checked':'' }}
                      <?php if ( $contractStats->contractStats[$key]->impermeable1 == '1') {
                        echo 'checked="checked"';
                    } ?>
                    ></th>
                    <th><input style="width: 40px; height: 40px;" type="checkbox" name="contractStats[{{$key}}][permeable2]" value="1" {{ $contractStats->contractStats[$key]->permeable2=="1"? 'checked':'' }}
                      <?php if ( $contractStats->contractStats[$key]->permeable2 == '1') {
                        echo 'checked="checked"';
                    } ?>></th>
                    <th><input style="width: 40px; height: 40px;" type="checkbox" name="contractStats[{{$key}}][impermeable2]" value="1" {{ $contractStats->contractStats[$key]->impermeable2=="1"? 'checked':'' }}
                      <?php if ( $contractStats->contractStats[$key]->impermeable2 == '1') {
                        echo 'checked="checked"';
                    } ?>></th>
                    <th><textarea class="form-control" type="text" name="contractStats[{{$key}}][nodes]">{{$data->nodes}}</textarea></th>
                </tr>
                @endforeach
           

                @endif
                <tr>
                    <th style="background-color:rgb(218, 249, 163); text-align:center;" scope="col" rowspan="2">الاجمالى</th>
                    <th>{{$contractStats->total_1}}</th>
                    <th>{{$contractStats->total_2}}</th>
                    <th>{{$contractStats->total_3}}</th>
                    <th>{{$contractStats->total_4}}</th>
                    <th>{{$contractStats->total_5}}</th>
                </tr>
                
            </table>
        </div>

        <hr class="w-100">
        <div class="form-group row ">
          <div class="col-6">
              <label for="" class="col-3 col-form-label"> الإستنتاج : </label>
                {{$contractStats->conclusion}}
            </div>
        </div>
        <hr class="w-100">
        <table class="table">
            <thead>
                <tr>
                    <th>
                      <div class="" style="text-align:start ;">
                       {{ $contractStats->company_name }}
                      </div>
            
                    </th>
                    <th>
                      <div class="" style="text-align:start ;">
                      {{ $contractStats->date2 }}
                      </div>
            
                    </th>
                    <th>
                        <div class="" style="text-align:start ;">
                            {{ $contractStats->date3 }}
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
    float:left;
    display: inline-table;
}
</style>
@stop