<?php

namespace App\Http\Controllers;
use App\Models\order;
use Illuminate\Http\Request;


class OrderController extends Controller
{
    public function index() {
        return view('home');
    }
    public function checkout(Request $request) {
        $request->request->add(['total_price'=>$request->qty * 2000, 'status'=>'Unpaid']);
        // dd($request->all());
        $order = order::create($request->all());

        // Set your Merchant Server Key
            \Midtrans\Config::$serverKey = config('midtrans.server_key');
            // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
            \Midtrans\Config::$isProduction =config('midtrans.is_production');
            // Set sanitization on (default)
            \Midtrans\Config::$isSanitized = true;
            // Set 3DS transaction for credit card to true
            \Midtrans\Config::$is3ds = true;

            \Midtrans\Config::$overrideNotifUrl =config('app.url').'/api/midtrans-callback';

            $params = array(
                'transaction_details' => array(
                    'order_id' => $order->id,
                    'gross_amount' => $order->total_price,
                ),
                'customer_details' => array(
                    'first_name' => $request->name,
                    'phone' => $request->phone,
                    // 'email' => $request->address,
                ),
                
                
            );
            // dd($params);
            $snapToken = \Midtrans\Snap::getSnapToken($params);
            // dd($snapToken);
            return view('checkout',compact('snapToken','order'));
    }
    public function callback(Request $request) {
        $server_key =config('midtrans.server_key');
        $hashed = hash('sha512',$request->order_id.$request->status_code.$request->gross_amount.$server_key);
        if ($hashed == $request->signature_key) {
            if(($request->transaction_status == 'capture' && $request->payment_type =='credit_card' && $request->fraud_status =='accept') or $request->transaction_status == 'settlement' ){
                $order = order::find($request->order_id);
                $order->update(['status'=>'Paid']);
            }
        }
    }
    public function invoice($id){
        $order = order::find($id);
        return view('invoice', compact('order'));
    }
}
