<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Box;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $items = Item::all();

        return view('items.index', ['items' => $items]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('items.create', [
            'boxes' => Box::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string|max:500',
            'picture' => 'nullable|mimes:jpg,jpeg,png,gif,bmp,svg,webp',
            'price' => 'nullable|numeric',
            'box_id' => 'nullable|exists:boxes,id',
        ]);

        if ($request->hasFile('picture')) {
            $validated['picture'] = $request->file('picture')->store('public/imgs');
        }

        Item::create($validated);

        return redirect(route('items.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Item $item)
    {
        return view('items.show', [
            'item' => $item
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Item $item): View
    {
        return view('items.edit', [
            'item' => $item,
            'boxes' => Box::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Item $item)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'string|nullable|max:750',
            'picture' => 'nullable|mimes:jpg,jpeg,png,gif,bmp,svg,webp',
            'price' => 'required|numeric',
            'box_id' => 'required|exists:boxes,id'
        ]);
        if ($request->hasFile('picture')) {
            $validated['picture'] = $request->file('picture')->store('public/imgs');
        }

        Item::create($validated);

        return redirect(route('items.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Item $item)
    {
        $item->delete();
        return redirect(route('items.index'));
    }
}
