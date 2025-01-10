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
    <form action="/mypage/profile" class="profile__form"  method="post" enctype="multipart/form-data">
        @csrf
        <!-- プロフィール画像 -->
        <div class="input__group image">
            <div class="input__img">
                <img src="" id="preview" class="input__img--pic">
                <script src="{{asset('js/preview.js')}}"></script>
            </div>
            <div class="input__file">
                <label for="user_image" class="input__file--lbl">
                    <input type="file" class="input__file--dir" name="profile_image" id="user_image" accept="image/png, image/jpeg" onchange="previewImage(this)">
                    画像を選択する
                </label>
            </div>
        </div>
        <!-- ユーザー名 -->
        <div class="input__group">
            <label for="name" class="input__group--lbl">ユーザー名</label>
            <input type="text" class="input__group--txt" name="profile_user_name" value="{{old('profile_user_name')}}">
            <div class="form__group--error">
                @error('profile_user_name')
                    {{$message}}
                @enderror
            </div>
        </div>
        <!-- 郵便番号 -->
        <div class="input__group">
            <label for="post_code" class="input__group--lbl">郵便番号</label>
            <input type="text" class="input__group--txt" name="profile_post_code" value="{{old('profile_post_code')}}">
            <div class="form__group--error">
                @error('profile_address')
                    {{$message}}
                @enderror
            </div>
        </div>
        <!-- 住所 -->
        <div class="input__group">
            <label for="address" class="input__group--lbl">住所</label>
            <input type="text" class="input__group--txt" name="profile_address" value="{{old('profile_address')}}">
            <div class="form__group--error">
                @error('profile_post_card')
                    {{$message}}
                @enderror
            </div>
        </div>
        <!-- 建物名 -->
        <div class="input__group">
            <label for="building" class="input__group--lbl">建物名</label>
            <input type="text" class="input__group--txt" name="profile_building" value="{{old('profile_building')}}">
            <div class="form__group--error">
                @error('profile_building')
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

@else
@section('content')
<div class="profile__content">
    <div class="profile__ttl">
        <h2 class="profile__ttl--txt">プロフィール設定</h2>
    </div>
    <form action="/mypage/profile" class="profile__form" method="post" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <!-- プロフィール画像 -->
        <div class="input__group image">
            <div class="input__img">
                <img src="{{asset($profile->profile_image)}}" id="preview" class="input__img--pic">
                <script src="{{asset('js/preview.js')}}"></script>
            </div>
            <div class="input__file">
                <label for="user_image" class="input__file--lbl">
                    <input type="file" class="input__file--dir" name="profile_image" id="user_image" accept="image/png, image/jpeg" onchange="previewImage(this)">
                    画像を選択する
                </label>
            </div>
        </div>
        <!-- ユーザー名 -->
        <div class="input__group">
            <label for="name" class="input__group--lbl">ユーザー名</label>
            <input type="text" class="input__group--txt" name="profile_user_name" value="{{$profile->profile_user_name}}">
            <div class="form__group--error">
                @error('profile_user_name')
                    {{$message}}
                @enderror
            </div>
        </div>
        <!-- 郵便番号 -->
        <div class="input__group">
            <label for="post_code" class="input__group--lbl">郵便番号</label>
            <input type="text" class="input__group--txt" name="profile_post_code" value="{{$profile->profile_post_code}}">
            <div class="form__group--error">
                @error('profile_post_code')
                    {{$message}}
                @enderror
            </div>
        </div>
        <!-- 住所 -->
        <div class="input__group">
            <label for="address" class="input__group--lbl">住所</label>
            <input type="text" class="input__group--txt" name="profile_address" value="{{$profile->profile_address}}">
            <div class="form__group--error">
                @error('profile_address')
                    {{$message}}
                @enderror
            </div>
        </div>
        <!-- 建物名 -->
        <div class="input__group">
            <label for="building" class="input__group--lbl">建物名</label>
            <input type="text" class="input__group--txt" name="profile_building" value="{{$profile->profile_building}}">
            <div class="form__group--error">
                @error('profile_building')
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
@endif