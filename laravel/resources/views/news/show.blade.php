@extends('layouts.main')
@section('content')
<div class="container">
    <h2 class="fw-bold text-danger" ><div class="alert alert-danger" role="alert">News From {{$news->slug_news}}</div></h2>
        <h2 class="text-danger">
            {{ $news->content }}
        </h2>
    <div>
        <a class="btn btn-danger" href="{{ route('edit_news', $news->id) }}">Update News</a>
    </div>
    <div>
        <form action="{{ route('destroy_news', $news->id) }}" method="POST">
            @csrf
            @method('delete')
            <input type="submit" value="delete" class="btn btn-danger">
        </form>
    </div>

        <a class="btn btn-success" href="{{ route('news') }}">Back</a>
    </div>
@endsection