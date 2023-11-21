<title>Quản lí loại sản phẩm</title>
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


            <!-- Minimal jQuery Datatable start -->

            <!-- Minimal jQuery Datatable end -->
            <!-- Basic Tables start -->
            <section class="section">
                <div class="card">
                    <div class="card-header">
                        <h2 class="card-title">
                            Quản lí loại sản phẩm được phép
                        </h2>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table" id="table1">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Trạng thái</th>
                                        <th>Thao tác</th>
                                    </tr>
                                </thead>
                                <?
                                $category = new categories();
                                $list = $category->getList();
                                foreach ($list as $item) { ?>
                                    <tbody>
                                        <tr>
                                            <td><?= $item['categoryId'] ?></td>
                                            <td><?= $item['name'] ?></td>
                                            <td
                                                <?php
                                                if ($item['status'] === 'Active') {
                                                    echo 'class="text-success"';
                                                } ?>>
                                                <?= $item['status']; ?>
                                            </td>
                                            <td>
                                                <a href="?page=updateCategory&idCate=<?= $item['categoryId'] ?>"
                                                   class="btn btn-primary"">Sửa</a>
                                                <a href="?page=hiddenCategories&idCate=<?= $item['categoryId'] ?>" class="btn btn-warning">Ẩn</a>
                                            </td>
                                        </tr>
                                    </tbody>
                                <? }
                                ?>

                            </table>
                            <a href="?page=addCategory" class="btn btn-danger">Thêm</a>


                        </div>
                    </div>
                </div>

            </section>
            <section class="section">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">
                            Quản lí loại sản phẩm ẩn
                        </h5>


                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table" id="table1">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Trạng thái</th>
                                    <th>Thao tác</th>
                                </tr>
                                </thead>
                                <?
                                $category = new categories();
                                $list = $category->getListInactive();
                                foreach ($list as $item) { ?>
                                    <tbody>
                                    <tr>
                                        <td><?= $item['categoryId'] ?></td>
                                        <td><?= $item['name'] ?></td>
                                        <td class="text-secondary">

                                            <?= $item['status']; ?>
                                        </td>
                                        <td>
                                            <a href="?page=updateCategory&idCate=<?= $item['categoryId'] ?>"
                                               class="btn btn-primary">Sửa</a>
                                            <a href="?page=hiddenInactive&idCate=<?= $item['categoryId'] ?>"
                                               class="btn btn-warning">Hiện</a>
                                        </td>
                                    </tr>
                                    </tbody>
                                <? }
                                ?>
                            </table>
                            <a href="?page=addCategory" class="btn btn-danger">Thêm</a>

                        </div>
                    </div>
                </div>

            </section>
            <!-- Basic Tables end -->

        </div>

        <?php
                    include './assets/include/footer.php';
                    ?>
    </div>
</div>