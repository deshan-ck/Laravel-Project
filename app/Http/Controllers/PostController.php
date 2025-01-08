<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    public function store(Request $request) {

        $validator = Validator::make($request->all(),[
            'title'=> 'required',
            'description'=> 'required',
            'thumbnail'=> 'required|image'

        ]);

        if($validator->fails()){
            return back()->with('status','something went wrong !');
        }else{
            $imageName=time().".".$request->thumbnail->extension();

            $request->thumbnail->move(public_path(path:'thumbnails'), $imageName);
            Post::create([
                'user_id' => auth()->user()->id,
                'title' => $request->title,
                'description' => $request->description,
                'thumbnail'=> $imageName
    
            ]);
        }

        

        return redirect(route('posts.all'))->with('status','post created succesfully !');
    }

    public function show($PostId){

        $Post = Post::findOrFail($PostId);
        return view('posts.show', compact('Post'));
    }

    public function edit($postId){
        $Post = Post::findOrFail($postId);
        return view('posts.edit', compact('Post'));
    }
    public function update($postId, Request $request){
        Post::findOrFail($postId)->update($request->all());
        return redirect(route('posts.all'))->with('status','post updated !');
    }
    public function delete($postId){
        Post::findOrFail($postId)->delete();
        return redirect(route('posts.all'));
    }
    
}