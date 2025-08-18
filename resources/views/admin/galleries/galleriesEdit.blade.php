@extends(adminTheme().'layouts.app') @section('title')
<title>{{websiteTitle('Gallery Edit')}}</title>
@endsection @push('css')

<style type="text/css">
    .fileUpload-div {
        border: 2px dotted #e3e3e3;
        padding: 25px;
        text-align: center;
    }

    .fileUpload-div p {
        font-size: 20px;
        color: silver;
        text-transform: uppercase;
    }
    .fileUpload-div label {
        margin: 0;
    }
    .fileUpload-div i {
        font-size: 60px;
        cursor: pointer;
        color: #c6c2c2;
    }
</style>
@endpush @section('contents')
<div class="row">
    <div class="col-md-6">
        <div class="page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active"><a href="{{route('admin.dashboard')}}">Dashboard </a></li>
                <li class="breadcrumb-item active"><a href="{{route('admin.galleries')}}">Galleries List </a></li>
                <li class="breadcrumb-item">Gallery Edit</li>
            </ol>
        </div>
    </div>
    <div class="col-md-6">
        <div class="text-start text-md-end mb-3">
            <a href="{{route('admin.galleriesAction',['edit',$gallery->id])}}" class="btn btn-success">
                <i class="fa-solid fa-rotate"></i>
            </a>
        </div>
    </div>
</div>


        @include(adminTheme().'alerts')

        <div class="row">
            <div class="col-md-12">
                <form action="{{route('admin.galleriesAction',['update',$gallery->id])}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card">
                        <div class="card-header" style="border-bottom: 1px solid #e3ebf3;">
                            <h4 class="card-title">Gallery Edit</h4>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <div class="row">
                                    <div class="mb-3 col-md-4">
                                        <label class="form-label">Gallery Name(*) </label>
                                        <input type="text" class="form-control {{$errors->has('name')?'error':''}}" name="name" placeholder="Enter Gallery Name" value="{{$gallery->name?:old('name')}}" required="" />
                                        @if ($errors->has('name'))
                                        <p style="color: red; margin: 0; font-size: 10px;">{{ $errors->first('name') }}</p>
                                        @endif
                                    </div>
                                    <div class="mb-3 col-md-3">
                                        <label class="form-label">Gallery Location</label>
                                        <select class="form-control" name="location">
                                            <option value="">Select Location</option>
                                            <option value="Front Page Gallery" {{$gallery->location=='Front Page Gallery'?'selected':''}}>Front Page Gallery</option>
                                        </select>
                                    </div>
                                    <div class="mb-3 col-md-3">
                                        <label class="form-label">Featured Image</label>
                                        <input type="file" name="image" class="form-control {{$errors->has('image')?'error':''}}" />
                                        @if ($errors->has('image'))
                                        <p style="color: red; margin: 0; font-size: 10px;">{{ $errors->first('image') }}</p>
                                        @endif
                                    </div>
                                    <div class="mb-3 col-md-2">
                                        <img src="{{asset($gallery->image())}}" style="max-width: 100px;" />
                                        
                                        @if($gallery->imageFile)
                                        <a href="{{route('admin.mediesDelete',$gallery->imageFile->id)}}" class="mediaDelete" style="color: red;"><i class="fa fa-trash"></i></a>
                                        @endif
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Description </label>
                                    <textarea name="description" rows="5" class="form-control {{$errors->has('description')?'error':''}}" placeholder="Enter Description">{!!$gallery->description!!}</textarea>
                                    @if ($errors->has('description'))
                                    <p style="color: red; margin: 0; font-size: 10px;">{{ $errors->first('description') }}</p>
                                    @endif
                                </div>
                                
                                    <div class="fileUpload-div">
                                        <div>
                                            <p>Click To Upload Images/Video (Multiple)</p>
                                        </div>
                                        <div>
                                            @if ($errors->has('images'))
                                            <p style="color: red; margin: 0; font-size: 10px;">The Tags Must Be (.jpg, .jpeg, .png, .gif, .webp, .svg, ,.mp4) max:2024 MB</p>
                                            @endif
                                            <small>(.jpg, .jpeg, .png, .gif, .webp, .svg, .mp4) max:25 MB</small>
                                        </div>
                                        <div>
                                            <label>
                                                <input type="file" name="images[]" multiple="" accept="image/*,video/mp4"  class="form-control fileUpload" />
                                            </label>
                                            
                                        </div>
                                    </div>
                   
                                <hr>
                                <div class="sliderImagesList">
                                @include('admin.galleries.includes.galleriesImages')
                                </div>
                                <div class="row">
                                    <div class="mb-3 col-md-4">
                                        <label class="form-label">Gallery Status</label>
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input" name="status" {{$gallery->status=='active'?'checked':''}} >Active
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary">Save changes</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>


@endsection @push('js')
<script type="text/javascript">

</script>

@endpush
