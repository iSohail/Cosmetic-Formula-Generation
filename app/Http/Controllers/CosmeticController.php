<?php

namespace App\Http\Controllers;

use App\Cosmetic;
use App\Formula;
use App\Ingredient;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class CosmeticController extends Controller
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
        $cosmetics = Cosmetic::all();
        return view('admin.cosmetics.manage')->with('cosmetics', $cosmetics);
    }

    public function phase()
    {
        $cosmetics = Cosmetic::with('ingredients', 'formulas')->get();
        return view('admin.cosmetics.phase')->with('cosmetics', $cosmetics);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ingredients = Ingredient::all();
        return view('admin.cosmetics.create')->with('ingredients', $ingredients);
    }

    public function formulas()
    {
        $ingredient_id = Input::get('ingredient_id');
        $formulas = Formula::where('ingredient_id', '=', $ingredient_id)->get();

        return response()->json($formulas);
    }

    public function getIngredients()
    {
        $ingredients = Ingredient::all();
        return response()->json($ingredients);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cosmetic = new Cosmetic;
        $cosmetic->name = $request->cosmetic_name;

        $admin = Auth::guard('admin')->id();

        $subingredient = [];
        $ingredient = [];
        $flag = true;
        if ($cosmetic->admin()->associate($admin)->save()) {
            foreach ($request->ingredients as $key => $value) {
                if (Ingredient::where('id', '=', $value["ingredient_id"])->firstOrFail()) {
                    $ingredient[$value["ingredient_id"]] = ['optional' => $value["optional"], 'min_percentage' => $value["min_ingredient"], 'max_percentage' => $value["max_ingredient"], 'min_item' => $value["min_item"], 'max_item' => $value["max_item"]];
                    foreach ($value["formulas"] as $keyF => $valueF) {
                        if (Formula::where('id', '=', $valueF["formula_id"])->firstOrFail()) {
                            $subingredient[$valueF["formula_id"]] = ['phase_name' => $valueF["phase_name"], 'min_percentage' => $valueF["min_formula"], 'max_percentage' => $valueF["max_formula"]];
                        } else {
                            $flag = false;
                        }
                    }
                } else {
                    $flag = false;
                }
            }

            if (!($cosmetic->ingredients()->sync($ingredient))) {
                $flag = false;
            }
            if (!($cosmetic->formulas()->sync($subingredient))) {
                $flag = false;
            }
        } else {
            $flag = false;
        }

        if ($flag) {
            return response()->json(["Error" => false, "success" => "Successfully added cosmetic"], 201);
        } else {

            return response()->json(["Error" => true, "error" => "Error adding cosmetic"]);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Cosmetic  $cosmetic
     * @return \Illuminate\Http\Response
     */
    public function show(Cosmetic $cosmetic)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cosmetic  $cosmetic
     * @return \Illuminate\Http\Response
     */
    public function edit(Cosmetic $cosmetic)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cosmetic  $cosmetic
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cosmetic $cosmetic)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cosmetic  $cosmetic
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cosmetic $cosmetic)
    {
        $cosmetic_destroy = Cosmetic::find($cosmetic->id);

        if ($cosmetic_destroy->delete()) {
            return redirect()->back()->withSuccess('Ingredient has been deleted!!');
        }
        // dd($ingredient);
        return Redirect::back()->withErrors(['msg', 'Something went wrong!!']);
    }
}
