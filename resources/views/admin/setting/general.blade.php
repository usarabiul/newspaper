@extends(adminTheme().'layouts.app') @section('title')
<title>{{websiteTitle(ucfirst($type).' Setting')}}</title>
@endsection 
@push('css')
<style type="text/css"></style>
@endpush 
@section('contents')

<div class="page-titles">
    <ol class="breadcrumb">
        <li class="breadcrumb-item active"><a href="{{route('admin.dashboard')}}">Dashboard </a></li>
        <li class="breadcrumb-item">{{ucfirst($type)}} Setting </li>
    </ol>
</div>


@include(adminTheme().'alerts')
<form action="{{route('admin.settingUpdate',$type)}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header" style="border-bottom: 1px solid #e3ebf3;">
                    <h4 class="card-title">General Info</h4>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-xl-6 col-lg-6 col-md-12 mb-3">
                                <label class="form-label">Website Title </label>
                                <input type="text" name="title" value="{{ old('title')?:$general->title }}" placeholder="Website Title" class="form-control {{$errors->has('title')?'is-invalid':''}}" />
                                @if ($errors->has('title'))
                                <div class="invalid-feedback">{{ $errors->first('title') }}</div>
                                @endif
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-12 mb-3">
                                <label class="form-label">Website Subtitle</label>
                                <input type="text" name="subtitle" value="{{ old('subtitle')?:$general->subtitle }}" placeholder="Website subtitle" class="form-control {{$errors->has('subtitle')?'is-invalid':''}}" />
                                @if ($errors->has('subtitle'))
                                <div class="invalid-feedback">{{ $errors->first('subtitle') }}</div>
                                @endif
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-12 mb-3">
                                <label class="form-label">Mobile Number</label>
                                <input type="text" name="mobile" value="{{ old('mobile')?:$general->mobile }}" placeholder="Website mobile" class="form-control {{$errors->has('mobile')?'is-invalid':''}}" />
                                @if ($errors->has('mobile'))
                                <div class="invalid-feedback">{{ $errors->first('mobile') }}</div>
                                @endif
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-12 mb-3">
                                <label class="form-label">Email Address</label>
                                <input type="text" name="email" value="{{ old('email')?:$general->email }}" placeholder="Website email" class="form-control {{$errors->has('email')?'is-invalid':''}}" />
                                @if ($errors->has('email'))
                                <div class="invalid-feedback">{{ $errors->first('email') }}</div>
                                @endif
                            </div>

                            <div class="col-xl-6 col-lg-6 col-md-12 mb-3">
                                <label class="form-label">Address line 1</label>
                                <textarea name="address_one" placeholder="Address Line 1" class="form-control  {{$errors->has('address_one')?'is-invalid':''}}">{{ old('address_one')?:$general->address_one}}</textarea>
                                @if ($errors->has('address_one'))
                                <div class="invalid-feedback">{{ $errors->first('address_one') }}</div>
                                @endif
                            </div>

                            <div class="col-xl-6 col-lg-6 col-md-12 mb-3">
                                <label class="form-label">Address line 2</label>
                                <textarea name="address_two" placeholder="Address Line 1" class="form-control {{$errors->has('address_two')?'is-invalid':''}}">{{ old('address_two')?:$general->address_two}}</textarea>
                                @if ($errors->has('address_two'))
                                <div class="invalid-feedback">{{ $errors->first('address_two') }}</div>
                                @endif
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-12 mb-3">
                                <label class="form-label">Favicon</label>
                                <input type="file" name="favicon" accept="image/*" class="form-control {{$errors->has('favicon')?'is-invalid':''}}" />
                                @if ($errors->has('favicon'))
                                <div class="invalid-feedback">{{ $errors->first('favicon') }}</div>
                                @endif
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-12 mb-3">
                                <img src="{{asset($general->favicon())}}" style="max-width: 60px;" />
                                @if($general->favicon)
                                <a href="{{route('admin.setting','favicon')}}" style="color: red;" onclick="return confirm('Are You Want To Delete?')"><i class="fa fa-trash"></i></a>
                                @endif
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-12 mb-3">
                                <label class="form-label">Logo</label>
                                <input type="file" name="logo" accept="image/*" class="form-control {{$errors->has('logo')?'is-invalid':''}}" />
                                @if ($errors->has('logo'))
                                <div class="invalid-feedback">{{ $errors->first('logo') }}</div>
                                @endif
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-12 mb-3">
                                <img src="{{asset($general->logo())}}" style="max-width: 150px;" />
                                @if($general->logo)
                                <a href="{{route('admin.setting','logo')}}" style="color: red;" onclick="return confirm('Are You Want To Delete?')"><i class="fa fa-trash"></i></a>
                                @endif
                            </div>

                            <div class="col-xl-6 col-lg-6 col-md-12 mb-3">
                                <label class="form-label">Website Url</label>
                                <input type="text" name="website" value="{{ old('website')?:$general->website }}" placeholder="Website website" class="form-control {{$errors->has('website')?'is-invalid':''}}" />
                                @if ($errors->has('website'))
                                <div class="invalid-feedback">{{ $errors->first('website') }}</div>
                                @endif
                            </div>
                            <div class="col-xl-12 col-lg-12 col-md-12 mb-3">
                                <label class="form-label">Footer Text</label>
                                <input type="text" name="footer_text" value="{{ old('footer_text')?:$general->copyright_text }}" placeholder="Website Footer Text" class="form-control {{$errors->has('footer_text')?'is-invalid':''}}" />
                                @if ($errors->has('footer_text'))
                                <div class="invalid-feedback">{{ $errors->first('footer_text') }}</div>
                                @endif
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary px-4">Save changes</button>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header" style="border-bottom: 1px solid #e3ebf3;">
                    <h4 class="card-title">SEO Optimize</h4>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-xl-6 col-lg-6 col-md-12 mb-3">
                                <label class="form-label">Meta Author</label>
                                <input type="text" name="meta_author" value="{{ old('meta_author')?:$general->meta_author }}" placeholder="Meta Author" class="form-control {{$errors->has('meta_author')?'is-invalid':''}}" />
                                @if ($errors->has('meta_author'))
                                <div class="invalid-feedback">{{ $errors->first('meta_author') }}</div>
                                @endif
                            </div>

                            <div class="col-xl-6 col-lg-6 col-md-12 mb-3">
                                <label class="form-label">Meta title <small>(Max: 60 L)</small></label>
                                <input type="text" name="meta_title" value="{{ old('meta_title')?:$general->meta_title }}" placeholder="Meta title" class="form-control {{$errors->has('meta_title')?'is-invalid':''}}" />
                                @if ($errors->has('meta_title'))
                                <div class="invalid-feedback">{{ $errors->first('meta_title') }}</div>
                                @endif
                            </div>

                            <div class="col-xl-6 col-lg-6 col-md-12 mb-3">
                                <label class="form-label">Meta keyword </label>
                                <textarea name="meta_keyword" placeholder="Meta keyword" class="form-control  {{$errors->has('meta_keyword')?'is-invalid':''}}">{{ old('meta_keyword')?:$general->meta_keyword}}</textarea>
                                @if ($errors->has('meta_keyword'))
                                <div class="invalid-feedback">{{ $errors->first('meta_keyword') }}</div>
                                @endif
                            </div>

                            <div class="col-xl-6 col-lg-6 col-md-12 mb-3">
                                <label class="form-label">Meta Description <small>(Max: 160 L)</small></label>
                                <textarea name="meta_description" placeholder="Meta Description" class="form-control  {{$errors->has('meta_description')?'is-invalid':''}}">{{ old('meta_description')?:$general->meta_description}}</textarea>
                                @if ($errors->has('meta_description'))
                                <div class="invalid-feedback">{{ $errors->first('meta_description') }}</div>
                                @endif
                            </div>

                            <div class="col-xl-6 col-lg-6 col-md-12 mb-3">
                                <label class="form-label">Script tag Head</label>
                                <textarea name="script_head" placeholder="Script tag Head" class="form-control  {{$errors->has('script_head')?'is-invalid':''}}">{{ old('script_head')?:$general->script_head}}</textarea>
                                @if ($errors->has('script_head'))
                                <div class="invalid-feedback">{{ $errors->first('script_head') }}</div>
                                @endif
                            </div>

                            <div class="col-xl-6 col-lg-6 col-md-12 mb-3">
                                <label class="form-label">Script tag Body</label>
                                <textarea name="script_body" placeholder="Script tag Body" class="form-control  {{$errors->has('script_body')?'is-invalid':''}}">{{ old('script_body')?:$general->script_body}}</textarea>
                                @if ($errors->has('script_body'))
                                <div class="invalid-feedback">{{ $errors->first('script_body') }}</div>
                                @endif
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary px-4">Save changes</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

@endsection @push('js') @endpush
