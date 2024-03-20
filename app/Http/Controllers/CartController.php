<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class CartController extends Controller
{

    public function allcart(Request $request)
    {
        // カートに入っている商品のitem_idを取得
        $cartItemIds = collect($request->session()->get('cartData'))->pluck('item_id')->toArray();

        // カートに入っている商品のみを取得
        $items = Item::whereIn('id', $cartItemIds)->get();

        return view('cart', compact('items'));
    }

    public function addcart(Request $request)
    {
        // バリデーションを行う
        $request->validate([
            'item_id' => 'required|exists:items,id',
            'quantity' => 'required|integer|min:1',
        ]);

        //商品詳細画面のhidden属性で送信（Request）された商品IDと注文個数を取得し配列として変数に格納
        //inputタグのname属性を指定し$requestからPOST送信された内容を取得する。
        $cartData = [
            'item_id' => $request->item_id,
            'quantity' => $request->quantity,
        ];
       //sessionにcartData配列が「ない」場合
       //（$request->session()->has('cartData')＝cartDataあり!があるのでなし）

        if (!$request->session()->has('cartData')) {
        //pushで新規登録
            $request->session()->push('cartData', $cartData);
        } else {
            //sessionにcartData配列が事前に「有る」場合、$sessionCartDataに登録
            $sessionCartData = $request->session()->get('cartData');

            //isSameProductId定義 item_id同一確認フラグ false = 同一ではない状態を指定
            $isSameProductId = false;

            foreach ($sessionCartData as $index => $sessionData) {

                //item_idが同一であれば、フラグをtrueにする →
                //個数の合算処理、及びセッション情報更新。更新は一度のみ
                //事前登録の$sessionDataと$cartDataを比較
            if ($sessionData['item_id'] === $cartData['item_id'] ) {
                //同一のものがあればtrue;に上書き
                $isSameProductId = true;
                $quantity = $sessionData['quantity'] + $cartData['quantity'];
                //cartDataをrootとしたツリー状の多次元連想配列の特定のValueにアクセスし、
                //指定の変数でValueの上書き処理
                $request->session()->put('cartData.' . $index . '.quantity', $quantity);
                break;
            }
        }
            //$isSameProductIdがfalseのままなら
            //item_idが同一ではない状態を指定 その場合であればpushする
            if ($isSameProductId === false) {
                $request->session()->push('cartData', $cartData);
            }
        }

        return redirect()->back()->with('success', 'カートにアイテムが追加されました');
    }

    public function updatecart(Request $request)
    {
        // リクエストから必要なデータを取得
        $itemId = $request->input('itemId');
        $newQuantity = $request->input('newQuantity');
        $index = $request->input('index');

        // セッションからカートデータを取得
        $cartData = session('cartData', []);

        // カートデータの該当アイテムの数量を更新
        $cartData[$index]['quantity'] = $newQuantity;

        // セッションに更新したカートデータを保存
        session(['cartData' => $cartData]);

        // レスポンス
        return response()->json(['message' => 'Session updated successfully'], 200);
    }


    public function removecart($itemId)
    {
        // 選択したアイテムのセッション情報を削除する
        $cartData = session('cartData', []);

        foreach ($cartData as $key => $cartItem) {
            if ($cartItem['item_id'] == $itemId) {
                // アイテムが見つかったら、そのセッション情報を削除
                unset($cartData[$key]);
                break;
            }
        }

        // 削除後のセッション情報を再設定
        session(['cartData' => array_values($cartData)]);

        // 他の処理があればここに追加

        return redirect()->back(); // カートページにリダイレクトするか、適切なページにリダイレクトする
    }

    public function update2Cart($itemId)
    {
        // 選択したアイテムのセッション情報を削除する
        $cartData = session('cartData', []);

        foreach ($cartData as $key => $cartItem) {
            if ($cartItem['item_id'] == $itemId) {
                // アイテムが見つかったら、そのセッション情報を削除
                unset($cartData[$key]);
                break;
            }
        }

        // 削除後のセッション情報を再設定
        session(['cartData' => array_values($cartData)]);

        // 他の処理があればここに追加

        return redirect()->back(); // カートページにリダイレクトするか、適切なページにリダイレクトする
    }
}
