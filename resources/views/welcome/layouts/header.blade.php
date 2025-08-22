<header class="sticky-header">
    <div class="top-header">
        <div class="container">
            <div class="topAds">
                <img src="https://ready.mdrabiul.com/newspaper/demo4/assets/images/topads.gif" alt="advertisment">
            </div>
        </div>
    </div>
    <div class="middle-header mobilemodehide">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div class="logo text-center">
                        <a href="{{route('index')}}"><img src="{{asset(general()->logo())}}" alt="{{general()->title}}"></a>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="row">
                        <div class="col-lg-5 col-xl-4">
                            <div class="toda mt-2">
                                {{formatDateOutputBN(Carbon\Carbon::now(),'l, d F, Y')}}
                            </div>
                        </div>
                        <div class="col-lg-5 col-xl-5">
                            <form action="{{route('search')}}">
                                <div class="input-group">
                                    <input type="text" class="form-control" name="search" value="{{request()->search}}" placeholder="Search here">
                                    <button type="submit" class="btn" style="background: white;color: black;border-color: #d7ebef;"><i class="fa fa-search"></i></button>
                                </div>
                            </form>
                            @if(general()->facebook_link || general()->twitter_link || general()->linkedin_link || general()->youtube_link || general()->instagram_link || general()->pinterest_link)
                            <div class="social">
                                Social: 
                                @if(general()->facebook_link)
                                <a href=""><i class="fa-brands fa-facebook"></i></a>
                                @endif
                                @if(general()->twitter_link)
                                <a href=""><i class="fa-brands fa-x-twitter"></i></a>
                                @endif
                                @if(general()->linkedin_link)
                                <a href=""><i class="fa-brands fa-linkedin-in"></i></a>
                                @endif
                                @if(general()->youtube_link)
                                <a href=""><i class="fa-brands fa-youtube"></i></a>
                               @endif
                                @if(general()->instagram_link)
                                <a href=""><i class="fa-brands fa-instagram"></i></a>
                                @endif
                                @if(general()->pinterest_link)
                                <a href=""><i class="fa-brands fa-pinterest"></i></a>
                                @endif
                            </div>
                            @endif
                        </div>
                        <div class="col-lg-2 col-xl-3 text-center">
                            <div class="mt-3">
                                <a href="" class="btn btn-sm epaperBtn">
                                    ই-পেপার
                                </a>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
    <div class="main-header">
        <div class="container">
            <div class="destopmodehide">
                <div class="row">
                    <div class="col-8">
                        <div class="logo">
                            <a href="{{route('index')}}"><img src="{{asset(general()->logo())}}" alt="{{general()->title}}"></a>
                        </div>
                    </div>
                    <div class="col-4 text-end">
                        <span class="mobile-search-icon me-3" style="font-size:24px; cursor:pointer;">
                            <i class="fa fa-search"></i>
                        </span>
                        <span class="moble-menus-models mt-2" style="display: inline-block;font-size: 24px;"><i class="fa fa-bars"></i></span>
                    </div>
                </div>
            </div>
            <div class="header-menu mobilemodehide">
                @if($menu = menu('Header Menus'))
                <ul>
                    @foreach($menu->subMenus as $menu)
                    <li><a href="{{asset($menu->menuLink())}}">{{$menu->menuName()}}</a> </li>
                    @endforeach
                </ul>
                @endif
            </div>
        </div>
    </div>
</header>
<!-- Mobile Search Overlay (Inside header only) -->
<div id="mobileSearchOverlay" style="display:none; position: fixed; top:0; left:0; width:100%; height:100%; background:rgba(0,0,0,0.8); z-index:2000;">
    <div class="container h-100 d-flex align-items-center justify-content-center">
        <form action="{{route('search')}}">
            <div class="row w-100">
                <div class="col-2 d-flex align-items-center justify-content-center">
                    <span id="closeMobileSearch" style="font-size:24px; cursor:pointer; color:white;">
                        <i class="fa fa-times"></i>
                    </span>
                </div>
                <div class="col-8 d-flex align-items-center">
                    <input type="text" class="form-control" name="search" value="{{request()->search}}" placeholder="Search here...">
                </div>
                <div class="col-2 d-flex align-items-center justify-content-center">
                    <button class="btn btn-light">
                        <i class="fa fa-search"></i>
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
<div class="mobile-menu-side-modals side-modals side-modalsBar right">
    <a href="javascript:void(0)" class="overlay side-modals-close"></a>
    <div class="cart-inner">
        <div class="cart_top">
            <div class="row" style="margin: 0;">
                <div class="col-10" style="padding: 0;">
                    <h3 style="margin: 0; font-size: 20px;font-family: sans-serif; font-weight: 600;"><img src="{{asset(general()->logo())}}" alt="{{general()->title}}" style="max-height: 40px;"></h3>
                </div>
                <div class="col-2" style="padding: 0; text-align: center;">
                    <a href="javascript:void(0)" class="side-modals-close" style="color: gray; margin-left: 13px;margin-top: 5px;display: inline-block;">
                        <i class="fa fa-times" aria-hidden="true"></i>
                    </a>
                </div>
            </div>
        </div>
        <div class="cart_media">
            <div class="primarymenu" style="display: block;">
                <div class="multi-lavel">
                    @if($menu = menu('Header Menus'))
                    <ul id="menu" class="metismenu">
                        @foreach($menu->subMenus as $menu)
                        <li><a href="{{asset($menu->menuLink())}}">{{$menu->menuName()}}</a> </li>
                        @endforeach
                    </ul>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>