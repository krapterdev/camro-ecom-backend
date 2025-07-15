<!-- topbar setting bar start -->
<div>
    <div class="offcanvas offcanvas-end border-0" tabindex="-1" id="theme-settings-offcanvas">
        <div class="d-flex align-items-center bg-primary p-3 offcanvas-header">
            <h5 class="text-white m-0">Theme Settings</h5>
            <button type="button" class="btn-close btn-close-white ms-auto" data-bs-dismiss="offcanvas"
                aria-label="Close"></button>
        </div>

        <div class="offcanvas-body p-0">
            <div data-simplebar class="h-100">
                <div class="p-3 settings-bar">

                    <div>
                        <h5 class="mb-3 font-16 fw-semibold">Color Scheme</h5>

                        <div class="form-check mb-2">
                            <input class="form-check-input" type="radio" name="data-bs-theme" id="layout-color-light"
                                value="light">
                            <label class="form-check-label" for="layout-color-light">Light</label>
                        </div>

                        <div class="form-check mb-2">
                            <input class="form-check-input" type="radio" name="data-bs-theme" id="layout-color-dark"
                                value="dark">
                            <label class="form-check-label" for="layout-color-dark">Dark</label>
                        </div>
                    </div>

                    <div>
                        <h5 class="my-3 font-16 fw-semibold">Topbar Color</h5>

                        <div class="form-check mb-2">
                            <input class="form-check-input" type="radio" name="data-topbar-color"
                                id="topbar-color-light" value="light">
                            <label class="form-check-label" for="topbar-color-light">Light</label>
                        </div>
                        <div class="form-check mb-2">
                            <input class="form-check-input" type="radio" name="data-topbar-color" id="topbar-color-dark"
                                value="dark">
                            <label class="form-check-label" for="topbar-color-dark">Dark</label>
                        </div>
                    </div>


                    <div>
                        <h5 class="my-3 font-16 fw-semibold">Menu Color</h5>

                        <div class="form-check mb-2">
                            <input class="form-check-input" type="radio" name="data-menu-color" id="leftbar-color-light"
                                value="light">
                            <label class="form-check-label" for="leftbar-color-light">
                                Light
                            </label>
                        </div>

                        <div class="form-check mb-2">
                            <input class="form-check-input" type="radio" name="data-menu-color" id="leftbar-color-dark"
                                value="dark">
                            <label class="form-check-label" for="leftbar-color-dark">
                                Dark
                            </label>
                        </div>
                    </div>

                    <div>
                        <h5 class="my-3 font-16 fw-semibold">Sidebar Size</h5>

                        <div class="form-check mb-2">
                            <input class="form-check-input" type="radio" name="data-menu-size" id="leftbar-size-default"
                                value="default">
                            <label class="form-check-label" for="leftbar-size-default">
                                Default
                            </label>
                        </div>

                        <div class="form-check mb-2">
                            <input class="form-check-input" type="radio" name="data-menu-size" id="leftbar-size-small"
                                value="condensed">
                            <label class="form-check-label" for="leftbar-size-small">
                                Condensed
                            </label>
                        </div>

                        <div class="form-check mb-2">
                            <input class="form-check-input" type="radio" name="data-menu-size" id="leftbar-hidden"
                                value="hidden">
                            <label class="form-check-label" for="leftbar-hidden">
                                Hidden
                            </label>
                        </div>

                        <div class="form-check mb-2">
                            <input class="form-check-input" type="radio" name="data-menu-size"
                                id="leftbar-size-small-hover-active" value="sm-hover-active">
                            <label class="form-check-label" for="leftbar-size-small-hover-active">
                                Small Hover Active
                            </label>
                        </div>

                        <div class="form-check mb-2">
                            <input class="form-check-input" type="radio" name="data-menu-size"
                                id="leftbar-size-small-hover" value="sm-hover">
                            <label class="form-check-label" for="leftbar-size-small-hover">
                                Small Hover
                            </label>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="offcanvas-footer border-top p-3 text-center">
            <div class="row">
                <div class="col">
                    <button type="button" class="btn btn-danger w-100" id="reset-layout">Reset</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- topbar setting bar end -->

<!-- sidebar start -->
<div class="main-nav">
    <!-- Sidebar Logo -->
    <div class="logo-box">
        <a href="{{url('admin/dashboard')}}" class="logo-dark">
            <img src="{{ asset('admin_assets/images/mrlogo.jpg')}}" class="logo-sm" alt="logo sm">
            <img src="{{ asset('admin_assets/images/mrlogo.jpg')}}" class="logo-lg" alt="logo dark">
        </a>

        <a href="{{url('admin/dashboard')}}" class="logo-light" style="text-align: center;">
            <img src="{{ asset('admin_assets/images/mrlogo.jpg')}}" class="logo-sm" alt="logo sm">
            <img src="{{ asset('admin_assets/images/mrlogo.jpg')}}" class="logo-lg" alt="logo light"
                style="width: 70%; height: 100%;">
        </a>
    </div>

    <!-- Menu Toggle Button (sm-hover) -->
    <button type="button" class="button-sm-hover" aria-label="Show Full Sidebar">
        <iconify-icon icon="solar:double-alt-arrow-right-bold-duotone" class="button-sm-hover-icon"></iconify-icon>
    </button>

    <div class="scrollbar" data-simplebar>
        <ul class="navbar-nav" id="navbar-nav">

            <li class="menu-title">General</li>

            <li class="nav-item">
                <a class="nav-link" href="{{url('admin/dashboard')}}">
                    <span class="nav-icon">
                        <iconify-icon icon="solar:widget-5-bold-duotone"></iconify-icon>
                    </span>
                    <span class="nav-text"> Dashboard </span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link menu-arrow" href="#sidebarCategory" data-bs-toggle="collapse" role="button"
                    aria-expanded="false" aria-controls="sidebarCategory">
                    <span class="nav-icon">
                        <iconify-icon icon="solar:clipboard-list-bold-duotone"></iconify-icon>
                    </span>
                    <span class="nav-text"> Category </span>
                </a>
                <div class="collapse" id="sidebarCategory">
                    <ul class="nav sub-navbar-nav">
                        <li class="sub-nav-item">
                            <a class="sub-nav-link" href="{{url('admin/category')}}">Manage Category</a>
                        </li>
                        <li class="sub-nav-item">
                            <a class="sub-nav-link" href="{{url('admin/category/manage_category')}}">Create Category</a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link menu-arrow" href="#sidebarProducts" data-bs-toggle="collapse" role="button"
                    aria-expanded="false" aria-controls="sidebarProducts">
                    <span class="nav-icon">
                        <iconify-icon icon="solar:t-shirt-bold-duotone"></iconify-icon>
                    </span>
                    <span class="nav-text"> Products </span>
                </a>
                <div class="collapse" id="sidebarProducts">
                    <ul class="nav sub-navbar-nav">
                        <li class="sub-nav-item">
                            <a class="sub-nav-link" href="product-list.php">List</a>
                        </li>
                        <li class="sub-nav-item">
                            <a class="sub-nav-link" href="product-grid.php">Grid</a>
                        </li>
                        <li class="sub-nav-item">
                            <a class="sub-nav-link" href="product-details.php">Details</a>
                        </li>
                        <li class="sub-nav-item">
                            <a class="sub-nav-link" href="product-edit.php">Edit</a>
                        </li>
                        <li class="sub-nav-item">
                            <a class="sub-nav-link" href="product-add.php">Create</a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link menu-arrow" href="#sidebarInventory" data-bs-toggle="collapse" role="button"
                    aria-expanded="false" aria-controls="sidebarInventory">
                    <span class="nav-icon">
                        <iconify-icon icon="solar:box-bold-duotone"></iconify-icon>
                    </span>
                    <span class="nav-text"> Inventory </span>
                </a>
                <div class="collapse" id="sidebarInventory">
                    <ul class="nav sub-navbar-nav">

                        <li class="sub-nav-item">
                            <a class="sub-nav-link" href="inventory-warehouse.php">Warehouse</a>
                        </li>
                        <li class="sub-nav-item">
                            <a class="sub-nav-link" href="inventory-received-orders.php">Received Orders</a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link menu-arrow" href="#sidebarOrders" data-bs-toggle="collapse" role="button"
                    aria-expanded="false" aria-controls="sidebarOrders">
                    <span class="nav-icon">
                        <iconify-icon icon="solar:bag-smile-bold-duotone"></iconify-icon>
                    </span>
                    <span class="nav-text"> Orders </span>
                </a>
                <div class="collapse" id="sidebarOrders">
                    <ul class="nav sub-navbar-nav">

                        <li class="sub-nav-item">
                            <a class="sub-nav-link" href="orders-list.php">List</a>
                        </li>
                        <li class="sub-nav-item">
                            <a class="sub-nav-link" href="order-detail.php">Details</a>
                        </li>
                        <li class="sub-nav-item">
                            <a class="sub-nav-link" href="order-cart.php">Cart</a>
                        </li>
                        <li class="sub-nav-item">
                            <a class="sub-nav-link" href="order-checkout.php">Check Out</a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link menu-arrow" href="#sidebarPurchases" data-bs-toggle="collapse" role="button"
                    aria-expanded="false" aria-controls="sidebarPurchases">
                    <span class="nav-icon">
                        <iconify-icon icon="solar:card-send-bold-duotone"></iconify-icon>
                    </span>
                    <span class="nav-text"> Purchases </span>
                </a>
                <div class="collapse" id="sidebarPurchases">
                    <ul class="nav sub-navbar-nav">
                        <li class="sub-nav-item">
                            <a class="sub-nav-link" href="purchase-list.php">List</a>
                        </li>
                        <li class="sub-nav-item">
                            <a class="sub-nav-link" href="purchase-order.php">Order</a>
                        </li>
                        <li class="sub-nav-item">
                            <a class="sub-nav-link" href="purchase-returns.php">Return</a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link menu-arrow" href="#sidebarAttributes" data-bs-toggle="collapse" role="button"
                    aria-expanded="false" aria-controls="sidebarAttributes">
                    <span class="nav-icon">
                        <iconify-icon icon="solar:confetti-minimalistic-bold-duotone"></iconify-icon>
                    </span>
                    <span class="nav-text"> Attributes </span>
                </a>
                <div class="collapse" id="sidebarAttributes">
                    <ul class="nav sub-navbar-nav">
                        <li class="sub-nav-item">
                            <a class="sub-nav-link" href="attributes-list.php">List</a>
                        </li>
                        <li class="sub-nav-item">
                            <a class="sub-nav-link" href="attributes-edit.php">Edit</a>
                        </li>
                        <li class="sub-nav-item">
                            <a class="sub-nav-link" href="attributes-add.php">Create</a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link menu-arrow" href="#sidebarInvoice" data-bs-toggle="collapse" role="button"
                    aria-expanded="false" aria-controls="sidebarInvoice">
                    <span class="nav-icon">
                        <iconify-icon icon="solar:bill-list-bold-duotone"></iconify-icon>
                    </span>
                    <span class="nav-text"> Invoices </span>
                </a>
                <div class="collapse" id="sidebarInvoice">
                    <ul class="nav sub-navbar-nav">
                        <li class="sub-nav-item">
                            <a class="sub-nav-link" href="invoice-list.php">List</a>
                        </li>
                        <li class="sub-nav-item">
                            <a class="sub-nav-link" href="invoice-details.php">Details</a>
                        </li>
                        <li class="sub-nav-item">
                            <a class="sub-nav-link" href="invoice-add.php">Create</a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="settings.php">
                    <span class="nav-icon">
                        <iconify-icon icon="solar:settings-bold-duotone"></iconify-icon>
                    </span>
                    <span class="nav-text"> Settings </span>
                </a>
            </li>

            <li class="menu-title mt-2">Users</li>

            <li class="nav-item">
                <a class="nav-link" href="pages-profile.php">
                    <span class="nav-icon">
                        <iconify-icon icon="solar:chat-square-like-bold-duotone"></iconify-icon>
                    </span>
                    <span class="nav-text"> Profile </span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link menu-arrow" href="#sidebarRoles" data-bs-toggle="collapse" role="button"
                    aria-expanded="false" aria-controls="sidebarRoles">
                    <span class="nav-icon">
                        <iconify-icon icon="solar:user-speak-rounded-bold-duotone"></iconify-icon>
                    </span>
                    <span class="nav-text"> Roles </span>
                </a>
                <div class="collapse" id="sidebarRoles">
                    <ul class="nav sub-navbar-nav">
                        <ul class="nav sub-navbar-nav">
                            <li class="sub-nav-item">
                                <a class="sub-nav-link" href="role-list.php">List</a>
                            </li>
                            <li class="sub-nav-item">
                                <a class="sub-nav-link" href="role-edit.php">Edit</a>
                            </li>
                            <li class="sub-nav-item">
                                <a class="sub-nav-link" href="role-add.php">Create</a>
                            </li>
                        </ul>
                    </ul>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="pages-permissions.php">
                    <span class="nav-icon">
                        <iconify-icon icon="solar:checklist-minimalistic-bold-duotone"></iconify-icon>
                    </span>
                    <span class="nav-text"> Permissions </span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link menu-arrow" href="#sidebarCustomers" data-bs-toggle="collapse" role="button"
                    aria-expanded="false" aria-controls="sidebarCustomers">
                    <span class="nav-icon">
                        <iconify-icon icon="solar:users-group-two-rounded-bold-duotone"></iconify-icon>
                    </span>
                    <span class="nav-text"> Customers </span>
                </a>
                <div class="collapse" id="sidebarCustomers">
                    <ul class="nav sub-navbar-nav">

                        <li class="sub-nav-item">
                            <a class="sub-nav-link" href="customer-list.php">List</a>
                        </li>
                        <li class="sub-nav-item">
                            <a class="sub-nav-link" href="customer-detail.php">Details</a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link menu-arrow" href="#sidebarSellers" data-bs-toggle="collapse" role="button"
                    aria-expanded="false" aria-controls="sidebarSellers">
                    <span class="nav-icon">
                        <iconify-icon icon="solar:shop-bold-duotone"></iconify-icon>
                    </span>
                    <span class="nav-text"> Sellers </span>
                </a>
                <div class="collapse" id="sidebarSellers">
                    <ul class="nav sub-navbar-nav">
                        <li class="sub-nav-item">
                            <a class="sub-nav-link" href="seller-list.php">List</a>
                        </li>
                        <li class="sub-nav-item">
                            <a class="sub-nav-link" href="seller-details.php">Details</a>
                        </li>
                        <li class="sub-nav-item">
                            <a class="sub-nav-link" href="seller-edit.php">Edit</a>
                        </li>
                        <li class="sub-nav-item">
                            <a class="sub-nav-link" href="seller-add.php">Create</a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="menu-title mt-2">Other</li>

            <li class="nav-item">
                <a class="nav-link menu-arrow" href="#sidebarCoupons" data-bs-toggle="collapse" role="button"
                    aria-expanded="false" aria-controls="sidebarCoupons">
                    <span class="nav-icon">
                        <iconify-icon icon="solar:leaf-bold-duotone"></iconify-icon>
                    </span>
                    <span class="nav-text"> Coupons </span>
                </a>
                <div class="collapse" id="sidebarCoupons">
                    <ul class="nav sub-navbar-nav">
                        <li class="sub-nav-item">
                            <a class="sub-nav-link" href="{{url('admin/coupon')}}">List</a>
                        </li>
                        <li class="sub-nav-item">
                            <a class="sub-nav-link" href="{{url('admin/coupon/manage_coupon')}}">Add</a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="pages-review.php">
                    <span class="nav-icon">
                        <iconify-icon icon="solar:chat-square-like-bold-duotone"></iconify-icon>
                    </span>
                    <span class="nav-text"> Reviews </span>
                </a>
            </li>

            <li class="menu-title mt-2">Other Apps</li>

            <li class="nav-item">
                <a class="nav-link" href="apps-chat.php">
                    <span class="nav-icon">
                        <iconify-icon icon="solar:chat-round-bold-duotone"></iconify-icon>
                    </span>
                    <span class="nav-text"> Chat </span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="apps-email.php">
                    <span class="nav-icon">
                        <iconify-icon icon="solar:mailbox-bold-duotone"></iconify-icon>
                    </span>
                    <span class="nav-text"> Email </span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="apps-calendar.php">
                    <span class="nav-icon">
                        <iconify-icon icon="solar:calendar-bold-duotone"></iconify-icon>
                    </span>
                    <span class="nav-text"> Calendar </span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="apps-todo.php">
                    <span class="nav-icon">
                        <iconify-icon icon="solar:checklist-bold-duotone"></iconify-icon>
                    </span>
                    <span class="nav-text"> Todo </span>
                </a>
            </li>

            <li class="menu-title mt-2">Support</li>

            <li class="nav-item">
                <a class="nav-link" href="help-center.php">
                    <span class="nav-icon">
                        <iconify-icon icon="solar:help-bold-duotone"></iconify-icon>
                    </span>
                    <span class="nav-text"> Help Center </span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="pages-faqs.php">
                    <span class="nav-icon">
                        <iconify-icon icon="solar:question-circle-bold-duotone"></iconify-icon>
                    </span>
                    <span class="nav-text"> FAQs </span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="privacy-policy.php">
                    <span class="nav-icon">
                        <iconify-icon icon="solar:document-text-bold-duotone"></iconify-icon>
                    </span>
                    <span class="nav-text"> Privacy Policy </span>
                </a>
            </li>

            <li class="menu-title mt-2">Custom</li>

            <li class="nav-item">
                <a class="nav-link menu-arrow" href="#sidebarPages" data-bs-toggle="collapse" role="button"
                    aria-expanded="false" aria-controls="sidebarPages">
                    <span class="nav-icon">
                        <iconify-icon icon="solar:gift-bold-duotone"></iconify-icon>
                    </span>
                    <span class="nav-text"> Pages </span>
                </a>
                <div class="collapse" id="sidebarPages">
                    <ul class="nav sub-navbar-nav">
                        <li class="sub-nav-item">
                            <a class="sub-nav-link" href="pages-starter.php">Welcome</a>
                        </li>
                        <li class="sub-nav-item">
                            <a class="sub-nav-link" href="pages-comingsoon.php">Coming Soon</a>
                        </li>
                        <li class="sub-nav-item">
                            <a class="sub-nav-link" href="pages-timeline.php">Timeline</a>
                        </li>
                        <li class="sub-nav-item">
                            <a class="sub-nav-link" href="pages-pricing.php">Pricing</a>
                        </li>
                        <li class="sub-nav-item">
                            <a class="sub-nav-link" href="pages-maintenance.php">Maintenance</a>
                        </li>
                        <li class="sub-nav-item">
                            <a class="sub-nav-link" href="pages-404.php">404 Error</a>
                        </li>
                        <li class="sub-nav-item">
                            <a class="sub-nav-link" href="pages-404-alt.php">404 Error (alt)</a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link menu-arrow" href="#sidebarAuthentication" data-bs-toggle="collapse" role="button"
                    aria-expanded="false" aria-controls="sidebarAuthentication">
                    <span class="nav-icon">
                        <iconify-icon icon="solar:lock-keyhole-bold-duotone"></iconify-icon>
                    </span>
                    <span class="nav-text"> Authentication </span>
                </a>
                <div class="collapse" id="sidebarAuthentication">
                    <ul class="nav sub-navbar-nav">
                        <li class="sub-nav-item">
                            <a class="sub-nav-link" href="auth-signin.php">Sign In</a>
                        </li>
                        <li class="sub-nav-item">
                            <a class="sub-nav-link" href="auth-signup.php">Sign Up</a>
                        </li>
                        <li class="sub-nav-item">
                            <a class="sub-nav-link" href="auth-password.php">Reset Password</a>
                        </li>
                        <li class="sub-nav-item">
                            <a class="sub-nav-link" href="auth-lock-screen.php">Lock Screen</a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="widgets.php">
                    <span class="nav-icon">
                        <iconify-icon icon="solar:atom-bold-duotone"></iconify-icon>
                    </span>
                    <span class="nav-text">Widgets</span>
                    <span class="badge bg-info badge-pill text-end">9+</span>
                </a>
            </li>

            <li class="menu-title mt-2">Components</li>

            <li class="nav-item">
                <a class="nav-link menu-arrow" href="#sidebarBaseUI" data-bs-toggle="collapse" role="button"
                    aria-expanded="false" aria-controls="sidebarBaseUI">
                    <span class="nav-icon">
                        <iconify-icon icon="solar:bookmark-square-bold-duotone"></iconify-icon>
                    </span>
                    <span class="nav-text"> Base UI </span>
                </a>
                <div class="collapse" id="sidebarBaseUI">
                    <ul class="nav sub-navbar-nav">
                        <li class="sub-nav-item">
                            <a class="sub-nav-link" href="ui-accordion.php">Accordion</a>
                        </li>
                        <li class="sub-nav-item">
                            <a class="sub-nav-link" href="ui-alerts.php">Alerts</a>
                        </li>
                        <li class="sub-nav-item">
                            <a class="sub-nav-link" href="ui-avatar.php">Avatar</a>
                        </li>
                        <li class="sub-nav-item">
                            <a class="sub-nav-link" href="ui-badge.php">Badge</a>
                        </li>
                        <li class="sub-nav-item">
                            <a class="sub-nav-link" href="ui-breadcrumb.php">Breadcrumb</a>
                        </li>
                        <li class="sub-nav-item">
                            <a class="sub-nav-link" href="ui-buttons.php">Buttons</a>
                        </li>
                        <li class="sub-nav-item">
                            <a class="sub-nav-link" href="ui-card.php">Card</a>
                        </li>
                        <li class="sub-nav-item">
                            <a class="sub-nav-link" href="ui-carousel.php">Carousel</a>
                        </li>
                        <li class="sub-nav-item">
                            <a class="sub-nav-link" href="ui-collapse.php">Collapse</a>
                        </li>
                        <li class="sub-nav-item">
                            <a class="sub-nav-link" href="ui-dropdown.php">Dropdown</a>
                        </li>
                        <li class="sub-nav-item">
                            <a class="sub-nav-link" href="ui-list-group.php">List Group</a>
                        </li>
                        <li class="sub-nav-item">
                            <a class="sub-nav-link" href="ui-modal.php">Modal</a>
                        </li>
                        <li class="sub-nav-item">
                            <a class="sub-nav-link" href="ui-tabs.php">Tabs</a>
                        </li>
                        <li class="sub-nav-item">
                            <a class="sub-nav-link" href="ui-offcanvas.php">Offcanvas</a>
                        </li>
                        <li class="sub-nav-item">
                            <a class="sub-nav-link" href="ui-pagination.php">Pagination</a>
                        </li>
                        <li class="sub-nav-item">
                            <a class="sub-nav-link" href="ui-placeholders.php">Placeholders</a>
                        </li>
                        <li class="sub-nav-item">
                            <a class="sub-nav-link" href="ui-popovers.php">Popovers</a>
                        </li>
                        <li class="sub-nav-item">
                            <a class="sub-nav-link" href="ui-progress.php">Progress</a>
                        </li>
                        <li class="sub-nav-item">
                            <a class="sub-nav-link" href="ui-scrollspy.php">Scrollspy</a>
                        </li>
                        <li class="sub-nav-item">
                            <a class="sub-nav-link" href="ui-spinners.php">Spinners</a>
                        </li>
                        <li class="sub-nav-item">
                            <a class="sub-nav-link" href="ui-toasts.php">Toasts</a>
                        </li>
                        <li class="sub-nav-item">
                            <a class="sub-nav-link" href="ui-tooltips.php">Tooltips</a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link menu-arrow" href="#sidebarExtendedUI" data-bs-toggle="collapse" role="button"
                    aria-expanded="false" aria-controls="sidebarExtendedUI">
                    <span class="nav-icon">
                        <iconify-icon icon="solar:case-round-bold-duotone"></iconify-icon>
                    </span>
                    <span class="nav-text"> Advanced UI </span>
                </a>
                <div class="collapse" id="sidebarExtendedUI">
                    <ul class="nav sub-navbar-nav">
                        <li class="sub-nav-item">
                            <a class="sub-nav-link" href="extended-ratings.php">Ratings</a>
                        </li>
                        <li class="sub-nav-item">
                            <a class="sub-nav-link" href="extended-sweetalert.php">Sweet Alert</a>
                        </li>
                        <li class="sub-nav-item">
                            <a class="sub-nav-link" href="extended-swiper-silder.php">Swiper Slider</a>
                        </li>
                        <li class="sub-nav-item">
                            <a class="sub-nav-link" href="extended-scrollbar.php">Scrollbar</a>
                        </li>
                        <li class="sub-nav-item">
                            <a class="sub-nav-link" href="extended-toastify.php">Toastify</a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link menu-arrow" href="#sidebarCharts" data-bs-toggle="collapse" role="button"
                    aria-expanded="false" aria-controls="sidebarCharts">
                    <span class="nav-icon">
                        <iconify-icon icon="solar:pie-chart-2-bold-duotone"></iconify-icon>
                    </span>
                    <span class="nav-text"> Charts </span>
                </a>
                <div class="collapse" id="sidebarCharts">
                    <ul class="nav sub-navbar-nav">
                        <li class="sub-nav-item">
                            <a class="sub-nav-link" href="charts-apex-area.php">Area</a>
                        </li>
                        <li class="sub-nav-item">
                            <a class="sub-nav-link" href="charts-apex-bar.php">Bar</a>
                        </li>
                        <li class="sub-nav-item">
                            <a class="sub-nav-link" href="charts-apex-bubble.php">Bubble</a>
                        </li>
                        <li class="sub-nav-item">
                            <a class="sub-nav-link" href="charts-apex-candlestick.php">Candlestick</a>
                        </li>
                        <li class="sub-nav-item">
                            <a class="sub-nav-link" href="charts-apex-column.php">Column</a>
                        </li>
                        <li class="sub-nav-item">
                            <a class="sub-nav-link" href="charts-apex-heatmap.php">Heatmap</a>
                        </li>
                        <li class="sub-nav-item">
                            <a class="sub-nav-link" href="charts-apex-line.php">Line</a>
                        </li>
                        <li class="sub-nav-item">
                            <a class="sub-nav-link" href="charts-apex-mixed.php">Mixed</a>
                        </li>
                        <li class="sub-nav-item">
                            <a class="sub-nav-link" href="charts-apex-timeline.php">Timeline</a>
                        </li>
                        <li class="sub-nav-item">
                            <a class="sub-nav-link" href="charts-apex-boxplot.php">Boxplot</a>
                        </li>
                        <li class="sub-nav-item">
                            <a class="sub-nav-link" href="charts-apex-treemap.php">Treemap</a>
                        </li>
                        <li class="sub-nav-item">
                            <a class="sub-nav-link" href="charts-apex-pie.php">Pie</a>
                        </li>
                        <li class="sub-nav-item">
                            <a class="sub-nav-link" href="charts-apex-radar.php">Radar</a>
                        </li>
                        <li class="sub-nav-item">
                            <a class="sub-nav-link" href="charts-apex-radialbar.php">RadialBar</a>
                        </li>
                        <li class="sub-nav-item">
                            <a class="sub-nav-link" href="charts-apex-scatter.php">Scatter</a>
                        </li>
                        <li class="sub-nav-item">
                            <a class="sub-nav-link" href="charts-apex-polar-area.php">Polar Area</a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link menu-arrow" href="#sidebarForms" data-bs-toggle="collapse" role="button"
                    aria-expanded="false" aria-controls="sidebarForms">
                    <span class="nav-icon">
                        <iconify-icon icon="solar:book-bookmark-bold-duotone"></iconify-icon>
                    </span>
                    <span class="nav-text"> Forms </span>
                </a>
                <div class="collapse" id="sidebarForms">
                    <ul class="nav sub-navbar-nav">
                        <li class="sub-nav-item">
                            <a class="sub-nav-link" href="forms-basic.php">Basic Elements</a>
                        </li>
                        <li class="sub-nav-item">
                            <a class="sub-nav-link" href="forms-checkbox-radio.php">Checkbox &amp; Radio</a>
                        </li>
                        <li class="sub-nav-item">
                            <a class="sub-nav-link" href="forms-choices.php">Choice Select</a>
                        </li>
                        <li class="sub-nav-item">
                            <a class="sub-nav-link" href="forms-clipboard.php">Clipboard</a>
                        </li>
                        <li class="sub-nav-item">
                            <a class="sub-nav-link" href="forms-flatepicker.php">Flatepicker</a>
                        </li>
                        <li class="sub-nav-item">
                            <a class="sub-nav-link" href="forms-validation.php">Validation</a>
                        </li>
                        <li class="sub-nav-item">
                            <a class="sub-nav-link" href="forms-wizard.php">Wizard</a>
                        </li>
                        <li class="sub-nav-item">
                            <a class="sub-nav-link" href="forms-fileuploads.php">File Upload</a>
                        </li>
                        <li class="sub-nav-item">
                            <a class="sub-nav-link" href="forms-editors.php">Editors</a>
                        </li>
                        <li class="sub-nav-item">
                            <a class="sub-nav-link" href="forms-input-mask.php">Input Mask</a>
                        </li>
                        <li class="sub-nav-item">
                            <a class="sub-nav-link" href="forms-range-slider.php">Slider</a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link menu-arrow" href="#sidebarTables" data-bs-toggle="collapse" role="button"
                    aria-expanded="false" aria-controls="sidebarTables">
                    <span class="nav-icon">
                        <iconify-icon icon="solar:tuning-2-bold-duotone"></iconify-icon>
                    </span>
                    <span class="nav-text"> Tables </span>
                </a>
                <div class="collapse" id="sidebarTables">
                    <ul class="nav sub-navbar-nav">
                        <li class="sub-nav-item">
                            <a class="sub-nav-link" href="tables-basic.php">Basic Tables</a>
                        </li>
                        <li class="sub-nav-item">
                            <a class="sub-nav-link" href="tables-gridjs.php">Grid Js</a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link menu-arrow" href="#sidebarIcons" data-bs-toggle="collapse" role="button"
                    aria-expanded="false" aria-controls="sidebarIcons">
                    <span class="nav-icon">
                        <iconify-icon icon="solar:ufo-2-bold-duotone"></iconify-icon>
                    </span>
                    <span class="nav-text"> Icons </span>
                </a>
                <div class="collapse" id="sidebarIcons">
                    <ul class="nav sub-navbar-nav">
                        <li class="sub-nav-item">
                            <a class="sub-nav-link" href="icons-boxicons.php">Boxicons</a>
                        </li>
                        <li class="sub-nav-item">
                            <a class="sub-nav-link" href="icons-solar.php">Solar Icons</a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link menu-arrow" href="#sidebarMaps" data-bs-toggle="collapse" role="button"
                    aria-expanded="false" aria-controls="sidebarMaps">
                    <span class="nav-icon">
                        <iconify-icon icon="solar:streets-map-point-bold-duotone"></iconify-icon>
                    </span>
                    <span class="nav-text"> Maps </span>
                </a>
                <div class="collapse" id="sidebarMaps">
                    <ul class="nav sub-navbar-nav">
                        <li class="sub-nav-item">
                            <a class="sub-nav-link" href="maps-google.php">Google Maps</a>
                        </li>
                        <li class="sub-nav-item">
                            <a class="sub-nav-link" href="maps-vector.php">Vector Maps</a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="javascript:void(0);">
                    <span class="nav-icon">
                        <iconify-icon icon="solar:volleyball-bold-duotone"></iconify-icon>
                    </span>
                    <span class="nav-text">Badge Menu</span>
                    <span class="badge bg-danger badge-pill text-end">1</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link menu-arrow" href="#sidebarMultiLevelDemo" data-bs-toggle="collapse" role="button"
                    aria-expanded="false" aria-controls="sidebarMultiLevelDemo">
                    <span class="nav-icon">
                        <iconify-icon icon="solar:share-circle-bold-duotone"></iconify-icon>
                    </span>
                    <span class="nav-text"> Menu Item </span>
                </a>
                <div class="collapse" id="sidebarMultiLevelDemo">
                    <ul class="nav sub-navbar-nav">
                        <li class="sub-nav-item">
                            <a class="sub-nav-link" href="javascript:void(0);">Menu Item 1</a>
                        </li>
                        <li class="sub-nav-item">
                            <a class="sub-nav-link  menu-arrow" href="#sidebarItemDemoSubItem" data-bs-toggle="collapse"
                                role="button" aria-expanded="false" aria-controls="sidebarItemDemoSubItem">
                                <span> Menu Item 2 </span>
                            </a>
                            <div class="collapse" id="sidebarItemDemoSubItem">
                                <ul class="nav sub-navbar-nav">
                                    <li class="sub-nav-item">
                                        <a class="sub-nav-link" href="javascript:void(0);">Menu Sub item</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link disabled" href="javascript:void(0);">
                    <span class="nav-icon">
                        <iconify-icon icon="solar:user-block-rounded-bold-duotone"></iconify-icon>
                    </span>
                    <span class="nav-text"> Disable Item </span>
                </a>
            </li>
        </ul>
    </div>
</div>
<!-- sidebar end -->