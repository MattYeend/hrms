<ul class="list-group">
    @auth
        <li class="nav-item">
            <a class="nav-link" href="{{ route('calendar') }}">{{ __('dropdown.calendar') }}</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('user.index') }}">{{ __('dropdown.user') }}</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('rotas.index') }}">{{ __('dropdown.rotas') }}</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('licence.index') }}">{{ __('dropdown.licence') }}</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('addressBook.index') }}">{{ __('dropdown.address_book') }}</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('addressContact.index') }}">{{ __('dropdown.address_contact') }}</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('contract.index') }}">{{ __('dropdown.contract') }}</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('knowledge') }}">{{ __('dropdown.knowledge_base') }}</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('reports') }}">{{ __('dropdown.reports') }}</a>
        </li>
    @endauth
</ul>