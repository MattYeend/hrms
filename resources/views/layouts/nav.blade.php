<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            {{ config('app.name', 'Laravel') }}
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse d-flex justify-content-center" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav me-auto">
                <form action="{{ route('locale.change') }}" method="POST">
                    @csrf
                    <select name="locale" onchange="this.form.submit()" class="form-select form-select-sm">
                        <option value="en"{{ app()->getLocale() == 'en' ? ' selected' : ''}}>English</option>
                        <option value="de"{{ app()->getLocale() == 'de' ? ' selected' : ''}}>German</option>
                        <option value="fr"{{ app()->getLocale() == 'fr' ? ' selected' : ''}}>French</option>
                        <option value="pt"{{ app()->getLocale() == 'pt' ? ' selected' : ''}}>Portuguese</option>
                        <option value="es"{{ app()->getLocale() == 'es' ? ' selected' : ''}}>Spanish</option>
                        <option value="cy"{{ app()->getLocale() == 'cy' ? ' selected' : ''}}>Welsh</option>
                    </select>
                </form>
            </ul>

            <ul class="navbar-nav mx-auto">
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ms-auto">
                <!-- Authentication Links -->
                @guest
                @else
                    <div id="theme-switch" class="mt-10px flex justify-end">
                        <label class="switch">
                            <input type="checkbox" id="dark-mode-toggle" {{ Auth::user()->dark_mode ? 'checked' : '' }}>
                            <span class="slider round"></span>
                        </label>
                    </div>
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->getShortName() }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('calendar') }}">
                                {{ __('dropdown.calendar') }}
                            </a>
                            <a class="dropdown-item" href="{{ route('user.index') }}">
                                {{ __('dropdown.user') }}
                            </a>
                            <a class="dropdown-item" href="{{ route('rotas.index') }}">
                                {{ __('dropdown.rotas') }}
                            </a>
                            <a class="dropdown-item" href="{{ route('licence.index') }}">
                                {{ __('dropdown.licence') }}
                            </a>
                            <a class="dropdown-item" href="{{ route('addressBook.index') }}">
                                {{ __('dropdown.address_book') }}
                            </a>
                            <a class="dropdown-item" href="{{ route('addressContact.index') }}">
                                {{ __('dropdown.address_contact') }}
                            </a>
                            <a class="dropdown-item" href="{{ route('contract.index') }}">
                                {{ __('dropdown.contract') }}
                            </a>
                            <a class="dropdown-item" href="{{ route('knowledge') }}">
                                {{ __('dropdown.knowledge_base') }}
                            </a>
                            <a class="dropdown-item" href="{{ route('reports') }}">
                                {{ __('dropdown.reports') }}
                            </a>
                            <hr />
                            <a class="dropdown-item" href="{{ route('profile', ['id' => Auth::user()->id]) }}">
                                {{ __('dropdown.profile') }}
                            </a>
                            <hr />
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                {{ __('auth.logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>
