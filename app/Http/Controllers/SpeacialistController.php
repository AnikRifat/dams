<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Speacialist;
use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;

// namespace Intervention\Image\Facades;


class SpeacialistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $categories = Category::all();
        $speacialists = Speacialist::orderBy('id', 'DESC')->get();
        // dd($speacialists);
        return view('admin.pages.speacialist.index', compact('speacialists', 'categories'));
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
        return view('admin.pages.speacialist.create', compact('categories'));
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
        $img->save(base_path('/uploads/speacialists/') . $imageName);
        $data['image'] = $imageName;
        $lastSpeacialist = Speacialist::orderByDesc('order')->first();
        if ($lastSpeacialist) {
            $data['order'] = $lastSpeacialist->order + 1;
        } else {
            $data['order'] = 1;
        }
        $speacialist = Speacialist::create($data);

        if ($speacialist) {
            return redirect()->route('speacialists.index')->with('success', 'Speacialist created successfully.');
            # code...
        } else {
            return back()->with('error', 'Speacialist creating showing error.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Speacialist  $speacialist
     * @return \Illuminate\Http\Response
     */
    public function show(Speacialist $speacialist)
    {
        return view('admin.pages.speacialist.view', compact('speacialist'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Speacialist  $speacialist
     * @return \Illuminate\Http\Response
     */
    public function edit(Speacialist $speacialist)
    {
        $categories = Category::all();
        return view('admin.pages.speacialist.edit', compact('speacialist', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Speacialist  $speacialist
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Speacialist $speacialist)
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
            $img->save(base_path('/uploads/speacialists/') . $imageName);

            $data['image'] = $imageName;
        }

        $speacialist = $speacialist->update($data);



        if ($speacialist) {
            return redirect()->route('speacialists.index')->with('success', 'Speacialist Updated successfully.');
            # code...
        } else {
            return back()->with('error', 'Speacialist Update showing error.');
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Speacialist  $speacialist
     * @return \Illuminate\Http\Response
     */
    public function destroy(Speacialist $speacialist)
    {
        // delete the speacialist's image file, if it exists

        if ($speacialist->image && file_exists(asset('uploads/speacialists/' . $speacialist->image))) {
            unlink(asset('uploads/speacialists/' . $speacialist->image));
        }

        // delete the speacialist from the database
        $speacialist->delete();

        return redirect()->route('speacialists.index')->with('success', 'Speacialist deleted successfully.');
    }



    /**
     * Active the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Speacialist  $speacialist
     * @return \Illuminate\Http\Response
     */
    public function Active(Speacialist $speacialist)
    {

        $speacialist->status = '1';
        if ($speacialist->save()) {
            return redirect()->route('speacialists.index')->with('success', 'speacialist Activated successfully.');
        } else {
            return back()->with('error', 'speacialist Activation Unsuccessfull');
        }
    }
    /**
     * Inactive  the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Speacialist  $speacialist
     * @return \Illuminate\Http\Response
     */
    public function Inactive(Speacialist $speacialist)

    {
        // dd($speacialist->status);
        $speacialist->status = '0';
        if ($speacialist->save()) {
            return redirect()->route('speacialists.index')->with('success', 'speacialist Deactivated successfully.');
        } else {
            return back()->with('error', 'speacialist Dactivation Unsuccessfull.');
        }
    }
}
