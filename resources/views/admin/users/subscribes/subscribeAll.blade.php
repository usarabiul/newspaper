@extends(adminTheme().'layouts.app')
@section('title')
<title>{{websiteTitle('Subscribers')}}</title>
@endsection

@push('css')
<style type="text/css">

</style>
@endpush
@section('contents')

<div class="row">
    <div class="col-md-6">
        <div class="page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active"><a href="{{route('admin.dashboard')}}">Dashboard </a></li>
                <li class="breadcrumb-item">All Subscribers</li>
            </ol>
        </div>
    </div>
    <div class="col-md-6">
        <div class="text-start text-md-end mb-3">
            <a href="{{route('admin.subscribes')}}" class="btn btn-success">
                <i class="fa-solid fa-rotate"></i>
            </a>
        </div>
    </div>
</div>


@include(adminTheme().'alerts')
<div class="card">
	<div class="card-header" style="border-bottom: 1px solid #e3ebf3;">
		<h4 class="card-title">Subscribes List</h4>
	</div>
	<div class="card-content">
	<div class="card-body">
		<form action="{{route('admin.subscribes')}}">
			<div class="row">
				<div class="col-md-6 mb-1">
					<div class="input-group">
						<input type="date" name="startDate" value="{{request()->startDate?:''}}" class="form-control {{$errors->has('startDate')?'error':''}}">
						<input type="date" value="{{request()->endDate?:''}}" name="endDate" class="form-control {{$errors->has('endDate')?'error':''}}">
					</div>
				</div>
				<div class="col-md-6 mb-1">
					<div class="input-group">
						<input type="text" name="search" value="{{request()->search?:''}}" placeholder="Subscriber Email" class="form-control {{$errors->has('search')?'error':''}}">
						<button type="submit" class="btn btn-success btn-sm rounded-0">Search</button>
					</div>
				</div>
			</div>
		</form>
		<hr>
		<form action="{{route('admin.subscribes')}}">
			<div class="row">
				<div class="col-md-4">
					<div class="input-group mb-1">
						<select class="form-control form-control-sm rounded-0" name="action" required="">
							<option value="">Select Action</option>
							<option value="1">Subscribe Delete</option>
						</select>
						<button class="btn btn-sm btn-primary rounded-0" onclick="return confirm('Are You Want To Action?')">Action</button>
					</div>
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
							<th>Name</th>
							<th style="min-width: 150px;width:150px;">Date</th>
						</tr>
					</thead>
					<tbody>
						@foreach($subscribes as $i=>$subscribe)
						<tr>
							<th>
								<label>
                                    <input type="checkbox" class="form-check-input" name="checkid[]" value="{{$subscribe->id}}" style="margin-top: 0;" >
								</label>
								{{$subscribes->currentpage()==1?$i+1:$i+($subscribes->perpage()*($subscribes->currentpage() - 1))+1}}
							</th>
							<td>{{$subscribe->email}}</td>
							<td>{{$subscribe->created_at->format('d-m-Y')}}</td>
						</tr>
						@endforeach
						@if($subscribes->count()==0)
							<tr>
								<td colspan="3" class="text-center">No Result Found</td>
							</tr>
						@endif
					</tbody>
				</table>

				
			</div>
			{{$subscribes->links('pagination')}}
			</form>
		</div>
	</div>
</div>





@endsection
@push('js')

@endpush