    <!-- ==================== HEADER ==================== -->
    <header class="pc-header">
        <div class="header-wrapper">

            <!-- Mobile -->
            <div class="me-auto pc-mob-drp">
                <ul class="list-unstyled">
                    <li class="pc-h-item pc-sidebar-collapse">
                        <a href="#" class="pc-head-link ms-0" id="sidebar-hide"><i class="ti ti-menu-2"></i></a>
                    </li>
                    <li class="pc-h-item pc-sidebar-popup">
                        <a href="#" class="pc-head-link ms-0" id="mobile-collapse"><i class="ti ti-menu-2"></i></a>
                    </li>
                </ul>
            </div>

            <!-- User -->
            <div>
                <ul class="list-unstyled">
                    <li class="dropdown pc-h-item header-user-profile">
                        <a class="pc-head-link dropdown-toggle" data-bs-toggle="dropdown" href="#">
                            <img src="{{ asset('assets/images/user/avatar-2.jpg') }}" class="user-avtar">
                            <span>Ngọc Bích Cute</span>
                        </a>

                        <div class="dropdown-menu dropdown-user-profile dropdown-menu-end pc-h-dropdown">

                            <div class="dropdown-header">
                                <div class="d-flex mb-1">
                                    <img src="{{ asset('assets/images/user/avatar-2.jpg') }}" class="user-avtar wid-35">
                                    <div class="ms-3">
                                        <h6 class="mb-1">Stebin Ben</h6>
                                        <span>UI/UX Designer</span>
                                    </div>
                                </div>
                            </div>

                            <!-- Logout -->
                            <a class="dropdown-item" href="#"
                               onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                <i class="ti ti-logout"></i> Logout
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>

                        </div>
                    </li>
                </ul>
            </div>

        </div>
    </header>
