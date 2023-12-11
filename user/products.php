
<!DOCTYPE html>
<html lang="en">

<body>

<!-- BREADCRUMB -->
<div id="breadcrumb">
    <div class="container">
        <ul class="breadcrumb">
            <li><a href="index.php">Trang chủ</a></li>
            <li class="active">Sản phẩm</li>
        </ul>
    </div>
</div>
<!-- /BREADCRUMB -->

<!-- section -->
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">


            <!-- MAIN -->
            <div id="main" class="col-md-12">
                <!-- store top filter -->
                <div class="store-filter clearfix">

                    <div class="pull-right">

                    <ul class="store-pages">
                            <li><span class="text-uppercase">Page:</span></li>
                            <li class="active">1</li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#"><i class="fa fa-caret-right"></i></a></li>
                        </ul>
                    </div>
                </div>
                <!-- /store top filter -->

                <!-- STORE -->
                <div id="store">
                    <!-- row -->
                    <div class="row">
                        <?
                        $searchTerm = isset($_GET['search']) ? $_GET['search'] : '';

                        // Display products based on the search term
                        if (!empty($searchTerm)) {
                            $product = new products();
                            $result = $product->searchProducts($searchTerm);

                            if (!empty($result)) {
                                echo $result;
                            } else {
                                echo '<p>No products found for the search term: ' . $searchTerm . '</p>';
                            }
                        } else {
                            // Display all products if no search term is provided
                            $product = new products();
                            $list = $product->pageProducts();
                            echo $list;
                        }
                        ?>
                    </div>
                    <!-- /row -->
                </div>
                <!-- /STORE -->
                <!--            </div>-->
            <!-- /MAIN -->
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /section -->
</body>

</html>
