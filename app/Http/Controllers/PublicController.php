<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Blog;
use App\Models\Comments;
use App\Models\Duration;
use App\Models\Order;
use App\Models\Patient;
use App\Models\Product;
use App\Models\Specialist;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PublicController extends Controller
{
    public function cp()
    {
        return view('web.pages.error.complete-profile');
    }
    public function na()
    {
        return view('web.pages.error.not-allowed');
    }

    public function index()
    {
        $appointments = Appointment::where('status', '1')->take('8')->get();
        $doctors = User::where('role', 2)->where('allow', '1')->take(8)->get();
        return view('web.pages.index', compact('appointments', 'doctors'));
    }

    public function dashboard()
    {
        if (Auth::user()->role == 0) {

            return view('admin.pages.index');
        } else {
            return redirect()->route('user.dashboard');
        }
    }

    public function chart()
    {
        if (Auth::user()->role == 0) {
            $patients = User::where('role', 1)->where('allow', 1)->get();

            $hsc = Patient::where('current_class', 'Hsc')->get();
            $ssc = Patient::where('current_class', 'SSC')->get();

            return view('admin.pages.transaction.chart', compact('patients', 'hsc', 'ssc'));
        } else {
            return redirect()->route('user.dashboard');
        }
    }
    public function blogs()
    {
        $blogs = Blog::where('status', '1')
            ->orderBy('id', 'DESC')
            ->get();
        return view('web.pages.blog.index', compact('blogs'));
    }

    public function blogDetails($blogId)
    {
        $blog  = Blog::find($blogId);
        $comments = Comments::query()->orderBy('created_at', 'ASC')->get();
        // dd($blog);
        return view('web.pages.blog.details', compact('blog', 'comments'));
    }
    public function completeprofile()
    {

        return view('web.pages.authentication.patient.complete-profile');
    }

    public function userdashboard()
    {
        $user = User::find(Auth::user()->id);
        if (Auth::user()->complete == 1) {



            return view('web.pages.dashboard.index', compact('user'));
        } else {
            return view('web.pages.authentication.patient.complete-profile');
        }
    }
    public function createappointment()
    {
        $user = User::find(Auth::user()->id);

        return view('web.pages.appointments.create', compact('user'));
    }

    public function editappointment($id)
    {
        $appointment = Appointment::find($id);
        $user = User::find(Auth::user()->id);

        return view('web.pages.appointments.edit', compact('user', 'appointment'));
    }

    public function specialists()
    {
        $specialists = Specialist::where('status', '1')->get();
        return view('web.pages.specialist.index', compact('specialists'));
    }

    public function specialistdetails($specialist)
    {
        $specialistitem = Specialist::find($specialist);
        $appointments = Appointment::where('status', '1')->where('specialist_id', $specialist)->get();
        // dd($appointments);
        return view('web.pages.specialist.details', compact('appointments', 'specialistitem'));
    }
    public function products()
    {
        $products = Product::where('status', '1')->get();
        return view('web.pages.product.index', compact('products'));
    }

    public function productdetails($product)
    {
        $product = Product::find($product);

        return view('web.pages.product.details', compact('product'));
    }
    public function appointments()
    {
        $appointments = Appointment::where('status', '1')->get();
        // dd($appointments);
        return view('web.pages.appointments.all', compact('appointments'));
    }
    public function checkout($item, $type)
    {
        if ($type == 1) {
            $singleItem = Appointment::find($item);
        } elseif ($type == 2) {
            $singleItem = Product::find($item);
        }


        $ifordered = Order::query()->where('type', $type)->where('item_id', $singleItem)->where('user_id', Auth::user()->id)->get();

        if ($ifordered->count() > 0) {
            return redirect()->back()->with('error', 'You Have Already Purchased This Item');
        }

        // dd($singleItem);
        return view('web.pages.checkout', compact('singleItem', 'type'));
    }
    public function appointmentDetails($appointment)
    {
        $appointment = Appointment::find($appointment);

        return view('web.pages.appointments.details', compact('appointment'));
    }


    public function doctors()
    {
        $doctors = User::where('role', 2)->where('allow', '1')->where('complete', '1')->get();
        return view('web.pages.doctor.index', compact('doctors'));
    }

    public function doctordetails($doctor)
    {
        $doctor = User::find($doctor);
        $isPurchased = DB::table('appointments')
            ->join('orders', 'appointments.id', '=', 'orders.item_id')
            ->where('orders.user_id', Auth::user()->id)
            ->where('appointments.creator_id', $doctor->id)
            ->exists();

        // dd($isPurchased);
        // $order = Order::where('user_id',Auth::user()->id)
        // dd($doctor->doctor->appointments);
        return view('web.pages.doctor.details', compact('doctor', 'isPurchased'));
    }



    public function attendance()
    {
        if (Auth::user()->role == 1) {
            $appointments_id = Order::where('user_id', Auth::user()->id)->where('type', 1)->where('status', 1)->pluck('item_id')->unique();
        } else {
            $appointments_id = Appointment::where('creator_id', Auth::user()->id)->where('status', 1)->pluck('id')->unique();
        }

        $appointments = Appointment::query()->whereIn('id', $appointments_id)->get();
        $duration_id = Appointment::query()->whereIn('id', $appointments_id)->pluck('duration')->unique();
        $durations = Duration::query()->whereIn('id', $duration_id)->get();

        return view('web.pages.attendance', compact('appointments', 'durations'));
    }







    public function sales()
    {
        $user_id = Auth::user()->id;
        $transactions = Transaction::whereHas('order', function ($query) use ($user_id) {
            $query->where('doctor_id', $user_id);
        })->get();

        $saleData = [];
        $totalProfitAmount = 0;
        foreach ($transactions as $item) {
            $sale = [
                'order_no' => $item->order_id,
                'appointmenttitle' => $item->order->appointment->title,
                'appointment_amount' => $item->amount,
                'ratio' => $item->ratio,
                'profit_amount' => $item->doctor,
                'patient_name' => $item->patient->name,
                'created_at' => $item->created_at->format('d-m-y'),
            ];
            $totalProfitAmount += $item->doctor;
            $saleData[] = $sale;
        }

        return view('web.pages.dashboard.sale', compact('saleData', 'totalProfitAmount'));
    }
    public function purchase()
    {
        $user_id = Auth::user()->id;
        $transactions = Transaction::whereHas('order', function ($query) use ($user_id) {
            $query->where('user_id', $user_id);
        })->get();

        $purchasedData = [];

        foreach ($transactions as $transaction) {
            $sale = [
                'order_no' => $transaction->order_id,
                'type' => $transaction->order->type == 1 ? 'Appointment' : 'Product',
                'item_title' => $transaction->order->type == 1 ? $transaction->order->appointment->title : $transaction->order->product->name,
                'transaction_id' => $transaction->transaction_id,
                'seller' => $transaction->order->type == 1 ? $transaction->creator->name : 'In House',
                'amount' => $transaction->amount,
                'created_at' => $transaction->created_at->format('d-m-y h:i:a'),
            ];

            $purchasedData[] = $sale;
        }
        // dd($purchasedData);
        return view('web.pages.dashboard.purchase', compact('purchasedData'));
    }
}
