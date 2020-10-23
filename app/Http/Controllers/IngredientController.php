<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreIngredientRequest;
use App\Http\Requests\UpdateIngredientRequest;
use App\Http\Resources\IngredientResource;
use App\Models\Ingredient;
use App\Models\Receipe;
use Illuminate\Http\Request;

class IngredientController extends Controller
{
    public function store(StoreIngredientRequest $request, Receipe $receipe) {
        $ingredient = new Ingredient();
        $ingredient->name = $request->name;
   

        $receipe->ingredients()->save($ingredient);

        return new IngredientResource($ingredient);
    }

    public function show(Ingredient $ingredient) {
     
        return new IngredientResource($ingredient);
    }

    public function update(UpdateIngredientRequest $request, Receipe $receipe, Ingredient $ingredient) {

        $ingredient->name = $request->get('name', $ingredient->name); //keep the same value if the value isn't provided
        $ingredient->save();

        return new IngredientResource($ingredient);
    }

    public function delete(Receipe $receipe, Ingredient $ingredient) {

        $ingredient->delete();

        return response(null, 204);
    }
}
