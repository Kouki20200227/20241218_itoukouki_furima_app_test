@extends('layouts.app')

@section('link')
<link rel="stylesheet" href="{{asset('css/address.css')}}">
@endsection

@section('content')
<div class="address__content">
    <p class="address__content--ttl">住所の変更</p>
    <form action="/purchase" class="form__address-change" method="post">
        @csrf
        <div class="address-change__group">
            <label for="post-card" class="address-change__group--lbl">郵便番号</label>
            <input type="text" id="post-card" name="post-card" class="address-change__group--input">
        </div>
        <div class="address-change__group">
            <label for="address" class="address-change__group--lbl">住所</label>
            <input type="text" id="address" name="address" class="address-change__group--input">
        </div>
        <div class="address-change__group">
            <label for="building" class="address-change__group--lbl">建物名</label>
            <input type="text" id="building" name="building" class="address-change__group--input">
        </div>
        <div class="button__group">
            <button class="button__group--submit" type="submit">更新する</button>
        </div>
    </form>
</div>
@endsection