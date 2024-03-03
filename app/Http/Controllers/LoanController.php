<?php

namespace App\Http\Controllers;

use App\Models\Loan;
use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\User;
use Illuminate\View\View;

class LoanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
{
    $loans = Loan::all(); 

    return view('loans.index', [
        'items' => Item::all(),
        'users' => User::all(),
        'loans' => $loans, 
    ]);
}

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $selectedItem = request()->input('item_id');

        return view('loans.create', [
            'items' => Item::all(),
            'users' => User::all(),
            'selectedItem' => $selectedItem,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'item_id' => 'required|exists:items,id',
            'due_date' => 'required|date',
        ]);

        $validated['user_id'] = auth()->user()->id;
        $validated['checkout_date'] = now();

        Loan::create($validated);

        return redirect()->route('loans.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Loan $loan): View
    {
        return view('loans.show', [
            'loan' => $loan,
            'item' => $loan->item,
            'user' => $loan->user,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Loan $loan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Loan $loan)
    {
        $loan->update(['returned_date' => now()]);
           
        return redirect(route('loans.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Loan $loan)
    {
        //
    }
    public function return(Loan $loan)
{
    $loan->is_returned = true;
    $loan->save();

    return redirect()->route('loans.index');
}
}