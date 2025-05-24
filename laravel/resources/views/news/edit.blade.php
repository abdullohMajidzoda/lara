@extends('layouts.main')
@section('content')
    <div class="container">
        <div class="row">
            <form action="{{route('update_news', $news->id)}}" method="post">
                @csrf
                @method('patch')
                <div class="mb-3">
                    <label for="content" class="form-label">News:</label>
                    <input type="text" name="content" class="form-control" id="content" value="{{$news->content}}" placeholder="News">
                </div>
                <div class="mb-3">
                    <label for="slug_news" class="form-label">News From</label>
                    <input type="text" name="slug_news" class="form-control" id="slug_news" value="{{ $news->slug_news }}" placeholder="Slug">
                </div>
                <div class="form-group">
                    <label for="city_id">Select City</label>
                    <select class="form-control" id="city_id" name="city_id">
                        @foreach ($cities as $city)
                            <option
                            {{ $city->id === $news->city_id ? 'selected' : '' }}
                            value="{{ $city->id }}"> {{ $city->slug }} </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-auto">
                    <button type="submit" class="btn btn-primary mb-3">Update News</button>
                </div>
            </form>
        </div>
    </div>
@endsection