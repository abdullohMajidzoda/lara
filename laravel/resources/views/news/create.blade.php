@extends('layouts.main');
@section('content')
<div class="container">
    <div class="row">
        <form action="{{route('store_news')}}" method="post">
            @csrf
            <div class="mb-3">
                <label for="content" class="form-label">News:</label>
                <input value="{{old('content')}}" type="content" name="content" class="form-control" id="content" placeholder="News">
                @error('content')
                    <p class="text-danger"> {{ $message }} </p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="slug_news" class="form-label">News From:</label>
                <input type="slug_news" value="{{old('slug_news')}}" name="slug_news" class="form-control" id="slug_news" placeholder="Slug">
                @error('slug_news')
                    <p class="text-danger"> {{ $message }} </p>
                @enderror
            </div>
            <div class="form-group">
                <label for="city_id">Slect City</label>
                <select class="form-control" id="city_id" name="city_id">
                    @foreach ($cities as $city)
                        <option value="{{ $city->id }}"> {{ $city->slug }} </option>
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