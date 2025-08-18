@extends(adminTheme().'layouts.app') 
@section('title')
<title>{{websiteTitle('Pages List')}}</title>
@endsection 
@push('css')

@endpush 
@section('contents')
<div class="row">
    <div class="col-md-6">
        <div class="page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active"><a href="{{route('admin.dashboard')}}">Dashboard </a></li>
                <li class="breadcrumb-item">Pages List</li>
            </ol>
        </div>
    </div>
    <div class="col-md-6">
        <div class="text-start text-md-end mb-3">
            <a href="{{route('admin.pagesAction','create')}}" class="btn btn-info"><i class="fa-solid fa-plus"></i> Add Page</a>
            <a href="{{route('admin.pages')}}" class="btn btn-success">
                <i class="fa-solid fa-rotate"></i>
            </a>
        </div>
    </div>
</div>


@include(adminTheme().'alerts')

<div class="card">
    <div class="card-header" style="border-bottom: 1px solid #e3ebf3;">
        <h4 class="card-title">Pages List</h4>
    </div>
    <div class="card-content">
        <div class="card-body">
                <div class="row">
                    <div class="col-md-4">
                        <form action="{{route('admin.pages')}}">
                            <div class="input-group mb-3">
                                <input type="text" name="search" value="{{request()->search?request()->search:''}}" placeholder="Page Name" class="form-control {{$errors->has('search')?'error':''}}" />
                                <button type="submit" class="btn btn-success btn-sm rounded-0">Search</button>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-2"></div>
                    <div class="col-md-6">
                        <ul class="statuslist mt-1 mb-3">
                            <li><a href="{{route('admin.pages')}}">All ({{$total->total}})</a></li>
                            <li><a href="{{route('admin.pages',['status'=>'active'])}}">Active ({{$total->active}})</a></li>
                            <li><a href="{{route('admin.pages',['status'=>'inactive'])}}">Inactive ({{$total->inactive}})</a></li>
                        </ul>
                    </div>
                </div>
                <div class="table-responsive" style="min-height:300px;">
                    <table class="table table-responsive-md">
                        <thead>
                            <tr>
                                <th style="min-width: 60px;width: 60px;text-align: center;">SL</th>
                                <th style="min-width: 300px;">Name</th>
                                <th style="min-width: 70px; width: 70px;text-align: center;">Image</th>
                                <th style="min-width: 100px; width: 100px;">Status</th>
                                <th style="min-width: 60px; width: 60px;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($pages as $i=>$page)
                            <tr>
                                <td class="text-center"><strong class="text-black">{{$pages->currentpage()==1?$i+1:$i+($pages->perpage()*($pages->currentpage() - 1))+1}}</strong></td>
                                <td>
                                    <b>
                                        <a href="{{route('pageView',$page->slug?:'no-slug')}}" target="_blank">{{$page->name}}
                                        </a>
                                        @if($page->template)
                                        <span style="color: #ccc;">({{$page->template}})</span>
                                        @endif
                                        </b>
                                        <br />
                                    @if($page->featured==true)
                                    <span><i class="fa fa-star" style="color: #faca51;"></i></span>
                                    @endif

                                    <span style="color: #ccc;"><i class="fa fa-calendar" style="color: #1ab394;"></i> {{$page->created_at->format('d-m-Y')}}</span>
                                    <span style="color: #ccc;">
                                        <i class="fa fa-user" style="color: #1ab394;"></i>
                                        {{Str::limit($page->user?$page->user->name:'No Author',15)}}
                                    </span>
                                </td>
                                <td style="padding:0 5px;text-align: center;">
                                    <img src="{{asset($page->image())}}" style="max-width: 60px;max-height: 60px;" />
                                </td>
                                <td>
                                    @if($page->status=='active')
                                    <span class="badge badge-success">Active </span>
                                    @elseif($page->status=='inactive')
                                    <span class="badge badge-danger">Inactive </span>
                                    @else
                                    <span class="badge badge-danger">Draft </span>
                                    @endif
                                </td>
                                <td style="text-align:center;">
                                    <div class="dropdown">
                                        <button type="button" class="btn btn-success light sharp" data-bs-toggle="dropdown">
                                            <i class="fas fa-ellipsis-h"></i>
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="{{route('admin.pagesAction',['edit',$page->id])}}"><i class="fa fa-edit"></i> Edit </a>
                                            <a class="dropdown-item" href="{{route('admin.pagesAction',['delete',$page->id])}}" onclick="return confirm('Are You Want To Delete')" ><i class="fa fa-trash"></i> Delete </a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                            @if($pages->count()==0)
                                <tr>
                                    <td colspan="5" class="text-center">No Result Found</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>

                    {{$pages->links('pagination')}}
                </div>
        </div>
    </div>
</div>


@endsection @push('js') @endpush
