@extends('layouts.default')

@if (isset($title))
    @section('title', "Cocktails: $title")
@else
    @section('title', "Cocktails: $cocktail->name")
@endif

@section('content')
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $cocktail->name }}</h5>
            <h6 class="card-subtitle mb-2 text-muted">
                <a href="{{ url("cocktails-type").'/'.urlencode($cocktail->type) }}">{{ $cocktail->type }}</a>
                {{ $cocktail->alcoholic && $cocktail->abv ? "$cocktail->abv%" : '' }}
            </h6>

            @if ($cocktail->image !== '')
                @if (strpos($cocktail->image, 'https://www.thecocktaildb.com') !== false)
                    <img src="{{ "{$cocktail->image}/preview" }}" class="img-thumbnail">
                @else
                    <img src="{{ url("/storage/$cocktail->image") }}" class="img-thumbnail">
                @endif
            @endif

            <p class="card-text">{{ $cocktail->description }}</p>

            @if ($cocktail->video !== '')
            <iframe src="{{ str_replace("watch?v=", "embed/", $cocktail->video) }}" class="img-thumbnail"></iframe>
            @endif

            @if (isset($cocktail->glass))
                <p class="card-text">1 {{ $cocktail->glass }}</p>
            @endif

            <ul>
            @if ($cocktail->ingredient1 !== '' && $cocktail->measure1 !== '')
                <li><a href="{{ url("ingredients").'/'.urlencode($cocktail->ingredient1) }}">{{ $cocktail->ingredient1 }}</a> - <strong>{{ $cocktail->measure1 }}</strong></li>
            @endif
            @if ($cocktail->ingredient2 !== '' && $cocktail->measure2 !== '')
                <li><a href="{{ url("ingredients").'/'.urlencode($cocktail->ingredient2) }}">{{ $cocktail->ingredient2 }}</a> - <strong>{{ $cocktail->measure2 }}</strong></li>
            @endif
            @if ($cocktail->ingredient3 !== '' && $cocktail->measure3 !== '')
                <li><a href="{{ url("ingredients").'/'.urlencode($cocktail->ingredient3) }}">{{ $cocktail->ingredient3 }}</a> - <strong>{{ $cocktail->measure3 }}</strong></li>
            @endif
            @if ($cocktail->ingredient4 !== '' && $cocktail->measure4 !== '')
                <li><a href="{{ url("ingredients").'/'.urlencode($cocktail->ingredient4) }}">{{ $cocktail->ingredient4 }}</a> - <strong>{{ $cocktail->measure4 }}</strong></li>
            @endif
            @if ($cocktail->ingredient5 !== '' && $cocktail->measure5 !== '')
                <li><a href="{{ url("ingredients").'/'.urlencode($cocktail->ingredient5) }}">{{ $cocktail->ingredient5 }}</a> - <strong>{{ $cocktail->measure5 }}</strong></li>
            @endif
            @if ($cocktail->ingredient6 !== '' && $cocktail->measure6 !== '')
                <li><a href="{{ url("ingredients").'/'.urlencode($cocktail->ingredient6) }}">{{ $cocktail->ingredient6 }}</a> - <strong>{{ $cocktail->measure6 }}</strong></li>
            @endif
            @if ($cocktail->ingredient7 !== '' && $cocktail->measure7 !== '')
                <li><a href="{{ url("ingredients").'/'.urlencode($cocktail->ingredient7) }}">{{ $cocktail->ingredient7 }}</a> - <strong>{{ $cocktail->measure7 }}</strong></li>
            @endif
            @if ($cocktail->ingredient8 !== '' && $cocktail->measure8 !== '')
                <li><a href="{{ url("ingredients").'/'.urlencode($cocktail->ingredient8) }}">{{ $cocktail->ingredient8 }}</a> - <strong>{{ $cocktail->measure8 }}</strong></li>
            @endif
            @if ($cocktail->ingredient9 !== '' && $cocktail->measure9 !== '')
                <li><a href="{{ url("ingredients").'/'.urlencode($cocktail->ingredient9) }}">{{ $cocktail->ingredient9 }}</a> - <strong>{{ $cocktail->measure9 }}</strong></li>
            @endif
            @if ($cocktail->ingredient10 !== '' && $cocktail->measure10 !== '')
                <li><a href="{{ url("ingredients").'/'.urlencode($cocktail->ingredient10) }}">{{ $cocktail->ingredient10 }}</a> - <strong>{{ $cocktail->measure10 }}</strong></li>
            @endif
            @if ($cocktail->ingredient11 !== '' && $cocktail->measure11 !== '')
                <li><a href="{{ url("ingredients").'/'.urlencode($cocktail->ingredient11) }}">{{ $cocktail->ingredient11 }}</a> - <strong>{{ $cocktail->measure11 }}</strong></li>
            @endif
            @if ($cocktail->ingredient12 !== '' && $cocktail->measure12 !== '')
                <li><a href="{{ url("ingredients").'/'.urlencode($cocktail->ingredient12) }}">{{ $cocktail->ingredient12 }}</a> - <strong>{{ $cocktail->measure12 }}</strong></li>
            @endif
            @if ($cocktail->ingredient13 !== '' && $cocktail->measure13 !== '')
                <li><a href="{{ url("ingredients").'/'.urlencode($cocktail->ingredient13) }}">{{ $cocktail->ingredient13 }}</a> - <strong>{{ $cocktail->measure13 }}</strong></li>
            @endif
            @if ($cocktail->ingredient14 !== '' && $cocktail->measure14 !== '')
                <li><a href="{{ url("ingredients").'/'.urlencode($cocktail->ingredient14) }}">{{ $cocktail->ingredient14 }}</a> - <strong>{{ $cocktail->measure14 }}</strong></li>
            @endif
            @if ($cocktail->ingredient15 !== '' && $cocktail->measure15 !== '')
                <li><a href="{{ url("ingredients").'/'.urlencode($cocktail->ingredient15) }}">{{ $cocktail->ingredient15 }}</a> - <strong>{{ $cocktail->measure15 }}</strong></li>
            @endif
            </ul>

            @if (isset($cocktail->instructions))
                <p class="card-text">{{ $cocktail->instructions }}</p>
            @endif

            @if (isset($cocktail->user))
                Author: <a href="{{ url("users/{$cocktail->user->id}") }}">{{ $cocktail->user->name }}</a>
                <br>
                <br>

                @if (Auth::id() === $cocktail->user->id)
                    <a href="{{ url("cocktails/{$cocktail->url}/edit") }}" class="btn btn-info">Edit</a>

                    <form method="POST" action="{{ route('cocktails.destroy', [ 'cocktail' => $cocktail->id ]) }}" style="display:inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" value="Submit" class="btn btn-danger">Delete</button>
                    </form>
                @endif
            @endif

            <a href="{{ url("cocktails") }}" class="btn btn-warning">Back</a>
        </div>
    </div>

    @if(null !== $related)
        <br>
        <br>

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Simmilar Drinks</h5>
                <ul>
                    @foreach ($related as $related)
                        <li>
                            <a href="{{ $related->url }}">{{ $related->name }}</a> - ({{ str_replace([','], ', ', $related->ingredients) }})
                        </li>                    
                    @endforeach
                </ul>
            </div>
        </div>
    @endif
@endsection
