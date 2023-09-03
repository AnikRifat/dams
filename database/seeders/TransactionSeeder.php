<?php

namespace Database\Seeders;
// database/seeders/TransactionSeeder.php

use App\Models\Appointment;
use App\Models\Order;
use App\Models\Product;
use App\Models\Transaction;
use Illuminate\Database\Seeder;

class TransactionSeeder extends Seeder
{
    public function run()
    {
        // Get all orders from the database
        $orders = Order::all();
        foreach ($orders as $order) {
            $transaction = new Transaction();
            $transaction->order_id = $order->id;


            $transaction->invoice = 'LP-' . str_pad($order->id, 10, '0', STR_PAD_LEFT);

            // Handle appointment orders
            if ($order->type == 1) {
                $appointment = Appointment::find($order->item_id);

                // Calculate doctor and owner amounts (assuming profit is 25%)
                $doctorPercentage = 25;
                $doctorAmount = ($doctorPercentage / 100) * $order->price;
                $ownerAmount = $order->price - $doctorAmount;

                $transaction->doctor_id = $appointment->creator_id;
                $transaction->patient_id = $order->user_id;
                $transaction->amount = $order->price;
                $transaction->ratio = $doctorPercentage;
                $transaction->doctor = $doctorAmount;
                $transaction->owner = $ownerAmount;
            }
            // Handle product orders
            else if ($order->type == 2) {
                $product = Product::find($order->item_id);

                $transaction->doctor_id = 0;
                $transaction->patient_id = $order->user_id;
                $transaction->amount = $order->price;
                $transaction->ratio = 100;
                $transaction->doctor = 0;
                $transaction->owner = $order->price;
            }

            $transaction->save();
        }
    }
}
