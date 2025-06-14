<?php

namespace App\Http\Controllers;

use App\Models\Example;
use Illuminate\Http\Request;

class ExampleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $examples = Example::all();
        return view('examples.index', compact('examples'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
                'name' => 'string'
            ]);

        $checkin = Example::create([
                'name' => $validated['name'],
            ]);

        if ($request->wantsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'successful creation!',
                'checkin' => $checkin
            ]);
        }

        return redirect('/examples')
                ->with('success', 'successful creation!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Example $example)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Example $example)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Example $example)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Example $example)
    {
        $example->delete();
        return redirect('/examples')->with('success', 'Example deleted successfully.');
    }

    /**
     * Toggle the completion status of an example.
     */
    public function toggleComplete(Example $example)
    {
        $example->isComplete = !$example->isComplete;
        $example->save();

        if (request()->wantsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Example completion status updated successfully',
                'example' => $example
            ]);
        }

        return redirect('/examples')->with('success', 'Example completion status updated successfully');
    }
}
