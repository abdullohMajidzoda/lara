@extends('layouts.main')
@section('content')
    <div class="container">
        <div class="row">
            <form action="{{route('animal.store')}}" method="post">
                @csrf
                <div class="mb-3">
                    <label for="breed" class="form-label">Breed</label>
                    <input value="{{old('breed')}}" type="text" name="breed" class="form-control" id="breed" placeholder="Breed">
                    @error('breed')
                        <p class="text-danger"> {{ $message }} </p>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" value="{{old('name')}}" name="name" class="form-control" id="name" placeholder="Name">
                    @error('name')
                        <p class="text-danger"> {{ $message }} </p>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="category">Category</label>
                    <select class="form-control" id="category" name="category_id">
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}"> {{ $category->title }} </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-auto">
                    <button type="submit" class="btn btn-primary mb-3">Create</button>
                </div>
            </form>
        </div>
    </div>
@endsection