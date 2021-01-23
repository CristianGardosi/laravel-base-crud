{{-- VISTA PER IL METODO INDEX DELLA CRUD SU TEAMS --}}

@extends('layouts.main')

@section('content')
<div class="container mb-5">
    <h1>
        NBA TEAMS LIST
    </h1>
    {{-- Deleted elements danger adv --}}
    @if (session('deleted'))
        <div class="alert alert-danger">
            {{ session('deleted') }}
            è stato eliminato
        </div>
    @endif
    {{-- TABLE BOOTSTRAP PER INDEX/ARCHIVIO CRUD CON DATI E PULSANTI PER LE VARIE MODIFICHE --}}
    <table class="table table-striped mt-5">
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
                    <td class="text-center" width="100">
                        <a href="{{ route('teams.show', $team->id) }}" class="btn btn-success">
                            Show
                        </a>
                    </td>
                    <td class="text-center" width="100">
                        <a href="{{ route('teams.edit', $team->id) }}" class="btn btn-primary">
                            Edit
                        </a>
                    </td>
                    <td class="text-center" width="100">
                        {{-- Form e non <a> perchè delete usa metodo POST e non GET --}}
                        <form action="{{ route('teams.destroy', $team->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <input type="submit" class="btn btn-danger" value="Delete">
                        </form>
                            
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{-- Gestion paginazione --}}
    <div class="pagination">
        {{ $teams->links() }}
    </div>
</div>
@endsection

