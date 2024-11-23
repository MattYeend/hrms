<ul class="list-group list-group-flush">
    @auth
        <li class="list-group-item border-0">
            <a class="nav-link text-dark fw-semibold" href="{{ route('calendar') }}">
                {{ __('dropdown.calendar') }}
            </a>
        </li>
        <li class="list-group-item border-0">
            <a class="nav-link text-dark fw-semibold" href="{{ route('user.index') }}">
                {{ __('dropdown.user') }}
            </a>
        </li>
        <li class="list-group-item border-0">
            <a class="nav-link text-dark fw-semibold" href="{{ route('rotas.index') }}">
                {{ __('dropdown.rotas') }}
            </a>
        </li>
        <li class="list-group-item border-0">
            <a class="nav-link text-dark fw-semibold" href="{{ route('licence.index') }}">
                {{ __('dropdown.licence') }}
            </a>
        </li>
        <li class="list-group-item border-0">
            <a class="nav-link text-dark fw-semibold" href="{{ route('addressBook.index') }}">
                {{ __('dropdown.address_book') }}
            </a>
        </li>
        <li class="list-group-item border-0">
            <a class="nav-link text-dark fw-semibold" href="{{ route('addressContact.index') }}">
                {{ __('dropdown.address_contact') }}
            </a>
        </li>
        <li class="list-group-item border-0">
            <a class="nav-link text-dark fw-semibold" href="{{ route('contract.index') }}">
                {{ __('dropdown.contract') }}
            </a>
        </li>
        <li class="list-group-item border-0">
            <a class="nav-link text-dark fw-semibold" href="{{ route('knowledge') }}">
                {{ __('dropdown.knowledge_base') }}
            </a>
        </li>
        <li class="list-group-item border-0">
            <a class="nav-link text-dark fw-semibold" href="{{ route('reports') }}">
                {{ __('dropdown.reports') }}
            </a>
        </li>
    @endauth
</ul>
