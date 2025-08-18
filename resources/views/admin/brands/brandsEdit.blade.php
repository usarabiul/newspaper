@extends(adminTheme().'layouts.app') @section('title')
<title>{{websiteTitle('Brands Edit')}}</title>
@endsection @push('css')

<style type="text/css"></style>
@endpush @section('contents')
<div class="row">
    <div class="col-md-6">
        <div class="page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active"><a href="{{route('admin.dashboard')}}">Dashboard </a></li>
                <li class="breadcrumb-item active"><a href="{{route('admin.brands')}}">Brand List </a></li>
                <li class="breadcrumb-item">Brand Edit</li>
            </ol>
        </div>
    </div>
    <div class="col-md-6">
        <div class="text-start text-md-end mb-3">
            <a href="{{route('admin.brandsAction','create')}}" class="btn btn-info"><i class="fa-solid fa-plus"></i> Add Brand</a>
            <a href="{{route('admin.brandsAction',['edit',$brand->id])}}" class="btn btn-success">
                <i class="fa-solid fa-rotate"></i>
            </a>
        </div>
    </div>
</div>


@include(adminTheme().'alerts')
<form action="{{route('admin.brandsAction',['update',$brand->id])}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header" style="border-bottom: 1px solid #e3ebf3;">
                    <h4 class="card-title">Brand Edit</h4>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <div class="mb-3">
                            <label class="form-label">Brand Name(*) </label>
                            <input type="text" class="form-control {{$errors->has('name')?'error':''}}" name="name" placeholder="Enter Brand Name" value="{{$brand->name?:old('name')}}" required="" />
                            @if ($errors->has('name'))
                            <div class="invalid-feedback">{{ $errors->first('name') }}</div>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Short Description </label>
                            <textarea name="short_description" class="form-control {{$errors->has('short_description')?'error':''}}" placeholder="Enter Short Description">{!!$brand->short_description!!}</textarea>
                            @if ($errors->has('short_description'))
                            <div class="invalid-feedback">{{ $errors->first('short_description') }}</div>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Description </label>
                            <textarea name="description" class="{{$errors->has('description')?'error':''}} tinyEditor" placeholder="Enter Description">{!!$brand->description!!}</textarea>
                            @if ($errors->has('description'))
                            <div class="invalid-feedback">{{ $errors->first('description') }}</div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header" style="border-bottom: 1px solid #e3ebf3;">
                    <h4 class="card-title">SEO Optimize</h4>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <div class="mb-3">
                            <label class="form-label">SEO Meta Title</label>
                            <input type="text" class="form-control {{$errors->has('seo_title')?'error':''}}" name="seo_title" placeholder="Enter SEO Meta Title" value="{{$brand->seo_title?:old('seo_title')}}" />
                            @if ($errors->has('seo_title'))
                            <div class="invalid-feedback">{{ $errors->first('seo_title') }}</div>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label class="form-label">SEO Meta Description </label>
                            <textarea name="seo_description" class="form-control {{$errors->has('seo_description')?'error':''}}" placeholder="Enter SEO Meta Description">{!!$brand->seo_description!!}</textarea>
                            @if ($errors->has('seo_description'))
                            <div class="invalid-feedback">{{ $errors->first('seo_description') }}</div>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label class="form-label">SEO Meta Keyword </label>
                            <textarea name="seo_keyword" class="form-control {{$errors->has('seo_keyword')?'error':''}}" placeholder="Enter SEO Meta Keyword">{!!$brand->seo_keyword!!}</textarea>
                            @if ($errors->has('seo_keyword'))
                            <div class="invalid-feedback">{{ $errors->first('seo_keyword') }}</div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card">
                <div class="card-header" style="border-bottom: 1px solid #e3ebf3;">
                    <h4 class="card-title">Brand Images</h4>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <div class="mb-3">
                            <label class="form-label">Brand Image</label>
                            <input type="file" name="image" class="form-control {{$errors->has('image')?'error':''}}" />
                            @if ($errors->has('image'))
                            <div class="invalid-feedback">{{ $errors->first('image') }}</div>
                            @endif
                        </div>
                        <div class="mb-3">
                            <img src="{{asset($brand->image())}}" style="max-width: 100px;" />
                            @if($brand->imageFile)
                            <a href="{{route('admin.mediesDelete',$brand->imageFile->id)}}" class="mediaDelete" style="color: red;"><i class="fa fa-trash"></i></a>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Brand Banner</label>
                            <input type="file" name="banner" class="form-control {{$errors->has('banner')?'error':''}}" />
                            @if ($errors->has('banner'))
                            <div class="invalid-feedback">{{ $errors->first('banner') }}</div>
                            @endif
                        </div>
                        <div class="mb-3">
                            <img src="{{asset($brand->banner())}}" style="max-width: 200px;" />
                            @if($brand->bannerFile)
                            <a href="{{route('admin.mediesDelete',$brand->bannerFile->id)}}" class="mediaDelete" style="color: red;"><i class="fa fa-trash"></i></a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header" style="border-bottom: 1px solid #e3ebf3;">
                    <h4 class="card-title">Brand Action</h4>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <div class="row">
                            <div class="mb-3 col-6">
                                <label class="form-label">  Status</label>
                                <div class="form-check form-check-inline">
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" name="status" {{$brand->status=='active'?'checked':''}} >Active
                                    </label>
                                </div>
                            </div>
                            <div class="mb-3 col-6">
                                <label class="form-label">Featured</label>
                                <div class="form-check form-check-inline">
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" name="featured" {{$brand->featured?'checked':''}} >Active
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" >Published Date</label>
                            <input type="date" class="form-control form-control-sm" name="created_at" value="{{$brand->created_at->format('Y-m-d')}}">
                            @if ($errors->has('created_at'))
                            <div class="invalid-feedback">{{ $errors->first('created_at') }}</div>
                            @endif
                        </div>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>


@endsection 
@push('js')


@endpush
