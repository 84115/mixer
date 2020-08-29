@extends('layouts.default')

@if (isset($title))
    @section('title', "Cocktails: $title ({$cocktails->count()})")
@else
    @section('title', "Cocktails: {$cocktails->count()}")
@endif

@section('content')
    @if(isset($filters))
        <h4 class="mt-4 mb-2">Filter Drinks</h4>
        <select class="custom-select" id="first">
        <option value="" selected>-- Select Ingredient 1 --</option>
            @foreach ($filters as $filter)
                @if($filter !== '')
                    <option value="{{ $filter }}">{{ $filter }}</option>
                @endif
            @endforeach
        </select>
        <br><br>

        <select class="custom-select" id="second">
        <option value="" selected>-- Select Ingredient 2 --</option>
            @foreach ($filters as $filter)
                @if($filter !== '')
                    <option value="{{ $filter }}">{{ $filter }}</option>
                @endif
            @endforeach
        </select>
        <br><br>

        <select class="custom-select" id="third">
        <option value="" selected>-- Select Ingredient 3 --</option>
            @foreach ($filters as $filter)
                @if($filter !== '')
                    <option value="{{ $filter }}">{{ $filter }}</option>
                @endif
            @endforeach
        </select>
        <br><br>

        <button type="button" class="btn btn-info btn-large btn-block" id="trigger">Filter</button>
        <br><br><br>
    @endif

    <div class="card-columns">
        @if(!isset($title))
            @auth
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Create your own!</h5>
                        <a href="{{ url("cocktails/create") }}" class="btn btn-warning">...</a>
                    </div>
                </div>
            @endauth
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Browse By</h5>
                    <a href="{{ url("cocktails-ibas") }}" class="btn btn-warning">IBA</a>
                    <a href="{{ url("cocktails-categories") }}" class="btn btn-warning">Category</a>
                </div>
            </div>
        @endif


        @foreach ($cocktails as $cocktail)
          <div class="card">
              <div class="card-body">
                  <h5 class="card-title">{{ $cocktail->name }}</h5>
                  <h6 class="card-subtitle mb-2 text-muted">
                      <a href="{{ url("cocktails-category").'/'.urlencode($cocktail->category) }}">
                          {{ $cocktail->category }}
                      </a>
                  </h6>
                  <h6 class="card-subtitle mb-2 text-muted">
                      <strong>
                          <a href="{{ url("cocktails-iba").'/'.urlencode($cocktail->iba) }}">
                              {{ $cocktail->iba }}
                          </a>
                      </strong>
                  </h6>
                  <a href="{{ url("cocktails").'/'.urlencode($cocktail->name) }}" class="btn btn-warning mt-2">View</a>
              </div>
          </div>
        @endforeach
    </div>
@endsection

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const trigger = document.getElementById('trigger');

        if (trigger) {
            trigger.addEventListener("click", () => {
                var diff = '';

                var first = document.getElementById('first');
                var opt = first.options[first.selectedIndex].value;
                if (opt !== '') diff += 'first=' + opt;

                var second = document.getElementById('second');
                var opt = second.options[second.selectedIndex].value;
                if (opt !== '') diff += '&second=' + opt;

                var third = document.getElementById('third');
                var opt = third.options[third.selectedIndex].value;
                if (opt !== '') diff += '&third=' + opt;

                if (diff !== '') document.location.search = diff;
            }, false);
        }
    }, false);
</script>
