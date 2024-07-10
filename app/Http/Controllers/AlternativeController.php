<?php

namespace App\Http\Controllers;

use App\Models\Alternative;
use Illuminate\Http\Request;

class AlternativeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $alternatives = Alternative::all();
        return view('alternatives.home', compact('alternatives'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('alternatives.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'label' => 'required|string|max:255',
        ]);

        $data = Alternative::create($validatedData);
        if ($data) {
            session()->flash('success', 'Alternatif Berhasil Ditambahkan');
            return redirect(route('/alternatives'));
        } else {
            session()->flash('error', 'Alternatif Gagal Ditambahkan');
            return redirect(route('alternatives/create'));
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
        $alternatives = Alternative::findOrFail($id);
        return view('alternatives.update', compact('alternatives'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $alternatives = Alternative::findOrFail($id);
        $name = $request->name;
        $label = $request->label;

        $alternatives->name = $name;
        $alternatives->label = $label;
        $data = $alternatives->save();
        if ($data) {
            session()->flash('success', 'Alternatif Berhasil Diedit');
            return redirect(route('/alternatives'));
        } else {
            session()->flash('error', 'Alternatif Gagal Diedit');
            return redirect(route('/alternatives/update'));
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(string $id)
    {
        $alternatives = Alternative::findOrFail($id)->delete();
        if ($alternatives) {
            session()->flash('success', 'Alternatif Berhasil Dihapus');
            return redirect(route('/alternatives'));
        } else {
            session()->flash('error', 'Alternatif Gagal Dihapus');
            return redirect(route('/alternatives'));
        }
    }
}
