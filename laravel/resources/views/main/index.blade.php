@extends('layouts.main');
@section('content')
    <h1>THIS IS MAIN PAGE</h1>
    <ul>
        @foreach ($cities as $city)
            <li>
                <a  href="{{ url("/{$city->slug}") }}" @class(['fw-bold' => session('city') && session('city.slug') == $city->slug])>
                    {{ $city->title }} 
                </a>
            </li>
        @endforeach
    </ul>
@endsection