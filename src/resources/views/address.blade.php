@extends('layouts.app')

@section('link')
<link rel="stylesheet" href="{{asset('css/address.css')}}">
@endsection

@section('content')
<div class="address__content">
    <p class="address__content--ttl">住所の変更</p>
    <form action="/purchase/address" class="form__address-change" method="post">
        @csrf
        <input type="text" value="{{$item_id}}" name="item_id" hidden>
        <div class="address-change__group">
            <label for="post-code" class="address-change__group--lbl">郵便番号</label>
            <input type="text" id="post-code" name="purchase_post_code" class="address-change__group--input">
            <div class="form__group--error">
                @error('purchase_post_code')
                    {{$message}}
                @enderror
            </div>
        </div>
        <div class="address-change__group">
            <label for="address" class="address-change__group--lbl">住所</label>
            <input type="text" id="address" name="purchase_address" class="address-change__group--input">
            <div class="form__group--error">
                @error('purchase_address')
                    {{$message}}
                @enderror
            </div>
        </div>
        <div class="address-change__group">
            <label for="building" class="address-change__group--lbl">建物名</label>
            <input type="text" id="building" name="purchase_building" class="address-change__group--input">
            <div class="form__group--error">
                @error('purchase_building')
                    {{$message}}
                @enderror
            </div>
        </div>
        <div class="button__group">
            <button class="button__group--submit" type="submit">更新する</button>
        </div>
    </form>
</div>
@endsection