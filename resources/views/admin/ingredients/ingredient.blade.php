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
        <h1>Ingredients</h1>
        <small>Add Ingredient</small>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fas fa-home"></i> Home</a></li>
            {{-- <li><a href="#"></a></li> --}}
            <li class="active">Add Ingredient</li>
        </ol>
    </div>
</section>
@if (Session::has('message') )
@if (Session::has('instance') )
@if (Session::get('instance') == "ingredient" )
<script>
    $(document).ready(function(){
        swal("Updated", "{{ Session::get('message') }}", 'info')
    });
</script>
@endif
@endif
@endif
<div class="card" style=" margin : 15px 30px ">

    <div class="card-body">
        <form method="POST" action="{{ route('admin.ingredients.create') }}">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <label for="ingredient-name">Ingredient Name :</label>
                    <input type="text" class="form-control" name="name" id="ingredient-name"
                        placeholder="Enter Ingredient Name">
                </div>
                <div class="col-md-2">
                    <button type="submit" class="btn btn-primary" id="add-ingredient">Add</button>
                </div>
            </div>
        </form>
    </div>
</div>
<div class="card" style=" margin : 15px 30px ">
    <div class="card-header">
        <h5>Manage Ingredient</h5>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table text-center">
                <thead>
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Creadted</th>
                        <th scope="col">Last Updated</th>

                        <th scope="col">Action</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($ingredients as $ingredient)
                    <tr id="{{$ingredient->id}}">
                        <td>{{$ingredient->name}}</td>
                        <td>{{$ingredient->created_at}}</td>
                        <td>{{$ingredient->updated_at}}</td>

                        <td><a href="{{ route('admin.ingredients.edit',[$ingredient->id]) }}"> <button
                                    class="btn btn-success btn-md"> <i class="fas fa-edit"></i>
                                </button></a>

                            <form action="{{ route('admin.ingredients.delete',[$ingredient->id]) }}" method="post"
                                style="display:inline">
                                @csrf
                                <input name="_method" type="hidden" value="DELETE">
                                <button type="submit" class="btn btn-danger btn-md"
                                    style="background : red !important ; border : 1px solid red"><i
                                        class="fas fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach


                </tbody>
            </table>
        </div>

    </div>
</div>



@endsection