@extends('layouts.master')

@section('content')



<div class="card">
    <div class="card-body" style=';margin-top:80px'>

       
        <form action="{{route('brokenRecord.update',$brokenRecord->id)}}" method="post" enctype="multipart/form-data" id="fo1">
            @method('PUT')
            {{ csrf_field() }}
            <div style="" class="w-100 text-center my-4">
                <h2 style='text-shadow: 1px 1px 1px #3ed3ea;'>بيان السجلات المعدمة
                </h2>
                <hr class="w-100">
            </div>
            <div class='row mt-4 mb-3'>
                <label class="form-label col-md-2 ">CO LOGO</label>

                <img src="{{ asset($brokenRecord->logo) }}" height=180px width=210px; />
                @if ($brokenRecord->status == 'pending' && Auth::user()->hasRole('Employee'))

                <input type="file" id="img" name="logo" accept="image/*">
                @endif

                @if (($brokenRecord->status == 'inProgress' && Auth::user()->hasRole('Admin')) ||
                ($brokenRecord->status == 'pending' && Auth::user()->hasRole('Admin')))
                <input type="file" id="img" name="logo" accept="image/*">
                @endif
                @if (($brokenRecord->status == 'inProgress' && Auth::user()->hasRole('SuperAdmin')) ||
                ($brokenRecord->status == 'pending' && Auth::user()->hasRole('SuperAdmin')) ||
                ($brokenRecord->status == 'confirmed' && Auth::user()->hasRole('SuperAdmin')))
                <input type="file" id="img" name="logo" accept="image/*">
                @endif
            </div>
            <div class="form-group row w-100 text-center" style="text-align:center ;">
            <div class="card-body" style='overflow-x:auto'> 
                <table class="table">
                    <tr style="background-color: #001635;color:white;text-align:center">
                        @if ($brokenRecord->status == 'pending' && Auth::user()->hasRole('Employee'))
                        <th scope="col" rowspan="2">م</th>
                        @endif
                        @if (($brokenRecord->status == 'inProgress' && Auth::user()->hasRole('Admin')) ||
                        ($brokenRecord->status == 'pending' && Auth::user()->hasRole('Admin')))
                        <th scope="col" rowspan="2">م</th>
                        @endif
                        @if (($brokenRecord->status == 'inProgress' && Auth::user()->hasRole('SuperAdmin')) ||
                        ($brokenRecord->status == 'pending' && Auth::user()->hasRole('SuperAdmin')) ||
                        ($brokenRecord->status == 'confirmed' && Auth::user()->hasRole('SuperAdmin')))
                        <th scope="col" rowspan="2">م</th>
                        @endif
                        <th scope="col" rowspan="2">نوع السجل</th>
                        <th scope="col" rowspan="2">الكود</th>
                        <th scope="col" colspan="2">فترة الاستخدام</th>
                        <th scope="col" rowspan="2">مكان الحفظ</th>
                        <th scope="col" rowspan="2">أسلوب التخلص</th>
                        <th scope="col" rowspan="2">التاريخ</th>
                    </tr>
                    <tr  style="background-color: #001635;color:white;text-align:center">
                        <th scope="col"> من</th>
                        <th scope="col">الى</th>
                    </tr>
                    @if(count($brokenRecord->brokenRecord)>0)
                    @foreach($brokenRecord->brokenRecord as $key => $intr)
                    <tr id="brokenRecord-{{ $key }}">
                        @if ($brokenRecord->status == 'pending' && Auth::user()->hasRole('Employee'))
                        <td class="text-center end-td ">
                            <button type="button" title="Remove" onclick="removeRow({{ $key }},{{ $intr->id }})" @if ($key==0) disabled="disabled" @endif class="btn btn-danger btn-option">
                                <i class="fa fa-minus-circle"></i>
                            </button>
                        </td>
                        @endif
                        @if (($brokenRecord->status == 'inProgress' && Auth::user()->hasRole('Admin')) ||
                        ($brokenRecord->status == 'pending' && Auth::user()->hasRole('Admin')))
                        <td class="text-center end-td ">
                            <button type="button" title="Remove" onclick="removeRow({{ $key }},{{ $intr->id }})" @if ($key==0) disabled="disabled" @endif class="btn btn-danger btn-option">
                                <i class="fa fa-minus-circle"></i>
                            </button>
                        </td>
                        @endif
                        @if (($brokenRecord->status == 'inProgress' && Auth::user()->hasRole('SuperAdmin')) ||
                        ($brokenRecord->status == 'pending' && Auth::user()->hasRole('SuperAdmin')) ||
                        ($brokenRecord->status == 'confirmed' && Auth::user()->hasRole('SuperAdmin')))
                        <td class="text-center end-td ">
                            <button type="button" title="Remove" onclick="removeRow({{ $key }},{{ $intr->id }})" @if ($key==0) disabled="disabled" @endif class="btn btn-danger btn-option">
                                <i class="fa fa-minus-circle"></i>
                            </button>
                        </td>
                        @endif

                        <th><input class="form-control" type="text" name="brokenRecord[{{ $key }}][type_recourd]" value="{{ $intr->type_recourd }}"></th>
                        <th><input class="form-control" type="text" name="brokenRecord[{{ $key }}][code]" value="{{ $intr->code }}"></th>
                        <th><input class="form-control" type="text" name="brokenRecord[{{ $key }}][from]" value="{{ $intr->from }}"></th>
                        <th><input class="form-control" type="text" name="brokenRecord[{{ $key }}][to]" value="{{ $intr->to }}"></th>
                        <th><input class="form-control" type="text" name="brokenRecord[{{ $key }}][save_place]" value="{{ $intr->save_place }}"></th>
                        <th><input class="form-control" type="text" name="brokenRecord[{{ $key }}][kyend_del]" value="{{ $intr->kyend_del }}"></th>
                        <th><input class="form-control" type="date" name="brokenRecord[{{ $key }}][date_1]" value="{{ $intr->date_1 }}"></th>
                    </tr>
                    @endforeach
                    @if ($brokenRecord->status == 'pending' && Auth::user()->hasRole('Employee'))

                    <tr class="datatable-row datatable-row-even">
                        <td class="text-center end-td " id="increment">
                            <button type="button" class="btn btn-primary add_new" id="btn-{{count($brokenRecord->brokenRecord)-1}}" onclick="appendRow({{count($brokenRecord->brokenRecord)-1}})"><i class="fa fa-plus-circle"></i></button>
                        </td>
                    </tr>
                    @endif
                    @if (($brokenRecord->status == 'inProgress' && Auth::user()->hasRole('Admin')) ||
                    ($brokenRecord->status == 'pending' && Auth::user()->hasRole('Admin')))
                    <tr class="datatable-row datatable-row-even">
                        <td class="text-center end-td " id="increment">
                            <button type="button" class="btn btn-primary add_new" id="btn-{{count($brokenRecord->brokenRecord)-1}}" onclick="appendRow({{count($brokenRecord->brokenRecord)-1}})"><i class="fa fa-plus-circle"></i></button>
                        </td>
                    </tr>
                    @endif
                    @if (($brokenRecord->status == 'inProgress' && Auth::user()->hasRole('SuperAdmin')) ||
                    ($brokenRecord->status == 'pending' && Auth::user()->hasRole('SuperAdmin')) ||
                    ($brokenRecord->status == 'confirmed' && Auth::user()->hasRole('SuperAdmin')))
                    <tr class="datatable-row datatable-row-even">
                        <td class="text-center end-td " id="increment">
                            <button type="button" class="btn btn-primary add_new" id="btn-{{count($brokenRecord->brokenRecord)-1}}" onclick="appendRow({{count($brokenRecord->brokenRecord)-1}})"><i class="fa fa-plus-circle"></i></button>
                        </td>
                    </tr>
                    @endif
                    @else

                    <tr id="brokenRecord-0">
                        <th class="text-center end-td ">
                            <button type="button" title="Remove" disabled="disabled" class="btn btn-danger btn-option">
                                <i class="fa fa-minus-circle"></i>
                            </button>
                        </th>

                        <th><input class="form-control" type="text" name="brokenRecord[0][type_recourd]"></th>
                        <th><input class="form-control" type="text" name="brokenRecord[0][code]"></th>
                        <th><input class="form-control" type="text" name="brokenRecord[0][from]"></th>
                        <th><input class="form-control" type="text" name="brokenRecord[0][to]"></th>
                        <th><input class="form-control" type="text" name="brokenRecord[0][save_place]"></th>
                        <th><input class="form-control" type="text" name="brokenRecord[0][kyend_del]"></th>
                        <th><input class="form-control" type="date" name="brokenRecord[0][date_1]"></th>
                    </tr>
                    <tr class="datatable-row datatable-row-even">
                        <td class="text-center end-td " id="increment">
                            <button type="button" class="btn btn-primary add_new" id="btn-0" onclick="appendRow(0)"><i class="fa fa-plus-circle"></i></button>
                        </td>
                    </tr>
                    @endif
                </table>
            </div>
            </div>
            <table class="table">
                <thead>
                    <tr>
                        <th class=" w-50  col-1 ">
                            <div class="" style="text-align:right ;">
                                <label for="" class="" style="text-align:center;font-size:large;font-weight: bolder;"> رئيس اللجنة القائمة بالعملية:</label>
                            </div>
                            <div class="form-group row  text-left">
                                <label>ممثل الإدارة لنظام الجودة</label>
                                <label for="" class="col-2 col-form-label">الاسم: -</label>
                                <div class="col-2">
                                    <input type="text" class="form-control" placeholder="  ......" name="name" value="{{ $brokenRecord->name }}">
                                </div>
                            </div>

                        </th>
                    </tr>
                </thead>
            </table>

            <table class="table">
                <thead>
                    <tr>
                        @if ($brokenRecord->status == 'inProgress' && Auth::user()->hasRole('Employee'))
                        <th class=" w-50 text-center col-1 ">
                            <div class="" style="text-align:right ;">
                                <label for="" class="" style="text-align:center;font-size:large;font-weight: bolder;"> عضوية:</label>
                            </div>
                            <div class="form-group row w-10 text-right">
                                <label for="" class="col-2 col-form-label">1- مسئول الوثائق: -</label>

                                <label for="" class="col-1 col-form-label">الاسم: -</label>
                                <div class="col-2">
                                    <input type="text" class="form-control" readonly placeholder="  ......" name="source_official" value="{{ $brokenRecord->source_official }}">
                                </div>
                            </div>
                        </th>
                        @endif
                        @if ($brokenRecord->status == 'confirmed' && Auth::user()->hasRole('Employee'))
                        <th class=" w-50 text-center col-1 ">
                            <div class="" style="text-align:right ;">
                                <label for="" class="" style="text-align:center;font-size:large;font-weight: bolder;"> عضوية:</label>
                            </div>
                            <div class="form-group row w-100">
                                <label for="" class="col-4 col-form-label">1- مسئول الوثائق: -</label>

                                <label for="" class="col-2 col-form-label">الاسم: -</label>
                                <div class="col-3">
                                    <input type="text" class="form-control" readonly placeholder="  ......" name="source_official" value="{{ $brokenRecord->source_official }}">
                                </div>
                            </div>
                            <div class="form-group row w-10 text-right">
                                <label for="" class="col-2 col-form-label">2- مدير الجودة : -</label>
                                <label for="" class="col-1 col-form-label">الاسم: -</label>

                                <div class="col-2">
                                    <input type="text" readonly class="form-control" placeholder="  ......" name="quality_manager" value="{{ $brokenRecord->quality_manager }}">
                                </div>
                            </div>
                        </th>
                        @endif
                        @if (Auth::user()->hasRole('Admin'))
                        <th class=" w-50 text-center col-1 ">
                            <div class="" style="text-align:right ;">
                                <label for="" class="" style="text-align:center;font-size:large;font-weight: bolder;"> عضوية:</label>
                            </div>
                            <div class="form-group row w-10 text-right">
                                <label for="" class="col-2 col-form-label">1- مسئول الوثائق: -</label>

                                <label for="" class="col-1 col-form-label">الاسم: -</label>
                                <div class="col-2">
                                    <input type="text" class="form-control" placeholder="  ......" name="source_official" value="{{ $brokenRecord->source_official }}">
                                </div>
                            </div>
                            @if ($brokenRecord->status == 'confirmed' && Auth::user()->hasRole('Admin'))

                            <div class="form-group row w-10 text-right">
                                <label for="" class="col-2 col-form-label">2- مدير الجودة : -</label>
                                <label for="" class="col-1 col-form-label">الاسم: -</label>

                                <div class="col-2">
                                    <input type="text" class="form-control" placeholder="  ......" name="quality_manager" value="{{ $brokenRecord->quality_manager }}">
                                </div>
                            </div>
                            @endif
                        </th>

                        @endif
                        @if (Auth::user()->hasRole('SuperAdmin'))
                        <th class=" w-50 text-center col-1 ">
                            <div class="" style="text-align:right ;">
                                <label for="" class="" style="text-align:center;font-size:large;font-weight: bolder;"> عضوية:</label>
                            </div>
                            <div class="form-group row w-100 ">
                                <label for="" class="col-6 col-form-label">1- مسئول الوثائق: -</label>

                                <label for="" class="col-2 col-form-label">الاسم: -</label>
                                <div class="col-2">
                                    <input type="text" class="form-control" placeholder="  ......" name="source_official" value="{{ $brokenRecord->source_official }}">
                                </div>
                            </div>
                            <div class="form-group row w-100 ">
                                <label for="" class="col-6 col-form-label">2- مدير الجودة : -</label>
                                <label for="" class="col-2 col-form-label">الاسم: -</label>

                                <div class="col-2">
                                    <input type="text" class="form-control" placeholder="  ......" name="quality_manager" value="{{ $brokenRecord->quality_manager }}">
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
                                <input class="form-control" type="text" name="company_name" placeholder="اسم الشركة  :" value="{{ $brokenRecord->company_name }}">
                            </div>

                        </th>
                        <th>
                            <div class="" style="text-align:start ;">
                                <input class="form-control" type="text" name="date2" value="{{ $brokenRecord->date2 }}" placeholder="تاريخ الإصدار   :" onfocus="(this.type='date')" onblur="(this.type='text')">
                            </div>

                        </th>
                        <th>
                            <div class="" style="text-align:start ;">
                                <input class="form-control" type="text" name="date3" value="{{ $brokenRecord->date3 }}" placeholder="تاريخ التعديل :" onfocus="(this.type='date')" onblur="(this.type='text')">
                            </div>

                        </th>
                        <th>
                            <div class="" style="text-align:start ;">
                                <label> مدة الحفظ </label>
                                <input class="form-control shadow-lg" type="text" name="period_time" value="{{ $brokenRecord->period_time }}">
                            </div>

                        </th>
                        <th>
                            <div class="" style="text-align:start ;">
                                <label> رقم الصفحة </label>
                                <input class="form-control shadow-lg" type="text" name="number_page" value="{{ $brokenRecord->number_page }}">
                            </div>

                        </th>
                        <th>
                            <div class="" style="text-align:start ;">
                                <label> رقم الوثيقة </label>
                                <input class="form-control shadow-lg" type="text" name="number_doc" value="{{ $brokenRecord->number_doc }}">
                            </div>
                        </th>
                    </tr>
                </thead>
            </table>

            @if ($brokenRecord->status == 'pending' && Auth::user()->hasRole('Employee'))
            <div class="form-group">
                <button style="border-radius:20px;margin: 50px; width:10% ; height: 5%;" type="submit" class="btn btn-primary"><i class="fas fa-save" style="width:15% ; height: 20%;">تعديل
                    </i></button>
            </div>
            @elseif(($brokenRecord->status == 'inProgress' && Auth::user()->hasRole('Admin')) ||
            ($brokenRecord->status == 'pending' && Auth::user()->hasRole('Admin')))
            <div class="form-group">
                <button style="border-radius:20px;margin: 50px; width:10% ; height: 5%;" type="submit" class="btn btn-primary"><i class="fas fa-save" style="width:15% ; height: 20%;">تعديل
                    </i></button>
            </div>
            @elseif(($brokenRecord->status == 'inProgress' && Auth::user()->hasRole('SuperAdmin')) ||
            ($brokenRecord->status == 'pending' && Auth::user()->hasRole('SuperAdmin')) ||
            ($brokenRecord->status == 'confirmed' && Auth::user()->hasRole('SuperAdmin')))
            <div class="row">
            <button style="border-radius:8px;margin: 50px; width:30% ;background-color: #2a415b; ;height: 5%;padding:10px;margin-right:100px;margin:auto" type="submit" class="btn btn-primary col-md-4">
                   حفظ  </i></button>
            </div>
            @endif
        </form>
    </div>

    <script>
        function appendRow(num) {
            $new_number = parseInt(num) + 1;
            $appended_text = ` <tr class="datatable-row datatable-row-even" id="brokenRecord-${$new_number}">
                                                 
                                                    <td class="text-center end-td ">
                                                                <button type="button" title="Remove" onclick="removeRow(${$new_number})"
                                                                        class="btn btn-danger btn-option">
                                                                        <i class="fa fa-minus-circle"></i>
                                                                </button>
                                                    </td>
                                                    <th><input class="form-control" type="text" name="brokenRecord[${$new_number}][type_recourd]"></th>
                <th><input class="form-control" type="text" name="brokenRecord[${$new_number}][code]"></th>
                <th><input class="form-control" type="text" name="brokenRecord[${$new_number}][from]"></th>
                <th><input class="form-control" type="text" name="brokenRecord[${$new_number}][to]"></th>
                <th><input class="form-control" type="text" name="brokenRecord[${$new_number}][save_place]"></th>
                <th><input class="form-control" type="text" name="brokenRecord[${$new_number}][kyend_del]"></th>
                <th><input class="form-control" type="date" name="brokenRecord[${$new_number}][date_1]"></th>
      
                                                     </tr>`;
            $($appended_text).insertAfter(`#brokenRecord-${num}`);
            if (!document.getElementById(`brokenRecord-${num}`)) {
                $($appended_text).insertAfter(`#brokenRecord-0`);
            }

            $(`#btn-${num}`).remove();
            $("#increment").append(`<button type="button" class="btn btn-primary add_new" id="btn-${$new_number}" onclick="appendRow(${$new_number})"><i class="fa fa-plus-circle"></i></button></td>`);


        }

        function removeRow(num, id) {
            if (id != 0) {
                $("#brokenRecord-0").append(`<input type="hidden" name="ids[${num}]" value="${id}">`);
            }
            $(`#brokenRecord-${num}`).remove();
        }

    </script>

    <style>
        .table thead th {
            vertical-align: bottom;
          
        }

        table,
        th,
        td,
        tr {
            border: 1px solid silver;
          
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
    @stop
