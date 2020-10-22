<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreReceipeRequest;
use App\Http\Requests\UpdateReceipeRequest;
use App\Http\Resources\ReceipeResource;
use App\Models\Receipe;
use App\Models\User;
use Illuminate\Http\Request;

class ReceipeController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth:api');
    // }

    public function index() {
        return ReceipeResource::collection(Receipe::all());
    }

    public function store(StoreReceipeRequest $request) {

        $receipe = new Receipe();
        $receipe->title = $request->title;

        $user = User::find($request->user);
        $receipe->user()->associate($user);

        $receipe->save();

        return new ReceipeResource($receipe);
    }

    public function show(Receipe $receipe) {
        return new $receipe;
    }


    public function update(UpdateReceipeRequest $request, Receipe $receipe) {

        $receipe->title = $request->get('title', $receipe->title); //keep the same value if the value isn't provided

        $receipe->save();

        return new ReceipeResource($receipe);
    }

    public function delete(Receipe $receipe) {
        $receipe->delete();

        return response(null, 204);
    }
}
