<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Http\Response;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Get all users using pagination
        $users = User::paginate(4);

        // Set pagination path
        // This command solve problem with https on deployment
        // Without this command Laravel created links without https
        $users->withPath(env('APP_URL') . '/users');

        // Get success message
        $success = session('success');

        // Get authentificated user
        $auth_id = auth()->user()->id;

        return inertia('Users/Index', compact('users', 'success', 'auth_id'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return inertia('Users/Create');
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
            'firstname' => 'required|string|max:30',
            'lastname' => 'required|string|max:30',
            'email' => 'required|email|max:255',

            // Validate password with Laravel rules
            'password' => ['required',  Rules\Password::defaults()],
            'confirm_password' => 'required|same:password',
            'is_admin' => ''
        ]);

        // Create new user
        $user = new User();
        $user->firstname = $request->input('firstname');
        $user->lastname = $request->input('lastname');
        $user->email = $request->input('email');

        // If input is checked
        if($request->input('is_admin') == null)
            $user->is_admin = 0;
        else
            $user->is_admin = 1;

        // Hash password
        $user->password = Hash::make($request->input('password'));

        $user->save();

        return redirect()->route('users.index')
            ->with('success', 'User created successfully.');
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
        $user = User::where('id', $id)->firstOrFail();
        return inertia('Users/Edit', ['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'firstname' => 'required|string|max:30',
            'lastname' => 'required|string|max:30',
            'email' => 'required|email|max:255'
        ]);

        $user->update($request->all());

         return redirect()->route('users.index')
            ->with('success','User updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();

        return redirect()->route('users.index')
            ->with('success','User deleted successfully');
    }

    /**
     * Update password.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function updatePassword(Request $request)
    {
        // Form validation
        $request->validate([
            'current_password' => 'required',

            // Validate password with Laravel rules
            'new_password' => ['required',  Rules\Password::defaults()],
            'confirm' => 'required|same:new_password'
        ]);

        // Get authentificated user id
        $id = auth()->user()->id;
        $user = User::where('id', $id)->firstOrFail();

        // If current password match with user password
        if(Hash::check($request->input('current_password'), $user->password))
        {
            // Hash password
            $user->password = Hash::make($request->input('new_password'));

            // Update user
            $user->update();

            return redirect()->route('dashboard')
                ->with('success','Password updated successfully');
        }
    }
}
