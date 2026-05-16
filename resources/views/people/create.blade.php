@extends('layouts.app')

@section('title', 'Add People - Expense Tracker')

@section('content')
    <h2 class="fw-bold mb-4">Add People</h2>

    <div class="row">
        {{-- Checkout Form --}}
        <div class="col-md-12">
            <div class="card shadow-sm border-0">                
                <div class="card-body p-4">
                    <form method="POST" action="{{ route('people.store') }}">
                        @csrf

                        @if($errors->any())
                            <div class="alert alert-danger">
                                @foreach($errors->all() as $error)
                                    <p class="mb-0">{{ $error }}</p>
                                @endforeach
                            </div>
                        @endif

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Name</label>
                            <input type="text" name="name" class="form-control" value="{{ old('name') }}" required />
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary btn-lg">Add People →</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection