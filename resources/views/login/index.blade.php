@extends('template.main')

@section('title', 'Login')

@section('otherScript')

@endsection

@section('content')

<div class="" style="height: 80px; position: fixed; float: left; top: 15px;left: 20px;">
    <div class="material-design-btn">
        <a href="{{url('')}}">
            <button class="btn btn-danger waves-effect"><i class="notika-icon notika-left-arrow"></i> Back</button>
        </a>
    </div>
</div>

<div class="login-content">
    <!-- Login -->
    <div class="nk-block toggled" id="l-login">
        <form action="{{ route('login') }}" method="POST">
            @if(session('errors'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                Something it's wrong:
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            @if (Session::has('success'))
            <div class="alert alert-success">
                {{ Session::get('success') }}
            </div>
            @endif
            @if (Session::has('error'))
            <div class="alert alert-danger">
                {{ Session::get('error') }}
            </div>
            @endif
            <div class="nk-form">
                <div class="input-group">
                    <span class="input-group-addon nk-ic-st-pro"><i class="notika-icon notika-support"></i></span>
                    <div class="nk-int-st">
                        @csrf
                        <input type="text" class="form-control" placeholder="Email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="input-group mg-t-15">
                    <span class="input-group-addon nk-ic-st-pro"><i class="notika-icon notika-edit"></i></span>
                    <div class="nk-int-st">
                        <input type="password" class="form-control" placeholder="Password" name="password" required autocomplete="current-password">
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="btn-group ib-btn-gp active-hook nk-email-inbox" style="margin-top: 20px; margin-bottom: -15px;">
                    <button type="submit" class="btn btn-success btn-sm waves-effect">Masuk</button>
                </div>
            </div>
        </form>
    </div>
</div>

<img src="{{asset('asset/footer2.png')}}" alt="" style="height: 80px; position: fixed; float: right; margin-right: 10px; bottom: 10px;right: 0;">

@endsection

@section('otherScript2')

@endsection