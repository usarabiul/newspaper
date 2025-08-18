@extends(adminTheme().'layouts.app') 
@section('title')
<title>{{websiteTitle('Posts List')}}</title>
@endsection 

@push('css')
<style type="text/css"></style>
@endpush 

@section('contents')
<div class="row">
    <div class="col-md-6">
        <div class="page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active"><a href="{{route('admin.dashboard')}}">Dashboard </a></li>
                <li class="breadcrumb-item">Posts List</li>
            </ol>
        </div>
    </div>
    <div class="col-md-6">
        <div class="text-start text-md-end mb-3">
            <a href="{{route('admin.postsAction','create')}}" class="btn btn-info"><i class="fa-solid fa-plus"></i> Add Post</a>
            <a href="{{route('admin.posts')}}" class="btn btn-success">
                <i class="fa-solid fa-rotate"></i>
            </a>
        </div>
    </div>
</div>



@include(adminTheme().'alerts')


<div class="card">
    <div class="card-header" style="border-bottom: 1px solid #e3ebf3;">
        <h4 class="card-title">Posts List</h4>
    </div>
    <div class="card-content">
        <div class="card-body">
            <form action="{{route('admin.posts')}}">
                <div class="row">
                    <div class="col-md-6 mb-1">
                        <div class="input-group">
                            <input type="date" name="startDate" value="{{request()->startDate?Carbon\Carbon::parse(request()->startDate)->format('Y-m-d') :''}}" class="form-control {{$errors->has('startDate')?'error':''}}" />
                            <input type="date" value="{{request()->endDate?Carbon\Carbon::parse(request()->endDate)->format('Y-m-d') :''}}" name="endDate" class="form-control {{$errors->has('endDate')?'error':''}}" />
                        </div>
                    </div>
                    <div class="col-md-6 mb-1">
                        <div class="input-group">
                            <input type="text" name="search" value="{{request()->search?request()->search:''}}" placeholder="Post Name, Category Name" class="form-control {{$errors->has('search')?'error':''}}" />
                            <button type="submit" class="btn btn-success btn-sm rounded-0">Search</button>
                        </div>
                    </div>
                </div>
            </form>
            <hr>
            <form action="{{route('admin.posts')}}">
                <div class="row">
                    <div class="col-md-4">
                        <div class="input-group mb-1">
                            <select class="form-control form-control-sm rounded-0" name="action" required="">
                                <option value="">Select Action</option>
                                <option value="1">Active</option>
                                <option value="2">InActive</option>
                                <option value="3">Feature</option>
                                <option value="4">Un-feature</option>
                                <option value="5">Delete</option>
                            </select>
                            <button class="btn btn-sm btn-primary rounded-0" onclick="return confirm('Are You Want To Action?')">Action</button>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <ul class="statuslist">
                            <li><a href="{{route('admin.posts')}}">All ({{$total->total}})</a></li>
                            <li><a href="{{route('admin.posts',['status'=>'active'])}}">Active ({{$total->active}})</a></li>
                            <li><a href="{{route('admin.posts',['status'=>'inactive'])}}">Inactive ({{$total->inactive}})</a></li>
                            <li><a href="{{route('admin.posts',['status'=>'featured'])}}" style="border-color: #faca51;background: #fff6de;">Featured ({{$total->featured}})</a></li>
                        </ul>
                    </div>
                </div>
                <div class="table-responsive" style="min-height:300px;">
                    <table class="table table-responsive-md">
                        <thead>
                            <tr>
                                <th style="min-width: 100px;width:100px;">
                                    <label>
                                        <input type="checkbox" class="form-check-input m-0" id="checkall"  > All <span class="checkCounter"></span>
                                    </label>
                                </th>
                                <th style="min-width: 300px;">Post Name</th>
                                <th style="min-width: 80px;width:80px;">Image</th>
                                <th style="min-width: 200px;">Category</th>
                                <th style="min-width: 60px;width:60px;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($posts as $i=>$post)
                            <tr>
                                <td>
                                    <label>
                                        <input type="checkbox" class="form-check-input" name="checkid[]" value="{{$post->id}}" >
                                    </label>
                                    <br /><b>SL:</b>
                                    {{$posts->currentpage()==1?$i+1:$i+($posts->perpage()*($posts->currentpage() - 1))+1}}
                                </td>
                                <td>
                                    <span><a href="{{route('blogView',$post->slug?:'no-title')}}" target="_blank">{{$post->name}}</a></span><br />

                                    <span><i class="fa fa-eye" style="color: #1ab394;"></i> 0</span>
                                    @if($post->status=='active')
                                    <span class="badge badge-success">Active </span>
                                    @elseif($post->status=='inactive')
                                    <span class="badge badge-danger">Inactive </span>
                                    @else
                                    <span class="badge badge-danger">Draft </span>
                                    @endif @if($post->featured==true)
                                    <span><i class="fa fa-star" style="color: #faca51;"></i></span>
                                    @endif

                                    <span><i class="fa fa-calendar" style="color: #1ab394;"></i> {{$post->created_at->format('d-m-Y')}}</span>

                                    <span>
                                        <a href="{{route('admin.postsComments',$post->id)}}"><i class="fa fa-comment" style="color: #1ab394;"></i> ({{$post->postComments->where('status','<>','temp')->count()}})</a>
                                    </span>
                                    <span>
                                        <i class="fa fa-user" style="color: #1ab394;"></i>
                                        {{Str::limit($post->user?$post->user->name:'No Author',12)}}
                                    </span>
                                </td>
                                <td style="padding: 5px; text-align: center;">
                                    <img src="{{asset($post->image())}}" style="max-width: 80px; max-height: 50px;" />
                                </td>
                                <td>
                                    @foreach($post->postCategories as $i=>$ctg) {{$i==0?'':'-'}} {{$ctg->name}} @endforeach
                                </td>
                                <td style="text-align:center;">
                                    <div class="dropdown">
                                        <button type="button" class="btn btn-success light sharp" data-bs-toggle="dropdown">
                                            <i class="fas fa-ellipsis-h"></i>
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="{{route('admin.postsAction',['edit',$post->id])}}"><i class="fa fa-edit"></i> Edit </a>
                                            <a class="dropdown-item" href="{{route('admin.postsAction',['delete',$post->id])}}" onclick="return confirm('Are You Want To Delete')" ><i class="fa fa-trash"></i> Delete </a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                            @if($posts->count()==0)
                            <tr>
                                <td colspan="5" style="text-align:center;">No Record Found</td>
                            </tr>
                            @endif
                        </tbody>
                    </table>

                    {{$posts->links('pagination')}}
                </div>
            </form>
        </div>
    </div>
</div>



@endsection 

@push('js')
<script type="text/javascript">
    
</script>
@endpush
