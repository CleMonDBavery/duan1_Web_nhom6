<?
$categories = new categories();
$categoryId = $_GET['idCate'];
$item = $categories->getById($categoryId);
if (isset($_POST['editCategory'])) {
    $name = $_POST['name'];
    $status = isset($_POST['status']) && $_POST['status'] === 'on' ? 'Active' : 'Inactive';
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
                                <li class="breadcrumb-item active" aria-current="page">Loại sản phẩm</li>
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
                            Sửa dữ liệu loại sản phẩm
                        </h5>
                        <div class="col-12">
                            <div class="card">
                                <div class="card-content">
                                    <div class="card-body">
                                        <form class="form" method="post">

                                            <div class="col-md-12 col-12">
                                                <div class="form-group">
                                                    <label for="first-name-column">Tên loại</label>
                                                    <input type="text" class="form-control" placeholder="" name="name"
                                                           value="<?= $item['name'] ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-12 col-12">
                                                <div class="form-check form-switch">
                                                    <input name="status" class="form-check-input" type="checkbox"
                                                           id="flexSwitchCheckChecked" checked>
                                                    <label class="form-check-label"
                                                           for="flexSwitchCheckChecked">Active</label>
                                                </div>
                                            </div>

                                            <div class="col-12 d-flex justify-content-end">
                                                <button type="submit" class="btn btn-primary me-1 mb-1"
                                                        name="editCategory">Submit
                                                </button>
                                                <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset
                                                </button>
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