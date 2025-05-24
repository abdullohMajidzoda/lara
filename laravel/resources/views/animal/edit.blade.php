@extends('layouts.main')
@section('content')
    <div class="container">
        <div class="row">
            <form action="{{route('animal.update', $animal->id)}}" method="post">
                @csrf
                @method('patch')
                <div class="mb-3">
                    <label for="breed" class="form-label">Breed</label>
                    <input type="text" name="breed" class="form-control" id="breed" value="{{$animal->breed}}" placeholder="Breed">
                </div>
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" name="name" class="form-control" id="name" value="{{ $animal->name }}" placeholder="Name">
                    {{-- <textarea class="form-control" name="name" id="name" rows="3"></textarea> --}}
                </div>
                <div class="form-group">
                    <label for="category">Category</label>
                    <select class="form-control" id="category" name="category_id">
                        @foreach ($categories as $category)
                            <option
                            {{ $category->id === $animal->category_id ? 'selected' : '' }}
                            value="{{ $category->id }}"> {{ $category->title }} </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-auto">
                    <button type="submit" class="btn btn-primary mb-3">Update</button>
                </div>
            </form>
        </div>
    </div>
@endsection