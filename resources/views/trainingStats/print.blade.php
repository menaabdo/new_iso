@extends('layouts.print')

@section('content')

<div class="card">
<div class="card-body">
        <div style="" class="w-100 text-center my-4">
            <h2> إحصائيات التدريب</h2>
            <hr class="w-100">
        </div>
        <div>
          <img src="{{ public_path($trainingStats->logo) }}" style="float: left;" width="100px"
              height="50px" />

      </div>
      <br><br>


        <div class="form-group row w-100 text-right" style="text-align:center;">
            <table class="table">
                <tr style="background-color:rgb(218, 249, 163); text-align:center;">
                  <th scope="col" rowspan="2"></th>
                  <th scope="col" rowspan="2">الإدارة</th>
                  <th scope="col" colspan="12">شهر / سنه</th>
                  <th scope="col" rowspan="2">مجموع المتدربين</th>
                </tr>
                <tr style="background-color:rgb(218, 249, 163); text-align:center;">
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

                @if(count($trainingStats->trainingStats)>0)
                @foreach($trainingStats->trainingStats as $key => $data)
                <tr id="trainingStats-{{$key}}">
                  <td class="text-center end-td ">
                    
                  </td>
                    <th><input class="form-control" type="text" name="trainingStats[{{$key}}][managment]" value="{{$data->managment}}" ></th>
                    <th><input style="width: 20px; height: 20px; " type="checkbox" name="trainingStats[{{$key}}][jan]" value="1" {{ $trainingStats->trainingStats[$key]->jan=="1"? 'checked':'' }}
                      <?php if ( $trainingStats->trainingStats[$key]->jan == '1') {
                        echo 'checked="checked"';
                    } ?>></th>
                    <th><input style="width: 20px; height: 20px; " type="checkbox" name="trainingStats[{{$key}}][feb]" value="1" {{$trainingStats->trainingStats[$key]->feb=="1"? 'checked':'' }}
                      <?php if ( $trainingStats->trainingStats[$key]->feb == '1') {
                        echo 'checked="checked"';
                    } ?>></th>
                    <th><input style="width: 20px; height: 20px; " type="checkbox" name="trainingStats[{{$key}}][mar]" value="1" {{$trainingStats->trainingStats[$key]->mar=="1"? 'checked':'' }}
                      <?php if ( $trainingStats->trainingStats[$key]->mar == '1') {
                        echo 'checked="checked"';
                    } ?>></th>
                    <th><input style="width: 20px; height: 20px; " type="checkbox" name="trainingStats[{{$key}}][epr]" value="1" {{$trainingStats->trainingStats[$key]->epr=="1"? 'checked':'' }}
                      <?php if ( $trainingStats->trainingStats[$key]->epr == '1') {
                        echo 'checked="checked"';
                    } ?>></th>
                    <th><input style="width: 20px; height: 20px; " type="checkbox" name="trainingStats[{{$key}}][may]" value="1" {{$trainingStats->trainingStats[$key]->may=="1"? 'checked':'' }}
                      <?php if ( $trainingStats->trainingStats[$key]->may == '1') {
                        echo 'checked="checked"';
                    } ?>></th>
                    <th><input style="width: 20px; height: 20px; " type="checkbox" name="trainingStats[{{$key}}][jaun]" value="1" {{$trainingStats->trainingStats[$key]->jaun=="1"? 'checked':'' }}
                      <?php if ( $trainingStats->trainingStats[$key]->jaun == '1') {
                        echo 'checked="checked"';
                    } ?>></th>
                    <th><input style="width: 20px; height: 20px; " type="checkbox" name="trainingStats[{{$key}}][jun]" value="1" {{$trainingStats->trainingStats[$key]->jun=="1"? 'checked':'' }}
                      <?php if ( $trainingStats->trainingStats[$key]->jun == '1') {
                        echo 'checked="checked"';
                    } ?>></th>
                    <th><input style="width: 20px; height: 20px; " type="checkbox" name="trainingStats[{{$key}}][augest]" value="1" {{$trainingStats->trainingStats[$key]->augest=="1"? 'checked':'' }}
                      <?php if ( $trainingStats->trainingStats[$key]->augest == '1') {
                        echo 'checked="checked"';
                    } ?>></th>
                    <th><input style="width: 20px; height: 20px; " type="checkbox" name="trainingStats[{{$key}}][sep]" value="1" {{$trainingStats->trainingStats[$key]->sep=="1"? 'checked':'' }}
                      <?php if ( $trainingStats->trainingStats[$key]->sep == '1') {
                        echo 'checked="checked"';
                    } ?>></th>
                    <th><input style="width: 20px; height: 20px; " type="checkbox" name="trainingStats[{{$key}}][oct]" value="1" {{$trainingStats->trainingStats[$key]->oct=="1"? 'checked':'' }}
                      <?php if ( $trainingStats->trainingStats[$key]->oct == '1') {
                        echo 'checked="checked"';
                    } ?>></th>
                    <th><input style="width: 20px; height: 20px; " type="checkbox" name="trainingStats[{{$key}}][nov]" value="1" {{$trainingStats->trainingStats[$key]->nov=="1"? 'checked':'' }}
                      <?php if ( $trainingStats->trainingStats[$key]->nov == '1') {
                        echo 'checked="checked"';
                    } ?>></th>
                    <th><input style="width: 20px; height: 20px; " type="checkbox" name="trainingStats[{{$key}}][des]" value="1" {{$trainingStats->trainingStats[$key]->des=="1"? 'checked':'' }}
                      <?php if ( $trainingStats->trainingStats[$key]->des == '1') {
                        echo 'checked="checked"';
                    } ?>></th>
                    <th><input class="form-control" type="text" name="trainingStats[{{$key}}][total_trainees]" value="{{$data->total_trainees}}"></th>
                </tr>
                @endforeach

            @else
                <tr id="trainingStats-0">
                    <th class="text-center end-td ">
                        <button type="button" title="Remove" disabled="disabled" class="btn btn-danger btn-option">
                          <i class="fa fa-minus-circle"></i>
                        </button>
                    </th>
                    <th><input class="form-control" type="text" name="trainingStats[0][managment]"></th>
                    <th><input style="width: 20px; height: 20px; " type="checkbox" name="trainingStats[0][jan]"
                      value="1"></th>
              <th><input style="width: 20px; height: 20px; " type="checkbox" name="trainingStats[0][feb]"
                      value="1"></th>
              <th><input style="width: 20px; height: 20px; " type="checkbox" name="trainingStats[0][mar]"
                      value="1"></th>
              <th><input style="width: 20px; height: 20px; " type="checkbox" name="trainingStats[0][epr]"
                      value="1"></th>
              <th><input style="width: 20px; height: 20px; " type="checkbox" name="trainingStats[0][may]"
                      value="1"></th>
              <th><input style="width: 20px; height: 20px; " type="checkbox" name="trainingStats[0][jaun]"
                      value="1"></th>
              <th><input style="width: 20px; height: 20px; " type="checkbox" name="trainingStats[0][jun]"
                      value="1"></th>
              <th><input style="width: 20px; height: 20px; " type="checkbox" name="trainingStats[0][augest]"
                      value="1"></th>
              <th><input style="width: 20px; height: 20px; " type="checkbox" name="trainingStats[0][sep]"
                      value="1"></th>
              <th><input style="width: 20px; height: 20px; " type="checkbox" name="trainingStats[0][oct]"
                      value="1"></th>
              <th><input style="width: 20px; height: 20px; " type="checkbox" name="trainingStats[0][nov]"
                      value="1"></th>
              <th><input style="width: 20px; height: 20px; " type="checkbox" name="trainingStats[0][des]"
                      value="1"></th>
                    <th><input class="form-control" type="text" name="trainingStats[0][total_trainees]"></th>
                </tr>

                @endif
                <tr>
                    <th style="background-color:rgb(218, 249, 163); text-align:center;" scope="col" colspan="2">الاجمالى</th>
                    <th><input class="form-control" type="text" name="total_1" value="{{$trainingStats->total_1}}"></th>
                    <th><input class="form-control" type="text" name="total_2" value="{{$trainingStats->total_2}}"></th>
                    <th><input class="form-control" type="text" name="total_3" value="{{$trainingStats->total_3}}"></th>
                    <th><input class="form-control" type="text" name="total_4" value="{{$trainingStats->total_4}}"></th>
                    <th><input class="form-control" type="text" name="total_5" value="{{$trainingStats->total_5}}"></th>
                    <th><input class="form-control" type="text" name="total_6" value="{{$trainingStats->total_6}}"></th>
                    <th><input class="form-control" type="text" name="total_7" value="{{$trainingStats->total_7}}"></th>
                    <th><input class="form-control" type="text" name="total_8" value="{{$trainingStats->total_8}}"></th>
                    <th><input class="form-control" type="text" name="total_9" value="{{$trainingStats->total_9}}"></th>
                    <th><input class="form-control" type="text" name="total_10" value="{{$trainingStats->total_10}}"></th>
                    <th><input class="form-control" type="text" name="total_11" value="{{$trainingStats->total_11}}"></th>
                    <th><input class="form-control" type="text" name="total_12" value="{{$trainingStats->total_12}}"></th>
                    <th><input class="form-control" type="text" name="total_13" value="{{$trainingStats->total_13}}"></th>
                </tr>
                
            </table>
        </div>

        <hr class="w-100">
        <div class="form-group row ">
          <div class="col-6">
              <label for="" class="col-3 col-form-label">الإستنتاج :</label>
            {{$trainingStats->conclusion}}
            </div>
        </div>
        <hr class="w-100">
        <table class="table">
            <thead>
                <tr>
                    <th>
                      <div class="" style="text-align:start ;">
                       {{ $trainingStats->company_name }}
                      </div>
            
                    </th>
                    <th>
                      <div class="" style="text-align:start ;">
                       {{ $trainingStats->date2 }}
                      </div>
            
                    </th>
                    <th>
                        <div class="" style="text-align:start ;">
                           {{ $trainingStats->date3 }}
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