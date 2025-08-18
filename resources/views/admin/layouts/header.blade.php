<div class="nav-header">
    <a href="index.html" class="brand-logo">
        <img class="logo-abbr" src="{{asset(general()->favicon())}}" alt="{{general()->title}}" />
        <img class="logo-compact" src="{{asset(general()->favicon())}}" alt="{{general()->title}}" />
        <span class="brand-title">BNS</span>
    </a>

    <div class="nav-control">
        <div class="hamburger"><span class="line"></span><span class="line"></span><span class="line"></span></div>
    </div>
</div>

<div class="header">
    <div class="header-content">
        <nav class="navbar navbar-expand">
            <div class="collapse navbar-collapse justify-content-between">
                <div class="header-left">
                    <div class="dashboard_bar"><span>Welcome to Bussiness!</span></div>
                </div>
                <ul class="navbar-nav header-right">
                    <!-- <li class="nav-item">
      <form>
        <div class="input-group search-area d-xl-inline-flex d-none">
          <input type="text" class="form-control" placeholder="Search here...">
          <button class="input-group-text"><i class="flaticon-381-search-2"></i></button>
        </div>
      </form>
    </li> -->
                    <li class="nav-item dropdown notification_dropdown">
                        <a class="nav-link ai-icon" href="javascript:void(0)" role="button" data-bs-toggle="dropdown">
                            <svg width="28" height="28" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M22.4604 3.84863H5.31685C4.64745 3.84937 4.00568 4.11561 3.53234 4.58895C3.059 5.06229 2.79276 5.70406 2.79202 6.37346V18.156C2.79276 18.8254 3.059 19.4672 3.53234 19.9405C4.00568 20.4138 4.64745 20.6801 5.31685 20.6808C5.54002 20.6809 5.75401 20.7697 5.91181 20.9275C6.06961 21.0853 6.15832 21.2993 6.15846 21.5224V23.3166C6.15846 23.6212 6.24115 23.9202 6.39771 24.1815C6.55427 24.4429 6.77882 24.6569 7.04744 24.8006C7.31605 24.9444 7.61864 25.0125 7.92295 24.9978C8.22726 24.9831 8.52186 24.8861 8.77536 24.7171L14.6173 20.8222C14.7554 20.7297 14.9179 20.6805 15.0841 20.6808H19.187C19.7383 20.6798 20.2743 20.4991 20.7137 20.1662C21.1531 19.8332 21.472 19.3661 21.6222 18.8357L24.8965 7.04986C24.9999 6.67457 25.0152 6.2805 24.9413 5.89831C24.8675 5.51613 24.7064 5.15615 24.4707 4.84638C24.235 4.53662 23.9309 4.28544 23.5823 4.11238C23.2336 3.93933 22.8497 3.84907 22.4604 3.84863ZM23.2733 6.6028L20.0006 18.3845C19.95 18.5612 19.8432 18.7166 19.6964 18.8272C19.5496 18.9378 19.3708 18.9976 19.187 18.9976H15.0841C14.5856 18.997 14.0981 19.1446 13.6836 19.4217L7.84168 23.3166V21.5224C7.84094 20.853 7.5747 20.2113 7.10136 19.7379C6.62802 19.2646 5.98625 18.9983 5.31685 18.9976C5.09368 18.9975 4.87969 18.9088 4.72189 18.7509C4.56409 18.5931 4.47537 18.3792 4.47524 18.156V6.37346C4.47537 6.15029 4.56409 5.9363 4.72189 5.7785C4.87969 5.6207 5.09368 5.53198 5.31685 5.53185H22.4604C22.5905 5.53218 22.7188 5.56252 22.8352 5.62052C22.9517 5.67851 23.0532 5.76259 23.1318 5.86621C23.2105 5.96984 23.2641 6.09021 23.2887 6.21797C23.3132 6.34572 23.3079 6.47742 23.2733 6.6028Z"
                                    fill="#4C8147"
                                />
                                <path
                                    d="M7.84167 11.423H12.0497C12.2729 11.423 12.487 11.3343 12.6448 11.1765C12.8027 11.0186 12.8913 10.8046 12.8913 10.5814C12.8913 10.3581 12.8027 10.1441 12.6448 9.98625C12.487 9.82842 12.2729 9.73975 12.0497 9.73975H7.84167C7.61846 9.73975 7.4044 9.82842 7.24656 9.98625C7.08873 10.1441 7.00006 10.3581 7.00006 10.5814C7.00006 10.8046 7.08873 11.0186 7.24656 11.1765C7.4044 11.3343 7.61846 11.423 7.84167 11.423Z"
                                    fill="#4C8147"
                                />
                                <path
                                    d="M15.4162 13.1064H7.84167C7.61846 13.1064 7.4044 13.1951 7.24656 13.3529C7.08873 13.5108 7.00006 13.7248 7.00006 13.9481C7.00006 14.1713 7.08873 14.3853 7.24656 14.5432C7.4044 14.701 7.61846 14.7897 7.84167 14.7897H15.4162C15.6394 14.7897 15.8534 14.701 16.0113 14.5432C16.1691 14.3853 16.2578 14.1713 16.2578 13.9481C16.2578 13.7248 16.1691 13.5108 16.0113 13.3529C15.8534 13.1951 15.6394 13.1064 15.4162 13.1064Z"
                                    fill="#4C8147"
                                />
                            </svg>
                            <span class="badge light text-white bg-primary rounded-circle">12</span>
                        </a>
                        <div class="dropdown-menu rounded dropdown-menu-end">
                            <div id="DZ_W_Notification1" class="widget-media dz-scroll p-3 height380">
                                <ul class="timeline">
                                    <li>
                                        <div class="timeline-panel">
                                            <div class="media me-2">
                                                <img alt="image" width="50" src="" />
                                            </div>
                                            <div class="media-body">
                                                <h6 class="mb-1">Dr sultads Send you Photo</h6>
                                                <small class="d-block">29 July 2020 - 02:26 PM</small>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="timeline-panel">
                                            <div class="media me-2 media-info">
                                                KG
                                            </div>
                                            <div class="media-body">
                                                <h6 class="mb-1">Resport created successfully</h6>
                                                <small class="d-block">29 July 2020 - 02:26 PM</small>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="timeline-panel">
                                            <div class="media me-2 media-success">
                                                <i class="fa fa-home"></i>
                                            </div>
                                            <div class="media-body">
                                                <h6 class="mb-1">Reminder : Treatment Time!</h6>
                                                <small class="d-block">29 July 2020 - 02:26 PM</small>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="timeline-panel">
                                            <div class="media me-2">
                                                <img alt="image" width="50" src="" />
                                            </div>
                                            <div class="media-body">
                                                <h6 class="mb-1">Dr sultads Send you Photo</h6>
                                                <small class="d-block">29 July 2020 - 02:26 PM</small>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="timeline-panel">
                                            <div class="media me-2 media-danger">
                                                KG
                                            </div>
                                            <div class="media-body">
                                                <h6 class="mb-1">Resport created successfully</h6>
                                                <small class="d-block">29 July 2020 - 02:26 PM</small>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="timeline-panel">
                                            <div class="media me-2 media-primary">
                                                <i class="fa fa-home"></i>
                                            </div>
                                            <div class="media-body">
                                                <h6 class="mb-1">Reminder : Treatment Time!</h6>
                                                <small class="d-block">29 July 2020 - 02:26 PM</small>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <a class="all-notification" href="javascript:void(0)">See all notifications <i class="ti-arrow-right"></i></a>
                        </div>
                    </li>
                    <li class="nav-item dropdown notification_dropdown">
                        <a class="nav-link" href="#" >
                            <i class="flaticon-381-calendar-1"></i> 
                        </a>
                    </li>
                    <li class="nav-item dropdown header-profile">
                        <a class="nav-link" href="javascript:void(0)" role="button" data-bs-toggle="dropdown">
                            <img src="{{asset(Auth::user()->image())}}" width="20" alt="/" />
                            <div class="header-info">
                                <span class="text-black"><strong>{{Auth::user()->name}}</strong></span>
                                <p class="fs-12 mb-0">Administrator</p>
                            </div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end">
                            <a href="{{route('admin.myProfile')}}" class="dropdown-item ai-icon">
                                <svg
                                    id="icon-user1"
                                    xmlns="http://www.w3.org/2000/svg"
                                    class="text-primary"
                                    width="18"
                                    height="18"
                                    viewBox="0 0 24 24"
                                    fill="none"
                                    stroke="currentColor"
                                    stroke-width="2"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                >
                                    <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                    <circle cx="12" cy="7" r="4"></circle>
                                </svg>
                                <span class="ms-2">Profile </span>
                            </a>
                            <a href="javascript:void(0)" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="dropdown-item ai-icon">
                                <svg
                                    id="icon-logout"
                                    xmlns="http://www.w3.org/2000/svg"
                                    class="text-danger"
                                    width="18"
                                    height="18"
                                    viewBox="0 0 24 24"
                                    fill="none"
                                    stroke="currentColor"
                                    stroke-width="2"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                >
                                    <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                                    <polyline points="16 17 21 12 16 7"></polyline>
                                    <line x1="21" y1="12" x2="9" y2="12"></line>
                                </svg>
                                <span class="ms-2">Logout </span>
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</div>



{{--
<!-- BEGIN: Header-->
 <nav class="header-navbar navbar-expand-lg navbar navbar-with-menu fixed-top navbar-semi-dark navbar-shadow">
   <div class="navbar-wrapper">
     <div class="navbar-header">
       <ul class="nav navbar-nav flex-row">
         <li class="nav-item mobile-menu d-lg-none mr-auto"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#">
          <!-- <i class="fa-2x fas fa-bars"></i> -->
          <i class="fa-2x fas fa-arrow-alt-circle-right"></i>
          </a>
          </li>
          <li class="nav-item mr-auto">
          <a class="navbar-brand" href="{{route('index')}}">
            <img class="brand-logo" src="{{asset(general()->favicon())}}" style="max-height:30px;" />
             <h2 class="brand-text">NIT-B</h2>
           </a>
          </li>
         <li class="nav-item d-none d-lg-block nav-toggle"><a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse" style="    color: white;"><i class="fa-2x fas fa-bars"></i></a></li>
         <!-- <li class="nav-item d-lg-none"><a class="nav-link open-navbar-container" data-toggle="collapse" data-target="#navbar-mobile"><i class="fa fa-ellipsis-v"></i></a></li> -->
       </ul>
     </div>
     <div class="navbar-container content">
       <div class="collapse navbar-collapse" id="navbar-mobile">
         <ul class="nav navbar-nav mr-auto float-left">
           
           <li class="nav-item d-none d-md-block">
            <a class="nav-link nav-link-expand" href="#">
              <i class="fas fa-compress"></i>
            </a>
          </li>
          <li class="nav-item d-none d-md-block">
            <a href="{{route('index')}}" class="nav-link">Visit Website</a>
          </li>
         </ul>
         <ul class="nav navbar-nav float-right">

           <li class="dropdown dropdown-user nav-item"><a class="dropdown-toggle nav-link dropdown-user-link" href="javascript:void(0)" data-toggle="dropdown">
               <div class="avatar avatar-online">
                <img src="{{route('imageView2',['profile',Auth::user()->imageName(),'w'=>60,'h'=>60])}}" alt="avatar" /><i></i>
              </div>
               <span class="user-name">{{Str::limit(Auth::user()->name,15)}}</span></a>
               <div class="dropdown-menu dropdown-menu-right">
                <a class="dropdown-item" href="{{route('customer.dashboard')}}" style="min-width: 220px"><i class="fas fa-th-large"></i> My Dashboard </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="{{route('admin.myProfile')}}" style="min-width: 220px"><i class="fa fa-user"></i> My Profile </a>

                 <div class="dropdown-divider"></div>
                 
                 <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                  <i class="fas fa-power-off"></i> Logout 
                  </a>
                  
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
                
               </div>
           </li>
         </ul>
       </div>
     </div>
   </div>
 </nav>
 <!-- END: Header-->
--}}