@auth
    <ul class="menu navbar-light">
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
        <li>
            <a class="nav-link" href="{{ route('blogs.index') }}">
                {{ __('dropdown.blogs') }}
            </a>
        </li>
        <li>
            <a class="nav-link" href="{{ route('blogs.list') }}">
                {{ __('dropdown.blog_list') }}
            </a>
        </li>
        <li>
            <a class="nav-link" href="{{ route('knowledge') }}">
                {{ __('dropdown.knowledge_base') }}
            </a>
        </li>
        @if(auth()->user()->isSuperAdmin() || auth()->user()->isAdmin())
            <li class="menu-heading">Admin Tools</li>
            <li>
                <a class="nav-link" href="{{ route('emailLogs.index') }}">
                    {{ __('dropdown.emailLogs') }}
                </a>
            </li>
        @endif
        @if(auth()->user()->isSuperAdmin() || auth()->user()->isAdmin() || auth()->user()->cSuite())
            <li class="menu-heading">Admin Tools</li>
            <li>
                <a class="nav-link" href="{{ route('departments.index') }}">
                    {{ __('dropdown.department') }}
                </a>
            </li>
            <li>
                <a class="nav-link" href="{{ route('reports') }}">
                    {{ __('dropdown.reports') }}
                </a>
            </li>
        @endif
        @if(auth()->user()->isSuperAdmin() || auth()->user()->isAdmin() || auth()->user()->cSuite() || auth()->user()->hrStaff)
            <li>
                <a class="nav-link" href="{{ route('job.index') }}">
                    {{ __('dropdown.jobs') }}
                </a>
            </li>
        @endif
        @if(auth()->user()->isSuperAdmin())
            <li class="menu-heading">Super Admin Tools</li>
            <li>
                <a class="nav-link" href="{{ route('company.index') }}">
                    {{ __('dropdown.company') }}
                </a>
            </li>
            <li>
                <a class="nav-link" href="{{ route('companyContact.index') }}">
                    {{ __('dropdown.company_contact') }}
                </a>
            </li>
            <li>
                <a class="nav-link" href="{{ route('licence.index') }}">
                    {{ __('dropdown.licence') }}
                </a>
            </li>
            <li>
                <a class="nav-link" href="{{ route('contract.index') }}">
                    {{ __('dropdown.contract') }}
                </a>
            </li>
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
        @endif
    </ul>
@endauth