<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;

class MyAccountController extends Controller
{
    //
    public function orders()
    {
     $viewData = [];
     $viewData['title'] = "My Orders - Online Store";
     $viewData['subtitle'] = "My Orders";
     $viewData['orders'] = Order::with(['items.product'])->where('user_id', Auth::user()->getId())->get();
     return view('myaccount.orders')->with("viewData", $viewData);
    }
}
