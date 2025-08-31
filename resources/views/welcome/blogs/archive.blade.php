@extends(welcomeTheme().'layouts.app') @section('title')
<title>{{websiteTitle('Search')}}</title>
@endsection @section('SEO')
<meta name="title" property="og:title" content="{{websiteTitle('Search')}}" />
        <meta name="description" property="og:description" content="{!!general()->meta_description!!}" />
        <meta name="keywords" content="{{general()->meta_keyword}}" />
        <meta name="image" property="og:image" content="{{asset(general()->logo())}}" />
        <meta name="url" property="og:url" content="{{route('archive',$invalidDate)}}" />
        <link rel="canonical" href="{{route('archive',$invalidDate)}}">
@endsection @push('css')
<style>
.breadcrumb {
    margin: 10px 0;
}
.breadcrumb li {
    margin: 0 10px;
}
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
                    আর্কাইভ
                </li>
            </ul>
            <h1>
                আর্কাইভ
                :
                @if($invalidDate)
                {{formatDateOutputBN($day,'d F, Y')}}
                @endif
            </h1>
        </div>
        <div class="archiveNewsArea">
            @if($invalidDate)
            <div class="row">
                @foreach($categories as $ctg)
        		<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <div class="archiveCtg">
                        <div class="heading">
                            <span class="title">
                                {{$ctg->name}}
                            </span>
                        </div>
                        <div class="archiveNew">
                            <ul>
                                @foreach($ctg->news as $post)
                                <li>
                                    <a href="{{$post->viewLink()}}">
                                        <img src="{{asset($post->image())}}" alt="{{$post->name}}" />
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
            @else
            <h4>date format is invalid</h4>
            @endif
    		
		</div>
	</div>
</div>

@endsection 
@push('js') @endpush