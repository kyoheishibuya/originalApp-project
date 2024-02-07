<!doctype html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="../../css/style.css">
    </link:rel>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

</head>
<body>
<header class="header">

    <div class="container py-3 pb-3">
        <div class="row">
            <div class="col-9 d-flex align-items-center">
                <h5>観葉植物専門のインテリアブランド</h5>
            </div>
            <div class="col-3 text-end">
                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                        admin
                    </button>
                    <ul class="dropdown-menu">
                        @guest
                            <li><a class="dropdown-item" href="{{ route('login') }}">ログイン</a></li>
                        @endguest
                        @auth
                            <li>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <x-dropdown-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();">
                                        {{ __('Log Out') }}
                                    </x-dropdown-link>
                                </form>
                            </li>
                            <li><a class="dropdown-item" href="#">管理者情報変更</a></li>
                            <li><a class="dropdown-item" href="#">注文状況一覧</a></li>
                            <li><a class="dropdown-item" href="{{ route('item_ad.index') }}">商品一覧</a></li>
                        @endauth

                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid border-bottom">
    </div>

    <div class="container py-1">
        <div class="row">
            <div class="col-9 col-sm-7">
                <img src="{{asset('img/logo.png')}}" alt="ロゴ画像">
            </div>
            <div class="col-3  col-sm-5 d-flex justify-content-end align-items-center">
                <div class="row">
                    <div class="col-4">
                        <a class="nav-link"  href="{{ route('home') }}">Home</a>
                    </div>
                    <div class="col-4">
                        <a class="nav-link" href="{{ route('cart') }}">Cart</a>
                    </div>
                    <div class="col-4">
                        <a class="nav-link" href="{{ route('order') }}">購入</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

</header>
{{--header/--}}



