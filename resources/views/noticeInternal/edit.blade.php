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



   

        <form action="{{ route('noticeInternal.update', $notice->id) }}" method="post" enctype="multipart/form-data"
            id="fo1" class='col-md-11' style='margin:auto'>
            @method('PUT')
            {{ csrf_field() }}
            <div style="" class="w-100 text-center my-4">
            <h2 style='text-shadow: 1px 1px 1px #3ed3ea;'>إخطار بمراجعة داخلية</h2>
            <hr class="w-50">
        </div>
            <div class="container-fluid p-2" style="border: 2px solid rgb(250, 90, 15);">
                <div class="form-group row w-100 text-right">
                    <label for="" class="col-1 col-form-label">@lang('main.to') :</label>
                    <div class="col-3">
                        <input type="text" class="form-control" name="to" value="{{ $notice->to }}">
                    </div>
                    <label for="" class="col-1 col-form-label">@lang('main.Revision Number') :</label>
                    <div class="col-3">
                        <input type="text" class="form-control" name="revision_number"
                            value="{{ $notice->revision_number }}">
                    </div>
                    <label for="" class="col-1 col-form-label"> @lang('main.date') :</label>
                    <div class="col-3">
                        <input type="date" class="form-control" name="date"
                            value="{{ $notice->date }}" id="">
                    </div>
                    <label for="" class="col-1 col-form-label">@lang('main.from') :</label>
                    <div class="col-2">
                        <input type="text" class="form-control" name="from" value="{{ $notice->from }}">
                    </div>
                    <label for="" class="col-2 col-form-label">@lang('main.Place Review') :</label>
                    <div class="col-2">
                        <input type="text" class="form-control" name="place_review" value="{{ $notice->place_review }}">
                    </div>
                    <label for="" class="col-2 col-form-label">@lang('main.time') :</label>
                    <div class="col-3">
                        <input type="text" class="form-control" name="time" value="{{ $notice->time }}">
                    </div>
                </div>

                <hr size="20" color="red">
                <div class="form-group row w-100 text-right">
                    <h8 for="" class="col-4 col-form-label">@lang('main.We inform you that the internal audit will be carried out on the audit') :</h8>
                    <div class="col-3">
                        <input type="text" class="form-control" placeholder="  ......" name="implementation_review"
                            value="{{ $notice->implementation_review }}">

                    </div>
                    <p>@lang('main.This is to ensure the application of systems and study their effectiveness according to the following'): </p>


                </div>
                <div class="form-group row w-100 text-right">
                    <label for="" class="col-1 col-form-label">@lang('main.review') :</label>
                    <div class="col-10">
                        <textarea type="text" class="form-control" name="review"placeholder=" @lang('main.review') ......">{{ $notice->review }}</textarea>
                    </div>
                </div>
                <hr size="20" color="red">
                <div class="form-group row w-100 text-right">
                    <label for="" class="col-2 col-form-label">@lang('main.references_used') :</label>
                    <div class="col-10">
                        <textarea type="text" class="form-control" name="references_used" placeholder="@lang('main.references_used') ......"> {{ $notice->references_used }}</textarea>
                    </div>
                </div>
                <hr size="20" color="red">
                <div class="form-group row w-100 text-right">
                    <label for="" class="col-2 col-form-label">@lang('main.references_team') :</label>
                </div>
                <div class="form-group row w-10 text-center">
                    <label for="" class="col-1 col-form-label">1 -</label>
                    <div class="col-3">
                        <input type="text" class="form-control" placeholder="  ......" name="team_1"
                            value="{{ $notice->team_1 }}">
                    </div>
                    <label for="" class="col-1 col-form-label">2 -</label>
                    <div class="col-3">
                        <input type="text" class="form-control" placeholder="  ......" name="team_2"
                            value="{{ $notice->team_2 }}">
                    </div>
                </div>
                <hr size="20" color="red">
                <div class="form-group row w-100 text-right">
                    <h6 for="" class="col-10 col-form-label"> * @lang('main.notes'):</h6>
                </div>
                <hr size="20" color="red">
                <table class="table">
                    <thead>
                        <tr>
                            @if ($notice->status == 'inProgress' && Auth::user()->hasRole('Employee'))
                                <th class=" w-50 text-center col-2 ">
                                    <div class="" style="text-align:center ;">
                                        <label for="" class=""
                                            style="font-size:large;font-weight: bolder;">@lang('main.prepare')  (@lang('main.quality manager')) :</label>
                                    </div>
                                    <div class="form-group row w-10 text-center">
                                        <label for="" class="col-1 col-form-label">@lang('main.name')  </label>
                                        <div class="col-4">
                                            <input type="text" class="form-control" placeholder="  ......"
                                                name="name_1" value="{{ $notice->name_1 }}" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group row w-10 text-right">
                                        <label for="" class="col-1 col-form-label">@lang('main.date'): -</label>
                                        <div class="col-7">
                                            <input type="date" class="form-control" placeholder="  ......"
                                                name="date_4" value="{{ $notice->date_4 }}" readonly>
                                        </div>
                                    </div>
                                </th>
                            @endif
                            @if ($notice->status == 'confirmed' && Auth::user()->hasRole('Employee'))
                            <th class=" w-50 text-center col-2 ">
                                <div class="" style="text-align:center ;">
                                    <label for="" class=""
                                        style="font-size:large;font-weight: bolder;">@lang('main.prepare')  (@lang('main.quality manager')) :</label>
                                </div>
                                <div class="form-group row w-10 text-center">
                                    <label for="" class="col-1 col-form-label">@lang('main.name')  </label>
                                    <div class="col-4">
                                        <input type="text" class="form-control" placeholder="  ......"
                                            name="name_1" value="{{ $notice->name_1 }}" readonly>
                                    </div>
                                </div>
                                <div class="form-group row w-10 text-right">
                                    <label for="" class="col-1 col-form-label">@lang('main.date'): -</label>
                                    <div class="col-7">
                                        <input type="date" class="form-control" placeholder="  ......"
                                            name="date_4" value="{{ $notice->date_4 }}" readonly>
                                    </div>
                                </div>
                            </th>
                                <th class=" w-50 text-center col-2 ">
                                    <div class="" style="text-align:center ;">
                                        <label for="" class=""
                                            style="text-align:center;font-size:large;font-weight: bolder;">@lang('main.approval')  (@lang('main.General Director')):</label>
                                    </div>
                                    <div class="form-group row w-10 text-center">
                                        <label for="" class="col-1 col-form-label">@lang('main.name')  </label>
                                        <div class="col-4">
                                            <input type="text" class="form-control" placeholder="  ......"
                                                name="name_2" value="{{ $notice->name_2 }}" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group row w-10 text-right">
                                        <label for="" class="col-1 col-form-label">@lang('main.date'): -</label>
                                        <div class="col-7">
                                            <input type="date" class="form-control" placeholder="  ......"
                                                name="date_5" value="{{ $notice->date_5 }}" readonly>
                                        </div>
                                    </div>
                                </th>
                            @endif
                            @if (Auth::user()->hasRole('Admin'))
                                <th class=" w-50 text-center col-2 ">
                                    <div class="" style="text-align:center ;">
                                        <label for="" class=""
                                            style="font-size:large;font-weight: bolder;">@lang('main.prepare')  (@lang('main.quality manager')) :</label>
                                    </div>
                                    <div class="form-group row w-10 text-center">
                                        <label for="" class="col-1 col-form-label">@lang('main.name')  </label>
                                        <div class="col-4">
                                            <input type="text" class="form-control" placeholder="  ......"
                                                name="name_1" value="{{ $notice->name_1 }}">
                                        </div>
                                    </div>
                                    <div class="form-group row w-10 text-right">
                                        <label for="" class="col-1 col-form-label">@lang('main.date'): -</label>
                                        <div class="col-7">
                                            <input type="date" class="form-control" placeholder="  ......"
                                                name="date_4" value="{{ $notice->date_4 }}">
                                        </div>
                                    </div>
                                </th>
                                @if ($notice->status == 'confirmed' && Auth::user()->hasRole('Admin'))
                                    <th class=" w-50 text-center col-2 ">
                                        <div class="" style="text-align:center ;">
                                            <label for="" class=""
                                                style="text-align:center;font-size:large;font-weight: bolder;">@lang('main.approval')  (@lang('main.General Director')):</label>
                                        </div>
                                        <div class="form-group row w-10 text-center">
                                            <label for="" class="col-1 col-form-label">@lang('main.name')  </label>
                                            <div class="col-4">
                                                <input type="text" class="form-control" placeholder="  ......"
                                                    name="name_2" value="{{ $notice->name_2 }}" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group row w-10 text-right">
                                            <label for="" class="col-1 col-form-label">@lang('main.date'): -</label>
                                            <div class="col-7">
                                                <input type="date" class="form-control" placeholder="  ......"
                                                    name="date_5" value="{{ $notice->date_5 }}" readonly>
                                            </div>
                                        </div>
                                    </th>
                                @endif
                            @endif
                            @if (Auth::user()->hasRole('SuperAdmin'))
                                <th class=" w-50 text-center col-2 ">
                                    <div class="" style="text-align:center ;">
                                        <label for="" class=""
                                            style="font-size:large;font-weight: bolder;">@lang('main.prepare')  (@lang('main.quality manager')) :</label>
                                    </div>
                                    <div class="form-group row w-10 text-center">
                                        <label for="" class="col-1 col-form-label">@lang('main.name')  </label>
                                        <div class="col-4">
                                            <input type="text" class="form-control" placeholder="  ......"
                                                name="name_1" value="{{ $notice->name_1 }}">
                                        </div>
                                    </div>
                                    <div class="form-group row w-10 text-right">
                                        <label for="" class="col-1 col-form-label">@lang('main.date'): -</label>
                                        <div class="col-7">
                                            <input type="date" class="form-control" placeholder="  ......"
                                                name="date_4" value="{{ $notice->date_4 }}">
                                        </div>
                                    </div>
                                </th>
                                <th class=" w-50 text-center col-2 ">
                                    <div class="" style="text-align:center ;">
                                        <label for="" class=""
                                            style="text-align:center;font-size:large;font-weight: bolder;">@lang('main.approval')  (@lang('main.General Director')):</label>
                                    </div>
                                    <div class="form-group row w-10 text-center">
                                        <label for="" class="col-1 col-form-label">@lang('main.name')  </label>
                                        <div class="col-4">
                                            <input type="text" class="form-control" placeholder="  ......"
                                                name="name_2" value="{{ $notice->name_2 }}">
                                        </div>
                                    </div>
                                    <div class="form-group row w-10 text-right">
                                        <label for="" class="col-1 col-form-label">@lang('main.date'): -</label>
                                        <div class="col-7">
                                            <input type="date" class="form-control" placeholder="  ......"
                                                name="date_5" value="{{ $notice->date_5 }}">
                                        </div>
                                    </div>
                                </th>
                            @endif
                        </tr>
                    </thead>
                </table>
                <hr size="20" color="red">
                <table class="table">
                    <thead>
                        <tr>
                            <th class=" w-50 text-center col-2 ">
                                <div class="" style="text-align:center ;">
                                    <label for="" class=""
                                        style="text-align:center;font-size:large;font-weight: bolder;">@lang('main.The referenced party to sign for receipt') :</label>
                                </div>
                                <div class="form-group row w-10 text-center">
                                    <label for="" class="col-1 col-form-label">@lang('main.name')  </label>
                                    <div class="col-4">
                                        <input type="text" class="form-control" placeholder="  ......" name="name_3"
                                            value="{{ $notice->name_3 }}">
                                    </div>


                                    <label for="" class="col-1 col-form-label">@lang('main.job')  </label>
                                    <div class="col-4">
                                        <input type="text" class="form-control" placeholder="  ......" name="job"
                                            value="{{ $notice->job }}">
                                    </div>
                                </div>
                                <div class="form-group row w-10 text-right">
                                    <label for="" class="col-1 col-form-label">@lang('main.date'): -</label>
                                    <div class="col-7">
                                        <input type="date" class="form-control" placeholder="  ......" name="date_6"
                                            value="{{ $notice->date_6 }}">
                                    </div>
                                </div>
                            </th>
                            <th class=" w-50 text-center col-2 ">
                                <div class="" style="text-align:center ;">
                                    <label for="" class=""
                                        style="text-align:center;font-size:large;font-weight: bolder;">@lang('main.The referenced party to sign the approval of the planned date'):</label>
                                </div>
                                <div class="form-group row w-10 text-center">
                                    <label for="" class="col-1 col-form-label">@lang('main.name')  </label>
                                    <div class="col-4">
                                        <input type="text" class="form-control" placeholder="  ......" name="name_4"
                                            value="{{ $notice->name_4 }}">
                                    </div>


                                    <label for="" class="col-1 col-form-label">@lang('main.job')  </label>
                                    <div class="col-4">
                                        <input type="text" class="form-control" placeholder="  ......" name="job_2"
                                            value="{{ $notice->job_2 }}">
                                    </div>
                                </div>
                                <div class="form-group row w-10 text-right">
                                    <label for="" class="col-3 col-form-label">@lang('main.Proposed review date')</label>
                                    <div class="col-4">
                                        <input type="date" class="form-control" placeholder="  ......" name="date_7"
                                            value="{{ $notice->date_7 }}">
                                    </div>
                                </div>
                            </th>
                        </tr>
                    </thead>
                </table>
            </div>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>
                            <div class="" style="text-align:start ;">
                                <label>@lang('main.Company Name')</label>
                                <input class="form-control" type="text" name="company_name"
                                    placeholder="اسم الشركة  :" value="{{ $notice->company_name }}">
                            </div>

                        </th>
                        <th>
                            <div class="" style="text-align:start ;">
                                <label>@lang('main.release_date') </label>
                                <input class="form-control" type="text" name="date2"
                                    placeholder="تاريخ الإصدار   :" value="{{ $notice->date2 }}"
                                    onfocus="(this.type='date')" onblur="(this.type='text')">
                            </div>

                        </th>
                        <th>
                            <div class="" style="text-align:start ;">
                                <label>@lang('main.Modification date')</label>
                                <input class="form-control" type="text" name="date3" placeholder="تاريخ التعديل :"
                                    value="{{ $notice->date3 }}" onfocus="(this.type='date')"
                                    onblur="(this.type='text')">
                            </div
                        </th>
                         <th>
                            <div class="" style="text-align:start ;">
                                <label>@lang('main.model_period')</label>
                                <input class="form-control shadow-lg" type="text" name="period_time" value="{{ $notice->period_time }}">
                            </div>

                        </th>
                        <th>
                            <div class="" style="text-align:start ;">
                                <label>@lang('main.page_number')</label>
                                <input class="form-control shadow-lg" type="text" name="number_page" value="{{ $notice->number_page }}">
                            </div>

                        </th>
                        <th>
                            <div class="" style="text-align:start ;">
                                <label>@lang('main.document_code')</label>
                                <input class="form-control shadow-lg" type="text" name="number_doc" value="{{ $notice->number_doc }}">
                            </div>
                        </th>
                    </tr>
                </thead>
            </table>
            @if ($notice->status == 'pending' && Auth::user()->hasRole('Employee'))
            <div class="form-group">
                <button style="border-radius:20px;margin: 50px; width:10% ; height: 5%;" type="submit"
                    class="btn btn-primary"><i class="fas fa-save" style="width:15% ; height: 20%;">@lang('main.edit')
                    </i></button>
            </div>
        @elseif(($notice->status == 'inProgress' && Auth::user()->hasRole('Admin')) ||
            ($notice->status == 'pending' && Auth::user()->hasRole('Admin')))
            <div class="form-group">
                <button style="border-radius:20px;margin: 50px; width:10% ; height: 5%;" type="submit"
                    class="btn btn-primary"><i class="fas fa-save" style="width:15% ; height: 20%;">@lang('main.edit')
                    </i></button>
            </div>
        @elseif(($notice->status == 'inProgress' && Auth::user()->hasRole('SuperAdmin')) ||
            ($notice->status == 'pending' && Auth::user()->hasRole('SuperAdmin')) ||
            ($notice->status == 'confirmed' && Auth::user()->hasRole('SuperAdmin')))
            <div class="form-group">
                <button style="border-radius:20px;margin: 50px; width:10% ; height: 5%;" type="submit"
                    class="btn btn-primary"><i class="fas fa-save" style="width:15% ; height: 20%;">@lang('main.edit')
                    </i></button>
            </div>
        @endif
        </form>
    </div>

@stop
