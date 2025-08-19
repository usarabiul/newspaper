@extends('auth.app') 
@section('title')
<title>{{websiteTitle('Login')}}</title>
@endsection 
@section('SEO')
<meta name="description" content="{!!general()->meta_description!!}" />
<meta name="keywords" content="{{general()->meta_keyword}}" />
<meta property="og:title" content="{{websiteTitle('Login')}}" />
<meta property="og:description" content="{!!general()->meta_description!!}" />
<meta property="og:image" content="{!!general()->meta_description!!}" />
<meta property="og:url" content="{{route('login')}}" />
<link rel="canonical" href="{{route('login')}}">
@endsection 
@push('css')
<style>
</style>
@endpush 

@section('contents')

<div class="authincation">
	<div class="container h-100">
		<div class="row justify-content-center h-100 align-items-center">
			<div class="col-md-6">
				<div class="authincation-content">
					<div class="row no-gutters">
						<div class="col-xl-12">
							<div class="auth-form">
								<div class="text-center mb-3">
									<a href="index.html"><img src="{{asset(general()->logo())}}" alt="{{general()->title}}"></a>
								</div>
								@include(adminTheme().'alerts')
								<h4 class="text-center mb-4">Sign in your account</h4>
								<form action="{{route('login')}}" method="post">
									@csrf
									<div class="form-group mb-3">
										<label class="form-label">Email</label>
										<input type="email" class="form-control {{$errors->has('username')?'is-invalid':''}}" value="{{old('username')}}" name="username" placeholder="Enter email address">
										@if ($errors->has('username'))
										<div class="invalid-feedback">{{ $errors->first('username') }}</div>
										@endif
									</div>
									<div class="form-group mb-3">
										<label class="form-label">Password</label>
										<div class="position-relative">
											<input type="password" id="dz-password" name="password" class="form-control" value="{{old('password')}}" placeholder="Enter Password">
											<span class="show-pass eye">
												<i class="fa fa-eye-slash"></i>
												<i class="fa fa-eye"></i>
											</span>
										</div>
										@if ($errors->has('password'))
										<div class="invalid-feedback d-block">{{ $errors->first('password') }}</div>
										@endif
									</div>
									<div class="d-flex flex-wrap justify-content-between mt-4 mb-3 align-items-center">
										<div class="form-group me-3 py-1">
											<div class="form-check custom-checkbox mb-0">
												<input type="checkbox" name="remember" class="form-check-input" id="customCheckBox1" >
												<label class="form-check-label" for="customCheckBox1">Remember my preference</label>
											</div>
										</div>
										<div class="form-group  py-1">
											<a class="" href="{{route('forgotPassword')}}">Forgot Password?</a>
										</div>
									</div>
									<div class="text-center">
										<button type="submit" class="btn btn-primary btn-block">Sign In</button>
									</div>
								</form>
								<div class="new-account mt-3">
									<p class="">Don't have an account? <a class="" href="{{route('register')}}">Sign up</a></p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection @push('js') @endpush