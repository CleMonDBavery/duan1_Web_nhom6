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
                        <h3>Quản lí</h3>

                    </div>
                    <div class="col-12 col-md-6 order-md-2 order-first">
                        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Quản lí</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Quản lí sản phẩm</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>

            <!-- Tables product start -->
            <section class="section">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">
                            Quản lí sản phẩm
                        </h5>
                        <a href="?page=addProduct" class="btn btn-danger">Thêm</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table" id="table1">
                                <h6 class="card-title">
                                    Sản phẩm Active
                                </h6>
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Tên</th>
                                    <th>Hình</th>
                                    <th>Giá</th>
                                    <th>Trạng thái</th>
                                    <th>Thao tác</th>
                                </tr>
                                </thead>
                                <!--List product Active start-->
                                <?php
                                $products = new products();
                                $list = $products->getStatusActive();
                                foreach ($list as $item) { ?>
                                    <tbody>
                                    <tr>
                                        <td><?= $item['productId'] ?></td>
                                        <td><?= $item['name'] ?></td>
                                        <td class="w-25">
                                            <img src="./assets/content/img/<?= $item['image'] ?>"
                                                 class="img-thumbnail w-75" alt="...">
                                        </td>
                                        <td><?= $item['price'] ?></td>
                                        <td style="
                                            <?php
                                        if ($item['status'] === 'Active') {
                                            echo 'font-weight: bold; color: green;';
                                        } ?>">
                                            <?= $item['status']; ?>
                                        </td>
                                        <td>
                                            <a href="?page=updateProduct&id=<?= $item['productId'] ?>"
                                               class="btn btn-info">Sửa</a>
                                            <button class="btn btn-warning" onclick="myFuntion()" name="hiddenPd"><a
                                                        href="?page=hiddenProduct&id=<?= $item['productId'] ?>"
                                                        style="color: black;">Ẩn</a></button>
                                        </td>
                                    </tr>
                                    </tbody>
                                    <?php
                                }
                                ?>
                            </table>
                            <!--List product Active end-->
                        </div>
                    </div>


                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table" id="table1">
                                <h6 class="card-title">
                                    Sản phẩm Inactive
                                </h6>
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Tên</th>
                                    <th>Hình</th>
                                    <th>Giá</th>
                                    <th>Trạng thái</th>
                                    <th>Thao tác</th>
                                </tr>
                                </thead>
                                <!--List product Inactive start-->
                                <?php
                                $products = new products();
                                $list = $products->getStatusInactive();
                                foreach ($list as $item) { ?>
                                    <tbody>
                                    <tr>
                                        <td><?= $item['productId'] ?></td>
                                        <td><?= $item['name'] ?></td>
                                        <td class="w-25">
                                            <img src="./assets/content/img/<?= $item['image'] ?>"
                                                 class="img-thumbnail w-75" alt="...">
                                        </td>
                                        <td><?= $item['price'] ?></td>
                                        <td style="
                                            <?php
                                        if ($item['status'] === 'Active') {
                                            echo 'font-weight: bold; color: green;';
                                        } ?>">
                                            <?= $item['status']; ?>
                                        </td>
                                        <td>
                                            <a href="?page=updateProduct&id=<?= $item['productId'] ?>"
                                               class="btn btn-info">Sửa</a>
                                            <button class="btn btn-warning" onclick="myFuntion()" name="hiddenPd"><a
                                                        href="?page=hiddenPdInactive&idPdI=<?= $item['productId'] ?>"
                                                        style="color: black;">Hiện</a></button>
                                        </td>
                                    </tr>
                                    </tbody>
                                    <?php
                                }
                                ?>
                            </table>
                            <!--List product Inactive end-->
                            <a href="?page=addProduct" class="btn btn-danger">Thêm</a>
                        </div>
                    </div>
                </div>

            </section>
            <!-- Tables product end -->

        </div>

        <?php
                    include './assets/include/footer.php';
                    ?>
    </div>
</div>