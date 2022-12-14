<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ url('/') }}" class="brand-link">
        <img src="https://vemto.app/favicon.png" alt="Vemto Logo" class="brand-image bg-white img-circle">
        <span class="brand-text font-weight-light">RTesDevoirs</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">

        <!-- Sidebar Menu -->
        <nav class="pt-2">
            <ul class="nav nav-pills nav-sidebar flex-column nav-child-indent" data-widget="treeview" role="menu">

                @guest

                @else

                    <li class="nav-item">
                        <a href="{{ route('home') }}" class="nav-link">
                            <i class="nav-icon bi bi-journal-bookmark"></i>
                            <p>
                                Devoirs
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('courses.index') }}" class="nav-link">
                            <i class="nav-icon bi bi-card-list"></i>
                            <p>
                                Cours
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('teachers.index') }}" class="nav-link">
                            <i class="nav-icon bi bi-people-fill"></i>
                            <p>
                                Professeurs
                            </p>
                        </a>
                    </li>
                    @if(auth()->user()->isAdmin())
                        <li class="nav-item">
                            <a href="{{ route('settings.index') }}" class="nav-link">
                                <i class="nav-icon bi bi-gear-wide-connected"></i>
                                <p>
                                    Paramètres
                                </p>
                            </a>
                        </li>
                    @endif
                @endguest

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>