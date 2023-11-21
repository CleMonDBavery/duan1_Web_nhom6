<?
$userId = $_GET['idU'];
$users = new User();
$getIdU = $users->getuserId($userId);
if (isset($_POST['edit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $fullName = $_POST['fullName'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $avatar = $_POST['avatar'];
    $role = $_POST['role'];
    $status = isset($_POST['status']) && $_POST['status'] === 'on' ? 'Active' : 'Inactive';
    $resuly = $users->update($userId, $username, $password, $fullName, $phone, $email, $address, $avatar, $role, $status);
    if (isset($resuly)) {
        $_SESSION['success'] = 'Sửa thành công!';
        header("location:?page=tableUser");
        exit;
    } else {
        $_SESSION['error'] = 'Sua thất bại!';
        header("location:?page=updateUser");
        exit;
    }
}
?>

<script src="./assets/static/js/initTheme.js"></script>
<div id="app">
    <?php
    include './assets/include/nav.php';
    ?>
    <div id="main">
        <header class="mb-3">
            <a href="#" class="burger-btn d-block d-xl-none">
                <i class="bi bi-justify fs-3"></i>
            </a>
        </header>

        <div class="page-heading">
            <div class="page-title">
                <div class="row">
                    <div class="col-12 col-md-6 order-md-1 order-last">
                        <h3>Quan li</h3>
                    </div>
                    <div class="col-12 col-md-6 order-md-2 order-first">
                        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item active"><a href="">Quan li</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Tai khoan</li>
                                <li class="breadcrumb-item " aria-current="page">Sửa thông tin</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
            <section class="section">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">
                            Chỉnh sủa thông tin
                        </h5>
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Sửa quyền</h4>
                                </div>
                                <div class="card-content">
                                    <div class="card-body">
                                        <form class="row g-3 needs-validation" novalidate method="post">
                                            <div class="col-md-4">
                                                <label for="validationCustom01" class="form-label">Tên</label>
                                                <input name="username" type="text" class="form-control"
                                                       id="validationCustom01"
                                                       value="<?= $users->getInfoProfile($userId, 'username'); ?>">
                                            </div>
                                            <div class="col-md-4">
                                                <label for="validationCustom02" class="form-label">Số điện thoại</label>
                                                <input name="phone" type="text" class="form-control"
                                                       id="validationCustom02"
                                                       value="<?= $users->getInfoProfile($userId, 'phone'); ?>">
                                            </div>
                                            <div class="col-md-4">
                                                <label for="validationCustomUsername" class="form-label">Email</label>
                                                <div class="input-group has-validation">
                                                    <span class="input-group-text" id="inputGroupPrepend">@</span>
                                                    <input name="email" type="text" class="form-control"
                                                           id="validationCustomUsername"
                                                           aria-describedby="inputGroupPrepend"
                                                           value="<?= $users->getInfoProfile($userId, 'email'); ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="validationCustom03" class="form-label">Địa chỉ</label>
                                                <input name="address" type="text" class="form-control"
                                                       id="validationCustom03"
                                                       value="<?= $users->getInfoProfile($userId, 'address'); ?>">
                                            </div>
                                            <div class="col-md-3">
                                                <label for="validationCustom04" class="form-label">Quyền</label>
                                                <select name="role" class="form-select" id="validationCustom04"
                                                        required>
                                                    <?= $select = $users->getInfoProfile($userId, 'role'); ?>
                                                    <option selected disabled
                                                            value=""><?= $users->getInfoProfile($userId, 'role'); ?></option>
                                                    <option <?= ($select === 'admin'); ?>>admin</option>
                                                    <option <?= ($select === 'member'); ?>>member</option>
                                                </select>
                                            </div>
                                            <div class="form-check form-switch">
                                                <input name="status" class="form-check-input" type="checkbox"
                                                       id="flexSwitchCheckChecked" checked
                                                       value="<?= $users->getInfoProfile($userId, 'status'); ?>">
                                                <label class="form-check-label"
                                                       for="flexSwitchCheckChecked">Active</label>
                                            </div>

                                            <div class="col-12">
                                                <button name="edit" class="btn btn-primary" type="submit">Sửa</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>
