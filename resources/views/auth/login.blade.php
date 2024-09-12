@extends('layouts.auth')
@section('content')
<div class="auth-main">
    <div class="auth-card">
        <div class="user-circle">
            <img src="{{asset('images/user-icon-white.svg')}}" alt="User Login"/>
        </div>
            @if(count($errors) > 0)
                @foreach( $errors->all() as $message )
                <div class="alert alert-danger display-hide">
                    <button class="close" data-close="alert"></button>
                    <span>{{ $message }}</span>
                </div>
                @endforeach
            @endif
            @if(session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif
        <h3 class="heading">{{ __('Login') }}</h3>
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="custom-form-group">
                <div class="custom-input-group">
                    <img class="input-icon" src="{{asset('images/email-icon.svg')}}"/>
                    <input id="email" type="email" class="custom-form-control icon-left icon-email @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Enter your Email ID" required autocomplete="email" autofocus>
                </div>
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="custom-form-group">
                <div class="custom-input-group">
                    <img class="input-icon" src="{{asset('images/password-icon.svg')}}"/>
                    <input id="password" type="password" class="custom-form-control icon-left icon-password @error('password') is-invalid @enderror" name="password" placeholder="Enter Password" required autocomplete="current-password">
                </div>
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="custom-form-group-checkbox d-flex justify-content-between">                            
                <label class="form-check-label" for="remember">{{ __('Remember Me') }}
                <input class="custom-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                    <span class="checkmark"></span>
                </label>
                @if (Route::has('password.request'))
                    <a class="link-button-text" href="{{ route('password.request') }}">
                        {{ __('Forgot Your Password?') }}
                    </a>
                @endif
            </div>
            <button type="submit" class="primary-btn">{{ __('Login') }}</button>
        </form>
    </div>
</div>  
@endsection

@section('script')

@endsection