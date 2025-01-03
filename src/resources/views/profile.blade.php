@extends('layouts.app')

@section('link')
<link rel="stylesheet" href="{{asset('css/profile.css')}}">
@endsection

@if ($profile === null)
@section('content')
<div class="profile__content">
    <div class="profile__ttl">
        <h2 class="profile__ttl--txt">プロフィール設定</h2>
    </div>
    <form action="/mypage/profile" class="profile__form" method="post">
        @csrf
        <!-- プロフィール画像 -->
        <div class="input__group image">
            <div class="input__img">
                <img src="" class="input__img--pic">
            </div>
            <div class="input__file">
                <label for="user_image" class="input__file--lbl">
                    <input type="file" class="input__file--dir" name="profile_image" id="user_image" value="{{old('profile_image')}}">
                    画像を選択する
                </label>
            </div>
        </div>
        <!-- ユーザー名 -->
        <div class="input__group">
            <label for="name" class="input__group--lbl">ユーザー名</label>
            <input type="text" class="input__group--txt" name="profile_user_name" value="{{old('profile_user_name')}}">
        </div>
        <!-- 郵便番号 -->
        <div class="input__group">
            <label for="post_code" class="input__group--lbl">郵便番号</label>
            <input type="text" class="input__group--txt" name="profile_post_code" value="{{old('profile_post_code')}}">
        </div>
        <!-- 住所 -->
        <div class="input__group">
            <label for="address" class="input__group--lbl">住所</label>
            <input type="text" class="input__group--txt" name="profile_address" value="{{old('profile_address')}}">
        </div>
        <!-- 建物名 -->
        <div class="input__group">
            <label for="building" class="input__group--lbl">建物名</label>
            <input type="text" class="input__group--txt" name="profile_building" value="{{old('profile_building')}}">
        </div>
        <!-- 更新ボタン -->
        <div class="button__group">
            <button class="button__group--submit" type="submit">更新する</button>
        </div>
    </form>
</div>
@endsection

@else
@section('content')
<div class="profile__content">
    <div class="profile__ttl">
        <h2 class="profile__ttl--txt">プロフィール設定</h2>
    </div>
    <form action="/mypage/profile" class="profile__form" method="post">
        @csrf
        <!-- プロフィール画像 -->
        <div class="input__group image">
            <div class="input__img">
                <img src="" class="input__img--pic">
            </div>
            <div class="input__file">
                <label for="user_image" class="input__file--lbl">
                    <input type="file" class="input__file--dir" name="profile_image" id="user_image" value="{{$profile->profile_image}}">
                    画像を選択する
                </label>
            </div>
        </div>
        <!-- ユーザー名 -->
        <div class="input__group">
            <label for="name" class="input__group--lbl">ユーザー名</label>
            <input type="text" class="input__group--txt" name="profile_user_name" value="{{$profile->profile_user_name}}">
        </div>
        <!-- 郵便番号 -->
        <div class="input__group">
            <label for="post_code" class="input__group--lbl">郵便番号</label>
            <input type="text" class="input__group--txt" name="profile_post_code" value="{{$profile->profile_code_name}}">
        </div>
        <!-- 住所 -->
        <div class="input__group">
            <label for="address" class="input__group--lbl">住所</label>
            <input type="text" class="input__group--txt" name="profile_address" value="{{$profile->profile_address}}">
        </div>
        <!-- 建物名 -->
        <div class="input__group">
            <label for="building" class="input__group--lbl">建物名</label>
            <input type="text" class="input__group--txt" name="profile_building" value="{{$profile->profile_building}}">
        </div>
        <!-- 更新ボタン -->
        <div class="button__group">
            <button class="button__group--submit" type="submit">更新する</button>
        </div>
    </form>
</div>
@endsection
@endif