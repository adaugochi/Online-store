<div class="nk-header nk-header-fixed is-light">
    <div>
        <div class="nk-header-wrap justify-content-between">
            <div class="nk-menu-trigger d-xl-none ml-n1">
                <a href="#" class="nk-nav-toggle nk-quick-nav-icon" data-target="sidebarMenu">
                    <x-bootstrap-icon name="list" class="icon"/>
                </a>
            </div>
            <div class="nk-header-brand d-xl-none">
                <a href="#" class="logo-link">
                    <h3 class="font-weight-bold">{{ env('APP_NAME') }}</h3>
                </a>
            </div><!-- .nk-header-brand -->
            <div class="nk-header-news">
                <div class="nk-news-list">
                    <div class="nk-news-item">
                        <div class="nk-news-icon">
                            <?php $time = date("H"); $timezone = date("e"); ?>

                            @if ((int)$time < 12)
                                <x-bootstrap-icon name="sun" class="icon"/>
                            @elseif ((int)$time >= 12 && (int)$time < 17)
                                <x-bootstrap-icon name="sun-fill" class="icon"/>
                            @elseif ((int)$time >= 17 && (int)$time < 19)
                                <x-bootstrap-icon name="moon" class="icon"/>
                            @elseif ((int)$time >= 19)
                                <x-bootstrap-icon name="moon-fill" class="icon"/>
                            @endif
                        </div>
                        <div>
                            <p>
                                Welcome Back!
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="nk-header-tools">
                <ul class="nk-quick-nav">
                    <li class="dropdown user-dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <div class="user-toggle">
                                <div class="user-avatar sm">
                                    <x-bootstrap-icon name="person" class="icon"/>
                                </div>
                                <div class="user-info d-none d-md-block">
                                    <div class="user-status">{{ auth()->user()->email }}</div>
                                    <div class="user-name dropdown-indicator">{{ auth()->user()->name }}</div>
                                </div>
                            </div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-md dropdown-menu-right dropdown-menu-s1">
                            <div class="dropdown-inner">
                                <ul class="link-list">
                                    <li>
                                        <a href="#">
                                            <x-bootstrap-icon name="person" class="icon"/>
                                            <span>View Profile</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="dropdown-inner">
                                <ul class="link-list">
                                    <li>
                                        <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                                            <x-bootstrap-icon name="box-arrow-right" class="icon"/>
                                            <span>Logout</span>
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                              class="d-none">
                                            @csrf
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
