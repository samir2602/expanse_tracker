<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Expense;
use Carbon\Carbon;


class DashboardController extends Controller
{
    public function dashboard(){        
        $total = Expense::whereMonth('expense_date', Carbon::now()->month)->whereYear('expense_date', Carbon::now()->year)->sum('amount');
        $userby_total = Expense::whereMonth('expense_date', Carbon::now()->month)->whereYear('expense_date', Carbon::now()->year)->selectRaw('people_id, SUM(amount) as total_amount')->groupBy('people_id')->get();        
        return view('dashboard', ['total' => $total, 'userby_total' => $userby_total]);
    }
}
