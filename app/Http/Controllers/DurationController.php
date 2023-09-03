<?php

namespace App\Http\Controllers;

use App\Models\Duration;
use Illuminate\Http\Request;

// namespace Intervention\Image\Facades;


class DurationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $durations = Duration::orderBy('id', 'DESC')->get();
        // dd($durations);
        return view('admin.pages.duration.index', compact('durations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // dd(public_path());
        return view('admin.pages.duration.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //  dd($request->all());
        $data = $request->validate([
            'timeline' => 'required',

        ]);

        $duration = Duration::create($data);

        if ($duration) {
            return redirect()->route('durations.index')->with('success', 'Duration created successfully');
            # code...
        } else {
            return back()->with('error', 'Duration creating showing error');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Duration  $duration
     * @return \Illuminate\Http\Response
     */
    public function show(Duration $duration)
    {
        return view('admin.pages.duration.view', compact('duration'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Duration  $duration
     * @return \Illuminate\Http\Response
     */
    public function edit(Duration $duration)
    {
        return view('admin.pages.duration.edit', compact('duration'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Duration  $duration
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Duration $duration)
    {
        $data = $request->validate([
            'timeline' => 'required',
        ]);
        $duration = $duration->update($data);



        if ($duration) {
            return redirect()->route('durations.index')->with('success', 'Duration Updated successfully.');
            # code...
        } else {
            return back()->with('error', 'Duration Update showing error.');
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Duration  $duration
     * @return \Illuminate\Http\Response
     */
    public function destroy(Duration $duration)
    {
        // delete the duration's image file, if it exists


        // delete the duration from the database
        $duration->delete();

        return redirect()->route('durations.index')->with('success', 'Duration deleted successfully.');
    }



    /**
     * Active the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Duration  $duration
     * @return \Illuminate\Http\Response
     */
    public function Active(Duration $duration)
    {

        $duration->status = '1';
        if ($duration->save()) {
            return redirect()->route('durations.index')->with('success', 'duration Activated successfully.');
        } else {
            return back()->with('error', 'duration Activation Unsuccessfull');
        }
    }
    /**
     * Inactive  the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $requestservice
     * @param  \App\Models\Duration  $duration
     * @return \Illuminate\Http\Response
     */
    public function Inactive(Duration $duration)

    {
        // dd($duration->status);
        $duration->status = '0';
        if ($duration->save()) {
            return redirect()->route('durations.index')->with('success', 'duration Deactivated successfully.');
        } else {
            return back()->with('error', 'duration Dactivation Unsuccessfull.');
        }
    }
}
