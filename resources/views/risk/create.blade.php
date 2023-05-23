@extends('layouts.master')
@section('content')
    <style>
        .shadow-lg {
            box-shadow: 0 1rem 3rem rgba(0, 0, 0, .175) !important;
        }

        th {
            padding: 10px;
        }

        .cell {
            background-color: beige;
            border-radius: 50%;
            padding: 6px;
            text-align: center;
            margin: 2px;
            color: #001635;

        }
    </style>
    <div class="card ">

        <div class='card-body '>
            <h3 style="margin-top:100px;text-shadow: 1px 1px 1px #3ed3ea;">@lang('main.Risk Management report') </h3>
            <hr>
            <form action="{{ route('risk.store') }}" method="post" enctype="multipart/form-data" id="fo1">
                {{ csrf_field() }}
                <div class="form-group row w-50 " style=''>
                    <label for="inputPassword" class="col-md-4 col-form-label" style='text-align:center'> @lang('main.Management') / @lang('main.department')
                        :</label>
                    <input type="text" class="form-control col-md-8 shadow-lg rounded" name="department"
                        >

                </div>
                <div style="overflow-x:auto;">
                    <table class=''>

                        <thead style='font-size:13px' class=''>
                            <tr class='' style=" background-color: azure;">
                                <th scope="col" rowspan="2">@lang('main.m')</th>
                                <th scope="col" rowspan="2" style='padding-left:60px;padding-right:50px'>@lang('main.activity') </th>
                                <th scope="col" rowspan="2" style='140px;padding-left:60px;padding-right:50px'>@lang('main.Risk')
                                </th>
                                <th scope="col" colspan="3" style='text-align:center;'>@lang('main.Evaluation before action taken')</th>
                                <th scope="col" rowspan="2" style='text-align:center;'>@lang('main.Actions taken')</th>
                                <th scope="col" colspan="3" style='text-align:center'>@lang('main.Post-procedure evaluation')</th>
                                <th scope="col" rowspan="2"> <span style='   '> @lang('main.acceptable/no')</span></th>
                            </tr>
                            <tr style="background-color: azure">
                                <th scope="col"><span class='cell' style='width:6%'>S</span></th>
                                <th scope="col"><span class='cell' style='width:6%'>P</span></th>
                                <th scope="col"><span class='cell' style='width:6%;margin-right: 40px;}'>R</span></th>
                                <th scope="col"><span class='cell' style='width:6%'>S</span></th>
                                <th scope="col"><span class='cell' style='width:6%'>P</span></th>
                                <th scope="col"><span class='cell' style='width:6%'>R</span></th>
                            </tr>
                        </thead>
                        <tbody style='font-size:13px'>
                            <tr  id="risk-0">
                                <th scope="col" >
                                    <button style='padding:4px' type="button" title="Remove" disabled="disabled"
                                        class="btn btn-danger btn-option">
                                        <i class="fa fa-minus-circle"></i>
                                    </button>
                                </th>
                                <th scope="col" >
                                    <div class="form-row shadow-lg">
                                        <textarea type="text" class="form-control" name="risk[0][activity]" style="height: 50px; width:150px;"></textarea>

                                    </div>
                                </th>
                                <th scope="col" >
                                    <div class="form-row shadow-lg">
                                        <textarea type="text" class="form-control" name="risk[0][risk]" style="height: 50px; width:140px;"></textarea>

                                    </div>
                                </th>
                                <th scope="col" >
                                    <div class="form-row shadow-lg">
                                        <input type="number" class="form-control" name="risk[0][s_review]"
                                            style="height: 50px; width:50px;">

                                    </div>
                                </th>
                                <th scope="col" >
                                    <div class="form-row shadow-lg">
                                        <input type="number" class="form-control" name="risk[0][p_review]"
                                            style="height: 50px; width:50px;">

                                    </div>
                                </th>
                                <th scope="col" >
                                    <div class="form-row shadow-lg">
                                        <input type="number" class="form-control" name="risk[0][r_review]"
                                            style="height: 50px; width:50px;">

                                    </div>
                                </th>
                                <th scope="col" >
                                    <div class="form-row shadow-lg">
                                        <textarea type="text" class="form-control" name="risk[0][action_taken]" style="height: 50px ;width: 150px;"></textarea>

                                    </div>
                                </th>
                                <th scope="col" >
                                    <div class="form-row shadow-lg">
                                        <input type="number" class="form-control" name="risk[0][s_procedure]"
                                            style="height: 50px; width:50px;">

                                    </div>
                                </th>
                                <th scope="col" >
                                    <div class="form-row shadow-lg">
                                        <input type="number" class="form-control" name="risk[0][p_procedure]"
                                            style="height: 50px; width:50px;">

                                    </div>
                                </th>
                                <th scope="col" >

                                    <div class="form-row shadow-lg">
                                        <input type="number" class="form-control" name="risk[0][r_procedure]"
                                            style="height: 50px; width:50px;">

                                    </div>
                                </th>
                                <th scope="col" >
                                    <div class="form-row shadow-lg">
                                        <input type="text" class="form-control" name="risk[0][status]"
                                            style="height: 50px; width:70px;">

                                    </div>
                                </th>
                            </tr>
                            <tr>
                                <td class="text-center end-td " id="increment">
                                    <button type="button" class="btn btn-primary add_new" id="btn-0"
                                    onclick="appendRow(0)"><i class="fa fa-plus-circle"></i></button>
                                </td>
                            </tr>
                        </tbody>




                    </table>
                </div>
                <section class="mt-5">
                    <div class="row">

                        <label class=" col-md-2" style='text-align:center'>@lang('main.prepare')</label>
                        <input type="text" class="form-control col-md-4 shadow-lg" name="prepare">
                    </div>
                    @if (Auth::user()->hasRole('SuperAdmin'))
                        <div class="row mt-5">
                            <label class=" col-md-2" style='text-align:center'>@lang('main.approval')</label>
                            <input type="text" class="form-control col-md-4 shadow-lg" name="approval">
                        </div>
                    @endif

                    <div class="row mt-5">

                        <label class="text-end col-md-2" style='text-align:center'>@lang('main.date')</label>
                        <input type="date" class="form-control col-md-4 shadow-lg" name="date">
                    </div>
                    @if (Auth::user()->hasRole('SuperAdmin'))
                        <div class="row mt-5">
                            <label class="text-end col-md-2" style='text-align:center'>@lang('main.Director of the Department')
                            </label>
                            <input type="text" class="form-control col-md-4 shadow-lg" name="manager_director">
                        </div>
                    @endif


                    <div class="row mt-5">


                        <label class="text-end col-md-2" style='text-align:center'>@lang('main.Department') </label>
                        <input type="text" class="form-control col-md-4 shadow-lg" name="department2"
                            placeholder="    ......">
                    </div>
                    @if (Auth::user()->hasRole('SuperAdmin'))
                        <div class="row mt-5">
                            <label class="text-end col-md-2" style='text-align:center'>@lang('main.Department') </label>

                            <input type="text" class="form-control col-md-4 shadow-lg" name="department3"
                                placeholder="  ......">
                        </div>
                    @endif
        </div>
        </section>
        <section class="p-4 my-4 shadow-lg" style='margin:auto'>

            <table class="table">
                <thead>
                    <tr>
                        <th>
                            <div class="" style="text-align:start ;">
                                <input type="text" class="form-control" name="issuance" >
                            </div>

                        </th>
                        <th>
                            <div class="" style="text-align:start ;">
                                <label>@lang('main.release_date') </label>
                                <input type="text" class="form-control" name="date2" 
                                    onfocus="(this.type='date')" onblur="(this.type='text')">

                            </div>

                        </th>

                        <th>
                            <div class="" style="text-align:start ;">
                                <label>@lang('main.model_period')</label>
                                <input type="text" class="form-control" name="period" >
                            </div>

                        </th>
                        <th>
                            <div class="" style="text-align:start ;">
                                <label>@lang('main.Modification date')</label>
                                <input class="form-control" type="text" name="date3" 
                                    onfocus="(this.type='date')" onblur="(this.type='text')">
                            </div>

                        </th>
                        <th>
                            <div class="" style="text-align:start ;">
                                <label>@lang('main.document_code')</label>
                                <input type="number" name="code" class="form-control" >
                            </div>

                        </th>

                    </tr>
                </thead>

            </table>



        </section>

        <div class="form-group" style='text-align:center'>
            <button style="border-radius:8px;margin: 50px; width:30% ;background-color: #2a415b; ;height: 11%;padding:10px"
                type="submit" class="btn btn-primary">
                <i class="fas fa-save" style="width:15% ; height: 20%;"></i>@lang('main.save')</button>
        </div>


        </form>
    </div>

    </div>














    <script>
        function appendRow(num) {
            $new_number = parseInt(num) + 1;
            $appended_text = ` <tr class="datatable-row datatable-row-even" id="risk-${$new_number}">
                                       

                <th scope="col" >
                                    <button style='padding:4px' type="button" title="Remove" onclick="removeRow(${$new_number})"
                                        class="btn btn-danger btn-option">
                                        <i class="fa fa-minus-circle"></i>
                                    </button>
                                </th>
                                <th scope="col" >
                                    <div class="form-row  shadow-lg">
                                        <textarea type="text" class="form-control" name="risk[${$new_number}][activity]" style="height: 50px; width:150px;"></textarea>

                                    </div>
                                </th>
                                <th scope="col" >
                                    <div class="form-row  shadow-lg">
                                        <textarea type="text" class="form-control" name="risk[${$new_number}][risk]" style="height: 50px; width:140px;"></textarea>

                                    </div>
                                </th>
                                <th scope="col" >
                                    <div class="form-row  shadow-lg">
                                        <input type="number" class="form-control" name="risk[${$new_number}][s_review]"
                                            style="height: 50px; width:50px;">

                                    </div>
                                </th>
                                <th scope="col" >
                                    <div class="form-row  shadow-lg">
                                        <input type="number" class="form-control" name="risk[${$new_number}][p_review]"
                                            style="height: 50px; width:50px;">

                                    </div>
                                </th>
                                <th scope="col" >
                                    <div class="form-row  shadow-lg">
                                        <input type="number" class="form-control" name="risk[${$new_number}][r_review]"
                                            style="height: 50px; width:50px;">

                                    </div>
                                </th>
                                <th scope="col" >
                                    <div class="form-row  shadow-lg">
                                        <textarea type="text" class="form-control" name="risk[${$new_number}][action_taken]" style="height: 50px ;width: 150px;"></textarea>

                                    </div>
                                </th>
                                <th scope="col" >
                                    <div class="form-row  shadow-lg">
                                        <input type="number" class="form-control" name="risk[${$new_number}][s_procedure]"
                                            style="height: 50px; width:50px;">

                                    </div>
                                </th>
                                <th scope="col" >
                                    <div class="form-row  shadow-lg">
                                        <input type="number" class="form-control" name="risk[${$new_number}][p_procedure]"
                                            style="height: 50px; width:50px;">

                                    </div>
                                </th>
                                <th scope="col" >

                                    <div class="form-row  shadow-lg">
                                        <input type="number" class="form-control" name="risk[${$new_number}][r_procedure]"
                                            style="height: 50px; width:50px;">

                                    </div>
                                </th>
                                <th scope="col" >
                                    <div class="form-row  shadow-lg">
                                        <input type="text" class="form-control" name="risk[${$new_number}][status]"
                                            style="height: 50px; width:70px;">

                                    </div>
                                </th> 
                              </tr>`;
            $($appended_text).insertAfter(`#risk-${num}`);
            if (!document.getElementById(`risk-${num}`)) {
                $($appended_text).insertAfter(`#risk-0`);
            }

            $(`#btn-${num}`).remove();
            $("#increment").append(
                `<button type="button" class="btn btn-primary add_new" id="btn-${$new_number}" onclick="appendRow(${$new_number})"><i class="fa fa-plus-circle"></i></button></td>`
            );


        }

        function removeRow(num) {
            $(`#risk-${num}`).remove();

        }
    </script>
@stop
