@extends(general()->adminTheme.'.layouts.app')
@section('title')
<title>{{websiteTitle('Comments List')}}</title>
@endsection

@push('css')
<style type="text/css">
  .commentauthor img{
    float: left;
    margin-right: 10px;
    margin-top: 1px;
    width: 40px;
  }
  .table-responsive table tr.inactive {
    background: #ffcece;
  }
</style>
@endpush
@section('contents')

<div class="row">
    <div class="col-md-6">
        <div class="page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active"><a href="{{route('admin.dashboard')}}">Dashboard </a></li>
                <li class="breadcrumb-item">Comments List</li>
            </ol>
        </div>
    </div>
    <div class="col-md-6">
        <div class="text-start text-md-end mb-3">
			<a href="{{route('admin.postsCommentsAction',['create',$post->id])}}" class="btn btn-info"><i class="fa-solid fa-plus"></i> Add Comment</a>
            <a href="{{route('admin.postsCommentsAll')}}" class="btn btn-success">
                <i class="fa-solid fa-rotate"></i>
            </a>
        </div>
    </div>
</div>
 

@include(adminTheme().'alerts')

<div class="card">
<div class="card-header " style="border-bottom: 1px solid #e3ebf3;">
	<h4 class="card-title">Comments List</h4>
</div>
	<div class="card-content">
		<div class="card-body">
		<form action="{{route('admin.postsComments',$post->id)}}">
			<div class="row">
				<div class="col-md-12 mb-0">
					<div class="input-group">
						<input type="text" name="search" value="{{request()->search?request()->search:''}}" placeholder="Comments Title, email, website" class="form-control {{$errors->has('search')?'error':''}}">
						<button type="submit" class="btn btn-success btn-sm rounded-0">Search</button>
					</div>
				</div>
			</div>
		</form>
		<hr>
		<table class="table table-bordered">
			<tr>
				<td>
					<b>Post: </b><a href="{{route('blogView',$post->slug)}}" target="_blank">{{$post->name}}</a>
				</td>
				<td>
					<i class="fa fa-comments"></i> Comments ({{$post->postComments->where('status','<>','temp')->count()}})
				</td>
			</tr>
		</table>
		<form action="{{route('admin.postsComments',$post->id)}}">
		<div class="row">
			<div class="col-md-4">
				<div class="input-group mb-1">
					<select class="form-control form-control-sm rounded-0" name="action" required="">
						<option value="">Select Action</option>
						<option value="1">Approve</option>
						<option value="2">Un-approve</option>
						<option value="3">Feature</option>
						<option value="4">Un-feature</option>
						<option value="5">Comment Delete</option>
					</select>
					<button class="btn btn-sm btn-primary rounded-0" onclick="return confirm('Are You Want To Action?')">Action</button>
				</div>
			</div>
		</div>
			<div class="table-responsive" style="min-height: 300px;">


			<table class="table table-responsive-md" >
				<thead>
					<tr>
						<th style="min-width: 100px;width:100px;">
							 <label>
								<input type="checkbox" class="form-check-input m-0" id="checkall"  > All <span class="checkCounter"></span>
							</label>
						</th>
						<th style="min-width: 250px;width:250px;">Author</th>
						<th style="min-width: 300px;">Comments</th>
					</tr>
				</thead>
				<tbody>
					@foreach($comments as $i=>$comment)
					<tr class="{{$comment->status=='inactive'?'inactive':''}}">
						<td>
							<label>
								<input type="checkbox" class="form-check-input" name="checkid[]" value="{{$comment->id}}" >
							</label>
							<br /><b>SL:</b>
							{{$comments->currentpage()==1?$i+1:$i+($comments->perpage()*($comments->currentpage() - 1))+1}}
						</td>
						<td class="commentauthor">
						@if($comment->user)
						<span><img src="{{asset($comment->user->image())}}"></span>
						@else
						<span><img src="{{asset('public/medies/profile.png')}}"></span>
						@endif

						@if($comment->website==null)
						<span>{{$comment->name}}</span>
						@else
						<a href="//{{$comment->website}}" rel="nofollow" target="_blank">{{$comment->name}}</a>
						@endif            
						<a href="mailto:{{$comment->email}}">{{$comment->email}}</a>
						
						<br>
						@if($comment->status=='active')
						<span class="badge badge-success">Active </span>
						@elseif($comment->status=='inactive')
						<span class="badge badge-danger">Inactive </span>
						@else
						<span class="badge badge-danger">Draft </span>
						@endif
						|
							<a href="{{route('admin.postsCommentsAction',['edit',$comment->id])}}" class="badge badge-danger">Edit</a>
							<a href="{{route('admin.postsCommentsAction',['replay',$comment->id])}}" class="badge badge-info"><i class="fa fa-reply"></i></a>
							<a href="{{route('admin.postsCommentsAction',['delete',$comment->id])}}" onclick="return confirm('Are You Want To Delete?')" class="badge badge-danger" ><i class="fa fa-trash"></i></a>
							<br>
							<span>{{$comment->created_at->format('d-m-Y h:i A')}}</span>   
						</td>
						<td>
						<span>
						{!!$comment->description!!}
						</span>
						</td>
					</tr>
					@endforeach
					@if($comments->count()==0)
					<tr>
						<td colspan="3" style="text-align: center;">No Record Found</td>
					</tr>
					@endif
				</tbody>
			</table>
			{{$comments->links('pagination')}}
			</div>
		</form>
		</div>
	</div>
</div>



@endsection
@push('js')

@endpush