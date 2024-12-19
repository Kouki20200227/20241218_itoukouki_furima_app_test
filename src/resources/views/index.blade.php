@extends('layouts.app')

@section('link')
<link rel="stylesheet" href="{{asset('css/index.css')}}">
@endsection

@section('content')
<div class="index__content">
    <!-- おすすめ・マイリスト選択ボタン -->
    <div class="list__bar">
        <form action="/" class="index__form" method="get">
            <div class="button__group">
                <button class="button__group--submit" type="submit" name="all">おすすめ</button>
            </div>
            <div class="button__group">
                <button class="button__group--submit" type="submit" name="mylist">マイリスト</button>
            </div>
        </form>
    </div>
    <div class="exhibit__list">
        @foreach ($exhibits as $exhibit)
        
        @endforeach
    </div>
</div>
@endsection