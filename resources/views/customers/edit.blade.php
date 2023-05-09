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
    <div class="card-body row" style='margin:auto;margin-top:80px'>
   
    <form action="{{route('customers.update',$customer->id)}}" method="post" class='col-md-10' style='margin:auto' enctype="multipart/form-data" id="fo1">
        @method('PUT') 
              {{ csrf_field() }}
        <div style="" class="w-100 text-center my-4">
            <h2 style='text-shadow: 1px 1px 1px #3ed3ea;'> العمـــــــــــلاء</h2>
            <hr class="w-100">
        </div>
        <div class='row mt-4 mb-3'>
                <label class="form-label col-md-2 ">@lang('main.Company Logo')</label>
    
            <input type="file" id="img" name="logo" accept="image/*">
            <img src="{{ asset($customer->logo) }}" height=180px width=210px; />
          
        </div>
        <div class="form-group row ">
            <label for="" class="col-2 col-form-label">@lang('main.Customer'):</label>
            <div class="col-4">
           
         
                <input type="text" class="form-control" name="customer_name" value="{{$customer->customer_name}}">
            </div>
        </div>
        <div class="form-group row ">
        <div class="col-4">
        <label for="" class="col-3 col-form-label">@lang('main.direct'):</label>
           
                  <input type="checkbox" name="direct" value=1 {{ $customer->direct=="1"? 'checked':'' }}>
            </div>
              <div class="col-6">
              <label for="" class="col-3 col-form-label">@lang('main.delegate'):</label>
         
                <input type="checkbox" name="delegate" value=1 {{ $customer->delegate=="1"? 'checked':'' }}>
            </div>
        </div>
        <div class="form-group row ">
            <label for="" class="col-3 col-form-label">@lang('main.delegate_name'):</label>
            <div class="col-6">
                <input type="text" class="form-control" name="delegate_name" value="{{$customer->delegate_name}}">
            </div>
        </div>
        <hr class="w-100">
        <div class="form-group row w-100 text-right" style="text-align:center;">
            <table class="table">
                <tr style="background-color:    #001635; color:white;text-align:center;">
                    <th scope="col" rowspan="2">@lang('main.m')</th>
                    <th scope="col" rowspan="2">@lang('main.name')</th>
                    <th scope="col" rowspan="2">@lang('main.code')</th>
                    <th scope="col" colspan="7">@lang('main.data')</th>
                </tr>
                <tr style="background-color:    #001635; color:white;text-align:center;">
                    <th scope="col"> @lang('main.Administrator')</th>
                    <th scope="col">@lang('main.job')</th>
                    <th scope="col">@lang('main.phone')</th>
                    <th scope="col">@lang('main.jawaal')</th>
                    <th scope="col">@lang('main.address')</th>
                    <th scope="col">@lang('main.WEB')</th>
                    <th scope="col">@lang('main.Email')</th>
                </tr>
                @if(count($customer->customer)>0)
                @foreach($customer->customer as $key => $data)
                <tr id="customer-{{$key}}">
                    <td class="text-center end-td ">
                        <button type="button" title="Remove" onclick="removeRow({{$key}},{{$data->id}})"  @if ($key==0) disabled="disabled" @endif class="btn btn-danger btn-option">
                          <i class="fa fa-minus-circle"></i>
                        </button>
                      </td>
                    <th><input class="form-control" type="text" name="customer[{{$key}}][name]" value="{{$data->name}}"></th>
                    <th><input class="form-control" type="text" name="customer[{{$key}}][code]" value="{{$data->code}}"></th>
                    <th><input class="form-control" type="text" name="customer[{{$key}}][responsible]" value="{{$data->responsible}}"></th>
                    <th><input class="form-control" type="text" name="customer[{{$key}}][emp]" value="{{$data->emp}}"></th>
                    <th><input class="form-control" type="text" name="customer[{{$key}}][phone_1]" value="{{$data->phone_1}}"></th>
                    <th><input class="form-control" type="text" name="customer[{{$key}}][phone_2]" value="{{$data->phone_2}}"></th>
                    <th><input class="form-control" type="text" name="customer[{{$key}}][address]" value="{{$data->address}}"></th>
                    <th><input class="form-control" type="text" name="customer[{{$key}}][web]" value="{{$data->web}}"></th>
                    <th><input class="form-control" type="text" name="customer[{{$key}}][email]" value="{{$data->email}}"></th>
                </tr>

                @endforeach
                <tr class="datatable-row datatable-row-even">
                    <td class="text-center end-td " id="increment">
                        <button type="button" class="btn btn-primary add_new" id="btn-{{count($customer->customer)-1}}" onclick="appendRow({{count($customer->customer)-1}})"><i
                            class="fa fa-plus-circle"></i></button>
                      </td>
                </tr>
            @else
                <tr id="customer-0">
                    <th class="text-center end-td ">
                        <button type="button" title="Remove" disabled="disabled" class="btn btn-danger btn-option">
                          <i class="fa fa-minus-circle"></i>
                        </button>
                    </th>
                    <th><input class="form-control" type="text" name="customer[0][name]"></th>
                    <th><input class="form-control" type="text" name="customer[0][code]"></th>
                    <th><input class="form-control" type="text" name="customer[0][responsible]"></th>
                    <th><input class="form-control" type="text" name="customer[0][emp]"></th>
                    <th><input class="form-control" type="text" name="customer[0][phone_1]"></th>
                    <th><input class="form-control" type="text" name="customer[0][phone_2]"></th>
                    <th><input class="form-control" type="text" name="customer[0][address]"></th>
                    <th><input class="form-control" type="text" name="customer[0][web]"></th>
                    <th><input class="form-control" type="text" name="customer[0][email]"></th>
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




        <hr class="w-100">
        <table class="table">
            <thead>
                <tr>
                    <th>
                      <div class="" style="text-align:start ;">
                        <label>@lang('main.Company Name')</label>
                        <input class="form-control" type="text" name="company_name"   value="{{ $customer->company_name }}">
                      </div>
            
                    </th>
                    <th>
                      <div class="" style="text-align:start ;">
                        <label>@lang('main.release_date') </label>
                        <input class="form-control" type="text" name="date2"  value="{{ $customer->date2 }}"  onfocus="(this.type='date')" onblur="(this.type='text')">
                      </div>
            
                    </th>
                    <th>
                        <div class="" style="text-align:start ;">
                            <label>@lang('main.Modification date')</label>
                            <input class="form-control" type="text" name="date3"  value="{{ $customer->date3 }}"  onfocus="(this.type='date')" onblur="(this.type='text')">
                          </div>
            
                    </th>
                   <th>
                            <div class="" style="text-align:start ;">
                                <label>@lang('main.model_period')</label>
                                <input class="form-control shadow-lg" type="text" name="period_time" value="{{ $customer->period_time }}">
                            </div>

                        </th>
                        <th>
                            <div class="" style="text-align:start ;">
                                <label>@lang('main.page_number')</label>
                                <input class="form-control shadow-lg" type="text" name="number_page" value="{{ $customer->number_page }}">
                            </div>

                        </th>
                        <th>
                            <div class="" style="text-align:start ;">
                                <label>@lang('main.document_code')</label>
                                <input class="form-control shadow-lg" type="text" name="number_doc" value="{{ $customer->number_doc }}">
                            </div>
                        </th>
                  </tr>
            </thead>
        </table>
        <div class='row'>
            <button style="border-radius:8px;margin: 50px; width:30% ;background-color: #2a415b; ;height: 5%;padding:10px;margin-right:100px;margin:auto" type="submit"
                class="btn btn-primary col-md-4">
              @lang('main.edit')</button>
                    </div>  
    </form>
</div>

<script>
    function appendRow(num) {
                      $new_number = parseInt(num) + 1;
                      $appended_text = ` <tr class="datatable-row datatable-row-even" id="customer-${$new_number}">
                                         
                                            <td class="text-center end-td ">
                                                        <button type="button" title="Remove" onclick="removeRow(${$new_number})"
                                                                class="btn btn-danger btn-option">
                                                                <i class="fa fa-minus-circle"></i>
                                                        </button>
                                            </td>
                                            <th><input class="form-control" type="text" name="customer[${$new_number}][name]"></th>
                    <th><input class="form-control" type="text" name="customer[${$new_number}][code]"></th>
                    <th><input class="form-control" type="text" name="customer[${$new_number}][responsible]"></th>
                    <th><input class="form-control" type="text" name="customer[${$new_number}][emp]"></th>
                    <th><input class="form-control" type="text" name="customer[${$new_number}][phone_1]"></th>
                    <th><input class="form-control" type="text" name="customer[${$new_number}][phone_2]"></th>
                    <th><input class="form-control" type="text" name="customer[${$new_number}][address]"></th>
                    <th><input class="form-control" type="text" name="customer[${$new_number}][web]"></th>
                    <th><input class="form-control" type="text" name="customer[${$new_number}][email]"></th>
                                        </tr>`;
                                        $($appended_text).insertAfter(`#customer-${num}`);
                      if (!document.getElementById(`customer-${num}`)) {
                                $($appended_text).insertAfter(`#customer-0`);
                      }
  
                      $(`#btn-${num}`).remove();
                      $("#increment").append(`<button type="button" class="btn btn-primary add_new" id="btn-${$new_number}" onclick="appendRow(${$new_number})"><i class="fa fa-plus-circle"></i></button></td>`);
  
  
            }
  
            function removeRow(num, id){
          if(id != 0){
             $("#customer-0").append(`<input type="hidden" name="ids[${num}]" value="${id}">`);
          }
          $(`#customer-${num}`).remove();
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