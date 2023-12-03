<?php
$productId = $_GET['id'];
$products = new products();
$idProduct = $products->getById($productId);
$pdCategory = $idProduct['categoryId'];


?>
<!DOCTYPE html>
<html lang="en">

<body>


<!-- BREADCRUMB -->
<div id="breadcrumb">
    <div class="container">
        <ul class="breadcrumb">
            <li><a href="#">Home</a></li>
            <li><a href="#">Products</a></li>
            <li><a href="#">Category</a></li>
            <li class="active"><?= $idProduct['name']; ?></li>
        </ul>
    </div>
</div>
<!-- /BREADCRUMB -->

<!-- section -->
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <!--  Product Details -->
            <div class="product product-details clearfix">
                <div class="col-md-6">
                    <div id="product-main-view">
                        <div class="product-view">
                            <img src="../image/<?= $idProduct['image']; ?>" style="" alt="">
                        </div>
                        <!-- <div class="product-view">
                            <img src="contents/img/main-product02.jpg" alt="">
                        </div>
                    </div>
                        <div class="product-view">
                            <img src="contents/img/thumb-product04.jpg" alt="">
                        </div>
                    </div> -->
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="product-body">
                        <div class="product-label">
                            <span>New</span>
                            <!--                            <span class="sale">-20%</span>-->
                        </div>
                        <h2 class="product-name"><?= $idProduct['name']; ?></h2>
                        <h3 class="product-price"><?= number_format($idProduct['price']); ?> VND
                            <del class="product-old-price"><?= number_format($idProduct['priceSale']); ?> VND</del>
                        </h3>
                        <div>
                            <div class="product-rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star-o empty"></i>
                            </div>
                            <a href="#">3 Review(s) / Add Review</a>
                        </div>
                        <p><strong>Tình trạng:</strong> Còn hàng</p>
                        <p><strong>Thương hiệu:</strong> E-SHOP</p>
                        <p><?= $idProduct['description'] ?></p>

                        <div class="product-btns">


                            <form action="giohang-xuly.php" method="post">
                                <input type="hidden" name="productId" value="<?= $idProduct['productId'] ?>">
                                <!-- Add a select input for the size -->
                                <div class="qty-input">
                                    <span class="text-uppercase">Số lượng: </span>
                                    <input class="input" type="number" name="soluong" value="1" min="1">
                                </div>
                                <button class="primary-btn add-to-cart" type="submit" name="them">
                                    <i class="fa fa-shopping-cart"></i> Thêm giỏ hàng
                                </button>
                            </form>

                            <div class="pull-right">
                                <button class="main-btn icon-btn"><i class="fa fa-heart"></i></button>
                                <button class="main-btn icon-btn"><i class="fa fa-exchange"></i></button>
                                <button class="main-btn icon-btn"><i class="fa fa-share-alt"></i></button>
                            </div>
                        </div>


                    </div>
                </div>
                <div class="col-md-12">
                    <div class="product-tab">
                        <ul class="tab-nav">
                            <li class="active"><a data-toggle="tab" href="#tab1">Description</a></li>
                            <!--                            <li><a data-toggle="tab" href="#tab1">Details</a></li>-->
                            <li><a data-toggle="tab" href="#tab2">Reviews (3)</a></li>
                        </ul>
                        <div class="tab-content">
                            <div id="tab1" class="tab-pane fade in active">
                                <p><strong>HƯỚNG DẪN BẢO QUẢN</strong><br>
                                    – Giặt máy ở nhiệt độ tối đa 30độC, giặt bên trong túi giặt và vắt ở tốc độ thấp để
                                    sản phẩm được bảo vệ tốt hơn.<br>
                                    – Không sử dụng nước tẩy, thuốc tẩy, bột giặt có chất tẩy mạnh. Không giặt chung sản
                                    phẩm màu trắng với các sản phẩm khác màu tránh tình trạng loang màu.<br>
                                    – Phơi ngay sau khi giặt giúp sản phẩm đỡ nhăn, phơi mặt trái ở bóng râm giúp sản
                                    phẩm lưu giữ màu tốt hơn.<br>
                                    – Là sản phẩm ở nhiệt độ dưới 110độC, ưu tiên dùng bàn là hơi nước.</p>
                            </div>
                            <div id="tab2" class="tab-pane fade in">

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="product-reviews">
                                            <div class="single-review">
                                                <div class="review-heading">
                                                    <div><a href="#"><i class="fa fa-user-o"></i> John</a></div>
                                                    <div><a href="#"><i class="fa fa-clock-o"></i> 27 DEC 2017 / 8:0 PM</a>
                                                    </div>
                                                    <div class="review-rating pull-right">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star-o empty"></i>
                                                    </div>
                                                </div>
                                                <div class="review-body">
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do
                                                        eiusmod tempor incididunt ut labore et dolore magna aliqua.Ut
                                                        enim ad minim veniam, quis nostrud exercitation ullamco laboris
                                                        nisi ut aliquip ex ea commodo consequat.Duis aute
                                                        irure dolor in reprehenderit in voluptate velit esse cillum
                                                        dolore eu fugiat nulla pariatur.</p>
                                                </div>
                                            </div>

                                            <div class="single-review">
                                                <div class="review-heading">
                                                    <div><a href="#"><i class="fa fa-user-o"></i> John</a></div>
                                                    <div><a href="#"><i class="fa fa-clock-o"></i> 27 DEC 2017 / 8:0 PM</a>
                                                    </div>
                                                    <div class="review-rating pull-right">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star-o empty"></i>
                                                    </div>
                                                </div>
                                                <div class="review-body">
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do
                                                        eiusmod tempor incididunt ut labore et dolore magna aliqua.Ut
                                                        enim ad minim veniam, quis nostrud exercitation ullamco laboris
                                                        nisi ut aliquip ex ea commodo consequat.Duis aute
                                                        irure dolor in reprehenderit in voluptate velit esse cillum
                                                        dolore eu fugiat nulla pariatur.</p>
                                                </div>
                                            </div>

                                            <div class="single-review">
                                                <div class="review-heading">
                                                    <div><a href="#"><i class="fa fa-user-o"></i> John</a></div>
                                                    <div><a href="#"><i class="fa fa-clock-o"></i> 27 DEC 2017 / 8:0 PM</a>
                                                    </div>
                                                    <div class="review-rating pull-right">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star-o empty"></i>
                                                    </div>
                                                </div>
                                                <div class="review-body">
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do
                                                        eiusmod tempor incididunt ut labore et dolore magna aliqua.Ut
                                                        enim ad minim veniam, quis nostrud exercitation ullamco laboris
                                                        nisi ut aliquip ex ea commodo consequat.Duis aute
                                                        irure dolor in reprehenderit in voluptate velit esse cillum
                                                        dolore eu fugiat nulla pariatur.</p>
                                                </div>
                                            </div>

                                            <ul class="reviews-pages">
                                                <li class="active">1</li>
                                                <li><a href="#">2</a></li>
                                                <li><a href="#">3</a></li>
                                                <li><a href="#"><i class="fa fa-caret-right"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <h4 class="text-uppercase">Đánh giá</h4>
                                        <p>Your email address will not be published.</p>
                                        <form class="review-form">
                                            <div class="form-group">
                                                <input name="name" class="input" type="text" placeholder="Your Name"/>
                                            </div>
                                            <div class="form-group">
                                                <input name="email" class="input" type="email"
                                                       placeholder="Email Address"/>
                                            </div>
                                            <div class="form-group">
                                                <textarea name="conntent" class="input"
                                                          placeholder="Your review"></textarea>
                                            </div>
                                            <!--                                            <div class="form-group">-->
                                            <!--                                                <div class="input-rating">-->
                                            <!--                                                    <strong class="text-uppercase">Your Rating: </strong>-->
                                            <!--                                                    <div class="stars">-->
                                            <!--                                                        <input type="radio" id="star5" name="rating" value="5"/><label-->
                                            <!--                                                                for="star5"></label>-->
                                            <!--                                                        <input type="radio" id="star4" name="rating" value="4"/><label-->
                                            <!--                                                                for="star4"></label>-->
                                            <!--                                                        <input type="radio" id="star3" name="rating" value="3"/><label-->
                                            <!--                                                                for="star3"></label>-->
                                            <!--                                                        <input type="radio" id="star2" name="rating" value="2"/><label-->
                                            <!--                                                                for="star2"></label>-->
                                            <!--                                                        <input type="radio" id="star1" name="rating" value="1"/><label-->
                                            <!--                                                                for="star1"></label>-->
                                            <!--                                                    </div>-->
                                            <!--                                                </div>-->
                                            <!--                                            </div>-->
                                            <button class="primary-btn">Submit</button>
                                        </form>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <!-- /Product Details -->
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /section -->

<!-- section -->
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <!-- section title -->
            <div class="col-md-12">
                <div class="section-title">
                    <h2 class="title">Picked For You</h2>
                </div>
            </div>
            <!-- section title -->

            <?
            $list = $products->moreProduct($pdCategory);
            echo $list;
            ?>
            <!-- Product Single -->
            <!--            <div class="col-md-3 col-sm-6 col-xs-6">-->
            <!--                <div class="product product-single">-->
            <!--                    <div class="product-thumb">-->
            <!--                        <div class="product-label">-->
            <!--                            <span>New</span>-->
            <!--                            <span class="sale">-20%</span>-->
            <!--                        </div>-->
            <!--                        <button class="main-btn quick-view"><i class="fa fa-search-plus"></i> Quick view</button>-->
            <!--                        <img src="contents/img/product01.jpg" alt="">-->
            <!--                    </div>-->
            <!--                    <div class="product-body">-->
            <!--                        <h3 class="product-price">$32.50-->
            <!--                            <del class="product-old-price">$45.00</del>-->
            <!--                        </h3>-->
            <!--                        <div class="product-rating">-->
            <!--                            <i class="fa fa-star"></i>-->
            <!--                            <i class="fa fa-star"></i>-->
            <!--                            <i class="fa fa-star"></i>-->
            <!--                            <i class="fa fa-star"></i>-->
            <!--                            <i class="fa fa-star-o empty"></i>-->
            <!--                        </div>-->
            <!--                        <h2 class="product-name"><a href="#">Product Name Goes Here</a></h2>-->
            <!--                        <div class="product-btns">-->
            <!--                            <button class="main-btn icon-btn"><i class="fa fa-heart"></i></button>-->
            <!--                            <button class="main-btn icon-btn"><i class="fa fa-exchange"></i></button>-->
            <!--                            <button class="primary-btn add-to-cart"><i class="fa fa-shopping-cart"></i> Add to Cart-->
            <!--                            </button>-->
            <!--                        </div>-->
            <!--                    </div>-->
            <!--                </div>-->
            <!--            </div>-->
            <!-- /Product Single -->
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /section -->
</body>

</html>
