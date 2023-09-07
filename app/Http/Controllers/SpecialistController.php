<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Specialist;
use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;

// namespace Intervention\Image\Facades;


class SpecialistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $categories = Category::all();
        $specialists = Specialist::orderBy('id', 'DESC')->get();
        // dd($specialists);
        return view('admin.pages.specialist.index', compact('specialists', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        // dd(public_path());
        return view('admin.pages.specialist.create', compact('categories'));
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
            'title' => 'required',
            'description' => 'required',
            'category_id' => 'required',
            'image' => 'required|image|max:2048', // max file size of 2MB
        ]);
        $image = $request->file('image');
        $imageName = time() . '.' . $image->extension();

        $img = Image::make($image->path());
        $img->fit(340, 440); // resize the image to fit within 380x310 while preserving aspect ratio
        $img->encode('jpg', 80); // convert image to JPEG format with 80% quality and reduce file size to 80kb
        $img->save(base_path('/uploads/specialists/') . $imageName);
        $data['image'] = $imageName;
        $lastSpecialist = Specialist::orderByDesc('order')->first();
        if ($lastSpecialist) {
            $data['order'] = $lastSpecialist->order + 1;
        } else {
            $data['order'] = 1;
        }
        $specialist = Specialist::create($data);

        if ($specialist) {
            return redirect()->route('specialists.index')->with('success', 'Specialist created successfully.');
            # code...
        } else {
            return back()->with('error', 'Specialist creating showing error.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Specialist  $specialist
     * @return \Illuminate\Http\Response
     */
    public function show(Specialist $specialist)
    {
        return view('admin.pages.specialist.view', compact('specialist'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Specialist  $specialist
     * @return \Illuminate\Http\Response
     */
    public function edit(Specialist $specialist)
    {
        $categories = Category::all();
        return view('admin.pages.specialist.edit', compact('specialist', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Specialist  $specialist
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Specialist $specialist)
    {
        $data = $request->validate([
            'title' => 'required',
            'order' => 'required',
            'category_id' => 'required',
            'description' => 'required',

        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->extension();

            $img = Image::make($image->path());
            $img->fit(340, 440); // resize the image to fit within 380x310 while preserving aspect ratio
            $img->encode('jpg', 80); // convert image to JPEG format with 80% quality and reduce file size to 80kb
            $img->save(base_path('/uploads/specialists/') . $imageName);

            $data['image'] = $imageName;
        }

        $specialist = $specialist->update($data);



        if ($specialist) {
            return redirect()->route('specialists.index')->with('success', 'Specialist Updated successfully.');
            # code...
        } else {
            return back()->with('error', 'Specialist Update showing error.');
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Specialist  $specialist
     * @return \Illuminate\Http\Response
     */
    public function destroy(Specialist $specialist)
    {
        // delete the specialist's image file, if it exists

        if ($specialist->image && file_exists(asset('uploads/specialists/' . $specialist->image))) {
            unlink(asset('uploads/specialists/' . $specialist->image));
        }

        // delete the specialist from the database
        $specialist->delete();

        return redirect()->route('specialists.index')->with('success', 'Specialist deleted successfully.');
    }



    /**
     * Active the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Specialist  $specialist
     * @return \Illuminate\Http\Response
     */
    public function Active(Specialist $specialist)
    {

        $specialist->status = '1';
        if ($specialist->save()) {
            return redirect()->route('specialists.index')->with('success', 'specialist Activated successfully.');
        } else {
            return back()->with('error', 'specialist Activation Unsuccessfull');
        }
    }
    /**
     * Inactive  the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Specialist  $specialist
     * @return \Illuminate\Http\Response
     */
    public function Inactive(Specialist $specialist)

    {
        // dd($specialist->status);
        $specialist->status = '0';
        if ($specialist->save()) {
            return redirect()->route('specialists.index')->with('success', 'specialist Deactivated successfully.');
        } else {
            return back()->with('error', 'specialist Dactivation Unsuccessfull.');
        }
    }
}
