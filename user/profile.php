<?php
$user = new User();
$userId = $_SESSION['member'];
$userInfo = $user->getuserId($userId);
// Kiểm tra xem người dùng đã đăng nhập hay chưa
if (isset($_SESSION['member'])) {

    if ($userInfo) {
        $fullName = $userInfo['fullName'];
        $email = $userInfo['email'];
        $phone = $userInfo['phone'];
        $address = $userInfo['address'];
        $avatar = $userInfo['avatar'];
    } else {
        // Xử lý nếu không có dữ liệu trả về
        $fullName = "Không có thông tin";
        $email = "Không có thông tin";
        $phone = "Không có thông tin";
        $address = "Không có thông tin";
    }
} else {
    // Xử lý nếu người dùng chưa đăng nhập
    $fullName = "Không có thông tin";
    $email = "Không có thông tin";
    $phone = "Không có thông tin";
    $address = "Không có thông tin";
}

if (isset($_POST['saveInfo'])) {

    $fullname = $_POST['name'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $email = $_POST['email'];

    $result = $user->updateProfile($userId, $fullName, $phone, $email, $address);
    if ($result) {
        $_SESSION['success'] = 'Sửa mục thành công!';
        header("location: ?page=profile");
        exit;
    } else {
        $_SESSION['error'] = 'Sửa thất thất bại!';
        header("location: ?page=profile");
        exit;
    }

}

?>

<div class="container rounded bg-white mt-5 mb-5">
    <div class="row">
        <div class="col-md-3 border-right">
            <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                <img class="rounded-circle mt-5" width="150px"
                     src="../image/<?= $avatar ?>" id="avatarPreview">
                <span class="font-weight-bold"><?= $fullName ?></span>
                <span class="text-black-50"><?= $email ?></span>
            </div>
        </div>
        <div class="col-md-5 border-right">
            <form method="post">
                <div class="p-3 py-5">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 class="text-right">Thông tin</h4>
                    </div>

                    <div class="row mt-3">
                        <div class="col-md-12">
                            <label class="labels">Tên</label>
                            <input name="name" type="text" class="form-control" placeholder="Họ và tên"
                                   value="<?= $fullName ?>">
                        </div>
                        <div class="col-md-12">
                            <label class="labels">Số điện thoại</label>
                            <input name="phone" type="text" class="form-control" placeholder="Số điện thoại"
                                   value="0<?= $phone ?>">
                        </div>
                        <div class="col-md-12">
                            <label class="labels">Địa chỉ</label>
                            <input name="address" type="text" class="form-control" placeholder="Địa chỉ"
                                   value="<?= $address ?>">
                        </div>
                        <div class="col-md-12">
                            <label class="labels">Email</label>
                            <input name="email" type="text" class="form-control" placeholder="Email"
                                   value="<?= $email ?>">
                        </div>
                    </div>

                    <div class="mt-5 text-center">
                        <button class="btn btn-primary profile-button" name="saveInfo" type="submit">Lưu thông tin
                        </button>
                    </div>
                </div>
            </form>

        </div>
        <div class="col-md-4">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center experience">
                    <span>Edit Experience</span>
                    <span class="border px-3 p-1 add-experience">
                        <i class="fa fa-plus"></i>&nbsp;Experience</span>
                </div>
                <br>
                <div class="col-md-12">
                    <label class="labels">Mật khẩu</label>
                    <input name="password" type="password" class="form-control" value="">
                </div>

                <br>
                <div class="col-md-12">
                    <label class="labels">Additional Details</label>
                    <input type="text" class="form-control" placeholder="additional details" value="">
                </div>
            </div>
        </div>
    </div>
    <?php
    //    $user = new User();
    //    $userId = $_SESSION['member'];
    //    $orderConfirm = $user->getOrder($userId);
    ?>

    <div class="col-md-12">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h4 class="text-right">Đơn hàng chờ xác nhận</h4>
        </div>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">Người mua</th>
                <th scope="col">Tổng tiền</th>
                <th scope="col">Ngày mua</th>
                <th scope="col">Địa chỉ</th>
                <th scope="col">Trạng thái</th>
                <th scope="col">Thao tác</th>
            </tr>
            </thead>
            <tbody>
            <!--            --><?php //foreach ($orderConfirm as $order): ?>
            <!--                <tr>-->
            <!--                    <td>--><?php //= $order['Người mua']; ?><!--</td>-->
            <!--                    <td>--><?php //= $order['Tổng tiền']; ?><!--</td>-->
            <!--                    <td>--><?php //= date('d/m/Y', strtotime($order['Ngày mua'])); ?><!--</td>-->
            <!--                    <td>--><?php //= $order['Địa chỉ']; ?><!--</td>-->
            <!--                    <td>--><?php //= $order['Trạng thái']; ?><!--</td>-->
            <!--                    <td>-->
            <!--                        <a class="btn btn-warning" href="-->
            <?php //= $order['cancelLink']; ?><!--">Hủy đơn</a>-->
            <!--                    </td>-->
            <!--                </tr>-->
            <!--            --><?php //endforeach; ?>
            </tbody>
        </table>
    </div>