<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Post;
use App\Models\Student;

class PostController extends Controller
{
    public function index(){
        $res = Post::all();
        // $category = Category::find(1);
        // dd($category->title);
        return view('post.index', compact('res'));
    }

    public function create(){
        return view('post.create');
    }

    public function store(){
        $data = request()->validate([
            'name'=>'string',
            'surname'=>'string',
            'age'=>'integer',
            'weight'=>'integer',
        ]);
        Post::create($data);
        return redirect()->route('post.index');
    }

    public function show(Post $gushlaqa){
        // var_dump($post);
        return view('post.show',compact('gushlaqa'));
    }

    public function edit(Post $gushlaqa){
        return view('post.edit',compact('gushlaqa'));
    }

    public function update(Post $gushlaqa){
        $data = request()->validate([
            'name'=>'string',
            'surname'=>'string',
            'age'=>'integer',
            'weight'=>'integer',
        ]);
        $gushlaqa->update($data);
        return redirect()->route('post.show', $gushlaqa->id);
    }

    public function destroy(Post $gushlaqa){
        $gushlaqa->delete();
        return redirect()->route('post.index');
    }

    public function student(Student $r){
        var_dump($r);
    }
}
