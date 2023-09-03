<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\Appointment;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $attendances = Attendance::orderBy('id', 'DESC')->get();
        // dd($attendances);
        return view('admin.pages.attandance.index', compact('attendances'));
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
            'appointment_id' => 'required',
            'duration' => 'required',
        ]);
        $user = Auth::user();
        $data['user_id'] = $user->id;
        $data['user_type'] = $user->role;
        $data['date'] = Carbon::now()->today()->toDateString();
        //

        $existingAttendance = Attendance::where('appointment_id', $data['appointment_id'])
            ->where('date',  $data['date'])
            ->where('user_type', $user->role)
            ->get();



        if ($existingAttendance->count() > 0) {
            return redirect()->back()->with('error', 'Attendace Already taken');
        } else {
            $appointment = Appointment::find($data['appointment_id']);

            //dd($appointment);

            if ($appointment->duration == $data['duration']) {

                $data['status'] = 1;
                // dd($data);
                $result = Attendance::create($data);
                if ($result) {
                    return redirect()->back()->with('success', 'Attendace acceped successfully');
                } else {
                    return redirect()->back()->with('error', 'Attendace Unsuccessfull');
                }
            } else {
                return redirect()->back()->with('error', 'Wrong Attendace');
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Attendance  $attendance
     * @return \Illuminate\Http\Response
     */
    public function show(Attendance $attendance)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Attendance  $attendance
     * @return \Illuminate\Http\Response
     */
    public function edit(Attendance $attendance)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Attendance  $attendance
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Attendance $attendance)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Attendance  $attendance
     * @return \Illuminate\Http\Response
     */    public function destroy(Attendance $attendance)
    {
        // delete the attendance's image file, if it exists

        // delete the attendance from the database
        $attendance->delete();

        return redirect()
            ->route('attendances.index')
            ->with('success', 'Attendance deleted successfully.');
    }

    /**
     * Active the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Attendance  $attendance
     * @return \Illuminate\Http\Response
     */
    public function Active(Attendance $attendance)
    {
        $attendance->status = '1';
        if ($attendance->save()) {
            return redirect()
                ->route('attendances.index')
                ->with('success', 'attendance Activated successfully.');
        } else {
            return back()->with('error', 'attendance Activation Unsuccessfull');
        }
    }
    /**
     * Inactive  the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Attendance  $attendance
     * @return \Illuminate\Http\Response
     */
    public function Inactive(Attendance $attendance)
    {
        // dd($attendance->status);
        $attendance->status = '0';
        if ($attendance->save()) {
            return redirect()
                ->route('attendances.index')
                ->with('success', 'attendance Deactivated successfully.');
        } else {
            return back()->with('error', 'attendance Dactivation Unsuccessfull.');
        }
    }
}
