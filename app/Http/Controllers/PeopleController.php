<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\People;
use Illuminate\Support\Str;


class PeopleController extends Controller
{
    public function index()
    {
        $people = People::Paginate(10);
        return view('people.index', ['people' => $people]);
    }

    public function create(Request $request){
        return view('people.create');
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required|min:3',            
        ]);

        $order = People::create([                       
            'name' => $request->name,
            'slug' => Str::slug($request->name),
        ]);

        return redirect('/people')->with('success', 'People added successfully!');

    }

    public function edit(Request $request, People $people){
        return view('people.edit', ['people' => $people]);
    }

    public function update(Request $request, People $people)
    {
        $request->validate([
            'name' => 'required|min:3',            
        ]);

        $people->update([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
        ]);

        return redirect('/people')->with('success', 'People updated successfully!');
    }

    public function destroy(People $people)
    {
        $people->delete();
        return redirect('/people')->with('success', 'People updated successfully!');
    }
}
