<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Expense;
use App\Models\People;

class ExpenseController extends Controller
{
    public function index()
    {
        $expense = Expense::Paginate(10);
        return view('expense.index', ['expense' => $expense]);
    }

    public function create(Request $request){
        $people = People::Get();
        return view('expense.create', ['people' => $people]);
    }

    public function store(Request $request){
        $request->validate([
            'people_id' => 'required',
            'reason' => 'required',
            'amount' => 'required',
            'expense_date' => 'required',
        ]);

        $expense = Expense::create([                       
            'people_id' => $request->people_id,
            'reason' => $request->reason,
            'amount' => $request->amount,
            'expense_date' => $request->expense_date,            
        ]);

        return redirect('/expense')->with('success', 'expense added successfully!');

    }

    public function edit(Request $request, Expense $expense){
        $people = People::Get();
        return view('expense.edit', ['expense' => $expense, 'people' => $people]);
    }

    public function update(Request $request, Expense $expense)
    {
        $request->validate([
            'people_id' => 'required',
            'reason' => 'required',
            'amount' => 'required',
            'expense_date' => 'required',
        ]);

        $expense->update([
            'people_id' => $request->people_id,
            'reason' => $request->reason,
            'amount' => $request->amount,
            'expense_date' => $request->expense_date,            
        ]);


        return redirect('/expense')->with('success', 'expense updated successfully!');
    }

    public function destroy(Expense $expense)
    {
        $expense->delete();
        return redirect('/expense')->with('success', 'expense updated successfully!');
    }
}
