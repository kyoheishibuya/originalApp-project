@include('layouts.header')
<div class="container my-3">
    <div class="row mb-4">
        <div class="col-12">
            <form action="{{ route('order.search') }}" method="GET" class="row g-3 align-items-center">
                <div class="col-auto">
                    <input type="text" name="search" class="form-control" placeholder="氏名または電話番号で検索">
                </div>

                <!-- 発送ステータスのチェックボックス -->
                <div class="col-auto form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" name="status_sent" id="statusSent" value="1">
                    <label class="form-check-label" for="statusSent">発送済み</label>
                </div>
                <div class="col-auto form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" name="status_not_sent" id="statusNotSent" value="0">
                    <label class="form-check-label" for="statusNotSent">未発送</label>
                </div>

                <!-- 注文日でのソート -->
                <div class="col-auto">
                    <select name="sort" class="form-select">
                        <option value="latest">新着順</option>
                        <option value="oldest">注文順</option>
                    </select>
                </div>

                <div class="col-auto">
                    <button type="submit" class="btn btn-outline-success">検索</button>
                </div>
                <div class="col-auto">
                    <button type="submit" href="{{ route('order.index') }}" class="btn btn-outline-secondary">リセット</button>
                </div>
            </form>
        </div>

        <div class="container my-3">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">氏名</th>
                    <th scope="col">連絡先</th>
                    <th scope="col">郵便番号</th>
                    <th scope="col">送り先</th>
                    <th scope="col">注文日</th>
                    <th scope="col">ステータス</th>
                    <th scope="col"></th>
                </tr>
                </thead>
                <tbody>
                @foreach($orders as $order)
                    <tr>
                        <td>{{ $order->id }}</td>
                        <td>{{ optional($order->customer)->last_name }} {{ optional($order->customer)->first_name }}</td>
                        <td>{{ optional($order->customer)->telephone_number }}</td>
                        <td>{{ optional($order->customer)->post_address }}</td>
                        <td>{{ optional($order->customer)->prefecture }} {{ optional($order->customer)->city }} {{ optional($order->customer)->street_address }} {{ optional($order->customer)->building }}</td>
                        <td>{{ $order->created_at->format('Y/m/d') }}</td>
                        <td>
                            @switch($order->delivery_status)
                                @case(0) 未発送 @break
                                @case(1) 発送済み @break
                                @case(2) キャンセル @break
                                @default 不明
                            @endswitch
                        </td>
                        <td>
                            <a href="{{ route('order.show', $order->id) }}" class="btn btn-primary btn-sm">詳細</a>
                            <form method="POST" action="{{ route('order.destroy', $order->id) }}" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('本当に削除しますか？')">取消</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

@include('layouts.footer')

