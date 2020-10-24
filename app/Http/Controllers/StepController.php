<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreStepRequest;
use App\Http\Requests\UpdateStepRequest;
use App\Http\Resources\StepResource;
use App\Models\Receipe;
use App\Models\Step;
use Illuminate\Http\Request;

class StepController extends Controller
{
    public function store(StoreStepRequest $request, Receipe $receipe) {
        $step = new Step();
        $step->text = $request->text;
   

        $receipe->steps()->save($step);

        return new StepResource($step);
    }

    public function show(Step $step) {
     
        return new StepResource($step);
    }

    public function update(UpdateStepRequest $request, Receipe $receipe, Step $step) {

        $step->text = $request->get('text', $step->text); //keep the same value if the value isn't provided
        $step->save();

        return new StepResource($step);
    }

    public function delete(Receipe $receipe, Step $step) {

        $step->delete();

        return response(null, 204);
    }
}
