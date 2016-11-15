@extends('layouts.app')

@section('content')
<div class="login-box">
  <div class="login-logo">
    <a href="/"><b>Çözüm Lazım</b></a>
  </div><!-- /.login-logo -->
  <div class="login-box-body">
    <form role="form" method="POST" action="{{ url('/login') }}">
    {!! csrf_field() !!}
      <div class="form-group has-feedback {{ $errors->has('email') ? ' has-error' : '' }}">
        <input type="email" class="form-control" placeholder="Email" name="email" value="{{ old('email') }}">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
        @if ($errors->has('email'))
            <span class="help-block">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
        @endif
      </div>
      <div class="form-group has-feedback {{ $errors->has('password') ? ' has-error' : '' }}">
        <input type="password" class="form-control" placeholder="Şifre" name="password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        @if ($errors->has('password'))
            <span class="help-block">
                <strong>{{ $errors->first('password') }}</strong>
            </span>
        @endif
      </div>
      <div class="row">
        <div class="col-xs-8">
          <div class="checkbox icheck">
            <label>
              <input type="checkbox" name="remember"> Beni Hatırla
            </label>
          </div>
        </div><!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Giriş Yap</button>
        </div><!-- /.col -->
      </div>
    </form>

    <a href="{{ url('/password/reset') }}">Şifremi Unuttum.</a><br>
    <a href="/register" class="text-center">Kayıt Ol</a>

  </div><!-- /.login-box-body -->
</div><!-- /.login-box -->
@endsection
