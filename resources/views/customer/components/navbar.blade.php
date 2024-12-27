<nav class="navbar navbar-expand-lg main-navbar">
    <form class="form-inline mr-auto">
        <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
        </ul>
    </form>
    <ul class="navbar-nav navbar-right justify-content-end rightsidetop">
        <li class="nav-link">
            <a href="" target="_blank" class="btn btn-warning">Front End</a>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <img alt="image" src="" class="rounded-circle-custom">
            </a>
            <ul class="dropdown-menu dropdown-menu-end">
                <li><a class="dropdown-item" href=""><i class="far fa-user"></i> Edit Profile</a></li>
                
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-dropdown-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                       <i class="fas fa-sign-out-alt"></i> {{ __('Log Out') }}
                    </x-dropdown-link>
                </form>
            </ul>
        </li>
    </ul>
</nav>
