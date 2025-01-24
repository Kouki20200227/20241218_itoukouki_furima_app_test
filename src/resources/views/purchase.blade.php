@extends('layouts.app')

@section('link')
<link rel="stylesheet" href="{{asset('css/purchase.css')}}">
@endsection

@section('content')
<div class="purchase__content">
    <!-- 購入情報フォーム -->
    <form action="/purchase" class="detail__form" method="post">
        @csrf
        <div class="left__group">
            <input type="text" class="hidden__item" name="item_id" hidden value="{{$item->id}}">
            <div class="detail__group">
                <div class="item__group">
                    <img src="{{asset($item->item_image)}}" class="detail__group--img">
                    <div class="item__tag">
                        <p class="detail__tag--ttl">{{$item->item_name}}</p>
                        ¥ <input type="numbers" name="item_price" class="detail__tag--price" readonly value="{{number_format($item->item_price)}}">
                    </div>
                </div>
            </div>
        <!-- 支払い方法選択 -->
            <div class="detail__group">
                <p class="detail__group--ttl">支払い方法</p>
                <div class="select__group">
                    <select name="payment_method" class="select__group--item" id="inputBox" onchange="selectChange()">
                        <option value="" hidden>選択してください</option>
                        <option value="1">コンビニ払い</option>
                        <option value="2">カード支払い</option>
                    </select>
                </div>
                <div class="form__group--error">
                    @error('payment_method')
                        {{$message}}
                    @enderror
                </div>
            </div>
        <!-- 配送先確認・変更 -->
            <div class="detail__group">
                <div class="address__group">
                    <p class="detail__group--ttl">配送先</p>
                    <div class="address__change">
                        <a href="/purchase/address/{{$item->id}}" class="address__change--link">変更する</a>
                    </div>
                </div>
                <div class="address__tag">
                    @if (session('post_code'))
                    <div class="post_code__area">
                        〒 <input type="text" name="post_code" class="address__tag--txt" readonly value="{{substr(session('post_code'), 0, 3) . '-' . substr(session('post_code'), 3, 4)}}">
                    </div>
                    <div class="address__area">
                        <p class="address__tag--txt">{{session('address') . session('building')}}</p>
                        <input type="text" name="address" class="address__tag--txt" readonly value="{{session('address')}}" hidden>
                        <input type="text" name="building" class="address__tag--txt" readonly value="{{session('building')}}" hidden>
                    </div>
                    @else
                        <div class="post_code__area">
                            〒 <input type="text" name="post_code" class="address__tag--txt" readonly value="{{substr($profile->profile_post_code, 0, 3) . '-' . substr($profile->profile_post_code, 3, 4)}}">
                        </div>
                        <div class="address__area">
                            <p class="address__tag--txt">{{$profile->profile_address . $profile->profile_building}}</p>
                            <input type="text" name="address" class="address__tag--txt" readonly value="{{$profile->profile_address}}" hidden>
                            <input type="text" name="building" class="address__tag--txt" readonly value="{{$profile->profile_building}}" hidden>
                        </div>
                    @endif
                </div>
            </div>
        </div>
        <div class="right__group">
            <table class="purchase__table">
                <tr>
                    <th><p class="table__header">商品代金</p></th>
                    <td><p class="table__lbl">¥ {{$item->item_price}}</p></td>
                </tr>
                <tr>
                    <th><p class="table__header">支払い方法</p></th>
                    <td><input type="text" class="table__lbl" id="outputBox" readonly></td>
                </tr>
            </table>
            <div class="purchase__button">
                <button class="purchase__button--submit" type="submit">購入する</button>
            </div>
        </div>
    </form>
</div>
<script src="{{asset('js/purchase.js')}}"></script>
@endsection