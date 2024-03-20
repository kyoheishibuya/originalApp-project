@include('layouts.header')

{{--<pre>--}}
{{--    {{ print_r(session()->all()) }}--}}
{{--</pre>--}}
@php
     $totalPrice = 0; // 合計価格を保持する変数
     $cartData = session('cartData') ?? []; // カートデータが存在しない場合は空の配列を代入
     $delivery = is_array($cartData) && count($cartData) > 0 ? 1000 : 0; // カートデータがある場合は送料を加算
@endphp

<div class="container py-5">
    @if(count($cartData) > 0)
    <form action="{{ route('order.store') }}" method="POST" class="d-inline">
        @csrf

{{--$cartDataは複数のアイテムがある場合がある為、$indexで区分けして 変数$itemに入れる--}}
        @foreach($cartData as $index => $item)
            <input type="hidden" name="cartData[{{ $index }}][item_id]" value="{{ $item['item_id'] }}">
            <input type="hidden" name="cartData[{{ $index }}][quantity]" value="{{ $item['quantity'] }}">
        @endforeach

        @foreach($items as $index => $item)
            @php
                $itemQuantity = session('cartData.'.$index.'.quantity');
                $itemPrice = $item->price * $itemQuantity;
                $totalPrice += $itemPrice; // 合計価格に加算
            @endphp
            {{-- 商品ごとに価格をhiddenでフォームに追加 --}}
            <input type="hidden" name="itemPrices[{{ $index }}]" value="{{ $itemPrice }}">
        @endforeach
　　　　　　{{-- order_details登録--}}
        <input type="hidden" name="total_item_price" value="{{ $totalPrice }}">
        <input type="hidden" name="shipping_price" value="{{ $delivery}}">
        <input type="hidden" name="total_payment_price" value="{{ $totalPrice+$delivery}}">

        <div class="row">
            <div class="col-md-12 col-lg-8">
                <div class="container">
                    <div class="row">
                        <div class="mb-3 col-6">
                            <label for="last_name" class="form-label">姓</label>
                            <input type="text" class="form-control" id="last_name" name="last_name" value="{{ old('last_name') }}" aria-describedby="Help">
                            <div id="lastNameHelp" class="form-text">必須</div>
                            @error('last_name')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3 col-6">
                            <label for="first_name" class="form-label">名</label>
                            <input type="text" class="form-control" id="first_name" name="first_name" value="{{ old('first_name') }}" aria-describedby="Help">
                            <div id="firstNameHelp" class="form-text">必須</div>
                            @error('first_name')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3 col-5">
                            <label for="post_address" class="form-label">郵便番号</label>
                            <input type="text" class="form-control" id="post_address" name="post_address" value="{{ old('post_address') }}" aria-describedby="postalCodeHelp">
                            <button type="button" id="address_search">検索</button>
                            <div id="postalCodeHelp" class="form-text">必須</div>
                            @error('post_address')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3 col-12">
                            <label for="prefecture" class="form-label">都道府県</label>
                            <select class="form-control" id="prefecture" name="prefecture" aria-describedby="prefectureHelp">
                                <option value="">選択してください</option>
                                <option value="北海道">北海道</option>
                                <option value="青森県">青森県</option>
                                <option value="岩手県">岩手県</option>
                                <option value="宮城県">宮城県</option>
                                <option value="秋田県">秋田県</option>
                                <option value="山形県">山形県</option>
                                <option value="福島県">福島県</option>
                                <option value="茨城県">茨城県</option>
                                <option value="栃木県">栃木県</option>
                                <option value="群馬県">群馬県</option>
                                <option value="埼玉県">埼玉県</option>
                                <option value="千葉県">千葉県</option>
                                <option value="東京都">東京都</option>
                                <option value="神奈川県">神奈川県</option>
                                <option value="新潟県">新潟県</option>
                                <option value="富山県">富山県</option>
                                <option value="石川県">石川県</option>
                                <option value="福井県">福井県</option>
                                <option value="山梨県">山梨県</option>
                                <option value="長野県">長野県</option>
                                <option value="岐阜県">岐阜県</option>
                                <option value="静岡県">静岡県</option>
                                <option value="愛知県">愛知県</option>
                                <option value="三重県">三重県</option>
                                <option value="滋賀県">滋賀県</option>
                                <option value="京都府">京都府</option>
                                <option value="大阪府">大阪府</option>
                                <option value="兵庫県">兵庫県</option>
                                <option value="奈良県">奈良県</option>
                                <option value="和歌山県">和歌山県</option>
                                <option value="鳥取県">鳥取県</option>
                                <option value="島根県">島根県</option>
                                <option value="岡山県">岡山県</option>
                                <option value="広島県">広島県</option>
                                <option value="山口県">山口県</option>
                                <option value="徳島県">徳島県</option>
                                <option value="香川県">香川県</option>
                                <option value="愛媛県">愛媛県</option>
                                <option value="高知県">高知県</option>
                                <option value="福岡県">福岡県</option>
                                <option value="佐賀県">佐賀県</option>
                                <option value="長崎県">長崎県</option>
                                <option value="熊本県">熊本県</option>
                                <option value="大分県">大分県</option>
                                <option value="宮崎県">宮崎県</option>
                                <option value="鹿児島県">鹿児島県</option>
                                <option value="沖縄県">沖縄県</option>
                                <option value="沖縄県">沖縄県</option>
                            </select>
                            <div id="prefectureHelp" class="form-text">必須</div>
                            @error('prefecture')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3 col-12">
                            <label for="city" class="form-label">市町村</label>
                            <input type="text" class="form-control" id="city" name="city" value="{{ old('city') }}" aria-describedby="cityHelp">
                            <div id="cityHelp" class="form-text">必須</div>
                            @error('city')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3 col-12">
                            <label for="street_address" class="form-label">番地</label>
                            <input type="text" class="form-control" id="street_address" name="street_address" value="{{ old('street_address') }}" aria-describedby="streetAddressHelp">
                            <div id="streetAddressHelp" class="form-text">必須</div>
                            @error('street_address')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3 col-12">
                            <label for="building" class="form-label">建物名と部屋番号</label>
                            <input type="text" class="form-control" id="building" name="building" value="{{ old('building') }}">
                            @error('building')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3 col-12">
                            <label for="telephone_number" class="form-label">電話番号</label>
                            <input type="text" class="form-control" id="telephone_number" name="telephone_number" value="{{ old('telephone_number') }}" aria-describedby="phoneNumberHelp">
                            <div id="telephone_number" class="form-text">必須</div>
                            @error('telephone_number')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3 col-12">
                            <label for="payment" class="form-label">支払い方法の選択</label>
                            <select class="form-select" id="payment" name="payment_method" aria-describedby="paymentMethodHelp">
                                <option selected>選択して下さい</option>
                                <option value="1" {{ old('payment_method') == '1' ? 'selected' : '' }}>クレジットカード</option>
                                <option value="2" {{ old('payment_method') == '2' ? 'selected' : '' }}>銀行振込</option>
                                <option value="3" {{ old('payment_method') == '3' ? 'selected' : '' }}>代引き</option>
                            </select>
                            <div id="paymentMethodHelp" class="form-text">必須</div>
                            @error('payment_method')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
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
                        <div class="col py-3 text-right">￥{{ $totalPrice }}</div>
                    </div>
                    <div class="row">
                        <div class="col py-3">配達料</div>
                        <div class="col py-3 text-right">￥{{$delivery}}</div>
                    </div>
                    <div class="row">
                        <div class="col py-3">小計</div>
                        <div class="col py-3 text-right">￥{{ $totalPrice+$delivery }}</div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 py-3">
                        <button type="submit" class="btn btn-success">購入</button>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="col">商品の特性上ご注文いただいた商品は<br>
                            キャンセルできない場合がございます。<br>
                            ご確認の上、注文をしてください。</div>
                    </div>
                </div>
            </div>

        </div>
    </form>
    @else
        商品がありません。
    @endif
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        $('#address_search').click(function() {
            var postCode = $('#post_address').val().replace(/-/g, ''); // ハイフンを除去して正確な検索を可能にする
            if (postCode) {
                var requestUrl = 'https://zipcloud.ibsnet.co.jp/api/search?zipcode=' + postCode;
                $.ajax({
                    url: requestUrl,
                    dataType: 'jsonp',
                    success: function(json) {
                        if (json && json.results) {
                            $('#prefecture').val(json.results[0].address1);
                            $('#city').val(json.results[0].address2 + json.results[0].address3);
                            // $('#street_address').val(何らかの値); // APIから直接町名番地を取得できないため、この行は省略
                        } else {
                            alert('該当する住所情報が見つかりませんでした。');
                        }
                    }
                });
            } else {
                alert('郵便番号を入力してください。');
            }
        });
    });
</script>

@include('layouts.footer')

