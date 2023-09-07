<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Chat;
use App\Models\Order;
use App\Models\Patient;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\ImageManagerStatic as Image;

class PatientController extends Controller
{
    public function inbox()
    {

        $orders = Order::where('type', 1)->where('user_id', Auth::user()->id)->distinct()->get();
        $appointment = false;
        return view('web.pages.chat.patient', compact('orders', 'appointment'));
    }
    public function chat($orderid)
    {
        $order = Order::find($orderid);
        $chats = Chat::Where('order_id', $orderid)->get();
        $orders = Order::where('type', 1)->where('user_id', Auth::user()->id)->get();
        $appointment = Appointment::find($order->item_id);
        // dd($order);
        return view('web.pages.chat.patient', compact('orders', 'chats', 'appointment'));
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $patients = Patient::all();
        return view('patients.index', compact('patients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('patients.create');
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
            'image' => 'required',
            'file' => 'required',
            'address' => 'required',
            'birthday' => 'required',
            'current_department' => 'required',
            'current_class' => 'required',
            'current_school' => 'required',
        ]);
        // dd($data);

        $image = $request->file('image');
        $imageName = time() . '.' . $image->extension();

        $img = Image::make($image->path());
        $img->fit(200, 200);
        $img->encode('jpg', 80);
        $img->save(base_path('/uploads/patients/') . $imageName);
        $data['image'] = $imageName;



        $file = $request->file('file');
        $fileName = time() . '_file.' . $file->getClientOriginalExtension();
        $file->move(public_path('uploads/patients/'), $fileName);
        $data['file'] = $fileName;

        $data['user_id'] = Auth::user()->id;

        $userData['complete'] = 1;
        $user = User::find(Auth::user()->id);
        $updateUser = $user->update($userData);
        $patient = Patient::create($data);

        if ($patient && $updateUser) {
            // dd('success');
            return redirect()->route('index')->with('success', 'Patient profile completed successfully, Plz Wait for confirmation');
        } else {

            return back()->with('error', 'Patient creating showing error.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function show(Patient $patient)
    {
        return view('patients.show', compact('patient'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function edit(Patient $patient)
    {
        return view('patients.edit', compact('patient'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Patient $patient)
    {
        $data = $request->validate([
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'address' => 'required',
            'birthday' => 'required',
            'current_department' => 'required',
            'current_class' => 'required',
            'current_school' => 'required',
        ]);
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->extension();

            $img = Image::make($image->path());
            $img->fit(200, 200);
            $img->encode('jpg', 80);
            $img->save(base_path('/uploads/patients/') . $imageName);
            $data['image'] = $imageName;
        }

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $fileName = time() . '_file.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/patients/'), $fileName);
            $data['file'] = $fileName;
        }

        $patient = $patient->update($data);

        if ($patient) {
            return redirect()->route('patients.index')->with('success', 'Patient updated successfully.');
        } else {
            return back()->with('error', 'Patient update showing error.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function destroy(Patient $patient)
    {
        $patient->delete();

        return redirect()->route('patients.index')->with('success', 'Patient deleted successfully.');
    }
}
