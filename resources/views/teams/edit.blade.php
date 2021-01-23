{{-- VISTA PER IL METODO EDIT CON FORM DI MODIFICA DATO ESISTENTE --}}

@extends('layouts.main')

@section('content')
<div class="container mb-5">
    <h1 class="mb-5">
        EDIT {{ $team->name }}
    </h1>

    {{-- SEZIONE VISUALIZZAZIONE EVENTUALI ERRORI ALL'INVIO DELLA FORM --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>
                        {{ $error }}
                    </li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- !FORM! --}}
    {{-- Porta sul metodo/rotta update i dati che l'utente edita nella form se lo fa in maniera corretta specificando inoltre l'id del dato modificato --}}
    <form action="{{ route('teams.update', $team->id) }}" method="POST">

        @csrf
        {{-- Metodo specifico update --}}
        @method('PATCH')

        {{-- Creazione input per inserimento dati  --}}
        <div class="form-group">
            <label for="name">
                Team Name
            </label>
            <input class="form-control" type="text" name="name" placeholder="Name" value="{{old('name', $team->name)}}">
        </div>
        <div class="form-group">
            <label for="city">
                City Name
            </label>
            <input class="form-control" type="text" name="city" placeholder="City" value="{{old('city', $team->city )}}">
        </div>
        <div class="form-group">
            <label for="superstar">
                Superstar Player
            </label>
            <input class="form-control" type="text" name="superstar" placeholder="Superstar" value="{{old('superstar', $team->superstar)}}">
        </div>
        {{-- Button submit --}}
        <div class="form-group mt-5">
            <input class="btn btn-primary" type="submit" value="Update new edit">
        </div>    
    </form>
</div>
@endsection
