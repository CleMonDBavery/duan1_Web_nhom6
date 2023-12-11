<div class="section">
    <div class="container">
        <!-- row -->
        <div class="row" style="padding: 20px;;
">
            <div class="col-md-3">
                <div class="dbox w-100 text-center">
                    <div class="icon d-flex align-items-center justify-content-center">
                        <span class="fa fa-truck"></span>
                    </div>
                    <div class="text">
                        <p>Vận chuyển dễ dàng, nhanh chóng</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="dbox w-100 text-center">
                    <div class="icon d-flex align-items-center justify-content-center">
                        <span class="fa fa-trophy"></span>
                    </div>
                    <div class="text">
                        <p>Cửa hàng uy tín chất lượng</p>
            </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="dbox w-100 text-center">
                    <div class="icon d-flex align-items-center justify-content-center">
                        <span class="fa fa-paper-plane"></span>
            </div>
                    <div class="text">
                        <p><span>Email:</span> <a href="">ESHOP@gmail.com</a></p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="dbox w-100 text-center">
                    <div class="icon d-flex align-items-center justify-content-center">
                        <span class="fa  fa-check"></span>
                    </div>
                    <div class="text">
                        <p>Thanh toán khi nhận hàng</p>
                    </div>
                </div>
            </div>
            <?php
            $promotion = new promotions();
            $getVouchers = $promotion->getStatus();
            ?>
            <h1 STYLE="text-align: center; padding: 40px">CÁC MÃ KHUYẾN MÃI</h1>

            <?php foreach ($getVouchers as $voucher): ?>
                <div class="col-md-3 col-12">
                    <div class="card" style="text-align: center">
                        <img src="../image/voucher.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h3 class="card-title"><?= $voucher['name'] ?></h3>
                            <h5 class="card-title">Giảm <?= number_format($voucher['discount']) ?> VND</h5>
                            <h5 class="card-title">Điều kiện hóa đơn từ <?= number_format($voucher['conditionPro']) ?>
                                VND</h5>

                            <p class="card-text"><?= $voucher['detail'] ?></p>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
