@extends('layouts.auth.default')
@section('content')
    <div class="card-body login-card-body">
        <p class="login-box-msg">{{__('auth.register_new_member')}}</p>

        <form action="{{ url('/register') }}" method="post">
            {!! csrf_field() !!}

            <div class="input-group mb-3">
                <input value="{{ old('name') }}" type="name" class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" placeholder="{{__('auth.name')}}" aria-label="{{__('auth.name')}}">
                <div class="input-group-append">
                    <span class="input-group-text"><i class="fa fa-user"></i></span>
                </div>
                @if ($errors->has('name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </div>
                @endif
            </div>

            <div class="input-group mb-3">
                <input value="{{ old('email') }}" type="email" class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" placeholder="{{__('auth.email')}}" aria-label="{{__('auth.email')}}">
                <div class="input-group-append">
                    <span class="input-group-text"><i class="fa fa-envelope"></i></span>
                </div>
                @if ($errors->has('email'))
                    <div class="invalid-feedback">
                        {{ $errors->first('email') }}
                    </div>
                @endif
            </div>

            <div class="input-group mb-3">
                <input value="{{ old('password') }}" type="password" class="form-control  {{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="{{__('auth.password')}}" aria-label="{{__('auth.password')}}">
                <div class="input-group-append">
                    <span class="input-group-text"><i class="fa fa-lock"></i></span>
                </div>
                @if ($errors->has('password'))
                    <div class="invalid-feedback">
                        {{ $errors->first('password') }}
                    </div>
                @endif
            </div>

            <div class="input-group mb-3">
                <input value="{{ old('password_confirmation') }}" type="password" class="form-control  {{ $errors->has('password_confirmation') ? ' is-invalid' : '' }}" name="password_confirmation" placeholder="{{__('auth.password_confirmation')}}" aria-label="{{__('auth.password_confirmation')}}">
                <div class="input-group-append">
                    <span class="input-group-text"><i class="fa fa-lock"></i></span>
                </div>
                @if ($errors->has('password_confirmation'))
                    <div class="invalid-feedback">
                        {{ $errors->first('password_confirmation') }}
                    </div>
                @endif
            </div>
		<!--	<div class="input-group mb-3">
                <select id="inputRole" class="form-control">
				<option selected>Select role type</option>
				<option >Restaurant Manager</option>
				</select>
                <div class="input-group-append">
                    <span class="input-group-text"><i class="fa fa-user"></i></span>
                </div>
          
            </div> -->

            <div class="row mb-2">
                <div class="col-8">
                    <div class="checkbox icheck">
                        <label> <input type="checkbox" name="remember"> {{__('auth.agree')}}</label>
                    </div>
                </div>
                <!-- /.col -->
                <div class="col-4">
                    <button type="submit" class="btn btn-primary btn-block">{{__('auth.register')}}</button>
                </div>
                <!-- /.col -->
            </div>
        </form>

        <p class="mb-1 text-center">
            <a href="{{ url('/login') }}">{{__('auth.already_member')}}</a>
        </p>
    </div>
    <!-- /.login-card-body -->
@endsection