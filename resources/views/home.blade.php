@include('layouts.header')

<script>
    document.addEventListener("DOMContentLoaded", function () {
        var cards = document.querySelectorAll('.card');

        cards.forEach(function (card) {
            card.addEventListener('click', function () {
                // クリックされたカードのアイテムIDなどを取得
                // home内data-item_ad-id 属性を使ってアイテムIDを取得する
                var itemId = card.getAttribute('data-item-id');

                // アイテムページにリダイレクト
                window.location.href = '/item/' + itemId;
                //取得したアイテムIDを使って、アイテムページにリダイレクトします。
                // '/item_ad/' + itemId は、リダイレクト先のURLを構築しています。
            });
        });
    });
</script>

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
</div>
<div class="container">
    <div class="row">
        <div class="row justify-content-around">
        <div class="card col-12  col-md my-6  mx-4 py-3 my-5" data-item-id="1">
            <img src="{{asset('img/hero/banner.jpg')}}" class="card-img-top"  alt="...">
            <div class="card-body">
                <h5 class="card-title">商品名</h5>
                <p class="card-text">￥2000</p>
            </div>
        </div>
        <div class="card col-12  col-md my-6  mx-4 py-3 my-5 " data-item-id="2">
            <img src="{{asset('img/hero/banner.jpg')}}" class="card-img-top"  alt="...">
            <div class="card-body">
                <h5 class="card-title">商品名</h5>
                <p class="card-text">￥2000</p>
            </div>
        </div>
    </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="row justify-content-center text-center">
            <div class="col my-5">
                <h3>Item</h3>
                <h4>テキストテキストテキストテキスト<br>テキストテキストテキストテキスト</h4>
            </div>
        </div>
    </div>
</div>

        <div class="container">
<div class="row">
        <div class="row justify-content-around">

            <div class="card col-4  col-md-3 my-4 mx-1" style="width: 18rem; padding-top: 10px;">
                <img src="{{asset('img/hero/banner.jpg')}}" class="card-img-top"  　alt="...">
                <div class="card-body">
                    <h5 class="card-title">商品名</h5>
                    <p class="card-text">￥2000</p>
                </div>
            </div>
            <div class="card col-4   col-md-3 my-4 mx-1" style="width: 18rem; padding-top: 10px;">
                <img src="{{asset('img/hero/banner.jpg')}}" class="card-img-top" 　alt="...">
                <div class="card-body">
                    <h5 class="card-title">商品名</h5>
                    <p class="card-text">￥2000</p>
                </div>
            </div>
            <div class="card col-4   col-md-3 my-4 mx-1" style="width: 18rem; padding-top: 10px;">
                <img src="{{asset('img/hero/banner.jpg')}}" class="card-img-top"  　alt="...">
                <div class="card-body">
                    <h5 class="card-title">商品名</h5>
                    <p class="card-text">￥2000</p>
                </div>
            </div>
            <div class="card col-4   col-md-3 my-4 mx-1" style="width: 18rem; padding-top: 10px;">
                <img src="{{asset('img/hero/banner.jpg')}}" class="card-img-top" 　alt="...">
                <div class="card-body">
                    <h5 class="card-title">商品名</h5>
                    <p class="card-text">￥2000</p>
                </div>
            </div>
            <div class="card col-4  col-md-3 my-4 mx-1" style="width: 18rem; padding-top: 10px;">
                <img src="{{asset('img/hero/banner.jpg')}}" class="card-img-top"  　alt="...">
                <div class="card-body">
                    <h5 class="card-title">商品名</h5>
                    <p class="card-text">￥2000</p>
                </div>
            </div>
            <div class="card col-4   col-md-3 my-4 mx-1" style="width: 18rem; padding-top: 10px;">
                <img src="{{asset('img/hero/banner.jpg')}}" class="card-img-top" 　alt="...">
                <div class="card-body">
                    <h5 class="card-title">商品名</h5>
                    <p class="card-text">￥2000</p>
                </div>
            </div>
            <div class="card col-4   col-md-3 my-4 mx-1" style="width: 18rem; padding-top: 10px;">
                <img src="{{asset('img/hero/banner.jpg')}}" class="card-img-top"  　alt="...">
                <div class="card-body">
                    <h5 class="card-title">商品名</h5>
                    <p class="card-text">￥2000</p>
                </div>
            </div>
            <div class="card col-4   col-md-3 my-4 mx-1" style="width: 18rem; padding-top: 10px;">
                <img src="{{asset('img/hero/banner.jpg')}}" class="card-img-top" 　alt="...">
                <div class="card-body">
                    <h5 class="card-title">商品名</h5>
                    <p class="card-text">￥2000</p>
                </div>
            </div>
        </div>
        </div>


        </div>

@include('layouts.footer')
