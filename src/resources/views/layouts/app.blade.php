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
                <a href="/" class="logo__ttl--link"><img src="{{asset('img/logo.svg')}}" alt="" class="logo__ttl--img"></a>
            </div>
            <div class="header__search">
                @unless (Route::is('login') | Route::is('register'))
                <form action="/" class="header__form" method="get">
                    @csrf
                    <input type="text" class="search__item" name="keyword" value="{{old('keyword')}}" placeholder="なにをお探しですか？">
                </form>
                @endunless
            </div>
            <nav class="header__link">
                @unless (Route::is('login') | Route::is('register'))
                <ul>
                    @if (Auth::check())
                    <li>
                        <form action="/logout" class="logout__form" method="post">
                        @csrf
                            <button class="logout__button--submit">ログアウト</button>
                        </form>
                    </li>
                    @else
                    <li><a href="/login" class="login__link">ログイン</a></li>
                    @endif
                    <li><a href="/mypage?tab=sell" class="mypage__link">マイページ</a></li>
                    <li><a href="/sell" class="sell__link">出品</a></li>
                </ul>
                @endunless
            </nav>
        </div>
    </header>
    <main>
        @yield('content')
    </main>
</body>
</html>