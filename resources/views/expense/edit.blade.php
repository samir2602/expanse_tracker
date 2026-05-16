@extends('layouts.app')

@section('title', 'Add People - Expense Tracker')

@section('content')
    <h2 class="fw-bold mb-4">Add People</h2>

    <div class="row">
        {{-- Checkout Form --}}
        <div class="col-md-12">
            <div class="card shadow-sm border-0">                
                <div class="card-body p-4">
                    <form method="POST" action="{{ route('expense.update', $expense->id) }}">
                        @csrf
                        @method('PUT')

                        @if($errors->any())
                            <div class="alert alert-danger">
                                @foreach($errors->all() as $error)
                                    <p class="mb-0">{{ $error }}</p>
                                @endforeach
                            </div>
                        @endif
                        
                        <div class="mb-3">
                            <label class="form-label fw-semibold">People</label>
                            <select class="form-select" aria-label="Default select example" name="people_id">
                                @foreach ($people as $peo)
                                <option value="{{ $peo->id }}" {{ ($peo->id == $expense->people_id) ? 'selected' : ''}}>{{ $peo->name }}</option>                                    
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Expense Date</label>
                            <input type="date" name="expense_date" class="form-control" value="{{ $expense->expense_date }}" />
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Amount</label>
                            <input type="number" name="amount" class="form-control" value="{{ old('amount', $expense->amount) }}" />
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Reason</label>
                            <input type="text" name="reason" class="form-control" value="{{ old('reason', $expense->reason) }}"  />
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary btn-lg">Update Expense →</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection