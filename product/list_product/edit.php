<?php

if($_GET['id'])
{
    // Khai bao cac bien gia tri
    $nameVal = $numberVal = $colorVal = $flagVal = $priceVal = $imageVal = "";
    // lay id cua san pham can sua
    $id = $_GET['id'];

    try {
        $host = "localhost";
        $user = "root";
        $pass = "root";
        $dbname = "ahihi";
        $conn = new PDO('mysql:host=' . $host . ';dbname=' . $dbname, $user, $pass);

        $sql = "SELECT * FROM product WHERE id = :id";
        $smtp = $conn->prepare($sql);
        $smtp->bindParam();
        $smtp->execute();

        $result = $smtp->fetch(PDO::FETCH_ASSOC);

        $nameVal = $result['product_name'];
        $numberVal = $result['product_number'];
        $colorVal = $result['color'];


    } catch (PDOException $e) {
        echo $e->getMessage();
        die();
    }

}

?>

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
    <link href="assets/edit.css" rel="stylesheet" type="text/css">
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
                    <h1> <?php echo $success; ?> </h1>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <input value="<?php echo $nameVal; ?>" id="product_name" name="product_name" type="text"
                               class="validate">
                        <label for="product_name"> Tên Sản phẩm</label>
                        <div class="error"><?php echo $nameErr ?></div>
                    </div>
                    <div class="input-field col s12">
                        <input value="<?php echo $numberVal; ?>" id="product_number" name="product_number" type="text"
                               class="validate">
                        <label for="product_number"> Mã số sản phẩm</label>

                        <div class="error"><?php echo $numberErr ?></div>
                    </div>

                    <div class="input-field col s12">
                        <select name="color">
                            <option value="0"
                                <?php if ($colorVal == "0") echo 'selected="selected" '; ?>
                            >Chọn màu nhé
                            </option>
                            <option value="grey"
                                <?php if ($colorVal == "grey") echo 'selected="selected" '; ?>
                            >Grey
                            </option>
                            <option value="white"
                                <?php if ($colorVal == "white") echo 'selected="selected" '; ?>
                            >White
                            </option>
                            <option value="gold"
                                <?php if ($colorVal == "gold") echo 'selected="selected" '; ?>
                            >Gold
                            </option>
                            <option value="rose_gold"
                                <?php if ($colorVal == "rose_gold") echo 'selected="selected" '; ?>
                            >Rose Gold
                            </option>
                        </select>
                        <label>Màu sản phẩm*</label>
                        <div class="error"></div>
                    </div>

                    <div class="input-field col s12">

                        <input type="checkbox" name="make_flag" class="filled-in" id="filled-in-box" value="1" <?php if ($flagVal == 1) echo 'selected="selected" '; ?>  />
                        <label for="filled-in-box">Public hay là không?</label>


                    </div>
                    <div class="input-field col s12">
                        <input value="<?php echo $priceVal; ?>" id="price" name="price" type="text" class="validate">
                        <label for="price">Giá sản phẩm</label>
                        <div class="error"><?php echo $priceErr ?></div>
                    </div>
                    <div class="input-field col s12">
                        <input type="file" name="product_image">
                        <div class="error"><?php echo $imageErr ?></div>
                    </div>
                    <div class="input-field col s12">
                        <button class="right btn waves-effect waves-light" type="submit">Thêm sản phẩm</button>
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


</body>
</html>

