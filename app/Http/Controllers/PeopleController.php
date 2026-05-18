<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\People;
use App\Models\Expense;
use Illuminate\Support\Str;
use Carbon\Carbon;

class PeopleController extends Controller
{
    public function index()
    {
        $people = People::Paginate(10);
        return view('people.index', ['people' => $people]);
    }

    public function create(Request $request){
        return view('people.create');
    }

    public function show(Request $request, People $people){
        $date = $request->filled('month') ? Carbon::createFromFormat('Y-m', $request->month) : Carbon::now();
        $expense = Expense::whereMonth('expense_date', $date->month)->whereYear('expense_date', $date->year)->where('people_id', $people->id)->get();
        $totalAmount = $expense->sum('amount');
        return view('people.show', ['people' => $people, 'expense' => $expense, 'totalAmount' => $totalAmount]);
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required|min:3',            
        ]);

        $order = People::create([                       
            'name' => $request->name,
            'slug' => Str::slug($request->name),
        ]);

        return redirect('/people')->with('success', 'People added successfully!');

    }

    public function edit(Request $request, People $people){
        return view('people.edit', ['people' => $people]);
    }

    public function update(Request $request, People $people)
    {
        $request->validate([
            'name' => 'required|min:3',            
        ]);

        $people->update([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
        ]);

        return redirect('/people')->with('success', 'People updated successfully!');
    }

    public function destroy(People $people)
    {
        $people->delete();
        return redirect('/people')->with('success', 'People updated successfully!');
    }
}
