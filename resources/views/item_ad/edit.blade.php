@include('layouts.header')

<script>
    function addToCart() {
        // カートにアイテムを追加するロジックを追加することもできます

        // カートページにリダイレクト
        window.location.href = '{{ route('cart') }}';
    }
</script>
<form>
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-6 md-5">
                <img src="{{asset('img/hero/banner.jpg')}}" class="card-img-top"  　alt="...">
                <form method="POST" action="/upload" enctype="multipart/form-data">
                    @csrf
                    <input type="file" name="image">
                    <button>アップロード</button>
                </form>
            </div>



            <div class="col">
                <div class="mb-3 col">
                    <label for="exampleInputFirstName" class="form-label">商品名2</label>
                    <input type="text" class="form-control" id="exampleInputFirstName">
                </div>

                <div class="mb-3 col">
                    <label for="exampleInputFirstName" class="form-label">概要</label>
                    <input type="text" class="form-control" id="exampleInputFirstName">
                </div>
                <div class="mb-3 col">
                    <label for="exampleInputFirstName" class="form-label">価格</label>
                    <input type="text" class="form-control" id="exampleInputFirstName" >
                </div>
                <div class="col-md-12 py-3">
                    <button type="button" class="btn btn-success " onclick="addToCart()">登録</button>
                </div>
            </div>
        </div>
    </div>
    </div>

</form>

@include('layouts.footer')
