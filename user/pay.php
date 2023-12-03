<?php
session_start();
include '../admin/assets/include/pdo.php';
include '../admin/page/users/user.php';
include '../admin/page/order/orders.php';
include '../admin/page/promotion/promotions.php';
?>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

        <title>E-SHOP HTML Template</title>
        <!-- Bootstrap CSS v5.2.1 -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
              integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT"
              crossorigin="anonymous">

        <!-- Google font -->
        <link href="https://fonts.googleapis.com/css?family=Hind:400,700" rel="stylesheet">

        <!-- Bootstrap -->
        <link type="text/css" rel="stylesheet" href="contents/css/bootstrap.min.css"/>

        <!-- Slick -->
        <link type="text/css" rel="stylesheet" href="contents/css/slick.css"/>
        <link type="text/css" rel="stylesheet" href="contents/css/slick-theme.css"/>

        <!-- nouislider -->
        <link type="text/css" rel="stylesheet" href="contents/css/nouislider.min.css"/>

        <!-- Font Awesome Icon -->
        <link rel="stylesheet" href="contents/css/font-awesome.min.css">

        <!-- Custom stlylesheet -->
        <link type="text/css" rel="stylesheet" href="contents/css/style.css"/>

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!-- [if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif] -->

        <link href="https://fonts.googleapis.com/css?family=Roboto:400,100,300,700" rel="stylesheet" type="text/css"/>

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"/>


        <link rel="stylesheet" href="contact-form-06/css/style.css"/>
    </head>
<?php


//if (!isset($_SESSION['member'])) {
//    echo "<script>
//            if(confirm('Bạn chưa đăng nhập. Bạn có muốn đăng nhập không?')) {
//                window.location.href = '?page=login';
//            }
//         </script>";
//}


$users = new User();
$userId = $_SESSION['member'];

$list = $users->getuserId($userId);
include './components/header.php';
include './components/nav.php';
?>

    <div class="container rounded bg-white mt-5 mb-5">
        <form class="needs-validation" name="frmthanhtoan" method="post">
            <input type="hidden" name="" value="">

            <div class="py-5 text-center">
                <i class="fa fa-credit-card fa-4x" aria-hidden="true"></i>
                <h2>Thanh toán</h2>
                <p class="lead">Vui lòng kiểm tra thông tin Khách hàng, thông tin Giỏ hàng trước khi Đặt hàng.</p>
            </div>

            <div class="row">
                <div class="col-md-4 order-md-2 mb-4">
                    <h4 class="d-flex justify-content-between align-items-center mb-3">
                        <!--                    <span class="text-muted">Giỏ hàng</span>-->
                        <!--                    <span class="badge badge-secondary badge-pill">2</span>-->
                    </h4>
                    <?
                    if (isset($_GET['cart']) && $_GET['cart'] === 'true') {

                        if (isset($_COOKIE['cart'])) {
                            $cookie_data = $_COOKIE['cart'];
                            $cart_data = json_decode($cookie_data, true);

                            echo "<div class='container'>";
                            echo "<h2>Thông tin sản phẩm trong giỏ hàng</h2>";

                            $tongTien = 0; // Khởi tạo biến tổng giá

                            foreach ($cart_data as $sp) {
                                echo "<div class='product-info'>";
                                echo "<p>Mã sản phẩm: " . $sp['productId'] . "</p>";
                                echo "<p>Tên: " . $sp['name'] . "</p>";
                                echo "<p>Giá: " . number_format($sp['price']) . " đ</p>";
                                echo "<p>Số lượng: " . $sp['soluong'] . "</p>";

                                // Tính tổng giá từng sản phẩm
                                $thanhTien = $sp['price'] * $sp['soluong'];
                                $tongTien += $thanhTien;

                                // Thêm chi tiết khác nếu cần
                                echo "</div>";
                                echo "<hr>";
                            }
                            $totalPrice = $tongTien;

                            echo "</div>";
                        } else {
                            echo "<p>Giỏ hàng trống.</p>";
                        }
                    } else {
                        echo "<p>Không có thông tin giỏ hàng.</p>";
                    }
                    ?>

                    <!--Xử lí thanh toán-->
                    <?php
                    $order = new orders();
                    $promotion = new promotions();
                    $db = new connect();
                    if (isset($_POST['btnDatHang'])) {

                        $totalPrice = $tongTien;
                        $destination = $_POST['address'];
                        $promotionId = isset($_POST['voucher']) ? $_POST['voucher'] : NULL;
                        $userId = $list['userId'];
                        $status = 'Chờ xác nhận';
                        $date = date('Y-m-d H:i:s');

                        if (isset($_POST['greatVoucher'])) {
                            $promotion = $promotion->getPromotions($promotionId);
                            if ($promotion && $totalPrice >= $promotion['conditionPro']) {
                                echo "Áp dụng mã khuyến mãi: " . $promotion['name'];
                                $totalPrice -= $promotion['discount'];
                            } else {
                                echo "Không đủ điều kiện để sử dụng mã khuyến mãi.";
                                return;
                            }
                        }

                        $order->insertOrder($totalPrice, $destination, $promotionId, $userId, $status, $date);
                        $query = $order->getOrderID();
                        $orderId = $query[0]['orderId'];
                        if (isset($query)) {

                            $productId = $sp['productId'];
                            $amount = $sp['soluong'];
                            $price = $sp['price'];

                            $result = $order->insertOrderDetail($productId, $amount, $orderId, $price);

                            if (!$result) {
                                echo "Có lỗi xảy ra khi thêm chi tiết đơn hàng.";
                            } else {
                                echo "Thêm chi tiết đơn hàng thành công!";
                            }

                        } else {
                            echo "Có lỗi xảy ra khi tạo đơn hàng.";
                        }
                    }
                    ?>

                    <li class='list-group-item d-flex justify-content-between'>
                        <span>Tổng thành tiền</span>
                        <strong> <?= number_format($tongTien) ?> VNĐ</strong>
                    </li>
                    <div class="input-group">
                        <input name="voucher" type="text" class="form-control" placeholder="Mã khuyến mãi">
                        <div class="input-group-append">
                            <button name="greatVoucher" type="submit" class="btn btn-outline-danger">Xác nhận</button>
                        </div>
                    </div>

                </div>
                <div class="col-md-8 order-md-1">
                    <h4 class="mb-3">Thông tin khách hàng</h4>

                    <div class="row">
                        <div class="col-md-12">
                            <label for="kh_ten">Họ tên</label>
                            <input type="text" class="form-control" name="name" id="kh_ten"
                                   value=" <?= $list['fullName'] ?> ">
                        </div>
                        <div class="col-md-12">
                            <label for="kh_diachi">Địa chỉ</label>
                            <input type="text" class="form-control" name="address" id="kh_diachi"
                                   value="<?= $list['address'] ?> ">
                        </div>
                        <div class="col-md-12">
                            <label for="kh_dienthoai">Điện thoại</label>
                            <input type="text" class="form-control" name="phone" id="kh_dienthoai"
                                   value="<?= $list['phone'] ?> ">
                        </div>

                    </div>

                    <hr class="mb-4">
                    <button class="btn btn-primary btn-lg btn-block w-25" type="submit" name="btnDatHang">
                        Đặt hàng
                    </button>
                </div>
            </div>
        </form>

    </div>
<?
include "./components/footer.php";
?>