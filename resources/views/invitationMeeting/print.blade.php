@extends('layouts.print')
@section('content')
<div class="card">
    <div class="container p-4">
    <img src="{{ asset($invitationMeeting->logo) }}" style="float: left;" width="100px" height="50px" />
    
        <div style="" class="w-100 text-center my-4" style='text-align:center'>
            <h2 style='box-shadow: 0 1rem 3rem rgba(0,0,0,.175)!important;padding:10px'>دعوة لإجتماع مراجعة الإدارة</h2>
            <hr class="w-100">
        </div>
            <div class="form-group row w-10" style='text-align:right;margin:4px'>
            <h4 for="" class="col-4" style='text-shadow: 1px 1px 1px #3ed3ea'>نبلغ سيادتكم بإجتماع مراجعة الإدراة لنظام الجودة  </h4>
            </div>
         

        <div class=" form-group row w-200" style='text-align:right;font-size:15px;margin:4px' >
          <div style='box-shadow: 0 1rem 3rem rgba(0,0,0,.175)!important;padding:30px'>
            <label for="" class=" col-form-label " style='box-shadow: 0 1rem 3rem rgba(0,0,0,.175)!important;'> تاريخ الاجتماع </label>
             <label>   {{ $invitationMeeting->date_1 }}</label>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
               </div>
               <div style='box-shadow: 0 1rem 3rem rgba(0,0,0,.175)!important;padding:30px'>
               <label >  {{ $invitationMeeting->day }}</label>
              
               <label for="" class=" col-form-label " style='box-shadow: 0 1rem 3rem rgba(0,0,0,.175)!important;'> يوم  الاجتماع </label>
          
                
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
               </div>
               <div style='box-shadow: 0 1rem 3rem rgba(0,0,0,.175)!important;padding:30px'>
               <label >  {{ $invitationMeeting->place_meeting }}</label>
           
               <label for="" class=" col-form-label " style='box-shadow: 0 1rem 3rem rgba(0,0,0,.175)!important;'> مكان الاجتماع </label>
               &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             
            </div>
            </div>
        </div>
        <hr width="1300px;" size="20" color="black">
        <div class="form-group row w-100 text-center" style='text-align:center'>
            <h2 for="" class="col-2 col-form-label" style='padding:10px'>أسماء الحضور </h2>
        </div>

        <div class="form-group row w-100 text-right" style="text-align:center ;">
            <table class="table">
                <tr style="background-color:#233242;color:white">

                    <th style='color:white'>الاسم</th>
                    <th style='color:white'>الوظيفة</th>
                    <th style='color:white'>تاريخ الإستلام</th>
                </tr>
                @if(count($invitationMeeting->invetationMeeting)>0)
                @foreach($invitationMeeting->invetationMeeting as $key => $intr)
                <tr>
                    <th>{{$intr->name_1}}</th>
                    <th>{{$intr->job_1}}</th>
                    <th>{{$intr->recive_date}}</th>
                </tr>
                @endforeach
                @endif
            </table>
        </div>
        <br>
        <table class='table' style=" margin:auto">
                    <thead>
                        <tr  style='padding:10px'>
      
                    @if ($invitationMeeting->status == 'confirmed' && Auth::user()->hasRole('Employee') || $invitationMeeting->status == 'confirmed' && Auth::user()->hasRole('Admin') )
                    
                        <div class="" style="text-align:center ;">
                            <label for="" class="" style="font-size:large;font-weight: bolder;">:ممثل الإدارة </label>
                        </div>
                        <div class="form-group row w-20 text-left">
                            <div class="col-6">
                                <label for="" class="col-5 col-form-label"> :الإسم  </label>
                                {{ $invitationMeeting->name_manager}}
                            </div>
                        </div>
                  
                    @endif
                    @if (Auth::user()->hasRole('SuperAdmin'))
                    <th class=" w-50 text-center"  style='padding:13px'>
                             
                        <div class="" style="text-align:center ;padding:12px;">
                            <label for="" class="" style="font-size:large;font-weight: bolder;color:silver;padding:12px;margin:10px"> :ممثل الإدارة </label>
                        </div>
                        <hr>
                        <div class="form-group row w-20 text-left">
                            <div class="col-6"  style="text-align:center ;">
                                <label>  {{ $invitationMeeting->name_manager}}</label>
                                  <label for="" class="col-5 col-form-label" style='padding:10px'>:الإسم  </label>
                             
                            </div>
                        </div>
                   
                        </th>
                            @endif
                        </tr>
                    </thead>
                </table>
              

        <br><br>
        <table class="table" style="background-color:#233242;color:white">
            <thead>
                <tr>
                   
                    
                    <th>
                        <div class="" style="text-align:center ;">
                        <label> تاريخ الاصدار  </label>
                          </div>

                    </th>
                    <th>
                        <div class="" style="text-align:center ;">
                        <label>تاريخ التعديل</label>
                         </div>

                    </th>
                    <th>
                        <div class="" style="text-align:center ;">
                        <label>اسم الشركة</label>
                            </div>

                    </th>
                   
                   
                </tr>
                <tr>
                <th>
                        <div class="" style="text-align:center ;">
                       
                        <label> {{ $invitationMeeting->date3 }} </label>
                        </div>

                    </th>
                    <th>
                        <div class="" style="text-align:center ;">
                        
                        <label> {{ $invitationMeeting->date2 }}</label>
                        </div>

                    </th>
                    <th>
                        <div class="" style="text-align:center ;">
                       
                           <label> {{ $invitationMeeting->company_name }}</label>
                        </div>

                    </th>
                </tr>
               
            </table>
            <table class="table" style="background-color:#233242;color:white">
            <thead>
          
                <tr>
                   
                   <th>
                       <div class="" style=" text-align:center;">
                           <label for="" class="" > مدةالحفظ  </label>
                            
                       </div>

                   </th>
                   <th>
                       <div class="" style="text-align:center ;">
                           <label for="" class=""> رقم
                               الصفحة </label>
                             
                       </div>
                   </th>
                   <th>
                       <div class="" style="text-align:center ;">
                     
                           <label for="" > رقم
                               الوثيقة  </label>
                               
                       </div>
                   </th>
               </tr>
               <tr>
                   
                   <th>
                       <div class="" style=" text-align:center;">
                            <label> سنتان</label>
                       </div>

                   </th>
                   <th>
                       <div class="" style="text-align:center ;">
                          
                               <label> 1 / 1</label>
                       </div>
                   </th>
                   <th>
                       <div class="" style="text-align:center ;">
                       <label>QA–F-13</label>
                          
                               
                       </div>
                   </th>
               </tr>
            </thead>
        </table>
      
    </div>

<style>
    .table thead th {
        vertical-align: bottom;
       
    }
    .table{
        border:1px solid silver;
        color:black;
    }

    table,
    th,
    td,
    tr {
       
        }

    #mainDiv {
        height: 150px;
        width: 50px;
        background: #ffffff;
        
        text-align: center;
        float: left;
        display: inline-table;
    }

</style>
<script>
  window.addEventListener("load", window.print());
</script>



@stop
