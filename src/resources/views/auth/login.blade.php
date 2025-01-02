@extends('layouts.app')

@section('link')
<link rel="stylesheet" href="{{asset('css/login.css')}}">
@endsection

@section('content')
<div class="login__content">
    <div class="login__ttl">
        <h2 class="login__ttl--txt">ログイン</h2>
    </div>
    <form action="/login" class="login__form" method="post">
        @csrf
        <div class="input__group">
            <label for="email" class="input__group--lbl">ユーザー名/メールアドレス</label>
            <input type="text" class="input__group--txt" name="email" value="{{old('email')}}">
            <div class="form__group--error">
                @error('email')
                    {{$message}}
                @enderror
            </div>
        </div>
        <div class="input__group">
            <label for="password" class="input__group--lbl">パスワード</label>
            <input type="password" class="input__group--txt" name="password" value="{{old('password')}}">
            <div class="form__group--error">
                @error('password')
                    {{$message}}
                @enderror
            </div>
        </div>
        <div class="button__group">
            <button type="submit" class="button__group--submit">ログインする</button>
        </div>
        <div class="register__link">
            <a href="/register" class="register__link--txt">会員登録はこちら</a>
        </div>
    </form>
</div>
@endsection