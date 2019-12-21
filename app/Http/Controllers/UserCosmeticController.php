<?php

namespace App\Http\Controllers;

use App\Cosmetic;
use App\CosmeticFormula;
use App\CosmeticIngredient;
use App\Formula;
use App\Ingredient;
use App\Method;
use App\UserCosmetic;
use App\UserCosmeticFormula;
use App\User;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use View;

class UserCosmeticController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $cosmetics = Cosmetic::all();
        return view('users.formulas.create')->with('cosmetics', $cosmetics);
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
        // return response()->json($request);

        // return response()->json($request);
        $cosmetic = new UserCosmetic;
        $cosmetic->name = $request->cosmetic_name;

        $user = Auth::guard('web')->id();

        $flag = false;
        $subingredient = [];
        $ingredient = [];
        if ($request->ingredients && $cosmetic->user()->associate($user)->save()) {

            foreach ($request->ingredients as $key => $value) {
                if (Ingredient::where('id', '=', $value["ingredient_id"])->firstOrFail()) {
                    $ingredient[$value["ingredient_id"]] = ['percentage_used' => floatval($value["ingredientUsed"])];
                    foreach ($value["formulas"] as $keyF => $valueF) {
                        if (Formula::where('id', '=', $valueF["formula_id"])->firstOrFail()) {
                            $subingredient[$valueF["formula_id"]] = ['phase_name' => $valueF["phaseName"], 'percentage_used' => floatval($valueF["formulaUsed"])];
                        }
                    }
                }
            }

            if (!($cosmetic->ingredients()->attach($ingredient))) {
                $flag = true;
            }
            if (!($cosmetic->formulas()->attach($subingredient))) {
                $flag = true;
            }

        }
        if ($flag) {
            $cosmetic = UserCosmetic::find($cosmetic->id);
            $formulas = UserCosmeticFormula::where('user_cosmetic_id', '=', $cosmetic->id)->join('formulas', 'formulas.id', '=', 'user_cosmetic_formula.formula_id')->get();
            $methods = Method::where('cosmetic_id', '=', $request->cosmetic_id)->get();

            return response()->json(['view' => view('users.methods.method')->with(["Error" => false, "success" => "Successfully added cosmetic", 'cosmetic' => $cosmetic, 'formulas' => $formulas, 'methods' => $methods])->render(), 'success' => 'Successfully created formula!']);
        }
        return response()->json(["error" => "Error adding cosmetic!"]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function showFormulaList()
    {
        $user = Auth::guard('web')->id();
        $cosmetics = UserCosmetic::where('user_id', $user)->get();
        return view('users.formulas.list')->with('cosmetics', $cosmetics);
    }

    public function showMethods()
    {
        $cosmetic_id = Input::get('cosmetic_id');
        $user = Auth::guard('web')->id();
        $cosmetic = UserCosmetic::where([['id', '=', $cosmetic_id], ['user_id', '=', $user]])->firstOrFail();
        $cosmeticRef = Cosmetic::where('name', $cosmetic->name)->firstOrFail();
        $formulas = UserCosmeticFormula::where('user_cosmetic_id', '=', $cosmetic_id)->join('formulas', 'formulas.id', '=', 'user_cosmetic_formula.formula_id')->get();
        $methods = Method::where('cosmetic_id', '=', $cosmeticRef->id)->get();

        return response()->json(['view' => view('users.methods.method')->with(['cosmetic' => $cosmetic, 'formulas' => $formulas, 'methods' => $methods])->render()]);
    }

    public function show(Request $request)
    {
        $cosmetic_id = $request->cosmetic_id;
        if ($cosmetic_id == "-1") {
            return redirect('/home')->with('error', 'Please Select a valid Cosmetic');
        } else {
            $cosmetic = Cosmetic::where('id', '=', $cosmetic_id)->firstOrFail();
            $ingredients = CosmeticIngredient::where('cosmetic_id', '=', $cosmetic_id)->join('ingredients', 'ingredients.id', '=', 'cosmetic_ingredient.ingredient_id')->get();
            $formulas = CosmeticFormula::where('cosmetic_id', '=', $cosmetic_id)->join('formulas', 'formulas.id', '=', 'cosmetic_formula.formula_id')->get();
            // dd($formulas);
            return view('users.formulas.select')->with(['cosmetic' => $cosmetic, 'ingredients' => $ingredients, 'formulas' => $formulas]);
        }
    }

    public function showIngredients()
    {
        $ingredients = Ingredient::all();
        return view('users.ingredients.ingredient')->with('ingredients', $ingredients);
    }

    public function showItems()
    {
        $formulas = Formula::with('ingredient')->get();
        return view('users.items.item')->with('formulas', $formulas);
    }

    public function showProfile()
    {
        $user_id = Auth::guard('web')->id();
        $user = User::where('id', $user_id)->firstOrFail();

        $cosmetics = UserCosmetic::where('user_id', $user_id)->get();
        $cosmetic_num = $cosmetics->count();
        return view('users.profile.profile')->with(['user' => $user, 'cosmetic_num' => $cosmetic_num]);
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
    public function update(Request $request, $id)
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
        $cosmetic_destroy = UserCosmetic::find($id);
        if ($cosmetic_destroy->delete()) {
            return redirect()->back()->withSuccess('Formula has been deleted!!');
        }
        return Redirect::back()->withErrors('Something went wrong!!');
    }
}
