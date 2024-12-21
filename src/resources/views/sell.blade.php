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
    <form action="/sell" class="sell__form" method="post">
        @csrf
        <!-- 商品画像添付 -->
        <div class="sell__img">
            <strong>商品画像</strong>
            <div class="pic__area">
                <img src="" class="pic__area--img">
                <input type="file" class="pic__area--input" name="exhibit_img" id="exhibit_img">
                <label for="exhibit_img" class="pic__area--lbl">画像を選択してください</label>
            </div>
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
                    <input type="checkbox" class="category__item" id="1">
                    <label for="1" class="category__item">ファッション</label>
                    <input type="checkbox" class="category__item" id="2">
                    <label for="2" class="category__item">家電</label>
                    <input type="checkbox" class="category__item" id="3">
                    <label for="3" class="category__item">インテリア</label>
                    <input type="checkbox" class="category__item" id="4">
                    <label for="4" class="category__item">レディース</label>
                    <input type="checkbox" class="category__item" id="5">
                    <label for="5" class="category__item">メンズ</label>
                    <input type="checkbox" class="category__item" id="6">
                    <label for="6" class="category__item">コスメ</label>
                    <input type="checkbox" class="category__item" id="7">
                    <label for="7" class="category__item">本</label>
                    <input type="checkbox" class="category__item" id="8">
                    <label for="8" class="category__item">ゲーム</label>
                    <input type="checkbox" class="category__item" id="9">
                    <label for="9" class="category__item">スポーツ</label>
                    <input type="checkbox" class="category__item" id="10">
                    <label for="10" class="category__item">キッチン</label>
                    <input type="checkbox" class="category__item" id="11">
                    <label for="11" class="category__item">ハンドメイド</label>
                    <input type="checkbox" class="category__item" id="12">
                    <label for="12" class="category__item">アクセサリー</label>
                </div>
            </div>
            <!-- 商品状態 -->
            <div class="condition__group">
                <div class="condition__ttl">
                    <strong class="condition__ttl--lbl">商品の状態</strong>
                </div>
                <div class="input__group select__group">
                    <select name="condition" class="select__group--item">
                        <option value="" hidden>選択してください</option>
                        <option value="1">良好</option>
                        <option value="2">目立った傷や汚れなし</option>
                        <option value="3">やや傷や汚れあり</option>
                        <option value="4">状態が悪い</option>
                    </select>
                </div>
            </div>
            <!-- 商品名と説明 -->
            <div class="explanation__group">
                <div class="explanation__ttl">
                    <strong class="explanation__ttl--lbl">商品名と説明</strong>
                </div>
                <div class="input__group">
                    <p class="input__group--lbl">商品名</p>
                    <input type="text" class="input__group--item" id="exhibit_name" name="exhibit_name" value="">
                </div>
                <div class="input__group">
                    <p class="input__group--lbl">商品の説明</p>
                    <textarea name="exhibit_detail" id="exhibit_detail" class="input__group--text"></textarea>
                </div>
                <div class="input__group">
                    <p class="input__group--lbl">販売価格</p>
                    <input type="int" class="input__group--item" id="exhibit_price" name="exhibit_price" value="¥">
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