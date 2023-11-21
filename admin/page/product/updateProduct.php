<?
$productId = $_GET['id'];
$Product = new products();
$getID = $Product->getById($productId);

if (isset($_POST['editPD'])) {

    $file = $_FILES['image']['tmp_name'];
    $image = $_FILES['image']['name'];
    $path = realpath("../admin/assets/content/img") . "/" . $image;
//    $path = "../admin/assets/content/img/" . $image;

    $name = $_POST['namepd'];
    $price = $_POST['price'];
    $priceSale = $_POST['priceSale'];
    $description = $_POST['mota'];
    $status = isset($_POST['status']) && $_POST['status'] === 'on' ? 'Active' : 'Inactive';
    $categoryId = $_POST['category'];
//    header("location: ?page=tableProduct");

//    bắt lỗi form
    if (move_uploaded_file($file, $path)) {
        $result = $Product->update($productId, $name, $priceSale, $price, $description, $categoryId, $image, $status);

        if ($result) {
            $_SESSION['success'] = 'Thêm danh mục thành công!';
            header("location: ?page=tableProduct");
            exit();
        } else {
            $_SESSION['error'] = 'Thêm danh mục thất bại!';
            header("location: ?page=updateProduct&id='.$productId.'");
            exit();
        }
    } else {
        $_SESSION['error'] = 'Lỗi di chuyển file!';
        // header("location: products.php?act=add");
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
                                <li class="breadcrumb-item active" aria-current="page">Sản phẩm</li>
                                <li class="breadcrumb-item " aria-current="page">Sửa dữ liệu</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
            <section class="section">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">
                            Sửa dữ liệu sản phẩm
                        </h5>
                        <div class="col-12">
                            <div class="card">
                                <div class="card-content">
                                    <div class="card-body">
                                        <form class="form" method="post" enctype="multipart/form-data">
                                            <div class="row">
                                                <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                        <label for="first-name-column">Tên sản phẩm</label>
                                                        <input type="text" class="form-control" placeholder=""
                                                               name="namepd"
                                                               value="<?php echo $Product->getInfoProduct($productId, 'name'); ?>">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                        <label for="last-name-column">Giá</label>
                                                        <input type="number" class="form-control" placeholder=""
                                                               name="price"
                                                               value="<?php echo $Product->getInfoProduct($productId, 'price'); ?>">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                        <label for="last-name-column">Giá giảm</label>
                                                        <input type="number" class="form-control" placeholder=""
                                                               name="priceSale"
                                                               value="<?php echo $Product->getInfoProduct($productId, 'priceSale'); ?>">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                        <label for="city-column">Hình ảnh</label>
                                                        <input type="file" class="form-control" placeholder=""
                                                               name="image"
                                                               value="<?php echo $Product->getInfoProduct($productId, 'image'); ?>">
                                                    </div>
                                                </div>

                                                <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                        <!-- <label for="email-productId-column">Loại</label>
                                                        <input class="form-control" name="category" placeholder=""> -->
                                                        <?php
                                                        $selectDropdown = $Product->renderCategorySelect();
                                                        echo $selectDropdown;
                                                        ?>
                                                    </div>
                                                    <div class="form-check form-switch">
                                                        <input name="status" class="form-check-input" type="checkbox"
                                                               id="flexSwitchCheckChecked" checked>
                                                        <label class="form-check-label" for="flexSwitchCheckChecked">Active</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                        <label for="email-id-column">Mô tả</label>
                                                        <input class="form-control" name="mota" placeholder=""
                                                               value="<?php echo $Product->getInfoProduct($productId, 'description'); ?>"></input>
                                                    </div>
                                                </div>

                                                <div class="col-12 d-flex justify-content-end">
                                                    <button class="btn btn-primary me-1 mb-1" name="editPD">Sửa</button>
                                                    <button type="reset" class="btn btn-light-secondary me-1 mb-1">
                                                        Reset
                                                    </button>
                                                </div>
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