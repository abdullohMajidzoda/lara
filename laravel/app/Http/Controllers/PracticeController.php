<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;
use App\Http\Requests\FilterRequest;

class PracticeController extends Controller
{
    public function index(FilterRequest $request){
        $data = $request->validated();

        $query = News::query();
        if(isset($data['city_id'])){
            $query->where('city_id', $data['city_id']);
        }

        if(isset($data['content'])){
            $query->where('content', 'like', "%{$data['content']}%");
        }
        $news = $query->get();
        dd($news);
        // return view('main.about', compact('news'));
    }
}
