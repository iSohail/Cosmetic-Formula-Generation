@extends('layouts.user')

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
        <h1>Formula List</h1>
        <small>Formulas</small>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fas fa-home"></i> Home</a></li>
            {{-- <li><a href="#"></a></li> --}}
            <li class="active">Formula List</li>
        </ol>
    </div>
</section>
<div id="show_method">
    <div class="card" style=" margin : 15px 30px ">
        <div class="card-header">
            <h5>
                Formula List
            </h5>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Cosmetic Name</th>
                            <th scope="col">Created</th>

                            <th scope="col">Action</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($cosmetics as $key => $cosmetic)
                        <tr id="{{$cosmetic->id}}" style="cursor:pointer">
                            <th scope="row" style="width: 8.33%">{{$key+1}}</th>
                            <td>{{$cosmetic->name}}</td>
                            <td>{{$cosmetic->created_at}}</td>
                            <td>
                                <form action="{{ route('users.cosmetics.delete',[$cosmetic->id]) }}" method="post"
                                    style="display:inline">
                                    @csrf
                                    <input name="_method" type="hidden" value="DELETE">
                                    <button type="submit" id="deleteCosmeticBtn" class="btn btn-danger btn-md"
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
</div>
<script>
    $(document).ready(function() {   
        $(document).on('click', 'tr', function(e) {
            let cosmetic_id = $(this).attr('id');
            $.get('/formulas/method?cosmetic_id='+cosmetic_id, function(data){
                $('#show_method').html(data.view);  
            });
        });
        $(document).on('click', '#deleteCosmeticBtn', function(e) {
            e.stopPropagation()
        });
    });

</script>

@endsection