<?
$categories = new categories();
if (isset($_POST['addCategory'])) {
    $name = $_POST['name'];
    $status = isset($_POST['status']) && $_POST['status'] === 'on' ? 'Active' : 'Inactive';
    $result = $categories->add($name, $status);
    if ($result) {
        $_SESSION['success'] = 'Thêm danh mục thành công!';
        header("location: ?page=tableCategory");
        exit;
    } else {
        $_SESSION['error'] = 'Thêm danh mục thất bại!';
        header("location: ?page=addCategory");
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
                        <h4 class="card-title">Thêm loại sản phẩm</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form" method="post">

                                <div class="col-md-12 col-12">
                                    <div class="form-group">
                                        <label for="first-name-column">Tên loại</label>
                                        <input type="text" class="form-control" placeholder="" name="name">
                                    </div>
                                </div>
                                <div class="col-md-12 col-12">
                                    <div class="form-check form-switch">

                                        <input name="status" class="form-check-input" type="checkbox"
                                               id="flexSwitchCheckChecked" checked>
                                        <label class="form-check-label" for="flexSwitchCheckChecked">Active</label>
                                    </div>
                                </div>

                                <div class="col-12 d-flex justify-content-end">
                                    <button type="submit" class="btn btn-primary me-1 mb-1" name="addCategory">Submit</button>
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