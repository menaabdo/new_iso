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
  <h3 style='text-align:center;margin-bottom:40px'>
  <img src="{{ asset($nonConformanceStats->logo) }}" style="border-radius: 6px;
    border: 2px solid #001635;
    margin: 10px;
    float: left;
    /* padding: 12px;" width="50px" height="50px" />

  <span style='font-family:Cursive;border-bottom: 1px solid silver;
    ; box-shadow: 0 1rem 3rem rgba(0, 0, 0, .175) !important;
    border-radius: 6px;
    padding: 10px;text-shadow: 1px 1px 1px #3ed3ea;padding-left: 40px;
    padding-right: 40px;
'>إحصائيات حالات عدم المطابقة
  </span>
</h3>
  <hr>
  <div>
   
</div>
<br><br>


        <div class="form-group row w-100 text-right" style="text-align:center;overflow:auto">
            <table class="table" style='border:none'>
                <tr style="background-color: #001635;
    color: white">  <th scope="col" rowspan="2"></th>
                  <th scope="col" rowspan="2">الإدارة</th>
                  <th scope="col" colspan="12">شهر / سنه</th>
                  <th scope="col" rowspan="2">مجموع حالات عدم المطابقة</th>
                </tr>
                <tr style="background-color: #001635;
    color: white"> <th>يناير</th>
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

                   
                  </td>
                  <th><input class="form-control" type="text" name=" nonConformanceStats[{{$key}}]][managment]" value="{{$data->managment}}" ></th>
                  <th><input style="width: 20px; height: 20px; " type="checkbox" name=" nonConformanceStats[{{$key}}]][jan]" value="1" {{ $nonConformanceStats->nonConformanceStats[$key]->jan=="1"? 'checked':'' }}
                    <?php if ( $nonConformanceStats->nonConformanceStats[$key]->jan == '1') {
                      echo 'checked="checked"';
                  } ?>></th>
                  <th><input style="width: 20px; height: 20px; " type="checkbox" name=" nonConformanceStats[{{$key}}]][feb]" value="1" {{$nonConformanceStats->nonConformanceStats[$key]->feb=="1"? 'checked':'' }}
                    <?php if ( $nonConformanceStats->nonConformanceStats[$key]->feb == '1') {
                      echo 'checked="checked"';
                  } ?>></th>
                  <th><input style="width: 20px; height: 20px; " type="checkbox" name=" nonConformanceStats[{{$key}}]][mar]" value="1" {{$nonConformanceStats->nonConformanceStats[$key]->mar=="1"? 'checked':'' }}
                    <?php if ( $nonConformanceStats->nonConformanceStats[$key]->mar == '1') {
                      echo 'checked="checked"';
                  } ?>></th>
                  <th><input style="width: 20px; height: 20px; " type="checkbox" name=" nonConformanceStats[{{$key}}]][epr]" value="1" {{$nonConformanceStats->nonConformanceStats[$key]->epr=="1"? 'checked':'' }}
                    <?php if ( $nonConformanceStats->nonConformanceStats[$key]->epr == '1') {
                      echo 'checked="checked"';
                  } ?>></th>
                  <th><input style="width: 20px; height: 20px; " type="checkbox" name=" nonConformanceStats[{{$key}}]][may]" value="1" {{$nonConformanceStats->nonConformanceStats[$key]->may=="1"? 'checked':'' }}
                    <?php if ( $nonConformanceStats->nonConformanceStats[$key]->may == '1') {
                      echo 'checked="checked"';
                  } ?>></th>
                  <th><input style="width: 20px; height: 20px; " type="checkbox" name=" nonConformanceStats[{{$key}}]][jaun]" value="1" {{$nonConformanceStats->nonConformanceStats[$key]->jaun=="1"? 'checked':'' }}
                    <?php if ( $nonConformanceStats->nonConformanceStats[$key]->jaun == '1') {
                      echo 'checked="checked"';
                  } ?>></th>
                  <th><input style="width: 20px; height: 20px; " type="checkbox" name=" nonConformanceStats[{{$key}}]][jun]" value="1" {{$nonConformanceStats->nonConformanceStats[$key]->jun=="1"? 'checked':'' }}
                    <?php if ( $nonConformanceStats->nonConformanceStats[$key]->jun == '1') {
                      echo 'checked="checked"';
                  } ?>></th>
                  <th><input style="width: 20px; height: 20px; " type="checkbox" name=" nonConformanceStats[{{$key}}]][augest]" value="1" {{$nonConformanceStats->nonConformanceStats[$key]->augest=="1"? 'checked':'' }}
                    <?php if ( $nonConformanceStats->nonConformanceStats[$key]->augest == '1') {
                      echo 'checked="checked"';
                  } ?>></th>
                  <th><input style="width: 20px; height: 20px; " type="checkbox" name=" nonConformanceStats[{{$key}}]][sep]" value="1" {{$nonConformanceStats->nonConformanceStats[$key]->sep=="1"? 'checked':'' }}
                    <?php if ( $nonConformanceStats->nonConformanceStats[$key]->sep == '1') {
                      echo 'checked="checked"';
                  } ?>></th>
                  <th><input style="width: 20px; height: 20px; " type="checkbox" name=" nonConformanceStats[{{$key}}]][oct]" value="1" {{$nonConformanceStats->nonConformanceStats[$key]->oct=="1"? 'checked':'' }}
                    <?php if ( $nonConformanceStats->nonConformanceStats[$key]->oct == '1') {
                      echo 'checked="checked"';
                  } ?>></th>
                  <th><input style="width: 20px; height: 20px; " type="checkbox" name=" nonConformanceStats[{{$key}}]][nov]" value="1" {{$nonConformanceStats->nonConformanceStats[$key]->nov=="1"? 'checked':'' }}
                    <?php if ( $nonConformanceStats->nonConformanceStats[$key]->nov == '1') {
                      echo 'checked="checked"';
                  } ?>></th>
                  <th><input style="width: 20px; height: 20px; " type="checkbox" name=" nonConformanceStats[{{$key}}]][des]" value="1" {{$nonConformanceStats->nonConformanceStats[$key]->des=="1"? 'checked':'' }}
                    <?php if ( $nonConformanceStats->nonConformanceStats[$key]->des == '1') {
                      echo 'checked="checked"';
                  } ?>></th>
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
                
                @endif
                <tr>
                    <th style="background-color: #001635;
    color: white; text-align:center;" scope="col" colspan="2">الاجمالى</th>
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
          <div class="col-6">
              <label for="" class="col-3 col-form-label">الإستنتاج:</label>
              {{$nonConformanceStats->conclusion}}
            </div>
        </div>
        <hr class="w-100">
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
                    <th  style=' border:none;'>
                      <div class="" style="text-align:start ;">
                        {{ $nonConformanceStats->company_name }}
                      </div>
            
                    </th>
                    <th style=' border:none;'>
                      <div class="" style="text-align:start ;">
                        {{ $nonConformanceStats->date2 }}
                      </div>
            
                    </th> 
                    <th style=' border:none;'>
                        <div class="" style="text-align:start ;">
                            {{ $nonConformanceStats->date3 }}
                          </div>
            
                    </th>
                    <th style=' border:none;'>
                      <div class="" style="text-align:start ;">
                            <label for="" class="" style=""> مدة الحفظ :
                                سنتان </label>
                      </div>
            
                    </th>
                    <th style=' border:none;'>
                      <div class="" style="text-align:start ;">
                        <label for="" class="" style="text-align: center;"> رقم الصفحة : 1 /
                          1</label>
                      </div>
                    </th>
                    <th style=' border:none;'>
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
<script>
  window.addEventListener("load", window.print());
</script>
@stop