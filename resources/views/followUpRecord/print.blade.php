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
        <div class="card-body"  style='text-align:center;border:1px solid silver; box-shadow: 0 1rem 3rem rgba(0, 0, 0, .175) !important;
 '>


            <div style="" class="w-100 text-center my-4">
            <h2 style='text-align:center;margin-bottom:40px'>
            <img src="{{ asset($followUpRecord->logo) }}" style="border-radius: 6px;
    border: 2px solid #001635;
    margin: 10px;
    float: left;
    /* padding: 12px;" width="50px" height="50px" />
      <span style='font-family:Cursive;border-bottom: 1px solid silver;
    ; box-shadow: 0 1rem 3rem rgba(0, 0, 0, .175) !important;
    border-radius: 6px;
    padding: 10px;text-shadow: 1px 1px 1px #3ed3ea;padding-left: 40px;
    padding-right: 40px;
'>  سجل متابعة طلبات الإجراءات التصحيحية / الوقائية 
</span>
    </h2>
                <hr class="w-100">
            </div>
            <div>
                <label>لــعام</label>
                <input readonly style=' box-shadow: 0 1rem 3rem rgba(0, 0, 0, .175) !important;border:none;
    text-align: center;   ' value=' {{ $followUpRecord->year }}'>
             
                  </div>
            <br><br>
            <div style="overflow-x:auto;">
                 <table class="table" style='border:none'>
                    <tr style="background-color:#001635;color:white; 
                           text-align:center;">
                        <th scope="col" rowspan="2">رقم الطلب</th>
                        <th scope="col" rowspan="2">تاريخ</th>
                        <th scope="col" rowspan="2">الإدارة المختصة</th>
                        <th scope="col" rowspan="2">الموضوع</th>
                        <th scope="col" colspan="6">المصدر * </th>
                        <th scope="col" rowspan="2">نتائج المتابعة</th>
                        <th scope="col" colspan="3">فاعلية الإجراء **</th>
                    </tr>
                    <tr style='background-color:#001635;color:white; '>
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
                        <td class=" w-50 text-center col-3 " style=" box-shadow: 0 1rem 3rem rgba(0, 0, 0, .175) !important;
 ">
                            <div class="form-group row w-20 text-left">
                                <label for="" class="col-3 col-form-label">** المصدر </label>
                                
                            </div>
    
                            <div class="form-group row w-20 text-left" style='margin:12px' >
                                <label for="" class="col-3 col-form-label">(1) مراجعة داخلية</label>
                                <label for="" class="col-3 col-form-label">(2) مراجعة خارجية </label>
                                <label for="" class="col-3 col-form-label">(3) مراجعة إدارة</label>
                                <label for="" class="col-3 col-form-label">(4)  شكوى العميل</label>
                                <label for="" class="col-3 col-form-label">(5)  حالة عدم مطابقة	 </label>
                                <label for="" class="col-3 col-form-label">(6) أخرى(تذكر الحالة)</label>
                            </div>
                        </td>
                                    </tr>
                        <tr>
                        <td class=" w-30 text-center col-2 " style=" box-shadow: 0 1rem 3rem rgba(0, 0, 0, .175) !important;
 ">
                            <div class="form-group row w-10 text-left" style='margin:12px'>
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
            <table style="  ; border:none;padding:12px;margin-top:12px;background-color: #001635;
    color: white;text-shadow: none;width: 97%;
    margin: auto;
    margin-bottom: 12px;    font-size: 12px;padding: 1px;">
  
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
                                    style="text-align: center;"> مدة الحفظ :
                                    سنتان </label>
                            </div>

                        </th>
                        <th>
                            <div class="" style="text-align:start ;">
                                <label for="" class=""
                                    style="text-align: center;;"> رقم الصفحة : 1 /
                                    1</label>
                            </div>
                        </th>
                        <th>
                            <div class="" style="text-align:start ;">
                                <label for="" class=""
                                    style="text-align: center;"> رقم الوثيقة :
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
