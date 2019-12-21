@extends('layouts.user')

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

    body {
        font-family: Calibri;
        font-size: 18px;
        padding: 10px;
    }

    #hyperlink {
        color: black;
        font-weight: 500;
        -webkit-transition: -webkit-transform 0.2s;
        transition: transform 0.2s;
        display: inline-block;
        text-decoration: none;
        position: relative;
    }

    #hyperlink:hover {
        -webkit-transform: scale(0.9);
        transform: scale(0.9);
    }

    #hyperlink::before {
        position: absolute;
        top: -2px;
        left: -7px;
        box-sizing: content-box;
        padding: 0 5px;
        width: 100%;
        height: 100%;
        border: 2px solid black;
        content: '';
        opacity: 0;
        -webkit-transition: opacity 0.2s, -webkit-transform 0.2s;
        transition: opacity 0.2s, transform 0.2s;
        -webkit-transform: scale(0.9);
        transform: scale(0.9);
    }

    #hyperlink:hover::before {
        opacity: 1;
        -webkit-transform: scale(1.2);
        transform: scale(1.2);
    }
</style>

<section class="content-header">
    <div class="header-icon">
        <i class="fas fa-briefcase"></i>
    </div>
    <div class="header-title">
        <h1>Create New Formula</h1>
        <small>Add New Formula</small>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fas fa-home"></i> Home</a></li>
            {{-- <li><a href="#"></a></li> --}}
            <li class="active">Add Formula</li>
        </ol>
    </div>
</section>
<div id="create_cosmetic_formula" class="col-md-12 mx-auto" style="max-width:1200px">
    <div>
        <h5 class="mx-auto my-4 text-center">Create Formula for {{$cosmetic->name}}</h5>
    </div>
    <div id="accordion">
        @foreach ($ingredients as $ingredient)
        {{-- ingredient db --}}
        <div class="card" id="card-{{$ingredient->ingredient_id}}">
            <div class="card-header">
                <a class="card-link" id="hyperlink" data-toggle="collapse" href="#i-{{$ingredient->ingredient_id}}">
                    {{-- db --}}

                    <span style="font-size : 20px"><i class="fas fa-chevron-down fa-1x mx-2"></i>{{$ingredient->name}}
                        <small>(<span id="ingredient-percentage">0.00</span>%)</small></span>
                    <div style="font-size:14px">( min: {{$ingredient->min_percentage}} | max:
                        {{$ingredient->max_percentage}} )</div>
                </a>
                {{-- jquery --}}
                <div style="float : right;">

                    <div class="btn btn-success">Select <span class="count">0</span> items of
                        {{$ingredient->max_item}}
                    </div>
                    <div style="font-size:14px; text-align:center">
                        @if ($ingredient->min_item == 0)
                        <p class="mb-0 mt-1" style="color: forestgreen">Optional</p>
                        @else
                        <p class="mb-0 mt-1" style="color: red">Required at least {{$ingredient->min_item}}</p>
                        @endif

                    </div>
                </div>
            </div>
            <div id="i-{{$ingredient->ingredient_id}}" class="collapse" data-parent="#accordion">
                <div class="card-body">
                    <div class="table-responsive" style="font-size:16px">
                        <table class="table text-center">
                            <thead>
                                <tr>
                                    <th scope="col">Select</th>
                                    <th scope="col">Ingredient Name</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Percentage</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($formulas as $formula)
                                @if ($formula->ingredient_id == $ingredient->ingredient_id)
                                <tr id="{{$formula->formula_id}}">
                                    <td scope="row">
                                        <div class="form-check">
                                            <input type="checkbox" style="zoom: 1.5;" id="checkbox"
                                                class="checkbox-group">
                                        </div>
                                    </td>
                                    <td style="width: 16.66%">{{$formula->name}}<br /><small>( min:
                                            {{$formula->min_percentage}} | max:
                                            {{$formula->max_percentage}} )</small></td>
                                    <td>{{$formula->description}}</td>
                                    <td style="width:  8.33%"><input type="number" disabled class="form-control"
                                            placeholder="0.00%" id="formula_percentage" name="formula_percentage">
                                    </td>
                                </tr>
                                @endif
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <button type="button" class="btn btn-primary my-3" style="float:right" id="submit_btn">Create Formula</button>
</div>


<script>
    $(document).ready(function() {
        dataCosmetic = {!! str_replace("'", "\'", json_encode($cosmetic)) !!};
        dataIngredient = {!! str_replace("'", "\'", json_encode($ingredients)) !!};
        dataFormula = {!! str_replace("'", "\'", json_encode($formulas)) !!};
        let ingredientPercentage = {};
        let formulaPercentage = {};

        $("#submit_btn").click(function(e){
            let cosmetics = {}
            cosmetics['cosmetic_id'] = dataCosmetic.id
            cosmetics['cosmetic_name'] = dataCosmetic.name
            let ingredients = []
            
            $(".checkbox-group:checked").each(function( index, value ){
                let formula = $(value.closest('tr'))
                let formula_id = $(value.closest('tr')).attr('id')
                let ingredient = $(value.closest('.card'));
                let ingredient_id = ingredient.attr("id").replace('card-', '');
                let ingredientUsed = ingredientPercentage[ingredient_id]

                let formulas = []
                inputsSelector = formula.find('input[name="formula_percentage"]');
                inputsSelector.each(function( index ){
                    let phaseName = ''
                    $.each(dataFormula, function( index, value ) {
                        if(value.formula_id == formula_id) {
                            phaseName = value.phase_name;
                        }
                    });
                    let formulaUsed = $(this).val()
                    let formula = {
                        formula_id,
                        formulaUsed,
                        phaseName
                    }
                    formulas.push(formula)
                });

                let ingredientObj = {
                    ingredient_id,
                    ingredientUsed,
                    formulas
                }
                ingredients.push(ingredientObj)
            });
            cosmetics["ingredients"] = ingredients;
            let appropriateFlag = true;
            let requiredFlag = true;
            let allOkFlag = true;
            cosmetics["ingredients"].forEach(ingredient => {
                ingredient["formulas"].forEach(formula => {
                    if(!(formula.formulaUsed > 0)){
                        swal('Error', 'Please select appropriate value for Ingredients', 'error')
                        appropriateFlag = false;
                        allOkFlag = false;
                        return false;
                    }
                })
                if(!appropriateFlag){
                    return false;
                }
            });
            if (cosmetics["ingredients"].length <= 0) {
                swal('Error', 'Please select all required Ingredients', 'error')
                allOkFlag = false;
                return false;
            }
            dataIngredient.forEach(element => {
                if(!(cosmetics["ingredients"].findIndex(x => x.ingredient_id === element.ingredient_id) == -1)){
                    let ingredient_percent_check = cosmetics["ingredients"].find(x => x.ingredient_id === element.ingredient_id).ingredientUsed;
                    if(!(ingredient_percent_check >= element.min_percentage && ingredient_percent_check <= element.max_percentage)){
                        swal('Error', 'Please select appropriate value for ' + element.name, 'error')
                        allOkFlag = false;
                        return false;
                    }
                }
                
                if(requiredFlag && element.min_item > 0){
                    if(cosmetics["ingredients"].findIndex(x => x.ingredient_id === element.ingredient_id) == -1){
                        swal('Error', 'Please select all required Ingredients', 'error')
                        allOkFlag = false;
                        requiredFlag = false;
                        return false;
                    }
                }
            });
            
            if(allOkFlag){
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: '/cosmetics/create',
                    method: 'post',
                    dataType: 'JSON',
                    data:  cosmetics,
                    success:function(data){
                        swal('Success', data.success, 'success');
                        $('#create_cosmetic_formula').html(data.view);        
                    },
                    error: function(data){
                        swal('Error', data.error, 'error')
                    }
                });
            }
        })

        $(document).on('change', '.checkbox-group', function(e) {
            let card = $(this).closest('.card');
            let cardId = card.attr("id").replace('card-', '');
            let maxItem = 0;
            $.each(dataIngredient, function( index, value ) {
                if(value.ingredient_id == cardId) {
                    maxItem = value.max_item;
                }
            });
            if(card.find(".checkbox-group:checked").length <= maxItem){
                card.find('.count').text(card.find(".checkbox-group:checked").length); // Show Number of counts of checkboxes
                let row = $(this).closest('tr');
                let checkState = row.find(".checkbox-group").is(':checked')
                if(checkState){
                    row.find("input[name=formula_percentage]").prop('disabled', false)
                } else{
                    let inputValue = row.find("input[name=formula_percentage]").val();
                    if(inputValue) {
                        let original = card.find('#ingredient-percentage').text();
                        let toLess = row.find("input[name=formula_percentage]").val();
                        let newValue = parseFloat(original) - parseFloat(toLess)
                        card.find('#ingredient-percentage').text(newValue)
                        ingredientPercentage[String(cardId)] = newValue
                        console.log(ingredientPercentage);
                    }
                    row.find("input[name=formula_percentage]").val("");
                    row.find("input[name=formula_percentage]").attr('disabled', 'disabled')
                    
                }
            } else{
                $(e.target).prop('checked', false);
                swal('Error', 'Maximum Item selection limit is : ' + maxItem, 'error')
            }
            
        });
        
        $(document).on('change', 'input[name="formula_percentage"]', function(e) {
            var that = this;
            let card = $(this).closest('.card');
            let percentageValue = parseFloat(0).toFixed(2);
            let cardId = card.attr("id").replace('card-', '');
            let maxPercentage = 0;
            let maxFormulaPercentage = 0;
            let minFormulaPercentage = 0;
            let formula_name = '';
            let formula_id = $(this).closest('tr').attr('id')
            $.each(dataIngredient, function( index, value ) {
                if(value.ingredient_id == cardId) {
                    maxPercentage = value.max_percentage;
                    $.each(dataFormula, function( index, value ) {
                        if(value.formula_id == formula_id) {
                            maxFormulaPercentage = value.max_percentage;
                            minFormulaPercentage = value.min_percentage;
                            formula_name = value.name;
                        }
                    });
                }
            });
            inputsSelector = card.find('input[name="formula_percentage"]');
            inputsSelector.each(function( index ){
                if($( this ).val()){
                    let percentage = $( this ).val();
                    percentageValue = parseFloat(percentageValue) + parseFloat(percentage);
                    percentageValue = percentageValue.toFixed(2);
                }
            });
            if($(this).val() <= maxFormulaPercentage && $(this).val() >= minFormulaPercentage) {
                if(percentageValue <= maxPercentage){
                    $('input[name="formula_percentage"]').css('border-color', '#ced4da')
                    card.find('#ingredient-percentage').text(percentageValue); // Percentage of formula item
                    ingredientPercentage[String(cardId)] = percentageValue
                }
                else{
                    e.target.value = "";
                    $(e.target).css('border-color', 'red');
                    swal('Error', 'Maximum limit reached for Ingredient', 'error')
                }
            }
            else{
                e.target.value = "";
                $(e.target).css('border-color', 'red');
                swal('Error', formula_name + ' should be between ' + minFormulaPercentage + ' and ' + maxFormulaPercentage, 'error')
            }
        });
    });
</script>
@endsection