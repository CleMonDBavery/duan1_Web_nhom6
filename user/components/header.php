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
                    <form method="get">
                        <input name="searchProduct" class="input " type="text" placeholder="Enter your keyword">
                        <button name="btnSearch" class="search-btn"><i class="fa fa-search"></i></button>
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
                        <a href="#" class="text-uppercase">
                            <?
                            if (isset($_SESSION['member'])) {
                                $user = new User();
                                $userId = $_SESSION['member'];
                                $userInfo = $user->getuserId($userId);
                                echo $userInfo['fullName'];
                            } else {
                                echo 'Khách hàng';
                            }

                            ?>
                        </a>
                        <!-- / <a href="#" class="text-uppercase">Join</a> -->
                        <ul class="custom-menu">
                            <li><a href="?page=profile"><i class="fa fa-user-o"></i>Tài khoản của tôi</a></li>
                            <li><a href="?page=login"><i class="fa fa-unlock-alt"></i> Đăng nhập</a></li>
                            <li><a href="?page=register"><i class="fa fa-user-plus"></i>Đăng ký</a></li>
                            <li><a href="?page=logout"><i class="fa fa-check"></i> Đăng xuất</a></li>

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