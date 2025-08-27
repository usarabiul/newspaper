@extends(welcomeTheme().'layouts.app') 
@section('title')
<title>{{websiteTitle()}}</title>
@endsection 
@section('SEO')
<meta name="title" property="og:title" content="{{general()->meta_title}}" />
<meta name="description" property="og:description" content="{!!general()->meta_description!!}" />
<meta name="keyword" property="og:keyword" content="{{general()->meta_keyword}}" />
<meta name="image" property="og:image" content="{{asset(general()->logo())}}" />
<meta name="url" property="og:url" content="{{route('index')}}" />
<link rel="canonical" href="{{route('index')}}">
@endsection 
@push('css')
<script type="application/ld+json">
    { 
    "@context": "https://schema.org", 
    "@type": "WebPage", 
    "url": "{{route('index')}}", 
    "name": "{{websiteTitle()}}",
    "author": {
        "@type": "Webpage",
        "name": "{{websiteTitle()}}"
    },
    "description": "{!!general()->meta_description!!}"
    }
</script>
@endpush 

@section('contents')
<div class="heading-news-area">
    <div class="row">
        <div class="col-md-9 ">
            <div class="row" style="margin:0 -10px;">
                <div class="col-lg-7" style="padding:10px;">
                    @if($firstNews =$latestPosts->first())
                    <div class="top-heading-news">
                        <div class="image">
                            <a href="{{$firstNews->viewLink()}}">
                                <img src="{{asset($firstNews->image())}}" alt="{{$firstNews->name}}">
                            </a>
                        </div>
                        <div class="text">
                            <h3><a href="{{$firstNews->viewLink()}}">{{$firstNews->name}}</a></h3>
                            @if($firstNews->short_description)
                            <p>
                               {{Str::limit($firstNews->short_description,200)}}
                            </p>
                            @endif
                        </div>
                    </div>
                    @endif
                </div>
                <div class="col-lg-5" style="padding:10px;">
                     <div class="heading-news-list">
                            <ul>
                                @foreach($latestPosts->skip(1) as $post)
                                <li>
                                    <a href="{{$post->viewLink()}}">
                                         <img src="{{asset($post->image())}}" alt="{{$post->name}}">
                                         <span>{{$post->name}}</span>
                                    </a> 
                                </li>
                                @endforeach
                            </ul>
                     </div>
                </div>
            </div>
        </div>
        <div class="col-md-3 ">
            <div class="sidebarAds">
                <img src="https://ready.mdrabiul.com/newspaper/demo4/assets/images/ads.jpg" alt="ads">
            </div>
            <div class="videoNews">
                <iframe width="100%" height="200" src="https://www.youtube.com/embed/oHFdN4eN7oQ" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen=""></iframe>
            </div>
        </div>
    </div>
</div>
<div class="second-line-area">
    <div class="row">
        <div class="col-lg-9 ">
            <div class="second-area-news">
                <div class="adsPost">
                    <img src="https://ready.mdrabiul.com/newspaper/demo4/assets/images/ads1.jpeg" alt="ads">
                </div>
                <div class="heading">
                    <span class="title">
                        জাতীয় 
                    </span>
                    <a href="" class="viewLink">
                       আরো
                        <i class="fa-regular fa-circle-right"></i>
                    </a>
                </div>
                <div class="newsArea">
                    <div class="row">
                        @foreach($polularPosts as $post)
                        <div class="col-md-6">
                            <div class="newsGridv1">
                                <a href="{{$post->viewLink()}}">
                                    <img src="{{asset($post->image())}}" alt="{{$post->name}}">
                                    <span>{{$post->name}}</span>
                                </a>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="news-tab">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                  <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Latest</button>
                  </li>
                  <li class="nav-item" role="presentation">
                    <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Popular</button>
                  </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                  <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <ul class="new-tab-list">
                            @foreach($latestPosts as $i=>$post)
                            <li>
                                <a href="{{$post->viewLink()}}">
                                  <span>
                                      <i class="fa fa-angles-right"></i>
                                  </span>
                                  <h4>{{$post->name}}</h4>
                                </a>
                            </li>
                            @endforeach
                        </ul>
                  </div>
                  <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                      <ul class="new-tab-list">
                          @foreach($polularPosts as $post)
                          <li>
                              <a href="{{$post->viewLink()}}">
                                  <span>
                                      <i class="fa fa-angles-right"></i>
                                  </span>
                                  <h4>
                                       {{$post->name}}
                                  </h4>
                              </a>
                          </li>
                          @endforeach
                      </ul>
                  </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="ctg-news-area">
    <div class="row">
        <div class="col-lg-9">
            <div class="row">
                @foreach($ctgThree as $ctg)
                <div class="col-lg-4">
                    <div class="ctgNewsArea">
                        <div class="heading">
                            <span class="title">{{$ctg->name}}</span>
                            <a href="{{$ctg->viewLink()}}" class="viewLink">
                                আরো
                                <i class="fa-regular fa-circle-right"></i>
                            </a>
                        </div>
                        <div class="ctgNewsList">
                            @if($news =$ctg->news->first())
                            <div class="featured">
                                <a href="{{$news->viewLink()}}">
                                    <img src="{{asset($news->image())}}" alt="{{$news->name}}" />
                                    <span>{{$news->name}}</span>
                                </a>
                            </div>
                            @endif
                            <ul>
                                @foreach($ctg->news->skip(1) as $post)
                                <li>
                                    <a href="{{$post->viewLink()}}">
                                        <img src="{{asset($post->image())}}" alt="{{$post->name}}">
                                        <span>{{$post->name}}</span>
                                    </a>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        <div class="col-lg-3">
            <div class="sidebarAds">
                <img src="https://ready.mdrabiul.com/newspaper/demo4/assets/images/adssq.gif" alt="ads">
            </div>
            <div class="archivedCalender">
                <div class="heading">
                    <span class="title">
                        Archives News
                    </span>
                </div>
                <div id="datepicker"></div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="adsPost">
                <a href="">
                    <img src="https://ready.mdrabiul.com/newspaper/demo4/assets/images/adsv.jpeg" alt="sd" />
                </a>
            </div>
        </div>
        @foreach($ctgFour as $ctg)
        <div class="col-lg-3">
            <div class="ctgNewsArea">
                <div class="heading">
                    <span class="title">{{$ctg->name}}</span>
                    <a href="{{$ctg->viewLink()}}" class="viewLink">
                       আরো
                    <i class="fa-regular fa-circle-right"></i>
                    </a>
                </div>
                <div class="ctgNewsList">
                    
                    @if($news =$ctg->news->first())
                    <div class="featured">
                        <a href="{{$news->viewLink()}}">
                            <img src="{{asset($news->image())}}" alt="{{$news->name}}" />
                            <span>{{$news->name}}</span>
                        </a>
                    </div>
                    @endif
                    <ul>
                        @foreach($ctg->news->skip(1) as $post)
                        <li>
                            <a href="{{$post->viewLink()}}">
                                <img src="{{asset($post->image())}}" alt="{{$post->name}}">
                                <span>{{$post->name}}</span>
                            </a>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

<div class="galleryNewSection">
    <div class="row">
        <div class="col-lg-9">
            <div class="row">
                <div class="col-lg-8">
                    
                    <div class="gallerySlider">
                        <div class="heading">
                            <span class="title">
                                গ্যালারি 
                            </span>
                        </div>
                        <div id="carouselExampleDark" class="carousel carousel-light slide" style="margin-top:10px;">
                          <div class="carousel-indicators">
                            <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                            <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
                            <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button>
                          </div>
                          <div class="carousel-inner">
                            @foreach($gallery as $i=>$gall)
                            <div class="carousel-item {{$i==0?'active':''}}" data-bs-interval="10000">
                              <a href="{{$gall->viewLink()}}"><img src="{{asset($gall->image())}}" class="d-block w-100" alt="{{$gall->name}}"></a>
                              <div class="carousel-caption d-none d-md-block">
                                <h5>{{$gall->name}}</h5>
                              </div>
                            </div>
                            @endforeach
                          </div>
                          <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                          </button>
                          <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                          </button>
                        </div>
                    </div>
                </div>
                @foreach($ctgOne as $ctg)
                <div class="col-lg-4">
                    <div class="galleryNewsBar">
                        <div class="heading">
                            <span class="title">{{$ctg->name}}</span>
                            <a href="{{$ctg->viewLink()}}" class="viewLink">
                               আরো
                            <i class="fa-regular fa-circle-right"></i>
                            </a>
                        </div>
                        <div class="galleryNewsList">
                            <ul> 
                                @foreach($ctg->news as $post)
                                <li>
                                    <a href="{{$post->viewLink()}}">
                                        <img src="{{asset($post->image())}}" alt="{{$post->name}}">
                                        <span>{{$post->name}}</span>
                                    </a>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        <div class="col-lg-3">
            <div class="sidebarAds">
                <img src="https://ready.mdrabiul.com/newspaper/demo4/assets/images/adssq.gif" alt="ads">
            </div>
            
            
        </div>
    </div>
</div>
@endsection 

@push('js') 

@endpush