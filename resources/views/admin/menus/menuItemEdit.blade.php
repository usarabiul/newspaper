@extends(adminTheme().'layouts.app') 
@section('title')
<title>{{websiteTitle('Items Update')}}</title>
@endsection
@push('css')
<style type="text/css">
    .listmenu ul {
        margin: 0;
        padding: 0;
    }
    .listmenu ul li {
        list-style: none;
        margin: 5px;
        padding: 10px;
        border: 1px solid gray;
    }
    .menumanage {
        float: right;
    }
</style>
@endpush
@section('contents')
<div class="row">
    <div class="col-md-6">
        <div class="page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active"><a href="{{route('admin.dashboard')}}">Dashboard </a></li>
                <li class="breadcrumb-item active"><a href="{{route('admin.menus')}}">Menus List </a></li>
                <li class="breadcrumb-item">Menu Edit</li>
            </ol>
        </div>
    </div>
    <div class="col-md-6">
        <div class="text-start text-md-end mb-3">
        @if($item->parent_id)
            <a class="btn btn-info" href="{{route('admin.menusAction',['edit',$item->parent_id])}}"><i class="fa-solid fa-arrow-left"></i> BACK</a>
        @else    
        <a href="{{route('admin.menus')}}" class="btn btn-info"><i class="fa-solid fa-arrow-left"></i> BACK</a>
        @endif
        <a href="{{route('admin.menusItemsAction',['edit',$item->id])}}" class="btn btn-success">
                <i class="fa-solid fa-rotate"></i>
            </a>
        </div>
    </div>
</div>

@include(adminTheme().'alerts')
<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header" style="border-bottom: 1px solid #e3ebf3;">
                <h4 class="card-title">Items Update</h4>
            </div>
            <div class="card-content">
                <div class="card-body">
                    <form action="{{route('admin.menusItemsAction',['update',$item->id])}}" method="post" enctype="multipart/form-data">
                        @csrf @if($item->menu_type==1)
                        <h4><b> Name:</b> {{$item->menuName()?:'No Found'}} <span style="color: #d8d8d8;">(Page)</span></h4>
                        @elseif($item->menu_type==2)
                        <h4><b> Name:</b> {{$item->menuName()?:'No Found'}} <span style="color: #d8d8d8;">(Post Category)</span></h4>
                        @elseif($item->menu_type==3)
                        <h4><b> Name:</b> {{$item->menuName()?:'No Found'}} <span style="color: #d8d8d8;">(Product Category)</span></h4>
                        @else
                        <div class="mb-3">
                            <label class="form-label">Menu Name*</label>
                            @if ($errors->has('name'))
                            <div class="invalid-feedback">{{ $errors->first('name') }}</div>
                            @endif
                            <input type="text" name="name" value="{{$item->name}}" class="form-control" placeholder="Enter Menu Name" />
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Menu Link</label>
                            @if ($errors->has('link'))
                            <div class="invalid-feedback">{{ $errors->first('link') }}</div>
                            @endif
                            <input type="text" name="link" value="{{$item->slug}}" placeholder="Enter Menu Link" class="form-control" />
                        </div>
                        @endif
                        <div class="mb-3">
                            <label class="form-label">Menu Icon (Font Icon class)</label>
                            @if ($errors->has('icon'))
                            <div class="invalid-feedback">{{ $errors->first('icon') }}</div>
                            @endif
                            <input type="text" name="icon" value="{{$item->icon}}" placeholder="Enter Font Icon" class="form-control" />
                        </div>
                        <div class="row">
                            <div class="mb-3 col-lg-8">
                                <label class="form-label">Menu Image (1X1)</label>
                                @if ($errors->has('image'))
                                <div class="invalid-feedback">{{ $errors->first('image') }}</div>
                                @endif
                                <input type="file" name="image" class="form-control" />
                            </div>
                            <div class="mb-3 col-lg-4" style="position: relative;">
                                @if($item->imageFile)
                                <span style="position: absolute; right: 10px; top: 0px;">
                                    <a href="{{route('admin.mediesDelete',$item->imageFile->id)}}" class="mediaDelete" style="font-size: 25px; color: red;"><i class="fa fa-times-circle"></i></a>
                                </span>
                                @endif
                                <img src="{{asset($item->image())}}" style="max-width: 50px;" />
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-3 col-lg-6">
                                <label class="form-label">Target New Window</label>
                                <div>
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" name="target" {{$item->target?'checked':''}} > Active
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection 
@push('js') 
@endpush
