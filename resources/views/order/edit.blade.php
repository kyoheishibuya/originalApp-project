@include('layouts.header')

<div class="container my-3">
    <h2>注文詳細 #{{ $order->id }}</h2>
    <form action="{{ route('order.update', $order->id) }}" method="POST" class="needs-validation" novalidate>
        @csrf
        @method('PUT')
        <div class="row">
        <div class="col-md-3 mb-3">
            <label for="status" class="form-label">ステータス</label>
            <select class="form-select" id="status" name="status">
                <option value="0" {{ $order->delivery_status == 0 ? 'selected' : '' }}>未発送</option>
                <option value="1" {{ $order->delivery_status == 1 ? 'selected' : '' }}>発送済み</option>
                <option value="2" {{ $order->delivery_status == 2 ? 'selected' : '' }}>キャンセル</option>
            </select>
        </div>

        <div class="col-md-3 mb-3">
            <label for="shipping_at" class="form-label">発送日</label>
            <input type="date" class="form-control" id="shipping_at" name="shipping_at" value="{{ $order->shipping_at ? \Carbon\Carbon::parse($order->shipping_at)->format('Y-m-d') : '' }}">
        </div>
        </div>

        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="last_name" class="form-label">姓</label>
                <input type="text" class="form-control" id="last_name" name="last_name" value="{{ $order->customer->last_name }}" required>
            </div>
            <div class="col-md-6 mb-3">
                <label for="first_name" class="form-label">名</label>
                <input type="text" class="form-control" id="first_name" name="first_name" value="{{ $order->customer->first_name }}" required>
            </div>
        </div>

        <div class="row">
            <div class="col-md-3 mb-3">
                <label for="post_address" class="form-label">郵便番号</label>
                <input type="text" class="form-control" id="post_address" name="post_address" value="{{ $order->customer->post_address }}" required>
            </div>
        </div>
        <div class="row">
        <div class="col-md-3 mb-3">
        <label for="prefecture" class="form-label">都道府県</label>
        <input type="text" class="form-control" id="prefecture" name="prefecture" value="{{ $order->customer->prefecture }}">
    </div>
            <div class="col-md-9 mb-3">
        <label for="city" class="form-label">市区町村</label>
        <input type="text" class="form-control" id="city" name="city" value=" {{ $order->customer->city }}">
    </div>
            <div class="col-md-6 mb-6">
        <label for="street_address" class="form-label">町名番地</label>
        <input type="text" class="form-control" id="street_address" name="street_address" value="{{ $order->customer->street_address }}">
    </div>
            <div class="col-md-6 mb-6">
        <label for="building" class="form-label">建物名と部屋番号</label>
        <input type="text" class="form-control" id="building" name="building" value=" {{ $order->customer->building }}">
    </div>
            <div class="col-md-3 mb-3">
        <label for="delivery_status" class="form-label">支払い方法</label>
        <select class="form-select" id="delivery_status" name="delivery_status">
            <option value="1" {{ $order->delivery_status == 1 ? 'selected' : '' }}>クレジット</option>
            <option value="2" {{ $order->delivery_status == 2 ? 'selected' : '' }}>銀行振り込み</option>
            <option value="3" {{ $order->delivery_status == 3 ? 'selected' : '' }}>代引き</option>
        </select>

    </div>
        </div>
        <div class="mb-3">
            <button type="submit" class="btn btn-primary">更新</button>
        </div>
    </form>
</div>



@include('layouts.footer')

