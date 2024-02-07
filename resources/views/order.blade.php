@include('layouts.header')



<div class="container py-5">
    <form>
    <div class="row">

        <div class="col-md-12 col-lg-8">

            <div class="container">
                <div class="row">

                        <div class="mb-3 col-6">
                            <label for="exampleInputFirstName" class="form-label">姓</label>
                            <input type="text" class="form-control" id="exampleInputFirstName" aria-describedby="Help">
                            <div id="Help" class="form-text">必須</div>
                        </div>
                        <div class="mb-3 col-6">
                            <label for="exampleInputLastName" class="form-label">名</label>
                            <input type="text" class="form-control" id="exampleInputLastName" aria-describedby="Help">
                            <div id="Help" class="form-text">必須</div>
                        </div>
{{--                        <button type="submit" class="btn btn-primary">Submit</button>--}}
                    <div class="mb-3 col-5">
                        <label for="postalCode" class="form-label">郵便番号</label>
                        <input type="text" class="form-control" id="postalCode" aria-describedby="postalCodeHelp">
                        <div id="postalCodeHelp" class="form-text">必須</div>
                    </div>

                    <div class="mb-3 col-12">
                        <label for="prefecture" class="form-label">都道府県</label>
                        <input type="text" class="form-control" id="prefecture" aria-describedby="prefectureHelp">
                        <div id="prefectureHelp" class="form-text">必須</div>
                    </div>

                    <div class="mb-3 col-12">
                        <label for="city" class="form-label">市町村</label>
                        <input type="text" class="form-control" id="city" aria-describedby="cityHelp">
                        <div id="cityHelp" class="form-text">必須</div>
                    </div>

                    <div class="mb-3 col-12">
                        <label for="streetAddress" class="form-label">町名番地</label>
                        <input type="text" class="form-control" id="streetAddress" aria-describedby="streetAddressHelp">
                        <div id="streetAddressHelp" class="form-text">必須</div>
                    </div>

                    <div class="mb-3 col-12">
                        <label for="building" class="form-label">建物名と部屋番号</label>
                        <input type="text" class="form-control" id="building">
                    </div>

                    <div class="mb-3 col-12">
                        <label for="phoneNumber" class="form-label">電話番号</label>
                        <input type="text" class="form-control" id="phoneNumber" aria-describedby="phoneNumberHelp">
                        <div id="phoneNumberHelp" class="form-text">必須</div>
                    </div>
                    <div class="mb-3 col-12">
                        <label for="paymentMethod" class="form-label">支払い方法の選択</label>
                        <select class="form-select" id="paymentMethod" aria-describedby="paymentMethodHelp">
                            <option selected>選択して下さい</option>
                            <option value="1">クレジットカード</option>
                            <option value="2">銀行振込</option>
                            <option value="3">代引き</option>
                        </select>
                        <div id="paymentMethodHelp" class="form-text">必須</div>
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
                    <button type="button" class="btn btn-success " onclick="addToCart()">購入</button>
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
</div>


@include('layouts.footer')

