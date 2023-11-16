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
      <h3>Bảng thống kê</h3>
    </div>
    <div class="page-content">
      <section class="row">
        <div class="card">
          <div class="card-header">
            <h4>Thống kê theo loại sản phẩm</h4>
          </div>
          <div class="card-body"></div>
          <div id="chart-visitors-profile"></div>
        </div>
    </div>
    </section>

    <section class="section">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h4 class="card-title">Thống kê đơn hàng</h4>
            </div>
            <div class="card-body">
              <canvas id="bar"></canvas>
            </div>
          </div>
        </div>
      </div>
    </section>

    <?php
    include './assets/include/footer.php';
    ?>
  </div>
</div>