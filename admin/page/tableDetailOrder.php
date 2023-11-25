<title>Quản lí chi tiết hóa đơn</title>
<div id="app">
    <?php
    include './assets/include/nav.php';
    ?>
    <div id="main">
        <div class="page-heading">
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
                                    <th>Tên sản phẩm</th>
                                    <th>Giá</th>
                                    <th>Xóa</th>
                                </tr>
                                </thead>
                                <?
                                $orderId = $_GET['idOrder'];
                                $order = new orders();
                                $product = new products();
                                $list = $order->getOrderDetail($orderId);
                                foreach ($list as $item) { ?>
                                    <tbody>
                                    <tr>
                                        <td><?= $item['name'] ?></td>
                                        <td><?= $item['price'] ?></td>
                                        <td>
                                            <a class="btn btn-warning"
                                               href="?page=hiddenOrderDetail&idHidden=<?= $item['orderDetailId'] ?>"
                                               class="btn btn-info">Ẩn</a>
                                        </td>
                                    </tr>
                                    </tbody>
                                <? }
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