@extends('layouts.admin')

@section('content')
<style>
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
        <h1>Cosmetic Details</h1>
        <small>Cosmetic Phase Details</small>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fas fa-home"></i> Home</a></li>
            {{-- <li><a href="#"></a></li> --}}
            <li class="active">Phase Details</li>
        </ol>
    </div>
</section>
@if(session('success'))
<h1>{{session('success')}}</h1>
@endif
<div class="card" style=" margin : 15px 30px ">
    <div class="card-header">
        <h5>
            Phase Details
        </h5>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table text-center">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Ingredient</th>
                        <th scope="col">Optional</th>
                        <th scope="col">Formula Name</th>
                        <th scope="col">Phase</th>

                        <th scope="col">Action</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($cosmetics as $cosmetic)
                    @foreach ($cosmetic->ingredients as $itemI)
                    @foreach ($cosmetic->formulas as $itemF)
                    @if ($itemF->ingredient_id == $itemI->id)

                    <tr id="{{$cosmetic->id}}">
                        <td>{{$cosmetic->id}}</td>
                        <td>{{$cosmetic->name}}</td>
                        <td>{{$itemI->name}} <br><small> (min: {{$itemI->pivot->min_percentage}}% | max:
                                {{$itemI->pivot->max_percentage}}%) </small></td>
                        <td>{{$itemI->pivot->optional}}</td>
                        <td>{{$itemF->name}} <br><small> (min: {{$itemF->pivot->min_percentage}}% | max:
                                {{$itemF->pivot->max_percentage}}%) </small></td>
                        <td>{{$itemF->pivot->phase_name}}</td>
                        <td> <a href="{{ route('admin.phase.edit',[$cosmetic->id]) }}"><button
                                    class="btn btn-success btn-md"> <i class="fas fa-edit"></i> </button></a>
                        </td>
                    </tr>
                    @endif
                    @endforeach
                    @endforeach
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>


@endsection