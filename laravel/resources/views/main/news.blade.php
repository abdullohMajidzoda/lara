@extends('layouts.main');
@section('content')
<div class="container">
    @if (!session('city'))
    <h2 class="fw-bold text-danger" ><div class="alert alert-danger" role="alert">All News</div></h2>
    @endif
    @if (session('city'))
        
    @foreach ($cities as $city)
        @if (session('city.slug') == $city->slug)
        <h2 class="fw-bold text-danger" ><div class="alert alert-danger" role="alert">News From {{$city->title}}</div></h2>
        @endif
        @foreach ($city->news as $news)
            @if (session('city.slug') == $news->slug_news)
            <h3><a class="link-danger link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover" href="{{ route('show_news', $news->id) }}">{{$news->content}}</a></h3>
            @endif
        @endforeach
    @endforeach 
    @else
    @foreach ($cities as $city)
        @foreach ($city->news as $news)
            
            <h3><a class="link-danger link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover" href="{{ route('show_news', $news->id) }}">{{$news->content}}</a></h3>

        @endforeach
    @endforeach    
    @endif
    <div>
        <a href="{{ route('create_news') }}" class="btn btn-danger">Add News</a>
    </div>
</div>
   
@endsection