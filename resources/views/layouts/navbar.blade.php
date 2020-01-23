<ul class="nav nav-tabs mb-3">
    <li class="nav-item">
        <a class="nav-link {{ url()->current() == route('phones.index') ? 'active' : '' }}" href="{{ route('phones.index') }}">Ramais</a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ url()->current() == route('phones.create') ? 'active' : '' }}" href="{{ route('phones.create') }}">Criar Ramal</a>
    </li>
</ul>
