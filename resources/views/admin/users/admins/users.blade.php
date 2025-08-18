@extends(adminTheme().'layouts.app') 
@section('title')
<title>{{websiteTitle('Admin Users')}}</title>
@endsection @push('css')
<style type="text/css"></style>
@endpush @section('contents')

<div class="row">
    <div class="col-md-6">
        <div class="page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active"><a href="{{route('admin.dashboard')}}">Dashboard </a></li>
                <li class="breadcrumb-item">Admin Users</li>
            </ol>
        </div>
    </div>
    <div class="col-md-6">
        <div class="text-start text-md-end mb-3">
            <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#AddUser"><i class="fa-solid fa-plus"></i> Add User</button>
            <a href="{{route('admin.usersAdmin')}}" class="btn btn-success">
                <i class="fa-solid fa-rotate"></i>
            </a>
        </div>
    </div>
</div>


@include(adminTheme().'alerts')

<div class="card">
    <div class="card-header" style="border-bottom: 1px solid #e3ebf3;">
        <h4 class="card-title">Admin users List</h4>
    </div>
    <div class="card-content">
        <div class="card-body">
        <form action="{{route('admin.usersAdmin')}}">
            <div class="row">
                <div class="col-md-4 mb-1">
                <select name="role" class="form-control {{$errors->has('role')?'error':''}}">
                    <option value="">Select Role</option>
                    @foreach($roles as $role)
                    <option value="{{$role->id}}" {{request()->role==$role->id?'selected':''}}>{{$role->name}}</option>
                    @endforeach
                </select>
                </div>
                <div class="col-md-8 mb-1">
                    <div class="input-group">
                        <input type="text" name="search" value="{{request()->search?request()->search:''}}" placeholder="User Name, Email, Mobile" class="form-control {{$errors->has('search')?'error':''}}" />
                        <button type="submit" class="btn btn-success btn-sm rounded-0">Search</button>
                    </div>
                </div>
            </div>
        </form>
        <hr>
        <form action="{{route('admin.usersAdmin')}}">
            <div class="row">
                <div class="col-md-4">
                    <div class="input-group mb-1">
                        <select class="form-control form-control-sm rounded-0" name="action" required="">
                            <option value="">Select Action</option>
                            <option value="1">Active</option>
                            <option value="2">Inactive</option>
                            <option value="5">Remove</option>
                        </select>
                        <button class="btn btn-sm btn-primary rounded-0" onclick="return confirm('Are You Want To Action?')">Action</button>
                    </div>
                </div>
                <div class="col-md-4">
                    
                </div>
                <div class="col-md-4">
                    <ul class="statuslist">
                        <li><a href="{{route('admin.usersAdmin')}}">All ({{$total->total}})</a></li>
                        <li><a href="{{route('admin.usersAdmin',['status'=>'active'])}}">Active ({{$total->active}})</a></li>
                        <li><a href="{{route('admin.usersAdmin',['status'=>'inactive'])}}">Inactive ({{$total->inactive}})</a></li>
                    </ul>
                </div>
            </div>

            <div class="table-responsive" style="min-height:300px;" >
                <table class="table table-responsive-md">
                    <thead>
                        <tr>
                            <th style="min-width: 100px; width: 100px;">
                                <label> 
                                    <input type="checkbox" class="form-check-input m-0" id="checkall"  > All <span class="checkCounter"></span>     
                                </label>
                            </th>
                            <th style="min-width: 80px;">Image</th>
                            <th style="min-width: 250px; width: 250px;">Name</th>
                            <th style="min-width: 150px;">Email/Mobile</th>
                            <th style="min-width: 100px;">Role</th>
                            <th style="min-width: 80px;">Status</th>
                            <th style="min-width: 80px; width: 80px;">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $i=>$user)
                        <tr>
                            <td>
                                @if($user->id!=Auth::id())
                                <label>
                                    <input type="checkbox" class="form-check-input" name="checkid[]" value="{{$user->id}}" >
                                </label>
                                @endif
                                <br />
                                <b>SL:</b> 
                                {{$users->currentpage()==1?$i+1:$i+($users->perpage()*($users->currentpage() - 1))+1}}
                            </td>
                            <td style="padding: 0 3px; text-align: center;">
                                <span>
                                    <img src="{{asset($user->image())}}" style="max-width: 60px; max-height: 50px;" />
                                </span>
                            </td>
                            <td>
                                <a href="{{route('admin.usersAdminAction',['edit',$user->id])}}" class="invoice-action-view mr-1">{{$user->name}} </a>
                            </td>
                            <td>{{$user->email?:$user->mobile}}</td>
                            <td> 
                                @if($user->permission)
                                <span class="badge badge-info">{{$user->permission->name}}</span>
                                @else
                                <span class="badge badge-danger">Un-athorize</span>
                                @endif
                            </td>

                            <td>
                                @if($user->status)
                                <span class="badge badge-success">Active </span>
                                @else
                                <span class="badge badge-danger">Inactive </span>
                                @endif
                            </td>
                            <td style="text-align:center;">
                                <div class="dropdown">
                                    <button type="button" class="btn btn-success light sharp" data-bs-toggle="dropdown">
                                        <i class="fas fa-ellipsis-h"></i>
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="{{route('admin.usersAdminAction',['edit',$user->id])}}"><i class="fa fa-edit"></i> Edit </a>
                                        @if($user->id!=Auth::id())
                                        <a class="dropdown-item" href="{{route('admin.usersAdminAction',['delete',$user->id])}}" onclick="return confirm('Are You Want To Remove')" ><i class="fa fa-trash"></i> Remove </a>
                                        @endif 
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            {{$users->links('pagination')}}
        </form>
        </div>
    </div>
</div>



<!-- Modal -->
<div class="modal fade text-left" id="AddUser" tabindex="-1" >
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="{{route('admin.usersAdminAction','create')}}" method="post">
                @csrf
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel1">Add Admin User</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <label class="form-label">Email/Mobile</label>
                    <input type="text" class="form-control {{$errors->has('username')?'error':''}}" name="username" placeholder="Enter Email/Mobile" value="" required="" />
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn grey btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i> Add User</button>
                </div>
            </form>
        </div>
    </div>
</div>
 @endsection @push('js') @endpush
