@extends(adminTheme().'layouts.app') @section('title')
<title>{{websiteTitle('Comment Edit')}}</title>
@endsection @push('css')
<style type="text/css"></style>
@endpush @section('contents')

<div class="row">
    <div class="col-md-6">
        <div class="page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active"><a href="{{route('admin.dashboard')}}">Dashboard </a></li>
                <li class="breadcrumb-item active"><a href="{{route('admin.postsComments',[$comment->src_id])}}">Comments </a></li>
                <li class="breadcrumb-item">Comments Edit</li>
            </ol>
        </div>
    </div>
    <div class="col-md-6">
        <div class="text-start text-md-end mb-3">
            <a href="{{route('admin.postsCommentsAction',['edit',$comment->id])}}" class="btn btn-success">
                <i class="fa-solid fa-rotate"></i>
            </a>
        </div>
    </div>
</div>


@include(adminTheme().'alerts')
<form action="{{route('admin.postsCommentsAction',['update',$comment->id])}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header" style="border-bottom: 1px solid #e3ebf3;">
                    <h4 class="card-title">Comment Edit</h4>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <div class="mb-3">
                            <label class="form-label">Comment Name*</label>
                            @if ($errors->has('name'))
                            <div class="invalid-feedback">{{ $errors->first('name') }}</div>
                            @endif
                            <input type="text" name="name" value="{{$comment->name}}" class="form-control" placeholder="Enter Your Name" />
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Comment Email</label>
                            @if ($errors->has('email'))
                            <div class="invalid-feedback">{{ $errors->first('email') }}</div>
                            @endif
                            <input type="email" name="email" value="{{$comment->email}}" class="form-control" placeholder="Enter Your Email" />
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Comment Website</label>
                            @if ($errors->has('website'))
                            <div class="invalid-feedback">{{ $errors->first('website') }}</div>
                            @endif
                            <input type="text" name="website" value="{{$comment->website}}" class="form-control" placeholder="Enter Your Website" />
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Comment Content</label>
                            @if ($errors->has('content'))
                            <div class="invalid-feedback">{{ $errors->first('content') }}</div>
                            @endif
                            <textarea name="content" rows="5" class="form-control" placeholder="Write Description">{!!$comment->content!!}</textarea>
                        </div>

                        <div class="row">
                            <div class="mb-3 col-lg-6">
                                <label class="form-label">Status</label>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" name="status" {{$comment->status=='active'?'checked':''}} > Approved
                                    </label>
                                </div>
                            </div>
                            <div class="mb-3 col-lg-6">
                                <label class="form-label" >Featured</label>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" name="featured" {{$comment->featured?'checked':''}} > Active
                                    </label>
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <button type="submit" class="btn btn-success">Update</button>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

@endsection @push('js')

<script>
    $(".summernote").summernote({
        placeholder: "Write Content Here...",
        tabsize: 2,
        height: 120,
        toolbar: [
            ["style", ["style"]],
            ["font", ["bold", "underline"]],
            ["color", ["color"]],
            ["para", ["ul", "ol", "paragraph"]],
            ["table", ["table"]],
            ["insert", ["link", "picture"]],
            ["view", ["fullscreen", "codeview"]],
        ],
    });
</script>

@endpush
