@extends('layouts.print')
@section('content')

    <div class="card">
        <div class="card-body">

            <div style="" class="w-100 text-center my-4">
                <h2>سجل متابعة طلبات الإجراءات التصحيحية / الوقائية </h2>
                <hr class="w-100">
            </div>
            <div>
                <label>لــعام</label>
                {{ $followUpRecord->year }}
             
                <img src="{{ asset($followUpRecord->logo) }}" style="float: left" width="100px" height="50px" />
            </div>
            <br><br>
            <div class="form-group row w-100 text-right" style="text-align:center;">
                <table class="table">
                    <tr style="background-color:rgb(249, 235, 141); text-align:center;">
                        <th scope="col" rowspan="2">رقم الطلب</th>
                        <th scope="col" rowspan="2">تاريخ</th>
                        <th scope="col" rowspan="2">الإدارة المختصة</th>
                        <th scope="col" rowspan="2">الموضوع</th>
                        <th scope="col" colspan="6">المصدر * </th>
                        <th scope="col" rowspan="2">نتائج المتابعة</th>
                        <th scope="col" colspan="3">فاعلية الإجراء **</th>
                    </tr>
                    <tr style="background-color:rgb(249, 235, 141); text-align:center;">
                        <th scope="col"> 1</th>
                        <th scope="col">2</th>
                        <th scope="col"> 3</th>
                        <th scope="col">4</th>
                        <th scope="col"> 5</th>
                        <th scope="col">6</th>
                        <th scope="col"> 7</th>
                        <th scope="col">8</th>
                        <th scope="col"> 9</th>
                    </tr>
                    @if (count($followUpRecord->followUpRecord) > 0)
                        @foreach ($followUpRecord->followUpRecord as $key => $data)
                            <tr id="followUpRecord-{{ $key }}">
                                <th>{{ $data->number }}</th>
                                <th>{{ $data->date_1 }}</th>
                                <th>{{ $data->management }}</th>
                                <th>{{ $data->subject }}</th>
                                <th><input style="width: 40px; height: 40px; " type="checkbox"
                                        name="followUpRecord[{{ $key }}][one]"value="1"
                                        {{ $followUpRecord->followUpRecord[$key]->one == '1' ? 'checked' : '' }}
                                        <?php if ($followUpRecord->followUpRecord[$key]->one == '1') {
                                            echo 'checked="checked"';
                                        } ?>></th>
                                <th><input style="width: 40px; height: 40px; " type="checkbox"
                                        name="followUpRecord[{{ $key }}][two]"value="1"
                                        {{ $followUpRecord->followUpRecord[$key]->two == '1' ? 'checked' : '' }}
                                        <?php if ($followUpRecord->followUpRecord[$key]->two == '1') {
                                            echo 'checked="checked"';
                                        } ?>></th>
                                <th><input style="width: 40px; height: 40px; " type="checkbox"
                                        name="followUpRecord[{{ $key }}][three]"value="1"
                                        {{ $followUpRecord->followUpRecord[$key]->three == '1' ? 'checked' : '' }}
                                        <?php if ($followUpRecord->followUpRecord[$key]->three == '1') {
                                            echo 'checked="checked"';
                                        } ?>></th>
                                <th><input style="width: 40px; height: 40px; " type="checkbox"
                                        name="followUpRecord[{{ $key }}][four]"value="1"
                                        {{ $followUpRecord->followUpRecord[$key]->four == '1' ? 'checked' : '' }}
                                        <?php if ($followUpRecord->followUpRecord[$key]->four == '1') {
                                            echo 'checked="checked"';
                                        } ?>></th>
                                <th><input style="width: 40px; height: 40px; " type="checkbox"
                                        name="followUpRecord[{{ $key }}][five]"value="1"
                                        {{ $followUpRecord->followUpRecord[$key]->five == '1' ? 'checked' : '' }}
                                        <?php if ($followUpRecord->followUpRecord[$key]->five == '1') {
                                            echo 'checked="checked"';
                                        } ?>></th>
                                <th><input style="width: 40px; height: 40px; " type="checkbox"
                                        name="followUpRecord[{{ $key }}][six]"value="1"
                                        {{ $followUpRecord->followUpRecord[$key]->six == '1' ? 'checked' : '' }}
                                        <?php if ($followUpRecord->followUpRecord[$key]->six == '1') {
                                            echo 'checked="checked"';
                                        } ?>></th>
                                <th>{{ $data->result }}</th>
                                <th><input style="width: 40px; height: 40px; " type="checkbox"
                                        name="followUpRecord[{{ $key }}][seven]" value="1"
                                        {{ $followUpRecord->followUpRecord[$key]->seven == '1' ? 'checked' : '' }}
                                        <?php if ($followUpRecord->followUpRecord[$key]->seven == '1') {
                                            echo 'checked="checked"';
                                        } ?>></th>
                                <th><input style="width: 40px; height: 40px; " type="checkbox"
                                        name="followUpRecord[{{ $key }}][eight]" value="1"
                                        {{ $followUpRecord->followUpRecord[$key]->eight == '1' ? 'checked' : '' }}
                                        <?php if ($followUpRecord->followUpRecord[$key]->eight == '1') {
                                            echo 'checked="checked"';
                                        } ?>></th>
                                <th><input style="width: 40px; height: 40px; " type="checkbox"
                                        name="followUpRecord[{{ $key }}][nine]" value="1"
                                        {{ $followUpRecord->followUpRecord[$key]->nine == '1' ? 'checked' : '' }}
                                        <?php if ($followUpRecord->followUpRecord[$key]->nine == '1') {
                                            echo 'checked="checked"';
                                        } ?>></th>
                            </tr>
                        @endforeach
                    @endif
                </table>
            </div>

            <br><br>
            <table class="table">
                <thead>
                    <tr>
                        <td class=" w-50 text-center col-3 " style="border:3px solid #150c0c !important;">
                            <div class="form-group row w-20 text-left">
                                <label for="" class="col-3 col-form-label">** المصدر </label>
                                
                            </div>
    
                            <div class="form-group row w-20 text-left">
                                <label for="" class="col-3 col-form-label">(1) مراجعة داخلية</label>
                                <label for="" class="col-3 col-form-label">(2) مراجعة خارجية </label>
                                <label for="" class="col-3 col-form-label">(3) مراجعة إدارة</label>
                                <label for="" class="col-3 col-form-label">(4)  شكوى العميل</label>
                                <label for="" class="col-3 col-form-label">(5)  حالة عدم مطابقة	 </label>
                                <label for="" class="col-3 col-form-label">(6) أخرى(تذكر الحالة)</label>
                            </div>
                        </td>
                        <td class=" w-30 text-center col-2 " style="border: 3px solid #0f0a0a !important;">
                            <div class="form-group row w-10 text-left">
                                <label for="" class="col-4 col-form-label">  ** فاعلية الإٌجراء  </label>
                            </div>
    
                            <div class="form-group row w-30 text-center">
                                <label for="" class="col-4 col-form-label">(7) إقفال الطلب  </label>
                                <label for="" class="col-4 col-form-label">(8) إجراء تصحيحي أخر	 </label>
                                <label for="" class="col-4 col-form-label">(9)أجراء وقائي أخر</label>
                            </div>
                        </td>
                    </tr>
                </thead>
            </table>
            <br><br>
            <table>
                <thead>
                    <tr>
                        <th>
                            <div class="" style="text-align:start ;">
                                {{ $followUpRecord->company_name }}
                            </div>

                        </th>
                        <th>
                            <div class="" style="text-align:start ;">
                                {{ $followUpRecord->date2 }}
                            </div>

                        </th>
                        <th>
                            <div class="" style="text-align:start ;">
                                {{ $followUpRecord->date3 }}
                            </div>

                        </th>
                        <th>
                            <div class="" style="text-align:start ;">
                                <label for="" class=""
                                    style="text-align: center;font-size:large;font-weight: bolder;"> مدة الحفظ :
                                    سنتان </label>
                            </div>

                        </th>
                        <th>
                            <div class="" style="text-align:start ;">
                                <label for="" class=""
                                    style="text-align: center;font-size:large;font-weight: bolder;"> رقم الصفحة : 1 /
                                    1</label>
                            </div>
                        </th>
                        <th>
                            <div class="" style="text-align:start ;">
                                <label for="" class=""
                                    style="text-align: center;font-size:large;font-weight: bolder;"> رقم الوثيقة :
                                    QA–F-13
                                </label>
                            </div>
                        </th>
                    </tr>
                </thead>
            </table>

        </div>

    </div>


<script>
  window.addEventListener("load", window.print());
</script>


   
@stop
