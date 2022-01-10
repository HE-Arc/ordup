<?php

namespace App\Http\Controllers;

use App\Models\BarTable;
use App\Models\Drink;
use Illuminate\Http\Request;

class DrinkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $drinks = Drink::all();
        $bartables = BarTable::all();

        return inertia('Drinks/Index', compact('drinks', 'bartables'));
    }

    /**
     * Display a listing of the resource for admin drinks.
     *
     * @return \Illuminate\Http\Response
     */
    public function admin()
    {
        // Get all drinks using pagination
        $drinks = Drink::paginate(4);

        // Set pagination path
        // This command solve problem with https on deployment
        // Without this command Laravel created links without https
        $drinks->withPath(env('APP_URL') . '/drinks/admin');

        // Get success message
        $success = session('success');

        return inertia('Drinks/Admin', compact('drinks', 'success'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return inertia('Drinks/Create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Form validation
        $request->validate([
            'name' => 'required|string',
            'price' => 'required|numeric'
        ]);

        // Create new Drink using form inputs
        Drink::create($request->all());

        return redirect()->route('drinks.admin')
            ->with('success','Drink created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $drink = Drink::where('id', $id)->firstOrFail();
        return inertia('Drinks/Edit', ['drink' => $drink]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Drink $drink)
    {
        // Form validation
        $request->validate([
            'name' => 'required|string',
            'price' => 'required|numeric'
        ]);

        // Update drink using form inputs
        $drink->update($request->all());

         return redirect()->route('drinks.admin')
            ->with('success','Drink updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $drink = Drink::find($id);
        $drink->delete();

        return redirect()->route('drinks.admin')
            ->with('success','Drink deleted successfully');
    }
}
