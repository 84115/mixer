@extends('layouts.default')

@section('title', "Cocktails: Update {$cocktail->name}")

@section('content')
    <form method="POST" action="{{ route('cocktails.update', [ 'cocktail' => $cocktail->id ]) }}" enctype="multipart/form-data">
        @csrf
        @method('PATCH')

        <div class="container">
            <div class="row">
                <div class="col-sm">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Update Cocktail</h5>

                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" id="name" name="name" aria-describedby="name-help" placeholder="Enter cocktail name" value="{{ $cocktail->name }}">
                                <small id="name-help" class="form-text text-muted">Try thinkng of something creative.</small>
                            </div>

                            <div class="form-group">
                                <label for="category">Category</label>
                                <select class="form-control" id="category" name="category" aria-describedby="category-help" placeholder="Enter cocktail category">
                                    @foreach ($datum['category'] as $category)
                                        @if($category !== '')
                                            <option {{ $cocktail->category === $category ? 'selected' : '' }} value="{{ $category }}">{{ $category }}</option>
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
                                            <option {{ $cocktail->glass === $glass ? 'selected' : '' }} value="{{ $glass }}">{{ $glass }}</option>
                                        @endif
                                    @endforeach
                                </select>
                                <small id="glass-help" class="form-text text-muted">glass help text.</small>
                            </div>

                            <div class="form-group">
                                <label for="instructions">Instructions</label>
                                <textarea class="form-control" id="instructions" name="instructions" aria-describedby="instructions-help" placeholder="Enter cocktail instructions" rows="3">{{ $cocktail->instructions }}</textarea>
                                <small id="instructions-help" class="form-text text-muted">instructions help text.</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm">
                    <button type="submit" class="btn btn-xl btn-block btn-warning">Submit</button>
                </div>
            </div>

            <br>
        </div>
    </form>
@endsection
