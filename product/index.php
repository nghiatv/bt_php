<html>
<head>
    <meta charset="utf-8">
    <!--    <meta http-equiv="X-UA-Compatible" content="IE=edge">-->
    <title>Trang thêm sản phẩm nhé</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.6/css/materialize.min.css">


    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link href="style.css" rel="stylesheet" type="text/css">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<!-- Site wrapper -->
<!-- Pen Title-->
<div class="pen-title">
    <h1>Thêm mới sản phẩm</h1><span>Bài làm của Nghĩa <i class='fa fa-code'></i> by <a
            href='https://github.com/nghiatv'>Nghĩa Thân</a></span>
</div>
<div class="rerun"><a href="">Re load nhé</a></div>
<div class="container">
    <div class="row z-depth-1-half">
        <div class="col s8 offset-s2">
            <form method="post" action="" enctype="multipart/form-data">
                <div class="row">
                    <div class="input-field col s12">
                        <input value="" id="product_name" name="product_name" type="text" class="validate">
                        <label for="product_name"> Tên Sản phẩm</label>
                    </div>
                    <div class="input-field col s12">
                        <input value="" id="product_number" name="product_number" type="text" class="validate">
                        <label for="product_number"> Mã số sản phẩm</label>
                    </div>

                    <div class="input-field col s12">
                        <select name="color">
                            <option value="0" disabled selected>Chọn màu nhé</option>
                            <option value="1">Grey</option>
                            <option value="2">White</option>
                            <option value="3">Gold</option>
                            <option value="4">Rose Gold</option>
                        </select>
                        <label>Màu sản phẩm</label>
                    </div>

                    <div class="input-field col s12">

                        <input type="checkbox" name="make_flag" class="filled-in" id="filled-in-box" value="1"/>
                        <label for="filled-in-box">Public hay là không?</label>


                    </div>
                    <div class="input-field col s12">
                        <input value="" id="price" name="price" type="text" class="validate">
                        <label for="price">Giá sản phẩm</label>
                    </div>
                    <div class="input-field col s12">
                        <input type="file" name="product_image">

                    </div>
                    <div class="input-field col s12">
                        <button class="right btn waves-effect waves-light" type="submit">Thêm sản phẩm

                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>


<!-- ./wrapper -->

<!-- jQuery 2.2.4 -->
<script src="https://code.jquery.com/jquery-2.2.4.min.js"
        integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
<!-- Compiled and minified JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.6/js/materialize.min.js"></script>


<script>
    $(document).ready(function () {
        $('select').material_select();
    });
</script>


<?php

require_once 'product.php';

//Khai bao bien kiem tra tinh hop le
//0 la hop le
//1 la khong hop le nhe
$isValid = 0;

//Khai bao cac bien loi
$nameErr = $numberErr = $priceErr = $imageErr = "";
// Khai bao cac bien gia tri
$nameVal = $numberVal = $colorVal = $flagVal = $priceVal = $imageVal = "";

if (!empty($_POST)) {

    // lay cac gia tri tu bien post
    $nameVal = $_POST['product_name'];
    $numberVal = $_POST['product_number'];
    $colorVal = $_POST['color'];
    $flag = $_POST['make_flag'];
    $priceVal = $_POST['price'];
    $imageVal = $_FILES['product_image'];


    // Kiem tra tinh hop le
    //name

    if (!preg_match("/^[a-zA-Z]$/", $nameVal)) {
        $nameErr = " Name InValid. Only A-Z and a-z";
        $isValid = 1;
    }

    // number
    if (!preg_match("/^[a-zA-Z0-9]$/", $numberVal)) {
        $numberErr = "Number Invalid";
        $isValid = 1;
    }

    // price

    if (!preg_match("/^[0-9]/", $priceVal)) {
        $priceErr = " Only number accepted!";
        $isValid = 1;
    }

    // handle file upload

    $targetDir = "image/";

    $targetFile = $targetDir . basename($imageVal['name']);
    $imageFileType = pathinfo($targetFile, PATHINFO_EXTENSION);


    // Check xem day co phai la hinh anh hay khong

    $check = getimagesize($imageVal['tmp_name']);
    // check hang
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";

    } else {
        echo "File is not an image.";
        $imageVal = 1;
    }
    // check exist
    if (file_exists($targetFile)) {
        $priceErr = "File Exist!";
        $isValid = 1;
    }
    // Neu khong co loi thi chuyen vao thumuc
    if($imageVal == 0){
        $uploads = move_uploaded_file($imageVal['tmp_name'], $targetFile);
        if(!$uploads){
            $imageVal = 1;
        }
    }


    echo "<pre>";
    echo var_dump($check);
    echo var_dump($imageVal);
    echo "</pre>";
//    die(200);

}


?>


</body>
</html>

