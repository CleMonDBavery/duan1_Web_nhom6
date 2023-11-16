<?php
$products = new products();

if (isset($_POST['addPD'])) {

    $file = $_FILES['image']['tmp_name'];
    $image = $_FILES['image']['name'];
    print_r($image);

    $path = realpath("../../assets/content/img/") . "/" . $image;

    $name = $_POST['namepd'];
    $price = $_POST['price'];
    $priceSale = $_POST['priceSale'];
    $description = $_POST['mota'];
    $status = $_POST['status'];
    $categoryId = $_POST['category'];

    // if (
    //     $ProductName == "" ||
    //     $ProductImage == "" ||
    //     $ProductPrice == "" ||
    //     $ProductDesc == "" ||
    //     $ProductCategory == ""
    // ) {
    //     $_SESSION['error'] = 'Vui lòng điền đầy đủ thông tin';
    //     header("location: products.php?act=add");
    //     exit;
    // } else {
    // require_once "Product.php";

    if (move_uploaded_file($file, $path)) {
        $result = $products->add($name, $priceSale, $price, $description, $categoryId, $image, $status);
        // var_dump($result);
        // exit();
        if ($result) {
            $_SESSION['success'] = 'Thêm danh mục thành công!';
            header("location: ?page=tableProduct");
            exit;
        } else {
            $_SESSION['error'] = 'Thêm danh mục thất bại!';
            header("location: ?page=addProduct");
            exit;
        }
    } else {
        $_SESSION['error'] = 'Lỗi di chuyển file!';
        // header("location: products.php?act=add");
        exit;
    }
}

?>

<div class="container">
    <section id="multiple-column-form">
        <div class="row match-height">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Thêm sản phẩm</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form" method="post" enctype="multipart/form-data">
                                <div class="row">

                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="first-name-column">Tên sản phẩm</label>
                                            <input type="text" class="form-control" placeholder="" name="namepd">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="last-name-column">Giá</label>
                                            <input type="number" class="form-control" placeholder="" name="price">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="last-name-column">Giá giảm</label>
                                            <input type="number" class="form-control" placeholder="" name="priceSale">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="city-column">Hình ảnh</label>
                                            <input type="file" class="form-control" placeholder="" name="image">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="country-floating">Trạng thái</label>
                                            <input type="text" class="form-control" placeholder="" name="status">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <!-- <label for="email-id-column">Loại</label>
                                            <input class="form-control" name="category" placeholder=""> -->
                                            <?php
                                            $selectDropdown = $products->renderCategorySelect();
                                            echo $selectDropdown;
                                            ?>
                                        </div>

                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="email-id-column">Mô tả</label>
                                            <textarea class="form-control" name="mota" placeholder=""></textarea>
                                        </div>
                                    </div>


                                    <div class="col-12 d-flex justify-content-end">
                                        <button type="submit" class="btn btn-primary me-1 mb-1" name="addPD">Submit</button>
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