<?php

namespace App\Http\Controllers;

use App\Models\Box;
use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\View\View;


class BoxController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('boxes.index', [
            'boxes' => Box::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'label' => 'string|max:255',
            'location' => 'string|max:255',
        ]);

        Box::create($validated);
        return redirect()->route('box.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(Box $box)
    {
        return view('boxes.show', [
            'box' => $box
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Box $box): View
    {
        return view('boxes.edit', [
            'box' => $box,
            'items' => Item::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Box $box)
    {
        $validated = $request->validate([
            'label' => 'string|max:255',
            'location' => 'string|max:255',
        ]);

        $box->update($validated);
        return redirect()->route('box.show', $box);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Box $box)
    {
        $box->delete();
        return redirect()->route('box.index');
    }
}
