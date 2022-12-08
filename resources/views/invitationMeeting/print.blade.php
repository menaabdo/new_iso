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
    <div class="container p-4" style='text-align:center;border:1px solid silver; box-shadow: 0 1rem 3rem rgba(0, 0, 0, .175) !important;
 '>
    <div style="" class="w-100 text-center my-4" style=''>
        <h2 style='text-align:center;margin-bottom:40px'>
       
        <span style='font-family:Cursive;border-bottom: 1px solid silver;
    ; box-shadow: 0 1rem 3rem rgba(0, 0, 0, .175) !important;
    border-radius: 6px;
    padding: 10px;text-shadow: 1px 1px 1px #3ed3ea;padding-left: 40px;
    padding-right: 40px;
'> دعوة لإجتماع مراجعة الإدارة </span>
<img src="{{ asset($invitationMeeting->logo) }}" style="border-radius: 6px;
    border: 2px solid #001635;
    margin: 10px;
    float: left;
    /* padding: 12px;" width="50px" height="50px" />
       
</h2>
         
        </div>
            <div class="form-group row w-10" style='text-align:right;margin:4px;margin-right:100px'>
            <h4 for="" class="col-4" style=''>نبلغ سيادتكم بإجتماع مراجعة الإدراة لنظام الجودة  </h4>
            </div>
         

        <div class=" form-group row w-200" style='text-align:right;font-size:15px;margin:4px' >
        
            <label for="" class=" col-form-label " style='margin: 20px;'> تاريخ الاجتماع </label>
             <label>   {{ $invitationMeeting->date_1 }}</label>
             <input readonly style=' box-shadow: 0 1rem 3rem rgba(0, 0, 0, .175) !important;border:none;
    text-align: center;   ' value=' {{ $invitationMeeting->day }}'>
            
              
               <label for="" class=" col-form-label " style=''> يوم  الاجتماع </label>
               <input readonly style=' box-shadow: 0 1rem 3rem rgba(0, 0, 0, .175) !important;border:none;
    text-align: center;   ' value=' {{ $invitationMeeting->place_meeting }}'>
           
                
              
              
               <label for="" class=" col-form-label " style=''> مكان الاجتماع </label>
               <input readonly style=' box-shadow: 0 1rem 3rem rgba(0, 0, 0, .175) !important;border:none;
    text-align: center;   ' value=' {{ $invitationMeeting->place_meeting }}'>
           
             
          
          
        </div>
      <hr>
        <div class="form-group row w-100 te xt-center" style='text-align:center'>
            <h2 for="" class="col-2 col-form-label" style=''>أسماء الحضور </h2>
        </div>

        <div class="form-group row w-100 text-right" style="text-align:center ;">
            <table class="" style='width: 90%;
    margin: auto; margin-top:40px'>
                <tr style="background-color:#233242;color:white">

                    <th style='color:white'>الاسم</th>
                    <th style='color:white'>الوظيفة</th>
                    <th style='color:white'>تاريخ الإستلام</th>
                </tr>
                @if(count($invitationMeeting->invetationMeeting)>0)
                @foreach($invitationMeeting->invetationMeeting as $key => $intr)
                <tr>
                    <th>
                    <input readonly style=' box-shadow: 0 1rem 3rem rgba(0, 0, 0, .175) !important;border:none;
    text-align: center;   ' value=' {{$intr->name_1}}'></th>
                    <th>
                    <input readonly style=' box-shadow: 0 1rem 3rem rgba(0, 0, 0, .175) !important;border:none;
    text-align: center;   ' value=' {{$intr->job_1}}'></th>
                    <th>
                    <input readonly style=' box-shadow: 0 1rem 3rem rgba(0, 0, 0, .175) !important;border:none;
    text-align: center;   ' value=' {{$intr->recive_date}}'></th>
                </tr>
                @endforeach
                @endif
            </table>
        </div>
        <br>
        <table class='' style=" margin:auto">
                    <thead>
                        <tr  style=''>
      
                    @if ($invitationMeeting->status == 'confirmed' && Auth::user()->hasRole('Employee') || $invitationMeeting->status == 'confirmed' && Auth::user()->hasRole('Admin') )
                    
                        <div class="" style="text-align:center ;">
                            <label for="" class="" style="text-shadow:none;font-weight: bolder;">:ممثل الإدارة </label>
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
        <table class="table" style="  ; border:none;padding:12px;margin-top:12px;background-color: #001635;
    color: white;text-shadow: none;width: 97%;
    margin: auto;
    margin-bottom: 12px;    font-size: 12px;padding: 1px;">
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
