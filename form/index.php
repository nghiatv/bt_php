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
    <title>Form</title>
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
        $nameErr = $passErr = "";
        //Khai bao gio tri ban dau cua user and pass
        $nameVal = $passVal = "";


        //viet ham xu ly dau vao cua du lieu

        function test_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }

        if($_SERVER['REQUEST_METHOD'] == "POST"){

            // Kiem tra username
            if(empty($_POST['username'])){
                $nameErr = "Username là bắt buộc";
            }else{
                $nameVal = test_input($_POST['username']);
                if(!preg_match("/^[a-zA-Z0-9]*$/",$nameVal)){
                    $nameErr = "Chỉ chấp nhận chữ cái từ a-z và số";
                } else{
                    $nameErr = "";
                }

            }

            // Kiem tra password

            if(empty($_POST['password'])){
                $passErr = "Mật khẩu không được để trống!";
            }else{
                $passVal = test_input($_POST['password']);

                if(!preg_match("/^[a-zA-Z0-9]*$/",$passVal)){
                    $passErr = "Sai đinh dạng nhé";
                }
                else{
                    $passErr = "";
                }
            }

        }


        if (empty($_POST)) {
            echo "<h1 class='title'>Login</h1>";
            ?>
            <form action="" method="post">
                <div class="input-container">
                    <input type="text" id="Username" name="username" required="required"/>
                    <label for="Username">Username</label>
                    <div class="bar"></div>
                    <div class="error"><?php ?></div>
                </div>
                <div class="input-container">
                    <input type="password" id="Password" name="password" required="required"/>
                    <label for="Password">Password</label>
                    <div class="bar"></div>
                    <div class="error"></div>
                </div>
                <div class="button-container">
                    <button><span>Go</span></button>
                </div>
                <div class="footer"><a href="#">Forgot your password?</a></div>
            </form>
            <?php

        } else {

            $username = $_POST['username'];
            $password = $_POST['password'];
//        if($username != ""  && $password != ""){
            if ($username == $user['username'] && $password == $user['password']) {
                echo "<h1 class='title'>Chào anh <strong>$username</strong> ạ</h1>";
            } else {
                // xuat ra chi tiet cua post
//                echo "<pre>";
//                var_dump($_POST);
//                echo "</pre>";


                echo "<h1 class='title wrong'>Sai rồi nhé</h1>";

                ?>
                <form action="" method="post">
                    <div class="input-container">
                        <input type="text" id="Username" name="username" required="required" value="<?php echo $nameVal; ?>"/>
                        <label for="Username">Username</label>
                        <div class="bar"></div>
                        <div class="error"><?php  echo $nameErr ?></div>
                    </div>
                    <div class="input-container">
                        <input type="password" id="Password" name="password" required="required" value="<?php echo $passVal; ?>"/>
                        <label for="Password">Password</label>
                        <div class="bar"></div>
                        <div class="error"><?php echo $passErr ?></div>
                    </div>
                    <div class="button-container">
                        <button><span>Go</span></button>
                    </div>
                    <div class="footer"><a href="#">Forgot your password?</a></div>
                </form>
                <?php


            }


        }

        ?>


    </div>
<!--    <div class="card alt">-->
<!--        <div class="toggle"></div>-->
<!--        <h1 class="title">Register-->
<!--            <div class="close"></div>-->
<!--        </h1>-->
<!--        <form>-->
<!--            <div class="input-container">-->
<!--                <input type="text" id="Username" required="required"/>-->
<!--                <label for="Username">Username</label>-->
<!--                <div class="bar"></div>-->
<!--                <div class="error"></div>-->
<!--            </div>-->
<!--            <div class="input-container">-->
<!--                <input type="password" id="Password" required="required"/>-->
<!--                <label for="Password">Password</label>-->
<!--                <div class="bar"></div>-->
<!--                <div class="error"></div>-->
<!--            </div>-->
<!--            <div class="input-container">-->
<!--                <input type="password" id="Repeat Password" required="required"/>-->
<!--                <label for="Repeat Password">Repeat Password</label>-->
<!--                <div class="bar"></div>-->
<!--            </div>-->
<!--            <div class="button-container">-->
<!--                <button><span>Next</span></button>-->
<!--            </div>-->
<!--        </form>-->
<!--    </div>-->
</div>
</body>
</html>
