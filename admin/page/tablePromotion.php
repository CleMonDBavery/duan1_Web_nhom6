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
                        <a href="?page=addPromotion" class="btn btn-danger">Thêm</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table" id="table1">
                                <thead>
                                <tr>
                                    <th>Mã khuyến mãi</th>
                                    <th>Ngày bắt đầu</th>
                                    <th>Ngày kết thúc</th>
                                    <th>Điều kiện giảm</th>
                                    <th>Giá giảm</th>
                                    <th>Trạng thái</th>
                                    <th>Thao tác</th>
                                </tr>
                                </thead>
                                <?php
                                $promotion = new promotions();
                                $list = $promotion->getStatus();
                                foreach ($list as $item) { ?>
                                    <tbody>
                                    <tr>
                                        <td><?= $item['name'] ?></td>
                                        <td><?= $item['startTime'] ?></td>
                                        <td><?= $item['endTime'] ?></td>
                                        <td><?= $item['conditionPro'] ?></td>
                                        <td><?= $item['discount'] ?></td>
                                        <td style="
                                            <?php
                                        if ($item['status'] === 'Active') {
                                            echo 'font-weight: bold; color: green;';
                                        } ?>">
                                            <?= $item['status']; ?>
                                        </td>
                                        <td>
                                            <a href=" ?page=hiddenPromotion&id=<?= $item['promotionId']; ?>"
                                               class="btn btn-info">Ẩn</a>
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
<!-- <script src="./assets/static/js/components/dark.js"></script>
    <script src="./assets/extensions/perfect-scrollbar/perfect-scrollbar.min.js"></script>


    <script src="./assets/compiled/js/app.js"></script>

    <script src="./assets/extensions/jquery/jquery.min.js"></script>
    <script src="./assets/extensions/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="./assets/extensions/datatables.net-bs5/js/dataTables.bootstrap5.min.js"></script>
    <script src="./assets/static/js/pages/datatables.js"></script> -->

</body>

</html>