@extends('layouts.app')

@section('link')
<link rel="stylesheet" href="{{asset('css/sell.css')}}">
@endsection

@section('content')
<div class="sell__content">
    <!-- ページタイトル -->
    <div class="sell__ttl">
        <h2 class="sell__ttl--lbl">商品の出品</h2>
    </div>
    <form action="/sell" class="sell__form" method="post" enctype="multipart/form-data">
        @csrf
        <!-- 商品画像添付 -->
        <div class="sell__img">
            <strong>商品画像</strong>
            <div class="pic__area">
                <img src="" class="pic__area--img" id="preview">
                <script src="{{asset("js/preview.js")}}"></script>
                <input type="file" class="pic__area--input" name="item_image" id="item_img" accept="image/png,image/jpeg" onchange="previewImage(this)">
                <label for="item_img" class="pic__area--lbl">画像を選択してください</label>
            </div>
        </div>
        <div class="form__group--error">
            @error('item_image')
                {{$message}}
            @enderror
        </div>
        <div class="sell__detail">
            <!-- 小タイトル -->
            <div class="detail__ttl">
                <strong class="detail__ttl--lbl">商品の詳細</strong>
            </div>
            <!-- カテゴリー -->
            <div class="category__group">
                <div class="category__ttl">
                    <strong class="category__ttl--lbl">カテゴリー</strong>
                </div>
                <div class="category__items">
                    @foreach ($categories as $category)
                        <input type="checkbox" class="category__item" id="{{$category->id}}" name="categories[]" value="{{$category->id}}">
                        <label for="{{$category->id}}" class="category__item">{{$category->content}}</label>
                    @endforeach
                </div>
            </div>
            <div class="form__group--error">
                @error('categories')
                    {{$message}}
                @enderror
            </div>
            <!-- 商品状態 -->
            <div class="condition__group">
                <div class="condition__ttl">
                    <strong class="condition__ttl--lbl">商品の状態</strong>
                </div>
                <div class="input__group select__group">
                    <select name="condition" class="select__group--item">
                        <option value="" hidden>選択してください</option>
                        @foreach ($conditions as $condition)
                            <option value="{{$condition->id}}">{{$condition->condition}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form__group--error">
                @error('condition')
                    {{$message}}
                @enderror
            </div>
            <!-- 商品名と説明 -->
            <div class="explanation__group">
                <div class="explanation__ttl">
                    <strong class="explanation__ttl--lbl">商品名と説明</strong>
                </div>
                <div class="input__group">
                    <p class="input__group--lbl">商品名</p>
                    <input type="text" class="input__group--item" id="item_name" name="item_name" value="{{old('item_name')}}">
                </div>
                <div class="form__group--error">
                    @error('item_name')
                        {{$message}}
                    @enderror
                </div>
                <div class="input__group">
                    <p class="input__group--lbl">商品の説明</p>
                    <textarea name="item_detail" id="item_detail" class="input__group--text">{{old('item_detail')}}</textarea>
                </div>
                <div class="form__group--error">
                    @error('item_detail')
                        {{$message}}
                    @enderror
                </div>
                <div class="input__group price">
                    <p class="input__group--lbl">販売価格</p>
                    <input type="int" class="input__group--item" id="item_price" name="item_price" value="{{old('item_price')}}">
                </div>
                <div class="form__group--error">
                    @error('item_price')
                        {{$message}}
                    @enderror
                </div>
            </div>
        </div>
        <!-- 出品ボタン -->
        <div class="button__group">
            <button class="button__group--submit" type="submit">出品</button>
        </div>
    </form>
</div>
@endsection