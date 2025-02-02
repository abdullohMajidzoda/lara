@extends('layouts.main')
@section('content')
    <div class="container">
        <div class="row">
            <form action="{{route('post.store')}}" method="post">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" name="name" class="form-control" id="name" placeholder="Name">
                </div>
                <div class="mb-3">
                    <label for="surname" class="form-label">Surname</label>
                    <textarea class="form-control" name="surname" id="surname" rows="3"></textarea>
                </div>
                <div class="mb-3">
                    <label for="age" class="form-label">Age</label>
                    <input type="number" name="age" class="form-control" id="age" placeholder="Age">
                </div>
                <div class="mb-3">
                    <label for="weight" class="form-label">weight</label>
                    <input type="number" name="weight" class="form-control" id="weight" placeholder="weight">
                </div>
                <div class="col-auto">
                    <button type="submit" class="btn btn-primary mb-3">Create</button>
                </div>
            </form>
        </div>
    </div>
@endsection