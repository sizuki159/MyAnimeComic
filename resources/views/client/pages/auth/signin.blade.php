@extends('client.main')

@section('content')
    <!-- Normal Breadcrumb Begin -->
    @include('client.pages.auth.breadcrumb')
    <!-- Normal Breadcrumb End -->

    <section class="login spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="login__form">
                        <h3>Login</h3>
                        <form method="POST" action="{{ route('client.auth.login') }}">
                            @csrf
                            <div class="input__item">
                                <input value="{{old('email')}}" name="email" type="text" placeholder="Email address">
                                <span class="icon_mail"></span>
                                <p class="text-danger">{{ $errors->first('email') }}</p>
                            </div>
                            <div class="input__item">
                                <input name="password" type="password" placeholder="Password">
                                <span class="icon_lock"></span>
                                <p class="text-danger">{{ $errors->first('password') }}</p>
                            </div>
                            <button type="submit" class="site-btn">Login Now</button>
                        </form>
                        <a href="#" class="forget_pass">Forgot Your Password?</a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="login__register">
                        <h3>Dont’t Have An Account?</h3>
                        <a href="{{ route('client.auth.signup') }}" class="primary-btn">Register Now</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
