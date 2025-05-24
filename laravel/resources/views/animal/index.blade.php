@extends('layouts.main')
@section('content')
    <div>
        @foreach ($animals as $animal)
        <div><a href="{{route('animal.show', $animal->id)}}"> {{ $animal->id }}.{{$animal->breed}}   {{ $animal->name }}</a></div>
        @endforeach 
        <a href="{{ route('animal.create') }}" class="btn btn-primary">Add</a>
        <p>&copy {{ date('Y') }}</p>
    </div>
@endsection
   