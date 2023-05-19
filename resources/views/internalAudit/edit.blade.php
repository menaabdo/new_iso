@extends('layouts.master')

@section('content')


<div class="container mt-3 p-3">
    <h3 style="margin-top:85px;">@lang('main.List of Internal Audits')</h3>
    <hr>
    <form action="{{ route('internalAudit.update', $internalAudit->id) }}" method="post" enctype="multipart/form-data" id="fo1">
        @method('PUT')
        {{ csrf_field() }}
        <div class="form-group row w-100 text-right">

            <div style="" class="w-100 text-center my-4">
                <h2>@lang('main.List of Internal Audits') </h2>
                <hr class="w-100" style="align:center">
            </div>
            <label for="" class="col-1 col-form-label"> @lang('main.date')  :</label>
            <div class="col-4">
                <input type="date" name="date1" class="form-control" placeholder="  ......" value="{{ $internalAudit->date1 }}">
            </div>
            <label for="" class="col-2 col-form-label"> @lang('main.Referenced Authority') :</label>
            <div class="col-4">
                <input type="text" class="form-control" name="referenced_authority" placeholder="الجهة المراجع عليها  ......" id="" value="{{ $internalAudit->referenced_authority }}">
            </div>
        </div>
        <div class="form-group row w-100 text-right">

            <label for="" class="col-2 col-form-label"> @lang('main.Reference Documents') :</label>
            <div class="col-4">
                <input type="text" class="form-control" name="reference_documents" value="{{ $internalAudit->reference_documents }}" placeholder="الوثائق المرجعية:   ......" id="">
            </div>
        </div>
        <section class="my-5 table-bordered">
            <table class="table table-bordered w-100 text-center " style="grid-auto-flow: column;justify-content: center; align-content: center;">
                <thead>
                    <tr style="background-color:lightgreen">
                        @if ($internalAudit->status == 'pending' && Auth::user()->hasRole('Employee'))
                        <th scope="col" rowspan="2" data-field="" class="datatable-cell  end-cell text-center">
                            <span>@lang('main.m')</span>
                        </th>
                        @endif
                        @if (($internalAudit->status == 'inProgress' && Auth::user()->hasRole('Admin')) ||
                        ($internalAudit->status == 'pending' && Auth::user()->hasRole('Admin')))
                        <th scope="col" rowspan="2" data-field="" class="datatable-cell  end-cell text-center">
                            <span>@lang('main.m')</span>
                        </th>
                        @endif
                        @if (($internalAudit->status == 'inProgress' && Auth::user()->hasRole('SuperAdmin')) ||
                        ($internalAudit->status == 'pending' && Auth::user()->hasRole('SuperAdmin')) ||
                        ($internalAudit->status == 'confirmed' && Auth::user()->hasRole('SuperAdmin')))
                        <th scope="col" rowspan="2" data-field="" class="datatable-cell  end-cell text-center">
                            <span>@lang('main.m')</span>
                        </th>
                        @endif
                        <th scope="col" rowspan="2">@lang('main.Review questions') </th>
                        <th scope="col" colspan="2">@lang('main.verification results')</th>
                        <th scope="col" rowspan="2">@lang('main.Thematic guide')</th>
                    </tr>
                    <tr style="background-color:lightgreen">
                        <th scope="col"> @lang('main.identical')</th>
                        <th scope="col">@lang('main.notidentical')</th>
                    </tr>
                </thead>
                <tbody>
                    @if (count($internalAudit->internalAudit) > 0)
                    @foreach ($internalAudit->internalAudit as $key => $intr)
                    <tr id="internalAudit-{{ $key }}">
                        @if ($internalAudit->status == 'pending' && Auth::user()->hasRole('Employee'))
                        <td class="text-center end-td ">
                            <button type="button" title="Remove" onclick="removeRow({{ $key }},{{ $intr->id }})" @if ($key==0) disabled="disabled" @endif class="btn btn-danger btn-option">
                                <i class="fa fa-minus-circle"></i>
                            </button>
                        </td>
                        @endif
                        @if (($internalAudit->status == 'inProgress' && Auth::user()->hasRole('Admin')) ||
                        ($internalAudit->status == 'pending' && Auth::user()->hasRole('Admin')))
                        <td class="text-center end-td ">
                            <button type="button" title="Remove" onclick="removeRow({{ $key }},{{ $intr->id }})" @if ($key==0) disabled="disabled" @endif class="btn btn-danger btn-option">
                                <i class="fa fa-minus-circle"></i>
                            </button>
                        </td>
                        @endif
                        @if (($internalAudit->status == 'inProgress' && Auth::user()->hasRole('SuperAdmin')) ||
                        ($internalAudit->status == 'pending' && Auth::user()->hasRole('SuperAdmin')) ||
                        ($internalAudit->status == 'confirmed' && Auth::user()->hasRole('SuperAdmin')))
                        <td class="text-center end-td ">
                            <button type="button" title="Remove" onclick="removeRow({{ $key }},{{ $intr->id }})" @if ($key==0) disabled="disabled" @endif class="btn btn-danger btn-option">
                                <i class="fa fa-minus-circle"></i>
                            </button>
                        </td>
                        @endif
                        <td>
                            <div class="form-row ">
                                <textarea type="text" class="form-control w-100 " name="internalAudit[{{ $key }}][review_question]">{{ $intr->review_question }}</textarea>
                            </div>
                        </td>
                        <td>
                            <div class="form-row ">
                                <textarea type="text" class="form-control w-100 " name="internalAudit[{{ $key }}][identical]"> {{ $intr->identical }}</textarea>
                            </div>
                        </td>
                        <td>
                            <div class="form-row ">
                                <textarea type="text" class="form-control w-100 " name="internalAudit[{{ $key }}][not_identical]"> {{ $intr->not_identical }}</textarea>
                            </div>
                        </td>
                        <td>
                            <div class="form-row ">
                                <textarea type="text" class="form-control w-100 " name="internalAudit[{{ $key }}][objective_evidence]"> {{ $intr->objective_evidence }}</textarea>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                    @if ($internalAudit->status == 'pending' && Auth::user()->hasRole('Employee'))
                    <tr class="datatable-row datatable-row-even">

                        <td class="text-center end-td " id="increment">
                            <button type="button" class="btn btn-primary add_new" id="btn-{{ count($internalAudit->internalAudit) - 1 }}" onclick="appendRow({{ count($internalAudit->internalAudit) - 1 }})"><i class="fa fa-plus-circle"></i></button>
                        </td>
                    </tr>
                    @endif
                    @if (($internalAudit->status == 'inProgress' && Auth::user()->hasRole('Admin')) ||
                    ($internalAudit->status == 'pending' && Auth::user()->hasRole('Admin')))
                    <tr class="datatable-row datatable-row-even">

                        <td class="text-center end-td " id="increment">
                            <button type="button" class="btn btn-primary add_new" id="btn-{{ count($internalAudit->internalAudit) - 1 }}" onclick="appendRow({{ count($internalAudit->internalAudit) - 1 }})"><i class="fa fa-plus-circle"></i></button>
                        </td>
                    </tr>
                    @endif
                    @if (($internalAudit->status == 'inProgress' && Auth::user()->hasRole('SuperAdmin')) ||
                    ($internalAudit->status == 'pending' && Auth::user()->hasRole('SuperAdmin')) ||
                    ($internalAudit->status == 'confirmed' && Auth::user()->hasRole('SuperAdmin')))
                    <tr class="datatable-row datatable-row-even">

                        <td class="text-center end-td " id="increment">
                            <button type="button" class="btn btn-primary add_new" id="btn-{{ count($internalAudit->internalAudit) - 1 }}" onclick="appendRow({{ count($internalAudit->internalAudit) - 1 }})"><i class="fa fa-plus-circle"></i></button>
                        </td>
                    </tr>
                    @endif
                    @else
                    <tr id="internalAudit-0">
                        <td class="text-center end-td ">
                            <button type="button" title="Remove" disabled="disabled" class="btn btn-danger btn-option">
                                <i class="fa fa-minus-circle"></i>
                            </button>
                        </td>
                        <td>
                            <div class="form-row ">
                                <textarea type="text" class="form-control w-100 " name="internalAudit[0][review_question]"></textarea>
                            </div>
                        </td>
                        <td>
                            <div class="form-row ">
                                <textarea type="text" class="form-control w-100 " name="internalAudit[0][identical]"></textarea>
                            </div>
                        </td>
                        <td>
                            <div class="form-row ">
                                <textarea type="text" class="form-control w-100 " name="internalAudit[0][not_identical]"></textarea>
                            </div>
                        </td>
                        <td>
                            <div class="form-row ">
                                <textarea type="text" class="form-control w-100 " name="internalAudit[0][objective_evidence]"></textarea>
                            </div>
                        </td>
                    </tr>
                    <tr class="datatable-row datatable-row-even">
                        <td class="text-center end-td " id="increment">
                            <button type="button" class="btn btn-primary add_new" id="btn-0" onclick="appendRow(0)"><i class="fa fa-plus-circle"></i></button>
                        </td>
                    </tr>
                    @endif
                </tbody>
            </table>
            @if (Auth::user()->hasRole('Employee'))
            <div class="form-group row w-100 text-right">
                <label for="" class="col-1 col-form-label"> @lang('main.References name') :</label>
                <div class="col-3">
                    <input type="text" class="form-control" value="{{ $internalAudit->reference_name }}" name="reference_name" placeholder="@lang('main.References name')  ......" id="">
                </div>
                <label for="" class="col-1 col-form-label"> @lang('main.job') :</label>
                <div class="col-3">
                    <input type="text" class="form-control" name="job" value="{{ $internalAudit->job }}" placeholder="@lang('main.job')  ......" id="">
                </div>
            </div>
            @endif

            @if (($internalAudit->status == 'inProgress' && Auth::user()->hasRole('Employee')) ||
            ($internalAudit->status == 'confirmed' && Auth::user()->hasRole('Employee')))
            <div class="form-group row w-100 text-right">
                <label for="" class="col-1 col-form-label"> @lang('main.Quality Manager Name') :</label>
                <div class="col-3">
                    <input type="text" class="form-control" readonly name="quality_manager_name" value="{{ $internalAudit->quality_manager_name }}" placeholder="@lang('main.Quality Manager Name')  ......" id="">
                </div>
            </div>
            @endif


            @if (Auth::user()->hasRole('Admin'))
            <div class="form-group row w-100 text-right">
                <label for="" class="col-1 col-form-label"> @lang('main.References name') :</label>
                <div class="col-3">
                    <input type="text" class="form-control" value="{{ $internalAudit->reference_name }}" name="reference_name" placeholder="@lang('main.References name')  ......" id="">
                </div>
                <label for="" class="col-1 col-form-label"> @lang('main.job') :</label>
                <div class="col-3">
                    <input type="text" class="form-control" name="job" value="{{ $internalAudit->job }}" placeholder="@lang('main.job')  ......" id="">
                </div>
            </div>
            @endif
            @if (($internalAudit->status == 'pending' && Auth::user()->hasRole('Admin')) ||
            ($internalAudit->status == 'inProgress' && Auth::user()->hasRole('Admin')))
            <div class="form-group row w-100 text-right">
                <label for="" class="col-1 col-form-label"> @lang('main.Quality Manager Name') :</label>
                <div class="col-3">
                    <input type="text" class="form-control" name="quality_manager_name" value="{{ $internalAudit->quality_manager_name }}" placeholder="@lang('main.Quality Manager Name')  ......" id="">
                </div>
            </div>
            @endif

            @if ($internalAudit->status == 'confirmed' && Auth::user()->hasRole('Admin'))
            <div class="form-group row w-100 text-right">
                <label for="" class="col-1 col-form-label"> @lang('main.Quality Manager Name') :</label>
                <div class="col-3">
                    <input type="text" class="form-control" readonly name="quality_manager_name" value="{{ $internalAudit->quality_manager_name }}" placeholder="@lang('main.Quality Manager Name')  ......" id="">
                </div>
            </div>
            @endif
            @if (Auth::user()->hasRole('SuperAdmin'))
            <div class="form-group row w-100 text-right">
                <label for="" class="col-1 col-form-label"> @lang('main.References name') :</label>
                <div class="col-3">
                    <input type="text" class="form-control" value="{{ $internalAudit->reference_name }}" name="reference_name" placeholder="@lang('main.References name')  ......" id="">
                </div>
                <label for="" class="col-1 col-form-label"> @lang('main.job') :</label>
                <div class="col-3">
                    <input type="text" class="form-control" name="job" value="{{ $internalAudit->job }}" placeholder="@lang('main.job')  ......" id="">
                </div>
            </div>
            <div class="form-group row w-100 text-right">
                <label for="" class="col-1 col-form-label"> @lang('main.Quality Manager Name') :</label>
                <div class="col-3">
                    <input type="text" class="form-control" name="quality_manager_name" value="{{ $internalAudit->quality_manager_name }}" placeholder="@lang('main.Quality Manager Name')  ......" id="">
                </div>
            </div>
            @endif
        </section>

        <table class="table table-bordered">
            <thead>
                <th>
                    <div class="" style="text-align:start ;">
                        <label>@lang('main.Company Name')</label>
                        <input class="form-control" type="text" name="company_name" value="{{ $internalAudit->company_name }}" placeholder="اسم الشركة  :">
                    </div>

                </th>
                <th>
                    <div class="" style="text-align:start ;">
                        <label>@lang('main.release_date') </label>
                        <input class="form-control" type="text" name="date2" value="{{ $internalAudit->date2 }}" placeholder="تاريخ الإصدار   :" onfocus="(this.type='date')" onblur="(this.type='text')">
                    </div>

                </th>
                <th>

                    <div class="" style="text-align:start ;">
                        <label>@lang('main.Modification date')</label>
                        <input class="form-control" type="text" name="date3" placeholder="تاريخ ال@lang('main.edit')   :" onfocus="(this.type='date')" onblur="(this.type='text')" value="{{ $internalAudit->date3 }}">
                    </div>
                </th>
                <th>
                    <div class="" style="text-align:start ;">
                        <label>@lang('main.model_period')</label>
                        <input class="form-control shadow-lg" type="text" name="period_time" value="{{ $internalAudit->period_time }}">
                    </div>

                </th>
                <th>
                    <div class="" style="text-align:start ;">
                        <label>@lang('main.page_number')</label>
                        <input class="form-control shadow-lg" type="text" name="number_page" value="{{ $internalAudit->number_page }}">
                    </div>

                </th>
                <th>
                    <div class="" style="text-align:start ;">
                        <label>@lang('main.document_code')</label>
                        <input class="form-control shadow-lg" type="text" name="number_doc" value="{{ $internalAudit->number_doc }}">
                    </div>
                </th>
                </tr>
            </thead>
        </table>
        @if ($internalAudit->status == 'pending' && Auth::user()->hasRole('Employee'))
        <div class="form-group">
            <button style="border-radius:20px;margin: 50px; width:10% ; height: 5%;" type="submit" class="btn btn-primary"><i class="fas fa-save" style="width:15% ; height: 20%;">@lang('main.edit')
                </i></button>
        </div>
        @elseif(($internalAudit->status == 'inProgress' && Auth::user()->hasRole('Admin')) ||
        ($internalAudit->status == 'pending' && Auth::user()->hasRole('Admin')))
        <div class="form-group">
            <button style="border-radius:20px;margin: 50px; width:10% ; height: 5%;" type="submit" class="btn btn-primary"><i class="fas fa-save" style="width:15% ; height: 20%;">@lang('main.edit')
                </i></button>
        </div>
        @elseif(($internalAudit->status == 'inProgress' && Auth::user()->hasRole('SuperAdmin')) ||
        ($internalAudit->status == 'pending' && Auth::user()->hasRole('SuperAdmin')) ||
        ($internalAudit->status == 'confirmed' && Auth::user()->hasRole('SuperAdmin')))
        <div class="form-group">
            <button style="border-radius:20px;margin: 50px; width:10% ; height: 5%;" type="submit" class="btn btn-primary"><i class="fas fa-save" style="width:15% ; height: 20%;">@lang('main.edit')
                </i></button>
        </div>
        @endif

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

    function removeRow(num, id) {
        if (id != 0) {
            $("#internalAudit-0").append(`<input type="hidden" name="ids[${num}]" value="${id}">`);
        }
        $(`#internalAudit-${num}`).remove();
    }

</script>
@stop
