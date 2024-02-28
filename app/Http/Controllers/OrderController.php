<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function index(Request $request) {
        $orders = DB::table("orders")->paginate(10);
        return view("pages.order.index", compact("orders"));
    }

    public function show($id) {
        return view("orders.show");
    }

    public function edit($id) {
        $order = DB::table("orders")->where('id', $id)->first();
        return view("pages.order.edit", compact("order"));
    }

    public function update(Request $request, $id) {
        $order = DB::table("orders")->where("id", $id);
        $order->update([
            "status" => $request->status,
            "shipping_resi" => $request->shipping_resi,
        ]);

        return redirect()->route("order.index");
    }

}
