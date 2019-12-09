<nav class="rui-navbar rui-navbar-top rui-navbar-sticky">
        <div class="rui-navbar-brand">

            <a href="dashboard.html" class="rui-navbar-logo">
                <img src="./assets/images/logo.svg" data-src-night="./assets/images/logo-white.svg" data-src-day="./assets/images/logo.svg" alt="" width="45">
            </a>


            <button class="yay-toggle rui-yaybar-toggle" type="button">
                <span></span>
            </button>
        </div>
        <div class="container-fluid">
            <div class="rui-navbar-content">
                <ul class="nav">
                    <form action="#" class="rui-selectize">
                        <span data-feather="chevron-down" class="rui-icon rui-icon-stroke-1_5 rui-selectize-select-icon"></span>
                        <select class="form-control rui-selectize-element rui-selectize-select" name="socials">
                            <option value="0" selected>Dojo</option>
                            <option value="1">Dojo</option>
                            <option value="2">Dojo</option>
                        </select>
                    </form>
                 </ul>
                <ul class="nav rui-navbar-right">
                    <li class="nav-item">
                        <a class="d-flex" href="#">
                            <span class="btn btn-custom-round">
                                <span data-feather="search" class="rui-icon rui-icon-stroke-1_5"></span>
                            </span>
                        </a>
                    </li>
                    <li class="nav-item">
                      <a class="d-flex" href="#">
                          <span class="btn btn-custom-round">
                            <span class="fas fa-plus-circle set-add"></span>
                          </span>
                      </a>
                  </li>
                    <li class="dropdown dropdown-hover dropdown-triangle dropdown-keep-open">
                        <span class="user-name">Hi {{ auth()->user()->last_name }}</span>
                        <a class="dropdown-item rui-navbar-avatar mnr-6" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="fas fa-user user-img"></span>
                        </a>
                        <ul class="nav dropdown-menu">
                            <li>
                                <a href="{{ route("branch.list") }}" class="nav-link"><span data-feather="plus-circle" class="rui-icon rui-icon-stroke-1_5"></span>
                                    <span>Manage Branches</span>
                                    <span class="rui-nav-circle"></span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route("class.list") }}" class="nav-link"><span data-feather="users" class="rui-icon rui-icon-stroke-1_5"></span>
                                    <span>Manage Classes </span>
                                    <span class="rui-nav-circle"></span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route("studio.get") }}" class="nav-link"><span data-feather="check-circle" class="rui-icon rui-icon-stroke-1_5"></span>
                                    <span>Manage Studio</span>
                                    <span class="rui-nav-circle"></span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route("logout") }}" class="nav-link"><span data-feather="log-out" class="rui-icon rui-icon-stroke-1_5"></span>
                                    <span>Logout</span>
                                    <span class="rui-nav-circle"></span>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>




    <div class="rui-navbar rui-navbar-mobile">
            <div class="rui-navbar-head">
                <button class="rui-yaybar-toggle rui-yaybar-toggle-inverse yay-toggle" type="button" aria-label="Toggle side navigation">
                    <span></span>
                </button>
                <a class="rui-navbar-logo mr-auto" href="dashboard.html">
                    <img src="./assets/images/logo.svg" data-src-night="./assets/images/logo-white.svg" data-src-day="./assets/images/logo.svg" alt="" width="45">
                </a>
                <div class="dropdown dropdown-triangle">
                    <a class="dropdown-item rui-navbar-avatar" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img src="./assets/images/avatar-1.png" alt="">
                    </a>
                    <ul class="dropdown-menu nav">
                        <li>
                            <a href="profile.html" class="nav-link"><span data-feather="plus-circle" class="rui-icon rui-icon-stroke-1_5"></span>
                                <span>Create new Post</span>
                                <span class="rui-nav-circle"></span>
                            </a>
                        </li>
                        <li>
                            <a href="profile.html" class="nav-link"><span data-feather="users" class="rui-icon rui-icon-stroke-1_5"></span>
                                <span>Manage Users</span>
                                <span class="rui-nav-circle"></span>
                            </a>
                        </li>
                        <li>
                            <a href="profile.html" class="nav-link"><span data-feather="check-circle" class="rui-icon rui-icon-stroke-1_5"></span>
                                <span>Check Updates</span>
                                <span class="rui-nav-circle"></span>
                            </a>
                        </li>
                        <li>
                            <a href="profile.html" class="nav-link"><span data-feather="log-out" class="rui-icon rui-icon-stroke-1_5"></span>
                                <span>Exit</span>
                                <span class="rui-nav-circle"></span>
                            </a>
                        </li>
                    </ul>
                </div>
                <button class="navbar-toggler rui-navbar-toggle" type="button" data-toggle="collapse" data-target="#navbarMobile" aria-controls="navbarMobile" aria-expanded="false" aria-label="Toggle navigation">
                    <span></span>
                </button>
            </div>
            <div class="collapse navbar-collapse rui-navbar-collapse" id="navbarMobile">
                <div class="rui-navbar-content">
                    <ul class="nav">
                        <li class="dropdown dropdown-keep-open">
                    <a href="#actions" class="dropdown-item" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                        <span data-feather="layers" class="rui-icon rui-icon-stroke-1_5"></span>
                        <span>Actions</span>
                        <span class="rui-dropdown-circle">dgfgdf</span>

                    </a>
                    <ul class="nav dropdown-menu">

                <li>
                    <a href="#create-post" class="nav-link">

                        <span data-feather="plus-circle" class="rui-icon rui-icon-stroke-1_5"></span>
                        <span>Create Post</span>
                        <span class="rui-nav-circle"></span>

                    </a>
                </li>
                <li>
                    <a href="#create-page" class="nav-link">

                        <span data-feather="plus-circle" class="rui-icon rui-icon-stroke-1_5"></span>
                        <span>Create Page</span>
                        <span class="rui-nav-circle"></span>

                    </a>
                </li>
                <li>
                    <a href="#manage-users" class="nav-link">

                        <span data-feather="users" class="rui-icon rui-icon-stroke-1_5"></span>
                        <span>Manage Users</span>
                        <span class="rui-nav-circle"></span>

                    </a>
                </li><li class="dropdown dropdown-keep-open">
                    <a href="#manage-sites" class="dropdown-item" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                        <span data-feather="sidebar" class="rui-icon rui-icon-stroke-1_5"></span>
                        <span>Manage Sites</span>
                        <span class="rui-dropdown-circle"></span>

                    </a>
                    <ul class="nav dropdown-menu">

                <li>
                    <a href="#my-site-1" class="nav-link">

                        My Site 1

                    </a>
                </li>
                <li>
                    <a href="#my-site-2" class="nav-link">

                        My Site 2

                    </a>
                </li>
                <li>
                    <a href="#my-site-3" class="nav-link">

                        My Site 3

                    </a>
                </li>
                    </ul>
                </li>

                    </ul>
                </li>

                        <li class="nav-item">
                            <a class="nav-link d-flex" data-fancybox data-touch="false" data-close-existing="true" data-src="#search" data-auto-focus="true" href="javascript:;">
                                <span data-feather="search" class="rui-icon rui-icon-stroke-1_5"></span>
                                <span>Search</span>
                                <span class="rui-nav-circle"></span>
                            </a>
                        </li>
                        <li class="dropdown dropdown-keep-open">
                            <a class="dropdown-item" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span data-feather="flag" class="rui-icon rui-icon-stroke-1_5"></span>
                                <span>Language</span>
                                <span class="rui-dropdown-circle"></span>
                            </a>
                            <ul class="nav dropdown-menu rui-navbar-dropdown-language">
                                <li>
                                    <a href="#" class="rui-navbar-language active"><span class="rui-navbar-language-img"><img src="./assets/images/united-states-of-america.svg" alt=""></span> USA</a>
                                </li>
                                <li>
                                    <a href="#" class="rui-navbar-language"><span class="rui-navbar-language-img"><img src="./assets/images/china.svg" alt=""></span> China</a>
                                </li>
                                <li>
                                    <a href="#" class="rui-navbar-language"><span class="rui-navbar-language-img"><img src="./assets/images/germany.svg" alt=""></span> Germany</a>
                                </li>
                                <li>
                                    <a href="#" class="rui-navbar-language"><span class="rui-navbar-language-img"><img src="./assets/images/japan.svg" alt=""></span> Japan</a>
                                </li>
                                <li>
                                    <a href="#" class="rui-navbar-language"><span class="rui-navbar-language-img"><img src="./assets/images/spain.svg" alt=""></span> Spain</a>
                                </li>
                            </ul>
                        </li>
                        <li class="dropdown dropdown-keep-open">
                            <a class="dropdown-item nav-link" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span data-feather="bell" class="rui-icon rui-icon-stroke-1_5"></span>
                                <span>Notifications</span>
                                <span class="badge badge-circle badge-brand">3</span>
                                <span class="rui-dropdown-circle"></span>
                            </a>
                            <ul class="nav dropdown-menu rui-navbar-dropdown-notice">
                                <li class="rui-navbar-dropdown-title mb-10">
                                    <div class="d-flex align-items-center">
                                        <h2 class="h4 mb-0 mr-auto">Notifications</h2>
                                        <a class="btn btn-custom-round" href="profile.html"><span data-feather="link-2" class="rui-icon rui-icon-stroke-1_5"></span></a>
                                    </div>
                                </li>
                                <li class="nav-item">
                                    <div class="media media-success media-filled mnl-30 mnr-30">
                                        <a href="profile.html" class="media-link">
                                            <span class="media-img"><img src="./assets/images/avatar-5.png" alt=""></span>
                                            <span class="media-body">
                                                <span class="media-title">Amber Smith</span>
                                                <small class="media-subtitle">Bring abundantly creature great...</small>
                                            </span>
                                        </a>
                                        <a href="#" class="media-icon"><span data-feather="x" class="rui-icon rui-icon-stroke-1_5"></span></a>
                                    </div>
                                </li>
                                <li class="nav-item">
                                    <div class="media media-filled mnl-30 mnr-30">
                                        <a href="profile.html" class="media-link">
                                            <span class="media-img">C</span>
                                            <span class="media-body">
                                                <span class="media-title">Change Design</span>
                                                <small class="media-subtitle">Design</small>
                                            </span>
                                        </a>
                                        <a href="#" class="media-icon"><span data-feather="x" class="rui-icon rui-icon-stroke-1_5"></span></a>
                                    </div>
                                </li>
                                <li class="nav-item">
                                    <div class="media media-filled mnl-30 mnr-30">
                                        <a href="profile.html" class="media-link">
                                            <span class="media-img bg-transparent"><img src="./assets/images/icon-zip.svg" class="icon-file" alt=""></span>
                                            <span class="media-body">
                                                <span class="media-title">Added banner archive</span>
                                                <small class="media-subtitle">Commerce</small>
                                            </span>
                                        </a>
                                        <a href="#" class="media-icon"><span data-feather="x" class="rui-icon rui-icon-stroke-1_5"></span></a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link d-flex" data-fancybox data-keyboard="false" data-auto-focus="false" data-touch="false" data-close-existing="true" data-src="#messenger" href="javascript:;">
                                <span data-feather="message-circle" class="rui-icon rui-icon-stroke-1_5"></span>
                                <span>Messenger</span>
                                <span class="rui-nav-circle"></span>
                            </a>
                        </li>
                        <li class="dropdown dropdown-keep-open">
                            <a class="dropdown-item" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span data-feather="more-vertical" class="rui-icon rui-icon-stroke-1_5"></span>
                                <span>More</span>
                                <span class="rui-dropdown-circle"></span>
                            </a>
                            <ul class="nav dropdown-menu">
                                <li>
                                    <div class="custom-control custom-switch dropdown-item-switch">
                                        <input type="checkbox" class="custom-control-input rui-nightmode-toggle" id="toggleMobileNightMode">
                                        <label class="dropdown-item custom-control-label" for="toggleMobileNightMode">
                                            <span data-feather="moon" class="rui-icon rui-icon-stroke-1_5"></span>
                                            <span>Night Mode</span>
                                            <span class="rui-dropdown-circle"></span>
                                        </label>
                                    </div>
                                </li>
                                <li>
                                    <div class="custom-control custom-switch dropdown-item-switch">
                                        <input type="checkbox" class="custom-control-input rui-spotlightmode-toggle" id="toggleMobileSpotlightMode">
                                        <label class="dropdown-item custom-control-label" for="toggleMobileSpotlightMode">
                                            <span data-feather="square" class="rui-icon rui-icon-stroke-1_5"></span>
                                            <span>Spotlight Mode</span>
                                            <span class="rui-dropdown-circle"></span>
                                        </label>
                                    </div>
                                </li>
                                <li>
                                    <div class="custom-control custom-switch dropdown-item-switch">
                                        <input type="checkbox" class="custom-control-input rui-sectionLines-toggle" id="toggleMobileSectionLines">
                                        <label class="dropdown-item custom-control-label" for="toggleMobileSectionLines">
                                            <span data-feather="layout" class="rui-icon rui-icon-stroke-1_5"></span>
                                            <span>Show section lines</span>
                                            <span class="rui-dropdown-circle"></span>
                                        </label>
                                    </div>
                                </li>
                                <li class="dropdown-menu-label">Sidebar</li>
                                <li>
                                    <div class="custom-control custom-switch dropdown-item-switch">
                                        <input type="checkbox" class="custom-control-input rui-darkSidebar-toggle" id="toggleMobileDarkSidebar">
                                        <label class="dropdown-item custom-control-label" for="toggleMobileDarkSidebar">
                                            <span data-feather="sidebar" class="rui-icon rui-icon-stroke-1_5"></span>
                                            <span>Dark</span>
                                            <span class="rui-dropdown-circle"></span>
                                        </label>
                                    </div>
                                </li>
                                <li>
                                    <div class="custom-control custom-switch dropdown-item-switch">
                                        <input type="checkbox" class="custom-control-input rui-staticSidebar-toggle" id="toggleMobileStaticSidebar">
                                        <label class="dropdown-item custom-control-label" for="toggleMobileStaticSidebar">
                                            <span data-feather="sidebar" class="rui-icon rui-icon-stroke-1_5"></span>
                                            <span>Static</span>
                                            <span class="rui-dropdown-circle"></span>
                                        </label>
                                    </div>
                                </li>
                                <li class="dropdown-menu-label">Navbar</li>
                                <li>
                                    <div class="custom-control custom-switch dropdown-item-switch">
                                        <input type="checkbox" class="custom-control-input rui-darkNavbar-toggle" id="toggleMobileDarkNavbar">
                                        <label class="dropdown-item custom-control-label" for="toggleMobileDarkNavbar">
                                            <span data-feather="menu" class="rui-icon rui-icon-stroke-1_5"></span>
                                            <span>Dark</span>
                                            <span class="rui-dropdown-circle"></span>
                                        </label>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="rui-navbar-bg"></div>
