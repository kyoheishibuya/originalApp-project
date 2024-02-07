@include('layouts.header')



<script>
    function redirectToCreate() {
        window.location.href = "{{ route('item_ad.create') }}";
    }
    function redirectToEdit(itemId) {
        window.location.href = "{{ route('item_ad.edit', ['item_ad' => ':id']) }}".replace(':id', itemId);
    }
</script>

<div class="container">
    <div class="col my-3 ">
        <button type="button" class="btn btn-success" onclick="redirectToCreate()">追加</button>
    </div>
</div>

<img src="{{asset('img/hero/banner.jpg')}}" class="card-img-top"  　alt="...">
storage/app/public/img/25.jpg
@foreach($items as $item)
    <div class="container py-2">
        <div class="row">
            <div class="col">
                <div class="container">
                    <div class="row mb-3 pb-3 border-bottom">
                        <div class="col-sm-12 col-md-12 col-lg-2 img-fluid">
                            @if($item->itemImages->count() > 0)
                                <img src="{{ asset('storage/app/'.$item->itemImages[0]->image_name)}}" width="150px">
                            @else
                                <!-- 画像が存在しない場合のデフォルト表示などをここに追加 -->
                                No Image
                            @endif

                        </div>
                        <div class="col-10 col-sm-6 col-md-5">
                            <div>商品名: {{ $item->title }}</div>
                            <div>概要: {{ $item->description }}</div>
                        </div>
                        <div class="col-2 mt-4">
                            <div>価格: ￥{{ $item->price }}</div>
                        </div>
                        <div class="col-2 col-md-1 py-3">
                            <button type="button" class="btn btn-success" onclick="redirectToEdit({{ $item->id }})">変更</button>
                        </div>
                        <div class="col-2 col-md-1 py-3">
                            <button type="button" class="btn btn-success" onclick="destroy()">削除</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endforeach
@include('layouts.footer')
