<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\CART;
use App\Models\Category;
use App\Models\Duration;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Intervention\Image\ImageManagerStatic as Image;

// namespace Intervention\Image\Facades;


class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $appointments = Appointment::orderBy('id', 'DESC')->where('creator_id', Auth::user()->id)->get();
        // dd($appointments);
        return view('web.pages.appointments.index', compact('appointments'));
    }

    public function appointments()
    {

        $orders = Order::orderBy('id', 'DESC')->where('type', 1)->where('user_id', Auth::user()->id)->get();
        // dd($orders);
        // foreach ($orders as $order) {
        //     dd($order->appointment);
        // }
        // if ($order) {
        //     $appointment = $order->appointment;
        //     // Access the properties of the related appointment
        //     $appointmentName = $appointment->name;
        //     $appointmentDescription = $appointment->description;
        //     // ...
        // } else {
        //     // Handle the case when no order is found
        //     dd("No order found.");
        // }
        return view('web.pages.appointments.patient', compact('orders'));
    }
    public function appointment()
    {

        $appointments = Appointment::orderBy('id', 'DESC')->get();
        // dd($appointments);
        return view('admin.pages.appointment.index', compact('appointments'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $durations = Duration::where('status', 1)->get();
        // dd(public_path());
        return view('web.pages.appointments.create', compact('categories', 'durations'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */ public function store(Request $request)
    {
        // dd($request->all());
        $data = $request->validate([
            'title' => 'required',
            'price' => 'numeric|required',
            'description' => 'required',
            'speacialist_id' => 'required',
            'creator_id' => 'required',
            'duration' => 'required',
            'image' => 'required|image|max:2048', // max file size of 2MB
        ]);

        $image = $request->file('image');
        $imageName = time() . '.' . $image->extension();

        $img = Image::make($image->path());
        $img->fit(340, 440); // resize the image to fit within 340x440 while preserving aspect ratio
        $img->encode('jpg', 80); // convert image to JPEG format with 80% quality and reduce file size to 80kb
        $img->save(base_path('/uploads/appointments/') . $imageName);
        $data['image'] = $imageName;


        $appointment = Appointment::create($data);

        if ($appointment) {
            return redirect()->route('user.appointments.index')->with('success', 'Appointment created successfully.');
        } else {
            return back()->with('error', 'Appointment creation failed.');
        }
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */

    // Show Appointments
    public function show(Appointment $appointment)
    {
        $appointments = DB::table('appointments')
            ->join('doctor_information', 'appointments.creator_id', '=', 'doctor_information.user_id')
            ->join('users', 'doctor_information.user_id', '=', 'users.id')
            ->get();
        return view('web.pages.appointments.appointment_list', compact('appointments'));
    }

    //Add Order
    public function add(Request $request, $id)
    {
        //dd($id);
        $appointments = DB::table('appointments')
            ->join('doctor_information', 'appointments.creator_id', '=', 'doctor_information.user_id')
            ->join('users', 'doctor_information.user_id', '=', 'users.id')
            ->where('users.id', $id)
            ->first();
        //dd($appointments);
        $cart = new CART();
        $cart->name     = $appointments->name;
        $cart->user_id  = $appointments->user_id;
        $cart->appointment_id = $appointments->id;
        $cart->save();

        return redirect()->back()->with('success', 'Appointment Purchased SuccessFully');
    }

    // show order
    public function order()
    {
        $order = CART::all();

        return view('web.pages.appointments.order', compact('order'));
    }

    // search
    public function search(Request $request)
    {
        $appointment = Appointment::latest()
            ->leftjoin('speacialists', 'appointments.speacialist_id', '=', 'speacialists.id')
            ->select('speacialists.title', 'speacialists.description', 'speacialists.image', 'appointments.*')
            ->where('speacialists.title', 'like', '%' . $request->appointments . '%')
            ->Orwhere('appointments.title', 'like', '%' . $request->appointments . '%')
            ->get();

        return view('web.pages.appointments.result', compact('appointment'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function edit(Appointment $appointment)
    {
        $categories = Category::all();
        $durations = Duration::where('status', 1)->get();
        return view('web.pages.appointments.edit', compact('appointment', 'categories', 'durations'));
    }
    public function archive(Appointment $appointment)
    {
        $appointment->status = '3';

        if ($appointment->update()) {
            return back()->with('success', 'Appointment Archived Successfully');
        } else {
            return back()->with('error', 'Appointment Archive Unsuccessfull');
        }
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Appointment $appointment)
    {
        $data = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'speacialist_id' => 'required',
            'creator_id' => 'required',
            'duration' => 'required',
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->extension();

            $img = Image::make($image->path());
            $img->fit(340, 440); // resize the image to fit within 380x310 while preserving aspect ratio
            $img->encode('jpg', 80); // convert image to JPEG format with 80% quality and reduce file size to 80kb
            $img->save(base_path('/uploads/appointments/') . $imageName);

            $data['image'] = $imageName;
        }

        $appointment = $appointment->update($data);

        if ($appointment) {
            return redirect()->route('user.appointments.index')->with('success', 'Appointment Updated successfully.');
        } else {
            return back()->with('error', 'Appointment Update showing error.');
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Appointment $appointment)
    {
        // delete the appointment's image file, if it exists

        if ($appointment->image && file_exists(asset('uploads/appointments/' . $appointment->image))) {
            unlink(asset('uploads/appointments/' . $appointment->image));
        }

        // delete the appointment from the database
        $appointment->delete();

        return redirect()->route('user.appointments.index')->with('success', 'Appointment deleted successfully.');
    }



    /**
     * Active the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function Active(Appointment $appointment)
    {

        $appointment->status = '1';
        if ($appointment->save()) {
            return redirect()->route('appointments.all')->with('success', 'appointment Activated successfully.');
        } else {
            return back()->with('error', 'appointment Activation Unsuccessfull');
        }
    }
    /**
     * Inactive  the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function Inactive(Appointment $appointment)

    {
        // dd($appointment->status);
        $appointment->status = '0';
        if ($appointment->save()) {
            return redirect()->route('appointments.all')->with('success', 'appointment Deactivated successfully.');
        } else {
            return back()->with('error', 'appointment Dactivation Unsuccessfull.');
        }
    }
}
