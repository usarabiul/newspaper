@extends(welcomeTheme().'layouts.app') @section('title')
<title>{{websiteTitle('Search')}}</title>
@endsection @section('SEO')
<meta name="title" property="og:title" content="{{websiteTitle('Search')}}" />
        <meta name="description" property="og:description" content="{!!general()->meta_description!!}" />
        <meta name="keywords" content="{{general()->meta_keyword}}" />
        <meta name="image" property="og:image" content="{{asset(general()->logo())}}" />
        <meta name="url" property="og:url" content="{{route('search')}}" />
        <link rel="canonical" href="{{route('search')}}">
@endsection @push('css')
<style>

</style>
@endpush 

@section('contents')

<div class="blogCompany">
    <div class="container">
        <div class="title">
            <ul class="breadcrumb">
                <li><a href="{{route('index')}}">
                        হোম 
                    </a></li>/
                <li>
                    অনুসন্ধান
                </li>
            </ul>
            <h1>
                অনুসন্ধান
                :
                {{request()->search}}
            </h1>
        </div>
		<div class="row">
		<div class="col-lg-8 col-md-7 col-sm-12 col-xs-12">
            @foreach($posts as $post)
            <div class="ctgListGrid">
                <div class="row">
                    <div class="col-md-3">
                        <a href="{{$post->viewLink()}}"><img src="{{asset($post->image())}}" alt="{{$post->name}}"/></a>
                    </div>
                    <div class="col-md-9">
                        <div class="text">
                            <h4>
                            <a href="{{$post->viewLink()}}">
                                {{$post->name}}
                            </a>
                            </h4>
                            @if($post->short_description)
                            <p>
                               {{Str::limit($post->short_description,200)}}
                            </p>
                            @endif
                            <i>
                                {{formatDateOutputBN($post->created_at,'d F, Y')}}
                            </i>
                             - <span>
                             @if($ctg =$post->postCategories->first())
                             <a href="">
                             {{$ctg->name}}
                             </a>
                             @endif
                             </span>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
			<!-- pagination -->
			{{$posts->links(welcomeTheme().'blogs.pagination')}}
		</div>
		<div class="col-lg-4 col-md-5  col-sm-12 col-xs-12">
			@include(welcomeTheme().'blogs.includes.sideBar')
		</div>
		</div>
	</div>
</div>


@endsection 
@push('js') @endpush