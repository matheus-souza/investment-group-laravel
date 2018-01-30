<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="{{ route('user.dashboard') }}">Investe Bem</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('user.index') }}"><i class="fa fa-address-book"></i> Usuários</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('institution.index') }}"><i class="fa fa-building"></i> Instituições</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('group.index') }}"><i class="fa fa-users"></i> Grupos</a>
            </li>
        </ul>
    </div>
</nav>
