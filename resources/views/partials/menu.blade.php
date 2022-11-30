<div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
    <header class="mb-auto">
        <div>
            <h3 class="float-md-start mb-0">@yield('title')</h3>

<nav class="nav nav-masthead justify-content-center float-md-end">
    @guest
    <a class="nav-link fw-bold py-1 px-0 active" aria-current="page" href="{{ route('register') }}">Create an account</a>
    <a class="nav-link fw-bold py-1 px-0" href="{{ route('login') }}">Sign In</a>
    <a class="nav-link fw-bold py-1 px-0" href="#">About</a>
    @else
    <li class="nav-link fw-bold py-1 px-0"><a href="{{ route('logout') }}">Logout</a></li>
    <a class="nav-link fw-bold py-1 px-0" href="#">About</a>
    @endguest

</nav>
</div>
</header>

