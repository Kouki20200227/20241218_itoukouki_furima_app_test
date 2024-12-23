@extends('layouts.app')

@section('link')
<link rel="stylesheet" href="{{asset('css/item.css')}}">
@endsection

@section('content')
<div class="item__content">
    <!-- 商品画像 -->
    <div class="img__group">
        <img src="" alt="商品画像" class="img__group--item">
    </div>
    <!-- 商品詳細一覧 -->
    <div class="detail__group">
        <!-- 購入手続きフォーム -->
        <form action="#" class="buy__form" method="get">
            @csrf
            <h2 class="buy__form--ttl">商品名がここに入る</h2>
            <small class="buy__form--subttl">ブランド名</small>
            <p class="buy__form--price"><span class="mini">¥</span>99,999<span class="mini">(税込)</span></p>
            <div class="buy__group">
                <!-- お気に入り数 -->
                <div class="buy__items">
                    <p class="buy__items--txt">☆</p>
                    <small class="buy__items--count">3</small>
                </div>
                <!-- コメント数 -->
                <div class="buy__items">
                    <p class="buy__items--txt">⚪︎</p>
                    <small class="buy__items--count">1</small>
                </div>
            </div>
            <div class="buy__button">
                <button class="buy__button--submit" type="submit">購入手続きへ</button>
            </div>
        </form>
        <!-- 商品説明コンテンツ -->
        <div class="explanation__content">
            <!-- 商品説明グループ -->
            <p class="explanation__content--ttl">商品説明</p>
            <div class="explanation__group">
                <p class="explanation__group--txt">ここに商品説明が入る</p>
            </div>
            <!-- 商品の情報グループ -->
            <p class="explanation__content--ttl">商品の情報</p>
            <div class="explanation__group">
                <div class="explanation__tag">
                    <p class="explanation__tag--ttl">カテゴリー</p>
                    <div class="explanation__item">
                        <p class="explanation__item--category">洋服</p>
                        <p class="explanation__item--category">メンズ</p>
                    </div>
                </div>
                <div class="explanation__tag">
                    <p class="explanation__tag--ttl">商品の状態</p>
                    <div class="explanation__item">
                        <p class="explanation__item--condition">良好</p>
                    </div>
                </div>
            </div>
        </div>
            <!-- コメントグループ -->
            <div class="comment__group">
                <p class="comment__group--ttl">コメント(1)</p>
                <div class="comment-user__tag">
                    <img src="#" alt="?" class="comment-user__tag--img">
                    <p class="comment-user__tag--name">admin</p>
                </div>
                <div class="user-comment--tag">
                    <label class="user-comment--tag">こちらにコメントが入ります。</label>
                </div>
                <div class="comment__area">
                    <p class="comment__area--ttl">商品へのコメント</p>
                    <form action="#" class="comment__form" method="post">
                        @csrf
                        <div class="input__group">
                            <textarea name="comment" class="input__group--txt"></textarea>
                        </div>
                        <div class="button__group">
                            <button class="button__group--submit" type="submit">コメントを送信する</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection