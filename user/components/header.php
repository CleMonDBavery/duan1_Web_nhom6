<header>
    <!-- header -->
    <div id="header">
        <div class="container">
            <div class="pull-left">
                <!-- Logo -->
                <div class="header-logo">
                    <a class="logo" href="#">
                        <img src="contents/img/logo.png" alt="">
                    </a>
                </div>
                <!-- /Logo -->

                <!-- Search -->
                <div class="header-search">
                    <form>
                        <input class="input search-input" type="text" placeholder="Enter your keyword">
                        <select class="input search-categories">
                            <option value="0">All Categories</option>
                            <option value="1">Category 01</option>
                            <option value="1">Category 02</option>
                        </select>
                        <button class="search-btn"><i class="fa fa-search"></i></button>
                    </form>
                </div>
                <!-- /Search -->
            </div>
            <div class="pull-right">
                <ul class="header-btns">
                    <!-- Account -->
                    <li class="header-account dropdown default-dropdown" style="width: 180px;">
                        <div class="dropdown-toggle" role="button" data-toggle="dropdown" aria-expanded="true">
                            <div class="header-btns-icon">
                                <i class="fa fa-user-o"></i>
                            </div>
                            <strong class="text-uppercase">Tài khoản </strong>
                            <!-- <i class="fa fa-caret-down"></i> -->
                        </div>
                        <a href="#" class="text-uppercase">User</a>
                        <!-- / <a href="#" class="text-uppercase">Join</a> -->
                        <ul class="custom-menu">
                            <li><a href="?page=profile"><i class="fa fa-user-o"></i> My Account</a></li>
                            <!-- <li><a href="#"><i class="fa fa-exchange"></i> Compare</a></li> -->
                            <li><a href="#"><i class="fa fa-check"></i> Checkout</a></li>
                            <li><a href="?page=login"><i class="fa fa-unlock-alt"></i> Login</a></li>
                            <li><a href="?page=register"><i class="fa fa-user-plus"></i> Create An Account</a></li>
                        </ul>
                    </li>
                    <!-- /Account -->

                    <li class="header-cart">
                        <a href="?page=cart">
                            <div class="header-btns-icon">
                                <i class="fa fa-shopping-cart"></i>
                                <span class="qty">3</span>
                            </div>
                        </a>
                    </li>

                    <!-- Mobile nav toggle-->
                    <li class="nav-toggle">
                        <button class="nav-toggle-btn main-btn icon-btn"><i class="fa fa-bars"></i></button>
                    </li>
                    <!-- / Mobile nav toggle -->
                </ul>
            </div>
        </div>
        <!-- header -->
    </div>
    <!-- container -->
</header>