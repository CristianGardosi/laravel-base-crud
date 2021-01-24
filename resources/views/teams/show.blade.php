{{-- VISTA PER IL METODO SHOW DETAIL PAGE DATO --}}

@extends('layouts.main')

@section('content')
<div class="container mb-5">
    <h1 class="mb-5">
        {{$team->name}} details page
    </h1>
    <h2>
        Team name
    </h2>
    <h4>
        {{$team->name}} 
    </h4>
    <hr>
    <h2>
        Team city
    </h2>
    <h4>
        {{$team->city}} 
    </h4>
    <hr>
    <h2>
        Team superstar player
    </h2>
    <h4>
        {{$team->superstar}} 
    </h4>
    <hr>
    {{-- Time format using CARBON --}}
    <h2>
        Created at:
    </h2>
    <h4>
        {{$team->created_at->isoFormat('dddd DD/MM/YYYY')}} 
    </h4>
    <hr>
    <h2>
        Updated at:
    </h2>
    <h4>
        {{$team->updated_at->diffForHumans()}} 
    </h4>
    <hr>

    <a href="{{ route('teams.edit', $team->id) }}" class="btn btn-primary mt-3">
        Edit
    </a>
</div>
@endsection
