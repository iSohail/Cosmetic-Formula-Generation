<div class="card" style=" margin : 15px 30px ">
    <div class="card-body"><strong>Cosmetic: </strong>{{$cosmetic->name}}</div>
</div>

<div class="card" style=" margin : 15px 30px ">
    <div class="card-header">
        <h5>
            Ingredients
        </h5>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Ingredient</th>
                        <th scope="col">Percentage</th>
                        <th scope="col">Phase</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($formulas as $formula)
                    <tr>
                        <td>{{$formula->name}}</td>
                        <td>{{$formula->percentage_used}}%</td>
                        <td>{{$formula->phase_name}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="card" style=" margin : 15px 30px ">
    <div class="card-header">
        <h5>
            Methods
        </h5>
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Step Num</th>
                        <th scope="col">Description</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($methods as $method)
                    <tr>
                        <td style="width:  11%">{{$method->step_num}}</td>
                        <td>{{$method->description}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
<div class="container px-4">
    <div class="row">
        <div class="col-sm-12">
            <button class="btn btn-primary mx-3 my-3" style="float:right">Print</button>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-11 mx-auto">
            <strong>Disclaimer:</strong>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatem similique vero velit placeat mollitia
                accusamus laudantium! Assumenda laudantium perferendis veniam libero neque, enim, quibusdam illum est
                officiis soluta eos dolore!</p>
        </div>
    </div>
</div>