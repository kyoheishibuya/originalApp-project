<!doctype html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="../css/style.css">
    </link:rel>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

</head>
<body>
<div class="container  py-1">
    <div class="row">
        <div class="col-9 d-flex align-items-center">
            <span>観葉植物専門のインテリアブランド</span>
        </div>
        <div class="col-3 text-end">
            <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                    admin
                </button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">ログイン</a></li>
                    <li><a class="dropdown-item" href="#">ログアウト</a></li>
                    <li><a class="dropdown-item" href="#">管理者情報変更</a></li>
                    <li><a class="dropdown-item" href="#">注文状況一覧</a></li>
                    <li><a class="dropdown-item" href="#">商品一覧</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
{{--/header--}}


<div class="container py-1">
    <div class="row">
        <div class="col-9">
            <img src="{{asset('img/logo.png')}}" alt="ロゴ画像">
        </div>
        <div class="col-3 d-flex justify-content-end align-items-center">
            <div class="row">
                <div class="col-4">
                    <a class="nav-link" href="#">Home</a>
                </div>
                <div class="col-4">
                    <a class="nav-link" href="#">Cart</a>
                </div>
                <div class="col-4">
                    <a class="nav-link" href="#">購入</a>
                </div>
            </div>
        </div>
    </div>
</div>

{{--header/--}}
{{--/body--}}

{{--/TOPimg--}}
<div class="container-fluid">
    <div class="row">
        <div class="col-12 mb-5">
            <img src="{{asset('img/hero/banner.jpg')}}" width="100%" height="500px">
        </div>
    </div>
</div>
{{--TOPimg/--}}
{{--/MAIN--}}
<div class="container">
    <div class="row justify-content-center text-center">
        <div class="col my-3">
            <h3>New Item</h3>
        </div>
    </div>

    <div class="row justify-content-around">
        <div class="col-5 my-5 mx-5 py-3 card">
            <img src="{{asset('img/hero/banner.jpg')}}" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">商品名</h5>
                <p class="card-text">￥2000</p>
            </div>
        </div>
        <div class="col-5 my-5 mx-5 py-3 card">
            <img src="{{asset('img/hero/banner.jpg')}}" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">商品名</h5>
                <p class="card-text">￥2000</p>
            </div>
        </div>
    </div>
</div>


<div class="container">
    <div class="row ">
        <div class="row justify-content-center text-center">
            <div class="col my-5">
                <h3>Item</h3>
                <h4>テキストテキストテキストテキスト<br>テキストテキストテキストテキスト</h4>
            </div>
        </div>
        <div class="row justify-content-around">

            <div class="card col-3 my-4 mx-2" style="width: 18rem; padding-top: 10px;">
                <img src="{{asset('img/hero/banner.jpg')}}" class="card-img-top" height="200px" 　alt="...">
                <div class="card-body">
                    <h5 class="card-title">商品名</h5>
                    <p class="card-text">￥2000</p>
                </div>

            </div>
            <div class="card col-3 my-4 mx-2" style="width: 18rem; padding-top: 10px;">
                <img src="{{asset('img/hero/banner.jpg')}}" class="card-img-top" height="200px" 　alt="...">
                <div class="card-body">
                    <h5 class="card-title">商品名</h5>
                    <p class="card-text">￥2000</p>
                </div>

            </div>
            <div class="card col-3 my-4 mx-2" style="width: 18rem; padding-top: 10px;">
                <img src="{{asset('img/hero/banner.jpg')}}" class="card-img-top" height="200px" 　alt="...">
                <div class="card-body">
                    <h5 class="card-title">商品名</h5>
                    <p class="card-text">￥2000</p>
                </div>

            </div>
            <div class="card col-3 my-4 mx-2" style="width: 18rem; padding-top: 10px;">
                <img src="{{asset('img/hero/banner.jpg')}}" class="card-img-top" height="200px" 　alt="...">
                <div class="card-body">
                    <h5 class="card-title">商品名</h5>
                    <p class="card-text">￥2000</p>
                </div>

            </div>
            <div class="card col-3 my-4 mx-2" style="width: 18rem; padding-top: 10px;">
                <img src="{{asset('img/hero/banner.jpg')}}" class="card-img-top" height="200px" 　alt="...">
                <div class="card-body">
                    <h5 class="card-title">商品名</h5>
                    <p class="card-text">￥2000</p>
                </div>

            </div>
            <div class="card col-3 my-4 mx-2" style="width: 18rem; padding-top: 10px;">
                <img src="{{asset('img/hero/banner.jpg')}}" class="card-img-top" height="200px" 　alt="...">
                <div class="card-body">
                    <h5 class="card-title">商品名</h5>
                    <p class="card-text">￥2000</p>
                </div>

            </div>
            <div class="card col-3 my-4 mx-2" style="width: 18rem; padding-top: 10px;">
                <img src="{{asset('img/hero/banner.jpg')}}" class="card-img-top" height="200px" 　alt="...">
                <div class="card-body">
                    <h5 class="card-title">商品名</h5>
                    <p class="card-text">￥2000</p>
                </div>

            </div>
            <div class="card col-3 my-4 mx-2" style="width: 18rem; padding-top: 10px;">
                <img src="{{asset('img/hero/banner.jpg')}}" class="card-img-top" height="200px" 　alt="...">
                <div class="card-body">
                    <h5 class="card-title">商品名</h5>
                    <p class="card-text">￥2000</p>
                </div>

            </div>


        </div>
    </div>
</div>

<div class="container-fluid  mt-5 bg-black text-white">
    <div class="container py-5">
        <h1>MAP</h1>
        <div class="row justify-content-between py-5">
            <div class="col">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3240.6680422002096!2d139.7502245756874!3d35.685174972586!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x60188c0d02d8064d%3A0xd11a5f0b379e6db7!2z55qH5bGF!5e0!3m2!1sja!2sjp!4v1700113917816!5m2!1sja!2sjp"
                    width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
            <div class="col">
                <img src="{{asset('img/logo.png')}}" alt="ロゴ画像">
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <img src="{{asset('img/t_logos.png')}}" width="50%" alt="ロゴ画像">
                        </div>
                        <div class="col">
                            <img src="{{asset('img/y_logos.png')}}" width="50%" alt="ロゴ画像">
                        </div>
                        <div class="col">
                            <img src="{{asset('img/f_logos.png')}}" width="50%" alt="ロゴ画像">
                        </div>
                        <div class="col">
                            <img src="{{asset('img/i_logos.png')}}" width="50%" alt="ロゴ画像">
                        </div>
                        <div class="col">
                            <img src="{{asset('img/l_logos.png')}}" width="50%" alt="ロゴ画像">
                        </div>
                    </div>
                </div>
                <h2>aaaaaaaaaaaaa</h2>
                <h2>aaaaaaaaaaaaa</h2>
                <h2>aaaaaaaaaaaaa</h2>
                <h2>aaaaaaaaaaaaa</h2>
            </div>
        </div>
    </div>
</div>
@include('layouts.header')
{{--body/--}}


{{--@foreach($users as $users)--}}
{{--    <p>--}}
{{--        {{$users->name}}--}}

{{--    </p>--}}
{{--@endforeach--}}
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
        crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
</body>
</html>





