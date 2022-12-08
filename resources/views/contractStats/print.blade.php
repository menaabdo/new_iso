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
        <img src="{{ asset($contractStats->logo) }}" style="border-radius: 6px;
    border: 2px solid #001635;
    margin: 10px;
    float: left;
    /* padding: 12px;" width="50px" height="50px" />
        <span style='font-family:Cursive;border-bottom: 1px solid silver;
    ; box-shadow: 0 1rem 3rem rgba(0, 0, 0, .175) !important;
    border-radius: 6px;
    padding: 10px;text-shadow: 1px 1px 1px #3ed3ea;padding-left: 40px;
    padding-right: 40px;
'>   إحصائيات التعاقد
  </span>
</h3>
            <hr class="w-100">
        </div>

        <div>
         

      </div>
      <br><br>
        <div class="form-group row w-100 text-right" style="text-align:center;">
            <table class="table" style='border:none'>
                <tr style="background-color: #001635;
    color: white">
                    <th scope="col" rowspan="2">الشهر</th>
                    <th scope="col" colspan="2">التعاقد بالزيارات </th>
                    <th scope="col" colspan="2">التعاقد السنوي</th>
                    <th scope="col" rowspan="2">ملاحظات</th>
                </tr>
                <tr style="background-color: #001635;
    color: white">
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
                    <th style="background-color: #001635;
    color: white; text-align:center;" scope="col" rowspan="2">الاجمالى</th>
                    <th>{{$contractStats->total_1}}</th>
                    <th>{{$contractStats->total_2}}</th>
                    <th>{{$contractStats->total_3}}</th>
                    <th>{{$contractStats->total_4}}</th>
                    <th>{{$contractStats->total_5}}</th>
                </tr>
                
            </table>
        </div>

       
        <div class="form-group row ">
          <div class="col-6" style='margin:12px'>
              <label for="" class="col-3 col-form-label"> الإستنتاج : </label>
              <input readonly style=' box-shadow: 0 1rem 3rem rgba(0, 0, 0, .175) !important;border:none;
    text-align: center;' value= ' {{$contractStats->conclusion}}'>
            </div>
        </div>
      
        <table class="" style=' border:none;
    padding:12px;
    margin-top:12px;
    background-color: #001635;
    color: white;
    /* text-shadow: none; */
    width: 97%;
    margin: auto;
    margin-bottom: 12px;
    font-size: 12px;
    padding: 1px;'>
            <thead>
                <tr>
                    <th style='border:none'>
                      <div class="" style="text-align:start ;">
                       {{ $contractStats->company_name }}
                      </div>
            
                    </th>
                    <th style='border:none'>
                      <div class="" style="text-align:start ;">
                      {{ $contractStats->date2 }}
                      </div>
            
                    </th>
                    <th style='border:none'>
                        <div class="" style="text-align:start ;">
                            {{ $contractStats->date3 }}
                          </div>
            
                    </th>
                    <th style='border:none'>
                      <div class="" style="text-align:start ;">
                            <label for="" class="" style="text-align: center;"> مدة الحفظ :
                                سنتان </label>
                      </div>
            
                    </th>
                    <th style='border:none'>
                      <div class="" style="text-align:start ;">
                        <label for="" class="" style="text-align: center;"> رقم الصفحة : 1 /
                          1</label>
                      </div>
                    </th>
                    <th style='border:none'>
                      <div class="" style="text-align:start ;">
                        <label for="" class="" style="text-align: center;"> رقم الوثيقة : QA – F
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
    border-bottom: 2px solid silver;
}

table,
th,
td,
tr {
    border: 1px solid silver;
    border-bottom: 2px solid silver;
    border-top: 2px solid silver;
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
<script>
  window.addEventListener("load", window.print());
</script>
@stop