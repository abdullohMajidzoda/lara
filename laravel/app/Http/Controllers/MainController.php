<?php

namespace App\Http\Controllers;


use App\Http\Requests\StoreNewsRequest;
use App\Http\Requests\UpdateNewsRequest;
use Illuminate\Http\Request;
use App\Models\City;
use App\Models\News;

class MainController extends Controller
{
    public function index(){
        // dump($city);

        // if(!$city && session('city')){
        //     return redirect()->route('index', session('city.slug'));
        // }

        // if($city){
        //     $city_data = City::where('slug', '=', $city)->firstOrFail();
        //     session(['city' => $city_data ]);
        // }

        $cities = City::all();
        return view('main.index', compact('cities'));
    }

    public function about(){
        return view('main.about');
    }

    public function news(){
        $cities = City::with('news')->get();
        return view('main.news', compact('cities'));
    }

    public function create_news(){
        $cities = City::all();
        return view('news.create', compact('cities'));
    }

    public function store_news(StoreNewsRequest $request){
        News::create($request->all());
        return redirect()->route('news');
    }

    public function show_news(News $news){
        return view('news.show', compact('news'));
    }

    public function edit_news(News $news){
        $cities = City::all();
        return view('news.edit', compact('news', 'cities'));
    }

    public function update_news(UpdateNewsRequest $request, News $news){
        $news->update($request->all());
        return redirect()->route('show_news', $news->id);
    }

    public function destroy_news(News $news){
        $news->delete();
        return redirect()->route('news');
    }

}
