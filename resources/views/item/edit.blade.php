@include('layouts.header')

{{--@if($item->itemImages->count() > 0)--}}
{{--    <img src="{{ asset('storage/'.$item->itemImages[0]->image_name) }}" alt="Item Image" width="150px">--}}
{{--@else--}}
{{--    <!-- 画像が存在しない場合のデフォルト表示などをここに追加 -->--}}
{{--    <img src="{{asset('img/No_Img.jpg')}}" alt="No Image" width="150px">--}}
{{--@endif--}}


    <div class="container">
            <form method="post" action="{{ route('item.update', ['item' => $item->id]) }}" enctype="multipart/form-data">
            @csrf
            @method('patch')
        <div class="row">
            <div class="col-12 col-md-6 md-5">

                <img src="{{ asset('storage/'.$item->itemImages[0]->image_name) }}" class="card-img-top" alt="...">
                <input type="file" name="image_name" value="{{ old('image_name', $item->itemImages[0]->image_name) }}">

            </div>


            <div class="col">
                <div class="mb-3 col">
                    <label for="title" class="form-label">商品名</label>
                    <input type="text" name="title" class="form-control" id="title" value="{{old('title', $item->title)}}">
                </div>
                <div class="mb-3 col">
                    <label for="description" class="form-label">概要</label>
                    <input type="text" name="description" class="form-control" id="description" value="{{old('title', $item->description)}}">
                </div>
                <div class="mb-3 col">
                    <label for="price" class="form-label">価格</label>
                    <input type="text" name="price" class="form-control" id="price" value="{{old('title', $item->price)}}">
                </div>

                <x-primary-button class="mt-4">
                    送信する
                </x-primary-button>
            </div>
        </div>
        </form>
    </div>

    </div>



@include('layouts.footer')
