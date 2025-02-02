@extends('layouts.main')
@section('content')
    <div class="container">
           <div> {{$gushlaqa->id}} . {{ $gushlaqa->name }}</div>
           <div>{{$gushlaqa->surname}}</div>
           <div><a href="{{route('post.edit', $gushlaqa->id)}}">Edit</a></div>
           <div>
            <form action="{{route('post.delete', $gushlaqa->id)}}">
                @csrf
                @method('delete')
                <input type="submit" value="Delete" class="btn btn-danger mt-3">
            </form>
           </div>
           <div><a href="{{route('post.index')}}">Back</a></div>  
    </div>

@endsection