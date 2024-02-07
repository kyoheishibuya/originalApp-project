<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function cart(){
        $users = User::all();
        return view('cart',compact('users'));
    }
}
