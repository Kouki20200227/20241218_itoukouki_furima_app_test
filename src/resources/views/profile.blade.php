@extends('layouts.app')

@section('link')
<link rel="stylesheet" href="{{asset('css/profile.css')}}">
@endsection

@section('content')
<div class="profile__content">
    <div class="profile__ttl">
        <h2 class="profile__ttl--txt">プロフィール設定</h2>
    </div>
    <form action="/profile" class="profile__form" method="post">
        @csrf
        <!-- プロフィール画像 -->
        <div class="input__group image">
            <div class="input__img">
                <img src="{{$profile->img}}" alt="" class="input__img--pic">
            </div>
            <div class="input__file">
                <input type="file" class="input__file--dir" name="image_dir">
            </div>
        </div>
        <!-- ユーザー名 -->
        <div class="input__group">
            <label for="name" class="input__group--lbl">ユーザー名</label>
            <input type="text" class="input__group--txt" name="name" value="{{old('name')}}">
            <div class="form__group--error">
                @error('name')
                    {{$message}}
                @enderror
            </div>
        </div>
        <!-- 郵便番号 -->
        <div class="input__group">
            <label for="post_code" class="input__group--lbl">郵便番号</label>
            <input type="text" class="input__group--txt" name="post_code" value="{{old('post_code')}}">
            <div class="form__group--error">
                @error('post_code')
                    {{$message}}
                @enderror
            </div>
        </div>
        <!-- 住所 -->
        <div class="input__group">
            <label for="address" class="input__group--lbl">住所</label>
            <input type="text" class="input__group--txt" name="address" value="{{old('address')}}">
            <div class="form__group--error">
                @error('address')
                    {{$message}}
                @enderror
            </div>
        </div>
        <!-- 建物名 -->
        <div class="input__group">
            <label for="building" class="input__group--lbl">建物名</label>
            <input type="text" class="input__group--txt" name="building" value="{{old('building')}}">
            <div class="form__group--error">
                @error('building')
                    {{$message}}
                @enderror
            </div>
        </div>
        <!-- 更新ボタン -->
        <div class="button__group">
            <button class="button__group--submit" type="submit">更新する</button>
        </div>
    </form>
</div>
@endsection