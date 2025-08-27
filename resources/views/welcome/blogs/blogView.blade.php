@extends(welcomeTheme().'layouts.app') @section('title')
<title>{{websiteTitle($post->seo_title?:$post->name)}}</title>
@endsection @section('SEO')
<meta name="title" property="og:title" content="{{websiteTitle($post->seo_title?:$post->name)}}" />
<meta name="description" property="og:description" content="{!!$post->seo_description?:general()->meta_description!!}" />
<meta name="keywords" content="{{$post->seo_keyword?:general()->meta_keyword}}" />
<meta name="image" property="og:image" content="{{asset($post->image())}}" />
<meta name="url" property="og:url" content="{{$post->viewLink()}}" />
<link rel="canonical" href="{{$post->viewLink()}}">
@endsection @push('css')
<style>

</style>
@endpush 

@section('contents')
<div class="blogCompany">
    <div class="container">
		<div class="row">
		    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		        <ul class="breadcrumb">
                    <li><a href="{{route('index')}}">
                        হোম 
                    </a></li>/
                    @foreach($post->postCategories as $ctg)
                    <li><a href="{{$ctg->viewLink()}}">{{$ctg->name}}</a></li>
                    @endforeach
                </ul>
		    </div>
		    <div class="col-lg-8 col-md-7 col-sm-12 col-xs-12">
		        <div class="detailsBlogView">
		            <div class="blogAreaPrint">
                        <div class="blog_public_info">
                            <span>
                                <i class="fa fa-calendar"></i>
                                প্রকাশ:
                                {{ formatDateOutputBN($post->created_at, 'd F Y, h:i A') }} / </span>
                            <span>
                            <i class="fa fa-user"></i>
                            নিজস্ব প্রতিবেদক
                            <!--{{$post->user?$post->user->name:'No Author'}}					    -->
                            </span>
                        {{--<i class="fa fa-comment"></i> {{$post->postComments->where('status','active')->count()}} Comments--}}
                        </div>
                        
                        <h1 class="blog_title">{{$post->name}}</h1>
                        <div class="single_blog_thumb">
                            <img src="{{asset($post->image())}}" alt="{{$post->name}}" style="width:100%;" /> 
                        </div>
                        <div class="single-blog-content mb-3">
                            {!!$post->description!!}
                        </div>
                    </div>
                    @php
                        $url = $post->viewLink();
                        $title = urlencode($post->name);
                    @endphp
                    
                    <div class="single-blog-social">
                        <ul>
                            <li>
                                <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode($url) }}" target="_blank">
                                    <i class="fa-brands fa-facebook"></i>
                                </a>
                            </li>
                            <li>
                                <a href="https://twitter.com/intent/tweet?url={{ urlencode($url) }}&text={{ $title }}" target="_blank">
                                    <i class="fa-brands fa-x-twitter"></i>
                                </a>
                            </li>
                            <li>
                                <a href="https://www.linkedin.com/shareArticle?mini=true&url={{ urlencode($url) }}&title={{ $title }}" target="_blank">
                                    <i class="fa-brands fa-linkedin-in"></i>
                                </a>
                            </li>
                            <li>
                                <a href="https://api.whatsapp.com/send?text={{ urlencode('News Link : ' . $url) }}" target="_blank">
                                    <i class="fa-brands fa-whatsapp"></i>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0);" onclick="printBlogArea();">
                                    <i class="fa fa-print"></i>
                                </a>
                            </li>
                        </ul>
                    </div>

                    @php
                        $tags = [];
                        if (!empty($post->tags)) {
                            $tags = array_filter(array_map('trim', explode(',', $post->tags)));
                        }
                    @endphp
                    
                    @if(count($tags) > 0)
                        <div class="single-blog-tags">
                            
                            <div class="tagList">
                                <h4>টপিক:</h4>
                                @foreach($tags as $tag)
                                    <a href="{{route('topic',str_replace(' ', '+', $tag))}}">{{ $tag }}</a>
                                @endforeach
                            </div>
                        </div>
                    @endif
                    
                    <div class="single-blog-comment">
                        <div class="single-blog-comment container my-4">
                          <h4 class="mb-4">
                               মন্তব্য
                               @if($comments->total() > 0)
                               ({{en2bnNumber($comments->total())}})
                               @endif
                          </h4>
                        
                          <!-- Comment List -->
                          <div class="comment-list mb-4">
                            @foreach($comments as $comment)
                            <!-- Single Comment -->
                            <div class="d-flex mb-3">
                              <img src="{{asset($comment->image())}}" class="rounded-circle me-3" width="50" height="50" alt="{{$comment->name}}">
                              <div class="flex-grow-1">
                                <div class="d-flex justify-content-between">
                                  <h6 class="mb-0">{{$comment->name}} <small class="text-muted ms-2">{{formatDateOutputBN($comment->created_at->format('F d, Y \a\t g:ia'))}}</small></h6>
                                  <!--<button class="btn btn-sm btn-link p-0" data-bs-toggle="collapse" data-bs-target="#replyForm1">Reply</button>-->
                                </div>
                                <p class="mb-1">
                                    {!!nl2br(e($comment->description))!!}
                                </p>
                                <!--<div class="d-flex gap-2">-->
                                <!--  <button class="btn btn-outline-success btn-sm">-->
                                <!--    👍 <span class="badge bg-success text-white">12</span>-->
                                <!--  </button>-->
                                <!--  <button class="btn btn-outline-danger btn-sm">-->
                                <!--    👎 <span class="badge bg-danger text-white">3</span>-->
                                <!--  </button>-->
                                <!--</div>-->
                        
                                <!-- Reply Form -->
                                <div class="collapse mt-2" id="replyForm1">
                                  <form>
                                    <div class="mb-2">
                                      <textarea class="form-control" placeholder="Write your reply..." rows="2" required></textarea>
                                    </div>
                                    <div class="row g-2 mb-2">
                                      <div class="col-md-6">
                                        <input type="text" class="form-control" placeholder="Name" required>
                                      </div>
                                      <div class="col-md-6">
                                        <input type="email" class="form-control" placeholder="Email (optional)">
                                      </div>
                                      <div class="col-md-12">
                                        <input type="url" class="form-control" placeholder="Website (optional)">
                                      </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-sm">Post Reply</button>
                                  </form>
                                </div>
                              </div>
                            </div>
                            <!-- Repeat the comment block for more comments -->
                            @endforeach
                          </div>
                        
                          <!-- New Comment Form Toggle -->
                          <button class="btn btn-outline-primary mb-3" data-bs-toggle="collapse" data-bs-target="#newCommentForm">
                                    মন্তব্য করুন
                          </button>
                        
                          <!-- New Comment Form -->
                          <div class="collapse" id="newCommentForm">
                            <form action="{{route('blogComments',$post->slug)}}" method="post">
                            @csrf
                              <div class="mb-3">
                                 @if ($errors->has('comment'))
                                <p style="color: red; margin: 0;">{{ $errors->first('comment') }}</p>
                                @endif
                                <textarea class="form-control" placeholder="Your Comment" name="comment" rows="4" required></textarea>
                              </div>
                              <div class="row g-3 mb-3">
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="name" placeholder="Name" required>
                                    @if ($errors->has('name'))
                                    <p style="color: red; margin: 0;">{{ $errors->first('name') }}</p>
                                    @endif
                                </div>
                                <div class="col-md-6">
                                  <input type="email" class="form-control" name="email" placeholder="Email" required>
                                  @if ($errors->has('email'))
                                    <p style="color: red; margin: 0;">{{ $errors->first('email') }}</p>
                                    @endif
                                </div>
                                <div class="col-md-12">
                                    <input type="url" class="form-control" name="website" placeholder="Website (optional)">
                                    @if ($errors->has('website'))
                                        <p style="color: red; margin: 0;">{{ $errors->first('website') }}</p>
                                    @endif
                                </div>
                              </div>
                              <button type="submit" class="btn btn-primary">Post Comment</button>
                            </form>
                          </div>
                        </div>
                     </div>
                </div>
		    </div>
		    <div class="col-lg-4 col-md-5  col-sm-12 col-xs-12">
			    @include(welcomeTheme().'blogs.includes.sideBar')
		    </div>
		    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		        <div class="relatedNews">
    		        <div class="heading">
                        <span class="title">
                        @if($lPost =$post->postCategories->first())    
                        {{$lPost->name}}
                        @endif
                        আরও পড়ুন
                        </span>
                    </div>
                    
                    <div class="row ctgNewsList">
        		        @foreach($relatedPosts as $rPost)
        		        <div class="col-md-3">
            		        <div class="featured mb-3">
                                <a href="{{$rPost->viewLink()}}">
                                    <img src="{{asset($rPost->image())}}" alt="{{$rPost->name}}" />
                                    <span>{{$rPost->name}}</span>
                                </a>
                            </div>
        		        </div>
        		        @endforeach
    		        </div>
		        </div>
		    </div>
		</div>
	</div>
</div>

@endsection @push('js') @endpush