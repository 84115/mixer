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

            @if(null !== $related)
                <h6 class="card-title">Cocktails</h6>
                <ul>
                    @foreach ($related as $related)
                        <li>
                            <a href="{{ url("cocktails/{$related->url}") }}">{{ $related->name }}</a> - ({{ str_replace(',', ', ', $related->ingredients) }})
                        </li>
                    @endforeach
                </ul>
            @endif

            <form method="POST" action="{{ route('ingredients.destroy', [ 'ingredient' => $ingredient->id ]) }}" style="display:inline">
                @csrf
                @method('DELETE')
                <button type="submit" value="Submit" class="btn btn-danger">Delete</button>
            </form>
            <a href="{{ url("ingredients") }}" class="btn btn-warning">Back</a>
        </div>
    </div>
@endsection
