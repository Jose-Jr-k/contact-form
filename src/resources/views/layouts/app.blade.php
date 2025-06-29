<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>お問い合わせフォーム</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- 共通CSS --}}
    <link rel="stylesheet" href="{{ asset('css/common.css') }}">
    @yield('css') {{-- ページごとの追加CSS --}}
</head>
<body>
    <header>
        <nav>
            <ul>
                <li><a href="{{ route('form.index') }}">HOME</a></li>
                @auth
                    <li><a href="{{ route('dashboard') }}">管理画面</a></li>
                    <li><form method="POST" action="{{ route('logout') }}">@csrf <button type="submit">ログアウト</button></form></li>
                @else
                    <li><a href="{{ route('login') }}">ログイン</a></li>
                    <li><a href="{{ route('register') }}">登録</a></li>
                @endauth
            </ul>
        </nav>
    </header>

    <main>
        @yield('content') {{-- 各ビューのコンテンツをここに表示 --}}
    </main>

    <footer>
        <p>&copy; 2025 お問い合わせフォーム</p>
    </footer>

    @yield('script') {{-- ページごとの追加JS --}}
</body>
</html>