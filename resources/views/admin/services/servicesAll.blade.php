@extends(adminTheme().'layouts.app') @section('title')
<title>{{websiteTitle('Services List')}}</title>
@endsection @push('css')
<style type="text/css"></style>
@endpush 
@section('contents')

<div class="row">
    <div class="col-md-6">
        <div class="page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active"><a href="{{route('admin.dashboard')}}">Dashboard </a></li>
                <li class="breadcrumb-item">Services List</li>
            </ol>
        </div>
    </div>
    <div class="col-md-6">
        <div class="text-start text-md-end mb-3">
            <a href="{{route('admin.servicesAction','create')}}" class="btn btn-info"><i class="fa-solid fa-plus"></i> Add Service</a>
            <a href="{{route('admin.services')}}" class="btn btn-success">
                <i class="fa-solid fa-rotate"></i>
            </a>
        </div>
    </div>
</div>



@include('admin.alerts')
<div class="card">
    <div class="card-header" style="border-bottom: 1px solid #e3ebf3;">
        <h4 class="card-title">Services List</h4>
    </div>
    <div class="card-content">
        <div class="card-body">
            <form action="{{route('admin.services')}}">
                <div class="row">
                    <div class="col-md-6 mb-1">
                        <div class="input-group">
                            <input type="date" name="startDate" value="{{request()->startDate?Carbon\Carbon::parse(request()->startDate)->format('Y-m-d') :''}}" class="form-control {{$errors->has('startDate')?'error':''}}" />
                            <input type="date" value="{{request()->endDate?Carbon\Carbon::parse(request()->endDate)->format('Y-m-d') :''}}" name="endDate" class="form-control {{$errors->has('endDate')?'error':''}}" />
                        </div>
                    </div>
                    <div class="col-md-6 mb-1">
                        <div class="input-group">
                            <input type="text" name="search" value="{{request()->search?request()->search:''}}" placeholder="Service Name, Category Name" class="form-control {{$errors->has('search')?'error':''}}" />
                            <button type="submit" class="btn btn-success btn-sm rounded-0">Search</button>
                        </div>
                    </div>
                </div>
            </form>
            <hr>
            <form action="{{route('admin.services')}}">
                <div class="row">
                    <div class="col-md-4">
                        <div class="input-group mb-1">
                            <select class="form-control form-control-sm rounded-0" name="action" required="">
                                <option value="">Select Action</option>
                                <option value="1">Active</option>
                                <option value="2">InActive</option>
                                <option value="3">Featured</option>
                                <option value="4">Un-featured</option>
                                <option value="5">Delete</option>
                            </select>
                            <button class="btn btn-sm btn-primary rounded-0" onclick="return confirm('Are You Want To Action?')">Action</button>
                        </div>
                    </div>
                    <div class="col-md-4"></div>
                    <div class="col-md-4">
                        <ul class="statuslist">
                            <li><a href="{{route('admin.services')}}">All ({{$total->total}})</a></li>
                            <li><a href="{{route('admin.services',['status'=>'active'])}}">Active ({{$total->active}})</a></li>
                            <li><a href="{{route('admin.services',['status'=>'inactive'])}}">Inactive ({{$total->inactive}})</a></li>
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
                                <th style="min-width: 300px;">Service Name</th>
                                <th style="min-width: 70px; width: 70px;text-align: center;">Image</th>
                                <th style="min-width: 200px;">Category</th>
                                <th style="min-width: 60px;width: 60px;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($services as $i=>$service)
                            <tr>
                                <td>
                                    <label>
                                        <input type="checkbox" class="form-check-input" name="checkid[]" value="{{$service->id}}" >
                                    </label>
                                    <br />
                                   <b>SL:</b> {{$services->currentpage()==1?$i+1:$i+($services->perpage()*($services->currentpage() - 1))+1}}
                                </td>
                                <td>
                                    <b><a href="{{route('serviceView',$service->slug?:'no-slug')}}" target="_blank">{{$service->name}}</a></b>
                                    <br/>
                                    <span style="color: #ccc;"><i class="fa fa-eye" style="color: #1ab394;"></i> 0</span>

                                    @if($service->status=='active')
                                    <span class="badge badge-success">Active </span>
                                    @elseif($service->status=='inactive')
                                    <span class="badge badge-danger">Inactive </span>
                                    @else
                                    <span class="badge badge-danger">Draft </span>
                                    @endif 
                                    @if($service->featured==true)
                                    <span><i class="fa fa-star" style="color: #faca51;"></i></span>
                                    @endif

                                    <span style="color: #ccc;"><i class="fa fa-calendar" style="color: #1ab394;"></i> {{$service->created_at->format('d-m-Y')}}</span>
                                </td>
                                <td style="padding: 5px; text-align: center;">
                                    <img src="{{asset($service->image())}}" style="max-width: 80px; max-height: 50px;" />
                                </td>
                                <td>
                                    @foreach($service->serviceCategories as $i=>$ctg) {{$i==0?'':'-'}} {{$ctg->name}} @endforeach
                                </td>
                                <td style="text-align:center;">
                                    <div class="dropdown">
                                        <button type="button" class="btn btn-success light sharp" data-bs-toggle="dropdown">
                                            <i class="fas fa-ellipsis-h"></i>
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="{{route('admin.servicesAction',['edit',$service->id])}}"><i class="fa fa-edit"></i> Edit </a>
                                            <a class="dropdown-item" href="{{route('admin.servicesAction',['delete',$service->id])}}" onclick="return confirm('Are You Want To Delete')" ><i class="fa fa-trash"></i> Delete </a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                            @if($services->count()==0)
                            <tr>
                                <td colspan="5" style="text-align:center;">No Record Found</td>
                            </tr>
                            @endif
                        </tbody>
                    </table>

                    {{$services->links('pagination')}}
                </div>
            </form>
        </div>
    </div>
</div>

@endsection @push('js') @endpush
