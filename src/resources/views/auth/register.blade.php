@extends('layouts.app')

@section('link')
<link rel="stylesheet" href="{{asset('css/register.css')}}">
@endsection

@section('content')
<div class="register__content">
    <div class="register__ttl">
        <h2 class="register__ttl--txt">会員登録</h2>
    </div>
    <form action="/register" class="register__form" method="post">
        @csrf
        <div class="input__group">
            <label for="name" class="input__group--lbl">ユーザー名</label>
            <input type="text" class="input__group--txt" name="name" value="{{old('name')}}">
            <div class="form__group--error">
                @error('name')
                    {{$message}}
                @enderror
            </div>
        </div>
        <div class="input__group">
            <label for="email" class="input__group--lbl">メールアドレス</label>
            <input type="email" class="input__group--txt" name="email" value="{{old('email')}}">
            <div class="form__group--error">
                @error('email')
                    {{$message}}
                @enderror
            </div>
        </div>
        <div class="input__group">
            <lable for="password" class="input__group--lbl">パスワード</lable>
            <input type="password" class="input__group--txt" name="password" value="{{old('password')}}">
            <div class="form__group--error">
                @error('password')
                    {{$message}}
                @enderror
            </div>
        </div>
        <div class="input__group">
            <label for="password_confirmation" class="input__group--lbl">確認用パスワード</label>
            <input type="password" class="input__group--txt" name="password_confirmation">
        </div>
        <div class="button__group">
            <button type="submit" class="button__group--submit">登録する</button>
        </div>
    </form>
    <div class="login__link">
        <a href="/login" class="login__link--txt">ログインはこちら</a>
    </div>
</div>
@endsection