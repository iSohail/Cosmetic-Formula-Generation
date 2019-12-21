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
        <h1>Formulas</h1>
        <small>Update Formula</small>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fas fa-home"></i> Home</a></li>
            {{-- <li><a href="#"></a></li> --}}
            <li class="active">Formulas</li>
        </ol>
    </div>
</section>
<div class="card" style=" margin : 15px 30px ">
    <div class="card-header">
        <h5>Edit Formula</h5>
    </div>
    <div class="card-body">
        <form method="POST" action="{{ route('admin.formulas.update',[$formula->id]) }}">
            @csrf
            <input type="hidden" name="_method" value="PUT">
            <div class="row">
                <div class="col-sm-12 col-md-6">
                    <div class="form-group">
                        <label for="formula">Sub Ingredient Name :</label>
                        <input disabled type="text" name="formula_name" class="form-control" value="{{$formula->name}}"
                            placeholder="Enter Sub ingredient Name">
                    </div>
                </div>
                <div class="col-sm-12 col-md-6">
                    <div class="form-group">
                        <label for="ingredient-name">Ingredient Name :</label>
                        <select class="form-control" name="ingredient_id" id="ingredient">
                            <option value="{{$formula->ingredient->id}}" selected="true">{{$formula->ingredient->name}}
                            </option>
                            @foreach ($ingredients as $ingredient)
                            <option value="{{ $ingredient->id }}">{{ $ingredient->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-sm-12 col-md-12">
                    <div class="form-group">
                        <label>Description :</label>
                        <textarea required name="description" class="form-control"
                            rows="5">{{$formula->description}}</textarea>
                    </div>
                </div>
                <div class="col-sm-12">
                    <button type="submit" style="float:right" class="btn btn-warning my-2 mt-4">
                        Update
                    </button>
                </div>

            </div>
        </form>
    </div>
</div>


@endsection