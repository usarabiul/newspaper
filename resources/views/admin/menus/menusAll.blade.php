@extends(adminTheme().'layouts.app') @section('title')
<title>{{websiteTitle('Menus List')}}</title>
@endsection @push('css')
<style type="text/css"></style>
@endpush @section('contents')

<div class="row">
    <div class="col-md-6">
        <div class="page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active"><a href="{{route('admin.dashboard')}}">Dashboard </a></li>
                <li class="breadcrumb-item">Menus List</li>
            </ol>
        </div>
    </div>
    <div class="col-md-6">
        <div class="text-start text-md-end mb-3">
            <a href="{{route('admin.menusAction','create')}}" class="btn btn-info"><i class="fa-solid fa-plus"></i> Add Menu</a>
            <a href="{{route('admin.menus')}}" class="btn btn-success">
                <i class="fa-solid fa-rotate"></i>
            </a>
        </div>
    </div>
</div>


@include(adminTheme().'alerts')
<div class="card">
    <div class="card-header" style="border-bottom: 1px solid #e3ebf3;">
        <h4 class="card-title">Menus List</h4>
    </div>
    <div class="card-content">
        <div class="card-body">
            <div class="table-responsive" style="min-height:300px;">
                <table class="table table-responsive-md">
                    <thead>
                        <tr>
                            <th style="min-width: 50px;width:50px;">S:L</th>
                            <th style="min-width: 300px;">Menu Name</th>
                            <th style="max-width: 150px;width:150px;">Location</th>
                            <th style="max-width: 100px;width:100px;">Items</th>
                            <th style="min-width: 60px;width: 60px;">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($menus as $i=>$menu)
                        <tr>
                            <td>
                                {{$i+1}}
                            </td>
                            <td>
                                <span>{{$menu->name}}</span><br />
                               @if($menu->status=='active')
                                <span class="badge badge-success">Active </span>
                                @elseif($menu->status=='inactive')
                                <span class="badge badge-danger">Inactive </span>
                                @else
                                <span class="badge badge-danger">Draft </span>
                                @endif
                                <span style="color:#ccc;">
                                    <i class="fa fa-user" style="color: #1ab394;"></i>
                                    {{$menu->user?$menu->user->name:'No Author'}}
                                </span>
                            </td>
                            <td>
                                {{ucfirst($menu->location)}}
                            </td>
                            <td style="text-align: center;">
                                {{$menu->MenuItems->count()}} items
                            </td>
                            <td style="text-align:center;">
                                <div class="dropdown">
                                    <button type="button" class="btn btn-success light sharp" data-bs-toggle="dropdown">
                                        <i class="fas fa-ellipsis-h"></i>
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="{{route('admin.menusAction',['edit',$menu->id])}}"><i class="fa fa-edit"></i> Edit </a>
                                        <a class="dropdown-item" href="{{route('admin.menusAction',['delete',$menu->id])}}" onclick="return confirm('Are You Want To Delete')" ><i class="fa fa-trash"></i> Delete </a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                        @if($menus->count()==0)
                            <tr>
                                <td colspan="5" class="text-center">No Result Found</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
                {{$menus->links('pagination')}}
            </div>
        </div>
    </div>
</div>

@endsection @push('js') @endpush
