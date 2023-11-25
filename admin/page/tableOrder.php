<title>Quản lí hóa đơn</title>

<div id="app">
    <?php include './assets/include/nav.php'; ?>
    <div id="main">
        <section class="section">
            <div class="card">
                <div class="card-header">
                    <h2 class="card-title">
                        Quản lí hóa đơn
                    </h2>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table" id="table1">
                            <thead>
                            <tr>
                                <th>Người mua</th>
                                <th>Tổng giá</th>
                                <th>Ngày mua</th>
                                <th>Địa chỉ</th>
                                <th>Trạng thái</th>
                                <th>Thao tác</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $orders = new orders();
                            $list = $orders->getOrderConfirm();
                            foreach ($list as $item) { ?>
                                <tr>
                                    <td><?= $item['username'] ?></td>
                                    <td><?= $item['totalPrice'] ?></td>
                                    <td>01/01/2023</td>
                                    <td><?= $item['destination'] ?></td>
                                    <td>
                                        <?php if ($item['status'] === 'Đang vận chuyển') { ?>
                                            <i class="text-success"> Đang vận chuyển </i>
                                        <?php } else { ?>
                                            <i class="text-warning">Chờ xác nhận </i>
                                        <?php } ?>
                                    </td>
                                    <td>
                                        <a href="?page=tableDetailOrder&idOrder=<?= $item['orderId'] ?>"
                                           class="btn btn-primary">Chi tiết</a>
                                        <?php if ($item['status'] != 'Đang vận chuyển') { ?>
                                            <a href="?page=confirmOrder&idComOrder=<?= $item['orderId'] ?>"
                                               class="btn btn-danger">Xác nhận</a>
                                        <?php } ?>
                                    </td>
                                </tr>
                            <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>


        <section class="section">
            <div class="card">
                <div class="card-header">
                    <h2 class="card-title">
                        Quản lí hóa đơn
                    </h2>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table" id="table1">
                            <thead>
                            <tr>
                                <th>Người mua</th>
                                <th>Tổng giá</th>
                                <th>Ngày mua</th>
                                <th>Địa chỉ</th>
                                <th>Trạng thái</th>
                                <th>Thao tác</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $orders = new orders();
                            $list = $orders->getOrder();
                            foreach ($list as $item) { ?>
                                <tr>
                                    <td><?= $item['username'] ?></td>
                                    <td><?= $item['totalPrice'] ?></td>
                                    <td>01/01/2023</td>
                                    <td><?= $item['destination'] ?></td>
                                    <td>
                                        <?php if ($item['status'] === 'Đang vận chuyển') { ?>
                                            <i class="text-success"> Đang vận chuyển </i>
                                        <?php } else { ?>
                                            <i class="text-warning">Chờ xác nhận </i>
                                        <?php } ?>
                                    </td>
                                    <td>
                                        <a href="?page=tableDetailOrder&idOrder=<?= $item['orderId'] ?>"
                                           class="btn btn-primary">Chi tiết</a>
                                        <?php if ($item['status'] != 'Đang vận chuyển') { ?>
                                            <a href="?page=confirmOrder&idComOrder=<?= $item['orderId'] ?>"
                                               class="btn btn-danger">Xác nhận</a>
                                        <?php } ?>
                                    </td>
                                </tr>
                            <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>
        <?php include './assets/include/footer.php'; ?>
    </div>
</div>