<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;

class ProductController extends Controller
{
    /**
     * Display a listing of the products.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();

        return view('admin.pages.product.index', compact('products'));
    }

    /**
     * Show the form for creating a new product.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.product.create');
    }

    /**
     * Store a newly created product in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'image' => 'required|image|max:2048',
        ]);

        $image = $request->file('image');
        $imageName = time() . '.' . $image->extension();

        $img = Image::make($image->path());
        $img->fit(300, 300); // resize the image to fit within 380x310 while preserving aspect ratio
        $img->encode('jpg', 80); // convert image to JPEG format with 80% quality and reduce file size to 80kb
        $img->save(base_path('/uploads/products/') . $imageName);


        $product = new Product([
            'name' => $validatedData['name'],
            'description' => $validatedData['description'],
            'price' => $validatedData['price'],
            'image' => $imageName,
        ]);

        $product->save();

        return redirect()->route('products.index')
            ->with('success', 'Product created successfully.');
    }
    public function edit(Product $product)
    {
        return view('admin.pages.product.edit', compact('product'));
    }


    public function update(Request $request, Product $product)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('image')) {
            // Process the updated image
            $image = $request->file('image');
            $imageName = time() . '.' . $image->extension();

            $img = Image::make($image->path());
            $img->fit(300, 300); // resize the image to fit within 300x300 while preserving aspect ratio
            $img->encode('jpg', 80); // convert image to JPEG format with 80% quality and reduce file size
            $img->save(public_path('uploads/products/') . $imageName); // save the image to the specified path

            // Delete the previous image file
            if ($product->image) {
                $previousImagePath = public_path('uploads/products/') . $product->image;
                if (file_exists($previousImagePath)) {
                    unlink($previousImagePath);
                }
            }

            // Update the product with the new image
            $product->image = $imageName;
        }

        // Update other fields
        $product->name = $validatedData['name'];
        $product->description = $validatedData['description'];
        $product->price = $validatedData['price'];
        $product->save();

        return redirect()->route('products.index')
            ->with('success', 'Product updated successfully.');
    }
    // Rest of the methods (edit, update, destroy) remain the same as before

    /**
     * Remove the specified resource from storage.Product
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        // delete the product's image file, if it exists

        if ($product->image && file_exists(asset('uploads/products/' . $product->image))) {
            unlink(asset('uploads/products/' . $product->image));
        }

        // delete the product from the database
        $product->delete();

        return redirect()->route('products.index')->with('success', 'Product deleted successfully.');
    }




    /**
     * Active the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function Active(Product $product)
    {

        $product->status = '1';
        if ($product->save()) {
            return redirect()->route('products.index')->with('success', 'product Activated successfully.');
        } else {
            return back()->with('error', 'product Activation Unsuccessfull');
        }
    }
    /**
     * Inactive  the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function Inactive(Product $product)

    {
        // dd($product->status);
        $product->status = '0';
        if ($product->save()) {
            return redirect()->route('products.index')->with('success', 'product Deactivated successfully.');
        } else {
            return back()->with('error', 'product Dactivation Unsuccessfull.');
        }
    }
}
