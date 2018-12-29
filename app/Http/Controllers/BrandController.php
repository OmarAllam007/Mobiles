<?php

namespace App\Http\Controllers;

use App\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BrandController extends Controller
{
    function index()
    {
        $brands = Brand::all();
        return view('brands.index', compact('brands'));
    }

    function create()
    {
        return view('brands.create');
    }

    function store(Request $request)
    {
        $data = [];

        if ($request->hasFile('image_path')) {
            $attachment = Brand::uploadImage($request->image_path);
            $data['image_path'] = $attachment->path;
        }

        $data['name'] = $request->name;
        Brand::create($data);

        return redirect()->route('brand.index');
    }

    function edit(Brand $brand)
    {
        return view('brands.edit', compact('brand'));
    }

    function update(Brand $brand, Request $request)
    {
        $data = [];

        if ($request->hasFile('image_path')) {

            Storage::disk('public')->delete($brand->image_path);

            $attachment = Brand::uploadImage($request->image_path);
            $data['image_path'] = $attachment->path;
        }

        $data['name'] = $request->name;
        $brand->update($data);

        return redirect()->route('brand.index');
    }

    function destroy(Brand $brand)
    {
        $brand->delete();
        return redirect()->route('brand.index');
    }
}
