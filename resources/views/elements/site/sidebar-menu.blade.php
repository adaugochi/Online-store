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
                    <li>
                        <a class="dropdown-toggle" href="#" role="button" id="catalogLink" data-toggle="dropdown"
                           aria-haspopup="true" aria-expanded="false">
                            Catalog
                        </a>
                        <a href="#"></a>
                        <ul class="dropdown-menu pl-3" aria-labelledby="catalogLink">
                            <li><a href="/">Men</a></li>
                            <li><a href="/">Women</a></li>
                        </ul>
                    </li>
                    <li><a href="{{ route('faqs') }}">FAQs</a></li>
                    <li><a href="/#contact">contact</a></li>
                    <li>
                        <a href="{{ route('cart') }}">
                            <div class="common-style">
                                <i class="bi bi-cart4 fs-26px"></i> Cart
                            </div>
                        </a>
                    </li>
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
                </ul>
            </div>
        </div>
    </div>
</div>
