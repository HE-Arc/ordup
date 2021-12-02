<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function addEmployee(Request $request)
    {
        // validation du formulaire
        $request->validate([
            'inputFirstname' => 'required|string|max:30',
            'inputLastname' => 'required|string|max:30',
            'inputMail' => 'required|email|max:255',
            'inputPassword' => 'required|required_with:inputConfirmPass|same:inputConfirmPass',
            'inputConfirmPass' => 'required',
            'inputCheckAdmin' => ''
        ]);

        // Ajout de l'employé dans la database
        //User::create($request->all());

        //dd($request->input('name'));

        // redirection de l'admin avec succès ou echec
        return redirect()->route('dashboard')
            ->with('success','User created successfully.');

    }
}
