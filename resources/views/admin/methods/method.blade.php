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
        <h1>Method</h1>
        <small>Add Method</small>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fas fa-home"></i> Home</a></li>
            {{-- <li><a href="#"></a></li> --}}
            <li class="active">Add Method</li>
        </ol>
    </div>
</section>
<div style=" padding : 15px 30px ">

    <div class="card">
        <div class="card-header">
            <h5>
                Add Method
            </h5>
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route('admin.methods.create') }}" id="create_method">
                @csrf
                <div class="row my-2">
                    <div class="col-md-6 col-xl-3">
                        <label for="cosmetic-name">Cosmetic Name</label>
                        <select class="form-control" name="cosmetic_id" id="option-select">
                            <option value="-1" selected disabled>Please select Cosmetic</option>
                            @foreach ($cosmetics as $cosmetic)
                            <option value="{{$cosmetic->id}}">{{$cosmetic->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="">
                    <div class="form-group">
                        <div class="table-responsive ">
                            <table class="table" id="dynamic_field">
                                <tr id="row1">
                                    <td style="max-width:50px">
                                        <input type="number" placeholder="Step" value="1" disabled
                                            class="form-control name_list">
                                    </td>
                                    <td><input type="text" required name="description[]" placeholder="Description"
                                            class="form-control name_list" /></td>
                                    <td><button type="button" name="add" id="add" class="btn btn-success">+</button>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary m-2">Submit Method</button>
            </form>
        </div>
    </div>
    <div class="card">
        <div class="card-header">
            <h5>Manage Methods</h5>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table text-center">
                    <thead>
                        <tr>
                            <th scope="col">Cosmetic Name</th>
                            <th scope="col">Step</th>
                            <th scope="col">Description</th>
                            <th scope="col">Created</th>
                            <th scope="col">Last Updated</th>
                            <th scope="col">Action</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($methods as $method)
                        <tr id="{{$method->id}}">
                            <td>{{$method->cosmetic->name}}</td>
                            <td>{{$method->step_num}}</td>
                            <td>{{$method->description}}</td>
                            <td>{{$method->created_at}}</td>
                            <td>{{$method->updated_at}}</td>

                            <td>
                                <form action="{{ route('admin.methods.delete',[$method->id]) }}" method="post"
                                    style="display:inline">
                                    @csrf
                                    <input name="_method" type="hidden" value="DELETE">
                                    <button type="submit" class="btn btn-danger btn-md"
                                        style="background : red !important ; border : 1px solid red"><i
                                            class="fas fa-trash"></i> Method
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
    $(document).ready(function(){
        $("#create_method").submit(function(e){
            let cosmetic = $("#create_method").find("select[name=cosmetic_id]").find(":selected");
            if (cosmetic.val() == -1){
                e.preventDefault();
                swal("Error", "Please select All Required fields", 'error')
            }
        });
        var i=1;
        $('#add').click(function(){
            i++;
            $('#dynamic_field').append('<tr id="row'+i+'"> <td style="max-width:50px"> <input type="number" placeholder="Step" value="'+i+'" disabled class="form-control name_list"> </td><td><input type="text" name="description[]" required placeholder="Description" class="form-control name_list"/></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');
        });
        $(document).on('click', '.btn_remove', function(){
            var button_id = $(this).attr("id"); 
            $('#row'+button_id+'').remove();
        });
    });
</script>
@endsection