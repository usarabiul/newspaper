@extends('auth.app') 
@section('title')
<title>{{websiteTitle('Register')}}</title>
@endsection 
@section('SEO')
<meta name="description" content="{!!general()->meta_description!!}" />
<meta name="keywords" content="{{general()->meta_keyword}}" />
<meta property="og:title" content="{{websiteTitle('Register')}}" />
<meta property="og:description" content="{!!general()->meta_description!!}" />
<meta property="og:image" content="{!!general()->meta_description!!}" />
<meta property="og:url" content="{{route('register')}}" />
<link rel="canonical" href="{{route('register')}}">
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
									<a href="{{route('index')}}"><img src="{{asset(general()->logo())}}" alt="{{general()->title}}"></a>
								</div>
								@include(adminTheme().'alerts')
								<h4 class="text-center mb-4">Sign up your account</h4>
								<form action="{{route('register')}}" method="post">
									@csrf
									<div class="form-group mb-3">
										<label class="form-label">Name</label>
										<input type="text" class="form-control {{$errors->has('name')?'is-invalid':''}}" value="{{old('name')}}" name="name" placeholder="Enter name">
										@if ($errors->has('name'))
										<div class="invalid-feedback">{{ $errors->first('name') }}</div>
										@endif
									</div>
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
									<div class="mt-4 mb-3 align-items-center">
										<p>
											
										Your personal data will be used to support your experience throughout this website, to manage access to your account, and for other purposes described in our <a href="#">Privacy Policy</a>
										</p>
									</div>
									<div class="text-center">
										<button type="submit" class="btn btn-primary btn-block">Sign Up</button>
									</div>
								</form>
								<div class="new-account mt-3">
									<p class="">Already Have An Account? <a class="" href="{{route('login')}}">Sign in</a></p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection 
@push('js') 
@endpush
