<!-- BEGIN: Header-->
<nav
    class="header-navbar navbar navbar-expand-lg align-items-center floating-nav navbar-light navbar-shadow container-xxl">
    <div class="navbar-container d-flex content">
        <div class="bookmark-wrapper d-flex align-items-center">
            <ul class="nav navbar-nav d-xl-none">
                <li class="nav-item">
                    <a class="nav-link menu-toggle" href="#">
                        <i class="ficon" data-feather="menu"></i>
                    </a>
                </li>
            </ul>
            <ul class="nav navbar-nav bookmark-icons">
                <li class="nav-item d-none d-lg-block">
                    <a class="nav-link" href="#" data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                          title="Email">
                        <i class="ficon" data-feather="mail"></i>
                    </a>
                </li>
                <li class="nav-item d-none d-lg-block">
                    <a class="nav-link" href="#" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Chat">
                        <i class="ficon" data-feather="message-square"></i>
                    </a>
                </li>
                <li class="nav-item d-none d-lg-block">
                    <a class="nav-link" href="#" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Calendar">
                        <i class="ficon" data-feather="calendar"></i>
                    </a>
                </li>
                <li class="nav-item d-none d-lg-block">
                    <a class="nav-link" href="#" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Todo">
                        <i class="ficon" data-feather="check-square"></i>
                    </a>
                </li>
            </ul>
            <ul class="nav navbar-nav">
                <li class="nav-item d-none d-lg-block">
                    <a class="nav-link bookmark-star">
                        <i class="ficon text-warning" data-feather="star"></i>
                    </a>
                    <div class="bookmark-input search-input">
                        <div class="bookmark-input-icon"><i data-feather="search"></i></div>
                        <input class="form-control input" type="text" placeholder="Bookmark" tabindex="0"
                               data-search="search">
                        <ul class="search-list search-list-bookmark"></ul>
                    </div>
                </li>
            </ul>
        </div>
        <ul class="nav navbar-nav align-items-center ms-auto">
            <li class="nav-item d-none d-lg-block">
                <a class="nav-link nav-link-style">
                    <i class="ficon" data-feather="moon"></i>
                </a>
            </li>
            <li class="nav-item nav-search">
                <a class="nav-link nav-link-search">
                    <i class="ficon" data-feather="search"></i>
                </a>
                <div class="search-input">
                    <div class="search-input-icon">
                        <i data-feather="search"></i>
                    </div>
                    <input class="form-control input" type="text" placeholder="Explore..." tabindex="-1"
                           data-search="search">
                    <div class="search-input-close"><i data-feather="x"></i></div>
                    <ul class="search-list search-list-main"></ul>
                </div>
            </li>
            <li class="nav-item dropdown dropdown-cart me-25">
                <a class="nav-link" href="#" data-bs-toggle="dropdown">
                    <i class="ficon" data-feather="shopping-cart"></i>
                    <span class="badge rounded-pill bg-primary badge-up cart-item-count">6</span>
                </a>
                <ul class="dropdown-menu dropdown-menu-media dropdown-menu-end">
                    <li class="dropdown-menu-header">
                        <div class="dropdown-header d-flex">
                            <h4 class="notification-title mb-0 me-auto">My Cart</h4>
                            <div class="badge rounded-pill badge-light-primary">4 Items</div>
                        </div>
                    </li>
                    <li class="dropdown-menu-footer">
                        <div class="d-flex justify-content-between mb-1">
                            <h6 class="fw-bolder mb-0">Total:</h6>
                            <h6 class="text-primary fw-bolder mb-0">$10,999.00</h6>
                        </div>
                        <a class="btn btn-primary w-100" href="#">Checkout</a>
                    </li>
                </ul>
            </li>
            <li class="nav-item dropdown dropdown-notification me-25">
                <a class="nav-link" href="#" data-bs-toggle="dropdown"><i class="ficon" data-feather="bell"></i><span
                        class="badge rounded-pill bg-danger badge-up">5</span></a>
                <ul class="dropdown-menu dropdown-menu-media dropdown-menu-end">
                    <li class="dropdown-menu-header">
                        <div class="dropdown-header d-flex">
                            <h4 class="notification-title mb-0 me-auto">Notifications</h4>
                            <div class="badge rounded-pill badge-light-primary">6 New</div>
                        </div>
                    </li>
                    <li class="dropdown-menu-footer"><a class="btn btn-primary w-100" href="#">Read all
                            notifications</a></li>
                </ul>
            </li>
            <li class="nav-item dropdown dropdown-user">
                <a class="nav-link dropdown-toggle dropdown-user-link"
                   id="dropdown-user"
                   href="#"
                   data-bs-toggle="dropdown"
                   aria-haspopup="true"
                   aria-expanded="false">
                    <div class="user-nav d-sm-flex d-none">
                        <span class="user-name fw-bolder"></span>
                    </div>
                    <span class="avatar">
                        <img class="round"
                             src="{{image('' ,'small')}}"
                             alt="avatar"
                             height="40"
                             width="40">
                        <span class="avatar-status-online"></span>
                    </span>
                </a>
                <div class="dropdown-menu dropdown-menu-end"
                     aria-labelledby="dropdown-user">
                </div>
            </li>
        </ul>
    </div>
</nav>
<ul class="main-search-list-defaultlist d-none">
    <li class="d-flex align-items-center"><a href="#">
            <h6 class="section-label mt-75 mb-0">Files</h6>
        </a></li>
</ul>
<ul class="main-search-list-defaultlist-other-list d-none">
    <li class="auto-suggestion justify-content-between"><a
            class="d-flex align-items-center justify-content-between w-100 py-50">
            <div class="d-flex justify-content-start"><span class="me-75" data-feather="alert-circle"></span><span>No results found.</span>
            </div>
        </a></li>
</ul>
<!-- END: Header-->
