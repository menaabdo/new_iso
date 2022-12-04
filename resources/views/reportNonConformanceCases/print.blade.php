@extends('layouts.print')
@section('content')

<div class="card">
<div class="card-body">


            <div  class="w-100 text-center my-4">
                <h2>تقرير حالات عدم المطابقة والإجراءات التصحيحية والوقائية</h2>
                <hr class="w-100">
            </div>
            <br><br>
            <div>
              <img src="{{ asset($reportNonConformanceCases->logo) }}" style="float: left;" width="100px" height="50px" />
             
          </div>
          <br><br>
            <div class=" form-group row  text-left">
              
                  <label for="" class="col-1 col-form-label text-left">الفترة من  يوم :</label>
                  {{$reportNonConformanceCases->day_from}}
                  &nbsp;&nbsp;&nbsp;&nbsp;
                <label for="" class="col-1 col-form-label text-left" >تاريخ  :</label>
               {{$reportNonConformanceCases->date_1}}
                  &nbsp;&nbsp;&nbsp;&nbsp;

                <label for="" class="col-1 col-form-label text-left" >إلى يوم :</label>
               {{$reportNonConformanceCases->day_to}}
                  &nbsp;&nbsp;&nbsp;&nbsp;
                <label for="" class="col-1 col-form-label text-left">تاريخ  :</label>
               
                  {{$reportNonConformanceCases->date_2}}
                
             
            </div>
          
            
            <div class="form-group row w-100 text-right" style="text-align:center;">
                <hr class="w-100">
                <table class="table">
                    <tr style="background-color:rgb(249, 235, 141); text-align:center;">
                     
                        <th scope="col" rowspan="2">حالة عدم المطابقة</th>
                        <th scope="col" rowspan="2">الإدارة  المختصة</th>
                        <th scope="col" rowspan="2">تاريخ إكتشفاها</th>
                        <th scope="col" rowspan="2">الأسباب</th>
                        <th scope="col" colspan="2">الإجراء المتخذ </th>
                        <th scope="col" colspan="2">فاعلية التنفيذ</th>
                        <th scope="col" rowspan="2">ملاحظات</th>
                    </tr>
                    <tr style="background-color:rgb(249, 235, 141); text-align:center;">
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
    <table>
        <thead>
            <tr>
                <th>
                    <div class="" style="text-align:start ;">
                        {{ $reportNonConformanceCases->company_name }}
                    </div>

                </th>
                <th>
                    <div class="" style="text-align:start ;">
                        {{ $reportNonConformanceCases->date2 }}
                    </div>

                </th>
                <th>
                    <div class="" style="text-align:start ;">
                        {{ $reportNonConformanceCases->date3 }}
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