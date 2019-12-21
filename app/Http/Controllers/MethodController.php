<?php

namespace App\Http\Controllers;

use App\Cosmetic;
use App\Method;
use Illuminate\Http\Request;

class MethodController extends Controller
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
        $cosmetics = Cosmetic::all();
        $methods = Method::with('cosmetic')->get();
        // dd($methods);
        return view('admin.methods.method')->with(['cosmetics' => $cosmetics, 'methods' => $methods]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        foreach ($request->description as $key => $value) {
            $cosmetic = Cosmetic::where('id', '=', $request->cosmetic_id)->firstOrFail();
            if ($cosmetic) {
                $method = new Method;
                $method->step_num = $key + 1;
                $method->description = $value;
                if ($method->cosmetic()->associate($cosmetic)->save()) {
                    return redirect()->back()->withSuccess('Record Updated!!');
                }
            }
        }
        // dd($ingredient);
        return Redirect::back()->withErrors(['msg', 'Something went wrong!!']);
        // return redirect('/admin')->with('success', 'Method Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Method  $method
     * @return \Illuminate\Http\Response
     */
    public function show(Method $method)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Method  $method
     * @return \Illuminate\Http\Response
     */
    public function edit(Method $method)
    {
        $cosmetics = Cosmetic::all();
        return view('admin.methods.edit')->with(['method' => $method, 'cosmetics' => $cosmetics]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Method  $method
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Method $method)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Method  $method
     * @return \Illuminate\Http\Response
     */
    public function destroy(Method $method)
    {
        $method_destroy = Method::where('id', '=', $method->id)->get();
        // dd($method_destroy);
        foreach ($method_destroy as $key => $value) {
            $value->delete();
        }

        return redirect('/admin')->with('success', 'Method has been deleted!!');
    }
}
