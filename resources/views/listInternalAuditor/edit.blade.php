@extends('layouts.master')

@section('content')



    <div class="card">
        <div class="card-body">
            <h3 style="margin-top:85px;">قائمة المراجعين الداخليين المعتمدين لنظام الجودة</h3>
            <hr>
            <form action="{{ route('listInternalAuditor.update', $listInternalAuditor->id) }}" method="post"
                enctype="multipart/form-data" id="fo1">
                @method('PUT')
                {{ csrf_field() }}
                <div class="container-fluid p-4">
                    <div style="" class="w-100 text-center my-4">
                        <h2>قائمة المراجعين الداخليين المعتمدين لنظام الجودة</h2>
                        <hr class="w-100">
                    </div>
                    <div class="container-fluid p-2">
                        <div class="" style="text-align:center ;">
                            <table class="table">
                                <tr style="background-color:rgb(245, 192, 212)">
                                    @if ($listInternalAuditor->status == 'pending' && Auth::user()->hasRole('Employee'))
                                        <th class="col-1 col-form-label">م</th>
                                    @endif
                                    @if (($listInternalAuditor->status == 'inProgress' && Auth::user()->hasRole('Admin')) ||
                                        ($listInternalAuditor->status == 'pending' && Auth::user()->hasRole('Admin')))
                                        <th class="col-1 col-form-label">م</th>
                                    @endif
                                    @if (($listInternalAuditor->status == 'inProgress' && Auth::user()->hasRole('SuperAdmin')) ||
                                        ($listInternalAuditor->status == 'pending' && Auth::user()->hasRole('SuperAdmin')) ||
                                        ($listInternalAuditor->status == 'confirmed' && Auth::user()->hasRole('SuperAdmin')))
                                        <th class="col-1 col-form-label">م</th>
                                    @endif
                                    <th>الإسم</th>
                                    <th>الإدارة التابع لها</th>
                                    <th>تاريخ التأهيل</th>
                                    <th>مكان التأهيل</th>
                                </tr>
                                @if (count($listInternalAuditor->list) > 0)
                                    @foreach ($listInternalAuditor->list as $key => $intr)
                                        <tr id="list-{{ $key }}">
                                          @if ($listInternalAuditor->status == 'pending' && Auth::user()->hasRole('Employee'))
                                            <td class="text-center end-td ">
                                                <button type="button" title="Remove"
                                                    onclick="removeRow({{ $key }},{{ $intr->id }})"
                                                    @if ($key == 0) disabled="disabled" @endif
                                                    class="btn btn-danger btn-option">
                                                    <i class="fa fa-minus-circle"></i>
                                                </button>
                                            </td>
                                            @endif
                                            @if (($listInternalAuditor->status == 'inProgress' && Auth::user()->hasRole('Admin')) ||
                                            ($listInternalAuditor->status == 'pending' && Auth::user()->hasRole('Admin')))
                                            <td class="text-center end-td ">
                                                <button type="button" title="Remove"
                                                    onclick="removeRow({{ $key }},{{ $intr->id }})"
                                                    @if ($key == 0) disabled="disabled" @endif
                                                    class="btn btn-danger btn-option">
                                                    <i class="fa fa-minus-circle"></i>
                                                </button>
                                            </td>
                                            @endif
                                            @if (($listInternalAuditor->status == 'inProgress' && Auth::user()->hasRole('SuperAdmin')) ||
                                            ($listInternalAuditor->status == 'pending' && Auth::user()->hasRole('SuperAdmin')) ||
                                            ($listInternalAuditor->status == 'confirmed' && Auth::user()->hasRole('SuperAdmin')))
                                            <td class="text-center end-td ">
                                                <button type="button" title="Remove"
                                                    onclick="removeRow({{ $key }},{{ $intr->id }})"
                                                    @if ($key == 0) disabled="disabled" @endif
                                                    class="btn btn-danger btn-option">
                                                    <i class="fa fa-minus-circle"></i>
                                                </button>
                                            </td>
                                            @endif
                                            <td><input class="form-control" type="text"
                                                    name="list[{{ $key }}][name]" value="{{ $intr->name }}"></td>
                                            <td><input class="form-control" type="text"
                                                    name="list[{{ $key }}][manage]" value="{{ $intr->manage }}">
                                            </td>
                                            <td><input class="form-control" type="date"
                                                    name="list[{{ $key }}][date]" value="{{ $intr->date }}">
                                            </td>
                                            <td><input class="form-control" type="text"
                                                    name="list[{{ $key }}][place]" value="{{ $intr->place }}">
                                            </td>
                                        </tr>
                                    @endforeach
                                    @if ($listInternalAuditor->status == 'pending' && Auth::user()->hasRole('Employee'))
                                    <tr class="datatable-row datatable-row-even">
                                        <td class="text-center end-td " id="increment">
                                            <button type="button" class="btn btn-primary add_new"
                                                id="btn-{{ count($listInternalAuditor->list) - 1 }}"
                                                onclick="appendRow({{ count($listInternalAuditor->list) - 1 }})"><i
                                                    class="fa fa-plus-circle"></i></button>
                                        </td>
                                    </tr>
                                    @endif
                                    @if (($listInternalAuditor->status == 'inProgress' && Auth::user()->hasRole('Admin')) ||
                                    ($listInternalAuditor->status == 'pending' && Auth::user()->hasRole('Admin')))
                                    <tr class="datatable-row datatable-row-even">
                                        <td class="text-center end-td " id="increment">
                                            <button type="button" class="btn btn-primary add_new"
                                                id="btn-{{ count($listInternalAuditor->list) - 1 }}"
                                                onclick="appendRow({{ count($listInternalAuditor->list) - 1 }})"><i
                                                    class="fa fa-plus-circle"></i></button>
                                        </td>
                                    </tr>
                                    @endif
                                    @if (($listInternalAuditor->status == 'inProgress' && Auth::user()->hasRole('SuperAdmin')) ||
                                    ($listInternalAuditor->status == 'pending' && Auth::user()->hasRole('SuperAdmin')) ||
                                    ($listInternalAuditor->status == 'confirmed' && Auth::user()->hasRole('SuperAdmin')))
                                    <tr class="datatable-row datatable-row-even">
                                        <td class="text-center end-td " id="increment">
                                            <button type="button" class="btn btn-primary add_new"
                                                id="btn-{{ count($listInternalAuditor->list) - 1 }}"
                                                onclick="appendRow({{ count($listInternalAuditor->list) - 1 }})"><i
                                                    class="fa fa-plus-circle"></i></button>
                                        </td>
                                    </tr>
                                    @endif
                                @else
                                    <tr id="list-0">
                                        <td class="text-center end-td ">
                                            <button type="button" title="Remove" disabled="disabled"
                                                class="btn btn-danger btn-option">
                                                <i class="fa fa-minus-circle"></i>
                                            </button>
                                        </td>
                                        <td><input class="form-control" type="text" name="list[0][name]"></td>
                                        <td><input class="form-control" type="text" name="list[0][manage]"></td>
                                        <td><input class="form-control" type="date" name="list[0][date]"></td>
                                        <td><input class="form-control" type="text" name="list[0][place]"></td>
                                    </tr>
                                    <tr class="datatable-row datatable-row-even">
                                        <td class="text-center end-td " id="increment">
                                            <button type="button" class="btn btn-primary add_new" id="btn-0"
                                                onclick="appendRow(0)"><i class="fa fa-plus-circle"></i></button>
                                        </td>
                                    </tr>
                                @endif
                            </table>
                        </div>

                        <table class=" w-100">
                            <thead>
                                <tr>
                                    @if ($listInternalAuditor->status == 'inProgress' && Auth::user()->hasRole('Employee'))
                                        <th class=" w-90 text-center col-3 ">
                                            <div class="" style="text-align:center ;">
                                                <label for="" class="">إعداد</label>
                                            </div>
                                            <div class="" style="text-align:center ;">
                                                <label for="" class="">مدير الجودة </label>
                                            </div>
                                            <div class="form-group row w-10 text-right">
                                                <label for="" class="col-3 col-form-label">التاريخ : -</label>
                                                <div class="col-6">
                                                    <input type="date" class="form-control" placeholder="  ......"
                                                        name="date_1" value="{{ $listInternalAuditor->date_1 }}" readonly>
                                                </div>
                                            </div>
                                            <div class="form-group row w-10 text-right">
                                                <label for="" class="col-3 col-form-label">التوقيع: -</label>
                                                <div class="col-6">
                                                    <input type="text" class="form-control" placeholder="  ......"
                                                        name="name" value="{{ $listInternalAuditor->name }}" readonly>
                                                </div>
                                            </div>
                                        </th>
                                    @endif
                                    @if ($listInternalAuditor->status == 'confirmed' && Auth::user()->hasRole('Employee'))
                                        <th class=" w-90 text-center col-3 ">
                                            <div class="" style="text-align:center ;">
                                                <label for="" class="">إعداد</label>
                                            </div>
                                            <div class="" style="text-align:center ;">
                                                <label for="" class="">مدير الجودة </label>
                                            </div>
                                            <div class="form-group row w-10 text-right">
                                                <label for="" class="col-3 col-form-label">التاريخ : -</label>
                                                <div class="col-6">
                                                    <input type="date" class="form-control" placeholder="  ......"
                                                        name="date_1" value="{{ $listInternalAuditor->date_1 }}"
                                                        readonly>
                                                </div>
                                            </div>
                                            <div class="form-group row w-10 text-right">
                                                <label for="" class="col-3 col-form-label">التوقيع: -</label>
                                                <div class="col-6">
                                                    <input type="text" class="form-control" placeholder="  ......"
                                                        name="name" value="{{ $listInternalAuditor->name }}" readonly>
                                                </div>
                                            </div>
                                        </th>
                                        <th class=" w-90 text-center col-3">
                                            <div class="" style="text-align:center ;">
                                                <label for="" class=""
                                                    style="text-align:center;font-size:large;font-weight: bolder;">إعتماد</label>
                                            </div>
                                            <div class="" style="text-align:center ;">
                                                <label for="" class=""
                                                    style="text-align:center;font-size:large;font-weight: bolder;">المدير
                                                    العام</label>
                                            </div>
                                            <div class="form-group row w-10 text-right">
                                                <label for="" class="col-3 col-form-label">التاريخ : -</label>
                                                <div class="col-6">
                                                    <input type="date" class="form-control" placeholder="  ......"
                                                        name="date_2" value="{{ $listInternalAuditor->date_2 }}"
                                                        readonly>
                                                </div>
                                            </div>


                                            <div class="form-group row w-10 text-right">
                                                <label for="" class="col-3 col-form-label">التوقيع: -</label>
                                                <div class="col-6">
                                                    <input type="text" class="form-control" placeholder="  ......"
                                                        name="manager_name"
                                                        value="{{ $listInternalAuditor->manager_name }}" readonly>
                                                </div>
                                            </div>
                                        </th>
                                    @endif
                                    
                                    @if (Auth::user()->hasRole('Admin'))
                                        <th class=" w-90 text-center col-3 ">
                                            <div class="" style="text-align:center ;">
                                                <label for="" class="">إعداد</label>
                                            </div>
                                            <div class="" style="text-align:center ;">
                                                <label for="" class="">مدير الجودة </label>
                                            </div>
                                            <div class="form-group row w-10 text-right">
                                                <label for="" class="col-3 col-form-label">التاريخ : -</label>
                                                <div class="col-6">
                                                    <input type="date" class="form-control" placeholder="  ......"
                                                        name="date_1" value="{{ $listInternalAuditor->date_1 }}">
                                                </div>
                                            </div>
                                            <div class="form-group row w-10 text-right">
                                                <label for="" class="col-3 col-form-label">التوقيع: -</label>
                                                <div class="col-6">
                                                    <input type="text" class="form-control" placeholder="  ......"
                                                        name="name" value="{{ $listInternalAuditor->name }}">
                                                </div>
                                            </div>
                                        </th>
                                    @endif
                                    @if ($listInternalAuditor->status == 'confirmed' && Auth::user()->hasRole('Admin'))
                                      
                                        <th class=" w-90 text-center col-3">
                                            <div class="" style="text-align:center ;">
                                                <label for="" class=""
                                                    style="text-align:center;font-size:large;font-weight: bolder;">إعتماد</label>
                                            </div>
                                            <div class="" style="text-align:center ;">
                                                <label for="" class=""
                                                    style="text-align:center;font-size:large;font-weight: bolder;">المدير
                                                    العام</label>
                                            </div>
                                            <div class="form-group row w-10 text-right">
                                                <label for="" class="col-3 col-form-label">التاريخ : -</label>
                                                <div class="col-6">
                                                    <input type="date" class="form-control" placeholder="  ......"
                                                        name="date_2" value="{{ $listInternalAuditor->date_2 }}"
                                                        readonly>
                                                </div>
                                            </div>


                                            <div class="form-group row w-10 text-right">
                                                <label for="" class="col-3 col-form-label">التوقيع: -</label>
                                                <div class="col-6">
                                                    <input type="text" class="form-control" placeholder="  ......"
                                                        name="manager_name"
                                                        value="{{ $listInternalAuditor->manager_name }}" readonly>
                                                </div>
                                            </div>
                                        </th>
                                    @endif
                                    @if (Auth::user()->hasRole('SuperAdmin'))
                                        <th class=" w-90 text-center col-3 ">
                                            <div class="" style="text-align:center ;">
                                                <label for="" class="">إعداد</label>
                                            </div>
                                            <div class="" style="text-align:center ;">
                                                <label for="" class="">مدير الجودة </label>
                                            </div>
                                            <div class="form-group row w-10 text-right">
                                                <label for="" class="col-3 col-form-label">التاريخ : -</label>
                                                <div class="col-6">
                                                    <input type="date" class="form-control" placeholder="  ......"
                                                        name="date_1" value="{{ $listInternalAuditor->date_1 }}">
                                                </div>
                                            </div>
                                            <div class="form-group row w-10 text-right">
                                                <label for="" class="col-3 col-form-label">التوقيع: -</label>
                                                <div class="col-6">
                                                    <input type="text" class="form-control" placeholder="  ......"
                                                        name="name" value="{{ $listInternalAuditor->name }}">
                                                </div>
                                            </div>
                                        </th>
                                        <th class=" w-90 text-center col-3">
                                            <div class="" style="text-align:center ;">
                                                <label for="" class=""
                                                    style="text-align:center;font-size:large;font-weight: bolder;">إعتماد</label>
                                            </div>
                                            <div class="" style="text-align:center ;">
                                                <label for="" class=""
                                                    style="text-align:center;font-size:large;font-weight: bolder;">المدير
                                                    العام</label>
                                            </div>
                                            <div class="form-group row w-10 text-right">
                                                <label for="" class="col-3 col-form-label">التاريخ : -</label>
                                                <div class="col-6">
                                                    <input type="date" class="form-control" placeholder="  ......"
                                                        name="date_2" value="{{ $listInternalAuditor->date_2 }}">
                                                </div>
                                            </div>


                                            <div class="form-group row w-10 text-right">
                                                <label for="" class="col-3 col-form-label">التوقيع: -</label>
                                                <div class="col-6">
                                                    <input type="text" class="form-control" placeholder="  ......"
                                                        name="manager_name"
                                                        value="{{ $listInternalAuditor->manager_name }}">
                                                </div>
                                            </div>
                                        </th>
                                    @endif

                                </tr>
                            </thead>
                        </table>
                    </div>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>
                                    <div class="" style="text-align:start ;">
                                        <input class="form-control" type="text" name="company_name"
                                            placeholder="اسم الشركة  :" value="{{ $listInternalAuditor->company_name }}">
                                    </div>

                                </th>
                                <th>
                                    <div class="" style="text-align:start ;">
                                        <input class="form-control" type="text" name="date2"
                                            placeholder="تاريخ الإصدار   :" value="{{ $listInternalAuditor->date2 }}"
                                            onfocus="(this.type='date')" onblur="(this.type='text')">
                                    </div>

                                </th>
                                <th>
                                    <div class="" style="text-align:start ;">
                                        <input class="form-control" type="text" name="date3"
                                            placeholder="تاريخ التعديل :" value="{{ $listInternalAuditor->date3 }}"
                                            onfocus="(this.type='date')" onblur="(this.type='text')">
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
                                            style="text-align: center;font-size:large;font-weight: bolder;"> رقم الصفحة : 1
                                            /
                                            1</label>
                                    </div>
                                </th>
                                <th>
                                    <div class="" style="text-align:start ;">
                                        <label for="" class=""
                                            style="text-align: center;font-size:large;font-weight: bolder;"> رقم الوثيقة :
                                            QA – F
                                            - 13 </label>
                                    </div>
                                </th>
                            </tr>
                        </thead>
                    </table>
                    @if ($listInternalAuditor->status == 'pending' && Auth::user()->hasRole('Employee'))
                        <div class="form-group">
                            <button style="border-radius:20px;margin: 50px; width:10% ; height: 5%;" type="submit"
                                class="btn btn-primary"><i class="fas fa-save" style="width:15% ; height: 20%;">تعديل
                                </i></button>
                        </div>
                    @elseif(($listInternalAuditor->status == 'inProgress' && Auth::user()->hasRole('Admin')) ||
                        ($listInternalAuditor->status == 'pending' && Auth::user()->hasRole('Admin')))
                        <div class="form-group">
                            <button style="border-radius:20px;margin: 50px; width:10% ; height: 5%;" type="submit"
                                class="btn btn-primary"><i class="fas fa-save" style="width:15% ; height: 20%;">تعديل
                                </i></button>
                        </div>
                    @elseif(($listInternalAuditor->status == 'inProgress' && Auth::user()->hasRole('SuperAdmin')) ||
                        ($listInternalAuditor->status == 'pending' && Auth::user()->hasRole('SuperAdmin')) ||
                        ($listInternalAuditor->status == 'confirmed' && Auth::user()->hasRole('SuperAdmin')))
                        <div class="form-group">
                            <button style="border-radius:20px;margin: 50px; width:10% ; height: 5%;" type="submit"
                                class="btn btn-primary"><i class="fas fa-save" style="width:15% ; height: 20%;">تعديل
                                </i></button>
                        </div>
                    @endif
            </form>
        </div>
        <style>
            .table thead th {
                vertical-align: bottom;
                border-bottom: 2px solid #ffffff;
                padding: 10px;
            }

            table,
            td,
            th {
                border: 2px solid #f80505;
                border-bottom: 2px solid #df0d0d;
                text-align: center;
            }

            .table thead th {
                vertical-align: bottom;
                border-bottom: 2px solid #e8150e;
            }
        </style>

        <script>
            function appendRow(num) {
                $new_number = parseInt(num) + 1;
                $appended_text = ` <tr class="datatable-row datatable-row-even" id="list-${$new_number}">
                                         
                                          <td class="text-center end-td ">
                                                    <button type="button" title="Remove" onclick="removeRow(${$new_number})"
                                                              class="btn btn-danger btn-option">
                                                              <i class="fa fa-minus-circle"></i>
                                                    </button>
                                          </td>
                        <td><input class="form-control" type="text" name="list[${$new_number}][name]"></td>
                        <td><input class="form-control" type="text" name="list[${$new_number}][manage]"></td>
                        <td><input class="form-control" type="date" name="list[${$new_number}][date]"></td>
                        <td><input class="form-control" type="text" name="list[${$new_number}][place]"></td>
                  
                                         
                                         
                                         
                                </tr>`;
                $($appended_text).insertAfter(`#list-${num}`);
                if (!document.getElementById(`list-${num}`)) {
                    $($appended_text).insertAfter(`#list-0`);
                }

                $(`#btn-${num}`).remove();
                $("#increment").append(
                    `<button type="button" class="btn btn-primary add_new" id="btn-${$new_number}" onclick="appendRow(${$new_number})"><i class="fa fa-plus-circle"></i></button></td>`
                );


            }

            function removeRow(num, id) {
                if (id != 0) {
                    $("#list-0").append(`<input type="hidden" name="ids[${num}]" value="${id}">`);
                }
                $(`#list-${num}`).remove();
            }
        </script>

    @stop
