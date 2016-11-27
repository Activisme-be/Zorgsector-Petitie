<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{ base_url() }}">
                {{ $this->config->item('name') }}
            </a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                @if($this->Session)
                    <li><a href="{{ base_url('users') }}">User management</a></li>
                    <li>
                        <a href="{{ base_url() }}">
                            Feedback <span class="label label-class">{{ Tickets::count() }}</span>
                        </a>
                    </li>
                @else
                    <li><a href="#" data-toggle="modal" data-target="#newTicket">Report a problem.</a></li>
                    <li><a href="{{ base_url('disclaimer') }}">Disclaimer</a></li>
                @endif
            </ul>

            <ul class="nav navbar-nav navbar-right">
                @if($this->Session)
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{ $this->Session['username'] }}</a>

                        <ul class="dropdown-menu">
                            <li><a href="{{ base_url() }}">Accounts configuratie</a></li>
                            <li><a href="{{ base_url('login/logout') }}">Uitloggen</a></li>
                        </ul>
                    </li>
                @else
                    <li><a href="{{ base_url('login') }}">Login</a></li>
                @endif
            </ul>
        </div>{{--/.nav-collapse --}}
    </div>
</nav>