@extends('layouts.master')

@section('content')
<style>
    .shadow-lg {
        box-shadow: 0 1rem 3rem rgba(0, 0, 0, .175) !important;
    }

    input {
        box-shadow: 0 1rem 3rem rgba(0, 0, 0, .175) !important
    }

</style>
<div class='row card'>

    <div class='row card' style='margin:auto;'>

<form action="{{route('invitationMeeting.update',$invitationMeeting->id)}}" method="post" class='col-md-10' style='margin:auto;margin-top:80px' enctype="multipart/form-data" id="fo1">
    @method('PUT')
    {{ csrf_field() }}

    <div class="container p-4">
        <div style="" class="w-100 text-center my-4">
            <h2 style=' ;text-shadow: 1px 1px 1px #3ed3ea;'>دعوة لإجتماع مراجعة الإدارة</h2>
            <hr class="w-100">
            <div class="form-group row w-10">
                    <h6 for="" class="col-md-12">نبلغ سيادتكم بإجتماع مراجعة الإدراة لنظام الجودة </h6>
                </div>
                <div class='row p-3'>
                    <label class="col-md-4 form-label text-right pr-5">CO LOGO</label>
                    <div class='col-md-5'>
              @if ($invitationMeeting->status == 'pending' && Auth::user()->hasRole('Employee'))
            <input type="file" id="img" class='shadow-lg' name="logo" accept="image/*">
        @endif

        @if (($invitationMeeting->status == 'inProgress' && Auth::user()->hasRole('Admin')) ||
            ($invitationMeeting->status == 'pending' && Auth::user()->hasRole('Admin')))
            <input type="file" id="img" class='shadow-lg' name="logo" accept="image/*">
        @endif
        @if (($invitationMeeting->status == 'inProgress' && Auth::user()->hasRole('SuperAdmin')) ||
            ($invitationMeeting->status == 'pending' && Auth::user()->hasRole('SuperAdmin')) ||
            ($invitationMeeting->status == 'confirmed' && Auth::user()->hasRole('SuperAdmin')))
            <input type="file" id="img" class='shadow-lg' name="logo" accept="image/*">
        @endif  
       
        </div>
        <img src="{{ asset($invitationMeeting->logo) }}" height=100px width=100px; />
            
       
    </div>
    <div class="form-group row w-10">            
           <label for="" class="col-md-4 form-label text-right pr-5">تاريخ الاجتماع:</label>
                    
                        <input type="date" class="form-control col-md-4 shadow-lg" name="date_1">
                    
                </div>

        <div class=" form-group row w-10">
            <label for="" class="col-md-4 form-label text-right pr-5">اليوم :</label>
           
                <input type="text" class="form-control  col-md-4" name="day" value="{{ $invitationMeeting->day }}">
            
        </div>
        <div class=" form-group row w-10">
            <label for="" class="col-md-4 form-label text-right pr-5">مكان الإجتماع :</label>
            
                <input type="text" class="form-control col-md-4" name="place_meeting" value="{{ $invitationMeeting->place_meeting }}">
            
        </div>
        <hr >
        <div class="form-group row w-100 text-center">
                    <h2 for="" class="col-md-2 col-form-label" style=';text-shadow: 1px 1px 1px #3ed3ea;margin:auto'>أسماء الحضور :</h2>
                </div>

        <div class="form-group row w-100 text-right" style="text-align:center ;">
            <table class="table">
                <tr style="background-color:#233242;color:white">
                    @if ($invitationMeeting->status == 'pending' && Auth::user()->hasRole('Employee'))
                    <th>م</th>
                @endif
                @if (($invitationMeeting->status == 'inProgress' && Auth::user()->hasRole('Admin')) ||
                    ($invitationMeeting->status == 'pending' && Auth::user()->hasRole('Admin')))
                    <th>م</th>
                @endif
                @if (($invitationMeeting->status == 'inProgress' && Auth::user()->hasRole('SuperAdmin')) ||
                    ($invitationMeeting->status == 'pending' && Auth::user()->hasRole('SuperAdmin')) ||
                    ($invitationMeeting->status == 'confirmed' && Auth::user()->hasRole('SuperAdmin')))
                    <th>م</th>
                @endif
                    <th>الاسم</th>
                    <th>الوظيفة</th>
                    <th>تاريخ الإستلام</th>
                </tr>
                @if(count($invitationMeeting->invetationMeeting)>0)
                @foreach($invitationMeeting->invetationMeeting as $key => $intr)
                <tr id="invetation-{{ $key }}">
                    @if ($invitationMeeting->status == 'pending' && Auth::user()->hasRole('Employee'))
                    <td class="text-center end-td ">
                        <button type="button" title="Remove" onclick="removeRow({{$key}},{{$intr->id}})" @if ($key==0) disabled="disabled" @endif class="btn btn-danger btn-option">
                            <i class="fa fa-minus-circle"></i>
                        </button>
                    </td>
                    @endif
                    @if (($invitationMeeting->status == 'inProgress' && Auth::user()->hasRole('Admin')) ||
                    ($invitationMeeting->status == 'pending' && Auth::user()->hasRole('Admin')))                    <td class="text-center end-td ">
                        <button type="button" title="Remove" onclick="removeRow({{$key}},{{$intr->id}})" @if ($key==0) disabled="disabled" @endif class="btn btn-danger btn-option">
                            <i class="fa fa-minus-circle"></i>
                        </button>
                    </td>
                    @endif
                    @if (($invitationMeeting->status == 'inProgress' && Auth::user()->hasRole('SuperAdmin')) ||
                    ($invitationMeeting->status == 'pending' && Auth::user()->hasRole('SuperAdmin')) ||
                    ($invitationMeeting->status == 'confirmed' && Auth::user()->hasRole('SuperAdmin')))                    <td class="text-center end-td ">
                        <button type="button" title="Remove" onclick="removeRow({{$key}},{{$intr->id}})" @if ($key==0) disabled="disabled" @endif class="btn btn-danger btn-option">
                            <i class="fa fa-minus-circle"></i>
                        </button>
                    </td>
                    @endif
                    <th><input class="form-control" type="text" name="invetation[{{$key}}][name_1]" value="{{ $intr->name_1 }}"></th>
                    <th><input class="form-control" type="text" name="invetation[{{$key}}][job_1]" value="{{ $intr->job_1 }}"></th>
                    <th><input class="form-control" type="date" name="invetation[{{$key}}][recive_date]" value="{{ $intr->recive_date }}"></th>
                </tr>
                @endforeach
                @if ($invitationMeeting->status == 'pending' && Auth::user()->hasRole('Employee'))
                <tr class="datatable-row datatable-row-even"  >
                    <td class="text-center end-td " id="increment">
                        <button type="button" class="btn btn-primary add_new" id="btn-{{count($invitationMeeting->invetationMeeting)-1}}" onclick="appendRow({{count($invitationMeeting->invetationMeeting)-1}})"><i class="fa fa-plus-circle"></i></button>
                    </td>
                </tr>
                @endif
                @if (($invitationMeeting->status == 'inProgress' && Auth::user()->hasRole('Admin')) ||
                ($invitationMeeting->status == 'pending' && Auth::user()->hasRole('Admin')))                <tr class="datatable-row datatable-row-even"  >
                    <td class="text-center end-td " id="increment">
                        <button type="button" class="btn btn-primary add_new" id="btn-{{count($invitationMeeting->invetationMeeting)-1}}" onclick="appendRow({{count($invitationMeeting->invetationMeeting)-1}})"><i class="fa fa-plus-circle"></i></button>
                    </td>
                </tr>
                @endif
                @if (($invitationMeeting->status == 'inProgress' && Auth::user()->hasRole('SuperAdmin')) ||
                ($invitationMeeting->status == 'pending' && Auth::user()->hasRole('SuperAdmin')) ||
                ($invitationMeeting->status == 'confirmed' && Auth::user()->hasRole('SuperAdmin')))                <tr class="datatable-row datatable-row-even"  >
                    <td class="text-center end-td " id="increment">
                        <button type="button" class="btn btn-primary add_new" id="btn-{{count($invitationMeeting->invetationMeeting)-1}}" onclick="appendRow({{count($invitationMeeting->invetationMeeting)-1}})"><i class="fa fa-plus-circle"></i></button>
                    </td>
                </tr>
                @endif
                @else

                <tr id="invetation-0">
                    <th class="text-center end-td ">
                        <button type="button" title="Remove" disabled="disabled" class="btn btn-danger btn-option">
                            <i class="fa fa-minus-circle"></i>
                        </button>
                    </th>
                    <th><input class="form-control" type="text" name="invetation[0][name_1]"></th>
                    <th><input class="form-control" type="text" name="invetation[0][job_1]"></th>
                    <th><input class="form-control" type="date" name="invetation[0][recive_date]"></th>
                </tr>
                <tr class="datatable-row datatable-row-even">
                    <td class="text-center end-td " id="increment">
                        <button type="button" class="btn btn-primary add_new" id="btn-0" onclick="appendRow(0)"><i class="fa fa-plus-circle"></i></button>
                    </td>
                </tr>
                @endif
            </table>
        </div>

        <table style=" margin:auto">
            <thead>
                <tr>
                    @if ($invitationMeeting->status == 'confirmed' && Auth::user()->hasRole('Employee') || $invitationMeeting->status == 'confirmed' && Auth::user()->hasRole('Admin') )
                    <th class=" w-50 text-center">
                        <div class="" style="text-align:center ;">
                            <label for="" class="" style="font-size:large;font-weight: bolder;">ممثل الإدارة :</label>
                        </div>
                        <div class="form-group row w-20 text-left">
                            <label for="" class="col-5 col-form-label ">الإسم </label>
                            <div class="col-6">
                                <input type="text" class="form-control" readonly placeholder="  ......" name="name_manager" value="{{ $invitationMeeting->name_manager}}">
                            </div>
                        </div>
                    </th>
                    @endif
                    @if (Auth::user()->hasRole('SuperAdmin'))
                    <th class=" w-50 text-center">
                        <div class="" style="text-align:center ;">
                            <label for="" class="" style="font-size:large;font-weight: bolder;">ممثل الإدارة :</label>
                        </div>
                        <div class="form-group row w-20 text-left">
                            <label for="" class="col-3 text-center col-form-label">الإسم </label>
                            <div class="col-6">
                                <input type="text" class="form-control" placeholder="  ......" name="name_manager" value="{{ $invitationMeeting->name_manager}}">
                            </div>
                        </div>
                    </th>
                    @endif
                </tr>
            </thead>
        </table>
        <br><br>
        <table class="table">
            <thead>
                <tr>
                    <th>
                        <div class="" style="text-align:start ;">
                            <input class="form-control" type="text" name="company_name" placeholder="اسم الشركة  :" value="{{ $invitationMeeting->company_name }}">
                        </div>

                    </th>
                    <th>
                        <div class="" style="text-align:start ;">
                            <input class="form-control" type="text" name="date2" placeholder="تاريخ الإصدار   :" onfocus="(this.type='date')" onblur="(this.type='text')" value="{{ $invitationMeeting->date2 }}">
                        </div>

                    </th>
                    <th>
                        <div class="" style="text-align:start ;">
                            <input class="form-control" type="text" name="date3" placeholder="تاريخ التعديل :" onfocus="(this.type='date')" onblur="(this.type='text')" value="{{ $invitationMeeting->date3 }}">
                        </div>

                    </th>
                    <th>
                            <div class="" style="text-align:start ;">
                                <label> مدة الحفظ </label>
                                <input class="form-control shadow-lg" type="text" name="period_time" value="{{ $invitationMeeting->period_time }}">
                            </div>

                        </th>
                        <th>
                            <div class="" style="text-align:start ;">
                                <label> رقم الصفحة </label>
                                <input class="form-control shadow-lg" type="text" name="number_page" value="{{ $invitationMeeting->number_page }}">
                            </div>

                        </th>
                        <th>
                            <div class="" style="text-align:start ;">
                                <label> رقم الوثيقة </label>
                                <input class="form-control shadow-lg" type="text" name="number_doc" value="{{ $invitationMeeting->number_doc }}">
                            </div>
                        </th>
                </tr>
            </thead>
        </table>
        @if ($invitationMeeting->status == 'pending' && Auth::user()->hasRole('Employee'))
                <div class="form-group">
                    <button style="border-radius:20px;margin: 50px; width:10% ; height: 5%;" type="submit"
                        class="btn btn-primary"><i class="fas fa-save" style="width:15% ; height: 20%;">تعديل
                        </i></button>
                </div>
            @elseif(($invitationMeeting->status == 'inProgress' && Auth::user()->hasRole('Admin')) ||
                ($invitationMeeting->status == 'pending' && Auth::user()->hasRole('Admin')))
                <div class="form-group">
                    <button style="border-radius:20px;margin: 50px; width:10% ; height: 5%;" type="submit"
                        class="btn btn-primary"><i class="fas fa-save" style="width:15% ; height: 20%;">تعديل
                        </i></button>
                </div>
            @elseif(($invitationMeeting->status == 'inProgress' && Auth::user()->hasRole('SuperAdmin')) ||
                ($invitationMeeting->status == 'pending' && Auth::user()->hasRole('SuperAdmin')) ||
                ($invitationMeeting->status == 'confirmed' && Auth::user()->hasRole('SuperAdmin')))
                <div class='row'>
                    <button style="border-radius:8px;margin: 50px; width:30% ;background-color: #2a415b; ;height: 5%;padding:10px;margin-right:100px;margin:auto" type="submit" class="btn btn-primary col-md-4">
                       تعديل</button>
                </div>
            @endif
    </div>



   
</form>


<style>
    .table thead th {
        vertical-align: bottom;
        border-bottom: 2px solid rgb(214, 206, 206);
    }

    table,
    th,
    td,
    tr {
        border: 1px solid rgb(214, 206, 206);
        border-bottom: 2px solid rgb(214, 206, 206);
        border-top: 2px solid rgb(214, 206, 206);
    }

    #mainDiv {
        height: 150px;
        width: 50px;
        background: #ffffff;
        border: 1px solid rgb(8, 2, 2);
        text-align: center;
        float: left;
        display: inline-table;
    }

</style>


<script>
    function appendRow(num) {
                    $new_number = parseInt(num) + 1;
                    $appended_text = ` <tr class="datatable-row datatable-row-even" id="invetation-${$new_number}">
                                       
                                        <td class="text-center end-td ">
                                                  <button type="button" title="Remove" onclick="removeRow(${$new_number})"
                                                            class="btn btn-danger btn-option">
                                                            <i class="fa fa-minus-circle"></i>
                                                  </button>
                                        </td>
                                        <td>
                                            <input class="form-control" type="text" name="invetation[${$new_number}][name_1]">
                   
            </td>

            <td>
            <input class="form-control" type="text" name="invetation[${$new_number}][job_1]">
                    
            </td> 
            
            <td>
            <input class="form-control" type="date" name="invetation[${$new_number}][recive_date]">
                    
            </td> 
                              </tr>`;
                              $($appended_text).insertAfter(`#invetation-${num}`);
                    if (!document.getElementById(`invetation-${num}`)) {
                              $($appended_text).insertAfter(`#invetation-0`);
                    }

                   

                    $(`#btn-${num}`).remove();
                    $("#increment").append(`<button type="button" class="btn btn-primary add_new" id="btn-${$new_number}" onclick="appendRow(${$new_number})"><i class="fa fa-plus-circle"></i></button></td>`);


          }

          function removeRow(num, id){
          if(id != 0){
             $("#invetation-0").append(`<input type="hidden" name="ids[${num}]" value="${id}">`);
          }
          $(`#invetation-${num}`).remove();
          
     }

    </script>

@stop
