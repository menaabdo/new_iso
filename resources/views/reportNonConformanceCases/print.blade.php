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


            <div  class="w-100 text-center my-4">
            <h2 style='text-align:center;margin-bottom:40px'>
            <img src="{{ asset($reportNonConformanceCases->logo) }}" style="border-radius: 6px;
    border: 2px solid #001635;
    margin: 10px;
    float: left;
    /* padding: 12px;" width="50px" height="50px" />
            <span style='font-family:Cursive;border-bottom: 1px solid silver;
    ; box-shadow: 0 1rem 3rem rgba(0, 0, 0, .175) !important;
    border-radius: 6px;
    padding: 10px;text-shadow: 1px 1px 1px #3ed3ea;padding-left: 40px;
    padding-right: 40px;
'> 
          تقرير حالات عدم المطابقة والإجراءات التصحيحية والوقائية
</span>
        </h2>
                <hr class="w-100">
            </div>
            <br><br>
            <div>
             
          </div>
          <br><br>
            <div class=" form-group row  text-left">
              
                  <label for="" class="col-1 col-form-label text-left">الفترة من  يوم :</label>
                  <input readonly style=' box-shadow: 0 1rem 3rem rgba(0, 0, 0, .175) !important;border:none;
    text-align: center;   ' value='{{$reportNonConformanceCases->day_from}}'>
               
                <label for="" class="col-1 col-form-label text-left" >تاريخ  :</label>
                <input readonly style=' box-shadow: 0 1rem 3rem rgba(0, 0, 0, .175) !important;border:none;
    text-align: center;   ' value='{{$reportNonConformanceCases->date_1}}'>
                

                <label for="" class="col-1 col-form-label text-left" >إلى يوم :</label>
                <input readonly style=' box-shadow: 0 1rem 3rem rgba(0, 0, 0, .175) !important;border:none;
    text-align: center;   ' value='{{$reportNonConformanceCases->day_to}}'>
                
                <label for="" class="col-1 col-form-label text-left">تاريخ  :</label>
               
                  {{$reportNonConformanceCases->date_2}}
                
             
            </div>
          
            
            <div class="form-group row w-100 text-right" style="text-align:center;">
                <hr class="w-100">
                <table class="table" style='border:none'>
                    <tr style="background-color:#001635;color:white;  text-align:center;">
                     
                        <th scope="col" rowspan="2">حالة عدم المطابقة</th>
                        <th scope="col" rowspan="2">الإدارة  المختصة</th>
                        <th scope="col" rowspan="2">تاريخ إكتشفاها</th>
                        <th scope="col" rowspan="2">الأسباب</th>
                        <th scope="col" colspan="2">الإجراء المتخذ </th>
                        <th scope="col" colspan="2">فاعلية التنفيذ</th>
                        <th scope="col" rowspan="2">ملاحظات</th>
                    </tr>
                    <tr style="background-color:#001635;color:white;  text-align:center;">
                        <th scope="col"> تصحيحى </th>
                        <th scope="col">وقائي</th>
                        <th scope="col"> تم </th>
                        <th scope="col">لم يتم</th>
                        
                    </tr>

                    @if(count($reportNonConformanceCases->reportNonConformanceCases)>0)
                    @foreach($reportNonConformanceCases->reportNonConformanceCases as $key => $data)
                    <tr id="reportNonConformanceCases-{{$key}}">
                      
                        <th>{{$data->case_non_conformance}}</th>
                        <th>{{$data->management}}</th>
                        <th>{{$data->date_3}}</th>
                        <th>{{$data->reason}}</th>
                        <th><input style="width: 40px; height: 40px; "  type="checkbox"  name="reportNonConformanceCases[{{$key}}][corrective]" value="1" {{ $reportNonConformanceCases->reportNonConformanceCases[$key]->corrective=="1"? 'checked':'' }}
                          <?php if ($reportNonConformanceCases->reportNonConformanceCases[$key]->corrective == '1') {
                            echo 'checked="checked"';
                        } ?>></th>
                        <th><input style="width: 40px; height: 40px; "  type="checkbox"  name="reportNonConformanceCases[{{$key}}][preventive]" value="1" {{ $reportNonConformanceCases->reportNonConformanceCases[$key]->preventive=="1"? 'checked':'' }}
                          <?php if ($reportNonConformanceCases->reportNonConformanceCases[$key]->preventive == '1') {
                            echo 'checked="checked"';
                        } ?>></th>
                        <th><input style="width: 40px; height: 40px; "  type="checkbox"  name="reportNonConformanceCases[{{$key}}][completed]" value="1" {{ $reportNonConformanceCases->reportNonConformanceCases[$key]->completed=="1"? 'checked':'' }}
                          <?php if ($reportNonConformanceCases->reportNonConformanceCases[$key]->completed == '1') {
                            echo 'checked="checked"';
                        } ?>></th>
                        <th><input style="width: 40px; height: 40px; "  type="checkbox"  name="reportNonConformanceCases[{{$key}}][non_completed]" value="1" {{ $reportNonConformanceCases->reportNonConformanceCases[$key]->non_completed=="1"? 'checked':'' }}
                          <?php if ($reportNonConformanceCases->reportNonConformanceCases[$key]->non_completed == '1') {
                            echo 'checked="checked"';
                        } ?>></th>
                        <th>{{$data->notes}}</th>
                        
                    </tr>
                    @endforeach
                  
                    @endif
                </table>
            </div>
          
        
        <hr class="w-100">
       
    
    </div>
    <br><br>
    <table style="  ; border:none;padding:12px;margin-top:12px;background-color: #001635;
    color: white;text-shadow: none;width: 97%;
    margin: auto;
    margin-bottom: 12px;    font-size: 12px;padding: 1px;">
  
        <thead>
            <tr>
                <th style='border:none'>
                    <div class="" style="text-align:start ;">
                        {{ $reportNonConformanceCases->company_name }}
                    </div>

                </th>
                <th style='border:none'>
                    <div class="" style="text-align:start ;">
                        {{ $reportNonConformanceCases->date2 }}
                    </div>

                </th>
                <th style='border:none'>
                    <div class="" style="text-align:start ;">
                        {{ $reportNonConformanceCases->date3 }}
                    </div>

                </th>
                <th style='border:none'>
                    <div class="" style="text-align:start ;">
                        <label for="" class=""
                            style="text-align: center;"> مدة الحفظ :
                            سنتان </label>
                    </div>

                </th>
                <th style='border:none'>
                    <div class="" style="text-align:start ;">
                        <label for="" class=""
                            style="text-align: center;"> رقم الصفحة : 1 /
                            1</label>
                    </div>
                </th>
                <th style='border:none'>
                    <div class="" style="text-align:start ;">
                        <label for="" class=""
                            style="text-align: center;;"> رقم الوثيقة :
                            QA–F-13
                        </label>
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