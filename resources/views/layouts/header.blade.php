<style>
     .shadow-lg {
    box-shadow: 0 1rem 3rem rgba(0,0,0,.175)!important;}
    
      

    </style>
<header class="topbar shadow-lg" style='background:none !important;background-color: #001635 !important;'>
 
    <nav class="navbar top-navbar navbar-expand-md navbar-dark" style='background-color: #001635;'>
    
        <div class="navbar-header" style='margin-bottom:60px;width:25%'>
            <!-- This is for the sidebar toggle which is visible on mobile only -->
            <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)">
                <i class="ti-menu ti-close" style=''></i>
            </a>
            <!-- ============================================================== -->
            <!-- Logo -->
            <!-- ============================================================== -->
            <br>
            <div class="navbar-brand">
          <span style='color:#ffc000'>  جميع الاقسام</span>
                <a href="{{url('/')}}" class="logo">
                    <!-- Logo icon -->
                    
                    <!--End Logo icon -->
                    <!-- Logo text -->
                    <span class="logo-text" >
                        <!-- dark Logo text -->
                        <img src="../../assets/images/WhatsApp Image 2022-07-23 at 9.29.05 PM.jpeg" alt="homepage" class="dark-logo" style="border-radius: 50%;" width="70px" height="70px" />
                     
                        <!-- Light Logo text -->
                        <!-- <img src="../../assets/images/WhatsApp Image 2022-07-23 at 9.29.05 PM.jpeg" class="light-logo" alt="homepage" style="border-radius: 50%;" width="50px" height="50px"/>
                    -->
                    </span>
                </a>
                <a class="sidebartoggler d-none d-md-block" href="javascript:void(0)" data-sidebartype="mini-sidebar">
                    <i class="mdi mdi-toggle-switch mdi-toggle-switch-off font-20" style='margin-right: 10px !important;'></i>
                </a>
                
            </div>
            <!-- ============================================================== -->
            <!-- End Logo -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Toggle which is visible on mobile only -->
            <!-- ============================================================== -->
            <a class="topbartoggler d-block d-md-none waves-effect waves-light" href="javascript:void(0)" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <i class="ti-more"></i>
            </a>
        </div>
        <!-- ============================================================== -->
        <!-- End Logo -->
        <!-- ============================================================== -->
        <div class="navbar-collapse collapse" id="navbarSupportedContent">
            <!-- ============================================================== -->
            <!-- toggle and nav items -->
            <!-- ============================================================== -->
            <div style='text-align:center;width:100%;position: absolute;
    width: 100%;
    margin-top: 60px;
    z-index: 1;'>
             <img id='img1' src="../../assets/images/WhatsApp Image 2022-07-23 at 9.29.05 PM.jpeg" alt="homepage" class="dark-logo" style="border-radius: 50%;box-shadow: 0 1rem 3rem rgba(0,0,0,.175)!important;margin-left:60px ;margin-top:10px;margin-bottom:10px;    margin: 3px 10px;border: 3px solid #3ed3ea;padding:3px;
      " width="100px" height="100px" />
     </div> 
            <ul class="navbar-nav float-left mr-auto">
                <!-- <li class="nav-item d-none d-md-block">
                            <a class="nav-link sidebartoggler waves-effect waves-light" href="javascript:void(0)" data-sidebartype="mini-sidebar">
                                <i class="mdi mdi-menu font-24"></i>
                            </a>
                        </li> -->
                <!-- ============================================================== -->
                <!-- Search -->
                <!-- ============================================================== -->
                {{-- <li class="nav-item search-box">
                    <a class="nav-link waves-effect waves-dark" href="javascript:void(0)">
                        <div class="d-flex align-items-center">
                            <i class="mdi mdi-magnify font-20 mr-1"></i>
                            <div class="ml-1 d-none d-sm-block">
                                <span>Search</span>
                            </div>
                        </div>
                    </a>
                    <form class="app-search position-absolute">
                        <input type="text" class="form-control" placeholder="Search &amp; enter">
                        <a class="srh-btn">
                            <i class="ti-close"></i>
                        </a>
                    </form>
                </li> --}}
            </ul>
            <!-- ============================================================== -->
            <!-- Right side toggle and nav items -->
            <!-- ============================================================== -->
            <ul class="navbar-nav float-right">
                <!-- ============================================================== -->
                <!-- Messages -->
                <!-- ============================================================== -->
                <li class="nav-item dropdown border-right">
                    <a class="nav-link dropdown-toggle waves-effect waves-dark" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style='color:white;'>
                        <i class="fa fa-language"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right mailbox animated bounceInDown">
                        <span class="with-arrow">
                            <span class="bg-primary"></span>
                        </span>
                        <ul class="list-style-none">
                            <li>
                                <div class="drop-title bg-primary text-white">

                                    <span class="font-light">Languages</span>

                                    @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                            <li>
                                <a rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                    {{ $properties['native'] }}
                                </a>
                            </li>
                            @endforeach
                    </div>
                </li>
                <!-- ============================================================== -->
                <!-- End Messages -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Comment -->
                <!-- ============================================================== -->

                <!-- ============================================================== -->
                <!-- End Comment -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- User profile and search -->
                <!-- ============================================================== -->
                <li class="nav-item dropdown" style='width:100px'>
                    <a class="nav-link dropdown-toggle waves-effect waves-dark pro-pic" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style='color:white;    margin-right: -40px;'>
                        {{-- <img src="../../assets/images/users/2.jpg" alt="user" class="rounded-circle" width="40"> --}}
                        <span class="m-l-5 font-medium d-none d-sm-inline-block">{{Auth::user()->name}}<i class="mdi mdi-chevron-down"></i></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right user-dd animated flipInY">
                        <span class="with-arrow">
                            <span class="bg-primary"></span>
                        </span>
                        <div class="d-flex no-block align-items-center p-15 bg-primary text-white m-b-10">
                            {{-- <div class="">
                                <img src="../../assets/images/users/2.jpg" alt="user" class="rounded-circle" width="60">
                            </div> --}}
                            <div class="m-l-10">
                                <h4 class="m-b-0">{{Auth::user()->name}}</h4>
                                <p class=" m-b-0">{{Auth::user()->email}}</p>
                            </div>
                        </div>
                        <div class="profile-dis scrollable">
                            {{-- <a class="dropdown-item" href="javascript:void(0)">
                                <i class="ti-user m-r-5 m-l-5"></i> My Profile</a> --}}
                            {{-- <a class="dropdown-item" href="javascript:void(0)">
                                <i class="ti-wallet m-r-5 m-l-5"></i> My Balance</a> --}}
                            {{-- <a class="dropdown-item" href="javascript:void(0)">
                                <i class="ti-email m-r-5 m-l-5"></i> Inbox</a> --}}
                            <div class="dropdown-divider"></div>
                            {{-- <a class="dropdown-item" href="javascript:void(0)">
                                <i class="ti-settings m-r-5 m-l-5"></i> Account Setting</a> --}}
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                            <div class="dropdown-divider"></div>
                        </div>
                        <div class="p-l-30 p-10">
                            <a href="{{route('profile')}}" class="btn btn-sm btn-success btn-rounded">View Profile</a>
                        </div>
                    </div>
                </li>
                <!-- ============================================================== -->
                <!-- User profile and search -->
                <!-- ============================================================== -->
            </ul>
        </div>
    </nav>
</header>
<script>
    window.load{
        alert('mmmmmmmm')
    }
    </script>
