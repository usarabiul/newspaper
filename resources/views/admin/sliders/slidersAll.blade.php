@extends(adminTheme().'layouts.app') @section('title')
<title>{{websiteTitle('Sliders List')}}</title>
@endsection @push('css')
<style type="text/css"></style>
@endpush @section('contents')

<div class="row">
    <div class="col-md-6">
        <div class="page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active"><a href="{{route('admin.dashboard')}}">Dashboard </a></li>
                <li class="breadcrumb-item">Sliders List</li>
            </ol>
        </div>
    </div>
    <div class="col-md-6">
        <div class="text-start text-md-end mb-3">
            <a href="{{route('admin.slidersAction','create')}}" class="btn btn-info"><i class="fa-solid fa-plus"></i> Add Slider</a>
            <a href="{{route('admin.sliders')}}" class="btn btn-success">
                <i class="fa-solid fa-rotate"></i>
            </a>
        </div>
    </div>
</div>

@include(adminTheme().'alerts')
<div class="card">
    <div class="card-header" style="border-bottom: 1px solid #e3ebf3;">
        <h4 class="card-title">Sliders List</h4>
    </div>
    <div class="card-content">
        <div class="card-body">
            <div class="table-responsive" style="min-height:300px;" >
                <table class="table table-responsive-md">
                    <thead>
                        <tr>
                            <th style="min-width: 50px;width:50px;">SL</th>
                            <th style="min-width: 300px;">Slider Name</th>
                            <th style="max-width: 80px;width:80px;">Image</th>
                            <th style="min-width: 60px;width: 60px;">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($sliders as $i=>$slider)
                        <tr>
                            <td>{{$i+1}}</td>
                            <td>
                                <span>{{$slider->name}} 
                                @if($slider->location)
                                <span style="color:#ccc;">({{$slider->location}})</span>
                                @endif
                                </span><br/>
                                @if($slider->status=='active')
                                <span class="badge badge-success">Active </span>
                                @elseif($slider->status=='inactive')
                                <span class="badge badge-danger">Inactive </span>
                                @else
                                <span class="badge badge-danger">Draft </span>
                                @endif
                                <span style="color:#ccc;">
                                    <i class="fa fa-user" style="color: #1ab394;"></i>
                                    {{$slider->user?$slider->user->name:'No Author'}}
                                </span>
                            </td>
                            <td style="padding: 5px; text-align: center;">
                                <img src="{{asset($slider->image())}}" style="max-width: 80px; max-height: 50px;" />
                            </td>
                            <td style="text-align:center;">
                                <div class="dropdown">
                                    <button type="button" class="btn btn-success light sharp" data-bs-toggle="dropdown">
                                        <i class="fas fa-ellipsis-h"></i>
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="{{route('admin.slidersAction',['edit',$slider->id])}}"><i class="fa fa-edit"></i> Edit </a>
                                        <a class="dropdown-item" href="{{route('admin.slidersAction',['delete',$slider->id])}}" onclick="return confirm('Are You Want To Delete')" ><i class="fa fa-trash"></i> Delete </a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                        @if($sliders->count()==0)
                            <tr>
                                <td colspan="4" class="text-center">No Result Found</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
                {{$sliders->links('pagination')}}
            </div>
        </div>
    </div>
</div>

@endsection @push('js') @endpush
