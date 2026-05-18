@extends('layouts.app')

@section('title', 'Expense - Expense Tracker')

@section('content')
    {{-- Hero --}}
    <div class="p-4 mb-4 bg-dark text-white rounded-3 text-center">
        <h1 class="fw-bold">Expense</h1>        
    </div>

    <div class="row">                
        <div class="col-md-12">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <a href="{{ route('expense.create') }}" class="btn btn-primary mb-2">Add Expense</a>
            </div>

            <div class="card shadow-sm border-0">
                <div class="card-body">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                           @foreach($expense as $exp)
                                <tr>
                                    <td>{{ $exp->people->name .' || '. $exp->reason .' || '. $exp->amount}} Rs.</td>
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
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="mt-3">
                {{ $expense->links() }}
            </div>
        </div>
    </div>
@endsection