<div class="side-nav expand-lg">
    <div class="side-nav-inner">
        <ul class="side-nav-menu">
            <li class="side-nav-header">
                <span>Navigation</span>
            </li>
            @guest
                @if (Route::has('register'))
                    <li class="nav-item dropdown">
                        <a class="nav-link" href="{{ route('register') }}">
                            <span class="icon-holder">
                                <i class="fa fa-user-o"></i>
                            </span>
                            <span class="title">Register</span>
                            <span class="arrow">
                                <i class="lni-chevron-right"></i>
                            </span>
                        </a>
                    </li>
                @endif
            @else
                <li class="nav-item dropdown">
                    <a class="dropdown-toggle"  id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ explode(' ',Auth::user()->name)[0] }} <span class="caret"></span>
                        <span class="arrow">
                            <i class="lni-arrow-left-circle"></i>
                        </span>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li>
            @endguest
            <li class="nav-item dropdown">
                <a class="dropdown-toggle" href="{{ route('about') }}">
                    <span class="icon-holder">
                        <i class="lni-indent-decrease"></i>
                    </span>
                    <span class="title">About</span>
                    <span class="arrow">
                        <i class="lni-chevron-right"></i>
                    </span>
                </a>
            </li>
        </ul>
    </div>
</div>