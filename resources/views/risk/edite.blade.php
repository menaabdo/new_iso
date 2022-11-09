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
  <h3 style="margin:auto;margin-top:100px;text-shadow: 1px 1px 1px #3ed3ea;">سجل حصر وتحديدالاخطار والمخاطر</h3>
  <hr>
    <form action="{{route('risk.update',$risk->id)}}" method="post" enctype="multipart/form-data" id="fo1">
        @method('PUT') 
          {{ csrf_field() }}

    

    <div class="form-group row w-100 text-right" style='margin-right:250px'>
      <label for="inputPassword" class="col-2 col-form-label"> ادارة / قسم :</label>
      <div class="col-5">
        <input type="text" class="form-control" name="department" value="{{ $risk->department }}" placeholder="ادخل ادارة / قسم  ......" >
      </div>
    </div>


    <section class="my-5">
      <table class="table table-bordered w-100 text-center " style="grid-auto-flow: column;
          justify-content: center;
          align-content: center;
        ">
        <thead>
          <tr style="background-color:lightgreen">
            <th scope="col" rowspan="2">م</th>
            <th scope="col" rowspan="2">النشاط </th>
            <th scope="col" rowspan="2">المخاطر</th>
            <th scope="col" colspan="3">التقييم قبل الاجراء المتخذ</th>
            <th scope="col" rowspan="2">الاجراءات المتخذه</th>
            <th scope="col" colspan="3">التقييم بعد الإجراء الوقائى</th>
            <th scope="col" rowspan="2">مقبول / لا</th>
          </tr>
          <tr style="background-color:lightgreen">
            <th scope="col">S</th>
            <th scope="col">P</th>
            <th scope="col">R</th>
            <th scope="col">S</th>
            <th scope="col">P</th>
            <th scope="col">R</th>
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
    </section>

    <section class="w-100  mt-5">
      <div class="row">
        <div class="col-6">
            <h3 class="text-end">أعداد</h3>
          <input type="text" class="form-control w-100" name="prepare" value="{{ $risk->prepare }}">
        </div>
        @if ($risk->status == 'confirmed' && Auth::user()->hasRole('Employee') || $risk->status == 'confirmed' && Auth::user()->hasRole('Admin') )
        <div class="col-6">
          <h3 class="text-end">أعتماد</h3>
        <input type="text" class="form-control w-100" name="approval" value="{{ $risk->approval }}" readonly>
      </div>
        @endif
        @if (Auth::user()->hasRole('SuperAdmin'))
        <div class="col-6">
            <h3 class="text-end">أعتماد</h3>
          <input type="text" class="form-control w-100" name="approval" value="{{ $risk->approval }}">
        </div>
        @endif
      </div>
     
      <div class="row">
        <div class="col-6">
            <h3 class="text-end"> التاريخ</h3>
          <input type="date" class="form-control w-100" name="date" value="{{ $risk->date }}">
        </div>
        @if ($risk->status == 'confirmed' && Auth::user()->hasRole('Employee') || $risk->status == 'confirmed' && Auth::user()->hasRole('Admin') )
        <div class="col-6">
          <h3 class="text-end">مدير الأدارة</h3>
        <input type="text" class="form-control w-100" name="manager_director" readonly value="{{ $risk->manager_director }}">
      </div>
        @endif
        @if (Auth::user()->hasRole('SuperAdmin'))
        <div class="col-6">
            <h3 class="text-end">مدير الأدارة</h3>
          <input type="text" class="form-control w-100" name="manager_director" value="{{ $risk->manager_director }}">
        </div>
        @endif
      </div>
      
      <div class="row">

          <div class="col-6">
            <h3 class="text-end"> قسم :</h3>
            <input type="text" class="form-control w-100" name="department2" placeholder="    ......" value="{{ $risk->department2 }}">
          </div>
          @if ($risk->status == 'confirmed' && Auth::user()->hasRole('Employee') || $risk->status == 'confirmed' && Auth::user()->hasRole('Admin') )
          <div class="col-6">
            <h3 class="text-end"> قسم :</h3>
            <input type="text" class="form-control w-100" name="department3" placeholder="  ......" value="{{ $risk->department3 }}" readonly >
          </div>
          @endif
          @if (Auth::user()->hasRole('SuperAdmin'))
          <div class="col-6">
            <h3 class="text-end"> قسم :</h3>
            <input type="text" class="form-control w-100" name="department3" placeholder="  ......" value="{{ $risk->department3 }}" >
          </div>
          @endif
      </div>
    </section>
    

    <section style="justify-content:space-evenly; margin-top: 10%;" class="p-4 my-4" >
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
                <div class="form-group">
                    <button style="border-radius:20px;margin: 50px; width:10% ; height: 5%;" type="submit"
                        class="btn btn-primary"><i class="fas fa-save" style="width:15% ; height: 20%;">تعديل
                        </i></button>
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