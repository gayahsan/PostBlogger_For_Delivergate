<?php

namespace App\Http\Controllers;

use App\Models\post;
use Dotenv\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator as FacadesValidator;

class postController extends Controller
{
    public function store(Request $request){


        $validator = FacadesValidator::make($request->all(), [
            'title' => 'required',
            'description' => 'required'
    ]);

        if($validator -> fails()){
            return back() -> with('status', 'Something Went Wrong!');
        } else {
            post::create([
                'user_id' => auth()->user()->id,
                'title' => $request->title,
                'description' => $request->description
            ]);
        }

       

        return redirect(route('posts.all'))->with('status', 'Post Created Successfully!');
    }

    public function show($postId){

        $post = post::findOrFail($postId);

        return view('posts.show', compact('post'));
    }

    public function edit($postId){

        $post = post::findOrFail($postId);
        return view('posts.edit', compact('post'));

    }

    public function update($postId, Request $request){
        post::findOrFail($postId)->update($request->all());
        return redirect(route('posts.all'))->with('status', 'Post Updated!');
    }

    public function delete($postId){
        post::findOrFail($postId)->delete();
        return redirect(route('posts.all'));
    }

}
