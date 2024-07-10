<?php

namespace App\Http\Controllers;

use App\Models\Criteria;
use Illuminate\Http\Request;

class CriteriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $criterias = Criteria::all();
        return view('criterias.home', compact('criterias'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('criterias.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|string|max:255',
        ]);

        $data = Criteria::create($validatedData);
        if ($data) {
            session()->flash('success', 'Kriteria Berhasil Ditambahkan');
            return redirect(route('/criterias'));
        } else {
            session()->flash('error', 'Kriteria Berhasil Diedit');
            return redirect(route('criterias/create'));
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
        $criterias = Criteria::findOrFail($id);
        return view('criterias.update', compact('criterias'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $criterias = Criteria::findOrFail($id);
        $name = $request->name;
        $type = $request->type;

        $criterias->name = $name;
        $criterias->type = $type;
        $data = $criterias->save();
        if ($data) {
            session()->flash('success', 'Kriteria Berhasil Diedit');
            return redirect(route('/criterias'));
        } else {
            session()->flash('error', 'Kriteria Gagal Diedit');
            return redirect(route('/criterias/update'));
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(string $id)
    {
        $criterias = Criteria::findOrFail($id)->delete();
        if ($criterias) {
            session()->flash('success', 'Kriteria Berhasil Dihapus');
            return redirect(route('/criterias'));
        } else {
            session()->flash('error', 'Kriteria Gagal Dihapus');
            return redirect(route('/criterias'));
        }
    }
}
