@extends('layouts.default')

@section('title', "Cocktails: Create")

@section('content')
    {{-- <form method="POST" action="/cocktails/store"> --}}
    <form method="POST" action="{{ route('cocktails.store') }}" enctype="multipart/form-data">
        @csrf
        @method('POST')

        <div class="container">
            <div class="row">
                <div class="col-sm">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">New Cocktail</h5>

                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" id="name" name="name" aria-describedby="name-help" placeholder="Enter cocktail name">
                                <small id="name-help" class="form-text text-muted">Try thinkng of something creative.</small>
                            </div>

                            <div class="form-group">
                                <label for="category">Category</label>
                                <select class="form-control" id="category" name="category" aria-describedby="category-help" placeholder="Enter cocktail category">
                                    @foreach ($datum['category'] as $category)
                                        @if($category !== '')
                                            <option value="{{ $category }}">{{ $category }}</option>
                                        @endif
                                    @endforeach
                                </select>
                                <small id="category-help" class="form-text text-muted">category help text.</small>
                            </div>

                            <div class="form-group">
                                <label for="glass">Glass</label>
                                <select class="form-control" id="glass" name="glass" aria-describedby="glass-help" placeholder="Enter cocktail glass">
                                    @foreach ($datum['glass'] as $glass)
                                        @if($glass !== '')
                                            <option value="{{ $glass }}">{{ $glass }}</option>
                                        @endif
                                    @endforeach
                                </select>
                                <small id="glass-help" class="form-text text-muted">glass help text.</small>
                            </div>

                            <div class="form-group">
                                <label for="instructions">Instructions</label>
                                <textarea class="form-control" id="instructions" name="instructions" aria-describedby="instructions-help" placeholder="Enter cocktail instructions" rows="3"></textarea>
                                <small id="instructions-help" class="form-text text-muted">instructions help text.</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <br>

            <div class="row">
                <div class="col-sm">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Ingredients</h5>
                            @foreach (range(1, 15) as $n)
                                <div class="form-group">
                                    <label for="ingredient{{ $n }}">Ingredient {{ $n }}</label>
                                    <select class="form-control" id="ingredient{{ $n }}" name="ingredient{{ $n }}" aria-describedby="ingredient{{ $n }}-help">
                                        @foreach ($datum['ingredients'] as $ingredient)
                                            <option value="{{ $ingredient }}">{{ $ingredient }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="col-sm">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Measures</h5>
                            @foreach (range(1, 15) as $n)
                                <div class="form-group">
                                    <label for="measure{{ $n }}">Measure {{ $n }}</label>
                                    <input type="text" class="form-control" id="measure{{ $n }}" name="measure{{ $n }}" aria-describedby="measure{{ $n }}-help">
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

            <br>

            <div class="row">
                <div class="col-sm">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="image">Image</label>
                                <input type="file" class="form-control" id="image" name="image" aria-describedby="image-help" placeholder="Enter cocktail image">
                                <small id="image-help" class="form-text text-muted">Upload an image if you want but it would be preferable.</small>
                                @if($errors->first('image'))
                                    <div class="alert alert-warning">{{ $errors->first('image') }}</div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <br>

            <div class="row">
                <div class="col-sm">
                    <button type="submit" class="btn btn-xl btn-block btn-warning">Submit</button>
                </div>
            </div>

            <br>
        </div>
    </form>
@endsection
