@extends('layouts.master')

@section('content')

<style>
    .shadow-lg {
        box-shadow: 0 1rem 3rem rgba(0, 0, 0, .175) !important;
    }

    input {
        box-shadow: 0 1rem 3rem rgba(0, 0, 0, .175) !important;
    }

</style>


<div class="card">
<div class="card-body row" style='margin:auto;margin-top:80px'>
   
    <form action="{{route('recordCanceledDocument.update',$recordCanceledDocument->id)}}" class='col-md-10' style='margin:auto' method="post" enctype="multipart/form-data" id="fo1">
        @method('PUT')
        {{ csrf_field() }}
      <div style="" class="w-100 text-center my-4">
        <h2 style='text-shadow: 1px 1px 1px #3ed3ea;'>سجل حصر الوثائق الملغاة</h2>
        <hr class="w-100">
    </div>
  
    <div class='row mt-4 mb-3'>
                <label class="form-label col-md-2 ">CO LOGO</label>
         @if ($recordCanceledDocument->status == 'pending' && Auth::user()->hasRole('Employee'))
            <input type="file" id="img" name="logo" accept="image/*">
        @endif

        @if (($recordCanceledDocument->status == 'inProgress' && Auth::user()->hasRole('Admin')) ||
            ($recordCanceledDocument->status == 'pending' && Auth::user()->hasRole('Admin')))
            <input type="file" id="img" name="logo" accept="image/*">
        @endif
        @if (($recordCanceledDocument->status == 'inProgress' && Auth::user()->hasRole('SuperAdmin')) ||
            ($recordCanceledDocument->status == 'pending' && Auth::user()->hasRole('SuperAdmin')) ||
            ($recordCanceledDocument->status == 'confirmed' && Auth::user()->hasRole('SuperAdmin')))
            <input type="file" id="img" name="logo" accept="image/*">
        @endif       
        <img src="{{ asset($recordCanceledDocument->logo) }}" height=100px width=100px; />
       
     </div>
  
    <div class="form-group row w-100 text-right" style="text-align:center;">
        <table class="table">
            <tr style='font-size:14px;background-color:#001635;color:white;text-align:center;'>
                
                @if ($recordCanceledDocument->status == 'pending' && Auth::user()->hasRole('Employee'))
                <th scope="col" rowspan="2">م</th>
            @endif
            @if (($recordCanceledDocument->status == 'inProgress' && Auth::user()->hasRole('Admin')) ||
                ($recordCanceledDocument->status == 'pending' && Auth::user()->hasRole('Admin')))
                <th scope="col" rowspan="2">م</th>
            @endif
            @if (($recordCanceledDocument->status == 'inProgress' && Auth::user()->hasRole('SuperAdmin')) ||
                ($recordCanceledDocument->status == 'pending' && Auth::user()->hasRole('SuperAdmin')) ||
                ($recordCanceledDocument->status == 'confirmed' && Auth::user()->hasRole('SuperAdmin')))
                <th scope="col" rowspan="2">م</th>
            @endif
                <th scope="col" rowspan="2">إسم الوثيقة</th>
                <th scope="col" rowspan="2">كود </th>
                <th scope="col" colspan="2"> الأصدار </th>
                <th scope="col" colspan="2"> التعديل  </th>
                <th scope="col" rowspan="2">سبب الالغاء</th>
                <th scope="col" rowspan="2">ملاحظات/ بيان التعديل إن وجد</th>

            </tr>
            <tr style='font-size:14px;background-color:#001635;color:white;text-align:center;'>
                
                <th scope="col">رقم</th>
                <th scope="col"> التاريخ</th>
                <th scope="col">رقم</th>
                <th scope="col"> التاريخ</th>
            </tr>
            @if(count($recordCanceledDocument->recordCanceledDocument)>0)
            @foreach($recordCanceledDocument->recordCanceledDocument as $key => $intr)
            <tr id="recordCanceledDocument-{{ $key }}">
                @if ($recordCanceledDocument->status == 'pending' && Auth::user()->hasRole('Employee'))
                <td class="text-center end-td ">
                    <button type="button" title="Remove"
                        onclick="removeRow({{ $key }},{{ $intr->id }})"
                        @if ($key == 0) disabled="disabled" @endif
                        class="btn btn-danger btn-option">
                        <i class="fa fa-minus-circle"></i>
                    </button>
                </td>
            @endif
            @if (($recordCanceledDocument->status == 'inProgress' && Auth::user()->hasRole('Admin')) ||
                ($recordCanceledDocument->status == 'pending' && Auth::user()->hasRole('Admin')))
                <td class="text-center end-td ">
                    <button type="button" title="Remove"
                        onclick="removeRow({{ $key }},{{ $intr->id }})"
                        @if ($key == 0) disabled="disabled" @endif
                        class="btn btn-danger btn-option">
                        <i class="fa fa-minus-circle"></i>
                    </button>
                </td>
            @endif
            @if (($recordCanceledDocument->status == 'inProgress' && Auth::user()->hasRole('SuperAdmin')) ||
                ($recordCanceledDocument->status == 'pending' && Auth::user()->hasRole('SuperAdmin')) ||
                ($recordCanceledDocument->status == 'confirmed' && Auth::user()->hasRole('SuperAdmin')))
                <td class="text-center end-td ">
                    <button type="button" title="Remove"
                        onclick="removeRow({{ $key }},{{ $intr->id }})"
                        @if ($key == 0) disabled="disabled" @endif
                        class="btn btn-danger btn-option">
                        <i class="fa fa-minus-circle"></i>
                    </button>
                </td>
            @endif
                <th><input class="form-control" type="text" name="recordCanceledDocument[{{ $key }}][name_action]" value="{{ $intr->name_action }}"></th>
                <th><input class="form-control" type="text" name="recordCanceledDocument[{{ $key }}][code_action]" value="{{ $intr->code_action }}"></th>
                <th><input class="form-control"  type="text" name="recordCanceledDocument[{{ $key }}][number]" value="{{ $intr->number }}"></th>
                <th><input class="form-control"  type="date" name="recordCanceledDocument[{{ $key }}][date_action]" value="{{ $intr->date_action }}" ></th>
                <th><input class="form-control"  type="text" name="recordCanceledDocument[{{ $key }}][number2]" value="{{ $intr->number2 }}"></th>
                <th><input class="form-control"  type="date" name="recordCanceledDocument[{{ $key }}][date_action2]" value="{{ $intr->date_action2 }}" ></th>
                <th><textarea class="form-control" type="text" name="recordCanceledDocument[{{ $key }}][reasone_cancel]"> {{ $intr->reasone_cancel }}</textarea></th>
                <th><textarea class="form-control" type="text" name="recordCanceledDocument[{{ $key }}][notes_action]">{{ $intr->notes_action }}</textarea></th>
            </tr>
            @endforeach
            @if ($recordCanceledDocument->status == 'pending' && Auth::user()->hasRole('Employee'))

            <tr class="datatable-row datatable-row-even"  >
                <td class="text-center end-td "  id="increment">
                    <button type="button" class="btn btn-primary add_new" id="btn-{{count($recordCanceledDocument->recordCanceledDocument)-1}}" onclick="appendRow({{count($recordCanceledDocument->recordCanceledDocument)-1}})"><i class="fa fa-plus-circle"></i></button>
                </td>
            </tr>
            @endif
            @if (($recordCanceledDocument->status == 'inProgress' && Auth::user()->hasRole('Admin')) ||
            ($recordCanceledDocument->status == 'pending' && Auth::user()->hasRole('Admin')))     
            <tr class="datatable-row datatable-row-even"  >
                <td class="text-center end-td "  id="increment">
                    <button type="button" class="btn btn-primary add_new" id="btn-{{count($recordCanceledDocument->recordCanceledDocument)-1}}" onclick="appendRow({{count($recordCanceledDocument->recordCanceledDocument)-1}})"><i class="fa fa-plus-circle"></i></button>
                </td>
            </tr>
            @endif
            @if (($recordCanceledDocument->status == 'inProgress' && Auth::user()->hasRole('SuperAdmin')) ||
            ($recordCanceledDocument->status == 'pending' && Auth::user()->hasRole('SuperAdmin')) ||
            ($recordCanceledDocument->status == 'confirmed' && Auth::user()->hasRole('SuperAdmin'))) 
            <tr class="datatable-row datatable-row-even"  >
                <td class="text-center end-td "  id="increment">
                    <button type="button" class="btn btn-primary add_new" id="btn-{{count($recordCanceledDocument->recordCanceledDocument)-1}}" onclick="appendRow({{count($recordCanceledDocument->recordCanceledDocument)-1}})"><i class="fa fa-plus-circle"></i></button>
                </td>
            </tr>
            @endif
           @else
            <tr id="recordCanceledDocument-0">
                <th class="text-center end-td ">
                    <button type="button" title="Remove" disabled="disabled" class="btn btn-danger btn-option">
                        <i class="fa fa-minus-circle"></i>
                    </button>
                </th>
                <th><input class="form-control" type="text" name="recordCanceledDocument[0][name_action]"></th>
                <th><input class="form-control" type="text" name="recordCanceledDocument[0][code_action]"></th>
                <th><input class="form-control"  type="text" name="recordCanceledDocument[0][number]"></th>
                <th><input class="form-control"  type="date" name="recordCanceledDocument[0][date_action]"></th>
                <th><input class="form-control"  type="text" name="recordCanceledDocument[0][number2]"></th>
                <th><input class="form-control"  type="date" name="recordCanceledDocument[0][date_action2]"></th>
                <th><textarea class="form-control" type="text" name="recordCanceledDocument[0][reasone_cancel]"></textarea></th>
                <th><textarea class="form-control" type="text" name="recordCanceledDocument[0][notes_action]"></textarea></th>
            </tr>
            <tr class="datatable-row datatable-row-even">
                <td class="text-center end-td " id="increment">
                    <button type="button" class="btn btn-primary add_new" id="btn-0" onclick="appendRow(0)"><i class="fa fa-plus-circle"></i></button>
                </td>
            </tr>
            @endif
        </table>
    </div>
    <table class="table">
        <thead>
            <tr>
                @if ($recordCanceledDocument->status == 'inProgress' && Auth::user()->hasRole('Employee'))
                <th class=" text-center col-2 ">
                    <div class="" style="text-align:center ;">
                        <label for="" class=""
                            style="text-align:center;font-size:large;font-weight: bolder;">إعداد:</label>
                    </div>
                    <div class="form-group row w-10 text-right">
                        <label for="" class="col-3 col-form-label">الاسم: -</label>
                        <div class="col-6">
                            <input type="text" class="form-control" readonly placeholder="  ......"
                                name="name_1" value="{{ $recordCanceledDocument->name_1 }}">
                        </div>
                    </div>
                    <div class="form-group row w-10 text-right">
                        <label for="" class="col-3 col-form-label">الوظيفة: -</label>
                        <div class="col-6">
                            <input type="text" class="form-control" readonly placeholder="  ......"
                                name="job_1" value="{{ $recordCanceledDocument->job_1 }}">
                        </div>
                    </div>

                </th>
            @endif
            @if ($recordCanceledDocument->status == 'confirmed' && Auth::user()->hasRole('Employee'))
                <th class=" text-center col-2 ">
                    <div class="" style="text-align:center ;">
                        <label for="" class=""
                            style="text-align:center;font-size:large;font-weight: bolder;">إعداد:</label>
                    </div>
                    <div class="form-group row w-10 text-right">
                        <label for="" class="col-3 col-form-label">الاسم: -</label>
                        <div class="col-6">
                            <input type="text" class="form-control" readonly placeholder="  ......"
                                name="name_1" value="{{ $recordCanceledDocument->name_1 }}">
                        </div>
                    </div>
                    <div class="form-group row w-10 text-right">
                        <label for="" class="col-3 col-form-label">الوظيفة: -</label>
                        <div class="col-6">
                            <input type="text" class="form-control" readonly placeholder="  ......"
                                name="job_1" value="{{ $recordCanceledDocument->job_1 }}">
                        </div>
                    </div>

                </th>
                <th class="  text-center col-2 ">
                    <div class="" style="text-align:center ;">
                        <label for="" class=""
                            style="text-align:center;font-size:large;font-weight: bolder;">إعتماد:</label>
                    </div>
                    <div class="form-group row w-10 text-right">
                        <label for="" class="col-3 col-form-label">الاسم: -</label>
                        <div class="col-6">
                            <input type="text" class="form-control" readonly placeholder="  ......"
                                name="name_2" value="{{ $recordCanceledDocument->name_2 }}">
                        </div>
                    </div>
                    <div class="form-group row w-10 text-right">
                        <label for="" class="col-3 col-form-label">الوظيفة: -</label>
                        <div class="col-6">
                            <input type="text" class="form-control" readonly placeholder="  ......"
                                name="job_2" value="{{ $recordCanceledDocument->job_2 }}">
                        </div>
                    </div>

                </th>
            @endif
                @if (Auth::user()->hasRole('Admin'))
                <th class=" text-center col-2 ">
                    <div class="" style="text-align:center ;">
                        <label for="" class="" style="text-align:center;font-size:large;font-weight: bolder;">إعداد:</label>
                    </div>
                    <div class="form-group row w-10 text-right">
                        <label for="" class="col-3 col-form-label">الاسم:       -</label>
                        <div class="col-6">
                            <input type="text" class="form-control" placeholder="  ......" name="name_1"  value="{{ $recordCanceledDocument->name_1 }}">
                        </div>
                    </div>
                    <div class="form-group row w-10 text-right">
                        <label for="" class="col-3 col-form-label">الوظيفة:       -</label>
                        <div class="col-6">
                            <input type="text" class="form-control" placeholder="  ......" name="job_1"  value="{{ $recordCanceledDocument->job_1 }}">
                        </div>
                    </div>
                    
                </th>
                @if ($recordCanceledDocument->status == 'confirmed' && Auth::user()->hasRole('Admin'))
                <th class="  text-center col-2 ">
                    <div class="" style="text-align:center ;">
                        <label for="" class=""
                            style="text-align:center;font-size:large;font-weight: bolder;">إعتماد:</label>
                    </div>
                    <div class="form-group row w-10 text-right">
                        <label for="" class="col-3 col-form-label">الاسم: -</label>
                        <div class="col-6">
                            <input type="text" class="form-control" readonly
                                placeholder="  ......" name="name_2"
                                value="{{ $recordCanceledDocument->name_2 }}">
                        </div>
                    </div>
                    <div class="form-group row w-10 text-right">
                        <label for="" class="col-3 col-form-label">الوظيفة: -</label>
                        <div class="col-6">
                            <input type="text" class="form-control" readonly
                                placeholder="  ......" name="job_2"
                                value="{{ $recordCanceledDocument->job_2 }}">
                        </div>
                    </div>

                </th>
            @endif
                @endif
                @if (Auth::user()->hasRole('SuperAdmin'))
                <th class=" text-center col-2 ">
                    <div class="" style="text-align:center ;">
                        <label for="" class="" style="text-align:center;font-size:large;font-weight: bolder;">إعداد:</label>
                    </div>
                    <div class="form-group row w-10 text-right">
                        <label for="" class="col-3 col-form-label">الاسم:       -</label>
                        <div class="col-6">
                            <input type="text" class="form-control" placeholder="  ......" name="name_1"  value="{{ $recordCanceledDocument->name_1 }}">
                        </div>
                    </div>
                    <div class="form-group row w-10 text-right">
                        <label for="" class="col-3 col-form-label">الوظيفة:       -</label>
                        <div class="col-6">
                            <input type="text" class="form-control" placeholder="  ......" name="job_1"  value="{{ $recordCanceledDocument->job_1 }}">
                        </div>
                    </div>
                    
                </th>
                <th class="  text-center col-2 ">
                    <div class="" style="text-align:center ;">
                        <label for="" class="" style="text-align:center;font-size:large;font-weight: bolder;">إعتماد:</label>
                    </div>
                    <div class="form-group row w-10 text-right">
                        <label for="" class="col-3 col-form-label">الاسم:       -</label>
                        <div class="col-6">
                            <input type="text" class="form-control" placeholder="  ......" name="name_2"  value="{{ $recordCanceledDocument->name_2 }}">
                        </div>
                    </div>
                    <div class="form-group row w-10 text-right">
                        <label for="" class="col-3 col-form-label">الوظيفة:       -</label>
                        <div class="col-6">
                            <input type="text" class="form-control" placeholder="  ......" name="job_2"  value="{{ $recordCanceledDocument->job_2 }}">
                        </div>
                    </div>
                   
                </th>
              @endif

            </tr>
        </thead>
    </table>


<table class="table">
    <thead>
        <tr>
            <th>
              <div class="" style="text-align:start ;">
              <label>اسم الشركة</label>
                <input class="form-control" type="text" name="company_name"  value="{{ $recordCanceledDocument->company_name }}">
              </div>
    
            </th>
            <th>
              <div class="" style="text-align:start ;">
              <label>تاريخ الاصدار</label>
                <input class="form-control" type="text" name="date2"  value="{{ $recordCanceledDocument->date2 }}"  onfocus="(this.type='date')" onblur="(this.type='text')">
              </div>
    
            </th>
            <th>
                <div class="" style="text-align:start ;">
                <label>تاريخ التعديل</label>
                    <input class="form-control" type="text" name="date3"  value="{{ $recordCanceledDocument->date3 }}"  onfocus="(this.type='date')" onblur="(this.type='text')">
                  </div>
    
            </th>
            <th>
                            <div class="" style="text-align:start ;">
                                <label> مدة الحفظ </label>
                                <input class="form-control shadow-lg" type="text" name="period_time" value="{{ $recordCanceledDocument->period_time }}">
                            </div>

                        </th>
                        <th>
                            <div class="" style="text-align:start ;">
                                <label> رقم الصفحة </label>
                                <input class="form-control shadow-lg" type="text" name="number_page" value="{{ $recordCanceledDocument->number_page }}">
                            </div>

                        </th>
                        <th>
                            <div class="" style="text-align:start ;">
                                <label> رقم الوثيقة </label>
                                <input class="form-control shadow-lg" type="text" name="number_doc" value="{{ $recordCanceledDocument->number_doc }}">
                            </div>
                        </th>
          </tr>
    </thead>
</table>

@if ($recordCanceledDocument->status == 'pending' && Auth::user()->hasRole('Employee'))
<div class="form-group">
    <button style="border-radius:20px;margin: 50px; width:10% ; height: 5%;" type="submit"
        class="btn btn-primary"><i class="fas fa-save" style="width:15% ; height: 20%;">تعديل
        </i></button>
</div>
@elseif(($recordCanceledDocument->status == 'inProgress' && Auth::user()->hasRole('Admin')) ||
($recordCanceledDocument->status == 'pending' && Auth::user()->hasRole('Admin')))
<div class="form-group">
    <button style="border-radius:20px;margin: 50px; width:10% ; height: 5%;" type="submit"
        class="btn btn-primary"><i class="fas fa-save" style="width:15% ; height: 20%;">تعديل
        </i></button>
</div>
@elseif(($recordCanceledDocument->status == 'inProgress' && Auth::user()->hasRole('SuperAdmin')) ||
($recordCanceledDocument->status == 'pending' && Auth::user()->hasRole('SuperAdmin')) ||
($recordCanceledDocument->status == 'confirmed' && Auth::user()->hasRole('SuperAdmin')))
<div class='row mt-3'>
                <button style="border-radius:8px;margin: 50px; width:30% ;background-color: #2a415b; ;height: 5%;padding:10px;margin-right:100px;margin:auto" type="submit" class="btn btn-primary col-md-4">
                    تعديل</button>
            </div>
@endif
    </form>
</div>
 
<script>
    function appendRow(num) {
        $new_number = parseInt(num) + 1;
        $appended_text = ` <tr class="datatable-row datatable-row-even" id="recordCanceledDocument-${$new_number}">
                                             
                                                <td class="text-center end-td ">
                                                            <button type="button" title="Remove" onclick="removeRow(${$new_number})"
                                                                    class="btn btn-danger btn-option">
                                                                    <i class="fa fa-minus-circle"></i>
                                                            </button>
                                                </td>
                 <th><input class="form-control" type="text" name="recordCanceledDocument[${$new_number}][name_action]"></th>
                <th><input class="form-control" type="text" name="recordCanceledDocument[${$new_number}][code_action]"></th>
                <th><input class="form-control"  type="text" name="recordCanceledDocument[${$new_number}][number]"></th>
                <th><input class="form-control"  type="date" name="recordCanceledDocument[${$new_number}][date_action]"></th>
                <th><input class="form-control"  type="text" name="recordCanceledDocument[${$new_number}][number2]"></th>
                <th><input class="form-control"  type="date" name="recordCanceledDocument[${$new_number}][date_action2]"></th>
                <th><textarea class="form-control" type="text" name="recordCanceledDocument[${$new_number}][reasone_cancel]"></textarea></th>
                <th><textarea class="form-control" type="text" name="recordCanceledDocument[${$new_number}][notes_action]"></textarea></th>
  
           
                                                 </tr>`;
                                                 $($appended_text).insertAfter(`#recordCanceledDocument-${num}`);
                      if (!document.getElementById(`recordCanceledDocument-${num}`)) {
                                $($appended_text).insertAfter(`#recordCanceledDocument-0`);
                      }
  
                      $(`#btn-${num}`).remove();
                      $("#increment").append(`<button type="button" class="btn btn-primary add_new" id="btn-${$new_number}" onclick="appendRow(${$new_number})"><i class="fa fa-plus-circle"></i></button></td>`);
  
  
            }

    function removeRow(num, id){
          if(id != 0){
             $("#recordCanceledDocument-0").append(`<input type="hidden" name="ids[${num}]" value="${id}">`);
          }
          $(`#recordCanceledDocument-${num}`).remove();
        }
</script>

<style>
    .table thead th {
        vertical-align: bottom;
        /* border-bottom: 2px solid black; */
    }
    
    table,
    th,
    td,
    tr {
        border: 1px solid silver;
        /* border-bottom: 2px solid black;
        border-top: 2px solid black; */
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