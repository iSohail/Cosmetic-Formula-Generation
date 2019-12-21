<?php

namespace App\Http\Controllers;

use App\User;
use App\Cosmetic;
use App\Ingredient;
use App\Formula;


use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $users = count(User::all());
        $cosmetics = count(Cosmetic::all());
        $ingredients = count(Ingredient::all());
        $formulas = count(Formula::all());

        return view('admin')->with(["users" => $users, "cosmetics" => $cosmetics, "ingredients" => $ingredients, "formulas" => $formulas]);
    }
}
 