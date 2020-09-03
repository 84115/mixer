@extends('layouts.default')

@section('title', "Ingredients: Create")

@section('content')
    <form method="POST" action="{{ route('ingredients.store') }}">
        @csrf
        @method('POST')

        <div class="container">
            <div class="row">
                <div class="col-sm">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">New Ingredient</h5>

                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" id="name" name="name" aria-describedby="name-help" placeholder="Enter ingredient name">
                                <small id="name-help" class="form-text text-muted">Try thinkng of something creative.</small>
                            </div>

                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea class="form-control" id="description" name="description" aria-describedby="description-help" placeholder="Enter ingredient description" rows="3"></textarea>
                                <small id="description-help" class="form-text text-muted">description help text.</small>
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
