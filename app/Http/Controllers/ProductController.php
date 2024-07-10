<?php

namespace App\Http\Controllers;


use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();
        return view('products.home', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|regex:/^\d+(\.\d{1,2})?$/',
            'screen_size' => 'required|integer',
            'resolution' => 'required|integer',
            'power_consumption' => 'required|integer',
            'warranty' => 'required|integer',
        ]);

        $data = Product::create($validatedData);
        if ($data) {
            session()->flash('success', 'Nilai Alternatif Berhasil Ditambahkan');
            return redirect(route('/products'));
        } else {
            session()->flash('error', 'Nilai Alternatif Berhasil Ditambahkan');
            return redirect(route('products/create'));
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $products = Product::findOrFail($id);
        return view('products.update', compact('products'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $products = Product::findOrFail($id);
        $name = $request->name;
        $price = $request->price;
        $screen_size = $request->screen_size;
        $resolution = $request->resolution;
        $power_consumption = $request->power_consumption;
        $warranty = $request->warranty;

        $products->name = $name;
        $products->price = $price;
        $products->screen_size = $screen_size;
        $products->resolution = $resolution;
        $products->power_consumption = $power_consumption;
        $products->warranty = $warranty;
        $data = $products->save();
        if ($data) {
            session()->flash('success', 'Nilai Alternatif Berhasil Diedit');
            return redirect(route('/products'));
        } else {
            session()->flash('error', 'Nilai Alternatif Gagal Diedit');
            return redirect(route('products/update'));
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(string $id)
    {
        $products = Product::findOrFail($id)->delete();
        if ($products) {
            session()->flash('success', 'Nilai Alternatif Berhasil Dihapus');
            return redirect(route('/products'));
        } else {
            session()->flash('error', 'Nilai Alternatif Berhasil Dihapus');
            return redirect(route('/products'));
        }
    }
}
