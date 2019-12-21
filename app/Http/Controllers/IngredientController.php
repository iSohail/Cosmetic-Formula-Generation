<?php

namespace App\Http\Controllers;
use Session;
use App\Ingredient;
use Auth;

use Illuminate\Http\Request;

class IngredientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ingredients = Ingredient::all();
        return view('admin.ingredients.ingredient')->with('ingredients', $ingredients);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $ingredient = new Ingredient;
        $ingredient->name = $request->input('name');

        if ($ingredient->save()) {
            return redirect('/admin')->with('success', 'cosmetic Added');
        }

        return redirect('/admin')->with('error', 'Cosmetic is not added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Ingredient  $ingredient
     * @return \Illuminate\Http\Response
     */
    public function show(Ingredient $ingredient)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Ingredient  $ingredient
     * @return \Illuminate\Http\Response
     */
    public function edit(Ingredient $ingredient)
    {
        return view('admin.ingredients.edit')->with('ingredient', $ingredient);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Ingredient  $ingredient
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ingredient $ingredient)
    {
        $data = $this->validate($request, [
            'ingredient_name' => 'required',
        ]);

        $ingredient = Ingredient::where('id', '=', $ingredient->id)->firstOrFail();
        $ingredient->name = $data["ingredient_name"];
        $ingredient->save();
        $ingredients = Ingredient::all();
        Session::flash('message', "Successfully Updated!!");
        Session::flash('instance', "ingredient");
        // return view('admin.ingredients.ingredient')->with(['ingredients' => $ingredients]);
        return redirect(route('admin.ingredients.ingredient'))->with(['ingredients' => $ingredients]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Ingredient  $ingredient
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ingredient $ingredient)
    {
        $ingredient_destroy = Ingredient::find($ingredient->id);
        $ingredient_destroy->delete();

        return redirect('/admin/ingredients/create')->with('success', 'Ingredient has been deleted!!');
    }
}
