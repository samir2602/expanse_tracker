@extends('layouts.app')

@section('title', 'People - Expense Tracker')

@section('content')
    {{-- Hero --}}
    <div class="p-4 mb-4 bg-dark text-white rounded-3 text-center">
        <h1 class="fw-bold">People</h1>        
    </div>

    <div class="row">                
        <div class="col-md-12">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <p class="text-muted mb-0">{{ $people->total() }} People found &nbsp;&nbsp;&nbsp; <a href="{{ route('people.create') }}" class="btn btn-primary mb-2">Add People</a></p>
            </div>

            {{-- Order Items --}}
            <div class="card shadow-sm border-0 mb-4">
                <div class="card-header bg-white fw-bold">Order Items</div>
                <div class="card-body">
                    @foreach($people as $peo)
                        <div class="d-flex justify-content-between align-items-center mb-3 pb-3 border-bottom">
                            <div>
                                <h6 class="fw-bold mb-0">{{ $peo->name }}</h6>
                                <small class="text-muted">
                                    <a href="{{ route('people.edit', $peo->id)}}">Edit</a>
                                    <form action="{{ route('people.delete', $peo->id)}}" method="POST" onsubmit="return confirm('Are you sure you want to delete this people?')">
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
                {{ $people->links() }}
            </div>
        </div>
    </div>
@endsection