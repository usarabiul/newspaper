@extends(adminTheme().'layouts.app') @section('title')
<title>{{websiteTitle('Category Edit')}}</title>
@endsection @push('css')

<style type="text/css"></style>
@endpush @section('contents')

<div class="row">
    <div class="col-md-6">
        <div class="page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active"><a href="{{route('admin.dashboard')}}">Dashboard </a></li>
                <li class="breadcrumb-item active"><a href="{{route('admin.servicesCategories')}}">Category List </a></li>
                <li class="breadcrumb-item">Category Edit</li>
            </ol>
        </div>
    </div>
    <div class="col-md-6">
        <div class="text-start text-md-end mb-3">
            <a href="{{route('admin.servicesCategoriesAction','create')}}" class="btn btn-info"><i class="fa-solid fa-plus"></i> Add Category</a>
            <a href="{{route('admin.servicesCategoriesAction',['edit',$category->id])}}" class="btn btn-success">
                <i class="fa-solid fa-rotate"></i>
            </a>
        </div>
    </div>
</div>

@include('admin.alerts')
<form action="{{route('admin.servicesCategoriesAction',['update',$category->id])}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header" style="border-bottom: 1px solid #e3ebf3;">
                    <h4 class="card-title">Category Edit</h4>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <div class="mb-3">
                            <label class="form-label">Category Name(*) </label>
                            <input type="text" class="form-control {{$errors->has('name')?'error':''}}" name="name" placeholder="Enter Category Name" value="{{$category->name?:old('name')}}" required="" />
                            @if ($errors->has('name'))
                            <div class="invalid-feedback">{{ $errors->first('name') }}</div>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Parent Category</label>
                            <select name="parent_id" class="form-control">
                                <option value="">Select Category</option>

                                @foreach($parents as $parent) @if($parent->id==$category->id) @else
                                <option value="{{$parent->id}}" {{$parent->id==$category->parent_id?'selected':''}}>{{$parent->name}}</option>
                                @if($parent->subctgs->count() > 0) @include('admin.services.includes.editSubcategory',['subcategories' =>$parent->subctgs, 'i'=>1]) @endif @endif @endforeach
                            </select>
                            @if ($errors->has('parent_id'))
                            <div class="invalid-feedback">{{ $errors->first('parent_id') }}</div>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Description </label>
                            <textarea name="description" class="{{$errors->has('description')?'error':''}} tinyEditor" placeholder="Enter Description">{!!$category->description!!}</textarea>
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
                            <input type="text" class="form-control {{$errors->has('seo_title')?'error':''}}" name="seo_title" placeholder="Enter SEO Meta Title" value="{{$category->seo_title?:old('seo_title')}}" />
                            @if ($errors->has('seo_title'))
                            <div class="invalid-feedback">{{ $errors->first('seo_title') }}</div>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label class="form-label">SEO Meta Description </label>
                            <textarea name="seo_description" class="form-control {{$errors->has('seo_description')?'error':''}}" placeholder="Enter SEO Meta Description">{!!$category->seo_description!!}</textarea>
                            @if ($errors->has('seo_description'))
                            <div class="invalid-feedback">{{ $errors->first('seo_description') }}</div>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label class="form-label">SEO Meta Keyword </label>
                            <textarea name="seo_keyword" class="form-control {{$errors->has('seo_keyword')?'error':''}}" placeholder="Enter SEO Meta Keyword">{!!$category->seo_keyword!!}</textarea>
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
                    <h4 class="card-title">Category Images</h4>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <div class="mb-3">
                            <label class="form-label">Category Image</label>
                            <input type="file" name="image" class="form-control {{$errors->has('image')?'error':''}}" />
                            @if ($errors->has('image'))
                            <div class="invalid-feedback">{{ $errors->first('image') }}</div>
                            @endif
                        </div>
                        <div class="mb-3">
                            <img src="{{asset($category->image())}}" style="max-width: 100px;" />
                            @if($category->imageFile)
                            <a href="{{route('admin.mediesDelete',$category->imageFile->id)}}" class="mediaDelete" style="color: red;"><i class="fa fa-trash"></i></a>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Category Banner</label>
                            <input type="file" name="banner" class="form-control {{$errors->has('banner')?'error':''}}" />
                            @if ($errors->has('banner'))
                            <div class="invalid-feedback">{{ $errors->first('banner') }}</div>
                            @endif
                        </div>
                        <div class="mb-3">
                            <img src="{{asset($category->banner())}}" style="max-width: 200px;" />
                            @if($category->bannerFile)
                            <a href="{{route('admin.mediesDelete',$category->bannerFile->id)}}" class="mediaDelete" style="color: red;"><i class="fa fa-trash"></i></a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header" style="border-bottom: 1px solid #e3ebf3;">
                    <h4 class="card-title">Category Action</h4>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <div class="row">
                            <div class="mb-3 col-6">
                                <label class="form-label">Status</label>
                                <div class="form-check form-check-inline">
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" name="status" {{$category->status=='active'?'checked':''}} >Active
                                    </label>
                                </div>
                            </div>
                            <div class="mb-3 col-6">
                                <label class="form-label">Featured</label>
                                <div class="form-check form-check-inline">
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" name="featured" {{$category->featured?'checked':''}} >Active
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Published Date</label>
                            <input type="date" class="form-control form-control-sm" name="created_at" value="{{$category->created_at->format('Y-m-d')}}">
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

@endsection @push('js')

<script>

</script>

@endpush
