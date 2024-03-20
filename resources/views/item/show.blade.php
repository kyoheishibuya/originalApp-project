@include('layouts.header')
@section('content')

{{--    <pre>--}}
{{--    {{ print_r(session()->all()) }}--}}
{{--</pre>--}}

    <div class="container">
        <div class="row">
            <div class="col-12 col-md-6 md-5">
                <img src="{{asset('storage/'.$item->itemImages[0]->image_name) }}" class="card-img-top"  　alt="...">
            </div>
            <div class="col-12 col-md-6 md-2">
                <div class="col">
                    <div class="mb-2 h2"> {{ $item->title }}</div>
                    <div class="mb-2"> {{ $item->description }}</div>
                    <div class="mb-2 h3">￥ {{ $item->price }}</div>
                    <div class="mb-2">消費税込み</div>

                    <div class="row">

                            <form action="{{ route('addcart') }}" method="POST" class="d-inline">
                            @csrf
                            <input type="hidden" name="item_id" value="{{ $item->id }}">

                            <div class="col-2 col-md-3 col-lg-2">
                                <select class="form-select form-select-sm" name="quantity" id="prodqty" aria-label=".form-select-sm example">
                                    @for ($i = 1; $i <= 9; $i++)
                                        <option value="{{ $i }}">{{ $i }}</option>
                                    @endfor
                                </select>
                            </div>

                            <div class="col text-end form-group">
                                <button type="submit" class="btn btn-success">カートに追加</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('layouts.footer')
