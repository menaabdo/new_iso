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
<div style='margin:auto;margin-top:50px' class='row card-body'>

    <h3 style="margin:auto;margin-top:85px;text-shadow: 1px 1px 1px #3ed3ea;">@lang('main.Follow up on the results of the internal audit')</h3>
    <hr>
    <form action="{{ route('interior.update', $interior->id) }}" method="post" enctype="multipart/form-data" class='col-md-12' style='margin:auto' id="fo1">
        @method('PUT')
        {{ csrf_field() }}


        <div class="form-group row text-right">
            <label for="" class="col-1 col-form-label"> @lang('main.Department') :</label>
            <div class="col-4">
                <input type="text" class="form-control" placeholder="@lang('main.Department')" name="management" value="{{ $interior->management }}">
            </div>
        </div>
        <!-- table -->
    
        <div class="form-group row text-right mt-5 ">
        <div style="overflow-x:auto;">
 
            <table class="table table-bordered  text-center col-md-11" style="grid-auto-flow: column;justify-content: center; align-content: center;margin:auto">



                <thead style='font-size:13px;background-color: #001635;color:white;padding:10px !important;'>
                    <tr>
                        @if ($interior->status == 'pending' && Auth::user()->hasRole('Employee'))

                        <th scope="col" rowspan="2" style='vertical-align: middle; !important;'>@lang('main.m')</th>
                        @endif
                        @if (($interior->status == 'inProgress' && Auth::user()->hasRole('Admin')) ||
                        ($interior->status == 'pending' && Auth::user()->hasRole('Admin')))
                        <th scope="col" rowspan="2" style='vertical-align: middle; !important;' data-field="" class="datatable-cell  end-cell text-center">
                            @lang('main.m')
                        </th>
                        @endif
                        @if (($interior->status == 'inProgress' && Auth::user()->hasRole('SuperAdmin')) ||
                        ($interior->status == 'pending' && Auth::user()->hasRole('SuperAdmin')) ||
                        ($interior->status == 'confirmed' && Auth::user()->hasRole('SuperAdmin')))
                        <th scope="col" rowspan="2" style='vertical-align: middle; !important;' data-field="" class="datatable-cell  end-cell text-center">
                            @lang('main.m')
                        </th>
                        @endif
                        <th scope="col" rowspan="2" style='vertical-align: middle; !important;'>@lang('main.Description of the nonconformity') </th>
                        <th scope="col" rowspan="2" style='vertical-align: middle; !important;'>@lang('main.Corrective/preventive action required')</th>
                        <th scope="col" rowspan="2" style='vertical-align: middle; !important;'>@lang('main.action number')</th>
                        <th scope="col" rowspan="2" style='vertical-align: middle; !important;'>@lang('main.Responsible for implementation')</th>
                        <th scope="col" colspan="2">@lang('main.Follow-up implementation')</th>
                    </tr>
                    <tr style="">
                        <th scope="col"> @lang('main.plan')</th>
                        <th scope="col">@lang('main.actual')</th>
                    </tr>
                </thead>
                <tbody>
                    @if (count($interior->interior) > 0)
                    @foreach ($interior->interior as $key => $intr)
                    <tr id="interior-{{ $key }}">
                        @if ($interior->status == 'pending' && Auth::user()->hasRole('Employee'))
                        <td class="text-center end-td ">
                            <button type="button" title="Remove" onclick="removeRow({{ $key }},{{ $intr->id }})" @if ($key==0) disabled="disabled" @endif class="btn btn-danger btn-option">
                                <i class="fa fa-minus-circle"></i>
                            </button>
                        </td>
                        @endif
                        @if (($interior->status == 'inProgress' && Auth::user()->hasRole('Admin')) ||
                        ($interior->status == 'pending' && Auth::user()->hasRole('Admin')))
                        <td class="text-center end-td ">
                            <button type="button" title="Remove" onclick="removeRow({{ $key }},{{ $intr->id }})" @if ($key==0) disabled="disabled" @endif class="btn btn-danger btn-option">
                                <i class="fa fa-minus-circle"></i>
                            </button>
                        </td>
                        @endif
                        @if (($interior->status == 'inProgress' && Auth::user()->hasRole('SuperAdmin')) ||
                        ($interior->status == 'pending' && Auth::user()->hasRole('SuperAdmin')) ||
                        ($interior->status == 'confirmed' && Auth::user()->hasRole('SuperAdmin')))
                        <td class="text-center end-td ">
                            <button type="button" title="Remove" onclick="removeRow({{ $key }},{{ $intr->id }})" @if ($key==0) disabled="disabled" @endif class="btn btn-danger btn-option">
                                <i class="fa fa-minus-circle"></i>
                            </button>
                        </td>
                        @endif
                        <td>
                            <div class="form-row ">
                                <textarea type="text" class="form-control shadow-lg " name="interior[{{ $key }}][non_conformity]" style="height: 70px; width:300px;">{{ $intr->non_conformity }}</textarea>

                            </div>
                        </td>
                        <td>
                            <div class="form-row ">
                                <textarea type="text" class="form-control shadow-lg " name="interior[{{ $key }}][corrective_action]" style="height: 70px; width:300px;">{{ $intr->corrective_action }}</textarea>

                            </div>
                        </td>
                        <td>
                            <div class="form-row ">
                                <input type="number" class="form-control shadow-lg " name="interior[{{ $key }}][action_number]" style="height: 70px; width:50px;" value="{{ $intr->action_number }}">

                            </div>
                        </td>
                        <td>
                            <div class="form-row ">
                                <input type="text"  class="form-control shadow-lg " name="interior[{{ $key }}][implementation]" style="height: 70px; width:200px;" value="{{ $intr->implementation }}">

                            </div>
                        </td>
                        <td>
                            <div class="form-row ">
                                <input type="text"  class="form-control shadow-lg " name="interior[{{ $key }}][planned]" style="height: 70px; width:50px;" value="{{ $intr->planned }}">

                            </div>
                        </td>
                        <td>
                            <div class="form-row ">
                                <input type="text"  class="form-control shadow-lg " name="interior[{{ $key }}][actual]" style="height: 70px; width:50px;" value="{{ $intr->actual }}">

                            </div>
                        </td>

                    </tr>
                    @endforeach
                    @if ($interior->status == 'pending' && Auth::user()->hasRole('Employee'))
                    <tr class="datatable-row datatable-row-even">

                        <td class="text-center end-td " id="increment">
                            <button type="button" class="btn btn-primary add_new" id="btn-{{ count($interior->interior) - 1 }}" onclick="appendRow({{ count($interior->interior) - 1 }})"><i class="fa fa-plus-circle"></i></button>
                        </td>
                    </tr>
                    @endif
                    @if (($interior->status == 'inProgress' && Auth::user()->hasRole('Admin')) ||
                    ($interior->status == 'pending' && Auth::user()->hasRole('Admin')))
                    <tr class="datatable-row datatable-row-even">

                        <td class="text-center end-td " id="increment">
                            <button type="button" class="btn btn-primary add_new" id="btn-{{ count($interior->interior) - 1 }}" onclick="appendRow({{ count($interior->interior) - 1 }})"><i class="fa fa-plus-circle"></i></button>
                        </td>
                    </tr>
                    @endif
                    @if (($interior->status == 'inProgress' && Auth::user()->hasRole('SuperAdmin')) ||
                    ($interior->status == 'pending' && Auth::user()->hasRole('SuperAdmin')) ||
                    ($interior->status == 'confirmed' && Auth::user()->hasRole('SuperAdmin')))
                    <tr class="datatable-row datatable-row-even">

                        <td class="text-center end-td " id="increment">
                            <button type="button" class="btn btn-primary add_new" id="btn-{{ count($interior->interior) - 1 }}" onclick="appendRow({{ count($interior->interior) - 1 }})"><i class="fa fa-plus-circle"></i></button>
                        </td>
                    </tr>
                    @endif
                    @else
                    <tr id="interior-0">
                        <td class="text-center end-td ">
                            <button type="button" title="Remove" disabled="disabled" class="btn btn-danger btn-option">
                                <i class="fa fa-minus-circle"></i>
                            </button>
                        </td>
                        <td>
                            <div class="form-row ">
                                <textarea type="text" class="form-control shadow-lg " name="interior[0][non_conformity]" style=""></textarea>

                            </div>
                        </td>
                        <td>
                            <div class="form-row ">
                                <textarea type="text" class="form-control shadow-lg " name="interior[0][corrective_action]"></textarea>

                            </div>
                        </td>
                        <td>
                            <div class="form-row ">
                                <input type="number" class="form-control  shadow-lg" name="interior[0][action_number]" style="height:56px">

                            </div>
                        </td>
                        <td>
                            <div class="form-row ">
                                <input type="text" class="form-control shadow-lg " name="interior[0][implementation]" style="height:56px">

                            </div>
                        </td>
                        <td>
                            <div class="form-row ">
                                <input type="text" class="form-control  shadow-lg" name="interior[0][planned]" style="height:56px">

                            </div>
                        </td>
                        <td>
                            <div class="form-row ">
                                <input type="text" class="form-control  shadow-lg" name="interior[0][actual]" style="height:56px">

                            </div>
                        </td>


                    </tr>
                    <tr class="datatable-row datatable-row-even">

                        <td class=" " id="increment">
                            <button type="button" class="btn btn-primary add_new" id="btn-0" onclick="appendRow(0)"><i class="fa fa-plus-circle"></i></button>
                        </td>


                    </tr>
                    @endif
                </tbody>
            </table>
        </div>
         </div>
        <!-- end table -->

        <!-- </section>

      <section class=" text-right mt-5"> -->
        @if (Auth::user()->hasRole('SuperAdmin'))
        <div class="form-group row w-100 text-right">
            <label class="col-3 col-form-label"> @lang('main.Head of the review team') :</label>
            <div class="col-9">
                <input type="text" class="form-control" placeholder="@lang('main.Head of the review team')" name="head_of_the_review" value="{{ $interior->head_of_the_review }}">
            </div>
        </div>
        <div class="form-group row w-100 text-right">
            <label for="" class="col-1 col-form-label"> @lang('main.name') :</label>
            <div class="col-4">
                <input type="text" class="form-control" placeholder="@lang('main.name')" name="name" value="{{ $interior->name }}">
            </div>
            <label for="" class="col-1 col-form-label"> @lang('main.date') :</label>
            <div class="col-4">
                <input type="date" class="form-control" name="date" value="{{ $interior->date }}">
            </div>
        </div>
        @endif
        <div style="overflow-x:auto;">
 
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>
                        <div class="" style="text-align:start ;">
                            <label for="" class=" col-form-label"> @lang('main.Company Name') :</label>

                            <input class="form-control" type="text" name="company_name" value="{{ $interior->company_name }}">
                        </div>

                    </th>
                    <th>
                        <div class="" style="text-align:start ;">
                            <label for="" class=""> @lang('main.release_date'):</label>

                            <input class="form-control" type="text" name="date2" onfocus="(this.type='date')" value="{{ $interior->date2 }}" onblur="(this.type='text')">
                        </div>

                    </th>
                    <th>
                        <div class="" style="text-align:start ;">
                            <label for="" class=" col-form-label"> @lang('main.Modification date'):</label>

                            <input class="form-control" type="text" name="date3" onfocus="(this.type='date')" value="{{ $interior->date3 }}" onblur="(this.type='text')">
                        </div>

                    </th>
                    <th>
                        <div class="" style="text-align:start ;">
                            <label> @lang('main.model_period')</label>
                            <input class="form-control shadow-lg" type="text" name="period_time" value="{{ $interior->period_time }}">
                        </div>

                    </th>
                    <th>
                        <div class="" style="text-align:start ;">
                            <label> @lang('main.page_number') </label>
                            <input class="form-control shadow-lg" type="text" name="number_page" value="{{ $interior->number_page }}">
                        </div>

                    </th>
                    <th>
                        <div class="" style="text-align:start ;">
                            <label> @lang('main.document_code') </label>
                            <input class="form-control shadow-lg" type="text" name="number_doc" value="{{ $interior->number_doc }}">
                        </div>
                    </th>
                </tr>
            </thead>
        </table>
        </div>
        @if ($interior->status == 'pending' && Auth::user()->hasRole('Employee'))
        <div class="form-group">
            <button style="border-radius:20px;margin: 50px; width:10% ; height: 5%;" type="submit" class="btn btn-primary"><i class="fas fa-save" style="width:15% ; height: 20%;">تعديل
                </i></button>
        </div>
        @elseif(($interior->status == 'inProgress' && Auth::user()->hasRole('Admin')) ||
        ($interior->status == 'pending' && Auth::user()->hasRole('Admin')))
        <div class="form-group">
            <button style="border-radius:20px;margin: 50px; width:10% ; height: 5%;" type="submit" class="btn btn-primary"><i class="fas fa-save" style="width:15% ; height: 20%;">تعديل
                </i></button>
        </div>
        @elseif(($interior->status == 'inProgress' && Auth::user()->hasRole('SuperAdmin')) ||
        ($interior->status == 'pending' && Auth::user()->hasRole('SuperAdmin')) ||
        ($interior->status == 'confirmed' && Auth::user()->hasRole('SuperAdmin')))
        <div class='row'>
            <button style="border-radius:8px;margin: 50px; width:30% ;background-color: #2a415b; ;height: 5%;padding:10px;margin-right:100px;margin:auto" type="submit" class="btn btn-primary col-md-4">
                @lang('main.edit')</button>
        </div>
        @endif
    </form>
</div>




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
