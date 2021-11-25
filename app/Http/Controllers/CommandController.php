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
        $commands = Command::where('is_paid', '0')->get();
        $data = array();

        foreach($commands as $key => $command)
        {
            $waiter = $command->user;
            $bartable = $command->bartable;
            $drinks = $commands->drinks;
            $drink_in_command = $commands->drinks_in_command;

            $customCommand = array(
                "waiter_name" => $waiter->name,
            );
        }

        return inertia('Commands/Index', compact('commands'));
    }

    /**
     * Create command
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $dict = json_decode($request->getContent(), true);

        if(count($dict) > 0)
        {
            $command = new Command();
            $amount = 0.0;

            foreach($dict['dict'] as $key => $value)
            {
                $amount += $value['drink']['price'] * $value['quantity'];
            }

            $command->user_id = auth()->user()->id;
            $command->is_paid = false;
            $command->bar_table_id = $dict['bartable'];
            $command->amount = $amount;

            $command->save();

            foreach($dict['dict'] as $key => $value)
            {
                $drinkincommand = new DrinkInCommand();
                $drinkincommand->drink_id = $value['drink']['id'];
                $drinkincommand->command_id = $command->id;
                $drinkincommand->quantity = $value['quantity'];

                $drinkincommand->save();
            }
        }

        return redirect()->route('drinks.index')
            ->with('success','Command created successfully.');
    }
}
