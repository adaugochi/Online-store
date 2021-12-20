<!-- sidebar-cart start -->
<div class="sidebar-cart onepage-sidebar-area">
    <div class="wrap-sidebar">
        <div class="sidebar-cart-all">
            <div class="sidebar-cart-icon">
                <button class="op-sidebar-close">
                    <i class="bi bi-x-lg"></i>
                </button>
            </div>
            <div class="sidebar-menu-content">
                <ul>
                    @if(auth()->guest())
                        <li><a href="{{ route('login') }}">Login</a></li>
                        <li><a href="{{ route('register') }}">Register</a></li>
                    @else
                        <li>
                            <a href="{{ route('logout') }}" onclick="event.preventDefault();
                               document.getElementById('logout').submit();">Logout</a>
                            <form id="logout" action="{{ route('logout') }}" method="POST">
                                @csrf
                            </form>
                        </li>
                    @endif
                        <li><a href="{{ route('faqs') }}">FAQ</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
