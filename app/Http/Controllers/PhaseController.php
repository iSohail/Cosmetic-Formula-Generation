<?php

namespace App\Http\Controllers;

use App\Cosmetic;
use App\CosmeticFormula;
use App\CosmeticIngredient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class PhaseController extends Controller
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
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
        $cosmetic = Cosmetic::find($id);
        $ingredients = CosmeticIngredient::where('cosmetic_id', '=', $id)->join('ingredients', 'ingredients.id', '=', 'cosmetic_ingredient.ingredient_id')->get();
        $formulas = CosmeticFormula::where('cosmetic_id', '=', $id)->join('formulas', 'formulas.id', '=', 'cosmetic_formula.formula_id')->get();
        // dd($formulas);
        return view('admin.cosmetics.edit')->with(['cosmetic' => $cosmetic, 'ingredients' => $ingredients, 'formulas' => $formulas]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateIngredient(Request $request, $cosmetic_id, $ingredient_id)
    {
        // dd($request);
        $ingredient = CosmeticIngredient::where([['cosmetic_id', '=', $cosmetic_id], ['ingredient_id', '=', $ingredient_id]])->firstOrFail();
        
        $ingredient->min_percentage = $request->min_ingredient;
        $ingredient->max_percentage = $request->max_ingredient;
        $ingredient->min_item = $request->min_item;
        $ingredient->max_item = $request->max_item;
        $ingredient->optional = $request->optional;

        // $ingredient->save();
        // dd($ingredient);
        if($ingredient->save()){
            return redirect()->back()->withSuccess('Record Updated!!');
        }
        return Redirect::back()->withErrors(['msg', 'Something went wrong!!']);

        // return view('admin')->with('Success', 'Successfully updated the record');

    }

    public function updateFormula(Request $request, $cosmetic_id, $formula_id)
    {
        $formula = CosmeticFormula::where([['cosmetic_id', '=', $cosmetic_id], ['formula_id', '=', $formula_id]])->firstOrFail();
        
        $formula->min_percentage = $request->min_formula;
        $formula->max_percentage = $request->max_formula;
        $formula->phase_name = $request->phase_name;

        if($formula->save()){
            return redirect()->back()->withSuccess('Record Updated!!');
        }
        // dd($ingredient);
        return Redirect::back()->withErrors(['msg', 'Something went wrong!!']);

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
