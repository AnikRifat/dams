<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function search(Request $request)
    {
        $appointments = Appointment::latest()
            ->where('title', 'like', '%' . $request->appointments . '%')
            ->orWhere('description', 'like', '%' . $request->appointments . '%')
            ->get();
        $products = Product::latest()
            ->where('name', 'like', '%' . $request->appointments . '%')->orWhere('description', 'like', '%' . $request->appointments . '%')->get();
        $doctors = false;
        return view('web.pages.appointments.result', compact('appointments', 'products', 'doctors'));
    }


    public function filter(Request $request)
    {

        $speacialist = $request->input('speacialist_id');
        $duration = $request->input('duration');
        // dd($duration);
        $appointments = Appointment::query()
            ->where(function ($query) use ($speacialist, $duration) {

                if ($speacialist && $duration) {
                    $query->where('speacialist_id', $speacialist)->Where('duration', $duration);
                } else if ($speacialist) {
                    $query->where('speacialist_id', $speacialist);
                } else if ($duration) {
                    $query->orWhere('duration', $duration);
                }
            })
            ->get();

        $creators = Appointment::query()
            ->where(function ($query) use ($speacialist, $duration) {
                if ($speacialist) {
                    $query->where('speacialist_id', $speacialist);
                }
                if ($duration) {
                    $query->orWhere('duration', $duration);
                }
            })
            ->distinct('creator_id')
            ->pluck('creator_id');
        $doctors = User::whereIn('id', $creators)->get();
        // dd($doctors);
        // dd($appointments);
        $products = false;
        return view('web.pages.appointments.result', compact('appointments', 'products', 'doctors'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
