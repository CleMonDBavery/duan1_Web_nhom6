<?
$productId = $_GET['id'];
$Product = new products();
$getID = $Product->getById($productId);

if (isset($_POST['editPD'])) {

    $file = $_FILES['image']['tmp_name'];
    $image = $_FILES['image']['name'];
    $path = realpath("../../assets/content/img") . "/" . $image;

    $name = $_POST['namepd'];
    $price = $_POST['price'];
    $priceSale = $_POST['priceSale'];
    $description = $_POST['mota'];
    $status = $_POST['status'];
    $categoryId = $_POST['category'];
    $result = $Product->update($productId, $name, $priceSale, $price, $description, $categoryId, $image, $status);
    header("location: ?page=tableProduct");

    //bắt lỗi form
    // if (move_uploaded_file($file, $path)) {
    //     if ($result) {
    //         $_SESSION['success'] = 'Thêm danh mục thành công!';
    //         exit();
    //     } else {
    //         $_SESSION['error'] = 'Thêm danh mục thất bại!';
    //         header("location: ?page=updateProduct");
    //         exit();
    //     }
    // } else {
    //     $_SESSION['error'] = 'Lỗi di chuyển file!';
    //     // header("location: products.php?act=add");
    //     exit;
    // }
}

?>
<div class="container">
    <section id="multiple-column-form">
        <div class="row match-height">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Chỉnh sửa sản phẩm</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form" method="post" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="first-name-column">Tên sản phẩm</label>
                                            <input type="text" class="form-control" placeholder="" name="namepd" value="<?php echo $Product->getInfoProduct($productId, 'name'); ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="last-name-column">Giá</label>
                                            <input type="number" class="form-control" placeholder="" name="price" value="<?php echo $Product->getInfoProduct($productId, 'price'); ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="last-name-column">Giá giảm</label>
                                            <input type="number" class="form-control" placeholder="" name="priceSale" value="<?php echo $Product->getInfoProduct($productId, 'priceSale'); ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="city-column">Hình ảnh</label>
                                            <input type="file" class="form-control" placeholder="" name="image" value="<?php echo $Product->getInfoProduct($productId, 'image'); ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="country-floating">Trạng thái</label>
                                            <input type="text" class="form-control" placeholder="" name="status" value="<?php echo $Product->getInfoProduct($productId, 'status'); ?>">
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

                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="email-id-column">Mô tả</label>
                                            <input class="form-control" name="mota" placeholder="" value="<?php echo $Product->getInfoProduct($productId, 'description'); ?>"></input>
                                        </div>
                                    </div>

                                    <div class="col-12 d-flex justify-content-end">
                                        <button class="btn btn-primary me-1 mb-1" name="editPD">Sửa</button>
                                        <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>