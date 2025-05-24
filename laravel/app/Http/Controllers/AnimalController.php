<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAnimalRequest;
use App\Http\Requests\UpdateAnimalRequest;
use Illuminate\Http\Request;
use App\Models\Animal;
use App\Models\Category;

class AnimalController extends Controller
{
    public function animal(){
        $animals = Animal::all();
        
        // $animal = Animal::find(1);
        // foreach($categories as $category){
        //     echo "$category->title <br>";
        //     foreach($category->animal as $animal){
        //         echo "$animal->breed <br>";
        //     }
        //     echo '<hr>';
        //     // dd($category->toArray());
        // }
        // die;
        // dd($category->animal->toArray());
        return view('animal.index', compact('animals'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('animal.create', compact('categories'));
    }


    public function store(StoreAnimalRequest $request){
        // $data = request()->validate([
        //     'breed'=>'string',
        //     'name'=>'string',
        //     'category_id'=>'',
        // ]);
        Animal::create($request->all());
        return redirect()->route('animal.index');
    }


    public function show(Animal $animal){
        return view('animal.show', compact('animal'));
    }

    public function edit(Animal $animal){
        $categories = Category::all();
        return view('animal.edit', compact('animal', 'categories'));
    }

    public function update(UpdateAnimalRequest $request ,Animal $animal){
        // $data = request()->validate([
        //     'breed'=>'string',
        //     'name'=>'string',
        //     'category_id'=>'',
        // ]);
        $animal->update($request->all());
        return redirect()->route('animal.show', $animal->id);
    }

    public function destroy(Animal $animal){
        $animal->delete();
        return redirect()->route('animal.index');
    }

}
