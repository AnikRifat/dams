<?php

namespace App\Http\Controllers;

use App\Models\Content;
use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;

class ContentController extends Controller
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Content  $content
     * @return \Illuminate\Http\Response
     */
    public function show(Content $content)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Content  $content
     * @return \Illuminate\Http\Response
     */
    public function about(Content $content)
    {
        dd($content);
    }

    public function editContact(Content $content)
    {
        return view('admin.pages.conent.contact', compact('content'));
    }
    public function updateContact(Request $request, Content $content)
    {
        $validatedData = $request->validate([
            'website_email' => 'required',
            'website_phone' =>  ['required', 'numeric', 'max:255'],
            'website_address' => 'required',
        ]);

        $content->website_email = $validatedData['website_email'];
        $content->website_phone = $validatedData['website_phone'];
        $content->website_address = $validatedData['website_address'];

        $content->save();

        return back()->with('success', 'About Content updated successfully.');
    }

    public function editAbout(Content $content)
    {
        return view('admin.pages.conent.about', compact('content'));
    }
    public function updateAbout(Request $request, Content $content)
    {
        $validatedData = $request->validate([
            'about_content' => 'required',
        ]);

        if ($request->hasFile('about_image')) {
            $image = $request->file('about_image');
            $imageName = time() . '.' . $image->extension();

            $img = Image::make($image->path());
            $img->fit(550, 430); // resize the image to fit within 550x3430 while preserving aspect ratio
            $img->encode('jpg', 80); // convert image to JPEG format with 80% quality and reduce file size to 80kb
            $img->save(base_path('/uploads/content/') . $imageName);

            $content->about_image = $imageName;
        }

        $content->about_content = $validatedData['about_content'];

        $content->save();

        return back()->with('success', 'About Content updated successfully.');
    }

    public function editGeneral(Content $content)
    {
        return view('admin.pages.conent.general', compact('content'));
    }
    public function updateGeneral(Request $request, Content $content)
    {
        // dd($request->all());
        $validatedData = $request->validate([
            'website_name' => 'required',
            'website_description' => 'required',
        ]);

        if ($request->hasFile('website_logo')) {
            $image = $request->file('website_logo');
            $imageName = time() . '.' . $image->extension();

            $img = Image::make($image->path());
            $img->fit(225, 72); // resize the image to fit 225n 72 while preserving aspect ratio
            $img->encode('jpg', 80); // convert image to JPEG format with 80% quality and reduce file size to 80kb
            $img->save(base_path('/uploads/content/') . $imageName);

            $content->website_logo = $imageName;
        }

        if ($request->hasFile('website_favicon')) {
            $image = $request->file('website_favicon');
            $imageName = time() . '.' . $image->extension();

            $img = Image::make($image->path());
            $img->fit(225, 72); // resize the image to fit within 550x3430 while preserving aspect ratio
            $img->encode('jpg', 80); // convert image to JPEG format with 80% quality and reduce file size to 80kb
            $img->save(base_path('/uploads/content/') . $imageName);

            $content->website_favicon = $imageName;
        }

        $content->website_name = $validatedData['website_name'];
        $content->website_description = $validatedData['website_description'];

        $content->save();

        return back()->with('success', 'Website General Content updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Content  $content
     * @return \Illuminate\Http\Response
     */
    public function destroy(Content $content)
    {
        //
    }
}
