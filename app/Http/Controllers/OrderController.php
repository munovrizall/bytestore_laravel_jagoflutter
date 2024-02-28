<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Kreait\Firebase\Messaging\CloudMessage;
use Kreait\Firebase\Messaging\Notification;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        $orders = DB::table("orders")->paginate(10);
        return view("pages.order.index", compact("orders"));
    }

    public function show($id)
    {
        return view("orders.show");
    }

    public function edit($id)
    {
        $order = DB::table("orders")->where('id', $id)->first();
        return view("pages.order.edit", compact("order"));
    }

    public function update(Request $request, $id)
    {
        $order = DB::table("orders")->where("id", $id);
        $order->update([
            "status" => $request->status,
            "shipping_resi" => $request->shipping_resi,
        ]);

        //send notification to user
        if ($request->status == 'on_delivery') {
            $this->sendNotificationToUser($order->first()->user_id, 'Paket Dikirim dengan nomor resi ' . $request->shipping_resi);
        }
        
        return redirect()->route("order.index");
    }

    public function sendNotificationToUser($userId, $message)
    {
        // Dapatkan FCM token user dari tabel 'users'

        $user = User::find($userId);
        $token = $user->fcm_id;

        // Kirim notifikasi ke perangkat Android
        $messaging = app('firebase.messaging');
        $notification = Notification::create('Paket Dikirim', $message);

        $message = CloudMessage::withTarget('token', $token)
            ->withNotification($notification);

        $messaging->send($message);
    }
}
