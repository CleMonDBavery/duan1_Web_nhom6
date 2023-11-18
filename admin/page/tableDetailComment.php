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
                            Quản lí bình luận
                        </h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table" id="table1">
                                <thead>
                                    <tr>
                                        <th>Tên người dùng</th>
                                        <th>Nội dung</th>
                                        <th>Thời gian</th>
                                        <th>Trạng thái</th>
                                        <th>Thao tác</th>
                                    </tr>
                                </thead>
                                <?php
                                $productId = $_GET['id'];
                                $comment = new comment();
                                $list = $comment->getList($productId);
                                foreach ($list as $item) { ?>
                                    <tbody>
                                        <tr>
                                            <td><?= $item['name'] ?></td>
                                            <td><?= $item['content'] ?></td>
                                            <td><?= $item['date'] ?></td>
                                            <td><?= $item['status'] ?></td>
                                            <td>
                                                <a href="?page=deleteComment&idCmt=<?= $item['commentId'] ?>&id=<?= $item['productId'] ?>" class="btn btn-info">Ẩn</a>
                                            </td>
                                        </tr>
                                    </tbody>
                                <?
                                }
                                ?>

                            </table>
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