@extends('layouts.default')

@section('title', "Ingredient: $ingredient->name")

@section('content')
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $ingredient->name }}</h5>
            <h6 class="card-subtitle mb-2 text-muted">
                <a href="{{ url("ingredients-type/").'/'.urlencode($ingredient->type) }}">{{ $ingredient->type }}</a>
                {{ $ingredient->alcoholic && $ingredient->abv ? "$ingredient->abv%" : '' }}
            </h6>
            <p class="card-text">{{ $ingredient->description }}</p>
            <a href="{{ url("ingredients") }}" class="btn btn-warning">Back</a>
        </div>
    </div>
@endsection
