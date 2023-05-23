<table class='row  shadow-lg d-flex justifiy-content-between mt-5' >
           
           <thead>
             <tr style=" background-color: azure;">
             <th scope="col" rowspan="2" >م</th>
                               <th scope="col" rowspan="2" style='padding-left:60px;padding-right:50px'>النشاط </th>
                               <th scope="col" rowspan="2" style='140px;padding-left:60px;padding-right:50px'>المخاطر</th>
                               <th scope="col" colspan="2" style='text-align:center;'>التقييم قبل الاجراء المتخذ</th>
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
             <tr  id="risk-{{ $key }}" >
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
      