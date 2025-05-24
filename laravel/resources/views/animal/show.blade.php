@extends('layouts.main')
@section('content')
    <div class="container">
           <div> {{$animal->id}} . {{ $animal->breed }}</div>
           <div>{{$animal->name}}</div>
    </div>
    <div>
        <a class="btn btn-primary" href="{{ route('animal.edit', $animal->id) }}">Edit</a>
    </div>
    <div>
        <form action="{{ route('animal.delete', $animal->id) }}" method="POST">
            @csrf
            @method('delete')
            <input type="submit" value="delete" class="btn btn-danger">
        </form>
    </div>
    <div>
        <a class="btn btn-success" href="{{ route('animal.index') }}">Back</a>
    </div>
@endsection