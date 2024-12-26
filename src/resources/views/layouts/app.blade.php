<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>free_market_application</title>
    <link rel="stylesheet" href="{{asset('css/sanitize.css')}}">
    <link rel="stylesheet" href="{{asset('css/common.css')}}">
    @yield('link')
</head>
<body>
    <header>
        <div class="header__ttl">
            <div class="ttl--txt">
                <img src="{{asset('storage/logo.svg')}}" class="logo__ttl--img">
            </div>
            <div class="header__search">
                @if (Auth::check())
                <form action="/" class="header__form" method="get">
                    @csrf
                    <input type="text" class="search__item" name="keyword" value="{{old('keyword')}}" placeholder="なにをお探しですか？">
                </form>
                @endif
            </div>
            <nav class="header__link">
                @if (Auth::check())
                    <a href="/logout" class="logout__link">ログアウト</a>
                    <a href="/mypage" class="mypage__link">マイページ</a>
                    <a href="/sell" class="sell__link">出品</a>
                @endif
            </nav>
        </div>
    </header>
    <main>
        @yield('content')
    </main>
</body>
</html>