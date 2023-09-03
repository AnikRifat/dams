<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Chat;
use App\Models\Doctor;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\ImageManagerStatic as Image;

class DoctorController extends Controller
{

    public function inbox()
    {

        $patientIds = Chat::Where('sender_id', Auth::user()->id)->where('sender_role', Auth::user()->role)
            ->pluck('sender_id')
            ->unique()
            ->toArray();
        $users = User::whereIn('id', $patientIds)->get();
        $doctorAppointments = Appointment::where('creator_id', Auth::user()->id)->where('status', 1)->get();
        // dd($doctorAppointments);
        $patient = false;
        $chats = false;
        $appointment = false;
        return view('web.pages.chat.doctor', compact('appointment', 'patient', 'users', 'doctorAppointments', 'chats'));
    }
    public function chat($appointmentId)
    {
        // dd($appointmentId);
        $chats = Chat::Where('appointment_id', $appointmentId)->get();

        $appointment = Appointment::find($appointmentId);
        // dd($appointment);

        $doctorAppointments = Appointment::where('creator_id', Auth::user()->id)->where('status', 1)->get();

        // dd($chats);
        return view('web.pages.chat.doctor', compact('chats', 'doctorAppointments', 'appointment'));
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $doctors = Doctor::all();
        return view('doctors.index', compact('doctors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('doctors.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $data = $request->validate([
            'image' => 'required',
            'file' => 'required',
            'address' => 'required',
            'birthday' => 'required',
            'profession' => 'required',
            'speacialist' => 'required',
        ]);
        // dd($data);
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->extension();

            $img = Image::make($image->path());
            $img->fit(200, 200);
            $img->encode('jpg', 80);
            $img->save(base_path('/uploads/doctors/') . $imageName);
            $data['image'] = $imageName;
        }

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $fileName = time() . '_file.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/doctors/'), $fileName);
            $data['file'] = $fileName;
        }
        $data['user_id'] = Auth::user()->id;

        $userData['complete'] = 1;
        $user = User::find(Auth::user()->id);
        $updateUser = $user->update($userData);
        $doctor = Doctor::create($data);

        if ($doctor && $updateUser) {
            // dd('success');
            return redirect()->route('index')->with('success', 'Doctor profile completed successfully, Plz Wait for confirmation');
        } else {

            return back()->with('error', 'Doctor creating showing error.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function show(Doctor $doctor)
    {
        return view('doctors.show', compact('doctor'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function edit(Doctor $doctor)
    {
        return view('doctors.edit', compact('doctor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Doctor $doctor)
    {
        $data = $request->validate([
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'address' => 'required', 'birthday' => 'required',
            'current_department' => 'required',
            'profession' => 'required',
            'speacialist' => 'required',
        ]);
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->extension();

            $img = Image::make($image->path());
            $img->fit(200, 200);
            $img->encode('jpg', 80);
            $img->save(base_path('/uploads/doctors/') . $imageName);
            $data['image'] = $imageName;
        }

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $fileName = time() . '_file.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/doctors/'), $fileName);
            $data['file'] = $fileName;
        }

        $doctor = $doctor->update($data);

        if ($doctor) {
            return redirect()->route('doctors.index')->with('success', 'Doctor updated successfully.');
        } else {
            return back()->with('error', 'Doctor update showing error.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Doctor $doctor)
    {
        $doctor->delete();

        return redirect()->route('doctors.index')->with('success', 'Doctor deleted successfully.');
    }
}
