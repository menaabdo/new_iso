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
    
    </style>
     
    <div class='row card'>
        
    <h3 style="margin-top:100px;margin-right:250px;text-shadow: 1px 1px 1px #3ed3ea;">@lang('main.Risk Management report') </h3>
        <hr >
        <form action="{{ route('risk.store') }}" method="post" enctype="multipart/form-data" id="fo1">
            {{ csrf_field() }}
            <div style="" class=" text-center my-4">
                 </div>
            <div class="form-group row w-50 " style='margin-right:250px'>
                <label for="inputPassword" class="col-md-4 col-form-label" style='text-align:center'> ادارة / قسم :</label>
               
                    <input  type="text" class="form-control col-md-8 shadow-lg rounded" name="department" placeholder="ادخل ادارة / قسم  ......">
                
            </div>
            <table class='table'  >
           
      <thead style='font-size:13px' class='' >
                        <tr class='' style=" background-color: azure;">
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
                    <thead style='font-size:13px'>
                        <tr style="" id="risk-0">
                            <th scope="col" rowspan="1">
                            
                            </th>
                            <th scope="col" rowspan="2"> 
                                <div class="form-row shadow-lg">
                                    <textarea type="text" class="form-control" name="risk[0][activity]" style="height: 50px; width:150px;"></textarea>

                                </div></th>
                            <th scope="col" rowspan="2">
                           <div class="form-row shadow-lg">
                                    <textarea type="text" class="form-control" name="risk[0][risk]" style="height: 50px; width:140px;"></textarea>

                                </div>
                            </th>
                            <th scope="col" colspan="3"><div class="form-row shadow-lg">
                                    <input type="number" class="form-control" name="risk[0][s_review]"
                                        style="height: 50px; width:50px;">

                                </div></th>
                            <th scope="col" rowspan="2"><div class="form-row shadow-lg">
                                    <input type="number" class="form-control" name="risk[0][p_review]"
                                        style="height: 50px; width:50px;">

                                </div></th>
                            <th scope="col" colspan="3"> <div class="form-row shadow-lg">
                                    <input type="number" class="form-control" name="risk[0][r_review]"
                                        style="height: 50px; width:50px;">

                                </div></th>
                            <th scope="col" rowspan="2"> <div class="form-row shadow-lg">
                                    <textarea type="text" class="form-control" name="risk[0][action_taken]" style="height: 50px ;width: 150px;"></textarea>

                                </div></th>
                                <th scope="col" rowspan="2">
                                <div class="form-row shadow-lg">
                                    <input type="number" class="form-control" name="risk[0][s_procedure]"
                                        style="height: 50px; width:50px;">

                                </div>
                            </th>
                            <th scope="col" rowspan="2">
                                <div class="form-row shadow-lg">
                                    <input type="number" class="form-control" name="risk[0][p_procedure]"
                                        style="height: 50px; width:50px;">

                                </div>
                                 </th>
                                <th scope="col" rowspan="2">
                            
                                <div class="form-row shadow-lg">
                                    <input type="number" class="form-control" name="risk[0][r_procedure]"
                                        style="height: 50px; width:50px;">

                                </div>
                            </th>
                            <th scope="col" rowspan="2">
                                <div class="form-row shadow-lg">
                                    <input type="text" class="form-control" name="risk[0][status]"
                                        style="height: 50px; width:70px;">

                                </div>
                            </th>
                        
                        
                    </thead>
                    <tr>
                    <td class="text-center end-td " id="increment">
                                <button type="button" class="btn btn-primary add_new" id="btn-0"
                                    onclick="appendRow(0)"><i class="fa fa-plus-circle"></i></button>
                            </td>
</tr>
                      

                    
                   
      </table>
      <section class="mt-5" style='margin-right:140px'>
                <div class="row">
                    
                        <label class=" col-md-2" style='text-align:center'> أعداد</label>
                        <input type="text" class="form-control col-md-4 shadow-lg" name="prepare">
                    </div>
                    @if (Auth::user()->hasRole('SuperAdmin'))
                    <div class="row mt-5">
                        <label class=" col-md-2"> :أعتماد</label>
                            <input type="text" class="form-control col-md-4" name="approval">
                        </div>
                    @endif
                
                <div class="row mt-3">
                   
                        <label class="text-end col-md-2" style='text-align:center'> التاريخ</label>
                        <input type="date" class="form-control col-md-4 shadow-lg" name="date">
                    </div>
                    @if (Auth::user()->hasRole('SuperAdmin'))
                        <div class="col-6">
                            <h3 class="text-end">مدير الأدارة</h3>
                            <input type="text" class="form-control w-100" name="manager_director">
                        </div>
                    @endif
                

                <div class="row mt-3">

                   
                <label class="text-end col-md-2" style='text-align:center'> قسم :</label>
                        <input type="text" class="form-control col-md-4 shadow-lg" name="department2" placeholder="    ......">
                    </div>
                    @if (Auth::user()->hasRole('SuperAdmin'))
                    <div class="row">
                            <h3 class="text-end"> قسم :</h3>
                            <input type="text" class="form-control w-100" name="department3" placeholder="  ......">
                        </div>
                    @endif
                </div>
            </section>
            <section style="margin-right:100px" class="p-4 my-4 shadow-lg">

                <table class="table">
                    <thead>
                        <tr>
                            <th>
                                <div class="" style="text-align:start ;">
                                    <input type="text" class="form-control" name="issuance"
                                        placeholder="إصدار / تعديل ">
                                </div>

                            </th>
                            <th>
                                <div class="" style="text-align:start ;">

                                    <input type="text" class="form-control" name="date2"
                                        placeholder="تاريخ الإصدار " onfocus="(this.type='date')"
                                        onblur="(this.type='text')">

                                </div>

                            </th>

                            <th>
                                <div class="" style="text-align:start ;">

                                    <input type="text" class="form-control" name="period"
                                        placeholder=" مدة الحفظ ">
                                </div>

                            </th>
                            <th>
                                <div class="" style="text-align:start ;">
                                    <input class="form-control" type="text" name="date3"
                                        placeholder="تاريخ التعديل   " onfocus="(this.type='date')"
                                        onblur="(this.type='text')">
                                </div>

                            </th>
                            <th>
                                <div class="" style="text-align:start ;">
                                    <input type="number" name="code" class="form-control" placeholder=" كود رقم  ">
                                </div>

                            </th>

                        </tr>
                    </thead>

                </table>



            </section>

            <div class="form-group" style='text-align:center'>
            <button style="border-radius:8px;margin: 50px; width:30% ;background-color: #2a415b; ;height: 11%;padding:10px" type="submit"
                class="btn btn-primary">
                <i class="fas fa-save" style="width:15% ; height: 20%;"></i>حفظ</button>
        </div> 
         
      </form>
    
   
      </div>
<!-- <div class=" " >
  
        <h3 style="margin-top:85px;">@lang('main.Risk Management report') </h3>
        <hr>
        <form action="{{ route('risk.store') }}" method="post" enctype="multipart/form-data" id="fo1">
            {{ csrf_field() }}
            <div style="" class="w-100 text-center my-4">
                <h2>سجل تحديد المخاطر وتقييم الأخطار لعمل </h2>
                <hr class="w-100" style="align:center">
            </div>

            <div class="form-group row w-100 ">
                <label for="inputPassword" class="col-2 col-form-label"> ادارة / قسم :</label>
                <div class="col-5">
                    <input type="text" class="form-control" name="department" placeholder="ادخل ادارة / قسم  ......">
                </div>
            </div>


            <section>
                <table
        style="align-content: center;">
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
                        <tr id="risk-0">
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
                                    <input type="number" class="form-control" name="risk[0][s_review]"
                                        style="height: 70px; width:70px;">

                                </div>
                            </td>
                            <td>
                                <div class="form-row">
                                    <input type="number" class="form-control" name="risk[0][p_review]"
                                        style="height: 70px; width:70px;">

                                </div>
                            </td>
                            <td>
                                <div class="form-row">
                                    <input type="number" class="form-control" name="risk[0][r_review]"
                                        style="height: 70px; width:70px;">

                                </div>
                            </td>
                            <td>
                                <div class="form-row">
                                    <textarea type="text" class="form-control" name="risk[0][action_taken]" style="height: 70px ;width: 250px;"></textarea>

                                </div>
                            </td>
                            <td>
                                <div class="form-row">
                                    <input type="number" class="form-control" name="risk[0][s_procedure]"
                                        style="height: 70px; width:70px;">

                                </div>
                            </td>
                            <td>
                                <div class="form-row">
                                    <input type="number" class="form-control" name="risk[0][p_procedure]"
                                        style="height: 70px; width:70px;">

                                </div>
                            </td>
                            <td>
                                <div class="form-row">
                                    <input type="number" class="form-control" name="risk[0][r_procedure]"
                                        style="height: 70px; width:70px;">

                                </div>
                            </td>
                            <td>
                                <div class="form-row">
                                    <input type="text" class="form-control" name="risk[0][status]"
                                        style="height: 70px; width:70px;">

                                </div>
                            </td>

                        </tr>
                        <tr class="datatable-row datatable-row-even">

                            <td class="text-center end-td " id="increment">
                                <button type="button" class="btn btn-primary add_new" id="btn-0"
                                    onclick="appendRow(0)"><i class="fa fa-plus-circle"></i></button>
                            </td>


                        </tr>
                    </tbody>
                </table>
            </section>

            <section class="w-100  mt-5">
                <div class="row">
                    <div class="col-6">
                        <h3 class="text-end">أعداد</h3>
                        <input type="text" class="form-control w-100" name="prepare">
                    </div>
                    @if (Auth::user()->hasRole('SuperAdmin'))
                        <div class="col-6">
                            <h3 class="text-end">أعتماد</h3>
                            <input type="text" class="form-control w-100" name="approval">
                        </div>
                    @endif
                </div>
                <div class="row">
                    <div class="col-6">
                        <h3 class="text-end"> التاريخ</h3>
                        <input type="date" class="form-control w-100" name="date">
                    </div>
                    @if (Auth::user()->hasRole('SuperAdmin'))
                        <div class="col-6">
                            <h3 class="text-end">مدير الأدارة</h3>
                            <input type="text" class="form-control w-100" name="manager_director">
                        </div>
                    @endif
                </div>

                <div class="row">

                    <div class="col-6">
                        <h3 class="text-end"> قسم :</h3>
                        <input type="text" class="form-control w-100" name="department2" placeholder="    ......">
                    </div>
                    @if (Auth::user()->hasRole('SuperAdmin'))
                        <div class="col-6">
                            <h3 class="text-end"> قسم :</h3>
                            <input type="text" class="form-control w-100" name="department3" placeholder="  ......">
                        </div>
                    @endif
                </div>
            </section>
            <section style="justify-content:space-evenly;" class="p-4 my-4">

                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>
                                <div class="" style="text-align:start ;">
                                    <input type="text" class="form-control" name="issuance"
                                        placeholder="إصدار / تعديل : ">
                                </div>

                            </th>
                            <th>
                                <div class="" style="text-align:start ;">

                                    <input type="text" class="form-control" name="date2"
                                        placeholder="تاريخ الإصدار :" onfocus="(this.type='date')"
                                        onblur="(this.type='text')">

                                </div>

                            </th>

                            <th>
                                <div class="" style="text-align:start ;">

                                    <input type="text" class="form-control" name="period"
                                        placeholder=" مدة الحفظ :">
                                </div>

                            </th>
                            <th>
                                <div class="" style="text-align:start ;">
                                    <input class="form-control" type="text" name="date3"
                                        placeholder="تاريخ التعديل   :" onfocus="(this.type='date')"
                                        onblur="(this.type='text')">
                                </div>

                            </th>
                            <th>
                                <div class="" style="text-align:start ;">
                                    <input type="number" name="code" class="form-control" placeholder=" كود رقم : ">
                                </div>

                            </th>

                        </tr>
                    </thead>

                </table>



            </section>

            <div class="form-group">
                <button style="border-radius:20px;margin: 50px; width:10% ; height: 5%;" type="submit"
                    class="btn btn-primary btn-lg"><i class="fas fa-save" style="width:15% ; height: 20%;"></i> حفظ
                </button>
            </div>
        </form>
    </div> -->
  



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    





    <script>
        function appendRow(num) {
            console.log(num);
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
            $("#increment").append(
                `<button type="button" class="btn btn-primary add_new" id="btn-${$new_number}" onclick="appendRow(${$new_number})"><i class="fa fa-plus-circle"></i></button></td>`
                );


        }

        function removeRow(num) {
            $(`#risk-${num}`).remove();

        }
    </script>
@stop
