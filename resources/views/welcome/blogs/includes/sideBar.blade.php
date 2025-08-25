<div class="blog-sidebar">
    <div class="sidebarAds">
        <img src="https://ready.mdrabiul.com/newspaper/demo4/assets/images/adssq.gif" alt="ads">
    </div>
	<hr>
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
                        <a href="{{route('blogView',$post->slug?:Str::slug($post->name))}}">
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
                      <a href="{{route('blogView',$post->slug?:Str::slug($post->name))}}">
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
    <hr>
	<div class="sidebarAds">
        <img src="https://ready.mdrabiul.com/newspaper/demo4/assets/images/adssq.gif" alt="ads">
    </div>
</div> 
