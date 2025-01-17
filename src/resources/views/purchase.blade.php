@extends('layouts.app')

@section('link')
<link rel="stylesheet" href="{{asset('css/purchase.css')}}">
@endsection

@section('content')
<div class="purchase__content">
    <!-- 購入情報フォーム -->
    <form action="/purchase/address/{{$item->id}}" class="detail__form" method="get">
        @csrf
        <!-- 商品名・画像 -->
        <div class="detail__group">
            <div class="item__group">
                <img src="{{asset($item->item_image)}}" class="detail__group--img">
                <div class="item__tag">
                    <p class="detail__tag--ttl">{{$item->item_name}}</p>
                    <p class="detail__tag--price">¥ {{$item->item_price}}</p>
                </div>
            </div>
        </div>
        <!-- 支払い方法選択 -->
        <div class="detail__group">
            <p class="detail__group--ttl">支払い方法</p>
            <div class="select__group">
                <select name="payment_method" class="select__group--item">
                    <option hidden>選択してください</option>
                    <option value="1">コンビニ払い</option>
                    <option value="2">カード支払い</option>
                </select>
            </div>
        </div>
        <!-- 配送先確認・変更 -->
        <div class="detail__group">
            <div class="address__group">
                <p class="detail__group--ttl">配送先</p>
                <div class="address__button">
                    <button class="address__button--submit" type="submit">変更する</button>
                </div>
            </div>
            <div class="address__tag">
                @if (session('post_code'))
                    <p class="address__tag--txt">〒 {{session('post_code')}}</p>
                    <p class="address__tag--txt">{{session('address') . session('building')}}</p>
                @else
                    <p class="address__tag--txt">〒 {{$profile->profile_post_code}}</p>
                    <p class="address__tag--txt">{{$profile->profile_address . $profile->profile_building}}</p>
                @endif
            </div>
        </div>
    </form>
    <!-- 購入フォーム -->
    <form action="/purchase" class="purchase__form" method="post">
        @csrf
        <table class="purchase__table">
            <tr>
                <th><p class="table__header">商品代金</p></th>
                <td><p class="table__lbl">¥ {{$item->item_price}}</p></td>
            </tr>
            <tr>
                <th><p class="table__header">支払い方法</p></th>
                <td><p class="table__lbl">コンビニ払い</p></td>
            </tr>
        </table>
        <div class="purchase__button">
            <button class="purchase__button--submit" type="submit">購入する</button>
        </div>
    </form>
</div>
@endsection