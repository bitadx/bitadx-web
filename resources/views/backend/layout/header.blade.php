<!--App-Header-->
<!--App-Header-->
<div class="app-header1 header py-1 d-flex">
    <div class="container-fluid">
        <div class="d-flex">
            <a class="header-brand" href="{{('/')}}">
                <!-- <img src={{asset("common/assets/images/brand/logo.png")}} class="header-brand-img" alt="BITADX"> -->
                BITADX
            </a>
            <a aria-label="Hide Sidebar" class="app-sidebar__toggle" data-toggle="sidebar" href="#"></a>
            <div class="header-navicon">
                <a href="#" data-toggle="search" class="nav-link d-lg-none navsearch-icon">
                    <i class="fa fa-search"></i>
                </a>
            </div>
            <div class="header-navsearch">
                <a href="#" class=" "></a>
                <form class="form-inline mr-auto">
                    <div class="nav-search" style="display:none;">
                        <input type="search" class="form-control header-search" placeholder="Search…" aria-label="Search" />
                        <button class="btn btn-primary" type="submit"><i class="fa fa-search"></i></button>
                    </div>
                </form>
            </div>
            <div class="d-flex order-lg-2 ml-auto">
                <div class="dropdown d-none d-md-flex">
                    <a class="nav-link icon full-screen-link">
                        <i class="fe fe-maximize-2" id="fullscreen-button"></i>
                    </a>
                </div>

                <div class="dropdown">
                    <a href="#" class="nav-link pr-0 leading-none user-img" data-toggle="dropdown">
                        <img src="{{asset("/uploads/default/user-icon.jpg")}}" alt="profile-img" class="avatar avatar-md brround">
                    </a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                        <!-- <a class="dropdown-item" href="profile.html"> <i class="dropdown-icon icon icon-user"></i> My Profile </a>
                        <a class="dropdown-item" href="emailservices.html"> <i class="dropdown-icon icon icon-speech"></i> Inbox </a>
                        <a class="dropdown-item" href="editprofile.html"> <i class="dropdown-icon icon icon-settings"></i> Account Settings </a> -->
                        <!-- <a class="dropdown-item" href="login.html"> -->
                        <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                        <i class="dropdown-icon icon icon-power"></i> Log out </a>
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--/App-Header-->>
<!--/App-Header-->
