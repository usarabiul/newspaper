<div class="deznav">
    <div class="deznav-scroll dz-scroll">
        <ul class="metismenu" id="menu">
            <li class="{{Request::is('admin/dashboard')? 'mm-active' : ''}}">
                <a href="{{route('admin.dashboard')}}" class="ai-icon {{Request::is('admin/dashboard')? 'mm-active' : ''}}" aria-expanded="false">
                    <i class="flaticon-381-networking"></i>
                    <span class="nav-text">Dashboard</span>
                </a>
            </li>
            <li class="{{Request::is('admin/posts*')? 'mm-active' : ''}}">
                <a class="has-arrow ai-icon" href="javascript:void(0);" aria-expanded="false">
                    <i class="flaticon-381-diploma"></i>
                    <span class="nav-text">Posts</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{route('admin.posts')}}"
                    class="
                    @unless (
                        Request::is('admin/posts/categories*') || 
                        Request::is('admin/posts/tags*') || 
                        Request::is('admin/posts/comments*')
                    )
                    {{Request::is('admin/posts*')? 'mm-active' : ''}}
                    @endunless
                    "
                    >All Posts</a></li>
                    <li><a href="{{route('admin.postsAction',['create'])}}">New Post</a></li>
                    <li><a href="{{route('admin.postsCategories')}}" class="{{Request::is('admin/posts/categories*')? 'mm-active' : ''}}">Categories</a></li>
                    <li><a href="{{route('admin.postsCommentsAll')}}" class="{{Request::is('admin/posts/comments*')? 'mm-active' : ''}}">Comments</a></li>
                </ul>
            </li>
            <li class="{{Request::is('admin/pages*')? 'mm-active' : ''}}">
                <a href="{{route('admin.pages')}}" class="ai-icon {{Request::is('admin/pages')? 'mm-active' : ''}}" aria-expanded="false">
                    <i class="flaticon-381-edit"></i>
                    <span class="nav-text">Pages</span>
                </a>
            </li>
           
            <li class="{{Request::is('admin/services*')? 'mm-active' : ''}}">
                <a class="has-arrow ai-icon" href="javascript:void(0);" aria-expanded="false">
                    <i class="flaticon-381-book"></i>
                    <span class="nav-text">Services</span>
                </a>
                <ul aria-expanded="false">
                    <li>
                      <a href="{{route('admin.services')}}" 
                    class="
                    @unless (
                        Request::is('admin/services/categories*') || 
                        Request::is('admin/services/tags*')
                    )
                        {{ Request::is('admin/services*') ? 'mm-active' : '' }}
                    @endunless
                    "
                    >All Services</a></li>
                    <li><a href="{{route('admin.servicesAction','create')}}">New Service</a></li>
                    <li><a href="{{route('admin.servicesCategories')}}" class="{{Request::is('admin/services/categories*')? 'mm-active' : ''}}">Categories</a></li>
                </ul>
            </li>
             <li class="{{Request::is('admin/medies*')? 'mm-active' : ''}}">
                <a href="{{route('admin.medies')}}" class="ai-icon {{Request::is('admin/medies')? 'mm-active' : ''}}" aria-expanded="false">
                    <i class="flaticon-381-cloud"></i>
                    <span class="nav-text">Media Assests</span>
                </a>
            </li>
            <li
            class="{{Request::is('admin/clients*') || Request::is('admin/brands*') || Request::is('admin/sliders*') || Request::is('admin/galleries*') || Request::is('admin/menus*') ? 'mm-active' : ''}}"
            >
                <a class="has-arrow ai-icon" href="javascript:void(0);" aria-expanded="false">
                    <i class="flaticon-381-app"></i>
                    <span class="nav-text">General Widget</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{route('admin.clients')}}" class="{{Request::is('admin/clients*')? 'mm-active' : ''}}" >Clients</a></li>
                    <li><a href="{{route('admin.brands')}}" class="{{Request::is('admin/brands*')? 'mm-active' : ''}}">Brands</a></li>
                    <li><a href="{{route('admin.sliders')}}" class="{{Request::is('admin/sliders*')? 'mm-active' : ''}}">Sliders</a></li>
                    <li><a href="{{route('admin.galleries')}}" class="{{Request::is('admin/galleries*')? 'mm-active' : ''}}">Galleries</a></li>
                    <li><a href="{{route('admin.menus')}}" class="{{Request::is('admin/menus*')? 'mm-active' : ''}}">Menu Setting</a></li>
                </ul>
            </li>
            <li class="{{Request::is('admin/users*')? 'mm-active' : ''}}">
                <a class="has-arrow ai-icon" href="javascript:void(0);" aria-expanded="false">
                    <i class="flaticon-381-user"></i>
                    <span class="nav-text">Users Manage</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{route('admin.usersAdmin')}}" class="{{Request::is('admin/users/admin*')? 'mm-active' : ''}}">Admin Users</a></li>
                    <li><a href="{{route('admin.usersCustomer')}}" class="{{Request::is('admin/users/customer*')? 'mm-active' : ''}}">All Users</a></li>
                    <li><a href="{{route('admin.subscribes')}}">Subscribes List</a></li>
                </ul>
            </li>
            <li class="{{Request::is('admin/setting*')? 'mm-active' : ''}}">
                <a class="has-arrow ai-icon" href="javascript:void(0);" aria-expanded="false">
                    <i class="flaticon-381-controls-2"></i>
                    <span class="nav-text">Apps Setting</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{route('admin.setting','general')}}" class="{{Request::is('admin/setting/general*')? 'mm-active' : ''}}">General Setting</a></li>
                    <li><a href="{{route('admin.setting','mail')}}" class="{{Request::is('admin/setting/mail*')? 'mm-active' : ''}}" >Mail Setting</a></li>
                    <li><a href="{{route('admin.setting','sms')}}" class="{{Request::is('admin/setting/sms*')? 'mm-active' : ''}}">SMS Setting</a></li>
                    <li><a href="{{route('admin.setting','social')}}" class="{{Request::is('admin/setting/social*')? 'mm-active' : ''}}" >Social Setting</a></li>
                </ul>
            </li>
        </ul>
        <div class="copyright">
            <p><b>Help:</b> +8801743988622</p>
        </div>
    </div>
</div>

 
 {{--
 <!-- BEGIN: Main Menu-->
   <div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
     <div class="main-menu-content">
       <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
         <li class=" navigation-header"><span>General </span><i class="feather icon-minus" ></i>
         </li>
         <li class=" nav-item {{Request::is('admin/dashboard')? 'active' : ''}}">
          <a href="{{route('admin.dashboard')}}"><i class="fas fa-th-large"></i><span class="menu-title" data-i18n="Email Application">Dashboard</span></a>
         </li>

         <li class=" nav-item {{Request::is('admin/my-profile')? 'active' : ''}}">
          <a href="{{route('admin.myProfile')}}"><i class="fas fa-user-tie"></i><span class="menu-title" data-i18n="Email Application">My Profile</span></a>
         </li>

         <!--Permission Check List Menus Start-->

         @if($roles = Auth::user()->permission)

         @if(
         isset(json_decode($roles->permission, true)['posts']['list']) || 
         isset(json_decode($roles->permission, true)['postsOther']['list']) 
         )
         <li class="nav-item {{Request::is('admin/posts*')? 'active' : ''}}">
          <a href="#">
          <i class="fas fa-file-alt"></i>
          <span class="menu-title" data-i18n="Dashboard">Posts </span>
          <!-- <span class="badge badge badge-primary badge-pill float-right mr-2">3 </span> -->
          </a>
           <ul class="menu-content">

             @isset(json_decode($roles->permission, true)['posts']['list'])
             <li class="
             @if( Request::is('admin/posts/categories*') || Request::is('admin/posts/tags*') || Request::is('admin/posts/comments*') )
             @else
             {{Request::is('admin/posts*')? 'active' : ''}}
             @endif
             ">
              <a class="menu-item" href="{{route('admin.posts')}}" >All Posts </a>
             </li>
             @endisset

             @isset(json_decode($roles->permission, true)['posts']['add'])
             <li><a class="menu-item" href="{{route('admin.postsAction',['create'])}}" >New Post </a>
             </li>
             @endisset

             @isset(json_decode($roles->permission, true)['postsOther']['category'])
             <li class="{{Request::is('admin/posts/categories*')? 'active' : ''}}">
              <a class="menu-item" href="{{route('admin.postsCategories')}}" >Categories </a>
             </li>
             @endisset

             @isset(json_decode($roles->permission, true)['postsOther']['tags'])
             <li class="{{Request::is('admin/posts/tags*')? 'active' : ''}}">
              <a class="menu-item" href="{{route('admin.postsTags')}}">Tags </a>
             </li>
             @endisset

             @isset(json_decode($roles->permission, true)['postsOther']['comments'])
             <li class="{{Request::is('admin/posts/comments*')? 'active' : ''}}">
              <a class="menu-item" href="{{route('admin.postsCommentsAll')}}">Comments </a>
             </li>
             @endisset
           </ul>
         </li>
         @endif

         @isset(json_decode($roles->permission, true)['pages']['list'])
          <li class="nav-item {{Request::is('admin/pages*')? 'active' : ''}}"><a href="{{route('admin.pages')}}"><i class="fas fa-copy"></i><span class="menu-title">Pages</span></a>
         </li>
         @endisset

         @isset(json_decode($roles->permission, true)['medies']['list'])
         <li class="nav-item {{Request::is('admin/medies*')? 'active' : ''}}"><a href="{{route('admin.medies')}}"><i class="fas fa-images"></i><span class="menu-title">Medias Library</span></a>
         </li>
         @endisset
        
        

         @if(
         isset(json_decode($roles->permission, true)['services']['list']) ||  
         isset(json_decode($roles->permission, true)['servicesOthers']['category']) 
         )
         <li class=" nav-item"><a href="#"><i class="fas fa-stream"></i><span class="menu-title" >Services </span></a>
           <ul class="menu-content">
             
            @isset(json_decode($roles->permission, true)['services']['list'])
             <li class="
             @if( Request::is('admin/services/categories*'))
             @else
             {{Request::is('admin/services*')? 'active' : ''}}
             @endif
             "><a class="menu-item" href="{{route('admin.services')}}">All Services</a>
             </li>
             @endisset

             @isset(json_decode($roles->permission, true)['services']['add'])
             <li><a class="menu-item" href="{{route('admin.servicesAction','create')}}" >New Service</a>
             </li>
             @endisset

              @isset(json_decode($roles->permission, true)['servicesOthers']['category'])
             <li class="{{Request::is('admin/services/categories*')? 'active' : ''}}"><a class="menu-item" href="{{route('admin.servicesCategories')}}">Categories</a>
             </li>
             @endisset

           </ul>
         </li>
         @endif


        
        @if(
        isset(json_decode($roles->permission, true)['clients']['list']) ||  
         isset(json_decode($roles->permission, true)['brands']['list']) ||
         isset(json_decode($roles->permission, true)['sliders']['list']) ||
         isset(json_decode($roles->permission, true)['galleries']['list']) ||
         isset(json_decode($roles->permission, true)['menus']['list']) ||
         isset(json_decode($roles->permission, true)['themeSetting']['list'])
        )
        
         <li class=" navigation-header"><span style="color: #009688;font-weight: bold;">General Unit </span><i class=" feather icon-minus" ></i>
         </li>
         

         @isset(json_decode($roles->permission, true)['clients']['list'])
         <li class=" nav-item {{Request::is('admin/clients*')? 'active' : ''}}"><a href="{{route('admin.clients')}}"><i class="fas fa-user-tie"></i><span class="menu-title">Clients</span></a>
         </li>
         @endisset

         @isset(json_decode($roles->permission, true)['brands']['list'])
         <li class=" nav-item {{Request::is('admin/brands*')? 'active' : ''}}"><a href="{{route('admin.brands')}}"><i class="fas fa-chess-rook"></i><span class="menu-title">Brands</span></a>
         </li>
         @endisset

         @isset(json_decode($roles->permission, true)['sliders']['list'])
         <li class=" nav-item {{Request::is('admin/sliders*')? 'active' : ''}}"><a href="{{route('admin.sliders')}}"><i class="fas fa-chalkboard"></i><span class="menu-title">Sliders</span></a>
         </li>
         @endisset

         @isset(json_decode($roles->permission, true)['galleries']['list'])
         <li class=" nav-item {{Request::is('admin/galleries*')? 'active' : ''}}"><a href="{{route('admin.galleries')}}"><i class="fas fa-images"></i><span class="menu-title">Galleries</span></a>
         </li>
         @endisset

         @isset(json_decode($roles->permission, true)['menus']['list'])
         <li class=" nav-item {{Request::is('admin/menus*')? 'active' : ''}}"><a href="{{route('admin.menus')}}"><i class="fas fa-bars"></i><span class="menu-title">Menus Setting</span></a>
         </li>
         @endisset

         @isset(json_decode($roles->permission, true)['themeSetting']['list'])
         <li class=" nav-item {{Request::is('admin/theme-setting*')? 'active' : ''}}"><a href="{{route('admin.themeSetting')}}"><i class="fa-solid fa-sliders"></i><span class="menu-title">Theme Setting</span></a>
         </li>
         @endisset
        
        @endif
        
        
        @if(
        isset(json_decode($roles->permission, true)['adminUsers']['list']) ||  
         isset(json_decode($roles->permission, true)['adminRoles']['list']) ||
         isset(json_decode($roles->permission, true)['users']['list']) ||
         isset(json_decode($roles->permission, true)['subscribe']['list']) 
        )

         <li class=" navigation-header"><span style="color: #00bcd4;font-weight: bold;">Users Management </span><i class="feather icon-droplet feather icon-minus" data-toggle="tooltip" data-placement="right" data-original-title="UI"></i>
         </li>
         @isset(json_decode($roles->permission, true)['adminUsers']['list'])
         <li class=" nav-item {{Request::is('admin/users/admin*')? 'active' : ''}}">
          <a href="{{route('admin.usersAdmin')}}"><i class="fas fa-user"></i><span class="menu-title" >Administrator Users </span></a>
         </li>
         @endisset

         @isset(json_decode($roles->permission, true)['adminRoles']['list'])
         <li class=" nav-item {{Request::is('admin/users/role*')? 'active' : ''}}">
          <a href="{{route('admin.userRoles')}}"><i class="fas fa-ruler-combined"></i><span class="menu-title" >Roles Users </span></a>
         </li>
         @endisset

         @isset(json_decode($roles->permission, true)['users']['list'])
         <li class=" nav-item {{Request::is('admin/users/customer*')? 'active' : ''}}">
          <a href="{{route('admin.usersCustomer')}}"><i class="fas fa-users"></i><span class="menu-title" >Customer Users </span></a>
         </li>
         @endisset


         @isset(json_decode($roles->permission, true)['subscribe']['list'])
         <li class=" nav-item {{Request::is('admin/subscribes*')? 'active' : ''}}">
          <a href="{{route('admin.subscribes')}}"><i class="fas fa-user-tag"></i><span class="menu-title" >Subscribe Users </span></a>
         </li>
         @endisset

         @endif
          
        
        @if(
        isset(json_decode($roles->permission, true)['appsSetting']['general']) ||  
         isset(json_decode($roles->permission, true)['appsSetting']['mail']) ||
         isset(json_decode($roles->permission, true)['appsSetting']['sms']) ||
         isset(json_decode($roles->permission, true)['appsSetting']['social']) 
        )

         <li class=" navigation-header"><span style="color: #000000;font-weight: bold;">Apps Setting </span><i class=" feather icon-minus" ></i>
         </li>
         @isset(json_decode($roles->permission, true)['appsSetting']['general'])
         <li class="nav-item {{Request::is('admin/setting/general*')? 'active' : ''}}">
            <a href="{{route('admin.setting','general')}}">
              <i class="fa fa-cog"></i>
              <span class="menu-title" >General Setting</span>
            </a>
         </li>
         @endisset

         @isset(json_decode($roles->permission, true)['appsSetting']['mail'])
         <li class=" nav-item {{Request::is('admin/setting/mail*')? 'active' : ''}}">
            <a href="{{route('admin.setting','mail')}}">
              <i class="fas fa-envelope"></i>
              <span class="menu-title" >Mail Setting</span>
            </a>
         </li>
         @endisset

         @isset(json_decode($roles->permission, true)['appsSetting']['sms'])
          <li class=" nav-item {{Request::is('admin/setting/sms*')? 'active' : ''}}">
            <a href="{{route('admin.setting','sms')}}">
              <i class="fas fa-comments"></i>
              <span class="menu-title">SMS Setting</span>
            </a>
         </li>
         @endisset

         @isset(json_decode($roles->permission, true)['appsSetting']['social'])
          <li class=" nav-item {{Request::is('admin/setting/social*')? 'active' : ''}}">
            <a href="{{route('admin.setting','social')}}">
              <i class="fab fa-codepen"></i>
              <span class="menu-title">Social Setting</span>
            </a>
         </li>
         @endisset
         
         @endif


         @endif
         <li class=" nav-item">
          <a href="{{route('admin.setting','cache-clear')}}">
            <i class="fas fa-broom"></i>
            <span class="menu-title">Cache Clear </span>
          </a>
         </li>

         <!--Permission Check List Menus End-->

         <li class=" nav-item">
          <a href="{{route('admin.setting','document')}}">
            <i class="fa fa-folder"></i>
            <span class="menu-title">Documentation </span>
          </a>
         </li>

       </ul>
       <div style="padding: 15px;text-align: center;border: 1px solid #e5e7ec;font-size: 20px;">
         <p>Support Center<br>Contact Us<br><a href="tel:+8801628092045">+8801628-092045</a></p>
       </div>
     </div>
   </div>
<!-- END: Main Menu-->
--}}