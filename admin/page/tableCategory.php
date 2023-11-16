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
                        <h3>DataTable jQuery</h3>
                        <p class="text-subtitle text-muted">Powerful interactive tables with datatables (jQuery
                            required).</p>
                    </div>
                    <div class="col-12 col-md-6 order-md-2 order-first">
                        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page">DataTable jQuery</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>

            <!-- Minimal jQuery Datatable start -->

            <!-- Minimal jQuery Datatable end -->
            <!-- Basic Tables start -->
            <section class="section">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">
                            Quản lí loại sản phẩm
                        </h5>
                        <a href="?page=addCategory" class="btn btn-danger">Thêm</a>

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
                                            <td style="
                                            <?php
                                            if ($item['status'] === 'Active') {
                                                echo 'font-weight: bold; color: green;';
                                            } ?>">
                                                <?= $item['status']; ?>
                                            </td>
                                            <td>
                                                <a href="?page=updateCategory&idCate=<?= $item['categoryId'] ?>" class="btn btn-info">Sửa</a>
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
            <!-- Basic Tables end -->

        </div>

        <footer>
            <div class="footer clearfix mb-0 text-muted">
                <div class="float-start">
                    <p>2023 &copy; Mazer</p>
                </div>
                <div class="float-end">
                    <p>Crafted with <span class="text-danger"><i class="bi bi-heart-fill icon-mid"></i></span>
                        by <a href="https://saugi.me">Saugi</a></p>
                </div>
            </div>
        </footer>
    </div>
</div>