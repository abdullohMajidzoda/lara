@extends('layouts.main')
@section('content')
    <div class="container">
        <div><a class="btn btn-primary" href="{{route('post.create')}}">ADD</a></div>
       @foreach ($res as $item)
           <div> <a href="{{route('post.show',$item->id)}}">{{$item->id}} . {{ $item->name }}</a></div>
       @endforeach
    </div>
@endsection