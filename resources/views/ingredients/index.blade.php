@extends('layouts.default')

@section('title', "Ingredients: {$ingredients->count()}")

@section('content')
    <div class="card-columns">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Browse By</h5>
                <a href="{{ url("ingredients-types") }}" class="btn btn-warning">Type</a>
            </div>
        </div>
        @foreach ($ingredients as $ingredient)
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">{{ $ingredient->name }}</h5>
                    <h6 class="card-subtitle mb-2 text-muted">
                        <a href="{{ url("ingredients-type").'/'.urlencode($ingredient->type) }}">{{ $ingredient->type }}</a>
                        {{ $ingredient->alcoholic && $ingredient->abv ? "$ingredient->abv%" : '' }}
                    </h6>
                    <p class="card-text">{{ Str::limit($ingredient->description, 160) }}</p>
                    <a href="{{ url("ingredients").'/'.urlencode($ingredient->name) }}" class="btn btn-warning">View</a>
                </div>
            </div>
        @endforeach
    </div>
@endsection
