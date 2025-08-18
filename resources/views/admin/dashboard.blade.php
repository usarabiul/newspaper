@extends(adminTheme().'layouts.app') @section('title')
<title>{{websiteTitle('Dashboard')}}</title>
@endsection @push('css')
<style type="text/css"></style>
@endpush @section('contents')
<div class="row">
    <div class="col-xl-3 col-xxl-6 col-sm-6">
        <div class="card grd-card">
            <div class="card-body">	
                <div class="media align-items-center">
                    <div class="media-body me-2">
                        <h2 class="text-white font-w600">{{number_format($reports['pages'])}}</h2>
                        <span class="text-white">Total Pages</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-xxl-6 col-sm-6">
        <div class="card grd-card">
            <div class="card-body">	
                <div class="media align-items-center">
                    <div class="media-body me-2">
                        <h2 class="text-white font-w600">{{number_format($reports['posts'])}}</h2>
                        <span class="text-white">Total Posts</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-xxl-6 col-sm-6">
        <div class="card grd-card">
            <div class="card-body">	
                <div class="media align-items-center">
                    <div class="media-body me-2">
                        <h2 class="text-white font-w600">{{number_format($reports['services'])}}</h2>
                        <span class="text-white">Total Services</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-xxl-6 col-sm-6">
        <div class="card grd-card">
            <div class="card-body">	
                <div class="media align-items-center">
                    <div class="media-body me-2">
                        <h2 class="text-white font-w600">{{number_format($reports['users'])}}</h2>
                        <span class="text-white">Total Customers</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection @push('js')
<script>
</script>
@endpush