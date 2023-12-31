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
                                <!--List product start-->
                                <?php
                                $products = new products();
                                $list = $products->getList();
                                foreach ($list as $item) { ?>
                                    <tbody>
                                        <tr>
                                            <td><?= $item['productId'] ?></td>
                                            <td><?= $item['name'] ?></td>
                                            <td class="w-25">
                                                <img src="./assets/content/img/<?= $item['image'] ?>" class="img-thumbnail w-75" alt="...">
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
                                                <a href="?page=updateProduct&id=<?= $item['productId'] ?>" class="btn btn-info">Sửa</a>
                                                <button class="btn btn-warning" onclick="myFuntion()" name="hiddenPd"><a href="?page=hiddenProduct&id=<?= $item['productId'] ?>" style="color: black;">Ẩn</a></button>
                                            </td>
                                        </tr>
                                    </tbody>
                                <?php
                                }
                                ?>
                            </table>
                            <!--List product end-->
                            <a href="?page=addProduct" class="btn btn-danger">Thêm</a>
                        </div>
                    </div>
                </div>

            </section>
            <!-- Tables product end -->

        </div>

        <footer>
            <div class="footer clearfix mb-0 text-muted">
                <div class="float-start">
                    <p>2023 &copy; Mazer</p>
                </div>
                <div class="float-end">
                    <p>Crafted with <span class="text-danger"><i class="bi bi-heart-fill icon-mid"></i></span>
                        by <a href="">Saugi</a></p>
                </div>
            </div>
        </footer>
    </div>
</div>