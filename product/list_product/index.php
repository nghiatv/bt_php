<?php

try {
    $host = "localhost";
    $user = "root";
    $pass = "root";
    $dbname = "ahihi";
    $conn = new PDO('mysql:host=' . $host . ';dbname=' . $dbname, $user, $pass);

    $sql = "SELECT * FROM product";
    $smtp = $conn->prepare($sql);
    $smtp->execute();

    $result = $smtp->fetchAll(PDO::FETCH_ASSOC);

//    echo "<pre>";
//    echo var_dump($result);
//    echo  "</pre>";

} catch (PDOException $e) {
    echo $e->getMessage();
    die();
}


?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>AdminLTE 2 | Dashboard</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.6 -->
    <link rel="stylesheet" href="/list_product/assets/theme/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="/list_product/assets/theme/dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="/list_product/assets/theme/dist/css/skins/_all-skins.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="/list_product/assets/theme/plugins/iCheck/flat/blue.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="/list_product/assets/theme/plugins/datatables/dataTables.bootstrap.css">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="/list_product/assets/theme/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
    <header class="main-header">
        <!-- Logo -->
        <a href="../../index2.html" class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini"><b>QT</b>K</span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg"><b>Quản trị </b>Kho</span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>


        </nav>
    </header>


    <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar" style="height: auto;">
            <!-- Sidebar user panel -->
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="https://techmaster.vn/img/users/923.png?0.09247216256335378" class="img-circle"
                         alt="Nghĩa author">
                </div>
                <div class="pull-left info">
                    <p>Alexander Pierce</p>
                    <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                </div>
            </div>
            <!-- search form -->
            <form action="#" method="get" class="sidebar-form">
                <div class="input-group">
                    <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
                </div>
            </form>
            <!-- /.search form -->
            <!-- sidebar menu: : style can be found in sidebar.less -->

        </section>
        <!-- /.sidebar -->
    </aside>

    <div class="content-wrapper">

        <section class="content-header">
            <h1>
                Quản trị kho
                <small>dành cho sinh viên thực tập Magne tô tại Techmaster</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="#">Tables</a></li>
                <li class="active">Data tables</li>
            </ol>
        </section>

        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">Danh sách hàng trong kho nhé!</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Tên sản phẩm</th>
                                    <th>Mã số sản phẩm</th>
                                    <th>Ảnh sản phẩm</th>
                                    <th>Màu sản phẩm</th>
                                    <th>Bán or Not</th>
                                    <th>Giá sản phẩm</th>
                                    <th>Sửa</th>
                                    <th>Xóa</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                foreach ($result as $item) {
                                    echo "<tr>";
                                    echo "<td>" . $item['product_id'] . "</td>";
                                    echo "<td>" . $item['product_name'] . "</td>";
                                    echo "<td>" . $item['product_number'] . "</td>";
                                    echo "<td><img class='img-responsive' src='../image/" . $item['product_image'] . "' width='150' alt='Cái này được'></td>";

                                    echo "<td>" . $item['color'] . "</td>";
                                    echo "<td>";
                                    if ($item['make_flag'] == 1) echo "<span class='label label-success'>Đang bán</span>"; else echo '<span class="label label-danger">Chưa bán</span>';
                                    echo "</td>";
                                    echo "<td>" . $item['price'] . "</td>";
                                    echo "<td><button class='btn btn-success'>Sửa</button> </td>";
                                    echo "<td><button class='btn btn-danger'>Xóa</button> </td>";
                                    echo "</tr>";
                                }

                                ?>


                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>ID</th>
                                    <th>Tên sản phẩm</th>
                                    <th>Mã số sản phẩm</th>
                                    <th>Ảnh sản phẩm</th>
                                    <th>Màu sản phẩm</th>
                                    <th>Bán or Not</th>
                                    <th>Giá sản phẩm</th>
                                    <th>Sửa</th>
                                    <th>Xóa</th>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                        <!-- /.box-body -->
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
<!-- ./wrapper -->

<!-- jQuery 2.2.3 -->
<script src="/list_product/assets/theme/plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->

<!-- Bootstrap 3.3.6 -->
<script src="/list_product/assets/theme/bootstrap/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->

<script src="/list_product/assets/theme/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="/list_product/assets/theme/plugins/datatables/dataTables.bootstrap.min.js"></script>

<!-- Bootstrap WYSIHTML5 -->
<script src="/list_product/assets/theme/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="/list_product/assets/theme/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<script src="/list_product/assets/theme/plugins/iCheck/icheck.min.js"></script>
<!-- FastClick -->
<script src="/list_product/assets/theme/plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="/list_product/assets/theme/dist/js/app.min.js"></script>

<!-- AdminLTE for demo purposes -->
<script src="/list_product/assets/theme/dist/js/demo.js"></script>

<!-- page script -->
<script>
    $(function () {
        $("#example1").DataTable();
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false
        });
    });
</script>
</body>
</html>
