@extends('layouts.app')

@section('title', 'Expense - Expense Tracker')

@section('content')    

    <div class="row text-center">        
        <div class="col-md-12 mb-4">
            <div class="card product-card h-100 shadow-sm border-0">                
                <div class="card-body d-flex flex-column">
                    <span class="badge bg-secondary mb-2">{{ Date('M Y') }} - Total Expense</span>
                    <h6 class="card-title fw-bold">{{ $total }} Rs.</h6>                    
                </div>
            </div>
        </div>        
    </div>
    <div class="row">
        @foreach ($userby_total as $ut)
            <div class="col-md-4 mb-4">
                <div class="card product-card h-100 shadow-sm border-0">                
                    <div class="card-body d-flex flex-column">
                        <span class="badge bg-secondary mb-2">{{ Date('M Y') }} - Expense </span>
                        <h6 class="card-title fw-bold">By {{ $ut->people->name }} - {{ $ut->total_amount }} Rs.</h6>
                        <a href="{{ route('people.show', $ut->people_id)}}" class="btn btn-sm btn-outline-secondary">Show</a>                        
                    </div>
                </div>
            </div>  
        @endforeach
    </div>
@endsection