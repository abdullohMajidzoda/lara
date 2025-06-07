@extends('layouts.main');
@section('content')
    {{-- <h1>THIS IS ABOUT PAGE</h1> --}}

    @foreach ($news as $item)
         <h3> {{ $item->content }}</h3>
      @endforeach
@endsection