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
                            @forelse($people as $peo)
                                <tr>
                                    <td>{{ $peo->name }}</td>
                                    <td>
                                        <small class="text-muted">                                            
                                            <a href="{{ route('people.edit', $peo->id)}}" class="btn btn-sm btn-outline-secondary">Edit</a>
                                            <form method="POST" action="{{ route('people.delete', $peo->id)}}" class="d-inline" onsubmit="return confirm('Delete this entry?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
                                            </form>
                                        </small>    
                                    </td>                                    
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="text-center text-muted">No products found</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="mt-3">
                {{ $people->links() }}
            </div>
        </div>
    </div>
@endsection