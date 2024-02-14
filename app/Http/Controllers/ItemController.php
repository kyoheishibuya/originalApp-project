<?php
namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ItemController extends Controller
{
    public function index()
    {
        $items=Item::paginate(10);
        return view('item.index', compact('items'));
    }

    public function create()
    {
        return view('item.create');
    }


    public function show(Item $item)
    {
        return view('item.show',compact('item'));
    }

    public function edit(Item $item){
        return view('item.edit',compact('item'));
    }
    public function destroy(Request $request, Item $item)
    {
        // アイテムに関連する画像を削除
        if ($item->itemImages->count() > 0) {
            // 画像ファイルを削除
            Storage::delete('public/' . $item->itemImages[0]->image_name); // パスを修正する

            // itemImages テーブルのレコードを削除
            $item->itemImages[0]->delete();
        }


        // アイテムの削除
        $item->delete();

        // フラッシュメッセージの設定
        $request->session()->flash('message', '削除しました');

        // アイテム一覧へリダイレクト
        return redirect()->route('item.index');
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|max:20',
            'description' => 'required|max:2000',
            'price' => 'integer',
            'image_name' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $item = Item::create($validated);

        // 保存先ディレクトリ
        $dir = 'img';

        // public/img ディレクトリに画像を保存
        $path = $request->file('image_name')->storeAs($dir, $item->id . '.' . $request->file('image_name')->extension(), 'public');

        // 商品と画像の関連付け
        $item->itemImages()->create(['image_name' => $path]);

        $request->session()->flash('message', '保存しました');
        return redirect()->route('item.index');

    }

    public function update(Request $request, Item $item)
    {
        // バリデーションの実行
        $validated = $request->validate([
            'title' => 'required|max:20',
            'description' => 'required|max:2000',
            'price' => 'integer',
            'image_name' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // 認証されたユーザーの ID を取得
        $validated['item_id'] = auth()->id();

        // 画像がアップロードされた場合の処理
        if ($request->hasFile('image_name')) {
            // 保存先ディレクトリ
            $dir = 'img';

            // 新しい画像の保存先パスを生成
            $newImagePath = $request->file('image_name')->storeAs($dir, $item->id . '.' . $request->file('image_name')->extension(), 'public');

            // 既存のアイテム画像が存在する場合
            if ($item->itemImages->count() > 0) {
                // 既存の画像を削除
                Storage::delete('public/' . $item->itemImages[0]->image_name);

                // 既存の画像を更新
                $item->itemImages[0]->update(['image_name' => $newImagePath]);
            } else {
                // 既存のアイテム画像が存在しない場合は、新しい画像を作成
                $item->itemImages()->create(['image_name' => $newImagePath]);
            }

            // 画像のパスを更新
            $validated['image_name'] = $newImagePath;
        }

// アイテムの更新
        $item->update($validated);

// アイテム一覧へリダイレクト
        return redirect()->route('item.index');
    }


}
