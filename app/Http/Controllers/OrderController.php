<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Order;
use App\Models\Product;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::all();

        return view('admin.pages.order.index', compact('orders'));
    }
    public function product()
    {
        $orders = Order::where('type', '2')->get();

        return view('admin.pages.order.product', compact('orders'));
    }
    public function appointment()
    {
        $orders = Order::where('type', '1')->get();


        return view('admin.pages.order.appointment', compact('orders'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $data = $request->validate([
            'name' => 'required',
            'type' => 'required',
            'item_id' => 'required',
            'payment_type' => 'required',
            'phone' => 'required',
            'price' => 'required',
            'transaction_id' => 'required',
        ]);


        $ifordered = Order::query()->where('type', $data['type'])->where('item_id', $data['item_id'])->where('user_id', Auth::user()->id)->get();

        if ($ifordered->count() > 0) {
            return redirect()->back()->with('error', 'You Have Already Purchased This Item');
        }

        $profit = 25;
        $data['user_id'] = Auth::user()->id;




        $order = Order::create($data);

        $invoice = 'LP-' . str_pad($order->id, 10, '0', STR_PAD_LEFT);
        // dd($order);
        if ($order) {
            if ($data['type'] == 1) {


                $userdata = array(
                    'name' => Auth::user()->name,
                    'email' => Auth::user()->email,
                    'totalAmount' => $data['price'],
                    'productName' => $data['name'],
                    'orderNumber' => $invoice,
                );
                $email = Auth::user()->email;

                Mail::send(['text' => 'email.appointment-purchase'], $userdata, function ($message) use ($email) {
                    $message->to($email)->specialist('CLekhapora - appointment order');
                });

                $percentage = (25 / 100) * $data['price'];
                $doctor = $percentage;
                $owner = $data['price'] - $percentage;

                $item = Appointment::find($data['item_id']);


                $transaction = [
                    'order_id' => $order->id,
                    'doctor_id' => $item->creator_id,
                    'invoice' => $invoice,
                    'patient_id' => Auth::user()->id,

                    'amount' => $item->price,
                    'ratio' => $profit,
                    'doctor' => $doctor,
                    'owner' => $owner,

                ];

                // dd($transaction);
                Transaction::create($transaction);


                return redirect()->route('index')->with('success', 'Order recived successfully.');
            } else {
                $userdata = array(
                    'name' => Auth::user()->name,
                    'email' => Auth::user()->email,
                    'totalAmount' => $data['price'],
                    'productName' => $data['name'],
                    'orderNumber' => $invoice,
                );
                $email = Auth::user()->email;

                Mail::send(['text' => 'email.product-purchase'], $userdata, function ($message) use ($email) {
                    $message->to($email)->specialist('Lekhapora - product order');
                });



                // $percentage = (25 / 100) * $data['price'];
                // $doctor = $percentage;
                // $owner = $data['price'] - $percentage;

                $item = Product::find($data['item_id']);

                $transaction['order_id'] = $order->id;
                $transaction['invoice'] = $invoice;
                $transaction['patient_id'] = Auth::user()->id;
                $transaction['doctor_id'] = '0';
                $transaction['amount'] = $item->price;
                $transaction['ratio'] = '100';
                $transaction['doctor'] = '0';
                $transaction['owner'] = $item->price;

                Transaction::create($transaction);

                return redirect()->route('index')->with('success', 'Order recived successfully.');
            }
            // dd('success');

            # code...
        } else {
            return back()->with('error', 'Order placing showing error.');
        }
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy($orders)
    {
        $order = Order::find($orders);
        $transaction = Transaction::where('order_id', $order->id)->first();

        $orderdelete =  $order->delete();
        $transactiondelete =  $transaction->delete();


        if ($orderdelete && $transactiondelete) {
            return redirect()->back()->with('success', 'order Deleted successfully.');
        } else {
            return back()->with('error', 'order Delete Unsuccessfull');
        }
    }
    /**
     * Active the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function Active(Order $order)
    {
        $order->status = '1';
        if ($order->save()) {
            return redirect()->back()->with('success', 'order Activated successfully.');
        } else {
            return back()->with('error', 'order Activation Unsuccessfull');
        }
    }
    public function Pending(Order $order)
    {

        $order->status = '1';
        if ($order->save()) {
            return redirect()->back()->with('success', 'order Accepted successfully.');
        } else {
            return back()->with('error', 'order Activation Unsuccessfull');
        }
    }
    /**
     * Inactive  the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function Inactive(Order $order)

    {
        // dd($order->status);
        $order->status = '0';
        if ($order->save()) {
            return redirect()->back()->with('success', 'order Deactivated successfully.');
        } else {
            return back()->with('error', 'order Dactivation Unsuccessfull.');
        }
    }
}
