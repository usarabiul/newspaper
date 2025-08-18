@extends(adminTheme().'layouts.app') @section('title')
<title>{{websiteTitle('Services Edit')}}</title>
@endsection @push('css')

<style type="text/css">
    .catagorydiv {
        max-height: 300px;
        overflow: auto;
    }
    .catagorydiv ul {
        padding-left: 20px;
    }
    .catagorydiv ul li {
        list-style: none;
    }
    .catagorydiv ul li label {
        margin: 3px 0;
    }
</style>
@endpush @section('contents')

<div class="row">
    <div class="col-md-6">
        <div class="page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active"><a href="{{route('admin.dashboard')}}">Dashboard </a></li>
                <li class="breadcrumb-item active"><a href="{{route('admin.services')}}">Services List </a></li>
                <li class="breadcrumb-item">Service Edit</li>
            </ol>
        </div>
    </div>
    <div class="col-md-6">
        <div class="text-start text-md-end mb-3">
            <a href="{{route('admin.servicesAction','create')}}" class="btn btn-info"><i class="fa-solid fa-plus"></i> Add Service</a>
            <a href="{{route('admin.servicesAction',['edit',$service->id])}}" class="btn btn-success">
                <i class="fa-solid fa-rotate"></i>
            </a>
        </div>
    </div>
</div>

@include('admin.alerts')
<form action="{{route('admin.servicesAction',['update',$service->id])}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header" style="border-bottom: 1px solid #e3ebf3;">
                    <h4 class="card-title">Service Edit

                    @if($service->slug)
                    <a href="{{route('serviceView',$service->slug?:'no-slug')}}" class="badge badge-success float-right" target="_blank">View</a>
                    @endif
                    </h4>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <div class="mb-1">
                            <label class="form-label">Service Name </label>
                            <input type="text" class="form-control {{$errors->has('name')?'error':''}}" name="name" placeholder="Enter Service Name" value="{{$service->name?:old('name')}}" required="" />
                            @if ($errors->has('name'))
                            <div class="invalid-feedback">{{ $errors->first('name') }}</div>
                            @endif
                        </div>
                        <div class="mb-3 input-group">
                            <label class="slugEdit" for="slug" style="color: #3F51B5;cursor: pointer;width: 130px;padding: 3px;"><span>{{$service->auto_slug?'Custom Slug':'Auto Slug'}} </span> <i class="fa fa-edit"></i></label>
                            <input type="text" class="slugEditData form-control {{$errors->has('slug')?'error':''}}"
                                @if($service->auto_slug) 
                                    name="slug"
                                    style="display:block;"
                                @endif
                            placeholder="Service Slug" value="{{$service->slug?:old('slug')}}" />
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Short Description </label>
                            <textarea name="short_description" class="form-control {{$errors->has('short_description')?'error':''}}" placeholder="Enter Short Description">{!!$service->short_description!!}</textarea>
                            @if ($errors->has('short_description'))
                            <div class="invalid-feedback">{{ $errors->first('short_description') }}</div>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Description </label>
                            <textarea name="description" class="{{$errors->has('description')?'error':''}} tinyEditor" placeholder="Enter Description">{!!$service->description!!}</textarea>
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
                            <input type="text" class="form-control {{$errors->has('seo_title')?'error':''}}" name="seo_title" placeholder="Enter SEO Meta Title" value="{{$service->seo_title?:old('seo_title')}}" />
                            @if ($errors->has('seo_title'))
                            <div class="invalid-feedback">{{ $errors->first('seo_title') }}</div>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label class="form-label">SEO Meta Description </label>
                            <textarea name="seo_desc" class="form-control {{$errors->has('seo_desc')?'error':''}}" placeholder="Enter SEO Meta Description">{!!$service->seo_desc!!}</textarea>
                            @if ($errors->has('seo_desc'))
                            <div class="invalid-feedback">{{ $errors->first('seo_desc') }}</div>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label class="form-label">SEO Meta Keyword </label>
                            <textarea name="seo_keyword" class="form-control {{$errors->has('seo_keyword')?'error':''}}" placeholder="Enter SEO Meta Keyword">{!!$service->seo_keyword!!}</textarea>
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
                    <h4 class="card-title">Service Images</h4>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <div class="mb-3">
                            <label class="form-label">Service Image</label>
                            <input type="file" name="image" class="form-control {{$errors->has('image')?'error':''}}" />
                            @if ($errors->has('image'))
                            <div class="invalid-feedback">{{ $errors->first('image') }}</div>
                            @endif
                        </div>
                        <div class="mb-3">
                            <img src="{{asset($service->image())}}" style="max-width: 100px;" />
                            @if($service->imageFile)
                            <a href="{{route('admin.mediesDelete',$service->imageFile->id)}}" class="mediaDelete" style="color: red;"><i class="fa fa-trash"></i></a>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Service Gallery</label>
                            <input type="file" name="gallery_image[]" class="form-control {{$errors->has('gallery_image')?'error':''}}"  multiple="" />
                            @if ($errors->has('gallery_image'))
                            <div class="invalid-feedback">{{ $errors->first('gallery_image') }}</div>
                            @endif
                        </div>
                        <div class="row">
                            @foreach($service->galleryFiles as $galley)
                            <div class="col-md-4 mb-3">
                            <img src="{{asset($galley->file_url)}}" style="max-width: 60px;max-height: 60px" />
                            <a href="{{route('admin.mediesDelete',$galley->id)}}" class="mediaDelete" style="color: red;"><i class="fa fa-trash"></i></a>
                            </div>
                            @endforeach
                            
                        </div>
                        
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header" style="border-bottom: 1px solid #e3ebf3;">
                    <h4 class="card-title">Service Category</h4>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        @if ($errors->has('categoryid*'))
                        <div class="invalid-feedback">The Category Must Be a Number</p>
                        @endif
                        <div class="catagorydiv">
                            <ul style="padding: 0;">
                                @foreach($categories as $ctg)
                                <li>
                                    <label>
                                        <input type="checkbox" class="form-check-input" name="categoryid[]" value="{{$ctg->id}}"

                                        @foreach($service->serviceCtgs as $postctg)
                                        {{$postctg->reff_id==$ctg->id?'checked':''}} 
                                        @endforeach
                                        
                                        >
                                        {{$ctg->name}}
                                    </label>
                                    
                                    @if($ctg->subCtgs->count() >0) @include(adminTheme().'services.includes.servicesEditSubctg',['subcategories' => $ctg->subCtgs,'i'=>1]) @endif
                                </li>
                                @endforeach
                            </ul>
                        </div>
                        @if($categories->count()==0)
                        <span>No Category</span>
                        @endif
                    </div>
                </div>
            </div>


            <div class="card">
                <div class="card-header" style="border-bottom: 1px solid #e3ebf3;">
                    <h4 class="card-title">Service Action</h4>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <div class="row">
                            <div class="mb-3 col-6">
                                <label class="form-label">Status</label>
                                <div class="form-check form-check-inline">
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" name="status" {{$service->status=='active'?'checked':''}} >Active
                                    </label>
                                </div>
                            </div>
                            <div class="mb-3 col-6">
                                <label class="form-label">Featured</label>
                                <div class="form-check form-check-inline">
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" name="featured" {{$service->featured?'checked':''}} >Active
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Published Date</label>
                            <input type="date" class="form-control form-control-sm" name="created_at" value="{{$service->created_at->format('Y-m-d')}}">
                            @if ($errors->has('created_at'))
                            <div class="invalid-feedback">{{ $errors->first('created_at') }}</div>
                            @endif
                        </div>
                        <button type="submit" class="btn btn-primary mr-sm-1 mb-1 mb-sm-0">Save changes</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>


@endsection @push('js')

<script>

</script>

@endpush
