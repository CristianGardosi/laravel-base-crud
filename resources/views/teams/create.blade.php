{{-- VISTA PER IL METODO CREATE CON FORM DI CREAZIONE NUOVO DATO --}}

@extends('layouts.main')

@section('content')
<div class="container mb-5">
    <h1>
        INSERT A NEW NBA TEAM
    </h1>

    {{-- !FORM! --}}
    {{-- Posta sul metodo/rotta store ciò che l'utente inserisce nella form se lo fa in maniera corretta --}}
    <form action="{{ route('teams.store') }}" method="POST">

        @csrf
        @method('POST')

        {{-- Creazione input per inserimento dati  --}}
        <div class="form-group">
            <label for="name">
                Team Name
            </label>
            <input class="form-control" type="text" name="name" placeholder="Name" value="{{old('name')}}">
        </div>
        <div class="form-group">
            <label for="city">
                City Name
            </label>
            <input class="form-control" type="text" name="city" placeholder="City" value="{{old('city')}}">
        </div>
        <div class="form-group">
            <label for="superstar">
                Superstar Player
            </label>
            <input class="form-control" type="text" name="superstar" placeholder="Superstar" value="{{old('superstar')}}">
        </div>
        {{-- Button submit --}}
        <div class="form-group mt-5">
            <input class="btn btn-primary" type="submit" value="Create">
        </div>


    
    </form>
</div>
@endsection
