<?php

namespace App\Http\Controllers;

use Intervention\Image\ImageManagerStatic as Image;
use App\Models\Service;
use Illuminate\Http\Request;

// namespace Intervention\Image\Facades;


class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $services = Service::orderBy('id', 'DESC')->get();
        // dd($services);
        return view('admin.pages.service.index', compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // dd(public_path());
        return view('admin.pages.service.create');
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
            'image' => 'required|image|max:2048', // max file size of 2MB
        ]);
        $image = $request->file('image');
        $imageName = time() . '.' . $image->extension();

        $img = Image::make($image->path());
        $img->fit(1680, 880); // resize the image to fit within 380x310 while preserving aspect ratio
        $img->encode('jpg', 80); // convert image to JPEG format with 80% quality and reduce file size to 80kb
        $img->save(base_path('/uploads/services/') . $imageName);
        $data['image'] = $imageName;
        $lastService = Service::orderByDesc('order')->first();
        if ($lastService) {
            $data['order'] = $lastService->order + 1;
        } else {
            $data['order'] = 1;
        }
        $service = Service::create($data);

        if ($service) {
            return redirect()->route('services.index')->with('success', 'Service created successfully.');
            # code...
        } else {
            return back()->with('error', 'Service creating showing error.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function show(Service $service)
    {
        return view('admin.pages.service.view', compact('service'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function edit(Service $service)
    {
        return view('admin.pages.service.edit', compact('service'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Service $service)
    {
        $data = $request->validate([
            'title' => 'required',
            'order' => 'required',
            'description' => 'required',

        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->extension();

            $img = Image::make($image->path());
            $img->fit(1680, 880); // resize the image to fit within 380x310 while preserving aspect ratio
            $img->encode('jpg', 80); // convert image to JPEG format with 80% quality and reduce file size to 80kb
            $img->save(base_path('/uploads/services/') . $imageName);

            $data['image'] = $imageName;
        }

        $service = $service->update($data);



        if ($service) {
            return redirect()->route('services.index')->with('success', 'Service Updated successfully.');
            # code...
        } else {
            return back()->with('error', 'Service Update showing error.');
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function destroy(Service $service)
    {
        // delete the service's image file, if it exists

        if ($service->image && file_exists(asset('uploads/services/' . $service->image))) {
            unlink(asset('uploads/services/' . $service->image));
        }

        // delete the service from the database
        $service->delete();

        return redirect()->route('services.index')->with('success', 'Service deleted successfully.');
    }



    /**
     * Active the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function Active(Service $service)
    {

        $service->status = '1';
        if ($service->save()) {
            return redirect()->route('services.index')->with('success', 'service Activated successfully.');
        } else {
            return back()->with('error', 'service Activation Unsuccessfull');
        }
    }
    /**
     * Inactive  the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function Inactive(Service $service)

    {
        // dd($service->status);
        $service->status = '0';
        if ($service->save()) {
            return redirect()->route('services.index')->with('success', 'service Deactivated successfully.');
        } else {
            return back()->with('error', 'service Dactivation Unsuccessfull.');
        }
    }
}
