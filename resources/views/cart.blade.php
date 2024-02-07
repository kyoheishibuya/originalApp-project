@include('layouts.header')



<div class="container py-5">
    <div class="row">

        <div class="col-md-12 col-lg-8">
            <div class="container">

                <div class="row mb-3 pb-3 border-bottom">
                    <div class="col-3 col-md-3 img-fluid">
                        <img src="{{asset('img/hero/banner.jpg')}}"  width="150px" 　alt="...">
                    </div>
                    <div class="col-12 col-md-7">
                        <div>商品名５</div>
                        <div>概要概要概要概要概要概要概要概要概要概要概要概要概要概要概要概要概要概要概要</div>
                    </div>
                    <div class="col-2 col-md-2   mt-3">
                        <div>￥100000</div>
                    </div>
                    <div class="col-2 col-md-2 offset-md-3 mt-3">
                        <select class="form-select form-select-sm" aria-label=".form-select-sm example">
                            @for ($i = 1; $i <= 9; $i++)
                                <option value="{{ $i }}">{{ $i }}</option>
                            @endfor
                        </select>
                    </div>
                    <div class="col-3  mt-3">
                        <div>商品を削除する</div>
                    </div>

                </div>

                <div class="row mb-3 pb-3 border-bottom">
                    <div class="col-3 col-md-3 img-fluid">
                        <img src="{{asset('img/hero/banner.jpg')}}"  width="150px" 　alt="...">
                    </div>
                    <div class="col-12 col-md-7">
                        <div>商品名</div>
                        <div>概要概要概要概要概要概要概要概要概要概要概要概要概要概要概要概要概要概要概要</div>
                    </div>
                    <div class="col-2 col-md-2   mt-3">
                        <div>￥100000</div>
                    </div>
                    <div class="col-2 col-md-2 offset-md-3 mt-3">
                        <select class="form-select form-select-sm" aria-label=".form-select-sm example">
                            @for ($i = 1; $i <= 9; $i++)
                                <option value="{{ $i }}">{{ $i }}</option>
                            @endfor
                        </select>
                    </div>
                    <div class="col-3  mt-3">
                        <div>商品を削除する</div>
                    </div>
                </div>
            </div>
        </div>


        <div class="col-md-4 ">
            <div class="border-bottom">
                <div class="row">
                    <div class="col py-3">ご注文内容</div>
                </div>
                <div class="row">
                    <div class="col py-3">商品価格</div>
                    <div class="col py-3 text-right">￥9000</div>
                </div>
                <div class="row">
                    <div class="col py-3">配達料</div>
                    <div class="col py-3 text-right">￥1000</div>
                </div>
                <div class="row">
                    <div class="col py-3">小計</div>
                    <div class="col py-3 text-right">￥10000</div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 py-3">
                    <button type="button" class="btn btn-success " onclick="addToCart()">購入に進む</button>

                    <script>
                        function addToCart() {
                            // JavaScriptでリダイレクト
                            window.location.href = "{{ route('order') }}";
                        }
                    </script>
            </div>
        </div>

    </div>
</div>
</div>

@include('layouts.footer')

