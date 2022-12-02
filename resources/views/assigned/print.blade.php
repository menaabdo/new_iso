


@extends('layouts.print')

@section('content')
<style>
   

  
.shadow-lg {
      box-shadow: 0 1rem 3rem rgba(0,0,0,.175)!important;}
      *, *:before, *:after {
  box-sizing: border-box;
}

html {
  font-size: 100%;
}

body {
  font-family: acumin-pro, system-ui, sans-serif;
  margin: 0;
  display: grid;
  grid-template-rows: auto 1fr auto;
  font-size: 14px;
  background-color: #f4f4f4;
  align-items: start;
  min-height: 100vh;
}

.footer {
  display: flex;
  flex-flow: row wrap;
  padding: 30px 30px 20px 30px;
  color: #2f2f2f;
  background-color: #fff;
  border-top: 1px solid #e5e5e5;
}

.footer > * {
  flex:  1 100%;
}

.footer__addr {
  margin-right: 1.25em;
  margin-bottom: 2em;
}

.footer__logo {
  font-family: 'Pacifico', cursive;
  font-weight: 400;
  text-transform: lowercase;
  font-size: 1.5rem;
}

.footer__addr h2 {
  margin-top: 1.3em;
  font-size: 15px;
  font-weight: 400;
}

.nav__title {
  font-weight: 400;
  font-size: 15px;
}

.footer address {
  font-style: normal;
  color: #999;
}

.footer__btn {
  display: flex;
  align-items: center;
  justify-content: center;
  height: 36px;
  max-width: max-content;
  background-color: rgb(33, 33, 33, 0.07);
  border-radius: 100px;
  color: #2f2f2f;
  line-height: 0;
  margin: 0.6em 0;
  font-size: 1rem;
  padding: 0 1.3em;
}

.footer ul {
  list-style: none;
  padding-left: 0;
}

.footer li {
  line-height: 2em;
}

.footer a {
  text-decoration: none;
}

.footer__nav {
  display: flex;
	flex-flow: row wrap;
}

.footer__nav > * {
  flex: 1 50%;
  margin-right: 1.25em;
}

.nav__ul a {
  color: #999;
}

.nav__ul--extra {
  column-count: 2;
  column-gap: 1.25em;
}

.legal {
  display: flex;
  flex-wrap: wrap;
  color: #999;
}
  
.legal__links {
  display: flex;
  align-items: center;
}

.heart {
  color: #2f2f2f;
}

@media screen and (min-width: 24.375em) {
  .legal .legal__links {
    margin-left: auto;
  }
}

@media screen and (min-width: 40.375em) {
  .footer__nav > * {
    flex: 1;
  }
  
  .nav__item--extra {
    flex-grow: 2;
  }
  
  .footer__addr {
    flex: 1 0px;
  }
  
  .footer__nav {
    flex: 2 0px;
  }
}
    </style>
       
    
    <div class="card " style='' >

    
        <h3 style="margin-top:85px; text-align:center;margin-top:85px;text-shadow: 1px 1px 1px #3ed3ea">أمر تكليف لإجراء مراجعة داخلية لنظام الجودة</h3>
        
        <footer class="footer">
  <div class="footer__addr" style='text-align:center'>
    <h1 class="footer__logo" style='color:silver'>
    <img src="{{ public_path($assigned->logo) }}" style='border-radius:50%' class='col-md-5 rounded' width="70px" height="70px" />
     
        
    </h1>
    
  </div>
  
  <ul class="footer__nav">
    <li class="nav__item" style='text-align:right'>
      <h2 class="nav__title">{{ $assigned->assigned }}</h2>

    
    </li>
    
   
      </ul>
    </li>
  </ul>
  
  
</footer>
      

    
   
    
    <br><br>
    
        <br><br>
        
        <table class="table " style='font-size:12px;box-shadow: 0 1rem 3rem rgba(0,0,0,.175)!important;' >
            <thead>
                <tr>
                <th>
                        <div class="" style="text-align:center ;">
                            <label for="" class=""
                                style="text-align: center;"> رقم الوثيقة </label>
                                <div style="text-align:center ; color:black"> QA–F-13 </div>
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


 

@stop
