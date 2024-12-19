@extends('layouts.app')

@section('link')
<link rel="stylesheet" href="{{asset('css/index.css')}}">
@endsection

@section('content')
<div class="index__content">
    <!-- おすすめ・マイリスト選択ボタン -->
    <div class="list__bar">
        <form action="/" class="index__form" method="get">
            @csrf
            <div class="button__group">
                <button class="button__group--submit" type="submit" name="all">おすすめ</button>
            </div>
            <div class="button__group">
                <button class="button__group--submit" type="submit" name="mylist">マイリスト</button>
            </div>
        </form>
    </div>
    <!-- 出品リスト表示 -->
    <div class="exhibit__list">
        <div class="exhibit__group">
            <div class="exhibit__pic">
                <img src="#" alt="商品画像" class="exhibit__group--img">
            </div>
            <p class="exhibit__group--name">商品名（仮）</p>
        </div>
        <div class="exhibit__group">
            <div class="exhibit__pic">
                <img src="#" alt="商品画像" class="exhibit__group--img">
            </div>
            <p class="exhibit__group--name">商品名（仮）</p>
        </div>
        <div class="exhibit__group">
            <div class="exhibit__pic">
                <img src="#" alt="商品画像" class="exhibit__group--img">
            </div>
            <p class="exhibit__group--name">商品名（仮）</p>
        </div>
        <div class="exhibit__group">
            <div class="exhibit__pic">
                <img src="#" alt="商品画像" class="exhibit__group--img">
            </div>
            <p class="exhibit__group--name">商品名（仮）</p>
        </div>
        <div class="exhibit__group">
            <div class="exhibit__pic">
                <img src="#" alt="商品画像" class="exhibit__group--img">
            </div>
            <p class="exhibit__group--name">商品名（仮）</p>
        </div>
        <div class="exhibit__group">
            <div class="exhibit__pic">
                <img src="#" alt="商品画像" class="exhibit__group--img">
            </div>
            <p class="exhibit__group--name">商品名（仮）</p>
        </div>
        <div class="exhibit__group">
            <div class="exhibit__pic">
                <img src="#" alt="商品画像" class="exhibit__group--img">
            </div>
            <p class="exhibit__group--name">商品名（仮）</p>
        </div>
    </div>
</div>
@endsection