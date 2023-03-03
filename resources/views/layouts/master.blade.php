
@if (App::getLocale() == 'ar')
<html dir="rtl" lang="ar">
@else
<html dir="ltr" lang="en">
@endif
<!-- Mirrored from wrappixel.com/demos/admin-templates/nice-admin/html/ltr/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 01 Sep 2018 21:16:42 GMT -->

<head>
    
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<style>
  body { font-family: DejaVu Sans, sans-serif; }
</style>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="../../assets/images/WhatsApp Image 2022-07-23 at 9.29.05 PM.jpeg">
    <title>ISO ROBOT</title>
    <!-- Custom CSS -->
    <link href="../../assets/libs/chartist/dist/chartist.min.css" rel="stylesheet">
    <link href="../../assets/extra-libs/c3/c3.min.css" rel="stylesheet">
    <link href="../../assets/extra-libs/jvector/jquery-jvectormap-2.0.2.css" rel="stylesheet" />
    <!-- Custom CSS -->
    <link href="../../dist/css/style.min.css" rel="stylesheet" >
    <link href="{{ asset('css/newstyle.css') }}" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->

<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<style>
  body { font-family: DejaVu Sans, sans-serif; }
  a{
        color:#233242 ;
        opacity: 1;
    }
</style>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script src="http://www.position-absolute.com/creation/print/jquery.printPage.js"></script>

</head>

<body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <div id="main-wrapper">
        @include('layouts.header')
        @include('layouts.saidbar')
        <div class="page-wrapper" style='margin-top:0 !important'>
            
            @yield('content')   
             
            </div>
        </div>
    </div>
    @include('layouts.footer') 
    <style>
        .container {
         max-width: 1427px !important;
        }
        .table {
         width: 100% !important;
        }
        li ul{
       background-color:transparent !important;

    }
    /* li ul li a{
        margin: 1px 9px !important;
    } */

        
        /* li a,li a i{
             opacity: 1 !important;
             color:#233242 !important;
         }
       
    /* li{
        box-shadow: 0 1rem 3rem rgba(0,0,0,.175)!important;
         color:white;
         background-color:white !important;
         padding:3px;
         width:96%  !important;
         border-radius:4px;
         margin-right:6px;
    }  */
   </style>
</body>


<!-- Mirrored from wrappixel.com/demos/admin-templates/nice-admin/html/ltr/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 01 Sep 2018 21:18:47 GMT -->
</html>


    