


@extends('layouts.print')

@section('content')
<style>
    input,textarea {
        box-shadow: 0 1rem 3rem rgba(0, 0, 0, .175) !important;
    }
    textarea{
        border: none;
        height: 180px;
    padding: 10px;
    width: 70%;
    }
    input{
        font-size: .875rem;
    line-height: 1.5;
    color: #4F5467;
    background-color: #fff;
    border: 1px solid #e9ecef;
    border-radius: 2px;
    }

</style>
       
    
    <div class="card " style='text-align:center;border:1px solid silver; box-shadow: 0 1rem 3rem rgba(0, 0, 0, .175) !important;
 '>

    
<div style="" class="w-100 text-center my-4">
            <h2 style='text-align:center;margin-bottom:40px'>
                <span style='font-family:Cursive;border-bottom: 1px solid silver;
    ; box-shadow: 0 1rem 3rem rgba(0, 0, 0, .175) !important;
    border-radius: 6px;
    padding: 10px;text-shadow: 1px 1px 1px #3ed3ea;padding-left: 40px;
    padding-right: 40px;
'>      أمر تكليف لإجراء مراجعة داخلية لنظام الجودة</span></h3>
        
        <footer class="footer">
  <div class="footer__addr" style='text-align:center'>
    <h1 class="footer__logo" style='color:silver'>
    <img src="{{ asset($assigned->logo) }}" style='border-radius:50%' class='col-md-5 rounded' width="70px" height="70px" />
     
        
    </h1>
    
  </div>
  
  <ul class="footer__nav">
    <li class="nav__item" style='text-align:right'>
      <h2 class="nav__title" style='text-align:center'>
      <textarea type="text" class="form-control" name="improvement_notes" placeholder=" حالات ملاحظات التحسين ......">
      {{ $assigned->assigned }}
      </textarea>
                  </h2>

    
    </li>
    
   
      </ul>
    </li>
  </ul>
  
  
</footer>
      

    
   
    
    <br><br>
    
        <br><br>
        
        <table class=" " style=' border:none;
    padding:12px;
    margin-top:12px;
    background-color: #001635;
    color: white;
    /* text-shadow: none; */
    width: 97%;
    margin: auto;
    margin-bottom: 12px;
    font-size: 12px;
    padding: 1px;'>
                 <thead>
                <tr>
                <th>
                        <div class="" style="text-align:center ;">
                            <label for="" class=""
                                style="text-align: center;"> رقم الوثيقة </label>
                                <div style="text-align:center ; "> QA–F-13 </div>
                        </div>
                    </th>
                    <th>
                                       <div class="" style="text-align:center ;">
                            <label for="" class=""
                                style="text-align: center;"> رقم الصفحة </label>
                                <div style="text-align:center ;">  1/1</div>
                        </div>
                    </th>
                    <th>
                        <div class="" style="text-align:center ;">
                        <label>تاريخ التعديل</label>
                            <div style="text-align:center ;">{{ $assigned->date3 }}</div>
                        </div>

                    </th>
                    <th>
                        <div class="" style="text-align:center ;">
                        <label>تاريخ الاصدار</label>
                           <div style="text-align:center ;"> {{ $assigned->date2 }}</div>
                        </div>

                    </th>
                    <th>
                        <div class="" style="text-align:center ;">
                        <label>  اسم الشركة </label>
                          <div style="text-align:center ;"> {{ $assigned->company_name }}</div>
                        </div>

                    </th>
                  
                  
                 
                  
                                  </tr>
            </thead>
        </table>
        <!-- part2 of table -->
        <table class="table " style='font-size:12px;;box-shadow: 0 1rem 3rem rgba(0,0,0,.175)!important;' >
            <thead style=''>
                <tr>
          
                </tr>
            </thead>
        </table>
<br><br>
        <!-- end part2 -->
     

      
    </div>

<script>
  window.addEventListener("load", window.print());
</script>
 

@stop
