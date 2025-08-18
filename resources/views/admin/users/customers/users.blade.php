@extends(adminTheme().'layouts.app') 
@section('title')
<title>{{websiteTitle('Customer Users')}}</title>
@endsection 
@push('css')
<style type="text/css"></style>
@endpush 
@section('contents')

<div class="row">
    <div class="col-md-6">
        <div class="page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active"><a href="{{route('admin.dashboard')}}">Dashboard </a></li>
                <li class="breadcrumb-item">All Users</li>
            </ol>
        </div>
    </div>
    <div class="col-md-6">
        <div class="text-start text-md-end mb-3">
            <button type="button" data-bs-toggle="modal" data-bs-target="#AddUser" class="btn btn-info"><i class="fa-solid fa-plus"></i> Add User</button>
            <a href="{{route('admin.usersCustomer')}}" class="btn btn-success">
                <i class="fa-solid fa-rotate"></i>
            </a>
        </div>
    </div>
</div>



@include(adminTheme().'alerts')

<div class="card">
    <div class="card-header" style="border-bottom: 1px solid #e3ebf3;">
        <h4 class="card-title">Users List</h4>
    </div>
    <div class="card-content">
        <div class="card-body">
            <form action="{{route('admin.usersCustomer')}}">
                <div class="row">
                    <div class="col-md-6 mb-1">
                        <div class="input-group">
                            <input type="date" name="startDate" value="{{request()->startDate?:''}}" class="form-control {{$errors->has('startDate')?'error':''}}" />
                            <input type="date" value="{{request()->endDate?:''}}" name="endDate" class="form-control {{$errors->has('endDate')?'error':''}}" />
                        </div>
                    </div>
                    <div class="col-md-6 mb-1">
                        <div class="input-group">
                            <input type="text" name="search" value="{{request()->search?:''}}" placeholder="User Name, Email, Mobile" class="form-control {{$errors->has('search')?'error':''}}" />
                            <button type="submit" class="btn btn-success btn-sm rounded-0">Search</button>
                        </div>
                    </div>
                </div>
            </form>
            <hr>
        <form action="{{route('admin.usersCustomer')}}">
            <div class="row">
                <div class="col-md-4">
                    <div class="input-group mb-1">
                        <select class="form-control form-control-sm rounded-0" name="action" required="">
                            <option value="">Select Action</option>
                            <option value="1">Active</option>
                            <option value="2">Inactive</option>
                            <option value="5">Delete</option>
                        </select>
                        <button class="btn btn-sm btn-primary rounded-0" onclick="return confirm('Are You Want To Action?')">Action</button>
                    </div>
                </div>
                <div class="col-md-4">
                    
                </div>
                <div class="col-md-4">
                    <ul class="statuslist">
                        <li><a href="{{route('admin.usersCustomer')}}">All ({{$total->total}})</a></li>
                        <li><a href="{{route('admin.usersCustomer',['status'=>'active'])}}">Active ({{$total->active}})</a></li>
                        <li><a href="{{route('admin.usersCustomer',['status'=>'inactive'])}}">Inactive ({{$total->inactive}})</a></li>
                    </ul>
                </div>
            </div>

            <div class="table-responsive" style="min-height:300px;">
                <table class="table table-responsive-md">
                    <thead>
                        <tr>
                            <th style="min-width: 100px; width: 100px;">
                                <label> 
                                    <input type="checkbox" class="form-check-input m-0" id="checkall"  > All <span class="checkCounter"></span>     
                                </label>
                            </th>
                            <th style="min-width: 80px; width: 80px;text-align: center;">Image</th>
                            <th style="min-width: 200px; width: 200px;">Name</th>
                            <th style="min-width: 150px;">Email/Mobile</th>
                            <th style="min-width: 80px;">Status</th>
                            <th style="min-width: 100px;">Join Date</th>
                            <th style="min-width: 60px; width: 60px;">Action</th>
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
                                <b>SL:</b> {{$users->currentpage()==1?$i+1:$i+($users->perpage()*($users->currentpage() - 1))+1}}
                            </td>
                            <td style="padding: 0 3px; text-align: center;">
                                <span>
                                    <img src="{{asset($user->image())}}" style="max-width: 60px; max-height: 50px;" />
                                </span>
                            </td>
                            <td><b><a href="{{route('admin.usersCustomerAction',['edit',$user->id])}}" class="invoice-action-view mr-1">{{$user->name}}</a></b></td>
                            <td>{{$user->email?:$user->mobile}}</td>
                            <td>
                                @if($user->status)
                                <span class="badge badge-success">Active </span>
                                @else
                                <span class="badge badge-danger">Inactive </span>
                                @endif
                            </td>
                            <td>{{$user->created_at->format('d M Y')}}</td>
                            <td style="text-align:center;">
                                <div class="dropdown">
                                    <button type="button" class="btn btn-success light sharp" data-bs-toggle="dropdown">
                                        <i class="fas fa-ellipsis-h"></i>
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="{{route('admin.usersCustomerAction',['edit',$user->id])}}"><i class="fa fa-edit"></i> Edit </a>
                                        @if($user->id!=Auth::id())
                                        <a class="dropdown-item" href="{{route('admin.usersCustomerAction',['delete',$user->id])}}" onclick="return confirm('Are You Want To Delete')" ><i class="fa fa-trash"></i> Delete </a>
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
 <div class="modal fade text-left" id="AddUser" tabindex="-1" role="dialog">
   <div class="modal-dialog" role="document">
	 <div class="modal-content">
	 	<form action="{{route('admin.usersCustomerAction','create')}}" method="post">
	   		@csrf
	   <div class="modal-header">
		 <h4 class="modal-title">Add User</h4>
		 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
	   </div>
	   <div class="modal-body">
	   		<div class="mb-3">
			    <label class="form-label">Name* </label>
                <input type="text" class="form-control {{$errors->has('name')?'error':''}}" name="name" placeholder="Enter Name" required="">
				@if ($errors->has('name'))
				<div class="invalid-feedback">{{ $errors->first('name') }}</div>
				@endif
         	</div>
			 <div class="mb-3">
				<label class="form-label">Email/Mobile* </label>
                <input type="text" class="form-control {{$errors->has('email_mobile')?'error':''}}" name="email_mobile" placeholder="Enter Email/Mobile" required="">
                @if ($errors->has('email_mobile'))
                <div class="invalid-feedback">{{ $errors->first('email_mobile') }}</div>
                @endif
         	</div>
	   </div>
	   <div class="modal-footer">
		 <button type="button" class="btn grey btn-outline-secondary" data-bs-dismiss="modal">Close </button>
		 <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i> Add User</button>
	   </div>
	   </form>
	 </div>
   </div>
 </div>



@endsection 
@push('js') 
@endpush
