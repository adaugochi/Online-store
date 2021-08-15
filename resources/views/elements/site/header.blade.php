<header class="pl-60 pr-60 intelligent-header">
    <div class="header-area">
        <div class="container-fluid p-0">
            <div class="row no-gutters">
                <div class="col-2">
                    <div class="logo">
                        <a href="/"><img src="/img/logo/logo.png" alt=""/></a>
                    </div>
                </div>
                <div class="col-10">
                    <div class="menu-search-cart">
                        <div class="main-menu menu-none-block mx-auto">
                            <nav>
                                <ul>
                                    <li>
                                        <a href="#">Catalog</a>
                                        <ul class="dropdown">
                                            <li><a href="/">Men</a></li>
                                            <li><a href="/">Women</a></li>
                                            <li><a href="/">Children</a></li>
                                            <li><a href="/">Teenagers</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="/#faqs">FAQs</a></li>
                                    <li><a href="/#contact">contact</a></li>
                                    <li><a href="{{ route('login') }}">Login</a></li>
                                </ul>
                            </nav>
                        </div>
                        <div class="main-menu">
                            <nav>
                                <ul>
                                    <li>
                                        <a href="">
                                            <div class="common-style">
                                                <i class="bi bi-cart4 fs-26px"></i>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <div class="header-cart common-style lh-108">
                                                <button class="sidebar-trigger">
                                                    <i class="bi bi-list fs-26px"></i>
                                                </button>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <div class="header__user-toggle">
                                                <div class="header__user-avatar">
                                                    <i class="icon bi bi-person"></i>
                                                </div>
                                                <i class="bi ml-1 fs-20 bi-chevron-down"></i>
                                            </div>
                                        </a>
                                        <ul class="dropdown">
                                            <li><a href="{{ route('dashboard') }}">My Dashboard</a></li>
                                            <li><a href="/">Profile</a></li>
                                            <li><a href="/">Orders</a></li>
                                            <li><a href="/">Saved Items</a></li>
                                            <li><a href="/">Logout</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
