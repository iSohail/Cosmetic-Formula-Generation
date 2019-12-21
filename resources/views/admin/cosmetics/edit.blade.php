@extends('layouts.admin')

@section('content')
<style>
    #add-ingredient {
        margin-top: 30px
    }

    .content-header {
        position: relative;
        padding: 12px 30px;
        background-color: #fff;
        border-bottom: 1px solid #e1e6ef;
        margin-bottom: 20px;
    }

    .content-header .header-icon {
        font-size: 55px;
        color: #278F9A;
        width: 68px;
        float: left;
        margin-top: -4px;
        line-height: 0;
    }

    .content-header .header-title {
        margin-left: 68px;
    }

    .content-header .header-title h1 {
        margin: 0;
        font-size: 24px;
    }

    .h1,
    .h2,
    .h3,
    .h4,
    .h5,
    .h6,
    h1,
    h2,
    h3,
    h4,
    h5,
    h6 {
        font-family: 'Alegreya Sans', sans-serif;
    }

    .content-header .header-title small {
        font-size: 13px;
        display: inline-block;
        padding-left: 4px;
        font-weight: 600;
        color: #7a7a7a;
    }

    .header-title .breadcrumb {
        float: right;
        background: #fff;
        margin-top: 0;
        margin-bottom: 0;
        font-size: 12px;
        padding: 7px;
        position: absolute;
        bottom: 18px;
        right: 30px;
        border-radius: 0;
        border: 1px solid #e1e6ef;
        font-weight: 600;
    }

    .breadcrumb>li {
        display: inline-block;
    }

    .header-title .breadcrumb>li>a {
        color: #374767;
        text-decoration: none;
        display: inline-block;
    }

    .breadcrumb>li+li:before {
        padding: 0 5px;
        color: #ccc;
        content: "/\00a0";
    }

    .breadcrumb>.active {
        color: #278F9A;
        font-weight: 700;
    }

    body {
        /* overflow-x: hidden;
            overflow-y: auto;
            color: #374767;
            background-color: #f1f3f6; */
        font-family: 'Open Sans', 'Helvetica Neue', Helvetica, Arial, sans-serif;
    }
</style>
<section class="content-header">
    <div class="header-icon">
        <i class="fas fa-briefcase"></i>
    </div>
    <div class="header-title">
        <h1>Cosmetics</h1>
        <small>Cosmetic Phase Edit</small>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fas fa-home"></i> Home</a></li>
            {{-- <li><a href="#"></a></li> --}}
            <li class="active">Edit Phase</li>
        </ol>
    </div>
</section>

<h2 class="container ml-3">{{$cosmetic->name}} </h2>

@foreach ($ingredients as $ingredient)


<div class="card" style=" margin : 15px 30px ">
    <div class="card-header">
        <div class="row">
            <div class="col-md-12">
                <div class="h5">Ingredient </div>
            </div>
        </div>
    </div>
    <div class="card-body">
        <form method="POST"
            action="{{ route('admin.phase.updateIngredient',[$cosmetic->id, $ingredient->ingredient_id]) }}">
            @csrf
            <input type="hidden" name="_method" value="PUT">
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="ingredient-name">Name :</label>
                        <input type="text" class="form-control" id="ingredient-name" disabled
                            value="{{$ingredient->name}}" placeholder="Enter Ingredient Name">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="min-ingredient">Min Percentage:</label>
                        <input type="text" class="form-control" name="min_ingredient" id="min-ingredient"
                            value="{{$ingredient->min_percentage}}" placeholder="Min %">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="max-ingredient">Max Percentage:</label>
                        <input type="text" class="form-control" name="max_ingredient" id="max-ingredient"
                            value="{{$ingredient->max_percentage}}" placeholder="Max %">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="option-Select">Optional</label>
                        <select class="form-control" name="optional" id="option-select">
                            <option selected>{{$ingredient->optional}}</option>
                            <option>
                                @if ($ingredient->optional == "True")
                                False
                                @else
                                True
                                @endif
                            </option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="min-item">Min Items :</label>
                        <input type="number" value="{{$ingredient->min_item}}" class="form-control" name="min_item"
                            id="min-item" placeholder="Minimum Item">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="max-item">Max Items :</label>
                        <input type="number" value="{{$ingredient->max_item}}" class="form-control" name="max_item"
                            id="max-item" placeholder="Maximum Item">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <button type="submit" class="btn btn-warning mt-0" style="float:right !important"
                        id="add-ingredient">Update</button>
                </div>
            </div>
        </form>
        <hr>
        @foreach ($formulas as $formula)
        @if ($formula->ingredient_id == $ingredient->ingredient_id)
        <form method="POST" action="{{ route('admin.phase.updateFormula',[$cosmetic->id, $formula->formula_id]) }}">
            @csrf
            <input type="hidden" name="_method" value="PUT">
            <div class="row mx-auto">
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="formula">Sub Ingredient Name :</label>
                        <input type="text" class="form-control" disabled id="formula-name" placeholder="Name"
                            value="{{$formula->name}}">
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label for="min-formula">Min :</label>
                        <input type="text" class="form-control" name="min_formula" id="min-formula"
                            value="{{$formula->min_percentage}}" placeholder="Min %">
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label for="max-formula">Max :</label>
                        <input type="text" class="form-control" name="max_formula" id="max-formula"
                            value="{{$formula->max_percentage}}" placeholder="Max %">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="option-Select">Phase Name</label>
                        <select class="form-control" name="phase_name" id="phase-name">
                            <option selected style="background:#7a7a7a">{{$formula->phase_name}}</option>
                            <option>A</option>
                            <option>B</option>
                            <option>C</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-1" style="float:right !important; padding-top : 30px"><button type="submit"
                        class="btn btn-warning mt-0" id="add-ingredient">Update</button>
                </div>
        </form>
    </div>
    @endif
    @endforeach


</div>
</div>
</form>
@endforeach


@endsection