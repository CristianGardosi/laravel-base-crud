<header class="mb-5">
    {{-- Bootstrap nav --}}
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        {{-- Home link --}}
        <a class="navbar-brand" href="{{ route('homepage') }}">NBA DATABASE</a>

        {{-- Hamburger --}}
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
      
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    {{-- Home link --}}
                    <a class="nav-link" href="{{ route('homepage') }}">Home</a>
                </li>
                <li class="nav-item">
                    {{-- (Route list nel terminale per controllare le rotte delle pagine con CRUD). In questo caso il link mi porta alla pagina index che corrisponde all'archivio con tutti gli elementi della tabella pronti per essere modificati, eliminati ecc. --}}
                    <a class="nav-link" href="{{ route('teams.index') }}">Teams</a>
                </li>
            </ul>
        </div>
    </nav>
</header>