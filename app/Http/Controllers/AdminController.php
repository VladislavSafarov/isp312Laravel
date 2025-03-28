<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $orders = Order::orderBy("status")->get();
//        dump(env("GROUP_COURSE")); НЕЛЬЗЯ
        dump(config("group.name", ""));
        return view("admin", compact("orders"));
    }

    public function destroy(Order $order)
    {
        $order->delete();
        return redirect()->back();
    }

    public function edit (Order $order)
    {
        return view("update", compact("order"));
    }
}
