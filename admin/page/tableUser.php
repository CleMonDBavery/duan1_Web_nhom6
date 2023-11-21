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
                                <li class="breadcrumb-item"><a href="">Quan li</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Tai khoan</li>
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
                            Quản lí tai khoan dang ton tai
                        </h5>
                        <!--                        <a href="?page=a" class="btn btn-danger">Thêm</a>-->
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table" id="table1">
                                <thead>
                                <tr>
                                    <th>Hình ảnh</th>
                                    <th>Tên</th>
                                    <th>Email</th>
                                    <th>Quyền</th>
                                    <th>Trạng thái</th>
                                    <th>Thao tác</th>
                                </tr>
                                </thead>
                                <?php
                                $user = new User();
                                $list = $user->getUser();
                                foreach ($list as $item) { ?>
                                    <tbody>
                                    <tr>
                                        <td><img src="<?= $item['avtar'] ?>" class="rounded-circle" style="width: 50px;"
                                                 alt="Avatar"></td>
                                        <td><?= $item['username'] ?></td>
                                        <td><?= $item['email'] ?></td>
                                        <td style="<?
                                        if ($item['role'] === 'admin') {
                                            echo 'font-weight: bold; color: red;';
                                        } ?>
                                                "><?= $item['role'] ?></td>
                                        <td style="
                                            <?php
                                        if ($item['status'] === 'Active') {
                                            echo 'font-weight: bold; color: green;';
                                        } ?>">
                                            <?= $item['status']; ?>
                                        </td>
                                        <td>
                                            <a href=" ?page=updateUser&idU=<?= $item['userId']; ?>"
                                               class="btn btn-info">Sửa</a>
                                            <a href=" ?page=hiddenActiveUser&id=<?= $item['userId']; ?>"
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

            <section class="section">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">
                            Quản lí tai khoan da an
                        </h5>
                        <!--                        <a href="?page=a" class="btn btn-danger">Thêm</a>-->
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table" id="table1">
                                <thead>
                                <tr>
                                    <th>Hình ảnh</th>
                                    <th>Tên</th>
                                    <th>Email</th>
                                    <th>Quyền</th>
                                    <th>Trạng thái</th>
                                    <th>Thao tác</th>
                                </tr>
                                </thead>
                                <?php
                                $user = new User();
                                $list = $user->getUserInactive();
                                foreach ($list as $item) { ?>
                                    <tbody>
                                    <tr>
                                        <td><img src="<?= $item['avtar'] ?>" class="rounded-circle" style="width: 50px;"
                                                 alt="Avatar"></td>
                                        <td><?= $item['username'] ?></td>
                                        <td><?= $item['email'] ?></td>
                                        <td style="<?
                                        if ($item['role'] === 'admin') {
                                            echo 'font-weight: bold; color: red;';
                                        } ?>
                                                "><?= $item['role'] ?></td>
                                        <td style="
                                            <?php
                                        if ($item['status'] === 'Active') {
                                            echo 'font-weight: bold; color: green;';
                                        } ?>">
                                            <?= $item['status']; ?>
                                        </td>
                                        <td>
                                            <a href=" ?page=updateUser&idU=<?= $item['userId']; ?>"
                                               class="btn btn-info">Sửa</a>
                                            <a href=" ?page=hiddenInactiveUser&id=<?= $item['userId']; ?>"
                                               class="btn btn-info">Hien</a>
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