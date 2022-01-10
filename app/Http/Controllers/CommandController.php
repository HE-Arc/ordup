<?php

namespace App\Http\Controllers;

use App\Models\Command;
use App\Models\DrinkInCommand;
use Illuminate\Http\Request;

class CommandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $commands = Command::where('is_paid', '0')->orderBy('created_at')->get();
        $datas = array();

        // Iterate on each command
        foreach ($commands as $command) {
            // get info command
            $waiter = $command->user;
            $bartable = $command->bartable;
            $drinks = $command->drinks;
            $drinkInCommand = $command->drinks_in_command;

            $customDrinks = array();

            // Create array with drinks as key and quantity as value.
            for ($x = 0; $x < count($drinks); $x++) {
                $customDrinks[$drinks[$x]->name] = $drinkInCommand[$x]->quantity;
            }

            $customCommand = array(
                "id" => $command->id,
                "waiter_name" => $waiter->firstname,
                "table" => $bartable->name,
                "drinks" => $customDrinks,
                "date" => $command->created_at->format('H:i'),
                "amount" => $command->amount
            );

            // build array at every iteration
            $datas[] = $customCommand;
        }

        $success = session('success');

        return inertia('Commands/Index', compact('datas', 'success'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $dict = json_decode($request->getContent(), true);


        // Array command is not empty.
        if (count($dict) > 0) {
            $command = new Command();
            $amount = 0.0;

            // Process sum.
            foreach ($dict['dict'] as $value) {
                $amount += $value['drink']['price'] * $value['quantity'];
            }

            $command->user_id = auth()->user()->id;
            $command->is_paid = false;
            $command->bar_table_id = $dict['bartable'];
            $command->amount = $amount;

            $command->save();

            // Create relation for each drink in command.
            foreach ($dict['dict'] as $value) {
                $drinkincommand = new DrinkInCommand();
                $drinkincommand->drink_id = $value['drink']['id'];
                $drinkincommand->command_id = $command->id;
                $drinkincommand->quantity = $value['quantity'];

                $drinkincommand->save();
            }
        }

        return redirect()->route('commands.index')
            ->with('success', 'Command created successfully.');
    }

    /**
     * terminate command
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function pay($id)
    {
        $command = Command::where('id', $id)->firstOrFail();
        $command->update(['is_paid' => 1]);

        return redirect()->route('commands.index')->with('success', 'Command served');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Command $command)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
