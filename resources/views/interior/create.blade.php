@extends('layouts.master')

@section('content')
<style>
    .shadow-lg {
        box-shadow: 0 1rem 3rem rgba(0, 0, 0, .175) !important;
    }

</style>
<div style='margin-top:85px;width:85%;margin:auto' class='row card-body'>
    <h3 style="margin-top:85px;text-shadow: 1px 1px 1px #3ed3ea;" class='mx-3'>متابعة نتائج المراجعة الداخلية </h3>
    <hr>

    <form action="{{route('interior.store')}}" method="post" enctype="multipart/form-data" id="fo1" class='col-md-12'>
        {{ csrf_field() }}


        <div class="form-group row text-right p-2">
            <label for="" \-> @lang('main.Department') :</label>
            <div class="col-md-4">
                <input type="text" class="form-control shadow-lg" placeholder="@lang('main.Department')" name="management">
            </div>
        </div>
        <!-- table -->
        <div class="form-group row text-right mt-5 ">
            <table class="table table-bordered  text-center col-md-11" style="grid-auto-flow: column;justify-content: center; align-content: center;margin:auto">



                <thead style='font-size:13px;background-color: #001635;color:white;padding:10px !important;'>
                    <tr>
                        <th scope="col" rowspan="2" style='vertical-align: middle; !important;'>@lang('main.m')</th>
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
                </tbody>
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

            </table>
        </div>
        <!-- ------------------------- -->
        @if(Auth::user()->hasRole('SuperAdmin'))
        <div class="form-group row text-center mt-5">
            <label class="col-md-3 col-form-label">@lang('main.Head of the review team'):</label>

            <input type="text" class="form-control col-md-4 shadow-lg" name="head_of_the_review">

        </div>
        <div class="form-group row text-center ">
            <label for="" class="col-md-3 col-form-label"> @lang('main.name') :</label>

            <input type="text" class="form-control col-md-4 shadow-lg" name="name">
        </div>
        <div class="form-group row text-center ">
            <label for="" class="col-md-3 col-form-label"> @lang('main.date') :</label>

            <input type="date" class="form-control col-md-4 shadow-lg" name="date">
        </div>


        @endif
        <table class="table">
            <thead>
                <tr>
                    <th>
                        <div class="" style="text-align:start ;">
                            <label>@lang('main.Company Name')</label>
                            <input class="form-control shadow-lg" type="text" name="company_name">
                        </div>

                    </th>
                    <th>
                        <div class="" style="text-align:start ;">
                            <label>@lang('main.release_date') </label>
                            <input class="form-control shadow-lg" type="text" name="date2" onfocus="(this.type='date')" onblur="(this.type='text')">
                        </div>

                    </th>
                    <th>
                        <div class="" style="text-align:start ;">
                            <label>@lang('main.Modification date')</label>
                            <input class="form-control shadow-lg" type="text" name="date3" onfocus="(this.type='date')" onblur="(this.type='text')">
                        </div>

                    </th>
                    <th>
                        <div class="" style="text-align:start ;">
                            <label>@lang('main.model_period')</label>
                            <input class="form-control shadow-lg" type="text" name="period_time">
                        </div>

                    </th>
                    <th>
                        <div class="" style="text-align:start ;">
                            <label>@lang('main.page_number')</label>
                            <input class="form-control shadow-lg" type="text" name="number_page">
                        </div>

                    </th>
                    <th>
                        <div class="" style="text-align:start ;">
                            <label>@lang('main.document_code')</label>
                            <input class="form-control shadow-lg" type="text" name="number_doc">
                        </div>
                    </th>
                </tr>
            </thead>
        </table>
        <div class='row'>
            <button style="border-radius:8px;margin: 50px; width:30% ;background-color: #2a415b; ;height: 5%;padding:10px;margin-right:100px;margin:auto" type="submit" class="btn btn-primary col-md-4">
                <i class="fas fa-save" style="width:15% ; height: 20%;"></i>@lang('main.save')</button>
        </div>
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
              <textarea type="text" class="form-control  " name="interior[${$new_number}][non_conformity]" ></textarea>

            </div>
          </td>
          <td>
            <div class="form-row ">
              <textarea type="text" class="form-control  " name="interior[${$new_number}][corrective_action]" ></textarea>

            </div>
          </td>
          <td>
            <div class="form-row ">
              <input type="number" class="form-control  " name="interior[${$new_number}][action_number]" style="height:56px">

            </div>
          </td>
          <td>
            <div class="form-row ">
              <input type="text" class="form-control  " name="interior[${$new_number}][implementation]" style="height:56px">

            </div>
          </td>
          <td>
            <div class="form-row ">
              <input type="text" class="form-control  " name="interior[${$new_number}][planned]" style="height:56px">

            </div>
          </td>
          <td>
            <div class="form-row ">
              <input type="text" class="form-control  " name="interior[${$new_number}][actual]" style="height:56px">

            </div>
          </td>
                                       
                                       
                              </tr>`;
        $($appended_text).insertAfter(`#interior-${num}`);
        if (!document.getElementById(`interior-${num}`)) {
            $($appended_text).insertAfter(`#interior-0`);
        }

        $(`#btn-${num}`).remove();
        $("#increment").append(`<button type="button" class="btn btn-primary add_new" id="btn-${$new_number}" onclick="appendRow(${$new_number})"><i class="fa fa-plus-circle"></i></button></td>`);


    }

    function removeRow(num) {
        $(`#interior-${num}`).remove();

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
        border: 1px solid black;

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
