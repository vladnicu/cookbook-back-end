<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTagRequest;
use App\Http\Requests\UpdateTagRequest;
use App\Http\Resources\TagResource;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function index() {
        return TagResource::collection(Tag::all());
    }

    public function store(StoreTagRequest $request) {

        $tag = new Tag();
        $tag->name = $request->name;

        $user = User::find($request->user);
        $tag->user()->associate($user);

        // $tag->user()->associate($request->user());

        $tag->save();

        return new TagResource($tag);
    }

    public function show(Tag $tag) {
        return new TagResource($tag);
    }


    public function update(UpdateTagRequest $request, Tag $tag) {

        $tag->title = $request->get('title', $tag->title); //keep the same value if the value isn't provided

        $tag->save();

        return new TagResource($tag);
    }

    public function delete(Tag $tag) {
        $tag->delete();

        return response(null, 204);
    }
}
