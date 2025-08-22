<footer>
    <div class="main-footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="logo">
                        <a href="{{route('index')}}"><img src="{{asset(general()->logo())}}" alt="{{general()->title}}"></a>
                    </div>
                    <h3>
                        Editor : Sr aliz edison
                    </h3>
                    <p>
                    <b>Head Office</b>   {!!general()->address_one!!} <b>E-mail</b> {!!general()->email!!}, <b>Helpline</b> {!!general()->mobile!!}
                    </p>
                </div>
                <div class="col-lg-3 col-md-3 col-6">
                    @if($menu = menu('Footer Two'))
                    <div class="footer-widget">
                        <ul>
                            @foreach($menu->subMenus as $menu)
                            <li><a href="{{asset($menu->menuLink())}}">{{$menu->menuName()}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                </div>
                <div class="col-lg-3 col-md-3 col-6">
                    @if($menu = menu('Footer Three'))
                    <div class="footer-widget">
                        <ul>
                            @foreach($menu->subMenus as $menu)
                            <li><a href="{{asset($menu->menuLink())}}">{{$menu->menuName()}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                </div>
                <div class="col-lg-2">
                    <div class="appsLink">
                        <h5>Download Apps</h5>
                        <a href=""><img src="https://ready.mdrabiul.com/newspaper/demo4/assets/images/android.webp" alt="apps"></a>
                        <a href=""><img src="https://ready.mdrabiul.com/newspaper/demo4/assets/images/ios-app.webp" alt="apps"></a>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
    <div class="bottom-footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="copyright">
                        @if(general()->copyright_text)
                        <p>
                        {!!general()->copyright_text!!}
                        </p>
                        @endif
                    </div>
                </div>
                <div class="col-lg-8">
                    @if($menu = menu('Footer Bottom'))
                    <div class="bottomMenu">
                        <ul>
                            @foreach($menu->subMenus as $menu)
                            <li><a href="{{asset($menu->menuLink())}}">{{$menu->menuName()}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                </div>
            </div>
            
        </div>
    </div>
</footer>