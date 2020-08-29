@extends('layouts.default')

@section('title', $name)

@section('content')
    <div class="card-columns">
        @foreach ($items as $item)
            @if($item !== '')
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">{{ $item }}</h5>
                    <a href="{{ url($link).'/'.urlencode($item) }}" class="btn btn-warning mt-2">View</a>
                </div>
            </div>
            @endif
        @endforeach
    </div>
@endsection
