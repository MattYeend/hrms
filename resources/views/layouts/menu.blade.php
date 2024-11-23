<ul class="menu navbar-light">
    @auth
        <li>
            <a class="nav-link" href="{{ route('calendar') }}">
                {{ __('dropdown.calendar') }}
            </a>
        </li>
        <li>
            <a class="nav-link" href="{{ route('user.index') }}">
                {{ __('dropdown.user') }}
            </a>
        </li>
        <li>
            <a class="nav-link" href="{{ route('rotas.index') }}">
                {{ __('dropdown.rotas') }}
            </a>
        </li>
        @if(auth()->user()->isSuperAdmin())
            <li>
                <a class="nav-link" href="{{ route('licence.index') }}">
                    {{ __('dropdown.licence') }}
                </a>
            </li>
        @endif
        <li>
            <a class="nav-link" href="{{ route('addressBook.index') }}">
                {{ __('dropdown.address_book') }}
            </a>
        </li>
        <li>
            <a class="nav-link" href="{{ route('addressContact.index') }}">
                {{ __('dropdown.address_contact') }}
            </a>
        </li>
        @if(auth()->user()->isSuperAdmin())
            <li>
                <a class="nav-link" href="{{ route('contract.index') }}">
                    {{ __('dropdown.contract') }}
                </a>
            </li>
        @endif
        <li>
            <a class="nav-link" href="{{ route('knowledge') }}">
                {{ __('dropdown.knowledge_base') }}
            </a>
        </li>
        <li>
            <a class="nav-link" href="{{ route('reports') }}">
                {{ __('dropdown.reports') }}
            </a>
        </li>
    @endauth
</ul>
