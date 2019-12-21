<?php

namespace App\Http\Controllers;
use Session;
use App\Formula;
use App\Ingredient;
use Illuminate\Http\Request;

class FormulaController extends Controller
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
        $formulas = Formula::with('ingredient')->get();
        return view('admin.formulas.formula')->with(['ingredients' => $ingredients, 'formulas' => $formulas]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $formula = new Formula;
        $formula->name = $request->input('formula_name');
        $formula->description = $request->input('formula_description');

        $indgredient = Ingredient::where('id', '=', $request->input('ingredient_id'))->firstOrFail();
        if (!($indgredient)) {
            return redirect(route('admin.formulas.formula'))->with('error', 'Formula is not added. Ingredient not found');
        }

        if ($formula->ingredient()->associate($indgredient)->save()) {
            return redirect(route('admin.formulas.formula'))->with('success', 'Formula Added');
        }

        return redirect(route('admin.formulas.formula'))->with('error', 'Formula is not added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Formula  $formula
     * @return \Illuminate\Http\Response
     */
    public function show(Formula $formula)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Formula  $formula
     * @return \Illuminate\Http\Response
     */
    public function edit(Formula $formula)
    {
        $ingredients = Ingredient::all();
        return view('admin.formulas.edit')->with(['formula' => $formula, 'ingredients' => $ingredients]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Formula  $formula
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Formula $formula)
    {
        $data = $request->validate([
            'description' => 'required',
            'ingredient_id' => 'required',
        ]);
        $formula = Formula::where('id', '=', $formula->id)->firstOrFail();
        $formula->ingredient_id = $data["ingredient_id"];
        $formula->description = $data["description"];
        $formula->save();
        $ingredients = Ingredient::all();
        $formulas = Formula::all();
        Session::flash('message', "Successfully Updated!!");
        Session::flash('instance', "formula");
        return redirect(route('admin.formulas.formula'))->with(['formulas' => $formulas, 'ingredients' => $ingredients]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Formula  $formula
     * @return \Illuminate\Http\Response
     */
    public function destroy(Formula $formula)
    {
        $formula_destroy = Formula::find($formula->id);
        $formula_destroy->delete();

        return redirect()->back()->with('success', 'Sub Ingredient has been deleted!!');
    }
}
