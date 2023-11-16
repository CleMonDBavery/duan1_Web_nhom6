<?
$categories = new categories();
$categoryId = $_GET['idCate'];
$item = $categories->getById($categoryId);
if (isset($_POST['editCategory'])) {
    $name = $_POST['name'];
    $status = $_POST['status'];
    $categories = new categories();
    $result = $categories->update($categoryId, $name, $status);
    if ($result) {
        $_SESSION['success'] = 'Sửa mục thành công!';
        header("location: ?page=tableCategory");
        exit;
    } else {
        $_SESSION['error'] = 'Thêm danh mục thất bại!';
        header("location: ?page=updateCategory");
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
                        <h4 class="card-title">Chỉnh sửa loại sản phẩm</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form" method="post">

                                <div class="col-md-12 col-12">
                                    <div class="form-group">
                                        <label for="first-name-column">Tên loại</label>
                                        <input type="text" class="form-control" placeholder="" name="name" value="<?= $item['name'] ?>">
                                    </div>
                                </div>
                                <div class="col-md-12 col-12">
                                    <div class="form-group">
                                        <label for="last-name-column">Trạng thái</label>
                                        <textarea class="form-control" name="status" placeholder="" value="<?= $item['status'] ?>"></textarea>
                                    </div>
                                </div>

                                <div class="col-12 d-flex justify-content-end">
                                    <button type="submit" class="btn btn-primary me-1 mb-1" name="editCategory">Submit</button>
                                    <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>