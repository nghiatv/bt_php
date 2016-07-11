<?php
/**
 * Created by PhpStorm.
 * User: nghia
 * Date: 7/11/16
 * Time: 11:02 AM
 */

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register Form</title>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet"
          integrity="sha384-T8Gy5hrqNKT+hzMclPo118YTQO6cYprQmhrYwIiQ/3axmI1hQomh7Ud2hPOy8SP1" crossorigin="anonymous">
    <link href="assets/css/style.css" rel="stylesheet" type="text/css">
    <script src="https://code.jquery.com/jquery-2.2.4.js"
            integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI=" crossorigin="anonymous"></script>
    <script src="assets/js/script.js" type="text/javascript"></script>
</head>
<body>

<!-- Mixins-->
<!-- Pen Title-->
<div class="pen-title">
    <h1>Material Login Form</h1><span>Bài tập của Nghĩa <i class='fa fa-code'></i> by <a
            href='https://github.com/nghiatv'>Nghĩa Thân</a></span>
</div>
<div class="rerun"><a href="">Rerun Pen</a></div>
<div class="container">
    <div class="card"></div>
    <div class="card">


        <?php
        $user = [
            'username' => "nghia",
            'password' => "nghia"
        ];

        //Khai bao loi cua  user and pass
        $firstnameErr = $lastnameErr = $emailErr = $passErr = $repassErr = "";
        //Khai bao gio tri ban dau cua user and pass
        $firstnameVal = $lastnameVal = $emailVal = $passVal = $repassVal = "";

        $flag = 0;
        //        $flag = 1;
        //viet ham xu ly dau vao cua du lieu

        function test_input($data)
        {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }

        if ($_SERVER['REQUEST_METHOD'] == "POST") {

            // Kiem tra FirstName
            if (empty($_POST['firstname'])) {
                $firstnameErr = "Firstname là bắt buộc";
                $flag = 1;
            } else {
                $firstnameVal = test_input($_POST['firstname']);
                if (!preg_match("/^[a-zA-Z]*$/", $firstnameVal)) {
                    $firstnameErr = "Chỉ chấp nhận chữ cái từ a-z";
                    $flag = 1;
                } else {
                    $firstnameErr = "";
                }

            }

            // Kiem tra Lastname
            if (empty($_POST['lastname'])) {
                $lastnameErr = "Lastname là bắt buộc";
                $flag = 1;
            } else {
                $lastnameVal = test_input($_POST['lastname']);
                if (!preg_match("/^[a-zA-Z]*$/", $lastnameVal)) {
                    $lastnameErr = "Chỉ chấp nhận chữ cái từ a-z";
                    $flag = 1;
                } else {
                    $lastnameErr = "";
                }

            }


            //kiem tra email

            if (empty($_POST['email'])) {
                $emailErr = "Email là bắt buộc!";
                $flag = 1;
            } else {
                $emailVal = test_input($_POST['email']);

                if (!filter_var($emailVal, FILTER_VALIDATE_EMAIL)) {
                    $emailErr = "Sai định dạng email";
                    $flag = 1;
                } else {
                    $emailErr = "";
                }
            }


            // Kiem tra password

            if (empty($_POST['password'])) {
                $passErr = "Mật khẩu không được để trống!";
                $flag = 1;
            } else {
                $passVal = test_input($_POST['password']);

                if (!preg_match("/^[a-zA-Z0-9]*$/", $passVal)) {
                    $passErr = "Sai đinh dạng nhé";
                    $flag = 1;
                } else {
                    $passErr = "";
                }
            }


            // Kiem tra repass


            if (empty($_POST['repassword'])) {
                $repassErr = "Nhập lại mật khẩu là bắt buộc!";
                $flag = 1;

            } else {
                $repassVal = test_input($_POST['repassword']);
                if ($repassVal != $passVal) {
                    $repassErr = "Hai mật khẩu không trung khớp";
                    $flag = 1;
                } else {
                    $repassErr = "";
                }
            }

        }


        if (empty($_POST)) {
            echo "<h1 class='title'>Register
                    <div class='close'></div>
                </h1>";
            ?>
            <form method="post" action="">
                <div class="input-container">
                    <input type="text" id="firstname" name="firstname" required="required"/>
                    <label for="firstname">First Name</label>
                    <div class="bar"></div>
                    <div class="error"></div>
                </div>
                <div class="input-container">
                    <input type="text" id="lastname" name="lastname" required="required"/>
                    <label for="lastname">Last Name</label>
                    <div class="bar"></div>
                    <div class="error"></div>
                </div>
                <div class="input-container">
                    <input type="text" id="email" name="email" required="required"/>
                    <label for="email">Email</label>
                    <div class="bar"></div>
                    <div class="error"></div>
                </div>
                <div class="input-container">
                    <input type="password" id="Password" name="password" required="required"/>
                    <label for="Password">Password</label>
                    <div class="bar"></div>
                    <div class="error"></div>
                </div>
                <div class="input-container">
                    <input type="password" id="Repeat Password" name="repassword" required="required"/>
                    <label for="Repeat Password">Repeat Password</label>
                    <div class="bar"></div>
                </div>
                <div class="button-container">
                    <button><span>Send</span></button>
                </div>
            </form>
            <?php

        } else {
//            $username = $_POST['username'];
//            $password = $_POST['password'];
            //        if($username != ""  && $password != ""){
            if ($flag != 0) {
                ?>
                <form method="post" action="">
                    <div class="input-container">
                        <input type="text" id="firstname" name="firstname" required="required" value="<?php echo $firstnameVal;?>"/>
                        <label for="firstname">First Name</label>
                        <div class="bar"></div>
                        <div class="error"><?php echo $firstnameErr; ?></div>
                    </div>
                    <div class="input-container">
                        <input type="text" id="lastname" name="lastname" required="required" value="<?php echo $lastnameVal;?>"/>
                        <label for="lastname">Last Name</label>
                        <div class="bar"></div>
                        <div class="error">
                            <?php echo $lastnameErr; ?>
                        </div>
                    </div>
                    <div class="input-container">
                        <input type="text" id="email" name="email" required="required" value="<?php echo $emailVal;?>"/>
                        <label for="email">Email</label>
                        <div class="bar"></div>
                        <div class="error">
                            <?php echo $emailErr; ?>
                        </div>
                    </div>
                    <div class="input-container">
                        <input type="password" id="Password" name="password" required="required" value="<?php echo $passVal;?>"/>
                        <label for="Password">Password</label>
                        <div class="bar"></div>
                        <div class="error">

                            <?php echo $passErr; ?>

                        </div>
                    </div>
                    <div class="input-container">
                        <input type="password" id="Repeat Password" name="repassword" required="required" value="<?php echo $repassVal;?>"/>
                        <label for="Repeat Password">Repeat Password</label>
                        <div class="bar"></div>
                        <div class="error">

                            <?php echo $repassErr; ?>

                        </div>
                    </div>
                    <div class="button-container">
                        <button><span>Send</span></button>
                    </div>
                </form>
                <?php
            } else {
                // ket noi co so du lieu
                $mysql_servername = "localhost";
                $mysql_username = "root";
                $mysql_password = "root";

                try {
                    $conn = new PDO("mysql:host=$mysql_servername;dbname=ahihi_docho", $mysql_username, $mysql_password);

                    // set the PDO error mode to exception
                    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//                echo "Connected successfully";
                } catch (PDOException $e) {
                    echo $e->getMessage();
                }


                // Them hang vao co su du lieu


                // cau lenh insert
                $sql = "INSERT INTO user (first_name,last_name,email,password) VALUES (:first_name,:last_name,:email,:password)";
                // prepare him
                $sth = $conn->prepare($sql);
//                gan du lieu
                $sth->bindValue(':first_name', $firstnameVal);
                $sth->bindValue(':last_name', $lastnameVal);
                $sth->bindValue(':email', $emailVal);
                $sth->bindValue(':password', $passVal);


                // exec cau lenh

                $sth->execute();
                echo "<h1 class='title'>Đăng kí thành công!
                    <div class='close'></div>
                </h1>";


                $conn = null;

            }


        }

        ?>


    </div>

</div>
</body>
</html>
