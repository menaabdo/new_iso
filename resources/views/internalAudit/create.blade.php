@extends('layouts.master')
@section('content')
<style>
    .shadow-lg {
        box-shadow: 0 1rem 3rem rgba(0, 0, 0, .175) !important;
    }

    th {
        vertical-align: middle !important;
    }

</style>
<div class="container mt-3 p-3 card row">

    <form action="{{ route('internalAudit.store') }}" method="post" enctype="multipart/form-data" class='col-md-12' id="fo1">
        {{ csrf_field() }}
        <div class="form-group row w-100 text-right">

            <div style="" class="w-100 text-center my-4">
                <h2 style='text-shadow: 1px 1px 1px #3ed3ea;'>@lang('main.List of Internal Audits') </h2>
                <hr class="w-100" style="align:center">
            </div>
            <label for="" class="col-md-4 col-form-label ml-1"> @lang('main.date') :</label>
            <div class="col-md-4">
                <input type="date" name="date1" class="ml-5 form-control shadow-lg">
            </div>

            <label for="" class="col-md-4 col-form-label mr-1 mt-3">@lang('main.Referenced Authority'):</label>
            <div class="col-md-4 mt-3">
                <input type="text" class="form-control shadow-lg" name="referenced_authority" id="">

            </div>
        </div>
        <div class="form-group row w-100 text-right">

            <label for="" class="col-md-4 col-form-label">@lang('main.Reference Documents'):</label>
            <div class="col-md-4">
                <input type="text" class="form-control" name="reference_documents" id="">
            </div>
        </div>
        <section class="my-5 row" style='margin-right:100px'>
            <table class="table table-bordered  text-center col-md-10" style=";grid-auto-flow: column;justify-content: center; align-content: center;">
                <thead>
                    <tr style="background-color:#001635 ;color:white">
                        <th scope="col" rowspan="2">@lang('main.m')</th>
                        <th scope="col" rowspan="2">@lang('main.Review questions') </th>
                        <th scope="col" colspan="2">@lang('main.verification results')</th>
                        <th scope="col" rowspan="2">@lang('main.Thematic guide')</th>
                    </tr>
                    <tr style="background-color:#001635 ;color:white">
                        <th scope="col"> @lang('main.identical')</th>
                        <th scope="col">@lang('main.notidentical')</th>
                    </tr>
                </thead>
                <tbody>
                    <tr id="internalAudit-0">
                        <td class="text-center end-td ">
                            <button type="button" title="Remove" disabled="disabled" class="btn btn-danger btn-option">
                                <i class="fa fa-minus-circle"></i>
                            </button>
                        </td>
                        <td>
                            <div class="form-row ">
                                <textarea type="text" class="form-control w-100 shadow-lg" name="internalAudit[0][review_question]"></textarea>
                            </div>
                        </td>
                        <td>
                            <div class="form-row ">
                                <textarea type="text" class="form-control w-100 shadow-lg" name="internalAudit[0][identical]"></textarea>
                            </div>
                        </td>
                        <td>
                            <div class="form-row ">
                                <textarea type="text" class="form-control w-100 shadow-lg" name="internalAudit[0][not_identical]"></textarea>
                            </div>
                        </td>
                        <td>
                            <div class="form-row ">
                                <textarea type="text" class="form-control w-100 shadow-lg" name="internalAudit[0][objective_evidence]"></textarea>
                            </div>
                        </td>
                    </tr>
                    <tr class="datatable-row datatable-row-even">

                        <td class="text-center end-td " id="increment">
                            <button type="button" class="btn btn-primary add_new" id="btn-0" onclick="appendRow(0)"><i class="fa fa-plus-circle"></i></button>
                        </td>


                    </tr>

                </tbody>
            </table>
            @if (Auth::user()->hasRole('Employee'))
            <div class="form-group row w-100 text-right">
                <label for="" class="col-md-4 col-form-label"> @lang('main.References name') :</label>
                <div class="col-md-3">
                    <input type="text" class="form-control shadow-lg" name="reference_name" placeholder="إسم المراجع  ......" id="">
                </div>
                <label for="" class="col-1 col-form-label"> @lang('main.job') :</label>
                <div class="col-3">
                    <input type="text" class="form-control" name="job" placeholder="@lang('main.job')  ......" id="">
                </div>
            </div>
            @endif
            @if (Auth::user()->hasRole('Admin'))
            <div class="form-group row w-100 text-right">
                <label for="" class="col-md-4 col-form-label">@lang('main.References name'):</label>
                <div class="col-3">
                    <input type="text" class="form-control" name="reference_name" placeholder="إسم المراجع  ......" id="">
                </div>
                <label for="" class="col-1 col-form-label"> @lang('main.job') :</label>
                <div class="col-3">
                    <input type="text" class="form-control" name="job" placeholder="@lang('main.job')  ......" id="">
                </div>
            </div>
            <div class="form-group row w-100 text-right">
                <label for="" class="col-1 col-form-label"> @lang('main.Quality Manager Name') :</label>
                <div class="col-3">
                    <input type="text" class="form-control" name="quality_manager_name" placeholder="مدير الجودة الإسم  ......" id="">
                </div>
            </div>
            @endif
            @if (Auth::user()->hasRole('SuperAdmin'))
            <div class="form-group row w-100 text-right">
                <label for="" class="col-md-2 col-form-label">@lang('main.References name'):</label>
                <div class="col-3">
                    <input type="text" class="form-control shadow-lg" name="reference_name" id="">
                </div>
                <label for="" class="col-md-2 col-form-label"> @lang('main.job') :</label>
                <div class="col-md-3">
                    <input type="text" class="form-control shadow-lg" name="job" id="">
                </div>
            </div>
            <div class="form-group row w-100 text-right">
                <label for="" class="col-md-2 col-form-label">@lang('main.Quality Manager Name') :</label>
                <div class="col-md-3">
                    <input type="text" class="form-control shadow-lg" name="quality_manager_name" id="">
                </div>
            </div>
            @endif
        </section>
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
</div>
</form>
</div>
<script>
    function appendRow(num) {
        $new_number = parseInt(num) + 1;
        $appended_text = ` <tr class="datatable-row datatable-row-even" id="internalAudit-${$new_number}">
                                         
                                          <td class="text-center end-td ">
                                                    <button type="button" title="Remove" onclick="removeRow(${$new_number})"
                                                              class="btn btn-danger btn-option">
                                                              <i class="fa fa-minus-circle"></i>
                                                    </button>
                                          </td>
                                         
                                          <td>
                    <div class="form-row ">
                        <textarea type="text" class="form-control w-100 " name="internalAudit[${$new_number}][review_question]"></textarea>
                    </div>
                </td>
                <td>
                    <div class="form-row ">
                        <textarea type="text" class="form-control w-100 " name="internalAudit[${$new_number}][identical]"></textarea>
                    </div>
                </td>
                <td>
                    <div class="form-row ">
                        <textarea type="text" class="form-control w-100 " name="internalAudit[${$new_number}][not_identical]"></textarea>
                    </div>
                </td>
                <td>
                    <div class="form-row ">
                        <textarea type="text" class="form-control w-100 " name="internalAudit[${$new_number}][objective_evidence]"></textarea>
                    </div>
                </td>           
                                </tr>`;
        $($appended_text).insertAfter(`#internalAudit-${num}`);
        if (!document.getElementById(`internalAudit-${num}`)) {
            $($appended_text).insertAfter(`#internalAudit-0`);
        }

        $(`#btn-${num}`).remove();
        $("#increment").append(
            `<button type="button" class="btn btn-primary add_new" id="btn-${$new_number}" onclick="appendRow(${$new_number})"><i class="fa fa-plus-circle"></i></button></td>`
        );
    }

    function removeRow(num) {
        $(`#internalAudit-${num}`).remove();
    }

</script>
@stop
