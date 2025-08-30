@extends(welcomeTheme().'layouts.app') @section('title')
<title>{{websiteTitle($category->seo_title?:$category->name)}}</title>
@endsection @section('SEO')
<meta name="title" property="og:title" content="{{websiteTitle($category->seo_title?:$category->name)}}" />
<meta name="description" property="og:description" content="{!!$category->seo_description?:general()->meta_description!!}" />
<meta name="keywords" content="{{$category->seo_keyword?:general()->meta_keyword}}" />
<meta name="image" property="og:image" content="{{asset($category->image())}}" />
<meta name="url" property="og:url" content="{{$category->viewLink()}}" />
<link rel="canonical" href="{{$category->viewLink()}}">
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
                <li>{{$category->name}}</li>
            </ul>
            <h1>{{$category->name}}</h1>
        </div>
		<div class="row">
    		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    		    <div class="row">
    		        <div class="col-md-6">
    		            @foreach($posts->take(1) as $post)
    		             <div class="ctgFeaturedNews">
    		                 <div class="image">
    		                     <a href="{{$post->viewLink()}}">
    		                         <img src="{{asset($post->image())}}">
    		                     </a>
    		                 </div>
    		                 <div class="text">
    		                     <h3>
    		                         <a href="{{$post->viewLink()}}">
    		                             {{$post->name}}
    		                         </a>
    		                     </h3>
    		                     @if($post->short_description)
                                <p>
                                   {{Str::limit($post->short_description,200)}}
                                </p>
                                @endif
    		                 </div>
    		             </div>
    		             @endforeach
    		        </div>
    		        <div class="col-md-6">
    		            <div class="row">
                            @foreach($posts->skip(1)->take(4) as $post)
    		                <div class="col-md-6">
            		             <div class="ctgFeaturedNews">
            		                 <div class="image">
            		                     <a href="{{$post->viewLink()}}">
            		                         <img src="{{asset($post->image())}}">
            		                     </a>
            		                 </div>
            		                 <div class="title">
        		                         <a href="{{$post->viewLink()}}">
        		                             {{$post->name}}
        		                         </a>
            		                 </div>
            		             </div>
    		                </div>
                            @endforeach
    		            </div>
    		        </div>
    		    </div>
    		</div>
    		<div class="col-lg-1"></div>
    		<div class="col-lg-10 col-md-12 col-sm-12 col-xs-12">
                @foreach($posts->skip(5)->take(10) as $post)
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
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
    			<!-- pagination -->
    			{{$posts->links(welcomeTheme().'blogs.pagination')}}
    		</div>
		</div>
	</div>
</div>

@endsection @push('js') @endpush