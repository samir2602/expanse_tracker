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
            {{-- Order Items --}}
            <div class="card shadow-sm border-0 mb-4">
                <div class="card-header bg-white fw-bold">Expense Items</div>
                <div class="card-body">
                    @foreach($expense as $exp)
                        <div class="d-flex justify-content-between align-items-center mb-3 pb-3 border-bottom">
                            <div>
                                <h6 class="fw-bold mb-0">{{ $exp->people->name .' || '. $exp->reason .' || '. $exp->amount}} Rs.</h6>
                                <small class="text-muted">
                                    <a href="{{ route('expense.edit', $exp->id)}}">Edit</a>
                                    <form action="{{ route('expense.delete', $exp->id)}}" method="POST" onsubmit="return confirm('Are you sure you want to delete this expense?')">
                                        @csrf
                                        @method('delete')
                                        <button type="submit">Delete</button>
                                    </form>
                                </small>
                            </div>                            
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="mt-3">
                {{ $expense->links() }}
            </div>
        </div>
    </div>
@endsection