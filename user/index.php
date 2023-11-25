<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <title>E-SHOP HTML Template</title>
    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

    <!-- Google font -->
    <link href="https://fonts.googleapis.com/css?family=Hind:400,700" rel="stylesheet">

    <!-- Bootstrap -->
    <link type="text/css" rel="stylesheet" href="contents/css/bootstrap.min.css"/>

    <!-- Slick -->
    <link type="text/css" rel="stylesheet" href="contents/css/slick.css"/>
    <link type="text/css" rel="stylesheet" href="contents/css/slick-theme.css"/>

    <!-- nouislider -->
    <link type="text/css" rel="stylesheet" href="contents/css/nouislider.min.css"/>

    <!-- Font Awesome Icon -->
    <link rel="stylesheet" href="contents/css/font-awesome.min.css">

    <!-- Custom stlylesheet -->
    <link type="text/css" rel="stylesheet" href="contents/css/style.css"/>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!-- [if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif] -->

</head>

<body>
<?php
include("components/header.php");
include("components/nav.php");


if (isset($_GET['page'])) {
    switch ($_GET['page']) {
        case 'products':
            require_once 'products.php';
            break;
        case 'blank':
            require_once 'blank.php';
            break;
        case 'checkout':
            require_once 'checkout.php';
            break;

        case 'productPage':
            require_once 'product-page.php';
            break;
        case 'sanpham':
            require_once 'dm/sp-dm.php';
            break;
        default:
            require_once 'index.php';
            break;
    }
} else {
    require_once 'index.php';
    include("components/home.php");
    include("components/categories.php");
    include("components/dealday.php");
    include("components/end.php");
    include("components/products.php");

}
include("components/footer.php");


?>

<!-- jQuery Plugins -->
<script src="contents/js/jquery.min.js"></script>
<script src="contents/js/bootstrap.min.js"></script>
<script src="contents/js/slick.min.js"></script>
<script src="contents/js/nouislider.min.js"></script>
<script src="contents/js/jquery.zoom.min.js"></script>
<script src="contents/js/main.js"></script>

</body>

</html>