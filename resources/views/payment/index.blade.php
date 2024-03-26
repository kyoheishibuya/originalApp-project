<form action="{{ route('processPayment') }}" method="POST">
    <script src="https://checkout.stripe.com/checkout.js" class="stripe-button"
            data-key="pk_test_51OwLSy08OiW90vNnBA4sNnIEj8ZOX2WzsiSKFShW6Vf4F8MR4mXkMVVcDKJbGOGGiHZFLqcArLmEQB4iexAWpbiE00aoZQO97Z"
            data-amount="{{ $totalPrice + $delivery }}"
            data-name="サイト名"
            data-locale="auto"
            data-allow-remember-me="false"
            data-label="購入する"
            data-currency="jpy">
    </script>

{{--    @csrf--}}

{{--</form>--}}


{{--/*--}}
{{--data-key:公開可能キー--}}
{{--data-amount:ダイアログでユーザに表示される金額(JPY)--}}
{{--data-name:会社またはウェブサイト名--}}
{{--data-locale:言語設定--}}
{{--data-allow-remember-me:決済情報を保存するかどうか。trueだとチェックボックスが表示--}}
{{--data-label:ボタンに表示されるテキスト--}}
{{--data-currency:金額の通貨--}}
{{--*/--}}
