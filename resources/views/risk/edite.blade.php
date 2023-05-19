@extends('layouts.master')
@section('content')
<style>
      .shadow-lg {
    box-shadow: 0 1rem 3rem rgba(0,0,0,.175)!important;}
    th{
        padding:10px;
    }
    .cell{
        background-color: beige;
    border-radius: 50%;
    padding: 6px;
    text-align: center;
    margin: 2px;
    color:#001635;
   
}
    }
    </style>
 


 <div class='row card'>
  <h3 style="margin:auto;margin-top:100px;text-shadow: 1px 1px 1px #3ed3ea;">@lang('main.Risk Management report')</h3>
  <hr>
    <form action="{{route('risk.update',$risk->id)}}" method="post" class='col-md-12' style='margin:auto' enctype="multipart/form-data" id="fo1">
        @method('PUT') 
          {{ csrf_field() }}

    

    <div class="form-group row w-100 text-right" style='margin-right:250px'>
      <label for="inputPassword" class="col-2 col-form-label"> ادارة / قسم :</label>
      <div class="col-5">
        <input type="text" class="form-control" name="department" value="{{ $risk->department }}" placeholder="ادخل ادارة / قسم  ......" >
      </div>
   


    
      <table class='row  shadow-lg d-flex justifiy-content-between mt-5'  style='margin-right:100px;margin-left:-200px;width:90%;overflow-x:auto'>
           
        <thead>
          <tr style=" background-color: azure;">
          <th scope="col" rowspan="2" >م</th>
                            <th scope="col" rowspan="2" style='padding-left:60px;padding-right:50px'>النشاط </th>
                            <th scope="col" rowspan="2" style='140px;padding-left:60px;padding-right:50px'>المخاطر</th>
                            <th scope="col" colspan="3" style='text-align:center;'>التقييم قبل الاجراء المتخذ</th>
                            <th scope="col" rowspan="2" style='text-align:center;'>الاجراءات المتخذه</th>
                            <th scope="col" colspan="3" style='text-align:center'>التقييم بعد الإجراء الوقائى</th>
                            <th scope="col" rowspan="2" > <span style='   '>  مقبول/لا</span></th>
                        </tr>
                        <tr style="background-color: azure">
                            <th scope="col" ><span  class='cell' style='width:6%'>S</span></th>
                            <th scope="col" ><span  class='cell' style='width:6%'>P</span></th>
                            <th scope="col" ><span  class='cell' style='width:6%;margin-right: 40px;}'>R</span></th>
                            <th scope="col" ><span  class='cell' style='width:6%'>S</span></th>
                            <th scope="col" ><span  class='cell' style='width:6%'>P</span></th>
                            <th scope="col" ><span  class='cell' style='width:6%'>R</span></th>
                        </tr>
                    </thead>
        <tbody>
        @if(count($risk->risk)>0)
            @foreach($risk->risk as $key => $ris)
          <tr  id="risk-{{ $key }}">
            <td class="text-center end-td ">
                <button type="button" title="Remove" onclick="removeRow({{$key}},{{$ris->id}})"  @if ($key==0) disabled="disabled" @endif class="btn btn-danger btn-option">
                    <i class="fa fa-minus-circle"></i>
                </button>
            </td>
            <td>
              <div class="form-row ">
                <textarea type="text" class="form-control" name="risk[{{ $key }}][activity]"  style="height: 70px; width:250px;">{{ $ris->activity }}</textarea>

              </div>
            </td>

            <td>
              <div class="form-row ">
                <textarea type="text" class="form-control" name="risk[{{ $key }}][risk]"  style="height: 70px; width:250px;">{{ $ris->risk }}</textarea>

              </div>
            </td>


            <td>
              <div class="form-row ">
                <input type="number" class="form-control" name="risk[{{ $key }}][s_review]" value="{{ $ris->s_review }}" style="height: 70px; width:70px;">

              </div>
            </td>
            <td>
              <div class="form-row">
                <input type="number" class="form-control" name="risk[{{ $key }}][p_review]" value="{{ $ris->p_review }}"style="height: 70px; width:70px;">

              </div>
            </td>
            <td>
              <div class="form-row">
                <input type="number" class="form-control" name="risk[{{ $key }}][r_review]" value="{{ $ris->r_review }}"style="height: 70px; width:70px;">

              </div>
            </td>
            <td>
              <div class="form-row">
                <textarea type="text" class="form-control" name="risk[{{ $key }}][action_taken]" style="height: 70px ;width: 250px;">{{ $ris->action_taken }}</textarea>

              </div>
            </td>
            <td>
              <div class="form-row">
                <input type="number" class="form-control" name="risk[{{ $key }}][s_procedure]" value="{{ $ris->s_procedure }}"style="height: 70px; width:70px;">

              </div>
            </td>
            <td>
              <div class="form-row">
                <input type="number" class="form-control" name="risk[{{ $key }}][p_procedure]" value="{{ $ris->p_procedure }}"style="height: 70px; width:70px;">

              </div>
            </td>
            <td>
              <div class="form-row">
                <input type="number" class="form-control" name="risk[{{ $key }}][r_procedure]" value="{{ $ris->r_procedure }}" style="height: 70px; width:70px;">

              </div>
            </td>
            <td>
              <div class="form-row">
                <input type="text" class="form-control" name="risk[{{ $key }}][status]" value="{{ $ris->status }}"style="height: 50px; width:80px;">

              </div>
            </td>

          </tr>
         
          @endforeach
          <tr class="datatable-row datatable-row-even">
            <td class="text-center end-td " id="increment">
                <button type="button" class="btn btn-primary add_new" id="btn-{{count($risk->risk)-1}}" onclick="appendRow({{count($risk->risk)-1}})"><i
                        class="fa fa-plus-circle"></i></button>
            </td>
           </tr>
        @else
        <tr  id="risk-0">
            <td class="text-center end-td ">
                <button type="button" title="Remove" disabled="disabled" class="btn btn-danger btn-option">
                    <i class="fa fa-minus-circle"></i>
                </button>
            </td>
            <td>
              <div class="form-row ">
                <textarea type="text" class="form-control" name="risk[0][activity]" style="height: 70px; width:250px;"></textarea>

              </div>
            </td>

            <td>
              <div class="form-row ">
                <textarea type="text" class="form-control" name="risk[0][risk]" style="height: 70px; width:250px;"></textarea>

              </div>
            </td>


            <td>
              <div class="form-row ">
                <input type="number" class="form-control" name="risk[0][s_review]"style="height: 70px; width:70px;">

              </div>
            </td>
            <td>
              <div class="form-row">
                <input type="number" class="form-control" name="risk[0][p_review]"style="height: 70px; width:70px;">

              </div>
            </td>
            <td>
              <div class="form-row">
                <input type="number" class="form-control" name="risk[0][r_review]" style="height: 70px; width:70px;">

              </div>
            </td>
            <td>
              <div class="form-row">
                <textarea type="text" class="form-control" name="risk[0][action_taken]" style="height: 70px ;width: 250px;"></textarea>

              </div>
            </td>
            <td>
              <div class="form-row">
                <input type="number" class="form-control" name="risk[0][s_procedure]" style="height: 70px; width:70px;">

              </div>
            </td>
            <td>
              <div class="form-row">
                <input type="number" class="form-control" name="risk[0][p_procedure]" style="height: 70px; width:70px;">

              </div>
            </td>
            <td>
              <div class="form-row">
                <input type="number" class="form-control" name="risk[0][r_procedure]" style="height: 70px; width:70px;">

              </div>
            </td>
            <td>
              <div class="form-row">
                <input type="text" class="form-control" name="risk[0][status]" style="height: 50px; width:80px;">

              </div>
            </td>

          </tr>
          <tr class="datatable-row datatable-row-even">

            <td class="text-center end-td " id="increment">
                <button type="button" class="btn btn-primary add_new" id="btn-0" onclick="appendRow(0)"><i
                        class="fa fa-plus-circle"></i></button>
            </td>


        </tr>
        @endif
        
        </tbody>
      </table>
   

    <section class="w-50  mt-5" style='margin:auto'>
      <div class="row">
        <div class="col-6 text-center">
            <h3 class="text-center">أعداد</h3>
          <input type="text" class="form-control w-100" name="prepare" value="{{ $risk->prepare }}">
        </div>
        @if ($risk->status == 'confirmed' && Auth::user()->hasRole('Employee') || $risk->status == 'confirmed' && Auth::user()->hasRole('Admin') )
        <div class="col-6 text-center">
          <h3 class="text-center">أعتماد</h3>
        <input type="text" class="form-control w-100" name="approval" value="{{ $risk->approval }}" readonly>
      </div>
        @endif
        @if (Auth::user()->hasRole('SuperAdmin'))
        <div class="col-6">
            <h3 class="text-center">أعتماد</h3>
          <input type="text" class="form-control w-100" name="approval" value="{{ $risk->approval }}">
        </div>
        @endif
      </div>
     
      <div class="row mt-3">
        <div class='col-md-6'>
        <label class="text-start col-md-12" style='text-align:right'> التاريخ</label>
          <div class='row'>     
          <input type="date" class="form-control col-md-12" name="date" value="{{ $risk->date }}">
        </div>
        </div>
        
        @if ($risk->status == 'confirmed' && Auth::user()->hasRole('Employee') || $risk->status == 'confirmed' && Auth::user()->hasRole('Admin') )
        <div class="col-6">
          <label class="" style='text-align:right'>مدير الأدارة</label>
        <input type="text" class="form-control w-100" name="manager_director" readonly value="{{ $risk->manager_director }}">
      </div>
     
        @endif
        @if (Auth::user()->hasRole('SuperAdmin'))
        <div class="col-6" style='text-align:right'>
            <label class="text-start" style='text-align:right'>مدير الأدارة</label>
          <input type="text" class="form-control w-100" name="manager_director" value="{{ $risk->manager_director }}">
        </div>
        @endif
      </div>
 
      <div class="row">

          <div class="col-6" style='text-align:right'>
            <label class="text-end"> قسم :</label>
            <input type="text" class="form-control w-100" name="department2" placeholder="    ......" value="{{ $risk->department2 }}">
          </div>
          @if ($risk->status == 'confirmed' && Auth::user()->hasRole('Employee') || $risk->status == 'confirmed' && Auth::user()->hasRole('Admin') )
          <div class="col-6">
            <label class="text-end" style='text-align:right'> قسم :</label>
            <input type="text" class="form-control w-100" name="department3" placeholder="  ......" value="{{ $risk->department3 }}" readonly >
          </div>
          @endif
          @if (Auth::user()->hasRole('SuperAdmin'))
          <div class="col-6" style='text-align:right'>
            <label class="text-end"> قسم :</label>
            <input type="text" class="form-control w-100" name="department3" placeholder="  ......" value="{{ $risk->department3 }}" >
          </div>
          @endif
          </div>
          </div>
      
    </section>
    

    <section style="justify-content:space-evenly; margin-top: 10%;margin-right:400px" class="p-4 my-4 " >
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>
              <div class="" style="text-align:start ;">
                <input type="text" class="form-control" name="issuance" placeholder="إصدار / تعديل : "  value="{{ $risk->issuance }}">
              </div>

            </th>
            <th>
              <div class="" style="text-align:start ;">

                <input type="text" class="form-control" name="date2" placeholder="تاريخ الإصدار :"
                  onfocus="(this.type='date')"  onblur="(this.type='text')"  value="{{ $risk->date2 }}">

              </div>

            </th>

            <th>
              <div class="" style="text-align:start ;">

                <input type="text" class="form-control" name="period" placeholder=" مدة الحفظ :"  value="{{ $risk->period }}">
              </div>

            </th>
            <th>
              <div class="" style="text-align:start ;">
                <input class="form-control" type="text" name="date3" placeholder="تاريخ التعديل   :"
                  onfocus="(this.type='date')"  onblur="(this.type='text')"  value="{{ $risk->date3 }}">
              </div>

            </th>
            <th>
              <div class="" style="text-align:start ;">
                <input type="number" name="code" class="form-control" placeholder=" كود رقم : " value="{{ $risk->code }}">
              </div>

            </th>

          </tr>
        </thead>

      </table>



    </section>
    @if ($risk->status == 'pending' && Auth::user()->hasRole('Employee') || $risk->status == 'pending' &&  Auth::user()->hasRole('Admin')  )
                <div class="form-group">
                    <button style="border-radius:20px;margin: 50px; width:10% ; height: 5%;" type="submit"
                        class="btn btn-primary"><i class="fas fa-save" style="width:15% ; height: 20%;">تعديل
                        </i></button>
                </div>
  
            @elseif(
                ($risk->status == 'pending' && Auth::user()->hasRole('SuperAdmin')) ||
                ($risk->status == 'confirmed' && Auth::user()->hasRole('SuperAdmin')))
                <div class="form-group " style='text-align:center;margin-right:300px'>
            <button style="border-radius:8px;margin: 50px; width:30% ;background-color: #2a415b; ;height: 5%;padding:10px" type="submit"
                class="btn btn-primary">
               تعديل</button>
        </div> 
            @endif
</form>
  </div>




  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
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
                    $appended_text = ` <tr class="datatable-row datatable-row-even" id="risk-${$new_number}">
                                       
                                        <td class="text-center end-td ">
                                                  <button type="button" title="Remove" onclick="removeRow(${$new_number})"
                                                            class="btn btn-danger btn-option">
                                                            <i class="fa fa-minus-circle"></i>
                                                  </button>
                                        </td>
                                        <td>
              <div class="form-row ">
                <textarea type="text" class="form-control" name="risk[${$new_number}][activity]" style="height: 70px; width:250px;"></textarea>

              </div>
            </td>

            <td>
              <div class="form-row ">
                <textarea type="text" class="form-control" name="risk[${$new_number}][risk]" style="height: 70px; width:250px;"></textarea>

              </div>
            </td>


            <td>
              <div class="form-row ">
                <input type="number" class="form-control" name="risk[${$new_number}][s_review]" style="height: 70px; width:70px;">

              </div>
            </td>
            <td>
              <div class="form-row">
                <input type="number" class="form-control" name="risk[${$new_number}][p_review]" style="height: 70px; width:70px;">

              </div>
            </td>
            <td>
              <div class="form-row">
                <input type="number" class="form-control" name="risk[${$new_number}][r_review]" style="height: 70px; width:70px;">

              </div>
            </td>
            <td>
              <div class="form-row">
                <textarea type="text" class="form-control" name="risk[${$new_number}][action_taken]" style="height: 70px ;width: 250px;"></textarea>

              </div>
            </td>
            <td>
              <div class="form-row">
                <input type="number" class="form-control" name="risk[${$new_number}][s_procedure]" style="height: 70px; width:70px;">

              </div>
            </td>
            <td>
              <div class="form-row">
                <input type="number" class="form-control" name="risk[${$new_number}][p_procedure]" style="height: 70px; width:70px;">

              </div>
            </td>
            <td>
              <div class="form-row">
                <input type="number" class="form-control" name="risk[${$new_number}][r_procedure]" style="height: 70px; width:70px;">

              </div>
            </td>
            <td>
              <div class="form-row">
                <input type="text" class="form-control" name="risk[${$new_number}][status]" style="height: 50px ; width:80px;">

              </div>
            </td>

                                       
                                       
                              </tr>`;
                              $($appended_text).insertAfter(`#risk-${num}`);
                    if (!document.getElementById(`risk-${num}`)) {
                              $($appended_text).insertAfter(`#risk-0`);
                    }

                   

                    $(`#btn-${num}`).remove();
                    $("#increment").append(`<button type="button" class="btn btn-primary add_new" id="btn-${$new_number}" onclick="appendRow(${$new_number})"><i class="fa fa-plus-circle"></i></button></td>`);


          }

          function removeRow(num, id){
          if(id != 0){
             $("#risk-0").append(`<input type="hidden" name="ids[${num}]" value="${id}">`);
          }
          $(`#risk-${num}`).remove();
          
     }

    </script>
@stop