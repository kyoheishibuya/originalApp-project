<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class ItemAdController extends Controller
{

    public function index(){
        $items = Item::all();
        return view('item_ad.index',compact('items'));
    }
    public function create(){
        $items = Item::all();
        return view('item_ad.create',compact('items'));
    }
    public function edit(){
        $items = Item::all();
        return view('item_ad.edit',compact('items'));
    }
    public function show(){
        $items = Item::all();
        return view('item_ad.show',compact('items'));
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
        $path = $request->file('image_name')->storeAs('public/' . $dir, $item->id . '.' . $request->file('image_name')->extension());

        // 商品と画像の関連付け
        $item->itemImages()->create(['image_name' => $path]);

        $request->session()->flash('message', '保存しました');
        return redirect()->route('item_ad.index');

    }

}
