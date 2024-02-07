@include('layouts.header')

<script>
    function addToCart() {
        // カートにアイテムを追加するロジックを追加することもできます

        // カートページにリダイレクト
        window.location.href = '{{ route('cart') }}';
    }
</script>

<div class="container">
    <div class="row">
        <div class="col-12 col-md-6 md-5">
            <img src="{{asset('img/hero/banner.jpg')}}" class="card-img-top"  　alt="...">
        </div>

        <div class="col-12 col-md-6 md-2">
        <div class="col">
            <div class="mb-2 h2">商品名item</div>
            <div class="mb-2">概要概要概要概要概要概要概要概要概要概要概要概要概要概要概要概要概要概要概要概要概概要概要概</div>
            <div class="mb-2 h3">価格</div>
            <div class="mb-2">消費税</div>

                <div class="row">

                    <div class="col-2 col-md-3 col-lg-2">
                        <select class="form-select form-select-sm" aria-label=".form-select-sm example">
                            @for ($i = 1; $i <= 9; $i++)
                                <option value="{{ $i }}">{{ $i }}</option>
                            @endfor
                        </select>
                    </div>

                    <div class="col text-end">
                        <button type="button" class="btn btn-success" onclick="addToCart()">カートに追加</button>
                    </div>
                </div>
            </div>
        </div>


    </div>
</div>

@include('layouts.footer')

