@extends(adminTheme().'layouts.app') @section('title')
<title>{{websiteTitle('Clients List')}}</title>
@endsection @push('css')
<style type="text/css"></style>
@endpush @section('contents')

<div class="row">
    <div class="col-md-6">
        <div class="page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active"><a href="{{route('admin.dashboard')}}">Dashboard </a></li>
                <li class="breadcrumb-item">Clients List</li>
            </ol>
        </div>
    </div>
    <div class="col-md-6">
        <div class="text-start text-md-end mb-3">
            <a href="{{route('admin.clientsAction','create')}}" class="btn btn-info"><i class="fa-solid fa-plus"></i> Add Client</a>
            <a href="{{route('admin.clients')}}" class="btn btn-success">
                <i class="fa-solid fa-rotate"></i>
            </a>
        </div>
    </div>
</div>


@include(adminTheme().'alerts')

<div class="card">
    <div class="card-header" style="border-bottom: 1px solid #e3ebf3;">
        <h4 class="card-title">Clients List</h4>
    </div>
    <div class="card-content">
        <div class="card-body">
            <form action="{{route('admin.clients')}}">
                <div class="row">
                    <div class="col-md-12 mb-0">
                        <div class="input-group">
                            <input type="text" name="search" value="{{request()->search?request()->search:''}}" placeholder="Client Name" class="form-control {{$errors->has('search')?'error':''}}" />
                            <button type="submit" class="btn btn-success btn-sm rounded-0">Search</button>
                        </div>
                    </div>
                </div>
            </form>
            <hr>
            <form action="{{route('admin.clients')}}">
                <div class="row">
                    <div class="col-md-4">
                        <div class="input-group mb-1">
                            <select class="form-control form-control-sm rounded-0" name="action" required="">
                                <option value="">Select Action</option>
                                <option value="1">Active</option>
                                <option value="2">Inactive</option>
                                <option value="3">Feature</option>
                                <option value="4">Un-Feature</option>
                                <option value="5">Delete</option>
                            </select>
                            <button class="btn btn-sm btn-primary rounded-0" onclick="return confirm('Are You Want To Action?')">Action</button>
                        </div>
                    </div>
                    <div class="col-md-4"></div>
                    <div class="col-md-4">
                        <ul class="statuslist">
                            <li><a href="{{route('admin.clients')}}">All ({{$total->total}})</a></li>
                            <li><a href="{{route('admin.clients',['status'=>'active'])}}">Active ({{$total->active}})</a></li>
                            <li><a href="{{route('admin.clients',['status'=>'inactive'])}}">Inactive ({{$total->inactive}})</a></li>
                        </ul>
                    </div>
                </div>
                <div class="table-responsive" style="min-height:300px;" >
                    <table class="table table-responsive-md">
                        <thead>
                            <tr>
                                <th style="min-width: 100px;width:100px;">
                                    <label>
                                        <input type="checkbox" class="form-check-input m-0" id="checkall"  > All <span class="checkCounter"></span>
                                    </label>
                                </th>
                                <th style="min-width: 300px;">Clients Name</th>
                                <th style="max-width: 80px;width:80px;text-align: center;">Image</th>
                                <th style="min-width: 60px;width: 60px;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($clients as $i=>$client)
                            <tr>
                                <td>
                                    <label>
                                        <input type="checkbox" class="form-check-input" name="checkid[]" value="{{$client->id}}" >
                                    </label>
                                    <br />
                                   <b>SL:</b>
                                    {{$clients->currentpage()==1?$i+1:$i+($clients->perpage()*($clients->currentpage() - 1))+1}}
                                </td>
                                <td>
                                    <span>{{$client->name}}</span><br />
                                    
                                    @if($client->status=='active')
                                    <span class="badge badge-success">Active </span>
                                    @elseif($client->status=='inactive')
                                    <span class="badge badge-danger">Inactive </span>
                                    @else
                                    <span class="badge badge-danger">Draft </span>
                                    @endif 

                                    @if($client->featured==true)
                                    <span><i class="fa fa-star" style="color: #faca51;"></i></span>
                                    @endif
                                    <span style="color: #ccc;">
                                        <i class="fa fa-user" style="color: #1ab394;"></i>
                                        {{$client->user?$client->user->name:'No Author'}}
                                    </span>
                                    <span style="color: #ccc;"><i class="fa fa-calendar" style="color: #1ab394;"></i> {{$client->created_at->format('d-m-Y')}}</span>
                                </td>
                                <td style="padding: 5px; text-align: center;">
                                    <img src="{{asset($client->image())}}" style="max-width: 80px; max-height: 50px;" />
                                </td>
                                <td style="text-align:center;">
                                    <div class="dropdown">
                                        <button type="button" class="btn btn-success light sharp" data-bs-toggle="dropdown">
                                            <i class="fas fa-ellipsis-h"></i>
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="{{route('admin.clientsAction',['edit',$client->id])}}"><i class="fa fa-edit"></i> Edit </a>
                                            <a class="dropdown-item" href="{{route('admin.clientsAction',['delete',$client->id])}}" onclick="return confirm('Are You Want To Delete')" ><i class="fa fa-trash"></i> Delete </a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                            @if($clients->count()==0)
                                <tr>
                                    <td colspan="5" class="text-center">No Result Found</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                    {{$clients->links('pagination')}}
                </div>
            </form>
        </div>
    </div>
</div>


@endsection @push('js') @endpush