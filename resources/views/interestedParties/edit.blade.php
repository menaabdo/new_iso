@extends('layouts.master')

@section('content')
<style>
    .shadow-lg {
        box-shadow: 0 1rem 3rem rgba(0, 0, 0, .175) !important;
    }

    input,
    textarea {
        box-shadow: 0 1rem 3rem rgba(0, 0, 0, .175) !important;
    }

</style>

<div class="card">
    <div class="card-body">
      
    <form action="{{route('interestedParties.update',$interestedPartie->id)}}" method="post" style='margin:auto;margin-top:85px;width:70%' enctype="multipart/form-data" id="fo1">
        @method('PUT') 
              {{ csrf_field() }}
        <div style="" class="w-100 text-center my-4">
            <h2 style="text-shadow: 1px 1px 1px #3ed3ea;"> استمارة الأطراف المهتمة</h2>
            <hr class="w-100">
        </div>
        <div class='shadow-lg p-3'>
                <label class="form-label pr-5">@lang('main.Company Logo')</label>
                
              @if ($interestedPartie->status == 'pending' && Auth::user()->hasRole('Employee'))
            <input type="file" id="img" name="logo" accept="image/*">
        @endif

        @if (($interestedPartie->status == 'inProgress' && Auth::user()->hasRole('Admin')) ||
            ($interestedPartie->status == 'pending' && Auth::user()->hasRole('Admin')))
            <input type="file" id="img" name="logo" accept="image/*">
        @endif
        @if (($interestedPartie->status == 'inProgress' && Auth::user()->hasRole('SuperAdmin')) ||
            ($interestedPartie->status == 'pending' && Auth::user()->hasRole('SuperAdmin')) ||
            ($interestedPartie->status == 'confirmed' && Auth::user()->hasRole('SuperAdmin')))
            <input type="file" id="img" name="logo" accept="image/*">
        @endif
        <img src="{{ asset($interestedPartie->logo) }}" height=180px width=210px; />
          
        </div>
        <hr class="w-100">
        <div class="form-group row w-100 text-right" style="text-align:center ;">
            <table class="table">
                <tr style="background-color:#001635 ;color:white; text-align:center;">
                    @if ($interestedPartie->status == 'pending' && Auth::user()->hasRole('Employee'))
                    <th>@lang('main.m')</th>
                    @endif
                    @if (($interestedPartie->status == 'inProgress' && Auth::user()->hasRole('Admin')) ||
                    ($interestedPartie->status == 'pending' && Auth::user()->hasRole('Admin')))                    <th>@lang('main.m')</th>
                    @endif
                    @if (($interestedPartie->status == 'inProgress' && Auth::user()->hasRole('SuperAdmin')) ||
                    ($interestedPartie->status == 'pending' && Auth::user()->hasRole('SuperAdmin')) ||
                    ($interestedPartie->status == 'confirmed' && Auth::user()->hasRole('SuperAdmin')))                    <th>@lang('main.m')</th>
                    @endif
                    <th>@lang('main.interested parties')</th>
                    <th>@lang('main.needs and requirements')</th>
                    <th>@lang('main.how to achieve them')</th>
                    <th>@lang('main.How to monitor it')</th>
                </tr>

                @if(count($interestedPartie->interestedPartie)>0)
                @foreach($interestedPartie->interestedPartie as $key => $intr)
                <tr id="interestedPartie-{{$key}}">
                    @if ($interestedPartie->status == 'pending' && Auth::user()->hasRole('Employee'))
                    <td class="text-center end-td ">
                        <button type="button" title="Remove" onclick="removeRow({{$key}},{{$intr->id}})"  @if ($key==0) disabled="disabled" @endif class="btn btn-danger btn-option">
                          <i class="fa fa-minus-circle"></i>
                        </button>
                      </td>
                      @endif
                      @if (($interestedPartie->status == 'inProgress' && Auth::user()->hasRole('Admin')) ||
                      ($interestedPartie->status == 'pending' && Auth::user()->hasRole('Admin')))                    <td class="text-center end-td ">
                        <button type="button" title="Remove" onclick="removeRow({{$key}},{{$intr->id}})"  @if ($key==0) disabled="disabled" @endif class="btn btn-danger btn-option">
                          <i class="fa fa-minus-circle"></i>
                        </button>
                      </td>
                      @endif
                      @if (($interestedPartie->status == 'inProgress' && Auth::user()->hasRole('SuperAdmin')) ||
                      ($interestedPartie->status == 'pending' && Auth::user()->hasRole('SuperAdmin')) ||
                      ($interestedPartie->status == 'confirmed' && Auth::user()->hasRole('SuperAdmin')))                    <td class="text-center end-td ">
                        <button type="button" title="Remove" onclick="removeRow({{$key}},{{$intr->id}})"  @if ($key==0) disabled="disabled" @endif class="btn btn-danger btn-option">
                          <i class="fa fa-minus-circle"></i>
                        </button>
                      </td>
                      @endif
                    <th><input class="form-control" type="text" name="interestedPartie[{{$key}}}][names]" value="{{ $intr->names }}"></th>
                    <th><textarea class="form-control" type="text" name="interestedPartie[{{$key}}}][needs]" >{{ $intr->needs }}</textarea></th>
                    <th><textarea class="form-control" type="text" name="interestedPartie[{{$key}}}][achieves]" >{{ $intr->achieves }}</textarea></th>
                    <th><textarea class="form-control" type="text" name="interestedPartie[{{$key}}}][watches]" >{{ $intr->watches }}</textarea></th>
                </tr>
                @endforeach
                @if ($interestedPartie->status == 'pending' && Auth::user()->hasRole('Employee'))

                    <tr class="datatable-row datatable-row-even">
                        <td class="text-center end-td " id="increment">
                            <button type="button" class="btn btn-primary add_new" id="btn-{{count($interestedPartie->interestedPartie)-1}}" onclick="appendRow({{count($interestedPartie->interestedPartie)-1}})"><i
                                class="fa fa-plus-circle"></i></button>
                          </td>
                    </tr>
                    @endif
                    @if (($interestedPartie->status == 'inProgress' && Auth::user()->hasRole('Admin')) ||
                    ($interestedPartie->status == 'pending' && Auth::user()->hasRole('Admin')))
                    <tr class="datatable-row datatable-row-even">
                        <td class="text-center end-td " id="increment">
                            <button type="button" class="btn btn-primary add_new" id="btn-{{count($interestedPartie->interestedPartie)-1}}" onclick="appendRow({{count($interestedPartie->interestedPartie)-1}})"><i
                                class="fa fa-plus-circle"></i></button>
                          </td>
                    </tr>
                    @endif
                    @if (($interestedPartie->status == 'inProgress' && Auth::user()->hasRole('SuperAdmin')) ||
                    ($interestedPartie->status == 'pending' && Auth::user()->hasRole('SuperAdmin')) ||
                    ($interestedPartie->status == 'confirmed' && Auth::user()->hasRole('SuperAdmin')))
                    <tr class="datatable-row datatable-row-even">
                        <td class="text-center end-td " id="increment">
                            <button type="button" class="btn btn-primary add_new" id="btn-{{count($interestedPartie->interestedPartie)-1}}" onclick="appendRow({{count($interestedPartie->interestedPartie)-1}})"><i
                                class="fa fa-plus-circle"></i></button>
                          </td>
                    </tr>
                    @endif
                @else
                <tr id="interestedPartie-0">
                    <th class="text-center end-td ">
                        <button type="button" title="Remove" disabled="disabled" class="btn btn-danger btn-option">
                          <i class="fa fa-minus-circle"></i>
                        </button>
                    </th>
                    <th><input class="form-control" type="text" name="interestedPartie[0][names]"></th>
                    <th><textarea class="form-control" type="text" name="interestedPartie[0][needs]"></textarea></th>
                    <th><textarea class="form-control" type="text" name="interestedPartie[0][achieves]"></textarea></th>
                    <th><textarea class="form-control" type="text" name="interestedPartie[0][watches]"></textarea></th>
                </tr>
                <tr class="datatable-row datatable-row-even">
                    <td class="text-center end-td " id="increment">
                      <button type="button" class="btn btn-primary add_new" id="btn-0" onclick="appendRow(0)"><i
                          class="fa fa-plus-circle"></i></button>
                    </td>
                </tr>
                @endif
            </table>
        </div>

        <hr size="20" >
        <table class="table">
            <thead style="background-color:#001635 ;color:white; text-align:center;">
                <tr>
                    @if ($interestedPartie->status == 'confirmed' && Auth::user()->hasRole('Employee') ||$interestedPartie->status == 'confirmed' && Auth::user()->hasRole('Admin') )
                    <th class=" w-50 text-center col-2 ">
                        <div class="" style="text-align:center ;">
                            <label for="" class="" style="font-size:large;font-weight: bolder;">@lang('main.prepare') (@lang('main.quality manager')) :</label>
                        </div>
                        <div class="form-group row w-10 text-center">
                            <label for="" class="col-3 col-form-label">@lang('main.name')   </label>
                            <div class="col-6">
                                <input type="text" class="form-control" readonly placeholder="  ......" name="name_1" value="{{$interestedPartie->name_1}}">
                            </div>
                        </div>
                        <div class="form-group row w-10 text-center">
                            <label for="" class="col-3 col-form-label">@lang('main.date'):       -</label>
                            <div class="col-6">
                                <input type="date" class="form-control" readonly placeholder="  ......" name="date_1" value="{{$interestedPartie->date_1}}">
                            </div>
                        </div>
                    </th>
                    @endif
                    @if(Auth::user()->hasRole('SuperAdmin'))
                    <th class=" w-50 text-center col-2 ">
                        <div class="" style="text-align:center ;">
                            <label for="" class="" style="font-size:large;font-weight: bolder;">@lang('main.prepare') (@lang('main.quality manager')) :</label>
                        </div>
                        <div class="form-group row w-10 text-center">
                            <label for="" class="col-3 col-form-label">@lang('main.name')   </label>
                            <div class="col-6">
                                <input type="text" class="form-control" placeholder="  ......" name="name_1" value="{{$interestedPartie->name_1}}">
                            </div>
                        </div>
                        <div class="form-group row w-10 text-center">
                            <label for="" class="col-3 col-form-label">@lang('main.date'):       -</label>
                            <div class="col-6">
                                <input type="date" class="form-control" placeholder="  ......" name="date_1" value="{{$interestedPartie->date_1}}">
                            </div>
                        </div>
                    </th>
                    @endif
                </tr>
            </thead>
        </table>
        <hr class="w-100">
        <table class="table">
            <thead>
                <tr>
                    <th>
                      <div class="" style="text-align:start ;">
                        <label>@lang('main.Company Name')</label>
                        <input class="form-control" type="text" name="company_name"   value="{{ $interestedPartie->company_name }}">
                      </div>
            
                    </th>
                    <th>
                      <div class="" style="text-align:start ;">
                        <label>@lang('main.release_date') </label>
                        <input class="form-control" type="text" name="date2"  value="{{ $interestedPartie->date2 }}"  onfocus="(this.type='date')" onblur="(this.type='text')">
                      </div>
            
                    </th>
                    <th>
                        <div class="" style="text-align:start ;">
                            <label>@lang('main.Modification date')</label>
                            <input class="form-control" type="text" name="date3"  value="{{ $interestedPartie->date3 }}"  onfocus="(this.type='date')" onblur="(this.type='text')">
                          </div>
            
                    </th>
                    <th>
                            <div class="" style="text-align:start ;">
                                <label>@lang('main.model_period')</label>
                                <input class="form-control shadow-lg" type="text" name="period_time" value="{{ $interestedPartie->period_time }}">
                            </div>

                        </th>
                        <th>
                            <div class="" style="text-align:start ;">
                                <label>@lang('main.page_number')</label>
                                <input class="form-control shadow-lg" type="text" name="number_page" value="{{ $interestedPartie->number_page }}">
                            </div>

                        </th>
                        <th>
                            <div class="" style="text-align:start ;">
                                <label>@lang('main.document_code')</label>
                                <input class="form-control shadow-lg" type="text" name="number_doc" value="{{ $interestedPartie->number_doc }}">
                            </div>
                        </th>
                  </tr>
            </thead>
        </table>
        @if ($interestedPartie->status == 'pending' && Auth::user()->hasRole('Employee'))
        <div class="form-group">
            <button style="border-radius:20px;margin: 50px; width:10% ; height: 5%;" type="submit"
                class="btn btn-primary"><i class="fas fa-save" style="width:15% ; height: 20%;">@lang('main.edit')
                </i></button>
        </div>
    @elseif(($interestedPartie->status == 'inProgress' && Auth::user()->hasRole('Admin')) ||
        ($interestedPartie->status == 'pending' && Auth::user()->hasRole('Admin')))
        <div class="form-group">
            <button style="border-radius:20px;margin: 50px; width:10% ; height: 5%;" type="submit"
                class="btn btn-primary"><i class="fas fa-save" style="width:15% ; height: 20%;">@lang('main.edit')
                </i></button>
        </div>
    @elseif(($interestedPartie->status == 'inProgress' && Auth::user()->hasRole('SuperAdmin')) ||
        ($interestedPartie->status == 'pending' && Auth::user()->hasRole('SuperAdmin')) ||
        ($interestedPartie->status == 'confirmed' && Auth::user()->hasRole('SuperAdmin')))
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
                      $appended_text = ` <tr class="datatable-row datatable-row-even" id="interestedPartie-${$new_number}">
                                         
                                            <td class="text-center end-td ">
                                                        <button type="button" title="Remove" onclick="removeRow(${$new_number})"
                                                                class="btn btn-danger btn-option">
                                                                <i class="fa fa-minus-circle"></i>
                                                        </button>
                                            </td>
                                            <th><input class="form-control" type="text" name="interestedPartie[${$new_number}][names]"></th>
                    <th><textarea class="form-control" type="text" name="interestedPartie[${$new_number}][needs]"></textarea></th>
                    <th><textarea class="form-control" type="text" name="interestedPartie[${$new_number}][achieves]"></textarea></th>
                    <th><textarea class="form-control" type="text" name="interestedPartie[${$new_number}][watches]"></textarea></th>
                                        </tr>`;
                                        $($appended_text).insertAfter(`#interestedPartie-${num}`);
                      if (!document.getElementById(`interestedPartie-${num}`)) {
                                $($appended_text).insertAfter(`#interestedPartie-0`);
                      }
  
                      $(`#btn-${num}`).remove();
                      $("#increment").append(`<button type="button" class="btn btn-primary add_new" id="btn-${$new_number}" onclick="appendRow(${$new_number})"><i class="fa fa-plus-circle"></i></button></td>`);
  
  
            }
  
            function removeRow(num, id){
          if(id != 0){
             $("#interestedPartie-0").append(`<input type="hidden" name="ids[${num}]" value="${id}">`);
          }
          $(`#interestedPartie-${num}`).remove();
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
    float:left;
    display: inline-table;
}
</style>
@stop