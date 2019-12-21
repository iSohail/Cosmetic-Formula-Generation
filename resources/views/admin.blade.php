@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="container my-3">
            <h3 style="color:#343a40">Admin Dashboard</h3>
        </div>
    </div>
    <div class="row" id="stats-box">
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>{{$cosmetics}}</h3>

                    <p>Cosmetics</p>
                </div>
                <div class="icon pb-3">
                    <i class="ion ion-bag"></i>
                </div>

            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>{{$ingredients}}</h3>

                    <p>Ingredients</p>
                </div>
                <div class="icon pb-3">
                    <i class="ion ion-stats-bars"></i>
                </div>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
                <div class="inner">
                    <h3>{{$formulas}}</h3>

                    <p>Formulas</p>
                </div>
                <div class="icon pb-3">
                    <i class="ion ion-pie-graph"></i>
                </div>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
                <div class="inner">
                    <h3>{{$users}}</h3>

                    <p>User Registrations</p>
                </div>
                <div class="icon pb-3">
                    <i class="ion ion-person-add"></i>
                </div>
            </div>
        </div>
    </div>




    {{-- <div class="col-md-8">
            <div class="card my-3">
                <div class="card-header">Add Ingredients</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('admin.ingredients.create') }}">
    @csrf

    <div class="form-group row">
        <label for="ingredient-id" class="col-md-4 col-form-label text-md-right">Ingredient
            ID</label>

        <div class="col-md-6">
            <input id="ingredient-id" type="text" class="form-control" name="ingredient-id" value="">
        </div>
    </div>
    <div class="form-group row">
        <label for="ingredient-name" class="col-md-4 col-form-label text-md-right">Ingredient
            Name</label>

        <div class="col-md-6">
            <input id="ingredient-name" type="text" class="form-control" name="ingredient-name" value="">
        </div>
    </div>

    <div class="form-group row mb-0">
        <div class="col-md-8 offset-md-4">
            <button type="submit" class="btn btn-primary">
                {{ __('Login') }}
            </button>
        </div>
    </div>
    </form>

</div>
</div>
<div class="card my-3">
    <div class="card-header">Add Formula Items</div>

    <div class="card-body">
        <form method="POST" action="{{ route('admin.formulas.create') }}">
            @csrf

            <div class="form-group row">
                <label for="formula-id" class="col-md-4 col-form-label text-md-right">Formula
                    ID</label>

                <div class="col-md-6">
                    <input id="formula-id" type="text" class="form-control" name="formula_id" value="">
                </div>
            </div>
            <div class="form-group row">
                <label for="formula-name" class="col-md-4 col-form-label text-md-right">Formula
                    Name</label>

                <div class="col-md-6">
                    <input id="formula-name" type="text" class="form-control" name="formula_name" value="">
                </div>
            </div>
            <div class="form-group row">
                <label for="ingredient-id" class="col-md-4 col-form-label text-md-right">Ingredient
                    ID</label>

                <div class="col-md-6">
                    <input id="ingredient-id" type="text" class="form-control" name="ingredient_id" value="">
                </div>
            </div>

            <div class="form-group row mb-0">
                <div class="col-md-8 offset-md-4">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Login') }}
                    </button>
                </div>
            </div>
        </form>

    </div>
</div>
<div class="card my-3">
    <div class="card-header">Add Complete Cosmetics</div>

    <div class="card-body">
        <form method="POST" action="{{ route('admin.cosmetics.create') }}">
            @csrf

            <div class="form-group row">
                <label for="cosmetic-id" class="col-md-4 col-form-label text-md-right">Cosmetic ID</label>

                <div class="col-md-6">
                    <input id="cosmetic-id" type="text" class="form-control" name="cosmetic_id" value="">
                </div>
            </div>
            <div class="form-group row">
                <label for="cosmetic-name" class="col-md-4 col-form-label text-md-right">Cosmetic
                    Name</label>

                <div class="col-md-6">
                    <input id="cosmetic-name" type="text" class="form-control" name="cosmetic_name" value="">
                </div>
            </div>
            <div class="form-group row">
                <label for="ingredient-id" class="col-md-4 col-form-label text-md-right">Ingredient
                    ID</label>

                <div class="col-md-6">
                    <input id="ingredient-id" type="text" class="form-control" name="ingredient_id" value="">
                </div>
            </div>
            <div class="form-group row">
                <label for="optional" class="col-md-4 col-form-label text-md-right">Optional</label>

                <div class="col-md-6">
                    <input id="optional" type="text" class="form-control" name="optional" value="">
                </div>
            </div>
            <div class="form-group row">
                <label for="formula-id" class="col-md-4 col-form-label text-md-right">Formula
                    ID</label>

                <div class="col-md-6">
                    <input id="formula-id" type="text" class="form-control" name="formula_id" value="">
                </div>
            </div>
            <div class="form-group row">
                <label for="optional" class="col-md-4 col-form-label text-md-right">Phase Name</label>

                <div class="col-md-6">
                    <input id="optional" type="text" class="form-control" name="phase_name" value="">
                </div>
            </div>
            <div class="form-group row">
                <label for="min-percentage" class="col-md-4 col-form-label text-md-right">Min
                    Percentage for Ingredent</label>

                <div class="col-md-6">
                    <input id="min-percentage" type="number" class="form-control" name="ingredient_min_percentage"
                        value="">
                </div>
            </div>
            <div class="form-group row">
                <label for="max-percentage" class="col-md-4 col-form-label text-md-right">Max
                    Percentage for Ingredent</label>

                <div class="col-md-6">
                    <input id="max-percentage" type="number" class="form-control" name="ingredient_max_percentage"
                        value="">
                </div>
            </div>
            <div class="form-group row">
                <label for="min-percentage" class="col-md-4 col-form-label text-md-right">Min
                    Percentage for Formula Item</label>

                <div class="col-md-6">
                    <input id="min-percentage" type="number" class="form-control" name="formula_min_percentage"
                        value="">
                </div>
            </div>
            <div class="form-group row">
                <label for="max-percentage" class="col-md-4 col-form-label text-md-right">Max
                    Percentage for Formula Item</label>

                <div class="col-md-6">
                    <input id="max-percentage" type="number" class="form-control" name="formula_max_percentage"
                        value="">
                </div>
            </div>

            <div class="form-group row mb-0">
                <div class="col-md-8 offset-md-4">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Submit') }}
                    </button>
                </div>
            </div>
        </form>

    </div>
</div>
</div> --}}
</div>
@endsection