@include('layouts.header')





<div class="container">
    <div class="col my-3 ">
        <a href="{{ route('item.create') }}" class="btn btn-success">新規作成</a>
    </div>
</div>

@foreach($items as $item)
    <div class="container py-2">
        <div class="row">
            <div class="col">
                <div class="container">
                    <div class="row mb-3 pb-3 border-bottom">
                        <div class="col-sm-12 col-md-12 col-lg-2 img-fluid">
                            @if($item->itemImages->count() > 0)
                                <img src="{{ asset('storage/'.$item->itemImages[0]->image_name) }}" alt="Item Image" width="150px">
                            @else
                                <!-- 画像が存在しない場合のデフォルト表示などをここに追加 -->
                                <img src="{{asset('img/No_Img.jpg')}}" alt="No Image" width="150px">
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
                            <a href="{{ route('item.edit', $item->id) }}" class="btn btn-success">変更</a>
                        </div>
                        <div class="col-2 col-md-1 py-3">
                        <form method="POST" action="{{ route('item.destroy', $item->id) }}" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('本当に削除しますか？')">削除</button>
                        </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

{{--    <script>--}}
{{--        function redirectToCreate() {--}}
{{--            window.location.href = "{{ route('item.create') }}";--}}
{{--        }--}}
{{--        --}}{{--function redirectToEdit(itemId) {--}}
{{--        --}}{{--    window.location.href = "{{ route('item.edit', ['item' => ':id']) }}".replace(':id', itemId);--}}
{{--        --}}{{--}--}}
{{--        --}}{{--function redirectToDestroy(itemId) {--}}
{{--        --}}{{--    window.location.href = "{{ route('item.destroy', ['item' => ':id']) }}".replace(':id', itemId);--}}
{{--        --}}{{--}--}}
{{--    </script>--}}
@endforeach
@include('layouts.footer')
