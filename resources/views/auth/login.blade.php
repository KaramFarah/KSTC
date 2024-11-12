@extends('layouts.app')

@section('content')
{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> --}}


  {{-- {{dd($oldEmail)}} --}}

    <div class="container">
  
      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">
  
              <div class="d-flex justify-content-center py-4">
                <a href="#"  class="logo d-flex align-items-center w-auto">
                  <img class="mx-2" style="max-height: 90px" src="{{config('panel.project_logo')}}" alt="">
                  {{-- <span class="d-none d-lg-block">{{config('panel.project_name')}}</span> --}}
                </a>
              </div><!-- End Logo -->
  
              <div class="card mb-3">
  
                <div class="card-body">
  
                  <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4">تسجيل الدخول</h5>
                    <p class="text-center small">قم بادخال البريد الإلكتروني وكلمة المرور</p>
                  </div>
  
                  <form method="POST" action="{{route('login')}}" class="row g-3 needs-validation" novalidate>
                    @csrf
                    <div class="col-12">
                      <label for="yourUsername" class="form-label">البريد الإلكتروني</label>
                      <div class="input-group has-validation">
                        <span class="input-group-text" id="inputGroupPrepend">@</span>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email' , $oldEmail ?? '') }}" required autocomplete="email" >

                        @error('email')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                      </div>
                    </div>
                    <div class="col-12">
                        <label for="yourPassword" class="form-label">كلمة المرور</label>
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">                        
                        @error('password')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>
                    <div class="col-12">
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                        <label class="form-check-label" for="remember">تذكرني</label>
                      </div>
                    </div>


                    <div class="col-12">
                      <button class="btn btn-primary w-100" type="submit">دخول</button>
                    </div>
                    <div style="display: flex; justify-content: space-between; align-items: center" class="col-12">
                      <span class="small mb-0"> ليس لديك حساب؟ <a href="{{route('register')}}">إنشاء حساب</a></span>
                      @if (Route::has('password.request'))
                          <a class="btn btn-link" href="{{ route('password.request') }}">{{ __('نسيت كلمة المرور') }}</a>
                      @endif
                    </div>
                  </form>
  
                </div>
              </div>
  
              <div class="credits">
                Designed by <a href="#">Al-zeer group</a>
              </div>
  
            </div>
          </div>
        </div>
  
      </section>
  
    </div>
@endsection
