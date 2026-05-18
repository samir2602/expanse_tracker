@extends('layouts.app')

@section('title', 'Expense - Expense Tracker')

@section('content')
    @if(count($expense) == 0)    
        {{-- Hero --}}
        <div class="p-4 mb-4 bg-dark text-white rounded-3 text-center">
            <h1 class="fw-bold">No Record Found</h1>
        </div>    
    @else
        {{-- Hero --}}
        <div class="p-4 mb-4 bg-dark text-white rounded-3 text-center">
            <h1 class="fw-bold">Expense of {{ $expense[0]->people->name }}</h1>        
        </div>
        
        <div class="row">                
            <div class="col-md-12">
                <div class="mb-3">
                    <a href="/" class="btn btn-sm btn-outline-secondary">Back</a>
                </div>
                <div class="mb-3">
                    <label class="form-label fw-semibold">Expense Month</label>                
                    <form action="{{ route('people.show', $expense[0]->people_id)}} " method="GET">
                        <input type="month" class="form-control" id="month" name="month" value="{{ (isset($_GET['month'])) ? $_GET['month'] : date('Y-m') }}" onchange="this.form.submit()">                        
                    </form>
                </div>

                <div class="card shadow-sm border-0">
                    <div class="card-body">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Reason</th>
                                    <th>Amount</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($expense as $exp)
                                <tr>
                                    <td>{{ $exp->reason }}</td>
                                    <td>{{ $exp->amount }} Rs.</td>
                                    <td>                                        
                                        
                                        <a href="{{ route('expense.edit', $exp->id)}}" class="btn btn-sm btn-outline-secondary">Edit</a>
                                        <form method="POST" action="{{ route('expense.delete', $exp->id)}}" class="d-inline" onsubmit="return confirm('Delete this entry?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
                                        </form>
                                    </td>                                    
                                </tr>
                            @endforeach
                            <tr>
                                <th>Total</th>
                                <th>{{ $totalAmount }} Rs.</th>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>            
            </div>
        </div>
    @endif
@endsection