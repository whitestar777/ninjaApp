<nav class="navbar navbar-default navbar-static-top">
    <div class="container">
        <div class="navbar-header">

            <!-- Collapsed Hamburger -->
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <!-- Branding Image -->
            <a class="navbar-brand" href="{{ url('/') }}">
                Laravel
            </a>
        </div>

        <div class="collapse navbar-collapse" id="app-navbar-collapse">
            <!-- Left Side Of Navbar -->
            <ul class="nav navbar-nav">
                <li><a href="{{ url('/home') }}">Home</a></li>
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="nav navbar-nav navbar-right">
                <!-- Authentication Links -->
                @if (Auth::guest())
                    <li><a href="{{ url('/login') }}">Login</a></li>
                    <li><a href="{{ url('/register') }}">Register</a></li>
                @else
                    <li><a href="{{ url('/documents') }}"><i class="fa fa-btn fa-sign-out"></i>Douments</a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu" role="menu">
                            <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                            <li><a href="{{ url('/user/edit') }}"><i class="fa fa-btn fa-sign-out"></i>Profile</a></li>
                        </ul>
                    </li>
                    @if(Auth::user()->role == 'admin' || Auth::user()->role == 'manager')
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                admin <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                @if(Auth::user()->role == 'admin')
                                    <li><a href="{{ url('/franchiseCreate') }}"><i class="fa fa-btn fa-sign-out"></i>New Franchise</a></li>
                                    <li><a href="{{ url('/franchise/all') }}"><i class="fa fa-btn fa-sign-out"></i>All Franchises</a></li>
                                @endif
                                @if(Auth::user()->role == 'manager')
                                    <li><a href="/franchise/view/{{Auth::user()->franchise_id}}"><i class="fa fa-btn fa-sign-out"></i>Users</a></li>
                                @endif
                            </ul>
                        </li>
                    @endif
                @endif
            </ul>
        </div>
    </div>
</nav>