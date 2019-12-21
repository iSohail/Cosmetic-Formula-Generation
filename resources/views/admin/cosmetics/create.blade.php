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
        <h1>New Cosmetic</h1>
        <small>Add New Cosmetic</small>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fas fa-home"></i> Home</a></li>
            {{-- <li><a href="#"></a></li> --}}
            <li class="active">Add Cosmetic</li>
        </ol>
    </div>
</section>
<div class="top-buttons-container container">

    <a href="{{ route('admin.ingredients.ingredient') }}" class="btn btn-success my-2">Add Ingredient</a>
    <a href="{{ route('admin.formulas.formula') }}" class="btn btn-primary my-2">Add Formula</a>
    <a href="{{ route('admin.methods.method') }}" class="btn btn-danger my-2">Add Method</a>

</div>
<div class="container">
    <div class="card my-4 mx-auto" style="max-width:1200px">
        <div class="card-header">
            <div class="row">
                <div class="col-md-12">
                    <div class="h5">Add Cosmetic </div><small style="color:red">Note: All fields are mandatory</small>
                </div>
            </div>
        </div>
        <div class="card-body">
            {{-- <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" /> --}}
            <input type="hidden" name="ingrediet_list" id="ingredient_list" value="0" />
            <div class="form-group" id="cosmetic_form">
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <label for="cosmetic-name">Cosmetic Name :</label>
                        <input type="text" class="form-control" required id="cosmetic-name" name="cosmetic_name"
                            placeholder="Enter Cosmetic Name">

                    </div>
                </div>
                <hr>
                <div class="card">
                    <div class="card-header">
                        <h5 style="display:inline-block" class="my-2">Ingredient</h5>
                        <button type="button" name="add" id="add" style="float:right"
                            class="btn btn-success add-ingredient" disabled>+</button>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="ingredient-name">Ingredient Name :</label>
                                    {{-- Data from backend --}}
                                    <select class="form-control" name="ingredient" id="ingredient">
                                        <option value="-1" disabled="true" selected="true">Select Ingredient
                                        </option>
                                        @foreach ($ingredients as $ingredient)
                                        <option value="{{ $ingredient->id }}">{{ $ingredient->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <label for="min-ingredient">Min :</label>
                                <div class="input-group">
                                    <input type=" number" class="form-control" name="min_ingredient" id="min-ingredient"
                                        placeholder="0.00 %">
                                    <div class="input-group-append">
                                        <span class="input-group-text">%</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <label for="max-ingredient">Max :</label>
                                <div class="input-group">
                                    <input type="number" class="form-control" name="max_ingredient" id="max-ingredient"
                                        placeholder="0.00 %">
                                    <div class="input-group-append">
                                        <span class="input-group-text">%</span>
                                    </div>
                                </div>
                            </div>


                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="min-item">Min Items :</label>
                                    <input type="number" class="form-control" name="min_item" id="min-item"
                                        placeholder="Minimum Item">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="max-item">Max Items :</label>
                                    <input type="number" class="form-control" name="max_item" id="max-item"
                                        placeholder="Maximum Item">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="option-Select">Optional</label>
                                    <select class="form-control" name="optional" id="option-select">
                                        <option>False</option>
                                        <option>True</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div id="dynamic_field" class="">
                            <div class="row mx-auto">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="formula">Sub Ingredient Name :</label>
                                        {{-- Data from backend --}}
                                        <select class="form-control" name="formula" id="formula">
                                            <option value="-1" disabled="true" selected="true">Select ingredient
                                                first
                                            </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <label for="min-formula">Min :</label>
                                    <div class="input-group">
                                        <input type="number" class="form-control" name="min_formula" id="min-formula"
                                            placeholder="0.00 %">
                                        <div class="input-group-append">
                                            <span class="input-group-text">%</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <label for="max-formula">Max :</label>
                                    <div class="input-group">
                                        <input type="number" class="form-control" name="max_formula" id="max-formula"
                                            placeholder="0.00 %">
                                        <div class="input-group-append">
                                            <span class="input-group-text">%</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="option-Select">Phase</label>
                                        <select class="form-control" name="phase_name" id="phase-name">
                                            <option>A</option>
                                            <option>B</option>
                                            <option>C</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-1" style="padding-top : 30px"><button type="button" name="add"
                                        id="add" class="btn btn-success add-sub-ingredient">+</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <hr>

            <div class="row">
                <div class="col-md-12 " style="padding : 10px 10px;">
                    <button type="submit" id="submit_btn" class="btn btn-primary "
                        style="padding : 5px 25px ; float: right   ">Create
                        Cosmetic</button>
                </div>
            </div>
        </div>
    </div>

    <div id="wait" class="modal"
        style="background: rgba(255, 255, 255, 0.8) url({{asset('images/spin.gif')}}) 50% 50% no-repeat;">
        <!-- Place at bottom of page -->
    </div>
    {{-- <div id="wait"
        style="display:none;width:69px;height:89px;border:1px solid black;position:absolute;top:50%;left:50%;padding:2px;">
        <img src='demo_wait.gif' width="64" height="64" /><br>Loading..</div> --}}
</div>
<style>
    .modal {
        display: none;
        position: fixed;
        z-index: 1000;
        top: 0;
        left: 0;
        height: 100%;
        width: 100%;
    }

    /* When the body has the loading class, we turn
   the scrollbar off with overflow:hidden */
    body.loading .modal {
        overflow: hidden;
    }

    /* Anytime the body has the loading class, our
   modal element will be visible */
    body.loading .modal {
        display: block;
    }
</style>
<script>
    $body = $("body");

    $(document).on({
        ajaxStart: function() { $body.addClass("loading");    },
        ajaxStop: function() { $body.removeClass("loading"); }    
    });
    $(document).ready(function(){

        $(document).ajaxStart(function(){
            $("#wait").css("display", "block");
        });
        $(document).ajaxComplete(function(){
            $("#wait").css("display", "none");
        });
        var i=0;
        var j=0;

        $("#submit_btn").click(function(e){
            let flag = true;
            let cosmetic_name = $('input[name=cosmetic_name]').val();
            if (cosmetic_name == ''){
                swal("Error", "Please enter cosmetic name", 'error')     
                return false;   
            }
            let cosmetics = {}
            cosmetics['cosmetic_name'] = cosmetic_name
            let ingredients = []
            let ingredients_selector = $('select[name="ingredient"]').find(":selected");
            ingredients_selector.each(function( index ) {
                if(!(flag)){
                    return false;
                }
                let ingredient_id = $( this ).val();
                if(!(ingredient_id == '-1')){
                    let ingredient_card = $(".card[id="+ ingredient_id +"]")
                    let min_ingredient = ingredient_card.find("input[id=min-ingredient]").val()
                    let max_ingredient = ingredient_card.find("input[name=max_ingredient]").val()
                    let min_item = ingredient_card.find("input[name=min_item]").val()
                    let max_item = ingredient_card.find("input[name=max_item]").val()
                    let optional = ingredient_card.find("select[name=optional]").val()
                    
                    if (min_ingredient == "" && max_ingredient == "" && min_item == "" && max_item == "") {
                        swal("Error", "Please fill out all the fields!!", 'error')

                        flag = false;
                        return false;
                    }

                    let formulas = []
                    
                    let formulas_selector = ingredient_card.find("select[name=formula]").find(":selected");
                    formulas_selector.each(function(index){
                        if(!(flag)){
                            return false;
                        }
                        let formula_id = $( this ).val();
                        if(!(formula_id == '-1')){
                            //min and max and phase name for formula
                            let min_formula = $('.row[id='+ formula_id +']').find("input[id=min-formula]").val();
                            let max_formula = $('.row[id='+ formula_id +']').find("input[id=max-formula]").val();
                            let phase_name = $('.row[id='+ formula_id +']').find("select[id=phase-name]").val();
                            if (min_formula == "" && max_formula == "") {
                                swal("Error", "Please fill out all the fields!!", 'error')

                                flag = false;
                                return false;
                            }
                            let formula = {
                                formula_id,
                                min_formula,
                                max_formula,
                                phase_name
                            }
                            formulas.push(formula)
                        }
                    })
                    let ingredient = {
                        ingredient_id,
                        min_ingredient,
                        max_ingredient,
                        min_item,
                        max_item,
                        optional,
                        formulas
                    }
                    ingredients.push(ingredient)
                }
            });
            cosmetics['ingredients'] = ingredients

            if (!(flag)) {
                return false;
            }

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                url: '/admin/cosmetics/create',
                method: 'post',
                dataType: 'JSON',
                data:  cosmetics,
                success:function(data){
                    swal("Success", data["success"], 'success')        
                },
                error: function(data){
                    swal("Error " + data.status, "Something went wrong!!", 'error')
                }
            });
        })
        
        var enableSubmit = function(ele) {
            $(ele).removeAttr("disabled");
        }
        
        $(document).on('click', '.add-ingredient', function(e){
            var that = this;
            $(this).attr("disabled", true);
            setTimeout(function() { enableSubmit(that) }, 1000);

            if ($('#ingredient').find(":selected").val() == '-1') {
                swal("Error", 'please select a value first', 'error')                    

                // console.log('please select a value first');
                return false;
            }
            if($("#ingredient-"+(j)).find(":selected").val() == '-1'){
                swal('Error', 'please select a value first', 'error')
                // console.log('please select a value first');
                return false;
            }
            var ingredient_id = $(this).closest('.card').attr('id');
            $.get('/admin/json-getIngredients', function(data){
                let counter = 0;
                
                data.forEach(ingredient => {
                    if ($('#ingredient').find(":selected").val() == ingredient.id) { counter++;}
                    for (let index = 1; index < j; index++) { 
                        if($("#ingredient-"+index).find(":selected").val()==ingredient.id){ counter++; } 
                    }
                });
                
                if(counter == data.length){
                    swal("Can't Process", 'No more data to show', 'info') 
                    // console.log('No more data to show');
                }else {
                    j++;
                    // $('#cosmetic_form').append('<div class="card ingredient-container-'+ j +'"> <div class="card-header"> <h5 style="display:inline-block" class="my-2">Ingredient</h5> <button type="button" name="remove_ingredient" id="'+j+'" style="float:right" class="btn btn-danger btn_remove_ingredient">X</button> </div><div class="card-body"> <div class="row"> <div class="col-md-3"> <div class="form-group"> <label for="ingredient-'+ j +'">Ingredient Name :</label>{{-- Data from backend --}}<select class="form-control" name="ingredient" id="ingredient-'+ j +'">  </select> </div></div><div class="col-md-3"> <div class="form-group"> <label for="min-ingredient">Min :</label> <input type="text" class="form-control" id="min-ingredient" name="min_ingredient" placeholder="Min %"> </div></div><div class="col-md-3"> <div class="form-group"> <label for="max-ingredient">Max :</label> <input type="text" class="form-control" id="max-ingredient" name="max_ingredient" placeholder="Max %"> </div></div><div class="col-md-3"> <div class="form-group"> <label for="option-Select">Optional</label> <select class="form-control" id="option-select" name="optional"> <option>True</option> <option>False</option> </select> </div></div></div><hr><div id="dynamic_field"> <div class="row mx-auto"> <div class="col-md-3"> <div class="form-group"> <label for="formula">Sub Ingredient Name :</label>{{-- Data from backend --}}<select class="form-control" name="formula" id="formula"> <option value="-1" disabled="true" selected="true">Select ingredient first </option> </select> </div></div><div class="col-md-2"> <div class="form-group"> <label for="min-formula">Min :</label> <input type="text" class="form-control" id="min-formula" placeholder="Min %"> </div></div><div class="col-md-2"> <div class="form-group"> <label for="max-formula">Max :</label> <input type="text" class="form-control" id="max-formula" placeholder="Max %"> </div></div><div class="col-md-3"> <div class="form-group"> <label for="option-Select">Phase Name</label> <select class="form-control" id="phase-name"> <option>A</option> <option>B</option> <option>C</option> <option>D</option> <option>E</option> <option>F</option> <option>G</option> <option>H</option> <option>I</option> <option>J</option> <option>K</option> <option>L</option> <option>M</option> <option>N</option> <option>O</option> <option>P</option> <option>Q</option> <option>R</option> <option>S</option> <option>T</option> <option>U</option> <option>V</option> <option>X</option> <option>Y</option> <option>Z</option> </select> </div></div><div class="col-md-1" style="padding-top : 30px"><button type="button" name="add" id="add" class="btn btn-success add-sub-ingredient">+</button> </div></div></div></div></div>');
                    $('#cosmetic_form').append('<div class="card ingredient-container-'+ j +'"> <div class="card-header"> <h5 style="display:inline-block" class="my-2">Ingredient</h5> <button type="button" name="remove_ingredient" id="'+j+'" style="float:right" class="btn btn-danger btn_remove_ingredient">X</button> </div><div class="card-body"> <div class="row"> <div class="col-md-6"> <div class="form-group"> <label for="ingredient-'+ j +'">Ingredient Name :</label>{{-- Data from backend --}}<select class="form-control" name="ingredient" id="ingredient-'+ j +'"> <option value="-1" disabled="true" selected="true">Select Ingredient </option> @foreach ($ingredients as $ingredient) <option value="{{$ingredient->id}}">{{$ingredient->name}}</option> @endforeach </select> </div></div><div class="col-md-3"> <label for="min-ingredient">Min :</label> <div class="input-group"> <input type=" number" class="form-control" name="min_ingredient" id="min-ingredient" placeholder="0.00 %"> <div class="input-group-append"> <span class="input-group-text">%</span> </div></div></div><div class="col-md-3"> <label for="max-ingredient">Max :</label> <div class="input-group"> <input type="number" class="form-control" name="max_ingredient" id="max-ingredient" placeholder="0.00 %"> <div class="input-group-append"> <span class="input-group-text">%</span> </div></div></div></div><div class="row"> <div class="col-md-3"> <div class="form-group"> <label for="min-item">Min Items :</label> <input type="number" class="form-control" name="min_item" id="min-item" placeholder="Minimum Item"> </div></div><div class="col-md-3"> <div class="form-group"> <label for="max-item">Max Items :</label> <input type="number" class="form-control" name="max_item" id="max-item" placeholder="Maximum Item"> </div></div><div class="col-md-3"> <div class="form-group"> <label for="option-Select">Optional</label> <select class="form-control" name="optional" id="option-select"> <option>True</option> <option>False</option> </select> </div></div></div><hr><div id="dynamic_field"> <div class="row mx-auto"> <div class="col-md-3"> <div class="form-group"> <label for="formula">Sub Ingredient Name :</label>{{-- Data from backend --}}<select class="form-control" name="formula" id="formula"> <option value="-1" disabled="true" selected="true">Select ingredient first </option> </select> </div></div><div class="col-md-3"> <label for="min-formula">Min :</label> <div class="input-group"> <input type="number" class="form-control" name="min_formula" id="min-formula" placeholder="0.00 %"> <div class="input-group-append"> <span class="input-group-text">%</span> </div></div></div><div class="col-md-3"> <label for="max-formula">Max :</label> <div class="input-group"> <input type="number" class="form-control" name="max_formula" id="max-formula" placeholder="0.00 %"> <div class="input-group-append"> <span class="input-group-text">%</span> </div></div></div><div class="col-md-2"> <div class="form-group"> <label for="option-Select">Phase</label> <select class="form-control" id="phase-name"> <option>A</option> <option>B</option> <option>C</option> </select> </div></div><div class="col-md-1" style="padding-top : 30px"><button type="button" name="add" id="add" class="btn btn-success add-sub-ingredient">+</button> </div></div></div></div></div>');
                    $("#ingredient-"+j).empty();
                    $("#ingredient-"+j).append('<option value="-1" disabled="true" selected="true">Select Ingredients</option>');
                    
                    $.each(data, function(index, ingredientsObj){
                        if ($('#ingredient').find(":selected").val() == ingredientsObj.id) { return true;}
                        for (let index = 1; index < j; index++) { 
                            if($("#ingredient-"+index).find(":selected").val()==ingredientsObj.id){ return true; } 
                        }
                            
                        $("#ingredient-"+j).append('<option value="'+ ingredientsObj.id +'">'+ ingredientsObj.name +'</option>');
                    })
                }
            });
        });
        $(document).on('click', '.add-sub-ingredient', function(e){
            let ingredient_id = $(this).closest('.card').attr('id');
            let dynamic_field = $(".card[id="+ ingredient_id +"]");
            var that = this;
            $(this).attr("disabled", true);
            setTimeout(function() { enableSubmit(that) }, 1000);

            if (dynamic_field.find('#formula').find(":selected").val() == '-1') {
                swal('Error', 'please select a value first', 'error')

                // console.log('please select a value first');
                return false;
            }
            if(dynamic_field.find("#formula-"+(i)).find(":selected").val() == '-1'){
                swal('Error', 'please select a value first', 'error')

                // console.log('please select a value first');
                return false;
            }
            $.get('/admin/json-formulas?ingredient_id='+ingredient_id, function(data){
                let counter = 0;
                
                data.forEach(formula => {
                    if (dynamic_field.find('#formula').find(":selected").val() == formula.id) { counter++;}
                    for (let index = 1; index <= i; index++) { 
                        if(dynamic_field.find("#formula-"+index).find(":selected").val()==formula.id){ counter++; } 
                    }
                });
                
                if(counter == data.length){
                    swal("Can't Process", 'No more data to show', 'info')                    
                    // console.log('No more data to show');
                }else {
                    i++;
                    dynamic_field.find('#dynamic_field').append('<div class="row mx-auto sub-ingredient-'+i+'" > <div class="col-md-3" >     <div class="form-group">  <label for="formula-'+ i +'">Sub Ingredient Name :</label>{{-- Data from backend --}} <select class="form-control" id="formula-'+ i +'" name="formula" ></select></div></div><div class="col-md-3"> <label for="min-formula">Min :</label> <div class="input-group"> <input type="number" class="form-control" name="min_formula" id="min-formula" placeholder="0.00 %"> <div class="input-group-append"> <span class="input-group-text">%</span> </div></div></div><div class="col-md-3"> <label for="max-formula">Max :</label> <div class="input-group"> <input type="number" class="form-control" name="max_formula" id="max-formula" placeholder="0.00 %"> <div class="input-group-append"> <span class="input-group-text">%</span> </div></div></div><div class="col-md-2"><div class="form-group"><label for="option-Select">Phase</label> <select class="form-control" id="phase-name"><option>A</option><option>B</option><option>C</option></select></div></div><div class="col-md-1" style="padding-top : 30px"><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></div></div>');
                    dynamic_field.find("#formula-"+i).empty();
                    dynamic_field.find("#formula-"+i).append('<option value="-1" disabled="true" selected="true">Select Sub Ingredients</option>');
                    
                    $.each(data, function(index, formulasObj){
                        if (dynamic_field.find('#formula').find(":selected").val() == formulasObj.id) {return true;}
                        for (let index = 1; index < i; index++) {
                            if(dynamic_field.find("#formula-"+index).find(":selected").val() == formulasObj.id){return true;}
                        }

                        dynamic_field.find("#formula-"+i).append('<option value="'+ formulasObj.id +'">'+ formulasObj.name +'</option>');
                    })
                }
            });     
        });

        $(document).on('click', '.btn_remove', function(){
            var button_id = $(this).attr("id"); 
            $('.sub-ingredient-'+button_id+'').remove();
        });

        $(document).on('click', '.btn_remove_ingredient', function(){
            var button_id = $(this).attr("id"); 
            $('.ingredient-container-'+button_id+'').remove();
        });

        $(document).on('change', 'select[name=ingredient]', function(e){
            var ingredient_id = e.target.value;
            var changed_selector = e.target.attributes.id.value;
            $(this).closest(".row").closest(".card").attr("id",ingredient_id);
            $(this).closest(".row").closest(".card").css({ "border": "2px solid red"})
            $(".add-ingredient").attr('disabled', false);
            let formula = $(".card[id="+ ingredient_id +"]").find("select[name=formula]")
            $.get('/admin/json-formulas?ingredient_id='+ingredient_id, function(data){
                formula.empty();
                formula.append('<option value="-1" disabled="true" selected="true">Select Sub Ingredients</option>');
                
                $.each(data, function(index, formulasObj){
                    formula.append('<option value="'+ formulasObj.id +'">'+ formulasObj.name +'</option>');
                })
            })
        });
        $(document).on('change', 'select[name=formula]', function(e){
            var ingredient_id = $(this).closest('.card').attr('id');
            var formula_id = e.target.value;
            $(this).closest('.row').attr('id', formula_id);
        });
        
    });

    
    

</script>
@endsection