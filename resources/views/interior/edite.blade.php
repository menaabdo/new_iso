@extends('layouts.master')

@section('content')

<style>
      .shadow-lg {
    box-shadow: 0 1rem 3rem rgba(0,0,0,.175)!important;}
    
    </style>
   <div style='margin-top:85px;margin:auto' class='row card'>

        <h3 style="margin-top:85px;text-shadow: 1px 1px 1px #3ed3ea;">متابعة نتائج المراجعة الداخلية</h3>
        <hr>
        <form action="{{ route('interior.update', $interior->id) }}" method="post" enctype="multipart/form-data" class='col-md-6'  id="fo1">
            @method('PUT')
            {{ csrf_field() }}
           

            <div class="form-group row text-right">
      <label for="" class="col-1 col-form-label"> ادارة :</label>
                <div class="col-4">
                    <input type="text" class="form-control" placeholder="ادارة  ......" name="management"
                        value="{{ $interior->management }}">
                </div>
            </div>


            <section class="my-5 table-bordered">
                <table class="table table-bordered  text-center "
                    style="grid-auto-flow: column;justify-content: center; align-content: center;">
                    <thead>
                        <tr style="background-color:lightgreen">
                            @if ($interior->status == 'pending' && Auth::user()->hasRole('Employee'))
                                <th data-field="" class="datatable-cell  end-cell text-center">
                                    <span scope="col" rowspan="2">م</span>
                                </th>
                            @endif
                            @if (($interior->status == 'inProgress' && Auth::user()->hasRole('Admin')) ||
                                ($interior->status == 'pending' && Auth::user()->hasRole('Admin')))
                                <th data-field="" class="datatable-cell  end-cell text-center">
                                    <span scope="col" rowspan="2">م</span>
                                </th>
                            @endif
                            @if (($interior->status == 'inProgress' && Auth::user()->hasRole('SuperAdmin')) ||
                                ($interior->status == 'pending' && Auth::user()->hasRole('SuperAdmin')) ||
                                ($interior->status == 'confirmed' && Auth::user()->hasRole('SuperAdmin')))
                                <th data-field="" class="datatable-cell  end-cell text-center">
                                    <span scope="col" rowspan="2">م</span>
                                </th>
                            @endif
                            <th scope="col" rowspan="2">وصف حالة عدم المطابقة </th>
                            <th scope="col" rowspan="2">الإجراء التصحيحي / الوقائي المطلوب</th>
                            <th scope="col" rowspan="2">رقم الإجراء</th>
                            <th scope="col" rowspan="2">المسئول عن التنفيذ</th>
                            <th scope="col" colspan="2">متابعة التنفيذ</th>
                        </tr>
                        <tr style="background-color:rgb(144, 196, 238)">
                            <th scope="col"> مخطط</th>
                            <th scope="col">فعلي</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($interior->interior) > 0)
                            @foreach ($interior->interior as $key => $intr)
                                <tr id="interior-{{ $key }}">
                                    @if ($interior->status == 'pending' && Auth::user()->hasRole('Employee'))
                                        <td class="text-center end-td ">
                                            <button type="button" title="Remove"
                                                onclick="removeRow({{ $key }},{{ $intr->id }})"
                                                @if ($key == 0) disabled="disabled" @endif
                                                class="btn btn-danger btn-option">
                                                <i class="fa fa-minus-circle"></i>
                                            </button>
                                        </td>
                                    @endif
                                    @if (($interior->status == 'inProgress' && Auth::user()->hasRole('Admin')) ||
                                        ($interior->status == 'pending' && Auth::user()->hasRole('Admin')))
                                         <td class="text-center end-td ">
                                          <button type="button" title="Remove"
                                              onclick="removeRow({{ $key }},{{ $intr->id }})"
                                              @if ($key == 0) disabled="disabled" @endif
                                              class="btn btn-danger btn-option">
                                              <i class="fa fa-minus-circle"></i>
                                          </button>
                                      </td>
                                    @endif
                                    @if (($interior->status == 'inProgress' && Auth::user()->hasRole('SuperAdmin')) ||
                                    ($interior->status == 'pending' && Auth::user()->hasRole('SuperAdmin')) ||
                                    ($interior->status == 'confirmed' && Auth::user()->hasRole('SuperAdmin')))
                                      <td class="text-center end-td ">
                                        <button type="button" title="Remove"
                                            onclick="removeRow({{ $key }},{{ $intr->id }})"
                                            @if ($key == 0) disabled="disabled" @endif
                                            class="btn btn-danger btn-option">
                                            <i class="fa fa-minus-circle"></i>
                                        </button>
                                    </td>
                                    @endif
                                        <td>
                                            <div class="form-row ">
                                                <textarea type="text" class="form-control  " name="interior[{{ $key }}][non_conformity]"
                                                    style="height: 70px; width:300px;">{{ $intr->non_conformity }}</textarea>

                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-row ">
                                                <textarea type="text" class="form-control  " name="interior[{{ $key }}][corrective_action]"
                                                    style="height: 70px; width:300px;">{{ $intr->corrective_action }}</textarea>

                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-row ">
                                                <input type="number" class="form-control  "
                                                    name="interior[{{ $key }}][action_number]"
                                                    style="height: 70px; width:50px;" value="{{ $intr->action_number }}">

                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-row ">
                                                <input type="text" class="form-control  "
                                                    name="interior[{{ $key }}][implementation]"style="height: 70px; width:200px;"
                                                    value="{{ $intr->implementation }}">

                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-row ">
                                                <input type="text" class="form-control  "
                                                    name="interior[{{ $key }}][planned]"
                                                    style="height: 70px; width:50px;"value="{{ $intr->planned }}">

                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-row ">
                                                <input type="text" class="form-control  "
                                                    name="interior[{{ $key }}][actual]"
                                                    style="height: 70px; width:50px;" value="{{ $intr->actual }}">

                                            </div>
                                        </td>

                                </tr>
                            @endforeach
                            @if ($interior->status == 'pending' && Auth::user()->hasRole('Employee'))
                            <tr class="datatable-row datatable-row-even">

                                <td class="text-center end-td " id="increment">
                                    <button type="button" class="btn btn-primary add_new"
                                        id="btn-{{ count($interior->interior) - 1 }}"
                                        onclick="appendRow({{ count($interior->interior) - 1 }})"><i
                                            class="fa fa-plus-circle"></i></button>
                                </td>
                            </tr>
                            @endif
                            @if (($interior->status == 'inProgress' && Auth::user()->hasRole('Admin')) ||
                            ($interior->status == 'pending' && Auth::user()->hasRole('Admin')))
                              <tr class="datatable-row datatable-row-even">

                                <td class="text-center end-td " id="increment">
                                    <button type="button" class="btn btn-primary add_new"
                                        id="btn-{{ count($interior->interior) - 1 }}"
                                        onclick="appendRow({{ count($interior->interior) - 1 }})"><i
                                            class="fa fa-plus-circle"></i></button>
                                </td>
                            </tr>
                            @endif
                            @if (($interior->status == 'inProgress' && Auth::user()->hasRole('SuperAdmin')) ||
                            ($interior->status == 'pending' && Auth::user()->hasRole('SuperAdmin')) ||
                            ($interior->status == 'confirmed' && Auth::user()->hasRole('SuperAdmin')))
                            <tr class="datatable-row datatable-row-even">

                              <td class="text-center end-td " id="increment">
                                  <button type="button" class="btn btn-primary add_new"
                                      id="btn-{{ count($interior->interior) - 1 }}"
                                      onclick="appendRow({{ count($interior->interior) - 1 }})"><i
                                          class="fa fa-plus-circle"></i></button>
                              </td>
                          </tr>
                          @endif
                        @else
                            <tr id="interior-0">
                                <td class="text-center end-td ">
                                    <button type="button" title="Remove" disabled="disabled"
                                        class="btn btn-danger btn-option">
                                        <i class="fa fa-minus-circle"></i>
                                    </button>
                                </td>
                                <td>
                                    <div class="form-row ">
                                        <textarea type="text" class="form-control  " name="interior[0][non-conformity]"
                                            style="height: 70px; width:300px;"></textarea>

                                    </div>
                                </td>
                                <td>
                                    <div class="form-row ">
                                        <textarea type="text" class="form-control  " name="interior[0][corrective_action]"
                                            style="height: 70px; width:300px;"></textarea>

                                    </div>
                                </td>
                                <td>
                                    <div class="form-row ">
                                        <input type="number" class="form-control  " name="interior[0][action_number]"
                                            style="height: 70px; width:50px;">

                                    </div>
                                </td>
                                <td>
                                    <div class="form-row ">
                                        <input type="text" class="form-control  "
                                            name="interior[0][implementation]"style="height: 70px; width:200px;">

                                    </div>
                                </td>
                                <td>
                                    <div class="form-row ">
                                        <input type="text" class="form-control  " name="interior[0][planned]"
                                            style="height: 70px; width:50px;">

                                    </div>
                                </td>
                                <td>
                                    <div class="form-row ">
                                        <input type="text" class="form-control  " name="interior[0][actual]"
                                            style="height: 70px; width:50px;">

                                    </div>
                                </td>

                            </tr>
                            <tr class="datatable-row datatable-row-even">

                                <td class="text-center end-td " id="increment">
                                    <button type="button" class="btn btn-primary add_new" id="btn-0"
                                        onclick="appendRow(0)"><i class="fa fa-plus-circle"></i></button>
                                </td>
                            </tr>
                        @endif

                    </tbody>
                </table>
                <!-- </section>

      <section class=" text-right mt-5"> -->
                @if (Auth::user()->hasRole('SuperAdmin'))
                    <div class="form-group row w-100 text-right">
                        <label class="col-2 col-form-label"> رئيس فريق المراجعه :</label>
                        <div class="col-10">
                            <input type="text" class="form-control" placeholder="رئيس فريق المراجعه  ......"
                                name="head_of_the_review" value="{{ $interior->head_of_the_review }}">
                        </div>
                    </div>
                    <div class="form-group row w-100 text-right">
                        <label for="" class="col-1 col-form-label"> الاسم :</label>
                        <div class="col-4">
                            <input type="text" class="form-control" placeholder="الاسم  ......" name="name"
                                value="{{ $interior->name }}">
                        </div>
                        <label for="" class="col-1 col-form-label"> التاريخ :</label>
                        <div class="col-4">
                            <input type="date" class="form-control" name="date" value="{{ $interior->date }}">
                        </div>
                    </div>
                @endif
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>
                                <div class="" style="text-align:start ;">
                                    <input class="form-control" type="text" name="company_name"
                                        placeholder="اسم الشركة  :" value="{{ $interior->company_name }}">
                                </div>

                            </th>
                            <th>
                                <div class="" style="text-align:start ;">
                                    <input class="form-control" type="text" name="date2"
                                        placeholder="تاريخ الإصدار   :" onfocus="(this.type='date')"
                                        value="{{ $interior->date2 }}" onblur="(this.type='text')">
                                </div>

                            </th>
                            <th>
                                <div class="" style="text-align:start ;">
                                    <input class="form-control" type="text" name="date3"
                                        placeholder="تاريخ التعديل   :" onfocus="(this.type='date')"
                                        value="{{ $interior->date3 }}" onblur="(this.type='text')">
                                </div>

                            </th>
                            <th>
                            <div class="" style="text-align:start ;">
                                <label> مدة الحفظ </label>
                                <input class="form-control shadow-lg" type="text" name="period_time" value="{{ $interior->period_time }}">
                            </div>

                        </th>
                        <th>
                            <div class="" style="text-align:start ;">
                                <label> رقم الصفحة </label>
                                <input class="form-control shadow-lg" type="text" name="number_page" value="{{ $interior->number_page }}">
                            </div>

                        </th>
                        <th>
                            <div class="" style="text-align:start ;">
                                <label> رقم الوثيقة </label>
                                <input class="form-control shadow-lg" type="text" name="number_doc" value="{{ $interior->number_doc }}">
                            </div>
                        </th>
                        </tr>
                    </thead>
                </table>

                @if ($interior->status == 'pending' && Auth::user()->hasRole('Employee'))
                    <div class="form-group">
                        <button style="border-radius:20px;margin: 50px; width:10% ; height: 5%;" type="submit"
                            class="btn btn-primary"><i class="fas fa-save" style="width:15% ; height: 20%;">تعديل
                            </i></button>
                    </div>
                @elseif(($interior->status == 'inProgress' && Auth::user()->hasRole('Admin')) ||
                    ($interior->status == 'pending' && Auth::user()->hasRole('Admin')))
                    <div class="form-group">
                        <button style="border-radius:20px;margin: 50px; width:10% ; height: 5%;" type="submit"
                            class="btn btn-primary"><i class="fas fa-save" style="width:15% ; height: 20%;">تعديل
                            </i></button>
                    </div>
                @elseif(($interior->status == 'inProgress' && Auth::user()->hasRole('SuperAdmin')) ||
                    ($interior->status == 'pending' && Auth::user()->hasRole('SuperAdmin')) ||
                    ($interior->status == 'confirmed' && Auth::user()->hasRole('SuperAdmin')))
                    <div class="form-group">
                        <button style="border-radius:20px;margin: 50px; width:10% ; height: 5%;" type="submit"
                            class="btn btn-primary"><i class="fas fa-save" style="width:15% ; height: 20%;">تعديل
                            </i></button>
                    </div>
                @endif
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>




    <script>
        function appendRow(num) {
            $new_number = parseInt(num) + 1;
            $appended_text = ` <tr class="datatable-row datatable-row-even" id="interior-${$new_number}">
                                       
                                        <td class="text-center end-td ">
                                                  <button type="button" title="Remove" onclick="removeRow(${$new_number})"
                                                            class="btn btn-danger btn-option">
                                                            <i class="fa fa-minus-circle"></i>
                                                  </button>
                                        </td>
                                       
                                        <td>
            <div class="form-row ">
              <textarea type="text" class="form-control  " name="interior[${$new_number}][non_conformity]" style="height: 70px; width:300px;"></textarea>

            </div>
          </td>
          <td>
            <div class="form-row ">
              <textarea type="text" class="form-control  " name="interior[${$new_number}][corrective_action]" style="height: 70px; width:300px;"></textarea>

            </div>
          </td>
          <td>
            <div class="form-row ">
              <input type="number" class="form-control  " name="interior[${$new_number}][action_number]" style="height: 70px; width:50px;">

            </div>
          </td>
          <td>
            <div class="form-row ">
              <input type="text" class="form-control  " name="interior[${$new_number}][implementation]"style="height: 70px; width:200px;">

            </div>
          </td>
          <td>
            <div class="form-row ">
              <input type="text" class="form-control  " name="interior[${$new_number}][planned]" style="height: 70px; width:50px;">

            </div>
          </td>
          <td>
            <div class="form-row ">
              <input type="text" class="form-control  " name="interior[${$new_number}][actual]" style="height: 70px; width:50px;">

            </div>
          </td>
                                       
                                       
                              </tr>`;
            $($appended_text).insertAfter(`#interior-${num}`);
            if (!document.getElementById(`interior-${num}`)) {
                $($appended_text).insertAfter(`#interior-0`);
            }



            $(`#btn-${num}`).remove();
            $("#increment").append(
                `<button type="button" class="btn btn-primary add_new" id="btn-${$new_number}" onclick="appendRow(${$new_number})"><i class="fa fa-plus-circle"></i></button></td>`
                );


        }

        function removeRow(num, id) {
            if (id != 0) {
                $("#interior-0").append(`<input type="hidden" name="ids[${num}]" value="${id}">`);
            }
            $(`#interior-${num}`).remove();

        }
    </script>
@stop
