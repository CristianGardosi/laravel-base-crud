{{-- VISTA PER IL METODO INDEX DELLA CRUD SU TEAMS --}}

@extends('layouts.main')

@section('content')
<div class="container mb-5">
    <h1>
        NBA TEAMS LIST
    </h1>
    {{-- TABLE BOOTSTRAP PER INDEX/ARCHIVIO CRUD CON DATI E PULSANTI PER LE VARIE MODIFICHE --}}
    <table class="table">
        <thead>
            <tr>
                {{-- Nomi colonne --}}
                <th>
                    ID
                </th>
                <th>
                    Name
                </th>
                <th>
                    City
                </th>
                <th>
                    Superstar
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($teams as $team)
            <tr>
                <td>
                    {{ $team->id }}
                </td>
                <td>
                    {{ $team->name }}
                </td>
                <td>
                    {{ $team->city }}
                </td>
                <td>
                    {{ $team->superstar }}
                </td>
                {{-- BUTTONS --}}
                {{-- Details page per ogni elemento della tabella, prima parte per hittare il metodo show dalla mia route list utilizzato per le pagine di dettaglio seconda parte per dare l'id univoco di ogni elemento della tabella --}}
                <td class="text-center width="100">
                    <a href="{{ route('teams.show', $team->id) }}" class="btn btn-success">
                        Show
                    </a>
                </td>
                <td class="text-center width="100">
                    <a href="#" class="btn btn-primary">
                        Edit
                    </a>
                </td>
                <td class="text-center width="100">
                    <a href="#" class="btn btn-danger">
                        Delete
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

</div>
@endsection

